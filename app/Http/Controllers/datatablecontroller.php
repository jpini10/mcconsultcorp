<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
// use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DataTables;
use Illuminate\Support\Facades\DB;
class datatablecontroller extends Controller
{
    public function user()
    {
        $users=User::all();
         //return datatables()->of($Users)->toJson();
       //  return datatables()->of(User::all())->toJson();
        //      ->addcolumn('action',function($users){
        //     $acciones = '<a href="#" class="btn btn-warning" style="display:inline-block; editar</a>  <i class="fas fa-edit"></i>';
        //    $acciones= '<button type="button" name="delete" id="" class="btn btn-warning" </button>';
        //     return $acciones;
        // })
        // ->rawColumns(['action'])
        // ->make(true);
        return view ('users.index',compact('users'));

       // return view ('users.index',compact('users'));
        // return datatables()->of(User::all())->toJson();
        //return datatables()->collection(User::all());
     // return $users;
       //return view ('users.index');
    }
}
