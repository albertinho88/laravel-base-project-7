<?php $routeName = Route::currentRouteName(); ?>

<div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-settings"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item <?php echo $routeName == 'index_menu_options' ? "active" : "" ?>" href="{{ route('index_menu_options')}}">Listar</a>
        <a class="dropdown-item <?php echo $routeName == 'create_menu_option' ? "active" : "" ?>" href="{{route('create_menu_option')}}">Crear</a>
        @if(isset($menu_option->menu_id))
            <a class="dropdown-item <?php echo $routeName == 'show_menu_option' ? "active" : "" ?> "
               href="{{ route('show_menu_option',['menu_id' => $menu_option->encoded_id()]) }}">
                Ver
            </a>
            <a class="dropdown-item <?php echo $routeName == 'edit_menu_option' ? "active" : "" ?> "
               href="{{ route('edit_menu_option',['menu_id' => $menu_option->encoded_id()]) }}">
                Editar
            </a>
            <a class="dropdown-item <?php echo $routeName == 'remove_menu_option' ? "active" : "" ?> "
               href="{{ route('remove_menu_option',['menu_id' => $menu_option->encoded_id()]) }}">
                Eliminar
            </a>
        @endif
    </div>
</div>