<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StoreFabricante;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'Listado de fabricantes';
        return response()->json(['status' => 'ok', 'data' => Fabricante::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar formulario para dar de alta
        return view("layouts.altas");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFabricante $request)
    {
        // Validar datos y almacenarlos en la base de datos.
        $nuevoFabricante = Fabricante::create($request->validated());
        return "dado de alta correctamente";

        //   return json_encode(['data' => $nuevoFabricante]), 201)->header('Location', 'http://www.laravel.local/fabricantes/' . $nuevoFabricante->id)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Muestra los datos del fabricante que se pasa como parametro.
        // Buscamos el fabricante
        $fabricante = Fabricante::find($id);

        // Compruebo si existe o no.
        if (!$fabricante) {
            // devuelve mensaje de que no existe
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese código.'])], 404);
        }

        return response()->json(['status' => 'ok', 'data' => $fabricante], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fabricante = Fabricante::find($id);

        // Compruebo si existe o no.
        if (!$fabricante) {
            // devuelve mensaje de que no existe
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese código.'])], 404);
        }

        // Para averiguar los aviones del fabricante...
        $aviones = $fabricante->aviones();

        // Comprobamos si tiene aviones ese fabricante.
        if (sizeof($aviones) > 0) {
            // foreach ($aviones as $avion) {
            //     $avion->delete();
            // }

            // Devolveremos un código 409 Conflict - [Conflicto] Cuando hay algún conflicto al procesar una petición, por ejemplo en PATCH, POST o DELETE.
            return response()->json(['code' => 409, 'message' => 'Este fabricante posee aviones y no puede ser eliminado.'], 409);
        }

        $fabricante->delete();
        return response()->json(['code' => 204, 'message' => 'Se ha eliminado el fabricante correctamente.'], 204);
    }
}
