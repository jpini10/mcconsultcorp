     @extends('layouts.app')
                    @section('contenido')
                    <div class="content">
                        <div class="card card-chart border border border-info">
                        <span class="border border border-info"></span> 
                         <h5 class="card-header text-left btn-info disabled">Editar Empresa</h5>
                          <div class="card">
                            <form action="{{route('empresa.update',$empresa->id)}}" method="post" class="form-horizontal">
                                @csrf
                                @method('PUT')
                         <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6">
                                <b for="inputEmail4"class="text-dark">Nombre de la Empresa</b>
                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" value="{{old('nombre',$empresa->nombre)}}" autofocus >                           
                                @if($errors-> has('nombre'))
                                <span class="error text-danger" for="input-username">{{$errors->first('nombre')}}</span>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group"> 
                                  <button type="submit" id="submit" class="btn btn-primary"><i class='fas fa-save'></i> Guardar</button>
                                  <button type="reset" class="btn btn-danger"><i class='fas fa-ban'></i>Cancelar</button>
                           </div>
                          </div>                          </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection