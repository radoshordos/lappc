@foreach($prod_desc_array as $pd)
    <div class="desc-list row">
        <h3>{{ $pd->mediaVariations->name }}</h3>
        <ul class="prod-desc">
            <li>{{ str_replace("\r\n", "</li><li>", $pd->data) }}</li>
        </ul>
    </div>
@endforeach