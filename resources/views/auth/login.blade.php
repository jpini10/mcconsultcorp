{{-- @extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('App')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3>{{ __('App Almacen') }} </h3>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Login') }}</strong></h4>
            <div class="social-line">
              <a href="#" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
          <div class="card-body">
            <p class="card-description text-center">{{ __('Enter your credential') }}</p>
  

            <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control" placeholder="{{ __('username...') }}" value="{{ old('username',null) }}" required autocomplete="username" autofocus>
                </div>
                @if ($errors->has('username'))
                  <div id="username-error" class="error text-danger pl-3" for="username" style="display: block;">
                    <strong>{{ $errors->first('username') }}</strong>
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
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Ingresar') }}</button>
          </div>
        </div>
      </form>
      <div class="row">
   
      </div>
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
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="1/images/img-01.png" alt="IMG">
				</div>
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf                   
					<span class="login100-form-title">
						Iniciar Sesión
					</span>
                   
					<div class="wrap-input100 validate-input" >
                   
                         <input class="input100" type="text" name="username" class="form-control" placeholder="{{ __('username...') }}" value="{{ old('username',null) }}" required autocomplete="username"  placeholder="Usuario" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        @if ($errors->has('username'))
              <div id="username-error" class="error text-danger pl-3" for="username" style="display: block;">
                <strong>{{ $errors->first('username') }}</strong>
              </div>
            @endif
					</div>
        

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
                    
						 <input class="input100" id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" placeholder="Contraseña" required autocomplete="current-password">
                         @if ($errors->has('password'))
                         <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                           <strong>{{ $errors->first('password') }}</strong>
                         </div>
                       @endif
                         <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span> 
                        @if ($errors->has('password'))
                        <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                          <strong>{{ $errors->first('password') }}</strong>
                        </div>
                      @endif
					</div>
					
					<div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Ingresar
                        </button>
					
					</div>

                </form>
			
			</div>

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