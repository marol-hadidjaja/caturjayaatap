<div class="menu z-depth-3">
  <div class="row">
    <div class="l12 s12 m12 col">
      <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo"><?= img('public/images/logo.png') ?></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="right hide-on-small-and-down">
            <?php
              foreach($pages as $p){
                $class = $p['url'] == 'about' ? " class='current'" : "";
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
  <div class="container">
    <div class="row padded">
      <div class="content l12 col center-align">
        <div class="subcontent">
          <div class="title">
            <h5>Tentang <span>Perusahaan</span></h5>
          </div>

          <blockquote><?= $page['summary'] ?></blockquote>
          <p><?= $page['content'] ?></p>
        </div>
      </div><!-- content -->
    </div>
  </div>
  <div class="row">
    <div class="visiMisi">
      <div class="container">
        <div class="col m6">
          <?= img('uploads/about.jpg', TRUE) ?>
        </div>
        <div class="col m6">
          <div class="title">
            <h5>Visi</h5>
            <p><?= $setting->visi ?></p>
          </div>
        </div>
        <div class="col m6">
          <?php
            if(count($missions) > 0){
              echo '<div class="title">';
              echo '<h5>Misi</h5>';
              echo '<ol>';
              foreach($missions as $mission){
                echo "<li>{$mission['mission']}</li>";
              }
              echo '</ol>';
              echo '</div><!-- close .title -->';
            }
          ?>
        </div>
      </div>
    </div><!-- visiMisi -->
  </div>
  <div class="container">
    <div class="row padded">
      <div class="content l12 col center-align">
        <div class="subcontent">
          <div class="title">
            <h5>Service <span>Kami</span></h5>
          </div>
          <p>Kami CV Catur Jaya Atap selalu berkomitmen memberikan pelayanan yang terbaik bagi customer kami dalam hal:</p>
        </div>
        <div class="row icon">
          <div class="col m4">
            <?= img('public/images/service1.png', TRUE) ?>
            <h6>Harga yang <span>Kompetitif</span></h6>
          </div>
          <div class="col m4">
            <?= img('public/images/service2.png', TRUE) ?>
            <h6>Hasil yang <span>Terbaik</span></h6>
          </div>
          <div class="col m4">
            <?= img('public/images/service3.png', TRUE) ?>
            <h6>Ketepatan <span>Waktu</span></h6>
          </div>
        </div>
      </div><!-- content -->
    </div>
  </div>
</div>
