<fieldset>
    <legend>PLATBA</legend>
    @if (!empty($buy_payment))
        @foreach($buy_payment as $bp)
            <div class="row">
                <div class="large-17 columns small-centered">
                    <div class="row">
                        @if ($bp->id == $customer->payment_id)
                            <div class="small-1 columns"><input id="{{ $bp->alias }}" type="radio" required="required" autocomplete="off" name="payment_id" value="{{ $bp->id }}" checked="checked"></div>
                        @else
                            <div class="small-1 columns"><input id="{{ $bp->alias }}" type="radio" required="required" autocomplete="off" name="payment_id" value="{{ $bp->id }}"></div>
                        @endif
                        <div class="small-8 columns"><label for="{{ $bp->alias }}">{{ $bp->name }}</label></div>
                        <div class="small-4 columns">ZDARMA</div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</fieldset>