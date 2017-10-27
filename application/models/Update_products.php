<?php
 
class Update_products extends Ci_Model
  {
	 function __construct(){
		parent::__construct();
    $this->load->database();
    $this->load->library('Datatables');

	}
public function get_live_products($jdb){
  
  $this->db->where('id',1);
  $dbprefix = $this->db->get('db_settings');
  if(!empty($dbprefix)){
  $dbprefix = $dbprefix->row()->dbprefix;
  }
  $jdb      = $this->load->database($jdb,true);
  $query    = $jdb->get($dbprefix.'eshop_products');
	if($query){
    return $query->result_array();
  }
} 

public function get_access_products($access,$jdb){    // get access products and save into app 
  

  
  $access      = $this->load->database($access,true);
  $result      = $access->query('SELECT StockCode, Description, QtyOnHand1,Incl1 From "Stock" ');

 if($result){
     return $result->result_array();
  }


}
public function Update_category($accessdatabase,$jdbdatabase){
  $this->db->where('id',1);
  $dbprefix = $this->db->get('db_settings');
  if(!empty($dbprefix)){
     $dbprefix   = $dbprefix->row()->dbprefix;
  }
  $access       = $this->load->database($accessdatabase,true); 
  $jdb          = $this->load->database($jdbdatabase,true);
  $dep          = $access->query('Select Departments from "Departments"');


 
     
       
  foreach($dep->result() as $dep_name){
     
    $dep_name         = trim($dep_name->Departments);
  

    $dep_alis         = str_replace(" ","-", trim($dep_name));
    $category_id      = $jdb->select('category_id')->from($dbprefix.'eshop_categorydetails')->where('category_name',$dep_name)->get();
    if(isset($category_id->row()->category_id) && !empty($category_id->row()->category_id)){
         $category_id = $category_id->row()->category_id;
      }
      else{ $category_id = 1;}
 
    $categories       = $jdb->select('id')->from($dbprefix.'eshop_categories')->where('id',$category_id)->get();
    if(isset($categories->row()->id) && !empty($categories->row()->id)){
         $categories_id = $categories->row()->id;
      } else{ $categories_id = 2;}
    if($categories_id  != $category_id){
      $categories_data  = array(
                        'category_parent_id'    => 0,
                        'category_layout'       => 'default',
                        'published'             => 1,
                        'level'                 => 0
                        );
      $jdb->insert($dbprefix.'eshop_categories',$categories_data);
      $categories_id    = $jdb->insert_id();
      $cat_data  = array(
                      'category_id'    =>  $categories_id,
                      'category_name'  =>  $dep_name,
                      'category_alias' =>  $dep_alis,
                      'language'       =>  'en-GB'
                      );
      $jdb->insert($dbprefix.'eshop_categorydetails',$cat_data);
    }
    else{
      $categories_data  = array(
                        'category_parent_id'    => 0,
                        'category_layout'       => 'default',
                        'published'             => 1,
                        'level'                 => 0
                        );
      $jdb->where('id',$category_id);
      $jdb->update($dbprefix.'eshop_categories',$categories_data);
      $cat_data  = array(
                      'category_name'  =>  $dep_name,
                      'category_alias' =>  $dep_alis,
                      'language'       =>  'en-GB'
                      );
      $jdb->where('category_id',$category_id);
      $jdb->update($dbprefix.'eshop_categorydetails',$cat_data);
    }  
  }
}   
public function update_console_products($accessdatabase,$jdbdatabase){ 
  $this->db->where('id',1);
  $dbprefix = $this->db->get('db_settings');
  if(!empty($dbprefix)){
    $dbprefix   = $dbprefix->row()->dbprefix;
  }
  $jdb           = $this->load->database($jdbdatabase,true);
  $access        = $this->load->database($accessdatabase,true);  
  $access_result = $access->query('Select Stock.*,Departments.Departments as dep_name from Stock left join Departments on Departments.DepartmentID = Stock.Department where Stock.QtyOnHand1 >= 0 ');
  if(!empty($access_result)){
   // $fun = 0 ;
    foreach ($access_result->result() as $value) {
      // $fun++;
      // if($fun == 30){
      //   exit;
      //   break;
      // }
      $add_quantity = 0;
      $local_sales  = 0;
      $live_sales   = 0;
      $accessQuantity    = $value->QtyOnHand1;
      $accessStockCode   = trim($value->StockCode);   
      $accessDescription = $value->Description;
      $price             = $value->Incl1;
      $price             = number_format($price,3);
      $price             = str_replace( ',','', $price);
      $dep_name          = $value->dep_name;
      $Height            = $value->Height;
      $Length            = $value->Length;
      $Width             = $value->Widthh;
      $data_for_live     = array(
                                'product_sku'      => trim($accessStockCode),
                                'published'        => 1,
                                'product_length'   => $Length,
                                'product_width'    => $Width,
                                'product_quantity' => $accessQuantity,
                                'product_featured' => 1,
                                'product_price'    => $price 
                                );
      $data  = array(
                      'product_quantity' => $accessQuantity,
                      'product_sku'      => trim($accessStockCode),
                      'description'      => $accessDescription,
                      'total_quantity'   => $accessQuantity,
                      'product_price'    => $price
                    );
      $q =  $this->db->select('product_sku,product_quantity')->from('console_products')->where('product_sku',$accessStockCode)->get();
      $num_rows = $q->num_rows();
      if(isset($q->row()->product_sku)){
        $qproduct_sku = $q->row()->product_sku;
      }else{
        $qproduct_sku = 1; 
      }
      if($num_rows == 0 && $qproduct_sku !== $accessStockCode){
        $this->db->insert('console_products',$data);
      }
      else{
        if($q->row()){
          $appQuantity = $q->row()->product_quantity;  //10
          if($appQuantity > $accessQuantity){   // product sale 
              $local_sales =  $appQuantity - $accessQuantity;
          }
          elseif($appQuantity < $accessQuantity){// new product added 
            $add_quantity  =  $accessQuantity - $appQuantity;
          }
          $querys = $jdb->query('SELECT product_sku , product_quantity, product_price From '.$dbprefix.'eshop_products Where product_sku = "'.$accessStockCode.'"' );
          if($querys){
            $querysnum_rows = $querys->num_rows();
            if($querysnum_rows == 0 ){
              $jdb->insert($dbprefix.'eshop_products', $data_for_live);
              $insert_id  = $jdb->insert_id();
              $get_dep_name = $jdb->select('category_id')->from($dbprefix.'eshop_categorydetails')->where('category_name',$dep_name)->get();
              $categories_id = $get_dep_name->row()->category_id;
              $p_cat_data = array(
                                'product_id'    => $insert_id,
                                'category_id'   => $categories_id,  // error
                                'main_category' => 1
                                );
              $jdb->insert($dbprefix.'eshop_productcategories',$p_cat_data);
              $p_details = array(
                                 'product_id'    =>  $insert_id,
                                 'product_name'  =>  $accessDescription,
                                 'language'      =>  'en-GB',
                                 'product_alias' =>  str_replace(" ","-", trim($accessDescription))
                                 );
              $jdb->insert($dbprefix.'eshop_productdetails',$p_details);
            }
            else{
              $live_product_quantity = $querys->row()->product_quantity;
              $product_price         = $querys->row()->product_price;
              $product_sku           = $querys->row()->product_sku;

              if($appQuantity >= $live_product_quantity){
                $live_sales =  $appQuantity - $live_product_quantity;
              }
              $total_sales    =  $local_sales      + $live_sales;
              $appQuantitycal =  $appQuantity      - $total_sales ;
              $appQuantity    =  $appQuantitycal   + $add_quantity ;
              $data  = array(
                            'product_quantity' => $appQuantity,
                            'local_sales'      => $local_sales,
                            'live_sales'       => $live_sales,
                            'total_sales'      => $total_sales,
                            'product_price'   => $price
                            );
              if((number_format($product_price,3) !== $price) || ($live_product_quantity !== number_format($accessQuantity,0)) && ( $product_sku === $accessStockCode ) ){ 
                $this->db->where('product_sku', $accessStockCode);
                $this->db->update('console_products',$data); 
                $data  = array(
                             'product_quantity' => $appQuantity,
                             'product_price'    => $price
                              );
                $jdb->where('product_sku', $accessStockCode);
                $jdb->update($dbprefix.'eshop_products', $data); // only update quantity and price 

                $access->query('UPDATE "Stock" SET QtyOnHand1 = '.$appQuantity.'  WHERE ( StockCode = \''.$accessStockCode.'\')');
              }      
            }
          }  
        }
      } 
    }
    $data =array('date' => date("d/m/Y G.i:s", time()));
    $this->db->insert('history',$data);// use for history
  }
}
}   //end class	
 