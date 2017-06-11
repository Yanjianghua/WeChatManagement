<?php
class WxVote_service extends MY_Service {
	const MSG_USERNAME_NOT_NULL = "标题不能为空";
	const MSG_USERNAME_IS_EXISTS = "标题已存在";
	const MSG_COUNT_TRY = "投票已达上限，请明天再投";

	public function __construct() {
		parent::__construct();
		$this->loadModel("MyUser","WxSystem","MySysLog","WxVote","WxVoteRecord");
        $this->loadService("WxVoteRecord");
	}

	public function addoredit($options = array()) {
		$optionsKeys = array(
			"id",
			"moban",
			"title",
			"fxms",
			"ydgzts",
			"wxgzurl",
			"tpnub",
			"ipnubs",
			"btcdxz",
			"statdate",
			"enddate",
			"start_time",
			"over_time",
			"keyword",
			"token",
			"shuma",
			"shumat",
			"shumb",
			"shumbt",
			"shumc",
			"shumct",
			"check",
			"picurl",
			"wappicurl",
			"xntps",
			"xncheck",
			"xnbms",
			"status"
		);
		extract(formatOptions($options, $optionsKeys));

		$data = array();

		if (optionExists($id)) {
			$data['id'] = $id;
		}

		if (optionExists($moban)) {
			$data['moban'] = $moban;
		}

		if (optionExists($title)) {
			$data['title'] = $title;
		}

		if (optionExists($fxms)) {
			$data['fxms'] = $fxms;
		}

		if (optionExists($ydgzts)) {
			$data['ydgzts'] = $ydgzts;
		}

		if (optionExists($wxgzurl)) {
			$data['wxgzurl'] = $wxgzurl;
		}

		if (optionExists($tpnub)) {
			$data['tpnub'] = $tpnub;
		}

		if (optionExists($ipnubs)) {
			$data['ipnubs'] = $ipnubs;
		}

		if (optionExists($btcdxz)) {
			$data['btcdxz'] = $btcdxz;
		}

		if (optionExists($statdate)) {
			$data['statdate'] = strtotime($statdate);
		}

		if (optionExists($enddate)) {
			$data['enddate'] = strtotime($enddate);
		}

		if (optionExists($start_time)) {
			$data['start_time'] = strtotime($start_time);
		}

		if (optionExists($over_time)) {
			$data['over_time'] = strtotime($over_time);
		}

		if (optionExists($keyword)) {
			$data['keyword'] = $keyword;
		}

		if (optionExists($token)) {
			$data['token'] = $token;
		}else{
            $data['token'] = $this->login_user['token'];
        }

		if (optionExists($shuma)) {
			$data['shuma'] = $shuma;
		}

		if (optionExists($shumat)) {
			$data['shumat'] = $shumat;
		}

		if (optionExists($shumb)) {
			$data['shumb'] = $shumb;
		}

		if (optionExists($shumbt)) {
			$data['shumbt'] = $shumbt;
		}

		if (optionExists($shumc)) {
			$data['shumc'] = $shumc;
		}

		if (optionExists($shumct)) {
			$data['shumct'] = $shumct;
		}

		if (optionExists($check)) {
			$data['check'] = $check;
		}

		if (optionExists($picurl)) {
			$data['picurl'] = $picurl;
		}

		if (optionExists($wappicurl)) {
			$data['wappicurl'] = $wappicurl;
		}

		if (optionExists($xntps)) {
			$data['xntps'] = $xntps;
		}

		if (optionExists($xncheck)) {
			$data['xncheck'] = $xncheck;
		}

		if (optionExists($xnbms)) {
			$data['xnbms'] = $xnbms;
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
		if ($id) {
			$success = $this->WxVote_model->where("id", $id)->set($data)->update();
		} else {
			if (empty($title)) {
				return wrrong_msg(self::MSG_USERNAME_NOT_NULL);
			}
            $vote = $this->WxVote_model->where("title",$title)->get_list();
            if($vote){
                return wrrong_msg(self::MSG_USERNAME_IS_EXISTS);
            }
			$success = $this->WxVote_model->set($data)->insert();
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
                "result"=>"后台投票：".$title."信息修改成功",
                "op_time"=>time()
            ))->insert();
            return success_msg(MSG_EDIT_SUCCESS);
        }else{
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_WxVote",
                "class_obj"=>"add",
                "result"=>"后台投票".$title."信息添加成功",
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
			"title",
            "keyword",
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
		if (optionExists($title)) {
			$where['title like'] = "%{$title}%";
		}
		if (optionExists($keyword)) {
			$where['keyword like'] = "%{$keyword}%";
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

		$success = $this->WxVote_model->where("id", $id)->delete();
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

    /**
     * 浏览量
     * @param $options
     */
	public function check_num($options){
        $optionsKeys = array(
            "id",
            "token"
        );
        extract(formatOptions($options, $optionsKeys));
        $data = array();
        if (optionExists($id) and optionExists($token)) {
            $list = $this->WxVote_model->where(array("id"=>$id,"token"=>$token))->get_item();
            if(!empty($list)){
                $data['check'] = $list['check']+1;
                $success = $this->WxVote_model->set($data)->where("id", $id)->update();
            }
        }
    }

    /**
     * 投票信息
     * @param $options
     */
	public function record($options){
        $optionsKeys = array(
            "id",
            "iid",
            "token"
        );
        extract(formatOptions($options, $optionsKeys));
        $data = array();
        $data_record = array();
        if (optionExists($id) and optionExists($token) and optionExists($iid)) {
            $ip = ip();
            $address = "";
            $king = 0;
            $vote = $this->WxVote_model->where(array("id"=>$id,"token"=>$token))->get_item();
            $vote_item = $this->WxVoteItem_model->where(array("id"=>$iid,"vid"=>$id))->get_item();
            $record = $this->WxVoteRecord_model->where(array("vid"=>$id,"item_id"=>$iid,"token"=>$token,"ip"=>$ip))->get_item();
            if(!empty($record)){
                if($record['touched'] >= $vote['ipnubs']){
                    return wrrong_msg(self::MSG_COUNT_TRY);
                }else{
                    $data_record['touched'] = $record['touched'] + 1;
                    $success = $this->WxVoteRecord_model->set($data_record)->where("id", $record['id'])->update();
                    $king = 1;
                }
            }else{
                $data_record['vid'] = $id;
                $data_record['item_id'] = $iid;
                $data_record['user_id'] = 0;
                $data_record['wecha_id'] = $id;//待完善
                $data_record['token'] = $token;
                $data_record['ip'] = $ip;
                if(!empty($ip)){
                    $city = getCity($ip);
                    if(!empty($city)){
                        $address = $city['country'] . $city['city'] ;
                    }
                }
                $data_record['address'] = $address;
                $success = $this->WxVoteRecord_service->addoredit($data_record);
                $king = 1;
            }
            if(!empty($vote_item) and $king != 0){
                $data['dcount'] = $vote_item['dcount']+1;
                $success = $this->WxVoteItem_model->set($data)->where("id", $iid)->update();
            }
            if(!$success){
                return wrrong_msg(MSG_SERVICE_BUSY);
            }
            return success_msg(MSG_DELETE_SUCCESS);
        }
        return wrrong_msg(MSG_INVALID_ARGUMENTS);

    }



}
?>