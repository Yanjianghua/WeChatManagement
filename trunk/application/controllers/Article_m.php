<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Article_m extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("View","System","MyBlogArticle","MyBlogChannel");
		$this->loadModel("MyBlogArticle","MyBlogChannel");
	}

	public function index() {
        $id = (int)$this->input->get('id');
        if(isset($id) and $id<0){
            alert(MSG_INVALID_ARGUMENTS);
        }
        $article =  $this->MyBlogArticle_model->where('article_id',$id)->get_item();
        if(empty($article)){
            alert("没有此文章",'/');
        }
        $recommend = $this->MyBlogArticle_service->get_list(array("desc"=>true,"rows"=>"5","page"=>"0","status"=>"2"));
        $channel_lei = $this->MyBlogChannel_service->get_list(array("rows"=>"8","page"=>"0"));
        if(!empty($article['channel_id'])){
            $channel = $this->MyBlogChannel_model->where('channel_id',$article['channel_id'])->get_item();
            $article['channel_name'] = $channel['channel_name'];
        }
        if(!empty($article['label_id'])){
            $label_id = json_decode($article['label_id']);
            $label_name = "";
            foreach ($label_id as $value){
                $label = $this->MyBlogLabel_model->where('label_id',$value)->get_item();
                $label_name .= $label['label_name'].",";
                $article['label_name'] = substr($label_name,0,strlen($label_name)-1);
            }
        }


        $this->assign("article", $article);
        $this->assign("recommend", $recommend['rows']);
        $this->assign("channel_lei", $channel_lei['rows']);
		$this->view(config_item("style") . '/article/index');
	}

    public function read_add_ajax(){
        $id = (int)$this->input->post_get('id');
        if(!empty($id)){
            return $this->MyBlogArticle_service->read_addoredit_ajax(array('article_id'=>$id));
        }
    }

}
