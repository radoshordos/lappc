<fieldset>
    <legend>TRANSPORT</legend>
    @if (!empty($buy_transport))
        @foreach($buy_transport as $bt)
            <div class="row">
                <div class="large-17 columns small-centered">
                    <input id="{{ $bt->alias }}" type="radio" autocomplete="off" name="deliveryId" value="{{ $bt->alias }}">
                    <label for="{{ $bt->alias }}">{{ $bt->name }}</label>
                </div>
            </div>
        @endforeach
    @endif
</fieldset>