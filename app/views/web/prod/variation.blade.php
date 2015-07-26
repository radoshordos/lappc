<table id="prod-items">
    <thead>
    <tr>
        <th colspan="2">{{ $prod_difference_set['0']->name }}</th>
        @if ($prod_difference_column == 2)
            <th>{{ $prod_difference_set['1']->name }}</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td><input type="radio" name="variation" required="required" value="i-{{ $item['id'] }}" id="i-{{ $item['id'] }}"></td>
            <td><label for="i-{{ $item['id'] }}">{{ $prod_difference_values[$item['diff_val1_id']] }}</label></td>
            @if ($prod_difference_column == 2)
                <td><label for="i-{{ $item['id'] }}">{{$prod_difference_values[$item['diff_val2_id']]}}</label></td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>