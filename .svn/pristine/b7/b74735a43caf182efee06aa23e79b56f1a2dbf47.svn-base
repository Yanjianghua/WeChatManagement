<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_MyBlogArticle extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("MyBlogArticle");
		$this->loadModel("MyBlogArticle","MyBlogChannel","MyBlogLabel");
	}


	/**
	 * 加载主页面
	 */
	public function index() {
		$article = $this->MyBlogArticle_service->get_list();
		$this->assign("article", $article['rows']);
//        print_r($article['rows']);die;

		$this->view("admin/myblogarticle/index");
	}

	/**
	 * 修改
	 */
	public function edit() {
        $article_id = $this->input->get('article_id');
		$input = $this->input->post(NULL);
		if (!empty($input)) {
            $input['status'] = 1;
            if($_FILES){
                $input['pic_url'] = $this->upload($_FILES['pic_url']);
            }else{
                $input['pic_url'] = NULL;
            }
            $success = $this->MyBlogArticle_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_MyBlogArticle/index");
            }else{
                alert($success['msg']);
            }
		}
        $article = $this->MyBlogArticle_model->where('article_id',$article_id)->get_item();
		$this->assign("article", $article);
        $label = $this->MyBlogLabel_model->where('status','1')->get_list();
        $this->assign("label",$label);
        $channel = $this->MyBlogChannel_model->where('status','1')->get_list();
        $this->assign("channel",$channel);
		$this->view("admin/myblogarticle/edit");
	}

	/**
	 * 添加
	 */
	public function add() {
		$input = $this->input->post(NULL);
		if (!empty($input)) {
            $input['status'] = 1;
            if($_FILES){
                $input['pic_url'] = $this->upload($_FILES['pic_url']);
            }else{
                $input['pic_url'] = NULL;
            }
			$success = $this->MyBlogArticle_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/Admin_MyBlogArticle/index");
            }else{
                alert($success['msg']);
            }

		}
		$label = $this->MyBlogLabel_model->where('status','1')->get_list();
        $this->assign("label",$label);
		$channel = $this->MyBlogChannel_model->where('status','1')->get_list();
        $this->assign("channel",$channel);
		$this->view("admin/myblogarticle/add");
	}

	/**
	 * 删除
	 */
	public function del() {
		$input = $this->input->get(NULL);
        $success = $this->MyBlogArticle_service->delete($input);
		alert($success['msg']);
	}

	/**
	 * 禁用
	 */
	public function disable() {
		$input = $this->input->get(NULL);
		$input['status'] = FALSE;
        $success = $this->MyBlogArticle_service->addoredit($input);
		alert($success['msg']);
	}

	/**
	 * 启用
	 */
	public function enable() {
		$input = $this->input->get(NULL);
		$input['status'] = TRUE;
        $success = $this->MyBlogArticle_service->addoredit($input);
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
