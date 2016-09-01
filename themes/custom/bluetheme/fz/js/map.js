var hcmap = L.map('hcoffices').setView([44.9925,-93.449522],3);

L.tileLayer('https://api.mapbox.com/styles/v1/emijayne/cisaohquy00052yqad6dhqmub/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWtnbzJqMWFlNnR0bTNxcDhhYW0xaSJ9.tdujy5zALLoojTt2yEGtwA', {
  attribution: '<strong>HC Office Locations</strong> | &copy; Hamon',
  accessToken: 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWtnbzJqMWFlNnR0bTNxcDhhYW0xaSJ9.tdujy5zALLoojTt2yEGtwA'
}).addTo(hcmap);

L.marker([43.856339, -79.387269]).addTo(hcmap).bindPopup('<div id="lochccc" class="vcard">
  <h2 class="org">Hamon Custodis Cottrell Canada</h2>
  <p class="adr">
    <abbr class="geo" title="43.856339, -79.387269">
      <span class="street-address">2-23 W Beaver Creek Rd</span><br />
      <span class="locality">Richmond Hill</span>,&nbsp;
      <span class="region">Ontario</span>,&nbsp;
      <span class="postal-code">L4B 1K5</span><br />
      <span class="country-name">Canada</span>
    </abbr>
  </p>
  <p>
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18004239011">1 800-423-9011</a><br />
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19057710234">1 905-771-0234</a>
  </p>
</div>');
L.marker([40.567142, -74.609816]).addTo(hcmap).bindPopup('<div id="lochcer" class="vcard">
  <h2 class="org">Eastern Region</h2>
  <p class="adr">
    <abbr class="geo" title="40.567142, -74.609816">
      <span class="street-address">58 East Main Street</span><br />
      <span class="post-office-box">P.O. Box 1500</span><br />
      <span class="locality">Somerville</span>,&nbsp;
      <span class="region">New Jersey</span>,&nbsp;
      <span class="postal-code">08876</span><br />
      <span class="country-name">United States</span>
    </abbr>
  </p>
  <p>
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18004456578">1 800-445-6578</a><br />
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:19083332000">1 908-333-2000</a><br />
    <span class="secondary badge"><i class="fi-print"></i></span> 1 908-333-2151
  </p>
</div>');
L.marker([39.494215, -87.125675]).addTo(hcmap).bindPopup('<div id="lochcmr" class="vcard">
  <h2 class="org">Midwest Region</h2>
  <p class="adr">
    <abbr class="geo" title="39.494215, -87.125675">
      <span class="street-address">7335 North State Highway 59</span><br />
      <span class="locality">Brazil</span>,&nbsp;
      <span class="region">Indiana</span>,&nbsp;
      <span class="postal-code">47834</span><br />
      <span class="country-name">United States</span>
    </abbr>
  </p>
  <p>
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18124427822">1 812-442-7822</a><br />
    <span class="secondary badge"><i class="fi-print"></i></span> 1 812-446-4151
  </p>
  <p><strong>Midwest Warehouse</strong></p>
  <p>
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18005432629">1 800-543-2629</a><br />
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18124488791">1 812-448-8791</a><br />
    <span class="secondary badge"><i class="fi-print"></i></span> 1 812-446-0800
  </p>
</div>');
L.marker([33.581116, -86.644753]).addTo(hcmap).bindPopup('<div id="lochcsr" class="vcard">
  <h2 class="org">Southern Region</h2>
  <p class="adr">
    <abbr class="geo" title="33.581116, -86.644753">
      <span class="street-address">941 Alton Parkway</span><br />
      <span class="locality">Birmingham</span>,&nbsp;
      <span class="region">Alabama</span>,&nbsp;
      <span class="postal-code">35210</span><br />
      <span class="country-name">United States</span>
    </abbr>
  </p>
  <p>
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18008432116">1 800-843-2116</a><br />
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:12058360057">1 205-836-0057</a><br />
    <span class="secondary badge"><i class="fi-print"></i></span> 1 205-836-0058
  </p>
</div>');
L.marker([40.601414, -111.988843]).addTo(hcmap).bindPopup('<div id="lochcwr" class="vcard">
  <h2 class="org">Western Region</h2>
  <p class="adr">
    <abbr class="geo" title="40.601414, -111.988843">
      <span class="street-address">4078 West Nike Drive</span><br />
      <span class="locality">West Jordan</span>,&nbsp;
      <span class="region">Utah</span>,&nbsp;
      <span class="postal-code">84084</span><br />
      <span class="country-name">United States</span>
    </abbr>
  </p>
  <p>
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18006691022">1 800-669-1022</a><br />
    <span class="secondary badge"><i class="fi-telephone"></i></span> <a class="tel" href="tel:18012558786">1 801-255-8786</a><br />
    <span class="secondary badge"><i class="fi-print"></i></span> 1 801-255-8796
  </p>
</div>');

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
  // var maps = [
  //     L.map('locationmap'),
  //     L.map('hcoffices'),
  //     L.map('rccoffices')
  // ];

  // // Add basemap tiles and attribution.
  // var baseLayer = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
  //   attribution: '&copy Hamon', 
  //   maxZoom: 16, 
  //   accessToken: 'pk.eyJ1IjoiZW1pamF5bmUiLCJhIjoiY2lvMWxrbGxrMWFtaXVrbTNmNWE2dWZkZyJ9.1mt_VncCBhOtJSpSsXN96g'
  // });

  // // Create map and set center and zoom.
  // var map = L.map('map', {
  //   scrollWheelZoom: false,
  //   center: [44.9925, -93.449522],
  //   zoom: 4
  // });

  // // Add basemap to map.
  // map.addLayer(baseLayer);

  // // Markers on www.hamonusa.com/locations
  // L.marker([40.567, -74.609997]).addTo(mapmain)
  //   .bindPopup("<b>Hamon Corporate Headquarters</b><br />Hamon Custodis, Inc. | <em>Corp &amp; Eastern Office</em><br />Hamon Research Cottrell, Inc.<br />Research Cottrell Cooling, Inc. | <em>Corp &amp; Eastern Office</em>")
  //   .openPopup();
  // L.marker([33.581108, -86.644748]).addTo(mapmain).bindPopup("<em><strong>Southern Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  // L.marker([39.493304, -87.127383]).addTo(mapmain).bindPopup("<em><strong>MidWest Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  // L.marker([40.60192, -111.988264]).addTo(mapmain).bindPopup("<em><strong>Western Office</strong></em><br />Hamon Custodis, Inc.<br />Research Cottrell Cooling, Inc.");
  // L.marker([43.855202, -79.387218]).addTo(mapmain).bindPopup("Hamon Custodis Cottrell Canada");
  // L.marker([44.9925, -93.449522]).addTo(mapmain).bindPopup("Hamon Deltak, Inc.");
  // L.marker([40.378223, -79.846091]).addTo(mapmain).bindPopup("Thermal Transfer Corporation");

  // // Markers on www.hamonusa.com/locations/hc
  // L.marker([40.567, -74.609997]).addTo(maphc).bindPopup("Eastern Region Office");
  // L.marker([33.581108, -86.644748]).addTo(maphc).bindPopup("Southern Region Office");
  // L.marker([39.493304, -87.127383]).addTo(maphc).bindPopup("MidWest Region Office");
  // L.marker([40.60192, -111.988264]).addTo(maphc).bindPopup("Western Region Office");
  // L.marker([43.855202, -79.387218]).addTo(maphc).bindPopup("Hamon Custodis Cottrell Canada");

  // // Markers on www.hamonusa.com/locations/hdi

  // // Markers on www.hamonusa.com/locations/hrc

  // // Markers on www.hamonusa.com/locations/rcc
  // L.marker([40.567, -74.609997]).addTo(maprcc).bindPopup("Eastern Region Office");
  // L.marker([33.581108, -86.644748]).addTo(maprcc).bindPopup("Southern Region Office");
  // L.marker([39.493304, -87.127383]).addTo(maprcc).bindPopup("MidWest Region Office");
  // L.marker([40.60192, -111.988264]).addTo(maprcc).bindPopup("Western Region Office");
  // L.marker([43.855202, -79.387218]).addTo(maprcc).bindPopup("Hamon Custodis Cottrell Canada");