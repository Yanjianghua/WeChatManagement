<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class WxVote_model extends MY_Model {
	const HIDE_YES = 1;
	const HIDE_NO = 0;
	const BUILT_YES = 1;
	const BUILT_NO = 0;
	const STATUS_YES = 1;
	const STATUS_NO = 0;

    public static $moban = array(
        array(
            "group_id"=>1,
            "group_name"=>"粉色系",
        ),
        array(
            "group_id"=>3,
            "group_name"=>"草绿系",
        ),
        array(
            "group_id"=>4,
            "group_name"=>"淡蓝系",
        ),
        array(
            "group_id"=>5,
            "group_name"=>"土豪金",
        ),
        array(
            "group_id"=>6,
            "group_name"=>"黄色系",
        ),
        array(
            "group_id"=>7,
            "group_name"=>"深粉系",
        ),
        array(
            "group_id"=>8,
            "group_name"=>"清新系",
        )
    );

	public static $_table = 'wx_vote';

	public function __construct() {
		parent::__construct();
	}

}
