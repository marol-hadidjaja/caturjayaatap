<?php
  echo validation_errors();

  echo form_open_multipart("admin/products/create");

  $this->load->view('admin/products/_form');

  echo form_close();
?>