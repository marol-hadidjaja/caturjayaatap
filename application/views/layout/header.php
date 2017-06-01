<ul class="side-nav" id="mobile-demo">
  <?php
    foreach($pages as $page){
      echo "<li>".anchor($page['url'], $page['title'])."</li>";
    }
  ?>
</ul>
