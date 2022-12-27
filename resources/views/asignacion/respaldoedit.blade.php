@extends('layouts.app')
@section('contenido')
<div class="content">
  <div class="card card-chart border border border-info">
    <span class="border border border-info"></span> 
     <h5 class="card-header text-left btn-info disabled">Editar Conteo</h5>
      <div class="card">
        <form action="{{route('asignacion.update',$asignacion->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                            <div class="col-lg-1">
                                  <div class="form-group">
                                        <b for="cliente_id" class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Item: </font></font></b>
                                     <br>   <label for="" class="font-weight-normal text-dark"> {{$producto->item}}</label>                 
                                       </div>                                
                            </div>
                            <div class="col-lg-2">
                                  <div class="form-group">
                                        <b for="cliente_id" class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo: </font></font></b>
                                        <br> <label for="" class="font-weight-normal text-dark"> {{$producto->codigo}}</label>                 
                                       </div>                                
                              </div>
                              <div class="col-lg-4">
                                    <div class="form-group">
                                          <b for="cliente_id" class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Material: </font></font></b>
                                          <label for="" class="font-weight-normal text-dark"> {{$producto->material}}</label>                 
                                         </div>                                
                                </div>
                                <div class="col-lg-3 left">
                                  <div class="form-group">
                                        <b for="cliente_id" class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Almacen: </font></font></b>
                                      <br>  <label for="" class="font-weight-normal text-dark"> {{$producto->almacen}}</label>                 
                                       </div>                                
                              </div>
                           
                              <div class="col-lg-2">
                                <div class="form-group">
                                      <b for="cliente_id" class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ubicacion: </font></font></b>
                                     <br> <label for="" class="font-weight-normal text-dark"> {{$producto->ubicacion}}</label>                 
                                     </div>                                
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-lg-1 left">
                              <div class="form-group">
                                    <b for="cliente_id" class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UM: </font></font></b>
                                    <br> <label for="" class="font-weight-normal text-dark"> {{$producto->um}}</label>                 
                                   </div>                                
                          </div>
                          
                        <div class="col-lg-2 left">
                          <div class="form-group">
                                <b for="cliente_id" class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado: </font></font></b>
                                <br> <label for="" class="font-weight-normal text-dark"> {{$asignacion->estado}}</label>                 
                               </div>                                
                      </div>
                          <div class="col-lg-4 left">
                            <div class="form-group">
                                  <b for="cliente_id" class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descripcion: </font></font></b>
                                  <br> <label for="" class="font-weight-normal text-dark"> {{$asignacion->descripcion}}</label>                 
                                 </div>                                
                        </div>
                            <div class="col-lg-3 left">
                              <div class="form-group">
                                    <b for="cliente_id" class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Stock: </font></font></b>
                                    <br>
                                     {{-- <label for="" id="stock" class="font-weight-normal text-dark"> {{$producto->stock}}</label>                  --}}
                                    <input id="stock" name="stock" type="number" oninput="calcular()"  class="form-control text-dark"onpaste="return false"autofocus autocomplete="off" value="{{old('stock',$producto->stock)}}" disabled="disabled">  
                                  </div>                                
                          </div>
                          <div class="col-lg-2 left">
                            <div class="form-group">
                                  <b for="cliente_id" class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Conteo: </font></font></b>
                                  {{-- <input id="conteo" onkeypress="return solonumeros(event)" name="conteo" type="text" class="form-control text-dark"onpaste="return false" name="nombre" {{$asignacion->coteo}} autofocus autocomplete="off" >                            --}}
                                  <input id="coteo" name="coteo" type="number" oninput="calcular()" class="form-control text-dark" onpaste="return false" autofocus autocomplete="off" value="{{old('coteo',$asignacion->coteo)}}">  
                                </div>                                
                        </div>
                        <br>
                          </div>
                          <div class="row">
                          <div class="col-lg-2 left">
                            <div class="form-group">
                                  <b for="cliente_id"class="text-dark"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Diferencia: </font></font></b>
                                  <br>
                                  {{-- <label for="" id="diferencia" class="font-weight-normal text-dark"> {{$asignacion->diferencias}}</label>                  --}}
                                  <input id="diferencias" name="diferencias" type="number" oninput="calcular()" class="form-control text-dark"onpaste="return false" autofocus autocomplete="off"value="{{old('diferencias',$asignacion->diferencias)}}">   
                                </div>                                
                        </div>

                </div>
                </div>
            
              <div class="col-md-12 text-center">
                <div class="form-group"> 
                  <button type="submit" class="btn btn-primary"><i class='fas fa-save'></i>Guardar</button>
                  <button type="reset" class="btn btn-danger"><i class='fas fa-ban'></i>Cancelar</button>

                </div>
              </div>
            </div>
          </form>
          </div>
    </div> 
   @endsection
   
        @section('jquery')       
         <script>
    function calcular(){
		try{
			var a= parseFloat(document.getElementById("stock").value)||0,
			b= parseFloat(document.getElementById("coteo").value)||0;
			document.getElementById("diferencias").value=b-a;
		}catch(e){}
	}</script>
      @endsection