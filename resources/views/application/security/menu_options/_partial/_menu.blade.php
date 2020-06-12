<?php $routeName = Route::currentRouteName(); ?>

<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Opciones de Menú
    </div>
    <div class="card-body">
        <div class="list-group">
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'index_menu_options' ? "active" : "" ?> "
               href="{{ route('index_menu_options')}}">
                Listar
            </a>
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'create_menu_option' ? "active" : "" ?> "
               href="{{route('create_menu_option')}}">
                Crear
            </a>

            @if(isset($menu_option->menu_id))
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'show_menu_option' ? "active" : "" ?> "
                   href="{{ route('show_menu_option',['menu_id' => $menu_option->encoded_id()]) }}">
                    Ver
                </a>
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'edit_menu_option' ? "active" : "" ?> "
                   href="{{ route('edit_menu_option',['menu_id' => $menu_option->encoded_id()]) }}">
                    Editar
                </a>
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'remove_menu_option' ? "active" : "" ?> "
                   href="{{ route('remove_menu_option',['menu_id' => $menu_option->encoded_id()]) }}">
                    Eliminar
                </a>
            @endif

        </div>
    </div>
</div>
