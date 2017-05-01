<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : "Catur Jaya Atap Admin" ?></title>
    <script src="<?= base_url() ?>public/javascripts/jquery-3.2.1.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/materialize.min.css">

    <script src="<?= base_url() ?>public/javascripts/materialize.min.js"></script>
  </head>

  <body>
    <div class="container" id="container">
      <?php if($header) echo $header ;?>
      <?php if($middle) echo $middle ;?>
      <?php if($footer) echo $footer ;?>
    </div>
  </body>
</html>
