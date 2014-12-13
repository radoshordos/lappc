<div class="panel clearfix">
    <dl id="dev-container" class="sub-nav">
        <dt>Výrobci:</dt>
        @foreach ($dev_list as $row)
            @if (!isset($db_dev) && $row->dev_id == 1)
                <dd><a class="active" href="{{ '/'.$row->tree_absolute }}">Vše <span>({{ $row->subdir_visible }})</span></a></dd>
            @elseif ($row->dev_id == 1)
                <dd><a href="{{ '/'.$row->tree_absolute }}">Vše <span>({{ $row->dev_prod_count }})</span></a></dd>
            @elseif (isset($db_dev) && $db_dev->id == $row->dev_id)
                <dd><a class="active" href="{{ '/'.$row->tree->absolute .'/'. $row->dev_alias }}">{{ $row->dev_name." <span>(".$row->dev_prod_count.")</span>"; }}</a></dd>
            @else
                <dd><a href="{{ '/'.$row->tree_absolute .'/'. $row->dev_alias }}">{{ $row->dev_name." <span>(".$row->dev_prod_count.")</span>"; }}</a></dd>
            @endif
        @endforeach
    </dl>
</div>