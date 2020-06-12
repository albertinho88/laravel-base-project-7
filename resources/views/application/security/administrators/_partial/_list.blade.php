<div class="card-body ">
    <table class="table table-responsive-sm datatableNet">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="10%">Estado</th>
            <th width="15%">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <ul class="list-group list-group-flush" >
                        @foreach($user->listOfRolesPerEstBranch as $role)
                            <li class="list-group-item">{{ $role->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    @if($user->generalState == 'A')
                        <span class="badge badge-success">Activo</span>
                    @elseif($user->generalState == 'I')
                        <span class="badge badge-secondary">Inactivo</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('show_user',['user_id' => $user->encoded_id()]) }}">
                        <i class="fa fa-search-plus"></i>
                    </a>
                    <a class="btn btn-info" href="{{ route('edit_user',['user_id' => $user->encoded_id()]) }}">
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







