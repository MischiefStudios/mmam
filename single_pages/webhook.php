<?php

	// Square id's and tokens:
	// https://connect.squareup.com/apps/sq0idp-Sjh1ZOHtFDVbw3DS_oCuIw
	$application_id = 'sq0idp-Sjh1ZOHtFDVbw3DS_oCuIw';
	$personal_access_token = 'sq0atp-6OJdiA9R9t_tZueTfHWy-A';
	$sandbox_application_id = 'sandbox-sq0idp-Sjh1ZOHtFDVbw3DS_oCuIw';
	$sandbox_access_token = 'sandbox-sq0atb-62saiKgkEF3ONP58R6Kh_Q';
	$location_id = '56E8JJFM2TXJZ';

	$endpoints = array(
		'locations' => array(
			'url' => '/v2/locations',
			'method' => 'GET'
		),
		// catalog list is the updated version of the items, modifier and category endpoints
		'catalog_list' => array(
			'url' => '/v2/catalog/list',
			'method' => 'GET'
		),
		'items' => array(
			'url' => '/v1/'. $location_id . '/items',
			'method' => 'GET'
		),
		'list_webhooks' => array(
			'url' => '/v1/'. $location_id . '/webhooks',
			'method' => 'GET'
		),
		'inventory_quantity' => array(
			'url' => '/v1/'. $location_id . '/inventory',
			'method' => 'GET'
		),
		'adjust_inventory' => array(
			'url' => '/v1/'. $location_id . '/inventory/' . $variation,
			'method' => 'POST'
		)
	);

	function curlFunc($token, $endpoint){
		$base_url = 'https://connect.squareup.com';

		$ch = curl_init($base_url . $endpoint['url']);
		// set CURLOPT_RETURNTRANSFER to TRUE to save the value of curl_exec as a string instead of printing it out
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $endpoint['method']);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Accept: application/json',
	    'Authorization: Bearer ' . $token)
	  );

		// request and response header documentation:
		// https://docs.connect.squareup.com/api/connect/v2/#requestandresponseheaders
		if($endpoint['method'] === ('POST' || 'PUT')){
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json')
		  );
		}

		// standard return
		$returnData = json_decode(curl_exec($ch));
		return $returnData;
	}

	$locations = curlFunc($sandbox_access_token, $endpoints['locations']);
	$items = $locations->objects;

	// flattens the output of the catalog_list request
	function flatten_output($variable){
		foreach ($variable as $key => $value) {
			echo gettype($key) . ': ' . $key . '<br>';
			if(is_array($value) || is_object($value)){
				flatten_output($value);
			}else{
				echo gettype($value) . ': ' . $value . '<br>';
			}
		}
	}
	flatten_output($items);

	echo '<pre>';
	print_r($locations);
	echo '</pre>';
?>
