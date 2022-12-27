<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{ 
    public function index(Request $request)
    {
      abort_if(Gate::denies('usuario_inicio'),403);
        $users=User::all();
        return view ('users.index',compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('usuario_crear'),403);

        $roles=Role::all()->pluck('name','id');
     return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:100',
            'username'=>'required|unique:users,username,',
            'email'=>'required|email|unique:users',
            'password'=>'required'

        ]);
        //crear usuarios
        //User::create($request->all()); contraseña se muestra en la base de datos
       $user= User::create($request->only('name','username','email')
    +[
        'password'=>bcrypt($request->input('password')),
    ]);
    $roles=$request->input('roles',[]);
    $user->syncRoles($roles);
        return redirect()->route('users.index',$user->id)->with('guardar','asuario añadido correctamente');
    }

    public function show($id)
    {
        abort_if(Gate::denies('usuario_detalle'),403);

        $user=User::find($id);
        // dd($user);
        return view ('users.show',compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('usuario_editar'),403);

        $roles=Role::all()->pluck('name','id');
        $user->load('roles');
       return  view('users.edit',compact('user','roles')) ;
    }

    public function update(UserEditRequest $request, User $user)
    {
        

        $data=$request->only('name','username','email');
        $password=$request->input('password');
        if($password)
        $data['password']=bcrypt($password);
        $user->update($data);
        $roles=$request->input('roles',[]);
        $user->syncRoles($roles);
        return redirect()->route('users.index')->with('actualizar','asuario modificado correctamente');
    }
    public function destroy(User $user)
    {
        abort_if(Gate::denies('usuario_eliminar'),403);

        if(auth()->user()->id==$user->id){
            return redirect()->route('users.index');
        }
        $user ->delete();
        return back()->with('eliminar','asuario eliminado correctamente');
    }
        
    
}
