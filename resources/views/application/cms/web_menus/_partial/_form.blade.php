@csrf
<div class="card-body">

    @if($web_menu->code)
        <div class="form-group">
            <label>Código</label>
            <p class="form-control-static">{{ $web_menu->code }}</p>
        </div>
    @else
        <div class="form-group">
            <label for="code">Código</label>
            <input class="form-control @error('code') is-invalid @enderror" id="code" type="text" name="code" value="{{ $web_menu->code }}" >
            <div id="code_help_block" class="invalid-feedback">{{ $errors->first('code') }}</div>
        </div>
    @endif

    <div class="form-group">
        <label for="label">Descripción</label>
        <input class="form-control @error('description') is-invalid @enderror" id="label" type="text" name="label" value="{{ $web_menu->description }}" >
        <div id="description_help_block" class="invalid-feedback">{{ $errors->first('description') }}</div>
    </div>
    
    <div class="form-group">
        <label for="state">Estado</label>
        <select class="form-control @error('state') is-invalid @enderror" id="state" name="state">
            <option value="">Please select</option>
            <option value="A" <?php echo $web_menu->state=='A'?'selected':''; ?> >Activo</option>
            <option value="I" <?php echo $web_menu->state=='I'?'selected':''; ?> >Inactivo</option>
        </select>
        <div id="state_help_block" class="invalid-feedback">{{ $errors->first('state') }}</div>
    </div>

</div>
<div class="card-footer">
    <button class="btn btn-primary pre-validate-btn" type="button">
        <i class="fa fa-save"></i> Guardar</button>
    <a class="btn btn-danger" href="{{ route('index_web_menus')}}">
        <i class="fa fa-ban"></i> Cancelar
    </a>
</div>