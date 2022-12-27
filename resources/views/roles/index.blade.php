@extends('layouts.app')
@section('cssdatatable')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
 @section('contenido') 
 <div class="content">
    <FONT COLOR="black">   <H6 class="fas fa-unlock-alt"> LISTA DE ROLES</H6></FONT><br>
    <div class="card"> 
     <span class="border-top border border-info"></span> 
     <div class="card-body">
       @if(session('alerta')) 
                <div class="alert alert-success" role="success">
                  {{session('alerta')}}        
                 </div>
                     @endif 
                    <div class=" col-12 text-right">
                      @can('rol_crear')
                        <a href="{{route('roles.create')}}" type="button" style="font-weight: 600;" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Añadir Nuevo Rol</a>
                      @endcan
                      </div>
            <div class="card"> 
                <div class="card-body">
                    <div class="row">
                                <div class=" table-responsive">
                                    <table id="example" class="table" class="table table-striped table-bordered " style="width:100%" >
                                        <thead class="table table-striped disabled">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Guard</th>
                                        
                                            <th>Fecha</th>
                                            <th>Permisos</th>
                                            <th class="text-center" style="width: 100px">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @forelse($rol  as $role)
                
                                            <tr>
                                              <th scope="row">{{$role->id}}</th>
                                                <td>{{$role->name}}</td>
                                                <td>{{$role->guard_name}}</td>
                                                
                                                <td class="text-primary">{{$role->created_at->toFormattedDateString()}}</td>
                                                <td style="width: 500px"> 
                                                    @forelse($role->permissions as $permission)
                                                        <span class="badge badge-info">{{$permission->name}}</span>
                                                    @empty
                                                        <span class="badge badge-danger">No hay permisos</span>
                                                    @endforelse
                                                </td>
                                                <td class="td-actions text-right">                                                 
                                                @can('rol_editar')
                                                    <a href="{{route('roles.edit',$role->id)}}"class="btn btn-warning btn-sm"style="display:inline-block;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>   
                                                       @endcan
                                                    @can('rol_eliminar')
                                                    {{-- <form action="{{route('roles.delete',$role->id)}}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit" rel="tooltip" >
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form> --}}
                                                <a href=""  data-target="#modal-delete-{{$role->id}}" data-toggle="modal" title="Eliminar"> <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>                        

                                                      @endcan
                                                </td>
                                            </tr>
                                            <div class="modal fade modal-slide-in-right" aria-hidden="true"
                                            role="dialog" tabindex="-1" id="modal-delete-{{$role->id}}">
                                            <form action="{{route('roles.delete',$role->id)}}" method="POST">
                                              @method('DELETE');
                                              @csrf
                                              <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"> <i class="fa fa-trash"></i>  Eliminar Rol</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <p>¿Estas seguro de eliminar el Rol: <b><font COLOR="black"> {{$role->name}}</font></b>?</p>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger">Sí, bórralo!</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </form>
                                            </div>
                                            @empty
                                            No hay permisos registrados
                                            @endforelse
                                        </tbody>
                                        <tfoot class="text-dark">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Guard</th>
                                        
                                            <th>Fecha</th>
                                            <th>Permisos</th>
                                            <th class="text-center">Acciones</th>
                                        </tfoot>
                                    </table>
                                </div>   
                            </div>
                            <div class="card-footer mr-auto">
                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @endsection
    @section('jsdatatable')
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    @endsection
    @section('script')
        <script>
          $(document).ready(function(){
            $('#example').DataTable({
                // "ajax": "{{route('users.index')}}",
                // "columns":[
                //     {data:'id'},
                //     {data:'name'},
                //     {data:'email'},
                //     {data:'username'},
                //     {data:'created_at'},
    
                // ]
                responsive: true,
                autoWidth:false,
              "language":{
                
                  "lengthMenu":"Mostrar _MENU_ registros",
                  "zeroRecords":"No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty":"Mostrando registros del 0 al 0  de un total de 0 registros",
                "infoFiltered":"(filtrado de un total de _MAX_ registros)",
                  "sSearch":"Buscar :",
                  "oPaginate":{
                      "sFirst":"Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious":"Anterior",
                  },
                  "sProcessing":"Procesando..."
              }
            });
          });
        </script>
    
    @endsection
    