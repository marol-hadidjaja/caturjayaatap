<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : "Catur Jaya Atap" ?></title>
    <script src="<?= base_url() ?>public/javascripts/jquery-3.2.1.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/stylesheets/font-awesome.min.css">

    <script src="<?= base_url() ?>public/javascripts/materialize.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <?php if($header) echo $header ;?>
    <?php if($middle) echo $middle ;?>
    <?php if($footer) echo $footer ;?>
  </body>
</html>
