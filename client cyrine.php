<?php

// Pull in the NuSOAP code
require_once('C:\Program Files\Ampps\www\nusoap\lib\nusoap.php');
	$error  = '';
	$result = '';
	$guest= " Web";
	$wsdl = "http://localhost/webservice1/webservice.php?wsdl";
		if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				 // Call the SOAP method
				$result = $client->call('HelloWithParam');
				// Display the result
				echo "<h2>Result<h2/>";
				print_r($result);
			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}	

// Display the request and response (SOAP messages)
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
// Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';

?>