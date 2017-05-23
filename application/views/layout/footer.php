<footer style="background-image: url('<?= base_url() ?>public/images/footer.jpg');">
  <div class="fatFooter content">
    <div class="container">
      <div class="row">
        <div class="col l4 m6 s12 about">
          <ul><h5>Tentang Kami</h5>
            <li><?= img('public/images/LogoFooter.png') ?></li>
            <li>Kami akan memberikan kualitas dan pelayanan terbaik bagi Anda. <a href="about.html">Read More</a>
            </li>
          </ul>
        </div>
        <div class="col l3 m6 s12 prod">
          <ul><h5>Produk Terbaik</h5>
            <li><a href="detailProd.html"><img src="img/product1.jpg"></a></li>
            <li><a href="detailProd.html"><img src="img/product2.jpg"></a></li>
            <li><a href="detailProd.html"><img src="img/product3.jpg"></a></li>
          </ul>
        </div>
        <div class="col l5 m12 s12">
          <ul><h5>Hubungi Kami</h5>
            <li><i class="material-icons left">phone</i> (031) 99037054</li>
            <li><i class="material-icons left">smartphone</i> 081235952384 / 082338065412</li>
            <li><i class="material-icons left">mail</i> caturjayaatap@yahoo.com</li>
            <li><i class="material-icons left">account_balance</i> Kav. Industri Ds. Bogem Sukodono</li>
            <li><i class="material-icons left">account_balance</i> Jl. Putra Bangsa Anggaswangi Sukodono, Sidoarjo</li>
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
