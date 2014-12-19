<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="cs"> <![endif]-->
<html class="no-js" lang="cs">


@include('web.global.blockhead')
<body>
<h1>Hello, world!</h1>
Registrace & Přihlášení
<div id="container" style="border: 1px solid #666">
    @include('web.global.top')

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
                                    <img src="{{ "/web/naradi/". $item->prod->tree->absolute."/". $vpa->getProdImgNormal() }}" width="114" height="114">
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