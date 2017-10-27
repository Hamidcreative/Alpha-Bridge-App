<?php

    // local data base connection
	$localconn =  mysqli_connect('localhost', 'root', '','c_alpha') or die ('Error connecting to mysql');
    $settings  =  mysqli_query($localconn,"SELECT * FROM db_settings WHERE id = '1'");
	$setting   =  mysqli_fetch_object($settings);
	$num_rows  =  mysqli_num_rows($settings);
	if($num_rows > 0){
		$dbhost 		= $setting->db_host_name;
		$dbuser 		= $setting->db_user_name;
		$dbpass 		= $setting->db_user_password;
		$dbprefix 		= $setting->dbprefix;
		$jdbname		= $setting->db_name;
	}
	//live conn
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$jdbname) or die  ('Error connecting to mysql');
    //acc connection 
    $settingss   =  mysqli_query($localconn,"SELECT * FROM db_settings WHERE id = '2'");
	$settings    = mysqli_fetch_object($settingss);
	$num_rows    = mysqli_num_rows($settingss);
	if($num_rows > 0){
		$dbName	 = "$settings->db_name";
	}
    if (!file_exists($dbName)) {
   		die("Could not find database file.");
	}
    $accessdatabase = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$dbName; Uid=; Pwd=;");
 	$access_result  = $accessdatabase->query('Select QtyOnHand1,StockCode,Incl1 FROM Stock ORDER BY QtyOnHand1 DESC');    
	
	if(!empty($access_result)){
		while($value = $access_result->fetch(PDO::FETCH_OBJ)){
		 
			$add_quantity      = 0;
			$local_sales       = 0;
			$live_sales        = 0;
			$QtyOnHand1        = (int) $value->QtyOnHand1;

echo "<br /> value->StockCode   = ".$value->StockCode  ; 			
echo "<br /> QtyOnHand1   = ".$QtyOnHand1  ; 

		    $accessQuantity    = number_format($QtyOnHand1,0);
echo "<br /> QtyOnHand1   = ".$QtyOnHand1  ;  

            $accessStockCode   = trim($value->StockCode);
            $price             = $value->Incl1;
            $price             = number_format($price,2);
/// live work
			$query_shop = "SELECT product_quantity,product_sku, product_price FROM ".$dbprefix."eshop_products WHERE product_sku = '$accessStockCode'";
			$result_shop = mysqli_query($conn,$query_shop);
			$row_shop = mysqli_fetch_object($result_shop);
			if($row_shop){
				$live_product_quantity = $row_shop->product_quantity;
				$live_product_price    = number_format($row_shop->product_price,2);
				$live_product_sku      = trim($row_shop->product_sku);
            }
            if( ($live_product_price !== $price || $accessQuantity !== $live_product_quantity ) && ( $accessStockCode === $live_product_sku ) ){
                $q   =  mysqli_query($localconn,"SELECT product_sku,product_quantity FROM console_products WHERE product_sku = '$accessStockCode'");
		        $row = mysqli_fetch_object($q);
				$num_rows = mysqli_num_rows($q);
			    if($num_rows > 0){
					$appQuantity = $row->product_quantity;  //10
					if($appQuantity > $accessQuantity){   // product sale 
					   $local_sales =  $appQuantity - $accessQuantity;
					}
					elseif($appQuantity < $accessQuantity){// new product added 
						$add_quantity  =  $accessQuantity - $appQuantity;
					}
					
					if($appQuantity > $live_product_quantity){
						$live_sales =  $appQuantity - $live_product_quantity;
					}
				    $total_sales    =  $local_sales     + $live_sales;
					$appQuantitycal =  $appQuantity     - $total_sales;
					$appQuantity    =  $appQuantitycal  + $add_quantity;

					$price = str_replace( ',','', $price); 
                    $app = "UPDATE console_products SET product_quantity = '$appQuantity', local_sales = '$local_sales', live_sales = '$live_sales', total_sales = '$total_sales', product_price = '$price' WHERE product_sku = '$accessStockCode'";
					mysqli_query($localconn,$app);
                    $test = " UPDATE ".$dbprefix."eshop_products SET product_quantity = '$appQuantity', product_price = ".$price." WHERE product_sku = '$accessStockCode'";
					mysqli_query($conn,$test);
		    $accessdatabase->query('UPDATE "Stock" SET QtyOnHand1 = '.$appQuantity.'  WHERE ( StockCode = \''.$accessStockCode.'\')');
				//exit;
				}
		    }
		    exit;
		    
	    }	
		$sql = "INSERT INTO `history` (date) VALUES ('".date("d/m/Y G.i:s", time())."')";		 
		mysqli_query($localconn,$sql);
	}
?> 