<p>admin/layout/left.php</p>
<?php $user = $this->ion_auth->user()->row() ?>
<ul>
  <li><?= anchor('admin/dashboard', 'Pages') ?></li>
  <li><?= anchor('admin/sliders', 'Slider') ?></li>
  <li><?= anchor('admin/products', 'Products') ?></li>
  <li><?= anchor('admin/settings', 'Settings') ?></li>
  <li><?= anchor('admin/user/edit', 'Edit Password') ?></li>
</ul>
