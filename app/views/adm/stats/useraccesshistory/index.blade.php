@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Odkud přišli návštěvníci?
@stop

{{-- Content --}}
@section('content')
    <blockquote>
        {{ Form::open(['route' => ['adm.stats.useraccesshistory.index'],'method' => 'GET','class' => 'form-horizontal', 'role' => 'form']) }}

			<table class="table table-condensed">
				<tr class="center">
					<th>{{ Form::label('date','Datum') }}</th>
					<th>{{ Form::label('remote_addr','IP Adresa') }}</th>
					<th><label for="ls_http_referer">OdkazujĂ­cĂ­ strĂĄnka</label></th>
					<th><label for="ls_request_url">VstupnĂ­ strĂĄnka</label></th>
					<th><label for="ppc">Reklama</label></th>
					<th><label for="limit">Limit</label></th>
					<th rowspan="2"><input type="submit" name="find" value="Vyhledat" /></th>
				</tr>
				<tr>
					<td><input type="date" max="<?= date("Y-m-d"); ?>" name="date" id="date" value="<?= $_GET["date"]; ?>" class="big" /></td>
					<td>{{ Form::text('remote_addr',$input['remote_addr'],['id'=> 'remote_addr', 'maxlength' => '48', 'class'=> 'form-control']) }}</td>
					<td><?= $this->formText('ls_http_referer', trim($_GET["ls_http_referer"]), array("id" => "ls_http_referer", "size" => "26", "maxlength" => "48")); ?></td>
					<td>{{ Form::text('request_url',$input['request_url'],['id'=> 'request_url', 'maxlength' => '48', 'class'=> 'form-control']) }}</td>
					<td><?= $this->formSelect("ppc", $_GET["ppc"], array("id" => "ppc"), $ppc); ?></td>
					<td>{{ Form::select('select_limit', $input['select_limit'], $input['choice_limit'], ['id'=> 'select_limit', 'class'=> 'form-control']) }}</td>
				</tr>
			</table>

        <div class="row">
            <div class="col-xs-12">

            </div>
        </div>
        {{ Form::close() }}
    </blockquote>

	@if ($history)

	@endif
@stop