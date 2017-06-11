<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_MyBlogLabel extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("MyBlogLabel");
		$this->loadModel("MyBlogLabel");
	}


	/**
	 * 加载主页面
	 */
	public function index() {
		$label = $this->MyBlogLabel_service->get_list();
		$this->assign("label", $label['rows']);
//        print_r($Users['rows']);die;

		$this->view("admin/mybloglabel/index");
	}

	/**
	 * 修改
	 */
	public function edit() {
        $label_id = $this->input->get('label_id');
		$input = $this->input->post(NULL);
		if (!empty($input)) {
            $success = $this->MyBlogLabel_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_MyBlogLabel/index");
            }else{
                alert($success['msg']);
            }
		}
        $label= $this->MyBlogLabel_model->where('label_id',$label_id)->get_item();
		$this->assign("label", $label);
		$this->view("admin/mybloglabel/edit");
	}

	/**
	 * 添加
	 */
	public function add() {
		$input = $this->input->post(NULL);
		if (!empty($input)) {
			$success = $this->MyBlogLabel_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_MyBlogLabel/index");
            }else{
                alert($success['msg']);
            }

		}
		$this->view("admin/mybloglabel/add");
	}

	/**
	 * 删除
	 */
	public function del() {
		$input = $this->input->get(NULL);
        $success = $this->MyBlogLabel_service->delete($input);
		alert($success['msg']);
	}

	/**
	 * 禁用
	 */
	public function disable() {
		$input = $this->input->get(NULL);
		$input['status'] = FALSE;
        $success = $this->MyBlogLabel_service->addoredit($input);
		alert($success['msg']);
	}

	/**
	 * 启用
	 */
	public function enable() {
		$input = $this->input->get(NULL);
		$input['status'] = TRUE;
        $success = $this->MyBlogLabel_service->addoredit($input);
        alert($success['msg']);
	}


}
