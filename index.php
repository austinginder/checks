<?php

require_once "vendor/autoload.php";
include("lib/rotate-images.php");
include("lib/check-generator.php");

date_default_timezone_set('UTC');

$CHK                   = new CheckGenerator;
$check                 = (object) [];
$check->logo           = "";
$check->from_name      = "Your Name";
$check->from_address1  = "1234 E Main St";
$check->from_address2  = "Portland, OR 97214";
$check->routing_number = "123000220";
$check->account_number = "123456789012";
$check->bank_1         = "US Bank";
$check->bank_2         = "1225 SE Cesar E Chavez Blvd";
$check->bank_3         = "Portland, OR 97214-4371";
$check->bank_4         = "(503) 275-4550";
$check->signature      = "";
$check->pay_to         = "";
$check->amount         = '';
$check->date           = "";
$check->memo           = "";
$check->check_number   = 1000;
$configurations        = dirname(__FILE__) . "/config.json";

if ( file_exists( $configurations ) ) {
  $check = json_decode( file_get_contents( $configurations  ) );
}

$CHK->AddCheck( (array) $check );

if(array_key_exists('REMOTE_ADDR', $_SERVER)) {
  // Called from a browser
  header('Content-Type: application/octet-stream', false);
  header('Content-Type: application/pdf', false);
  $CHK->PrintChecks();
} else {
  // Called from the command line
  ob_start();
  $CHK->PrintChecks();
  $pdf = ob_get_clean();
  file_put_contents('checks.pdf', $pdf);
  echo "Saved to file: checks.pdf\n";
}

