<div class="row">
    <div class="small-18 large-centered columns">
        <div id="buy-flow" class="row">
            @if ($krok == 3)
                <div class="small-6 columns"><a href="/nakupni-kosik">1) Zboží, doručení a platba</a></div>
                <div class="small-6 columns"><a href="/nakupni-kosik?krok=zadani-kontaktnich-udaju">2) Kontaktní údaje</a></div>
                <div class="small-6 columns"><strong><i class="fa fa-eye success"></i> 3) Souhrn</strong></div>
            @elseif($krok == 2)
                <div class="small-6 columns"><a href="/nakupni-kosik">1) Zboží, doručení a platba</a></div>
                <div class="small-6 columns"><strong><i class="fa fa-eye success"></i> 2) Kontaktní údaje</strong></div>
                <div class="small-6 columns">3) Souhrn</div>
            @else
                <div class="small-6 columns"><strong><i class="fa fa-eye success"></i> 1) Zboží, doručení a platba</strong></div>
                <div class="small-6 columns">2) Kontaktní údaje</div>
                <div class="small-6 columns">3) Souhrn</div>
            @endif
        </div>
    </div>
</div>

<!-- Triggers the modals -->
<a href="#" data-reveal-id="firstModal" class="radius button">Modal in a modal&hellip;</a>
<a href="#" data-reveal-id="videoModal" class="radius button">Example Modal with Video&hellip;</a>

<!-- Reveal Modals begin -->
<div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
    <h2 id="firstModalTitle">This is a modal.</h2>
    <p>Reveal makes these very easy to summon and dismiss. The close button is simply an anchor with a unicode character icon and a class of <code>close-reveal-modal</code>. Clicking anywhere outside the modal will also dismiss it.</p>
    <p>Finally, if your modal summons another Reveal modal, the plugin will handle that for you gracefully.</p>
    <p><a href="#" data-reveal-id="secondModal" class="secondary button">Second Modal...</a></p>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="secondModal" class="reveal-modal" data-reveal aria-labelledby="secondModalTitle" aria-hidden="true" role="dialog">
    <h2 id="secondModalTitle">This is a second modal.</h2>
    <p>See? It just slides into place after the other first modal. Very handy when you need subsequent dialogs, or when a modal option impacts or requires another decision.</p>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="videoModal" class="reveal-modal large" data-reveal aria-labelledby="videoModalTitle" aria-hidden="true" role="dialog">
    <h2 id="videoModalTitle">This modal has video</h2>
    <div class="flex-video widescreen vimeo">
        <iframe width="1280" height="720" src="//www.youtube-nocookie.com/embed/wnXCopXXblE?rel=0" frameborder="0" allowfullscreen></iframe>
    </div>

    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
<!-- Reveal Modals end -->