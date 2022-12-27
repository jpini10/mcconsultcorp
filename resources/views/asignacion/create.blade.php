@extends('layouts.app')
@section('cssdatatable')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection
@section('contenido')
<div class="content">
    <FONT COLOR="black">   <H4  class="fas fa-users"> Agregar Productos</H4></FONT><br>
    <div class="card">
        <span class="border-top border border-info"></span> 
        <form action="{{route('producto.store')}}" method="post" class="form-horizontal">
            @csrf
     <div class="card-body">
        <div class="row">
                <div class="col">
                    <label for="inputEmail4"class="text-dark">codigo</label>
                     <input type="text" class="form-control" name="Codigo" placeholder="Ingrese codigo" value="{{old('Codigo')}}" autofocus >
                         @if($errors-> has('Codigo'))
                        <span class="error text-danger" for="input-username">{{$errors->first('Codigo')}}</span>
                      @endif
                   
                    </div>
                     <div class="col">
                             <label for="inputEmail4"class="text-dark">Nombre</label>
                                <input type="text" class="form-control" name="Nombre" placeholder="Ingrese Nombre" value="{{old('Nombre')}}" autofocus >
                                @if($errors-> has('Nombre'))
                                    <span class="error text-danger" for="input-username">{{$errors->first('Nombre')}}</span>
                                @endif
                        </div>
                        <div class="col">
                            <label for="inputEmail4"class="text-dark">Categoria</label>
                              <select class="form-control text-info" style="width: 100%;"name="categorias">
                                  @foreach ($categorias as $id=> $categoria)
                                  <option value="{{$id}}">{{$categoria}}</option>  
                                  @endforeach                          
                              </select>

                           </div>
                      </div> 
                        <br>
                           <div class="row">
                           <div class="col">
                            <label for="inputEmail4"class="text-dark">Genero</label>
                              <select class="form-control text-info selectpicker" data-live-search="true" style="width: 100%;"name="generos">
                                  @foreach ($generos as $id=> $genero)
                                  <option value="{{$id}}">{{$genero}}</option>  
                                  @endforeach                          
                              </select>

                           </div>
                           <div class="col">
                            <label for="inputEmail4"class="text-dark">Marca</label>
                              <select class="form-control selectpicker" data-live-search="true" style="width: 100%;"name="marcas">
                                  @foreach ($marcas as $id=> $marca)
                                  <option value="{{$id}}">{{$marca}}</option>  
                                  @endforeach                          
                              </select>
                              @error('categoria_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{$message}}</strong>
                              </span>
                              @enderror

                           </div>
                           <div class="col">
                            <label for="inputEmail4"class="text-dark">Color</label>
                              <select class="form-control text-info" style="width: 100%;"name="colors">
                                  @foreach ($colors as $id=> $colores)
                                  <option value="{{$id}}">{{$colores}}</option>  
                                  @endforeach                          
                              </select>
                              @error('categoria_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{$message}}</strong>
                              </span>
                              @enderror

                           </div>
                           <div class="col">
                            <label for="inputEmail4"class="text-dark">Talla</label>
                              <select class="form-control text-info" style="width: 100%;"name="tallas">
                                  @foreach ($tallas as $id=> $talla)
                                  <option value="{{$id}}">{{$talla}}</option>  
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
                           <div class="row">
                            <div class="col">
                                <label for="inputEmail4"class="text-dark">Precion de Compra</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">S/.</div>
                                    </div>
                                    <input type="text" class="form-control" name="Pecio_Compra" value="{{old('Pecio_Compra')}}"  placeholder="Ingrese Precio de compra">
                                  </div>
                                  @if($errors-> has('Pecio_Compra'))
                                  <span class="error text-danger" for="input-username">{{$errors->first('Pecio_Compra')}}</span>
                                @endif
                                </div>
                                 <div class="col">
                                         <label for="inputEmail4"class="text-dark">Precio de Venta</label>
                                         <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                              <div class="input-group-text">S/.</div>
                                            </div>
                                            <input type="text" class="form-control" name="Precio_Venta" value="{{old('Precio_Venta')}}" placeholder="Ingrese precio de venta">
                                          </div>
                                          @if($errors-> has('Precio_Venta'))
                                          <span class="error text-danger" for="input-username">{{$errors->first('Precio_Venta')}}</span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="inputEmail4"class="text-dark">Stock</label>
                                           <input type="number" class="form-control" name="stock" placeholder="Ingrese Stock" value="{{old('stock')}}" autofocus >
                                           @if($errors-> has('stock'))
                                          <span class="error text-danger" for="input-username">{{$errors->first('stock')}}</span>
                                        @endif
                                   </div>
                        </div>
                        </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
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