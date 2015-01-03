@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Výrobci zboží
@stop

{{-- Content --}}
@section('content')

@if ($devs->count())
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Název výrobce</th>
                <th rowspan="2">Alias</th>
                <th rowspan="2" class="text-center"><button type="button" title="Viditelný prodejce" class="btn btn-primary btn-xs">V</button></th>
                <th rowspan="2" class="text-center"><button type="button" title="Autorizovaný prodejce" class="btn btn-primary btn-xs">A</button></th>
                <th rowspan="2" class="text-center"><button type="button" title="Má záznam v automatické synchronizaci" class="btn btn-primary btn-xs">S</button></th>
                <th colspan="4" class="text-center">Výchozí</th>
                <th rowspan="2"><span class="glyphicon glyphicon-edit"></span></th>
            </tr>
            <tr>
                <th>záruka</th>
                <th>sleva<br/>produktu</th>
                <th>sleva<br/>akce</th>
                <th>dostupnost</th>

            </tr>
            </thead>
            <tfoot>
            <tr>
                <td class="text-right" colspan="11">Zobrazeno <b>{{ count($devs) }}</b> záznamů</td>
            </tr>
            </tfoot>
            <tbody>
            @foreach ($devs as $dev)
                {{ var_dump($dev); Die; }}
            <tr>
                <td>{{ $dev->id }}</td>
                <td>{{ $dev->name }}</td>
                <td>{{ $dev->alias }}</td>
                <td class="text-center">{{ ($dev->active ?
                    '<button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button>' :
                    '<button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-eye-close"></span></button>' )
                    }}
                </td>
                <td class="text-center">{{ ($dev->authorized ?
                        '<button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-star"></span></button>' :
                        '<button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-ban-circle"></span></button>' )
                    }}
                </td>
                <td class="text-center">{{ (in_array($dev->id,$dev_sync) ?
                        '<button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button>' :
                        '<button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove"></span></button>' )
                    }}
                </td>
                <td>{{ $dev->prod_warranty->name }}</td>
                <td>{{ $dev->prod_sale_name }}</td>
                <td>{{ $dev->akce_sale_name }}</td>
                <td>{{ $dev->items_availability->name }}</td>
                <td>{{ link_to_route('adm.pattern.dev.edit','Edit',array($dev->id),array('class' => 'btn btn-info btn-xs')) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<p class="text-center">
    {{ link_to_route('adm.pattern.dev.create','Přidat nového výrobce',NULL, array('class'=>'btn btn-success','role'=> 'button')) }}
</p>
@stop