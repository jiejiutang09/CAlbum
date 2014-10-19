-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `calbum`
--

-- --------------------------------------------------------

CREATE TABLE `language` (
`lid` int(5) NOT NULL,
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
  `home` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `language` (`lid`, `language`, `username`, `password`, `email`, `login`, `logout`, `newpassword`, `confirm_newpassword`, `needtoenterpass`, `footer`, `modifydata`, `forgetpass`, `hi`, `submit`, `forgetemail`, `home`) VALUES
(1, 'en', 'Username', 'Password', 'Email', 'Login', 'Logout', 'New Password', 'Confirm Newpassword', 'To change user data, please enter the password first', NULL, 'Save', 'Forgot Password', 'Hi, ', 'Submit', 'If you don''t remember you Email, try to contact Website Manager', 'Home'),
(2, 'zh-tw', '帳號', '密碼', 'Email', '登入', '登出', '新密碼', '確認新密碼', '若要更動資料，您必須輸入密碼', 'Comic Album，由<a href="http://chivincent.github.io">ChiVincent</a>開發之開源相簿專案<br>繁體中文翻譯由<a href="http://chivincent.github.io">ChiVincent</a>製作', '更改資料', '忘記密碼', '安安，', '送出資料', '如果忘記您的Email，請聯繫網站管理員', '首頁');

-- --------------------------------------------------------


CREATE TABLE `system` (
`sid` bigint(20) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(200) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `create` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


INSERT INTO `system` (`sid`, `title`, `subtitle`, `language`, `create`) VALUES
(1, 'Comic Album', 'Demo Site', 'zh-tw', '2014-10-19 13:30:48');

-- --------------------------------------------------------


CREATE TABLE `user` (
`uid` int(5) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `user` (`uid`, `username`, `password`, `email`) VALUES
(3, 'root', '$2y$08$DRkaHgwRDwUIAwkBCyk1OeklLjRUR099rofxoT.c9tDJtBuzBi9l.', 'root@root');


ALTER TABLE `language`
 ADD PRIMARY KEY (`lid`);

ALTER TABLE `system`
 ADD PRIMARY KEY (`sid`);

ALTER TABLE `user`
 ADD PRIMARY KEY (`uid`);

ALTER TABLE `language`
MODIFY `lid` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

ALTER TABLE `system`
MODIFY `sid` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
資料表 AUTO_INCREMENT `user`

ALTER TABLE `user`
MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;