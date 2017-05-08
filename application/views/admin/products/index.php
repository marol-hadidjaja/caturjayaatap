<?= anchor("admin/products/new", "New product") ?>
<?php if(count($products) > 0){ ?>
  <table border='1'>
    <tr>
      <th>Name</th>
      <th>Updated</th>
      <th></th>
    </tr>

    <?php
      foreach($products as $key => $item){
        echo "<tr>";
        echo "<td>{$item["name"]}</td>";
        echo "<td>{$item["updated_at"]}</td>";
        echo "<td>".anchor("admin/products/edit/{$item['id']}", "Edit")."</td>";
        echo "</tr>";
      }
    ?>
  </table>
<?php } else{ ?>
  <p>No products yet</p>
<?php } ?>
