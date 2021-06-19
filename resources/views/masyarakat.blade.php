<html lang="en">
  <head>
    <title>Peta Persebaran Virus COVID-19</title>
    <link rel="stylesheet" href="../assets_leaflet/leaflet.css" type="text/css">
    <script src="../assets_leaflet/leaflet.js" type="text/javascript"></script>  
    <script src="../assets_leaflet/leaflet.ajax.js" type="text/javascript"></script>
  </head>
  <body>
    <h2>Peta Persebaran Virus COVID-19</h2>
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

      var kabupaten = L.geoJson.ajax('../geojson/indonesia_kab.geojson').addTo(map);

      var overlayMaps = {"Kabupaten": kabupaten };

      L.control.layers(baseMaps, overlayMaps).addTo(map);
    </script>
  </body>
</html>