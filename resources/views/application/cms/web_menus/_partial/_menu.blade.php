<?php $routeName = Route::currentRouteName(); ?>

<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Menús Web
    </div>
    <div class="card-body">
        <div class="list-group">
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'index_web_menus' ? "active" : "" ?> "
               href="{{ route('index_web_menus')}}">
                Listar
            </a>
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'create_web_menu' ? "active" : "" ?> "
               href="{{route('create_web_menu')}}">
                Crear
            </a>

            @if(isset($web_menu->menu_id))
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'show_web_menu' ? "active" : "" ?> "
                   href="{{ route('show_web_menu',['menu_id' => $web_menu->encoded_id()]) }}">
                    Ver
                </a>
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'edit_web_menu' ? "active" : "" ?> "
                   href="{{ route('edit_web_menu',['menu_id' => $web_menu->encoded_id()]) }}">
                    Editar
                </a>
            @endif

        </div>
    </div>
</div>
