<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-18 10:15:25
         compiled from "/Library/WebServer/Documents/weixin/trunk/application/views/admin/wxmenu/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:113054409058f47f047b2808-98063283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f34598f2c350a41afb58cabaa8f51d03c6ddd41a' => 
    array (
      0 => '/Library/WebServer/Documents/weixin/trunk/application/views/admin/wxmenu/edit.html',
      1 => 1492481724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113054409058f47f047b2808-98063283',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58f47f0483a791_13739708',
  'variables' => 
  array (
    'web_name' => 0,
    'WxMenuPid' => 0,
    'WxMenu' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f47f0483a791_13739708')) {function content_58f47f0483a791_13739708($_smarty_tpl) {?><!DOCTYPE html>
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
							微信自定义菜单修改
							<small>Background management system</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a>系统菜单</a>
								<span class="icon-angle-right"></span>
								<a href="/Admin_WxVote/index">微信自定义菜单管理</a>
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
								<div class="caption"><i class="icon-reorder"></i>微信自定义菜单修改</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<!--<a href="#portlet-config" data-toggle="modal" class="config"></a>-->
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<form action="/Admin_WxMenu/edit" method="post" class="form-horizontal" enctype="multipart/form-data" >
									<div class="control-group">
										<label class="control-label">选择上级菜单：</label>
										<div class="controls">
											<select class="span6 m-wrap" name="pid" data-placeholder="Choose a Category" >
												<option value="0">根目录</option>
												<?php if (!empty($_smarty_tpl->tpl_vars['WxMenuPid']->value)) {?>
												<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['WxMenuPid']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
												<?php if ($_smarty_tpl->tpl_vars['WxMenu']->value['pid']==$_smarty_tpl->tpl_vars['v']->value['id']) {?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</option>
												<?php } else { ?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</option>
												<?php }?>
												<?php } ?>
												<?php }?>
											</select>
											<span class="help-inline">请选择上级菜单(<font color="red">根目录只能建3个一级菜单，每个一级菜单能建5个二级菜单</font>)</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">关键字：</label>
										<div class="controls">
											<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['WxMenu']->value['id'];?>
" >
											<input type="text" name="keyword" placeholder="请输入关键字，最少2位字符" value="<?php echo $_smarty_tpl->tpl_vars['WxMenu']->value['keyword'];?>
" minlength="2" maxlength="30" class="span6 m-wrap" />
											<span class="help-inline">关键字只能有一个，请不要与其他活动关键字重复</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">菜单名称：</label>
										<div class="controls">
											<input type="text" name="title" placeholder="请输入菜单名称，最少2位字符" value="<?php echo $_smarty_tpl->tpl_vars['WxMenu']->value['title'];?>
" minlength="2" maxlength="20" class="span6 m-wrap" />
											<span class="help-inline">请输入2～18位非特殊字符</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">排序：</label>
										<div class="controls">
											<input type="number" name="sort" placeholder="请输入排序" value="<?php echo $_smarty_tpl->tpl_vars['WxMenu']->value['sort'];?>
" min="1" max="100" class="span6 m-wrap" />
											<span class="help-inline">请输入1~100排序值，数值越小越靠前</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">是否显示在菜单栏：</label>
										<div class="controls">
											<input type="radio" class="toggle" name="is_show" value="1" <?php if ($_smarty_tpl->tpl_vars['WxMenu']->value['is_show']==1) {?>checked="checked"<?php }?> /> <span class="help-inline">是</span>
											<input type="radio" class="toggle" name="is_show" value="0" <?php if ($_smarty_tpl->tpl_vars['WxMenu']->value['is_show']!=1) {?>checked="checked"<?php }?> /> <span class="help-inline">否</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">链接地址：</label>
										<div class="controls">
											<input type="text" name="url" placeholder="请输入链接地址" value="<?php echo $_smarty_tpl->tpl_vars['WxMenu']->value['url'];?>
"  maxlength="220" class="span6 m-wrap" />
											<span class="help-inline">请输入2～180位非特殊字符</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">说明：</label>
										<div class="controls">
											<input type="text" name="note" placeholder="请输入说明" value="<?php echo $_smarty_tpl->tpl_vars['WxMenu']->value['note'];?>
" minlength="0" maxlength="40" class="span6 m-wrap" />
											<span class="help-inline">请输入2～180位非特殊字符</span>
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
