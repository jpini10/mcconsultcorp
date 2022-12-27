 @extends('layouts.app')
@section('cssdatatable')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
@endsection
 @section('contenido') 
 <div class="content">
<form action="" name="formulario" id="formulario">
    <FONT COLOR="black">   <H6  class="fas fa-landmark"> LISTAR PRODUCTOS POR EMPLEADO:</H6></H6></FONT><br>
    @can('log_registro')
    <div class="card"> 
     <span class="border-top border border-info"></span> 
     {{-- <div class="card-body"> --}}
          <div class="card"> 
              <div class="row">
                <div class="col">
                    <b for="inputEmail4"class="text-dark">Empresa: </b>
                    <select  id="empresa" name="empresa" class="form-control form-select border border-top border-info" style="width: 100%;"name="empresas">
                       <option value="0" 
                                 disabled  selected>- Seleccione Empresa -
                                 </option>
                       @foreach ($empresas as  $item)
                       <option value="{{$item->id}}">{{$item->nombre}}</option>  
                       @endforeach                          
                     </select>
                     @error('categoria_id')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>
                     @enderror
               </div>
                <div class="col">
                      <b for="inputEmail4"class="text-dark">Sucursal: </b>
                      <select id="sucursal"  class="form-control form-select border border-top border-info" style="width: 100%;"name="empresas">
                     </select>
                      </div>
                      <div class="col-md-2">
                        <b for="inputEmail4"class="text-dark">Lote: </b>
                         <select id="lote"  class="form-control border border-top border-info" style="width: 100%;"name="lote">
                       </select>
                        </div>
                      <div class="col">
                        <b for="inputEmail4"class="text-dark">Empleado: </b>
                        <select id="usuarios" name="usuarios" class="form-control border border-top border-info" style="width: 100%;"name="empresas">
                         </select>
                   </div>
                   <br>
                   <div class="col">
                    <br>
                        <button style="font-weight: 600;"  type="button" id="listar" value="validar"  class="btn btn-primary center btn-sm"><i class="fas fa-arrow-down"></i> FILTRAR PRODUCTOS </button>
                   
                    </div>
                    
              </div>
              <br>
            </div>
        </div>
        <br>
            <div class="card">
                <span class="border-top border border-info"></span> 
                <div class="card-body">
                    
                  {{-- <button style="font-weight: 600;"  type="button" id="listar" value="validar"  class="btn btn-success center btn-sm"><i class="fas fa-arrow-down"></i> Listar Productos</button>
                  <button style="font-weight: 600;"  type="button" id="guardar" value="guardar"  class="btn btn-primary center  btn-sm"><i class="fas fa-save"></i> Asignar</button> --}}

                    <div class="row">
                        <div class=" table-responsive">
                            <table id="example" class="table" class="table table-striped table-bordered " style="width:100%" >
                                <thead class="table table-striped" style="background-color: #a2a5a4a6;">    
                                    <tr>                            
                                        {{-- <th>Item</th> --}}
                                        <th class="text-center">Codigo</th>
                                        <th>Material</th>                               
                                          <th>UM</th>                                    
                                        {{-- <th>Class Valor</th> --}}
                                        <th class="text-center">Ubicacion</th>
                                        <th>Almacen</th> 
                                        <th>Stock</th>
                                        <th>Conteo</th>
                                        <th>Diferencias</th>
                                        <th>estado</th>
                                        {{-- <th>& nbsp;</th> --}}
                                      <th>Acciones</th>
                                    </tr>
                                    </thead>
                                </table>
                              
                            </div>   
                        </div>                    
                    </div>
                </div>
            </div>@endcan
        </form>
    </div>
@endsection
@section('jsdatatable')
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.2/js/dataTables.scroller.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

@endsection
@section('jquery')
<script>
    var table;
    var entro= false;
    let temp = $("#btn1").clone();
