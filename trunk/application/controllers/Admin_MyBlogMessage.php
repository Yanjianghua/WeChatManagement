<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_MyBlogMessage extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("MyBlogMessage");
		$this->loadModel("MyBlogMessage");
	}


	/**
	 * 加载主页面
	 */
	public function index() {
		$message = $this->MyBlogMessage_service->get_list();
		$this->assign("message", $message['rows']);
//        print_r($Users['rows']);die;

		$this->view("admin/myblogmessage/index");
	}

	/**
	 * 修改
	 */
	public function edit() {
        $message_id = $this->input->get('message_id');
		$input = $this->input->post(NULL);
		if (!empty($input)) {
            $success = $this->MyBlogMessage_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_MyBlogMessage/index");
            }else{
                alert($success['msg']);
            }
		}
        $message = $this->MyBlogMessage_model->where('message_id',$message_id)->get_item();
		$this->assign("message", $message);
		$this->view("admin/myblogmessage/edit");
	}

	/**
	 * 添加
	 */
	public function add() {
		$input = $this->input->post(NULL);
		if (!empty($input)) {
			$success = $this->MyBlogMessage_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_MyBlogMessage/index");
            }else{
                alert($success['msg']);
            }

		}
		$this->view("admin/myblogmessage/add");
	}

	/**
	 * 删除
	 */
	public function del() {
		$input = $this->input->get(NULL);
        $success = $this->MyBlogMessage_service->delete($input);
		alert($success['msg']);
	}

	/**
	 * 禁用
	 */
	public function disable() {
		$input = $this->input->get(NULL);
		$input['status'] = FALSE;
        $success = $this->MyBlogMessage_service->addoredit($input);
		alert($success['msg']);
	}

	/**
	 * 启用
	 */
	public function enable() {
		$input = $this->input->get(NULL);
		$input['status'] = TRUE;
        $success = $this->MyBlogMessage_service->addoredit($input);
        alert($success['msg']);
	}


}
