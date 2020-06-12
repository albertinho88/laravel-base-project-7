<?php $routeName = Route::currentRouteName(); ?>

<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Productos.
    </div>
    <div class="card-body">
        <div class="list-group">
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'index_products' ? "active" : "" ?> "
               href="{{ route('index_products')}}">
                Listar
            </a>
            <a class="list-group-item list-group-item-action <?php echo $routeName == 'create_product' ? "active" : "" ?> "
               href="{{route('create_product')}}">
                Crear
            </a>

            @if(isset($product->product_id))
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'show_product' ? "active" : "" ?> "
                   href="{{ route('show_product',['product_id' => $product->encoded_id()]) }}">
                    Ver
                </a>
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'edit_product' ? "active" : "" ?> "
                   href="{{ route('edit_product',['product_id' => $product->encoded_id()]) }}">
                    Editar
                </a>
                <a class="list-group-item list-group-item-action <?php echo $routeName == 'manage_product_images' ? "active" : "" ?> "
                   href="{{ route('manage_product_images',['product_id' => $product->encoded_id()]) }}">
                    Gestionar Imágenes
                </a>
            @endif

        </div>
    </div>
</div>
