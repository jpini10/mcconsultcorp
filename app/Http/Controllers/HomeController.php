<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\categoria;
use App\Models\empresa;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $estatus=DB::select('SELECT   cast(((count(*) *100)/(SELECT COUNT(*) as total from asignar_producto_empleados))as decimal(12,2)) as cantidad,
        "CONCILIADO" AS descripcion  from asignar_producto_empleados a
        where  a.estado="CONCILIADO"
        UNION ALL
        SELECT  cast(((count(*) *100)/(SELECT COUNT(*) as total from asignar_producto_empleados))as decimal(12,2)) AS cantidad,
         "DIFERENCIA" AS descripcion FROM asignar_producto_empleados a where a.estado="DIFERENCIA"');

        $comprasmes=DB::select('SELECT b.name as nombre, COUNT(a.estado) as contar from asignar_producto_empleados a 
        inner join users b on a.user_id=b.id where a.estado<>"PENDIENTE" 
        GROUP by b.name order by b.name ASC limit 25');

         $resumentotal=DB::select('SELECT QUERY_FINAL.descripcion, QUERY_FINAL.cantidad, CAST(QUERY_FINAL.porcentaje AS DECIMAL(12,2)) AS porcentaje FROM (
            SELECT "CANTIDAD" AS descripcion, COUNT(*) as cantidad, ifnull( (COUNT(*) * 100) / COUNT(*),0) as porcentaje 
            from productos
            UNION ALL
            SELECT QUERY_SUBFINAL.descripcion, QUERY_SUBFINAL.cantidad, (QUERY_SUBFINAL.cantidad * 100) / total  AS porcentaje FROM (
                SELECT QUERY_RES.descripcion, QUERY_RES.cantidad,SUM(cantidad) over() total  FROM (
                    SELECT QUERY_BASE.descripcion, COUNT(*) AS cantidad FROM(
                        SELECT IF(APE.estado = "CONCILIADO","CONCILIADO",
                            IF(APE.estado = "PENDIENTE","PENDIENTE",
                            IF(APE.estado = "DIFERENCIA" AND APE.diferencias < 0,"FALTANTE","SOBRANTE"))) AS descripcion FROM asignar_producto_empleados AS APE
                            ) AS QUERY_BASE
                    GROUP BY QUERY_BASE.descripcion
                ) AS QUERY_RES
            ) AS QUERY_SUBFINAL
        ) AS QUERY_FINAL
        ORDER BY QUERY_FINAL.cantidad DESC, QUERY_FINAL.descripcion');   
        $totalProductos=DB::table('productos as p')
        ->select(DB::raw('count(*) as  p'))
       ->get();
       
       $productosconciliados=DB::table('productos as prod')
       ->select(DB::raw('count(*) as prod'))
       ->where('prod.condicion','=','C')
       ->get();
       $productosPendientes=DB::table('productos as prod')
       ->select(DB::raw('count(*) as prod'))
       ->where('prod.condicion','=','N')
       ->get();
       $productosDiferentes=DB::select('SELECT count(*)   as prod
        FROM asignar_producto_empleados a
       where a.estado="DIFERENCIA" AND A.diferencias<0');

            $productosSobrantes=DB::select('SELECT count(*)   as prod
            FROM asignar_producto_empleados a
            where a.estado="DIFERENCIA" AND A.diferencias>0');

        $totalusuarios=DB::table('users as usuarios')
        ->select(DB::raw('count(*) as  usuarios'))
        ->get();
        $asignacion=DB::select ( 'CALL obtenerProductosPorusuario(2) ');
        //$user = Auth::id();
        //return dd($user);
        return view('home',compact('asignacion','productosSobrantes','estatus','resumentotal','comprasmes','totalProductos','totalusuarios','productosPendientes','productosconciliados','productosDiferentes'));
     }
       public function obtenerpruductoasigandos(){
         $user = Auth::id();
      //  return dd($user);       
       //  $obtenerproducto =DB::select ( 'CALL obtenerProductosPorusuario(?) ',$user);
         return datatables()->of(DB::select ( 'CALL obtenerProductosPorusuario(?) ',array($user)))->toJson();;
         

 }
    
}
