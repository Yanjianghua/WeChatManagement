<?php
class WxVoteItem_service extends MY_Service {
	const MSG_USERNAME_NOT_NULL = "姓名不能为空";
	const MSG_USERNAME_IS_EXISTS = "标题已存在";
	const MSG_TELEPHONE_IS_EXISTS = "手机号不正确，请重新填写";

	public function __construct() {
		parent::__construct();
		$this->loadModel("MyUser","MySysLog","WxVote","WxVoteItem");
	}

	public function addoredit($options = array()) {
		$optionsKeys = array(
			"id",
			"vid",
			"name",
			"user_id",
			"dcount",
			"vcount",
			"startpicurl",
			"startpicurl2",
			"startpicurl3",
			"startpicurl4",
			"startpicurl5",
			"tourl",
			"rank",
			"intro",
			"wechat",
			"wechat_id",
			"lockinfo",
			"addtime",
			"status"
		);
		extract(formatOptions($options, $optionsKeys));

		$data = array();

		if (optionExists($id)) {
			$data['id'] = $id;
		}

		if (optionExists($vid)) {
			$data['vid'] = $vid;
		}

		if (optionExists($name)) {
			$data['name'] = $name;
		}else{
            return wrrong_msg(self::MSG_USERNAME_NOT_NULL);
        }

		if (optionExists($dcount)) {
			$data['dcount'] = $dcount;
		}

		if (optionExists($vcount)) {
			$data['vcount'] = $vcount;
		}

		if (optionExists($startpicurl)) {
			$data['startpicurl'] = $startpicurl;
		}

		if (optionExists($startpicurl2)) {
			$data['startpicurl2'] = $startpicurl2;
		}

		if (optionExists($startpicurl3)) {
			$data['startpicurl3'] = $startpicurl3;
		}

		if (optionExists($startpicurl4)) {
			$data['startpicurl4'] = $startpicurl4;
		}

		if (optionExists($startpicurl5)) {
			$data['startpicurl5'] = strtotime($startpicurl5);
		}

		if (optionExists($tourl) and telephoneCheck($tourl)) {
			$data['tourl'] = $tourl;
		}else{
            return wrrong_msg(self::MSG_TELEPHONE_IS_EXISTS);
        }

		if (optionExists($rank)) {
			$data['rank'] = $rank;
		}

		if (optionExists($intro)) {
			$data['intro'] = $intro;
		}

		if (optionExists($wechat)) {
			$data['wechat'] = $wechat;
		}

		if (optionExists($wechat_id)) {
			$data['wechat_id'] = $wechat_id;
		}

		if (optionExists($lockinfo)) {
			$data['lockinfo'] = $lockinfo;
		}

		if (optionExists($user_id)) {
            $data['user_id'] = $this->login_user['user_id'];
		}else{
            $data['user_id'] = 0;
        }

		if (optionExists($status)) {
			if ($status==1) {
				$data['status'] = WxSystem_model::STATUS_YES;
			} elseif($status==2){
                $data['status'] = WxSystem_model::STATUS_SUO;
            }else {
				$data['status'] = WxSystem_model::STATUS_NO;
			}
		}
        $data['addtime'] = time();
		if ($id) {
			$success = $this->WxVoteItem_model->where("id", $id)->set($data)->update();
		} else {
			if (empty($name)) {
				return wrrong_msg(self::MSG_USERNAME_NOT_NULL);
			}
            $vote = $this->WxVoteItem_model->where("name",$name)->get_list();
            if($vote){
                return wrrong_msg(self::MSG_USERNAME_IS_EXISTS);
            }
			$success = $this->WxVoteItem_model->set($data)->insert();
		}

		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
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
			"user_id",
            "name",
            "vid",
			"status",
			"order",
			"rows",
			"page"
		);
		extract(formatOptions($options, $optionsKeys));

		$where = array();
		$order_str = '';
		$result = array();

