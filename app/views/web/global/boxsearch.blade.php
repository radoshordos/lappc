<li class="has-form">
    {{ Form::open(['url' => '/vyhledat-zbozi', 'method' => 'GET', 'files' => true]); }}
    <div class="row collapse">
        <div class="large-14 small-14 columns ui-widget">
            {{ Form::input('search','term', $term,['size' => '42', 'id' => 'term', "placeholder" => "Nalést nářadí i příslušenství"]) }}
        </div>
        <div class="large-4 small-4 columns">
            {{ Form::submit('Hledat', ['class' => 'success button expand']) }}
        </div>
    </div>
    {{ Form::close() }}
</li>