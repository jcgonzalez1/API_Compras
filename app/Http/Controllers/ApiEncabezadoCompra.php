<?php

namespace App\Http\Controllers;

use App\Models\EncabezadoCompra;
use App\Reglas\SoloLetras;
use App\Reglas\PreciosDosDecimales;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class ApiEncabezadoCompra extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encabezadocompras = EncabezadoCompra::all();
        return response()->json($encabezadocompras);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'codigoFactura' => ['required'],
                'fechaCompra' => ['required'],
                
                
            ]);
            $encabezadoCompra = new EncabezadoCompra();
            $encabezadoCompra->fill($request->all());
            $encabezadoCompra->save();
            return response()->json($encabezadoCompra,201);
        } catch (ValidationException $e){
            return response()->json(['error' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encabezado = EncabezadoCompra::findOrFail($id);
        return response()->json($encabezado);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $encabezado = EncabezadoCompra::findOrFail($id);
        $encabezado->fill($request->all());
        $encabezado->save();
        return response()->json($encabezado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $encabezado = EncabezadoCompra::findOrFail($id);
        $encabezado->delete();
        return response()->json([],204);
    }
}
