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
                    <li><a href="/kontakt">Kontakt</a></li>
                    <li><a href="#">Přihlásit se</a></li>
                    <ul class="right">
                        <li class="has-dropdown">
                            <a href="/nakupni-kosik"><i class="fa fa-shopping-cart fa-lg"></i> Košík {{ $buy_box_price }}</a>
                            <ul class="dropdown">
                                <li><a href="#">First link in dropdown h fgh fgh fh fh f</a></li>
                                <li><a href="#">Active link inh dropdown</a></li>
                                <li>
                                    <a><img src="/web/naradi/vrtaky-sekace/bity-sady/metabo-630454.jpg" alt="Metabo sada bitů a vrtáků IV" width="50" height="50"> fgh fh fh f</a>
                                </li>


                            </ul>
                        </li>
                    </ul>
                </ul>
                <ul class="left">
                    @include('web.global.boxsearch')
                </ul>
            </section>
        </nav>
        @include('web.global.blocknav')
    </div>
</header>
