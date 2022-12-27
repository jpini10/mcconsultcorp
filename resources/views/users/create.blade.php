@extends('layouts.app')
@section('contenido')
<div class="content">
    <div class="card card-chart border border border-info">
        <span class="border border border-info"></span> 
        <h5 class="card-header text-left btn-info disabled">Crear Nuevo Usuario</h5>
        <div class="card">
        <form action="{{route('users.store')}}" method="post" class="form-horizontal">
            @csrf
     <div class="card-body">
        <div class="form-row">
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <b for="inputEmail4"class="text-dark">Nombre y Apellidos</b>
                  <div class="input-group">
                    <input type="text"  class="form-control" style = "text-transform:uppercase" name="name" placeholder="Ingrese Nombre" value="{{old('name')}}" autofocus  >
                    @if($errors-> has('name'))
                    <span class="error text-danger" for="input-username">{{$errors->first('name')}}</span>
                    @endif
                    {{-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button" id="button-addon2"><i class="fas fa-search"></i></button>    --}}
                    
                </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                                <b for="inputPassword4"class="text-dark">Nombre de Usuario</b>
                               
                                   <input type="text"  class="form-control" style = "text-transform:uppercase" name="username" placeholder="Ingrese Nombre de Usuario" value="{{old('username')}}">
                                   @if($errors-> has('username'))
                                   <span class="error text-danger" for="input-username">{{$errors->first('username')}}</span>
                               @endif
                                </div>
                           </div>
                        
        <div class="form-row">
                            <div class="form-group col-md-6">
                          <b for="inputAddress"class="text-dark">Email</b>
                                   <input type="email" class="form-control" name="email" placeholder="Ingrese su correo" value="{{old('email')}}"  >
                                   @if($errors-> has('email'))
                                   <span class="error text-danger" for="input-email">{{$errors->first('email')}}</span>
                               @endif
                               
                           </div>
                           <div class="form-group col-md-6">
                            <b for="inputAddress2"class="text-dark">Contraseña</b>
                                   <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña" value="{{old('password')}}"   >
                                   @if($errors-> has('password'))
                                   <span class="error text-danger" for="input-password">{{$errors->first('password')}}</span>
                               @endif
                                
                           </div>
                        </div>
                        <div class="form-row">
                            <b for="name" class=" col-sm-2 col-form-label text-dark">Permisos</b>
                          <div class="col-sm-7">
                            <div class="form-group">
                                <div class="tab-content">
                                    <div class="tab-pane-active"id="profile">
                                        <table class="table ">                                           
                                            <tbody>                                             
                                                 @foreach($roles as $id => $role) 
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="roles[]" 
                                                                value="{{$id}}">
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
                            <div class="col-md-12 text-center" id="guardar">
                                <div class="form-group"> 
                                      <button type="submit" id="submit" class="btn btn-primary"><i class='fas fa-save'></i> Guardar</button>
                                      <button type="reset" class="btn btn-danger"><i class='fas fa-ban'></i>Cancelar</button>
                               </div>
                              </div>
                        </div>
                          </div>
                          </div>
                    </div>
                  
                </form>

              
@endsection

@section('jsdatatable')
<script src="/validaciones.js"></script>

@endsection