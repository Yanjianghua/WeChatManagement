<?php
class MyBlogLabel_service extends MY_Service {
	const MSG_USERNAME_NOT_NULL = "博客标签名不能为空";
	const MSG_USERNAME_IS_EXISTS = "博客标签名已存在";
	const MSG_LABEL_IS_EXISTS = "博客标签使用中，不可删除";

	public function __construct() {
		parent::__construct();
		$this->loadModel("MyBlogLabel","MyBlogArticle");
	}

	public function addoredit($options = array()) {
		$optionsKeys = array(
			"label_id",
			"label_name",
			"label_note",
			"status"
		);
		extract(formatOptions($options, $optionsKeys));

		$data = array();

		if (optionExists($label_id)) {
			$data['label_id'] = $label_id;
		}

		if (optionExists($label_name)) {
			$data['label_name'] = $label_name;
		}

		if (optionExists($label_note)) {
			$data['label_note'] = $label_note;
		}

		if (optionExists($status)) {
			$data['status'] = $status;
		}

		if ($label_id) {
			$success = $this->MyBlogLabel_model->where("label_id", $label_id)->set($data)->update();
		} else {
			if (empty($label_name)) {
				return wrrong_msg(self::MSG_USERNAME_NOT_NULL);
			}
            $channel = $this->MyBlogLabel_model->where("label_name",$label_name)->get_list();
            if($channel){
                return wrrong_msg(self::MSG_USERNAME_IS_EXISTS);
            }
			$success = $this->MyBlogLabel_model->set($data)->insert();
		}

		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
		if($label_id){
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_MyBlogLabel",
                "class_obj"=>"edit",
                "result"=>$label_name." 分类ID：".$label_id."信息修改成功",
                "op_time"=>time()
            ))->insert();
            return success_msg(MSG_EDIT_SUCCESS);
        }else{
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_MyBlogLabel",
                "class_obj"=>"add",
                "result"=>$label_name."分类信息添加成功",
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
			"label_id",
			"label_name",
			"rows",
			"page"
		);
		extract(formatOptions($options, $optionsKeys));

		$where = array();
		$result = array();

		if (optionExists($label_id)) {
			$where['label_id'] = $label_id;
		}
		//username模糊查询
		if (optionExists($label_name)) {
			$where['label_name like'] = "%{$label_name}%";
		}

		//分页
		if (optionExists($rows) && optionExists($page)) {
			$result['total'] = $this->MyBlogLabel_model->where($where)->count();
			$page = max($page, 1);
			$offset = ($page - 1) * $rows;
			$this->MyBlogLabel_model->limit($rows, $offset);
		}
		//获取列表
		$list = $this->MyBlogLabel_model->where($where)->get_list();
		$result['rows'] = $list;
		return $result;
	}

	/**
	 *	删除内容
	 */
	public function delete($options = array()) {
		$optionsKeys = array("label_id");
		extract(formatOptions($options, $optionsKeys));
		if (!$label_id) {
			return wrrong_msg(MSG_INVALID_ARGUMENTS);
		}
		$label_id_json = json_encode(array($label_id));
        $label = $this->MyBlogArticle_model->where_in("label_id",$label_id_json)->get_item();
		if (!empty($label)) {
			return wrrong_msg(self::MSG_LABEL_IS_EXISTS);
		}
		$success = $this->MyBlogLabel_model->where("label_id", $label_id)->delete();
		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
        $this->MySysLog_model->set(array(
            "user_name"=>$this->login_user['user_name'],
            "action"=>"IP地址: ".ip(),
            "class_name"=>"Admin_MyBlogLabel",
            "class_obj"=>"del",
            "result"=>"博客分类ID：".$label_id."删除成功",
            "op_time"=>time()
        ))->insert();
		return success_msg(MSG_DELETE_SUCCESS);

	}

}
?>