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

    <?php $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($view_prod_actual); ?>

    <div id="menubox" class="row">
        @include('web.global.leftmenu')
        <div id="product" class="small-9 columns">

            <h1>{{ $vpa->getProdNameWithBonus(); }}</h1>

            <div class="row">
                <div class="large-4 columns">
                    <a class="th" role="button" aria-label="Thumbnail" href="{{ $vpa->getProdImgBigWithDir() }}">
                        <img aria-hidden="true" src="{{ $vpa->getProdImgNormalWithDir() }}"/>
                    </a>
                </div>
                <div class="large-8 columns">
                    <p id="desc">{{ $vpa->getProdDesc() }}</p>
                    @include('web.prod.panel_price')
                    @include('web.prod.panel_information')
                    @if (isset($mi_row) && $mi_row->items != NULL)
                        <div class="row">ZDARMA</div>
                        @foreach($mi_row->items as $item)
                            <div class="row">
                                <a class="th" role="button" aria-label="Thumbnail" href="">
                                    <img src="{{ "/web/naradi/". $item->prod->tree->absolute."/". $item->prod->img_normal}}" width="114" height="114">
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            @include('web.prod.description')
        </div>
    </div>
</div>
<script src="/web/guru.js"></script>
<script src="/web/js/ajax.js"></script>
</body>
</html>