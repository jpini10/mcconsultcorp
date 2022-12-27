<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material/img/laravel.svg') }}"></i>
          <p>Configuracion
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
          @can('user_index')
            <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('users.index')}}">
                <i class="material-icons">content_paste</i>
                  <p>Usuarios</p>
              </a>
            </li>
            @endcan
            @can('permission_index')
            <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('permissions.index')}}">
                <i class="material-icons">bubble_chart</i>
                <p>Permisos</p>
              </a>
            </li>
            @endcan
            @can('role_index')
            <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
              <a class="nav-link" href="{{route('roles.index')}}">
                <i class="material-icons">location_ons</i>
                  <p>Roles</p>
              </a>
            </li>
            @endcan
          </ul>
        </div>
      </li>
       @can('post_inicio')
      <li class="nav-item{{ $activePage == 'post' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('post.index')}}">
          <i class="material-icons">notifications</i>
          <p>post</p>
        </a>
      </li>
       <li class="nav-item{{ $activePage == 'categoria' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('categoria.index')}}">
          <i class="material-icons">notifications</i>
          <p>Categoria</p>
        </a>
      </li>
      @endcan
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>

