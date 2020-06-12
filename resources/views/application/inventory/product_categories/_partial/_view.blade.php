<?php
$widthLabel = 3;
$widthValue = 9;
?>

<div class="card-body show-card">
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Código</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $product_category->code  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Nombre</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $product_category->name  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Descripción</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">@php echo $product_category->description;  @endphp</p>
        </div>
    </div>

    @if(isset($product_category->parent_id))
        <div class="form-group row">
            <label class="col-md-{{$widthLabel}} col-form-label">Categoría Padre</label>
            <div class="col-md-{{ $widthValue  }}">
                <p class="form-control-static">{{ $product_category->parent_category->name  }}</p>
            </div>
        </div>
    @endif

    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Estado</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">
                <?php echo $product_category->state == 'A' ? 'Activo' : ''; ?>
                <?php echo $product_category->state == 'I' ? 'Inactivo' : ''; ?>
            </p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Creación</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $product_category->created_at  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Actualización</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $product_category->updated_at  }}</p>
        </div>
    </div>

</div>