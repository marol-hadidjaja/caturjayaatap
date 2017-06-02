<div class="col l10 m9 right">
  <div class="sideRight">
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
              echo "<td>{$item["title"]}</td>";
              echo "<td>{$item["description"]}</td>";
              echo "<td>".anchor("admin/sliders/edit/{$item['id']}", "Edit")."</td>";
              echo "<td>".anchor("admin/sliders/delete/{$item['id']}", "Delete", array("class" => "delete_slider"))."</td>";
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
  </div>
</div>

<script>
  $("body").on("click", ".delete_slider", function(e){
    if(confirm("Are you sure to delete this slider?"))
      return true;
    else
      return false;

    e.preventDefault();
  });
</script>
