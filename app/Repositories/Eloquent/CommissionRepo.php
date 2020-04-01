<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\CommissionInterface;
use App\Commission;
use Validator;
use File;
use Maatwebsite\Excel\Facades\Excel;
class CommissionRepo implements CommissionInterface
{
    public function index()
    {
        $commissions = Commission::orderby('name')->get();
        return view('commissions.index', compact('commissions'));
    }

    public function store($request)
    {
        $commission = Commission::create($request->all());
        flash('Comisión ' . $commission->name . ' creada exitosamente.')->success();
        return redirect(route('commissions.index'));
    }

    public function update($request, $commission)
    {
        $commission->update($request->all());
        flash('Comisión ' . $commission->name . ' actualizada exitosamente.')->success();
        return redirect(route('commissions.index'));
    }

    public function delete($commission)
    {
        $commission->delete();
        flash('Comisión ' . $commission->name . ' eliminada exitosamente.')->success();
        return redirect(route('commissions.index'));
    }

    public function importCommissions($request)
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
                    $commissions = $reader->get();
                    foreach ($commissions as $commission) {
                        $language;
                        if($commission->idioma === 'Español') {
                            $language = 1;
                        } else {
                            $language = 2;
                        }
                        Commission::create([
                            'name' => $commission->nombre,
                            'language_id' => $language,
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