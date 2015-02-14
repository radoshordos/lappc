<fieldset>
    <legend>Zvolte způsob doručení</legend>
    @if (!empty($buy_transport))
        @foreach($buy_transport as $bt)
            <div class="row">
                <div class="large-17 columns small-centered">
                    @if (!empty($customer) && $bt->id == $customer->delivery_id)
                        <div class="small-1 columns"><input id="{{ $bt->alias }}" type="radio" required="required" autocomplete="off" name="delivery_id" value="{{ $bt->id }}" checked="checked"></div>
                    @else
                        <div class="small-1 columns"><input id="{{ $bt->alias }}" type="radio" required="required" autocomplete="off" name="delivery_id" value="{{ $bt->id }}"></div>
                    @endif
                    <div class="small-9 columns"><label for="{{ $bt->alias }}">{{ $bt->name }}</label></div>
                    <div class="small-3 columns"><strong>{{ ($bt->price_transport == 0 ? "ZDARMA" : $bt->price_transport." Kč") }}</strong></div>
                </div>
            </div>
        @endforeach
    @endif
</fieldset>