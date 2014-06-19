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
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Název výrobce</th>
                <th>Alias</th>
                <th class="text-center"><button type="button" title="Viditelný prodejce" class="btn btn-primary btn-xs">V</button></th>
                <th class="text-center"><button type="button" title="Autorizovaný prodejce" class="btn btn-primary btn-xs">A</button></th>
                <th>Výchozí<br />záruka</th>
                <th>Výchozí<br />sleva</th>
                <th>Výchozí<br />dostupnost</th>
                <th><span class="glyphicon glyphicon-edit"></span></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($devs as $dev)
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
                <td>{{ $dev->prod_warranty->name }}</td>
                <td>{{ $dev->items_sale->name }}</td>
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