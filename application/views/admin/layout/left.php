<div class="col l2 m3 left">
  <div class="sideLeft">
    <div class="companyName">
    <a href="<?= base_url() ?>">Catur Jaya Atap</a>
    </div>
    <?php $user = $this->ion_auth->user()->row() ?>
    <ul class="menu">
      <a href="<?= base_url() ?>admin/dashboard"><li class="<?= (strpos($this->uri->uri_string(), 'pages') || strpos($this->uri->uri_string(), 'dashboard')) ? 'current' : '' ?>">Pages</li></a>
      <a href="<?= base_url() ?>admin/sliders"><li class="<?= (strpos($this->uri->uri_string(), 'sliders')) ? 'current' : '' ?>">Slider</li></a>
      <a href="<?= base_url() ?>admin/products"><li class="<?= (strpos($this->uri->uri_string(), 'products')) ? 'current' : '' ?>">Products</li></a>
      <a href="<?= base_url() ?>admin/settings"><li class="<?= (strpos($this->uri->uri_string(), 'settings')) ? 'current' : '' ?>">Settings</li></a>
      <a href="<?= base_url() ?>admin/user/edit"><li class="<?= (strpos($this->uri->uri_string(), 'user')) ? 'current' : '' ?>">Edit Password</li></a>
    </ul>
    <div class="btnLogout">
      <?= anchor('auth/logout', 'Logout', array('class' => 'waves-effect waves-light btn btnLogin')) ?>
    </div><!-- btnLogout -->
  </div>
</div>
