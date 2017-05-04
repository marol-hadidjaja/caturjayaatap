<?php
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
?>

