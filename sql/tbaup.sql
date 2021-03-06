﻿/*
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
-- Table structure for tb_type
-- ----------------------------
DROP TABLE IF EXISTS `tb_type`;
CREATE TABLE `tb_type` (
  `id` smallint NOT NULL AUTO_INCREMENT COMMENT '类型id',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '类型名称',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '商品分类';



-- ----------------------------
-- Table structure for tb_property
-- ----------------------------
DROP TABLE IF EXISTS `tb_property`;
CREATE TABLE `tb_property` (
  `id` smallint NOT NULL AUTO_INCREMENT COMMENT '商品属性id',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品属性名称',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '商品属性类型,1:单选 2：唯一',
  `is_add_img` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否添加图片,1:需要 2：不需要',
  `values` varchar(255) NOT NULL DEFAULT '' COMMENT '商品属性值',
  `type_id` smallint NOT NULL DEFAULT 0 COMMENT '所属类型id',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '商品属性';



-- ----------------------------
-- Table structure for tb_product
-- ----------------------------
DROP TABLE IF EXISTS `tb_product`;
CREATE TABLE `tb_product` (
  `id` smallint NOT NULL AUTO_INCREMENT COMMENT '产品id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '产品名称',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '产品描述',
  `product_code` CHAR (16) NOT NULL DEFAULT '' COMMENT '产品编号',
  `main_img_url` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `market_price` VARCHAR(80) NOT NULL DEFAULT '' COMMENT '市场价范围',
  `price`  VARCHAR(80) NOT NULL DEFAULT '' COMMENT '本店价范围',
  `on_sale` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否上架：1：上架  0：下架',
  `category_id` mediumint NOT NULL DEFAULT 0 COMMENT '所属栏目分类',
  `theme_id` mediumint NOT NULL DEFAULT 0 COMMENT '所属主题',
  `type_id` mediumint NOT NULL DEFAULT 0 COMMENT '所属类型',
  `content` longtext NOT NULL DEFAULT '' COMMENT '产品描述',
  `weight` DECIMAL(10,2) NOT NULL DEFAULT 0.00 COMMENT '重量',
  `unit` varchar(10) NOT NULL DEFAULT 'kg' COMMENT '单位',
  `stock_total` INT NOT NULL DEFAULT '0' COMMENT '库存总数量',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `theme_id` (`theme_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '产品表';

-- ----------------------------
-- Table structure for tb_member_level
-- ----------------------------
DROP TABLE IF EXISTS `tb_member_level`;
CREATE TABLE `tb_member_level` (
  `id` smallint NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '级别名称',
  `bom_point` INT NOT NULL DEFAULT 0 COMMENT '积分下限',
  `top_point` INT NOT NULL DEFAULT 0 COMMENT '积分上限',
  `rate` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '折扣率',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '会员级别';


-- ----------------------------
-- Table structure for tb_member_price
-- ----------------------------
DROP TABLE IF EXISTS `tb_member_price`;
CREATE TABLE `tb_member_price` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'id',
  `mprice` DECIMAL(10,2) NOT NULL DEFAULT 0.00 COMMENT '会员价格',
  `mlevel_id` smallint NOT NULL DEFAULT 0 COMMENT '会员级别',
  `product_id` int NOT NULL DEFAULT 0 COMMENT '产品id',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '会员价格';


-- ----------------------------
-- Table structure for tb_product_image
-- ----------------------------
DROP TABLE IF EXISTS `tb_product_image`;
CREATE TABLE `tb_product_image` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'id',
  `img_url` varchar(100) NOT NULL DEFAULT '' COMMENT '图片地址',
  `product_id` mediumint(9) NOT NULL DEFAULT 0 COMMENT '产品id',
  `sort` smallint NOT NULL DEFAULT 50 COMMENT '图片排序序号',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '产品图片';


-- ----------------------------
-- Table structure for tb_product_prop
-- ----------------------------
DROP TABLE IF EXISTS `tb_product_prop`;
CREATE TABLE `tb_product_prop` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'id',
  `prop_id` mediumint NOT NULL DEFAULT 0 COMMENT '属性id',
  `prop_name` varchar(60) NOT NULL DEFAULT '' COMMENT '属性名',
  `prop_value` varchar(60) NOT NULL DEFAULT '' COMMENT '属性值',
  `prop_price` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT '属性价格',
  `img_url` varchar(100) NOT NULL DEFAULT '' COMMENT '图片地址',
  `product_id` mediumint NOT NULL DEFAULT 0 COMMENT '所属商品',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '商品属性表';



-- ----------------------------
-- Table structure for tb_product_stock
-- ----------------------------
DROP TABLE IF EXISTS `tb_product_stock`;
CREATE TABLE `tb_product_stock` (
  `id` mediumint NOT NULL AUTO_INCREMENT COMMENT 'id',
  `product_id` mediumint NOT NULL DEFAULT 0 COMMENT '所属商品',
  `stock_num` int NOT NULL DEFAULT 0 COMMENT '库存量',
  `market_price` DECIMAL(10,2) NOT NULL DEFAULT 0.00 COMMENT '市场价',
  `price`  DECIMAL(10,2) NOT NULL DEFAULT 0.00 COMMENT '本店价',
  `product_prop` varchar(20) NOT NULL DEFAULT '' COMMENT '属性值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '商品属性表';


-- ----------------------------
-- Table structure for tb_product_stock
-- ----------------------------
DROP TABLE IF EXISTS `tb_recpos`;
CREATE TABLE `tb_recpos` (
  `id` SMALLINT(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` VARCHAR(60) NOT NULL DEFAULT '' COMMENT '推荐位名称',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '推荐位类型 1：商品  2：分类',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '推荐位表';


-- ----------------------------
-- Table structure for tb_rec_item
-- ----------------------------
DROP TABLE IF EXISTS `tb_rec_item`;
CREATE TABLE `tb_rec_item` (
  `recpos_id` SMALLINT(5) unsigned NOT NULL DEFAULT 0 COMMENT '推荐位id',
  `value_id` mediumint(8) unsigned NOT NULL DEFAULT 0 COMMENT '商品或商品分类id',
  `value_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '推荐位类型 1：商品  2：分类'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT '推荐位中间表';

-- ----------------------------
-- Table structure for tb_banner
-- ----------------------------
DROP TABLE IF EXISTS `tb_banner`;
CREATE TABLE `tb_banner` (
  `id` SMALLINT(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT 'Banner名称，通常作为标识',
  `description` varchar(255) DEFAULT NULL COMMENT 'Banner描述',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COMMENT='banner管理表';


-- ----------------------------
-- Table structure for tb_banner_item
-- ----------------------------
DROP TABLE IF EXISTS `tb_banner_item`;
CREATE TABLE `tb_banner_item` (
  `id` mediumint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `img_url` VARCHAR (60) NOT NULL DEFAULT '' COMMENT '图片链接',
  `video_url` VARCHAR(60) NOT NULL DEFAULT '' COMMENT '视频链接',
  `url_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'url类型，1、图片 2、视频',
  `key_word` varchar(100) NOT NULL DEFAULT 0 COMMENT '执行关键字，根据不同的type含义不同',
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '跳转类型，可能导向商品，可能导向专题，可能导向其他。0，无导向；1：导向商品;2:导向专题',
  `banner_id` SMALLINT(5) NOT NULL DEFAULT 0 COMMENT '外键，关联banner表',
  `sort` smallint NOT NULL DEFAULT 50 COMMENT 'bannerItem排序',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `banner_id` (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COMMENT='banner子项表';



-- ----------------------------
-- Table structure for tb_theme
-- ----------------------------
DROP TABLE IF EXISTS `tb_theme`;
CREATE TABLE `tb_theme` (
  `id` SMALLINT(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '专题名称',
  `description` varchar(255) DEFAULT NULL COMMENT '专题描述',
  `main_img_url` VARCHAR(60) NOT NULL COMMENT '封面图',
  `head_img_url` VARCHAR(60) NOT NULL COMMENT '专题列表页，头图',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `content` longtext NOT NULL DEFAULT '' COMMENT '主题内容',
  `on_sale` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否上架：1：上架  0：下架',
  `sort` smallint NOT NULL DEFAULT 50 COMMENT '主题排序',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COMMENT='主题信息表';


-- ----------------------------
-- Table structure for tb_theme_product
-- ----------------------------
DROP TABLE IF EXISTS `tb_theme_product`;
CREATE TABLE `tb_theme_product` (
  `theme_id` int(11) NOT NULL COMMENT '主题外键',
  `product_id` int(11) NOT NULL COMMENT '商品外键',
  `position` VARCHAR(10) NOT NULL COMMENT '产品在主题头图的位置坐标',
  `sort` smallint NOT NULL DEFAULT 50 COMMENT '主题产品排序',
  PRIMARY KEY (`theme_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='主题所包含的商品';

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `tb_order`;
CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL COMMENT '订单号',
  `user_id` int(11) NOT NULL COMMENT '外键，用户id，注意并不是openid',
  `total_price` decimal(6,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:未支付， 2：已支付，3：已发货 , 4: 已支付，但库存不足',
  `snap_img` varchar(255) DEFAULT NULL COMMENT '订单快照图片',
  `snap_name` varchar(80) DEFAULT NULL COMMENT '订单快照名称',
  `total_count` int(11) NOT NULL DEFAULT '0',
  `snap_items` text COMMENT '订单其他信息快照（json)',
  `snap_address` varchar(500) DEFAULT NULL COMMENT '地址快照',
  `prepay_id` varchar(100) DEFAULT NULL COMMENT '订单微信支付的预订单id（用于发送模板消息）',
  `delete_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`),
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for order_product
-- ----------------------------
DROP TABLE IF EXISTS `tb_order_product`;
CREATE TABLE `tb_order_product` (
  `order_id` int(11) NOT NULL COMMENT '联合主键，订单id',
  `product_id` int(11) NOT NULL COMMENT '联合主键，商品id',
  `count` int(11) NOT NULL COMMENT '商品数量',
  `product_prop_ids` varchar(20) NOT NULL DEFAULT '' COMMENT '属性值',
  `delete_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `nickName` varchar(50) NOT NULL COMMENT '用户昵称',
  `auth` tinyint(1) NOT NULL DEFAULT '1' COMMENT '权限，1：普通用户 3：超级管理员',
  `gender` tinyint(1) NOT NULL COMMENT '性别 0：未知、1：男、2：女',
  `province` varchar(20) DEFAULT NULL COMMENT '省',
  `city` varchar(20) DEFAULT NULL COMMENT '市',
  `country` varchar(20) DEFAULT NULL COMMENT '区',
  `delete_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '删除时间',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for user_address
-- ----------------------------
DROP TABLE IF EXISTS `tb_user_address`;
CREATE TABLE `tb_user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '收获人姓名',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `province` varchar(20) DEFAULT NULL COMMENT '省',
  `city` varchar(20) DEFAULT NULL COMMENT '市',
  `country` varchar(20) DEFAULT NULL COMMENT '区',
  `detail` varchar(100) DEFAULT NULL COMMENT '详细地址',
  `is_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:默认， 0：不是默认',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:正常， 0：删除',
  `delete_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '删除时间',
  `user_id` int(11) NOT NULL COMMENT '外键',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;



























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
