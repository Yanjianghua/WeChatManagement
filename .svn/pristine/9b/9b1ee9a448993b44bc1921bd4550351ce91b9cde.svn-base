<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_ApiBinding extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("MyMenu","WxSystem");
		$this->loadModel("WxSystem");
	}


    /**
     * 加载主页面
     */
    public function index() {
        $WxSystem = $this->WxSystem_model->where(array("user_id"=>$this->login_user['user_id']))->get_item();
        $this->assign("token", $WxSystem['wxs_token']);
        $this->assign("HTTP_HOST", $_SERVER['HTTP_HOST']);

//        var_dump($_SERVER);die;

        $this->view("admin/binding/index");
    }

}
