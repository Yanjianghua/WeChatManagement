<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-07 16:06:14
         compiled from "/Library/WebServer/Documents/weixin/trunk/application/views/default/vote/index.html" */ ?>
<?php /*%%SmartyHeaderCode:99111249592eaeb412b609-79701167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0290739aa884358a31bcff08a95f4d4c9432f12a' => 
    array (
      0 => '/Library/WebServer/Documents/weixin/trunk/application/views/default/vote/index.html',
      1 => 1496822773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99111249592eaeb412b609-79701167',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592eaeb41666c1_02518403',
  'variables' => 
  array (
    'vote' => 0,
    'moban' => 0,
    'BM' => 0,
    'vote_ycount' => 0,
    'vote_tcount' => 0,
    'xncheck' => 0,
    'vote_items' => 0,
    'value' => 0,
    'page' => 0,
    'o' => 0,
    'signPackage' => 0,
    'server_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592eaeb41666c1_02518403')) {function content_592eaeb41666c1_02518403($_smarty_tpl) {?><!DOCTYPE html>
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
                <?php if ($_smarty_tpl->tpl_vars['BM']->value) {?><a href="/vote/enroll?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
" class="join_us">我要报名</a><?php }?>
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
        <div class="search">
            <form action="/vote/search?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
" id="search_form" method="post" accept-charset="utf-8">
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
" />
                <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
" />
                <div class="search_con">
                    <div class="btn"><input type="submit" name="seachid" id="searchBtn" value="搜索"></div>
                    <div class="text_box"><input type="search" id="searchText" value="" name="keyword" placeholder="请输入选手姓名或编号" autocomplete="off"></div>
                </div>
            </form>
        </div>    </div>
</header>

<section class="content" id="get_info" data-rid="503" data-sort="" data-kw="" data-page="">
    <div class="text_a clearfix" id="sort">
        <a href="/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
" class="active">最新参赛</a>
        <a href="/vote/top?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
" >投票排行</a>
    </div>
    <div class="blank20"></div>
    <div id="pageCon" class="match_page masonry" style="padding-bottom: 50px">
        <ul class="list_box masonry clearfix" style="position: relative;">
            <?php if (!empty($_smarty_tpl->tpl_vars['vote_items']->value)) {?>
            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vote_items']->value['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                <li class="picCon">
                    <div>
                        <i class="number"><?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
号</i>
                        <a href="/vote/details?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
&iid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="img">

                            <img src="<?php if ($_smarty_tpl->tpl_vars['value']->value['startpicurl']) {
echo $_smarty_tpl->tpl_vars['value']->value['startpicurl'];
} else { ?>/statics/media/image/user.png<?php }?>" alt="" >

                        </a>
                        <div class="clearfix">
                            <p>
                                <?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
<br/>
                                <?php echo $_smarty_tpl->tpl_vars['value']->value['dcount']+$_smarty_tpl->tpl_vars['value']->value['vcount'];?>
票
                            </p>
                            <a href="/vote/ajax_dcount?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
&iid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="vote" data-itid="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" data-vote_num="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" data-rule_id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">投票</a>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <?php }?>
        </ul>

    </div>

    <div class="pagination pagination-centered">
        <ul>
            <li class="prev <?php if ($_smarty_tpl->tpl_vars['page']->value==0) {?>disabled<?php }?>">
                <a href="/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
&page=<?php echo max($_smarty_tpl->tpl_vars['page']->value-1,0);?>
" target="_blank"> ← <span class="hidden-480">Prev</span></a>
            </li>
            <?php $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['o']->step = 1;$_smarty_tpl->tpl_vars['o']->total = (int) ceil(($_smarty_tpl->tpl_vars['o']->step > 0 ? $_smarty_tpl->tpl_vars['vote_items']->value['total']/10+1 - (1) : 1-($_smarty_tpl->tpl_vars['vote_items']->value['total']/10)+1)/abs($_smarty_tpl->tpl_vars['o']->step));
if ($_smarty_tpl->tpl_vars['o']->total > 0) {
for ($_smarty_tpl->tpl_vars['o']->value = 1, $_smarty_tpl->tpl_vars['o']->iteration = 1;$_smarty_tpl->tpl_vars['o']->iteration <= $_smarty_tpl->tpl_vars['o']->total;$_smarty_tpl->tpl_vars['o']->value += $_smarty_tpl->tpl_vars['o']->step, $_smarty_tpl->tpl_vars['o']->iteration++) {
$_smarty_tpl->tpl_vars['o']->first = $_smarty_tpl->tpl_vars['o']->iteration == 1;$_smarty_tpl->tpl_vars['o']->last = $_smarty_tpl->tpl_vars['o']->iteration == $_smarty_tpl->tpl_vars['o']->total;?>
            <li class="<?php if ($_smarty_tpl->tpl_vars['page']->value+1==$_smarty_tpl->tpl_vars['o']->value) {?>active<?php }?>"><a href="/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['o']->value-1;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['o']->value;?>
</a></li>
            <?php }} ?>
            <li class="next <?php if (($_smarty_tpl->tpl_vars['page']->value+1)==$_smarty_tpl->tpl_vars['page']->value) {?>disabled<?php }?>">
                <a href="/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
&page=<?php echo min($_smarty_tpl->tpl_vars['page']->value+1,0);?>
" target="_blank"><span class="hidden-480">Next</span> → </a>
            </li>
        </ul>
    </div>
</section>
<img class="bg" src="/statics/vote/index<?php echo $_smarty_tpl->tpl_vars['moban']->value;?>
/mw_005.jpg" />

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

<link rel="stylesheet" type="text/css" href="/statics/vote/index2/daohang.css">

<div class="bot_main">
    <ul>
        <li class="ico_1"><span class="ico"><img src="/statics/vote//index2/i1.png" /></span><span class="txt">首页</span></li>
        <li class="ico_2"><span class="ico"><img src="/statics/vote//index2/i3.png" /></span><span class="txt">排名</span></li>
        <li class="ico_3"><span class="ico"><img src="/statics/vote//index2/i11.png" /></span><span class="txt"><notempty name='ishavezp' >我的<else/>报名</notempty></span></li>
        <li class="ico_4"><span class="ico"><img src="/statics/vote/index2/i4.png" /></span><span class="txt">关注我们</span></li>
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
            link: "<?php echo $_smarty_tpl->tpl_vars['server_url']->value;?>
/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
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
    $(function($){
        $("#search_form").submit(function(){
            var keyword = $("#searchText").val();
            if(keyword.length == 0){alert('请输入选手姓名或编号');return false;}
        });
    });
    $(function(){
        $("#toupiaook").on('click',function(){
            window.location.href = "/vote/index?token=<?php echo $_smarty_tpl->tpl_vars['vote']->value['token'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['vote']->value['id'];?>
";
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
</body>
</html><?php }} ?>
