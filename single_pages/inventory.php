<?php
  defined('C5_EXECUTE') or die('Access Denied.');

  $mysql_data = array(
    'server' => 'localhost',
    'user' => 'root',
    'pass' => 'root',
    'db' => 'c5themestarter'
  );

  $mysql_queries = array(
    'insert' => 'INSERT INTO `CommunityStoreProducts` (' . $item_data['key'] . ')
      VALUES ('. $item_data['value'] . ')',
    'select' => 'SELECT * FROM `CommunityStoreProducts`',
    'insert2' => 'INSERT INTO `CommunityStoreProducts` ($keys)
      VALUES ("' . $str . '")'
  );

  // $date = new DateTime();
  // $date->format('Y-m-d H:i:s')

  $item_data = array(
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
    'pDesc' => '->item_data->description',
    'pActive' => '->item_data->available_online',
    'pSKU' => '->item_data->variations[]->item_variation_data->sku',
    'pPrice' => '->item_data->variations[]->item_variation_data->price_money->amount',
    // 'pQty' => '->quantity_on_hand',
    'pName' => array(
      'item' => '->item_data->name',
      'variation' => '->item_data->variations[]->item_variation_data->name',
    ),
    'pDateAdded' => array(
      'item' => '->updated_at',
      'variation' => '->item_data->variations[]->updated_at',
    )
  );

  function database_query(&$con, &$query, &$items){

    $keys = implode (', ', array_keys($items));

    $fake_data = array(
      "Nick Test 8",
      7
    );

    $str = implode ('", "', $fake_data);

    $connection = mysqli_connect($con['server'], $con['user'], $con['pass'], $con['db']);
    // Check connection
    if($connection === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    echo $query['insert2'];

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

  $array1 = array($str . '$str World', $str . ' Universe');

  function combine(&$arr){
    $str = 'Hello';
    print_r($arr);
  }

  combine($array1);

  // database_query($mysql_data, $mysql_queries, $item_data);

?>
