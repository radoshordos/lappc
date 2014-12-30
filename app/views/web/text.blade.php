@include('web.global.blockhead')
<body>
<div id="container">
    <header>
        @include('web.global.top')
    </header>

    <div class="row"> 
        <div id="part-left" class="medium-4 columns">
            @include('web.global.leftmenu')
        </div>
        <div id="part-right" class="medium-14 columns">
            <iframe class="medium-18" height="700" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBgGUy-fZH3M2kZPJtAQ4CsdJHRu0KtZG4&q=Doležalová+s.r.p+Benešov+ČR&zoom=14"></iframe>
        </div>
    </div>
</div>
@include('web.global.footer')
@include('web.global.scripts')
</body>
</html>