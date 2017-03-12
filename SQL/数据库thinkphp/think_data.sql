/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : thinkphp

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2017-03-12 21:46:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for think_data
-- ----------------------------
DROP TABLE IF EXISTS `think_data`;
CREATE TABLE `think_data` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `data` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0' COMMENT '0 未删除 1 已删除',
  `form_id` int(11) DEFAULT NULL,
  `easy_hard` int(11) DEFAULT '0' COMMENT '0 简单  1一般',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_data
-- ----------------------------
INSERT INTO `think_data` VALUES ('1', 'thinkphp556', '0', '1', '1');
INSERT INTO `think_data` VALUES ('2', 'php6', '0', '2', '1');
INSERT INTO `think_data` VALUES ('3', 'framework6', '0', '3', '1');
INSERT INTO `think_data` VALUES ('4', 'Python6', '0', '4', '1');
INSERT INTO `think_data` VALUES ('5', 'Ruby6', '0', '5', '0');
INSERT INTO `think_data` VALUES ('6', 'GoLang6', '0', '6', '0');
INSERT INTO `think_data` VALUES ('7', 'Swoole6', '0', '7', '0');
INSERT INTO `think_data` VALUES ('8', 'workman6', '0', '8', '0');
INSERT INTO `think_data` VALUES ('9', 'javascript6', '0', '9', '1');
INSERT INTO `think_data` VALUES ('10', 'jquery6', '0', '10', '1');
INSERT INTO `think_data` VALUES ('11', 'Linux6', '0', '11', '1');
INSERT INTO `think_data` VALUES ('12', 'Ajax', '0', '12', '1');
INSERT INTO `think_data` VALUES ('13', 'NodeJs', '0', '13', '1');
INSERT INTO `think_data` VALUES ('14', 'C++', '0', '14', '1');
INSERT INTO `think_data` VALUES ('15', 'C#', '0', '15', '1');
INSERT INTO `think_data` VALUES ('16', 'VB', '0', '16', '0');
INSERT INTO `think_data` VALUES ('17', 'mark', '0', '17', '0');
INSERT INTO `think_data` VALUES ('18', 'liu', '0', '18', '0');
INSERT INTO `think_data` VALUES ('19', 'tom', '0', '19', '1');
INSERT INTO `think_data` VALUES ('20', 'james', '0', '20', '1');
INSERT INTO `think_data` VALUES ('21', 'bruce', '0', '21', '0');
