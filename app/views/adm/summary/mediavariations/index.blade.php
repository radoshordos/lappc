@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title') @parent Variace médií @stop

{{-- Content --}}
@section('content')
@if (count($mv)>0)
    <div class="col-md-8 col-md-offset-2">
        <form action="" method="post">
            <table class="table table-hover table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Název</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-right">Zobrazeno : <strong>{{ count($mv) }}</strong> řádků</td>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($mv as $row)
                    <tr>
                        <td><?= $row->id; ?></td>
                        <td><?= $row->name; ?></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </form>
    </div>
@endif
@stop