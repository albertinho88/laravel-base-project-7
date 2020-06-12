@csrf
<div class="card-body">
    @if($role->role_id)
        <div class="form-group">
            <label>Código</label>
            <p class="form-control-static">{{ $role->code }}</p>
        </div>
    @else
        <div class="form-group">
            <label for="code">Código</label>
            <input class="form-control @error('code') is-invalid @enderror" id="code" type="text" name="code" value="{{ $role->code }}" >
            <div id="code_help_block" class="invalid-feedback">{{ $errors->first('code') }}</div>
        </div>
    @endif

    <div class="form-group">
        <label for="label">Nombre</label>
        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ $role->name }}" >
        <div id="name_help_block" class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group">
        <label for="label">Nivel</label>
        <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
            <option value="">Please select</option>
            <option value="0" <?php echo $role->level=='0'?'selected':''; ?> >0</option>
            <option value="1" <?php echo $role->level=='1'?'selected':''; ?> >1</option>
            <option value="2" <?php echo $role->level=='2'?'selected':''; ?> >2</option>
        </select>
        <div id="level_help_block" class="invalid-feedback">{{ $errors->first('level') }}</div>
    </div>

    @if($role->role_id)
        <div class="form-group">
            <label for="state">Estado</label>
            <select class="form-control @error('state') is-invalid @enderror" id="state" name="state">
                <option value="">Please select</option>
                <option value="A" <?php echo $role->state=='A'?'selected':''; ?> >Activo</option>
                <option value="I" <?php echo $role->state=='I'?'selected':''; ?> >Inactivo</option>
            </select>
            <div id="state_help_block" class="invalid-feedback">{{ $errors->first('state') }}</div>
        </div>
    @endif

    <div class="form-group">
        <label for="menu_options">Opciones de Menú</label>

        @foreach($active_menu_options as $actmenop)
            <div class="form-check checkbox">
                <input type="checkbox" name="role_menu_options[]" id="{{ $actmenop->menu_id }}" value="{{ $actmenop->menu_id }}" <?php echo $actmenop->selected; ?> />
                <label class="form-check-label" for="{{ $actmenop->menu_id }}" ><?php echo $actmenop->label; ?></label>
            </div>
        @endforeach
    </div>

</div>
<div class="card-footer">
    <button class="btn btn-primary pre-validate-btn" type="button">
        <i class="fa fa-save"></i> Guardar</button>
    <a class="btn btn-danger" href="{{ route('index_roles')}}">
        <i class="fa fa-ban"></i> Cancelar
    </a>
</div>