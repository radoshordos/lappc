<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Upload obrázku</h3>
    </div>
    <div class="panel-body">
        {{ Form::model($prod, ['method' => 'PATCH','route' => ['adm.product.prod.update',$choice_tree, $choice_prod,"#fotogalerie"],'class'=>'form-horizontal','role'=>'form']) }}
        <div class="row col-sm-offset-1 col-md-9">
            {{ Form::label('input-1a','Výběr obrázek') }}
            {{ Form::file('input-1a',['id' => 'input-1a', 'data-show-preview' => 'false', 'class'=> 'file']) }}
        </div>
        <div class="row col-sm-offset-1 col-md-9">
            {{ Form::label('upload_url','Zadej URL') }}
            <div class="input-group">
                {{ Form::text('upload_url', NULL, ['class'=> 'form-control']) }}
                <span class="input-group-btn">
                    {{ Form::submit('Zpracovat obrázek', ['name' => 'picture-work','class'=> 'form-control btn-success']) }}
                </span>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Hlavní obrázek</h3>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td rowspan="2" class="text-center">
                    <a href="{{ '/web/naradi/'.$prod->tree->absolute."/".$prod->img_big }}">
                        <img src="{{ '/web/naradi/'.$prod->tree->absolute."/".$prod->img_normal }}">
                    </a>
                </td>
                <td>{{ Form::text('prod_img_big', $prod->img_big, ['class'=> 'form-control','readonly' => 'readonly']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::text('prod_img_normal', $prod->img_normal, ['class'=> 'form-control','readonly' => 'readonly']) }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div>
    @if ($prod->picture_count > 0)
        <div>
            @foreach($table_prod_picture as $row)
                <div class="bg-success" style="float:left">
                    <div class="text-center" style="margin: 30px">
                        {{ Form::model($prod, ['method'=>'PATCH','route' => ['adm.product.prod.update',$choice_tree, $choice_prod,"#fotogalerie"],'class'=>'form-horizontal','role'=>'form']) }}
                        {{ Form::submit('Nastavit jako primární',['class' => 'btn btn-success','name' => "img-to-primary[".$row->id."]"]) }}
                    </div>
                    <img src="{{ '/web/naradi/'.$prod->tree->absolute."/".$row->img_normal }}" class="img-thumbnail" alt="{{ $row->img_normal }}"/>

                    <div class="text-center" style="margin: 30px">
                        {{ Form::submit('Odstranit obrázek',['class' => 'btn btn-danger','name' => "img-to-delete[".$row->id."]"]) }}
                        {{ Form::close() }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>