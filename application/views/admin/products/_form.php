<?php
  echo form_label('Name', 'name');
  $data = array('name' => 'name',
    'class' => '',
    'id' => 'name',
    'autofocus' => '',
    'value' => isset($product) ? set_value('name', $product['name']) : set_value('name'));
  echo form_input($data);

  echo form_label('Category', 'category');
  $data = array('name' => 'category',
    'class' => '',
    'id' => 'category',
    'autofocus' => '');
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

  echo "<div id='prices_container'>";
  if(count($prices) > 0){
    echo 'prices in products/_form.php: <br/>';
    print_r($prices);
    echo "<br/>";
    foreach($prices as $prices_count => $price){
      // echo "price in products/_form.php: <br/>";
      // print_r($price);
      // echo "<br/>";
      $this->load->view('admin/prices/_form', array('price' => $price, 'prices_count' => $prices_count));
    }
  }
  echo "</div><!-- close #prices_container -->";

  echo form_submit('btn_save', 'Save');
?>

<script>
  $("select").material_select();
</script>
