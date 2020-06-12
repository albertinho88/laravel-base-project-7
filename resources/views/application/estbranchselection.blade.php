@extends('layouts.app')

@section('content')

    @section('breadcrumb')
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Seleccionar Sucursal</li>
        </ol>
    @endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">

                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Seleccionar Sucursal
                    </div>

                    <form id="selectEstablishmentBranchForm" name="selectEstablishmentBranchForm" method="POST" action="{{ route('store_establishment_branch_selection') }}" >
                        @csrf
                        <div class="card-body ">
                            <table class="table table-responsive-sm datatableNet">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Código</th>
                                    <th>Nombre Comercial</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->active_user_establishment_branches as $user_branch)
                                    <tr>
                                        <td><input id="{{ $user_branch->establishment_branch->establishment_branch_id }}" name="establishment_branches_radio" type="radio" value="{{ $user_branch->establishment_branch->establishment_branch_id }}" ></td>
                                        <td>{{ $user_branch->establishment_branch->code }}</td>
                                        <td>{{ $user_branch->establishment_branch->business_name }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-check"></i> Seleccionar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection