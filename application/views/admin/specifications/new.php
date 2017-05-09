<?php
  echo "<div class='specifications' style='border: 1px solid purple;'>";

  $data = array('name' => "prices[{$prices_count}][specifications][{$specs_count}][name]",
    'class' => 'specification_name');
  echo form_dropdown($data, $options_specs_name);

  $data = array('name' => "prices[{$prices_count}][specifications][{$specs_count}][measurement]",
    'type' => 'number',
    'class' => 'specification_measurement',
    'placeholder' => 'Measurement',
    'value' => '240');
  echo form_input($data);

  $data = array('name' => "prices[{$prices_count}][specifications][{$specs_count}][unit]",
    'class' => 'specification_unit');
  echo form_dropdown($data, $options_specs_unit);

  echo "</div><!-- close .specifications -->";
?>
