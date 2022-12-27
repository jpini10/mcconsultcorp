 @extends('layouts.app')
@section('contenido')
<div class="content">
  <div class="card card-chart border border border-info">
    <span class="border border border-info"></span> 
     <h5 class="card-header text-left btn-info disabled">Editar sucursal</h5>
      <div class="card">
        <form action="{{route('sucursal.update',$sucursal->id)}}" method="post" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                   <div class="col">
                                     <b for="inputEmail4"class="text-dark">Nombre</b>
                                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" value="{{old('nombre',$sucursal->nombre)}}" autofocus >
                                        @if($errors-> has('nombre'))
                                            <span class="error text-danger" for="input-username">{{$errors->first('nombre')}}</span>
                                        @endif
                                </div>
                               <div class="col">
                                    <b for="inputEmail4"class="text-dark">Empresa</b>
                                      <select class="form-control text-info" style="width: 100%;"name="empresas">
                                          @foreach ($empresas as $empresa)
                                          <option value="{{$empresa->id}}"
                                           @if($empresa->id==$sucursal->empresa_id)
                                           selected
                                           @endif>
                                            {{$empresa->nombre}}</option>  
                                          @endforeach                          
                                      </select>
        
                                   </div>
                              </div> 
                                <br>
                              </div> 
                                </div>
                                <div class="col-md-12 text-center" id="guardar">
                                  <div class="form-group"> 
                                        <button type="submit" id="submit" class="btn btn-primary"><i class='fas fa-save'></i> Guardar</button>
                                        <button type="reset" class="btn btn-danger"><i class='fas fa-ban'></i>Cancelar</button>
                                 </div>
                                </div>
                                </div>
                                </div>
                        </form>
        @endsection