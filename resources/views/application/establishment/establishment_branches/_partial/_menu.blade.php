<?php $routeName = Route::currentRouteName(); ?>

<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Sucursales
    </div>
    <div class="card-body">
        <div class="list-group">
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'index_establishment_branches' ? "active" : "" ?> "
               href="{{ route('index_establishment_branches')}}">
                Listar
            </a>
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'create_establishment_branch' ? "active" : "" ?> "
               href="{{route('create_establishment_branch')}}">
                Crear
            </a>

            @if(isset($establishment_branch->establishment_branch_id))
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'show_establishment_branch' ? "active" : "" ?> "
                   href="{{ route('show_establishment_branch',['establishment_branch_id' => $establishment_branch->encoded_id()]) }}">
                    Ver
                </a>
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'edit_establishment_branch' ? "active" : "" ?> "
                   href="{{ route('edit_establishment_branch',['establishment_branch_id' => $establishment_branch->encoded_id()]) }}">
                    Editar
                </a>
            @endif

        </div>
    </div>
</div>
