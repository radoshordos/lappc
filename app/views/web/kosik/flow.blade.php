<div class="row">
    <div class="small-18 large-centered columns">
        <div id="buy-flow" class="row">
            @if ($krok == 3)
                <div class="large-18 columns">
                    <a href="/nakupni-kosik">
                        <i class="fa fa-check-square fa-2x"></i>
                        <span>Košík, doprava a platba</span>
                    </a>
                </div>
                <div class="large-18 columns">
                    <a href="/nakupni-kosik?krok=zadani-kontaktnich-udaju">2] Kontaktní údaje</a>
                </div>
                <div class="large-18 columns">
                    <a href="/nakupni-kosik?krok=souhrn-objednavky">3] Souhrn</a>
                </div>
            @elseif($krok == 2)
                <div class="small-18 columns">
                    <a href="/nakupni-kosik">
                        <i class="fa fa-check-square fa-2x"></i>
                        <span>Košík, Doprava a platba</span>
                    </a>
                </div>
                <div class="small-18 columns">
                    <a href="/nakupni-kosik?krok=zadani-kontaktnich-udaju">2] Kontaktní údaje</a>
                </div>
                <div class="small-18 columns">3] Souhrn</div>
            @else
                <ul class="button-group even-3">
                    <li><a href="/nakupni-kosik" class="button secondary actual"><i class="fa fa-lg">1</i> Košík, doprava a platba</a></li>
                    <li class="text-center"><i class="fa fa-lg">2</i> Kontaktní údaje</li>
                    <li><a href="#" class="button secondary"><i class="fa fa-lg">3 Souhrn</i> Souhrn</a></li>
                </ul>
            @endif
        </div>
    </div>
</div>