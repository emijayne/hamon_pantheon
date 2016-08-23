(function ($) {

  // offices
  var locCorp = L.marker([40.567, -74.609997]);
  var lochcal = L.marker([33.581108, -86.644748]);
  var lochcin = L.marker([39.493304, -87.127383]);
  var lochcut = L.marker([40.60192, -111.988264]);
  var lochcca = L.marker([43.855202, -79.387218]);
  var lochdi = L.marker([44.9925, -93.449522]).bindPopup("Hamon Deltak, Inc.");
  var locttc = L.marker([40.378223, -79.846091]).bindPopup("Thermal Transfer Corporation");

  // maps
  var mapmain = L.map('locationmap').setView([44.9925, -93.449522], 4);
  var maphc = L.map('hcoffices').setView([44.9925, -93.449522], 4);
  var maprcc = L.map('rccoffices').setView([44.9925, -93.449522], 4);
  var maphrcreps = L.map('hrcrepmap').setView([44.9925, -93.449522], 4);
  var maphdireps = L.map('hdirepmap').setView([44.9925, -93.449522], 4);
  var maprccreps = L.map('rccrepmap').setView([44.9925, -93.449522], 4);


  L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ',
    maxZoom: 16,
    accessToken: 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWxrbGxrMWFtaXVrbTNmNWE2dWZkZyJ9.1mt_VncCBhOtJSpSsXN96g'
  }).addTo(mapmain);

  locCorp.addTo(mapmain)
    .bindPopup("<b>Hamon Corporate Headquarters</b><br />Hamon Custodis | <em>Eastern Office</em><br />Hamon Research Cottrell, Inc.<br />Research Cottrell Cooling, Inc.")
    .openPopup();
  lochcal.addTo(mapmain).bindPopup("Hamon Custodis | <em>Southern Office</em>");
  lochcin.addTo(mapmain).bindPopup("Hamon Custodis | <em>MidWest Office</em>");
  lochdi.addTo(mapmain);
  lochcut.addTo(mapmain).bindPopup("Hamon Custodis | <em>Western Office</em>");
  lochcca.addTo(mapmain).bindPopup("Hamon Custodis Cottrell Canada");
  locttc.addTo(mapmain);

})(jQuery);