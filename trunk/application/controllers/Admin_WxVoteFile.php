<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_WxVoteFile extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("WxSystem","WxVoteFile");
		$this->loadModel("WxVoteFile");
	}


    /**
     * 加载主页面
     */
    public function index() {
        $WxVoteFile = $this->WxVoteFile_service->get_list();
        $this->assign("WxVoteFile", $WxVoteFile['rows']);

        $this->view("admin/wxvotefile/index");
    }

    /**
     * 修改
     */
    public function edit() {
        $id = $this->input->get('id');
        $input = $this->input->post(NULL);
        if (!empty($input)) {

            if($input['type']=='img'){
                if($_FILES){
                    $input['url'] = $this->upload($_FILES['url']);
                    $input['size'] = $_FILES['url']['size'];
                }else{
                    $input['url'] = NULL;
                }
            }elseif($input['type']=='mp3'){
                if($_FILES){
                    if(maxMp3FileSize($_FILES['url'])){
                        alert('文件过大，请压缩后上传！');
                    }
                    $input['url'] = $this->upload($_FILES['url']);
                    $input['size'] = $_FILES['url']['size'];
                }else{
                    $input['url'] = NULL;
                }
            }

            $success = $this->WxVoteFile_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_WxVoteFile/index");
            }else{
                alert($success['msg']);
            }
        }
        $wxs= $this->WxVoteFile_model->where('id',$id)->get_item();
        $this->assign("WxVoteFile", $wxs);
        $this->assign("time", time());
        $this->view("admin/wxvotefile/edit");
    }

    /**
     * 添加
     */
    public function add() {
        $input = $this->input->post(NULL);
        if (!empty($input)) {
            if($input['type']=='img'){
                if($_FILES){

                    $input['url'] = $this->upload($_FILES['url']);
                    $input['size'] = $_FILES['url']['size'];
                }else{
                    $input['url'] = NULL;
                }
            }elseif($input['type']=='mp3'){
                if($_FILES){
                    if(maxMp3FileSize($_FILES['url'])){
                        alert('文件过大，请压缩后上传！');
                    }
                    $input['url'] = $this->uploadMp3($_FILES['url']);
                    $input['size'] = $_FILES['url']['size'];
                }else{
                    $input['url'] = NULL;
                }
            }
            $success = $this->WxVoteFile_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_WxVoteFile/index");
            }else{
                alert($success['msg']);
            }

        }
        //模版获取
        $this->assign("moban", array());
        $this->assign("time", time());
        $this->view("admin/wxvotefile/add");
    }

    /**
     * 删除
     */
    public function del() {
        $input = $this->input->get(NULL);
        $success = $this->WxVoteFile_service->delete($input);
        alert($success['msg']);
    }

    /**
     * 禁用
     */
    public function disable() {
        $input = $this->input->get(NULL);
        $input['status'] = FALSE;
        $success = $this->WxVoteFile_service->addoredit($input);
        alert($success['msg']);
    }

    /**
     * 启用
     */
    public function enable() {
        $input = $this->input->get(NULL);
        $input['status'] = TRUE;
        $success = $this->WxVoteFile_service->addoredit($input);
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
            return false;
        }
        return $img;
//        return $this->config->config['server_url'].$img;
    }

    /**
     * 后台上传音乐
     * @param null $file
     * @return string
     */
    public function uploadMp3($file = NULL){
        $mp3 = uploadMp3($file, "/uploads/mp3", function() use ($file) {
            if (!maxMp3FileSize($file)) {
                return false;
            }
            if (!isMp3($file)) {
                return false;
            }
        });
        if (!$mp3) {
            return false;
        }
        return $mp3;
//        return $this->config->config['server_url'].$img;
    }

}
