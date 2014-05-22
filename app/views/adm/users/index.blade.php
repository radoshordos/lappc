@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h4>Součastní uživatelé:</h4>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<th>Uživatel</th>
				<th>Stav</th>
				<th>Možnosti</th>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td><a href="{{ action('UserController@show', array($user->id)) }}">{{ $user->email }}</a></td>
						<td>{{ $user->status }} </td>
						<td>
							<button class="btn btn-default" type="button" onClick="location.href='{{ action('UserController@edit', array($user->id)) }}'">Edit</button> 
							@if ($user->status != 'Suspended')
								<button class="btn btn-default" type="button" onClick="location.href='{{ route('suspendUserForm', array($user->id)) }}'">Pozastavit</button>
							@else
								<button class="btn btn-default" type="button" onClick="location.href='{{ action('UserController@unsuspend', array($user->id)) }}'">Zas spustit</button>
							@endif
							@if ($user->status != 'Banned')
								<button class="btn btn-default" type="button" onClick="location.href='{{ action('UserController@ban', array($user->id)) }}'">Zablokovat</button>
							@else
								<button class="btn btn-default" type="button" onClick="location.href='{{ action('UserController@unban', array($user->id)) }}'">Odblokovat</button>
							@endif
							<button class="btn btn-default action_confirm" href="{{ action('UserController@destroy', array($user->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Smazat</button></td>
					</tr>
				@endforeach
			</tbody>
		</table>

        <button class="btn btn-primary" onClick="location.href='{{ URL::to('adm/users/create') }}'">Registovat nového uživatele</button>

    </div>
  </div>
</div>
@stop