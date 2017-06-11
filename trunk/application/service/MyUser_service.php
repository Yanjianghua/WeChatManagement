<?php
class MyUser_service extends MY_Service {
	const MSG_USERNAME_NOT_NULL = "用户名不能为空";
	const MSG_USERNAME_IS_EXISTS = "用户名已存在";
	const MSG_PASSWORD_NOT_NULL = "密码不能为空";
	const MSG_RID_NOT_NULL = "用户组不能为空";
	const MSG_BUILT = "内置用户不可进行此操作";

	public function __construct() {
		parent::__construct();
		$this->loadModel("MyUser","MyUserGroup","MySysLog");
	}

	public function addoredit($options = array()) {
		$optionsKeys = array(
			"user_id",
			"user_name",
			"password",
			"password_verity",
			"real_name",
			"email",
			"mobile",
			"user_group",
			"status"
		);
		extract(formatOptions($options, $optionsKeys));

		$data = array();

		if (optionExists($user_name)) {
			$data['user_name'] = $user_name;
		}

		if (optionExists($password) and optionExists($password_verity) and $password==$password_verity) {
			$data['password'] = password($password);
		}

		if (optionExists($real_name)) {
			$data['real_name'] = $real_name;
		}

		if (optionExists($email)) {
			$data['email'] = $email;
		}

		if (optionExists($mobile)) {
			$data['mobile'] = $mobile;
		}

		if (optionExists($user_group)) {
			$data['user_group'] = $user_group;
		}
		if (optionExists($status)) {
			if ($status) {
				$data['status'] = MyUser_model::STATUS_YES;
			} else {
				$data['status'] = MyUser_model::STATUS_NO;
			}
		}

		if ($user_id) {
			if (!$this->editable($user_id)) {
				return wrrong_msg(self::MSG_BUILT);
			}
			$success = $this->MyUser_model->where("user_id", $user_id)->set($data)->update();
		} else {
			if (empty($user_name)) {
				return wrrong_msg(self::MSG_USERNAME_NOT_NULL);
			}
            $user = $this->MyUser_model->where("user_name",$user_name)->get_list();
            if($user){
                return wrrong_msg(self::MSG_USERNAME_IS_EXISTS);
            }
			if (empty($password)) {
				return wrrong_msg(self::MSG_PASSWORD_NOT_NULL);
			}
			if (empty($user_group)) {
				return wrrong_msg(self::MSG_RID_NOT_NULL);
			}
			$success = $this->MyUser_model->set($data)->insert();
		}

		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
		if($user_id){
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_User",
                "class_obj"=>"edit",
                "result"=>"后台用户".$real_name."信息修改成功",
                "op_time"=>time()
            ))->insert();
            return success_msg(MSG_EDIT_SUCCESS);
        }else{
            $this->MySysLog_model->set(array(
                "user_name"=>$this->login_user['user_name'],
                "action"=>"IP地址: ".ip(),
                "class_name"=>"Admin_User",
                "class_obj"=>"add",
                "result"=>"后台用户".$real_name."信息添加成功",
                "op_time"=>time()
            ))->insert();
            return success_msg(MSG_ADD_SUCCESS);
        }
	}

	/**
	 * 检测是否为内置用户
	 * @param $id	用户ID
	 * @return bool
	 */
	public function editable($id) {
        if ($id == MyUser_model::BUILT_ID) {
			return false;
		}
		return true;
	}

	/**
	 * 获取列表
	 * @param unknown $options	数组
	 * @return multitype:NULL string
	 */
	public function get_list($options = array()) {
		$optionsKeys = array(
			"user_id",
			"status",
			"user_name",
			"rows",
			"page"
		);
		extract(formatOptions($options, $optionsKeys));

		$where = array();
		$result = array();

		if (optionExists($user_id)) {
			$where['user_id'] = $user_id;
		}
		//是否启用
		if (optionExists($status)) {
			$where['status'] = $status;
		}
		//username模糊查询
		if (optionExists($user_name)) {
			$where['user_name like'] = "%{$user_name}%";
		}

		//分页
		if (optionExists($rows) && optionExists($page)) {
			$result['total'] = $this->MyUser_model->where($where)->count();
			$page = max($page, 1);
			$offset = ($page - 1) * $rows;
			$this->MyUser_model->limit($rows, $offset);
		}
		//获取列表
		$list = $this->MyUser_model->where($where)->get_list();
		//获取用户组
		foreach ($list as $k => $v) {
			$role = $this->MyUserGroup_model->where("group_id",$v['user_group'])->get_list();
			if (!empty($role)) {
				$list[$k]['role'] = $role;
				$list[$k]['rolename'] = $role[0]['group_name'];
				$list[$k]['logintime'] = date("Y-m-d H:i:s",$v['login_time']);
			}
		}
		$result['rows'] = $list;
		return $result;
	}

	/**
	 *	删除内容
	 */
	public function delete($options = array()) {
		$optionsKeys = array("user_id");
		extract(formatOptions($options, $optionsKeys));
		if (!$user_id) {
			return wrrong_msg(MSG_INVALID_ARGUMENTS);
		}
		if (!$this->editable($user_id)) {
			return wrrong_msg(self::MSG_BUILT);
		}

		$success = $this->MyUser_model->where("user_id", $user_id)->delete();
		if (!$success) {
			return wrrong_msg(MSG_SERVICE_BUSY);
		}
        $this->MySysLog_model->set(array(
            "user_name"=>$this->login_user['user_name'],
            "action"=>"IP地址: ".ip(),
            "class_name"=>"Admin_User",
            "class_obj"=>"del",
            "result"=>"后台用户ID为".$user_id."删除成功",
            "op_time"=>time()
        ))->insert();
		return success_msg(MSG_DELETE_SUCCESS);

	}

}
?>