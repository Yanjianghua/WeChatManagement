<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_WxVoteRecord extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("WxSystem","WxVote","WxVoteRecord");
		$this->loadModel("WxVoteRecord");
	}


    /**
     * 加载主页面
     */
    public function index() {
        $WxVoteRecord = $this->WxVoteRecord_service->get_list();
        $this->assign("WxVoteRecord", $WxVoteRecord['rows']);
//var_dump( $WxVote['rows']);die;
        $this->view("admin/wxvoterecord/index");
    }

    /**
     * 修改
     */
    public function edit() {
        $id = $this->input->get('id');
        $input = $this->input->post(NULL);
        if (!empty($input)) {
            $success = $this->WxVoteRecord_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_WxVoteRecord/index");
            }else{
                alert($success['msg']);
            }
        }
        $wxs= $this->WxVoteRecord_model->where('id',$id)->get_item();
        $this->assign("WxVoteRecord", $wxs);
        $this->view("admin/wxvoterecord/edit");
    }

    /**
     * 添加
     */
    public function add() {
        $input = $this->input->post(NULL);
        if (!empty($input)) {
            $success = $this->WxVoteRecord_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_WxVoteRecord/index");
            }else{
                alert($success['msg']);
            }
        }
        $this->view("admin/wxvoterecord/add");
    }

    /**
     * 删除
     */
    public function del() {
        $input = $this->input->get(NULL);
        $success = $this->WxVoteRecord_service->delete($input);
        alert($success['msg']);
    }

    /**
     * 禁用
     */
    public function disable() {
        $input = $this->input->get(NULL);
        $input['status'] = FALSE;
        $success = $this->WxVoteRecord_service->addoredit($input);
        alert($success['msg']);
    }

    /**
     * 启用
     */
    public function enable() {
        $input = $this->input->get(NULL);
        $input['status'] = TRUE;
        $success = $this->WxVoteRecord_service->addoredit($input);
        alert($success['msg']);
    }

}
