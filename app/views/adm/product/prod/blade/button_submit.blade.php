<p class="text-center" style="margin-top:.8em">
    @if ($prod->mode_id == 1)
        {{ Form::submit('Smazat produkt', ['name' => 'button-submit-delete-prod','class' => 'btn btn-danger','style' => 'margin-right:5em']) }}
    @endif
    @if ($prod->mode_id > 1 && $prod->ic_all > 0)
        {{ Form::submit('Smazat položku', ['name' => 'button-submit-delete-item','class' => 'btn btn-danger','style' => 'margin-right:5em']) }}
    @endif
    {{ Form::submit('Editovat produkt', ['name' => 'button-submit-edit','class' => 'btn btn-info','style' => 'margin-left:5em']) }}
</p>