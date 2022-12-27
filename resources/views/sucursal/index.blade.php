 @extends('layouts.app')
@section('cssdatatable')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
 @section('contenido') 
 <div class="content">
    <FONT COLOR="black">   <H6  class="fas fa-shoe-prints">LISTA DE SUCURSALES</H6></FONT><br>
    <div class="card"> 
     <span class="border-top border border-info"></span> 
     <div class="card-body">
       @if(session('alerta')) 
                <div class="alert alert-success" role="success">
                  {{session('alerta')}}        
                 </div>
                     @endif 
                    <div class=" col-12 text-right">

                        <a href="{{route('sucursal.create')}}" type="button"  class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i>  <b>Añadir Nueva sucursal</b> </a>

                    </div>
            <div class="card"> 
                <div class="card-body">
                    <div class="row">
                        <div class=" table-responsive">
                            <table id="example" class="table" class="table table-striped table-bordered " style="width:100%" >
                                <thead class="table table-striped">  
                                  <th>ID</th>               
                                        <th class="text-center">Nombre de sucursal</th>
                                        <th class="text-center">Empresa</th>
                                       
                                        <th class="text-center">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @forelse($sucursal  as $sucursal)
                                        <tr>
                                           <th scope="row">{{$sucursal->id}}</th>
                                           <td class="text-center">{{$sucursal->nombre}}</td>
                                            <td class="text-center">{{$sucursal->empresa->nombre}}</td>
                                         
                                            <td class="td-actions text-center">
                                              {{-- <a href="{{route('sucursal.show',$sucursal->id)}}"><button class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button> </a> --}}

                                                <a href="{{route('sucursal.edit',$sucursal->id)}}"class="btn btn-warning btn-sm"style="display:inline-block;">   <i class="fas fa-edit"></i>
                                            <a href=""  data-target="#modal-delete-{{$sucursal->id}}" data-toggle="modal" title="Eliminar"> <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>                        
                                            </td>
                                        </tr>
                                        <div class="modal fade modal-slide-in-right" aria-hidden="true"
                                            role="dialog" tabindex="-1" id="modal-delete-{{$sucursal->id}}">
                                            <form action="{{route('sucursal.delete',$sucursal->id)}}" method="POST">
                                              @method('DELETE');
                                              @csrf
                                              <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"> <i class="fa fa-trash"></i>  Eliminar Permiso</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <p>¿Estas seguro de eliminar el Permiso: <b><font COLOR="black"> {{$sucursal->id}}</font></b>?</p>
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
                                     
                                        @endforelse
                                    </tbody>
                                    <tfoot class="text-dark">
                                      <th>ID</th>               
                                        <th class="text-center">Nombre de sucursal</th>
                                        <th class="text-center">Empresa</th>
                                  
                                        <th class="text-center">Acciones</th>
                                    </tfoot>
                                </table>
                            </div>   
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