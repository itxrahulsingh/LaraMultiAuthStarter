<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CMS') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/libs.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
    @stack('styles')

</head>

<body class="nav-fixed">
<nav class="topnav navbar navbar-expand navbar-dark bg-primary">
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars rnav-btn"></i>
    </button>
    <a class="navbar-brand" href="{{ url('/admin/') }}">{{ config('app.name') }}</a>

    <!-- Navbar Search-->
{{--    <form class="m-auto col-md-4">--}}
{{--        <div class="input-group">--}}
{{--            <input class="form-control tsearch rounded-0" type="text" placeholder="Type and hit enter"--}}
{{--                   aria-label="Search"--}}
{{--                   aria-describedby="basic-addon2"/>--}}
{{--            <div class="input-group-append">--}}
{{--                <button class="btn tsearch btn-primary rounded-0 shadow-none" type="button"><i--}}
{{--                        class="fas fa-search"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

<!-- Navbar-->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                @if(file_exists(asset('/storage/uploads/avatar/'.Auth::User()->avatar)))
                    <img class="rounded-circle" width="30" height="30"
                         src="{{ asset('/storage/uploads/avatar/'.Auth::User()->avatar) }}">
                @elseif(!empty(Auth::user()->avatar))
                    <img class="rounded-circle" src="{{ auth()->user()->avatar }}" alt="avatar" width="30" height="30">
                @else
                    <img class="rounded-circle" width="30" height="30"
                         src="{{ asset('/storage/uploads/avatar/default.png') }}">
                @endif
                {{--                {{ ucwords(Auth::user()->name) }} <span class="caret"></span>--}}
            </a>

            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"> <i class="far fa-user-circle"></i>&nbsp;&nbsp;{{ __('Profile') }}
                </a>
                <a class="dropdown-item" href="#"> <i class="fas fa-cog"></i>&nbsp;&nbsp;{{ __('Settings') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>


<div id="Sidenav">
    <div id="Sidenav_nav">
        <nav class="sidenav accordion sidenav" id="sidenavAccordion">
            <div class="sidenav-menu">
                <div class="nav">

                    <div class="sidenav-heading">{{ __('Nav Heading') }}</div>
                    <a class="nav-link" href="#">
                        <div class="nav-link-icon"><i class="fas fa-users"></i></div>
                        {{ __('Users') }}
                    </a>
                    <a class="nav-link" href="#">
                        <div class="nav-link-icon"><i class="fas fa-archive"></i></div>
                        {{ __('Button') }}
                    </a>

                    <div class="sidenav-heading">{{ __('Nav Heading') }}</div>
                    <a class="nav-link" href="#">
                        <div class="nav-link-icon"><i class="fas fa-archive"></i></div>
                        {{ __('Button') }}
                    </a>


                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                       aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="nav-link-icon"><i class="fas fa-columns"></i></div>
                        {{ __('Dropdown') }}
                        <div class="sidenav-collapse-arrow"><i class="material-icons">keyboard_arrow_down</i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="#">{{ __('Dropdown item') }}</a>
                            <a class="nav-link" href="#">{{ __('Dropdown item') }}</a>
                        </nav>
                    </div>

                </div>
            </div>

        </nav>
    </div>

    <div id="content_section">

        <main>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')

        </main>

        <footer class="py-3 mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between font-weight-bold small">
                    <div class="text-muted">Copyright &copy; {{ config('app.name') }} 2020</div>
                    <div>
                        <a href="#">{{ __('Privacy Policy') }}</a>
                        &middot;
                        <a href="#">{{ __('Terms & Conditions') }}</a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>

{{-- Scripts --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/libs.js') }}"></script>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
{{---- DataTables --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
<script>
    $(function () {

        let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };
        // For Set 'btn' Class to all Default Buttons
        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {className: 'btn btn-sm'})

        // Datatableas Global Function Add here effect Global tables
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                url: languages['{{ app()->getLocale() }}']
            },
            processing: true,
            serverSide: true,
            scrollY: 480,
            deferRender: true,
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-2'l><'col-sm-7 'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn-info',
                    text: 'COPY',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn-info',
                    text: 'CSV',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                // {
                //     extend: 'excel',
                //     className: 'btn-info',
                //     text: 'EXCEL',
                //     exportOptions: {
                //         columns: ':info'
                //     }
                // },
                {
                    extend: 'pdf',
                    className: 'btn-info',
                    text: 'PDF',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    className: 'btn-info',
                    text: 'PRINT',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn-info',
                    text: 'COLVIS',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });
    });

</script>
@stack('scripts')

</body>
</html>
