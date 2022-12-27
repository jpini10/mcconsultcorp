@extends('layouts.app')
@section('contenido')
<div class="content">
<FONT COLOR="black">   <H4  class="fas fa-users"> vista detallada del Usuario</H4></FONT><br>
    <div class="card">
 <span class="border-top border border-info"></span>   
     <div class="card-body">
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="success">
              {{ session('success') }}
            </div>
            @endif
            <div class="row">
              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <a href="#" class="d-flex">
                          <img src="{{ asset('/img/2.jpg') }}" alt="image" class="img-circle profile_img">
                         
                        </a>
                      
                        <h6 class="title mx-2 text-dark text-center" >{{ $user->name }}</h6>
                        <p class="description text-dark">
                          Usuario: {{ $user->username }} <br>
                         Correo: {{ $user->email }} <br>
                         Fecha de Creacion: {{ $user->created_at }}
                        </p>
                      </div>
                    </p>
              
                  </div>
             
                      <a href="{{ route('users.index') }}" class="btn btn-sm btn-success"> Volver </a>
                    
                  
                </div>
              </div>
        
      
</div>
</div>
@endsection