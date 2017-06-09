<div class="menu z-depth-3">
  <div class="row">
    <div class="l12 m12 s12 col">
      <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo"><?= img('public/images/logo.png') ?></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-small-and-down">
            <?php
              foreach($pages as $p){
                $class = $p['url'] == 'products' ? " class='current'" : "";
                echo "<li{$class}>".anchor($p['url'], $p['title'])."</li>";
              }
            ?>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>

<div class="backgrey detailProd">
  <div class="container padded det">
    <div class="row viewProduct">
      <div class="content l4 m12 s12 col imgProd">
        <?php
          if(count($images) > 0){
            $extension_pos = strrpos($images[0]['filename'], '.'); // find position of the last dot, so where the extension starts
            $thumb = substr($images[0]['filename'], 0, $extension_pos) . '_thumb' . substr($images[0]['filename'], $extension_pos);
        ?>

        <div class="imgLarge">
          <?php
            $image_props = array('src' => "uploads/{$thumb}", 'id' => 'zoom_02', 'data-zoom-image' => base_url().'uploads/'.$images[0]['filename']);
            echo img($image_props);
          ?>
        </div><!-- close .imgLarge -->

        <div id="gal1">
          <?php
            foreach($images as $key => $image){
              echo "<div class='thumb'>";
              $extension_pos = strrpos($image['filename'], '.'); // find position of the last dot, so where the extension starts
              $thumb = substr($image['filename'], 0, $extension_pos) . '_thumb' . substr($image['filename'], $extension_pos);
              echo "<a href='#' data-image='".base_url()."uploads/{$image['filename']}' data-zoom-image='".base_url()."uploads/{$image['filename']}'>";
              echo img("uploads/{$thumb}");
              echo "</a>";
              echo "</div><!-- close .thumb -->";
            }
          ?>
        </div><!-- close .gal1 -->
        <?php } else{ // close check images ?>
          <div class="imgLarge">
            <?php
              $image_props = array('src' => "public/images/no image.jpg");
              echo img($image_props);
            ?>
          </div><!-- close .imgLarge -->
        <?php } ?>
      </div><!-- content -->

<pre>
<?//= print_r($products) ?>
</pre>

