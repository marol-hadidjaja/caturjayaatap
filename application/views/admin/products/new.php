<?php
  echo validation_errors();

  echo form_open_multipart("admin/products/create");

  echo form_label('Name', 'name');
  $data = array('name' => 'name',
    'class' => '',
    'id' => 'name',
    'autofocus' => '',
    'value' => 'pagar galvanize');
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
  $this->load->view('admin/prices/new');
  echo "</div><!-- close #prices_container -->";

  echo form_submit('btn_save', 'Save');

  echo form_close();
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
</script>
