<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="web/guru.js"></script>

  <script>
  $(function() {
    $( "#tags" ).autocomplete({
            source: 'getdata',
            minLength: 2,
            select:function(e,ui) {
                $('#response').val(ui.item.id);
            }
    });
  });
  </script>
</head>
<body>
 
<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
 
{{ Form::input('text','response',NULL,['id' => 'response','disabled']) }}

</body>
</html>