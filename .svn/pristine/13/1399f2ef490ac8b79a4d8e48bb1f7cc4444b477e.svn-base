<?php
class MyBlogChannel_service extends MY_Service {
	const MSG_USERNAME_NOT_NULL = "博客分类名不能为空";
	const MSG_USERNAME_IS_EXISTS = "博客分类名已存在";
	const MSG_CHANNEL_IS_EXISTS = "博客分类使用中，不可删除";

	public function __construct() {
		parent::__construct();
		$this->loadModel("MyBlogChannel","MyBlogArticle");
	}

	public function addoredit($options = array()) {
		$optionsKeys = array(
			"channel_id",
			"channel_name",
			"channel_note",
			"channel_hide",
			"status"
		);
		extract(formatOptions($options, $optionsKeys));

		$data = array();

		if (optionExists($channel_id)) {
			$data['channel_id'] = $channel_id;
		}

		if (optionExists($channel_name)) {
			$data['channel_name'] = $channel_name;
		}

		if (optionExists($channel_note)) {
			$data['channel_note'] = $channel_note;
		}

		if (optionExists($channel_hide)) {
			$data['channel_hide'] = $channel_hide;
		}

		if (optionExists($status)) {
			$data['status'] = $status;
		}

		if ($channel_id) {
			$success = $this->MyBlogChannel_model->where("channel_id", $channel_id)->set($data)->update();
		} else {
			if (empty($channel_name)) {
				return wrrong_msg(self::MSG_USERNAME_NOT_NULL);
			}
            $channel = $this->MyBlogChannel_model->where("channel_name",$channel_name)->get_list();
            if($channel){
                return wrrong_msg(self::MSG_USERNAME_IS_EXISTS);
            }
			$success = $this->MyBlogChannel_model->set($data)->insert();
		}

		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
		if($channel_id){
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_MyBlogChannel",
                "class_obj"=>"edit",
                "result"=>$channel_name." 分类ID：".$channel_id."信息修改成功",
                "op_time"=>time()
            ))->insert();
            return success_msg(MSG_EDIT_SUCCESS);
        }else{
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_MyBlogChannel",
                "class_obj"=>"add",
                "result"=>$channel_name."分类信息添加成功",
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
			"channel_id",
			"channel_name",
			"rows",
			"page"
		);
		extract(formatOptions($options, $optionsKeys));

		$where = array();
		$result = array();

		if (optionExists($channel_id)) {
			$where['channel_id'] = $channel_id;
		}
		//username模糊查询
		if (optionExists($channel_name)) {
			$where['channel_name like'] = "%{$channel_name}%";
		}

		//分页
		if (optionExists($rows) && optionExists($page)) {
			$result['total'] = $this->MyBlogChannel_model->where($where)->count();
			$page = max($page, 1);
			$offset = ($page - 1) * $rows;
			$this->MyBlogChannel_model->limit($rows, $offset);
		}
		//获取列表
		$list = $this->MyBlogChannel_model->where($where)->get_list();
		$result['rows'] = $list;
		return $result;
	}

	/**
	 *	删除内容
	 */
	public function delete($options = array()) {
		$optionsKeys = array("channel_id");
		extract(formatOptions($options, $optionsKeys));
		if (!$channel_id) {
			return wrrong_msg(MSG_INVALID_ARGUMENTS);
		}
		$channel = $this->MyBlogArticle_model->where("channel_id", $channel_id)->get_item();
		if (!empty($channel)) {
			return wrrong_msg(self::MSG_CHANNEL_IS_EXISTS);
		}
		$success = $this->MyBlogChannel_model->where("channel_id", $channel_id)->delete();
		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
        $this->MySysLog_model->set(array(
            "user_name"=>$this->login_user['user_name'],
            "action"=>"IP地址: ".ip(),
            "class_name"=>"Admin_MyBlogChannel",
            "class_obj"=>"del",
            "result"=>"博客分类ID：".$channel_id."删除成功",
            "op_time"=>time()
        ))->insert();
		return success_msg(MSG_DELETE_SUCCESS);

	}

}
?>