<div class="menu z-depth-3">
  <div class="row">
    <div class="l12 s12 m12 col">
      <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo"><?= img('public/images/logo.png') ?></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="right hide-on-small-and-down">
            <?php
              foreach($pages as $p){
                $class = $p['url'] == 'contact' ? " class='current'" : "";
                echo "<li{$class}>".anchor($p['url'], $p['title'])."</li>";
              }
            ?>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>

<div class="backgrey">
  <div class="container padded contact">
    <div class="row">
      <div class="content m6 s12 col">
        <div class="subcontent">
          <div class="title">
            <h5>Hubungi <span>Kami</span></h5>
          </div>

          <?= $page['summary']?>

          <?php
            if(isset($setting->workshop_address) && $setting->workshop_address != '')
              echo "<p><b>Alamat Workshop:</b> {$setting->workshop_address}</p>";
            if(isset($setting->workshop_phone) && $setting->workshop_phone != '')
              echo "<p><b>Telepon Workshop:</b> {$setting->workshop_phone}</p>";
            if(isset($setting->office_address) && $setting->office_address != '')
              echo "<p><b>Alamat Kantor:</b> {$setting->office_address}</p>";
            if(isset($setting->office_phone) && $setting->office_phone != '')
              echo "<p><b>Telepon Kantor:</b> {$setting->office_phone}</p>";
            if(isset($setting->email) && $setting->email != '')
              echo "<p><b>Email:</b> {$setting->email}</p>";
          ?>
        </div>
      </div><!-- content -->
      <div class="col m6 s12">
        <div id="map_canvas" style="height: 400px;"></div>
      </div><!-- map -->
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $(".button-collapse").sideNav();
  });
</script>

<!-- maps -->
<script type="text/javascript">
  function loadScript(){
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyD7VKj-zyKnDaIMva1JxE21m0DtwvwG-_E&sensor=false&callback=loadmap";
    setTimeout(function () {
      try{
        if (!google || !google.maps) {
          // This will Throw the error if 'google' is not defined
          console.log("!google or !google.maps");
        }
      }
      catch (e) {
        console.log(e);
        console.log("error -- load script");
      }
    }, 5000);
    document.body.appendChild(script);
  }

  // google maps
  function loadmap(){
    var maplatlng = new google.maps.LatLng(-7.415812, 112.674312);
    var settings = {
      zoom: 17,
      center: maplatlng,
      mapTypeControl: false,
      navigationControl: false,
      scrollwheel: false,
      scaleControl: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
    var marker = new google.maps.Marker({
      position: maplatlng,
      map: map
    });
  }

  loadScript();
</script>
