@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    @section('breadcrumb')
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Inicio</li>
        </ol>
    @endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">

                    <div class="card-body">
                        <div class="jumbotron bg-transparent">
                            <h1 >Bienvenido, {{ auth()->user()->name }}</h1>
                            <p class="lead">{{ auth()->user()->email }}</p>

                            <hr class="my-4">
                            @if($establishmentBranch)
                                <h2>Establecimiento</h2>
                                <p>
                                    <b>RUC: </b> {{ $establishmentBranch->establishment->ruc  }} <br/>
                                    <b>Razón Social: </b> {{ $establishmentBranch->establishment->business_name  }} <br/>

                                    <b>Código Sucursal: </b> {{ $establishmentBranch->code  }}<br />
                                    <b>Sucursal: </b> {{ $establishmentBranch->business_name  }} <br />

                                </p>
                            @endif

                            <!--<hr class="my-4">
                            <h2>Roles Asignados (Activos)</h2>
                            <p>

                            </p>-->
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
