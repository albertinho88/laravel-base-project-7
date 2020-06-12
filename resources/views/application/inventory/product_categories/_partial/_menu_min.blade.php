<?php $routeName = Route::currentRouteName(); ?>

<div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-settings"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item <?php echo $routeName == 'index_product_categories' ? "active" : "" ?>" href="{{ route('index_product_categories')}}">Listar</a>
        <a class="dropdown-item <?php echo $routeName == 'create_product_category' ? "active" : "" ?>" href="{{route('create_product_category')}}">Crear</a>
        @if(isset($product_category->product_category_id))
            <a class="dropdown-item <?php echo $routeName == 'show_product_category' ? "active" : "" ?> "
               href="{{ route('show_product_category',['product_category_id' => $product_category->encoded_id()]) }}">
                Ver
            </a>
            <a class="dropdown-item <?php echo $routeName == 'edit_product_category' ? "active" : "" ?> "
               href="{{ route('edit_product_category',['product_category_id' => $product_category->encoded_id()]) }}">
                Editar
            </a>
        @endif
    </div>
</div>