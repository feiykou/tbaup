/*
Navicat MySQL Data Transfer

Source Server         : gkmotor
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : bigwu

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-26 18:28:08
*/

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `tb_brand`;
CREATE TABLE `tb_brand` (
	`id` int(11) NOT NULL AUTO_INCREMENT COMMENT '品牌id',
	`brand_name` varchar(60) NOT NULL DEFAULT '' COMMENT '品牌名称',
	`brand_url` varchar(60) NOT NULL DEFAULT '' COMMENT '品牌地址',
	`brand_img` varchar(100) NOT NULL DEFAULT '' COMMENT '品牌logo',
	`brand_description` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌描述',
	`sort` smallint NOT NULL DEFAULT '50' COMMENT '品牌排序',
	`status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:显示 0:隐藏',
	`create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
    `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '品牌表';



-- ----------------------------
-- Table structure for tb_category
-- ----------------------------
DROP TABLE IF EXISTS `tb_category`;
CREATE TABLE `tb_category` (
  `id` smallint NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cate_name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品分类名称',
  `cate_img` varchar(100) NOT NULL DEFAULT '' COMMENT '商品分类图片',
  `sort` smallint NOT NULL DEFAULT 50 COMMENT '排序',
  `pid` smallint NOT NULL DEFAULT 0 COMMENT '父类id',
  `show_cate` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否展示分类',
  `keywords` varchar(150) NOT NULL DEFAULT '' COMMENT '商品分类关键词',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '商品分类描述',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '商品分类';





-- ----------------------------
-- Table structure for bw_banner
-- ----------------------------
DROP TABLE IF EXISTS `bw_banner`;
CREATE TABLE `bw_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT 'Banner名称，通常作为标识',
  `description` varchar(255) DEFAULT NULL COMMENT 'Banner描述',
  `delete_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '删除时间',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='banner管理表';

-- ----------------------------
-- Table structure for bw_banner_item
-- ----------------------------
DROP TABLE IF EXISTS `bw_banner_item`;
CREATE TABLE `bw_banner_item` (
  `name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(500) NOT NULL DEFAULT '' COMMENT '轮播图',
  `key_word` varchar(100) NOT NULL COMMENT '执行关键字，根据不同的type含义不同',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '跳转类型，可能导向商品，可能导向专题，可能导向其他。0，无导向；1：导向商品;2:导向专题',
  `banner_id` int(11) NOT NULL COMMENT '外键，关联banner表',
  `delete_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '删除时间',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='banner子项表';
ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION
-- ----------------------------
-- Table structure for bw_category
-- ----------------------------
DROP TABLE IF EXISTS `bw_category`;
CREATE TABLE `bw_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` int(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `template_id` int(10) NOT NULL DEFAULT '-1',
  `single_con` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bw_frient_link
-- ----------------------------
DROP TABLE IF EXISTS `bw_frient_link`;
CREATE TABLE `bw_frient_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `link_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `listorder` int(8) unsigned NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `listorder` (`listorder`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bw_procate
-- ----------------------------
DROP TABLE IF EXISTS `bw_procate`;
CREATE TABLE `bw_procate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` int(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bw_product
-- ----------------------------
DROP TABLE IF EXISTS `bw_product`;
CREATE TABLE `bw_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '产品名',
  `main_img_url` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `imgs_url` varchar(500) NOT NULL DEFAULT '' COMMENT '产品展示图-多图',
  `introduce` varchar(500) NOT NULL DEFAULT '' COMMENT '产品介绍',
  `detailCon` text NOT NULL COMMENT '详情',
  `attributes` varchar(9) NOT NULL DEFAULT '' COMMENT '推荐位，1、轮播推荐，首页推荐',
  `labelsAttr` varchar(9) NOT NULL DEFAULT '' COMMENT '标签，1、热卖 2、新品',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '原价',
  `ratePrice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '现价',
  `stock` varchar(255) NOT NULL DEFAULT '' COMMENT '库存',
  `link_url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接到其他网站',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1：发布   0：审核    -1：删除',
  `column_id` int(10) NOT NULL DEFAULT '0' COMMENT '所属栏目',
  `pro_cate_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '产品分类id',
  `click_num` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `delete_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '删除时间',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `keywords` varchar(255) DEFAULT NULL COMMENT '页面关键词',
  `description` varchar(500) DEFAULT NULL COMMENT '页面描述',
  `listorder` int(8) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `column_id` (`column_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bw_user
-- ----------------------------
DROP TABLE IF EXISTS `bw_user`;
CREATE TABLE `bw_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `real_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `pwd` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '删除时间',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  `last_login_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
