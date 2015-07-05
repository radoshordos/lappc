<div class="row">
    <div class="small-18 large-centered columns">
        <div id="buy-flow" class="row">
            @if ($krok == 3)
                <div class="small-6 columns"><a href="/nakupni-kosik">1) Obsah košíku</a></div>
                <div class="small-6 columns"><a href="/nakupni-kosik?krok=doruceni-a-zpusoby-platby">2) Doručení a platba</a></div>
                <div class="small-6 columns"><strong><i class="fa fa-eye success"></i> 3) Kontaktní údaje</strong></div>
            @elseif($krok == 2)
                <div class="small-6 columns"><a href="/nakupni-kosik">1) Obsah košíku</a></div>
                <div class="small-6 columns"><strong><i class="fa fa-eye success"></i> 2) Doručení a platba</strong></div>
                <div class="small-6 columns">3) Kontaktní údaje</div>
            @else
                <div class="small-6 columns"><strong><i class="fa fa-eye success"></i> 1) Obsah košíku</strong></div>
                <div class="small-6 columns">2) Doručení a platba</div>
                <div class="small-6 columns">3) Kontaktní údaje</div>
            @endif
        </div>
    </div>
</div>
