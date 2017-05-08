<?php
  echo "<div class='prices'>";

  $data = array('name' => "prices[{$prices_count}][price]",
    'type' => 'number',
    'class' => 'prices_price',
    'placeholder' => 'Price',
    'value' => '195000');
  echo form_input($data);

  $data = array('name' => "prices[{$prices_count}][per]",
    'class' => 'prices_per');
  echo form_dropdown($data, $options_per);

  $data = array('name' => 'add_spec',
    'class' => '',
    'id' => 'add_spec');
  echo form_button($data, 'Add specification');

  echo "<div class='specs_container'>";
  $this->load->view('admin/specifications/new');
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
