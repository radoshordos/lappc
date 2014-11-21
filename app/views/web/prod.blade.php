<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="cs"> <![endif]-->
<html class="no-js" lang="cs">

@include('web.layout.blockhead')
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
                        @include('web.layout.boxsearch')
                    </ul>
                </section>
            </nav>
            @include('web.layout.blocknav')
        </div>
    </div>

    <div id="menubox" class="row">
        @include('web.layout.actionmenu')
        @include('web.layout.leftmenu')
        <div id="product" class="small-9 columns">

            <h1>{{ $vp->prod_name; }}</h1>

            <a class="th" role="button" aria-label="Thumbnail" href="{{ '/web/naradi/' . $vp->tree_absolute .'/'. $vp->prod_img_big }}">
                <img aria-hidden="true" src="{{ '/web/naradi/' . $vp->tree_absolute .'/'. $vp->prod_img_normal }}"/>
            </a>

            {{ $vp->query_price }} Kč

        </div>
    </div>
    <p><a href="http://localhost:8000/adm/">ADM</a></p>

    <p><a href="http://localhost:8000/adminer/">ADMINER</a></p>
</div>
<script src="/web/guru.js"></script>
<script src="/web/js/ajax.js"></script>
</body>
</html>