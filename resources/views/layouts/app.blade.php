<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Control de cache -->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- /Control de cache -->

    <?php
    $nombre = 'OptimizaData';
    ?>

    <title>{{ $nombre }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/assets/images/favicon.png') }}">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" data-pace-options='{"restartOnPushState": false}' src="{{ asset('build/assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Additional JS files -->
    <script type="text/javascript" src="{{ asset('build/assets/js/plugins/forms/selects/bootstrap_select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/js/pages/form_bootstrap_select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    @yield('jspagina')
</head>

<body class="login-container" style="background-color:#37474F;">
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="content">

                    @guest
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
