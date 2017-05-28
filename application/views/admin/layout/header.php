welcome <?= $this->ion_auth->user()->row()->username ?>
<?= anchor('auth/logout', 'Logout') ?>
