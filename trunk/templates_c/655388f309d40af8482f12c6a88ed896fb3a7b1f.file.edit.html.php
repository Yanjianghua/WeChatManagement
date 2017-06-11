<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-31 23:35:36
         compiled from "/Library/WebServer/Documents/weixin/trunk/application/views/admin/wxvoteitem/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:170945892058eb2969833850-95908870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '655388f309d40af8482f12c6a88ed896fb3a7b1f' => 
    array (
      0 => '/Library/WebServer/Documents/weixin/trunk/application/views/admin/wxvoteitem/edit.html',
      1 => 1496244921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170945892058eb2969833850-95908870',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58eb29698cf547_87681112',
  'variables' => 
  array (
    'web_name' => 0,
    'WxVote' => 0,
    'v' => 0,
    'WxVoteItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58eb29698cf547_87681112')) {function content_58eb29698cf547_87681112($_smarty_tpl) {?><!DOCTYPE html>
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
	<?php echo '<script'; ?>
 type="text/javascript" src="/statics/media/js/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
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
							微信投票选手修改
							<small>Background management system</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a>系统菜单</a>
								<span class="icon-angle-right"></span>
								<a href="/Admin_WxVoteItem/index">微信投票选手管理</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE FORM PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>微信投票选手修改</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<!--<a href="#portlet-config" data-toggle="modal" class="config"></a>-->
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<form action="/Admin_WxVoteItem/edit" method="post" class="form-horizontal" enctype="multipart/form-data" >
									<div class="control-group">
										<label class="control-label">选择投票项：</label>
										<div class="controls">
											<select class="span6 select2" id="select2_sample1" name="vid" data-placeholder="Choose a Category" >
												<?php if (!empty($_smarty_tpl->tpl_vars['WxVote']->value)) {?>
												<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['WxVote']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</option>
												<?php } ?>
												<?php }?>
											</select>
											<span class="help-inline">&nbsp;请选择投票项</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">姓名：</label>
										<div class="controls">
											<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['id'];?>
">
											<input type="text" name="name" placeholder="请输入姓名，最少2位字符" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['name'];?>
" minlength="2" maxlength="180" class="span6 m-wrap" />
											<span class="help-inline">姓名最好不要重复</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">虚拟投票数：</label>
										<div class="controls">
											<input type="number" name="vcount" placeholder="请输入虚拟投票数，最少2位字符" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['vcount'];?>
" minlength="2" maxlength="180" class="span6 m-wrap" />
											<span class="help-inline">请输入虚拟投票数</span>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label"> 图片上传：</label>
										<div class="controls">
											<input type="file" name="startpicurl" style="border:1px solid red;" class="span6" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl'];?>
"/>
											<?php if (!empty($_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl'])) {?>
												<span class="help-inline">已上传图片：</span><img src="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl'];?>
" height="100px" width="100px">
											<?php }?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 图片上传2：</label>
										<div class="controls">
											<input type="file" name="startpicurl2" style="border:1px solid red;" class="span6" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl2'];?>
"/>
											<?php if (!empty($_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl2'])) {?>
											<span class="help-inline">已上传图片：</span><img src="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl2'];?>
" height="100px" width="100px">
											<?php }?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 图片上传3：</label>
										<div class="controls">
											<input type="file" name="startpicurl3" style="border:1px solid red;" class="span6" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl3'];?>
"/>
											<?php if (!empty($_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl3'])) {?>
											<span class="help-inline">已上传图片：</span><img src="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl3'];?>
" height="100px" width="100px">
											<?php }?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 图片上传4：</label>
										<div class="controls">
											<input type="file" name="startpicurl4" style="border:1px solid red;" class="span6" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl4'];?>
" />
											<?php if (!empty($_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl4'])) {?>
											<span class="help-inline">已上传图片：</span><img src="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl4'];?>
" height="100px" width="100px">
											<?php }?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 图片上传5：</label>
										<div class="controls">
											<input type="file" name="startpicurl5" style="border:1px solid red;" class="span6" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl5'];?>
" />
											<?php if (!empty($_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl5'])) {?>
											<span class="help-inline">已上传图片：</span><img src="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['startpicurl5'];?>
" height="100px" width="100px">
											<?php }?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">手机号：</label>
										<div class="controls">
											<input type="number" name="tourl" placeholder="请输入手机号" min="10000000000" max="99999999999" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['tourl'];?>
" class="span6 m-wrap" />
											<span class="help-inline">请输入手机号</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">排序：</label>
										<div class="controls">
											<input type="number" name="rank" placeholder="请输入排序号" min="1" max="100" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['rank'];?>
" class="span6 m-wrap" />
											<span class="help-inline">请输入排序号1~100 <font color="red">(序号越大，越靠前)</font></span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">简介：</label>
										<div class="controls">
											<input type="text" name="intro" placeholder="请输入简介" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['intro'];?>
"  class="span6 m-wrap" />
											<span class="help-inline">请输入简介</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">微信号：</label>
										<div class="controls">
											<input type="text" name="wechat" placeholder="请输入微信号" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['wechat'];?>
"  class="span6 m-wrap" />
											<span class="help-inline">请输入简介</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 锁消息：</label>
										<div class="controls">
											<input type="text" name="lockinfo" placeholder="请输入消息" value="<?php echo $_smarty_tpl->tpl_vars['WxVoteItem']->value['lockinfo'];?>
" class="span6 m-wrap" />
											<span class="help-inline">请输入消息</span>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn blue">Submit</button>
										<button type="button" class="btn">Cancel</button>
									</div>
								</form>
								<!-- END FORM-->
							</div>
						</div>
						<!-- END SAMPLE FORM PORTLET-->
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
