@extends('layouts.app')

@section('content')

    @section('breadcrumb')
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('application_principal') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Datos Personales</li>
        </ol>
    @endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">

                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Datos Personales
                    </div>

                    <div id="ajax-container">
                        <form id="editUserForm" name="editUserForm" method="POST" action="{{ route('update_user_info') }}" class="ajaxJsonForm">
                            @csrf
                            <div class="card-body">

                                <input type="hidden" id="user_id" name="user_id" value="{{ $user->user_id }}">

                                <div class="form-group">
                                    <label>Email</label>
                                    <p class="form-control-static">{{ $user->email  }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="label">Nombre</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ $user->name }}" >
                                    <div id="name_help_block" class="invalid-feedback">{{ $errors->first('name') }}</div>
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