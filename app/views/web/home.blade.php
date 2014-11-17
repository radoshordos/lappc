<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="cs"> <![endif]-->
<html class="no-js" lang="cs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, world!</title>
    <link rel="stylesheet" href="/web/components/foundation/css/normalize.css">
    <link rel="stylesheet" href="/web/components/foundation/css/foundation.css">
    <link rel="stylesheet" href="/web/components/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/web/my/app.css">
    <link rel="stylesheet" href="/web/my/jtree.css">
</head>
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
                    <!-- Left Nav Section -->
                    <ul class="left">
                        <li class="has-form">
                            {{ Form::open(array('url' => '', 'files' => true)); }}
                            <div class="row collapse">
                                <div class="large-8 small-9 columns ui-widget">
                                    {{ Form::input('search','term',$term,['size' => '42', 'id' => 'term', "placeholder" => "Nalést nářadí i příslušenství"]) }}
                                    </div>
                                <div class="large-4 small-3 columns">
                                    {{-- Form::input('text','response',NULL,['id' => 'response','disabled']) --}}
                                    {{ Form::submit('Hledat', ['name' => 'submitsearch','class' => 'alert button expand']) }}
                                </div>
                                {{ Form::close() }}
                            </div>
                        </li>
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
            @include('web.layout.leftmenu')

                <div class="small-9 columns">

                    <div class="panel clearfix">
                        <dl id="dev-container" class="sub-nav">
                            <dt>Výrobci:</dt>
                            <dd class="active"><a href="#">Všichni</a></dd>
                            <dd><a href="#">Narex <span>(5)</span></a></dd>
                            <dd><a href="#">Makita <span>(15)</span></a></dd>
                            <dd><a href="#">Maktec<span>(1)</span></a></dd>
                            <dd><a href="#">Metabo<span>(8)</span></a></dd>
                            <dd><a href="#">Proteco<span>(5)</span></a></dd>
                            <dd><a href="#">Worx<span>(18)</span></a></dd>
                            <dd><a href="#">Tona<span>(2)</span></a></dd>
                        </dl>
                    </div>

                    <div class="panel clearfix">
                        <label>Začekuj</label>
                        <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
                        <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
                        <a href="#" class="button tiny"><input id="checkbox2" type="checkbox">Skladem</a>
                        <span class="success radius label"><input id="che" type="checkbox"><label for="che">Skladem</label></span>
                    </div>

                    <ul id="prodlist" class="small-block-grid-3">
                        @foreach($prod_list as $row)
                            <li class="prod th radius">
                                <a href="/ddd">
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
        <p><a href="http://localhost:8000/adm/">ADM</a></p>
        <p><a href="http://localhost:8000/adminer/">ADMINER</a></p>
    </div>

    <script src="/web/guru.js"></script>
    <script>
        $(document).foundation();
        $(function() {
            $('#term').autocomplete({
                source: 'getdata',
                minLength: 1,
                select:function(e,ui) {
                    $('#response').val(ui.item.id);
                }
            });
        });
    </script>
</body>
</html>