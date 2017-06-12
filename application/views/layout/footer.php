<footer style="background-image: url('<?= base_url() ?>public/images/footer.jpg');">
  <div class="fatFooter content">
    <div class="container">
      <div class="row">
        <div class="col l4 m6 s12 about">
          <?php
            $filterBy = 'about';
            $about = array_filter($pages, function($var) use($filterBy){
              return ($var['url'] == $filterBy);
            });
            $about = array_values($about)[0];
          ?>
          <ul><h5>Tentang Kami</h5>
            <li><?= img('public/images/LogoFooter.png') ?></li>
            <li><?= $about['summary'] ?> <?= anchor('/about', 'Read More') ?>
            </li>
          </ul>
        </div>
        <div class="col l3 m6 s12 prod">
          <?php if(count($latest_products) > 0){ ?>
          <ul>
            <h5>Produk Terbaru</h5>
            <?php
              foreach($latest_products as $key => $product){
                echo '<li>';
                echo '<a href="products/detail/'.$product['category_id'].'">';
                if(count($product['images']) > 0){
                  echo img('uploads/'.$product['images'][0]['filename'], TRUE, array('title' => $product['images'][0]['alt']));
                }
                else{
                  echo img('public/images/no image.jpg', TRUE, array('title' => 'no image'));
                }
                echo '</a>';
                echo '</li>';
              } // close foreach latest_products
            ?>
          </ul>
          <?php } ?>
        </div>
        <div class="col l5 m12 s12">
          <ul>
            <h5>Hubungi Kami</h5>
            <?= (isset($setting) && $setting->workshop_phone) ? '<li><i class="material-icons left">phone</i> '.$setting->workshop_phone.'</li>' : '' ?>
            <?= (isset($setting) && $setting->office_phone) ? '<li><i class="material-icons left">smartphone</i> '.$setting->office_phone.'</li>' : '' ?>
            <?= (isset($setting) && $setting->email) ? '<li><i class="material-icons left">mail</i> '.$setting->email.'</li>' : '' ?>
            <?= (isset($setting) && $setting->office_address) ? '<li><i class="material-icons left">business</i> '.$setting->office_address.'</li>' : '' ?>
            <?= (isset($setting) && $setting->workshop_address) ? '<li><i class="material-icons left">local_convenience_store</i> '.$setting->workshop_address.'</li>' : '' ?>
            <?= (isset($setting) && $setting->twitter) ? '<li><i class="fa fa-twitter left"></i> '.anchor($setting->twitter, 'Twitter', array('target' => '_blank')).'</li>' : '' ?>
            <?= (isset($setting) && $setting->facebook) ? '<li><i class="fa fa-facebook left"></i> '.anchor($setting->facebook, 'Facebook', array('target' => '_blank')).'</li>' : '' ?>
            <?= (isset($setting) && $setting->instagram) ? '<li><i class="fa fa-instagram left"></i> '.anchor($setting->instagram, 'Instagram', array('target' => '_blank')).'</li>' : '' ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="greenBack">
  </div>
  <div class="copyright center-align">
    <p>© Copyright 2017 - Catur Jaya Atap</p>
  </div>
</footer>

<script>
  $(document).ready(function(){
    $('.slider').slider();

    $(".button-collapse").sideNav();
  });
</script>
