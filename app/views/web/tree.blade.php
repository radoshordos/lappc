<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="cs"> <![endif]-->
<html class="no-js" lang="cs">

@include('web.global.blockhead')
<body>
<h1>Hello, world!</h1>
Registrace & Přihlášení
<div id="container" style="border: 1px solid #666">
    @include('web.global.top')

    <div id="menubox" class="row">
        @include('web.global.leftmenu')
        <div class="small-9 columns">
            <h2>{{ $view_tree_actual->tree_desc }}</h2>
            @include('web.tree.boxdev')
            <div class="small-12 panel clearfix valign-middle">
                <div id="prod-filter" class="small-4 columns">
                    @include('web.tree.blockprodfilter')
                </div>
                <div id="prod-sort" class="small-8 columns">
                    @include('web.tree.boxsorting')
                </div>
            </div>
            @include('web.tree.boxprodlist')
        </div>
    </div>
</div>
@include('web.global.scripts')
</body>
</html>