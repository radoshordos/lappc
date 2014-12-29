@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Správa dostupnosti
@stop

{{-- Content --}}
@section('content')

    @if (count($ia)>0)
        <div class="col-md-8 col-md-offset-2">
            <form action="" method="post">
                <table class="table table-hover table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Viditelné</th>
                        <th>Dostunost</th>
                        <th>Využití<br/>u produktů</th>
                        <th>Využití<br/>při akci</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="6" class="right">Zobrazeno : <strong>{{ count($ia) }}</strong> řádků</td>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($ia as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            @if ($row->availability_items>0 || $row->availability_akce>0)
                                <td>{{ Form::select('visible['.$row->id.']', ($row->visible == 0 ? ['0' => 'NE'] : ['1' => 'ANO']) , $row->visible,array('class'=>'form-control','readonly')) }}</td>
                            @else
                                <td>{{ Form::select('visible['.$row->id.']', array('0' => 'NE','1' => 'ANO'), $row->visible,array('class'=>'form-control')) }}</td>
                            @endif
                            <td><?= $row->name; ?></td>
                            <td><?= $row->availability_items; ?></td>
                            <td><?= $row->availability_akce; ?></td>
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