// map for reps rcc
var mapboxAccessToken = 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWtnbzJqMWFlNnR0bTNxcDhhYW0xaSJ9.tdujy5zALLoojTt2yEGtwA';
var mapboxAttribution = '&copy; <a href="https://www.mapbox.com/about/maps/">Mapbox</a> &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> | <strong>Research Cottrell Cooling Sales Representatives</strong>';

var maprcc =  L.map('repsrcc', {
  fullscreenControl: true,
  fullscreenControlOptions: {
    position: 'topleft'
  }
}).setView([45, -99], 4);

L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/light-v9/tiles/256/{z}/{x}/{y}?access_token=' + mapboxAccessToken, {
  attribution: mapboxAttribution, 
  accessToken: mapboxAccessToken
}).addTo(maprcc);

// set style
var stylefun = function(feature) {
  return {
    color: '#C0C0C0', 
    weight: 1, 
    fillColor: feature.properties.color
  };
}

// set pop up info
var textrccbtu = '<div id="btu" class="vcard"><h3 class="org">BTU Company</h3><p class="callout"><strong>Territory:</strong> Iowa, Kansas, Missouri, Nebraska</p><h5 class="fn">Erik Heitman</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:erik@btucompany.com">erik@btucompany.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19139088063" title="mobile phone number">1 913-908-8063</a><br /></p></div>',
    textrccahm = '<div id="ahm" class="vcard"><h3 class="org">AHM Associates</h3><p class="callout"<strong>Territory:</strong> Arizona, California, Nevada</p><h5 class="fn">Lou Brizzolara</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:lbrizzolara@ahmassoc.com">lbrizzolara@ahmassoc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:14152054018" title="mobile phone number">1 415-205-4018</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15107856670" title="office phone number">1 510-785-6670</a>&nbsp;(O)<br /></p><h5 class="fn">Robert Erdmann</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:rerdmann@ahmassoc.com">rerdmann@ahmassoc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12094839964" title="mobile phone number">1 209-483-9964</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15107856670" title="office phone number">1 510-785-6670</a>&nbsp;(O)<br /></p><h5 class="fn">James Harber</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jharber@ahmassoc.com">jharber@ahmassoc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17148126025" title="mobile phone number">1 714-812-6025</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19493889571" title="office phone number">1 949-388-9571</a>&nbsp;(O)<br /></p></div>',
    textrccast = '<div id="astech" class="vcard"><h3 class="org">As-Tech, Inc.</h3><p class="callout"><strong>Territory:</strong> Alabama, Florida, Georgia, Mississippi, No. Carolina, So. Carolina<br />Excludes Southern Company</p><h5 class="fn">Terry Rush</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:terry.rush@astechusa.com">terry.rush@astechusa.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:14049318744" title="mobile phone number">1 404-931-8744</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17702051841" title="office phone number">1 770-205-1841</a>&nbsp;(O)<br /></p><h5 class="fn">Chad Nixon</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:chad.nixon@astechusa.com">chad.nixon@astechusa.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17708621629" title="mobile phone number">1 770-862-1629</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17702051841" title="office phone number">1 770-205-1841</a>&nbsp;(O)<br /></p></div>',
    textrcctex = '<div id="txind" class="vcard"><h3 class="org">Texas Industrial Sales</h3><p class="callout"><strong>Territory:</strong> Texas | <em>new construction only</em></p><h5 class="fn">Mark Seilkop</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:mark@txindustrialsales.com">mark@txindustrialsales.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17134783689" title="mobile phone number">1 713-478-3689</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12817414185" title="office phone number">1 281-741-4185</a><br /></p></div>',
    textrccapa = '<div id="apa" class="vcard"><h3 class="org">APA Inc.</h3><p class="callout"><strong>Territory:</strong> Southern Illinois, Indiana, Ohio, Western Pennsylvania, Kentucky, West Virginia</p><h5 class="fn">Jene Bramel</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jbramelapa@fuse.net">jbramelapa@fuse.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15134846315" title="mobile phone number">1 513-484-6315</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15135610687" title="office phone number">1 513-561-0687</a>&nbsp;(O)<br /></p><h5 class="fn">Doug Cron</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:dcronapa@fuse.net">dcronapa@fuse.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15136040396" title="mobile phone number">1 513-604-0396</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15135610687" title="office phone number">1 513-561-0687</a>&nbsp;(O)<br /></p></div>',
    textrcccej = '<div id="cejka" class="vcard"><h3 class="org">Cejka Industrial </h3><p class="callout"><strong>Territory:</strong> Texas | <em>aftermarket only</em></p><h5 class="fn">John Cejka</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jcejka@cejkafixindustrial.com">jcejka@cejkafixindustrial.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18329043000" title="mobile phone number">1 832-904-3000</a><br /></p></div>';

// move the text to an outside box
// var elem = document.getElementById('repsrcctxt');

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
var oemmap = L.geoJson(rccdata, {style: stylefun, onEachFeature: clickMe, filter: filterOem}).addTo(maprcc);
var aftmap = L.geoJson(rccdata, {style: stylefun, onEachFeature: clickMe, filter: filterAft});

var jsonData = {
   "New Construction": oemmap, 
   "Aftermarket": aftmap
}

L.control.layers(jsonData, null, {collapsed: false}).addTo(maprcc);
