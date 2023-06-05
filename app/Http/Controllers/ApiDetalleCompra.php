<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use App\Reglas\SoloLetras;
use App\Reglas\SoloEnteros;
use App\Reglas\PreciosDosDecimales;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class ApiDetalleCompra extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = DetalleCompra::all();
        return response()->json($compras);
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
            'cantidad' => ['required', new SoloEnteros],
            'precio' => ['required', new PreciosDosDecimales],
            'id_encabezado' => ['required' , new SoloEnteros],
            'id_producto' => ['required', new SoloEnteros],
            //otras reglas de validacion 
        ]);
        $compra = new DetalleCompra();
        $compra->fill($request->all());
        $compra->save();
        return response()->json($compra,201);
    } catch (ValidationException $e){
        return response()->json(['error' => $e->errors()], 422);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compra = DetalleCompra::findOrFail($id);
        return response()->json($compra);
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
        $compra = DetalleCompra::findOrFail($id);
        $compra->fill($request->all());
        $compra->save();
        return response()->json($compra);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compra = DetalleCompra::findOrFail($id);
        $compra->delete();
        return response()->json([],204);
    }
}

