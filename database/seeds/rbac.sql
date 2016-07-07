/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : homestead

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-03-21 18:03:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_super` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否超级管理员',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', 'admin@admin.com', '$2y$10$GBKiY/ngDVpe1iHwlTem3e0fbNrnv1sRLGcj4wT1isK0gbzY4oQoC', '1', 'A88b5k4jwn2irXuTJu1TtwnVrp3iFdPZ4aRZHhkXnrn0x1DFGECG9l8Hztf9', '2016-03-21 17:08:54', '2016-03-21 09:08:54');
INSERT INTO `admin_users` VALUES ('15', 'anigm1', 'anigm@qq.com', '$2y$10$puBJn7U3HS5uRs0e/aUkUOuYBtGSweSPo4GE94.FV6OnTqSb6Fsnu', '0', 'yZjN3h6nJrcrrxtmWHwLeXg7pweTyZznf0KRTQ4JMBjnRd3r2dheRONjNWBE', '2016-03-11 16:52:14', '2016-03-11 08:52:14');

-- ----------------------------
-- Table structure for admin_user_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_role`;
CREATE TABLE `admin_user_role` (
  `admin_user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`admin_user_id`,`role_id`),
  KEY `admin_user_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `admin_user_roles_admin_user_id_foreign` FOREIGN KEY (`admin_user_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `admin_user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_user_role
-- ----------------------------
INSERT INTO `admin_user_role` VALUES ('1', '10');
INSERT INTO `admin_user_role` VALUES ('15', '12');

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `thumbnail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '缩略图',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `slug` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '网址缩略名',
  `user_id` int(12) DEFAULT NULL COMMENT '文章编辑用户id',
  `category_id` int(10) NOT NULL COMMENT '文章分类id',
  `deleted_at` datetime DEFAULT NULL COMMENT '被软删除时间',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='内容数据（文章/单页）表';

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('3', '测试', null, '```\r\necho \'Hi Laravel!\';\r\n\r\n\r\n```', null, '1', '1', '2016-03-21 04:07:27', '2015-11-19 08:38:40', '2016-03-21 04:07:27');
INSERT INTO `articles` VALUES ('4', '风从田野上吹过', null, '我请求成为天空的孩子\r\n\r\n即使它收回我内心的翅膀\r\n\r\n走过田野，冬意弥深\r\n\r\n风挂落了日子的一些颜色\r\n\r\n酒杯倒塌，无人扶起\r\n\r\n我醉在远方\r\n\r\n姿势泛黄\r\n\r\n麦子孤独地绿了\r\n\r\n容我没有意外地抵达下一个春\r\n\r\n总有个影子立在田头\r\n\r\n我想抽烟\r\n\r\n红高粱回家以后\r\n\r\n有多少土色柔情于我\r\n\r\n生存坐在香案上\r\n\r\n我的爱恨\r\n\r\n生怕提起\r\n\r\n风把我越吹越低\r\n\r\n低到泥里，获取水分\r\n\r\n我希望成为天空的孩子\r\n\r\n仿佛\r\n\r\n也触手可及', null, '1', '1', null, '2015-11-19 12:05:31', '2015-11-19 13:40:49');
INSERT INTO `articles` VALUES ('5', '芒果笔记', null, '这是芒果笔记的内容\r\n\r\nhttp://note.mango.im', null, '1', '4', null, '2015-11-19 13:18:23', '2015-11-19 13:32:18');
INSERT INTO `articles` VALUES ('8', '测试1', null, '测试1', null, '1', '1', null, '2016-03-10 06:57:10', '2016-03-10 06:57:10');

-- ----------------------------
-- Table structure for article_tag
-- ----------------------------
DROP TABLE IF EXISTS `article_tag`;
CREATE TABLE `article_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `tag_id` int(10) NOT NULL COMMENT '标签ID',
  `article_id` int(10) NOT NULL COMMENT '文章ID',
  PRIMARY KEY (`id`),
  KEY `tag_id` (`tag_id`),
  KEY `article_id` (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章和标签映射表';

-- ----------------------------
-- Records of article_tag
-- ----------------------------
INSERT INTO `article_tag` VALUES ('4', '1', '3');
INSERT INTO `article_tag` VALUES ('5', '1', '4');
INSERT INTO `article_tag` VALUES ('8', '4', '5');
INSERT INTO `article_tag` VALUES ('9', '5', '4');
INSERT INTO `article_tag` VALUES ('12', '4', '8');
INSERT INTO `article_tag` VALUES ('13', '5', '8');
INSERT INTO `article_tag` VALUES ('14', '1', '9');

-- ----------------------------
-- Table structure for blogs
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `datetime` datetime DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blogs
-- ----------------------------
INSERT INTO `blogs` VALUES ('31', 'distinct在sql中的应用', '/uploads/2016-03-18/e8b07be570e7eae18390c77c76a242af56e116a2.jpg', '<p>&nbsp; 在采集的一个站点里面汇集了较多的数据，大概采集了有几十万，同一行业站点的数据几乎都采集了，当然标题是没有改掉的，还是原标题，这是为了方便筛选重复数据的，这几十万的数据里面汇集了较大比重的重复数据，本来想要把这些数据删除掉，但夏日博客苦于没找到好的方法，最后还是想到了 sql 中 distinct 参数，这个参数已经N久没有用过了，其作用就是将重复的数据给过滤掉不显示，看来用在这个采集站点里是最为合适不过了，下面重点的去了解一下 distinct 在 sql 中的应用吧。</p>\r\n\r\n<p>distinct作用:</p>\r\n\r\n<p>在数据表里，往往会重复许多值，比如输入两个字段的&ldquo;夏日博客&rdquo;，如果我们只想要输出一个&ldquo;夏日博客&rdquo;的时候，就可以用到 distinct 了，利用 distinct 可以只显示出来一个&ldquo;夏日博客&rdquo;。</p>\r\n\r\n<p>distinct语法:</p>\r\n\r\n<p>因为是需要输出值的，所以需要用到 SELECT，语法如下:</p>\r\n\r\n<p>SELECT&nbsp;DISTINCT&nbsp;列名称&nbsp;FROM&nbsp;表名称&nbsp;&nbsp;</p>\r\n\r\n<p>distinct实例一:</p>\r\n\r\n<p>为了更直观的看到 distinct 的作用效果，我们来进行一下使用 distinct 之前和之后都是怎样的效果，比如我们有如下 Orders 表:</p>\r\n\r\n<p>如果不使用 distinct 来进行读取，则 SQL 为 &ldquo;SELECT Company FROM Orders&rdquo; 语句，哪么读取出来的结果就为如下形式：</p>\r\n\r\n<p>我们可以看出，重复值 W3School 被两次显示出来了，如果内容是重复的，则只显示一次就可以了，下面再来看一下使用 distinct 之后输出的值是怎样的，先来看一下使用 distinct 之后的 SQL 吧，如下:</p>\r\n\r\n<p>SELECT&nbsp;DISTINCT&nbsp;Company&nbsp;FROM&nbsp;Orders&nbsp;&nbsp;</p>\r\n\r\n<p>运行之后的结果形式为:</p>\r\n\r\n<p>现在 W3School 只被显示了一次。</p>\r\n\r\n<p>distinct实例二:</p>\r\n\r\n<p>再浅显的一个小实例，如果我们有如下的 表A：</p>\r\n\r\n<p>在 sql 中使用 distinct 来去除重复的数据，运行后的效果如下:</p>\r\n\r\n<p>distinct实例三:</p>\r\n\r\n<p>还是接着 distinct实例二，我们再稍微将 sql 语句更改一下，不仅去除表 name 里面的重复值，且连 id 的值一同去除掉，SQL语句如下:</p>\r\n\r\n<p>select&nbsp;distinct&nbsp;name,&nbsp;id&nbsp;from&nbsp;A&nbsp;&nbsp;</p>\r\n\r\n<p>执行后的效果如下所示:</p>\r\n\r\n<p>我们可以看到执行后的效果里面已经将 name 字段和 id 字段里面重复的值都已经去掉了。</p>\r\n', '2016-03-18 17:09:25', '1458292241', '0000-00-00 00:00:00', null, 'sql', 'http://localhost:8000/uploads/img/2016-03-18/56ebc5e884ef0_00o.jpg', '1');
INSERT INTO `blogs` VALUES ('32', 'smarty模板中调用fckeditor编辑器方法', '/uploads/2016-03-18/2f151826fa1e55141c9e75f4c6a62fc4736d7fa8.jpg', '<p>fckeditor编辑大有很多种调用方法,最常用的是提供了php,asp,asp.net这几种我们在程序中调用了,同时它也支持js调用方法,下面我们来看js调用fckeditor编辑器的方法,代码如下:</p>\r\n\r\n<p>&lt;script&nbsp;type=&quot;text/javascript&quot;&nbsp;src=&quot;fckeditor/fckeditor.js&quot;&gt;&lt;/script&gt;&nbsp;&nbsp;&nbsp;<br />\r\n&lt;form&nbsp;method=&quot;POST&quot;&gt;&nbsp;&nbsp;&nbsp;<br />\r\n&lt;script&nbsp;type=&quot;text/javascript&quot;&gt;&nbsp;&nbsp;&nbsp;<br />\r\nvar&nbsp;oFCKeditor&nbsp;=&nbsp;new&nbsp;FCKeditor(&nbsp;&#39;content&#39;&nbsp;)&nbsp;;&nbsp;&nbsp;&nbsp;<br />\r\noFCKeditor.BasePath&nbsp;=&nbsp;&quot;fckeditor/&quot;&nbsp;;&nbsp;&nbsp;&nbsp;<br />\r\noFCKeditor.Height&nbsp;=&nbsp;300&nbsp;;&nbsp;&nbsp;&nbsp;<br />\r\noFCKeditor.Value&nbsp;=&nbsp;&#39;{&nbsp;$content&nbsp;}&#39;&nbsp;;&nbsp;&nbsp;&nbsp;<br />\r\noFCKeditor.Create()&nbsp;;&nbsp;&nbsp;&nbsp;<br />\r\n&lt;/script&gt;&nbsp;&nbsp;&nbsp;<br />\r\n&lt;/form&gt; &nbsp;</p>\r\n', '2016-03-18 17:15:05', '1458292546', '0000-00-00 00:00:00', null, 'smarty,fckeditor', 'http://localhost:8000/uploads/img/2016-03-18/56ebc72e90cf9_26o.jpg', '1');
INSERT INTO `blogs` VALUES ('33', 'php购物车完整类代码', '/uploads/2016-03-18/b09d1a9f2f0da9f5bcd35e04f4535af7e72ec79d.jpg', '<p>记得13年的时候记得写过一个php小型的增删改查电商系统，里面其中就有商品的购物结算等系统，这几天一直在研究 ecshop 系统，当然也是跟电商打交道了，对了，之前写的系统是&nbsp;夏日php电子商务系统 v0.2，这个系统一直没有更新，貌似现在也不兼容最新版了，当时只是为了帮助新手朋友学习php购物车类库的。</p>\r\n\r\n<p>今天偶然遇到一个顾客想要一个简单的 php 购物车系统，不需要 ecshop 哪么强大复杂的，突然一下子不知道该怎么弄了，所以找到以前写的系统来参考一下，不过基本上还是用不上，从网上找了一个完整的 php 购物车类直接搞定了，这个 php购物车类实现了商品的添加，修改，删除，显示列表，以及各种计算的方法，采用了单一类的原理，稳定且容易扩展，好了，下面我们就来看看这个php购物车类吧。</p>\r\n\r\n<p>php购物车类实例代码:</p>\r\n\r\n<p>/*******************************&nbsp;<br />\r\n*&nbsp;author:www.xiariboke.com&nbsp;<br />\r\n*&nbsp;date:2016&nbsp;年&nbsp;01&nbsp;月&nbsp;05&nbsp;日&nbsp;<br />\r\n*******************************/&nbsp;&nbsp;<br />\r\nclass&nbsp;Cart{&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;static&nbsp;protected&nbsp;$ins;&nbsp;//实例变量&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;$item=array();&nbsp;//放商品容器&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//禁止外部调用&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;final&nbsp;protected&nbsp;function&nbsp;__construct(){}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//禁止克隆&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;final&nbsp;protected&nbsp;function&nbsp;__clone(){}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//类内部实例化&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;static&nbsp;protected&nbsp;function&nbsp;getIns(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!(self::$ins&nbsp;instanceof&nbsp;self)){self::$ins=new&nbsp;self();}return&nbsp;self::$ins;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//为了能使商品跨页面保存，把对象放入session里，这里为了防止冲突，设置了一个session后缀参数&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;static&nbsp;function&nbsp;getCat($sesSuffix=&#39;phpernote&#39;){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!isset($_SESSION[&#39;cat&#39;.$sesSuffix])||!($_SESSION[&#39;cat&#39;.$sesSuffix]&nbsp;instanceof&nbsp;self)){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$_SESSION[&#39;cat&#39;.$sesSuffix]=self::getIns();&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$_SESSION[&#39;cat&#39;.$sesSuffix];&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//入列时的检验，是否在$item里存在&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;inItem($goods_id){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;getTypes()==0){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;false;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//这里检验商品是否相同是通过goods_id来检测，并未通过商品名称name来检测，具体情况可做修改&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!(array_key_exists($goods_id,$this-&gt;item))){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;false;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}else{&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this-&gt;item[$goods_id][&#39;num&#39;];&nbsp;//返回此商品个数&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//添加一个商品&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;/*&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;goods_id&nbsp;唯一id&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;name&nbsp;名称&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;num&nbsp;数量&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;price&nbsp;单价&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;*/&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;addItem($goods_id,$name,$num,$price){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;inItem($goods_id)!=false){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id][&#39;num&#39;]+=$num;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id]=array();&nbsp;//一个商品为一个数组&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id][&#39;num&#39;]=$num;&nbsp;//这一个商品的购买数量&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id][&#39;name&#39;]=$name;&nbsp;//商品名字&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id][&#39;price&#39;]=floatval($price);&nbsp;//商品单价&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//减少一个商品&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;reduceItem($goods_id,$num){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;inItem($goods_id)==false){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($num&gt;$this-&gt;getNum($goods_id)){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unset($this-&gt;item[$goods_id]);&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}else{&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id][&#39;num&#39;]-=$num;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//去掉一个商品&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;delItem($goods_id){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;inItem($goods_id)){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unset($this-&gt;item[$goods_id]);&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//返回购买商品列表&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;itemList(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this-&gt;item;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//一共有多少种商品&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;getTypes(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;count($this-&gt;item);&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//获得一种商品的总个数&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;getNum($goods_id){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this-&gt;item[$goods_id][&#39;num&#39;];&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;查询购物车中有多少个商品&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;getNumber(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$num=0;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;getTypes()==0){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach($this-&gt;item&nbsp;as&nbsp;$k=&gt;$v){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$num+=$v[&#39;num&#39;];&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$num;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//计算总价格&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;getPrice(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$price=0;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;getTypes()==0){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach($this-&gt;item&nbsp;as&nbsp;$k=&gt;$v){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$price+=floatval($v[&#39;num&#39;]*$v[&#39;price&#39;]);&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$price;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//清空购物车&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;emptyItem(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item=array();&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n}&nbsp;&nbsp;</p>\r\n\r\n<p>php购物车类实例调用代码:</p>\r\n\r\n<p>&lt;?php&nbsp;&nbsp;<br />\r\nheader(&quot;Content-type:text/html;charset=utf-8&quot;);&nbsp;&nbsp;<br />\r\nsession_start();&nbsp;&nbsp;<br />\r\n$cart&nbsp;=&nbsp;Cart::getCat(&#39;_test&#39;);&nbsp;&nbsp;<br />\r\n//cart经过一次实例化之后，任意页面都可以通过$_SESSION[&#39;cat_test&#39;]调用cart类的相关方法&nbsp;&nbsp;<br />\r\n$_SESSION[&#39;cat_test&#39;]-&gt;addItem(&#39;1&#39;,&#39;苹果&#39;,&#39;1&#39;,&#39;8.03&#39;);&nbsp;&nbsp;<br />\r\n$cart-&gt;addItem(&#39;2&#39;,&#39;香蕉&#39;,&#39;3&#39;,&#39;6.5&#39;);&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;&lt;pre&gt;&#39;;&nbsp;&nbsp;<br />\r\nprint_r($_SESSION);&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;获取购物车商品名称：&#39;.$_SESSION[&#39;cat_test&#39;]-&gt;item[1][&#39;name&#39;],&#39;;&#39;,$_SESSION[&#39;cat_test&#39;]-&gt;item[2][&#39;name&#39;];&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;&lt;br&nbsp;/&gt;&#39;;&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;购物车中共有商品总数：&#39;,$cart-&gt;getNumber();&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;&lt;br&nbsp;/&gt;&#39;;&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;购物车中商品总价：&#39;,$_SESSION[&#39;cat_test&#39;]-&gt;getPrice();&nbsp;&nbsp;<br />\r\n//session_destroy();&nbsp;&nbsp;<br />\r\n//$_SESSION[&#39;cat_test&#39;]-&gt;emptyItem();&nbsp;&nbsp;<br />\r\n?&gt;&nbsp;&nbsp;</p>\r\n\r\n<p>这种php购物车类网上有许多，可以根据自己的需求进行二次开发，拿去测试吧，挺好玩的。</p>\r\n', '2016-03-18 17:16:26', '1458292626', '0000-00-00 00:00:00', null, 'php,购物车,代码', 'http://localhost:8000/uploads/img/2016-03-18/56ebc78ef0652_02o.jpg', '2');
INSERT INTO `blogs` VALUES ('34', 'PHP asb函数参数详解', '/uploads/2016-03-18/cd6433db218018ce30ef9f1801933deadcfae527.jpg', '<p>在网页程序应用中，时间显示是不可缺少的，几乎每一个应用程序中都要用到时间，比如发布系统中，要记录信息的发布时间，投票系统中，要记录用户的投票时间，这些都是需要用时间函数将时间给记录下来，然后录入到数据库中进行保存，在 php 中，提供了 date 时间函数，我们可以利用这个函数进行各种时间的组合，以满足我们应用程序的需求。</p>\r\n\r\n<p>time()在PHP中是得到一个数字,这个数字表示从1970-01-01到现在共走了多少秒,很奇怪吧 不过这样方便计算,</p>\r\n\r\n<p>要找出前一天的时间就是 time()-60*60*24;</p>\r\n\r\n<p>要找出前一年的时间就是 time()*60*60*24*365</p>\r\n\r\n<p>那么如何把这个数字换成日期格式呢,就要用到date函数了</p>\r\n\r\n<p>$t=time();&nbsp;&nbsp;&nbsp;<br />\r\necho&nbsp;date(&quot;Y-m-d&nbsp;H:i:s&quot;,$t);&nbsp;&nbsp;</p>\r\n\r\n<p>第一个参数的格式分别表示:</p>\r\n\r\n<p>a - &quot;am&quot; 或是 &quot;pm&quot;</p>\r\n\r\n<p>A - &quot;AM&quot; 或是 &quot;PM&quot;</p>\r\n\r\n<p>d - 几日，二位数字，若不足二位则前面补零; 如: &quot;01&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>D - 星期几，三个英文字母; 如: &quot;Fri&quot;</p>\r\n\r\n<p>F - 月份，英文全名; 如: &quot;January&quot;</p>\r\n\r\n<p>h - 12 小时制的小时; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>H - 24 小时制的小时; 如: &quot;00&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>g - 12 小时制的小时，不足二位不补零; 如: &quot;1&quot; 至 12&quot;</p>\r\n\r\n<p>G - 24 小时制的小时，不足二位不补零; 如: &quot;0&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>i - 分钟; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>j - 几日，二位数字，若不足二位不补零; 如: &quot;1&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>l - 星期几，英文全名; 如: &quot;Friday&quot;</p>\r\n\r\n<p>m - 月份，二位数字，若不足二位则在前面补零; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>n - 月份，二位数字，若不足二位则不补零; 如: &quot;1&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>M - 月份，三个英文字母; 如: &quot;Jan&quot;</p>\r\n\r\n<p>s - 秒; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>S - 字尾加英文序数，二个英文字母; 如: &quot;th&quot;，&quot;nd&quot;</p>\r\n\r\n<p>t - 指定月份的天数; 如: &quot;28&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>U - 总秒数</p>\r\n\r\n<p>w - 数字型的星期几，如: &quot;0&quot; (星期日) 至 &quot;6&quot; (星期六)</p>\r\n\r\n<p>Y - 年，四位数字; 如: &quot;1999&quot;</p>\r\n\r\n<p>y - 年，二位数字; 如: &quot;99&quot;</p>\r\n\r\n<p>z - 一年中的第几天; 如: &quot;0&quot; 至 &quot;365&quot;</p>\r\n\r\n<p>其它不在上列的字符则直接列出该字符 .</p>\r\n', '2016-03-18 17:17:30', '1458292668', '0000-00-00 00:00:00', null, 'php', 'http://localhost:8000/uploads/img/2016-03-18/56ebc7b193dc6_37o.jpg', '2');
INSERT INTO `blogs` VALUES ('36', 'PHP ssdate函数参数详解', '/uploads/2016-03-18/f2a0205582dc95754e3529e719023b595181f77b.jpg', '<p>在网页程序应用中，时间显示是不可缺少的，几乎每一个应用程序中都要用到时间，比如发布系统中，要记录信息的发布时间，投票系统中，要记录用户的投票时间，这些都是需要用时间函数将时间给记录下来，然后录入到数据库中进行保存，在 php 中，提供了 date 时间函数，我们可以利用这个函数进行各种时间的组合，以满足我们应用程序的需求。</p>\r\n\r\n<p>time()在PHP中是得到一个数字,这个数字表示从1970-01-01到现在共走了多少秒,很奇怪吧 不过这样方便计算,</p>\r\n\r\n<p>要找出前一天的时间就是 time()-60*60*24;</p>\r\n\r\n<p>要找出前一年的时间就是 time()*60*60*24*365</p>\r\n\r\n<p>那么如何把这个数字换成日期格式呢,就要用到date函数了</p>\r\n\r\n<p>$t=time();&nbsp;&nbsp;&nbsp;<br />\r\necho&nbsp;date(&quot;Y-m-d&nbsp;H:i:s&quot;,$t);&nbsp;&nbsp;</p>\r\n\r\n<p>第一个参数的格式分别表示:</p>\r\n\r\n<p>a - &quot;am&quot; 或是 &quot;pm&quot;</p>\r\n\r\n<p>A - &quot;AM&quot; 或是 &quot;PM&quot;</p>\r\n\r\n<p>d - 几日，二位数字，若不足二位则前面补零; 如: &quot;01&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>D - 星期几，三个英文字母; 如: &quot;Fri&quot;</p>\r\n\r\n<p>F - 月份，英文全名; 如: &quot;January&quot;</p>\r\n\r\n<p>h - 12 小时制的小时; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>H - 24 小时制的小时; 如: &quot;00&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>g - 12 小时制的小时，不足二位不补零; 如: &quot;1&quot; 至 12&quot;</p>\r\n\r\n<p>G - 24 小时制的小时，不足二位不补零; 如: &quot;0&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>i - 分钟; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>j - 几日，二位数字，若不足二位不补零; 如: &quot;1&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>l - 星期几，英文全名; 如: &quot;Friday&quot;</p>\r\n\r\n<p>m - 月份，二位数字，若不足二位则在前面补零; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>n - 月份，二位数字，若不足二位则不补零; 如: &quot;1&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>M - 月份，三个英文字母; 如: &quot;Jan&quot;</p>\r\n\r\n<p>s - 秒; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>S - 字尾加英文序数，二个英文字母; 如: &quot;th&quot;，&quot;nd&quot;</p>\r\n\r\n<p>t - 指定月份的天数; 如: &quot;28&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>U - 总秒数</p>\r\n\r\n<p>w - 数字型的星期几，如: &quot;0&quot; (星期日) 至 &quot;6&quot; (星期六)</p>\r\n\r\n<p>Y - 年，四位数字; 如: &quot;1999&quot;</p>\r\n\r\n<p>y - 年，二位数字; 如: &quot;99&quot;</p>\r\n\r\n<p>z - 一年中的第几天; 如: &quot;0&quot; 至 &quot;365&quot;</p>\r\n\r\n<p>其它不在上列的字符则直接列出该字符 .</p>\r\n', '2016-03-18 17:17:32', '1458292709', '0000-00-00 00:00:00', null, 'php', 'http://localhost:8000/uploads/img/2016-03-18/56ebc7b193dc6_37o.jpg', '1');
INSERT INTO `blogs` VALUES ('37', 'PHP date函数参数详解', '/uploads/2016-03-18/71c40b6e577766758f9507ecfdad48ef3fb82df7.jpg', '<p>在网页程序应用中，时间显示是不可缺少的，几乎每一个应用程序中都要用到时间，比如发布系统中，要记录信息的发布时间，投票系统中，要记录用户的投票时间，这些都是需要用时间函数将时间给记录下来，然后录入到数据库中进行保存，在 php 中，提供了 date 时间函数，我们可以利用这个函数进行各种时间的组合，以满足我们应用程序的需求。</p>\r\n\r\n<p>time()在PHP中是得到一个数字,这个数字表示从1970-01-01到现在共走了多少秒,很奇怪吧 不过这样方便计算,</p>\r\n\r\n<p>要找出前一天的时间就是 time()-60*60*24;</p>\r\n\r\n<p>要找出前一年的时间就是 time()*60*60*24*365</p>\r\n\r\n<p>那么如何把这个数字换成日期格式呢,就要用到date函数了</p>\r\n\r\n<p>$t=time();&nbsp;&nbsp;&nbsp;<br />\r\necho&nbsp;date(&quot;Y-m-d&nbsp;H:i:s&quot;,$t);&nbsp;&nbsp;</p>\r\n\r\n<p>第一个参数的格式分别表示:</p>\r\n\r\n<p>a - &quot;am&quot; 或是 &quot;pm&quot;</p>\r\n\r\n<p>A - &quot;AM&quot; 或是 &quot;PM&quot;</p>\r\n\r\n<p>d - 几日，二位数字，若不足二位则前面补零; 如: &quot;01&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>D - 星期几，三个英文字母; 如: &quot;Fri&quot;</p>\r\n\r\n<p>F - 月份，英文全名; 如: &quot;January&quot;</p>\r\n\r\n<p>h - 12 小时制的小时; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>H - 24 小时制的小时; 如: &quot;00&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>g - 12 小时制的小时，不足二位不补零; 如: &quot;1&quot; 至 12&quot;</p>\r\n\r\n<p>G - 24 小时制的小时，不足二位不补零; 如: &quot;0&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>i - 分钟; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>j - 几日，二位数字，若不足二位不补零; 如: &quot;1&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>l - 星期几，英文全名; 如: &quot;Friday&quot;</p>\r\n\r\n<p>m - 月份，二位数字，若不足二位则在前面补零; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>n - 月份，二位数字，若不足二位则不补零; 如: &quot;1&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>M - 月份，三个英文字母; 如: &quot;Jan&quot;</p>\r\n\r\n<p>s - 秒; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>S - 字尾加英文序数，二个英文字母; 如: &quot;th&quot;，&quot;nd&quot;</p>\r\n\r\n<p>t - 指定月份的天数; 如: &quot;28&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>U - 总秒数</p>\r\n\r\n<p>w - 数字型的星期几，如: &quot;0&quot; (星期日) 至 &quot;6&quot; (星期六)</p>\r\n\r\n<p>Y - 年，四位数字; 如: &quot;1999&quot;</p>\r\n\r\n<p>y - 年，二位数字; 如: &quot;99&quot;</p>\r\n\r\n<p>z - 一年中的第几天; 如: &quot;0&quot; 至 &quot;365&quot;</p>\r\n\r\n<p>其它不在上列的字符则直接列出该字符 .</p>\r\n', '2016-03-18 17:19:03', '1458292759', '0000-00-00 00:00:00', null, 'php', 'http://localhost:8000/uploads/img/2016-03-18/56ebc8147292d_16o.jpg', '2');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pid` int(10) DEFAULT '0' COMMENT '父级ID',
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT '分类名称',
  `slug` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '网址缩略名',
  `sort` int(6) unsigned DEFAULT '0' COMMENT '分类排序,数字越大排名靠前',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='分类表';

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '0', '生活1', '', '0');
INSERT INTO `categories` VALUES ('4', '0', '技术', '', '0');
INSERT INTO `categories` VALUES ('5', '1', '1', '', '0');
INSERT INTO `categories` VALUES ('6', '5', '2', '', '0');

