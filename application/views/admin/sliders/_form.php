<?php
  $data = array('name' => "id",
    'type' => 'hidden',
    'class' => 'id',
    'value' => isset($slider) ? set_value('id', $slider['id']) : set_value('id'));
  echo form_input($data);

  echo form_label('Name', 'name');
  $data = array('name' => 'name',
    'class' => '',
    'id' => 'name',
    'autofocus' => '',
    'value' => isset($slider) ? set_value('name', $slider['name']) : set_value('name'));
  echo form_input($data);

  echo form_label('Description', 'description');
  $data = array('name' => 'description',
    'class' => '',
    'id' => 'description',
    'autofocus' => '',
    'value' => isset($slider) ? set_value('description', $slider['description']) : set_value('description'));
  echo form_textarea($data);

  echo form_label('Images', 'image');
  $data = array('name' => 'images',
    'class' => '',
    'id' => 'image');
  echo form_upload($data);
  if(isset($slider)){
    echo img("uploads/{$slider['filename']}");
  }

  echo form_submit('btn_save', 'Save');
?>
