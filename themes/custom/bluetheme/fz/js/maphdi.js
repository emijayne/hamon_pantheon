// map for reps hdi
var mapboxAccessToken = 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWtnbzJqMWFlNnR0bTNxcDhhYW0xaSJ9.tdujy5zALLoojTt2yEGtwA';
var mapboxAttribution = '&copy; <a href="https://www.mapbox.com/about/maps/">Mapbox</a> &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> | <strong>Hamon Deltak, Inc. Sales Representatives</strong>';

var maphdi =  L.map('repshdi', {
  fullscreenControl: true,
  fullscreenControlOptions: {
    position: 'topleft'
  }
}).setView([45, -99], 4);

L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/light-v9/tiles/256/{z}/{x}/{y}?access_token=' + mapboxAccessToken, {
  attribution: mapboxAttribution, 
  accessToken: mapboxAccessToken
}).addTo(maphdi);

// set style
var stylefun = function(feature) {
  return {
    color: '#C0C0C0', 
    weight: 1, 
    fillColor: feature.properties.color
  };
}

// set pop up info
var texthdiahm = '<div id="ahm" class="vcard"><h3 class="org">AHM Associates</h3><p class="callout"<strong>Territory:</strong> Arizona, California, Hawaii, Nevada</p><h5 class="fn">Lou Brizzolara</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:lbrizzolara@ahmassoc.com">lbrizzolara@ahmassoc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:14152054018" title="mobile phone number">1 415-205-4018</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15107856670" title="office phone number">1 510-785-6670</a>&nbsp;(O)<br /></p><h5 class="fn">Robert Erdmann</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:rerdmann@ahmassoc.com">rerdmann@ahmassoc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12094839964" title="mobile phone number">1 209-483-9964</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15107856670" title="office phone number">1 510-785-6670</a>&nbsp;(O)<br /></p><h5 class="fn">James Harber</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jharber@ahmassoc.com">jharber@ahmassoc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17148126025" title="mobile phone number">1 714-812-6025</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19493889571" title="office phone number">1 949-388-9571</a>&nbsp;(O)<br /></p></div>',
    texthdiapa = '<div id="apa" class="vcard"><h3 class="org">APA Inc.</h3><p class="callout"><strong>Territory:</strong> Illinois, Indiana, Ohio, Pennsylvania (western counties), Kentucky, West Virginia</p><h5 class="fn">Jene Bramel</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jbramelapa@fuse.net">jbramelapa@fuse.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15134846315" title="mobile phone number">1 513-484-6315</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15135610687" title="office phone number">1 513-561-0687</a>&nbsp;(O)<br /></p><h5 class="fn">Doug Cron</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:dcronapa@fuse.net">dcronapa@fuse.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15136040396" title="mobile phone number">1 513-604-0396</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15135610687" title="office phone number">1 513-561-0687</a>&nbsp;(O)<br /></p></div>',
    texthdicej = '<div id="cej" class="vcard"><h3 class="org">Cejka Industrial </h3><p class="callout"><strong>Territory:</strong> Texas | <em>aftermarket only</em> | <em>refineries only</em></p><h5 class="fn">John Cejka</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jcejka@cejkafixindustrial.com">jcejka@cejkafixindustrial.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18329043000" title="mobile phone number">1 832-904-3000</a><br /></p></div>',
    texthdicom = '<div id="com" class="vcard"><h3 class="org">Combustion Technology</h3><p class="callout"<strong>Territory:</strong> No. Carolina, So. Carolina, Virginia</p><h5 class="fn">Dave Earley</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:dearley@combustiontc.com">dearley@combustiontc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19193063688" title="mobile phone number">1 919-306-3688</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19193673647" title="office phone number">1 919-367-3647</a>&nbsp;(O)<br /></p><h5 class="fn">Joe Estrada</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jestrada@combustiontc.com">jestrada@combustiontc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17275185028" title="mobile phone number">1 727-518-5028</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19193673647" title="office phone number">1 919-367-3647</a>&nbsp;(O)<br /></p><h5 class="fn">Nick Ferri</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:nwferri@combustiontc.com">nwferri@combustiontc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19196237133" title="mobile phone number">1 919-623-7133</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19193673647" title="office phone number">1 919-367-3647</a>&nbsp;(O)<br /></p></div>';

// move the text to an outside box
// var elem = document.getElementById('repshditxt');

var clickMe = function (feature, layer) {
  layer.bindPopup(window['text' + feature.properties.REP_ID]);

  // layer.on({
  //   click: function(e) {
  //     console.log(e);
  //     elem.innerHTML = window['text' + feature.properties.REP_ID];
  //   }
  // });
}

// add filters to pick out the desired json features
var filterOem = function (feature, layer) {
  return feature.properties.oemmkt;
}
var filterAft = function (feature, layer) {
  return feature.properties.aftmkt;
}

// set layers and the control
var oemmap = L.geoJson(hdidata, {style: stylefun, onEachFeature: clickMe, filter: filterOem}).addTo(maphdi);
var aftmap = L.geoJson(hdidata, {style: stylefun, onEachFeature: clickMe, filter: filterAft});

var jsonData = {
   "New Construction": oemmap, 
   "Aftermarket": aftmap
}

L.control.layers(jsonData, null, {collapsed: false}).addTo(maphdi);
