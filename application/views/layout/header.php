<ul class="side-nav" id="mobile-demo">
  <li class="current"><a href="/">Home</a></li>
  <li><a href="about.html">Tentang Kami</a></li>
  <li><a href="product.html">Produk</a></li>
  <li><a href="contact.html">Hubungi Kami</a></li>
  <?php
    foreach($pages as $page){
      echo "<li>".anchor($page['url'], $page['title'])."</li>";
    }
  ?>
</ul>
