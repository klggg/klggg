<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `fanwe_deal_agency`;");
E_C("CREATE TABLE `fanwe_deal_agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `brief` text NOT NULL,
  `company_brief` text NOT NULL,
  `history` text NOT NULL,
  `content` text NOT NULL,
  `is_effect` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `short_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `fanwe_deal_agency` values('1','<a href=\"http://www.fanwe.cn/\" title=\"担保机构参考\" target=\"_blank\"><img src=\"http://www.renrendai.com/event/zaccn/logo.jpg\" width=\"179\" height=\"41\" alt=\"\" border=\"0\" /></a>','担保机构参考','深圳市中安信业创业投资有限公司是一家专门为个体工商户、小企业主和低收入家庭提供快速简便、无抵押无担保小额个人贷款服务的企业。公司自2004年开始探索无抵押无担保贷款， 至今累计放款全国最多，小额贷款服务的客户最多。在广东省（深圳市、佛山市），北京市，天津市，上海市，河北省，福建省，山东省，江苏省，湖南省，广西， 四川省，浙江省，河南省，湖北省，安徽省与辽宁省等五十多家便利的网点，逾千名员工专门从事小额贷款业务。中安信业是国内探索无抵押无担保商业化 可持续小额贷款最早的、累计放款量和贷款余额最多的、全国网点最多的、信贷质量最好的、运作最为规范的专业小额贷款机构。','深圳市中安信业创业投资有限公司（中安信业）成立于2003年10月，是一家专门协助银行金融机构为微小企业、个体户及中低收入人群提供快速简便、免抵押、免担保小额贷款服务的专业现代化小额信贷技术服务公司；累计协助银行发放贷款逾数十亿元，一直保持良好的资产质量，对合作机构的还款从未发生过一分钱的逾期；全国60个营业网点，覆盖了17个省，26个城市，专业的信贷从业人员逾1500人。','<p><span>2003年</span> – 中安信业成立；</p>\r\n 				<p><span>2006年</span> – 深圳首家获政府批准的小额贷款试点企业；</p>\r\n 			 	<p><span>2008年</span> – 国际金融公司（IFC）入股中安信业，并派其全球小额贷款业务负责人参加中安信业的董事会；</p>\r\n			 	<p><span>2009年</span> – 首创 “贷款银行  + 代理机构” 的助贷模式，荣获深圳市市政府和国家开发银行的金融创新奖； </p>\r\n			 	<p><span>2010年 </span> – 深圳市小额贷款行业协会首届会长单位；</p>\r\n			 	<p><span>2011年</span> – 中国小额信贷机构联席会副会长单位； </p>\r\n			 	<p><span>2011年</span> – 中安信业携手国家开发银行、德国复兴信贷银行和国际金融公司共同创办了深圳龙岗国安村镇银行。</p>','<div style=\"margin-bottom:20px;\">			<h3>高管团队</h3>\r\n			<p style=\"text-indent:20px;\"> 	中安信业拥有业内经验最丰富的管理团队，包括了多名在国内外银行业和小额贷款领域的资深高级管理人员。他们分别来自汇丰银行，大众银行，摩根士丹利，花旗银行，Procredit，工商银行，建设银行，深圳发展银行，安信信贷，平安集团，中国人民银行等。 </p>\r\n		</div>\r\n<img src=\"http://www.renrendai.com/event/zaccn/thinLine.jpg\" width=\"818\" height=\"6\" alt=\"\" border=\"0\" /><div>			<h3>经济效益和社会效益</h3>\r\n			<div id=\"xiaoyi\">				<ul>					<li>中安信业的标志代表着我们的两大目标：经济效益和社会效益，经济回报和社会回报，二者相辅相成。</li>\r\n					<li>通过协助银行金融机构为小微企业提供贷款，帮助其发展壮大，推动了经济发展，促进了就业和社会稳定。<br />\r\n						-累计至今，至少为超过10万名小微企业主提供了贷款，支持了超过几十万个就业机会。<br />\r\n						-为处于创业阶段的小企业提供了发展资金，免抵押，免担保，无需财务报表					</li>\r\n						<li>创造了贷款客户、银行机构和社会的多赢局面。</li>\r\n						</ul>\r\n			</div>\r\n			<img src=\"http://www.renrendai.com/event/zaccn/photo.jpg\" alt=\"\" border=\"0\" />		</div>','1','0','担保机构参考','');");

require("../../inc/footer.php");
?>