-- ----------------------------
-- Table structure for columns
-- ----------------------------
DROP TABLE IF EXISTS `columns`;
CREATE TABLE `columns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `_lft` int(10) unsigned NOT NULL,
  `_rgt` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of columns
-- ----------------------------
INSERT INTO `columns` VALUES ('1', 'A', '1', '6', null, '2016-03-18 02:40:21', '2016-03-18 02:40:21');
INSERT INTO `columns` VALUES ('2', 'A1', '2', '5', '1', '2016-03-18 02:40:29', '2016-03-18 02:40:39');
INSERT INTO `columns` VALUES ('3', 'AA1', '3', '4', '2', '2016-03-18 02:40:51', '2016-03-18 02:40:51');
INSERT INTO `columns` VALUES ('4', 'B', '7', '10', null, '2016-03-18 02:40:58', '2016-03-18 02:40:58');
INSERT INTO `columns` VALUES ('5', 'B1', '8', '9', '4', '2016-03-18 02:41:08', '2016-03-18 02:41:08');

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_name` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('8', '1.jpg', '1', '2016-03-11 05:20:09', '2016-03-11 05:20:09');
INSERT INTO `images` VALUES ('4', '1.jpg', '1', '2016-03-11 03:41:12', '2016-03-11 03:41:12');
INSERT INTO `images` VALUES ('5', '1.jpg', '1', '2016-03-11 03:55:58', '2016-03-11 03:55:58');
INSERT INTO `images` VALUES ('6', '1.jpg', '1', '2016-03-11 05:15:52', '2016-03-11 05:15:52');
INSERT INTO `images` VALUES ('7', '1.jpg', '1-2edac', '2016-03-11 05:15:57', '2016-03-11 05:15:57');
INSERT INTO `images` VALUES ('10', '1.jpg', '1-0bb82', '2016-03-11 05:20:57', '2016-03-11 05:20:57');
INSERT INTO `images` VALUES ('11', '1.jpg', '1-70484', '2016-03-11 05:21:24', '2016-03-11 05:21:24');
INSERT INTO `images` VALUES ('12', '1.jpg', '1-23fda', '2016-03-11 05:21:39', '2016-03-11 05:21:39');
INSERT INTO `images` VALUES ('13', '1.jpg', '1-9c935', '2016-03-11 05:22:19', '2016-03-11 05:22:19');
INSERT INTO `images` VALUES ('14', '1.jpg', '1-8b4d7', '2016-03-11 05:23:17', '2016-03-11 05:23:17');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_18_071439_create_admin_users', '1');
INSERT INTO `migrations` VALUES ('2016_01_18_071720_create_admin_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_23_031442_entrust_base', '1');
INSERT INTO `migrations` VALUES ('2016_01_23_031518_entrust_pivot_admin_user_role', '1');

