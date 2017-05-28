<?php
  echo validation_errors();

  echo form_open_multipart("admin/sliders/update");

  $this->load->view('admin/sliders/_form');

  echo form_close();
?>
