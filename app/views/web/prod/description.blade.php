@foreach($prod_desc_array as $pd)
    <div class="desc-list row">
        <h3>{{ $pd->mediaVariations->name }}</h3>
        <ul class="prod-desc">
            <li>{{ str_replace("\r\n", "</li><li>", $pd->data) }}</li>
        </ul>
    </div>
@endforeach

@if (!empty($prod_picture))
    @foreach($prod_picture as $row)
        <a class="gallery th" role="button" aria-label="Thumbnail" href="{{ "/web/naradi/". $vpa->getTreeAbsolute()."/". $row->img_big }}">
            <img aria-hidden="true" src="{{ "/web/naradi/".$vpa->getTreeAbsolute()."/". $row->img_normal }}" alt="{{ $vpa->getProdName() }} - Náhled obrázku {{ $row->img_big }} " width="120" height="120">
        </a>
    @endforeach
@endif
