<div class="panel clearfix">
    <dl id="dev-container" class="sub-nav">
        <dt>Výrobci:</dt>

        @foreach ($dev_list as $row)
        @if (!isset($db_dev) && $row->dev->id == 1)
            <dd><a class="active" href="{{ '/'.$row->tree->absolute }}">Vše <span>({{ $row->subdir_visible }})</span></a></dd>
        @elseif ($row->dev->id == 1)
            <dd><a href="{{ '/'.$row->tree->absolute }}">Vše <span>({{ $row->subdir_visible }})</span></a></dd>
        @elseif (isset($db_dev) && $db_dev->id == $row->dev->id)
            <dd><a class="active" href="{{ '/'.$row->tree->absolute .'/'. $row->dev->alias }}">{{ $row->dev->name." <span>(".$row->subdir_visible.")</span>"; }}</a></dd>
        @else
            <dd><a href="{{ '/'.$row->tree->absolute .'/'. $row->dev->alias }}">{{ $row->dev->name." <span>(".$row->subdir_visible.")</span>"; }}</a></dd>
        @endif
        @endforeach
    </dl>
</div>