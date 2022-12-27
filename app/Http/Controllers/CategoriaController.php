<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $Categoria=categoria::all();
        return view('categoria.index',compact('Categoria'));

    }

    public function create()
    {
        return view('categoria.create');

    }

    public function store(Request $request)
    {
        // $datoscategoria=request()->all();
        // return response()->json($datoscategoria);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria $categoria)
    {
        //
    }
}
