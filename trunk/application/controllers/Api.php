<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->loadService("WxSystem","WxPvUv");
        $this->loadModel("WxSystem");
	}
    public function index()
    {
        define("TOKEN", "weixin");
        $this->valid();
    }

    //pv_uv流量
    public function pv_uv()
    {
        $input['vote_id'] = $this->input->get('vote_id');
        if(empty($input['vote_id'])){
            $input['vote_id'] = 0;
        }
        $input['vote_name'] = $this->input->get('vote_name');
        $input['ip'] = ip();
        $this->WxPvUv_service->addoredit($input);
    }

    public function valid()
    {
        $echoStr = $_GET["echostr"];
//valid signature , option
        if($this->checkSignature())
        {
            echo $echoStr;
            exit;
        }
    }
    private function checkSignature()
    {
// you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = $_GET['token'];
//        $token = "xQUwDMDg7uVeNek1uz";
        $tmpArr = array($token, $timestamp, $nonce);
// use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 记录日志
     * @param $str
     * @param $mode
     */
    public function write_log($str)
    {
        $mode = 'a';//追加方式写
        $file = "Apilog.txt";
        $oldmask = @umask(0);
        $fp = @fopen($file, $mode);
        @flock($fp, 3);
        if (!$fp) {
            Return false;
        } else {
            @fwrite($fp, $str);
            @fclose($fp);
            @umask($oldmask);
            Return true;
        }
    }
}
