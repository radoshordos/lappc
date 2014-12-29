<fieldset>
    <legend>TRANSPORT</legend>
    @if (!empty($buy_transport))
        @foreach($buy_transport as $bt)
            <div class="row">
                <div class="large-17 columns small-centered">
                    @if (!empty($customer) && $bt->id == $customer->delivery_id)
                        <input id="{{ $bt->alias }}" type="radio" required="required" autocomplete="off" name="delivery_id" value="{{ $bt->id }}" checked="checked">
                    @else
                        <input id="{{ $bt->alias }}" type="radio" required="required" autocomplete="off" name="delivery_id" value="{{ $bt->id }}">
                    @endif
                    <label for="{{ $bt->alias }}">{{ $bt->name }}</label>
                </div>
            </div>
        @endforeach
    @endif
</fieldset>