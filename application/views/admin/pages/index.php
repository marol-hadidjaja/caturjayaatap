<table border='1'>
  <tr>
    <th>Url</th>
    <th>Title</th>
    <th>Summary</th>
    <th></th>
  </tr>

  <?php
    foreach($pages as $key => $item){
      echo "<tr>";
      echo "<td>/{$item["url"]}</td>";
      echo "<td>{$item["title"]}</td>";
      echo "<td>{$item["summary"]}</td>";
      $url = $item["url"]=="" ? "home" : $item["url"];
      echo "<td>".anchor("admin/pages/edit/{$url}", "Edit")."</td>";
      echo "</tr>";
    }
  ?>
</table>
