/*
 Navicat MySQL Data Transfer

 Source Server         : localhost_root
 Source Server Type    : MySQL
 Source Server Version : 50538
 Source Host           : localhost
 Source Database       : calbum

 Target Server Type    : MySQL
 Target Server Version : 50538
 File Encoding         : utf-8

 Date: 10/20/2014 22:19:14 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `language`
-- ----------------------------
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `lid` int(5) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logout` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `newpassword` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirm_newpassword` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `needtoenterpass` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modifydata` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgetpass` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submit` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgetemail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `systemsetting` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maintancemode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accountsetting` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `albumsetting` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `newalbum` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploadpic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delalbum` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `editalbum` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loginerror` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `No` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `useragent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `language`
-- ----------------------------
BEGIN;
INSERT INTO `language` VALUES ('1', 'en', 'Username', 'Password', 'Email', 'Login', 'Logout', 'New Password', 'Confirm Newpassword', 'To change user data, please enter the password first', null, 'Save', 'Forgot Password', 'Hi, ', 'Submit', 'If you don\'t remember you Email, try to contact Website Manager', 'Home', 'Setting', 'Title', 'Sub-Title', 'Maintance Mode', 'Language', 'Account Setting', 'Album Setting', 'New Album', 'Upload', 'Delete Album', 'Edit Album', 'Login Log', 'No. ', 'Time', 'User Agent'), ('2', 'zh-tw', '帳號', '密碼', 'Email', '登入', '登出', '新密碼', '確認新密碼', '若要更動資料，您必須輸入密碼', 'Comic Album，由<a href=\"http://chivincent.github.io\">ChiVincent</a>開發之開源相簿專案<br>繁體中文翻譯由<a href=\"http://chivincent.github.io\">ChiVincent</a>製作', '更改資料', '忘記密碼', '安安，', '送出資料', '如果忘記您的Email，請聯繫網站管理員', '首頁', '系統設定', '網站名稱', '副標題', '維護模式', '語言', '帳號設定', '相簿設定', '新增相簿', '上傳圖片', '刪除相簿', '編輯相簿', '登入錯誤記錄', '編號', '時間', '使用者裝置');
COMMIT;

-- ----------------------------
--  Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `logid` bigint(30) NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `HTTP_CLIENT_IP` varchar(100) DEFAULT NULL,
  `HTTP_X_FORWARDED_FOR` varchar(100) DEFAULT NULL,
  `HTTP_VIA` varchar(100) DEFAULT NULL,
  `REMOTE_ADDR` varchar(100) DEFAULT NULL,
  `ua` text,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `system`
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `sid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(200) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `system`
-- ----------------------------
BEGIN;
INSERT INTO `system` VALUES ('1', 'Comic Album', 'Demo Site', 'zh-tw', '2014-10-20 20:55:36');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('3', 'root', '$2y$08$DRkaHgwRDwUIAwkBCyk1OeklLjRUR099rofxoT.c9tDJtBuzBi9l.', 'root@root');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
