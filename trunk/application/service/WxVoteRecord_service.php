<?php
class WxVoteRecord_service extends MY_Service {
	const MSG_USERNAME_NOT_NULL = "标题不能为空";
	const MSG_USERNAME_IS_EXISTS = "标题已存在";

	public function __construct() {
		parent::__construct();
		$this->loadModel("MyUser","WxSystem","MySysLog","WxVote");
	}

	public function addoredit($options = array()) {
		$optionsKeys = array(
			"id",
			"user_id",
			"item_id",
			"vid",
			"wecha_id",
			"touched",
			"touch_time",
			"token",
			"ip",
			"address",
			"qxgzys",
			"status"
		);
		extract(formatOptions($options, $optionsKeys));

		$data = array();

		if (optionExists($id)) {
			$data['id'] = $id;
		}

		if (optionExists($item_id)) {
			$data['item_id'] = $item_id;
		}

		if (optionExists($vid)) {
			$data['vid'] = $vid;
		}

		if (optionExists($wecha_id)) {
			$data['wecha_id'] = $wecha_id;
		}

		if (optionExists($touched)) {
			$data['touched'] = $touched;
		}

		if (optionExists($token)) {
			$data['token'] = $token;
		}

		if (optionExists($ip)) {
			$data['ip'] = $ip;
		}

		if (optionExists($address)) {
			$data['address'] = $address;
		}

		if (optionExists($qxgzys)) {
			$data['qxgzys'] = $qxgzys;
		}

        if (optionExists($touch_time)) {
            $data['touch_time'] = $touch_time;
        }

		if (optionExists($status)) {
			if ($status) {
				$data['status'] = WxSystem_model::STATUS_YES;
			} else {
				$data['status'] = WxSystem_model::STATUS_NO;
			}
		}
		if ($id) {
			$success = $this->WxVoteRecord_model->where("id", $id)->set($data)->update();
		} else {
			$success = $this->WxVoteRecord_model->set($data)->insert();
		}

		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
		if($id){
            return success_msg(MSG_EDIT_SUCCESS);
        }else{
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
			"item_id",
            "vid",
            "wecha_id",
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
		if (optionExists($item_id)) {
			$where['item_id'] = $item_id;
		}
		if (optionExists($status)) {
			$where['status'] = $status;
		}
		if (optionExists($vid)) {
			$where['vid'] = $vid;
		}
		if (optionExists($wecha_id)) {
			$where['wecha_id'] = $wecha_id;
		}

		//分页
		if (optionExists($rows) && optionExists($page)) {
			$result['total'] = $this->WxVoteRecord_model->where($where)->count();
			$page = max($page, 1);
			$offset = ($page - 1) * $rows;
			$this->WxVoteRecord_model->limit($rows, $offset);
		}
		//获取列表
		$list = $this->WxVoteRecord_model->where($where)->get_list();
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
		$success = $this->WxVoteRecord_model->where("id", $id)->delete();
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