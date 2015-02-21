<header class="row">
    <div class="small-18 columns">
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
                    <li><a href="#">Přihlásit se</a></li>
                    <ul class="right">


                        <!--
                            <a href="/nakupni-kosik"><i class="fa fa-shopping-cart fa-lg"></i> Košík {{ $buy_box_price }}</a>
                            <ul class="dropdown">
                                <li><a href="#">First link in dropdown h fgh fgh fh fh f</a></li>
                                <li><a href="#">Active link inh dropdown</a></li>
                                <li>
                                    <a><img src="/web/naradi/vrtaky-sekace/bity-sady/metabo-630454.jpg" alt="Metabo sada bitů a vrtáků IV" width="50" height="50"> fgh fh fh f</a>
                                </li>


                            </ul>
-->
                        </li>
                    </ul>
                </ul>
                <ul class="left">
                    @include('web.global.boxsearch')
                </ul>
            </section>
        </nav>
        @include('web.global.blocknav')
        <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
            <li class="has-dropdown">
                <a href="#" data-dropdown="hover1" data-options="is_hover:true; hover_timeout:0">Nářadí</a>
                <div id="hover1" class="f-dropdown content" data-dropdown-content>
                    <div class="row">
                        <div class="small-18">Elektrické nářadí</div>
                    </div>
                    <div class="row">
                        <div class="small-18">Akumulátorové nářadí</div>
                    </div>
                    <div class="row">
                        <div class="small-18">Pneu nářadí</div>
                    </div>
                    <div class="row">
                        <div class="small-18">Ruční nářadí</div>
                    </div>
                    <div class="row">
                        <div class="small-18">Měřící technika gfdgg dgdg fdg dg dg dg fdg fdgfdg fdg dfg fdg</div>
                    </div>
                </div>
            </li>
            <li class="has-dropdown">
                <a href="#" data-dropdown="hover2" data-options="is_hover:true; hover_timeout:500">Zahrada</a>
                <div id="hover2" class="f-dropdown mega" data-dropdown-content>
                    <table role="grid">
                        <tr>
                            <td>Různé</td>
                            <td>Různé</td>
                        </tr>
                        <tr>
                            <td>Příslušenství</td>
                            <td>Příslušenství</td>
                        </tr>
                    </table>
                </div>
            </li>
            <li class="has-dropdown">
                <a href="#" data-dropdown="hover3" data-options="is_hover:true; hover_timeout:500">Stroje</a>
                <div id="hover3" class="f-dropdown mega" data-dropdown-content>
                    <div class="row">
                        <div class="small-2 large-4 columns">TEST1</div>
                        <div class="small-4 large-4 columns">TEST2</div>
                        <div class="small-6 large-4 columns">TEST3</div>
                    </div>
                    <div class="row">
                        <div class="small-2 large-4 columns">TEST4</div>
                        <div class="small-4 large-4 columns">TEST5</div>
                        <div class="small-6 large-4 columns">TEST6</div>
                    </div>
                    <div class="row">
                        <div class="small-2 large-4 columns">TEST7</div>
                        <div class="small-4 large-4 columns">TEST8</div>
                        <div class="small-6 large-4 columns">TEST9</div>
                    </div>
                </div>
            </li>
            <li class="has-dropdown">
                <a href="#" data-dropdown="hover4" data-options="is_hover:true; hover_timeout:500">Příslušenství</a>

                <div id="hover4" class="f-dropdown content" data-dropdown-content>
                    <div class="row">
                        <div class="small-18">Různé</div>
                    </div>
                    <div class="row">
                        <div class="small-18">Příslušenství</div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
