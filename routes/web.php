<?php

use App\Models\AsignarProductoEmpleado;
use App\Models\Producto;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('home{idusuario}',[App\Http\Controllers\HomeController::class, 'lobtenerpruductoasigandos'])->name('home.productosporusuario');


Route::group(['middleware'=>'auth'],function(){
    Route::get('/post', [App\Http\Controllers\postcontroller::class, 'index'])->name('post.index');

   // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
   // Route::get('permissions', [App\Http\Controllers\PermissionController::class,'index'])->name('permissions.index');

   Route::get('permissions', [App\Http\Controllers\PermisoController::class,'index'])->name('permissions.index');
   Route::get('/permissions/create', [App\Http\Controllers\PermisoController::class, 'create'])->name('permissions.create');
   Route::post('/permissions', [App\Http\Controllers\PermisoController::class, 'store'])->name('permissions.store');
   Route::get('/permissions/{permission}/edit', [App\Http\Controllers\PermisoController::class, 'edit'])->name('permissions.edit');
   Route::put('/permissions/{permission}', [App\Http\Controllers\PermisoController::class, 'update'])->name('permissions.update');
   Route::delete('/permissions/{permission}', [App\Http\Controllers\PermisoController::class, 'destroy'])->name('permissions.delete');



   Route::get('roles', [App\Http\Controllers\RoleController::class,'index'])->name('roles.index');
   Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
   Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
   Route::get('/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
   Route::put('/roles/{role}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
   Route::delete('/roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.delete');

   Route::get('categoria', [App\Http\Controllers\CategoriaController::class,'index'])->name('categoria.index');
   Route::get('/categoria/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categoria.create');


   Route::get('empresa', [App\Http\Controllers\EmpresaController::class,'index'])->name('empresa.index');
   Route::get('/empresa/create', [App\Http\Controllers\EmpresaController::class, 'create'])->name('empresa.create');
   Route::post('/empresa', [App\Http\Controllers\EmpresaController::class, 'store'])->name('empresa.store');
   Route::get('/empresa/{empresa}/edit', [App\Http\Controllers\EmpresaController::class, 'edit'])->name('empresa.edit');
   Route::put('/empresa/{empresa}', [App\Http\Controllers\EmpresaController::class, 'update'])->name('empresa.update');
   Route::delete('/empresa/{empresa}', [App\Http\Controllers\EmpresaController::class, 'destroy'])->name('empresa.delete');

   Route::get('sucursal', [App\Http\Controllers\SucursalController::class,'index'])->name('sucursal.index');
   Route::get('/sucursal/create', [App\Http\Controllers\SucursalController::class, 'create'])->name('sucursal.create');
   Route::post('/sucursal', [App\Http\Controllers\SucursalController::class, 'store'])->name('sucursal.store');
   Route::get('/sucursal/{sucursal}/edit', [App\Http\Controllers\SucursalController::class, 'edit'])->name('sucursal.edit');
   Route::put('/sucursal/{sucursal}', [App\Http\Controllers\SucursalController::class, 'update'])->name('sucursal.update');
   Route::delete('/sucursal/{sucursal}', [App\Http\Controllers\SucursalController::class, 'destroy'])->name('sucursal.delete');


   Route::post('/producto/importar',[App\Http\Controllers\ProductoController::class,'importar'])->name('producto.importar');

   Route::get('producto', [App\Http\Controllers\ProductoController::class,'index'])->name('producto.index');
   Route::get('/producto/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('producto.create');
   Route::post('/producto', [App\Http\Controllers\ProductoController::class, 'store'])->name('producto.store');
   Route::get('/producto/{producto}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('producto.edit');
   Route::put('/producto/{producto}', [App\Http\Controllers\ProductoController::class, 'update'])->name('producto.update');
   Route::delete('/producto/{producto}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('producto.delete');
   Route::get('obtenersucursal/{id}', [App\Http\Controllers\ProductoController::class,'sucursalobtenida']);
   Route::get('obtenerusuarios/{idEmpresa}/{idSucursal}/{lote}', [App\Http\Controllers\ProductoController::class,'usuariobtenido']);
   Route::get('obtenerlotes/', [App\Http\Controllers\ProductoController::class,'loteobtenido']);
   Route::get('obtenerlotes/', [App\Http\Controllers\AsignarProductoEmpleadoController::class,'loteobtenido']);

   Route::get('prueba1',function(){
    
    $obtenerproducto =DB::select ( 'CALL obtenerProductosPorusuario(2)');
   return dd($obtenerproducto);
    return view('home',compact('obtenerproducto'));
    return "hola";
   });
   Route::get('getproductos/{empresa_id}/{sucursal_id}/{lote_id}/{condicion}', [App\Http\Controllers\ProductoController::class,'traerproductos'])->name('producto.getproductos');
   Route::get('getproductos1/{empresa_id}/{sucursal_id}/{lote_id}/{user_id}', [App\Http\Controllers\AsignarProductoEmpleadoController::class,'traerproductosasignados1'])->name('asignacion.getproductos1');
   Route::get('getmostrarasignacion/{empresa_id}/{sucursal_id}/{user_id}', [App\Http\Controllers\AsignarProductoEmpleadoController::class,'traerproductosasignados'])->name('asignacion.getmostrarasignacion');
   Route::get('getasignacion', [App\Http\Controllers\AsignarProductoEmpleadoController::class,'traerasignacion'])->name('asignacion.getasignacion');
   Route::get('asignarproductoempleado', [App\Http\Controllers\ProductoController::class,'asiganarproductos'])->name('producto.asignarproductoempleado');
  
   Route::get('asignacion', [App\Http\Controllers\AsignarProductoEmpleadoController::class,'index'])->name('asignacion.index');
   Route::get('/asignacion/create', [App\Http\Controllers\AsignarProductoEmpleadoController::class, 'create'])->name('asignacion.create');
   Route::post('/asignacion', [App\Http\Controllers\AsignarProductoEmpleadoController::class, 'store'])->name('asignacion.store');
   Route::get('/asignacion/{AsignarProductoEmpleado}/edit', [App\Http\Controllers\AsignarProductoEmpleadoController::class, 'edit'])->name('asignacion.edit');
   Route::put('/asignacion/{asignacion}', [App\Http\Controllers\AsignarProductoEmpleadoController::class, 'update'])->name('asignacion.update');
   Route::delete('/asignacion/{asignar}', [App\Http\Controllers\AsignarProductoEmpleadoController::class, 'destroy'])->name('asignacion.delete');
   Route::get('obtenertodoslosusuarios/{id}', [App\Http\Controllers\ProductoController::class,'sucursalobtenida']);  
   Route::get('obtenersucursales/{id}', [App\Http\Controllers\AsignarProductoEmpleadoController::class,'sucursalobtenida']);
   Route::get('obtenertodoslosusuarios/{idEmpresa}/{idSucursal}/{lote}', [App\Http\Controllers\AsignarProductoEmpleadoController::class,'usuariostotales']);
   Route::get('/asignacion/estado_asignacion/{asignacion}', [App\Http\Controllers\AsignarProductoEmpleadoController::class, 'estado_asignacion'])->name('asignacion.estado');

   Route::get('listarproductoususario',[App\Http\Controllers\HomeController::class, 'obtenerpruductoasigandos'])->name('listarproductoususario.usuario');
});




  