		if (optionExists($id)) {
			$where['id'] = $id;
		}
		if (optionExists($user_id)) {
			$where['user_id'] = $user_id;
		}
		if (optionExists($vid)) {
			$where['vid'] = $vid;
		}
		if (optionExists($status)) {
			$where['status'] = $status;
		}
		if (optionExists($order)) {
            $order_str = " $order desc";
		}
		//name模糊查询
		if (optionExists($name)) {
			$where['name like'] = "%{$name}%";
		}

		//分页
		if (optionExists($rows) && optionExists($page)) {
			$result['total'] = $this->WxVoteItem_model->where($where)->count();
			$page = max($page, 1);
			$offset = ($page - 1) * $rows;
			$this->WxVoteItem_model->limit($rows, $offset);
		}
		//获取列表
        if(!empty($order_str)){
            if($order=='dcount+vcount'){
                $list = $this->WxVoteItem_model->select('*,(dcount + vcount) as dv')->where($where)->order_by('dv desc')->get_list();
            }else{
                $list = $this->WxVoteItem_model->where($where)->order_by($order_str)->get_list();
            }
        }else{
            $list = $this->WxVoteItem_model->where($where)->get_list();
        }
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

		$success = $this->WxVoteItem_model->where("id", $id)->delete();
		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
        $this->MySysLog_model->set(array(
            "user_id"=>$this->login_user['user_id'],
            "user_name"=>$this->login_user['user_name'],
            "action"=>"IP地址: ".ip(),
            "class_name"=>"Admin_WxVoteItem",
            "class_obj"=>"del",
            "result"=>"后台投票ID为".$id."删除成功",
            "op_time"=>time()
        ))->insert();
		return success_msg(MSG_DELETE_SUCCESS);

	}

	public function total_sum($vid){
        $number = 0;
        if(!empty($vid)){
            $list = $this->WxVoteItem_model->where('vid',$vid)->get_list();
            if(!empty($list)){
                foreach ($list as $key=>$value){
                    if(isset($value['dcount']) and !empty($value['dcount'])){
                        $number += $value['dcount'];
                    }
                    if(isset($value['vcount']) and !empty($value['vcount'])){
                        $number += $value['vcount'];
                    }
                }
            }
        }
        return $number;
    }

    public function check_dcount($options){
        $optionsKeys = array(
            "iid",
            "token"
        );
        extract(formatOptions($options, $optionsKeys));
        $data = array();
        if (optionExists($iid) and optionExists($token)) {
            $list = $this->WxVoteItem_model->where(array("id"=>$iid,"token"=>$token))->get_item();
            if(!empty($list)){
                $data['dcount'] = $list['dcount']+1;
                $success = $this->WxVoteItem_model->set($data)->where("id", $iid)->update();
            }
        }
    }

    public function ranking($options){
        $optionsKeys = array(
            "id",
            "iid",
            "token"
        );
        extract(formatOptions($options, $optionsKeys));
        $data = array();
        $ranking = 0;
        if (optionExists($iid) and optionExists($token) and optionExists($id)) {
            $list = $this->WxVoteItem_model->where(array("vid"=>$id))->order_by("dcount", "desc")->get_list();
            if(!empty($list)){
                foreach ($list as $key=>$value){
                    if($value['id']==$iid){
                        $ranking = $key + 1;
                    }
                }
                return $ranking;
            }
        }else{
            return wrrong_msg(MSG_INVALID_ARGUMENTS);
        }
    }

    /**
     * 修改状态
     * @param array $options
     * @return array
     */
    public function editStatus($options = array()){
        $optionsKeys = array(
            "id",
            "status"
        );
        extract(formatOptions($options, $optionsKeys));
        $data = array();
        if (!$id) {
            return wrrong_msg(MSG_INVALID_ARGUMENTS);
        }
        if (optionExists($status)) {
            $data['status'] = $status;
        }

        $success = $this->WxVoteItem_model->where("id", $id)->set($data)->update();
        if (!$success) {
            return wrrong_msg(MSG_SERVICE_BUSY);
        }else{
            return success_msg(MSG_EDIT_SUCCESS);
        }
    }

}
?>