<?php
    $widthLabel = 3;
    $widthValue = 9;
?>

<div class="card-body show-card">
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Código</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $menu_option->code  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Etiqueta</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $menu_option->label  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Icono</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $menu_option->icon  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Url</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $menu_option->url  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Orden</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $menu_option->order  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Tipo</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">
                <?php echo $menu_option->type == 'INT' ? 'Interna' : ''; ?>
                <?php echo $menu_option->type == 'EXT' ? 'Externa' : ''; ?>
            </p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Estado</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">
                <?php echo $menu_option->state == 'A' ? 'Activo' : ''; ?>
                <?php echo $menu_option->state == 'I' ? 'Inactivo' : ''; ?>
            </p>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Creación</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $menu_option->created_at  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Actualización</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $menu_option->updated_at  }}</p>
        </div>
    </div>


</div>