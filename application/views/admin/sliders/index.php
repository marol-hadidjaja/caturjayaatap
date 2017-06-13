<div class="title">
  <h5>List Slider</h5>
</div>

<?php if(count($sliders) > 0){ ?>
  <table class="striped">
    <thead>
      <tr>
        <th width="30%">Photo</th>
        <th width="15%">Title</th>
        <th width="40%">Description</th>
        <th width="15%">Action</th>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach($sliders as $key => $item){
          echo "<tr>";
          $extension_pos = strrpos($item['filename'], '.'); // find position of the last dot, so where the extension starts
          $thumb = substr($item['filename'], 0, $extension_pos) . '_thumb' . substr($item['filename'], $extension_pos);
          echo "<td>".img('uploads/'.$thumb)."</td>";
          echo "<td>{$item["title"]}</td>";
          echo "<td>{$item["description"]}</td>";
          echo "<td>";
          echo anchor("admin/sliders/edit/{$item['id']}", "Edit");
          echo anchor("admin/sliders/delete/{$item['id']}", "Delete", array("class" => "delete_slider red_text"));
          echo "</td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
<?php } else{ // close check sliders ?>
  <p>No sliders yet</p>
<?php } ?>
<div class="addProduct">
  <a href="<?= base_url()."admin/sliders/new" ?>" class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">add</i></a>
</div><!-- addProduct -->

<script>
  $('.sideRight').addClass('sliders');

  $("body").on("click", ".delete_slider", function(e){
    if(confirm("Are you sure to delete this slider?"))
      return true;
    else
      return false;

    e.preventDefault();
  });
</script>
