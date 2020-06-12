@csrf
<div class="card-body">

    @if($product_category->code)
        <div class="form-group">
            <label>Código</label>
            <p class="form-control-static">{{ $product_category->code  }}</p>
        </div>
    @else
        <div class="form-group">
            <label for="product_category_code">Código</label>
            <input class="form-control @error('code') is-invalid @enderror" id="code" type="text" name="code" value="{{ $product_category->code }}" >
            <div id="code_help_block" class="invalid-feedback">{{ $errors->first('code') }}</div>
        </div>
    @endif

        <div class="form-group">
            <label for="name">Nombre</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ $product_category->name }}" >
            <div id="name_help_block" class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control basic-html-editor @error('description') is-invalid @enderror" id="description" name="description" rows="9" >{{ $product_category->description }}</textarea>
            <div id="description_help_block" class="invalid-feedback">{{ $errors->first('description') }}</div>
        </div>        
        <div class="form-group">
            <label for="state">Estado</label>
            <select class="form-control @error('state') is-invalid @enderror select2" id="state" name="state" >
                <option value="">Please select</option>
                <option value="A" <?php echo $product_category->state=='A'?'selected':''; ?> >Activo</option>
                <option value="I" <?php echo $product_category->state=='I'?'selected':''; ?> >Inactivo</option>
            </select>
            <div id="state_help_block" class="invalid-feedback">{{ $errors->first('state') }}</div>
        </div>         
        <div class="form-group">
            <label for="menu_parent_id">Categoría Padre</label>
            <select class="form-control @error('parent_id') is-invalid @enderror select2" id="parent_id" name="parent_id">
                <option value="0"> > Raíz</option>
                <?php echo $categories_list ?>
            </select>
            <div id="parent_id_help_block" class="invalid-feedback">{{ $errors->first('parent_id') }}</div>
        </div>       

</div>
<div class="card-footer">
    <button class="btn btn-primary pre-validate-btn" type="button">
        <i class="fa fa-save"></i> Guardar</button>
    <a class="btn btn-danger" href="{{ route('index_product_categories')}}">
        <i class="fa fa-ban"></i> Cancelar
    </a>
</div>