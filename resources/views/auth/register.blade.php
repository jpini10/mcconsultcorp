{{-- @extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
            <div class="social-line">
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
          <div class="card-body ">
            <p class="card-description text-center">{{ __('Or Be Classical') }}</p>
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required autocomplete="name">
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">fingerprint</i></i>
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control" placeholder="{{ __('username...') }}" value="{{ old('username') }}" required autocomplete="username">
                </div>
                @if ($errors->has('username'))
                  <div id="name-error" class="error text-danger pl-3" for="username" style="display: block;">
                    <strong>{{ $errors->first('username') }}</strong>
                  </div>
                @endif
              </div>

            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required autocomplete="Email">
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required autocomplete="Password">
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required autocomplete="Password">
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>
            {{-- <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
              </label>
            </div> -
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Create account') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection --}}



<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
  <link rel="icon" type="image/png" href="1/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="1/vendor/animate/animate.css">
<!--===============================================================================================-->	
  <link rel="stylesheet" type="text/css" href="1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="1/css/util.css">
  <link rel="stylesheet" type="text/css" href="1/css/main.css">
    <link rel="stylesheet" href="/fontawesome-free-5.15.3-web/css/all.min.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="1/images/img-01.png" alt="IMG">
        </div>

    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                        @csrf
          <span class="login100-form-title">
            Registrar Usuario
          </span>
                   
            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                   
                         <input class="input100" id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre" autofocus>
                         @if ($errors->has('name'))
                         <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                           <strong>{{ $errors->first('name') }}</strong>
                         </div>
                       @endif
                         <span class="focus-input100"></span>
                   <span class="symbol-input100">
                   <i class="fas fa-user" aria-hidden="true"></i>
                   </span>
          </div>
          {{-- <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                   
            <input class="input100" id="apellido" type="apellido" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" placeholder="apellido" autofocus>
            @if ($errors->has('apellido'))
            <div id="name-error" class="error text-danger pl-3" for="apellido" style="display: block;">
              <strong>{{ $errors->first('apellido') }}</strong>
            </div>
          @endif
            <span class="focus-input100"></span>
      <span class="symbol-input100">
      <i class="fas fa-user" aria-hidden="true"></i>
      </span>
</div> --}}
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                   
           <input class="input100" type="text" name="username" class="form-control" placeholder="{{ __('username...') }}" value="{{ old('username') }}" required autocomplete="username">
           @if ($errors->has('username'))
           <div id="name-error" class="error text-danger pl-3" for="username" style="display: block;">
             <strong>{{ $errors->first('username') }}</strong>
           </div>
         @endif
           <span class="focus-input100"></span>
     <span class="symbol-input100">
     <i class="fas fa-user" aria-hidden="true"></i>
     </span>
</div>
         

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
         
                         <input class="input100" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo" autofocus>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-envelope" aria-hidden="true"></i>
            </span>
                        @if ($errors->has('email'))
                        <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                          <strong>{{ $errors->first('email') }}</strong>
                        </div>
                      @endif
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
             <input class="input100" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password"autofocus>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-lock" aria-hidden="true"></i>
            </span> 
                        @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Password is required">
     
             <input  class="input100" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
             @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
                         <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-lock" aria-hidden="true"></i>
            </span> 
          </div>
          <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Registrar
                        </button>
          
          </div>

                </form>
      
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->	
  <script src="1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="1/vendor/bootstrap/js/popper.js"></script>
  <script src="1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="1/vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="1/js/main.js"></script>

</body>
</html>