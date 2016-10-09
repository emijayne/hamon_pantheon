// map for hc offices
var mapboxAccessToken = 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWtnbzJqMWFlNnR0bTNxcDhhYW0xaSJ9.tdujy5zALLoojTt2yEGtwA';
var mapboxAttribution = '&copy; <a href="https://www.mapbox.com/about/maps/">Mapbox</a> &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> | <strong>Hamon Custodis, Inc. Regional Locations</strong>';

var hcmap = L.map('hcoffices', {
  fullscreenControl: true,
  fullscreenControlOptions: {
    position: 'topleft'
  }
}).setView([44.9925,-93.449522], 3);

L.tileLayer('https://api.mapbox.com/styles/v1/emijayne/cisaohquy00052yqad6dhqmub/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWtnbzJqMWFlNnR0bTNxcDhhYW0xaSJ9.tdujy5zALLoojTt2yEGtwA', {
  attribution: mapboxAttribution,
  accessToken: mapboxAccessToken
}).addTo(hcmap);

// popup text
var txt_hcca = '<div id="lochccc" class="vcard"><h3 class="org">Hamon Custodis Cottrell Canada</h3><p class="adr"><span class="tiny hollow button align-right"><a target="_blank" href="https://www.google.com/maps/place/23+West+Beaver+Creek+Rd,+Richmond+Hill,+ON+L4B+1K5,+Canada">directions</a></span><span class="street-address">2-23 W Beaver Creek Rd</span><br /><span class="locality">Richmond Hill</span>,&nbsp;<span class="region">Ontario</span>,&nbsp;<span class="postal-code">L4B 1K5</span><br /><span class="country-name">Canada</span></p><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:info.hccanada@hamonusa.com">info.hccanada@hamonusa.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18004239011" title="toll-free phone number">1 800-423-9011</a>&nbsp; toll-free<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19057710234">1 905-771-0234</a></p></div>';
var txt_hcnj = '<div id="lochcer" class="vcard"><h3 class="org">Hamon Custodis Eastern Region</h3><p class="adr"><span class="tiny hollow button align-right"><a target="_blank" href="https://www.google.com/maps/place/58+E+Main+St,+Somerville,+NJ+08876">directions</a></span><span class="street-address">58 East Main Street</span><br /><span class="post-office-box">Post Office Box 1500</span><br /><span class="locality">Somerville</span>,&nbsp;<span class="region">New Jersey</span>,&nbsp;<span class="postal-code">08876</span><br /><span class="country-name">United States</span></p><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:sales.hceast@hamonusa.com">sales.hceast@hamonusa.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18004456578" title="toll-free phone number">1 800-445-6578</a>&nbsp; toll-free<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19083332000">1 908-333-2000</a><br /><span class="secondary badge"><i class="fi-print"></i></span> 1 908-333-2151</p></div>';
var txt_hcin = '<div id="lochcmr" class="vcard"><h3 class="org">Hamon Custodis Midwest Region</h3><p class="adr"><span class="tiny hollow button align-right"><a target="_blank" href="https://www.google.com/maps/place/7335+IN-59,+Brazil,+IN+47834">directions</a></span><span class="street-address">7335 North State Highway 59</span><br /><span class="locality">Brazil</span>,&nbsp;<span class="region">Indiana</span>,&nbsp;<span class="postal-code">47834</span><br /><span class="country-name">United States</span></p><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:sales.hccenter@hamonusa.com">sales.hccenter@hamonusa.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18124427822">1 812-442-7822</a><br /><span class="secondary badge"><i class="fi-print"></i></span> 1 812-446-4151</p><p><strong>Midwest Warehouse</strong></p><p><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18005432629">1 800-543-2629</a>&nbsp; toll-free<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18124488791">1 812-448-8791</a><br /><span class="secondary badge"><i class="fi-print"></i></span> 1 812-446-0800</p></div>';
var txt_hcal = '<div id="lochcsr" class="vcard"><h3 class="org">Hamon Custodis Southern Region</h3><p class="adr"><span class="tiny hollow button align-right"><a target="_blank" href="https://www.google.com/maps/place/941+Alton+Pkwy,+Birmingham,+AL+35210">directions</a></span><span class="street-address">941 Alton Parkway</span><br /><span class="locality">Birmingham</span>,&nbsp;<span class="region">Alabama</span>,&nbsp;<span class="postal-code">35210</span><br /><span class="country-name">United States</span></p><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:sales.hcsouth@hamonusa.com">sales.hcsouth@hamonusa.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18008432116" title="toll-free phone number">1 800-843-2116</a>&nbsp; toll-free<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12058360057">1 205-836-0057</a><br /><span class="secondary badge"><i class="fi-print"></i></span> 1 205-836-0058</p></div>';
var txt_hcut = '<div id="lochcwr" class="vcard"><h3 class="org">Hamon Custodis Western Region</h3><p class="adr"><span class="tiny hollow button align-right"><a target="_blank" href="https://www.google.com/maps/place/4078+Nike+Dr,+West+Jordan,+UT+84088">directions</a></span><span class="street-address">4078 West Nike Drive</span><br /><span class="locality">West Jordan</span>,&nbsp;<span class="region">Utah</span>,&nbsp;<span class="postal-code">84084</span><br /><span class="country-name">United States</span></p><p><span class="secondary badge"><i class="fi-mail"></i></span> <a href="mailto:sales.hcwest@hamonusa.com">sales.hcwest@hamonusa.com</a><br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18006691022" title="toll-free phone number">1 800-669-1022</a>&nbsp; toll-free<br /><span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18012558786">1 801-255-8786</a><br /><span class="secondary badge"><i class="fi-print"></i></span> 1 801-255-8796</p></div>';

L.marker([43.856339, -79.387269]).addTo(hcmap).bindPopup(txt_hcca);
L.marker([40.567142, -74.609816]).addTo(hcmap).bindPopup(txt_hcnj);
L.marker([39.494215, -87.125675]).addTo(hcmap).bindPopup(txt_hcin);
L.marker([33.581116, -86.644753]).addTo(hcmap).bindPopup(txt_hcal);
L.marker([40.601414, -111.988843]).addTo(hcmap).bindPopup(txt_hcut);
