<?php
class MyBlogArticle_service extends MY_Service {
	const MSG_USERNAME_NOT_NULL = "博客文章标题不能为空";
	const MSG_USERNAME_IS_EXISTS = "博客文章标题已存在";

	public function __construct() {
		parent::__construct();
		$this->loadModel("MyBlogArticle","MyBlogChannel","MyBlogLabel");
	}

	public function addoredit($options = array()) {
		$optionsKeys = array(
			"article_id",
			"article_title",
			"channel_id",
			"label_id",
			"article_keywords",
			"article_description",
			"article_editor",
			"article_content",
			"pic_url",
			"article_url",
			"addtime",
			"status"
		);
		extract(formatOptions($options, $optionsKeys));

		$data = array();

		if (optionExists($article_id)) {
			$data['article_id'] = $article_id;
		}

		if (optionExists($article_title)) {
			$data['article_title'] = $article_title;
		}

		if (optionExists($channel_id)) {
			$data['channel_id'] = $channel_id;
		}

		if (optionExists($label_id)) {
			$data['label_id'] = json_encode($label_id);
		}

		if (optionExists($article_keywords)) {
			$data['article_keywords'] = $article_keywords;
		}

		if (optionExists($article_description)) {
			$data['article_description'] = $article_description;
		}

		if (optionExists($article_editor)) {
			$data['article_editor'] = $article_editor;
		}

		if (optionExists($article_content)) {
			$data['article_content'] = $article_content;
		}

		if (optionExists($pic_url)) {
			$data['pic_url'] = $pic_url;
		}

		if (optionExists($article_url)) {
			$data['article_url'] = $article_url;
		}

		if (optionExists($addtime)) {
			$data['addtime'] = strtotime($addtime);
		}else{
            $data['addtime'] = time();
        }

		if (optionExists($status)) {
			$data['status'] = $status;
		}

		if ($article_id) {
			$success = $this->MyBlogArticle_model->where("article_id", $article_id)->set($data)->update();
		} else {
			if (empty($article_title)) {
				return wrrong_msg(self::MSG_USERNAME_NOT_NULL);
			}
            $channel = $this->MyBlogArticle_model->where("article_title",$article_title)->get_list();
            if($channel){
                return wrrong_msg(self::MSG_USERNAME_IS_EXISTS);
            }
			$success = $this->MyBlogArticle_model->set($data)->insert();
		}

		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
		if($article_id){
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_MyBlogArticle",
                "class_obj"=>"edit",
                "result"=>$article_title." 文章ID：".$article_id."信息修改成功",
                "op_time"=>time()
            ))->insert();
            return success_msg(MSG_EDIT_SUCCESS);
        }else{
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_MyBlogArticle",
                "class_obj"=>"add",
                "result"=>$article_title."分类信息添加成功",
                "op_time"=>time()
            ))->insert();
            return success_msg(MSG_ADD_SUCCESS);
        }
	}

	/**
	 * 获取列表
	 * @param unknown $options	数组
	 * @return multitype:NULL string
	 */
	public function get_list($options = array()) {
		$optionsKeys = array(
			"article_id",
			"channel_id",
			"article_title",
			"wd",
			"article_keywords",
			"article_description",
			"rows",
			"status",
			"page",
            "desc"
		);
		extract(formatOptions($options, $optionsKeys));

		$where = array();
		$result = array();

		if (optionExists($article_id)) {
			$where['article_id'] = $article_id;
		}
		if (optionExists($status)) {
			$where['status >='] = $status;
		}
		if (optionExists($channel_id)) {
			$where['channel_id'] = $channel_id;
		}
		//article_title模糊查询
		if (optionExists($article_title)) {
			$where['article_title like'] = "%{$article_title}%";
		}
		//article_keywords模糊查询
		if (optionExists($article_keywords)) {
			$where['article_keywords like'] = "%{$article_keywords}%";
		}
		//article_description模糊查询
		if (optionExists($article_description)) {
			$where['article_description like'] = "%{$article_description}%";
		}
		//wd模糊查询
		if (optionExists($wd)) {
			$where_or['article_title like'] = "%{$wd}%";
			$where_or['article_keywords like'] = "%{$wd}%";
			$where_or['article_description like'] = "%{$wd}%";
		}

		//分页
		if (optionExists($rows) && optionExists($page)) {
			$result['total'] = $this->MyBlogArticle_model->where($where)->count();
			$page = max($page, 1);
			$offset = ($page - 1) * $rows;
			$this->MyBlogArticle_model->limit($rows, $offset);
		}
		//获取列表
        if($desc){
            if (optionExists($wd)) {
                $list = $this->MyBlogArticle_model->where($where)->or_where($where_or)->order_by("article_id", "DESC")->get_list();
            }else{
                $list = $this->MyBlogArticle_model->where($where)->order_by("article_id", "DESC")->get_list();
            }
        }else{
            if (optionExists($wd)) {
                $list = $this->MyBlogArticle_model->where($where)->or_where($where_or)->get_list();
            }else{
                $list = $this->MyBlogArticle_model->where($where)->get_list();
            }
        }


        foreach ($list as $k=>$v){
            if(!empty($v['channel_id'])){
                $channel = $this->MyBlogChannel_model->where('channel_id',$v['channel_id'])->get_item();
                $list[$k]['channel_name'] = $channel['channel_name'];
            }
            if(!empty($v['label_id'])){
                $label_id = json_decode($v['label_id']);
                $label_name = "";
                foreach ($label_id as $value){
                    $label = $this->MyBlogLabel_model->where('label_id',$value)->get_item();
                    $label_name .= $label['label_name'].",";
//                    var_dump($label_name);die;
                    $list[$k]['label_name'] = substr($label_name,0,strlen($label_name)-1);
                }
            }
        }
		$result['rows'] = $list;
		return $result;
	}

	/**
	 *	删除内容
	 */
	public function delete($options = array()) {
		$optionsKeys = array("article_id");
		extract(formatOptions($options, $optionsKeys));
		if (!$article_id) {
			return wrrong_msg(MSG_INVALID_ARGUMENTS);
		}
		$success = $this->MyBlogArticle_model->where("article_id", $article_id)->delete();
		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
        $this->MySysLog_model->set(array(
            "user_name"=>$this->login_user['user_name'],
            "action"=>"IP地址: ".ip(),
            "class_name"=>"Admin_MyBlogArticle",
            "class_obj"=>"del",
            "result"=>"博客文章ID：".$article_id."删除成功",
            "op_time"=>time()
        ))->insert();
		return success_msg(MSG_DELETE_SUCCESS);

	}

    /**
     * ajax获取
     */
    public function read_addoredit_ajax($options = array()){
        $optionsKeys = array(
            "article_id",
        );
        extract(formatOptions($options, $optionsKeys));
        $data = array();
        if (optionExists($article_id)) {
            $list = $this->MyBlogArticle_model->where('article_id',$article_id)->get_item();
            $data['article_readnumber'] = $list['article_readnumber']+1;
            $success = $this->MyBlogArticle_model->set($data)->where("article_id", $article_id)->update();
            if (!$success) {
                return wrrong_msg(MSG_SERVICE_BUSY);
            }
        }else{
            return wrrong_msg(MSG_INVALID_ARGUMENTS);
        }
        return wrrong_msg(MSG_METHOD_SUCCESS);
    }

}
?>