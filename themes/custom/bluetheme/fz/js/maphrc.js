// map for reps hrc
var mapboxAccessToken = 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWtnbzJqMWFlNnR0bTNxcDhhYW0xaSJ9.tdujy5zALLoojTt2yEGtwA';
var mapboxAttribution = '&copy; <a href="https://www.mapbox.com/about/maps/">Mapbox</a> &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> | <strong>Hamon Research-Cottrell Sales Representatives</strong>';

var maphrc =  L.map('repshrc', {
  fullscreenControl: true,
  fullscreenControlOptions: {
    position: 'topleft'
  }
}).setView([45, -99], 4);

L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/light-v9/tiles/256/{z}/{x}/{y}?access_token=' + mapboxAccessToken, {
  attribution: mapboxAttribution, 
  accessToken: mapboxAccessToken
}).addTo(maphrc);

// set style
var stylefun = function(feature) {
  return {
    color: '#C0C0C0', 
    weight: 1, 
    fillColor: feature.properties.color
  };
}

// set pop up info
var texthrcbtu = '<div id="btu" class="vcard"><h3 class="org">BTU Company</h3><p class="callout"><strong>Territory:</strong> Iowa (western counties), Kansas, Missouri, Nebraska</p><h5 class="fn">Erik Heitman</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:erik@btucompany.com">erik@btucompany.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19139088063" title="mobile phone number">1 913-908-8063</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19133628540" title="office phone number">1 913-362-8540</a>&nbsp;(O)<br /></p><h5 class="fn">Andy Von Wolf</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:andy@btucompany.com">andy@btucompany.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18168073259" title="mobile phone number">1 816-807-3259</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19133628540" title="office phone number">1 913-362-8540</a>&nbsp;(O)<br /></p></div>',
    texthrcahm = '<div id="ahm" class="vcard"><h3 class="org">AHM Associates</h3><p class="callout"<strong>Territory:</strong> Arizona, California, Hawaii, Nevada</p><h5 class="fn">Lou Brizzolara</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:lbrizzolara@ahmassoc.com">lbrizzolara@ahmassoc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:14152054018" title="mobile phone number">1 415-205-4018</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15107856670" title="office phone number">1 510-785-6670</a>&nbsp;(O)<br /></p><h5 class="fn">Robert Erdman</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:rerdmann@ahmassoc.com">rerdmann@ahmassoc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12094839964" title="mobile phone number">1 209-483-9964</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15107856670" title="office phone number">1 510-785-6670</a>&nbsp;(O)<br /></p><h5 class="fn">James Harbor</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jharber@ahmassoc.com">jharber@ahmassoc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17148126025" title="mobile phone number">1 714-812-6025</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19493889571" title="office phone number">1 949-388-9571</a>&nbsp;(O)<br /></p></div>',
    texthrcapa = '<div id="apa" class="vcard"><h3 class="org">APA Inc.</h3><p class="callout"><strong>Territory:</strong> Illinois, Indiana, Ohio, Pennsylvania (western counties), Kentucky, West Virginia</p><h5 class="fn">Jene Bramel</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jbramelapa@fuse.net">jbramelapa@fuse.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15134846315" title="mobile phone number">1 513-484-6315</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15135610687" title="office phone number">1 513-561-0687</a>&nbsp;(O)<br /></p><h5 class="fn">Doug Cron</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:dcronapa@fuse.net">dcronapa@fuse.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15136040396" title="mobile phone number">1 513-604-0396</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15135610687" title="office phone number">1 513-561-0687</a>&nbsp;(O)<br /></p></div>',
    texthrccej = '<div id="cej" class="vcard"><h3 class="org">Cejka Industrial </h3><p class="callout"><strong>Territory:</strong> Texas | <em>aftermarket only</em> | <em>refineries only</em></p><h5 class="fn">John Cejka</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jcejka@cejkafixindustrial.com">jcejka@cejkafixindustrial.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18329043000" title="mobile phone number">1 832-904-3000</a><br /></p></div>',
    texthrcipe = '<div id="ipe" class="vcard"><h3 class="org">Industrial Packing</h3><p class="callout"><strong>Territory:</strong> <b>CA:</b> New Brunswick, Nova Scotia<br /><b>US:</b> Maine, New Hampshire</p><h5 class="fn">Tim Fitzgerald</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:tfitzgerald@industrialpacking.com">tfitzgerald@industrialpacking.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12079749075" title="mobile phone number">1 207-974-9075</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12074697361" title="office phone number">1 207-469-7361</a>&nbsp;(O)<br /></p></div>',
    texthrcipw = '<div id="ipw" class="vcard"><h3 class="org">Industrial Packing</h3><p class="callout"><strong>Territory:</strong> Oregon, Washington</p><h5 class="fn">Dave Prewitt</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:dave@industrialpacking.com">dave@industrialpacking.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:13604318764" title="mobile phone number">1 360-431-8764</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:13606362370" title="office phone number">1 360-636-2370</a>&nbsp;(O)<br /></p></div>',
    texthrccom = '<div id="com" class="vcard"><h3 class="org">Combustion Technology</h3><p class="callout"<strong>Territory:</strong> No. Carolina, So. Carolina, Virginia</p><h5 class="fn">Dave Earley</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:dearley@combustiontc.com">dearley@combustiontc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19193063688" title="mobile phone number">1 919-306-3688</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19193673647" title="office phone number">1 919-367-3647</a>&nbsp;(O)<br /></p><h5 class="fn">Joe Estrada</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:jestrada@combustiontc.com">jestrada@combustiontc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17275185028" title="mobile phone number">1 727-518-5028</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19193673647" title="office phone number">1 919-367-3647</a>&nbsp;(O)<br /></p><h5 class="fn">Nick Ferri</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:nwferri@combustiontc.com">nwferri@combustiontc.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19196237133" title="mobile phone number">1 919-623-7133</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19193673647" title="office phone number">1 919-367-3647</a>&nbsp;(O)<br /></p></div>',
    texthrctru = '<div id="tru" class="vcard"><h3 class="org">TruWinR Corp.</h3><p class="callout"><strong>Territory:</strong> Arkansas, Louisiana, Mississippi</p><h5 class="fn">Tom Larsen</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:thomas.larsen@truwinr.com">thomas.larsen@truwinr.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15045001418" title="office phone number">1 504-500-1418</a>&nbsp;(O)<br /></p><h5 class="fn">Winnie Raj</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:winnie.raj@truwinr.com">winnie.raj@truwinr.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15045001296" title="office phone number">1 504-500-1296</a>&nbsp;(O)<br /></p></div>',
    texthrcmod = '<div id="mod" class="vcard"><h3 class="org">Modern Technologies</h3><p class="callout"><strong>Territory:</strong> Iowa (eastern counties), Michigan (upper counties), Minnesota, Wisconsin</p><h5 class="fn">Tom Hynek</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:modernt7@att.net">modernt7@att.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19204944049" title="mobile phone number">1 920-494-4049</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19208510438" title="office phone number">1 920-851-0438</a>&nbsp;(O)<br /></p></div>',
    texthrccsm = '<div id="csm" class="vcard"><h3 class="org">CSM Sales</h3><p class="callout"><strong>Territory:</strong> Colorado, Montana, New Mexico, Utah, Wyoming | <em>refineries only</em></p><h5 class="fn">Larry Cejka</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:cscsales@hotmail.com">cscsales@hotmail.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15059751743" title="mobile phone number">1 505-975-1743</a>&nbsp;(M)<br /></p></div>',
    texthrcpps = '<div id="pps" class="vcard"><h3 class="org">Power Products & Services</h3><p class="callout"><strong>Territory:</strong> Colorado, Idaho (southeastern counties), Montana, Utah, Wyoming</p><h5 class="fn">Tom Hamilton</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:powerpro@wa-net.com">powerpro@wa-net.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:13609078137" title="mobile phone number">1 360-907-8137</a>&nbsp;(M)<br /></p></div>',
    texthrckru = '<div id="kru" class="vcard"><h3 class="org">Kruger Associates</h3><p class="callout"><strong>Territory:</strong> Texas | <em>New Construction only</em> | <em>Refineries only</em></p><h5 class="fn">Rick Kruger</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:rickkruger@pdq.net">rickkruger@pdq.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17138544571" title="mobile phone number">1 713-854-4571</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12817593900" title="office phone number">1 281-759-3900</a>&nbsp;(O)<br /></p><h5 class="fn">Joel Gittemeier</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:joelgittemeier@pdq.net">joelgittemeier@pdq.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12147044447" title="mobile phone number">1 214-704-4447</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12817593900" title="office phone number">1 281-759-3900</a>&nbsp;(O)<br /></p><h5 class="fn">Dan Morris</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:danmorris@pdq.net">danmorris@pdq.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18325193714" title="mobile phone number">1 832-519-3714</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12817593900" title="office phone number">1 281-759-3900</a>&nbsp;(O)<br /></p><h5 class="fn">Terry Lawson</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:terrylawson@pdq.net">terrylawson@pdq.net</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:17138540743" title="mobile phone number">1 713-854-0743</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12817593900" title="office phone number">1 281-759-3900</a>&nbsp;(O)<br /></p></div>',
    texthrcwpe = '<div id="wpe" class="vcard"><h3 class="org">Western Process Equipment</h3><p class="callout"><strong>Territory:</strong> Alberta, British Columbia, Manitoba, Saskatchewan</p><h5 class="fn">Kevin Metcalf</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:kdm@westernprocessequipment.com">kdm@westernprocessequipment.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:14038138914" title="mobile phone number">1 403-813-8914</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:14032163835" title="office phone number">1 403-216-3835</a>&nbsp;(O)<br /></p><h5 class="fn">Ed Chovaneac</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:ejc@westernprocessequipment.com">ejc@westernprocessequipment.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:15875856786" title="mobile phone number">1 587-585-6786</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:14032163835" title="office phone number">1 403-216-3835</a>&nbsp;(O)<br /></p><h5 class="fn">Reg Bilodeau</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:rwb@westernprocessequipment.com">rwb@westernprocessequipment.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:13067150605" title="mobile phone number">1 306-715-0605</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:13066535047" title="office phone number">1 306-653-5047</a>&nbsp;(O)<br /></p><h5 class="fn">Gerry Stewart</h5><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:rgs@westernprocessequipment.com">rgs@westernprocessequipment.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:14035604229" title="mobile phone number">1 403-560-4229</a>&nbsp;(M)<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:14032163835" title="office phone number">1 403-216-3835</a>&nbsp;(O)<br /></p></div>';

