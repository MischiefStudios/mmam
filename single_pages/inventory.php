<?php
  defined('C5_EXECUTE') or die('Access Denied.');

  $mysql_data = array(
    'server' => 'localhost',
    'user' => 'root',
    'pass' => 'root',
    'db' => 'c5themestarter'
  );

  // Square id's and tokens:
  // https://connect.squareup.com/apps/sq0idp-Sjh1ZOHtFDVbw3DS_oCuIw
  $application_id = 'sq0idp-Sjh1ZOHtFDVbw3DS_oCuIw';
	$personal_access_token = 'sq0atp-6OJdiA9R9t_tZueTfHWy-A';
	$sandbox_application_id = 'sandbox-sq0idp-Sjh1ZOHtFDVbw3DS_oCuIw';
	$sandbox_access_token = 'sandbox-sq0atb-62saiKgkEF3ONP58R6Kh_Q';
	$location_id = '56E8JJFM2TXJZ';

  // $date = new DateTime();
  // $date->format('Y-m-d H:i:s')

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

  $key_map = array(
    // 'pDetail' => '',
    // 'pSalePrice' => '',
    // 'pCustomerPrice' => '',
    // 'pPriceMaximum' => '',
    // 'pPriceMinimum' => '',
    // 'pPriceSuggestions' => '',
    // 'pFeatured' => '',
    // 'pQtyUnlim' => '',
    // 'pNoQty' => '',
    // 'pTaxClass' => '',
    // 'pTaxable' => '',
    // 'pfID' => '',
    // 'pShippable' => '',
    // 'pWidth' => '',
    // 'pHeight' => '',
    // 'pLength' => '',
    // 'pWeight' => '',
    // 'pNumberItems' => '',
    // 'pCreateUserAccount' => '',
    // 'pAutoCheckout' => '',
    // 'pExclusive' => '',
    // 'pVariations' => '',
    // 'pBackOrder' => '',
    'pDesc' => 'item_data->description',
    'pActive' => 'item_data->available_online',
    'pSKU' => 'item_data->variations[0]->item_variation_data->sku',
    'pPrice' => 'item_data->variations[0]->item_variation_data->price_money->amount',
    // 'pQty' => '->quantity_on_hand',
    'pName' => 'item_data->' . '$name',
    'pDateAdded' => 'updated_at'


    // 'variation_name' => '->item_data->variations[]->item_variation_data->name',
    // 'variation_date' => '->item_data->variations[]->updated_at'
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

  function database_query(&$con, &$map, &$items){

    // $keys = implode (', ', array_keys($map));
    // $values = implode('", "', array_values($map));

    foreach ($items->objects as $key => $value) {
      $item = $items->objects[$key];

      if($item->type == 'ITEM'){
        $name = $item->item_data->name;
        $desc = $item->item_data->description;
        $avail = $item->item_data->available_online;
        $added = $item->updated_at;

        echo '<pre>';
        echo $name;
        echo '<br>';
        echo $desc;
        echo '<br>';
        echo 'Available Online: ' . $avail;
        echo '<br>';
        echo 'Date Added: ' . $added;
        echo '<br>';

        foreach ($item->item_data->variations as $key => $value) {
          $variation = $item->item_data->variations[$key];
          $var_name = $variation->item_variation_data->name;
          $sku = $variation->item_variation_data->sku;
          $price = $variation->item_variation_data->price_money->amount;

          echo '<br>';
          echo $var_name;
          echo '<br>';
          echo '$' . $price;
          echo '<br>';
          echo $sku;
        }
        echo '</pre>';
      }

      echo '<pre>';
      print_r($item);
      echo '</pre>';

    }
    // foreach ($map as $key => $value) {
    //   // $xml = new SimpleXMLElement($value);
    //   $value = 'item_data';
    //   $value2 = 'description';
    //   $string = '$items->objects[17]->' . '$value->$value2';
    //   $entry = eval('$string;');
    //   print_r($entry);
    //   echo '<br>';
    // }

    // $mysql_queries = array(
    //   'select' => 'SELECT * FROM `CommunityStoreProducts`',
    //   'insert' => 'INSERT INTO `CommunityStoreProducts` (' . $keys . ')
    //     VALUES ("' . $values . '")'
    // );
    //
    // $connection = mysqli_connect($con['server'], $con['user'], $con['pass'], $con['db']);
    // // Check connection
    // if($connection === false){
    //   die("ERROR: Could not connect. " . mysqli_connect_error());
    // }
    //
    // echo $mysql_queries['insert2'];


    // $combined_query = $mysql_queries['insert2'] . '"' . $fake_data['1'] . '", "' . $fake_data['2'] . '")';
    // $result = mysqli_query($con, $combined_query);
    // echo $combined_query;

    // while($row = mysqli_fetch_row($result)){
    //   echo '<pre>';
    //   var_dump($row);
    //   echo '</pre>';
    // }
    // mysqli_free_result($result);
  }

  // flattens the output of the catalog_list request
	// function flatten_output($variable){
	// 	foreach ($variable as $key => $value) {
	// 		echo gettype($key) . ': ' . $key . '<br>';
	// 		if(is_array($value) || is_object($value)){
	// 			flatten_output($value);
	// 		}else{
	// 			echo gettype($value) . ': ' . $value . '<br>';
	// 		}
	// 	}
	// }

  $item_data = curlFunc($personal_access_token, $endpoints['catalog_list']);


  // $items = $item_data->objects;
	// flatten_output($items);

  database_query($mysql_data, $key_map, $item_data);

?>
