@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Správa slev
@stop

{{-- Content --}}
@section('content')
@if (count($sale_prod)>0)
<div class="col-md-8 col-md-offset-2">
    <form action="" method="post">
        <table class="table table-hover table-condensed table-striped">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Viditelné</th>
                    <th>Sleva celý text</th>
                    <th>Sleva</th>
                    <th>Využití<br/>u produktů</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="6" class="right">Zobrazeno : <strong>{{ count($sale_prod) }}</strong> řádků</td>
                </tr>
            </tfoot>
            <tbody>
            @foreach ($sale_prod as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    @if ($row->sale_items>0)
                    <td>{{ Form::select('visible['.$row->id.']', ($row->visible == 0 ? ['0' => 'NE'] : ['1' => 'ANO'] ) , $row->visible, ['readonly','disabled']) }}</td>
                    @else
                    <td>{{ Form::select('visible['.$row->id.']', ['0' => 'NE','1' => 'ANO'], $row->visible) }}</td>
                    @endif
                    <td><?= $row->desc; ?></td>
                    <td><?= $row->name; ?></td>
                    <td><?= $row->sale_items; ?></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p class="text-center">
            <button type="submit" class="btn btn-success">Uložit</button>
        </p>
    </form>
</div>
@endif
@stop