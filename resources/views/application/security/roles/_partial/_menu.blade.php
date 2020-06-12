<?php $routeName = Route::currentRouteName(); ?>

<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Roles
    </div>
    <div class="card-body">
        <div class="list-group">
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'index_roles' ? "active" : "" ?> "
               href="{{ route('index_roles')}}">
                Listar
            </a>
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'create_role' ? "active" : "" ?> "
               href="{{route('create_role')}}">
                Crear
            </a>

            @if(isset($role->role_id))
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'show_role' ? "active" : "" ?> "
                   href="{{ route('show_role',['role_id' => $role->encoded_id()]) }}">
                    Ver
                </a>
                @if($role->code != \App\Enums\SystemParameter::SUPERADMIN)
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'edit_role' ? "active" : "" ?> "
                   href="{{ route('edit_role',['role_id' => $role->encoded_id()]) }}">
                    Editar
                </a>
                @endif
            @endif

        </div>
    </div>
</div>
