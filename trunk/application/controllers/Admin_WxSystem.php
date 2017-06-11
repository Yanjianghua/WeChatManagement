<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_WxSystem extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("MyMenu","WxSystem");
		$this->loadModel("MyMenuUrl");
	}


    /**
     * 加载主页面
     */
    public function index() {
        $WxSystem = $this->WxSystem_service->get_list();
        $this->assign("WxSystem", $WxSystem['rows']);

        $this->view("admin/wxsystem/index");
    }

    /**
     * 修改
     */
    public function edit() {
        $wxs_id = $this->input->get('wxs_id');
        $input = $this->input->post(NULL);
        if (!empty($input)) {
            $success = $this->WxSystem_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_WxSystem/index");
            }else{
                alert($success['msg']);
            }
        }
        $wxs= $this->WxSystem_model->where('wxs_id',$wxs_id)->get_item();
        $this->assign("wxs", $wxs);
        $this->view("admin/wxsystem/edit");
    }

    /**
     * 添加
     */
    public function add() {
        $input = $this->input->post(NULL);
        if (!empty($input)) {
            $success = $this->WxSystem_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_WxSystem/index");
            }else{
                alert($success['msg']);
            }

        }
        $this->view("admin/wxsystem/add");
    }

    /**
     * 删除
     */
    public function del() {
        $input = $this->input->get(NULL);
        $success = $this->WxSystem_service->delete($input);
        alert($success['msg']);
    }

    /**
     * 禁用
     */
    public function disable() {
        $input = $this->input->get(NULL);
        $input['status'] = FALSE;
        $success = $this->WxSystem_service->addoredit($input);
        alert($success['msg']);
    }

    /**
     * 启用
     */
    public function enable() {
        $input = $this->input->get(NULL);
        $input['status'] = TRUE;
        $success = $this->WxSystem_service->addoredit($input);
        alert($success['msg']);
    }

}
