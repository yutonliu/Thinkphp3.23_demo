/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : thinkphp

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2017-03-12 21:47:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for think_form
-- ----------------------------
DROP TABLE IF EXISTS `think_form`;
CREATE TABLE `think_form` (
  `form_id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `created_time` timestamp NULL DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`form_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_form
-- ----------------------------
INSERT INTO `think_form` VALUES ('1', 'mark1', 'hi', '40', null, null);
INSERT INTO `think_form` VALUES ('2', 'mark2', 'hello', '50', null, null);
INSERT INTO `think_form` VALUES ('3', 'mark3', 'he', '50', null, null);
INSERT INTO `think_form` VALUES ('4', 'mark4', 'she', '50', null, null);
INSERT INTO `think_form` VALUES ('5', 'mark5', 'holy', '50', null, null);
INSERT INTO `think_form` VALUES ('6', 'mark6', 'hot', '50', null, null);
INSERT INTO `think_form` VALUES ('7', 'mark7', 'home', '50', null, null);
INSERT INTO `think_form` VALUES ('8', 'mark8', 'house', '50', null, null);
INSERT INTO `think_form` VALUES ('9', 'mark9', 'how', '50', null, null);
INSERT INTO `think_form` VALUES ('10', 'mark10', 'hi', '40', null, null);
INSERT INTO `think_form` VALUES ('11', 'mark11', 'hello', '50', null, null);
INSERT INTO `think_form` VALUES ('12', 'mark12', 'he', '50', null, null);
INSERT INTO `think_form` VALUES ('13', 'mark13', 'she', '50', null, null);
INSERT INTO `think_form` VALUES ('14', 'mark14', 'holy', '50', null, null);
INSERT INTO `think_form` VALUES ('15', 'mark15', 'hot', '50', null, null);
INSERT INTO `think_form` VALUES ('16', 'mark16', 'home', '50', null, null);
