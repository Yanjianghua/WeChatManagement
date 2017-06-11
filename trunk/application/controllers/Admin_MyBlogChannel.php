<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_MyBlogChannel extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("MyBlogChannel");
		$this->loadModel("MyBlogChannel");
	}


	/**
	 * 加载主页面
	 */
	public function index() {
		$channel = $this->MyBlogChannel_service->get_list();
		$this->assign("channel", $channel['rows']);
//        print_r($Users['rows']);die;

		$this->view("admin/myblogchannel/index");
	}

	/**
	 * 修改
	 */
	public function edit() {
        $channel_id = $this->input->get('channel_id');
		$input = $this->input->post(NULL);
		if (!empty($input)) {
            $success = $this->MyBlogChannel_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_MyBlogChannel/index");
            }else{
                alert($success['msg']);
            }
		}
        $channel= $this->MyBlogChannel_model->where('channel_id',$channel_id)->get_item();
		$this->assign("channel", $channel);
		$this->view("admin/myblogchannel/edit");
	}

	/**
	 * 添加
	 */
	public function add() {
		$input = $this->input->post(NULL);
		if (!empty($input)) {
			$success = $this->MyBlogChannel_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_MyBlogChannel/index");
            }else{
                alert($success['msg']);
            }

		}
		$this->view("admin/myblogchannel/add");
	}

	/**
	 * 删除
	 */
	public function del() {
		$input = $this->input->get(NULL);
        $success = $this->MyBlogChannel_service->delete($input);
		alert($success['msg']);
	}

	/**
	 * 禁用
	 */
	public function disable() {
		$input = $this->input->get(NULL);
		$input['status'] = FALSE;
        $success = $this->MyBlogChannel_service->addoredit($input);
		alert($success['msg']);
	}

	/**
	 * 启用
	 */
	public function enable() {
		$input = $this->input->get(NULL);
		$input['status'] = TRUE;
        $success = $this->MyBlogChannel_service->addoredit($input);
        alert($success['msg']);
	}


}
