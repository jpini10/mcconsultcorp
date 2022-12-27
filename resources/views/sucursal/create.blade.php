@extends('layouts.app')
@section('cssdatatable')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection
@section('contenido')
<div class="content">
    <div class="card card-chart border border border-info">
        <span class="border border border-info"></span> 
         <h5 class="card-header text-left btn-info disabled">Crear Nueva Sucursal</h5>
          <div class="card">
        <form action="{{route('sucursal.store')}}" method="post" class="form-horizontal">
            @csrf
     <div class="card-body">
        <div class="row">
              
                     <div class="col">
                             <b for="inputEmail4"class="text-dark">Nombre</b>
                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre" value="{{old('nombre')}}" autofocus >
                                @if($errors-> has('nombre'))
                                    <span class="error text-danger" for="input-username">{{$errors->first('nombre')}}</span>
                                @endif
                        </div>
                        <div class="col">
                            <b for="inputEmail4"class="text-dark">empresa</b>
                              <select class="form-control text-info" style="width: 100%;"name="empresas">
                                  @foreach ($empresas as $id=> $empresa)
                                  <option value="{{$id}}">{{$empresa}}</option>  
                                  @endforeach                          
                                </select>
                                @error('categoria_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror

                           </div>
                      </div> 
                        <br>
                        </div>
                        </div>
                            {{-- <button type="submit" class="btn btn-primary">Guardar</button> --}}
                            <div class="col-md-12 text-center" id="guardar">
                                <div class="form-group"> 
                                      <button type="submit" id="submit" class="btn btn-primary"><i class='fas fa-save'></i> Guardar</button>
                                      <button type="reset" class="btn btn-danger"><i class='fas fa-ban'></i>Cancelar</button>
                               </div>
                              </div>
                        </div>
                          </div>
                          </div>
                    {{-- </div> --}}
                </form>
                
            </div>
            </div>
         </div>
    </div>
@endsection
@section('jsdatatable')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection