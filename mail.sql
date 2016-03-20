-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016-03-20 02:36:04
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mail`
--

-- --------------------------------------------------------

--
-- 表的结构 `mail_department`
--

CREATE TABLE IF NOT EXISTS `mail_department` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '部门id',
  `depname` varchar(30) NOT NULL COMMENT '部门名称',
  `createtime` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `mail_department`
--

INSERT INTO `mail_department` (`id`, `depname`, `createtime`) VALUES
(7, '科技部', '2016-03-07 16:53:58'),
(11, '技术部', '2016-03-14 21:16:59'),
(12, '供应部', '2016-03-14 21:18:32'),
(13, '生产部', '2016-03-14 21:18:48'),
(15, '质量部', '2016-03-14 21:24:51'),
(16, '宣传部', '2016-03-14 22:09:04');

-- --------------------------------------------------------

--
-- 表的结构 `mail_list_by_叶进龙`
--

CREATE TABLE IF NOT EXISTS `mail_list_by_叶进龙` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `revfrom` varchar(30) DEFAULT NULL,
  `sendto` varchar(30) DEFAULT NULL,
  `title` text,
  `content` longtext,
  `time` datetime DEFAULT NULL,
  `stat` int(2) DEFAULT NULL,
  `attach` int(2) DEFAULT NULL,
  `filename` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `mail_list_by_沈盼盼`
--

CREATE TABLE IF NOT EXISTS `mail_list_by_沈盼盼` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `revfrom` varchar(30) DEFAULT NULL,
  `sendto` varchar(30) DEFAULT NULL,
  `title` text,
  `content` longtext,
  `time` datetime DEFAULT NULL,
  `stat` int(2) DEFAULT NULL,
  `attach` int(2) DEFAULT NULL,
  `filename` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `mail_list_by_沈盼盼`
--

INSERT INTO `mail_list_by_沈盼盼` (`id`, `revfrom`, `sendto`, `title`, `content`, `time`, `stat`, `attach`, `filename`) VALUES
(1, '温德盛', NULL, 'ajax', 'jquery ajax', '2016-03-15 17:11:19', 0, 1, '数据库安装及使用.pdf'),
(2, '温德盛', NULL, 'testtesttest', 'testtesttest', '2016-03-17 23:55:17', 0, 1, 'JDK_API_1_6_zh_CN.CHM'),
(3, '温德盛', NULL, 'bbb', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-18 00:00:58\r\n\r\n          标题：testtesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-17 23:55:17\r\n\r\n          标题：testtesttest\r\n\r\n          正文：testtesttest                    ', '2016-03-18 00:08:11', 0, 1, 'JDK_API_1_6_zh_CN.CHM'),
(4, '郑经伟', NULL, '4', '          444444444\r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-18 08:37:50\r\n\r\n          标题：3\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：田志远\r\n\r\n          发送时间：2016-03-18 08:36:58\r\n\r\n          标题：2\r\n\r\n          正文：2222                    ', '2016-03-18 08:39:10', 0, 1, '配置php.ini上传文件大小.txt');

-- --------------------------------------------------------

--
-- 表的结构 `mail_list_by_温德盛`
--

CREATE TABLE IF NOT EXISTS `mail_list_by_温德盛` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `revfrom` varchar(30) DEFAULT NULL,
  `sendto` varchar(30) DEFAULT NULL,
  `title` text,
  `content` longtext,
  `time` datetime DEFAULT NULL,
  `stat` int(2) NOT NULL COMMENT '邮件收/发/删除状态(0/1/2)',
  `attach` int(2) NOT NULL COMMENT '是否有附件(1/0)',
  `filename` varchar(120) NOT NULL COMMENT '附件名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

--
-- 转存表中的数据 `mail_list_by_温德盛`
--

INSERT INTO `mail_list_by_温德盛` (`id`, `revfrom`, `sendto`, `title`, `content`, `time`, `stat`, `attach`, `filename`) VALUES
(10, NULL, '郑经伟', '郑经伟', '沙发上大概', '2016-03-08 21:59:32', 1, 0, ''),
(14, NULL, '温德盛', '无附件', '', '2016-03-09 22:00:42', 1, 0, ''),
(16, NULL, '温德盛', '有附件', '', '2016-03-09 22:02:16', 1, 1, 'jia_k.pdf'),
(18, NULL, '郑经伟', '郑经伟是个哈斯儿', '郑茎萎', '2016-03-09 22:26:24', 1, 1, 'php_manual_zh_review.chm'),
(19, NULL, '郑经伟', '中文附件', '', '2016-03-09 22:35:23', 1, 1, '位运算.txt'),
(20, NULL, '郑经伟', '郑茎萎是个哈斯儿', '', '2016-03-09 22:38:48', 1, 1, '战争与革命中的西南联大台版.pdf'),
(45, NULL, '温德盛', '试试就试试', '', '2016-03-11 14:40:08', 1, 1, '位运算.txt'),
(57, NULL, '温德盛', '啊刚刚打啥水果的撒公司大啊广东省的哈哈等哈啊广东省的哈哈等哈啊广东省的哈哈等哈啊广东省的哈哈等哈', '', '2016-03-13 16:02:44', 1, 0, ''),
(58, '温德盛', NULL, '啊刚刚打啥水果的撒公司大啊广东省的哈哈等哈啊广东省的哈哈等哈啊广东省的哈哈等哈啊广东省的哈哈等哈', '', '2016-03-13 16:02:44', 0, 0, ''),
(85, NULL, '温德盛', '单发', '单发', '2016-03-14 17:38:28', 1, 0, ''),
(86, '温德盛', NULL, '单发', '单发', '2016-03-14 17:38:28', 0, 0, ''),
(87, NULL, '郑经伟', '单发（带附件）', '', '2016-03-14 17:39:40', 1, 1, '7887e2a7jw1e7nds3d6cog20b4069kj2.gif'),
(89, '温德盛', NULL, '群发', '群发', '2016-03-14 17:40:18', 2, 0, ''),
(90, '郑经伟', NULL, '群发（带附件）', '群发', '2016-03-14 17:42:38', 2, 1, '2012碉堡视频集锦.flv'),
(91, NULL, '温德盛;郑经伟;林左鸣;沈盼盼;', 'ajax', 'jquery ajax', '2016-03-15 17:11:19', 1, 1, '数据库安装及使用.pdf'),
(92, '温德盛', NULL, 'ajax', 'jquery ajax', '2016-03-15 17:11:19', 2, 1, '数据库安装及使用.pdf'),
(93, NULL, '温德盛', '转发测试', '转发测试', '2016-03-17 00:11:39', 1, 1, 'CAPP工艺从定义到PDM系统集成.docx'),
(99, NULL, '郑经伟;田志远;温德盛;', '转发（带附件）', '          \r\n转发（带附件）\r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-17 18:09:37\r\n\r\n          标题：test\r\n\r\n          正文：          ', '2016-03-17 22:15:13', 1, 1, 'mysql.chm'),
(101, NULL, '温德盛', 'test', '          \n\n          \n\n          \n\n          \n\n          原始发件人：温德盛\n\n          发送时间：2016-03-17 18:09:37\n\n          标题：test\n\n          正文：          ', '2016-03-17 22:23:27', 1, 0, ''),
(117, NULL, '田志远;郑经伟;', 'aaa', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-18 00:02:11\r\n\r\n          标题：testtesttesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-18 00:00:58\r\n\r\n          标题：testtesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-17 23:55:17\r\n\r\n          标题：testtesttest\r\n\r\n          正文：testtesttest                              ', '2016-03-18 00:07:26', 1, 1, 'JDK_API_1_6_zh_CN.CHM'),
(118, NULL, '沈盼盼;马赞军;', 'bbb', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-18 00:00:58\r\n\r\n          标题：testtesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-17 23:55:17\r\n\r\n          标题：testtesttest\r\n\r\n          正文：testtesttest                    ', '2016-03-18 00:08:11', 1, 1, 'JDK_API_1_6_zh_CN.CHM'),
(119, NULL, '田志远', '1', '', '2016-03-18 08:34:35', 1, 1, '位运算.txt'),
(120, '田志远', NULL, '2', '2222', '2016-03-18 08:36:58', 0, 1, '配置php.ini上传文件大小.txt'),
(121, NULL, '郑经伟', '3', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：田志远\r\n\r\n          发送时间：2016-03-18 08:36:58\r\n\r\n          标题：2\r\n\r\n          正文：2222          ', '2016-03-18 08:37:50', 1, 1, '配置php.ini上传文件大小.txt'),
(122, '马赞军', NULL, '5', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：郑经伟\r\n\r\n          发送时间：2016-03-18 08:39:10\r\n\r\n          标题：4\r\n\r\n          正文：          444444444\r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-18 08:37:50\r\n\r\n          标题：3\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：田志远\r\n\r\n          发送时间：2016-03-18 08:36:58\r\n\r\n          标题：2\r\n\r\n          正文：2222                              ', '2016-03-18 08:40:38', 0, 0, ''),
(124, NULL, '温德盛', '回复测试', '回复回复', '2016-03-18 09:55:50', 1, 1, '2015.11.01.docx'),
(125, '温德盛', NULL, '回复测试', '回复回复', '2016-03-18 09:55:50', 0, 1, '2015.11.01.docx'),
(126, NULL, '温德盛;田志远;', '哈哈哈哈', '', '2016-03-20 01:20:48', 1, 0, ''),
(127, '温德盛', NULL, '哈哈哈哈', '', '2016-03-20 01:20:48', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `mail_list_by_田志远`
--

CREATE TABLE IF NOT EXISTS `mail_list_by_田志远` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `revfrom` varchar(30) DEFAULT NULL,
  `sendto` varchar(30) DEFAULT NULL,
  `title` text,
  `content` longtext,
  `time` datetime DEFAULT NULL,
  `stat` int(2) DEFAULT NULL,
  `attach` int(2) DEFAULT NULL,
  `filename` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `mail_list_by_田志远`
--

INSERT INTO `mail_list_by_田志远` (`id`, `revfrom`, `sendto`, `title`, `content`, `time`, `stat`, `attach`, `filename`) VALUES
(2, '温德盛', NULL, 'testtest', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-17 18:09:37\r\n\r\n          标题：test\r\n\r\n          正文：          ', '2016-03-17 23:20:06', 0, 0, ''),
(3, '温德盛', NULL, 'testtest', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-17 18:09:37\r\n\r\n          标题：test\r\n\r\n          正文：          ', '2016-03-17 23:54:06', 0, 1, 'mysql.chm'),
(4, '温德盛', NULL, 'testtesttesttesttest', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-18 00:00:58\r\n\r\n          标题：testtesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-17 23:55:17\r\n\r\n          标题：testtesttest\r\n\r\n          正文：testtesttest                    ', '2016-03-18 00:02:11', 0, 1, 'JDK_API_1_6_zh_CN.CHM'),
(5, '温德盛', NULL, 'aaa', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-18 00:02:11\r\n\r\n          标题：testtesttesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-18 00:00:58\r\n\r\n          标题：testtesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-17 23:55:17\r\n\r\n          标题：testtesttest\r\n\r\n          正文：testtesttest                              ', '2016-03-18 00:07:26', 0, 1, 'JDK_API_1_6_zh_CN.CHM'),
(6, '温德盛', NULL, '1', '', '2016-03-18 08:34:35', 0, 1, '位运算.txt'),
(7, NULL, '温德盛;郑经伟;', '2', '2222', '2016-03-18 08:36:58', 1, 1, '配置php.ini上传文件大小.txt'),
(8, '温德盛', NULL, '哈哈哈哈', '', '2016-03-20 01:20:48', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `mail_list_by_郑经伟`
--

CREATE TABLE IF NOT EXISTS `mail_list_by_郑经伟` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `revfrom` varchar(30) DEFAULT NULL,
  `sendto` varchar(30) DEFAULT NULL,
  `title` text,
  `content` longtext,
  `time` datetime DEFAULT NULL,
  `stat` int(2) DEFAULT NULL,
  `attach` int(2) NOT NULL COMMENT '是否有附件(1/0)',
  `filename` varchar(120) NOT NULL COMMENT '附件名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `mail_list_by_郑经伟`
--

INSERT INTO `mail_list_by_郑经伟` (`id`, `revfrom`, `sendto`, `title`, `content`, `time`, `stat`, `attach`, `filename`) VALUES
(1, NULL, '温德盛', '啊多发高发', '噶似的噶似的和', '2016-03-08 11:01:05', 1, 0, ''),
(4, '温德盛', NULL, '郑经伟', '沙发上大概', '2016-03-08 21:59:32', 0, 0, ''),
(5, '温德盛', NULL, '郑经伟是个哈斯儿', '郑茎萎', '2016-03-09 22:26:24', 0, 1, 'php_manual_zh_review.chm'),
(6, '温德盛', NULL, '中文附件', '', '2016-03-09 22:35:23', 0, 1, '位运算.txt'),
(7, '温德盛', NULL, '郑茎萎是个哈斯儿', '', '2016-03-09 22:38:48', 0, 1, '战争与革命中的西南联大台版.pdf'),
(8, NULL, '林左鸣', '在试试', '试试', '2016-03-10 09:41:01', 1, 1, '新建 Microsoft Word 文档.docx'),
(9, NULL, '郑经伟', '郑茎萎', '郑经伟是个什么', '2016-03-12 23:06:32', 1, 1, '待实现功能.docx'),
(10, '郑经伟', NULL, '郑茎萎', '郑经伟是个什么', '2016-03-12 23:06:32', 2, 1, '待实现功能.docx'),
(28, '温德盛', NULL, '单发（带附件）', '', '2016-03-14 17:39:40', 0, 1, '7887e2a7jw1e7nds3d6cog20b4069kj2.gif'),
(29, '温德盛', NULL, '群发', '群发', '2016-03-14 17:40:18', 0, 0, ''),
(30, NULL, '林左鸣;温德盛;', '群发（带附件）', '群发', '2016-03-14 17:42:38', 1, 1, '2012碉堡视频集锦.flv'),
(31, '温德盛', NULL, 'ajax', 'jquery ajax', '2016-03-15 17:11:19', 0, 1, '数据库安装及使用.pdf'),
(33, '温德盛', NULL, 'testtest', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-17 18:09:37\r\n\r\n          标题：test\r\n\r\n          正文：          ', '2016-03-17 23:54:06', 0, 1, 'mysql.chm'),
(34, '温德盛', NULL, 'testtesttesttest', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-17 23:55:17\r\n\r\n          标题：testtesttest\r\n\r\n          正文：testtesttest          ', '2016-03-18 00:00:58', 0, 1, 'JDK_API_1_6_zh_CN.CHM'),
(35, '温德盛', NULL, 'testtesttesttesttest', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-18 00:00:58\r\n\r\n          标题：testtesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-17 23:55:17\r\n\r\n          标题：testtesttest\r\n\r\n          正文：testtesttest                    ', '2016-03-18 00:02:11', 0, 1, 'JDK_API_1_6_zh_CN.CHM'),
(36, '温德盛', NULL, '', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-18 00:02:11\r\n\r\n          标题：testtesttesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-18 00:00:58\r\n\r\n          标题：testtesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-17 23:55:17\r\n\r\n          标题：testtesttest\r\n\r\n          正文：testtesttest                              ', '2016-03-18 00:06:39', 0, 1, 'JDK_API_1_6_zh_CN.CHM'),
(37, '温德盛', NULL, 'aaa', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-18 00:02:11\r\n\r\n          标题：testtesttesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-18 00:00:58\r\n\r\n          标题：testtesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-17 23:55:17\r\n\r\n          标题：testtesttest\r\n\r\n          正文：testtesttest                              ', '2016-03-18 00:07:26', 0, 1, 'JDK_API_1_6_zh_CN.CHM'),
(38, '田志远', NULL, '2', '2222', '2016-03-18 08:36:58', 0, 1, '配置php.ini上传文件大小.txt'),
(39, '温德盛', NULL, '3', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：田志远\r\n\r\n          发送时间：2016-03-18 08:36:58\r\n\r\n          标题：2\r\n\r\n          正文：2222          ', '2016-03-18 08:37:50', 0, 1, '配置php.ini上传文件大小.txt'),
(40, NULL, '沈盼盼;马赞军;', '4', '          444444444\r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-18 08:37:50\r\n\r\n          标题：3\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：田志远\r\n\r\n          发送时间：2016-03-18 08:36:58\r\n\r\n          标题：2\r\n\r\n          正文：2222                    ', '2016-03-18 08:39:10', 1, 1, '配置php.ini上传文件大小.txt');

-- --------------------------------------------------------

--
-- 表的结构 `mail_list_by_马赞军`
--

CREATE TABLE IF NOT EXISTS `mail_list_by_马赞军` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `revfrom` varchar(30) DEFAULT NULL,
  `sendto` varchar(30) DEFAULT NULL,
  `title` text,
  `content` longtext,
  `time` datetime DEFAULT NULL,
  `stat` int(2) DEFAULT NULL,
  `attach` int(2) DEFAULT NULL,
  `filename` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `mail_list_by_马赞军`
--

INSERT INTO `mail_list_by_马赞军` (`id`, `revfrom`, `sendto`, `title`, `content`, `time`, `stat`, `attach`, `filename`) VALUES
(1, '温德盛', NULL, 'testtesttest', 'testtesttest', '2016-03-17 23:55:17', 0, 1, 'JDK_API_1_6_zh_CN.CHM'),
(2, '温德盛', NULL, 'bbb', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-18 00:00:58\r\n\r\n          标题：testtesttesttest\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：\r\n\r\n          发送时间：2016-03-17 23:55:17\r\n\r\n          标题：testtesttest\r\n\r\n          正文：testtesttest                    ', '2016-03-18 00:08:11', 0, 1, 'JDK_API_1_6_zh_CN.CHM'),
(3, '郑经伟', NULL, '4', '          444444444\r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-18 08:37:50\r\n\r\n          标题：3\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：田志远\r\n\r\n          发送时间：2016-03-18 08:36:58\r\n\r\n          标题：2\r\n\r\n          正文：2222                    ', '2016-03-18 08:39:10', 0, 1, '配置php.ini上传文件大小.txt'),
(4, NULL, '温德盛;', '5', '          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：郑经伟\r\n\r\n          发送时间：2016-03-18 08:39:10\r\n\r\n          标题：4\r\n\r\n          正文：          444444444\r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：温德盛\r\n\r\n          发送时间：2016-03-18 08:37:50\r\n\r\n          标题：3\r\n\r\n          正文：          \r\n\r\n          \r\n\r\n          \r\n\r\n          \r\n\r\n          原始发件人：田志远\r\n\r\n          发送时间：2016-03-18 08:36:58\r\n\r\n          标题：2\r\n\r\n          正文：2222                              ', '2016-03-18 08:40:38', 1, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `mail_user`
--

CREATE TABLE IF NOT EXISTS `mail_user` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(120) NOT NULL COMMENT '密码',
  `depname` varchar(30) NOT NULL COMMENT '部门',
  `registertime` datetime NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `mail_user`
--

INSERT INTO `mail_user` (`id`, `username`, `password`, `depname`, `registertime`) VALUES
(1, 'admin', '68e3a416b10eff8985b513b704e1660e', '科技部', '2016-03-04 22:24:46'),
(2, '温德盛', '68e3a416b10eff8985b513b704e1660e', '科技部', '2016-03-04 22:28:18'),
(8, '郑经伟', '68e3a416b10eff8985b513b704e1660e', '科技部', '2016-03-08 11:00:18'),
(30, '沈盼盼', '68e3a416b10eff8985b513b704e1660e', '宣传部', '2016-03-14 22:17:13'),
(31, '马赞军', '68e3a416b10eff8985b513b704e1660e', '技术部', '2016-03-16 16:36:31'),
(32, '田志远', '68e3a416b10eff8985b513b704e1660e', '科技部', '2016-03-16 16:36:45'),
(34, '叶进龙', '68e3a416b10eff8985b513b704e1660e', '供应部', '2016-03-18 15:27:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
