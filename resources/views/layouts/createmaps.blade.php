<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
    #map {
      height: 300px;
    }
    html, body {
      height: 50%;
      margin: 0;
      padding: 0;
    }	
  </style>
</head>
<body>
  <div id="map"></div>
  <script>
    let map;
    let markersArray = [];
    let polyline = null;

    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -8.478316, lng: 114.335231},
        zoom: 10
      });
      // map onclick listener 
      map.addListener('click', function(e) {
        //console.log(e);
        addMarker(e.latLng);
        drawPolyline();
      });
    }

    // define function to add marker at given lat & lng
    function addMarker(latLng) {
      let marker = new google.maps.Marker({
          map: map,
          position: latLng,
          draggable: true
      });
    
    //   if(markersArray==null){
        console.log('awal')
      console.log(latLng.lat());
      console.log(latLng.lng());
      
    //   }
     if(markersArray.length ==1){
        console.log('akhir')
      console.log(latLng.lat());
      console.log(latLng.lng());
 

        }else if(markersArray.length ==2){
            console.log('reset')
            polyline.setMap(null);
            
        }

    //   console.log(latLng.lat());
    //   console.log(latLng.lng());

      // add listener to redraw the polyline when markers position change
      marker.addListener('position_changed', function() {
        drawPolyline();
      });

      //store the marker object drawn in global array
      markersArray.push(marker);
    }

    // define function to draw polyline that connect markers' position
    function drawPolyline() {
      let markersPositionArray = [];
      // obtain latlng of all markers on map
      markersArray.forEach(function(e) {
        markersPositionArray.push(e.getPosition()
        );
        console.log(markersPositionArray+'data');
      }
      );

      // check if there is already polyline drawn on map
      // remove the polyline from map before we draw new one
      if (polyline !== null) {
        polyline.setMap(null);
      }

      // draw new polyline at markers' position
      polyline = new google.maps.Polyline({
        map: map,
        path: markersPositionArray,
        strokeOpacity: 0.4
      });
    }

  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDv-h2II7DbFQkpL9pDxNRq3GWXqS5Epts&callback=initMap">
       
  </script>
  
</body>
</html>