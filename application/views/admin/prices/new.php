<?php
  echo "<div class='prices'>";

  $data = array('name' => 'prices[][price]',
    'type' => 'number',
    'class' => 'prices_price',
    'placeholder' => 'Price');
  echo form_input($data);

  $data = array('name' => 'prices[][per]',
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
    $.ajax({
      url: '<?= base_url()."admin/specifications/new" ?>',
      success: function(result){
        $prices.find('.specs_container').prepend(result);
        $("select").material_select();
      }
    });
  });
  </script>
