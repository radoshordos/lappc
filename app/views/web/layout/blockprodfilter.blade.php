    {{ Form::open([ 'method' => 'get', 'files' => true]); }}
        <a>{{ Form::checkbox('store', $store, NULL ,['id' => 'store']).Form::label('store','Pouze skladem') }}</a>
        <br />
        <a>{{ Form::checkbox('action', $action, NULL ,['id' => 'action']).Form::label('action','Pouze akce') }}</a>
        {{ Form::hidden('tree', $vt_tree->tree_id ,['id' => 'tree']) }}
        {{ Form::hidden('dev', (isset($db_dev) ? intval($db_dev->id) : 0),['id' => 'dev']) }}
    {{ Form::close() }}
