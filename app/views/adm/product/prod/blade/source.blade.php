{{ Form::hidden('data_id1', (isset($table_prod_description[0]) ? $table_prod_description[0]['id'] : NULL)); }}
{{ Form::select("data_title1", $select_media_var, (isset($table_prod_description[0]) ? $table_prod_description[0]['variations_id'] : NULL), ['id' => 'data_title1','class' => 'form-control']) }}
{{ Form::textarea('data_input1', (isset($table_prod_description[0]) ? $table_prod_description[0]['data'] : NULL), ['size' => '180x13', 'class' => 'form-control' ]) }}
{{ Form::hidden('data_id2', (isset($table_prod_description[1]) ? $table_prod_description[1]['id'] : NULL)); }}
{{ Form::select("data_title2", $select_media_var, (isset($table_prod_description[1]) ? $table_prod_description[1]['variations_id'] : NULL), ['id' => 'data_title2','class' => 'form-control']) }}
{{ Form::textarea('data_input2', (isset($table_prod_description[1]) ? $table_prod_description[1]['data'] : NULL), ['size' => '180x9', 'class' => 'form-control' ]) }}
{{ Form::hidden('data_id3', (isset($table_prod_description[2]) ? $table_prod_description[2]['id'] : NULL)); }}
{{ Form::select("data_title3", $select_media_var, (isset($table_prod_description[2]) ? $table_prod_description[2]['variations_id'] : NULL), ['id' => 'data_title3','class' => 'form-control']) }}
{{ Form::textarea('data_input3', (isset($table_prod_description[2]) ? $table_prod_description[2]['data'] : NULL), ['size' => '180x5', 'class' => 'form-control' ]) }}
@include('adm.product.prod.blade.button_submit')
