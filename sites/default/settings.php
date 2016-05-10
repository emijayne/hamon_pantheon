<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all envrionments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to insure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}
$settings['install_profile'] = 'standard';

/**
 * Trusted Host Settings
 */

if (defined('PANTHEON_ENVIRONMENT')) {
  if (in_array($_ENV['PANTHEON_ENVIRONMENT'], array('dev', 'test', 'live'))) {
    $settings['trusted_host_patterns'][] = "{$_ENV['PANTHEON_ENVIRONMENT']}-{$_ENV['PANTHEON_SITE_NAME']}.getpantheon.io";
    $settings['trusted_host_patterns'][] = "{$_ENV['PANTHEON_ENVIRONMENT']}-{$_ENV['PANTHEON_SITE_NAME']}.pantheon.io";
    $settings['trusted_host_patterns'][] = "{$_ENV['PANTHEON_ENVIRONMENT']}-{$_ENV['PANTHEON_SITE_NAME']}.pantheonsite.io";
    $settings['trusted_host_patterns'][] = "{$_ENV['PANTHEON_ENVIRONMENT']}-{$_ENV['PANTHEON_SITE_NAME']}.panth.io";  

    # Replace value with custom domain(s) added in the site Dashboard
    $settings['trusted_host_patterns'][] = '^.+\.hamonusa\.com$';
    $settings['trusted_host_patterns'][] = '^hamonusa\.com$';
  }
}

/**
 * Redirects
 */

