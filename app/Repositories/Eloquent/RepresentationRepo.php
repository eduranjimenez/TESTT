<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\RepresentationInterface;
use App\Representation;
use File;
use Validator;
use Maatwebsite\Excel\Facades\Excel;

class RepresentationRepo implements RepresentationInterface
{
    public function index()
    {
        $representations = Representation::orderby('spanish_name')->get();
        return view('representations.index', compact('representations'));
    }

    public function store($request)
    {
        $representation = Representation::create($request->all());
        flash('Representación ' . $representation->spanish_name . ' creada exitosamente.')->success();
        return redirect(route('representations.index'));
    }

    public function update($request, $representation)
    {
        $representation->update($request->all());
        flash('Representación ' . $representation->spanish_name . ' actualizada exitosamente.')->success();
        return redirect(route('representations.index'));
    }

    public function delete($representation)
    {
        $representation->delete();
        flash('Representación ' . $representation->spanish_name . ' eliminada exitosamente.')->success();
        return redirect(route('representations.index'));
    }

    public function importRepresentations($request)
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
                    $representations = $reader->get();
                    foreach ($representations as $representation) {
                        Representation::create([
                            'spanish_name' => $representation->representacion_espanol,
                            'french_name' => $representation->representacion_frances,
                            'english_name' => $representation->representacion_ingles,
                        ]);
                    }
                });
            } else {
                return response()->json(array('error' => 'Solamente puede importar archivos .csv'));
            }
        }
        return response()->json(array('message' => 'Archivo importado correctamente.'), 201);
    }
}