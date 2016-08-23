(function ($) {

  // map tile
  var basemap = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
    attribution: '&copy Hamon', maxZoom: 16, accessToken: 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWxrbGxrMWFtaXVrbTNmNWE2dWZkZyJ9.1mt_VncCBhOtJSpSsXN96g'})

  // maps
  var mapmain = L.map('locationmap').setView([44.9925, -93.449522], 4);
  var maphc = L.map('hcoffices').setView([44.9925, -93.449522], 4);
  var maprcc = L.map('rccoffices').setView([44.9925, -93.449522], 4);
  var maphrcreps = L.map('hrcrepmap').setView([44.9925, -93.449522], 4);
  var maphdireps = L.map('hdirepmap').setView([44.9925, -93.449522], 4);
  var maprccreps = L.map('rccrepmap').setView([44.9925, -93.449522], 4);

  // offices
  var locCorp = L.marker([40.567, -74.609997]);
  var lochcal = L.marker([33.581108, -86.644748]);
  var lochcin = L.marker([39.493304, -87.127383]);
  var lochcut = L.marker([40.60192, -111.988264]);
  var lochcca = L.marker([43.855202, -79.387218]).bindPopup("Hamon Custodis Cottrell Canada");
  var lochdi = L.marker([44.9925, -93.449522]).bindPopup("Hamon Deltak, Inc.");
  var locttc = L.marker([40.378223, -79.846091]).bindPopup("Thermal Transfer Corporation");

  // www.hamonusa.com/locations
  basemap.addTo(mapmain);
  locCorp.addTo(mapmain).openPopup()
    .bindPopup("<b>Hamon Corporate Headquarters</b><br />Hamon Custodis, Inc. | <em>Corp &amp; Eastern Office</em><br />Hamon Research Cottrell, Inc.<br />Research Cottrell Cooling, Inc. | <em>Corp &amp; Eastern Office</em>")    ;
  lochcal.addTo(mapmain).bindPopup("<em><strong>Southern Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  lochcin.addTo(mapmain).bindPopup("<em><strong>MidWest Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  lochcut.addTo(mapmain).bindPopup("<em><strong>Western Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  lochdi.addTo(mapmain);
  lochcca.addTo(mapmain);
  locttc.addTo(mapmain);

  // www.hamonusa.com/locations/hc
  basemap.addTo(maphc);
  locCorp.addTo(maphc).bindPopup("Eastern Region Office");
  lochcal.addTo(maphc).bindPopup("Southern Office");
  lochcin.addTo(maphc).bindPopup("MidWest Office");
  lochcut.addTo(maphc).bindPopup("Western Office");
  lochcca.addTo(maphc);

  // www.hamonusa.com/locations/hc
  basemap.addTo(maprcc);
  locCorp.addTo(maprcc).bindPopup("Eastern Region Office");
  lochcal.addTo(maprcc).bindPopup("Southern Office");
  lochcin.addTo(maprcc).bindPopup("MidWest Office");
  lochcut.addTo(maprcc).bindPopup("Western Office");
  lochcca.addTo(maprcc);

})(jQuery);