/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : winstart

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-22 21:04:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for winstart_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `winstart_auth_rule`;
CREATE TABLE `winstart_auth_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '用户组名称',
  `rule` varchar(255) NOT NULL DEFAULT '' COMMENT '权限id字符表',
  `sequence` int(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `remark` text NOT NULL COMMENT '备注',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winstart_auth_rule
-- ----------------------------
INSERT INTO `winstart_auth_rule` VALUES ('1', '2017-04-20 09:57:28', '管理员组', '139,140,141,142,143,146,147,148', '0', '123', '0');

-- ----------------------------
-- Table structure for winstart_auth_url
-- ----------------------------
DROP TABLE IF EXISTS `winstart_auth_url`;
CREATE TABLE `winstart_auth_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` datetime DEFAULT '0000-00-00 00:00:00',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `url` varchar(64) NOT NULL DEFAULT '' COMMENT '连接关键字符串，适用于url()',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级id',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态 0隐藏，1正常',
  `sequence` int(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `layer` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winstart_auth_url
-- ----------------------------
INSERT INTO `winstart_auth_url` VALUES ('1', '2017-02-20 12:01:03', '权限设置', '', '0', '1', '10', '1,');
INSERT INTO `winstart_auth_url` VALUES ('2', '2017-02-20 17:24:16', '员工信息管理', 'admin.user/userlist', '1', '1', '2', '1,2,');
INSERT INTO `winstart_auth_url` VALUES ('3', '2017-02-20 17:24:52', '权限组别管理', 'admin.group/usergroup', '1', '1', '3', '1,3,');
INSERT INTO `winstart_auth_url` VALUES ('4', '2017-02-20 17:25:33', '系统导航管理', 'admin.menu/menulist', '1', '1', '4', '1,4,');
INSERT INTO `winstart_auth_url` VALUES ('5', '2017-02-20 17:27:48', '新增', 'admin.user/useradd', '2', '0', '1', '1,2,5,');
INSERT INTO `winstart_auth_url` VALUES ('6', '2017-02-20 17:28:07', '编辑', 'admin.user/useredit', '2', '0', '1', '1,2,6,');
INSERT INTO `winstart_auth_url` VALUES ('7', '2017-02-20 17:28:49', '新增&编辑', 'admin.group/save', '3', '0', '2', '1,3,7,');
INSERT INTO `winstart_auth_url` VALUES ('8', '2017-02-20 17:33:15', '删除', 'admin.group/del', '3', '0', '10', '1,3,8,');
INSERT INTO `winstart_auth_url` VALUES ('9', '2017-02-20 17:35:23', '新增&编辑', 'admin.menu/menusave', '4', '0', '1', '1,4,9,');
INSERT INTO `winstart_auth_url` VALUES ('10', '2017-02-20 17:36:20', '删除', 'admin.menu/menudel', '4', '0', '1', '1,4,10,');
INSERT INTO `winstart_auth_url` VALUES ('11', '2017-03-11 10:18:09', '重置密码', 'admin.user/resetpassword', '2', '0', '10', '1,2,11,');
INSERT INTO `winstart_auth_url` VALUES ('175', '0000-00-00 00:00:00', '删除', 'admin.user/userdel', '2', '0', '1', '1,2,175,');
INSERT INTO `winstart_auth_url` VALUES ('178', '0000-00-00 00:00:00', '栏目管理', 'website.column/columnlist', '177', '1', '1', '177,178,');
INSERT INTO `winstart_auth_url` VALUES ('176', '2015-08-13 04:36:00', '权限选择', 'admin.group/access', '3', '0', '1', '1,3,176,');
INSERT INTO `winstart_auth_url` VALUES ('177', '0000-00-00 00:00:00', '网站设置', '', '0', '1', '1', '177,');
INSERT INTO `winstart_auth_url` VALUES ('179', '0000-00-00 00:00:00', '新增&编辑', 'website.column/columnsave', '178', '0', '1', '177,178,179,');
INSERT INTO `winstart_auth_url` VALUES ('180', '0000-00-00 00:00:00', '删除', 'website.column/columndel', '178', '0', '2', '177,178,180,');
INSERT INTO `winstart_auth_url` VALUES ('186', '0000-00-00 00:00:00', '网站参数', 'website.parameter/index', '177', '1', '2', '177,186,');
INSERT INTO `winstart_auth_url` VALUES ('182', '0000-00-00 00:00:00', '区块列表', 'website.template/columntemplatelist', '178', '0', '4', '177,178,182,');
INSERT INTO `winstart_auth_url` VALUES ('183', '0000-00-00 00:00:00', '新增&编辑区块代码', 'website.template/columntemplatesave', '178', '0', '4', '177,178,183,');
INSERT INTO `winstart_auth_url` VALUES ('184', '0000-00-00 00:00:00', '删除区块代码', 'website.template/columntemplatedel', '178', '0', '4', '177,178,184,');
INSERT INTO `winstart_auth_url` VALUES ('185', '0000-00-00 00:00:00', '全局代码保存', 'website.column/codesave', '178', '0', '3', '177,178,185,');

-- ----------------------------
-- Table structure for winstart_column_file
-- ----------------------------
DROP TABLE IF EXISTS `winstart_column_file`;
CREATE TABLE `winstart_column_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级栏目id pid=0时为全局文件',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '文件名称',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `type` int(2) NOT NULL DEFAULT '0' COMMENT '0=html 1=css 2=js',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态 0隐藏，1正常',
  `sequence` int(4) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `file_pid` (`pid`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winstart_column_file
-- ----------------------------
INSERT INTO `winstart_column_file` VALUES ('17', '2017-10-18 05:30:41', '2', '轮播区脚本', '20171018053041', '2', '1', '1');
INSERT INTO `winstart_column_file` VALUES ('20', '2017-10-22 15:45:43', '1', '轮播图', '20171022154543', '0', '1', '1');
INSERT INTO `winstart_column_file` VALUES ('21', '2017-10-22 20:29:45', '1', '广告位', '20171022202945', '0', '1', '2');
INSERT INTO `winstart_column_file` VALUES ('22', '2017-10-22 20:54:17', '1', '轮播图脚本', '20171022205417', '2', '1', '1');

-- ----------------------------
-- Table structure for winstart_column_url
-- ----------------------------
DROP TABLE IF EXISTS `winstart_column_url`;
CREATE TABLE `winstart_column_url` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `url` varchar(64) NOT NULL DEFAULT '' COMMENT '连接关键字符串',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态 0隐藏，1正常',
  `sequence` int(4) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winstart_column_url
-- ----------------------------
INSERT INTO `winstart_column_url` VALUES ('4', '0000-00-00 00:00:00', '指纹密码锁', 'zhiwensuo', '1', '1');
INSERT INTO `winstart_column_url` VALUES ('1', '2017-10-22 20:54:17', '福维尔官网-指纹锁_智能锁_电子锁_智能门锁_机械防盗锁_EVVA锁芯_专注安全防盗_门锁私人订制生产厂家-让居住更安全、更方便', 'index', '0', '0');
INSERT INTO `winstart_column_url` VALUES ('5', '0000-00-00 00:00:00', '机械防盗锁', 'jixiesuo', '1', '2');
INSERT INTO `winstart_column_url` VALUES ('6', '0000-00-00 00:00:00', 'EVVA锁芯', 'evva', '1', '3');
INSERT INTO `winstart_column_url` VALUES ('7', '0000-00-00 00:00:00', '解决方案', 'solution', '1', '4');
INSERT INTO `winstart_column_url` VALUES ('8', '0000-00-00 00:00:00', '公司新闻', 'newlist', '1', '5');
INSERT INTO `winstart_column_url` VALUES ('9', '0000-00-00 00:00:00', '关于我们', 'aboutus', '1', '6');
INSERT INTO `winstart_column_url` VALUES ('10', '0000-00-00 00:00:00', '行业资讯', 'Information', '0', '5');

-- ----------------------------
-- Table structure for winstart_conifg
-- ----------------------------
DROP TABLE IF EXISTS `winstart_conifg`;
CREATE TABLE `winstart_conifg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` datetime DEFAULT '0000-00-00 00:00:00',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `value` text NOT NULL COMMENT '参数值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winstart_conifg
-- ----------------------------

-- ----------------------------
-- Table structure for winstart_log
-- ----------------------------
DROP TABLE IF EXISTS `winstart_log`;
CREATE TABLE `winstart_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '操作者id',
  `ip_address` int(32) unsigned NOT NULL DEFAULT '0' COMMENT '操作者ip地址',
  `record_table` varchar(32) NOT NULL DEFAULT '0' COMMENT '对象表格',
  `record_id` int(11) NOT NULL DEFAULT '0' COMMENT '操作数据条id',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '具体操作备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1809 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winstart_log
-- ----------------------------
INSERT INTO `winstart_log` VALUES ('1568', '2017-04-19 17:02:21', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1569', '2017-04-19 17:18:40', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1570', '2017-04-19 17:24:13', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1571', '2017-04-19 17:26:15', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1572', '2017-04-20 08:49:23', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1573', '2017-04-20 09:21:19', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1574', '2017-04-20 09:57:14', 'admin', '2130706433', 'auth_rule', '6', '新增用户组权限');
INSERT INTO `winstart_log` VALUES ('1575', '2017-04-20 09:57:19', 'admin', '2130706433', 'auth_url', '6', '删除用户组权限');
INSERT INTO `winstart_log` VALUES ('1576', '2017-04-20 09:57:28', 'admin', '2130706433', 'auth_rule', '7', '新增用户组权限');
INSERT INTO `winstart_log` VALUES ('1577', '2017-04-20 14:50:00', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1578', '2017-04-20 14:59:48', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1579', '2017-04-20 15:00:23', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1580', '2017-04-20 15:00:37', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1581', '2017-04-20 15:05:00', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1582', '2017-04-20 15:06:14', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1583', '2017-04-20 15:15:25', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1584', '2017-04-20 15:26:04', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1585', '2017-04-20 15:36:09', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1586', '2017-04-20 17:33:06', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1587', '2017-04-21 09:51:10', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1588', '2017-04-21 11:30:35', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1589', '2017-04-21 14:29:09', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1590', '2017-04-21 14:55:08', 'admin', '2130706433', 'auth_url', '139', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1591', '2017-04-21 14:58:07', 'admin', '2130706433', 'auth_url', '140', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1592', '2017-04-21 14:58:32', 'admin', '2130706433', 'auth_url', '141', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1593', '2017-04-21 14:59:01', 'admin', '2130706433', 'auth_url', '140', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1594', '2017-04-21 14:59:21', 'admin', '2130706433', 'auth_url', '141', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1595', '2017-04-21 14:59:49', 'admin', '2130706433', 'auth_url', '142', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1596', '2017-04-21 15:00:17', 'admin', '2130706433', 'auth_url', '143', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1597', '2017-04-21 15:00:39', 'admin', '2130706433', 'auth_url', '144', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1598', '2017-04-21 15:00:59', 'admin', '2130706433', 'auth_url', '145', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1599', '2017-04-21 15:01:23', 'admin', '2130706433', 'auth_url', '146', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1600', '2017-04-21 15:02:05', 'admin', '2130706433', 'auth_url', '147', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1601', '2017-04-21 15:02:40', 'admin', '2130706433', 'auth_url', '148', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1602', '2017-04-21 15:03:06', 'admin', '2130706433', 'auth_url', '149', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1603', '2017-04-21 15:55:01', 'admin', '1947963432', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1604', '2017-04-21 17:02:46', 'admin', '2130706433', 'commodity', '110', '新增商品信息');
INSERT INTO `winstart_log` VALUES ('1605', '2017-04-21 17:15:01', 'admin', '2130706433', 'commodity', '110', '编辑商品信息');
INSERT INTO `winstart_log` VALUES ('1606', '2017-04-21 17:15:20', 'admin', '2130706433', 'commodity', '110', '编辑商品信息');
INSERT INTO `winstart_log` VALUES ('1607', '2017-04-21 17:16:11', 'admin', '2130706433', 'commodity', '110', '编辑商品信息');
INSERT INTO `winstart_log` VALUES ('1608', '2017-04-21 23:34:57', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1609', '2017-04-22 10:02:11', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1610', '2017-04-22 11:35:01', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1611', '2017-04-22 11:35:24', 'admin', '2130706433', 'user', '24', '新增用户');
INSERT INTO `winstart_log` VALUES ('1612', '2017-04-22 15:34:49', 'admin', '2130706433', 'auth_url', '1', '编辑用户组权限');
INSERT INTO `winstart_log` VALUES ('1613', '2017-04-22 15:55:05', 'admin', '2130706433', 'auth_url', '1', '编辑用户组权限');
INSERT INTO `winstart_log` VALUES ('1614', '2017-04-22 15:56:02', 'admin', '2130706433', 'user', '25', '新增用户');
INSERT INTO `winstart_log` VALUES ('1615', '2017-04-22 15:56:31', 'admin', '2130706433', 'auth_url', '1', '编辑用户组权限');
INSERT INTO `winstart_log` VALUES ('1616', '2017-04-22 15:56:58', 'test', '2130706433', 'user', '25', '用户登录');
INSERT INTO `winstart_log` VALUES ('1617', '2017-04-22 15:57:21', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1618', '2017-04-22 15:58:10', 'admin', '2130706433', 'auth_url', '1', '编辑用户组权限');
INSERT INTO `winstart_log` VALUES ('1619', '2017-04-22 16:00:15', 'test', '2130706433', 'user', '25', '用户登录');
INSERT INTO `winstart_log` VALUES ('1620', '2017-04-22 16:01:37', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1621', '2017-04-22 16:02:17', 'admin', '2130706433', 'auth_url', '1', '编辑用户组权限');
INSERT INTO `winstart_log` VALUES ('1622', '2017-04-22 16:02:41', 'test', '2130706433', 'user', '25', '用户登录');
INSERT INTO `winstart_log` VALUES ('1623', '2017-04-22 16:05:16', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1624', '2017-04-22 16:05:32', 'admin', '2130706433', 'commodity_class', '61', '编辑商品分类');
INSERT INTO `winstart_log` VALUES ('1625', '2017-04-22 16:07:40', 'admin', '2130706433', 'auth_url', '1', '编辑用户组权限');
INSERT INTO `winstart_log` VALUES ('1626', '2017-04-22 16:08:43', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1627', '2017-04-22 16:09:44', 'test', '2130706433', 'user', '25', '用户登录');
INSERT INTO `winstart_log` VALUES ('1628', '2017-04-22 17:41:55', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1629', '2017-04-22 17:42:08', 'admin', '2130706433', 'auth_url', '1', '编辑用户组权限');
INSERT INTO `winstart_log` VALUES ('1630', '2017-04-22 17:42:25', 'test', '2130706433', 'user', '25', '用户登录');
INSERT INTO `winstart_log` VALUES ('1631', '2017-04-24 09:02:00', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1632', '2017-04-24 09:33:38', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1633', '2017-04-24 09:40:30', 'admin', '2130706433', 'auth_url', '150', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1634', '2017-04-24 09:41:13', 'admin', '2130706433', 'auth_url', '151', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1635', '2017-04-24 09:41:41', 'admin', '2130706433', 'auth_url', '152', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1636', '2017-04-24 09:42:04', 'admin', '2130706433', 'auth_url', '153', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1637', '2017-04-24 09:42:11', 'admin', '2130706433', 'auth_url', '152', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1638', '2017-04-24 11:27:36', 'admin', '2130706433', 'auth_url', '1', '编辑用户组权限');
INSERT INTO `winstart_log` VALUES ('1639', '2017-04-24 11:29:18', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1640', '2017-04-24 14:56:50', 'admin', '2130706433', 'goods_class', '63', '新增商品分类');
INSERT INTO `winstart_log` VALUES ('1641', '2017-04-24 15:30:08', 'admin', '2130706433', 'goods_class', '64', '新增商品分类');
INSERT INTO `winstart_log` VALUES ('1642', '2017-04-24 15:30:18', 'admin', '2130706433', 'goods_class', '65', '新增商品分类');
INSERT INTO `winstart_log` VALUES ('1643', '2017-04-24 15:30:22', 'admin', '2130706433', 'goods_class', '64', '编辑商品分类');
INSERT INTO `winstart_log` VALUES ('1644', '2017-04-24 15:30:29', 'admin', '2130706433', 'goods_class', '66', '新增商品分类');
INSERT INTO `winstart_log` VALUES ('1645', '2017-04-24 15:30:39', 'admin', '2130706433', 'goods_class', '67', '新增商品分类');
INSERT INTO `winstart_log` VALUES ('1646', '2017-04-24 15:51:04', 'admin', '2130706433', 'goods_class', '68', '新增商品分类');
INSERT INTO `winstart_log` VALUES ('1647', '2017-04-25 10:08:17', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1648', '2017-04-25 14:13:02', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1649', '2017-04-25 17:47:24', 'admin', '2130706433', 'auth_url', '154', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1650', '2017-04-25 17:47:53', 'admin', '2130706433', 'auth_url', '155', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1651', '2017-04-25 17:48:23', 'admin', '2130706433', 'auth_url', '156', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1652', '2017-04-25 22:05:24', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1653', '2017-04-26 08:37:36', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1654', '2017-04-26 15:14:16', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1655', '2017-04-26 15:15:40', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1656', '2017-04-26 16:32:38', 'admin', '2130706433', 'user', '26', '新增用户');
INSERT INTO `winstart_log` VALUES ('1657', '2017-04-27 08:57:55', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1658', '2017-04-27 09:24:21', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1659', '2017-04-27 09:54:50', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1660', '2017-04-27 11:21:07', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1661', '2017-04-27 11:43:48', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1662', '2017-04-27 14:24:22', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1663', '2017-04-28 10:12:19', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1664', '2017-05-06 09:06:53', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1665', '2017-05-08 15:04:44', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1666', '2017-05-09 09:25:50', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1667', '2017-05-11 09:00:11', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1668', '2017-05-11 09:06:28', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1669', '2017-05-11 09:37:25', 'admin', '2130706433', 'auth_rule', '157', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1670', '2017-05-11 09:38:19', 'admin', '2130706433', 'auth_rule', '158', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1671', '2017-05-11 09:38:40', 'admin', '2130706433', 'auth_rule', '159', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1672', '2017-05-12 14:01:20', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1673', '2017-05-12 14:07:48', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1674', '2017-05-13 09:12:58', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1675', '2017-05-13 09:20:21', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1676', '2017-05-13 15:55:38', 'admin', '2130706433', 'auth_rule', '160', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1677', '2017-05-13 15:55:59', 'admin', '2130706433', 'auth_rule', '160', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1678', '2017-05-13 15:56:33', 'admin', '2130706433', 'auth_rule', '161', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1679', '2017-05-13 17:01:54', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1680', '2017-05-13 17:22:51', 'admin', '2130706433', 'auth_rule', '162', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1681', '2017-05-13 17:23:45', 'admin', '2130706433', 'auth_rule', '163', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1682', '2017-05-13 17:31:08', 'admin', '2130706433', 'auth_rule', '164', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1683', '2017-05-13 18:02:16', 'admin', '2130706433', 'order', '214', '创建订单：V201705131801597245');
INSERT INTO `winstart_log` VALUES ('1684', '2017-05-15 09:41:10', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1685', '2017-05-15 09:45:12', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1686', '2017-05-15 10:34:39', 'admin', '2130706433', 'auth_rule', '165', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1687', '2017-05-15 11:38:27', 'admin', '2130706433', 'order', '1', '编辑用户组');
INSERT INTO `winstart_log` VALUES ('1688', '2017-05-15 14:27:39', 'admin', '2130706433', 'order', '207', '审核订单、');
INSERT INTO `winstart_log` VALUES ('1689', '2017-05-15 14:31:58', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1690', '2017-05-15 14:32:22', 'admin', '2130706433', 'user', '24', '用户信息修改');
INSERT INTO `winstart_log` VALUES ('1691', '2017-05-15 15:20:41', 'admin', '2130706433', 'order', '215', '创建订单：V201705151520247523');
INSERT INTO `winstart_log` VALUES ('1692', '2017-05-15 15:25:18', 'admin', '2130706433', 'order', '215', '编辑订单：V201705151520247523');
INSERT INTO `winstart_log` VALUES ('1693', '2017-05-15 15:34:06', 'admin', '2130706433', 'auth_rule', '157', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1694', '2017-05-15 15:35:50', 'admin', '2130706433', 'auth_rule', '166', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1695', '2017-05-15 15:37:35', 'admin', '2130706433', 'auth_rule', '167', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1696', '2017-05-15 15:38:32', 'admin', '2130706433', 'auth_rule', '168', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1697', '2017-05-15 15:38:58', 'admin', '2130706433', 'auth_rule', '169', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1698', '2017-05-15 15:39:32', 'admin', '2130706433', 'auth_rule', '170', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1699', '2017-05-15 15:39:46', 'admin', '2130706433', 'auth_rule', '170', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1700', '2017-05-15 15:41:16', 'admin', '2130706433', 'auth_rule', '163', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1701', '2017-05-15 15:41:24', 'admin', '2130706433', 'auth_rule', '165', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1702', '2017-05-15 15:42:59', 'admin', '2130706433', 'auth_rule', '157', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1703', '2017-05-15 15:43:17', 'admin', '2130706433', 'auth_rule', '157', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1704', '2017-05-15 15:43:25', 'admin', '2130706433', 'auth_rule', '157', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1705', '2017-05-15 15:43:48', 'admin', '2130706433', 'auth_rule', '171', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1706', '2017-05-15 15:44:01', 'admin', '2130706433', 'auth_rule', '157', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1707', '2017-05-15 16:19:02', 'admin', '2130706433', 'order', '215', '驳回订单、123');
INSERT INTO `winstart_log` VALUES ('1708', '2017-05-16 08:42:12', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1709', '2017-05-16 08:54:34', 'admin', '2130706433', 'user', '26', '修改密码');
INSERT INTO `winstart_log` VALUES ('1710', '2017-05-16 08:55:54', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1711', '2017-05-16 08:57:57', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1712', '2017-05-16 09:11:39', 'admin', '2130706433', 'order', '216', '创建订单：V201705160910335981');
INSERT INTO `winstart_log` VALUES ('1713', '2017-05-16 09:12:05', 'admin', '2130706433', 'order', '216', '驳回订单、111');
INSERT INTO `winstart_log` VALUES ('1714', '2017-05-16 09:20:41', 'admin', '2130706433', 'order', '216', ',重新激活为待审核');
INSERT INTO `winstart_log` VALUES ('1715', '2017-05-16 09:27:12', 'admin', '2130706433', 'order', '215', ',重新激活为待审核');
INSERT INTO `winstart_log` VALUES ('1716', '2017-05-16 09:28:25', 'admin', '2130706433', 'order', '206', '作废订单、');
INSERT INTO `winstart_log` VALUES ('1717', '2017-05-16 09:30:02', 'admin', '2130706433', 'order', '216', '驳回订单、23');
INSERT INTO `winstart_log` VALUES ('1718', '2017-05-16 09:33:01', 'admin', '2130706433', 'order', '216', '删除订单');
INSERT INTO `winstart_log` VALUES ('1719', '2017-05-16 09:33:10', 'admin', '2130706433', 'order', '215', '驳回订单、123');
INSERT INTO `winstart_log` VALUES ('1720', '2017-05-16 11:22:08', 'admin', '2130706433', 'auth_rule', '172', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1721', '2017-05-16 11:22:29', 'admin', '2130706433', 'auth_rule', '173', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1722', '2017-05-16 11:23:06', 'admin', '2130706433', 'auth_rule', '174', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1723', '2017-05-16 14:07:08', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1724', '2017-05-17 08:46:05', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1725', '2017-05-17 10:05:32', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1726', '2017-05-17 10:10:23', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1727', '2017-05-17 14:46:05', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1728', '2017-05-18 14:35:10', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1729', '2017-05-19 08:56:00', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1730', '2017-05-20 11:15:49', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1731', '2017-05-22 14:35:52', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1732', '2017-05-23 09:13:48', 'admin', '2130706433', 'order', '218', '审核订单、');
INSERT INTO `winstart_log` VALUES ('1733', '2017-05-23 09:13:53', 'admin', '2130706433', 'order', '219', '审核订单、');
INSERT INTO `winstart_log` VALUES ('1734', '2017-05-23 09:13:53', 'admin', '2130706433', 'order', '220', '审核订单、');
INSERT INTO `winstart_log` VALUES ('1735', '2017-05-23 09:13:53', 'admin', '2130706433', 'order', '221', '审核订单、');
INSERT INTO `winstart_log` VALUES ('1736', '2017-05-23 09:13:53', 'admin', '2130706433', 'order', '222', '审核订单、');
INSERT INTO `winstart_log` VALUES ('1737', '2017-05-23 09:13:53', 'admin', '2130706433', 'order', '223', '审核订单、');
INSERT INTO `winstart_log` VALUES ('1738', '2017-05-23 10:49:42', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1739', '2017-05-23 11:42:33', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1740', '2017-10-13 17:59:03', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1741', '2017-10-13 22:49:18', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1742', '2017-10-13 22:59:10', 'admin', '2130706433', 'user', '26', '修改密码');
INSERT INTO `winstart_log` VALUES ('1743', '2017-10-13 22:59:54', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1744', '2017-10-13 23:00:22', 'admin', '2130706433', 'user', '26', '修改密码');
INSERT INTO `winstart_log` VALUES ('1745', '2017-10-13 23:10:52', 'admin', '2130706433', 'user', '26', '用户信息修改');
INSERT INTO `winstart_log` VALUES ('1746', '2017-10-13 23:11:12', 'admin', '2130706433', 'user', '25', '用户信息修改');
INSERT INTO `winstart_log` VALUES ('1747', '2017-10-15 06:40:49', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1748', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1749', '2017-10-15 08:18:37', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1750', '2017-10-15 08:28:54', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1751', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1752', '2017-10-15 09:02:04', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1753', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1754', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '175', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1755', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '175', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1756', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '11', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1757', '2017-10-16 12:28:09', 'admin', '2130706433', 'user', '1', '用户登录');
INSERT INTO `winstart_log` VALUES ('1758', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '1', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1759', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '2', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1760', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '3', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1761', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '4', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1762', '2015-08-13 02:05:00', 'admin', '2130706433', 'auth_rule', '5', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1763', '2015-08-13 02:07:00', 'admin', '2130706433', 'auth_rule', '6', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1764', '2015-08-13 02:13:00', 'admin', '2130706433', 'auth_rule', '175', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1765', '2015-08-13 02:17:00', 'admin', '2130706433', 'auth_rule', '11', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1766', '2015-08-13 02:31:00', 'admin', '2130706433', 'auth_rule', '7', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1767', '2015-08-13 02:36:00', 'admin', '2130706433', 'auth_rule', '8', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1768', '2015-08-13 02:49:00', 'admin', '2130706433', 'auth_rule', '9', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1769', '2015-08-13 02:52:00', 'admin', '2130706433', 'auth_rule', '10', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1770', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '7', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1771', '2015-08-13 04:00:00', 'admin', '2130706433', 'auth_rule', '7', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1772', '2015-08-13 04:08:00', 'admin', '2130706433', 'auth_rule', '8', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1773', '2015-08-13 04:36:00', 'admin', '2130706433', 'auth_rule', '176', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1774', '2015-08-13 04:45:00', 'admin', '2130706433', 'auth_rule', '8', '新增员工组');
INSERT INTO `winstart_log` VALUES ('1775', '2015-08-13 06:05:00', 'admin', '2130706433', 'auth_rule', '8', '删除员工组权限');
INSERT INTO `winstart_log` VALUES ('1776', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '1', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1777', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '177', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1778', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '1', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1779', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '177', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1780', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '178', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1781', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '179', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1782', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '179', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1783', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '180', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1784', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '24', '删除员工');
INSERT INTO `winstart_log` VALUES ('1785', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '181', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1786', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '182', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1787', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '183', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1788', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '183', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1789', '2015-08-23 20:00:00', 'admin', '2130706433', 'auth_rule', '183', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1790', '2015-08-26 13:06:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1791', '2015-08-27 15:35:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1792', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1793', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '183', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1794', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '184', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1795', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '184', '编辑菜单导航');
INSERT INTO `winstart_log` VALUES ('1796', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1797', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1798', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1799', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1800', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1801', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1802', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1803', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1804', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '185', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1805', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '181', '删除菜单导航');
INSERT INTO `winstart_log` VALUES ('1806', '0000-00-00 00:00:00', 'admin', '2130706433', 'user', '1', '员工登录');
INSERT INTO `winstart_log` VALUES ('1807', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '186', '新增菜单导航');
INSERT INTO `winstart_log` VALUES ('1808', '0000-00-00 00:00:00', 'admin', '2130706433', 'auth_rule', '178', '编辑菜单导航');

-- ----------------------------
-- Table structure for winstart_user
-- ----------------------------
DROP TABLE IF EXISTS `winstart_user`;
CREATE TABLE `winstart_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '昵称',
  `username` varchar(64) NOT NULL DEFAULT '' COMMENT '账号',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户组id',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态 0禁用，1正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of winstart_user
-- ----------------------------
INSERT INTO `winstart_user` VALUES ('1', '2017-02-15 14:57:08', 'admin', 'admin', '4742f1af592d838e3b4eba0c0c3a32f6', '1', '1');
INSERT INTO `winstart_user` VALUES ('25', '2017-04-22 15:56:02', 'test', 'test', '4742f1af592d838e3b4eba0c0c3a32f6', '1', '0');
INSERT INTO `winstart_user` VALUES ('26', '2017-04-26 16:32:38', '111', 'qweqwe', 'f6cb136fde01326f1f3f176d72ca8604', '1', '0');

-- ----------------------------
-- View structure for goods_class_view
-- ----------------------------
DROP VIEW IF EXISTS `goods_class_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `goods_class_view` AS select `a`.`id` AS `id`,`a`.`name` AS `a_cname`,`b`.`name` AS `b_cname`,`c`.`name` AS `c_cname` from ((`jiushou_goods_class` `a` left join `jiushou_goods_class` `b` on((`a`.`pid` = `b`.`id`))) left join `jiushou_goods_class` `c` on((`b`.`pid` = `c`.`id`))) ;

-- ----------------------------
-- View structure for goods_view
-- ----------------------------
DROP VIEW IF EXISTS `goods_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `goods_view` AS select `winstart`.`jiushou_goods`.`id` AS `id`,`winstart`.`jiushou_goods`.`create_time` AS `create_time`,`winstart`.`jiushou_goods`.`name` AS `name`,`winstart`.`jiushou_goods`.`class_id` AS `class_id`,`winstart`.`jiushou_goods`.`bar_code` AS `bar_code`,`winstart`.`jiushou_goods`.`product_code` AS `product_code`,`winstart`.`jiushou_goods`.`min_price` AS `min_price`,`winstart`.`jiushou_goods`.`max_price` AS `max_price`,`winstart`.`jiushou_goods`.`img_url` AS `img_url`,`winstart`.`jiushou_goods`.`model` AS `model`,`winstart`.`jiushou_goods`.`unit` AS `unit`,`winstart`.`jiushou_goods`.`status` AS `status`,`winstart`.`jiushou_goods`.`currency` AS `currency`,`goods_class_view`.`a_cname` AS `a_cname`,`goods_class_view`.`b_cname` AS `b_cname`,`goods_class_view`.`c_cname` AS `c_cname`,`winstart`.`jiushou_goods`.`brokerage_type` AS `brokerage_type`,`winstart`.`jiushou_goods`.`brokerage_number` AS `brokerage_number` from (`jiushou_goods` left join `goods_class_view` on((`goods_class_view`.`id` = `winstart`.`jiushou_goods`.`class_id`))) ;

-- ----------------------------
-- View structure for title_view
-- ----------------------------
DROP VIEW IF EXISTS `title_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `title_view` AS select `a`.`id` AS `id`,`a`.`name` AS `a_title`,`b`.`name` AS `b_title`,`c`.`name` AS `c_title`,`b`.`url` AS `b_url`,`c`.`url` AS `c_url` from ((`jiushou_auth_url` `a` left join `jiushou_auth_url` `b` on((`a`.`pid` = `b`.`id`))) left join `jiushou_auth_url` `c` on((`b`.`pid` = `c`.`id`))) ;

-- ----------------------------
-- View structure for user_auth_view
-- ----------------------------
DROP VIEW IF EXISTS `user_auth_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_auth_view` AS select `winstart`.`jiushou_user`.`id` AS `id`,`winstart`.`jiushou_auth_rule`.`name` AS `group_name`,`winstart`.`jiushou_auth_rule`.`rule` AS `rule`,`winstart`.`jiushou_user`.`nickname` AS `nickname`,`winstart`.`jiushou_user`.`status` AS `status`,`winstart`.`jiushou_user`.`create_time` AS `create_time` from (`jiushou_user` left join `jiushou_auth_rule` on((`winstart`.`jiushou_user`.`group_id` = `winstart`.`jiushou_auth_rule`.`id`))) ;
