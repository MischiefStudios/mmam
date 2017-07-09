<?php

  defined('C5_EXECUTE') or die('Access Denied.');

  $mysql_data = array(
    'server' => 'localhost',
    'user' => 'root',
    'pass' => 'root',
    'db' => 'c5themestarter'
  );

  $square_account = array(
    'application_id' => 'sq0idp-Sjh1ZOHtFDVbw3DS_oCuIw',
  	'personal_access_token' => 'sq0atp-6OJdiA9R9t_tZueTfHWy-A',
  	'sandbox_application_id' => 'sandbox-sq0idp-Sjh1ZOHtFDVbw3DS_oCuIw',
  	'sandbox_access_token' => 'sandbox-sq0atb-62saiKgkEF3ONP58R6Kh_Q',
  	'location_id' => '56E8JJFM2TXJZ'
  );

  $endpoints = array(
    'batch_upsert' => array(
      'url' => '/v2/catalog/batch-upsert',
      'method' => 'POST'
    )
	);

  $json = '{"idempotency_key":"789ff020-f723-43a9-b4b5-43b5dc1fa3dd","batches":[{"objects":[{"type":"ITEM","id":"#Tea","present_at_all_locations":true,"item_data":{"name":"Tea","description":"Hot Leaf Juice","category_id":"#Beverages","tax_ids":["#SalesTax"],"variations":[{"type":"ITEM_VARIATION","id":"#Tea_Mug","present_at_all_locations":true,"item_variation_data":{"item_id":"#Tea","name":"Mug","pricing_type":"FIXED_PRICING","price_money":{"amount":150,"currency":"USD"}}}]}},{"type":"ITEM","id":"#Coffee","present_at_all_locations":true,"item_data":{"name":"Coffee","description":"Hot Bean Juice","category_id":"#Beverages","tax_ids":["#SalesTax"],"variations":[{"type":"ITEM_VARIATION","id":"#Coffee_Regular","present_at_all_locations":true,"item_variation_data":{"item_id":"#Coffee","name":"Regular","pricing_type":"FIXED_PRICING","price_money":{"amount":250,"currency":"USD"}}},{"type":"ITEM_VARIATION","id":"#Coffee_Large","present_at_all_locations":true,"item_variation_data":{"item_id":"#Coffee","name":"Large","pricing_type":"FIXED_PRICING","price_money":{"amount":350,"currency":"USD"}}}]}},{"type":"CATEGORY","id":"#Beverages","present_at_all_locations":true,"category_data":{"name":"Beverages"}},{"type":"TAX","id":"#SalesTax","present_at_all_locations":true,"tax_data":{"name":"Sales Tax","calculation_phase":"TAX_SUBTOTAL_PHASE","inclusion_type":"ADDITIVE","percentage":"5.0","applies_to_custom_amounts":true,"enabled":true}}]}]}';

	$base_url = 'https://connect.squareup.com';
	$ch = curl_init($base_url . $endpoints['batch_upsert']['url']);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $endpoints['batch_upsert']['method']);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json',
    'Content-Length: ' . strlen($json),
    'Authorization: Bearer ' . $square_account['personal_access_token'])
  );

	$returnData = json_decode(curl_exec($ch));

  foreach ($returnData->id_mappings as $key => $value) {

    echo '<pre>';
    echo $value->client_object_id . '<br>';
    echo $value->object_id . '<br>';
    // still need to write Object ID's back to the Product and Variation tables in Concrete5
    echo '</pre>';
  }

  // echo '<pre>';
  // print_r($returnData->id_mappings);
  // echo '</pre>';

?>
