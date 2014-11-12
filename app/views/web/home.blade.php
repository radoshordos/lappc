<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en"> <![endif]-->
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, world!</title>
    <link rel="stylesheet" href="/web/components/foundation/css/normalize.css">
    <link rel="stylesheet" href="/web/components/foundation/css/foundation.css">
    <link rel="stylesheet" href="/web/components/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/web/my/app.css">
    <link rel="stylesheet" href="/web/my/jtree.css">
</head>
<body>
    <h1>Hello, world!</h1>
    Registrace & Přihlášení
    <div id="container" style="border: 1px solid #666">
    <div class="row">
        <div class="small-12 columns">
            <nav class="top-bar" data-topbar>
                <section class="top-bar-section">
                    <ul class="right">
                        <li class="has-dropdown">
                            <a href="#">Obchod</a>
                            <ul class="dropdown">
                                <li><a href="#">Test</a></li>
                                <li><a href="#">Nářadí Doležalova s.r.o.</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Kontakt</a></li>
                        <li><a href="#">Přihlásit se</a></li>
                        <li><a href="#">Košík</a></li>
                    </ul>
                    <!-- Left Nav Section -->
                    <ul class="left">
                        <li class="has-form">
                            {{ Form::open(array('url' => '', 'files' => true)); }}
                            <div class="row collapse">
                                <div class="large-8 small-9 columns ui-widget">
                                    {{ Form::input('search','term',$term,['size' => '42', 'id' => 'term', "placeholder" => "Nalést nářadí i příslušenství"]) }}
                                    </div>
                                <div class="large-4 small-3 columns">
                                    {{-- Form::input('text','response',NULL,['id' => 'response','disabled']) --}}
                                    {{ Form::submit('Hledat', ['name' => 'submitsearch','class' => 'alert button expand']) }}
                                </div>
                                {{ Form::close() }}
                            </div>
                        </li>
                    </ul>









                </section>
            </nav>
                    <ul class="breadcrumbs">
                        <li><a href="#">Úvod</a></li>
                        <li><a href="#">Akumulátorové nářadí</a></li>
                        <li><a href="#">Aku kladiva</a></li>
                    </ul>
                </div>
            </div>
                                                <nav>
                                                <a class="item">
                                                <label>Ruční nářadí</label>
                                                </a>

                                                <ul style="display: block">
                                                  <li><a href="#">Aku šroubováky</a></li>
                                                  <li><a href="#">Aku úhlové vrtačky</a></li>
                                                  <li><a href="#">Aku brusky</a></li>
                                                  <li><a href="#">Aku kladiva</a></li>
                                                  <li><a href="#">Aku pily</a></li>
                                                </ul>
                                                </nav>
            <div class="row">
                <div class="small-3 columns" style="border: 1px solid #86D2B6">


<ul class="mtree transit">
  <li><a href="#">Africa</a>
    <ul>
      <li><a href="#">Algeria</a></li>
      <li><a href="#">Marocco</a></li>
      <li><a href="#">Libya</a></li>
      <li><a href="#">Somalia</a></li>
      <li><a href="#">Kenya</a></li>
      <li><a href="#">Mauritania</a></li>
      <li><a href="#">South Africa</a></li>
    </ul>
  </li>
  <li><a href="#">America</a>
    <ul>
      <li><a href="#">North-America</a>
        <ul>
          <li><a href="#">Canada</a></li>
          <li><a href="#">USA</a>
            <ul>
              <li><a href="#">New York</a></li>
              <li><a href="#">California</a>
                <ul>
                  <li><a href="#">Los Angeles</a></li>
                  <li><a href="#">San Diego</a></li>
                  <li><a href="#">Sacramento</a></li>
                  <li><a href="#">San Francisco</a></li>
                  <li><a href="#">Bakersville</a></li>
                </ul>
              </li>
              <li><a href="#">Lousiana</a></li>
              <li><a href="#">Texas</a></li>
              <li><a href="#">Nevada</a></li>
              <li><a href="#">Montana</a></li>
              <li><a href="#">Virginia</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="#">Middle-America</a>
        <ul>
          <li><a href="#">Mexico</a></li>
          <li><a href="#">Honduras</a></li>
          <li><a href="#">Guatemala</a></li>
         </ul>
      </li>
      <li><a href="#">South-America</a>
        <ul>
          <li><a href="#">Brazil</a></li>
          <li><a href="#">Argentina</a></li>
          <li><a href="#">Uruguay</a></li>
          <li><a href="#">Chile</a></li>
        </ul>
      </li>
    </ul>
  </li>
  <li><a href="#">Asia</a>
    <ul>
      <li><a href="#">China</a></li>
      <li><a href="#">India</a></li>
      <li><a href="#">Malaysia</a></li>
      <li><a href="#">Thailand</a></li>
      <li><a href="#">Vietnam</a></li>
      <li><a href="#">Singapore</a></li>
      <li><a href="#">Indonesia</a></li>
      <li><a href="#">Mongolia</a></li>
   </ul>
  </li>
  <li><a href="#">Europe</a>
    <ul>
      <li><a href="#">North</a>
        <ul>
          <li><a href="#">Norway</a></li>
          <li><a href="#">Sweden</a></li>
          <li><a href="#">Finland</a></li>
        </ul>
      </li>
      <li><a href="#">East</a>
        <ul>
          <li><a href="#">Romania</a></li>
          <li><a href="#">Bulgaria</a></li>
          <li><a href="#">Poland</a></li>
        </ul>
      </li>
      <li><a href="#">South</a>
        <ul>
          <li><a href="#">Italy</a></li>
          <li><a href="#">Greece</a></li>
          <li><a href="#">Spain</a></li>
        </ul>
      </li>
      <li><a href="#">West</a>
        <ul>
          <li><a href="#">France</a></li>
          <li><a href="#">England</a></li>
          <li><a href="#">Portugal</a></li>
        </ul>
      </li>
   </ul>
  </li>
  <li><a href="#">Oceania</a>
    <ul>
      <li><a href="#">Australia</a></li>
      <li><a href="#">New Zealand</a></li>
    </ul>
  </li>
  <li><a href="#">Arctica</a></li>
  <li><a href="#">Antarctica</a></li>
