(function ($) {

  // var mapmain = L.map('locationmap').setView([44.9925, -93.449522], 4);

  // L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
  //     attribution: '&copy Hamon', 
  //     maxZoom: 16, 
  //     accessToken: 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWxrbGxrMWFtaXVrbTNmNWE2dWZkZyJ9.1mt_VncCBhOtJSpSsXN96g'}
  // ).addTo(mapmain);

  // L.marker([40.567, -74.609997]).addTo(mapmain).bindPopup("<b>Hamon Corporate Headquarters</b><br />Hamon Custodis, Inc. | <em>Corp &amp; Eastern Office</em><br />Hamon Research Cottrell, Inc.<br />Research Cottrell Cooling, Inc. | <em>Corp &amp; Eastern Office</em>");
  // L.marker([33.581108, -86.644748]).addTo(mapmain).bindPopup("<em><strong>Southern Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  // L.marker([39.493304, -87.127383]).addTo(mapmain).bindPopup("<em><strong>MidWest Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  // L.marker([40.60192, -111.988264]).addTo(mapmain).bindPopup("<em><strong>Western Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  // L.marker([43.855202, -79.387218]).addTo(mapmain).bindPopup("Hamon Custodis Cottrell Canada");
  // L.marker([44.9925, -93.449522]).addTo(mapmain).bindPopup("Hamon Deltak, Inc.");
  // L.marker([40.378223, -79.846091]).addTo(mapmain).bindPopup("Thermal Transfer Corporation");

// -------------------------------------

  // www.hamonusa.com/locations

  var mapmain = L.map('locationmap').setView([44.9925, -93.449522], 4);
  
  L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
    attribution: '&copy Hamon', 
    maxZoom: 16, 
    accessToken: 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWxrbGxrMWFtaXVrbTNmNWE2dWZkZyJ9.1mt_VncCBhOtJSpSsXN96g'
  }).addTo(mapmain);

  L.marker([40.567, -74.609997]).addTo(mapmain)
    .bindPopup("<b>Hamon Corporate Headquarters</b><br />Hamon Custodis, Inc. | <em>Corp &amp; Eastern Office</em><br />Hamon Research Cottrell, Inc.<br />Research Cottrell Cooling, Inc. | <em>Corp &amp; Eastern Office</em>")
    .openPopup();
  L.marker([33.581108, -86.644748]).addTo(mapmain).bindPopup("<em><strong>Southern Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  L.marker([39.493304, -87.127383]).addTo(mapmain).bindPopup("<em><strong>MidWest Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  L.marker([40.60192, -111.988264]).addTo(mapmain).bindPopup("<em><strong>Western Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  L.marker([43.855202, -79.387218]).addTo(mapmain).bindPopup("Hamon Custodis Cottrell Canada");
  L.marker([44.9925, -93.449522]).addTo(mapmain).bindPopup("Hamon Deltak, Inc.");
  L.marker([40.378223, -79.846091]).addTo(mapmain).bindPopup("Thermal Transfer Corporation");

  // www.hamonusa.com/locations/hc

  var maphc = L.map('hcoffices').setView([44.9925, -93.449522], 4);

  L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
    attribution: '&copy Hamon', 
    maxZoom: 16, 
    accessToken: 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWxrbGxrMWFtaXVrbTNmNWE2dWZkZyJ9.1mt_VncCBhOtJSpSsXN96g'}).addTo(maphc);
  
  L.marker([40.567, -74.609997]).addTo(maphc).bindPopup("Eastern Region Office");
  L.marker([33.581108, -86.644748]).addTo(maphc).bindPopup("Southern Office");
  L.marker([39.493304, -87.127383]).addTo(maphc).bindPopup("MidWest Office");
  L.marker([40.60192, -111.988264]).addTo(maphc).bindPopup("Western Office");
  L.marker([43.855202, -79.387218]).addTo(maphc).bindPopup("Hamon Custodis Cottrell Canada");

  // www.hamonusa.com/locations/rcc
  
  var maprcc = L.map('rccoffices').setView([44.9925, -93.449522], 4);

  L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
    attribution: '&copy Hamon', 
    maxZoom: 16, 
    accessToken: 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWxrbGxrMWFtaXVrbTNmNWE2dWZkZyJ9.1mt_VncCBhOtJSpSsXN96g'}).addTo(maprcc);
  
  L.marker([40.567, -74.609997]).addTo(maprcc).bindPopup("Eastern Region Office");
  L.marker([33.581108, -86.644748]).addTo(maprcc).bindPopup("Southern Office");
  L.marker([39.493304, -87.127383]).addTo(maprcc).bindPopup("MidWest Office");
  L.marker([40.60192, -111.988264]).addTo(maprcc).bindPopup("Western Office");
  L.marker([43.855202, -79.387218]).addTo(maprcc).bindPopup("Hamon Custodis Cottrell Canada");

  // maps
  // var maphrcreps = L.map('hrcrepmap').setView([44.9925, -93.449522], 4);
  // var maphdireps = L.map('hdirepmap').setView([44.9925, -93.449522], 4);
  // var maprccreps = L.map('rccrepmap').setView([44.9925, -93.449522], 4);

})(jQuery);