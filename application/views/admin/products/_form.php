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
    // echo 'prices in products/_form.php: <br/>';
    // print_r($prices);
    // echo "<br/>";
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

  $("#add_price").click(function(e){
    prices_count = $('.prices').length - 1;
    $.ajax({
      url: '<?= base_url() ?>' + 'admin/prices/new?prices_count=' + prices_count,
      success: function(result){
        $('#prices_container').prepend(result);
        $("select").material_select();
      }
    });
  });

  $("body").on("click", ".add_spec", function(e){
    $prices = $(this).parent('.prices');
    specs_count = $prices.find('.specifications').length - 1;
    prices_count = $('.prices').length - 1;
    $.ajax({
      url: '<?= base_url() ?>' + 'admin/specifications/new?specs_count=' + specs_count + '&prices_count=' + prices_count,
      success: function(result){
        $prices.find('.specs_container').prepend(result);
        $("select").material_select();
      }
    });
  });
</script>
