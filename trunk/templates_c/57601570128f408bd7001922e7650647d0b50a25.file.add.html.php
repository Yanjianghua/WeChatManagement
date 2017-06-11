<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-04-10 21:28:36
         compiled from "/Library/WebServer/Documents/weixin/trunk/application/views/admin/wxvote/add.html" */ ?>
<?php /*%%SmartyHeaderCode:18437588158e7633d265c46-13684935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57601570128f408bd7001922e7650647d0b50a25' => 
    array (
      0 => '/Library/WebServer/Documents/weixin/trunk/application/views/admin/wxvote/add.html',
      1 => 1491807720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18437588158e7633d265c46-13684935',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58e7633d2be9f0_84924758',
  'variables' => 
  array (
    'web_name' => 0,
    'moban' => 0,
    'v' => 0,
    'time' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58e7633d2be9f0_84924758')) {function content_58e7633d2be9f0_84924758($_smarty_tpl) {?><!DOCTYPE html>
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
							微信投票添加
							<small>Background management system</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a>系统菜单</a>
								<span class="icon-angle-right"></span>
								<a href="/Admin_WxSystem/index">微信投票管理</a>
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
								<div class="caption"><i class="icon-reorder"></i>微信投票添加</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<!--<a href="#portlet-config" data-toggle="modal" class="config"></a>-->
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<form action="/Admin_WxVote/add" method="post" class="form-horizontal" enctype="multipart/form-data" >
									<div class="control-group">
										<label class="control-label">选择模版：</label>
										<div class="controls">
											<select class="span6 m-wrap" name="moban" data-placeholder="Choose a Category" >
												<option value="">选择选择模版……</option>
												<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['moban']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['group_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['group_name'];?>
</option>
												<?php } ?>
											</select>
											<span class="help-inline">请选择模版</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">活动关键字：</label>
										<div class="controls">
											<input type="text" name="keyword" placeholder="请输入活动关键字，最少2位字符" minlength="2" maxlength="180" class="span6 m-wrap" />
											<span class="help-inline">关键字只能有一个，请不要与其他活动关键字重复</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">活动标题：</label>
										<div class="controls">
											<input type="text" name="title" placeholder="请输入活动标题，最少2位字符" minlength="2" maxlength="180" class="span6 m-wrap" />
											<span class="help-inline">请输入2～18位非特殊字符</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">微信分享描述：</label>
										<div class="controls">
											<input type="text" name="fxms" placeholder="请输入微信分享描述，最少2位字符" minlength="2" maxlength="180" class="span6 m-wrap" />
											<span class="help-inline">请输入2～180位非特殊字符</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">引导关注提示：</label>
										<div class="controls">
											<input type="text" name="ydgzts" placeholder="请输入引导关注提示，最少2位字符" minlength="2" maxlength="180" class="span6 m-wrap" />
											<span class="help-inline">请输入2～180位非特殊字符</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">微信关注URL：</label>
										<div class="controls">
											<input type="text" name="wxgzurl" placeholder="请输入微信分享描述，最少2位字符" minlength="2" maxlength="180" class="span6 m-wrap" />
											<span class="help-inline">请输入2～180位非特殊字符</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">每个微信可投票数：</label>
										<div class="controls">
											<input type="number" name="wxgzurl" placeholder="请输入每个微信可投票数" class="span6 m-wrap" />
											<span class="help-inline">请输入每个微信可投票数</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">同IP每天可投票数：</label>
										<div class="controls">
											<input type="number" name="ipnubs" placeholder="请输入同IP每天可投票数" class="span6 m-wrap" />
											<span class="help-inline">请输入同IP每天可投票数</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 首页广告图片：</label>
										<div class="controls">
											<input type="file" name="picurl" style="border:1px solid red;" class="span6"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">报名期和投票期重叠的时间段每个作品的投票数：</label>
										<div class="controls">
											<input type="number" name="btcdxz" placeholder="请输入报名期和投票期重叠的时间段每个作品的投票数" class="span6 m-wrap" />
											<span class="help-inline">请输入报名期和投票期重叠的时间段每个作品的投票数</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">投票时间：</label>
										<div class="controls">
											<input type="text" class="span3 m-wrap" id="statdate" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" name="statdate" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['time']->value);?>
">
											<span class="help-inline">到</span>
											<input type="text" class="span3 m-wrap" id="enddate" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" name="enddate" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['time']->value+30*3600*24);?>
">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">报名时间：</label>
										<div class="controls">
											<input type="text" class="span3 m-wrap" id="start_time" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" name="start_time" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['time']->value);?>
">
											<span class="help-inline">到</span>
											<input type="text" class="span3 m-wrap" id="over_time" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" name="over_time" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['time']->value+30*3600*24);?>
">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 活动一标题：</label>
										<div class="controls">
											<input class="span6 m-wrap" type="text" name="shuma" placeholder="请输入活动一标题" />
											<span class="help-inline">请输入活动一标题</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 内容：</label>
										<div class="controls">
											<textarea id="content123" name="shumat" ></textarea>
											<?php echo '<script'; ?>
 type="text/javascript">
												CKEDITOR.replace('shumat', {
													toolbar: [
														['Source'],
														['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print', 'SpellChecker', 'Scayt'],
														['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
														['BidiLtr', 'BidiRtl'],
														'/', ['Bold', 'Italic', 'Underline', 'Strike'],
														['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv'],
														['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
														['Link', 'Unlink', 'Anchor'],
														['Image', 'SpecialChar', 'Table'],
														'/', ['Styles', 'Format', 'Font', 'FontSize'],
														['TextColor', 'BGColor'],
														['Maximize', 'ShowBlocks']
													]
												});
											<?php echo '</script'; ?>
>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 活动二标题：</label>
										<div class="controls">
											<input class="span6 m-wrap" type="text" name="shumb" placeholder="请输入活动一标题" />
											<span class="help-inline">请输入活动二标题</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 内容：</label>
										<div class="controls">
											<textarea id="shumbt" name="shumbt" ></textarea>
											<?php echo '<script'; ?>
 type="text/javascript">
												CKEDITOR.replace('shumbt', {
													toolbar: [
														['Source'],
														['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print', 'SpellChecker', 'Scayt'],
														['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
														['BidiLtr', 'BidiRtl'],
														'/', ['Bold', 'Italic', 'Underline', 'Strike'],
														['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv'],
														['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
														['Link', 'Unlink', 'Anchor'],
														['Image', 'SpecialChar', 'Table'],
														'/', ['Styles', 'Format', 'Font', 'FontSize'],
														['TextColor', 'BGColor'],
														['Maximize', 'ShowBlocks']
													]
												});
											<?php echo '</script'; ?>
>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 活动三标题：</label>
										<div class="controls">
											<input class="span6 m-wrap" type="text" name="shumc" placeholder="请输入活动一标题" />
											<span class="help-inline">请输入活动三标题</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 内容：</label>
										<div class="controls">
											<textarea id="shumct" name="shumct" ></textarea>
											<?php echo '<script'; ?>
 type="text/javascript">
												CKEDITOR.replace('shumct', {
													toolbar: [
														['Source'],
														['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print', 'SpellChecker', 'Scayt'],
														['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
														['BidiLtr', 'BidiRtl'],
														'/', ['Bold', 'Italic', 'Underline', 'Strike'],
														['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv'],
														['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
														['Link', 'Unlink', 'Anchor'],
														['Image', 'SpecialChar', 'Table'],
														'/', ['Styles', 'Format', 'Font', 'FontSize'],
														['TextColor', 'BGColor'],
														['Maximize', 'ShowBlocks']
													]
												});
											<?php echo '</script'; ?>
>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">虚拟投票数量：</label>
										<div class="controls">
											<input type="number" name="xntps" placeholder="请输入虚拟浏览量" min="0" max="10000" class="span6 m-wrap" />
											<span class="help-inline"><font color="red">(首页投票数的值为 真实投票数+虚拟投票数)</font></span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">虚拟浏览量：</label>
										<div class="controls">
											<input type="number" name="xncheck" placeholder="请输入虚拟浏览量" min="0" max="10000" class="span6 m-wrap" />
											<span class="help-inline"><font color="red">(首页浏览量的值为 真实浏览量+虚拟浏览量)</font></span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">虚拟浏览量：</label>
										<div class="controls">
											<input type="number" name="xnbms" placeholder="请输入虚拟浏览量" min="0" max="10000" class="span6 m-wrap" />
											<span class="help-inline"><font color="red">(首页报名的值为 真实报名数+虚拟报名数)</font></span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 微信分享外链图标：</label>
										<div class="controls">
											<input type="file" name="wappicurl" style="border:1px solid red;" class="span6"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"> 背景音乐选择：</label>
										<div class="controls">
											<input type="file" name="music" style="border:1px solid red;" class="span6"/>
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
	<?php echo '<script'; ?>
 type="text/javascript" src="/statics/media/js/date/WdatePicker.js"><?php echo '</script'; ?>
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
