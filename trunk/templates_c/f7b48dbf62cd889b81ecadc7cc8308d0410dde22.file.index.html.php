<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-23 11:12:29
         compiled from "/Library/WebServer/Documents/weixin/trunk/application/views/admin/binding/index.html" */ ?>
<?php /*%%SmartyHeaderCode:171011643458e65649ab5ab0-62090257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7b48dbf62cd889b81ecadc7cc8308d0410dde22' => 
    array (
      0 => '/Library/WebServer/Documents/weixin/trunk/application/views/admin/binding/index.html',
      1 => 1492162316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171011643458e65649ab5ab0-62090257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58e65649b582d3_29964743',
  'variables' => 
  array (
    'web_name' => 0,
    'token' => 0,
    'HTTP_HOST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58e65649b582d3_29964743')) {function content_58e65649b582d3_29964743($_smarty_tpl) {?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo $_smarty_tpl->tpl_vars['web_name']->value;?>
</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="/statics/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/statics/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="/statics/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/statics/media/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="/statics/media/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/statics/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="/statics/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="/statics/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="/statics/media/css/select2_metro.css" />
	<link rel="stylesheet" href="/statics/media/css/DT_bootstrap.css" />
	<!-- END PAGE LEVEL STYLES -->
	<?php echo $_smarty_tpl->getSubTemplate ('../../common/importAll.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<link rel="shortcut icon" href="/statics/media/image/favicon.ico" />
</head>
<!-- END HEAD -->
<body class="page-header-fixed">
	<?php echo $_smarty_tpl->getSubTemplate ('../../common/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<?php echo $_smarty_tpl->getSubTemplate ('../../common/sidebar.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body">
					Widget settings form goes here
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER -->
						<div class="color-panel hidden-phone">
							<div class="color-mode-icons icon-color"></div>
							<div class="color-mode-icons icon-color-close"></div>
							<div class="color-mode">
								<p>THEME COLOR</p>
								<ul class="inline">
									<li class="color-black current color-default" data-style="default"></li>
									<li class="color-blue" data-style="blue"></li>
									<li class="color-brown" data-style="brown"></li>
									<li class="color-purple" data-style="purple"></li>
									<li class="color-grey" data-style="grey"></li>
									<li class="color-white color-light" data-style="light"></li>
								</ul>
								<label>
									<span>Layout</span>
									<select class="layout-option m-wrap small">
										<option value="fluid" selected>Fluid</option>
										<option value="boxed">Boxed</option>
									</select>
								</label>
								<label>
									<span>Header</span>
									<select class="header-option m-wrap small">
										<option value="fixed" selected>Fixed</option>
										<option value="default">Default</option>
									</select>
								</label>
								<label>
									<span>Sidebar</span>
									<select class="sidebar-option m-wrap small">
										<option value="fixed">Fixed</option>
										<option value="default" selected>Default</option>
									</select>
								</label>
								<label>
									<span>Footer</span>
									<select class="footer-option m-wrap small">
										<option value="fixed">Fixed</option>
										<option value="default" selected>Default</option>
									</select>
								</label>
							</div>
						</div>
						<!-- END BEGIN STYLE CUSTOMIZER -->
						<h3 class="page-title">
							接口绑定
							<small>Background management system</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a>系统菜单</a>
								<span class="icon-angle-right"></span>
								<a href="">接口绑定</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN DASHBOARD STATS -->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-list"></i>如何为微信公众号配置接口？</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<!--<a href="#portlet-config" data-toggle="modal" class="config"></a>-->
									<!--<a href="javascript:;" class="reload"></a>-->
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="section lastSection">
									<p>
									<h4>请务必认真阅读以下步骤的内容，才能更有效的完成配置工作</h4>
									<br/>
										<?php if ($_smarty_tpl->tpl_vars['token']->value) {?>你的接口URL是：<font color="red">http://<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/api/index?token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
</font>
									<!--<br>-->
										<!--若失败请用如下URL：<font color="red">http://<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/index.php?g=Home&m=Weixin&a=index&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
</font>-->
									<br>
										您的token是：<font color="red"><?php echo $_smarty_tpl->tpl_vars['token']->value;?>
</font><?php }?>
									</p>
								</div>
								<div id="CollapsiblePanel3" class="CollapsiblePanel">
									<div class="caption"><h3>微投票到微信公众平台设置接口。</h3></div>
									<div style="" class="">
										<div class="articleContent catalogHome normalContent">
											<div class="section lastSection">
												<div class="section lastSection">
													<p>1、登录 <a href="http://mp.weixin.qq.com/">微信公众平台</a>（<a href="http://mp.weixin.qq.com/">http://mp.weixin.qq.com/</a>），进行身份认证，填写信息，提交身份证。</p>
													<p>审核后，开发者中心 → 进入开发模式</p><br>
													<p><img src="/statics/media/help/help001.jpg" width="790px"></p><br>
													<p>2、点击"成为开发者"按钮</p>
													<p><img src="/statics/media/help/help002.jpg" width="790px"></p><br>
													<p>3、填写接口配置信息</p>
													<?php if ($_smarty_tpl->tpl_vars['token']->value=='') {?>
														<p>比如你<?php echo $_smarty_tpl->tpl_vars['web_name']->value;?>
平台上的地址是http://<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/index.php/api/demo</p>
														<p>那么URL就是http://<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/INDEX.PHP/api/demo</p>
													<?php } else { ?>
														<p>你的URL是 <font color="red">http://<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/api?token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
</font></p>
													<?php }?>
													<p>Token填写 <font color="red"><?php echo $_smarty_tpl->tpl_vars['token']->value;?>
</font></p>
													<p><img src="/statics/media/help/help003.jpg" width="790px"></p><br>
													<p>4、确认开启</p>
													<p>5、在手机上用微信给你的公众号输入你设置的"关键词"，测试你的接口是否配置正常！</p><br>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END DASHBOARD STATS -->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<?php echo $_smarty_tpl->getSubTemplate ('../../common/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<!-- BEGIN CORE PLUGINS -->
	<?php echo $_smarty_tpl->getSubTemplate ('../../common/importBottomAll.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<?php echo '<script'; ?>
 type="text/javascript" src="/statics/media/js/select2.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="/statics/media/js/jquery.dataTables.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="/statics/media/js/DT_bootstrap.js"><?php echo '</script'; ?>
>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<?php echo '<script'; ?>
 src="/statics/media/js/app.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/statics/media/js/table-editable.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		jQuery(document).ready(function() {
			App.init();
			TableEditable.init();
			Setsidebarfun.init();
		});
	<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
