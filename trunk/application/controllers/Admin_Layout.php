<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Layout extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadModel("MyMenuUrl");
	}

	public function index() {
		$sys_info = $this->getSysInfo();
		$this->assign('sys_info',$sys_info);
		$this->view('admin/layout/index');
	}

	function getSysInfo() {
		$sys_info_array = array ();
		$sys_info_array ['gmt_time'] = gmdate ( "Y-m-d H:i:s", time () );
		$sys_info_array ['bj_time'] = gmdate ( "Y-m-d H:i:s", time () + 8 * 3600 );
		$sys_info_array ['server_ip'] = gethostbyname ( $_SERVER ["SERVER_NAME"] );
		$sys_info_array ['software'] = $_SERVER ["SERVER_SOFTWARE"];
		$sys_info_array ['port'] = $_SERVER ["SERVER_PORT"];
		$sys_info_array ['admin'] = 'Y先生';
		$sys_info_array ['diskfree'] = intval ( diskfreespace ( "." ) / (1024 * 1024) ) . 'Mb';
		$sys_info_array ['current_user'] = $this->login_user['user_name'];
		$sys_info_array ['timezone'] = date_default_timezone_get();
		return $sys_info_array;
	}

}
