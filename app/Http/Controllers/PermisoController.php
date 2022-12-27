<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

class PermisoController extends Controller
{
    
    public function index()
    {
        abort_if(Gate::denies('permiso_inicio'),403);

        // $permissions=Permission::paginate(5);
        $permissions=Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('permiso_crear'),403);
        return view ('permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            

        ]);
        // Permission::create($request->all());
        Permission::create($request->only('name'));
        // return view('permissions.index');
        return redirect()->route('permissions.index')->with('alerta','Permiso añadido correctamente');
    }

    public function show($id)
    {
        abort_if(Gate::denies('permiso_detalle'),403);

    }

    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permiso_editar'),403);

        return  view('permissions.edit',compact('permission')) ;
    }

    public function update(Request $request, Permission $permission)
    {
       
        $permission->update($request->only('name'));
        return redirect()->route('permissions.index')->with('alerta','Permiso modificado correctamente');
    }

    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permiso_eliminar'),403);
        $permission ->delete();
        return back()->with('alerta','Permiso eliminado correctamente');
    }
}
