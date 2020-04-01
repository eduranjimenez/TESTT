<?php

namespace App\Repositories\Eloquent;

use App\Country;
use App\Commission;
use App\Representation;
use App\Institution;
use App\Repositories\Contracts\InstitutionInterface;
use App\Participant;
use App\InstitutionType;
use App\InstitutionCommission;
use App\CommissionRepresentation;
use App\Enums\Lang;
use Validator;
use File;
use Maatwebsite\Excel\Facades\Excel;

class InstitutionRepo implements InstitutionInterface
{
    public function index()
    {
        $institutions = Institution::orderby('name')->get();
        return view('institutions.index', compact('institutions'));
    }

    public function create()
    {
        $types = InstitutionType::orderby('name')->get();
        $cities = Country::all();
        return view('institutions.create', compact('cities', 'commissions', 'types'));
    }

    public function edit($institution)
    {
        $types = InstitutionType::orderby('name')->get();
        $cities = Country::all();
        return view('institutions.edit', compact('institution', 'cities', 'types'));
    }

    public function show($institution)
    {
        $stadistics['ada'] = Participant::where('category', 'Asesor Docente Adicional (ADA)')->where('institution_id', $institution->id)->count();
        $stadistics['ador'] = Participant::where('category', 'Asesor Docente Responsable de Grupo (ADOR)')->where('institution_id', $institution->id)->count();
        $stadistics['deb'] = Participant::where('category', 'Delegado de Educación Básica')->where('institution_id', $institution->id)->count();
        $stadistics['dbm'] = Participant::where('category', 'Delegado de Educación Media')->where('institution_id', $institution->id)->count();
        $stadistics['dbs'] = Participant::where('category', 'Delegado de Educación Superior')->where('institution_id', $institution->id)->count();
        $stadistics['guess'] = Participant::where('category', 'Invitado Especial')->where('institution_id', $institution->id)->count();
        $stadistics['observer'] = Participant::where('category', 'Observador')->where('institution_id', $institution->id)->count();
        $stadistics['secretary'] = Participant::where('category', 'Secretaría')->where('institution_id', $institution->id)->count();

        $participants = Participant::where('institution_id', $institution->id)->orderby('name')->get();
        $institutioncommissions = InstitutionCommission::where('institution_id', $institution->id)->with('commissionrepresentations')->get();
        $stadistics['participants'] = Participant::where('institution_id', $institution->id)->count();
        $stadistics['validated_participants'] = Participant::where('is_completed', true)->where('institution_id', $institution->id)->count();
        return view('institutions.show', compact('institution', 'participants', 'institutioncommissions', 'stadistics'));
    }

    public function store($request)
    {
        $institution = Institution::create($request->all());
        flash('Institución ' . $institution->name . ' creada exitosamente.')->success();
        return redirect(route('institutions.index'));
    }

    public function update($request, $institution)
    {
        $institution->update($request->all());
        flash('Institución ' . $institution->name . ' actualizada exitosamente.')->success();
        return redirect(route('institutions.index'));
    }

    public function delete($institution)
    {
        $institution->delete();
        flash('Institución ' . $institution->name . ' eliminada exitosamente.')->success();
        return redirect(route('institutions.index'));
    }

    public function assign()
    {
        $institutions = Institution::orderby('name')->get();
        $representations = Representation::orderby('spanish_name')->get();
        $commissions = Commission::orderby('name')->get();
        return view('institutions.assigncommission', compact('institutions', 'commissions', 'representations'));
    }

    public function assignStore($request)
    {
        $representations = $request->representation_id;
        $capacity = $request->capacity;

        $institutionCommision = InstitutionCommission::create([
            'institution_id' => $request->institution_id,
            'commission_id' => $request->commission_id    
        ]);
            
        for ($i=0; $i < count($representations); $i++) { 
            CommissionRepresentation::create([
                'representation_id' => $representations[$i],
                'capacity' => $capacity[$i],
                'institutioncommission_id' => $institutionCommision->id
            ]);
        }

        flash('Comisión asignada exitosamente.')->success();
        return redirect()->back();
    }

    public function getCommissions($institutionId)
    {
        $institutionCommisions = InstitutionCommission::where('institution_id', $institutionId)->with('commission:id,name')->get();
        return $institutionCommisions;
    }

