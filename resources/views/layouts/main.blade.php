<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('App Almacen') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png')}}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/datatables/DataTables-1.10.25/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="/datatables/Buttons-1.7.1/css/buttons.bootstrap4.min.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link rel="stylesheet"href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
    <!-- CSS Files -->
    <link href="{{ asset('/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('/demo/demo.css" rel="stylesheet') }}" />
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.page_templates.auth')
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest
       
        <!--   Core JS Files   -->
        <script src="{{ asset('/js/core/jquery.min.js') }}"></script>
        <script src="{{ asset('/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('/js/core/bootstrap-material-design.min.js') }}"></script>
        <script src="{{ asset('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<script type="text/javascript" src="JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="/datatables/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/datatables/DataTables-1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="/datatables/Buttons-1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="/datatables/Buttons-1.7.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="/datatables/Buttons-1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="/datatables/Buttons-1.7.1/js/buttons.print.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>


        @stack('js')
    </body>
</html>