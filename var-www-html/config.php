<?php

/**
 * The purpose of this central config file is configuring all examples
 * in one place with minimal work for your working environment
 * Just configure all the items in this config according to your environment
 * and rename the file to config.php
 *
 * PHP Version 5
 *
 * @file     config.php
 * @category Authentication
 * @package  PhpCAS
 * @author   Joachim Fritschi <jfritschi@freenet.de>
 * @author   Adam Franco <afranco@middlebury.edu>
 * @license  http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link     https://wiki.jasig.org/display/CASC/phpCAS
 */

$phpcas_path = '/usr/local/lib/php';

///////////////////////////////////////
// Basic Config of the phpCAS client //
///////////////////////////////////////

$cas_host = getenv('CAS_HOSTNAME', true) ?: getenv('CAS_HOSTNAME'); // 'secure-dev.its.yale.edu';
$cas_context = '/cas';
$cas_port = 443;

// Path to the ca chain that issued the cas server certificate
//$cas_server_ca_cert_path = '/path/to/cachain.pem';

//////////////////////////////////////////
// Advanced Config for special purposes //
//////////////////////////////////////////

// The "real" hosts of clustered cas server that send SAML logout messages
// Assumes the cas server is load balanced across multiple hosts
#$cas_real_hosts = array('cas-real-1.example.com', 'cas-real-2.example.com');

// Client config for cookie hardening
$client_domain = getenv('CLIENT_HOSTNAME', true) ?: getenv('CLIENT_HOSTNAME'); // 'cas-test-client-dev.svc.iam.aws.yale.edu';
$client_path = '/';
$client_secure = true;
$client_httpOnly = true;
$client_lifetime = 0;


$client_service_name = "http://{$client_domain}";

///////////////////////////////////////////
// End Configuration -- Don't edit below //
///////////////////////////////////////////
?>