    public function getCommissionRepresentations($institutioncommission)
    {
        $institutionCommission = InstitutionCommission::where('id', $institutioncommission)->first();

        if ($institutionCommission->commission->language_id === Lang::SPANISH) {
            $commissionrepresentations = CommissionRepresentation::with('representation:id,spanish_name AS name')->where('institutioncommission_id', $institutioncommission)->get();
        }

        if ($institutionCommission->commission->language_id === Lang::ENGLISH) {
            $commissionrepresentations = CommissionRepresentation::with('representation:id,english_name AS name')->where('institutioncommission_id', $institutioncommission)->get();
        }

        if ($institutionCommission->commission->language_id === Lang::FRENCH) {
            $commissionrepresentations = CommissionRepresentation::with('representation:id,french_name AS name')->where('institutioncommission_id', $institutioncommission)->get();
        }
        return view('commissionrepresentations.index', compact('commissionrepresentations'));
    }

    public function importInstitutions($request)
    {
        $validation = Validator::make($request->all(), [
            'file' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()], 401);
        }

        if ($request->hasFile('file')) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension === "xlsx" || $extension === "xls" || $extension === "csv") {
                $path = $request->file->getRealPath();
                Excel::load($path, function ($reader) {
                    $institutions = $reader->get();
                    foreach ($institutions as $institution) {
                        Institution::create([
                            'name' => $institution->nombre,
                            'type' => 'Educación Media y Básica',
                            'phone' => $institution->telefono,
                            'country' => $institution->pais,
                            'ador_one_phone' => $institution->celular_ador_1,
                            'ador_one_email' => $institution->e_mail_ador_1,
                            'ador_one_name' => $institution->nombre_ador_1,
                            'ador_two_name' => $institution->nombre_ador_2,
                            'ador_two_phone' => $institution->celular_ador_2,
                            'ador_two_email' => $institution->e_mail_ador_2
                        ]);
                    }
                });
            } else {
                return response()->json(array('error' => 'Solamente puede importar archivos .csv'));
            }
        }
        return response()->json(array('message' => 'Archivo importado correctamente.'), 201);
    }

    public function participantsExcel($institution)
    {
        $participants = Participant::where('institution_id', $institution->id)->get();
        return $this->generateExcel($institution, $participants);
    }

    public function commissionsReport($commission)
    {
        $commission = Commission::where('id', $commission)->first();
        $participants = [];
        $institutioncommissions = InstitutionCommission::where('commission_id',  $commission->id)->with('commissionrepresentations.participantrepresentations.participant')->get();
        //get only the participants
        foreach($institutioncommissions as $institutionscommission) {
            foreach($institutionscommission->commissionrepresentations as $commissionrepresentation) {
                if(count($commissionrepresentation->participantrepresentations) > 0) {
                    $participantrepresentations = $commissionrepresentation->participantrepresentations;
                    foreach($participantrepresentations as $participantrepresentation) {
                        array_push($participants, $participantrepresentation->participant);
                    }
                }
            }
        }

        return $this->generateExcel($commission, $participants);
        
    }

    public function generalReport()
    {
        $participants = Participant::all();
        return $this->generateExcel(null,$participants);
    }

    public function generateExcel($model = null, $participants)
    {
        return Excel::create('Participantes de ' . ($model !== null ? $model->name : 'todas las instituciones'), function($excel) use($participants) {
            $excel->sheet('Participantes', function($sheet) use($participants) {
                $result = [];
                foreach($participants as $participant) {
                    array_push($result, [
                        'nombre' => $participant->name,    
                        'apellido' => $participant->lastname,
                        'correo' => $participant->email,
                        'categoria' => $participant->category,
                        'comision' => $participant->getCommission(),
                        'representacion' => $participant->getRepresentation(),
                        'institucion' => $participant->institution->name,
                        'sexo' => $participant->gender,
                        'nivel_academico' => $participant->academic_level,
                        'direccion' => $participant->address,
                        'fecha_nacimiento' => $participant->date_birth,
                        'celular' => $participant->cellphone,
                        'telefono' => $participant->phone,
                        'tipo_sangre' => $participant->blood_type,
                        'contacto_emergencia_nombre' => $participant->emergency_contact_name,
                        'contacto_emergencia_celular' => $participant->emergency_contact_cellphone,
                        'contacto_emergencia_telefono' => $participant->emergency_contact_phone,
                        'contacto_emergencia_correo' => $participant->emergency_contact_email,
                        'relacion_contacto' => $participant->emergency_contact_relation,
                        'documentos_validados' => ($participant->is_completed === 1 ? 'SI' : 'NO')
                    ]);
                }
                $sheet->fromArray($result);
 
            });
        })->export('xls');
    }
    
}