$("#btn1").click(function(){
    $("#btn1").after(temp);
});
    setInterval( function () {
        console.log('entre timer');
        console.log(entro);
   if(table.data().count()>0 ){
       if(entro==false){
           table.ajax.reload();
            entro = true;
       }
    }
}, 3000 );
function inventariar(url){
    entro =  false;
    
    var url_show = '{{ route("asignacion.edit", ":id")}}';
                        url_show = url_show.replace(':id',url);
                        $(location).attr('href',url_show);
};
    $(document).ready(function () {
        $("#click").on("click", function(e){
 console.log("clic en nieto");
 });

entro =  false;
    // $('#example').DataTable().ajax.reload();

  table= $('#example').DataTable({
           responsive: true,
            autoWidth:false,
            orderCellsTop: true,
            fixedHeader: true,
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
          },

      
});
    
        function limpiarcombousucursal(){
    $('#sucursal').empty();
    $('#sucursal').append(`<option value="0" disabled selected>--Seleccionar Empleado--</option>`);
  }
                $('#empresa').on('change', function () {
                let id = $(this).val();
                limpiarcombousucursal();
                limpiarcombousuarios();
                limpiarcombolote();
                $('#sucursal').empty();
                $('#sucursal').append(`<option value="0" disabled selected>Procesando...</option>`);
                $.ajax({
                type: 'GET',
                url: 'obtenersucursales/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                console.log(response);   
                $('#sucursal').empty();
                $('#sucursal').append(`<option value="0" disabled selected>Seleccionar Sucursal</option>`);
                response.forEach(element => {
                    $('#sucursal').append(`<option value="${element['id']}">${element['nombre']}</option>`);
                    });
                }
            });
        });
    function limpiarcombousuarios(){
    $('#usuarios').empty();
    $('#usuarios').append(`<option value="0" disabled selected>--Seleccionar Empleado--</option>`);
  }
        $('#sucursal').on('change', function () {
            let id = $(this).val();
                let idEmpresa = $('#empresa').val();
                let idSucursal = $('#sucursal').val();

                // limpiarcombosucursal();
                limpiarcombolote();
                $('#lote').append(`<option value="0" disabled selected>Procesando...</option>`);
                $.ajax({
                type: 'GET',
                url: 'obtenerlotes/',
                success: function (response) {
                var response = JSON.parse(response);
                console.log(response);   
                $('#lote').empty();
                $('#lote').append(`<option value="0" disabled selected>Seleccionar lote</option>`);
                response.forEach(element => {
                    $('#lote').append(`<option value="${element['id']}">${element['lote']}</option>`);
                    });
                }
            });
        });
        function limpiarcombolote(){
    $('#lote').empty();
    $('#lote').append(`<option value="0" disabled selected>--Seleccionar lote--</option>`);
  }
  $('#lote').on('change', function () {
                let id = $(this).val();
                let idEmpresa = $('#empresa').val();
                let idSucursal = $('#sucursal').val();

                // limpiarcombosucursal();
                limpiarcombousuarios();
                $('#usuarios').append(`<option value="0" disabled selected>Procesando...</option>`);
                $.ajax({
                type: 'GET',
                url: 'obtenertodoslosusuarios/' + idEmpresa+'/'+idSucursal+'/'+id,
                success: function (response) {
                var response = JSON.parse(response);
                console.log(response);   
                $('#usuarios').empty();
                $('#usuarios').append(`<option value="0" disabled selected>Seleccionar usuarios</option>`);
                response.forEach(element => {
                    $('#usuarios').append(`<option value="${element['id']}">${element['name']}</option>`);
                    });
                      }
            });
        });
        
        $('#listar').click( function(){
    var empresa = document.getElementById('empresa');
	var sucursal = document.getElementById('sucursal');
    var usuarios = document.getElementById('usuarios');
    var lote = document.getElementById('lote');
	if (empresa.value==0|| empresa.value=="") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar una Empresa para continuar... ',
        	
          })
		}
		else if (sucursal.value==0|| sucursal.value=="") {
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar una Sucursal para continuar... ',
        	
          })
		}else if (lote.value==0|| lote.value=="") {
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar un Lote para continuar... ',
        	
          })
		}
        else if (usuarios.value==0|| usuarios.value=="") {
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar un Trabajador para continuar... ',
        	
          })
		}else	
        console.log(empresa.value,sucursal.value,lote.value,usuarios.value);
    var url_table = '{{ route("asignacion.getproductos1", array(":empresa_id",":sucursal_id",":lote_id",":user_id")) }}';
                        url_table = url_table.replace(':empresa_id', empresa.value );
                        url_table = url_table.replace(':sucursal_id',sucursal.value);
                        url_table = url_table.replace(':lote_id',lote.value);
                        url_table = url_table.replace(':user_id',usuarios.value);
                        
                    var AsignarProductoEmpleado;
                        // console.log(empresa.value,sucursal.value);
                            table = $('#example').DataTable({
                            destroy:true,
                            processing: true,
                            serverSide: true,
                            responsive: true,
                            autoWidth: false,
                            ajax: url_table,
                            columns: [
                                
                                // {
                                //     data: 'item',
                                //     className:"text-center",
                                //     name: 'item'
                                // },
                                {
                                    data: 'codigo',
                                    className:"text-center",
                                    name: 'codigo'
                                },
                                {
                                    data: 'material',
                                    className:"text-center",
                                    name: 'material'
                                },
                                {
                                    data: 'um',
                                    className:"text-center",
                                    name: 'um',
                                },
                                // {
                                //     data: 'clasvalor',
                                //     className:"text-center",
                                //     name: 'clasvalor'
                                // },
                                {
                                    data: 'ubicacion',
                                    className:"text-center",
                                    name: 'ubicacion'
                                },
                                {
                                    data: 'almacen',
                                    className:"text-center",
                                    name: 'almacen'
                                },
                                 {
                                    data: 'stock',
                                    className:"text-center",
                                    name: 'stock'
                                },
                                {
                                    data: 'coteo',
                                    className:"text-center",
                                    name: 'coteo'
                                },
                                {
                                    data: 'diferencias',
                                    className:"text-center",
                                    name: 'diferencias'
                                },
                                {
                                    data: 'estado',
                                    className:"text-center",
                                    name: 'estado',
                                    render: function (data, type, row) { 
                    if(data == 'CONCILIADO')
                    return `<h6><span class="badge badge-success">${data}</span></h6>`;          
                    if(data == 'PENDIENTE')
                    return `<h6><span class="badge badge-warning">${data}</span></h6>`; 
                    if(data == 'DIFERENCIA')
                    return `<h6><span class="badge badge-danger">${data}</span></h6>`; 
                  }
                    },
            //                         {
            //       data: 'EstadoAsignarCaso',
            //       className:"text-center",
            //       name: 'EstadoAsignarCaso',
            //       render: function (data, type, row) { 
            //         if(data == 'SIN DIAGNOSTICAR')
            //         return `<h6><span class="badge badge-danger">${data}</span></h6>`;          
            //         if(data == 'DIAGNOSTICADO')
            //         return `<h6><span class="badge badge-success">${data}</span></h6>`; 
            //       }
            //   },
                                { data: null,
                    className:"text-center",
                    name: 'id',
                    render: function (data) {
                         //Ruta Ver
                      

                        return "<a type='button' class='btn btn-success btn-sm' href='#' onclick='inventariar("+data.id+")' title='Editar'><i class='fas fa-edit'></i></a>";
                        entro = false;
                        
                    },
              }
                            ],
                            
                            select:true, 
                             //scroll con SCROLLER
                            // deferRender: true,
                            // scroller: true,
                            // scrollY: 300,
                            // scrollCollapse: true,
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
          },
          dom: "B<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
              "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
          buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel"></i>',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
                },
            
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		]	 
         });
        });
        
         @if (session('Actualizar')){
        Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Conteo Actualizado con exito.',
        showConfirmButton: false,
        timer: 1500
        })
    }  
    @endif
  
    //     $('#guardar').click( function(){
    // var empresa = document.getElementById('empresa');
	// var sucursal = document.getElementById('sucursal');
    // var empleado = document.getElementById('usuarios');
    // let filas = table.data().count();
    // // var nFilas = $("#example tr").length;
	// if (empresa.value==0|| empresa.value=="") {
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Error',
    //         text: 'seleccionar una Empresa para continuar',
        	
    //       })
	// 	}
	// 	else if (sucursal.value==0|| sucursal.value=="") {
    //         Swal.fire({
    //         icon: 'error',
    //         title: 'Error',
    //         text: 'seleccionar una Sucursal para continuar',
        	
    //       })
	// 	}else if (empleado.value==0|| empleado.value=="") {
    //         Swal.fire({
    //         icon: 'error',
    //         title: 'Error',
    //         text: 'seleccionar un Empleado para continuar',
    //      })
    //     }else if(filas==0) {
    //         // alert(filas + "numero de filas");
    //         alert("No Hay productos que mostrar");
    //     }else{
    //         $.ajax({                    
    //                 url: "{{ route('producto.asignarproductoempleado') }}",
    //                 data: { Empresa: empresa.value, Sucursal:sucursal.value, Usuarios:empleado.value },
    //                 type: "GET",
    //                 dataType: 'json',
    //                 success: function (data) {                       
    //                 Swal.fire({
    //         icon: 'success',
    //         title: 'Exito',
    //         text: 'Producto fue asignado correctamente',
        
    //       })                
    //                 },
    //                 error: function (data) {
    //                 }
    //                 });
    //     }  
    // });
    });
</script>
@endsection
