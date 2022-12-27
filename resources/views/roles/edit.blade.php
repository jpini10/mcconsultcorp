@extends('layouts.app')
@section('contenido')
<div class="content">
    <div class="card card-chart border border border-info">
        <span class="border border border-info"></span> 
        <h5 class="card-header text-left btn-info disabled">Editar Rol</h5>
        <div class="card">
        <form action="{{route('roles.update',$role->id)}}" method="post" class="form-horizontal">
            @csrf
            @method('PUT')
     <div class="card-body">
        <div class="row">
          <div class="form-group col-md-6">
            <b for="inputEmail4"class="text-dark">Nombre del Rol</b>
                                <input type="text" class="form-control" name="name" placeholder="Ingrese Nombre" value="{{old('name',$role->name)}}" autofocus >                           
                                @if($errors-> has('name'))
                                <span class="error text-danger" for="input-username">{{$errors->first('name')}}</span>
                            @endif
                            </div>
                        
                            <div class="form-group col-md-6">
                                <b for="name" class=" col-sm-2 col-form-label text-dark">Permisos</b>
                              {{-- <div class="col-sm-7"> --}}
                                {{-- <div class="form-group"> --}}
                                    <div class="tab-content">
                                        <div class="tab-pane-active"id="profile">
                                            <table class="table">
                                                <tbody>
                                                @foreach($permissions as $id => $permission)
                                                    
                                              
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="permissions[]" 
                                                                value="{{$id}}"{{$role->permissions->contains($id)?'checked' : ''}}>
                                                           <span class="form-check-sign">
                                                               <span class="check"></span>
                                                           </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                     {{$permission}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                {{-- </div>
                            </div> --}}
                        {{-- </div>
                        </div> --}}
                       
                       
                       
                        </div>
                    </div>
                        {{-- <div class="card-footer ml-auto mr-auto"> --}}
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection