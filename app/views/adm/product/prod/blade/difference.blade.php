<table class="table table-hover">
    <thead>
    <tr>
        <td class="text-center" colspan="{{ $prod->prodDifference->count; }}">{{ $select_difference[$prod->prodDifference->id]; }}</td>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td class="text-center" colspan="{{$prod->prodDifference->count; }}">{{ Form::submit('Přidat nové variace', ['name' => 'button-add-variation','class' => 'btn btn-info']) }}</td>
    </tr>
    </tfoot>
    <tbody>
    <tr>
        @foreach ($table_prod_description_set as $value)
            <?php $pdv = Authority\Eloquent\ProdDifferenceValues::where('set_id', '=', $value->set_id)->orderBy($value->prodDifferenceSet->sortby)->get(['id', 'name']); ?>
            <td>{{ Form::select('variation['.$value->set_id.']['.$value->pds_id.']',\Authority\Tools\SB::optionBind('SELECT * FROM prod_difference_values WHERE set_id = ?', [$value->set_id] ,['id' => '->name']),NULL, ['multiple' => 'multiple', 'required', 'size' => '36','class' => 'form-control']); }}</td>
        @endforeach
    </tr>
    </tbody>
</table>
