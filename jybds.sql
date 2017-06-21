/*
Navicat MySQL Data Transfer

Source Server         : yc
Source Server Version : 50552
Source Host           : 118.89.47.246:3306
Source Database       : ds

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2017-05-02 20:02:55
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `ds_a`
-- ----------------------------
DROP TABLE IF EXISTS `ds_a`;
CREATE TABLE `ds_a` (
  `href` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_a
-- ----------------------------
INSERT INTO ds_a VALUES ('www.baidu.com', '百度', '1');
INSERT INTO ds_a VALUES ('www.cqnu.edu.cn', '重师', '3');
INSERT INTO ds_a VALUES ('www.sougou.com', '搜狗', '4');

-- ----------------------------
-- Table structure for `ds_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ds_admin`;
CREATE TABLE `ds_admin` (
  `user` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `newdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_admin
-- ----------------------------
INSERT INTO ds_admin VALUES ('admin', '202cb962ac59075b964b07152d234b70', '2017-05-01 20:44:16', '2017-05-02 19:42:24');

-- ----------------------------
-- Table structure for `ds_dsjj`
-- ----------------------------
DROP TABLE IF EXISTS `ds_dsjj`;
CREATE TABLE `ds_dsjj` (
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_dsjj
-- ----------------------------
INSERT INTO ds_dsjj VALUES ('你好');

-- ----------------------------
-- Table structure for `ds_dsjn`
-- ----------------------------
DROP TABLE IF EXISTS `ds_dsjn`;
CREATE TABLE `ds_dsjn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `img` varchar(30) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_dsjn
-- ----------------------------
INSERT INTO ds_dsjn VALUES ('6', '重庆师范大学第一届电商技能大赛', '于水', 'dsjn.jpg', '2017-04-20 00:00:00');

-- ----------------------------
-- Table structure for `ds_foot`
-- ----------------------------
DROP TABLE IF EXISTS `ds_foot`;
CREATE TABLE `ds_foot` (
  `type` varchar(5) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_foot
-- ----------------------------
INSERT INTO ds_foot VALUES ('qt', '焕延有限公司制作');
INSERT INTO ds_foot VALUES ('ht', '本网站由焕延有限公司制作');

-- ----------------------------
-- Table structure for `ds_gg`
-- ----------------------------
DROP TABLE IF EXISTS `ds_gg`;
CREATE TABLE `ds_gg` (
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_gg
-- ----------------------------
INSERT INTO ds_gg VALUES ('欢迎来到重庆教育部电商平台');

-- ----------------------------
-- Table structure for `ds_gxsd`
-- ----------------------------
DROP TABLE IF EXISTS `ds_gxsd`;
CREATE TABLE `ds_gxsd` (
  `lanmu` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `time` date DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_gxsd
-- ----------------------------
INSERT INTO ds_gxsd VALUES ('大学电商技能的探究', '6', '富士达', '2017-05-01', '59072fc929ed2.png');
INSERT INTO ds_gxsd VALUES ('fsda富士达发送大', '7', '发撒的', '2017-05-02', '5908717926583.png');

-- ----------------------------
-- Table structure for `ds_header`
-- ----------------------------
DROP TABLE IF EXISTS `ds_header`;
CREATE TABLE `ds_header` (
  `img` varchar(30) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `produce` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_header
-- ----------------------------
INSERT INTO ds_header VALUES ('head1.jpg', '吴黎明', '史上最帅的领导', '1');

-- ----------------------------
-- Table structure for `ds_key`
-- ----------------------------
DROP TABLE IF EXISTS `ds_key`;
CREATE TABLE `ds_key` (
  `zuozhe` varchar(8) DEFAULT NULL,
  `miaoshu` text,
  `key` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_key
-- ----------------------------
INSERT INTO ds_key VALUES ('焕延有限公司外包', '重庆教育部电商平台', '发射点发顺丰', '1');

-- ----------------------------
-- Table structure for `ds_lxwm`
-- ----------------------------
DROP TABLE IF EXISTS `ds_lxwm`;
CREATE TABLE `ds_lxwm` (
  `title` varchar(30) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_lxwm
-- ----------------------------
INSERT INTO ds_lxwm VALUES ('学会地址', '都发顺丰', '1');
INSERT INTO ds_lxwm VALUES ('学会邮编', '500011', '2');
INSERT INTO ds_lxwm VALUES ('人事部电话', '15213710631', '6');

-- ----------------------------
-- Table structure for `ds_movie`
-- ----------------------------
DROP TABLE IF EXISTS `ds_movie`;
CREATE TABLE `ds_movie` (
  `title` varchar(20) DEFAULT NULL,
  `cont` int(11) DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor` int(11) DEFAULT '0',
  `movie` varchar(40) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `content` text,
  `date` date DEFAULT NULL,
  `img` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_movie
-- ----------------------------
INSERT INTO ds_movie VALUES ('fsadfsa', '9', '9', '51', '5902042f39310.mp4', 'fsdasfsdasdag', '范德萨噶时光', '2017-04-27', '5902042f446c3.jpg');

-- ----------------------------
-- Table structure for `ds_wjxz`
-- ----------------------------
DROP TABLE IF EXISTS `ds_wjxz`;
CREATE TABLE `ds_wjxz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lanmu` varchar(50) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `content` text,
  `file` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_wjxz
-- ----------------------------
INSERT INTO ds_wjxz VALUES ('16', 'fds范德萨', '2017-04-27', '富士达·', '5901c96e8c3e0.zip');

-- ----------------------------
-- Table structure for `ds_xhjj`
-- ----------------------------
DROP TABLE IF EXISTS `ds_xhjj`;
CREATE TABLE `ds_xhjj` (
  `img` varchar(30) DEFAULT NULL,
  `content` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_xhjj
-- ----------------------------
INSERT INTO ds_xhjj VALUES ('5902cd0f8d682.png', '范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2范德萨干撒的歌2', '15');

-- ----------------------------
-- Table structure for `ds_xhqkjj`
-- ----------------------------
DROP TABLE IF EXISTS `ds_xhqkjj`;
CREATE TABLE `ds_xhqkjj` (
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_xhqkjj
-- ----------------------------
INSERT INTO ds_xhqkjj VALUES ('《重庆高校研究》简介，显示内容，可直接修改，显示内容，可直接修改');

-- ----------------------------
-- Table structure for `ds_xhqkml`
-- ----------------------------
DROP TABLE IF EXISTS `ds_xhqkml`;
CREATE TABLE `ds_xhqkml` (
  `lanmu` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` date DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_xhqkml
-- ----------------------------
INSERT INTO ds_xhqkml VALUES ('第一期栏目', '1', '2017-04-20', '第一期栏目测试');
INSERT INTO ds_xhqkml VALUES ('mysql', '4', '2017-04-27', 'mysql测试');
INSERT INTO ds_xhqkml VALUES ('eeqw', '5', '2017-04-27', 'fasdsdadg');
INSERT INTO ds_xhqkml VALUES ('fsadklgjsal;dgggsa', '6', '2017-04-27', 'dhgsahasdgh');

-- ----------------------------
-- Table structure for `ds_xhtz`
-- ----------------------------
DROP TABLE IF EXISTS `ds_xhtz`;
CREATE TABLE `ds_xhtz` (
  `content` text,
  `title` varchar(30) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_xhtz
-- ----------------------------
INSERT INTO ds_xhtz VALUES ('富士达', '发撒的', '2017-04-27 18:27:21', '2');

-- ----------------------------
-- Table structure for `ds_xhzx`
-- ----------------------------
DROP TABLE IF EXISTS `ds_xhzx`;
CREATE TABLE `ds_xhzx` (
  `lanmu` varchar(50) DEFAULT NULL,
  `content` text,
  `time` date DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_xhzx
-- ----------------------------
INSERT INTO ds_xhzx VALUES ('阿什顿飞撒点粉', '干撒打工撒大哥挥洒的噶速度广大师生打哈飒飒干撒打工撒大哥挥洒的噶速度广大师生打哈飒飒的规划干撒打工撒大哥挥洒的噶速度广大师生打哈飒飒的规划的规划', '2017-04-28', '15', '59020530c67bd.png');
INSERT INTO ds_xhzx VALUES ('fsda发生大咖色', 'gfsdagas', '2017-04-04', '16', '5902056640f3e.png');
INSERT INTO ds_xhzx VALUES ('fsda发生大咖色', 'gfsdagas', '2017-04-27', '17', null);

-- ----------------------------
-- Table structure for `ds_zcfg`
-- ----------------------------
DROP TABLE IF EXISTS `ds_zcfg`;
CREATE TABLE `ds_zcfg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_zcfg
-- ----------------------------
INSERT INTO ds_zcfg VALUES ('1', '中华人民共和国电子签名法', '第一条\r\n为了规范电子签名行为，确立电子签名的法律效力，维护有关各方的合法权益，制定本法。\r\n第二条\r\n本法所称电子签名，是指数据电文中以电子形式所含、所附用于识别签名人身份并表明签名人认可其中内容的数据。\r\n本法所称数据电文，是指以电子、光学、磁或者类似手段生成、发送、接收或者储存的信息。\r\n第三条\r\n民事活动中的合同或者其他文件、单证等文书，当事人可以约定使用或者不使用电子签名、数据电文。\r\n当事人约定使用电子签名、数据电文的文书，不得仅因为其采用电子签名、数据电文的形式而否定其法律效力。\r\n前款规定不适用下列文书：\r\n（一）涉及婚姻、收养、继承等人身关系的；\r\n（二）涉及土地、房屋等不动产权益转让的；\r\n（三）涉及停止供水、供热、供气、供电等公用事业服务的；\r\n（四）法律、行政法规规定的不适用电子文书的其他情形。\r\n第二章 数据电文\r\n第四条\r\n能够有形地表现所载内容，并可以随时调取查用的数据电文，视为符合法律、法规要求的书面形式。\r\n第五条\r\n符合下列条件的数据电文，视为满足法律、法规规定的原件形式要求：\r\n（一）能够有效地表现所载内容并可供随时调取查用；\r\n（二）能够可靠地保证自最终形成时起，内容保持完整、未被更改。但是，在数据电文上增加背书以及数据交换、储存和显示过程中发生的形式变化不影响数据电文的完整性。\r\n第六条\r\n符合下列条件的数据电文，视为满足法律、法规规定的文件保存要求：\r\n（一）能够有效地表现所载内容并可供随时调取查用；\r\n（二）数据电文的格式与其生成、发送或者接收时的格式相同，或者格式不相同但是能够准确表现原来生成、发送或者接收的内容；\r\n（三）能够识别数据电文的发件人、收件人以及发送、接收的时间。\r\n第七条\r\n数据电文不得仅因为其是以电子、光学、磁或者类似手段生成、发送、接收或者储存的而被拒绝作为证据使用。\r\n第八条\r\n审查数据电文作为证据的真实性，应当考虑以下因素：\r\n（一）生成、储存或者传递数据电文方法的可靠性；\r\n（二）保持内容完整性方法的可靠性；\r\n（三）用以鉴别发件人方法的可靠性；\r\n（四）其他相关因素。\r\n第九条', '2017-04-20');
INSERT INTO ds_zcfg VALUES ('2', '深圳市市场监督管理局关于服务电子商务市场健康快速发展的若干措', '各有关单位：\r\n　　《深圳市市场监督管理局关于服务电子商务市场促进健康快速发展的若干措施》（深市监规〔2010〕11号）已经印发，现就文件中有关登记注册政策提出实施意见，具体如下：\r\n　　一、创新住所登记制度\r\n　　（一）对有办公实体的电子商务经营者，允许在符合条件的集中办公区域内一个场所登记多家企业。\r\n　　1、集中办公区域，是指在本市内设立的互联网产业集聚区、互联网产业园、互联网产业特色工业园等内（以下统称为互联网产业园区）的办公场所。\r\n　　2、申请在符合条件的互联网产业园区内集中办公经营的电子商务经营者，应提交以下材料作为企业住所证明：\r\n　　（1）互联网产业园区的成立批文或有关证明文件复印件。\r\n　　（2）互联网产业园区管理部门或开办方资格证明复印件。\r\n　　（3）互联网产业园区管理部门或开办方出具的同意入驻的证明文件原件。\r\n　　（4）使用自有房产的，提交房产证复印件。租赁他人房屋的，提交经登记或备案的房屋租赁合同原件。\r\n　　3、企业登记机关在核定集中办公经营的电子商务企业的住所时应加注“集中办公”，如“深圳市罗湖区**路**大厦**层**号（集中办公）”。\r\n　　（二）试点兴办商务秘书企业，没有办公实体的电子商务经营者可以使用所托管商务秘书企业的住所或办公区域作为企业住所注册。\r\n　　1、商务秘书企业，是指为入驻的电子商务企业（以下简称入驻企业）提供住所托管服务及其他配套商务秘书服务的企业。\r\n　　2、商务秘书企业登记的条件：\r\n　　（1）商务秘书企业仅限在互联网产业园区内申办。\r\n　　（2）商务秘书企业仅限从事包括提供公司地址，代理企业登记、代理记账、代理年检申报、代理收递各类法律文件及代理申办其他各项法律手续等，客户接待，来电转接，安排会议及其他商务秘书服务。\r\n　　（3）所使用场所的房屋法定功能不能为“住宅”。\r\n　　（4）无不良信用记录。\r\n　　3、商务秘书企业应当提交以下材料作为企业住所证明：\r\n　　（1）互联网产业园区管理部门或开办方出具的同意入驻的证明文件原件。\r\n　　（2）使用自有房产的，提交房产证复印件。\r\n　　（3）租赁他人房屋的，提交房屋租赁合同原件。\r\n　　4、从事商务秘书经营的企业，应当履行以下职责：\r\n　　（1）建立联络人制度，由联络人负责与入驻企业及企业监管部门的日常联系，并定期将入驻企业的名单向辖区市场监管所备案。商务秘书企业应当将联络人名单及变更情况及时向辖区市场监管所备案。\r\n　　（2）建立入驻企业档案管理制度，对入驻企业的基本情况和重大活动进行记录并按期归档。\r\n　　（3）配合政府监管部门对入驻企业依法进行检查。\r\n　　（4）对入驻企业出现的异常情况及违法情况应当及时向政府监管部门报告。\r\n　　（6）本企业变更住所或因故解散的，应当及时通知入驻企业办理住所变更。', '2017-04-20');
INSERT INTO ds_zcfg VALUES ('5', '电商新技能', '我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df我是sb哈哈发就来看撒地方骄傲了df', '2017-04-26');

-- ----------------------------
-- Table structure for `ds_zx`
-- ----------------------------
DROP TABLE IF EXISTS `ds_zx`;
CREATE TABLE `ds_zx` (
  `img` varchar(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_zx
-- ----------------------------
INSERT INTO ds_zx VALUES ('13827610172', 'tel', '1');
INSERT INTO ds_zx VALUES ('53007d7931975.jpg', 'banner', '3');
INSERT INTO ds_zx VALUES ('5901bcd9655d8.png', 'logo', '15');
