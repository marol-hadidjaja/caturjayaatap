<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : "Catur Jaya Atap Admin" ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/materialize.min.css">
    <script src="<?= base_url() ?>public/javascripts/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>public/javascripts/materialize.min.js"></script>
  </head>

  <body>
    <div class="container" id="container">
      <div class="message"><?= $this->session->flashdata('message') ?></div>
      <?php if($header) echo $header ;?>
      <?php if($left) echo $left ;?>
      <?php if($middle) echo $middle ;?>
      <?php if($footer) echo $footer ;?>
    </div>
  </body>
</html>
