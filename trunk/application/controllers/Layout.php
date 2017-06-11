<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Layout extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("View","System","MyBlogArticle","MyBlogChannel");
	}

	public function index() {
        $php = $this->MyBlogArticle_service->get_list(array("channel_id"=>"1","rows"=>"3","page"=>"0","status"=>"2"));
        $recommend = $this->MyBlogArticle_service->get_list(array("rows"=>"3","page"=>"0","status"=>"3"));
        $linux = $this->MyBlogArticle_service->get_list(array("channel_id"=>"2","rows"=>"2","page"=>"0","status"=>"2"));
        $mysql = $this->MyBlogArticle_service->get_list(array("channel_id"=>"3","rows"=>"3","page"=>"0","status"=>"2"));
        $js = $this->MyBlogArticle_service->get_list(array("channel_id"=>"4","rows"=>"3","page"=>"0","status"=>"2"));
        $http = $this->MyBlogArticle_service->get_list(array("channel_id"=>"5","rows"=>"3","page"=>"0","status"=>"2"));
        $new = $this->MyBlogArticle_service->get_list(array("desc"=>true,"rows"=>"4","page"=>"0","status"=>"1"));
        $channel_1 = $this->MyBlogChannel_service->get_list(array("rows"=>"4","page"=>"0"));
        $channel_2 = $this->MyBlogChannel_service->get_list(array("rows"=>"4","page"=>"2"));



//        var_dump($recommend['rows']);die;
        $this->assign("article_php", $php['rows']);
        $this->assign("article_recommend", $recommend['rows']);
        $this->assign("article_linux", $linux['rows']);
        $this->assign("article_mysql", $mysql['rows']);
        $this->assign("article_js", $js['rows']);
        $this->assign("article_http", $http['rows']);
        $this->assign("article_new", $new['rows']);
        $this->assign("channel_1", $channel_1['rows']);
        $this->assign("channel_2", $channel_2['rows']);
		$this->view(config_item("style") . '/layout/index');
	}

}
