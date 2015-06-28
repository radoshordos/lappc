<h3>Zvolte způsob platby</h3>
@if (!empty($buy_payment))
    @foreach($buy_payment as $bp)
        <p class="panel">
            <input id="{{ $bp->alias }}" type="radio" required="required" autocomplete="off" name="payment_id" value="{{ $bp->id }}" @if (!empty($customer) && $bp->id == $customer->payment_id) checked="checked" @endif>
            <label for="{{ $bp->alias }}">{{ $bp->name }}</label>
            <strong>{{ ($bp->price_payment == 0 ? "ZDARMA" : $bp->price_payment." Kč") }}</strong>
        </p>
    @endforeach
@endif