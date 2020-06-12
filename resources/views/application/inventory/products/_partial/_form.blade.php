@csrf
<div class="card-body">

    @if($product->uni_code)
        <div class="form-group">
            <label>Código</label>
            <p class="form-control-static">{{ $product->uni_code  }}</p>
        </div>
    @else
        <div class="form-group">
            <label for="uni_code">Código Único</label>
            <input class="form-control @error('uni_code') is-invalid @enderror" id="uni_code" type="text" name="uni_code" value="{{ $product->uni_code }}" >
            <div id="uni_code_help_block" class="invalid-feedback">{{ $errors->first('uni_code') }}</div>
        </div>
    @endif

        <div class="form-group">
            <label for="name">Nombre</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ $product->name }}" >
            <div id="name_help_block" class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control basic-html-editor @error('description') is-invalid @enderror" id="description" name="description" rows="9" >{{ $product->description }}</textarea>
            <div id="description_help_block" class="invalid-feedback">{{ $errors->first('description') }}</div>
        </div>

        <div class="form-group">
            <label for="product_category_id">Categoría</label>
            <select class="form-control @error('product_category_id') is-invalid @enderror select2" id="product_category_id" name="product_category_id">
                <option value="">Seleccione</option>
                @php echo $product_categories @endphp
            </select>
            <div id="product_category_id_help_block" class="invalid-feedback">{{ $errors->first('product_category_id') }}</div>
        </div>

        <div class="form-group">
            <label for="product_brand_id">Marca</label>
            <select class="form-control @error('product_brand_id') is-invalid @enderror select2" id="product_brand_id" name="product_brand_id">
                <option value="">Seleccione</option>
                @foreach($product_brands as $brand) 
                    <option value="{{ $brand->product_brand_id }}" <?php echo $product->product_brand_id==$brand->product_brand_id?'selected':''; ?> >{{ $brand->name }}</option>
                @endforeach                
            </select>
            <div id="product_brand_id_help_block" class="invalid-feedback">{{ $errors->first('product_brand_id') }}</div>
        </div>

        <div class="form-group">
            <label for="state">Estado</label>
            <select class="form-control @error('state') is-invalid @enderror select2" id="state" name="state">
                <option value="">Please select</option>
                <option value="A" <?php echo $product->state=='A'?'selected':''; ?> >Activo</option>
                <option value="I" <?php echo $product->state=='I'?'selected':''; ?> >Inactivo</option>
            </select>
            <div id="state_help_block" class="invalid-feedback">{{ $errors->first('state') }}</div>
        </div>

</div>
<div class="card-footer">
    <button class="btn btn-primary pre-validate-btn" type="button">
        <i class="fa fa-save"></i> Guardar</button>
    <a class="btn btn-danger" href="{{ route('index_products')}}">
        <i class="fa fa-ban"></i> Cancelar
    </a>
</div>