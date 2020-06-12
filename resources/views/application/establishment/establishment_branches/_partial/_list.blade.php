<div class="card-body ">
    <table class="table table-responsive-sm datatableNet">
        <thead>
        <tr>
            <th>Código</th>
            <th>Nombre Comercial</th>
            <th width="10%">Estado</th>
            <th width="15%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($establishment_branches as $branch)
        <tr>
            <td>{{ $branch->code }}</td>
            <td>{{ $branch->business_name }}</td>
            <td>
                @if($branch->state == 'A')
                    <span class="badge badge-success">Activo</span>
                @elseif($branch->state == 'I')
                    <span class="badge badge-secondary">Inactivo</span>
                @endif
            </td>
            <td>
                <a class="btn btn-success" href="{{ route('show_establishment_branch',['establishment_branch_id' => $branch->encoded_id()]) }}">
                    <i class="fa fa-search-plus"></i>
                </a>
                <a class="btn btn-info" href="{{ route('edit_establishment_branch',['establishment_branch_id' => $branch->encoded_id()]) }}">
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







