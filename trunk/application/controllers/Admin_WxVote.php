<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_WxVote extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("WxSystem","WxVote");
		$this->loadModel("WxVote");
	}


    /**
     * 加载主页面
     */
    public function index() {
        $WxVote = $this->WxVote_service->get_list();
        $this->assign("WxVote", $WxVote['rows']);
//var_dump( $WxVote['rows']);die;
        $this->view("admin/wxvote/index");
    }

    /**
     * 修改
     */
    public function edit() {
        $id = $this->input->get('id');
        $input = $this->input->post(NULL);
        if (!empty($input)) {
            if($_FILES){
                $input['picurl'] = $this->upload($_FILES['picurl']);
                $input['wappicurl'] = $this->upload($_FILES['wappicurl']);
            }else{
                $input['picurl'] = NULL;
                $input['wappicurl'] = NULL;
            }
            $success = $this->WxVote_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_WxVote/index");
            }else{
                alert($success['msg']);
            }
        }
        $wxs= $this->WxVote_model->where('id',$id)->get_item();
        $this->assign("moban", WxVote_model::$moban);
        $this->assign("WxVote", $wxs);
        $this->assign("time", time());
        $this->view("admin/wxvote/edit");
    }

    /**
     * 添加
     */
    public function add() {
        $input = $this->input->post(NULL);
        if (!empty($input)) {
            if($_FILES){
                $input['picurl'] = $this->upload($_FILES['picurl']);
                $input['wappicurl'] = $this->upload($_FILES['wappicurl']);
            }else{
                $input['picurl'] = NULL;
                $input['wappicurl'] = NULL;
            }
            $success = $this->WxVote_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_WxVote/index");
            }else{
                alert($success['msg']);
            }

        }
        //模版获取
        $this->assign("moban", WxVote_model::$moban);
        $this->assign("time", time());
        $this->view("admin/wxvote/add");
    }

    /**
     * 删除
     */
    public function del() {
        $input = $this->input->get(NULL);
        $success = $this->WxVote_service->delete($input);
        alert($success['msg']);
    }

    /**
     * 禁用
     */
    public function disable() {
        $input = $this->input->get(NULL);
        $input['status'] = FALSE;
        $success = $this->WxVote_service->addoredit($input);
        alert($success['msg']);
    }

    /**
     * 启用
     */
    public function enable() {
        $input = $this->input->get(NULL);
        $input['status'] = TRUE;
        $success = $this->WxVote_service->addoredit($input);
        alert($success['msg']);
    }

    /**
     * 后台上传图片
     * @param null $file
     * @return string
     */
    public function upload($file = NULL){
        $img = upload($file, "/uploads/pic", function() use ($file) {
            if (!maxFileSize($file)) {
                return false;
            }
            if (!isImage($file)) {
                return false;
            }
        });
        if (!$img) {
            $message = '上传失败';
        }
        return $this->config->config['server_url'].$img;
    }

    /**
     * ajax上传图片返回路径
     * @param null $file
     */
    public function uploadFile($file = NULL){
        $file = $_FILES['upload'];
        $img = upload($file, "/uploads/pic", function() use ($file) {
            if (!maxFileSize($file)) {
                return false;
            }
            if (!isImage($file)) {
                return false;
            }
        });
        $fn = $this->input->get('CKEditorFuncNum') ? $this->input->get('CKEditorFuncNum') : 1;
        $message = "";
        if (!$img) {
            $message = '上传失败';
        }
        mkhtml($fn, config_item("server_url") . str_replace("\\",'/',substr($img,1)), $message);
    }

}
