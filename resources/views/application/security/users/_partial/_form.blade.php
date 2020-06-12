@csrf
<div class="card-body">

    @if($user->user_id)
        <div class="form-group">
            <label>Email</label>
            <p class="form-control-static">{{ $user->email  }}</p>
        </div>
    @else
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="email" value="{{ $user->email }}" >
            <div id="email_help_block" class="invalid-feedback">{{ $errors->first('email') }}</div>
        </div>
    @endif

    <div class="form-group">
        <label for="first_name">Nombre</label>
        <input class="form-control @error('first_name') is-invalid @enderror" id="first_name" type="text" name="first_name" value="{{ $user->person->first_name }}" >
        <div id="first_name_help_block" class="invalid-feedback">{{ $errors->first('first_name') }}</div>
    </div>

    <div class="form-group">
        <label for="last_name">Apellido</label>
        <input class="form-control @error('last_name') is-invalid @enderror" id="last_name" type="text" name="last_name" value="{{ $user->person->last_name }}" >
        <div id="last_name_help_block" class="invalid-feedback">{{ $errors->first('last_name') }}</div>
    </div>

    <div class="form-group">
        <label for="idtype_catdetail">Tipo Identificación</label>
        <select class="form-control @error('idtype_catdetail') is-invalid @enderror" id="idtype_catdetail" name="idtype_catdetail">
            <option value="">Please select</option>
            @foreach($id_types as $id_type)
                <option value="{{ $id_type->catalogdetail_id }}" <?php echo $user->person->idtype_catdetail == $id_type->catalogdetail_id?'selected':''; ?> >
                    {{ $id_type->value }}
                </option>
            @endforeach
        </select>
        <div id="idtype_catdetail_help_block" class="invalid-feedback">{{ $errors->first('idtype_catdetail') }}</div>
    </div>

    <div class="form-group">
        <label for="identification">Identificación</label>
        <input class="form-control @error('identification') is-invalid @enderror" id="identification" type="text" name="identification" value="{{ $user->person->identification }}" >
        <div id="identification_help_block" class="invalid-feedback">{{ $errors->first('identification') }}</div>
    </div>

    @if($user->user_id)
    <div class="form-group">
        <label for="generalState">Estado</label>
        <select class="form-control @error('generalState') is-invalid @enderror" id="generalState" name="generalState">
            <option value="">Please select</option>
            <option value="A" <?php echo $user->generalState=='A'?'selected':''; ?> >Activo</option>
            <option value="I" <?php echo $user->generalState=='I'?'selected':''; ?> >Inactivo</option>
        </select>
        <div id="generalState_help_block" class="invalid-feedback">{{ $errors->first('generalState') }}</div>
    </div>
    @endif

    <div class="form-group">
        <label for="roles">Roles</label>

        @foreach($roles as $role)
            <div class="form-check checkbox">
                @if($role->state == 'I' || $role->level <= $minLevelCreator)
                    <input type="checkbox" {{ $role->selected?'checked':'' }} disabled />
                    @if($role->selected)
                        <input type="hidden" name="user_roles[]" id="{{ $role->role_id }}" value="{{ $role->role_id }}" />
                    @endif
                @else
                    <input type="checkbox" name="user_roles[]" id="{{ $role->role_id }}" value="{{ $role->role_id }}" {{ $role->selected?'checked':'' }} />
                @endif
                <label class="form-check-label" for="{{ $role->role_id }}">{{ $role->name }}</label>
            </div>
        @endforeach
    </div>

</div>
<div class="card-footer">
    <button class="btn btn-primary pre-validate-btn" type="button">
        <i class="fa fa-save"></i> Guardar</button>
    <a class="btn btn-danger" href="{{ route('index_users')}}">
        <i class="fa fa-ban"></i> Cancelar
    </a>
</div>
