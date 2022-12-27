<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use App\Models\sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index()
    {
        $sucursal=sucursal::all();
        return view('sucursal.index',compact('sucursal'));
    }

    public function create()
    {
        $empresas=empresa::all()->pluck('nombre','id'); 
        return view ('sucursal.create',compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
        ]);
        $sucursal= new sucursal();
            $sucursal->nombre=$request->nombre;
            $sucursal->empresa_id=$request->empresas;
           
            $sucursal->save();
            // return dd($sucursal);
            return redirect()->route('sucursal.index')->with('alerta','sucursal añadido correctamente');

    }
    public function show(sucursal $sucursal)
    {
        return view ('sucursal.show',compact('sucursal'));
    }

    public function edit(sucursal $sucursal)
    {
        $empresas=empresa::get();
       
         return  view('sucursal.edit',compact('sucursal','empresas')) ;
    }
    public function update(Request $request, sucursal $sucursal)
    {
        $request->validate([
            
            'nombre'=>['required','unique:sucursals,nombre,'.$sucursal->id],
            // 'nombre' =>['required','unique:categorias,nombre,'.$categoria->id],

        ]);
        $sucursal->nombre=$request->nombre;
           
            $sucursal->empresa_id=$request->empresas;
         
            $sucursal->update();
            return redirect()->route('sucursal.index')->with('alerta','sucursal Modificado correctamente');

    }

    public function destroy(sucursal $sucursal)
    {
        $sucursal ->delete();
        return back()->with('alerta','Producto eliminado correctamente');
    }
}
