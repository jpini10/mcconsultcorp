
                    @extends('layouts.app')
                    @section('contenido')
                    <div class="content">
                        <FONT COLOR="black">   <H4  class="fas fa-key"> Editar Permisos</H4></FONT><br>
                        <div class="card">
                            <span class="border-top border border-info"></span> 
                            <form action="{{route('permissions.update',$permission->id)}}" method="post" class="form-horizontal">
                                @csrf
                                @method('PUT')
                         <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6">
                                <label for="inputEmail4"class="text-dark">Nombre del Permiso</label>
                    {{-- <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Permisos</h4>
                            <p class="card-category">Editar datos</p>
                        </div>
                        <div class="card-body">
                        <div class="row">
                         <label for="name" class=" col-sm-2 col-form-label">Nombre del Permiso</label>
                            <div class="col-sm-7"> --}}
                                <input type="text" class="form-control" name="name" placeholder="Ingrese Nombre" value="{{old('name',$permission->name)}}" autofocus >                           
                            </div>
                        </div>
                        {{-- </div>
                        <div class="card-footer ml-auto mr-auto"> --}}
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection