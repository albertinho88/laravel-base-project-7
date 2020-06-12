<?php
$widthLabel = 2;
$widthValue = 10;
?>

<div class="card-body show-card">

    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Razón Social</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $establishment_branch->establishment->business_name  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">RUC</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $establishment_branch->establishment->ruc  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Código</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $establishment_branch->code  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Nombre Comercial</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $establishment_branch->business_name  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Estado</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">
                <?php echo $establishment_branch->state == 'A' ? 'Activo' : ''; ?>
                <?php echo $establishment_branch->state == 'I' ? 'Inactivo' : ''; ?>
            </p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Creación</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $establishment_branch->created_at  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Actualización</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $establishment_branch->updated_at  }}</p>
        </div>
    </div>



</div>