// Pull in all external site names and require www.
if (isset($_SERVER['PANTHEON_ENVIRONMENT']) &&
  ($_SERVER['PANTHEON_ENVIRONMENT'] === 'live') &&
  (php_sapi_name() != "cli")) {
  if ($_SERVER['HTTP_HOST'] == 'live-hamon.pantheonsite.io' || 
      $_SERVER['HTTP_HOST'] == 'hamonusa.com' || 
      $_SERVER['HTTP_HOST'] == 'hamon-usa.com' || $_SERVER['HTTP_HOST'] == 'www.hamon-usa.com'
      ) {
    header('HTTP/1.0 301 Moved Permanently');
    header('Location: http://www.hamonusa.com'. $_SERVER['REQUEST_URI']);
    exit();
  } elseif ($_SERVER['HTTP_HOST'] == 'custodis-us.com' || $_SERVER['HTTP_HOST'] == 'www.custodis-us.com' || 
      $_SERVER['HTTP_HOST'] == 'hamoncustodis.com' || $_SERVER['HTTP_HOST'] == 'www.hamoncustodis.com'
      ) {
    header('HTTP/1.0 301 Moved Permanently');
    header('Location: http://www.hamonusa.com/hc'. $_SERVER['REQUEST_URI']);
    exit();
  } elseif ($_SERVER['HTTP_HOST'] == 'deltak.com' || $_SERVER['HTTP_HOST'] == 'www.deltak.com' || 
      $_SERVER['HTTP_HOST'] == 'hamondeltak.com' || $_SERVER['HTTP_HOST'] == 'www.hamondeltak.com' || 
      $_SERVER['HTTP_HOST'] == 'hamon-deltak.com' || $_SERVER['HTTP_HOST'] == 'www.hamon-deltak.com'
      ) {
    header('HTTP/1.0 301 Moved Permanently');
    header('Location: http://www.hamonusa.com/hdi'. $_SERVER['REQUEST_URI']);
    exit();
  } elseif ($_SERVER['HTTP_HOST'] == 'researchcottrell.com' || $_SERVER['HTTP_HOST'] == 'www.researchcottrell.com' || 
      $_SERVER['HTTP_HOST'] == 'research-cottrell.com' || $_SERVER['HTTP_HOST'] == 'www.research-cottrell.com' || 
      $_SERVER['HTTP_HOST'] == 'research-cottrell-us.com' || $_SERVER['HTTP_HOST'] == 'www.research-cottrell-us.com' || 
      $_SERVER['HTTP_HOST'] == 'hamonresearchcottrell.com' || $_SERVER['HTTP_HOST'] == 'www.hamonresearchcottrell.com' || 
      $_SERVER['HTTP_HOST'] == 'hamon-researchcottrell.com' || $_SERVER['HTTP_HOST'] == 'www.hamon-researchcottrell.com' || 
      $_SERVER['HTTP_HOST'] == 'hamon-heatrecovery.com' || $_SERVER['HTTP_HOST'] == 'www.hamon-heatrecovery.com'
      ) {
    header('HTTP/1.0 301 Moved Permanently');
    header('Location: http://www.hamonusa.com/hrc'. $_SERVER['REQUEST_URI']);
    exit();
  } elseif ($_SERVER['HTTP_HOST'] == 'rc-cooling.com' || $_SERVER['HTTP_HOST'] == 'www.rc-cooling.com' || 
      $_SERVER['HTTP_HOST'] == 'rc-wetcooling.com' || $_SERVER['HTTP_HOST'] == 'www.rc-wetcooling.com' || 
      $_SERVER['HTTP_HOST'] == 'coolingsystems-us.com' || $_SERVER['HTTP_HOST'] == 'www.coolingsystems-us.com' || 
      $_SERVER['HTTP_HOST'] == 'hamon-coolingsystems.com' || $_SERVER['HTTP_HOST'] == 'www.hamon-coolingsystems.com'
      ) {
    header('HTTP/1.0 301 Moved Permanently');
    header('Location: http://www.hamonusa.com/rcc'. $_SERVER['REQUEST_URI']);
    exit();
  } elseif ($_SERVER['HTTP_HOST'] == 'aircooledcondensers.com' || $_SERVER['HTTP_HOST'] == 'www.aircooledcondensers.com' || 
      $_SERVER['HTTP_HOST'] == 'aircooledsteamcondensers.com' || $_SERVER['HTTP_HOST'] == 'www.aircooledsteamcondensers.com' || 
      $_SERVER['HTTP_HOST'] == 'hamondrycooling.com' || $_SERVER['HTTP_HOST'] == 'www.hamondrycooling.com'
      ) {
    header('HTTP/1.0 301 Moved Permanently');
    header('Location: http://www.hamonusa.com/rcdc'. $_SERVER['REQUEST_URI']);
    exit();
  } elseif ($_SERVER['HTTP_HOST'] == 'ttcjobs.net' || $_SERVER['HTTP_HOST'] == 'www.ttcjobs.net' || 
      $_SERVER['HTTP_HOST'] == 'thermaltransfercorp.com' || $_SERVER['HTTP_HOST'] == 'www.thermaltransfercorp.com' || 
      $_SERVER['HTTP_HOST'] == 'hamon-heatexchangers.com' || $_SERVER['HTTP_HOST'] == 'www.hamon-heatexchangers.com' || 
      $_SERVER['HTTP_HOST'] == 'hamon-thermaltransfer.com' || $_SERVER['HTTP_HOST'] == 'www.hamon-thermaltransfer.com'
      ) {
    header('HTTP/1.0 301 Moved Permanently');
    header('Location: http://www.hamonusa.com/ttc'. $_SERVER['REQUEST_URI']);
    exit();
  } 
}



// 301 Redirect from /old to /new.

