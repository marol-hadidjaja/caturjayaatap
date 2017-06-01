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
<pre>
<?php print_r($product); ?>
</pre>
    <div class="row viewProduct">
      <div class="content l4 m12 s12 col imgProd">
      <?php
      $extension_pos = strrpos($images[0]['filename'], '.'); // find position of the last dot, so where the extension starts
      $thumb = substr($images[0]['filename'], 0, $extension_pos) . '_thumb' . substr($images[0]['filename'], $extension_pos);
      echo "<div class='product_images' data-id='{$images[0]['id']}'>";
      ?>
        <div class="imgLarge">
          <?php echo img("uploads/{$thumb}", array('id' => 'zoom_02', 'data-zoom-image' => 'uploads/'.$images[0]['filename']));?>
          <!--<img id="zoom_02" src="img/small/detProd.png" data-zoom-image="img/large/detProd.png"/>-->
        </div>
        <div id="gal1">
          <?php
            foreach($images as $key => $image){
              echo "<div class='thumb'>";
              echo "<a href='#' data-image='uploads/{$image['filename']}' data-zoom-image='uploads/{$image['filename']}'>";
              echo img("uploads/{$thumb}");
              echo "</a>";
              echo "</div><!-- close .thumb -->";
            }
          ?>
        </div><!-- close .gal1 -->
      </div><!-- content -->
      <div class="l8 m12 s12 col contentProd">
        <div class="subcontent">
          <div class="title">
          <h5><?= $product['product']['name'] ?></h5>
            <a class="waves-effect waves-light btn" href="product"><i class="material-icons left">keyboard_arrow_left</i>Back Product</a>
          </div>
          <p><?= $product['description'] ?></p>
          <div class="priceList">
            <table>
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Tipe Nama Produk</th>
                  <th>Ukuran</th>
                  <th>Harga</th>
                </tr>
              </thead>

              <tbody>
                <?php
      print_r($prices);
                  foreach($prices as $key => $price){
                    echo "<tr>";
                    $ukuran = '';
                    echo "<td>".$ukuran."</td>";
                    echo "</tr>";
                  }
                ?>
                <tr>
                  <td>1</td>
                  <td>Pagar type BRC</td>
                  <td>240 x 90 cm</td>
                  <td>Rp 260.000/lbr</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Pagar type BRC</td>
                  <td>240 x 120 cm</td>
                  <td>Rp 305.000/lbr</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Pagar type BRC</td>
                  <td>240 x 150 cm</td>
                  <td>Rp 325.000/lbr</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="m12 col mobImgProd">
        <div class="row">
          <div class="col m4 s6">
            <img class="materialboxed" src="img/large/detProd.png">
          </div>
          <div class="col m4 s6">
            <img class="materialboxed" src="img/large/detProd1.png">
          </div>
          <div class="col m4 s6">
            <img class="materialboxed" src="img/large/detProd.png">
          </div>
        </div>
      </div><!-- mobImgProd -->
    </div>
  </div>
</div>
