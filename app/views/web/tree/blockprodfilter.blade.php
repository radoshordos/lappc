{{ Form::open([ 'method' => 'get', 'files' => true]); }}
<a>{{ Form::checkbox('store', $store, NULL ,['id' => 'store']).Form::label('store','Pouze skladem') }}</a>
<br/>
<a>{{ Form::checkbox('action', $action, NULL ,['id' => 'action']).Form::label('action','Pouze akce') }}</a>
{{ Form::hidden('tree', $view_tree_actual['tree_id'] ,['id' => 'tree']) }}
{{ Form::hidden('dev', (isset($dev_actual) ? intval($dev_actual['id']) : 0),['id' => 'dev']) }}
{{ Form::hidden('group', $view_tree_actual['tree_group_type'] ,['id' => 'group']) }}
{{ Form::close() }}
