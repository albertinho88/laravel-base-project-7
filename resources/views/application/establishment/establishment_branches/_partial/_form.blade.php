@csrf

<input type="hidden" id="establishment_id" name="establishment_id" value="{{ $establishment->establishment_id }}">

<div class="card-body">

    <div class="form-group">
        <label class="font-weight-bold">Razón Social</label>
        <p class="form-control-static">{{ $establishment->business_name  }}</p>
    </div>

    <div class="form-group">
        <label class="font-weight-bold">RUC</label>
        <p class="form-control-static">{{ $establishment->ruc  }}</p>
    </div>

    @if($establishment_branch->establishment_branch_id)
        <div class="form-group">
            <label class="font-weight-bold">Código</label>
            <p class="form-control-static">{{ $establishment_branch->code }}</p>
        </div>
    @else
        <div class="form-group">
            <label for="code">Código</label>
            <input class="form-control @error('code') is-invalid @enderror" id="code" type="text" name="code" value="{{ $establishment_branch->code }}" >
            <div id="code_help_block" class="invalid-feedback">{{ $errors->first('code') }}</div>
        </div>
    @endif

    <div class="form-group">
        <label for="label">Nombre Comercial</label>
        <input class="form-control @error('business_name') is-invalid @enderror" id="business_name" type="text" name="business_name" value="{{ $establishment_branch->business_name }}" >
        <div id="business_name_help_block" class="invalid-feedback">{{ $errors->first('business_name') }}</div>
    </div>

    @if($establishment_branch->establishment_branch_id)
        <div class="form-group">
            <label for="state">Estado</label>
            <select class="form-control @error('state') is-invalid @enderror" id="state" name="state">
                <option value="">Please select</option>
                <option value="A" <?php echo $establishment_branch->state=='A'?'selected':''; ?> >Activo</option>
                <option value="I" <?php echo $establishment_branch->state=='I'?'selected':''; ?> >Inactivo</option>
            </select>
            <div id="state_help_block" class="invalid-feedback">{{ $errors->first('state') }}</div>
        </div>
    @endif

</div>

<div class="card-footer">
    <button class="btn btn-primary pre-validate-btn" type="button">
        <i class="fa fa-save"></i> Guardar</button>
    <a class="btn btn-danger" href="{{ route('index_establishment_branches')}}">
        <i class="fa fa-ban"></i> Cancelar
    </a>
</div>