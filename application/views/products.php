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

<div class="backgrey">
  <?php if(count($products) > 0){ ?>
  <div class="container padded Hproduct det">
    <div class="row">
      <div class="content l12 col center-align">
        <div class="subcontent">
          <div class="title">
            <h5>Produk <span>Kami</span></h5>
          </div>
          <?= $page['summary']?>
        </div>
      </div><!-- content -->
    </div>
    <div class="row">
      <?php
        foreach($categories as $key => $category){
          echo '<div class="col s12 m4">';
          echo '<div class="card">';
          echo '<a href="'.base_url().'products/detail/'.$category['id'].'">';
          echo '<div class="card-image">';

          if(count($category['images']) > 0){
            $filename = $category['images'][0]['filename'];
            $extension_pos = strrpos($filename, '.'); // find position of the last dot, so where the extension starts
            $thumb = substr($filename, 0, $extension_pos) . '_thumb' . substr($filename, $extension_pos);
            echo img('uploads/'.$thumb);
          }
          else
            echo img('public/images/no image.jpg');

          echo '</div><!-- .card-image -->';
          echo '<div class="card-content">';
          echo '<h5 class="truncate">'.$category['name'].'</h5>';
          echo '</div><!- .card-content ->';
          echo '</a>';
          echo '</div><!-- .card -->';
          echo '</div><!-- .col.s12.m4 -->';
        } // close foreach
      ?>
    </div><!-- close .row -->
    <?php } // close check products ?>
  </div>
</div>
