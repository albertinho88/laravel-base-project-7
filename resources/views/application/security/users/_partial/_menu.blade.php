<?php $routeName = Route::currentRouteName(); ?>

<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Usuarios
    </div>
    <div class="card-body">
        <div class="list-group">
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'index_users' ? "active" : "" ?> "
               href="{{ route('index_users')}}">
                Listar
            </a>
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'create_user' ? "active" : "" ?> "
               href="{{route('create_user')}}">
                Crear
            </a>

            @if(isset($user->user_id))
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'show_user' ? "active" : "" ?> "
                   href="{{ route('show_user',['user_id' => $user->encoded_id()]) }}">
                    Ver
                </a>
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'edit_user' ? "active" : "" ?> "
                   href="{{ route('edit_user',['user_id' => $user->encoded_id()]) }}">
                    Editar
                </a>
            @endif

        </div>
    </div>
</div>