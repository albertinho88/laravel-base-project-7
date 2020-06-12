@extends('layouts.app')

@section('content')

    @section('breadcrumb')
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('application_principal') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Cambiar Contraseña</li>
        </ol>
    @endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">

                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Cambiar Contraseña
                    </div>


                    <div id="ajax-container">
                        <form id="changePassForm" name="changePassForm" method="POST" action="{{ route('update_password') }}" class="ajaxJsonForm">
                            @csrf
                            <div class="card-body">

                                <input type="hidden" id="user_id" name="user_id" value="{{ $user->user_id }}">

                                <div class="form-group">
                                    <label>Email</label>
                                    <p class="form-control-static">{{ $user->email  }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="label">Contraseña Actual</label>
                                    <input class="form-control @error('current_password') is-invalid @enderror" id="current_password" type="password" name="current_password" value="" >
                                    <div id="current_password_help_block" class="invalid-feedback">{{ $errors->first('current_password') }}</div>
                                </div>

                                <div class="form-group">
                                    <label for="label">Nueva Contraseña</label>
                                    <input class="form-control @error('new_password') is-invalid @enderror" id="new_password" type="password" name="new_password" value="" >
                                    <div id="new_password_help_block" class="invalid-feedback">{{ $errors->first('new_password') }}</div>
                                </div>

                                <div class="form-group">
                                    <label for="label">Confirmación Nueva Contraseña</label>
                                    <input class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" type="password" name="new_password_confirmation" value="" >
                                    <div id="new_password_confirmation_help_block" class="invalid-feedback">{{ $errors->first('new_password_confirmation') }}</div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary pre-validate-btn" type="button">
                                    <i class="fa fa-save"></i> Guardar</button>
                                <a class="btn btn-danger" href="{{ route('application_principal')}}">
                                    <i class="fa fa-ban"></i> Cancelar
                                </a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>




@endsection