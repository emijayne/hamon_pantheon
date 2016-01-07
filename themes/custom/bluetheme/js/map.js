(function ($) {
  // Add basemap tiles and attribution.
  var baseLayer = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
  });

  // Create map and set center and zoom.
  var map = L.map('map', {
    scrollWheelZoom: false,
    center: [40.5699382,-74.6107626],
    zoom: 15
  });

  // Add basemap to map.
  map.addLayer(baseLayer);
})(jQuery);