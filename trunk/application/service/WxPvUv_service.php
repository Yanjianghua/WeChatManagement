<?php
class WxPvUv_service extends MY_Service {

	public function __construct() {
		parent::__construct();
		$this->loadModel("WxUv","MySysLog","WxPv");
	}

	public function addoredit($options = array()) {
		$optionsKeys = array(
		    "id",
			"vote_id",
			"vote_name",
			"total_time",
			"ip",
			"addtime",
            "address",
			"status"
		);
		extract(formatOptions($options, $optionsKeys));

		$data = array();
        $where = array();

		if (optionExists($id)) {
			$data['id'] = $id;
		}

		if (optionExists($vote_id)) {
			$data['vote_id'] = $vote_id;
            $where['vote_id'] = $vote_id;
		}

		if (optionExists($vote_name)) {
			$data['vote_name'] = $vote_name;
		}

		if (optionExists($ip)) {
			$data['ip'] = $ip;
            $where['ip'] = $ip;
		}


		if (optionExists($status)) {
			if ($status) {
				$data['status'] = WxSystem_model::STATUS_YES;
			} else {
				$data['status'] = WxSystem_model::STATUS_NO;
			}
		}
        $data['addtime'] = time();
		if ($id) {
			$success = $this->WxUv_model->where("id", $id)->set($data)->update();
		} else {
			$success = $this->WxPv_model->set($data)->insert();
            $where['addtime >'] = date2time(date("Y-m-d"), "START");
            $where['addtime <='] = date2time(date("Y-m-d"), "END");
            if (optionExists($total_time)) {
                $data['total_time'] = $total_time;
            }else{
                $data['total_time'] = time();
            }
            $wx_pv = $this->WxUv_model->where($where)->get_item();
            if(empty($wx_pv)){
                $success1 = $this->WxUv_model->set($data)->insert();
            }
		}

		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
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
			"vote_id",
            "vote_name",
            "ip",
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
		if (optionExists($vote_id)) {
			$where['vote_id'] = $vote_id;
		}
        if (optionExists($ip)) {
            $where['ip'] = $ip;
        }
		if (optionExists($status)) {
			$where['status'] = $status;
		}
		//$title模糊查询
		if (optionExists($vote_name)) {
			$where['vote_name like'] = "%{$vote_name}%";
		}

		//分页
		if (optionExists($rows) && optionExists($page)) {
			$result['total'] = $this->WxVote_model->where($where)->count();
			$page = max($page, 1);
			$offset = ($page - 1) * $rows;
			$this->WxVote_model->limit($rows, $offset);
		}
		//获取列表
		$list = $this->WxVote_model->where($where)->get_list();
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
		$success = $this->WxPv_model->where("id", $id)->delete();
		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
	}

}
?>