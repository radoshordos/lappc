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

        <div class="small-9 columns">

            @include('web.layout.boxdev')

            <div class="panel clearfix">
                {{ Form::open(['url' => '', 'files' => true]); }}
                    <a href="#" class="button"><input id="check" type="checkbox"><label for="check">Skladem</label></a>
                {{ Form::close() }}
            </div>

            <ul id="prodlist" class="small-block-grid-3">
                @foreach($vp_list as $row)
                    <li class="prod th radius">
                        <a href="{{ '/'.$row->tree_absolute .'/'. $row->prod_alias }}">
                            <h3>{{ $row->prod_name  }}</h3>
                            @if ($row->prod_id % 7 == 0)
                                <span class="akce">Šeky 40000 Kč</span>
                            @endif
                            <img src="{{ '/web/naradi/' . $row->tree_absolute .'/'. $row->prod_img_normal  }}" width="228" height="228">
                            @if ($row->prod_storeroom > 0)
                                <span class="success label">{{ $row->prod_storeroom }} ks skladem</span>
                            @else
                                <span class="secondary label">není skladem</span>
                            @endif
                            <span class="price label">{{ $row->query_price }} Kč</span>
                        </a>
                        <p>{{ $row->prod_desc }}</p>
                    </li>
                @endforeach;
            </ul>
            <div class="panel clearfix">
                <ul class="pagination">
                    <?php echo with(new ZurbPresenter($vp_list))->render(); ?>
                </ul>

            </div>
        </div>
    </div>
    <p><a href="http://localhost:8000/adm/">ADM</a></p>
    <p><a href="http://localhost:8000/adminer/">ADMINER</a></p>
</div>
<script src="/web/guru.js"></script>
<script src="/web/js/ajax.js"></script>
</body>
</html>