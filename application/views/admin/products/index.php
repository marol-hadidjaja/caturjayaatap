<div class="title">
  <h5>List Product</h5>
</div>

<?php if(count($categories) > 0){ ?>
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
        foreach($categories as $key => $item){
          echo "<tr>";
          echo "<td>{$item["name"]}</td>";
          echo "<td>{$item["updated_at"]}</td>";
          echo "<td>";
          echo anchor("admin/categories/edit/{$item['id']}", "Edit");
          // echo anchor("admin/products/delete/{$item['id']}", "Delete", array("class" => "delete_product red-text"));
          echo "</td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
<?php } else{ ?>
  <p>No products yet</p>
<?php } ?>

<!--<div class="addProduct">
<a href="<?//= base_url().'admin/products/new' ?>" class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">add</i></a>
</div>--><!-- addProduct -->

<script>
  $('.sideRight').addClass('products');

  $("body").on("click", ".delete_product", function(e){
    if(confirm("Are you sure to delete this product?"))
      return true;
    else
      return false;

    e.preventDefault();
  });
</script>
