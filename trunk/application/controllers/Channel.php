<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Channel extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("View","System","MyBlogArticle","MyBlogChannel");
		$this->loadModel("MyBlogChannel");
	}

	public function index() {
        $id = (int)$this->input->get('id');
        $page = (int)$this->input->get('page');
        $rows = 5;
        if(isset($page) and $page<0){
            alert(MSG_INVALID_ARGUMENTS);
        }
        if(isset($page) and $page!==""){
            $offset = (int)$page*$rows;
        }
        if($page == NULL){
            $page = 0;
        }
        $channel_name = $this->MyBlogChannel_model->where('channel_id',$id)->get_item();
        $channel = $this->MyBlogArticle_service->get_list(array("desc"=>true,"channel_id"=>$id,"rows"=>$rows,"page"=>$page+1));
        $recommend = $this->MyBlogArticle_service->get_list(array("desc"=>true,"channel_id"=>$id,"rows"=>"5","page"=>"0","status"=>"2"));
        $channel_lei = $this->MyBlogChannel_service->get_list(array("rows"=>"8","page"=>"0"));
        if($page>=0){
            $channel['page'] = $page;
            $channel['page_all'] = ceil($channel['total']/$rows);
        }
        $this->assign("channel_id", $id);
        $this->assign("channel", $channel);
        $this->assign("recommend", $recommend['rows']);
        $this->assign("channel_lei", $channel_lei['rows']);
        $this->assign("channel_name", $channel_name['channel_name']);
		$this->view(config_item("style") . '/channel/index');
	}

}
