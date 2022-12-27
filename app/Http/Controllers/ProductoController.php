<?php

namespace App\Http\Controllers;

use App\Imports\ProductoImportar;
use App\Models\AsignarProductoEmpleado;
use App\Models\empresa;
use App\Models\producto;
use App\Models\sucursal;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductoController extends Controller
{
    public function sucursalobtenida($id){
        return json_encode(DB::table('sucursals')->where('empresa_id', $id)->get());
         
    }
    public function usuariobtenido($idEmpresa, $idSucursal, $lote){
        // return dd($id);
        return json_encode(DB::select("SELECT  EM.id, EM.name  FROM users  AS EM
        LEFT JOIN asignar_producto_empleados AS APE ON EM.id = APE.user_id 
        
        AND APE.empresa_id = ? AND APE.sucursal_id = ? AND APE.lote_id=?
        WHERE  APE.user_id IS NULL and EM.id !=1",array($idEmpresa,$idSucursal,$lote)));    
    }
    public function loteobtenido(){
        // return dd($id);
        return json_encode(DB::select("SELECT l.id, l.lote  FROM lotes_controllers as l"));
}
    public function index()
    {
        $empresa=empresa::get(); 
        $sucursal=sucursal::get();
        $usuarios=DB::select("SELECT  EM.id, EM.name  FROM users  AS EM
        LEFT JOIN asignar_producto_empleados AS APE ON EM.id = APE.user_id WHERE APE.user_id IS NULL");
    $lotes =DB::select("SELECT l.id, l.lote  FROM lotes_controllers as l");
    // return dd($lotes);

        $sucursal=DB::select("CALL Sp_listarSucursales()");
         return view('producto.index',compact('empresa','sucursal','usuarios','lotes'));
    }
    public function create()
    {
        $empresa=empresa::get(); 
        $sucursal=sucursal::get();
       return dd($empresa);
         return view ('producto.create',compact('empresa','sucursal'));
    }
    public function listar()
    {
        
    }
    public function store(Request $request)
    {
            $producto= new producto();
            $producto->item=$request->item;
            $producto->codigo=$request->codigo;
            $producto->material=$request->material;
            $producto->um=$request->um;
            $producto->clasvalor=$request->clasvalor;
            $producto->lote=$request->lote;
            $producto->almacen=$request->almacen;
            $producto->ubicacion=$request->ubicacion;
            $producto->stock=$request->stock;
            $producto->empresa_id=$request->empresa;
            $producto->sucursal_id=$request->sucursal;
            $producto->save();
         return redirect()->route('producto.index')->with('alerta','Producto añadido correctamente');
    }
    public function show(producto $producto)
    {
        //
    }
    public function edit(producto $producto)
    {
        //
    }
    public function traerproductos($empresa_id ,$sucursal_id,$lote_id, $condicion)
    {
        return datatables()->of(DB::select('CALL Sp_SeleccionarProductosPorEmpresaYSucursalYCondicion(?,?,?,?)',array($empresa_id,$sucursal_id, $lote_id, $condicion)))->toJson();
    }
    public function asiganarproductos( Request $request )
    {
        $productos=DB::select('CALL Sp_SeleccionarProductosPorEmpresaYSucursalYCondicion(?,?,?,?)',array($request->Empresa,$request->Sucursal, $request->Lote, $request->Condicion));
        //  return response()->json(['mensaje'=>$productos]);
        
        try {
            DB::beginTransaction();
                 foreach ($productos as $producto) {
                  $asignacion=new AsignarProductoEmpleado();
                 $asignacion->fecha=date('Y-m-d');
                  $asignacion->coteo=null;
                  $asignacion->diferencias=$producto->stock * -1;
                  $asignacion->producto_id=$producto->id;
                  $asignacion->user_id=$request->Usuarios;
                  $asignacion->sucursal_id=$request->Sucursal;
                  $asignacion->empresa_id=$request->Empresa;
                  $asignacion->lote_id=$request->Lote;
                  $asignacion->save();
                 }
            DB::commit();           
            return response()->json(['mensaje'=>'ok']);
            }
            catch (Exception $e) {
                DB::rollback();
                // "Mensaje"=> $ex->Message ()
                // return redirect()->route('producto.index');
                return response()->json(['mensaje' => $e->getMessage ()]);
            }
    }
    public function update(Request $request, producto $producto)
    {
        //
    }
    public function destroy(producto $producto)
    {
        //
    }
     public function importar(Request $request){
      try {
        $this->validate($request, [
            'documento' => 'required|file|mimes:xls,xlsx,csv'
        ]);

  	    $file = $request->file('documento');
          Excel::import(new ProductoImportar, $file);
      } catch (Exception $ex) {
       return dd($ex);
      }
      return redirect()->back();    
     }

}
