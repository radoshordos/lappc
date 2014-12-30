<div class="row">
    <div class="small-16 large-centered columns">
        <div id="buy-flow" class="row">
            @if ($krok == 3)
                <div class="small-6 columns"><a href="/nakupni-kosik">1] Košík, Doprava a platba</a></div>
                <div class="small-6 columns"><a href="/nakupni-kosik?krok=zadani-kontaktnich-udaju">2] Kontaktní údaje</a></div>
                <div class="small-6 columns"><a href="/nakupni-kosik?krok=souhrn-objednavky">3] Souhrn</a></div>
            @elseif($krok == 2)
                <div class="small-6 columns"><a href="/nakupni-kosik">1] Košík, Doprava a platba</a></div>
                <div class="small-6 columns"><a href="/nakupni-kosik?krok=zadani-kontaktnich-udaju">2] Kontaktní údaje</a></div>
                <div class="small-6 columns">3] Souhrn</div>
            @else
                <div class="small-6 columns"><a href="/nakupni-kosik">1] Košík, Doprava a platba</a></div>
                <div class="small-6 columns">2] Kontaktní údaje</div>
                <div class="small-6 columns">3] Souhrn</div>
            @endif
        </div>
    </div>
</div>