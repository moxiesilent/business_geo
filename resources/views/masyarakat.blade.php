<html lang="en">
  <head>
    <title>Leaflet 02</title>
    <link rel="stylesheet" href="../assets_leaflet/leaflet.css" type="text/css">
    <script src="../assets_leaflet/leaflet.js" type="text/javascript"></script>  
  </head>
  <body>
    <h2>160418075 MAP</h2>
    <div id="map" style="height: 90%; width: 95%; margin: auto;"></div>
    <script type="text/javascript">

      var map = L.map('map').setView([-1.329330, 118.281142], 5.5);
      var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {});

      var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

      var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

      var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
          maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']
      });

      osm.addTo(map);
      
      var baseMaps = {
        "OpenStreetMap": osm,
        "Google Street":googleStreets,
        "Google Satellite": googleSat,
        "googleHybrid":googleHybrid
      };

      var myIcon = L.icon({
        iconUrl: '../icons/libraries.png',
        iconSize: [30, 40],
        iconAnchor: [15, 40],
      }); 

      var ubaya= L.marker([ -7.321946 ,112.768093],{icon:myIcon}).bindPopup("Universitas Surabaya");
      var unair= L.marker([ -7.271833, 112.758296]).bindPopup("Universitas Airlangga");
  	  var its= L.marker([-7.282437, 112.794524]).bindPopup("ITS");

      var ubaya= L.marker([ -7.321946 ,112.768093] ,{icon:myIcon}).addTo(map);
      ubaya.on('click',function(e) {
        var pop=L.popup();
        pop.setLatLng(e.latlng);
        pop.setContent("<h2>Universitas Surabaya</h2><img src='https://ubaya.ac.id/images/logo.png' width='200px' > <br> <br> <a href='https://ubaya.ac.id'>website</a>");
        map.openPopup(pop);
      });


      var univs = L.layerGroup([ubaya, its, unair]);
      var overlayMaps = {"Universitas": univs };

      ubaya.addTo(map);
      unair.addTo(map);
      its.addTo(map);
      univs.addTo(map);

      L.control.layers(baseMaps, overlayMaps).addTo(map);
    </script>
  </body>
</html>