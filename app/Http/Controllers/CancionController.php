<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Grupo;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $canciones = Cancion::all();
        return view('canciones.show', compact('canciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::all();
        return view('canciones.create', compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'nombre' => $request->nombre,
            'grupo_id' => $request->grupo_id
        ];
        Cancion::create($data);
        return  redirect()->route('canciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function show(Cancion $cancione)
    {
        $cancion = $cancione;
        $grupos = Grupo::all();
        return view('canciones.create', compact('cancion','grupos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cancion $cancion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cancion $cancione)
    {
        $cancione->nombre = $request->nombre;
        $cancione->grupo_id = $request->grupo_id;
        $cancione->save();
        return  redirect()->route('canciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cancion $cancione)
    {
        $cancione->delete();
        return  redirect()->route('canciones.index');
    }
}
