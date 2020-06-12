<?php
$widthLabel = 3;
$widthValue = 9;
?>

<form id="deleteMenuOptionForm" name="deleteMenuOptionForm" method="POST" action="{{ route('delete_menu_option') }}" class="ajaxJsonForm">

    @csrf
    <div class="card-body">

        <div class="form-group row">
            <label class="col-md-{{$widthLabel}} col-form-label">ID Menú</label>
            <div class="col-md-{{ $widthValue  }}">
                <p class="form-control-static">{{ $menu_option->menu_id  }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-{{$widthLabel}} col-form-label">Etiqueta</label>
            <div class="col-md-{{ $widthValue  }}">
                <p class="form-control-static">{{ $menu_option->label  }}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-{{$widthLabel}} col-form-label">Url</label>
            <div class="col-md-{{ $widthValue  }}">
                <p class="form-control-static">{{ $menu_option->url  }}</p>
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

        <div class="row">
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Advertencia</h4>
                    <p>Una opción de menú no podrá ser eliminada si:</p>
                    <hr>
                    <p class="mb-0">Se encuentra relacionada a uno o mas roles en estado activo o inactivo.</p>
                    <p class="mb-0">Sus opciones de menús "hijas" (en caso de tenerlas) en estado activo o inactivo, se encuentran relacionadas a uno o mas roles en estado activo o inactivo.</p>
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit">
            <i class="fa fa-dot-circle-o"></i> Eliminar</button>
        <!--<button class="btn btn-sm btn-danger" type="reset">
            <i class="fa fa-ban"></i> Reset</button>-->
    </div>

</form>