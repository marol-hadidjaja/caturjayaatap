<h3>This is header(layout/header.php)</h3>
<ul>
  <?php
    foreach($pages as $page){
      echo "<li>{$page['title']}</li>";
    }
  ?>
</ul>
