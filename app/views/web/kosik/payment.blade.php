<h3>ZVOLTE ZPŮSOB PLATBY</h3>
@if (!empty($buy_payment))
    @foreach($buy_payment as $bp)
        <div class="panel callout radius">
            <div class="row">
                <div class="medium-10 columns">
                    <input id="{{ $bp->alias }}" type="radio" required="required" autocomplete="off" name="payment_id" value="{{ $bp->id }}" @if (!empty($customer) && $bp->id == $customer->payment_id) checked="checked" @endif>
                    <label for="{{ $bp->alias }}">{{ $bp->name }}</label>
                </div>
                <div class="medium-3 columns">
                    <strong>{{ ($bp->price_payment == 0 ? "Zdarma" : $bp->price_payment." Kč") }}</strong>
                </div>
                <div class="medium-4 columns">
                    {{ $bp->image ? '<img src="/web/img/payment/'. $bp->image .'"/>' : ""}}
                </div>
            </div>
        </div>
    @endforeach
@endif
