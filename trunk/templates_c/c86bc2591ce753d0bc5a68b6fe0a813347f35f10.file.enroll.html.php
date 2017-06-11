<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-07 13:59:03
         compiled from "/Library/WebServer/Documents/weixin/trunk/application/views/default/vote/enroll.html" */ ?>
<?php /*%%SmartyHeaderCode:95308320059351b4124a095-65933249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c86bc2591ce753d0bc5a68b6fe0a813347f35f10' => 
    array (
      0 => '/Library/WebServer/Documents/weixin/trunk/application/views/default/vote/enroll.html',
      1 => 1496815099,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95308320059351b4124a095-65933249',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59351b41285b75_39483125',
  'variables' => 
  array (
    'vote' => 0,
    'moban' => 0,
    'vote_ycount' => 0,
    'vote_tcount' => 0,
    'xncheck' => 0,
    'signPackage' => 0,
    'server_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59351b41285b75_39483125')) {function content_59351b41285b75_39483125($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=uft-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta charset="uft-8">
    <title><?php echo $_smarty_tpl->tpl_vars['vote']->value['title'];?>
</title>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['vote']->value['title'];?>
">
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
    </style>

</head>
<body>
<header>
    <img src="<?php echo $_smarty_tpl->tpl_vars['vote']->value['picurl'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['vote']->value['title'];?>
" width="640px" height="450px"/>
    <img src="<?php echo $_smarty_tpl->tpl_vars['vote']->value['picurl'];?>
" alt="广告招租" width="640px" height="80px"/>
    <div class="m_head clearfix">

        <div class="num_box">
            <if condition="$ishavezp eq 1"><a href="{iMicms::U('Vote/detail',array('token'=>$token,'id'=>$id,'zid'=>$havezpid))}" class="join_us">我的参赛</a>
                <else/>
                <if  condition="$istime eq 1"><a href="{iMicms::U('Vote/signup',array('token'=>$token,'id'=>$id))}" class="join_us">我要报名</a></if></if>
            <ul class="num_box_ul">
                <li>
                    <span class="text">已报名</span>
                    <span><?php echo $_smarty_tpl->tpl_vars['vote_ycount']->value;?>
</span>
                </li>
                <li>
                    <span class="text">投票人次</span>
                    <span><?php echo $_smarty_tpl->tpl_vars['vote_tcount']->value;?>
</span>
                </li>
                <li>
                    <span class="text">浏览量</span>
                    <span><?php echo $_smarty_tpl->tpl_vars['xncheck']->value;?>
</span>
                </li>
            </ul>
            <img src="/statics/vote/index<?php echo $_smarty_tpl->tpl_vars['moban']->value;?>
/mw_004.jpg" />
        </div>
    </div>
</header>

<?php echo '<script'; ?>
 type="text/javascript" src="/statics/vote/js/exif.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/statics/vote/js/binaryajax.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/vbscript">
    Function IEBinary_getByteAt(strBinary, iOffset)
        IEBinary_getByteAt = AscB(MidB(strBinary, iOffset + 1, 1))
    End Function
    Function IEBinary_getBytesAt(strBinary, iOffset, iLength)
      Dim aBytes()
      ReDim aBytes(iLength - 1)
      For i = 0 To iLength - 1
       aBytes(i) = IEBinary_getByteAt(strBinary, iOffset + i)
      Next
      IEBinary_getBytesAt = aBytes
    End Function
    Function IEBinary_getLength(strBinary)
        IEBinary_getLength = LenB(strBinary)
    End Function
    <?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/statics/vote/js/localResizeIMG2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/statics/vote/js/mobileBUGFix.mini.js"><?php echo '</script'; ?>
>

<div class="apply">
    <p>报名处</p>
    <div class="blank10"></div>

    <form action="/vote/enrollPost?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
" id="signupok" method="post" accept-charset="utf-8">

        <input type="hidden" name="vid" value="<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
" />
        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
" />
        <dl class="clearfix">
            <dt>姓名:</dt>
            <dd><input type="text" class="input_txt" id="zpname" value="" name="name" placeholder="请输入姓名:"></dd>
        </dl>
        <dl class="clearfix">
            <dt>微信号:</dt>
            <dd><input type="text" class="input_txt" id="wechat" value="" name="wechat" placeholder="请输入微信号:"></dd>
        </dl>
        <dl class="clearfix">
            <dt>联系电话:</dt>
            <dd><input type="number" class="input_txt" value="" name="tourl" id="telphone" placeholder="请输入您的真实手机号"></dd>
        </dl>
        <dl class="upload clearfix">
            <dt>上传照片<br>1-5张:</dt>
            <dd class="upload_area clearfix">
                <ul id="imglist" class="post_imglist"></ul>
                <div class="upload_btn">
                    <input type="file" id="upload_image" value="图片上传" accept="image/jpeg,image/gif,image/png" capture="camera">
                </div>
            </dd>
        </dl>
        <dl class="clearfix">
            <dt>参赛宣言:</dt>
            <dd><textarea class="textarea" placeholder="请输入参赛宣言" name="lockinfo" id="content"></textarea></dd>
        </dl>
        <div style="color: #EC6941;font-size: 16px;padding: 0 15px 15px 15px; line-height:24px; font-weight:bolder;"><?php echo $_smarty_tpl->tpl_vars['vote']->value['wfbmbz'];?>
</div> <!-- 无法报名说明 -->
        <div class="btn_box">
            <input type="submit" name="signup" class="button" value="确认报名">
            <br>
            <input type="button" onclick="javascript:location.href='/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
';" class="button" value="返回首页">
        </div>
        <div class="blank10"></div>
    </form>
</div>
</div>
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
    <div style=" height:60px; width:100%; display:block;"></div>

</section>


<section>
    <!--<if condition="$bmzt eq 1">-->
        <!--<div class="pop" id="guanzhu" style="display:block">-->
            <!--<div class="mengceng"></div>-->
            <!--<div class="pop_up">-->
                <!--<p class="tit_p">报名还未开始</p>-->
                <!--<p class="tit_txt">请{iMicms:$vote[start_time]|date='Y-m-d H:i:s',###}后再来！</p>-->

            <!--</div>-->
        <!--</div>-->
        <!--<elseif condition="$bmzt eq 2"/>-->
        <!--<div class="pop" id="guanzhu" style="display:block">-->
            <!--<div class="mengceng"></div>-->
            <!--<div class="pop_up">-->
                <!--<p class="tit_p">对不起！报名已经结束！</p>-->
            <!--</div>-->
        <!--</div>-->
        <!--<elseif condition="$bmzt eq 3"/>-->
        <!--<div class="pop" id="guanzhu" style="display:block">-->
            <!--<div class="mengceng"></div>-->
            <!--<div class="pop_up">-->
                <!--<p class="tit_p">如何参与活动</p> &lt;!&ndash; 引导关注标题 &ndash;&gt;-->
                <!--<p class="tit_txt">请关注公众号后在投票，扫面一下二维码关注公众号</p>-->
                <!--<a href="{iMicms:$vote.wxgzurl}" class="gz_btn">{iMicms:$user.ydgzan}</a>-->
            <!--</div>-->
        <!--</div>-->
        <!--<else/>-->
    <!--</if>-->
</section>

<div id="console"></div>

<link rel="stylesheet" type="text/css" href="/statics/vote/index2/daohang.css">
<div class="bot_main">
  <ul>
    <li class="ico_1"><span class="ico"><img src="/statics/vote//index2/i1.png" /></span><span class="txt">首页</span></li>
    <li class="ico_2"><span class="ico"><img src="/statics/vote//index2/i3.png" /></span><span class="txt">排名</span></li>
    <li class="ico_3"><span class="ico"><img src="/statics/vote//index2/i11.png" /></span><span class="txt"><notempty name='ishavezp' >我的<else/>报名</notempty></span></li>
    <li class="ico_4"><span class="ico"><img src="/statics/vote/index2/i4.png" /></span><span class="txt">自定义</span></li>
  </ul>
</div>

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

<?php echo '<script'; ?>
 type="text/javascript">
    (function () {
        var viewImg = $("#imglist");
        var imgurl = '';
        var imgcount = 0;
        $('#upload_image').localResizeIMG({
            width: 480,
            quality: 0.8,
            success: function (result) {
                var status = true;
                if (result.height > 1600) {
                    status = false;
                    alert("照片最大高度不超过1600像素");
                }
                if (viewImg.find("li").length > 4) {
                    status = false;
                    alert("最多上传5张照片");
                }
                if (status) {
                    viewImg.append('<li><span class="pic_time"><span class="p_img"></span><em>50%</em></span></li>');
                    viewImg.find("li:last-child").html('<span class="del"></span><img class="wh60" src="' + result.base64 + '"/><input type="hidden" id="file'
                            + imgcount
                            + '" name="fileup[]" value="'
                            + result.clearBase64 + '">');

                    $(".del").on("click",function(){
                        $(this).parent('li').remove();
                        $("#upload_image").show();
                    });
                    imgcount++;
                }
            }
        });
    })();
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function($){
        $("#signupok").submit(function(){
            var name = $("#zpname").val();
            var tel = $("#telphone").val();
            var content = $("#content").val();

            if(name.length == 0){alert('请输入姓名');return false;}

            var telreg = /^1[3|4|5|7|8][0-9]\d{8}$|^\d{8}$/;
            if (tel.length == 0) {alert("请输入您的真实手机号"); return false;}
            if (!telreg.test(tel)){alert("请输入正确的手机号！");return false;}


            var length = $("#imglist").find("li").length;
            if(length == ''|| length == null  || length == undefined || length == 'undefined' || length < 1 ){alert('请上传1张以上图片');return false;}
            if(content== '' || content == null || content == undefined || content == 'undefined' ){alert('请输入参赛宣言');return false;}
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

<?php echo '</script'; ?>
>
<div style="display:none;">
    <?php echo '<script'; ?>
 src="http://s4.cnzz.com/stat.php?id=1257172712&web_id=1257172712" language="JavaScript">
    <?php echo '</script'; ?>
></div>
<notempty name="ggduotu">  <!-- 判断首页幻灯片是否为多图  -->
    <?php echo '<script'; ?>
 type="text/javascript" src="/statics/vote/slider/yxMobileSlider.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(".slider").yxMobileSlider({during:5000,height:{iMicms:$user['hdgd']}});   //height可以设置首页幻灯片高度
        var nowtime=new Date().getTime();
        function _fresh(){
            var endtime=new Date("2015/02/18 12:00:00");//这里设置的时间为2011年，您可以修改为其它时间。
            //var nowtime = new Date();
            var leftsecond=parseInt((endtime.getTime()-nowtime)/1000);
            if(leftsecond<0){leftsecond=0;}
            __d=parseInt(leftsecond/3600/24);
            __h=parseInt((leftsecond/3600)%24);
            __m=parseInt((leftsecond/60)%60);
            __s=parseInt(leftsecond%60);
            var sums=__d+__h+__m+__s;
            var if_Receive="";
            if(sums!=0){
                var d=document.getElementById("_d");
                var h=document.getElementById("_h");
                var m=document.getElementById("_m");
                var s=document.getElementById("_s");
                h.innerHTML=__h+__d*24;
                m.innerHTML=__m;
                s.innerHTML=__s;
                nowtime=nowtime+1000;
                setTimeout(_fresh,1000);
            }else if(!if_Receive){
                document.getElementById("msg").innerHTML="";
            }
        }
        _fresh();
    <?php echo '</script'; ?>
>
</notempty>

<div style="display:none">
    <?php echo '<?php'; ?>

	echo html_entity_decode(htmlspecialchars_decode($vote['cnzz']));
	<?php echo '?>'; ?>

</div></body>
</html><?php }} ?>
