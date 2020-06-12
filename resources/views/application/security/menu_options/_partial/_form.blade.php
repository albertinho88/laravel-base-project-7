@csrf
<div class="card-body">

    @if($menu_option->code)
        <div class="form-group">
            <label>Código</label>
            <p class="form-control-static">{{ $menu_option->code }}</p>
        </div>
    @else
        <div class="form-group">
            <label for="code">Código</label>
            <input class="form-control @error('code') is-invalid @enderror" id="code" type="text" name="code" value="{{ $menu_option->code }}" >
            <div id="code_help_block" class="invalid-feedback">{{ $errors->first('code') }}</div>
        </div>
    @endif

    <div class="form-group">
        <label for="label">Etiqueta</label>
        <input class="form-control @error('label') is-invalid @enderror" id="label" type="text" name="label" value="{{ $menu_option->label }}" >
        <div id="label_help_block" class="invalid-feedback">{{ $errors->first('label') }}</div>
    </div>
    <div class="form-group">
        <label for="icon">Icono</label>
        <input class="form-control @error('icon') is-invalid @enderror" id="icon" type="text" name="icon" value="{{ $menu_option->icon }}" >
        <div id="icon_help_block" class="invalid-feedback">{{ $errors->first('icon') }}</div>
    </div>
    <div class="form-group">
        <label for="url">Url</label>
        <input class="form-control @error('url') is-invalid @enderror" id="url" type="text" name="url" value="{{ $menu_option->url }}" >
        <div id="url_help_block" class="invalid-feedback">{{ $errors->first('url') }}</div>
    </div>
    <div class="form-group">
        <label for="order">Orden</label>
        <input class="form-control @error('order') is-invalid @enderror" id="order" type="text" name="order" value="{{ $menu_option->order }}" >
        <div id="order_help_block" class="invalid-feedback">{{ $errors->first('order') }}</div>
    </div>
    <div class="form-group">
        <label for="type">Tipo</label>
        <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
            <option value="">Please select</option>
            <option value="INT" <?php echo $menu_option->type=='INT'?'selected':''; ?> >Interna</option>
            <option value="EXT" <?php echo $menu_option->type=='EXT'?'selected':''; ?> >Externa</option>
        </select>
        <div id="type_help_block" class="invalid-feedback">{{ $errors->first('type') }}</div>
    </div>
    <div class="form-group">
        <label for="state">Estado</label>
        <select class="form-control @error('state') is-invalid @enderror" id="state" name="state">
            <option value="">Please select</option>
            <option value="A" <?php echo $menu_option->state=='A'?'selected':''; ?> >Activo</option>
            <option value="I" <?php echo $menu_option->state=='I'?'selected':''; ?> >Inactivo</option>
        </select>
        <div id="state_help_block" class="invalid-feedback">{{ $errors->first('state') }}</div>
    </div>
    <div class="form-group">
        <label for="menu_parent_id">Menú Padre</label>
        <select class="form-control @error('menu_parent_id') is-invalid @enderror" id="menu_parent_id" name="menu_parent_id">
            <option value="0">> Raíz</option>
            <?php echo $menu_options_list ?>
        </select>
        <div id="menu_parent_id_help_block" class="invalid-feedback">{{ $errors->first('menu_parent_id') }}</div>
    </div>

</div>
<div class="card-footer">
    <button class="btn btn-primary pre-validate-btn" type="button">
        <i class="fa fa-save"></i> Guardar</button>
    <a class="btn btn-danger" href="{{ route('index_menu_options')}}">
        <i class="fa fa-ban"></i> Cancelar
    </a>
</div>