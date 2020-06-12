<?php $routeName = Route::currentRouteName(); ?>

<div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-settings"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item <?php echo $routeName == 'index_products' ? "active" : "" ?>" href="{{ route('index_products')}}">Listar</a>
        <a class="dropdown-item <?php echo $routeName == 'create_product' ? "active" : "" ?>" href="{{route('create_product')}}">Crear</a>
        @if(isset($product->product_id))
            <a class="dropdown-item <?php echo $routeName == 'show_product' ? "active" : "" ?> "
               href="{{ route('show_product',['product_id' => $product->encoded_id()]) }}">
                Ver
            </a>
            <a class="dropdown-item <?php echo $routeName == 'edit_product' ? "active" : "" ?> "
               href="{{ route('edit_product',['product_id' => $product->encoded_id()]) }}">
                Editar
            </a>
            <a class="dropdown-item <?php echo $routeName == 'manage_product_images' ? "active" : "" ?> "
               href="{{ route('manage_product_images',['product_id' => $product->encoded_id()]) }}">
                Gestionar Imágenes
            </a>
        @endif
    </div>
</div>