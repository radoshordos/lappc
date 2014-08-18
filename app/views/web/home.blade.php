<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en"> <![endif]-->
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation 5</title>
    <link rel="stylesheet" href="/web/components/foundation/css/normalize.css">
    <link rel="stylesheet" href="/web/components/foundation/css/foundation.css">
    <link rel="stylesheet" href="/web/my/app.css">
    <script src="/web/components/modernizr/modernizr.js"></script>
</head>
<body>
    <h1>Hello, world!</h1>

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
                                    <div class="row collapse">
                                        <div class="large-8 small-9 columns">
                                            <input type="search" size="42" placeholder="Nalést nářadí a příslušenství">
                                        </div>
                                        <div class="large-4 small-3 columns">
                                            <a href="#"  class="alert button expand">Hledat</a>
                                        </div>
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
                <div class="small-3 columns">
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

            <div class="small-9 columns">
                <dl class="sub-nav">
                    <dt>Výrobce:</dt>
                    <dd class="active"><a href="#">Vše</a></dd>
                    <dd><a href="#">Narex<span>5</span></a></dd>
                    <dd><a href="#">Makita<span>15</span></a></dd>
                    <dd><a href="#">Maktec</a></dd>
                    <dd><a href="#">Metabo</a></dd>
                    <dd><a href="#">Proteco</a></dd>
                    <dd><a href="#">Worx</a></dd>
                    <dd><a href="#">Tona</a></dd>
                </dl>

                <div class="large-6 columns">
                    <label>Začekuj</label>
                    <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
                    <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
                </div>

                <div class="small-3 columns" style="background-color: #b9def0;padding: 3px">
                    Test
                </div>

            </div>
        </div>
        <p><a href="http://localhost:8000/adm/">ADM</a></p>
        <p><a href="http://localhost:8000/adminer/">ADMINER</a></p>
    </div>

    <script src="/web/components/jquery/jquery.min.js"></script>
    <script src="/web/components/foundation/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>