<div class="card-body ">
    <table class="table table-responsive-sm datatableNet">
        <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th width="10%">Estado</th>
            <th width="15%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->code }}</td>
            <td>{{ $role->name }}</td>
            <td>
                @if($role->state == 'A')
                    <span class="badge badge-success">Activo</span>
                @elseif($role->state == 'I')
                    <span class="badge badge-secondary">Inactivo</span>
                @endif
            </td>
            <td>
                <a class="btn btn-success" href="{{ route('show_role',['role_id' => $role->encoded_id()]) }}">
                    <i class="fa fa-search-plus"></i>
                </a>
                @if($role->code != \App\Enums\SystemParameter::SUPERADMIN)
                <a class="btn btn-info" href="{{ route('edit_role',['role_id' => $role->encoded_id()]) }}">
                    <i class="fa fa-edit"></i>
                </a>
                @endif
                <!--<a class="btn btn-danger" href="#">
                    <i class="fa fa-trash-o"></i>
                </a>-->
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>







