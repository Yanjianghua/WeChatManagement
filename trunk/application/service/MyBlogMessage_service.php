<?php
class MyBlogMessage_service extends MY_Service {
	const MSG_USERNAME_NOT_NULL = "博客标签名不能为空";
	const MSG_USERNAME_IS_EXISTS = "博客标签名已存在";

	public function __construct() {
		parent::__construct();
		$this->loadModel("MyBlogMessage");
	}

	public function addoredit($options = array()) {
		$optionsKeys = array(
			"message_id",
			"message_title",
			"message_email",
			"message_telephone",
			"message_note",
			"status"
		);
		extract(formatOptions($options, $optionsKeys));

		$data = array();

		if (optionExists($message_id)) {
			$data['message_id'] = $message_id;
		}

		if (optionExists($message_title)) {
			$data['message_title'] = (string)$message_title;
		}

		if (optionExists($message_email)) {
			$data['message_email'] = (string)$message_email;
		}

		if (optionExists($message_telephone)) {
			$data['message_telephone'] = (string)$message_telephone;
		}

		if (optionExists($message_note)) {
			$data['message_note'] = (string)$message_note;
		}

		if (optionExists($status)) {
			$data['status'] = $status;
		}

		if ($message_id) {
			$success = $this->MyBlogMessage_model->where("message_id", $message_id)->set($data)->update();
		} else {
			$success = $this->MyBlogMessage_model->set($data)->insert();
		}

		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
		if($message_id){
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_MyBlogMessage",
                "class_obj"=>"edit",
                "result"=>$message_title." 留言ID：".$message_id."信息修改成功",
                "op_time"=>time()
            ))->insert();
            return success_msg(MSG_EDIT_SUCCESS);
        }else{
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_MyBlogMessage",
                "class_obj"=>"add",
                "result"=>$message_title."分类信息添加成功",
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
			"message_id",
			"message_title",
            "status",
			"rows",
			"page"
		);
		extract(formatOptions($options, $optionsKeys));

		$where = array();
		$result = array();

		if (optionExists($message_id)) {
			$where['message_id'] = $message_id;
		}
		//username模糊查询
		if (optionExists($message_title)) {
			$where['message_title like'] = "%{$message_title}%";
		}

		//分页
		if (optionExists($rows) && optionExists($page)) {
			$result['total'] = $this->MyBlogLabel_model->where($where)->count();
			$page = max($page, 1);
			$offset = ($page - 1) * $rows;
			$this->MyBlogLabel_model->limit($rows, $offset);
		}
		//获取列表
		$list = $this->MyBlogMessage_model->where($where)->get_list();
		$result['rows'] = $list;
		return $result;
	}

	/**
	 *	删除内容
	 */
	public function delete($options = array()) {
		$optionsKeys = array("message_id");
		extract(formatOptions($options, $optionsKeys));
		if (!$message_id) {
			return wrrong_msg(MSG_INVALID_ARGUMENTS);
		}
		$success = $this->MyBlogMessage_model->where("message_id", $message_id)->delete();
		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
        $this->MySysLog_model->set(array(
            "user_name"=>$this->login_user['user_name'],
            "action"=>"IP地址: ".ip(),
            "class_name"=>"Admin_MyBlogMessage",
            "class_obj"=>"del",
            "result"=>"博客留言ID：".$message_id."删除成功",
            "op_time"=>time()
        ))->insert();
		return success_msg(MSG_DELETE_SUCCESS);

	}

}
?>