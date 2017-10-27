<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller {

	 
	function __construct(){
		parent::__construct();
        $this->load->library('session');
		//$this->load->Model('common_model');
		$this->load->Model('Update_products');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}
	public function index()
	{
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
}