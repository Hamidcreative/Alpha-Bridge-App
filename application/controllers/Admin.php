<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    function __construct(){
		parent::__construct();
        $this->load->library('session');
		//$this->load->Model('common_model');
		$this->load->Model('Update_products');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}
	 
public function index(){    
    if($this->session->userdata('user_name')){
	  $this->load->view('main/header',true);
	  $this->load->view('history');
	  $this->load->view('main/footer',true);
	}
	else{
	redirect('/admin/login', 'refresh');
	}
}

public function login(){
    if( $this->session->userdata('user_name')){
	    redirect('/admin', 'refresh');
	}
	else{
		$this->load->view('login');
		$this->load->view('main/footer',true);
	}
}
public function login_check(){
	$name     = $this->input->post('user_name'); 
	$password = $this->input->post('password');
	if($name == "admin" && $password == "admin" ){
		$this->session->set_userdata('userID',1);
		$this->session->set_userdata('user_name',$name);
		redirect('/admin', 'refresh');
	}
	else{
		$this->load->view('login');
		$this->load->view('main/footer',true);
	    }
}
public function logout(){
	$this->session->unset_userdata('userID');
	$this->session->unset_userdata('user_name');
	redirect('/admin/login', 'refresh');
}	
public function live_connection_setting(){
    if($this->session->userdata('user_name')){
		$this->data['data'] = $this->common_model->get_live_connection_data();
		$this->load->view('main/header',true);
		$this->load->view('live_db_setting',$this->data);
		$this->load->view('main/footer',true);
	}
	else{
		redirect('/admin/login', 'refresh');
    }
}	 
public function update_live_db_settings(){    
	if($this->session->userdata('user_name')){
		$this->form_validation->set_rules('db_user_name', 'Data Base User Name', 'trim|required');
	    $this->form_validation->set_rules('db_user_password', 'Data Base Password','trim');
	    $this->form_validation->set_rules('db_host_name', 'Data Base Host Name', 'trim|required');
	    $this->form_validation->set_rules('db_name', 'Data Base Name', 'trim|required');
        $this->form_validation->set_rules('dbprefix', 'Data Base PreFix', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
    	    $this->load->view('main/header',true);
		    $this->load->view('live_db_setting');
		    $this->load->view('main/footer',true);
        }
        else{
	    $data = array( 
						'db_user_name'        => $this->input->post('db_user_name'), 
						'db_user_password'    => $this->input->post('db_user_password'), 
						'db_host_name'        => $this->input->post('db_host_name'), 
						'db_name'             => $this->input->post('db_name'),
						'dbprefix'             => $this->input->post('dbprefix')  
				        );
			$msg    = $this->common_model->update_live_db_settings($data);
			if($msg == 1)
			{
			$_SESSION['success_msg'] = 'Your Information Updated Successfully';
			redirect('/admin/live_connection_setting', 'refresh');
			}else{
			$_SESSION['error_msg']   = 'SomeThing Happend Wrong Please Try Again';
			redirect('/admin/live_connection_setting', 'refresh');
			}
	    }
	}
	else{
		redirect('/admin/login', 'refresh');
	}
}	 
public function local_connection_setting(){
    if($this->session->userdata('user_name')){
		$this->data['data'] = $this->common_model->get_local_connection_data();
		$this->load->view('main/header',true);
		$this->load->view('local_db_setting',$this->data);
		$this->load->view('main/footer',true);
	}
	else{
		redirect('/admin/login', 'refresh');
    }
}	 
public function update_local_db_settings(){    
	if($this->session->userdata('user_name')){
		$this->form_validation->set_rules('db_user_name', 'Data Base User Name', 'trim');
	    $this->form_validation->set_rules('db_user_password', 'Data Base Password','trim');
	    $this->form_validation->set_rules('db_host_name', 'Access Data Base file Pathe', 'trim|required');
	    $this->form_validation->set_rules('db_name', 'Access Data Base file Pathe', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
    	    $this->load->view('main/header',true);
		    $this->load->view('local_db_setting');
		    $this->load->view('main/footer',true);
        }
        else{
	    $data = array( 
						'db_user_name'        => $this->input->post('db_user_name'), 
						'db_user_password'    => $this->input->post('db_user_password'), 
						'db_host_name'        => $this->input->post('db_host_name'), 
						'db_name'             => $this->input->post('db_name')  
				        );
			$msg     = $this->common_model->update_local_db_settings($data);
			if($msg == 1)
			{
				$_SESSION['success_msg'] = 'Your Information Updated Successfully';
				redirect('/admin/local_connection_setting', 'refresh');
			    
		    }else{
				$_SESSION['error_msg']   = 'SomeThing Happend Wrong Please Try Again';
				redirect('/admin/local_connection_setting', 'refresh');
			}
	    }
	}
	else{
		redirect('/admin/login', 'refresh');
	}
}	 
public function live_products(){
	 
	 if($this->session->userdata('user_name')){
        $data['data'] = $this->Update_products->get_live_products($this->jdb);
		$this->load->view('main/header',true);
		$this->load->view('products',$data);
		$this->load->view('main/footer',true);
	}
	else{
		redirect('/admin/login', 'refresh');
	}   
}
public function local_products(){	  // get data from accsss and save into app 
	 
    if($this->session->userdata('user_name')){
		$data['data']   =  $this->Update_products->get_access_products($this->access,$this->jdb);
		$this->load->view('main/header',true);
		$this->load->view('local_products',$data);
		$this->load->view('main/footer',true);
	}
	else{
		redirect('/admin/login', 'refresh');
	}   
}
public function history(){	  // get data from old accsss and new access 
    if($this->session->userdata('user_name')){
		$this->load->view('main/header',true);
		$this->load->view('history');
		$this->load->view('main/footer',true);
	}
	else{
		redirect('/admin/login', 'refresh');
    }   
}


