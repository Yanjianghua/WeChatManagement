<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-07 13:55:20
         compiled from "/Library/WebServer/Documents/weixin/trunk/application/views/default/vote/details.html" */ ?>
<?php /*%%SmartyHeaderCode:9903830305931305bcb61d1-13102726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c785d73d711451503dc9b77ffa4ecc62b98f309' => 
    array (
      0 => '/Library/WebServer/Documents/weixin/trunk/application/views/default/vote/details.html',
      1 => 1496652432,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9903830305931305bcb61d1-13102726',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5931305bd01f89_40400120',
  'variables' => 
  array (
    'vote_items' => 0,
    'vote' => 0,
    'moban' => 0,
    'ranking' => 0,
    'a' => 0,
    'signPackage' => 0,
    'server_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5931305bd01f89_40400120')) {function content_5931305bd01f89_40400120($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=uft-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta charset="uft-8">
    <title>我是<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['name'];?>
 编号:<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['id'];?>
,正在参加<?php echo $_smarty_tpl->tpl_vars['vote']->value['title'];?>
,快来帮我投票吧!</title>
    <meta name="description" content="{iMicms:$vote['title']}">
    <link rel="stylesheet" href="/statics/vote/index<?php echo $_smarty_tpl->tpl_vars['moban']->value;?>
/touch.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="/statics/vote/index<?php echo $_smarty_tpl->tpl_vars['moban']->value;?>
/jquery-2.1.3.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript" src="/statics/vote/index<?php echo $_smarty_tpl->tpl_vars['moban']->value;?>
/app.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/statics/vote/index<?php echo $_smarty_tpl->tpl_vars['moban']->value;?>
/jquery.masonry.min.js"><?php echo '</script'; ?>
>
    <style>
        .slider{display:none;}
        .focus span{width:5px;height:5px;margin-left:5px;border-radius:50%;background:#CDCDCD;font-size:0}
        .focus span.current{background:red;}

        #mcover {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            z-index: 20000;
        }
        #mcover img {
            position: fixed;
            right: 18px;
            top: 5px;
            width: 260px!important;
            height: 180px!important;
            z-index: 20001;
        }


        .guide-close:after{content:'';position:absolute;left:50%;bottom:18px;width:20px;height:20px;background:url("/statics/ico-close.png") no-repeat;-webkit-background-size:100% auto;-moz-background-size:100% auto;background-size:100% auto;opacity:.55}
    </style>

    <style>
        /*音乐图标*/
        #audio_btn {
            position: absolute;
            right: 10px;
            top: 18px;
            z-index: 200;
            display: none;
            width: 50px;
            height: 50px;
            background-repeat: no-repeat;
            cursor: pointer;
        }
        .loading_background {
            background-image: url(/statics/media/image/music_loading.gif);
            background-size: 30px 30px;
            opacity: 0.5;
            background-position: center center;
        }
        .loading_yinfu {
            position: absolute;
            left: 10px;
            top: 10px;
            width: 30px;
            height: 30px;
            background-image: url(/statics/media/image/music_yinfu.png);
            background-repeat: no-repeat;
            background-position: center center;
        }
        .play_yinfu {
            background-image: url(/statics/media/image/music.gif);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 60px 60px;
        }
        .rotate {
            position: absolute;
            left: 10px;
            top: 10px;
            width: 30px;
            height: 30px;
            background-size: 100% 100%;
            background-image: url(/statics/media/image/music_off.png);
            -webkit-animation: rotating 1.2s linear infinite;
            -moz-animation: rotating 1.2s linear infinite;
            -o-animation: rotating 1.2s linear infinite;
            animation: rotating 1.2s linear infinite;
        }
        @-webkit-keyframes rotating {
            from {
                -webkit-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
            }
        }
        @keyframes rotating {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        @-moz-keyframes rotating {
            from {
                -moz-transform: rotate(0deg);
            }
            to {
                -moz-transform: rotate(360deg);
            }
        }
        .off {
            background-image: url(/statics/media/image/music_no.png);
            background-size: 30px 30px;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>

    <?php echo '<script'; ?>
>
        $(function() {
            var audio = $('#media');
            audio[0].play();
            $("#audio_btn").bind('click', function() {
                $(this).hasClass("off") ? ($(this).addClass("play_yinfu").removeClass("off"), $("#yinfu").addClass("rotate"), $("#media")[0].play()) : ($(this).addClass("off").removeClass("play_yinfu"), $("#yinfu").removeClass("rotate"), $("#media")[0].pause());
            });
        });
        var scroll = document.getElementById("scroll");
        var scroll1 = document.getElementById("scroll1");
        var scroll2 = document.getElementById("scroll2");
        scroll2.innerHTML=document.getElementById("scroll1").innerHTML;
        function Marquee(){
            if(scroll.scrollLeft-scroll2.offsetWidth>=0){
                scroll.scrollLeft-=scroll1.offsetWidth;
            }
            else{
                scroll.scrollLeft++;
            }
        }
        var myvar=setInterval(Marquee,30);
        scroll.onmouseout=function (){myvar=setInterval(Marquee,30);}
        scroll.onmouseover=function(){clearInterval(myvar);}
    <?php echo '</script'; ?>
>

</head>
<body>
<div class="video_exist play_yinfu" id="audio_btn" style="display: block;">
    <div id="yinfu" class="rotate"></div>
    <audio preload="auto" autoplay id="media" src="<?php echo $_smarty_tpl->tpl_vars['vote']->value['music'];?>
" loop></audio>
</div>


<header>
    <div class="m_head clearfix">
        <notempty name="ggduotu">
            <img src="<?php echo $_smarty_tpl->tpl_vars['vote']->value['picurl'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['vote']->value['title'];?>
" width="640px" height="450px"/>
            <img src="<?php echo $_smarty_tpl->tpl_vars['vote']->value['picurl'];?>
" alt="广告招租" width="640px" height="80px"/>
        </notempty>



    </div>
</header>

<section class="content" id="get_info" data-rid="503" data-sort="" data-kw="" data-page="">
    <div class="detial_box">
        <span class="closed close_detial_box" data-refer="1">&nbsp;</span>
        <p class="num clearfix">
            <span class="fl" id="baby_info" itid_id="<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['id'];?>
" data-rule_id="503" data-vote_num="<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['vote_items']->value['status']==0) {?>审核中<?php } elseif ($_smarty_tpl->tpl_vars['vote_items']->value['status']==2) {?>已锁定<?php }?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['id'];?>
号&nbsp;<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['name'];?>
</span>
            <span class="fr">排名：<?php echo $_smarty_tpl->tpl_vars['ranking']->value;?>
&nbsp;&nbsp;&nbsp;&nbsp; 票数：<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['dcount']+$_smarty_tpl->tpl_vars['vote_items']->value['vcount'];?>
</span>
        </p>
        <div class="blank10"></div>
        <p>作品简介：<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['intro'];?>
</p>
        <div class="blank10"></div>
        <?php if (!empty($_smarty_tpl->tpl_vars['vote_items']->value['startpicurl'])) {?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['startpicurl'];?>
" alt="">
        <?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['vote_items']->value['startpicurl2'])) {?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['startpicurl2'];?>
" alt="">
        <?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['vote_items']->value['startpicurl3'])) {?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['startpicurl3'];?>
" alt="">
        <?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['vote_items']->value['startpicurl4'])) {?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['startpicurl4'];?>
" alt="">
        <?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['vote_items']->value['startpicurl5'])) {?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['startpicurl5'];?>
" alt="">
        <?php }?>

    </div>
    <div class="blank10"></div>
    <div id="mcover" class="guide-close" onClick="$(this).hide()"  >
        <!--<img src="/statics/guide.png" />-->
    </div>
    <div class="abtn_box">
        <?php if ($_smarty_tpl->tpl_vars['vote_items']->value['status']==1) {?>
            <a href="/vote/ajax_dcount?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
&iid=<?php echo $_smarty_tpl->tpl_vars['vote_items']->value['id'];?>
" class="a_btn " id="" data-itid="">我要投票</a>
        <?php }?>
        <a href="javascript:void(0)" onclick="$('#mcover').show()" class="a_btn" >帮TA拉票</a>
        <?php if ($_smarty_tpl->tpl_vars['a']->value) {?>
            <a href="/vote/signup?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
))}" class="a_btn canjia">我也来参加</a>
        <?php }?>
        <a href="/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
