<fieldset id="payment">
    <legend>Zvolte způsob platby</legend>
    @if (!empty($buy_payment))
        @foreach($buy_payment as $bp)
            <div class="row">
                <div class="large-17 columns small-centered">
                    @if (!empty($customer) && $bp->id == $customer->payment_id)
                        <div class="small-14 columns">
                            <input id="{{ $bp->alias }}" type="radio" required="required" autocomplete="off" name="payment_id" value="{{ $bp->id }}" checked="checked">
                            <label for="{{ $bp->alias }}">{{ $bp->name }}</label>
                        </div>
                    @else
                        <div class="small-14 columns">
                            <input id="{{ $bp->alias }}" type="radio" required="required" autocomplete="off" name="payment_id" value="{{ $bp->id }}">
                            <label for="{{ $bp->alias }}">{{ $bp->name }}</label>
                        </div>
                    @endif
                    <div class="small-4 columns"><strong>{{ ($bp->price_payment == 0 ? "ZDARMA" : $bp->price_payment." Kč") }}</strong></div>
                </div>
            </div>
        @endforeach
    @endif
</fieldset>