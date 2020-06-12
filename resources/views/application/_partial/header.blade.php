<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{asset('_app/images/brand/logo.svg')}}" width="89" height="25" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="{{asset('_app/images/brand/sygnet.svg')}}" width="30" height="30" alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
        <!--<li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>-->

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span>{{auth()->user()->name}}</span>
                <img class="img-avatar" src="{{asset('_app/images/avatars/avatar-7.png')}}" alt="{{auth()->user()->email}}">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Perfil</strong>
                </div>
                <a class="dropdown-item" href="{{route('edit_user_info')}}">
                    <i class="fa fa-user"></i> Datos Personales
                </a>
                <a class="dropdown-item" href="{{route('edit_password')}}">
                    <i class="fa fa-lock"></i> Cambiar Contraseña
                </a>
                <!--<a class="dropdown-item" href="#">
                    <i class="fa fa-wrench"></i> Parámetros
                </a>-->


                <a class="dropdown-item" href="{{route('select_establishment_branch')}}">
                    <i class="fa fa-industry"></i> Cambiar Sucursal
                </a>
                <div class="dropdown-divider"></div>
                <!--<a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>-->
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="fa fa-sign-out"></i> Salir
                </a>
            </div>
        </li>
    </ul>
    <!--<button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
        <span class="navbar-toggler-icon"></span>
    </button>-->
</header>