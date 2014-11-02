@extends('adm.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Vizualizace skupin
@stop

{{-- JavaScript on page --}}
@section ('script')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#group_id").select2({
            placeholder: "Zvolte skupinu",
            allowClear: true
        });
    });
    google.load("visualization", "1", {packages:["orgchart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'ID');
        data.addColumn('string', 'Parent');
        data.addColumn('string', 'ToolTip');
        data.addRows([
            @foreach($the as $row)
                [{{ "'".$row->id."'" }}, {{ "'".$row->parent_id."'" }}, {{ "'".$row->name."'" }}],
            @endforeach
        ]);
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        chart.draw(data, {allowHtml:true});
    }
</script>
@stop

{{-- Content --}}
@section('content')
{{ Form::open(['route' => ['adm.summary.treevisualization.index'], 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'form']) }}
<div class="form-group">
    {{ Form::label('group_id','Skupina',array('class'=> 'col-sm-2 control-label')) }}
    <div class="col-sm-7">
        <div class="input-group">
        {{ Form::select('group_id',$group, $choice_group, ['required' => 'required', 'class'=> 'form-control']) }}
        <span class="input-group-btn">
            {{ Form::submit('Go!',['class' => "btn btn-primary"]) }}
        </span>
        </div>
    </div>
</div>
{{ Form::close() }}

@if (intval($choice_group)>0)
<div id="chart_div" style="width: 1200px; height: 600px;"></div>
@endif

@stop
