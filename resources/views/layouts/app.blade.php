<!doctype html>
<html lang="es">
<head>
  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/plantilla/images/favicon.ico" type="image/ico" />
    
        <title>:::Menu Principal:::</title>
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    @yield('cssdatatable')
      
    <!--datables CSS básico-->
    
        <!-- Bootstrap -->
        <link href="/plantilla/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/fontawesome-free-5.15.3-web/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
       
        <!-- Font Awesome -->
        <link href="/plantilla/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="/plantilla/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="/plantilla/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        
        <!-- bootstrap-progressbar -->
        <link href="/plantilla/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="/plantilla/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="/plantilla/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
        <!-- Custom Theme Style -->
        <link href="/plantilla/build/css/custom.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      </head>
    
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('home')}}"  class="site_title"><i class="fa fa-paw"></i> <span>App</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/plantilla/production/images/consultcorp.jpg" alt="..." href="{{route('home')}}" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
                <h2>@guest
                   
                @else
                <i class="fa fa-circle text-success text-xs"></i> 
                        {{ Auth::user()->name }}
                       
                @endguest</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3>General</h3>
                  
                   <ul class="nav side-menu">
                    @can('listar_mantenedores')
                    <li><a><i class="fas fa-dolly-flatbed"></i> TOMA DE INVENTARIOS <span class="fa fa-chevron-down"></span></a>
                      @endcan
                      
                     
                      <ul class="nav child_menu">
                        @can('listar_AsignarTarea')
                        <li><a href="{{route('producto.index')}}"><i class="fas fa-key"></i> ASIGNAR TAREA</a></li>
                        @endcan
                        @can('listar_mantenedores')
                        <li><a href="{{route('asignacion.index')}}"><i class="fas fa-key"></i> LISTAR TAREA</a></li>
                        @endcan
                      </ul>
                  </ul>
                  <ul class="nav side-menu">
                   
                    @can('listar_afijos')
                    <li><a><i class="fas fa-building"></i> TOMA DE INVENTARIOS DE ACTIVOS FIJOS <span class="fa fa-chevron-down"></span></a>
                      @endcan
                      {{-- <ul class="nav child_menu">
                        <li><a href="{{route('producto.index')}}"><i class="fas fa-key"></i> ASIGNAR TAREA</a></li>
                        <li><a href="{{route('asignacion.index')}}"><i class="fas fa-key"></i> LISTAR TAREA</a></li>
                      </ul> --}}
                  </ul>
                  <ul class="nav side-menu">
                    @can('listar_reportes')
                    <li><a><i class="fas fa-chart-area"></i> REPORTES <span class="fa fa-chevron-down"></span></a>
                      @endcan
                      {{-- <ul class="nav child_menu">
                        <li><a href="{{route('producto.index')}}"><i class="fas fa-key"></i> ASIGNAR TAREA</a></li>
                        <li><a href="{{route('asignacion.index')}}"><i class="fas fa-key"></i> LISTAR TAREA</a></li>
                      </ul> --}}
                  </ul>
                  <ul class="nav side-menu">
                    @can('listar_mantenedores')
                    <li><a><i class="fas fa-solid fa-door-open"></i> MANTENEDORES<span class="fa fa-chevron-down"></span></a>
                      @endcan
                      <ul class="nav child_menu">
                        <li><a href="{{route('empresa.index')}}"><i class="fas fa-door-open"></i> EMPRESA</a></li>
                        <li><a href="{{route('sucursal.index')}}"><i class="fas fa-unlock-alt"></i> SUCURSAL</a></li>
                       </ul>
                    </ul>
                  <ul class="nav side-menu">
                    @can('listar_config')
                    <li><a><i class="fas fa-cogs"></i> CONFIGURACION <span class="fa fa-chevron-down"></span></a>
                      @endcan
                      <ul class="nav child_menu">
                        @can('usuario_inicio')
                           <li><a href="{{route('users.index')}}"><i class="fas fa-users"></i> USUARIOS</a></li>
                        @endcan
                        @can('rol_inicio')
                           <li><a href="{{route('roles.index')}}"><i class="fas fa-unlock-alt"></i> ROLES</a></li>
                      @endcan  
                      {{-- @can('permiso_inicio')
                           <li><a href="{{route('permissions.index')}}"><i class="fas fa-key"></i> PERMISOS</a></li>
                      @endcan --}}
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /sidebar menu -->
  
              <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
                {{-- <a >
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a> --}}
              </div>
              <!-- /menu footer buttons -->
            </div>
          </div>
  
          <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
               
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <img src="/plantilla/production/images/consultcorp.jpg" alt="">
                                <i class="fa fa-circle text-success text-xs"></i> 
                              {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    
                                      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i>
                                        SALIR
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li role="presentation" class="nav-item dropdown open">
                            <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-envelope-o"></i>
                              <span class="badge bg-green">6</span>
                            </a>
                            <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <div class="text-center">
                                  <a class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                    </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
                        <div class="right_col" role="main">
                            <section class="content">
                             @yield('contenido')
                             

                    </section>
                </div>
        
                <footer>
                  <div class="pull-right">
                     <a href="https://www.facebook.com/profile.php?id=100003077195887">Jesus Pinegro</a>
                  </div>
                  <div class="clearfix"></div>
                </footer>
               
              </div>
            </div>
                     
                    <script src="/plantilla/vendors/jquery/dist/jquery.min.js"></script>
                    <script scr="/adminlte/plugins/jquery/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js"></script>
                
                    <!-- Bootstrap -->
                    <script src="/plantilla/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                    <!-- FastClick -->
                    <script src="/plantilla/vendors/fastclick/lib/fastclick.js"></script>
                    <!-- NProgress -->
                    <script src="/plantilla/vendors/nprogress/nprogress.js"></script>
                    <!-- Chart.js -->
                    {{-- <script src="/plantilla/vendors/Chart.js/dist/Chart.min.js"></script> --}}
                    <!-- gauge.js -->
                    <script src="/plantilla/vendors/gauge.js/dist/gauge.min.js"></script>
                    <!-- bootstrap-progressbar -->
                    <script src="/plantilla/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
                    <!-- iCheck -->
                    <script src="/plantilla/vendors/iCheck/icheck.min.js"></script>
                    <!-- Skycons -->
                    <script src="/plantilla/vendors/skycons/skycons.js"></script>
                    <!-- Flot -->
                    <script src="/plantilla/vendors/Flot/jquery.flot.js"></script>
                    <script src="/plantilla/vendors/Flot/jquery.flot.pie.js"></script>
                    <script src="/plantilla/vendors/Flot/jquery.flot.time.js"></script>
                    <script src="/plantilla/vendors/Flot/jquery.flot.stack.js"></script>
                    <script src="/plantilla/vendors/Flot/jquery.flot.resize.js"></script>
                    <!-- Flot plugins -->
                    <script src="/plantilla/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
                    <script src="/plantilla/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
                    <script src="/plantilla/vendors/flot.curvedlines/curvedLines.js"></script>
                    <!-- DateJS -->
                    <script src="/plantilla/vendors/DateJS/build/date.js"></script>
                    <!-- JQVMap -->
                    <script src="/plantilla/vendors/jqvmap/dist/jquery.vmap.js"></script>
                    <script src="/plantilla/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
                    <script src="/plantilla/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
                    <!-- bootstrap-daterangepicker -->
                    <script src="/plantilla/vendors/moment/min/moment.min.js"></script>
                    <script src="/plantilla/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
                    @yield('jsdatatable')
                    @yield('script')
                    @yield('jquery')

                    <!-- Custom Theme Scripts -->
                    <script src="/plantilla/build/js/custom.min.js"></script>
                        <!-- datatables JS -->
                     
</body>
</html>


