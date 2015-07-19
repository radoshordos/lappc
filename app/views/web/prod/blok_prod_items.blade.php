@if ($items_count == 1)
    {{ "IC: ".$items }}
@elseif($items_count > 1)
    @foreach($items as $row)
        {{ $prod_difference_values[$row->diff_val1_id];  }}
    @endforeach
@endif