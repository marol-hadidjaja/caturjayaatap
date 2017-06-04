<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : "Catur Jaya Atap Admin" ?></title>
    <script src="<?= base_url() ?>public/javascripts/jquery-3.2.1.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/materialNote.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/codeMirror/codemirror.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/codeMirror/monokai.css">
    <!--<link rel="stylesheet" href="<?//= base_url() ?>public/stylesheets/main.css">-->
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/materialize.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/admin/style.css">

    <script src="<?= base_url() ?>public/javascripts/ckMaterializeOverrides.js"></script>
    <script src="<?= base_url() ?>public/javascripts/codeMirror/codemirror.js"></script>
    <script src="<?= base_url() ?>public/javascripts/codeMirror/xml.js"></script>
    <script src="<?= base_url() ?>public/javascripts/materialNote.js"></script>
    <script src="<?= base_url() ?>public/javascripts/select2.full.min.js"></script>
    <script src="<?= base_url() ?>public/javascripts/materialize.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <div class="row admin">
      <?php if($left) echo $left ;?>
      <?php
        if($middle){
          echo '<div class="col l10 m9 right">';
          echo '<div class="sideRight">';
          echo '<div id="message" class="col s12">'.$this->session->flashdata('message').'</div>';
          echo $middle;
          echo '</div><!-- close .sideRight -->';
          echo '</div><!-- close .col.l10.m9.right -->';
        }
      ?>
    </div>
  </body>
</html>
