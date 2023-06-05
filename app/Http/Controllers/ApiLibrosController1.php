<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Reglas\SoloLetras;
use App\Reglas\PreciosDosDecimales;
use Illuminate\Validation\ValidationException;

class ApiLibrosController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        return response()->json($libros);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $request->validate([
            'tituloLibro' => ['required', new SoloLetras],
            'autor' => ['required', new SoloLetras],
            'precio' => ['required', new PreciosDosDecimales],
            //otras reglas de validacion 
        ]);
        $libro = new Libro();
        $libro->fill($request->all());
        $libro->save();
        return response()->json($libro,201);
    } catch (ValidationException $e){
        return response()->json(['error' => $e->errors()], 422);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $libro = Libro::findOrFail($id);
        return response()->json($libro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->fill($request->all());
        $libro->save();
        return response()->json($libro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return response()->json([],204);
    }
}
