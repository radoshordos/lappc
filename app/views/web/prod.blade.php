@include('web.global.blockhead')
<body>
<div id="container">
    @include('web.global.top')

    <?php $vpa = (new \Authority\Mapper\ViewProdMapper)->fetchRow($view_prod_actual); ?>

    <div class="row">
        <div id="part-left" class="medium-4 columns">
            @include('web.global.leftmenu')
        </div>
        <div id="part-right" class="medium-14 columns">

            <h1>{{ $vpa->getProdNameWithBonus(); }}</h1>

            <div id="product" class="row">
                <div class="medium-6 columns">
                    <a class="gallery th" role="button" aria-label="Thumbnail" href="{{ $vpa->getProdImgBigWithDir() }}">
                        <img aria-hidden="true" src="{{ $vpa->getProdImgNormalWithDir() }}" alt="{{ $vpa->getProdName() }}"/>
                    </a>
                </div>
                <div class="medium-12 columns">
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
                @include('web.prod.description')
            </div>
        </div>
    </div>
</div>
@include('web.global.scripts')
</body>
</html>