@include('web.global.blockhead')
<body>
<div class="row">
    <div class="large-18" id="begin">

        @include('web.global.top')
        <div class="row">
            <div id="part-left" class="medium-4 large-4 columns">
                @include('web.global.leftmenu')
            </div>
            <div id="part-right" class="medium-14 large-14 columns">
                <div id="shoptext">
                    {{ $tree_text->text }}
                </div>
            </div>
        </div>
        @include('web.global.footer')
        @include('web.global.scripts')
    </div>
</div>
</body>
</html>