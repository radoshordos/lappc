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
        <h1>Nákupní košík 1 je tu</h1>

        @include('web.kosik.flow')

        {{ Form::open(['action' => 'KosikController@store','class' => 'form-horizontal', 'role' => 'form']) }}

        @include('web.kosik.items_all')

        <div class="small-11 large-centered columns">
            <div class="row">

                <div class="row">
                    <div class="large-6 columns">@include('web.kosik.delivery')</div>
                    <div class="large-6 columns">@include('web.kosik.payment')</div>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="large-12 columns text-center">
                {{ Form::submit('Zadej kontakt',['name'=> 'zadej-kontakt','class' => 'button success']); }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@include('web.global.scripts')
</body>
</html>