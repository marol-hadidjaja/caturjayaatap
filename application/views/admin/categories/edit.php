<div class="title">
  <h5>Category <?= $category['name'] ?></h5>
  <a href="<?= base_url().'admin/products' ?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back to Product</a>
</div>

<?php echo validation_errors(); ?>

<?= form_open_multipart("admin/product_images/add/{$category['id']}", array('class' => 'editPage')) ?>

  <div class="file-field input-field">
    <div class="btn">
      <span>Images</span>
      <?php
        $data = array('name' => 'images[]',
          'class' => '',
          'id' => 'images',
          'multiple' => true);
        echo form_upload($data);
      ?>
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text" placeholder="Upload one or more files">
    </div>
  </div>

  <div class="actionBtn">
    <a class="waves-effect waves-light btn btnSave">Save</a>
  </div>

  <?php
    if(isset($images) && count($images) > 0){
      foreach($images as $image){
        $extension_pos = strrpos($image['filename'], '.'); // find position of the last dot, so where the extension starts
        $thumb = substr($image['filename'], 0, $extension_pos) . '_thumb' . substr($image['filename'], $extension_pos);
        echo "<div class='product_images' data-id='{$image['id']}'>";
        echo img("uploads/{$thumb}");

        echo "<a data-category_image_id='".$image['id']."' class='delete_image waves-effect waves-light btn'>";
        echo "<i class='material-icons left'>clear</i>";
        echo "</a>";
        echo "</div><!-- close .product_images -->";
      }
    }
  ?>

<?= form_close() ?>

<?php if(count($products) > 0){ ?>
  <table class="striped">
    <thead>
      <tr>
        <th width="40%">Name</th>
        <th width="30%">Updated</th>
        <th width="30%">Actions</th>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach($products as $key => $item){
          echo "<tr>";
          echo "<td>{$item["name"]}</td>";
          echo "<td>{$item["updated_at"]}</td>";
          echo "<td>";
          echo anchor("admin/products/edit/{$item['product_id']}", "Edit");
          echo anchor("admin/products/delete/{$item['product_id']}", "Delete", array("class" => "delete_product red-text"));
          echo "</td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
<?php } else{ ?>
  <p>No products yet</p>
<?php } ?>

<div class="addProduct">
  <a href="<?= base_url().'admin/products/new/'.$category['id'] ?>" class="btn-floating btn-large waves-effect waves-light">
    <i class="material-icons">add</i>
  </a>
</div><!-- addProduct -->

<script>
  $('.sideRight').addClass('products');

  $("body").on("click", ".delete_product", function(e){
    if(confirm("Apakah anda yakin untuk menghapus produk ini?"))
      return true;
    else
      e.preventDefault();
  });

  $("body").on("click", ".btnSave", function(e){
    $('.editPage').submit();
  });

  $("body").on("click", ".delete_image", function(e){
    var category_image_id = this.dataset['category_image_id'],
      $product_image = $(this).parent('.product_images');

    console.log('category_image_id: ', category_image_id);
    if(confirm("Apakah anda yakin untuk menghapus gambar ini?")){
      $.ajax({
        url: '<?= base_url() ?>admin/product_images/delete/'+category_image_id,
        type: "POST",
        dataType: 'json',
        success: function(result){
          console.log('result: ', result);
          $product_image.remove();
        }
      });
      return true;
    }
    else
      return false;
  });
</script>
