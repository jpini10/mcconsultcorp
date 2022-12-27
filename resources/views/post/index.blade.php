@extends('layouts.app')
@section('cssdatatable')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
 @section('contenido') 
 <div class="content">
    <FONT COLOR="black">   <H4 class="fas fa-unlock-alt"> lista  de Roles</H4></FONT><br>
    <div class="card"> 
     <span class="border-top border border-primary"></span> 
     <div class="card-body">
       @if(session('alerta')) 
                <div class="alert alert-success" role="success">
                  {{session('alerta')}}        
                 </div>
                     @endif 
                    <div class=" col-12 text-right">
                      @can('rol_crear')
                        <a href="#" type="button"  class="btn btn-primary btn-sm">Añadir Nuevo Rol</a>
                      @endcan
                      </div>
            <div class="card"> 
                <div class="card-body">
                    <div class="row">
                                </div>
                            </div>
                            <div class=" table-responsive">




@endsection