<div class="card-body ">
    <table class="table table-responsive-sm datatableNet_noOrdering_noPaging">
        <thead>
        <tr>
            <th width="10%">Estado</th>
            <th>Etiqueta</th>
            <th width="15%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menu_options as $menu_option)
        <tr>
            <td>
                @if($menu_option->state == 'A')
                    <span class="badge badge-success">Activo</span>
                @elseif($menu_option->state == 'I')
                    <span class="badge badge-secondary">Inactivo</span>
                @endif
            </td>
            <td><?php echo $menu_option->label; ?></td>
            <td>
                <a class="btn btn-success" href="{{ route('show_menu_option',['menu_id' => $menu_option->encoded_id()]) }}">
                    <i class="fa fa-search-plus"></i>
                </a>
                <a class="btn btn-info" href="{{ route('edit_menu_option',['menu_id' => $menu_option->encoded_id()]) }}">
                    <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-danger" href="{{ route('remove_menu_option',['menu_id' => $menu_option->encoded_id()]) }}">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>







