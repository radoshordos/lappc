<h3>Zvolte způsob doručení</h3>
@if (!empty($buy_transport))
    @foreach($buy_transport as $bt)
        <p class="panel">
            <input id="{{ $bt->alias }}" type="radio" autocomplete="off" name="delivery_id" value="{{ $bt->id }}" @if (!empty($customer) && $bt->id == $customer->delivery_id) checked="checked" @endif>
            <label for="{{ $bt->alias }}">{{ $bt->name }}</label>
            <strong>{{ ($bt->price_transport == 0 ? "ZDARMA" : $bt->price_transport." Kč") }}</strong>

            <br/>
            Česká pošta garantuje doručení přímo do ruky na Vámi zvolenou adresu následující pracovní den po podání zásilky. V den podání Vás budeme prostřednictvím SMS a e-mailu informovat o stavu doručování balíku. Pokud Vás doručovatel nezastihne,
            zásilka zůstane uložena na Vaší dodací poště, kde si jí můžete osobně vyzvednout do 7 kalendářních dnů.
        </p>
    @endforeach
@endif
