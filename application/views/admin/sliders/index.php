<?= anchor("admin/sliders/new", "New slider") ?>
<?php if(count($sliders) > 0){ ?>
  <table border='1'>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th></th>
    </tr>

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
  </table>
<?php } else{ ?>
  <p>No products yet</p>
<?php } ?>

<script>
  $("body").on("click", ".delete_slider", function(e){
    if(confirm("Are you sure to delete this slider?"))
      return true;
    else
      return false;

    e.preventDefault();
  });
</script>
