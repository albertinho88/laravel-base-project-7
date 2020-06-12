@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div id="ajax-menu-dyn" class="d-none d-xl-block col-xl-3 toc order-last">
                @include('application.security.roles._partial._menu')
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        
                        @if(isset($option_title))
                            <strong>{{ $option_title }}</strong>
                        @endif

                        <div id="ajax-menu-min-dyn" class="card-header-actions">
                            @include('application.security.roles._partial._menu_min')
                        </div>
                    </div>

                    <div id="ajax-container">
                        @include($view_name)
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection