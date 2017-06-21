<div class="title">
  <h5>List Product</h5>
</div>

<?php if(count($categories) > 0){ ?>
  <table class="striped">
    <thead>
      <tr>
        <!--<th></th>-->
        <th width="40%">Name</th>
        <th width="30%">Updated</th>
        <th width="30%">Actions</th>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach($categories as $key => $item){
          echo "<tr>";
          /*
          echo "<td>";
          if(count($item['images']) > 0)
            echo img($item['images'][0]['filename']);
          else
            echo img('public/images/no image.jpg');
          */
          echo "</td>";
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

<div class="addProduct">
<!--<a href="<?// = base_url().'admin/categories/new' ?>" class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">add</i></a>-->
<a href="#modal_add_category" class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">add</i></a>
</div><!-- addProduct -->

<div id="modal_add_category" class="modal">
  <div class="modal-content">
    <h4>Add Category</h4>
    <?= form_open('/admin/categories/create', array('class' => 'col s12', 'id' => 'form-new-category')) ?>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="New product's category" name="category" id="category" type="text" class="validate">
          <label for="category">Category</label>
        </div>
      </div>
    <?= form_close() ?>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="btn-create-category">Create</a>
  </div>
</div>

<script>
  $('#modal_add_category').modal();

  $('.sideRight').addClass('products');

  $("body").on("click", ".delete_product", function(e){
    if(confirm("Are you sure to delete this product?"))
      return true;
    else
      return false;

    e.preventDefault();
  });

  $('#btn-create-category').click(function(e){
    /*
    $.ajax({
    });
    */
    $('#form-new-category').submit();
  });
</script>