// move the text to an outside box
// var elem = document.getElementById('repshrctxt');

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
var filterOP = function (feature, layer) {
  if (feature.properties.oemmkt && feature.properties.indpwr) {
    return true;
  }
}
var filterAP = function (feature, layer) {
  if (feature.properties.aftmkt && feature.properties.indpwr) {
    return true;
  }
}
var filterOR = function (feature, layer) {
  if (feature.properties.oemmkt && feature.properties.indref) {
    return true;
  }
}
var filterAR = function (feature, layer) {
  if (feature.properties.aftmkt && feature.properties.indref) {
    return true;
  }
}

// set layers and the control
var oempwr = L.geoJson(hrcdata, {style: stylefun, onEachFeature: clickMe, filter: filterOP}).addTo(maphrc);
var aftpwr = L.geoJson(hrcdata, {style: stylefun, onEachFeature: clickMe, filter: filterAP});
var oemref = L.geoJson(hrcdata, {style: stylefun, onEachFeature: clickMe, filter: filterOR});
var aftref = L.geoJson(hrcdata, {style: stylefun, onEachFeature: clickMe, filter: filterAR});

var jsonData = {
   "Power, Industrial": oempwr, 
   "Refineries | New Equipment": oemref, 
   "Refineries | Aftermarket": aftref
}

L.control.layers(jsonData, null, {collapsed: false}).addTo(maphrc);
