/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 80016
Source Host           : 127.0.0.1:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 80016
File Encoding         : 65001

Date: 2019-09-19 16:36:33
*/

SET FOREIGN_KEY_CHECKS=0;


-- ----------------------------
-- Records of blog_admin_menus
-- ----------------------------
INSERT INTO `blog_admin_menus` VALUES ('1', '0', '系统管理', '#', '0', 'setting', '1', '0', '2019-09-19 15:24:38', '2019-09-19 15:24:40', null);
INSERT INTO `blog_admin_menus` VALUES ('2', '1', '菜单管理', '/menu/index', '1', null, '2', '0', '2019-09-19 15:25:32', '2019-09-19 15:25:36', null);
INSERT INTO `blog_admin_menus` VALUES ('3', '2', '列表', null, '2', null, '1', '0', '2019-09-19 15:30:23', '2019-09-19 15:30:23', 'api.menus.list');
INSERT INTO `blog_admin_menus` VALUES ('4', '2', '新增', null, '2', null, '2', '0', '2019-09-19 15:31:41', '2019-09-19 15:31:41', 'api.menus.store');
INSERT INTO `blog_admin_menus` VALUES ('5', '2', '更新', null, '2', null, '3', '0', '2019-09-19 15:32:18', '2019-09-19 15:32:18', 'api.menus.update');
INSERT INTO `blog_admin_menus` VALUES ('6', '2', '删除', null, '2', null, '4', '0', '2019-09-19 15:33:01', '2019-09-19 15:33:01', 'api.menus.destroy');
INSERT INTO `blog_admin_menus` VALUES ('7', '1', '角色管理', '/role/index', '1', null, '3', '0', '2019-09-19 15:34:07', '2019-09-19 15:34:07', null);
INSERT INTO `blog_admin_menus` VALUES ('8', '7', '列表', null, '2', null, '1', '0', '2019-09-19 15:34:59', '2019-09-19 15:34:59', 'api.roles.list');
INSERT INTO `blog_admin_menus` VALUES ('9', '7', '新增', null, '2', null, '2', '0', '2019-09-19 15:35:42', '2019-09-19 15:35:42', 'api.roles.store');
INSERT INTO `blog_admin_menus` VALUES ('10', '7', '更新', null, '2', null, '3', '0', '2019-09-19 15:36:10', '2019-09-19 15:36:10', 'api.roles.update');
INSERT INTO `blog_admin_menus` VALUES ('11', '7', '删除', null, '2', null, '4', '0', '2019-09-19 15:36:30', '2019-09-19 15:36:30', 'api.roles.destroy');
INSERT INTO `blog_admin_menus` VALUES ('12', '1', '用户管理', '/user/index', '1', null, '4', '0', '2019-09-19 15:37:41', '2019-09-19 15:37:41', null);
INSERT INTO `blog_admin_menus` VALUES ('13', '12', '列表', null, '2', null, '1', '0', '2019-09-19 15:38:07', '2019-09-19 15:38:07', 'api.user.list');
INSERT INTO `blog_admin_menus` VALUES ('14', '12', '新增', null, '2', null, '2', '0', '2019-09-19 15:38:33', '2019-09-19 15:38:33', 'api.user.store');
INSERT INTO `blog_admin_menus` VALUES ('15', '12', '更新', null, '2', null, '3', '0', '2019-09-19 15:38:33', '2019-09-19 15:38:33', 'api.user.update');
INSERT INTO `blog_admin_menus` VALUES ('16', '12', '删除', null, '2', null, '4', '0', '2019-09-19 15:39:32', '2019-09-19 15:39:32', 'api.user.destroy');
INSERT INTO `blog_admin_menus` VALUES ('17', '0', 'Icons', '#', '0', 'icon', '2', '0', '2019-09-19 15:41:33', '2019-09-19 16:25:44', null);
INSERT INTO `blog_admin_menus` VALUES ('18', '0', 'ErrorPages', '#', '0', '404', '3', '0', '2019-09-19 15:43:14', '2019-09-19 16:26:48', null);
INSERT INTO `blog_admin_menus` VALUES ('19', '17', '图标列表', '/icons/index', '1', null, '1', '0', '2019-09-19 16:26:21', '2019-09-19 16:26:21', null);
INSERT INTO `blog_admin_menus` VALUES ('20', '18', '401', '/error-page/401', '1', null, '1', '0', '2019-09-19 16:27:36', '2019-09-19 16:27:36', null);
INSERT INTO `blog_admin_menus` VALUES ('21', '18', '404', '/error-page/404', '1', null, '2', '0', '2019-09-19 16:28:00', '2019-09-19 16:28:00', null);

-- ----------------------------
-- Records of blog_admin_users
-- ----------------------------
INSERT INTO `blog_admin_users` VALUES ('1', 'admin', 'Adalberto Reinger', 'https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=1544401333,526076356&fm=26&gp=0.jpg', '6162e804bde9da66de96d3e69c56d061', '543492227@qq.com', '18501690304', '0', '1', '2019-09-19 15:17:41', '2019-09-19 15:17:42');

-- ----------------------------
-- Records of blog_admin_roles
-- ----------------------------
INSERT INTO `blog_admin_roles` VALUES ('1', 'admin', '超级管理员', '1', '0', '2019-09-19 15:26:48', '2019-09-19 16:36:05');


-- ----------------------------
-- Records of blog_admin_role_users
-- ----------------------------
INSERT INTO `blog_admin_role_users` VALUES ('1', '1', '1');


-- ----------------------------
-- Records of blog_admin_role_menus
-- ----------------------------
INSERT INTO `blog_admin_role_menus` VALUES ('1', '1', '1');
INSERT INTO `blog_admin_role_menus` VALUES ('2', '1', '2');
INSERT INTO `blog_admin_role_menus` VALUES ('3', '1', '3');
INSERT INTO `blog_admin_role_menus` VALUES ('4', '1', '4');
INSERT INTO `blog_admin_role_menus` VALUES ('5', '1', '5');
INSERT INTO `blog_admin_role_menus` VALUES ('6', '1', '6');
INSERT INTO `blog_admin_role_menus` VALUES ('7', '1', '7');
INSERT INTO `blog_admin_role_menus` VALUES ('8', '1', '8');
INSERT INTO `blog_admin_role_menus` VALUES ('9', '1', '9');
INSERT INTO `blog_admin_role_menus` VALUES ('10', '1', '10');
INSERT INTO `blog_admin_role_menus` VALUES ('11', '1', '11');
INSERT INTO `blog_admin_role_menus` VALUES ('12', '1', '12');
INSERT INTO `blog_admin_role_menus` VALUES ('13', '1', '13');
INSERT INTO `blog_admin_role_menus` VALUES ('14', '1', '14');
INSERT INTO `blog_admin_role_menus` VALUES ('15', '1', '15');
INSERT INTO `blog_admin_role_menus` VALUES ('16', '1', '16');
INSERT INTO `blog_admin_role_menus` VALUES ('17', '1', '17');
INSERT INTO `blog_admin_role_menus` VALUES ('18', '1', '19');
INSERT INTO `blog_admin_role_menus` VALUES ('19', '1', '18');
INSERT INTO `blog_admin_role_menus` VALUES ('20', '1', '20');
INSERT INTO `blog_admin_role_menus` VALUES ('21', '1', '21');







