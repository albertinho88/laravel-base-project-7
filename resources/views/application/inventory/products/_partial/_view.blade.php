<?php
$widthLabel = 3;
$widthValue = 9;
?>

<div class="card-body show-card">
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Código</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $product->uni_code  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Nombre</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $product->name  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Descripción</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">@php echo $product->description; @endphp</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Categoría</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $product->product_category->name  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Marca</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $product->product_brand->name  }}</p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Estado</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">
                <?php echo $product->state == 'A' ? 'Activo' : ''; ?>
                <?php echo $product->state == 'I' ? 'Inactivo' : ''; ?>
            </p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Creación</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $product->created_at  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Actualización</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $product->updated_at  }}</p>
        </div>
    </div>

</div>