</ul>


{{--
                @foreach($tree_group as $row)
                <div class="icon-bar vertical one-up small-3">
                <a class="item">
                    <label>{{ $row->name }}</label>
                    @if($row->id == 22)

                    @endif
                </a>
                </div>
                @endforeach
--}}
            </div>



                <div class="small-9 columns" style="border: 1px solid #86D2B6">
                <dl class="sub-nav">
                    <dt>Výrobce:</dt>
                    <dd class="active"><a href="#">Vše</a></dd>
                    <dd><a href="#">Narex <span>(5)</span></a></dd>
                    <dd><a href="#">Makita <span>(15)</span></a></dd>
                    <dd><a href="#">Maktec</a></dd>
                    <dd><a href="#">Metabo</a></dd>
                    <dd><a href="#">Proteco</a></dd>
                    <dd><a href="#">Worx</a></dd>
                    <dd><a href="#">Tona</a></dd>
                </dl>

                <div class="small-12 columns">
                    <label>Začekuj</label>
                    <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
                    <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
                    <a href="#" class="button tiny"><input id="checkbox2" type="checkbox">Skladem</a>
                    <span class="success radius label"><input id="che" type="checkbox"><label for="che">Skladem</label></span>

                </div>
                    <ul id="prodlist" class="small-block-grid-3">
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-c8b4eb23.jpg" width="220" height="220">
                                    <span class="success label">2 ks skladem</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-f8d3d9f8.jpg" width="220" height="220">
                                    <span class="success label">1-2 dny</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-cd1728a8.jpg" width="220" height="220">
                                    <span class="success label">na objednávku</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-c8b4eb23.jpg" width="220" height="220">
                                    <span class="success label">2 ks skladem</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-f8d3d9f8.jpg" width="220" height="220">
                                    <span class="success label">1-2 dny</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-cd1728a8.jpg" width="220" height="220">
                                    <span class="success label">na objednávku</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-c8b4eb23.jpg" width="220" height="220">
                                    <span class="success label">2 ks skladem</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-f8d3d9f8.jpg" width="220" height="220">
                                    <span class="success label">1-2 dny</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-cd1728a8.jpg" width="220" height="220">
                                    <span class="success label">na objednávku</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-c8b4eb23.jpg" width="220" height="220">
                                    <span class="success label">2 ks skladem</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-f8d3d9f8.jpg" width="220" height="220">
                                    <span class="success label">1-2 dny</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-cd1728a8.jpg" width="220" height="220">
                                    <span class="success label">na objednávku</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-c8b4eb23.jpg" width="220" height="220">
                                    <span class="success label">2 ks skladem</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-f8d3d9f8.jpg" width="220" height="220">
                                    <span class="success label">1-2 dny</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                        <li class="prod th radius">
                            <a href="/ddd">
                                <h3>Festool DF 500 Q-Plus</h3>
                                <img src="/web/naradi/220/makita-bda340z-cd1728a8.jpg" width="220" height="220">
                                    <span class="success label">na objednávku</span>
                                    <span class="price label">3690 Kč</span>
                            </a>
                            <p>Frézka Festool domino DF 500 Q-Plus na oválné kolíkové otvory</p>
                        </li>
                    </ul>


                    <ul class="pagination">
                        <li class="arrow unavailable"><a href="">&laquo;</a></li>
                        <li class="current"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li class="unavailable"><a href="">&hellip;</a></li>
                        <li><a href="">12</a></li>
                        <li><a href="">13</a></li>
                        <li class="arrow"><a href="">&raquo;</a></li>
                    </ul>
            </div>
        </div>
        <p><a href="http://localhost:8000/adm/">ADM</a></p>
        <p><a href="http://localhost:8000/adminer/">ADMINER</a></p>
    </div>

    <script src="/web/guru.js"></script>
    <script>
        $(document).foundation();

        $(function() {
            $('#term').autocomplete({
                source: 'getdata',
                minLength: 1,
                select:function(e,ui) {
                    console.log(ui);
                    $('#response').val(ui.item.id);
                }
            });
        });
    </script>
</body>
</html>