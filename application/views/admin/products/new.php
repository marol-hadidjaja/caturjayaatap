<?php
  echo validation_errors();

  echo form_open_multipart("admin/products/create");

  echo form_label('Name', 'name');
  $data = array('name' => 'name',
    'class' => '',
    'id' => 'name');
  echo form_input($data);

  echo form_label('Images', 'image');
  $data = array('name' => 'image',
    'class' => '',
    'id' => 'image');
  echo form_upload($data);

  $data = array('name' => 'add_price',
    'class' => '',
    'id' => 'add_price');
  echo form_button($data, 'Add price');

  $data = array('name' => 'prices[][price]',
    'class' => 'prices_price',
    'placeholder' => 'Price');
  echo form_input($data);

  $data = array('name' => 'prices[][per]',
    'class' => 'prices_per');
  echo form_dropdown($data, $options_per);

  $data = array('name' => 'specifications[][name]',
    'class' => 'specification_name');
  echo form_dropdown($data, $options_specs_name);

  $data = array('name' => 'specifications[][measurement]',
    'class' => 'specification_measurement',
    'placeholder' => 'Measurement');
  echo form_input($data);

  $data = array('name' => 'specifications[][unit]',
    'class' => 'specification_unit');
  echo form_dropdown($data, $options_specs_unit);

  echo form_submit('btn_save', 'Save');

  echo form_close();
?>
