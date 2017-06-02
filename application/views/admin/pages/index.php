<div class="col l10 m9 right">
  <div class="sideRight">
    <div class="title">
      <h5>List Page</h5>
    </div>
    <table class="striped">
      <thead>
        <tr>
          <th width="15%">Url</th>
          <th width="30%">Title</th>
          <th width="40%">Summary</th>
          <th width="15%">Action</th>
        </tr>
      </thead>

      <tbody>
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
      </tbody>
    </table>
  </div>
</div>
