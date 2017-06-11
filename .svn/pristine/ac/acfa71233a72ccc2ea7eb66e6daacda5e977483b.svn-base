<?php
class WxVoteFile_service extends MY_Service {
	const MSG_FILENAME_NOT_NULL = "上传文件为空";
	const MSG_FILENAME_IS_EXISTS = "文件标题已存在";

	public function __construct() {
		parent::__construct();
		$this->loadModel("MyUser","WxSystem","MySysLog","WxVote");
	}

	public function addoredit($options = array()) {
		$optionsKeys = array(
			"id",
			"user_id",
			"name",
			"token",
			"url",
			"size",
			"type",
			"addtime",
			"status"
		);
		extract(formatOptions($options, $optionsKeys));

		$data = array();

		if (optionExists($id)) {
			$data['id'] = $id;
		}

		if (optionExists($name)) {
			$data['name'] = $name;
		}

		if (optionExists($url)) {
			$data['url'] = $url;
		}

		if (optionExists($size)) {
			$data['size'] = $size;
		}

		if (optionExists($type)) {
			$data['type'] = $type;
		}

		if (optionExists($addtime)) {
			$data['addtime'] = $addtime;
		}

		if (optionExists($status)) {
			if ($status) {
				$data['status'] = WxSystem_model::STATUS_YES;
			} else {
				$data['status'] = WxSystem_model::STATUS_NO;
			}
		}
        $data['addtime'] = time();
        $data['user_id'] = $this->login_user['user_id'];
        $data['token'] = $this->login_user['token'];
		if ($id) {
			$success = $this->WxVoteFile_model->where("id", $id)->set($data)->update();
		} else {
			if (empty($name)) {
				return wrrong_msg(self::MSG_FILENAME_NOT_NULL);
			}
            $votefile = $this->WxVoteFile_model->where("name",$name)->get_list();
            if($votefile){
                return wrrong_msg(self::MSG_FILENAME_IS_EXISTS);
            }
			$success = $this->WxVoteFile_model->set($data)->insert();
		}

		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
		if($id){
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_WxVote",
                "class_obj"=>"edit",
                "result"=>"后台投票：".$name."信息修改成功",
                "op_time"=>time()
            ))->insert();
            return success_msg(MSG_EDIT_SUCCESS);
        }else{
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_WxVote",
                "class_obj"=>"add",
                "result"=>"后台投票".$name."信息添加成功",
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
			"id",
			"name",
            "user_id",
            "type",
            "token",
			"status",
			"rows",
			"page"
		);
		extract(formatOptions($options, $optionsKeys));

		$where = array();
		$result = array();

		if (optionExists($id)) {
			$where['id'] = $id;
		}
		if (optionExists($token)) {
			$where['token'] = $token;
		}
		if (optionExists($status)) {
			$where['status'] = $status;
		}
		//$title模糊查询
		if (optionExists($name)) {
			$where['name like'] = "%{$name}%";
		}
		if (optionExists($user_id)) {
			$where['user_id'] = $user_id;
		}
		if (optionExists($type)) {
			$where['type'] = $type;
		}

		//分页
		if (optionExists($rows) && optionExists($page)) {
			$result['total'] = $this->WxVoteFile_model->where($where)->count();
			$page = max($page, 1);
			$offset = ($page - 1) * $rows;
			$this->WxVoteFile_model->limit($rows, $offset);
		}
		//获取列表
		$list = $this->WxVoteFile_model->where($where)->get_list();
		//获取选手信息

		$result['rows'] = $list;
		return $result;
	}

	/**
	 *	删除内容
	 */
	public function delete($options = array()) {
		$optionsKeys = array("id");
		extract(formatOptions($options, $optionsKeys));
		if (!$id) {
			return wrrong_msg(MSG_INVALID_ARGUMENTS);
		}

		$success = $this->WxVoteFile_model->where("id", $id)->delete();
		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
        $this->MySysLog_model->set(array(
            "user_name"=>$this->login_user['user_name'],
            "action"=>"IP地址: ".ip(),
            "class_name"=>"Admin_WxVote",
            "class_obj"=>"del",
            "result"=>"后台投票ID为".$id."删除成功",
            "op_time"=>time()
        ))->insert();
		return success_msg(MSG_DELETE_SUCCESS);

	}

}
?>