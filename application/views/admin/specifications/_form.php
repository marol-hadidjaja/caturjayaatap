<?php
  echo "<div class='specifications' style='border: 1px solid purple; margin-bottom:20px;'>";
  // $this->load->view('admin/specifications/_form', array('specification' => $specification, 'specs_count' => $specs_count, 'prices_count' => $prices_count));
  $data = array('name' => "prices[{$prices_count}][specifications][{$specs_count}][name]",
    'class' => 'specification_name');

  if(isset($specification))
    echo form_dropdown($data, $options_specs_name, $specification['name']);
  else
    echo form_dropdown($data, $options_specs_name);

  $data = array('name' => "prices[{$prices_count}][specifications][{$specs_count}][measurement]",
    'type' => 'number',
    'class' => 'specification_measurement',
    'placeholder' => 'Measurement',
    'value' => isset($specification) ? set_value('measurement', $specification['measurement']) : set_value('measurement'));
  echo form_input($data);

  $data = array('name' => "prices[{$prices_count}][specifications][{$specs_count}][unit]",
    'class' => 'specification_unit');

  if(isset($specification))
    echo form_dropdown($data, $options_specs_unit, $specification['unit']);
  else
    echo form_dropdown($data, $options_specs_unit);

  echo "</div><!-- close .specifications -->";
?>
