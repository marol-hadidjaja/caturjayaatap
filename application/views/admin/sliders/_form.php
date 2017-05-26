<?php
  $data = array('name' => "id",
    'type' => 'hidden',
    'class' => 'id',
    'value' => isset($slider) ? set_value('id', $slider['id']) : set_value('id'));
  echo form_input($data);

  echo form_label('Title', 'title');
  $data = array('name' => 'title',
    'class' => '',
    'id' => 'title',
    'autofocus' => '',
    'value' => isset($slider) ? set_value('title', $slider['title']) : set_value('title'));
  echo form_input($data);

  echo form_label('Description', 'description');
  $data = array('name' => 'description',
    'class' => '',
    'id' => 'description',
    'autofocus' => '',
    'value' => isset($slider) ? set_value('description', $slider['description']) : set_value('description'));
  echo form_textarea($data);

  echo form_label('Images', 'image');
  $data = array('name' => 'image',
    'class' => '',
    'id' => 'image');
  echo form_upload($data);
  if(isset($slider)){
    echo img("uploads/{$slider['filename']}");
  }

  echo form_submit('btn_save', 'Save');
?>
