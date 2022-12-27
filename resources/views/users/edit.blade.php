@extends('layouts.app')
@section('contenido')
<div class="content">
    <div class="card card-chart border border border-info">
        <span class="border border border-info"></span> 
         <h5 class="card-header text-left btn-info disabled">Editar Usuario</h5>
          <div class="card">
        <form action="{{route('users.update',$user->id)}}" method="post" class="form-horizontal">
            @csrf
            @method('PUT')
     <div class="card-body">
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <b for="inputEmail4"class="text-dark">Nombre y Apellidos</b>       
                                <input type="text" onkeypress="return sololetras(event)" style = "text-transform:uppercase" class="form-control" name="name" value="{{old('name',$user->name)}}" autofocus>
                                @if($errors-> has('name'))
                                <span class="error text-danger" for="input-name">{{$errors->first('name')}}</span>
                            @endif
                            </div>
                        
                        <div class="form-group col-md-6">
                            <b for="inputPassword4" class="text-dark">Nombre de Usuario</b>
                           
                                   <input type="text" class="form-control" style = "text-transform:uppercase" name="username" value="{{old('username', $user->username)}}" >
                                   @if($errors-> has('username'))
                                   <span class="error text-danger" for="input-username">{{$errors->first('username')}}</span>
                               @endif
                                </div>
                           </div>
                           <div class="form-row">
                            <div class="form-group col-md-6">
                          <b for="inputAddress"class="text-dark">Email</b>
                           <input type="email" class="form-control" name="email" value="{{old('email',$user->email)}}" >
                                   @if($errors-> has('email'))
                                   <span class="error text-danger" for="input-email">{{$errors->first('email')}}</span>
                               @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <b for="inputAddress2"class="text-dark">Contraseña</b>
                                     <input type="password" class="form-control" name="password" >
                               </div>
                           </div>
                           <div class="row">
                            <b for="name" class=" col-sm-2 col-form-label text-dark">Permiso</b>
                          <div class="col-sm-7">
                            <div class="form-group">
                                <div class="tab-content">
                                    <div class="tab-pane-active"id="profile">
                                        <table class="table">
                                            <tbody>
                                                @foreach($roles as $id => $role)
                                                 <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="roles[]" 
                                                                value="{{$id}}"{{$user->roles->contains($id)?'checked' : ''}}>
                                                           <span class="form-check-sign">
                                                               <span class="check"></span>
                                                           </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                     {{$role}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                         </div>
                        </div>
                        <div class="col-md-12 text-center" id="guardar">
                            <div class="form-group"> 
                                  <button type="submit" id="submit" class="btn btn-primary"><i class='fas fa-save'></i> Guardar</button>
                                  <button type="reset" class="btn btn-danger"><i class='fas fa-ban'></i>Cancelar</button>
                           </div>
                          </div>
                    </div>
                </form>
            </div>
        </div>

@endsection
@section('jsdatatable')
<script src="/validaciones.js"></script>

@endsection