<?php
$widthLabel = 2;
$widthValue = 10;
?>

<div class="card-body show-card">
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Código</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $role->code  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Nombre</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $role->name  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Nivel</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $role->level  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Creación</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $role->created_at  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Actualización</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $role->updated_at  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Estado</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">
                <?php echo $role->state == 'A' ? 'Activo' : ''; ?>
                <?php echo $role->state == 'I' ? 'Inactivo' : ''; ?>
            </p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Opciones de Menú</label>
        <div class="col-md-{{ $widthValue  }}">

            <ul class="list-group">
                @foreach($active_menu_options as $actmenop)
                    @if($actmenop->selected)
                        <li class="list-group-item"><?php echo $actmenop->label; ?></li>
                    @endif
                @endforeach
            </ul>

        </div>
    </div>



</div>