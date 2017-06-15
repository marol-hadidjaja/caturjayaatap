<div class="col l2 m3 left">
  <div class="sideLeft">
    <div class="companyName">
    <a href="<?= base_url() ?>">Catur Jaya Atap</a>
    </div>
    <?php $user = $this->ion_auth->user()->row() ?>
    <ul class="menu">
      <a href="<?= base_url() ?>admin/dashboard">
        <li class="<?= (strpos($this->uri->uri_string(), 'pages') !== false || strpos($this->uri->uri_string(), 'admin/dashboard') !== false) ? 'current' : '' ?>">
          Pages
        </li>
      </a>
      <a href="<?= base_url() ?>admin/sliders">
        <li class="<?= (strpos($this->uri->uri_string(), 'sliders') !== false) ? 'current' : '' ?>">
          Sliders
        </li>
      </a>
      <a href="<?= base_url() ?>admin/products">
        <li class="<?= (strpos($this->uri->uri_string(), 'products') !== false || strpos($this->uri->uri_string(), 'categories') !== false) ? 'current' : '' ?>">
          Products
        </li>
      </a>
      <a href="<?= base_url() ?>admin/settings">
        <li class="<?= (strpos($this->uri->uri_string(), 'settings') !== false) ? 'current' : '' ?>">
          Settings
        </li>
      </a>
      <a href="<?= base_url() ?>admin/user/edit">
        <li class="<?= (strpos($this->uri->uri_string(), 'user') !== false) ? 'current' : '' ?>">
          Edit Password
        </li>
      </a>
    </ul>
    <div class="btnLogout">
      <?= anchor('auth/logout', 'Logout', array('class' => 'waves-effect waves-light btn btnLogin')) ?>
    </div><!-- btnLogout -->
  </div>
</div>
