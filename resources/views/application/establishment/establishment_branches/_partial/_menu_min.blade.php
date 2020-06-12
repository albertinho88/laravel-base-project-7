<?php $routeName = Route::currentRouteName(); ?>

<div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-settings"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item <?php echo $routeName == 'index_establishment_branches' ? "active" : "" ?>" href="{{ route('index_establishment_branches')}}">Listar</a>
        <a class="dropdown-item <?php echo $routeName == 'create_establishment_branch' ? "active" : "" ?>" href="{{route('create_establishment_branch')}}">Crear</a>
        @if(isset($establishment_branch->establishment_branch_id))
            <a class="dropdown-item <?php echo $routeName == 'show_establishment_branch' ? "active" : "" ?> "
               href="{{ route('show_establishment_branch',['establishment_branch_id' => $establishment_branch->encoded_id()]) }}">
                Ver
            </a>
            <a class="dropdown-item <?php echo $routeName == 'edit_establishment_branch' ? "active" : "" ?> "
               href="{{ route('edit_establishment_branch',['establishment_branch_id' => $establishment_branch->encoded_id()]) }}">
                Editar
            </a>
        @endif
    </div>
</div>