<?// = "Category: " ?>
<pre>
<?// = print_r($category) ?>
</pre>
      <div class="l8 m12 s12 col contentProd">
        <div class="subcontent">
          <div class="title">
            <h5>Category name: <?= $category['name'] ?></h5>
            <a class="waves-effect waves-light btn" href="<?= base_url() ?>products"><i class="material-icons left">keyboard_arrow_left</i>Back Product</a>
          </div>

          <?php
            foreach($products as $key => $product){
              ?>
              <div class="priceList">
                <?php
                  $prices = array();

                  foreach($product['prices'] as $key => $item){
                    $prices[$item['price_id']][$key] = $item;
                  }

                  ksort($prices, SORT_NUMERIC);
                  $first_key = key($prices);
                  if(count($prices) > 0){
                    $m = array_map(function($p){ return $p['name']; }, $prices[$first_key]);
                    echo "<pre>";
                    echo "Product['prices']:";
                    // print_r($product['prices']);
                    echo "</pre>";
                    $help_prices_2 = array_map(function($p){ return array('name' => $p['name'], 'measurement' => $p['measurement'], 'unit' => $p['unit']); }, $product['prices']);
                    // $prices_2 = array_map('unserialize', array_unique(array_map('serialize', $help_prices_2)));
                    echo "<pre>";
                    // print_r($help_prices_2);
                    //echo "Prices2:";
                    /*
                    $h1 = array_column($help_prices_2, 'measurement');
                    echo "h1:";
                    print_r($h1);
                    echo "<br/>";
                    $h2 = array_flip($h1);
                    echo "h2:";
                    print_r($h2);
                    print_r(array_count_values($h2));
                     */
                    $counts = array();
                    foreach($help_prices_2 as $k => $v){
                      $help_key = "{$v['name']}{$v['measurement']}{$v['unit']}";
                      if(isset($counts[$help_key]))
                        $counts[$help_key] += 1;
                      else
                        $counts[$help_key] = 1;
                    }
                    print_r($counts);
                    echo "</pre>";
                  }
                ?>
                <div classs="product_name"><?= $product['name'] ?></div>
                <?php
                  if(count($prices) > 0){
                    if(min($counts) >= 4){
                      // show like google doc in price
                      $help_prices_3 = array();
                      foreach ($help_prices_2 as $key => $subArr) {
                        unset($subArr['measurement']);
                        $help_prices_3[$key] = $subArr;
                      }
                      $product_measurement_keys = array_map('unserialize', array_unique(array_map('serialize', $help_prices_3)));
                      $product_measurement_key_strings = array_map(function($p){ return "{$p['name']}({$p['unit']})"; }, $product_measurement_keys);

                      $values_key_as_columns = array_filter($help_prices_2, function($p) use ($product_measurement_keys){ return $p['name'] == $product_measurement_keys[0]['name']; });
                      $values_key_as_columns = array_map('unserialize', array_unique(array_map('serialize', $values_key_as_columns)));

                      $values_key_as_rows = array_filter($help_prices_2, function($p) use ($product_measurement_keys){ return $p['name'] == $product_measurement_keys[1]['name']; });
                      $values_key_as_rows = array_map('unserialize', array_unique(array_map('serialize', $values_key_as_rows)));
                      ?>
                      <table>
                        <thead>
                          <tr>
                            <th><?= $product_measurement_key_strings[1] ?></th>
                            <?php
                            foreach($values_key_as_columns as $k => $v){
                              echo "<th>{$v['name']} {$v['measurement']}{$v['unit']}</th>";
                            }
                            ?>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                            foreach($values_key_as_rows as $k => $v){
                              echo "<tr>";
                              echo "<td>{$v['measurement']}</td>";
                              echo "</tr>";
                            }
                          ?>
                        </tbody>
                      </table>
                      <?php
                    }
                    else{
                      ?>
                      <table>
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th>Ukuran (<?= implode(' x ', $m) ?>)</th>
                            <th>Harga</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                            $count = 1;
                            foreach($prices as $key => $price){
                              echo "<tr>";
                              echo "<td>{$count}</td>";
                              $measurements = array_map(function($p){ return "{$p['measurement']}{$p['unit']}"; }, $price);
                              echo "<td>".implode('x', $measurements)."</td>";
                              $first_key = key($price);
                              echo "<td>".$price[$first_key]['price']."</td>";
                              echo "</tr>";
                              $count += 1;
                            }
                          ?>
                        </tbody>
                      </table>
                      <?php
                    }
                  }
                  else
                    echo "<p>Tidak ada harga untuk produk ini</p>";
                ?>
              </div><!-- .priceList -->
              <?php
            } // close foreach $products
          ?>
        </div>
      </div>

      <div class="m12 col mobImgProd">
        <div class="row">
          <?php foreach($images as $key => $image){ ?>
            <div class="col m4 s6">
              <?= img('uploads/'.$image['filename'], TRUE, array('title' => $image['alt'], 'class' => 'materialboxed')) ?>
            </div>
          <?php } ?>
        </div>
      </div><!-- mobImgProd -->
    </div>
  </div>
</div>


<!-- zoom gallery -->
<script type="text/javascript" src='<?= base_url() ?>public/javascripts/jquery.elevatezoom.js'></script>

<script>
  $(document).ready(function(){
    $("#zoom_02").elevateZoom({gallery: 'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: '<?= base_url() ?>public/images/spinner.gif'});

    $("#zoom_02").bind("click", function(e) {
      var ez = $('#zoom_02').data('elevateZoom');
      // $.fancybox(ez.getGalleryList());
      return false;
    });
  });
</script>