" class="a_btn look">点击查看更多</a>
    </div>
</section>
<section class="rules">
    <div class="text">
        <?php if (!empty($_smarty_tpl->tpl_vars['vote']->value['shumat'])) {?>
        <div class="prize"><?php echo $_smarty_tpl->tpl_vars['vote']->value['shuma'];?>
</div>
        <div class="neirong"><?php echo $_smarty_tpl->tpl_vars['vote']->value['shumat'];?>
</div>
        <?php }?>
    </div>
    <div class="text">
        <?php if (!empty($_smarty_tpl->tpl_vars['vote']->value['shumbt'])) {?>
        <div class="prize"><?php echo $_smarty_tpl->tpl_vars['vote']->value['shumb'];?>
</div>
        <div class="neirong"><?php echo $_smarty_tpl->tpl_vars['vote']->value['shumbt'];?>
</div>
        <?php }?>
    </div>
    <div class="text">
        <?php if (!empty($_smarty_tpl->tpl_vars['vote']->value['shumct'])) {?>
        <div class="prize"><?php echo $_smarty_tpl->tpl_vars['vote']->value['shumc'];?>
</div>
        <div class="neirong"><?php echo $_smarty_tpl->tpl_vars['vote']->value['shumbt'];?>
</div>
        <?php }?>
    </div>
    <div style=" height:25px; width:100%; display:block;"></div>
