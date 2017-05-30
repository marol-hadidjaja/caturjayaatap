<div class="slider">
  <ul class="slides">
    <?php
      if(count($sliders) > 0){
        foreach($sliders as $idx => $slider){
          echo '<li>';
          echo '<div class="backBlack"></div>';
          echo img('uploads/'.$slider['filename']);
          echo '<div class="caption center-align">';
          echo '<h3>'.$slider['title'].'</h3>';
          echo '<h5 class="light grey-text text-lighten-3">'.$slider['description'].'</h5>';
          echo '</div>';
          echo '</li>';
        }
      }
    ?>
    <li>
      <div class="backBlack"></div>
      <img src="<?= base_url() ?>public/images/slider1.jpg"> <!-- random image -->
      <div class="caption center-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div>
    </li>
  </ul>
</div>

<div class="backgrey home">
  <div class="container z-depth-3 first">
    <div class="row">
      <div class="l12 m12 s12 col">
        <nav>
          <div class="nav-wrapper">
            <a href="#" class="brand-logo"><?= img('public/images/logo.png') ?>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-small-and-down">
              <?php
                foreach($pages as $page){
                  echo "<li>".anchor($page['url'], $page['title'])."</li>";
                }
              ?>
            </ul>
          </div>
        </nav>
      </div>
      <div class="homepage">
        <div class="content l12 m12 s12 col center-align">
          <div class="subcontent">
            <div class="title">
              <h5>Selamat datang di <span>Catur Jaya Atap</span></h5>
            </div>
            <?= $page['content'] ?>
          </div>
        </div><!-- content -->
      </div><!-- homepage -->
    </div>
  </div><!-- container -->
  <?php if(count($products) > 0){ ?>
  <div class="container Hproduct">
    <div class="row">
      <div class="content l12 m12 s12 col center-align">
        <div class="subcontent">
          <div class="title">
            <h5>Produk <span>Kami</span></h5>
          </div>
          <p>Kami menyediakan berbagai macam produk yang dibutuhkan pelanggan. Produk kami terdiri dari:</p>
        </div>
      </div><!-- content -->
    </div>
    <div class="row">
      <?php
        foreach($products as $k_product => $product){
          echo '<div class="col s12 m4">';
          echo '<div class="card">';
          echo '<a href="detailProd.html">';
          echo '<div class="card-image">';
          if(count($product['images']) > 0)
            echo img('uploads/'.$product['images'][0]['filename']);
          else
            echo "NO IMAGE";
          echo '</div><!-- .card-image -->';
          echo '<div class="card-content">';
          echo '<h5 class="truncate">'.$product['name'].'</h5>';
          echo '<h6>'.$product['description'].'</h6>';
          echo '</div><!- .card-content ->';
          echo '</a>';
          echo '</div><!-- .card -->';
          echo '</div><!-- .col.s12.m4 -->';
        } // close foreach
      ?>

      <div class="col s12 center-align button">
        <a class="waves-effect btn" href="product.html">Product Lainnya</a>
      </div>
    </div><!-- // .row -->
  </div><!-- // .Hproduct -->
  <?php } // close check products ?>
</div><!-- homepage -->
