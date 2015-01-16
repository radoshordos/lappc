@if ($group === 'prodfind')
    @foreach ($dev_list as $row)
        @if (empty($dev_actual) && $row['dev_id'] == 1)
            <dd><a class="active" href="{{ '/'}}?term={{ $term }}">Vše <span>({{ $row['dev_prod_count'] }})</span></a></dd>
        @elseif ($row['dev_id'] == 1)
            <dd><a href="{{ '/vyhledat-naradi'}}?term={{ $term }}">Vše <span>({{ $row['dev_prod_count'] }})</span></a></dd>
        @elseif (!empty($dev_actual) && $row['dev_alias'] == $dev_actual['alias'])
            <dd><a class="active" href="{{ '/vyhledat-naradi/'.$row['dev_alias']}}?term={{ $term }}">{{ $row['dev_name']." <span>(".$row['dev_prod_count'].")</span>"; }}</a></dd>
        @else
            <dd><a href="{{ '/vyhledat-naradi/'.$row['dev_alias']}}?term={{ $term }}">{{ $row['dev_name']." <span>(".$row['dev_prod_count'].")</span>"; }}</a></dd>
        @endif
    @endforeach
@elseif ($group === 'prodaction')
    @foreach ($dev_list as $row)
        @if (empty($dev_actual) && $row['dev_id'] == 1)
            <dd><a class="active" href="{{ '/vyhledat-naradi'}}">Vše <span>({{ $row['dev_prod_count'] }})</span></a></dd>
        @elseif ($row['dev_id'] == 1)
            <dd><a href="{{ '/vyhledat-naradi'}}">Vše <span>({{ $row['dev_prod_count'] }})</span></a></dd>
        @elseif (!empty($dev_actual) && $row['dev_alias'] == $dev_actual['alias'])
            <dd><a class="active" href="{{ '/akcni-ceny-naradi/'.$row['dev_alias']}}">{{ $row['dev_name']." <span>(".$row['dev_prod_count'].")</span>"; }}</a></dd>
        @else
            <dd><a href="{{ '/akcni-ceny-naradi/'.$row['dev_alias']}}">{{ $row['dev_name']." <span>(".$row['dev_prod_count'].")</span>"; }}</a></dd>
        @endif
    @endforeach
@elseif ($group === 'prodnew')
    @foreach ($dev_list as $row)
        @if (empty($dev_actual) && $row['dev_id'] == 1)
            <dd><a class="active" href="{{ '/vyhledat-naradi'}}">Vše <span>({{ $row['dev_prod_count'] }})</span></a></dd>
        @elseif ($row['dev_id'] == 1)
            <dd><a href="{{ '/vyhledat-naradi'}}">Vše <span>({{ $row['dev_prod_count'] }})</span></a></dd>
        @elseif (!empty($dev_actual) && $row['dev_alias'] == $dev_actual['alias'])
            <dd><a class="active" href="{{ '/novinky-naradi/'.$row['dev_alias']}}">{{ $row['dev_name']." <span>(".$row['dev_prod_count'].")</span>"; }}</a></dd>
        @else
            <dd><a href="{{ '/novinky-naradi/'.$row['dev_alias']}}">{{ $row['dev_name']." <span>(".$row['dev_prod_count'].")</span>"; }}</a></dd>
        @endif
    @endforeach
@else
    @foreach ($dev_list as $row)
        @if (!isset($dev_actual) && $row['dev_id'] == 1)
            <dd><a class="active" href="{{ '/'.$row['tree_absolute'] }}">Vše <span>({{ $row['dev_prod_count'] }})</span></a></dd>
        @elseif ($row['dev_id'] == 1)
            <dd><a href="{{ '/'.$row['tree_absolute'] }}">Vše <span>({{ $row['dev_prod_count'] }})</span></a></dd>
        @elseif (isset($dev_actual) && $row['dev_alias'] == $dev_actual['alias'])
            <dd><a class="active" href="{{ '/'.$row['tree_absolute'] .'/'. $row['dev_alias'] }}">{{ $row['dev_name']." <span>(".$row['dev_prod_count'].")</span>"; }}</a></dd>
        @else
            <dd><a href="{{ '/'.$row['tree_absolute'] .'/'.$row['dev_alias'] }}">{{ $row['dev_name']." <span>(".$row['dev_prod_count'].")</span>"; }}</a></dd>
        @endif
    @endforeach
@endif