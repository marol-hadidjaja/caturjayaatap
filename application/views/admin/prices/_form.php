<?php
  echo "<div class='prices' style='border: 1px solid black; margin-bottom:30px;''>";
  $data = array('name' => 'delete_price',
    'class' => 'delete_price');
  echo form_button($data, 'Delete price');
  // echo "price in prices/_form.php: <br/>";
  // print_r($price);
  // echo "<br/>";

  if(isset($price)){
    $data = array('name' => "prices[{$prices_count}][id]",
      'type' => 'hidden',
      'class' => 'prices_id',
      'value' => isset($price) ? set_value('id', $price['price_id']) : set_value('price_id'));
    echo form_input($data);
  }

  $data = array('name' => "prices[{$prices_count}][price]",
    'type' => 'number',
    'class' => 'prices_price',
    'placeholder' => 'Price',
    'value' => isset($price) ? set_value('price', $price['price']) : set_value('price'));
  echo form_input($data);

  $data = array('name' => "prices[{$prices_count}][per]",
    'class' => 'prices_per');

  if(isset($price))
    echo form_dropdown($data, $options_per, $price['per']);
  else
    echo form_dropdown($data, $options_per);

  $data = array('name' => 'add_spec',
    'class' => 'add_spec');
  echo form_button($data, 'Add specification');

  echo "<div class='specs_container'>";
  if(isset($price) && count($price['specifications']) > 0){
    // key in $prices is different from what I want
    // I want curent order but just reverse the keys
    $specs_count = count($price['specifications']) - 1;
    foreach($price['specifications'] as $specification){
      // echo "specification in prices/_form.php:";
      // print_r($specification);
      // echo "<br/>";
      $this->load->view('admin/specifications/_form', array('prices_count' => $prices_count,
        'specs_count' => $specs_count,
        'specification' => $specification));
      $specs_count --;
    }
  }
  echo "</div><!-- close .specs_container -->";

  echo "</div><!-- close .prices -->";
?>
