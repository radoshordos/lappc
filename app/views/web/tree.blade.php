<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="cs"> <![endif]-->
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
                <ul class="breadcrumbs">
                    <li><a href="#">Úvod</a></li>
                    <li><a href="#">Akumulátorové nářadí</a></li>
                    <li><a href="#">Aku kladiva</a></li>
                </ul>
            </div>
        </div>

    <div id="menubox" class="row">
            @include('web.layout.actionmenu')
            @include('web.layout.leftmenu')

                <div class="small-9 columns">

                    @include('web.layout.boxdev')

                    <div class="panel clearfix">
                        <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
                        <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
                        <a href="#" class="button tiny"><input id="checkbox2" type="checkbox">Skladem</a>
                        <span class="success radius label"><input id="che" type="checkbox"><label for="che">Skladem</label></span>
                    </div>

                    <ul id="prodlist" class="small-block-grid-3">
                        @foreach($view_prod as $row)
                            <li class="prod th radius">
                                <a href="{{ '/'.$row->tree_absolute .'/'. $row->prod_alias }}">
                                    <h3>{{ $row->prod_name  }}</h3>
                                    @if ($row->prod_id % 7 == 0)
                                        <span class="akce">Šeky 40000 Kč</span>
                                    @endif
                                    <img src="{{ '/web/naradi/' . $row->tree_absolute .'/'. $row->prod_img_normal  }}" width="228" height="228">
                                    <span class="success label">2 ks skladem</span>
                                    <span class="price label">{{ $row->query_price }} Kč</span>
                                </a>
                                <p>{{ $row->prod_desc }}</p>
                            </li>
                        @endforeach;
                    </ul>

                    <div class="panel clearfix">
                        <ul class="pagination">
                            <li class="arrow unavailable"><a href="">&laquo;</a></li>
                            <li class="current"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li class="unavailable"><a href="">&hellip;</a></li>
                            <li><a href="">12</a></li>
                            <li><a href="">13</a></li>
                            <li class="arrow"><a href="">&raquo;</a></li>
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