<div class="menu z-depth-3">
  <div class="row">
    <div class="l12 col">
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
          <img src="img/about.jpg">
        </div>
        <div class="col m6">
          <div class="title">
            <h5>Visi</h5>
            <p>Menjadi perusahaan terdepan dalam bidang rangka atap dan plafon, atap galvalum, dan pagar type BRC</p>
          </div>
        </div>
        <div class="col m6">
          <div class="title">
            <h5>Misi</h5>
            <ol>
              <li>Berkomitmen menerapan sistem kerja yang aman dan baik bagi semua karyawan.</li>
              <li>Berkomitmen memberi layanan dan solusi yang terbaik kepada seluruh customer.</li>
              <li>Berkomitmen untuk kepuasaan pelanggan dengan menghasilkan produk dan jasa dengan kualitas terbaik.</li>
            </ol>
          </div>
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
            <img src="img/service1.png">
            <h6>Harga yang <span>Kompetitif</span></h6>
          </div>
          <div class="col m4">
            <img src="img/service2.png">
            <h6>Hasil yang <span>Terbaik</span></h6>
          </div>
          <div class="col m4">
            <img src="img/service3.png">
            <h6>Ketepatan <span>Waktu</span></h6>
          </div>
        </div>
      </div><!-- content -->
    </div>
  </div>
</div>
