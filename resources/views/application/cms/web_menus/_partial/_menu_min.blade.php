<?php $routeName = Route::currentRouteName(); ?>

<div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-settings"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item <?php echo $routeName == 'index_web_menus' ? "active" : "" ?>" href="{{ route('index_web_menus')}}">Listar</a>
        <a class="dropdown-item <?php echo $routeName == 'create_web_menu' ? "active" : "" ?>" href="{{route('create_web_menu')}}">Crear</a>
        @if(isset($web_menu->menu_id))
            <a class="dropdown-item <?php echo $routeName == 'show_web_menu' ? "active" : "" ?> "
               href="{{ route('show_web_menu',['menu_id' => $web_menu->encoded_id()]) }}">
                Ver
            </a>
            <a class="dropdown-item <?php echo $routeName == 'edit_web_menu' ? "active" : "" ?> "
               href="{{ route('edit_web_menu',['menu_id' => $web_menu->encoded_id()]) }}">
                Editar
            </a>
        @endif
    </div>
</div>