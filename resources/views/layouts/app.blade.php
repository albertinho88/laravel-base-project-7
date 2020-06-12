<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @if(isset($option_title))
            {{ $option_title.' | ' }}
        @else
            @yield('title') |
        @endif
        App
</title>

    <!-- Icons-->
    <link href="{{ asset('_app/css/coreui-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('_app/css/flag-icon.css') }}" rel="stylesheet">
    <link href="{{ asset('_app/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('_app/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ asset('_app/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- TinyMCE -->
    <link href="{{ asset('_app/tinymce/skins/ui/oxide/skin.min.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{ asset('_app/css/select2.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('_app/css/app.css') }}" rel="stylesheet">

    <script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
    </script>

    <script src="{{asset('_app/js/app.js')}}"></script>

</head>
@guest

<body class="app flex-row align-items-center" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">

    @yield('content')

@else
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">

    @include('application._partial.header')

    <div class="app-body">

        @include('application._partial.sidebar')

        <main class="main">

            @include('application._partial.breadcrumb')
            @yield('breadcrumb')

            <div class="container-fluid">
                <div class="row">
                    <div id="messages_div" class="col">

                        @if (session('success_message'))
                            <div class="alert alert-success" role="alert">{{ session('success_message') }}</div>
                        @endif


                        @if ($errors->has('error_message'))
                            <div class="alert alert-danger" role="alert">{{ $errors->first('error_message') }}</div>
                        @endif
                        @if ($errors->has('success_message'))
                            <div class="alert alert-success" role="alert">{{ $errors->first('success_message') }}</div>
                        @endif
                        @if ($errors->has('info_message'))
                            <div class="alert alert-info" role="alert">{{ $errors->first('info_message') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            @yield('content')
        </main>

        <!-- include('application._partial.aside_menu') -->
    </div>


    <footer class="app-footer">
        <!--<div>
            <a href="https://clicka.ec">Clicka</a>
            <span>&copy; 2019 Studio.</span>
        </div>-->
        <div class="ml-auto">
            <span>Powered by</span>
            <a href="http://clicka.ec">Clicka</a>
        </div>
    </footer>

@endguest

    <div class="modal" id="myModal" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <img height="94" src="{{ asset('_app/images/loading.gif') }}" />
                </div>
            </div>
            <!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
    </div>

    <div class="modal" id="confirmationModal" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Confirmación</h5>
                </div>
                <div id="confirmationModalBody" class="modal-body">
                    <p>Seguro desea realizar esta acción?</p>
                </div>
                <div id="confirmationModalFooter" class="modal-footer">
                    <button id="confirmBtnYes" type="button" class="btn btn-primary"  >Aceptar</button>
                    <button id="confirmBtnNo" type="button" class="btn btn-danger" >Cancelar</button>
                </div>
            </div>
            <!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
    </div>

</body>
</html>
