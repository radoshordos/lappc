@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Skupiny
@stop

{{-- Content --}}
@section('content')
<h4>Existující skupiny</h4>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<th>Jméno skupiny</th>
				<th>Oprávnění</th>
				<th>Možnosti</th>
			</thead>
			<tbody>
			@foreach ($groups as $group)
				<tr>
					<td><a href="groups/{{ $group->id }}">{{ $group->name }}</a></td>
					<td><p>{{ (isset($group['permissions']['admin'])) ? '<i class="icon-ok"></i> Admin' : ''}}</p>
                        <p>{{ (isset($group['permissions']['power'])) ? '<i class="icon-ok"></i> Power User' : ''}}</p>
                        <p>{{ (isset($group['permissions']['simple'])) ? '<i class="icon-ok"></i> Simple User' : ''}}</p>
                    </td>
					<td>
						<button class="btn btn-default" onClick="location.href='{{ action('GroupController@edit', array($group->id)) }}'">Editovat</button>
					 	<button class="btn btn-default action_confirm {{ ($group->id == 1) ? 'disabled' : '' }}" type="button" data-method="delete" href="{{ URL::to('adm/groups') }}/{{ $group->id }}">Smazat</button>
					 </td>
				</tr>	
			@endforeach
			</tbody>
		</table> 
	</div>
	 <button class="btn btn-primary" onClick="location.href='{{ URL::to('adm/groups/create') }}'">Nová skupina</button>
   </div>
</div>

@stop