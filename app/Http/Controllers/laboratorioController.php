<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeLaboratorioRequest;
use App\Http\Requests\updateLaboratorioRequest;
use App\Models\Caracteristica;
use App\Models\Laboratorio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class laboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratorios = Laboratorio::with("caracteristica")->latest()->get();

        return view("laboratorio.index", ["laboratorios" => $laboratorios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("laboratorio.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeLaboratorioRequest $request)
    {
        try {
            DB::beginTransaction();
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->laboratorio()->create([
                'caracteristica_id' => $caracteristica-> id
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('laboratorios.index')->with('success','Laboratorio Registrado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratorio $laboratorio)
    {
        return view('laboratorio.edit', ['laboratorio'=> $laboratorio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateLaboratorioRequest $request, Laboratorio $laboratorio)
    {
        Caracteristica::where('id', $laboratorio->caracteristica->id)->update($request->validated());

        return redirect()->route('laboratorios.index')->with('success','Laboratorio Editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = '';
        $laboratorio = Laboratorio::find($id);
        if ($laboratorio->caracteristica->estado == 1) {
            Caracteristica::where('id', $laboratorio->caracteristica->id)
                ->update([
                    'estado' => 0
                ]);
            $message = 'Laboratorio eliminado';
        } else {
            Caracteristica::where('id', $laboratorio->caracteristica->id)
                ->update([
                    'estado' => 1
                ]);
            $message = 'Laboratorio restaurado';
        }

        return redirect()->route('laboratorios.index')->with('success', $message);
    }
}