</section>
<div class="bottom_khdxz" style="display:none">
    <a href="" class="footer-logo deyi-logo"><br></a>
    <a href="" class="footer-logo wft-logo"><br></a>
    <span class="bottom_khdxz_close"><i>&nbsp;</i></span>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $(".close_detial_box").on('click',function(){
            window.location.href = "/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
";
        });
    });
<?php echo '</script'; ?>
>

<link rel="stylesheet" type="text/css" href="/statics/vote/index2/daohang.css">

<div class="bot_main">
    <ul>
        <li class="ico_1"><span class="ico"><img src="/statics/vote//index2/i1.png" /></span><span class="txt">首页</span></li>
        <li class="ico_2"><span class="ico"><img src="/statics/vote//index2/i3.png" /></span><span class="txt">排名</span></li>
        <li class="ico_3"><span class="ico"><img src="/statics/vote//index2/i11.png" /></span><span class="txt"><notempty name='ishavezp' >我的<else/>报名</notempty></span></li>
        <if condition="$user['tpjl']==1 && $user['tpjlnum'] gt 0 && $user['gldzpid'] neq 0" >
            <li class="ico_4"><span class="ico"><img src="/statics/vote/index2/i4.png" /></span><span class="txt">免费抽奖</span></li>
            <else/>
            <li class="ico_4"><span class="ico"><img src="/statics/vote/index2/i4.png" /></span><span class="txt">{iMicms:$user.dbdhm}</span></li>
        </if>
    </ul>
</div>


<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $("#toupiaook").on('click',function(){
            window.location.href = "{iMicms::U('Vote/detail',array('token'=>$token,'id'=>$id,'zid'=>$zpinfo['id']))}";
        });
        $("#toupiaook2").on('click',function(){
            window.location.href = "{iMicms::U('Vote/detail',array('token'=>$token,'id'=>$id,'zid'=>$zpinfo['id']))}";
        });
    });

    $('.ico_1').on('click', function(){
        location.href = "/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
";
    });
    $('.ico_2').on('click', function(){
        location.href = "/vote/top?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
";
    });
    $('.ico_3').on('click', function(){
        location.href = "/vote/enroll?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
";
    });
    $('.ico_4').on('click', function(){
        location.href = "/vote/top?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
";
    });
    $.ajax({
        url: "/vote/ajax_pv?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
",
        method: 'post',
        dataType: 'json',
        data: {},
        success:function () {
        }
    });

<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value["appId"];?>
', // 必填，公众号的唯一标识
        timestamp: "<?php echo $_smarty_tpl->tpl_vars['signPackage']->value['timestamp'];?>
", // 必填，生成签名的时间戳
        nonceStr: '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value["nonceStr"];?>
', // 必填，生成签名的随机串
        signature: '<?php echo $_smarty_tpl->tpl_vars['signPackage']->value["signature"];?>
',// 必填，签名，见附录1
        jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });

    wx.ready(function(){
        wx.error(function(res){
            console.log(res);
        });
        //朋友圈
        wx.onMenuShareTimeline({
            title: "<?php echo $_smarty_tpl->tpl_vars['vote']->value['title'];?>
", // 分享标题
            link: "<?php echo $_smarty_tpl->tpl_vars['server_url']->value;?>
/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
", // 分享链接
            imgUrl: "<?php echo $_smarty_tpl->tpl_vars['vote']->value['wappicurl'];?>
", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });

        //分享给朋友
        wx.onMenuShareAppMessage({
            title: "<?php echo $_smarty_tpl->tpl_vars['vote']->value['title'];?>
", // 分享标题
            desc: "<?php echo $_smarty_tpl->tpl_vars['vote']->value['fxms'];?>
", // 分享描述
            link: "/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
", // 分享链接
            imgUrl: "<?php echo $_smarty_tpl->tpl_vars['vote']->value['wappicurl'];?>
", // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
    });
<?php echo '</script'; ?>
>

</body>
</html><?php }} ?>
