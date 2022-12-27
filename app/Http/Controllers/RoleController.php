<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Symfony\Component\Console\Input\Input;

class RoleController extends Controller
{
   
    public function index()
    {
        abort_if(Gate::denies('rol_inicio'),403);

        // $rol=Role::paginate(10);
        // return view('roles.index',compact('rol'));
        $rol=Role::all();
        // return datatables()->of(Role::all())->toJson();
        return view('roles.index',compact('rol'));

    }

    public function create()
    {
        abort_if(Gate::denies('rol_crear'),403);

        $permissions=Permission::all()->pluck('name','id');
        // dd($permissions);
       return view ('roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'name'=>['required','min:3'],
            'name' =>'required|unique:roles',
            

        ]);
         // Permission::create($request->all());
        $role= Role::create($request->only('name'));
        $role->syncPermissions($request->input('permissions',[]));
        // return view('permissions.index');
         return redirect()->route('roles.index')->with('alerta','Rol añadido correctamente');
    }

    public function show($id)
    {
        abort_if(Gate::denies('rol_detalle'),403);
    }

    public function edit(Role $role)
    {          abort_if(Gate::denies('rol_editar'),403);

        $permissions=Permission::all()->pluck('name','id');
        $role->load('permissions');
        // dd($role);
        return  view('roles.edit',compact('role','permissions')) ;
        
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            // 'name'=>['required','min:3'],
            'name' =>['required','unique:roles,name,'.$role->id],
            

        ]);
        $role->update($request->only('name'));
        $role->syncPermissions($request->input('permissions',[]));
        return redirect()->route('roles.index')->with('alerta','Roles modificado correctamente');
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('rol_eliminar'),403);

        $role ->delete();
        return back()->with('alerta','Rol eliminado correctamente');
    }
}
