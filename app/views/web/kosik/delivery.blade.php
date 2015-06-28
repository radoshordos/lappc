<h3>Zvolte způsob doručení</h3>
@if (!empty($buy_transport))
    @foreach($buy_transport as $bt)
        <p class="panel" id="transport">
            <input id="{{ $bt->alias }}" type="radio" required="required" autocomplete="off" name="delivery_id" value="{{ $bt->id }}" @if (!empty($customer) && $bt->id == $customer->delivery_id) checked="checked" @endif>
            <label for="{{ $bt->alias }}">{{ $bt->name }}</label>
            <strong>{{ ($bt->price_transport == 0 ? "ZDARMA" : $bt->price_transport." Kč") }}</strong>
        </p>
    @endforeach
@endif
