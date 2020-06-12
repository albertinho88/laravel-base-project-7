<?php
$widthLabel = 2;
$widthValue = 10;
?>

<div class="card-body show-card">
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Nombre</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $user->name  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Email</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $user->email  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Estado</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">
                <?php echo $user->generalState == 'A' ? 'Activo' : ''; ?>
                <?php echo $user->generalState == 'I' ? 'Inactivo' : ''; ?>
            </p>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Roles</label>
        <div class="col-md-{{ $widthValue  }}">
            @if($active_user_roles)
                <ul class="list-group">
                @foreach($active_user_roles as $userole)
                    <li class="list-group-item"><?php echo $userole->role->name; ?></li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Creación</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $user->created_at  }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-{{$widthLabel}} col-form-label">Fecha Actualización</label>
        <div class="col-md-{{ $widthValue  }}">
            <p class="form-control-static">{{ $user->updated_at  }}</p>
        </div>
    </div>


</div>