<?php
// https://developer.salesforce.com/page/PHP_Toolkit_20.0_Samples
define("SOAP_CLIENT_BASEDIR", "../../soapclient");
require_once (SOAP_CLIENT_BASEDIR.'/SforceEnterpriseClient.php');
require_once ('userAuth.php');
try {
  $mySforceConnection = new SforceEnterpriseClient();
  $mySoapClient = $mySforceConnection->createConnection(SOAP_CLIENT_BASEDIR.'/enterprise.wsdl.xml');
  $mylogin = $mySforceConnection->login($SALESFORCE_USERNAME, $SALESFORCE_PASSWORD);

  $query = 'SELECT Id,Name from Account limit 5';
  $response = $mySforceConnection->query(($query));

  foreach ($response->records as $record) {
    print_r($record);
    print_r("<br>");
    print_r($record->Id . ":" . $record->Name);
    print_r("<br><br>");
  }
} catch (Exception $e) {
  echo $e->faultstring;
}
?>
