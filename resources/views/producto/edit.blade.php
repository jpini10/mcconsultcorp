 @extends('layouts.app')
@section('contenido')
<div class="content">
    <FONT COLOR="black">   <H4  class="fas fa-unlock-alt"> Editar Producto</H4></FONT><br>
    <div class="card">
        <span class="border-top border border-info"></span> 
        <form action="{{route('producto.update',$producto->id)}}" method="post" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                        <div class="col">
                            <label for="inputEmail4"class="text-dark">codigo</label>
                             <input type="text" class="form-control" name="Codigo" placeholder="Ingrese codigo" value="{{old('Codigo',$producto->Codigo)}}" autofocus >
                                 @if($errors-> has('Codigo'))
                                <span class="error text-danger" for="input-username">{{$errors->first('Codigo')}}</span>
                              @endif
                           
                            </div>
                             <div class="col">
                                     <label for="inputEmail4"class="text-dark">Nombre</label>
                                        <input type="text" class="form-control" name="Nombre" placeholder="Ingrese Nombre" value="{{old('Nombre',$producto->Nombre)}}" autofocus >
                                        @if($errors-> has('Nombre'))
                                            <span class="error text-danger" for="input-username">{{$errors->first('Nombre')}}</span>
                                        @endif
                                </div>
                               <div class="col">
                                    <label for="inputEmail4"class="text-dark">Categoria</label>
                                      <select class="form-control text-info" style="width: 100%;"name="categorias">
                                          @foreach ($categorias as $categoria)
                                          <option value="{{$categoria->id}}"
                                           @if($categoria->id==$producto->categoria_id)
                                           selected
                                           @endif>
                                            {{$categoria->nombre}}</option>  
                                          @endforeach                          
                                      </select>
        
                                   </div>
                              </div> 
                                <br>
                               
                                  <div class="row">
                                   <div class="col">
                                    <label for="inputEmail4"class="text-dark">Genero</label>
                                      <select class="form-control text-info" style="width: 100%;"name="generos">
                                          @foreach ($generos as $genero)
                                          <option value="{{$genero->id}}"
                                            @if($genero->id==$producto->genero_id)
                                            selected
                                            @endif>
                                             {{$genero->nombre}}</option>  
                                           @endforeach 
                                                              
                                      </select>
        
                                   </div>
                                    <div class="col">
                                    <label for="inputEmail4"class="text-dark">Marca</label>
                                      <select class="form-control text-info" style="width: 100%;"name="marcas">
                                          @foreach ($marcas as $marca)
                                          <option value="{{$marca->id}}"
                                            @if($marca->id==$producto->marca_id)
                                            selected
                                            @endif>
                                             {{$marca->nombre}}</option>  
                                           @endforeach             
                                      </select>
        
                                   </div>
                                   <div class="col">
                                    <label for="inputEmail4"class="text-dark">Color</label>
                                      <select class="form-control text-info" style="width: 100%;"name="colors">
                                          @foreach ($colors as  $colores)
                                      
                                          <option value="{{$colores->id}}"
                                            @if($colores->id==$producto->color_id)
                                            selected
                                            @endif>
                                             {{$colores->nombre}}</option>  
                                           @endforeach             
                                      </select>
        
                                   </div>
                                   <div class="col">
                                    <label for="inputEmail4"class="text-dark">Talla</label>
                                      <select class="form-control text-info" style="width: 100%;"name="tallas">
                                          @foreach ($tallas as $id=> $talla)
                                          
                                          <option value="{{$talla->id}}"
                                            @if($talla->id==$producto->talla_id)
                                            selected
                                            @endif>
                                             {{$talla->nombre}}</option>  
                                           @endforeach             
                                      </select>
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
                                            <input type="text" class="form-control" name="Pecio_Compra" value="{{old('Pecio_Compra',$producto->Pecio_Compra)}}"  placeholder="Ingrese Precio de compra">
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
                                                    <input type="text" class="form-control" name="Precio_Venta" value="{{old('Precio_Venta',$producto->Precio_Venta)}}"  placeholder="Ingrese precio de venta">
                                                  </div>
                                                  @if($errors-> has('Precio_Venta'))
                                                  <span class="error text-danger" for="input-username">{{$errors->first('Precio_Venta')}}</span>
                                                @endif
                                            </div>
                                            <div class="col">
                                                <label for="inputEmail4"class="text-dark">Stock</label>
                                                   <input type="number" class="form-control" name="stock" placeholder="Ingrese Stock" value="{{old('stock',$producto->stock)}}" autofocus >
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
            
        <script>
        $('.formulario-crear').submit(function(e){
            e.preventDefault();
        Swal.fire({
          title: '¿Estas Seguro?',
          text: "Este usuario se agregara definitivamente",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Agregar!',
            cancelButtonText: 'Cancelar',
        
        }).then((result) => {
          if (result.isConfirmed) {
            this.submit();
          }
        })
        });
        
        
        </script>
        @endsection