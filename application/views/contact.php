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
    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBmtfl3iVGQXNvcQrZLzIIs7T1tlWvBatg&sensor=false&callback=getLocation";
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
    }, 2000);
    document.body.appendChild(script);
  }

  var myLatLng;
  var latit;
  var longit;
  function geoSuccess(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    myLatLng = {
      lat: latitude,
      lng: longitude
    };

    var maplatlng = new google.maps.LatLng(-7.413437, 112.675562);
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

    // var directionsService = new google.maps.DirectionsService;
    // var directionsDisplay = new google.maps.DirectionsRenderer;
    // call renderer to display directions
    // directionsDisplay.setMap(map);

    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(),
        marker, i;

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        latit = marker.getPosition().lat();
        longit = marker.getPosition().lng();
         console.log("lat: " + latit);
         console.log("lng: " + longit);
      }
    })(marker, i));
    marker.addListener('click', function() {
      // window.open('http://google.co.id/maps/preview/@' + latit + ',' + longit + ',17z');
      window.open('http://google.co.id/maps?q=loc:' + latit + ',' + longit);
      /*
        directionsService.route({
          // origin: document.getElementById('start').value,
          origin: myLatLng,
          // destination: marker.getPosition(),
          destination: {
              lat: latit,
              lng: longit
          },
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
              directionsDisplay.setDirections(response);
          } else {
              window.alert('Directions request failed due to ' + status);
          }
        });
      */
    });
  }

  function geoError() {
    alert("Geocoder failed.");
  }

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
      // alert("Geolocation is supported by this browser.");
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  // google maps
  function loadmap(){
    // Kebon Agung
    // var maplatlng = new google.maps.LatLng(-7.415812, 112.674312);

    // Gunung Kweni
    // var maplatlng = new google.maps.LatLng(-7.413437, 112.675562);
    getLocation()
  }

  loadScript();
</script>
