<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vote extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->loadService("WxVote","WxVoteItem","WxSystem");
        $this->loadModel("WxVote","WxVoteItem");
        $this->load->library("Jssdk");
	}

	public function index() {
        $rows = 10;
        $token = $this->input->get('token');
        $wxSystem = $this->WxSystem_model->where('wxs_token',$token)->get_item();
        if(!empty($wxSystem)){
            $jssdk = new jssdk($wxSystem['wxs_app_id'], $wxSystem['wxs_app_secret'], $token);
            $signPackage = $jssdk->GetSignPackage();
            $this->assign("signPackage", $signPackage);
        }
        $page = $this->input->get('page')?$this->input->get('page'):0;
        $id = $this->input->get('id');
        $BM = 0;
        if(empty($token) and empty($id)){
            alert(MSG_INVALID_ARGUMENTS,"/Layout/index1");
        }
        $vote= $this->WxVote_model->where(array("token"=>$token,"id"=>$id))->get_item();
        $vote_items= $this->WxVoteItem_service->get_list(array("vid"=>$id,"rows"=>$rows,"page"=>$page+1,"order"=>'addtime'));
        if(empty($vote)){
            alert(MSG_INVALID_ARGUMENTS,"/Layout/index");
        }

        $vote_ycount= $this->WxVoteItem_model->where(array("vid"=>$id))->count();
        $vote_tcount= $this->WxVoteItem_service->total_sum($id);
        if($vote['start_time']<=time() and $vote['over_time']>=time()){
            $BM = 1;
        }

        $this->assign("vote_ycount", $vote_ycount);
        $this->assign("vote_tcount", $vote_tcount);
        $this->assign("moban", $vote['moban']);
        $this->assign("xncheck", $vote['xncheck']+$vote['check']);
        $this->assign("vote", $vote);
        $this->assign("vote_items", $vote_items);
        $this->assign("BM", $BM);
        $this->assign("page", $page);
		$this->view(config_item("style") . '/vote/index');
	}

	//排名
	public function top(){
        $rows = 10;
        $token = $this->input->get('token');
        $page = $this->input->get('page')?$this->input->get('page'):0;
        $id = $this->input->get('id');
        $BM = 0;
        if(empty($token) and empty($id)){
            alert(MSG_INVALID_ARGUMENTS,"/Layout/index");
        }
        $vote= $this->WxVote_model->where(array("token"=>$token,"id"=>$id))->get_item();
        $vote_items= $this->WxVoteItem_service->get_list(array("vid"=>$id,"rows"=>$rows,"page"=>$page+1,"order"=>'dcount+vcount'));
        if(empty($vote)){
            alert(MSG_INVALID_ARGUMENTS,"/Layout/index");
        }
        $wxSystem = $this->WxSystem_model->where('wxs_token',$token)->get_item();
        if(!empty($wxSystem)){
            $jssdk = new jssdk($wxSystem['wxs_app_id'], $wxSystem['wxs_app_secret'], $token);
            $signPackage = $jssdk->GetSignPackage();
            $this->assign("signPackage", $signPackage);
        }

        $vote_ycount= $this->WxVoteItem_model->where(array("vid"=>$id))->count();
        $vote_tcount= $this->WxVoteItem_service->total_sum($id);
        if($vote['start_time']<=time() and $vote['over_time']>=time()){
            $BM = 1;
        }

        $this->assign("vote_ycount", $vote_ycount);
        $this->assign("vote_tcount", $vote_tcount);
        $this->assign("moban", $vote['moban']);
        $this->assign("xncheck", $vote['xncheck']+$vote['check']);
        $this->assign("vote", $vote);
        $this->assign("vote_items", $vote_items);
        $this->assign("BM", $BM);
        $this->assign("page", $page);
        $this->view(config_item("style") . '/vote/top');
    }

	//报名页面
	public function enroll(){
        $token = $this->input->get('token');
        $id = $this->input->get('id');
        $vote= $this->WxVote_model->where(array("token"=>$token,"id"=>$id))->get_item();
        $wxSystem = $this->WxSystem_model->where('wxs_token',$token)->get_item();
        if(!empty($wxSystem)){
            $jssdk = new jssdk($wxSystem['wxs_app_id'], $wxSystem['wxs_app_secret'], $token);
            $signPackage = $jssdk->GetSignPackage();
            $this->assign("signPackage", $signPackage);
        }
        $vote_ycount= $this->WxVoteItem_model->where(array("vid"=>$id))->count();
        $vote_tcount= $this->WxVoteItem_service->total_sum($id);

        $this->assign("vote_ycount", $vote_ycount);
        $this->assign("vote_tcount", $vote_tcount);
        $this->assign("moban", $vote['moban']);
        $this->assign("vote", $vote);
        $this->assign("xncheck", $vote['xncheck']+$vote['check']);
        $this->view(config_item("style") . '/vote/enroll');
    }

    //报名
    public function enrollPost(){
        $token = $this->input->post('token');
        $id = $this->input->post('vid');
        $input = $this->input->post(NULL);
        if (!empty($input) and $input['signup']=='确认报名') {
            if(!empty($input['fileup'])){
                $input['startpicurl'] = $this->upload($input['fileup'],1);
                $input['startpicurl2'] = $this->upload($input['fileup'],2);
                $input['startpicurl3'] = $this->upload($input['fileup'],3);
                $input['startpicurl4'] = $this->upload($input['fileup'],4);
                $input['startpicurl5'] = $this->upload($input['fileup'],5);
            }else{
                $input['startpicurl'] = NULL;
                $input['startpicurl2'] = NULL;
                $input['startpicurl3'] = NULL;
                $input['startpicurl4'] = NULL;
                $input['startpicurl5'] = NULL;
            }
            $success = $this->WxVoteItem_service->addoredit($input);
            if($success['success']){
                alert($success['msg'],"/vote/index?token={$token}&id={$id}");
            }else{
                alert($success['msg']);
            }

        }else{
            alert('提交失败', "/vote/index?token={$token}&id={$id}");
        }


    }

	//投票详情
	public function details(){
        $token = $this->input->get('token');
        $id = $this->input->get('id');
        $iid = $this->input->get('iid');
        $vote= $this->WxVote_model->where(array("token"=>$token,"id"=>$id))->get_item();
        $vote_items= $this->WxVoteItem_model->where('id',$iid)->get_item();
        $ranking = $this->WxVoteItem_service->ranking(array("id"=>$id,"token"=>$token,"iid"=>$iid));
        $wxSystem = $this->WxSystem_model->where('wxs_token',$token)->get_item();
        if(!empty($wxSystem)){
            $jssdk = new jssdk($wxSystem['wxs_app_id'], $wxSystem['wxs_app_secret'], $token);
            $signPackage = $jssdk->GetSignPackage();
            $this->assign("signPackage", $signPackage);
        }

        $this->assign("a", 1);
        $this->assign("xncheck", $vote['xncheck']+$vote['check']);
        $this->assign("ranking", $ranking);
        $this->assign("vote", $vote);
        $this->assign("vote_items", $vote_items);
        $this->assign("moban", $vote['moban']);
        $this->view(config_item("style") . '/vote/details');
    }

    //浏览量
    public function ajax_pv(){
        $array = array();
        $input['id'] = $this->input->get('id');
        $input['token'] = $this->input->get('token');
        $this->WxVote_service->check_num($input);
    }

    //投票接口
    public function ajax_dcount(){
        $array = array();
        $input['iid'] = $this->input->get('iid');
        $input['id'] = $this->input->get('id');
        $input['token'] = $this->input->get('token');
        $res = $this->WxVote_service->record($input);
        if($res['success']){
            alert('投票成功',"/vote/details?token={$input['token']}&id={$input['id']}&iid={$input['iid']}");
        }else{
            alert($res['msg'],"/vote/details?token={$input['token']}&id={$input['id']}&iid={$input['iid']}");
        }
    }

    //图片上传
    public function upload($fileup = NULL, $num){
        if(empty($fileup)){
            return NULL;
        }
        $num = $num - 1;
        foreach ($fileup as $key=>$value){
            if($key==$num){
                $base_img = $value;
            }
        }
        if(empty($base_img)){
            return NULL;
        }
        //  $base_img是获取到前端传递的src里面的值，也就是我们的数据流文件
        $base_img = str_replace('data:image/jpg;base64,', '', $base_img);
        //  设置文件路径和文件前缀名称
        $path = FCPATH . "data/uploads/vote/";
        $prefix='nx_';
        $output_file = $prefix.time().rand(100,999).'.jpg';
        $path = $path.$output_file;
        //  创建将数据流文件写入我们创建的文件内容中
        $ifp = fopen( $path, "wb" );
        fwrite( $ifp, base64_decode( $base_img) );
        fclose( $ifp );

//        return $this->config->config['server_url'].$img;
        return $path;
    }

}
