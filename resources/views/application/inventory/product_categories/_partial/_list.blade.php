<div class="card-body ">
    <table class="table table-responsive-sm datatableNet_noOrdering_noPaging">
        <thead>
        <tr>
            <!--<th width="15%">Código</th>-->
            <th>Nombre</th>
            <th width="10%">Estado</th>
            <th width="15%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product_categories as $category)
        <tr>
            <!--<td>{{ $category->code  }}</td>-->
            <td><?php echo $category->name; ?></td>
            <td>
                @if($category->state == 'A')
                    <span class="badge badge-success">Activo</span>
                @elseif($category->state == 'I')
                    <span class="badge badge-secondary">Inactivo</span>
                @endif
            </td>
            <td>
                <a class="btn btn-success" href="{{ route('show_product_category',['product_category_id' => $category->encoded_id()]) }}">
                    <i class="fa fa-search-plus"></i>
                </a>
                <a class="btn btn-info" href="{{ route('edit_product_category',['product_category_id' => $category->encoded_id()]) }}">
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







