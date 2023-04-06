<?php
// error_reporting(E_ALL & ~E_USER_DEPRECATED);
error_reporting(0);
// Load the settings from the central config file
require_once 'config.php';
// Load the CAS lib
require_once $phpcas_path . '/CAS.php';

// Enable debugging
phpCAS::setLogger();
// Enable verbose error messages. Disable in production!
phpCAS::setVerbose(true);

// Initialize phpCAS
phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context, $client_service_name);

// Let the default behavior of negotiating protocol happen
// phpCAS::setExtraCurlOption( CURLOPT_SSLVERSION, 6 );

// For production use set the CA certificate that is the issuer of the cert
// on the CAS server and uncomment the line below
// phpCAS::setCasServerCACert($cas_server_ca_cert_path);

// For quick testing you can disable SSL validation of the CAS server.
// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
phpCAS::setNoCasServerValidation();

// force CAS authentication
phpCAS::forceAuthentication();

// at this step, the user has been authenticated by the CAS server
// and the user's login name can be read with phpCAS::getUser().

// logout if desired
if (isset($_REQUEST['logout'])) {
	phpCAS::logout();
}

// for this test, simply print that the authentication was successfull
?>
<html>
  <head>
    <title>phpCAS simple client</title>
  </head>
  <body>
    <h1>Successful Authentication!</h1>

    <p>the user's login is <b><?php echo phpCAS::getUser(); ?></b>.</p>
    <p>phpCAS version is <b><?php echo phpCAS::getVersion(); ?></b>.</p>
    <p><a href="/">Main Menu</a></p>

    <h3>User Attributes</h3>
    <ul>
    <?php
    foreach (phpCAS::getAttributes() as $key => $value) {
      if (is_array($value)) {
          echo '<li>', $key, ':<ol>';
          foreach ($value as $item) {
              echo '<li><strong>', $item, '</strong></li>';
          }
          echo '</ol></li>';
      } else {
          echo '<li>', $key, ': <strong>', $value, '</strong></li>' . PHP_EOL;
      }
  }
    ?>
    </ul>
  </body>
</html>
