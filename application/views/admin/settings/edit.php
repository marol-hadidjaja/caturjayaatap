<?php
  echo validation_errors();

  echo form_open("admin/settings/update");

  echo form_label('Office Address', 'office_address');
  $data = array('name' => 'office_address',
    'class' => '',
    'id' => 'office_address',
    'value' => $setting->office_address);
  echo form_textarea($data);

  echo form_label('Office Phone', 'office_phone');
  $data = array('name' => 'office_phone',
    'class' => '',
    'id' => 'office_phone',
    'value' => $setting->office_phone);
  echo form_input($data);

  echo form_label('Workshop Address', 'workshop_address');
  $data = array('name' => 'workshop_address',
    'class' => '',
    'id' => 'workshop_address',
    'value' => $setting->workshop_address);
  echo form_textarea($data);

  echo form_label('Workshop Phone', 'workshop_phone');
  $data = array('name' => 'workshop_phone',
    'class' => '',
    'id' => 'workshop_phone',
    'value' => $setting->workshop_phone);
  echo form_input($data);

  echo form_label('Email', 'email');
  $data = array('name' => 'email',
    'class' => '',
    'id' => 'email',
    'value' => $setting->email);
  echo form_input($data);

  echo form_submit('btn_save', 'Save');

  echo form_close();
?>
