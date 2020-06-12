<?php $routeName = Route::currentRouteName(); ?>

<div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-settings"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item <?php echo $routeName == 'index_roles' ? "active" : "" ?>" href="{{ route('index_roles')}}">Listar</a>
        <a class="dropdown-item <?php echo $routeName == 'create_role' ? "active" : "" ?>" href="{{route('create_role')}}">Crear</a>
        @if(isset($role->role_id))
            <a class="dropdown-item <?php echo $routeName == 'show_role' ? "active" : "" ?> "
               href="{{ route('show_role',['role_id' => $role->encoded_id()]) }}">
                Ver
            </a>
            @if($role->code != \App\Enums\SystemParameter::SUPERADMIN)
            <a class="dropdown-item <?php echo $routeName == 'edit_role' ? "active" : "" ?> "
               href="{{ route('edit_role',['role_id' => $role->encoded_id()]) }}">
                Editar
            </a>
            @endif
        @endif
    </div>
</div>