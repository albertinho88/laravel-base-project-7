@csrf
<div class="card-body">

    @if($user->user_id)
        <div class="form-group">
            <label>Email</label>
            <p class="form-control-static">{{ $user->email  }}</p>
        </div>
    @else
        <div class="form-group">
            <label for="label">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="email" value="{{ $user->email }}" >
            <div id="email_help_block" class="invalid-feedback">{{ $errors->first('email') }}</div>
        </div>
    @endif

    <div class="form-group">
        <label for="label">Nombre</label>
        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ $user->name }}" >
        <div id="name_help_block" class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>

    @if(!$user->user_id)
    <div class="form-group">
        <label for="label">Contraseña</label>
        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" value="{{ $user->password }}" >
        <div id="password_help_block" class="invalid-feedback">{{ $errors->first('password') }}</div>
    </div>
    @endif

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