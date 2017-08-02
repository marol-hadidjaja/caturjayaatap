<div class="row">
  <style>
    select#category{
      width: 250px;
    }
  </style>

  <?php
    $data = array('name' => "product_id",
      'type' => 'hidden',
      'class' => 'product_id',
      'value' => isset($product) ? set_value('product_id', $product['product_id']) : set_value('product_id'));
    echo form_input($data);
  ?>

  <div class="input-field col s12">
    <?php
      echo form_label('Name', 'name');
      $data = array('name' => 'name',
        'class' => 'validate',
        'id' => 'name',
        'autofocus' => '',
        'placeholder' => 'Product name',
        'value' => isset($product) ? set_value('name', $product['name']) : set_value('name'));
      echo form_input($data);
    ?>
  </div>

  <div class="col s12">
    <?php
      if(isset($product))
        echo form_hidden('category', $product['category_id']);
      else
        echo form_hidden('category', $category);
    ?>
  </div>

  <div class="input-field col s12">
    <?php
      /*
      echo form_label('Description', 'description');
      $data = array('name' => 'description',
        'class' => 'materialize-textarea',
        'id' => 'description',
        'autofocus' => '',
        'placeholder' => 'Product description',
        'value' => isset($product) ? set_value('description', $product['description']) : set_value('description'));
      echo form_textarea($data);
      */
    ?>
  </div>

  <?php
    echo form_checkbox('hide', 1, isset($product) ? $product['hide'] : '', array('id' => 'hide'));
    echo form_label('Hide', 'hide');

    echo form_checkbox('featured', 1, isset($product) ? $product['featured'] : '', array('id' => 'featured'));
    echo form_label('Featured', 'featured');
  ?>

  <div class="detProd">
    <section>
      <h5>Detail Product</h5>
    </section>

    <div class="detPrice">
      <div class="addPrice">
        <a id="add_price" class="waves-effect waves-light btn"><i class="material-icons">add</i></a>
        <span>Add Price</span>
      </div>

      <?php
        echo "<div id='prices_container'>";
        if(isset($prices) && count($prices) > 0){
          // key in $prices is different from what I want
          // I want curent order but just reverse the keys
          $prices_count = count($prices) - 1;
          foreach($prices as $price){
            $this->load->view('admin/prices/_form', array('price' => $price, 'prices_count' => $prices_count));

            $prices_count --;
          }
        }
        echo "</div><!-- close #prices_container -->";
      ?>
    </div><!-- detPrice -->
  </div><!-- detProd -->
</div><!-- close .row -->


<script>
  var url = '<?= base_url()."admin/categories" ?>';

  $('.sideRight').addClass('detPage');

  $("select#category").select2({
    tags: true,
    minimumInputLength:1,
    "ajax": {
      "url": url,
      data:function (params) {
        return { term:params.term, page:params.page };
      },
      dataType:"json",
      quietMillis:100,
      processResults: function (data, params) {
        // console.log('processResults -- data: ', data);
        // console.log('processResults -- params: ', params);
        return {results: data};
      },
    },

    // Allow manually entered text in drop down.
    createTag: function(params){
      var term = $.trim(params.term);

      if (term === '') {
        return null;
      }

      return {
        id: term,
        text: term,
        newOption: true // add additional parameters
      }
    }
  });

  $("select").material_select();

  $("body").on("click", ".btnSave", function(e){
    $('.editPage').submit();
  });

  $("body").on("click", "#add_price", function(e){
    prices_count = $('.prices').length - 1;
    $.ajax({
      url: '<?= base_url() ?>' + 'admin/prices/new?prices_count=' + prices_count,
      success: function(result){
        $('#prices_container').prepend(result);
        $('#prices_container .prices:first-child .prices_price').focus();
        $("select").material_select();
      }
    });
    e.preventDefault();
  });

  $("body").on("click", ".add_spec", function(e){
    $prices = $(this).parents('.prices');
    specs_count = $prices.find('.specifications').length - 1;

    prices_count = -($prices.index() - ($('.prices').length - 1));
    $.ajax({
      url: '<?= base_url() ?>' + 'admin/specifications/new?specs_count=' + specs_count + '&prices_count=' + prices_count,
      success: function(result){
        $prices.find('.specs_container').prepend(result);
        $prices.find('.specification_unit:first-child').focus();
        $("select").material_select();
      }
    });
  });

  $("body").on("click", ".delete_spec", function(e){
    $spec = $(this).parents('.specifications');
    $spec.remove();
  });

  $("body").on("click", ".delete_price", function(e){
    $price = $(this).parents('.prices');
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
