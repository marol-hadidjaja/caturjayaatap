<?php
  $data = array('name' => "id",
    'type' => 'hidden',
    'class' => 'id',
    'value' => isset($product) ? set_value('id', $product['id']) : set_value('id'));
  echo form_input($data);

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
    'id' => 'image',
    'multiple' => true);
  echo form_upload($data);
  if(count($images) > 0){
    foreach($images as $image){
      $extension_pos = strrpos($image['filename'], '.'); // find position of the last dot, so where the extension starts
      $thumb = substr($image['filename'], 0, $extension_pos) . '_thumb' . substr($image['filename'], $extension_pos);
      echo "<div class='product_images' data-id='{$image['id']}'>";
      echo img("uploads/{$thumb}");

      $data = array('name' => 'delete_image',
        'class' => 'delete_image');
      echo form_button($data, 'X');
      echo "</div><!-- close .product_images -->";
    }
    $image_ids = array_map(function($val){ return $val['id']; }, $images);
    $data = array('name' => 'product_images',
      'type' => 'hidden',
      'id' => 'product_images',
      'value' => join($image_ids, ','));
    echo form_input($data);
  }

  $data = array('name' => 'add_price',
    'class' => '',
    'id' => 'add_price');
  echo form_button($data, 'Add price');

  echo "<div id='prices_container'>";
  if(isset($prices) && count($prices) > 0){
    // echo 'prices in products/_form.php: <br/>';
    // print_r($prices);
    // echo "<br/>";

    // key in $prices is different from what I want
    // I want curent order but just reverse the keys
    $prices_count = count($prices) - 1;
    foreach($prices as $price){
      // echo "price in products/_form.php: <br/>";
      // print_r($price);
      // echo "<br/>";
      $this->load->view('admin/prices/_form', array('price' => $price, 'prices_count' => $prices_count));
      $prices_count --;
    }
  }
  echo "</div><!-- close #prices_container -->";

  echo form_submit('btn_save', 'Save');
?>

<script>
  $("select").material_select();

  $("body").on("click", "#add_price", function(e){
    prices_count = $('.prices').length - 1;
    $.ajax({
      url: '<?= base_url() ?>' + 'admin/prices/new?prices_count=' + prices_count,
      success: function(result){
        $('#prices_container').prepend(result);
        $("select").material_select();
      }
    });
    e.preventDefault();
  });

  $("body").on("click", ".add_spec", function(e){
    $prices = $(this).parent('.prices');
    specs_count = $prices.find('.specifications').length - 1;

    prices_count = -($prices.index() - ($('.prices').length - 1));
    $.ajax({
      url: '<?= base_url() ?>' + 'admin/specifications/new?specs_count=' + specs_count + '&prices_count=' + prices_count,
      success: function(result){
        $prices.find('.specs_container').prepend(result);
        $("select").material_select();
      }
    });
  });

  $("body").on("click", ".delete_spec", function(e){
    $spec = $(this).parent('.specifications');
    $spec.remove();
  });

  $("body").on("click", ".delete_price", function(e){
    $price = $(this).parent('.prices');
    $price.remove();
  });

  $("body").on("click", ".delete_image", function(e){
    $product_image = $(this).parent(".product_images");
    $product_image_id = $product_image.data("id");

    product_images = $("#product_images").val();
    product_images = product_images.split(',');
    removed_idx = product_images.indexOf($product_image_id);
    product_images.splice(removed_idx, 1);
    product_image_ids = product_images.join(',');

    // change product image ids, because user remove image
    $("#product_images").val(product_image_ids);
    $product_image.remove();
  });
</script>
