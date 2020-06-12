<?php
    $widthLabel = 3;
    $widthValue = 9;
?>

<div class="card-body show-card">
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Código</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $web_menu->code  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Descripción</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $web_menu->description  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Estado</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">
                <?php echo $web_menu->state == 'A' ? 'Activo' : ''; ?>
                <?php echo $web_menu->state == 'I' ? 'Inactivo' : ''; ?>
            </p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Creación</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $web_menu->created_at  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Actualización</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $web_menu->updated_at  }}</p>
        </div>
    </div>


</div>