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

            <div class="row">
                <div class="large-5 columns">
                     <a class="th" role="button" aria-label="Thumbnail" href="{{ '/web/naradi/' . $vp->tree_absolute .'/'. $vp->prod_img_big }}">
                         <img aria-hidden="true" src="{{ '/web/naradi/' . $vp->tree_absolute .'/'. $vp->prod_img_normal }}"/>
                     </a>
                </div>
                <div class="large-7 columns">
                    <p>{{ $vp->prod_desc }}</p>




                    <div class="row">
                        <div class="large-4 columns">Vaše cena:</div>
                        <div class="large-4 columns">
                        {{ $vp->query_price }} Kč<br />včetně DPH a všech poplatků
                        </div>
                        <div class="large-4 columns"><input name="do-kosiku" style="max-width: 10em" class="alert button expand" type="submit" title="Vložit {{ $vp->prod_name }} do košíku" value="Do košíku"></div>
                    </div>
                    <div class="row"></div>



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





            @foreach($pd_list as $pd)
                  <div class="row">
                   <h3>{{ $pd->mediaVariations->name }}</h3>
                  <ul class="prod-desc">
                        <li>{{ str_replace("\r\n", "</li><li>", $pd->data) }}</li>
                  </ul>
                  </div>
            @endforeach

        </div>
    </div>
    <p><a href="http://localhost:8000/adm/">ADM</a></p>

    <p><a href="http://localhost:8000/adminer/">ADMINER</a></p>
</div>
<script src="/web/guru.js"></script>
<script src="/web/js/ajax.js"></script>
</body>
</html>