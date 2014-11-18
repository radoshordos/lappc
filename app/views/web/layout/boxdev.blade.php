<div class="panel clearfix">
    <dl id="dev-container" class="sub-nav">
        <dt>Výrobci:</dt>
        @foreach ($dev_list as $row)
        @if ($row->dev->id == 1)
            <dd><a href="{{ '/'.$row->tree->absolute }}">Vše <span>({{ $row->subdir_visible }})</span></a></dd>
        @else
            <dd><a href="{{ '/'.$row->tree->absolute .'/'. $row->dev->alias }}">{{ $row->dev->name." <span>(".$row->subdir_visible.")</span>"; }}</a></dd>
        @endif
        @endforeach
    </dl>
</div>