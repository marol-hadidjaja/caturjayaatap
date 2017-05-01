<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : "Catur Jaya Atap Admin" ?></title>
    <script src="<?= base_url() ?>public/javascripts/jquery-3.2.1.min.js"></script>
    <!--<script src="<?//= base_url() ?>public/javascripts/jquery-2.1.4.js"></script>-->
    <!-- include libraries(jQuery, bootstrap) -->
    <!--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> -->

    <!-- include summernote css/js-->
    <!--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>-->

    <!-- Main Quill library -->
    <!--<script src="https://cdn.quilljs.com/1.2.4/quill.min.js"></script>-->

    <!-- Theme included stylesheets -->
    <!--<link href="https://cdn.quilljs.com/1.2.4/quill.snow.css" rel="stylesheet">-->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/materialize.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/materialNote.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/codeMirror/codemirror.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/codeMirror/monokai.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/main.css">

    <script src="<?= base_url() ?>public/javascripts/materialize.min.js"></script>
    <script src="<?= base_url() ?>public/javascripts/ckMaterializeOverrides.js"></script>
    <script src="<?= base_url() ?>public/javascripts/codeMirror/codemirror.js"></script>
    <script src="<?= base_url() ?>public/javascripts/codeMirror/xml.js"></script>
    <script src="<?= base_url() ?>public/javascripts/materialNote.js"></script>
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
