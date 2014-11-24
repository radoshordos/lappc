<li class="has-form">
    {{ Form::open(['url' => '', 'files' => true]); }}
    <div class="row collapse">
        <div class="large-8 small-9 columns ui-widget">
            {{ Form::input('search','term',$term,['size' => '42', 'id' => 'term', "placeholder" => "Nalést nářadí i příslušenství"]) }}
        </div>
        <div class="large-4 small-3 columns">
            {{ Form::submit('Hledat', ['name' => 'submitsearch','class' => 'alert button expand']) }}
        </div>
    </div>
    {{ Form::close() }}
</li>