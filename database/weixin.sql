--
-- 功能链接 `my_module`
--

DROP TABLE IF EXISTS `my_menu_url`;
CREATE TABLE IF NOT EXISTS `my_menu_url` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `menu_controller` varchar(255) NOT NULL,
  `menu_method` varchar(255) NOT NULL,
  `menu_note` varchar(255) DEFAULT NULL COMMENT '描述',
  `menu_hide` int(3) DEFAULT NULL COMMENT '是否显示',
  `module_icon` varchar(32) DEFAULT 'icon-th' COMMENT '菜单模块图标',
  `father_menu` int(11) NOT NULL DEFAULT '0' COMMENT '上级菜单',
  `menu_built` int(11) NOT NULL DEFAULT '0' COMMENT '是否为内置菜单',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '启用、禁用',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='菜单' AUTO_INCREMENT=1 ;

--
-- 操作日志表 `my_sys_log`
--

DROP TABLE IF EXISTS `my_sys_log`;
CREATE TABLE IF NOT EXISTS `my_sys_log` (
  `op_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `user_name` varchar(32) NOT NULL,
  `action` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL COMMENT '操作了那个类的对象',
  `class_obj` varchar(32) NOT NULL COMMENT '操作的对象是谁，可能为对象的ID',
  `result` text NOT NULL COMMENT '操作的结果',
  `op_time` int(11) NOT NULL,
  PRIMARY KEY (`op_id`),
  KEY `op_time` (`op_time`),
  KEY `class_name` (`class_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='操作日志表' AUTO_INCREMENT=1 ;

--
-- 后台用户 `my_user`
--

DROP TABLE IF EXISTS `my_user`;
CREATE TABLE IF NOT EXISTS `my_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_desc` varchar(255) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL COMMENT '登陆时间',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `login_ip` varchar(32) DEFAULT NULL,
  `user_group` int(11) NOT NULL COMMENT '账户组ID',
  `template` varchar(32) NOT NULL DEFAULT 'default' COMMENT '主题模版',
  `shortcuts` text COMMENT '快捷菜单',
  `show_quicknote` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示quicknote',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='后台用户' AUTO_INCREMENT=1 ;


--
-- 账户组 `my_user_group`
--

DROP TABLE IF EXISTS `my_user_group`;
CREATE TABLE IF NOT EXISTS `my_user_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(32) DEFAULT NULL,
  `group_role` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '初始权限1,5,17,18,22,23,24,25',
  `owner_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `group_desc` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='账户组' AUTO_INCREMENT=1 ;


--
-- 微信配置组 `wx_system`
--

DROP TABLE IF EXISTS `wx_system`;
CREATE TABLE IF NOT EXISTS `wx_system` (
  `wxs_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `wxs_name` varchar(32) DEFAULT NULL COMMENT '公众号名称',
  `wxs_token` varchar(32) DEFAULT NULL COMMENT '公众号token',
  `wxs_pic` varchar(32) DEFAULT '' COMMENT '公众号二维码',
  `wxs_app_id` varchar(50) DEFAULT NULL COMMENT '公众号AppID',
  `wxs_app_secret` varchar(200) DEFAULT NULL COMMENT '公众号AppSecret',
  `wxs_access_token` varchar(500) DEFAULT NULL COMMENT '公众号access_token',
  `wxs_expire_access` varchar(500) DEFAULT NULL COMMENT '公众号access_token过期时间',
  `addtime` int(11) DEFAULT NULL COMMENT '登陆时间',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`wxs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='微信配置组' AUTO_INCREMENT=1 ;

--
-- 微信投票组 `wxs_vote`
--

DROP TABLE IF EXISTS `wx_vote`;
CREATE TABLE `wx_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `moban` int(2) DEFAULT '1' COMMENT '模版ID',
  `title` varchar(50) NOT NULL COMMENT '活动标题',
  `fxms` varchar(1000) DEFAULT NULL COMMENT '微信分享描述',
  `ydgzts` varchar(1000) DEFAULT NULL COMMENT '引导关注提示',
  `wxgzurl` varchar(1500) DEFAULT NULL COMMENT '微信关注URL',
  `tpnub` int(4) DEFAULT '12' COMMENT '每个微信可投票数',
  `ipnubs` int(4) DEFAULT '4' COMMENT '同IP每天可投票数',
  `btcdxz` int(4) DEFAULT '0' COMMENT '报名期和投票期重叠的时间段每个作品的投票数',
  `statdate` int(11) NOT NULL COMMENT '投票开始时间',
  `enddate` int(11) NOT NULL COMMENT '投票结束时间',
  `start_time` int(11) DEFAULT NULL COMMENT '报名开始时间',
  `over_time` int(11) DEFAULT NULL COMMENT '报名结束时间',
  `keyword` varchar(60) NOT NULL COMMENT '关键字',
  `token` varchar(50) NOT NULL COMMENT '公众号token',
  `shuma` text COMMENT '活动一内容',
  `shumat` varchar(2000) DEFAULT NULL COMMENT '活动一标题',
  `shumb` text COMMENT '活动二内容',
  `shumbt` varchar(2000) DEFAULT NULL COMMENT '活动二标题',
  `shumc` text COMMENT '活动三内容',
  `shumct` varchar(2000) DEFAULT NULL COMMENT '活动三标题',
  `check` int(10) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `picurl` varchar(500) NOT NULL COMMENT '广告图片',
  `wappicurl` varchar(500) NOT NULL COMMENT '微信分享外链图标',
  `xntps` int(10) DEFAULT '0' COMMENT '虚拟投票数',
  `xncheck` int(10) DEFAULT '0' COMMENT '虚拟浏览量',
  `xnbms` int(8) DEFAULT '0' COMMENT '虚拟报名数',
  `music` varchar(200) NOT NULL COMMENT '背景音乐',
  `wfbmbz` varchar(2000) DEFAULT NULL COMMENT '无法报名说明',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`),
  FULLTEXT KEY `keyword` (`keyword`),
  FULLTEXT KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='微信投票组';

--
-- 微信投票选手组 `wxs_vote_item`
--

DROP TABLE IF EXISTS `wx_vote_item`;
CREATE TABLE `wx_vote_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) NOT NULL COMMENT '投票ID',
  `user_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `name` varchar(50) NOT NULL COMMENT '姓名',
  `dcount` int(11) DEFAULT '0' COMMENT '真实投票数',
  `vcount` int(11) NOT NULL COMMENT '虚拟投票数',
  `startpicurl` varchar(200) DEFAULT NULL COMMENT '上传图片1',
  `startpicurl2` varchar(200) DEFAULT NULL COMMENT '上传图片2',
  `startpicurl3` varchar(200) DEFAULT NULL COMMENT '上传图片3',
  `startpicurl4` varchar(200) DEFAULT NULL COMMENT '上传图片4',
  `startpicurl5` varchar(200) DEFAULT NULL COMMENT '上传图片5',
  `tourl` varchar(200) NOT NULL DEFAULT '' COMMENT '手机号',
  `rank` int(4) unsigned NOT NULL DEFAULT '200' COMMENT '排序',
  `intro` text NOT NULL COMMENT '简介',
  `wechat` text NOT NULL COMMENT '微信',
  `wechat_id` varchar(100) DEFAULT NULL COMMENT '微信ID',
  `lockinfo` varchar(260) DEFAULT NULL COMMENT '参赛宣言',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `status` smallint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='微信投票选手组';

--
-- 微信自定义菜单组 `wx_menu`
--

DROP TABLE IF EXISTS `wx_menu`;
CREATE TABLE `wx_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `token` varchar(60) DEFAULT NULL COMMENT '公众号token',
  `pid` int(11) DEFAULT '0' COMMENT '父级ID',
  `title` varchar(30) DEFAULT NULL COMMENT '菜单名称',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键字',
  `is_show` tinyint(1) NOT NULL COMMENT '是否显示',
  `sort` tinyint(3) NOT NULL COMMENT '排序',
  `type` varchar(30) NOT NULL DEFAULT 'click',
  `url` varchar(255) DEFAULT NULL COMMENT '链接',
  `note` char(200) DEFAULT NULL COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='微信自定义菜单组';

--
-- 微信投票信息组 `wx_vote_record`
--

DROP TABLE IF EXISTS `wx_vote_record`;
CREATE TABLE `wx_vote_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `item_id` varchar(50) NOT NULL COMMENT '投票选手ID',
  `vid` int(11) NOT NULL COMMENT '投票ID',
  `wecha_id` varchar(100) NOT NULL COMMENT '投票选手微信ID',
  `touched` tinyint(4) NOT NULL COMMENT '投票数',
  `touch_time` int(11) NOT NULL COMMENT '投票时间',
  `token` varchar(50) NOT NULL DEFAULT '' COMMENT 'token',
  `ip` varchar(300) DEFAULT NULL COMMENT 'IP',
  `address` varchar(500) DEFAULT NULL COMMENT '地址',
  `qxgzys` int(1) NOT NULL DEFAULT '0',
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='微信投票信息组';

--
-- 微信上传组 `wx_file`
--

DROP TABLE IF EXISTS `wx_file`;
CREATE TABLE `wx_file` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '创建人ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT 'name',
  `token` varchar(30) NOT NULL DEFAULT '' COMMENT 'token',
  `url` varchar(200) NOT NULL DEFAULT '' COMMENT 'url',
  `size` int(10) NOT NULL DEFAULT '0' COMMENT 'size',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT 'type',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='微信上传组';

--
-- 公众号PV组 `wx_pv`
--

DROP TABLE IF EXISTS `wx_pv`;
CREATE TABLE `wx_pv` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `vote_id` int(11) DEFAULT NULL COMMENT '文章ID',
  `vote_name` varchar(30) NOT NULL DEFAULT '' COMMENT '文章',
  `ip` varchar(300) DEFAULT NULL COMMENT 'IP',
  `address` varchar(500) DEFAULT NULL COMMENT '地址',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公众号PV组';

--
-- 公众号UV组 `wx_uv`
--

DROP TABLE IF EXISTS `wx_uv`;
CREATE TABLE `wx_uv` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `vote_id` int(11) DEFAULT NULL COMMENT '文章ID',
  `vote_name` varchar(30) NOT NULL DEFAULT '' COMMENT '文章',
  `ip` varchar(300) DEFAULT NULL COMMENT 'IP',
  `address` varchar(500) DEFAULT NULL COMMENT '地址',
  `total_time` int(10) NOT NULL COMMENT '统计时间',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公众号UV组';



--
-- 文章分类表 `my_blog_channel`
--

DROP TABLE IF EXISTS `my_blog_channel`;
CREATE TABLE IF NOT EXISTS `my_blog_channel` (
  `channel_id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(32) DEFAULT NULL,
  `channel_hide` int(3) DEFAULT '0' COMMENT '是否在首页显示',
  `channel_note` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(3) DEFAULT '0',
  PRIMARY KEY (`channel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章分类表' AUTO_INCREMENT=1 ;

--
-- 文章标签表 `my_blog_label`
--

DROP TABLE IF EXISTS `my_blog_label`;
CREATE TABLE IF NOT EXISTS `my_blog_label` (
  `label_id` int(11) NOT NULL AUTO_INCREMENT,
  `label_name` varchar(32) DEFAULT NULL,
  `label_note` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(3) DEFAULT '0',
  PRIMARY KEY (`label_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章标签表' AUTO_INCREMENT=1 ;


--
-- 文章内容表 `my_blog_article`
--

DROP TABLE IF EXISTS `my_blog_article`;
CREATE TABLE IF NOT EXISTS `my_blog_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(50) DEFAULT NULL COMMENT '标题',
  `channel_id` int(11) DEFAULT NULL COMMENT '分类ID',
  `label_id` varchar(32) DEFAULT NULL COMMENT '标签ID',
  `article_keywords` varchar(200) NOT NULL COMMENT '关键字',
  `article_description` varchar(255) NOT NULL COMMENT '描述',
  `article_editor` varchar(30) NOT NULL COMMENT '作者',
  `article_content` text NOT NULL COMMENT '内容',
  `pic_url` varchar(255) NOT NULL COMMENT '首页显示图片',
  `article_readnumber` int(11) DEFAULT '0' COMMENT '阅读量',
  `article_url` VARCHAR (255) DEFAULT '0' COMMENT '原文链接',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `status` int(3) DEFAULT '0',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章内容表' AUTO_INCREMENT=1 ;


--
-- 文章留言表 `my_blog_message`
--

DROP TABLE IF EXISTS `my_blog_message`;
CREATE TABLE IF NOT EXISTS `my_blog_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_title` varchar(32) DEFAULT NULL,
  `message_email` varchar(32) DEFAULT NULL,
  `message_telephone` varchar(32) DEFAULT NULL,
  `message_note` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(3) DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章留言表' AUTO_INCREMENT=1 ;


insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( '', '', '1', '博客菜单', '1', '0', '', '1', 'icon-book');

insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogChannel', 'index', '97', '博客分类管理', '1', '0', '分类管理', '1', 'icon-tags');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogChannel', 'add', '98', '博客分类添加', '1', '0', '博客分类添加', '0', 'icon-plus');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogChannel', 'edit', '98', '博客分类修改', '1', '0', '博客分类修改', '0', 'icon-pencil');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogChannel', 'del', '98', '博客分类删除', '1', '0', '博客分类删除', '0', 'icon-remove');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogChannel', 'enable', '98', '博客分类启用', '1', '0', '博客分类启用', '0', 'icon-ok');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogChannel', 'disable', '98', '博客分类禁用', '1', '0', '文章分类禁用', '0', 'icon-remove');

insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogArticle', 'index', '97', '文章内容管理', '1', '0', '文章内容管理', '1', 'icon-list-alt');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogArticle', 'add', '104', '文章内容添加', '1', '0', '文章内容添加', '0', 'icon-plus');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogArticle', 'edit', '104', '文章内容修改', '1', '0', '文章内容修改', '0', 'icon-pencil');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogArticle', 'del', '104', '文章内容删除', '1', '0', '文章内容删除', '0', 'icon-remove');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogArticle', 'enable', '104', '文章内容启用', '1', '0', '文章内容启用', '0', 'icon-ok');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogArticle', 'disable', '104', '文章内容禁用', '1', '0', '文章内容禁用', '0', 'icon-remove');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogArticle', 'upload', '104', '文章内容图片上传', '1', '0', '文章内容图片上传', '0', 'icon-upload');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogArticle', 'uploadFile', '104', '文章内容添加图片config', '1', '0', '文章内容添加图片config', '0', 'icon-file');

insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogLabel', 'index', '97', '文章标签管理', '1', '0', '标签', '1', 'icon-bookmark');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogLabel', 'add', '112', '文章标签添加', '1', '0', '文章标签添加', '0', 'icon-plus');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogLabel', 'edit', '112', '文章标签修改', '1', '0', '文章标签修改', '0', 'icon-pencil');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogLabel', 'del', '112', '文章标签删除', '1', '0', '文章标签删除', '0', 'icon-remove');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogLabel', 'enable', '112', '文章标签启用', '1', '0', '文章标签启用', '0', 'icon-ok');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogLabel', 'disable', '112', '文章标签禁用', '1', '0', '文章标签禁用', '0', 'icon-remove');

insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogMessage', 'index', '97', '文章留言板', '1', '0', '留言板', '1', 'icon-envelope');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogMessage', 'add', '118', '文章留言板添加', '1', '0', '文章留言板添加', '0', 'icon-plus');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogMessage', 'edit', '118', '文章留言板修改', '1', '0', '文章留言板修改', '0', 'icon-pencil');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogMessage', 'del', '118', '文章留言板删除', '1', '0', '文章留言板删除', '0', 'icon-remove');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogMessage', 'enable', '118', '文章留言版启用', '1', '0', '文章留言板启用', '0', 'icon-ok');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogMessage', 'disable', '118', '文章留言板禁用', '1', '0', '文章留言板禁用', '0', 'icon-remove');

insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogRead', 'index', '97', '阅读量管理', '1', '0', '阅读量管理', '1', 'icon-book');

insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogRecommend', 'index', '97', '文章内容推荐管理', '1', '0', '文章内容推荐管理', '1', 'icon-star');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogRecommend', 'recommend', '125', '文章内容推荐状态修改', '1', '0', '文章内容推荐状态修改', '0', 'icon-pencil');
insert into `my_menu_url` ( `menu_controller`, `menu_method`, `father_menu`, `menu_name`, `status`, `menu_built`, `menu_note`, `menu_hide`, `module_icon`) values ( 'Admin_MyBlogRecommend', 'Rotation', '125', '文章内容轮转图状态修改', '1', '0', '文章内容轮转图状态修改', '0', 'icon-pencil');


