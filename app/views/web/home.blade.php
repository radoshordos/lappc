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
    <div class="small-3 columns">
                @foreach($tree_group as $row)
        <div class="icon-bar vertical">
                <a class="item">
                    <label>{{ $row->name }}</label>
                </a>
                </div>
        @if($row->id == 22)
        <ul style="display: block">
            <li><a href="#">Aku šroubováky</a></li>
            <li><a href="#">Aku úhlové vrtačky</a></li>
            <li><a href="#">Aku brusky</a></li>
            <li><a href="#">Aku kladiva</a></li>
            <li><a href="#">Aku pily</a></li>
        </ul>
        @endif
                @endforeach
            </div>

                <div class="small-9 columns">
                    <dl id="dev-container" class="sub-nav">
                        <dt>Výrobci:</dt>
                        <dd class="active"><a href="#">Všichni</a></dd>
                        <dd><a href="#">Narex <span>(5)</span></a></dd>
                        <dd><a href="#">Makita <span>(15)</span></a></dd>
                        <dd><a href="#">Maktec<span>(1)</span></a></dd>
                        <dd><a href="#">Metabo<span>(8)</span></a></dd>
                        <dd><a href="#">Proteco</a></dd>
                        <dd><a href="#">Worx</a></dd>
                        <dd><a href="#">Tona</a></dd>
                    </dl>


                    <div class="small-9 columns">
                    <label>Začekuj</label>
                    <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
                    <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
                    <a href="#" class="button tiny"><input id="checkbox2" type="checkbox">Skladem</a>
                    <span class="success radius label"><input id="che" type="checkbox"><label for="che">Skladem</label></span>
                </div>

                    <ul id="prodlist" class="small-block-grid-3">
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <span class="akce">Šeky 40000 Kč</span>
                                <img src="/web/naradi/228/maktec-mt070e-6a93372b.jpg" width="228" height="228">
                                <span class="success label">2 ks skladem</span>
                                <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/228/maktec-mt070e-8ce42857.jpg" width="228" height="228">
                                <span class="success label">1-2 dny</span>
                                <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <span class="akce">AKCE</span>
                                <img src="/web/naradi/228/maktec-mt070e-773f6fe0.jpg" width="228" height="228">
                                    <span class="success label">na objednávku</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <span class="akce">Šeky 40000 Kč</span>
                                <img src="/web/naradi/228/maktec-mt070e-6a93372b.jpg" width="228" height="228">
                                <span class="success label">2 ks skladem</span>
                                <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/228/maktec-mt070e-8ce42857.jpg" width="228" height="228">
                                <span class="success label">1-2 dny</span>
                                <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <span class="akce">AKCE</span>
                                <img src="/web/naradi/228/maktec-mt070e-773f6fe0.jpg" width="228" height="228">
                                    <span class="success label">na objednávku</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <span class="akce">Šeky 40000 Kč</span>
                                <img src="/web/naradi/228/maktec-mt070e-6a93372b.jpg" width="228" height="228">
                                <span class="success label">2 ks skladem</span>
                                <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/228/dewalt-dcd732m2.jpg" width="228" height="228">
                                <span class="success label">1-2 dny</span>
                                <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <span class="akce">AKCE</span>
                                <img src="/web/naradi/228/maktec-mt070e-773f6fe0.jpg" width="228" height="228">
                                    <span class="success label">na objednávku</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <span class="akce">Šeky 40000 Kč</span>
                                <img src="/web/naradi/228/maktec-mt070e-6a93372b.jpg" width="228" height="228">
                                <span class="success label">2 ks skladem</span>
                                <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/228/makita-bda340rfj.jpg" width="228" height="228">
                                <span class="success label">1-2 dny</span>
                                <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <span class="akce">AKCE</span>
                                <img src="/web/naradi/228/maktec-mt070e-773f6fe0.jpg" width="228" height="228">
                                    <span class="success label">na objednávku</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <span class="akce">Šeky 40000 Kč</span>
                                <img src="/web/naradi/228/maktec-mt070e-6a93372b.jpg" width="228" height="228">
                                <span class="success label">2 ks skladem</span>
                                <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/228/maktec-mt070e-8ce42857.jpg" width="228" height="228">
                                <span class="success label">1-2 dny</span>
                                <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <span class="akce">AKCE</span>
                                <img src="/web/naradi/228/makita-bfl120fz.jpg" width="228" height="228">
                                    <span class="success label">na objednávku</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
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