<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_MyBlogRead extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("MyBlogArticle");
		$this->loadModel("MyBlogArticle","MyBlogChannel","MyBlogLabel");
	}


	/**
	 * 加载主页面
	 */
	public function index() {
		$article = $this->MyBlogArticle_model->order_by('article_readnumber','ASC')->get_list();
//        print_r($article);die;

        $this->assign("article", $article);
		$this->view("admin/myblogarticle/read");
	}


}
