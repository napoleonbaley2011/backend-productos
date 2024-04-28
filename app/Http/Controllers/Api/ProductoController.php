<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** 
        $producto = DB::select("
        SELECT *
        FROM productos
        ");
        */
        $productos = Producto::all();
        return $productos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
        $descripcion = $request['descripcion'];
        $precio = $request['precio'];
        $stock = $request['stock'];
        $consulta = DB::insert("INSERT INTO productos(descripcion, precio, stock)values('$descripcion',$precio,$stock);");
        */

        $producto = new Producto();
        $producto -> descripcion = $request->descripcion;
        $producto -> precio = $request->precio;
        $producto -> stock = $request->stock;
        $producto -> save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /** 
        $consulta = DB::select("
        SELECT *
        FROM productos
        WHERE id = $id
        ");
        return $consulta;
        */

        $producto = Producto::find($id);
        return $producto;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($request->id);
        $producto -> descripcion = $request->descripcion;
        $producto -> precio = $request->precio;
        $producto -> stock = $request->stock;

        $producto -> save();
        return $producto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::destroy($id);
        return "Se elimino";
    }

    public function elmasvendido(string $id){
        return "Hola mi Amor";
    }
}
