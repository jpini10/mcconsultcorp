<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa=empresa::all();
        return view('empresa.index',compact('empresa'));
    }

    public function create()
    {
        sleep(3);
        return view ('empresa.create');
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|min:3|max:200|unique:empresas,nombre,',
            

        ]);
        // Permission::create($request->all());
        empresa::create($request->only('nombre'));
        // return view('permissions.index');
        
        return redirect()->route('empresa.index')->with('Actualizar','empresa añadido correctamente');
        
    }

    public function show(empresa $empresa)
    {
        
    }

    public function edit(empresa $empresa)
    {
        // return dd($empresa);

        return  view('empresa.edit',compact('empresa')) ;

    }

    public function update(Request $request, empresa $empresa)
    {
        $request->validate([
            
            'nombre' =>['required','unique:empresas,nombre,'.$empresa->id],
        ]);
        $empresa->update($request->only('nombre'));
        // $role->syncPermissions($request->input('permissions',[]));
        return redirect()->route('empresa.index')->with('alerta','empresa modificado correctamente');
        
    }
    public function destroy(empresa $empresa)
    {
        $empresa ->delete();
        return back()->with('alerta','empresa eliminado correctamente');
    }
}
