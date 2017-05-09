<?php
  echo "<div class='prices'>";
  // echo "price in prices/edit.php: <br/>";
  // print_r($price);
  // echo "<br/>";
  // $this->load->view('admin/prices/_form', array('price' => $price, 'prices_count' => $prices_count));
  echo "price in prices/_form.php: <br/>";
  print_r($price);
  echo "<br/>";

  $data = array('name' => "prices[{$prices_count}][id]",
    'type' => 'hidden',
    'class' => 'prices_id',
    'value' => isset($price) ? set_value('id', $price['id']) : set_value('id'));
  echo form_input($data);

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
    'class' => '',
    'id' => 'add_spec');
  echo form_button($data, 'Add specification');

  echo "<div class='specs_container'>";
  if(count($price['specifications']) > 0){
    foreach($price['specifications'] as $specs_count => $specification){
      $this->load->view('admin/specifications/_form', array('prices_count' => $prices_count, 'specs_count' => $specs_count, 'specification' => $specification));
    }
  }
  echo "</div><!-- close .specs_container -->";

  echo "</div><!-- close .prices -->";
?>

<script>
  $("#add_spec").click(function(e){
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