-- ----------------------------
-- Table structure for ones
-- ----------------------------
DROP TABLE IF EXISTS `ones`;
CREATE TABLE `ones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `datetime` datetime DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ones
-- ----------------------------
INSERT INTO `ones` VALUES ('31', 'distinct在sql中的应用', '<p>&nbsp; 在采集的一个站点里面汇集了较多的数据，大概采集了有几十万，同一行业站点的数据几乎都采集了，当然标题是没有改掉的，还是原标题，这是为了方便筛选重复数据的，这几十万的数据里面汇集了较大比重的重复数据，本来想要把这些数据删除掉，但夏日博客苦于没找到好的方法，最后还是想到了 sql 中 distinct 参数，这个参数已经N久没有用过了，其作用就是将重复的数据给过滤掉不显示，看来用在这个采集站点里是最为合适不过了，下面重点的去了解一下 distinct 在 sql 中的应用吧。</p>\r\n\r\n<p>distinct作用:</p>\r\n\r\n<p>在数据表里，往往会重复许多值，比如输入两个字段的&ldquo;夏日博客&rdquo;，如果我们只想要输出一个&ldquo;夏日博客&rdquo;的时候，就可以用到 distinct 了，利用 distinct 可以只显示出来一个&ldquo;夏日博客&rdquo;。</p>\r\n\r\n<p>distinct语法:</p>\r\n\r\n<p>因为是需要输出值的，所以需要用到 SELECT，语法如下:</p>\r\n\r\n<p>SELECT&nbsp;DISTINCT&nbsp;列名称&nbsp;FROM&nbsp;表名称&nbsp;&nbsp;</p>\r\n\r\n<p>distinct实例一:</p>\r\n\r\n<p>为了更直观的看到 distinct 的作用效果，我们来进行一下使用 distinct 之前和之后都是怎样的效果，比如我们有如下 Orders 表:</p>\r\n\r\n<p>如果不使用 distinct 来进行读取，则 SQL 为 &ldquo;SELECT Company FROM Orders&rdquo; 语句，哪么读取出来的结果就为如下形式：</p>\r\n\r\n<p>我们可以看出，重复值 W3School 被两次显示出来了，如果内容是重复的，则只显示一次就可以了，下面再来看一下使用 distinct 之后输出的值是怎样的，先来看一下使用 distinct 之后的 SQL 吧，如下:</p>\r\n\r\n<p>SELECT&nbsp;DISTINCT&nbsp;Company&nbsp;FROM&nbsp;Orders&nbsp;&nbsp;</p>\r\n\r\n<p>运行之后的结果形式为:</p>\r\n\r\n<p>现在 W3School 只被显示了一次。</p>\r\n\r\n<p>distinct实例二:</p>\r\n\r\n<p>再浅显的一个小实例，如果我们有如下的 表A：</p>\r\n\r\n<p>在 sql 中使用 distinct 来去除重复的数据，运行后的效果如下:</p>\r\n\r\n<p>distinct实例三:</p>\r\n\r\n<p>还是接着 distinct实例二，我们再稍微将 sql 语句更改一下，不仅去除表 name 里面的重复值，且连 id 的值一同去除掉，SQL语句如下:</p>\r\n\r\n<p>select&nbsp;distinct&nbsp;name,&nbsp;id&nbsp;from&nbsp;A&nbsp;&nbsp;</p>\r\n\r\n<p>执行后的效果如下所示:</p>\r\n\r\n<p>我们可以看到执行后的效果里面已经将 name 字段和 id 字段里面重复的值都已经去掉了。</p>\r\n', '2016-03-18 17:09:25', '1458292241', '2016-03-21 04:03:20', '2016-03-21 04:03:20', 'sql', 'uploads/img/2016-03-21/56ef72629d9e3_42o.jpg');
INSERT INTO `ones` VALUES ('32', '关于我', '<p>xxx</p>\r\n', '2016-03-18 17:15:05', '2016-03-21 03:07:56', '2016-03-21 05:46:00', null, 'smarty,fckeditor', 'uploads/img/2016-03-18/56ebc72e90cf9_26o.jpg');
INSERT INTO `ones` VALUES ('33', 'php购物车完整类代码', '<p>记得13年的时候记得写过一个php小型的增删改查电商系统，里面其中就有商品的购物结算等系统，这几天一直在研究 ecshop 系统，当然也是跟电商打交道了，对了，之前写的系统是&nbsp;夏日php电子商务系统 v0.2，这个系统一直没有更新，貌似现在也不兼容最新版了，当时只是为了帮助新手朋友学习php购物车类库的。</p>\r\n\r\n<p>今天偶然遇到一个顾客想要一个简单的 php 购物车系统，不需要 ecshop 哪么强大复杂的，突然一下子不知道该怎么弄了，所以找到以前写的系统来参考一下，不过基本上还是用不上，从网上找了一个完整的 php 购物车类直接搞定了，这个 php购物车类实现了商品的添加，修改，删除，显示列表，以及各种计算的方法，采用了单一类的原理，稳定且容易扩展，好了，下面我们就来看看这个php购物车类吧。</p>\r\n\r\n<p>php购物车类实例代码:</p>\r\n\r\n<p>/*******************************&nbsp;<br />\r\n*&nbsp;author:www.xiariboke.com&nbsp;<br />\r\n*&nbsp;date:2016&nbsp;年&nbsp;01&nbsp;月&nbsp;05&nbsp;日&nbsp;<br />\r\n*******************************/&nbsp;&nbsp;<br />\r\nclass&nbsp;Cart{&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;static&nbsp;protected&nbsp;$ins;&nbsp;//实例变量&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;$item=array();&nbsp;//放商品容器&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//禁止外部调用&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;final&nbsp;protected&nbsp;function&nbsp;__construct(){}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//禁止克隆&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;final&nbsp;protected&nbsp;function&nbsp;__clone(){}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//类内部实例化&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;static&nbsp;protected&nbsp;function&nbsp;getIns(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!(self::$ins&nbsp;instanceof&nbsp;self)){self::$ins=new&nbsp;self();}return&nbsp;self::$ins;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//为了能使商品跨页面保存，把对象放入session里，这里为了防止冲突，设置了一个session后缀参数&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;static&nbsp;function&nbsp;getCat($sesSuffix=&#39;phpernote&#39;){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!isset($_SESSION[&#39;cat&#39;.$sesSuffix])||!($_SESSION[&#39;cat&#39;.$sesSuffix]&nbsp;instanceof&nbsp;self)){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$_SESSION[&#39;cat&#39;.$sesSuffix]=self::getIns();&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$_SESSION[&#39;cat&#39;.$sesSuffix];&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//入列时的检验，是否在$item里存在&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;inItem($goods_id){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;getTypes()==0){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;false;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//这里检验商品是否相同是通过goods_id来检测，并未通过商品名称name来检测，具体情况可做修改&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!(array_key_exists($goods_id,$this-&gt;item))){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;false;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}else{&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this-&gt;item[$goods_id][&#39;num&#39;];&nbsp;//返回此商品个数&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//添加一个商品&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;/*&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;goods_id&nbsp;唯一id&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;name&nbsp;名称&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;num&nbsp;数量&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;price&nbsp;单价&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;*/&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;addItem($goods_id,$name,$num,$price){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;inItem($goods_id)!=false){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id][&#39;num&#39;]+=$num;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id]=array();&nbsp;//一个商品为一个数组&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id][&#39;num&#39;]=$num;&nbsp;//这一个商品的购买数量&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id][&#39;name&#39;]=$name;&nbsp;//商品名字&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id][&#39;price&#39;]=floatval($price);&nbsp;//商品单价&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//减少一个商品&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;reduceItem($goods_id,$num){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;inItem($goods_id)==false){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($num&gt;$this-&gt;getNum($goods_id)){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unset($this-&gt;item[$goods_id]);&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}else{&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item[$goods_id][&#39;num&#39;]-=$num;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//去掉一个商品&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;delItem($goods_id){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;inItem($goods_id)){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unset($this-&gt;item[$goods_id]);&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//返回购买商品列表&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;itemList(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this-&gt;item;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//一共有多少种商品&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;getTypes(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;count($this-&gt;item);&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//获得一种商品的总个数&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;getNum($goods_id){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this-&gt;item[$goods_id][&#39;num&#39;];&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;查询购物车中有多少个商品&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;getNumber(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$num=0;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;getTypes()==0){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach($this-&gt;item&nbsp;as&nbsp;$k=&gt;$v){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$num+=$v[&#39;num&#39;];&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$num;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//计算总价格&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;getPrice(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$price=0;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($this-&gt;getTypes()==0){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach($this-&gt;item&nbsp;as&nbsp;$k=&gt;$v){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$price+=floatval($v[&#39;num&#39;]*$v[&#39;price&#39;]);&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$price;&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;//清空购物车&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;emptyItem(){&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;item=array();&nbsp;&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;<br />\r\n}&nbsp;&nbsp;</p>\r\n\r\n<p>php购物车类实例调用代码:</p>\r\n\r\n<p>&lt;?php&nbsp;&nbsp;<br />\r\nheader(&quot;Content-type:text/html;charset=utf-8&quot;);&nbsp;&nbsp;<br />\r\nsession_start();&nbsp;&nbsp;<br />\r\n$cart&nbsp;=&nbsp;Cart::getCat(&#39;_test&#39;);&nbsp;&nbsp;<br />\r\n//cart经过一次实例化之后，任意页面都可以通过$_SESSION[&#39;cat_test&#39;]调用cart类的相关方法&nbsp;&nbsp;<br />\r\n$_SESSION[&#39;cat_test&#39;]-&gt;addItem(&#39;1&#39;,&#39;苹果&#39;,&#39;1&#39;,&#39;8.03&#39;);&nbsp;&nbsp;<br />\r\n$cart-&gt;addItem(&#39;2&#39;,&#39;香蕉&#39;,&#39;3&#39;,&#39;6.5&#39;);&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;&lt;pre&gt;&#39;;&nbsp;&nbsp;<br />\r\nprint_r($_SESSION);&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;获取购物车商品名称：&#39;.$_SESSION[&#39;cat_test&#39;]-&gt;item[1][&#39;name&#39;],&#39;;&#39;,$_SESSION[&#39;cat_test&#39;]-&gt;item[2][&#39;name&#39;];&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;&lt;br&nbsp;/&gt;&#39;;&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;购物车中共有商品总数：&#39;,$cart-&gt;getNumber();&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;&lt;br&nbsp;/&gt;&#39;;&nbsp;&nbsp;<br />\r\necho&nbsp;&#39;购物车中商品总价：&#39;,$_SESSION[&#39;cat_test&#39;]-&gt;getPrice();&nbsp;&nbsp;<br />\r\n//session_destroy();&nbsp;&nbsp;<br />\r\n//$_SESSION[&#39;cat_test&#39;]-&gt;emptyItem();&nbsp;&nbsp;<br />\r\n?&gt;&nbsp;&nbsp;</p>\r\n\r\n<p>这种php购物车类网上有许多，可以根据自己的需求进行二次开发，拿去测试吧，挺好玩的。</p>\r\n', '2016-03-18 17:16:26', '1458292626', '0000-00-00 00:00:00', null, 'php,购物车,代码', 'uploads/img/2016-03-18/56ebc78ef0652_02o.jpg');
INSERT INTO `ones` VALUES ('34', 'PHP asb函数参数详解', '<p>在网页程序应用中，时间显示是不可缺少的，几乎每一个应用程序中都要用到时间，比如发布系统中，要记录信息的发布时间，投票系统中，要记录用户的投票时间，这些都是需要用时间函数将时间给记录下来，然后录入到数据库中进行保存，在 php 中，提供了 date 时间函数，我们可以利用这个函数进行各种时间的组合，以满足我们应用程序的需求。</p>\r\n\r\n<p>time()在PHP中是得到一个数字,这个数字表示从1970-01-01到现在共走了多少秒,很奇怪吧 不过这样方便计算,</p>\r\n\r\n<p>要找出前一天的时间就是 time()-60*60*24;</p>\r\n\r\n<p>要找出前一年的时间就是 time()*60*60*24*365</p>\r\n\r\n<p>那么如何把这个数字换成日期格式呢,就要用到date函数了</p>\r\n\r\n<p>$t=time();&nbsp;&nbsp;&nbsp;<br />\r\necho&nbsp;date(&quot;Y-m-d&nbsp;H:i:s&quot;,$t);&nbsp;&nbsp;</p>\r\n\r\n<p>第一个参数的格式分别表示:</p>\r\n\r\n<p>a - &quot;am&quot; 或是 &quot;pm&quot;</p>\r\n\r\n<p>A - &quot;AM&quot; 或是 &quot;PM&quot;</p>\r\n\r\n<p>d - 几日，二位数字，若不足二位则前面补零; 如: &quot;01&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>D - 星期几，三个英文字母; 如: &quot;Fri&quot;</p>\r\n\r\n<p>F - 月份，英文全名; 如: &quot;January&quot;</p>\r\n\r\n<p>h - 12 小时制的小时; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>H - 24 小时制的小时; 如: &quot;00&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>g - 12 小时制的小时，不足二位不补零; 如: &quot;1&quot; 至 12&quot;</p>\r\n\r\n<p>G - 24 小时制的小时，不足二位不补零; 如: &quot;0&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>i - 分钟; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>j - 几日，二位数字，若不足二位不补零; 如: &quot;1&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>l - 星期几，英文全名; 如: &quot;Friday&quot;</p>\r\n\r\n<p>m - 月份，二位数字，若不足二位则在前面补零; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>n - 月份，二位数字，若不足二位则不补零; 如: &quot;1&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>M - 月份，三个英文字母; 如: &quot;Jan&quot;</p>\r\n\r\n<p>s - 秒; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>S - 字尾加英文序数，二个英文字母; 如: &quot;th&quot;，&quot;nd&quot;</p>\r\n\r\n<p>t - 指定月份的天数; 如: &quot;28&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>U - 总秒数</p>\r\n\r\n<p>w - 数字型的星期几，如: &quot;0&quot; (星期日) 至 &quot;6&quot; (星期六)</p>\r\n\r\n<p>Y - 年，四位数字; 如: &quot;1999&quot;</p>\r\n\r\n<p>y - 年，二位数字; 如: &quot;99&quot;</p>\r\n\r\n<p>z - 一年中的第几天; 如: &quot;0&quot; 至 &quot;365&quot;</p>\r\n\r\n<p>其它不在上列的字符则直接列出该字符 .</p>\r\n', '2016-03-18 17:17:30', '1458292668', '0000-00-00 00:00:00', null, 'php', 'uploads/img/2016-03-18/56ebc7b193dc6_37o.jpg');
INSERT INTO `ones` VALUES ('36', 'PHP ssdate函数参数详解', '<p>在网页程序应用中，时间显示是不可缺少的，几乎每一个应用程序中都要用到时间，比如发布系统中，要记录信息的发布时间，投票系统中，要记录用户的投票时间，这些都是需要用时间函数将时间给记录下来，然后录入到数据库中进行保存，在 php 中，提供了 date 时间函数，我们可以利用这个函数进行各种时间的组合，以满足我们应用程序的需求。</p>\r\n\r\n<p>time()在PHP中是得到一个数字,这个数字表示从1970-01-01到现在共走了多少秒,很奇怪吧 不过这样方便计算,</p>\r\n\r\n<p>要找出前一天的时间就是 time()-60*60*24;</p>\r\n\r\n<p>要找出前一年的时间就是 time()*60*60*24*365</p>\r\n\r\n<p>那么如何把这个数字换成日期格式呢,就要用到date函数了</p>\r\n\r\n<p>$t=time();&nbsp;&nbsp;&nbsp;<br />\r\necho&nbsp;date(&quot;Y-m-d&nbsp;H:i:s&quot;,$t);&nbsp;&nbsp;</p>\r\n\r\n<p>第一个参数的格式分别表示:</p>\r\n\r\n<p>a - &quot;am&quot; 或是 &quot;pm&quot;</p>\r\n\r\n<p>A - &quot;AM&quot; 或是 &quot;PM&quot;</p>\r\n\r\n<p>d - 几日，二位数字，若不足二位则前面补零; 如: &quot;01&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>D - 星期几，三个英文字母; 如: &quot;Fri&quot;</p>\r\n\r\n<p>F - 月份，英文全名; 如: &quot;January&quot;</p>\r\n\r\n<p>h - 12 小时制的小时; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>H - 24 小时制的小时; 如: &quot;00&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>g - 12 小时制的小时，不足二位不补零; 如: &quot;1&quot; 至 12&quot;</p>\r\n\r\n<p>G - 24 小时制的小时，不足二位不补零; 如: &quot;0&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>i - 分钟; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>j - 几日，二位数字，若不足二位不补零; 如: &quot;1&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>l - 星期几，英文全名; 如: &quot;Friday&quot;</p>\r\n\r\n<p>m - 月份，二位数字，若不足二位则在前面补零; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>n - 月份，二位数字，若不足二位则不补零; 如: &quot;1&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>M - 月份，三个英文字母; 如: &quot;Jan&quot;</p>\r\n\r\n<p>s - 秒; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>S - 字尾加英文序数，二个英文字母; 如: &quot;th&quot;，&quot;nd&quot;</p>\r\n\r\n<p>t - 指定月份的天数; 如: &quot;28&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>U - 总秒数</p>\r\n\r\n<p>w - 数字型的星期几，如: &quot;0&quot; (星期日) 至 &quot;6&quot; (星期六)</p>\r\n\r\n<p>Y - 年，四位数字; 如: &quot;1999&quot;</p>\r\n\r\n<p>y - 年，二位数字; 如: &quot;99&quot;</p>\r\n\r\n<p>z - 一年中的第几天; 如: &quot;0&quot; 至 &quot;365&quot;</p>\r\n\r\n<p>其它不在上列的字符则直接列出该字符 .</p>\r\n', '2016-03-18 17:17:32', '1458292709', '0000-00-00 00:00:00', null, 'php', 'uploads/img/2016-03-18/56ebc7b193dc6_37o.jpg');
INSERT INTO `ones` VALUES ('37', 'PHP date函数参数详解', '<p>在网页程序应用中，时间显示是不可缺少的，几乎每一个应用程序中都要用到时间，比如发布系统中，要记录信息的发布时间，投票系统中，要记录用户的投票时间，这些都是需要用时间函数将时间给记录下来，然后录入到数据库中进行保存，在 php 中，提供了 date 时间函数，我们可以利用这个函数进行各种时间的组合，以满足我们应用程序的需求。</p>\r\n\r\n<p>time()在PHP中是得到一个数字,这个数字表示从1970-01-01到现在共走了多少秒,很奇怪吧 不过这样方便计算,</p>\r\n\r\n<p>要找出前一天的时间就是 time()-60*60*24;</p>\r\n\r\n<p>要找出前一年的时间就是 time()*60*60*24*365</p>\r\n\r\n<p>那么如何把这个数字换成日期格式呢,就要用到date函数了</p>\r\n\r\n<p>$t=time();&nbsp;&nbsp;&nbsp;<br />\r\necho&nbsp;date(&quot;Y-m-d&nbsp;H:i:s&quot;,$t);&nbsp;&nbsp;</p>\r\n\r\n<p>第一个参数的格式分别表示:</p>\r\n\r\n<p>a - &quot;am&quot; 或是 &quot;pm&quot;</p>\r\n\r\n<p>A - &quot;AM&quot; 或是 &quot;PM&quot;</p>\r\n\r\n<p>d - 几日，二位数字，若不足二位则前面补零; 如: &quot;01&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>D - 星期几，三个英文字母; 如: &quot;Fri&quot;</p>\r\n\r\n<p>F - 月份，英文全名; 如: &quot;January&quot;</p>\r\n\r\n<p>h - 12 小时制的小时; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>H - 24 小时制的小时; 如: &quot;00&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>g - 12 小时制的小时，不足二位不补零; 如: &quot;1&quot; 至 12&quot;</p>\r\n\r\n<p>G - 24 小时制的小时，不足二位不补零; 如: &quot;0&quot; 至 &quot;23&quot;</p>\r\n\r\n<p>i - 分钟; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>j - 几日，二位数字，若不足二位不补零; 如: &quot;1&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>l - 星期几，英文全名; 如: &quot;Friday&quot;</p>\r\n\r\n<p>m - 月份，二位数字，若不足二位则在前面补零; 如: &quot;01&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>n - 月份，二位数字，若不足二位则不补零; 如: &quot;1&quot; 至 &quot;12&quot;</p>\r\n\r\n<p>M - 月份，三个英文字母; 如: &quot;Jan&quot;</p>\r\n\r\n<p>s - 秒; 如: &quot;00&quot; 至 &quot;59&quot;</p>\r\n\r\n<p>S - 字尾加英文序数，二个英文字母; 如: &quot;th&quot;，&quot;nd&quot;</p>\r\n\r\n<p>t - 指定月份的天数; 如: &quot;28&quot; 至 &quot;31&quot;</p>\r\n\r\n<p>U - 总秒数</p>\r\n\r\n<p>w - 数字型的星期几，如: &quot;0&quot; (星期日) 至 &quot;6&quot; (星期六)</p>\r\n\r\n<p>Y - 年，四位数字; 如: &quot;1999&quot;</p>\r\n\r\n<p>y - 年，二位数字; 如: &quot;99&quot;</p>\r\n\r\n<p>z - 一年中的第几天; 如: &quot;0&quot; 至 &quot;365&quot;</p>\r\n\r\n<p>其它不在上列的字符则直接列出该字符 .</p>\r\n', '2016-03-18 17:19:03', '2016-03-21 03:07:56', '2016-03-21 03:39:14', null, 'php', 'uploads/img/2016-03-21/56ef6cdf6c9d7_11o.jpg');
INSERT INTO `ones` VALUES ('38', 'Laravel Eloquent取上一条和下一条数据', '<p>首先文章的起源来与SF上面的一个问题：</p>\r\n\r\n<p>Laravel的Eloquent ORM 怎么获取当前记录的下一条</p>\r\n\r\n<p>然后，当时在答案里面简单写了一下解决方案。不过由于这个取得下一条和取得上一条的记录其实在日常的开发当中还是会经常遇到，最常见的场景可能就是取得一篇文章的上一篇文章和下一篇文章了。其实这个在Laravel的Eloquent中实现还是挺容易的，不过由于Laravel并没有直接提供给我们相应的方法，我们得使用一个小小的技巧：</p>\r\n\r\n<p>取得上一篇的文章id</p>\r\n\r\n<p>protected function getPrevArticleId($id) { return Article::where(&#39;id&#39;, &#39;&lt;&#39;, $id)-&gt;max(&#39;id&#39;); }</p>\r\n\r\n<p>$id就是当前文章的id，我们通过max()来取得比当前id小的最大值，也就是当前id的前一篇文章的id。</p>\r\n\r\n<p>取得下一篇的文章id</p>\r\n\r\n<p>protected function getNextArticleId($id) { return Article::where(&#39;id&#39;, &#39;&gt;&#39;, $id)-&gt;min(&#39;id&#39;); }</p>\r\n\r\n<p>基本上可以说是：同理可得。这个取得下一篇文章的id其实就是一个相反的过程，理解万岁。</p>\r\n\r\n<p>一旦我们取得上一篇和下一篇的文章id之后，我们就可以随心所欲了，比如：</p>\r\n\r\n<p>$next_article = Article::find($this-&gt;getNextArticleId($article-&gt;id));</p>\r\n\r\n<p>多说两句</p>\r\n\r\n<p>那如果是对于一个文章的管理来说，我们其实可以这么做：</p>\r\n\r\n<p>给articles表中增加一个published_at的字段，这里可以将published_at字段设置为一个Carbon对象，然后我们在前端展示的时候就可以根据published_at来判读是否将文章展示出来。</p>\r\n\r\n<p>比如说查询语句：</p>\r\n\r\n<p>public function scopePublished($query) { $query-&gt;where(&#39;published_at&#39;,&#39;&lt;=&#39;,Carbon::now()); } //以上方法位于Article中，下面的查询我放在了ArticleController中 $articles = Article::latest(&#39;published_at&#39;)-&gt;published()...</p>\r\n\r\n<p>View展示：</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>@if($prev_article) <a href=\"/post/{{ $prev_article-&gt;slug }}\" rel=\"prev\"><strong>上一篇</strong> {{ $prev_article-&gt;title }} </a> @endif</li>\r\n	<li>@if($next_article &amp;&amp; $next_article-&gt;published_at &lt; Carbon\\Carbon::now()) <a href=\"/post/{{ $next_article-&gt;slug }}\" rel=\"next\"><strong>下一篇</strong> {{ $next_article-&gt;title }}</a> @endif</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>处理文章的前一篇和后一篇的解决方案已完成。</p>\r\n', '2016-03-21 11:05:25', '2016-03-21 03:07:56', '2016-03-21 05:27:37', null, 'laravel', 'uploads/img/2016-03-21/56ef6cdf6c9d7_11o.jpg');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '菜单父ID',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '图标class',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_menu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否作为菜单显示,[1|0]',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('20', '0', 'edit', '#-1456129983', '系统设置', '', '1', '100', '2016-02-22 16:33:03', '2016-02-22 16:33:03');
INSERT INTO `permissions` VALUES ('21', '20', '', 'admin.admin_user.index', '用户权限', '查看后台用户列表', '1', '0', '2016-02-18 15:56:26', '2016-02-18 15:56:26');
INSERT INTO `permissions` VALUES ('22', '20', '', 'admin.admin_user.create', '创建后台用户', '页面', '0', '0', '2016-02-23 11:48:18', '2016-02-23 11:48:18');
INSERT INTO `permissions` VALUES ('35', '0', 'home', 'admin.home', 'Dashboard', '后台首页', '1', '0', '2016-02-22 16:32:40', '2016-02-22 16:32:40');
INSERT INTO `permissions` VALUES ('36', '0', 'home', '#-1456132007', '博客管理', '', '1', '0', '2016-03-11 13:27:05', '2016-02-22 17:06:47');
INSERT INTO `permissions` VALUES ('37', '36', '', 'admin.blog.index', '博客列表', '', '1', '0', '2016-02-22 17:15:48', '2016-02-22 17:15:48');
INSERT INTO `permissions` VALUES ('38', '20', '', 'admin.admin_user.store', '保存新建后台用户', '操作', '0', '0', '2016-02-23 11:48:52', '2016-02-23 11:48:52');
INSERT INTO `permissions` VALUES ('39', '20', '', 'admin.admin_user.destroy', '删除后台用户', '操作', '0', '0', '2016-02-23 11:49:09', '2016-02-23 11:49:09');
INSERT INTO `permissions` VALUES ('40', '20', '', 'admin.admin_user.destory.all', '批量后台用户删除', '操作', '0', '0', '2016-02-23 12:01:01', '2016-02-23 12:01:01');
INSERT INTO `permissions` VALUES ('42', '20', '', 'admin.admin_user.edit', '编辑后台用户', '页面', '0', '0', '2016-02-23 11:48:35', '2016-02-23 11:48:35');
INSERT INTO `permissions` VALUES ('43', '20', '', 'admin.admin_user.update', '保存编辑后台用户', '操作', '0', '0', '2016-02-23 11:50:12', '2016-02-23 11:50:12');
INSERT INTO `permissions` VALUES ('44', '20', '', 'admin.permission.index', '权限管理', '页面', '0', '0', '2016-02-23 11:51:36', '2016-02-23 11:51:36');
INSERT INTO `permissions` VALUES ('45', '20', '', 'admin.permission.create', '新建权限', '页面', '0', '0', '2016-02-23 11:52:16', '2016-02-23 11:52:16');
INSERT INTO `permissions` VALUES ('46', '20', '', 'admin.permission.store', '保存新建权限', '操作', '0', '0', '2016-02-23 11:52:38', '2016-02-23 11:52:38');
INSERT INTO `permissions` VALUES ('47', '20', '', 'admin.permission.edit', '编辑权限', '页面', '0', '0', '2016-02-23 11:53:29', '2016-02-23 11:53:29');
INSERT INTO `permissions` VALUES ('48', '20', '', 'admin.permission.update', '保存编辑权限', '操作', '0', '0', '2016-02-23 11:53:56', '2016-02-23 11:53:56');
INSERT INTO `permissions` VALUES ('49', '20', '', 'admin.permission.destroy', '删除权限', '操作', '0', '0', '2016-02-23 11:54:27', '2016-02-23 11:54:27');
INSERT INTO `permissions` VALUES ('50', '20', '', 'admin.permission.destory.all', '批量删除权限', '操作', '0', '0', '2016-02-23 11:55:17', '2016-02-23 11:55:17');
INSERT INTO `permissions` VALUES ('51', '20', '', 'admin.role.index', '角色管理', '页面', '0', '0', '2016-02-23 11:56:07', '2016-02-23 11:56:07');
INSERT INTO `permissions` VALUES ('52', '20', '', 'admin.role.create', '新建角色', '页面', '0', '0', '2016-02-23 11:56:33', '2016-02-23 11:56:33');
INSERT INTO `permissions` VALUES ('53', '20', '', 'admin.role.store', '保存新建角色', '操作', '0', '0', '2016-02-23 11:57:26', '2016-02-23 11:57:26');
INSERT INTO `permissions` VALUES ('54', '20', '', 'admin.role.edit', '编辑角色', '页面', '0', '0', '2016-02-23 11:58:25', '2016-02-23 11:58:25');
INSERT INTO `permissions` VALUES ('55', '20', '', 'admin.role.update', '保存编辑角色', '操作', '0', '0', '2016-02-23 11:58:50', '2016-02-23 11:58:50');
INSERT INTO `permissions` VALUES ('56', '20', '', 'admin.role.permissions', '角色权限设置', '', '0', '0', '2016-02-23 11:59:26', '2016-02-23 11:59:26');
INSERT INTO `permissions` VALUES ('57', '20', '', 'admin.role.destroy', '角色删除', '操作', '0', '0', '2016-02-23 11:59:49', '2016-02-23 11:59:49');
INSERT INTO `permissions` VALUES ('58', '20', '', 'admin.role.destory.all', '批量删除角色', '', '0', '0', '2016-02-23 12:01:58', '2016-02-23 12:01:58');
INSERT INTO `permissions` VALUES ('59', '0', 'home', '#-1457581321', '文章管理', '', '1', '0', '2016-03-10 11:44:41', '2016-03-10 03:42:01');
INSERT INTO `permissions` VALUES ('60', '59', '', 'admin.article.create', '写文章', '', '1', '0', '2016-03-10 03:43:18', '2016-03-10 03:43:18');
INSERT INTO `permissions` VALUES ('61', '59', '', 'admin.article.index', '文章列表', '', '1', '0', '2016-03-10 11:45:05', '2016-03-10 03:45:05');
INSERT INTO `permissions` VALUES ('62', '59', '', 'admin.article.recycle', '回收站', '', '1', '0', '2016-03-11 17:48:43', '2016-03-10 03:51:18');
INSERT INTO `permissions` VALUES ('63', '0', 'home', '#-1457581634', '分类管理', '', '1', '0', '2016-03-10 11:49:21', '2016-03-10 03:47:14');
INSERT INTO `permissions` VALUES ('64', '63', '', 'admin.category.create', '新建分类', '', '1', '0', '2016-03-10 03:48:35', '2016-03-10 03:48:35');
INSERT INTO `permissions` VALUES ('65', '63', '', 'admin.category.index', '分类列表', '', '1', '0', '2016-03-10 14:24:46', '2016-03-10 06:24:46');
INSERT INTO `permissions` VALUES ('66', '0', 'home', '#-1457594324', '标签管理', '', '1', '0', '2016-03-10 15:18:44', '2016-03-10 07:18:44');
INSERT INTO `permissions` VALUES ('67', '66', '', 'admin.tags.create', '添加标签', '', '1', '0', '2016-03-10 15:18:11', '2016-03-10 07:18:11');
INSERT INTO `permissions` VALUES ('68', '66', '', 'admin.tags.index', '标签列表', '', '1', '0', '2016-03-10 07:19:11', '2016-03-10 07:19:11');
INSERT INTO `permissions` VALUES ('69', '0', 'home', '#-1457597884', '资源管理', '', '1', '0', '2016-03-10 16:18:58', '2016-03-10 08:18:04');
INSERT INTO `permissions` VALUES ('70', '69', '', 'admin.upload', '文件管理', '', '1', '0', '2016-03-11 13:26:51', '2016-03-10 08:18:39');
INSERT INTO `permissions` VALUES ('71', '0', 'home', 'admin.logs', '日志管理', '', '1', '0', '2016-03-18 16:10:45', '2016-03-10 09:22:26');
INSERT INTO `permissions` VALUES ('72', '69', '', 'admin.uploads', '文件上传', '', '1', '0', '2016-03-11 05:26:02', '2016-03-11 05:26:02');
INSERT INTO `permissions` VALUES ('73', '36', '', 'admin.blog.create', '新建博客', '', '1', '0', '2016-03-17 07:34:39', '2016-03-17 07:34:39');
INSERT INTO `permissions` VALUES ('74', '36', '', 'admin.blog.recycle', '回收站', '', '1', '0', '2016-03-17 07:41:25', '2016-03-17 07:41:25');
INSERT INTO `permissions` VALUES ('75', '0', 'home', '#-1458288946', '系统日志', '', '1', '0', '2016-03-18 16:16:45', '2016-03-18 08:15:46');
INSERT INTO `permissions` VALUES ('76', '20', '', 'admin.backup', '备份', '', '0', '0', '2016-03-17 08:36:46', '2016-03-17 08:36:46');
INSERT INTO `permissions` VALUES ('77', '0', 'home', 'admin.column.index', '栏目管理', '', '1', '0', '2016-03-18 11:54:06', '2016-03-18 03:42:28');
INSERT INTO `permissions` VALUES ('78', '0', 'home', '#-1458527948', '单页管理', '', '1', '0', '2016-03-21 02:39:08', '2016-03-21 02:39:08');
INSERT INTO `permissions` VALUES ('79', '78', '', 'admin.one.index', '列表', '', '1', '0', '2016-03-21 11:32:13', '2016-03-21 02:40:06');
INSERT INTO `permissions` VALUES ('80', '78', '', 'admin.one.create', '新建页面', '', '1', '0', '2016-03-21 11:32:08', '2016-03-21 02:53:51');
INSERT INTO `permissions` VALUES ('81', '78', '', 'admin.one.recycle', '回收站', '', '1', '0', '2016-03-21 02:41:09', '2016-03-21 02:41:09');
INSERT INTO `permissions` VALUES ('83', '78', '', 'admin.one.edit', '编辑页面', '', '0', '0', '2016-03-21 11:32:04', '2016-03-21 03:25:48');
INSERT INTO `permissions` VALUES ('84', '78', '', 'admin.one.store', '添加成功', '', '0', '0', '2016-03-21 11:31:45', '2016-03-21 03:26:48');
INSERT INTO `permissions` VALUES ('85', '78', '', 'admin.one.update', '修改成功', '', '0', '0', '2016-03-21 11:31:48', '2016-03-21 03:27:25');
INSERT INTO `permissions` VALUES ('86', '78', '', 'admin.one.delete', '删除', '', '0', '0', '2016-03-21 11:31:50', '2016-03-21 03:27:53');
INSERT INTO `permissions` VALUES ('87', '78', '', 'admin.one.destroy', '移除回收站', '', '0', '0', '2016-03-21 11:32:30', '2016-03-21 03:28:34');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('20', '10');
INSERT INTO `permission_role` VALUES ('21', '10');
INSERT INTO `permission_role` VALUES ('22', '10');
INSERT INTO `permission_role` VALUES ('35', '10');
INSERT INTO `permission_role` VALUES ('36', '10');
INSERT INTO `permission_role` VALUES ('37', '10');
INSERT INTO `permission_role` VALUES ('38', '10');
INSERT INTO `permission_role` VALUES ('39', '10');
INSERT INTO `permission_role` VALUES ('40', '10');
INSERT INTO `permission_role` VALUES ('42', '10');
INSERT INTO `permission_role` VALUES ('43', '10');
INSERT INTO `permission_role` VALUES ('44', '10');
INSERT INTO `permission_role` VALUES ('45', '10');
INSERT INTO `permission_role` VALUES ('46', '10');
INSERT INTO `permission_role` VALUES ('47', '10');
INSERT INTO `permission_role` VALUES ('48', '10');
INSERT INTO `permission_role` VALUES ('49', '10');
INSERT INTO `permission_role` VALUES ('50', '10');
INSERT INTO `permission_role` VALUES ('51', '10');
INSERT INTO `permission_role` VALUES ('52', '10');
INSERT INTO `permission_role` VALUES ('53', '10');
INSERT INTO `permission_role` VALUES ('54', '10');
INSERT INTO `permission_role` VALUES ('55', '10');
INSERT INTO `permission_role` VALUES ('56', '10');
INSERT INTO `permission_role` VALUES ('57', '10');
INSERT INTO `permission_role` VALUES ('58', '10');
INSERT INTO `permission_role` VALUES ('20', '12');
INSERT INTO `permission_role` VALUES ('21', '12');
INSERT INTO `permission_role` VALUES ('35', '12');
INSERT INTO `permission_role` VALUES ('59', '12');
INSERT INTO `permission_role` VALUES ('60', '12');
INSERT INTO `permission_role` VALUES ('61', '12');
INSERT INTO `permission_role` VALUES ('62', '12');
INSERT INTO `permission_role` VALUES ('78', '12');
INSERT INTO `permission_role` VALUES ('79', '12');
INSERT INTO `permission_role` VALUES ('80', '12');
INSERT INTO `permission_role` VALUES ('81', '12');
INSERT INTO `permission_role` VALUES ('83', '12');
INSERT INTO `permission_role` VALUES ('84', '12');
INSERT INTO `permission_role` VALUES ('85', '12');
INSERT INTO `permission_role` VALUES ('86', '12');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('10', 'administrator', '系统管理员', '', '2016-02-19 17:59:52', '2016-02-19 17:59:52');
INSERT INTO `roles` VALUES ('12', 'test', '测试狗', '', '2016-02-19 18:00:43', '2016-02-19 18:00:43');

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT '标签名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='标签表';

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('1', '标签');
INSERT INTO `tags` VALUES ('4', '芒果');
INSERT INTO `tags` VALUES ('5', '诗');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
