<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="cs"> <![endif]-->
<html class="no-js" lang="cs">

@include('web.global.blockhead')
<body>
<h1>Hello, world!</h1>
Registrace & Přihlášení
<div id="container" style="border: 1px solid #666">
    <div class="row">
        <div class="small-12 columns">
            <nav class="top-bar" data-topbar>
                <section class="top-bar-section">
                    <ul class="right">
                        <li class="has-dropdown">
                            <a href="#">Obchod</a>
                            <ul class="dropdown">
                                <li><a href="#">Test</a></li>
                                <li><a href="#">Nářadí Doležalova s.r.o.</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Kontakt</a></li>
                        <li><a href="#">Přihlásit se</a></li>
                        <li><a href="#">Košík</a></li>
                    </ul>
                    <ul class="left">
                        @include('web.global.boxsearch')
                    </ul>
                </section>
            </nav>
            @include('web.global.blocknav')
        </div>
    </div>

    <div id="menubox" class="row">
        <h1>Nákupní košík je tu</h1>
        @include('web.kosik.items')
        @include('web.kosik.order')
        <div class="row">
            <div class="large-6 columns">@include('web.kosik.delivery')</div>
            <div class="large-6 columns">@include('web.kosik.payment')</div>
        </div>
    </div>

    <p><a href="http://localhost:8000/adm/">ADM</a></p>
    <p><a href="http://localhost:8000/adminer/">ADMINER</a></p>
</div>
<script src="/web/guru.js"></script>
<script src="/web/js/ajax.js"></script>
</body>
</html>