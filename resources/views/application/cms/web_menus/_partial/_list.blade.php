<div class="card-body ">
    <table class="table table-responsive-sm datatableNet_noOrdering_noPaging">
        <thead>
        <tr>            
            <th>Etiqueta</th>
            <th width="10%">Estado</th>
            <th width="15%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($web_menus as $web_menu)
        <tr>            
            <td><?php echo $web_menu->code; ?></td>
            <td>
                @if($web_menu->state == 'A')
                    <span class="badge badge-success">Activo</span>
                @elseif($web_menu->state == 'I')
                    <span class="badge badge-secondary">Inactivo</span>
                @endif
            </td>
            <td>
                <a class="btn btn-success" href="{{ route('show_web_menu',['menu_id' => $web_menu->encoded_id()]) }}">
                    <i class="fa fa-search-plus"></i>
                </a>
                <a class="btn btn-info" href="{{ route('edit_web_menu',['menu_id' => $web_menu->encoded_id()]) }}">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>







