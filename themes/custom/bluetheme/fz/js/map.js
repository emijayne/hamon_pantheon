(function ($) {

  var mymap = L.map('locationmap').setView([40.5699382,-74.6107626], 15);

  L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ',
    maxZoom: 16,
    accessToken: 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWxrbGxrMWFtaXVrbTNmNWE2dWZkZyJ9.1mt_VncCBhOtJSpSsXN96g'
  }).addTo(mymap);

  var som = L.marker([40.567, -74.609997]).addTo(mymap);
  var bir = L.marker([33.581108, -86.644748]).addTo(mymap);
  var brz = L.marker([39.493304, -87.127383]).addTo(mymap);
  var ply = L.marker([44.9925, -93.449522]).addTo(mymap);
  var san = L.marker([40.60192, -111.988264]).addTo(mymap);
  var can = L.marker([43.855202, -79.387218]).addTo(mymap);
  var pit = L.marker([40.378223, -79.846091]).addTo(mymap);

  som.bindPopup("Hamon Corporate Headquarters<br />Hamon Custodis | Eastern Office<br />Hamon Research Cottrell, Inc.<br />Research Cottrell Cooling, Inc.").openPopup();
  brz.bindPopup("Hamon Custodis | MidWest Office");
  bir.bindPopup("Hamon Custodis | Southern Office");
  san.bindPopup("Hamon Custodis | Western Office");
  can.bindPopup("Hamon Custodis Cottrell Canada");
  ply.bindPopup("Hamon Deltak, Inc.");
  pit.bindPopup("Thermal Transfer Corporation");


})(jQuery);