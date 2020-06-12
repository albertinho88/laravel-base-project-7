<?php $routeName = Route::currentRouteName(); ?>

<div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-settings"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item <?php echo $routeName == 'index_users' ? "active" : "" ?>" href="{{ route('index_users')}}">Listar</a>
        <a class="dropdown-item <?php echo $routeName == 'create_user' ? "active" : "" ?>" href="{{route('create_user')}}">Crear</a>
        @if(isset($user->user_id))
            <a class="dropdown-item <?php echo $routeName == 'show_user' ? "active" : "" ?> "
               href="{{ route('show_user',['user_id' => $user->encoded_id()]) }}">
                Ver
            </a>
            <a class="dropdown-item <?php echo $routeName == 'edit_user' ? "active" : "" ?> "
               href="{{ route('edit_user',['user_id' => $user->encoded_id()]) }}">
                Editar
            </a>
        @endif
    </div>
</div>