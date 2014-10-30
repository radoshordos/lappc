<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en"> <![endif]-->
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, world!</title>
    <link rel="stylesheet" href="/web/components/foundation/css/normalize.css">
    <link rel="stylesheet" href="/web/components/foundation/css/foundation.css">
    <link rel="stylesheet" href="/web/components/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/web/my/app.css">
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

            <div class="row">
                <div class="small-3 columns" style="border: 1px solid #86D2B6">
                    <nav>
                        <ul>
                            <li><a href="#">Akumulátorové nářadí</a>
                                <ul>
                                  <li><a href="#">Aku šroubováky</a></li>
                                  <li><a href="#">Aku úhlové vrtačky</a></li>
                                  <li><a href="#">Aku brusky</a></li>
                                  <li><a href="#">Aku kladiva</a></li>
                                  <li><a href="#">Aku pily</a></li>
                                </ul>
                              </li>
                            <li><a href="#">Elektrické nářadí</a></li>
                            <li><a href="#">Vzduchové nářadí</a></li>
                            <li><a href="#">Motorové nářadí</a></li>
                            <li><a href="#">Ruční nářadí</a></li>
                            <li><a href="#">Zahradní technika</a></li>
                            <li><a href="#">Příslušenství</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="small-9 columns" style="border: 1px solid #86D2B6">
                <dl class="sub-nav">
                    <dt>Výrobce:</dt>
                    <dd class="active"><a href="#">Vše</a></dd>
                    <dd><a href="#">Narex <span>(5)</span></a></dd>
                    <dd><a href="#">Makita <span>(15)</span></a></dd>
                    <dd><a href="#">Maktec</a></dd>
                    <dd><a href="#">Metabo</a></dd>
                    <dd><a href="#">Proteco</a></dd>
                    <dd><a href="#">Worx</a></dd>
                    <dd><a href="#">Tona</a></dd>
                </dl>

                <div class="small-12 columns">
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
                                <img src="/web/naradi/200/festool-df-500-q-plus.jpg" width="200" height="200">
                                <span class="success label">2 ks skladem</span>
                                <span class="label">3690 Kč</span>
                            </a>

                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Makita DST221Z</h3>
                                <img src="/web/naradi/200/makita-dst221z.jpg">
                            </a>

                            <p>Aku sponkovačka Makita DST221Z, Li-ion 18V,bez aku</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Metabo BS 14,4 LT 4.0 Ah</h3>
                                <img src="/web/naradi/200/metabo-bs-144-li-cbbad593b8cbf379.jpg">

                            </a>

                            <p>Akumulátorový vrtací šroubovák Metabo BS 14,4 LT 14,4V Li-Ion, 4Ah</p>
                            <span class="success label">2 ks skladem</span>
                            <span class="label">3690 Kč</span>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/200/festool-df-500-q-plus.jpg" width="200" height="200">
                                <span class="success label">2 ks skladem</span>
                                <span class="label">3690 Kč</span>
                            </a>

                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Makita DST221Z</h3>
                                <img src="/web/naradi/200/makita-dst221z.jpg">
                            </a>

                            <p>Aku sponkovačka Makita DST221Z, Li-ion 18V,bez aku</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Metabo BS 14,4 LT 4.0 Ah</h3>
                                <img src="/web/naradi/200/metabo-bs-144-li-cbbad593b8cbf379.jpg">

                            </a>

                            <p>Akumulátorový vrtací šroubovák Metabo BS 14,4 LT 14,4V Li-Ion, 4Ah</p>
                            <span class="success label">2 ks skladem</span>
                            <span class="label">3690 Kč</span>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/200/festool-df-500-q-plus.jpg" width="200" height="200">
                                <span class="success label">2 ks skladem</span>
                                <span class="label">3690 Kč</span>
                        </a>
                        <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Makita DST221Z</h3>
                                <img src="/web/naradi/200/makita-dst221z.jpg">
                            </a>

                            <p>Aku sponkovačka Makita DST221Z, Li-ion 18V,bez aku</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Metabo BS 14,4 LT 4.0 Ah</h3>
                                <img src="/web/naradi/200/metabo-bs-144-li-cbbad593b8cbf379.jpg">

                            </a>

                            <p>Akumulátorový vrtací šroubovák Metabo BS 14,4 LT 14,4V Li-Ion, 4Ah</p>
                            <span class="success label">2 ks skladem</span>
                            <span class="label">3690 Kč</span>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/200/festool-df-500-q-plus.jpg" width="200" height="200">
                                <span class="success label">2 ks skladem</span>
                                <span class="label">3690 Kč</span>
                            </a>

                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Makita DST221Z</h3>
                                <img src="/web/naradi/200/makita-dst221z.jpg">
                            </a>

                            <p>Aku sponkovačka Makita DST221Z, Li-ion 18V,bez aku</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Metabo BS 14,4 LT 4.0 Ah</h3>
                                <img src="/web/naradi/200/metabo-bs-144-li-cbbad593b8cbf379.jpg"/>

                            </a>

                            <p>Akumulátorový vrtací šroubovák Metabo BS 14,4 LT 14,4V Li-Ion, 4Ah</p>
                            <span class="success label">2 ks skladem</span>
                            <span class="label">3690 Kč</span>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/200/festool-df-500-q-plus.jpg" width="200" height="200">
                                <span class="success label">2 ks skladem</span>
                                <span class="label">3690 Kč</span>
                            </a>

                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Makita DST221Z</h3>
                                <img src="/web/naradi/200/makita-dst221z.jpg">
                            </a>

                            <p>Aku sponkovačka Makita DST221Z, Li-ion 18V,bez aku</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Metabo BS 14,4 LT 4.0 Ah</h3>
                                <img src="/web/naradi/200/metabo-bs-144-li-cbbad593b8cbf379.jpg"/>

                            </a>

                            <p>Akumulátorový vrtací šroubovák Metabo BS 14,4 LT 14,4V Li-Ion, 4Ah</p>
                            <span class="success label">2 ks skladem</span>
                            <span class="label">3690 Kč</span>
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
                    console.log(ui);
                    $('#response').val(ui.item.id);
                }
            });
        });
    </script>
</body>
</html>