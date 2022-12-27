
                                @extends('layouts.app')
@section('contenido')
<div class="content">
    <FONT COLOR="black">   <H4 class="fas fa-key"> Agregar Permisos</H4></FONT><br>
    <div class="card">
        <span class="border-top border border-info"></span> 
        <form action="{{route('permissions.store')}}" method="post" class="form-horizontal">
            @csrf
     <div class="card-body">
        <div class="row">
          <div class="form-group col-md-6">
            <label for="inputEmail4"class="text-dark">Nombre del Permiso</label>
            <input type="text" class="form-control" name="name" placeholder="Ingrese Nombre del permiso" value="{{old('name')}}" autofocus >                           
            @if($errors-> has('name'))
            <span class="error text-danger" for="input-username">{{$errors->first('name')}}</span>
        @endif
                        </div>
                        </div>
                        {{-- <div class="card-footer ml-auto mr-auto"> --}}
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        {{-- </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection