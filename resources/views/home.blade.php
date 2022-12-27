@extends('layouts.app')
@section('cssdatatable')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
@endsection
@section('contenido')
<div class="content">
@if(Auth::user()->id != 1)
<table id="t_asignacion" class="table" class="table table-striped table-bordered " style="width:100%" >
  <thead class="table table-striped btn-secondary disabled">                 
          <th class="text-center">Codigo</th>
          <th class="text-center">nombre</th>
          <th class="text-center">Almacen</th>
          <th class="text-center">UM</th>
          <th class="text-center">ubicacion</th>
          <th class="text-center">Accion</th>
      </thead>
      <tbody>
      </tbody>
      <tfoot class="text-dark">
        <th class="text-center">Codigo</th>
          <th class="text-center">nombre</th>
          <th class="text-center">Almacen</th>
          <th class="text-center">UM</th>
          <th class="text-center">ubicacion</th>
          <th class="text-center">Accion</th>
      </tfoot>
  </table>
@else



 
  {{-- @can('listar_tareausuario')  --}}

 

  {{-- @endcan --}}
  
  @can('listar_dashobard')
  <FONT COLOR="black">   <H6   class="fas fa-briefcase"><b> Panel Administrador</b></H6></FONT><br>
  <div class="card"> 
   <span class="border-top border border-info"></span> 
   <div class="card-body">
    <form>
      
      <div class="row">
        <div class="col">
          <div class="tile_count">
            @foreach($totalProductos as $cantidades)
                <div class="card-body pb-0 tile_stats_count bg-btn btn-dark">
                  <div class="float-right">
                    <br>
                   <i class="fas fa-dolly fa-4x"></i>
                 </div>
                  <span class="count_top write"><b> Productos</b></span>
                  <div class="count write text-center" >{{$cantidades->p}}</div>
               
                </div>
                  
                </div>
                @endforeach
              </div>
              
              <div class="col">
                <div class="tile_count">
                  @foreach($productosconciliados as $conciliados)
                  <div class="card-body pb-0 tile_stats_count bg-btn btn-success">
                        <div class="float-right">
                          <br>
                              <i class="fas fa-handshake-alt-slash fa-4x"></i>
                        </div>
                    <span class="count_top write"><b>Conciliados</b></span>
                    <div class="count write float-rigth text-center">{{$conciliados->prod}}
                    </div>
                 
                  </div> 
                  @endforeach        
            </div>
              </div>
              <div class="col">
                <div class="tile_count">
                  @foreach($productosPendientes as $pendientes)
                      <div class="card-body pb-0 tile_stats_count bg-btn btn-dark">
                        <div class="float-right">
                          <br>
                         <i class="fas fa-clipboard-list fa-4x"></i>
                       </div>
                        <span class="count_top write"><b>Pendientes</b></span>
                        <div class="count write text-center">{{$pendientes->prod}}</div>
                       
                      </div>
                        </div>
                        @endforeach
                      </div>
                      <div class="col">
                        <div class="tile_count">
                          @foreach($productosDiferentes as $diferencia)
                              <div class="card-body pb-0 tile_stats_count bg-btn btn-success">
                                <div class="float-right">
                                  <br>
                                 <i class="fas fa-clipboard-list fa-4x"></i>
                               </div>
                                <span class="count_top write"><b> Faltantes</b></span>
                                <div class="count write text-center">{{$diferencia->prod}}</div>
                               
                              </div>
                                </div>
                                @endforeach
                              </div>
                            <div class="col">
                                <div class="tile_count">
                                  @foreach($productosSobrantes as $sobrantes)
                                      <div class="card-body pb-0 tile_stats_count bg-btn btn-dark">
                                        <div class="float-right">
                                          <br>
                                         <i class="fas fa-clipboard-list fa-4x"></i>
                                       </div>
                                        <span class="count_top write"><b> Sobrantes</b></span>
                                        <div class="count write text-center">{{$sobrantes->prod}}</div>
                                      </div>
                                        </div>
                                        @endforeach
                                 </div>    

                    </div>
                    <div class="col-md-6">
                      <div class="card card-chart">
                          <div class="card header">
                          <h4 class="card-header text-center"><b> Resumen Total</b></h4>
                          </div>
                          <div class="content">
                            <div class="ct-chart">
                              <canvas id="resumentotal" style="max-height: 400px; height: 400px"></canvas>
                              {{-- <canvas id="ventas"></canvas> --}}
                            </div>
                          </div>
                        </div>
                </div>
                    <div class="col-md-6">
                      <div class="card card-chart">
                          <div class="card header">
                          <h4 class="card-header text-center"><b> Estatus de conciliación</b></h4>
                          </div>
                          <div class="content">
                            <div class="ct-chart">
                              <canvas id="estatus" style="max-height: 250px; height: 300px"></canvas>
                              {{-- <canvas id="ventas"></canvas> --}}
                            </div>
                          </div>
                        </div>
                </div>
            </div>
          </form>
       </div>@endif
      </div> 
      <br>
          <div class="card card-chart">
            <span class="border-top border border-info"></span> 
            <div class="card header">
            <h4 class="card-header text-center"><b> Avance - Por - Usuario</b></h4>
            </div>
            <div class="content">
              <div class="ct-chart">
                <canvas id="avanceUsuario"></canvas>
                {{-- <canvas id="compras"></canvas> --}}
              </div>
            </div>
          </div>
         
</div>
@endcan
@endsection  
@section('jsdatatable')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js" integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
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

<script>
function inventariar(url){
   
    var url_show = '{{ route("asignacion.edit", ":id")}}';
                        url_show = url_show.replace(':id',url);
                        $(location).attr('href',url_show);
};

$(document).ready(function() {
      var table = $('#t_asignacion').DataTable({
          processing: true,
          serverSide: true,
          responsive: true,
          autoWidth: false,
          ajax: "{{ route('listarproductoususario.usuario') }}",
          columns: [{
                  data: 'codigo',
                  className:"text-center",
                  name: 'codigo'
              },
              {
                  data: 'nombre',
                  className:"text-center",
                  name: 'nombre'
              },
              {
                  data: 'almacen',
                  className:"text-center",
                  name: 'almacen'
              },
              {
                  data: 'unidadmedida',
                  className:"text-center",
                  name: 'unidadmedida'
              },
              {
                  data: 'ubicacion',
                  className:"text-center",
                  name: 'ubicacion'
              },
              { data: null,
                    className:"text-center",
                    name: 'id',
                    render: function (data) {
                         //Ruta Ver
                      

                        return "<a type='button' class='btn btn-primary btn-sm' href='#' onclick='inventariar("+data.id+")' title='Editar'><i class='fas fa-edit'></i></a>";
                        entro = false;
                        
                    },
                    
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
        },
      });
  
  });






var ctx = document.getElementById('estatus').getContext('2d');
let labels = [<?php foreach($estatus as $reg)
        {
          $prueba=$reg->descripcion;
          echo '"'. $prueba.'",';}?>];
let colorHex = ['#43AA8B', '#253D5B'];
//let colorHex = ['#FB3640', '#EFCA08', '#43AA8B', '#253D5B'];
let myChart = new Chart(ctx, {
  plugins: [ChartDataLabels],
  type: 'pie',
  data: {
    datasets: [{
      label: 'Avance',
            data: [<?php foreach($estatus as $reg)
            {echo''.$reg->cantidad.',';}?>],
      backgroundColor: colorHex
    }],
    labels: labels
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom'
    },
    plugins: {
      datalabels: {
        color: '#fff',
        anchor: 'end',
        align: 'start',
        offset: -10,
        borderWidth: 0,
        borderColor: '#fff',
        borderRadius: 5,
        backgroundColor: (context) => {
          return context.dataset.backgroundColor;
        },
        font: {
          weight: 'bold',
          size: '10'
        },
        formatter: (dato) => dato + "%",
       font: {
         weight: 'bold',
         size: '16'
       },
      }
    }
  }
});

var varCompra = document.getElementById('avanceUsuario').getContext('2d');
  var CharCompra = new Chart(varCompra, {
    plugins: [ChartDataLabels],
    type: 'bar',
    data: {
        labels: [<?php foreach($comprasmes as $reg)
        {
          $prueba=$reg->nombre;
         // setlocale(LC_TIME, 'es_ES','Spanish_Spain','Spanish');
        //  $mestraducido=strftime('%B',strtotime($reg->nombre));
          echo '"'. $prueba.'",';}?>],
        datasets: [{
            label: 'Avance',
            data: [<?php foreach($comprasmes as $reg)
            {echo''.$reg->contar.',';}?>],
            backgroundColor: [
              'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)'
                
            ],
            borderColor: [
              'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)'
            ],
            borderWidth: 3
        }]
    },
    options:{
      responsive:true,
        scales:{
          yAxes:[{
            ticks:{
              beginAtZero:true
            }
          }]
        },
        legend: {
      position: 'bottom'
    },
    plugins: {
      datalabels: {
        color: '#fff',
        anchor: 'end',
        align: 'start',
        offset: -10,
        borderWidth: 0,
        borderColor: '#fff',
        borderRadius: 5,
        backgroundColor: (context) => {
          return context.dataset.backgroundColor;
        },
        font: {
          weight: 'bold',
          size: '10'
        },
       font: {
         weight: 'bold',
         size: '16'
       },
      }
    }
      }
});
var varCompra = document.getElementById('resumentotal').getContext('2d');
  var CharCompra = new Chart(varCompra, {
    plugins: [ChartDataLabels],
    type: 'bar',
    data: {
        labels: [<?php foreach($resumentotal as $reg)
        {
          $prueba=$reg->descripcion;
         // setlocale(LC_TIME, 'es_ES','Spanish_Spain','Spanish');
        //  $mestraducido=strftime('%B',strtotime($reg->nombre));
          echo '"'. $prueba.'",' ;}?>],
        datasets: [{
            label: 'Registros',
            data: [<?php foreach($resumentotal as $reg)
            {echo''.$reg->porcentaje.',';}?>],
           
            backgroundColor: [
              'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)'
                
            ],
            borderColor: [
              'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)',
                'rgba(38, 74, 83, 1)',
                 'rgba(1, 159, 118,1)'
            ],
            borderWidth: 3
        }]
    },
    options: {
    tooltips: false,
    plugins: {
		datalabels: {
       anchor: 'end',
       backgroundColor: function(context) {
         return context.dataset.backgroundColor;
       },
       borderColor: 'white',
       borderRadius: 5,
       borderWidth: 0,
       color: 'white',
       display: function(context) {
         var dataset = context.dataset;
         var count = dataset.data.length;
         var value = dataset.data[context.dataIndex];
         return value;// > count * 1.5;
        },
       formatter: (dato) => dato + "%",
       font: {
         weight: 'bold',
         size: '16'
       },
      }
    },
  },

  scales: {
    xAxes: [{
      stacked: true
    }],
    yAxes: [{
      stacked: true
    }]
  }
});

</script>
@endsection
