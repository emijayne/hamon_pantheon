(function ($) {

  var mymap = L.map('locationmap').setView([40.5699382,-74.6107626], 4);

  L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ',
    maxZoom: 16,
    accessToken: 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWxrbGxrMWFtaXVrbTNmNWE2dWZkZyJ9.1mt_VncCBhOtJSpSsXN96g'
  }).addTo(mymap);

  L.marker([40.567, -74.609997]).addTo(mymap)
    .bindPopup("<b>Hamon Corporate Headquarters</b><br />Hamon Custodis | <em>Eastern Office</em><br />Hamon Research Cottrell, Inc.<br />Research Cottrell Cooling, Inc.")
    .openPopup();
  L.marker([33.581108, -86.644748]).addTo(mymap)
    .bindPopup("Hamon Custodis | <em>MidWest Office</em>");

  L.marker([39.493304, -87.127383]).addTo(mymap)
    .bindPopup("Hamon Custodis | <em>Southern Office</em>");

  L.marker([44.9925, -93.449522]).addTo(mymap)
    .bindPopup("Hamon Custodis | <em>Western Office</em>");

  L.marker([40.60192, -111.988264]).addTo(mymap)
    .bindPopup("Hamon Custodis Cottrell Canada");

  L.marker([43.855202, -79.387218]).addTo(mymap)
    .bindPopup("Hamon Deltak, Inc.");

  L.marker([40.378223, -79.846091]).addTo(mymap)
    .bindPopup("Thermal Transfer Corporation");

})(jQuery);