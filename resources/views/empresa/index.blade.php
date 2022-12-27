@extends('layouts.app')
@section('cssdatatable')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('css/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
@endsection
 @section('contenido') 
 <div class="content">
    <FONT COLOR="black">   <H6 class="fas fa-laptop-house"> LISTA DE EMPRESAS</H6></FONT><br>
    <div class="card"> 
     <span class="border-top border border-info"></span> 
     <div class="card-body">
                    <div class=" col-12 text-right">
                        @can('permiso_inicio')
                         <a href="{{route('empresa.create')}}" type="button"  class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i><b> Añadir Nueva Empresa</b></a>
                        
                         @endcan
                    </div>
            <div class="card"> 
                <div class="card-body">
                    <div class="row">
                        <div class=" table-responsive">
                            <table id="example" class="table" class="table table-striped table-bordered " style="width:100%" >
                                <thead class="table table-striped btn-secondary disabled">                 
                                        <th class="text-center">id</th>
                                        <th class="text-center">nombre</th>
                                        
                                        <th class="text-center">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @forelse($empresa  as $empresa)
            
                                        <tr>
                                       
                                          <th class="text-center" scope="row">{{$empresa->id}}</th>
                                            <td class="text-center">{{$empresa->nombre}}</td>
                                            
                                            <td class="td-actions text-center">
                                   
                                                <a href="{{route('empresa.edit',$empresa->id)}}"class="btn btn-warning btn-sm"style="display:inline-block;"> <i class="fas fa-edit"></i></a>
                                            <a href=""  data-target="#modal-delete-{{$empresa->id}}" data-toggle="modal" title="Eliminar"> <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>                        
                                            </td>
                                        </tr>
                                        <div class="modal fade modal-slide-in-right" aria-hidden="true"
                                            role="dialog" tabindex="-1" id="modal-delete-{{$empresa->id}}">
                                            <form action="{{route('empresa.delete',$empresa->id)}}" method="POST">
                                              @method('DELETE');
                                              @csrf
                                              <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"> <i class="fa fa-trash"></i>  Eliminar empresa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <p>¿Estas seguro de eliminar la empresa: <b><font COLOR="black"> {{$empresa->nombre}}</font></b>?</p>
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
                                        {{-- No hay permisos registrados --}}
                                        @endforelse
                                    </tbody>
                                    <tfoot class="text-dark">
                                        <th class="text-center">id</th>
                                        <th class="text-center">nombre</th>
                                        
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
<script src="{{ asset('js/Lobibox.js') }}"></script>
<script src="{{ asset('js/notification-active.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
@endsection
@section('script')
    <script>
      $(document).ready(function(){
        $('#example').DataTable({
            responsive: true,
            autoWidth:false,
            select:true,  
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
      @if (session('Actualizar')){
        Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: '¡Empresa Añadida Con exito!.',
        showConfirmButton: false,
        timer: 1500
        })
    }  
    @endif
   </script>
   @if (session('eliminar'))
   <script type="text/javascript">
   
       Lobibox.notify('success', {
           width: 300,
           position: 'top right',
           delay: 1500,
           title: 'Felicitaciones !!',
           msg: 'Modelo Eliminad0.'
        });
   
   </script>
   @endif
   @if (session('añadir'))
   <script type="text/javascript">
   
       Lobibox.notify('success', {
           width: 300,
           sound: true,
           delay: 1500,
           position: 'top right',
           title: 'Felicitaciones !!',
           msg: 'Modelo añadido satisfactoriamente'
        });
   
   </script>
   @endif
   @if (session('modificar'))
   <script type="text/javascript">
   
       Lobibox.notify('success', {
           width: 300,
           position: 'top right',
           delay: 1500,
           title: 'Felicitaciones !!',
           msg: 'Modelo modificado satisfactoriamente'
        });
   
   </script>
   @endif
   
@endsection