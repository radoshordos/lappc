<h3>Zvolte způsob doručení</h3>
@if (!empty($buy_transport))
    @foreach($buy_transport as $bt)
        <div class="panel callout radius">
            <div class="row">
                <div class="medium-10 columns">
                    <input id="{{ $bt->alias }}" type="radio" autocomplete="off" name="delivery_id" value="{{ $bt->id }}" @if (!empty($customer) && $bt->id == $customer->delivery_id) checked="checked" @endif>
                    <label for="{{ $bt->alias }}">{{ $bt->name }}</label>
                </div>
                <div class="medium-3 columns">
                    <strong>{{ ($bt->price_transport == 0 ? "Zdarma" : $bt->price_transport." Kč") }}</strong>
                </div>
                <div class="medium-4 columns">
                    {{ $bt->image ? '<img src="/web/img/transport/'. $bt->image .'"/>' : ""}}
                </div>
            </div>
        </div>
    @endforeach
@endif