if (($_SERVER['REQUEST_URI'] == '/aboutHRC.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/aboutTTC.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Aftermarket.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/aftermarket');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/APCLearningCenter.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_Corrosion.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_DailyObservation.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_DustRemovalSystem.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_ElectricalReadings.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_EnergizationSystem.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_EquipmentFundamentals.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_Fundamentals_01.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_Fundamentals_02.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_Fundamentals_03.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_GasFlow.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_InspectionsMaintenance.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_MaintenanceTips.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_OzoneCreation.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_PrecipitatorOperation.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_PrecipitatorRappers.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_Regulations.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_Safety.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_TechnicalLibrary.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /library');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_TechnicalLibraryItems.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /library');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Center_Troubleshooting.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ChimneyConstruction.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products/chimney');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ChimneyConstruction_LiningMaterials.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products/chimney');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ChimneyConstruction_TechniquesAndEquipment.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products/chimney');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/COHPACTMandTOXECONTM.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/contact_email') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ContactHC.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Contactinfo') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ContactHRC.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ContactHRC_SpareParts.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ContactThermalTransfer.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ContactUs.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/CustomerSurveyForm.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/default.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/DownloadBrochures.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /library');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Accessories.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Accessories_AccessDoors_01.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Accessories_DoorLocks.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Accessories_InterlockDesign.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Accessories_InterlockSystems.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Accessories_KeyInterlockSystems.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Accessories_RectifierBreakerLocks.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Accessories_TransferBlocks.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_CollectingElectrodes.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Controls.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Controls_CPC.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Controls_MRC.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Controls_MTC.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Controls_Precip.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_DischargeElectrodes.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Insulators.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Insulators_AntiSway.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Insulators_PostStand.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Insulators_RapperShaft.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Insulators_VoltageSupport.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Insulators_WallBushings.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_RappingSystems.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_RappingSystems_migi.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_RappingSystems_PneumaticRappers.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_RappingSystems_vibrators.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Rectifiers.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Rectifiers_accessories.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_Rectifiers_Switches.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/ec_SealAir.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Employment.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /careers');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamoncustodis') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamoncustodis/aftermarket') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/aftermarket');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamoncustodis/chimneys') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products/chimney');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamoncustodis/contact') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamoncustodis/jobs') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /careers');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamoncustodis/products') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamoncustodis/regions') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /locations');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamoncustodis/silos') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products/silo');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamoncustodis/steelstack') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products/stack');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamoncustodis/survey') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/contact') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/contactlist') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/accessories') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/accessories/doorlocks') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/accessories/keyinterlocksystem') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/accessories/keytransferblock') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/accessories/transformerrectifier') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/collectingplates') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/contact') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/controls') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/controls/cpc') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/controls/mrc') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/controls/mtc') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/controls/pc') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/dischargeelectrode') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/insulator') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/insulator/antisway') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/insulator/bushing') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/insulator/ders') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/insulator/hvs') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/insulator/post') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/power') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/power/tr-accessories') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/power/tr-groundswitches') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/rapping') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/rapping/emvibrator') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/rapping/migi') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/rapping/pneumatic') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/parts/sealair') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/dfgd') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/esp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/esp/ce') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/esp/de') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/esp/rappers') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/esp_fundamentals') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/ff') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/ff_cohpac') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/ff_pulsejet') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/ff_reversegas') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/fgd') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/nox') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/react') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/react');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/u2a') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/u2a');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/wgs') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/wgs');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/products/wgsdescription') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/wgs');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/regions') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /locations');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/cfd') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/consulting') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/contact') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/maintenance') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/maintenance/monitoring') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/maintenance/operation') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/maintenance/ozone') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/maintenance/safety') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/maintenance/troubleshoot') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/rebuild-retrofit') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/technical') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/hamonresearchcottrell/services/training') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/home') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/LearningCenter.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/LearningCenter_FuelSavings.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/convection');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/LearningCenter_MaintenanceTips.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/convection');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/locations') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /locations');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/MRC.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_accessories') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_collectingplates') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_cpc') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_dischargeelectrode') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_doorlocks') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_electromagneticvibrator') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_espcontrols') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_espinsulators') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_esppowersupplies') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_esprapping') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_groundswitches') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_insulate-antisway') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_insulate-bushing') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_insulate-ders') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_insulate-hvs') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_insulate-post') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_keyinterlocksystem') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_keytransferblock') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_migiflangemountedrapper') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_mrc') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_mtc') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_pneumaticrapper') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_precipcommander') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Parts_QuoteRequest.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_sealairsystem') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_tr-accessories') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/parts_transformerrectifier') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/PartsAndServices.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/aftermarket');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/PartsServices_EquipmentRepairs.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/aftermarket');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/PartsServices_FieldServices.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/aftermarket');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/PartsServices_SpareParts.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/aftermarket');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Baghouse.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Baghouse_PulseJetBaghouse.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Baghouse_ReverseAirBaghouse.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Baghouse_ReverseGasBaghouse.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_CollectionElectrodes.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_ContactUS.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_DischargeElectrodes.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_DownloadBrochures.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /library');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Electrostatic.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_FlueGas.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_FlueGasDry.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_NOxReduction.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_NOxReduction_NONSCR.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_PrecipitatorDisposal.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_PrecipitatorRappers.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Precipitators.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_ReACT.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/react');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Scrubbers.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/wgs');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Scrubbers_Industrial.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/wgs');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Scrubbers_WetGas.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/wgs');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Scrubbers_WetGas_description.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/wgs');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_Scrubbers_WetGas_features.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/wgs');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Prod_U2A.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/u2a');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Products_ConvectionRecuperators.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/convection');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Products_CustomFabrication.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/custom');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Products_EspComponents.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/espparts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Products_FiredHeaters.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/firedheaters');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Products_GasCoolers.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/gascooler');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Products_HeatExchangers.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/heatexchanger');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Products_RadiationRecuperators.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/radiation');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/publications') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /library');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Rebuilds_ContuctUs.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/RebuildsRetrofits.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrellcooling') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /rcc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrellcooling/contact') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /rcc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrellcooling/mechanicaldraft') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /rcc/products/mdct');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrellcooling/naturaldraft') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /rcc/products/ndct');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrellcooling/products') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /rcc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrellcooling/regions') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /locations');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrellcooling/services') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /rcc/aftermarket');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrellcooling/spareparts') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /rcc/aftermarket');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrellcooling/tech-reps') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /rcc/aftermarket');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrelldrycooling') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /rcdc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrelldrycooling/contact') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /rcdc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/researchcottrelldrycooling/regions') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /locations');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_AccessInformation.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_cfd') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_ComputerModeling.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_consulting') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_Consulting.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_ContactUs.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_DownloadBrochures.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /library');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_espparts') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_espservices') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_FieldServices.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_maintenance') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_maintenance_operation') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_maintenance_ozone') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_maintenance_safety') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_maintenance_troubleshoot') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_monitoring') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_PrototypeFabrication.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_rebuildretrofit') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_ResistivityAnalysis.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_ServiceQuoteRequest.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_technical') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_TechnicalCenter.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_TechnicalCenterItems.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/services_training') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/Services_Training.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/services');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/sitemap') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/SpareParts.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/SpareParts_ContuctUs.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/SpareParts_DownloadBrochures.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /library');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/SpareParts_Electrostatic.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/aftermarket/parts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/SteelStacks.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products/stack');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/SteelStacks_ConstructionTechniques.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products/stack');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/SteelStacks_VibrationCorrosionControl.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products/stack');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/StorageSilos.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hc/products/silo');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_collectingelectrodes') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_dfgd') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_dischargeelectrodes') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_esp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_espfundamentals') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_ff') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_fgd') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_mercurycontrol') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_nox') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_pulsejet') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_rappers') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/esp');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_react') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/react');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_reversegas') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/ff');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_u2a') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/u2a');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_wgs') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/wgs');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/tech_wgsdescription') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products/wgs');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/TechnicalPapers.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /library');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/technology') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /hrc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/contact') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/convectionrecuperatormaintenance') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/convection');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/convectionrecuperators') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/convection');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/customfabrication') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/custom');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/directions') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/contact');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/firedheaters') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/firedheaters');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/gascoolers') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/gascooler');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/heatexchangers') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/heatexchanger');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/partsservices') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/aftermarket');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/precipitatorcomponents') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/espparts');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/products') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/thermaltransfercorp/radiationrecuperators') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/products/radiation');
  exit();
}
if (($_SERVER['REQUEST_URI'] == '/VisitUs.asp') && (php_sapi_name() != "cli")) {
  header('HTTP/1.0 301 Moved Permanently');
  header('Location: /ttc/contact');
  exit();
}
