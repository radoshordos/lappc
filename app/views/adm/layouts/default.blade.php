<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@section('title') @show</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/js/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/s2b3/select2-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/mystyle/style.css') }}">
    <script src="{{ asset('admin/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/restfulizer.js') }}"></script>
    @section('script')
    @show
</head>
<body>

<!-- Navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if (!Sentry::check())
            <a class="navbar-brand" href="{{ URL::route('adm.home') }}">Administrační rozhraní</a>
            @endif
        </div>
        <div class="collapse navbar-collapse">

            @if (Sentry::check())
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nastavení <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('adm.pattern.dev.index') }}">Výrobci</a></li>
                        <li><a href="{{ URL::route('adm.pattern.devgroup.index')}}">Skupiny výrobců</a></li>
                        <li class="divider"></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Přehled <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('adm.summary.tree2group2top.index') }}">Tree GroupTop</a></li>
                    </ul>
                </li>

                @if (Sentry::getUser()->hasAccess('admin'))
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">PPC <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('adm.ppc.db.index')}}">PPC DB</a></li>
                        <li><a href="{{ URL::route('adm.ppc.rules.index')}}">PPC rules</a></li>
                        <li><a href="{{ URL::to('adm/ppc/import') }}">Manual Import</a></li>
                        <li><a href="{{ URL::to('adm/ppc/config') }}">PPC Konfigurace</a></li>
                        <li><a href="{{ URL::to('adm/ppc/keywords') }}">PPC Keywords</a></li>
                    </ul>
                </li>
                @endif

                @if (Sentry::getUser()->hasAccess('admin'))
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('adm/admin/runner') }}">Runner</a></li>
                        <li><a href="{{ URL::to('adm/admin/phpinfo') }}">PhpInfo();</a></li>
                    </ul>
                </li>
                @endif

            </ul>
            @endif

            <ul class="nav navbar-nav navbar-right">
                @if (Sentry::check())


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Účet<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li
                        {{ (Request::is('adm/users/show/' . Session::get('userId')) ? 'class="active"' : '') }}>
                        <a href="{{ URL::to('adm/users') }}/{{ Session::get('userId') }}">{{ Session::get('email')
                            }}</a>
                </li>
                @if (Sentry::getUser()->hasAccess('admin'))
                <li class="divider"></li>
                <li><a href="{{ URL::to('adm/users') }}">Uživatelé</a></li>
                <li><a href="{{ URL::to('adm/groups') }}">Skupiny</a></li>
                @endif
                <li class="divider"></li>
                <li><a href="{{ URL::to('adm/logout') }}">Logout</a></li>
            </ul>
            </li>
            @else
            <li><a href="{{ URL::to('adm/login') }}">Login</a></li>
            @endif
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>

<h1>@yield('title')</h1>
@show

<!-- ./ navbar -->

<!-- Container -->
<div class="container">
    <!-- Notifications -->
    @include('adm/layouts/notifications')
    <!-- ./ notifications -->

    <!-- Content -->
    @yield('content')
    <!-- ./ content -->
</div>

<!-- ./ container -->


</body>
</html>