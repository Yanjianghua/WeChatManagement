<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_MyBlogRecommend extends MY_Controller {

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

		$this->view("admin/myblogarticle/recommend");
	}



	/**
	 * 推荐
	 */
	public function recommend() {
		$input = $this->input->get(NULL);
		$input['status'] = 2;
        $success = $this->MyBlogArticle_service->addoredit($input);
		alert($success['msg']);
	}

	/**
	 * 轮转图
	 */
	public function Rotation() {
		$input = $this->input->get(NULL);
		$input['status'] = 3;
        $success = $this->MyBlogArticle_service->addoredit($input);
        alert($success['msg']);
	}


}
