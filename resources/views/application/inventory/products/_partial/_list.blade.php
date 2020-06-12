<div class="card-body ">
    <table class="table table-responsive-sm datatableNet">
        <thead>
        <tr>
            <th>Categoría</th>
            <th>Código</th>
            <th>Nombre</th>
            <th width="10%">Estado</th>
            <th width="15%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <td><?php echo $product->product_category->name; ?></td>
            <td>{{ $product->uni_code  }}</td>
            <td><?php echo $product->name; ?></td>
            <td>
                @if($product->state == 'A')
                    <span class="badge badge-success">Activo</span>
                @elseif($product->state == 'I')
                    <span class="badge badge-secondary">Inactivo</span>
                @endif
            </td>
            <td>
                <a class="btn btn-success" href="{{ route('show_product',['product_id' => $product->encoded_id()]) }}">
                    <i class="fa fa-search-plus"></i>
                </a>
                <a class="btn btn-info" href="{{ route('edit_product',['product_id' => $product->encoded_id()]) }}">
                    <i class="fa fa-edit"></i>
                </a>
                <!--<a class="btn btn-danger" href="#">
                    <i class="fa fa-trash-o"></i>
                </a>-->
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>







