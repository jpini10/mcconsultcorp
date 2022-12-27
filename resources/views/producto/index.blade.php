 @extends('layouts.app')
@section('cssdatatable')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
 @section('contenido') 
 <div class="content">
    <style>.file-select {
        position: relative;
        display: inline-block;
      
      }
      
      .file-select::before {
        background-color: #f04400;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 3px;
        content: 'Seleccionar'; /* testo por defecto */
        position: absolute;
        left: 10%;
        right: 10%;
        top: 0;
        bottom: 0;
      
      }
      
      .file-select input[type="file"] {
        opacity: 0;
        width: 150px;
        height: 20px;
        display: inline-block;
        
      }
      
      #src-file1::before {
        content: 'SELECCIONAR ARCHIVO';
      }
    </style>
<form action="{{url('producto/importar')}}" method="post" enctype="multipart/form-data" name="formulario" id="formulario">
    @csrf
    <FONT COLOR="black">   <H6  class="fas fa-landmark"> ASIGNAR PRODUCTOS POR EMPLEADO:</H6></FONT><br>
    <div class="card"> 
     <span class="border-top border border-info"></span> 
     {{-- <div class="card-body"> --}}
            <div class="card"> 
              <div class="row">
                <div class="col">
                    <b for="inputEmail4"class="text-dark">Empresa</b>
                    <select id="empresa" name="empresa" class="form-control  border-info" style="width: 100%;"name="empresas">
                       <option value="0" 
                                 disabled  selected>- Seleccione Empresa -
                                 </option>
                       @foreach ($empresa as  $item)
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
                      <b for="inputEmail4"class="text-dark">Sucursal</b>
                      <select id="sucursal"  class="form-control border-info" style="width: 100%;"name="empresas">
                      
                      </select>
                      @error('categoria_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{$message}}</strong>
                      </span>
                      @enderror
                     
                      </div>
                       <div class="col">
                      <b for="inputEmail4"class="text-dark">Lote</b>
                       <select id="lote"  class="form-control border-info" style="width: 100%;"name="lote">
                     
                     </select>
                    
                     
                      </div>
                      <div class="col">
                        <b for="inputEmail4"class="text-dark">Empleado</b>
                        <select id="usuarios" name="usuarios" class="form-control border-info" style="width: 100%;"name="usuarios">
                        
                         </select>
                         
                   </div>
              </div>
                <div class="card-body">
                    <div class="row">
                       <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="condicion" id="radio1" value="N" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                         <b class="text-dark"> NUEVOS PRODUCTOS </b> 
                        </label>
                      </div>
                        </div>
                        <div class="col-md-2">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="condicion" id="radio2" value="R" >
                        <label class="form-check-label" for="flexRadioDefault2">
                       <B class="text-dark"> RECONTEO DE PRODUCTOS </B>  
                        </label>
                      </div>
                        </div>
                        {{-- <div class="col"> --}}
                        <button style="font-weight: 600;"  type="button" id="listar" value="validar"  class="btn btn-warning center btn-sm"><i class="fas fa-arrow-down"></i> LISTAR PRODUCTOS</button>
                        {{-- </div>  
                        <div class="col">  --}}
                        <button style="font-weight: 600;"  type="button" id="guardar" value="guardar"  class="btn btn-primary center  btn-sm"><i class="fas fa-save"></i> ASIGNAR PRODUCTOS</button>
                        {{-- <input  type="file" name="documento" aria-label="Archivo"> --}}
                        <div class="file-select" id="src-file1" >
                            <input  type="file" name="documento" aria-label="Archivo">
                          </div>
                        <button style="font-weight: 600;"  type="submit" id="guardar" value="guardar"  class="btn btn-success center  btn-sm"><i class="fas fa-file-excel"></i> CARGAR DATA</button>
                        
                    </div>
                </div>
</div>

</div>
</div>
<br>

<div class="card">
    <span class="border-top border border-info"></span> 
    <div class="card-body">
                    <div class="row">
                        <div class=" table-responsive">
                            <table id="example" class="table" class="table table-striped table-bordered " style="width:100%" >
                                <thead class="table table-striped" style="background-color: #a2a5a4a6;">    
                                    <tr>           
                                        <th>Item</th>
                                        <th class="text-center">Codigo</th>
                                        <th>Material</th>                              
                                        <th>UM</th>                                    
                                        <th class="text-center">Clas. Valor</th>
                                        <th>Lote</th>
                                        <th class="text-center">Almacen</th>
                                        <th>ubicacion</th>
                                        <th>Stock</th>
                                        <th>Empresa</th>
                                        <th>sucursal</th>
                                    </tr>  
                                        {{-- <th class="text-center">Acciones</th> --}}
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                    <tfoot class="text-dark">
                                      <th>Item</th>
                                        <th class="text-center">Codigo</th>
                                        <th>Material</th>                              
                                        <th>UM</th>                                    
                                        <th class="text-center">Clas. Valor</th>
                                        <th>Lote</th>
                                        <th class="text-center">Almacen</th>
                                        <th>ubicacion</th>
                                        <th>Stock</th>
                                        <th>Empresa</th>
                                        <th>Sucursal</th>
                                        {{-- <th class="text-center">Acciones</th> --}}
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
</form>
</div>
@endsection
@section('jsdatatable')
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
@section('jquery')
<script>
    var table;
    $(document).ready(function () {

       table= $('#example').DataTable({
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
        function limpiarcomboempresa(){
    $('#empresa').empty();
    $('#empresa').append(`<option value="0" disabled selected>--Seleccionar Empresa--</option>`);
  }
  function limpiarcombosucursal(){
    $('#sucursal').empty();
    $('#sucursal').append(`<option value="0" disabled selected>--Seleccionar Sucursal--</option>`);
  }
  function limpiarcombolote(){
    $('#lote').empty();
    $('#lote').append(`<option value="0" disabled selected>--Seleccionar lote--</option>`);
  }
  function limpiarcombousuarios(){
    $('#usuarios').empty();
    $('#usuarios').append(`<option value="0" disabled selected>--Seleccionar Empleado--</option>`);
  }
                $('#empresa').on('change', function () {
                let id = $(this).val();
                limpiarcombosucursal();
                 limpiarcombousuarios();
                 limpiarcombolote();
                $('#sucursal').append(`<option value="0" disabled selected>Procesando...</option>`);
                $.ajax({
                type: 'GET',
                url: 'obtenersucursal/' + id,
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

         $('#lote').on('change', function () {
                let id = $(this).val();
                let idEmpresa = $('#empresa').val();
                let idSucursal = $('#sucursal').val();

                // limpiarcombosucursal();
                limpiarcombousuarios();
                $('#usuarios').append(`<option value="0" disabled selected>Procesando...</option>`);
                $.ajax({
                type: 'GET',
                url: 'obtenerusuarios/' + idEmpresa+'/'+idSucursal+'/'+id,
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
    var condicion = document.getElementById('radio1').checked ? document.getElementById('radio1') : document.getElementById('radio2');
    var lote = document.getElementById('lote');
	if (empresa.value==0|| empresa.value=="") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar una Empresa para continuar',
        	
          })
			// alert("seleccionar  Empresa para continuar");
			// empresa.focus();
		}
		else if (sucursal.value==0|| sucursal.value=="") {
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar una Sucursal para continuar',
        	
          })
		}
        else if (lote.value==0|| lote.value=="") {
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar un lote para continuar',
        	
          })
		}else{
            console.log(empresa.value,sucursal.value,lote.value, condicion.value);
            var url_table = '{{ route("producto.getproductos", array(":empresa_id",":sucursal_id",":lote_id",":condicion")) }}';
                        url_table = url_table.replace(':empresa_id', empresa.value );
                        url_table = url_table.replace(':sucursal_id',sucursal.value);
                        url_table = url_table.replace(':lote_id',lote.value);
                        url_table = url_table.replace(':condicion',condicion.value);
                        // console.log(empresa.value,sucursal.value);
                            table = $('#example').DataTable({
                            destroy:true,
                            processing: true,
                            serverSide: true,
                            responsive: true,
                            autoWidth: false,
                            ajax: url_table,
                            columns: [
                                
                                {
                                    data: 'item',
                                    className:"text-center",
                                    name: 'item'
                                },
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
                                {
                                    data: 'clasvalor',
                                    className:"text-center",
                                    name: 'clasvalor'
                                },
                                {
                                    data: 'lote',
                                    className:"text-center",
                                    name: 'lote'
                                },
                                {
                                    data: 'almacen',
                                    className:"text-center",
                                    name: 'almacen'
                                },
                                {
                                    data: 'ubicacion',
                                    className:"text-center",
                                    name: 'ubicacion'
                                },
                                {
                                    data: 'stock',
                                    className:"text-center",
                                    name: 'stock'
                                },
                                {
                                    data: 'empresa',
                                    className:"text-center",
                                    name: 'empresa'
                                },
                                {
                                    data: 'sucursal',
                                    className:"text-center",
                                    name: 'sucursal'
                                }

                            ],
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
        
        }	
    });
  
        $('#guardar').click( function(){
    var empresa = document.getElementById('empresa');
	var sucursal = document.getElementById('sucursal');
    var empleado = document.getElementById('usuarios');
    var lote =document.getElementById('lote');
    let filas = table.data().count();
    // var nFilas = $("#example tr").length;
	if (empresa.value==0|| empresa.value=="") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar una Empresa para continuar',
        	
          })
		}
		else if (sucursal.value==0|| sucursal.value=="") {
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar una Sucursal para continuar',
        	
          })
		}
        else if (lote.value==0|| lote.value=="") {
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar un lote para continuar',
        	
          })
		}else if (empleado.value==0|| empleado.value=="") {
            Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'seleccionar un Empleado para continuar',
         })
        }else if(filas==0) {
            // alert(filas + "numero de filas");
            alert("No Hay productos que mostrar");
        }else{
            var condi = $('input[name="condicion"]:checked').val();
            $.ajax({                    
                    url: "{{ route('producto.asignarproductoempleado') }}",
                    data: { Empresa: empresa.value, Sucursal:sucursal.value,Lote:lote.value,Condicion:condi.toString(), Usuarios:empleado.value},
                    type: "GET",
                    dataType: 'json',
                    success: function (data) {     
                        console.log(data);                  
                        if (data.mensaje == 'ok') {
                            Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Producto asignado con exito.',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            setTimeout(function(){
                                let url_index = '{{ route("producto.index")}}';
                                $(location).attr('href',url_index);
                            },2000);                           
                        } else {
                            alertaError(data.mensaje);
                        } 
                           
        //             Swal.fire({
        //     icon: 'success',
        //     title: 'Exito',
        //     text: 'Producto fue asignado correctamente',
        
        //   })                
                    },
                    error: function (data) {
                    }
                    });
        }  
    });
    });
</script>
@endsection
