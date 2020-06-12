<?php $routeName = Route::currentRouteName(); ?>

<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Categorías Prod.
    </div>
    <div class="card-body">
        <div class="list-group">
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'index_product_categories' ? "active" : "" ?> "
               href="{{ route('index_product_categories')}}">
                Listar
            </a>
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'create_product_category' ? "active" : "" ?> "
               href="{{route('create_product_category')}}">
                Crear
            </a>

            @if(isset($product_category->product_category_id))
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'show_product_category' ? "active" : "" ?> "
                   href="{{ route('show_product_category',['product_category_id' => $product_category->encoded_id()]) }}">
                    Ver
                </a>
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'edit_product_category' ? "active" : "" ?> "
                   href="{{ route('edit_product_category',['product_category_id' => $product_category->encoded_id()]) }}">
                    Editar
                </a>
            @endif

        </div>
    </div>
</div>
