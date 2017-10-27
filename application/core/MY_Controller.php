<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $jdb    =[];
	protected $access =[];

	function __construct(){
		parent::__construct();

	    $this->load->database('default',true);
		$this->load->Model('common_model');
		$where=['id'=>1];
		$result = $this->common_model->select_fields_where('db_settings','*',$where,true);

		if(!empty($result)){

			$this->jdb = [
					'dsn'	=> '',
					'hostname' => $result->db_host_name,
					'username' => $result->db_user_name,
					'password' => $result->db_user_password,
					'database' => $result->db_name,
					'dbdriver' => 'mysqli',
					'dbprefix' => '',
					'pconnect' => FALSE,
					'db_debug' => (ENVIRONMENT !== 'production'),
					'cache_on' => FALSE,
					'cachedir' => '',
					'char_set' => 'utf8',
					'dbcollat' => 'utf8_general_ci',
					'swap_pre' => '',
					'encrypt' => FALSE,
					'compress' => FALSE,
					'stricton' => FALSE,
					'failover' => array(),
					'save_queries' => TRUE
			];
		}

		$where=['id'=>2];
		$result = $this->common_model->select_fields_where('db_settings','*',$where,true);

		if(!empty($result)){

			$this->access = [
					'dsn'	=> '',
					'hostname' => 'Driver={Microsoft Access Driver (*.mdb)};DBQ='.$result->db_host_name,
					'username' => $result->db_user_name,
					'password' => $result->db_user_password,
					'database' => $result->db_name,
					'dbdriver' => 'odbc',
					'dbprefix' => '',
					'pconnect' => FALSE,
					'db_debug' => (ENVIRONMENT !== 'production'),
					'cache_on' => FALSE,
					'cachedir' => '',
					'char_set' => 'utf8',
					'dbcollat' => 'utf8_general_ci',
					'swap_pre' => '',
					'encrypt' => FALSE,
					'compress' => FALSE,
					'stricton' => FALSE,
					'failover' => array(),
					'save_queries' => TRUE
			];
		}


	}
}