public function get_history($param = NULL){ //display comments list in admin panel currently not in use 
	if($param === 'listing'){
		$selectData = array('
                            id AS ID,
                            `date` AS Date
                            
							',false
							);
        $addColumns = array('ViewEditActionButtons' => array('<a href="#" class="delete"><i data-toggle="tooltip" title="Trash" data-placement="left"  class="fa fa-trash-o text-red ml-fa "></i></a>','ID')

                            );
        $returnedData = $this->common_model->select_fields_joined_DT($selectData,'history','','','','','',$addColumns);
        print_r($returnedData);
        return NULL;
       // `t_p_updated` AS Tottal_products_updated
    }
    elseif($param === 'delete'){

     
    	  $ID     = $this->input->post('id');
    	  $where  =  array('id' =>$ID);
    	  $this->common_model->delete('history', $where);
          echo 'OK::';
    }

    $this->load->view('history');
	return NULL;
}
public function category(){
	if($this->session->userdata('user_name')){
         $this->Update_products->Update_category($this->access,$this->jdb);  // update console panel
         $this->load->view('main/header',true);
         $_SESSION['success_msg'] = " All categories Updated Successfully";
	     $this->load->view('category',$_SESSION['success_msg']);
	     $this->load->view('main/footer',true);
	}
	else{
		redirect('/admin/login', 'refresh');
    }   
    
}
public function console(){	  // get record from live site and updated  in app
    if($this->session->userdata('user_name')){
        $this->Update_products->update_console_products($this->access,$this->jdb);  // update console panel
        $this->load->view('main/header',true);
		$this->load->view('console');
		$this->load->view('main/footer',true);
	}
	else{
		redirect('/admin/login', 'refresh');
    }   
}
public function console_products(){	  // get record from live site and updated  in app
    if($this->session->userdata('user_name')){
        $this->load->view('main/header',true);
		$this->load->view('console_products');
		$this->load->view('main/footer',true);
	}
	else{
		redirect('/admin/login', 'refresh');
    }   
}
public function get_console($param = NULL){ //display comments list in admin panel currently not in use 
	if($param === 'listing'){
		$selectData = array('
                            id AS ID,
					        `description` AS Product_Title,
							`product_sku` AS Product_SKU,
                            `product_quantity` AS Stock,
							`product_price` AS Price,
							CASE WHEN product_quantity = 0 THEN CONCAT("<span class=\'label status label-danger\'>Out Of Stock</span>") WHEN product_quantity >= 1 THEN CONCAT ("<span class=\'label status label-success\'> Available</span>") ELSE CONCAT ("<span class=\'label id label-warning\'> ", product_quantity, " </span>") END AS Status',false
							);
        $addColumns = array(//'ViewEditActionButtons' => array('&nbsp; <a href="#" data-target=".approval-modal2" data-toggle="modal"><i class="fa fa-check"></i></a> &nbsp; <a href="#" data-target=".approval-modal" data-toggle="modal"><i data-toggle="tooltip" title="Trash" data-placement="left"  class="fa fa-trash-o text-red ml-fa"></i></a>','ID')

                            );
        $returnedData = $this->common_model->select_fields_joined_DT($selectData,'console_products','','','','','',$addColumns);
        print_r($returnedData);
        return NULL;
    }
    $this->load->view('console');
	return NULL;
}
public function local_products_datatable(){
    $this->load->view('main/header',true);
	$this->load->view('local_products_datatable');
	$this->load->view('main/footer',true);
 }
public function local_products_datatables($param = NULL){ //display comments list in admin panel currently not in use 
	if($param === 'listing'){
		   $selectData = array('
           id AS ID,
           `id` AS Name,
		   `id` AS Blog_Title,
		   `id` AS Email,
		   `id` As Website,
		   `id` As Date,
		   id AS Comments,
		   CASE WHEN id = 0 THEN CONCAT("<span class=\'label status label-danger\'>Pending</span>") WHEN id = 1 THEN CONCAT ("<span class=\'label status label-success\'> Publishedd</span>") ELSE CONCAT ("<span class=\'label id label-warning\'> ", id, " </span>") END AS Status',false);
        $addColumns = array(
                 'ViewEditActionButtons' => array('&nbsp; <a href="#" data-target=".approval-modal2" data-toggle="modal"><i class="fa fa-check"></i></a> &nbsp; <a href="#" data-target=".approval-modal" data-toggle="modal"><i data-toggle="tooltip" title="Trash" data-placement="left"  class="fa fa-trash-o text-red ml-fa"></i></a>','ID')
                 );
        $returnedData = $this->common_model->select_fields_joined_DT($selectData,'local_products','','','','','',$addColumns);
        print_r($returnedData);
        return NULL;
    }
    $this->load->view('local_products_datatable');
	return NULL;
}
}//end Class