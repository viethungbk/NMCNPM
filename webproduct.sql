-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 06:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_group_id` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `admin_group_id`) VALUES
(11, 'ledinhphuc98', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Đình Phúc', 0),
(8, 'manhronado', '11a630586e4c318d274313a99577a5c3', 'Vũ Duy Mạnh ', 0),
(10, 'phamdaitai1998', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Đại Tài', 0),
(9, 'viethung59', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Việt Hùng', 0),
(12, 'trongcanhbk', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Trọng Cảnh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `parent_id`, `sort_order`) VALUES
(26, 'VIVO', 1, 1),
(31, 'HTC', 1, 2),
(10, 'Apple', 2, 3),
(8, 'Nokia', 1, 4),
(7, 'Huawei', 1, 5),
(6, 'OPPO', 1, 6),
(5, 'Xiaomi', 1, 7),
(4, 'Sony', 1, 8),
(3, 'Samsung', 1, 9),
(2, 'IOS', 0, 10),
(1, 'Android', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(128) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_static`
--

CREATE TABLE `content_static` (
  `id` int(11) NOT NULL,
  `key` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `content` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `content_static`
--

INSERT INTO `content_static` (`id`, `key`, `content`) VALUES
(3, 'footer', '<p class=\"bold\">\r\n &copy;2013 -2014 Bản quyền thuộc về&nbsp; <strong>C&ocirc;ng ty TNHH Tuấn Thoa media &ndash; Đại l&yacute; VTC Digital</strong></p>\r\n<p>\r\n Lĩnh vực hoạt động của c&ocirc;ng ty: Điện &amp; điện tử , b&aacute;n lẻ &amp; b&aacute;n bu&ocirc;n</p>\r\n<p>\r\n <strong>Cơ sở 1:</strong>: Cẩm La, X&atilde; Thanh Sơn, Huyện Kiến Thụy, Th&agrave;nh Phố Hải Ph&ograve;ng - DT: 0313881505</p>\r\n<p>\r\n <strong>Cơ sở 2:</strong>: Cẩm Xu&acirc;n, N&uacute;i Đối, Huyện Kiến Thụy, Th&agrave;nh Phố Hải Ph&ograve;ng - DT: 0313812682</p>\r\n'),
(18, 'shipping', '<p>\r\n Chi ph&iacute; vận chuyển của Tuấn Thoa Media</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(50) COLLATE utf8_bin NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0',
  `feature` enum('0','1') COLLATE utf8_bin NOT NULL,
  `count_view` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `intro`, `content`, `meta_desc`, `meta_key`, `image_link`, `created`, `feature`, `count_view`) VALUES
(1, 'Nhà lầu siêu xe hàng mã ế sưng, đồ chơi biển đảo hút khách', '(Dân trí) - Loạt đồ chơi trung thu biển đảo hướng về quê hương mới xuất hiện nhưng đã hút khách, các mặt hàng vàng mã “xa xỉ” không còn được nhiều người mua sắm.', '<p style=\"TEXT-ALIGN: left\">\r\n	Theo b&aacute;c Lan, một chủ cửa h&agrave;ng ở phố H&agrave;ng M&atilde; chia sẻ: &ldquo;Kinh tế kh&oacute; khăn n&ecirc;n người bỏ tiền triệu ra mua đồ c&uacute;ng đắt tiền như nh&agrave; lầu, xe hơi, điện thoại, ti vi c&ograve;n rất &iacute;t. Mọi người chỉ lựa chọn những loại đồ c&oacute; gi&aacute; b&igrave;nh d&acirc;n như quần &aacute;o, gi&agrave;y d&eacute;p v&agrave; mũ để c&uacute;ng. Những mặt h&agrave;ng b&aacute;n chạy nhất l&agrave; tiền &acirc;m phủ, v&agrave;ng, quần &aacute;o hay gi&agrave;y d&eacute;p v&igrave; c&oacute; gi&aacute; kh&aacute; b&igrave;nh d&acirc;n&rdquo;.</p>\r\n<p style=\"TEXT-ALIGN: center\">\r\n	<img alt=\"Mặt hàng đèn lồng biển đảo mới xuất hiện trong dịp Tết Trung Thu năm nay\" src=\"http://dantri4.vcmedia.vn/Urgz3f5tKFdDA0VUUO/Image/2014/08/n1-242e1.jpg\" /><br />\r\n	<span style=\"FONT-FAMILY: Tahoma; FONT-SIZE: 10pt\">Mặt h&agrave;ng đ&egrave;n lồng biển đảo mới xuất hiện trong dịp Tết Trung Thu năm nay</span></p>\r\n<p style=\"TEXT-ALIGN: center\">\r\n	<span style=\"FONT-FAMILY: Tahoma\"><img alt=\"Các thông điệp ý nghĩa yêu quê hương, biển đảo được in lên đèn lồng\" src=\"http://dantri4.vcmedia.vn/Urgz3f5tKFdDA0VUUO/Image/2014/08/n2-242e1.jpg\" /></span><br />\r\n	<span style=\"FONT-FAMILY: Tahoma; FONT-SIZE: 10pt\">C&aacute;c th&ocirc;ng điệp &yacute; nghĩa y&ecirc;u qu&ecirc; hương, biển đảo được in l&ecirc;n đ&egrave;n lồng</span></p>\r\n<p>\r\n	Một mặt h&agrave;ng đặc biệt của m&ugrave;a Vu Lan năm nay đ&oacute; l&agrave; loại đồ chơi &ldquo;biển đảo&rdquo;. Đ&oacute; l&agrave; những chiếc đ&egrave;n lồng được in những th&ocirc;ng điệp hướng về qu&ecirc; hương, biển đảo hết sức &yacute; nghĩa.</p>\r\n<div class=\"article-side-rail\" id=\"article-side-rail\">\r\n	<div class=\"article-video-relation\">\r\n		<div class=\"relative\">\r\n			<img alt=\"Mùa Vu Lan: \" class=\"thumb\" src=\"http://video-thumbs.vcmedia.vn///dantri/7iS0Ym1SbbOoTsWhJi6Q/2014/08/08/vangma-15e63.jpg\" /><img class=\"ico\" src=\"http://dantri3.vcmedia.vn/App_Themes/Default/Images/ico_video_play.png\" /></div>\r\n		<p class=\"caption\">\r\n			M&ugrave;a Vu Lan: &quot;Xe si&ecirc;u sang&quot; đỗ chật phố H&agrave;ng M&atilde;</p>\r\n	</div>\r\n</div>\r\n<p>\r\n	C&aacute;c chủ cửa h&agrave;ng tại đ&acirc;y cho biết, c&aacute;c loại mặt h&agrave;ng l&agrave;m thủ c&ocirc;ng truyền thống đ&egrave;n lồng, đầu l&acirc;n, đ&egrave;n &ocirc;ng sao vẫn được kh&aacute;ch h&agrave;ng ưa chuộng nhất. Ngo&agrave;i ra, mẫu đ&egrave;n lồng in sẵn mang th&ocirc;ng điệp hướng về biển đảo qu&ecirc; hương được nhiều bậc phụ huynh v&agrave; c&aacute;c em học sinh đặc biệt y&ecirc;u th&iacute;ch.</p>\r\n<p style=\"TEXT-ALIGN: center\">\r\n	<img alt=\"Mới xuất hiện nhưng những chiếc đèn lồng này được nhiều phụ huynh và các em nhỏ lựa chọn\" src=\"http://dantri4.vcmedia.vn/Urgz3f5tKFdDA0VUUO/Image/2014/08/n4-242e1.jpg\" /><br />\r\n	<span style=\"FONT-FAMILY: Tahoma; FONT-SIZE: 10pt\">Mới xuất hiện nhưng những chiếc đ&egrave;n lồng n&agrave;y được nhiều phụ huynh v&agrave; c&aacute;c em nhỏ lựa chọn</span><br />\r\n	&nbsp;</p>\r\n<p>\r\n	Chiếc đ&egrave;n lồng mang th&ocirc;ng điệp biển đảo được gh&eacute;p lại bằng 3 mảnh b&igrave;a kh&aacute;c nhau. Chiếc đ&egrave;n c&oacute; thể thắp s&aacute;ng v&agrave; ph&aacute;t nhạc khi được lắp pin ở tay cầm.Tuy nhi&ecirc;n, chi tiết đ&aacute;ng ch&uacute; &yacute; nhất đ&oacute; l&agrave; những th&ocirc;ng điệp hướng về biển đảo in tr&ecirc;n th&acirc;n của chiếc đ&egrave;n lồng như &ldquo;Em y&ecirc;u biển đảo qu&ecirc; hương&rdquo;, &ldquo;B&eacute; hướng về biển đảo&rdquo;, &ldquo;Em y&ecirc;u biển đảo Việt Nam&rdquo;, &ldquo;Em y&ecirc;u ch&uacute; bộ đội hải qu&acirc;n Việt Nam&rdquo;, với những h&igrave;nh ảnh chiến sĩ Hải qu&acirc;n Việt Nam s&uacute;ng kho&aacute;c tr&ecirc;n vai bảo vệ chủ quyền biển đảo Tổ quốc hay những chiếc t&agrave;u mang d&ograve;ng chữ Cảnh s&aacute;t biển Việt Nam&hellip;</p>\r\n', '', '', 'n1-242e1.jpg', 1407553602, '0', 1),
(2, 'Arsenal đồng ý bán Vermaelen cho Barcelona', '(Dân trí) - Theo những thông tin từ báo giới Anh, Arsenal đã quyết định từ chối MU, để bán trung vệ Vermarlen cho Barcelona. Mức giá của trung vệ này vào khoảng 15 triệu bảng.', '<p>\r\n	Như đ&atilde; biết, c&aacute;ch đ&acirc;y v&agrave;i ng&agrave;y, trung vệ Vermaelen đ&atilde; từ chối gia hạn hợp đồng với Arsenal. Điều đ&oacute; khiến cho CLB th&agrave;nh London t&igrave;m c&aacute;ch b&aacute;n cầu thủ n&agrave;y bằng mọi gi&aacute; để &ldquo;gỡ gạc&rdquo; ch&uacute;t &iacute;t ph&iacute; chuyển nhượng thay v&igrave; mất trắng cầu thủ n&agrave;y&nbsp;ở m&ugrave;a H&egrave; sang năm.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align=\"center\">\r\n	<span style=\"FONT-FAMILY: Tahoma; FONT-SIZE: 10pt\"><img _fl=\"\" align=\"middle\" alt=\"Vermaelen ở rất gần Barcelona\" src=\"http://dantri4.vcmedia.vn/uajiKupQ6reCuKKDlVlG/Image/2014/08/Vermaelen-d4361.jpg\" style=\"MARGIN: 5px\" width=\"450\" /><br />\r\n	Vermaelen ở rất gần Barcelona</span><br />\r\n	&nbsp;</div>\r\n<p>\r\n	Trong thời gian gần đ&acirc;y, MU v&agrave; Barcelona l&agrave; hai ứng cử vi&ecirc;n s&aacute;ng gi&aacute; trong cuộc đua gi&agrave;nh chữ k&yacute; của hậu vệ người Bỉ. Cuối c&ugrave;ng, HLV Wenger đ&atilde; quyết định từ chối MU để b&aacute;n Vermarlen cho Barcelona. Trước đ&oacute; c&oacute; th&ocirc;ng tin cho rằng Wenger muốn đổi Vermaelen lấy Smalling, tuy nhi&ecirc;n Van Gaal lại từ chối phương &aacute;n n&agrave;y.</p>\r\n<p>\r\n	Trước b&aacute;o giới, HLV Wenger cho biết: &ldquo;Ch&uacute;ng t&ocirc;i đ&atilde; nhận được những lời đề nghị từ nước ngo&agrave;i v&agrave; quyết định để Vermaelen rời khỏi Premier League. Bản th&acirc;n Arsenal cũng đang ở trong thế kh&oacute; trong vụ n&agrave;y&rdquo;.</p>\r\n<p>\r\n	Theo tờ BBC, Arsenal đ&atilde; đồng &yacute; lời đề nghị trị gi&aacute; 15 triệu bảng của Barcelona. Trong thời gian tới, trung vệ người Bỉ sẽ được quyền tự do đ&agrave;m ph&aacute;n với đội b&oacute;ng xứ Catalan.</p>\r\n<p>\r\n	Nhiều khả năng thương vụ n&agrave;y sẽ ho&agrave;n tất trong thời gian tới. Arsenal cũng bắt đầu t&igrave;m người thay thế Vermaelen. L&uacute;c n&agrave;y, ưu ti&ecirc;n số 1 của HLV Wenger l&agrave; trung vệ Nastasic của Man City, người nhiều khả năng sẽ mất vị tr&iacute; nếu như Mangala gia nhập Etihad.</p>\r\n<p align=\"right\">\r\n	<b>H.Long</b></p>\r\n', '', '', 'Vermaelen-d4361.jpg', 1407553674, '0', 2),
(3, 'Hà Nội: CSGT tìm người thân giúp cháu bé 8 tuổi đi lạc', '(Dân trí) - Theo người thân cháu Chi, trong lúc gia đình nghỉ trưa, cháu Chi mải chơi đã đi lạc từ phía phường Ngọc Lâm (quận Long Biên) sang nội thành. Trong lúc đang hoang mang tìm cháu, gia đình nhận được tin báo của lực lượng cảnh sát giao thông.', '<p>\r\n	Khoảng 15h30 ng&agrave;y 8/8, khi đang l&agrave;m nhiệm vụ tại chốt ph&iacute;a nam cầu Chương Dương (địa b&agrave;n quận Ho&agrave;n Kiếm, H&agrave; Nội), Thượng sĩ Phạm Gia Hợp v&agrave; Thượng t&aacute; L&ecirc; Đức Đo&agrave;n(Đội CSGT số 1) ph&aacute;t hiện một ch&aacute;u b&eacute; khoảng 7-8 tuổi đi bộ tr&ecirc;n khu vực cầu Chương Dương với vẻ mặt sợ sệt. Khi Thượng sĩ Hợp v&agrave; Thượng t&aacute; Đ&ograve;an tiến lại hỏi han, ch&aacute;u b&eacute; c&oacute; biểu hiện sợ sệt v&agrave; bật kh&oacute;c n&oacute;i rằng đi lạc đường.</p>\r\n<p>\r\n	Thấy ch&aacute;u b&eacute; lả đi v&igrave; mệt, Thượng sĩ Hợp đ&atilde; đưa ch&aacute;u về chốt trực, mua b&aacute;nh v&agrave; sữa để ch&aacute;u ăn đỡ đ&oacute;i v&agrave; trấn tĩnh lại. Đồng thời, Thượng sĩ Hợp th&ocirc;ng b&aacute;o tr&ecirc;n c&aacute;c phương tiện th&ocirc;ng tin đại ch&uacute;ng về đặc điểm nhận dạng của ch&aacute;u b&eacute;.</p>\r\n<p>\r\n	<img alt=\"Cháu Chi đoàn tụ với gia đình.\" src=\"http://dantri4.vcmedia.vn/xFKfMbJ7RTXgah5W1cc/Image/2014/08/455-549e4.jpg\" /><br />\r\n	Ch&aacute;u Chi đo&agrave;n tụ với gia đ&igrave;nh.</p>\r\n<p>\r\n	Sau khi trấn tĩnh lại, ch&aacute;u b&eacute; cho biết t&ecirc;n l&agrave; Vương Kim Chi (SN 2007), năm nay l&ecirc;n lớp 2 trường tiểu học &Aacute;i Mộ, quận Long Bi&ecirc;n, H&agrave; Nội. Bằng c&aacute;c biện ph&aacute;p nghiệp vụ, Thượng sĩ Hợp v&agrave; Thượng t&aacute; Đo&agrave;n đ&atilde; li&ecirc;n hệ được với c&ocirc; gi&aacute;o chủ nhiệm ch&aacute;u Chi để th&ocirc;ng b&aacute;o với gia đ&igrave;nh ch&aacute;u b&eacute; biết.</p>\r\n<p>\r\n	Gần 2 tiếng đồng hồ sau, mẹ ch&aacute;u Chi l&agrave; chị Đo&agrave;n Thị Khuyến (SN 1983, ở Ngọc L&acirc;m, Long Bi&ecirc;n, H&agrave; Nội) đ&atilde; t&igrave;m đến trụ sở Đội CSGT số 1 nhận lại con. Chị Khuyến cho cho biết, khoảng 14h c&ugrave;ng ng&agrave;y, trong l&uacute;c gia đ&igrave;nh nghỉ trưa, ch&aacute;u Chi mải chơi đ&atilde; đi lạc từ b&ecirc;n n&agrave;y cầu sang b&ecirc;n kia nội th&agrave;nh.</p>\r\n<p>\r\n	Trong l&uacute;c hoang mang kh&ocirc;ng biết t&igrave;m ch&aacute;u ở đ&acirc;u, gia đ&igrave;nh được th&ocirc;ng b&aacute;o ch&aacute;u Chi đ&atilde; được c&aacute;c chiến sĩ CSGT tận t&igrave;nh gi&uacute;p đỡ. Thay mặt gia đ&igrave;nh, chị Khuyến đ&atilde; viết thư cảm ơn c&aacute;c chiến sĩ cảnh s&aacute;t giao th&ocirc;ng.</p>\r\n<p>\r\n	<strong>Tiến Nguy&ecirc;n</strong></p>\r\n', '', '', '455-549e4.jpg', 1407553969, '0', 9),
(4, 'Mỹ tăng cường không kích Iraq', '(Dân trí) - Sau khi Tổng thống Obama phê chuẩn cho không kích các mục tiêu của nhóm phiến quân Hồi giáo IS ở miền bắc Iraq, Lầu Năm Góc đã tiến hành 3 đợt không kích.', '<p>\r\n	C&aacute;c vụ kh&ocirc;ng k&iacute;ch nhằm v&agrave;o nh&oacute;m Nh&agrave; nước Hồi gi&aacute;o (IS) ở miền bắc Iraq l&agrave; những cuộc tấn c&ocirc;ng đầu ti&ecirc;n kể từ khi Mỹ trực tiếp tham gia v&agrave;o hoạt động qu&acirc;n sự ở Iraq v&agrave; sau đ&oacute; r&uacute;t qu&acirc;n v&agrave;o cuối năm 2011.</p>\r\n<p>\r\n	Trong cuộc kh&ocirc;ng k&iacute;ch đầu ti&ecirc;n v&agrave;o ng&agrave;y thứ s&aacute;u, m&aacute;y bay kh&ocirc;ng người l&aacute;i c&ugrave;ng chiến đấu cơ hải qu&acirc;n Mỹ đ&atilde; nhắm v&agrave;o c&aacute;c mục ti&ecirc;u gần th&agrave;nh phố Irbil của người Kurd. Sau đ&oacute; họ tiến h&agrave;nh th&ecirc;m 2 đợt tấn c&ocirc;ng nữa.</p>\r\n<p>\r\n	Nh&oacute;m Hồi gi&aacute;o người Sunni IS đ&atilde; chiếm quyền kiểm so&aacute;t nhiều khu vực của Iraq v&agrave; cả Syria.</p>\r\n<p>\r\n	H&agrave;ng chục ng&agrave;n người thuộc c&aacute;c nh&oacute;m d&acirc;n tộc thiểu số đ&atilde; phải rời bỏ nh&agrave; cửa khi phiến qu&acirc;n tiến v&agrave;o.</p>\r\n<p>\r\n	Nh&oacute;m IS hay c&ograve;n được gọi l&agrave; ISIS cũng đ&atilde; chiếm đập lớn nhất Iraq.</p>\r\n<p>\r\n	Lầu Năm G&oacute;c cho biết trong đợt kh&ocirc;ng k&iacute;ch thứ hai, m&aacute;y bay kh&ocirc;ng người l&aacute;i của Mỹ đ&atilde; ph&aacute; hủy một vị tr&iacute; đặt ph&aacute;o của phiến qu&acirc;n v&agrave; ti&ecirc;u diệt một nh&oacute;m phiến qu&acirc;n.</p>\r\n<p>\r\n	Chỉ hơn một tiếng sau, chiến đấu cơ F/A-18 đ&atilde; d&ugrave;ng bom c&oacute; laser dẫn đường bắn tr&uacute;ng một đo&agrave;n 7 xe của IS.</p>\r\n<p>\r\n	Trước đ&oacute;, v&agrave;o ng&agrave;y thứ s&aacute;u, 2 quả bom đ&atilde; được thả xuống một khẩu ph&aacute;o của IS d&ugrave;ng để chống lại lực lượng đang bảo vệ Irbil, thủ phủ của v&ugrave;ng tự trị của người Kurd.</p>\r\n<p>\r\n	Ph&aacute;t ng&ocirc;n vi&ecirc;n Bộ Ngoại giao Mỹ Marie Harf cho biết mục ti&ecirc;u trước mắt của c&aacute;c cuộc kh&ocirc;ng k&iacute;ch l&agrave; &ldquo;ngăn chặn bước tiến&rdquo; của IS về Irbil.</p>\r\n<p>\r\n	&ldquo;Sau đ&oacute; về l&acirc;u d&agrave;i chung t&ocirc;i muốn phối hợp hỗ trợ th&ecirc;m thời gian v&agrave; kh&ocirc;ng gian cho c&aacute;c lực lượng của người Kurd để xốc lại lực lượng, chiến đấu với đe dọa của ch&iacute;nh họ&rdquo;.</p>\r\n<p>\r\n	B&agrave; cũng khẳng định &ldquo;kh&ocirc;ng c&oacute; giải ph&aacute;p qu&acirc;n sự l&acirc;u d&agrave;i của Mỹ ở đ&oacute;&rdquo;.</p>\r\n<p>\r\n	Mặc d&ugrave; ch&iacute;nh phủ Iraq v&agrave; V&ugrave;ng người Kurd vẫn c&ograve;n đang c&oacute; bất đồng trong những th&aacute;ng qua, nhưng Thủ tướng Nouri Maliki đ&atilde; ph&aacute;i một m&aacute;y bay chở đạn tới Irbil v&agrave; thứ s&aacute;u. Trước đ&oacute; &ocirc;ng đ&atilde; lệnh cho lực lượng kh&ocirc;ng qu&acirc;n hỗ trợ cho c&aacute;c tay s&uacute;ng người Kurd để chiến đấu chống IS.</p>\r\n<p>\r\n	<b>Trung Anh</b></p>\r\n', '', '', '1-7d48c.jpg', 1407554007, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `transaction_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `data` text COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`transaction_id`, `id`, `product_id`, `qty`, `amount`, `data`, `status`) VALUES
(7, 6, 2, 1, '4000000.0000', '', 1),
(8, 7, 2, 1, '4000000.0000', '', 0),
(9, 8, 8, 1, '10000000.0000', '', 0),
(10, 9, 8, 1, '10000000.0000', '', 0),
(11, 10, 8, 1, '10000000.0000', '', 2),
(12, 11, 8, 1, '10000000.0000', '', 0),
(13, 12, 8, 2, '20000000.0000', '', 1),
(14, 13, 8, 1, '10000000.0000', '', 1),
(15, 14, 3, 1, '5000000.0000', '', 1),
(16, 15, 3, 1, '5000000.0000', '', 1),
(17, 16, 3, 1, '5000000.0000', '', 0),
(18, 17, 3, 1, '5000000.0000', '', 0),
(19, 18, 3, 1, '5000000.0000', '', 0),
(20, 19, 3, 1, '5000000.0000', '', 0),
(21, 20, 8, 1, '10000000.0000', '', 0),
(28, 21, 104, 1, '6690000.0000', '', 2),
(29, 22, 104, 3, '20070000.0000', '', 1),
(30, 23, 100, 1, '42790000.0000', '', 0),
(31, 24, 171, 1, '12400000.0000', '', 0),
(31, 25, 11, 1, '19990000.0000', '', 0),
(31, 26, 170, 1, '29990000.0000', '', 0),
(32, 27, 171, 1, '12400000.0000', '', 0),
(33, 28, 170, 1, '29990000.0000', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `maker_id` int(255) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `discount` int(11) NOT NULL,
  `image_link` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `warranty` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(255) NOT NULL,
  `buyed` int(255) NOT NULL,
  `rate_total` int(255) NOT NULL,
  `rate_count` int(255) NOT NULL,
  `gifts` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `maker_id`, `price`, `discount`, `image_link`, `image_list`, `created`, `view`, `warranty`, `total`, `buyed`, `rate_total`, `rate_count`, `gifts`, `content`) VALUES
(11, 3, 'Samsung Galaxy Note 8', 0, '19990000.0000', 0, 'product14.jpg', '[\"note8_12.jpg\",\"note8_22.jpg\",\"note8_31.jpg\"]', 1543501467, 23, '12 tháng', 0, 100, 17, 1, 'USB 4G', '123'),
(166, 6, 'OPPO Find X', 0, '20990000.0000', 500000, 'product7.jpg', '[\"findx11.jpg\",\"findx21.png\",\"findx31.jpg\"]', 1543501462, 114, '12 tháng', 0, 16, 17, 5, 'USB 4G', ''),
(9, 7, 'Huawei Mate 20 Pro', 0, '21990000.0000', 0, 'product13.jpg', '[\"mate20_pro11.jpg\",\"mate20_pro21.jpg\",\"mate20_pro31.jpg\"]', 1543501464, 19, '12 tháng', 0, 10, 4, 1, '0', ''),
(165, 3, 'Samsung Galaxy S9+ 128GB', 0, '24490000.0000', 200000, 'product5.jpg', '[\"s9+11.jpg\",\"s9+21.png\",\"s9+31.png\"]', 1543501433, 2, '12 tháng', 0, 50, 0, 0, 'USB 4G', ''),
(7, 5, 'Xiaomi Mi 8', 0, '12990000.0000', 400000, 'product6.jpg', '[\"mi821.png\",\"mi831.jpg\",\"note8_13.jpg\"]', 1543501459, 74, '12 tháng', 0, 14, 7, 2, 'USB 4G', ''),
(167, 3, 'Samsung Galaxy Note 9 512GB', 0, '28490000.0000', 0, 'product4.jpg', '[\"product4_11.jpg\",\"product4_21.jpg\",\"product4_31.jpg\"]', 1543501420, 2, '12 tháng', 0, 37, 0, 0, 'USB 4G', ''),
(4, 10, 'Iphone 8 Plus 256GB', 0, '25790000.0000', 1000, 'product3.jpg', '[\"iphone-8-plus-256gb-maubac-1-1-org.jpg\",\"iphone-8-plus-256gb-maubac-2-1-org.jpg\"]', 1544725209, 5, '12 tháng', 0, 12, 12, 3, 'USB 4G', ''),
(170, 10, 'Iphone X 256GB', 0, '29990000.0000', 0, 'product1.jpg', '[\"x11.jpg\",\"x21.png\",\"x31.jpg\"]', 1543501492, 23, '12 tháng', 0, 150, 4, 1, 'USB 4G', ''),
(168, 10, 'Iphone Xs Max 512GB', 0, '42990000.0000', 200000, 'product2.jpg', '[\"product2_12.png\",\"product2_22.png\",\"product2_32.png\"]', 1544723586, 16, '12 tháng', 0, 16, 4, 1, 'USB 4G', ''),
(104, 6, 'OPPO F9', 0, '7690000.0000', 1000000, 'oppof91.png', '[\"oppo-f911.png\"]', 1544848962, 4, '12 tháng', 0, 0, 0, 0, 'không', ''),
(106, 10, 'iPhone SE 16BB', 0, '4000000.0000', 1000000, '1.jpg', '[\"11.jpg\",\"2.jpg\",\"3.jpg\",\"4.jpg\",\"5.png\",\"6.png\"]', 1545006995, 0, '3 tháng', 0, 0, 0, 0, 'Củ sạc, dây sạc, ốp lưng', ''),
(107, 7, 'Huawei Mate 20', 0, '22000000.0000', 300000, '153511381700758286.jpg', '[\"1535113817007582861.jpg\",\"153511381700758286.png\"]', 1545011289, 0, '3 năm', 0, 0, 0, 0, 'Sạc dự phòng, tai nghe', ''),
(108, 7, 'Huawei mate 20 Pro', 0, '24000000.0000', 2000000, '31.jpg', '[\"12.jpg\",\"21.jpg\",\"32.jpg\"]', 1545011353, 0, '3 năm', 0, 0, 0, 0, 'Sạc dự phòng', ''),
(109, 7, 'Huawei Mate 20X', 0, '20000000.0000', 0, '13.jpg', '[\"14.jpg\",\"22.jpg\"]', 1545011407, 0, '3 năm', 0, 0, 0, 0, 'Sạc dự phòng 5000 mpA', ''),
(110, 7, 'Huawei Nova 3 ', 0, '13000000.0000', 1000000, '15.jpg', '[\"16.jpg\",\"2.png\",\"3.png\"]', 1545011459, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe\r\n', ''),
(111, 7, 'Huawei Nova 3i', 0, '14000000.0000', 1000000, '17.jpg', '[\"18.jpg\",\"21.png\",\"31.png\"]', 1545011510, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(112, 7, 'Huawei P20 Pro', 0, '22000000.0000', 1000000, '19.jpg', '[\"110.jpg\",\"22.png\",\"32.png\"]', 1545011575, 0, '3 năm', 0, 0, 0, 0, 'Sạc dự phòng, ốp lưng', ''),
(113, 7, 'Huawei Y6 Prime', 0, '14000000.0000', 2000000, '111.jpg', '[\"112.jpg\",\"23.jpg\"]', 1545011624, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(114, 7, 'Huawei Y7 Prime ', 0, '14000000.0000', 300000, '113.jpg', '[\"114.jpg\",\"23.png\",\"33.jpg\"]', 1545011665, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(115, 7, 'Huawei Y7 Pro', 0, '16000000.0000', 300000, '115.jpg', '[\"116.jpg\",\"24.png\",\"33.png\"]', 1545011710, 0, '3 năm', 0, 0, 0, 0, 'Ốp lưng', ''),
(116, 7, 'Huawei Y9 2019', 0, '20000000.0000', 0, '117.jpg', '[\"118.jpg\",\"24.jpg\",\"34.jpg\"]', 1545011759, 0, '3 năm', 0, 0, 0, 0, 'Sạc dự phòng', ''),
(117, 10, 'iPhone 6s 32 GB', 0, '6000000.0000', 300000, '119.jpg', '[\"120.jpg\",\"25.jpg\",\"34.png\",\"4.png\",\"6s-plus-gold-back.png\"]', 1545011837, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(118, 10, 'iPhone 7 Plus 32 GB', 0, '7000000.0000', 0, '121.jpg', '[\"122.jpg\",\"26.jpg\",\"35.png\",\"41.png\",\"51.png\",\"61.png\"]', 1545011887, 0, '3 tháng', 0, 0, 0, 0, 'Ốp lưng', ''),
(119, 10, 'iPhone 7 Plus 128GB', 0, '8000000.0000', 300000, '123.jpg', '[\"124.jpg\",\"27.jpg\",\"35.jpg\",\"42.png\",\"52.png\",\"62.png\"]', 1545011938, 0, '3 tháng', 0, 0, 0, 0, 'Ốp lưng', ''),
(120, 10, 'iPhone 8 Plus 64 GB', 0, '9000000.0000', 300000, '125.jpg', '[\"126.jpg\",\"28.jpg\",\"36.jpg\",\"43.png\",\"53.png\",\"63.png\",\"7.png\"]', 1545011997, 0, '3 năm', 0, 0, 0, 0, 'Tai nghe', ''),
(121, 10, 'iPhone X 64 GB', 0, '20000000.0000', 1000000, '127.jpg', '[\"128.jpg\",\"29.jpg\",\"36.png\",\"44.png\",\"5.jpg\",\"6.jpg\"]', 1545012078, 0, '3 năm', 0, 0, 0, 0, 'Ốp lưng', ''),
(122, 10, 'Iphone XR 64 GB', 0, '22000000.0000', 2000000, '129.jpg', '[\"130.jpg\",\"210.jpg\",\"37.jpg\",\"41.jpg\"]', 1545012124, 0, '3 năm', 0, 0, 0, 0, 'Tai nghe', ''),
(123, 10, 'Iphone XR 256 GB', 0, '23000000.0000', 300000, '38.jpg', '[\"131.jpg\",\"211.jpg\",\"39.jpg\",\"42.jpg\"]', 1545012189, 0, '3 năm', 0, 0, 0, 0, 'Móc chìa khóa', ''),
(124, 10, 'iPhone XS 64 GB', 0, '264000000.0000', 1000000, '132.jpg', '[\"133.jpg\",\"25.png\",\"37.png\",\"45.png\"]', 1545012267, 0, '3 năm', 0, 0, 0, 0, 'Sạc nhanh', ''),
(125, 10, 'iPhone XS Max 64 GB', 0, '28000000.0000', 0, '134.jpg', '[\"135.jpg\",\"26.png\",\"38.png\",\"46.png\"]', 1545012349, 0, '3 năm', 0, 0, 0, 0, 'Tai nghe không dây', ''),
(127, 8, 'Nokia 1', 0, '3000000.0000', 1000000, '136.jpg', '[\"137.jpg\",\"28.png\",\"310.jpg\"]', 1545012449, 0, '1 tháng', 0, 0, 0, 0, 'Không', ''),
(128, 8, 'Nokia 2.1', 0, '4000000.0000', 2000000, '138.jpg', '[\"139.jpg\",\"29.png\",\"310.png\"]', 1545012483, 0, '1 tháng', 0, 0, 0, 0, 'Không', ''),
(129, 8, 'Nokia 3.1 16GB', 0, '4300000.0000', 1000000, '140.jpg', '[\"141.jpg\",\"212.jpg\",\"311.png\"]', 1545012531, 0, '1 tháng', 0, 0, 0, 0, '', ''),
(130, 8, 'Nokia 3.1 32 GB', 0, '4500000.0000', 300000, '213.jpg', '[\"1.png\",\"214.jpg\"]', 1545012589, 0, '1 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(131, 8, 'Nokia 5', 0, '5000000.0000', 300000, '142.jpg', '[\"143.jpg\",\"210.png\",\"312.png\"]', 1545012635, 0, '3 năm', 0, 0, 0, 0, 'Ốp lưng', ''),
(132, 8, 'Nokia 5.1 Plus', 0, '5600000.0000', 600000, '144.jpg', '[\"145.jpg\",\"211.png\",\"313.png\"]', 1545012682, 0, '3 năm', 0, 0, 0, 0, 'Ốp lưng', ''),
(133, 8, 'Nokia 6.1 32GB', 0, '6800000.0000', 300000, '146.jpg', '[\"147.jpg\",\"215.jpg\",\"311.jpg\",\"49.png\",\"64.png\"]', 1545012774, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(134, 8, 'Nokia 6.1 2018', 0, '7000000.0000', 300000, '216.jpg', '[\"148.jpg\",\"217.jpg\",\"314.png\"]', 1545012836, 0, '3 năm', 0, 0, 0, 0, 'Tai nghe', ''),
(135, 8, 'Nokia 6.1 Plus', 0, '7200000.0000', 500000, '149.jpg', '[\"150.jpg\",\"218.jpg\",\"312.jpg\",\"43.jpg\",\"51.jpg\"]', 1545012905, 0, '3 năm', 0, 0, 0, 0, 'Ốp lưng', ''),
(136, 8, 'Nokia 6.1 active', 0, '6500000.0000', 300000, '219.jpg', '[\"151.jpg\",\"220.jpg\",\"313.jpg\",\"44.jpg\"]', 1545012999, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(137, 8, 'Nokia 7 Plus', 0, '10000000.0000', 600000, '152.jpg', '[\"153.jpg\",\"212.png\",\"315.png\",\"45.jpg\",\"52.jpg\"]', 1545013050, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(138, 8, 'Nokia 8.1', 0, '14000000.0000', 1000000, '154.jpg', '[\"155.jpg\",\"221.jpg\"]', 1545013418, 0, '3 năm', 0, 0, 0, 0, 'Sạc nhanh', ''),
(139, 8, 'Nokia 9', 0, '20000000.0000', 2000000, '156.jpg', '[\"157.jpg\",\"222.jpg\"]', 1545013455, 0, '3 năm', 0, 0, 0, 0, 'Sạc không dây', ''),
(140, 26, 'Vivo v5s', 0, '7000000.0000', 500000, '158.jpg', '[\"159.jpg\",\"213.png\",\"316.png\",\"410.png\",\"54.png\"]', 1545013524, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(141, 26, 'Vivo v5 plus', 0, '8000000.0000', 300000, '214.png', '[\"160.jpg\",\"215.png\",\"317.png\",\"411.png\",\"55.png\"]', 1545013587, 0, '3 năm', 0, 0, 0, 0, 'sạc dự phòng', ''),
(142, 26, 'Vivo v7+', 0, '14000000.0000', 2000000, '161.jpg', '[\"162.jpg\",\"223.jpg\",\"318.png\",\"412.png\"]', 1545013634, 0, '3 năm', 0, 0, 0, 0, 'Ốp lưng', ''),
(143, 26, 'Vivo v7+ plus', 0, '14000000.0000', 600000, '224.jpg', '[\"163.jpg\",\"225.jpg\",\"319.png\",\"413.png\"]', 1545013671, 0, '3 năm', 0, 0, 0, 0, 'Tai nghe', ''),
(144, 31, 'HTC One M7', 0, '8000000.0000', 1000000, '164.jpg', '[\"165.jpg\",\"226.jpg\",\"314.jpg\"]', 1545013761, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(145, 31, 'HTC One M7 Plus', 0, '8000000.0000', 0, '227.jpg', '[\"166.jpg\",\"228.jpg\",\"315.jpg\"]', 1545013803, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(146, 31, 'HTC One M8', 0, '9000000.0000', 300000, '167.jpg', '[\"168.jpg\",\"229.jpg\",\"316.jpg\"]', 1545013845, 0, '3 tháng', 0, 0, 0, 0, 'Ốp lưng', ''),
(147, 31, 'HTC One M8 Plus', 0, '8500000.0000', 300000, '230.jpg', '[\"169.jpg\",\"231.jpg\",\"317.jpg\"]', 1545013903, 0, '3 năm', 0, 0, 0, 0, '', ''),
(148, 31, 'HTC One M8 active', 0, '8000000.0000', 0, '318.jpg', '[\"170.jpg\",\"232.jpg\",\"319.jpg\"]', 1545013948, 0, '3 tháng', 0, 0, 0, 0, '', ''),
(149, 31, 'HTC One M9', 0, '13000000.0000', 1000000, '171.jpg', '[\"172.jpg\",\"233.jpg\",\"320.jpg\",\"46.jpg\"]', 1545014130, 0, '3 năm', 0, 0, 0, 0, 'Sạc dự phòng', ''),
(150, 31, 'HTC One M9 Pro', 0, '14000000.0000', 300000, '234.jpg', '[\"173.jpg\",\"235.jpg\",\"321.jpg\",\"47.jpg\"]', 1545014165, 0, '3 năm', 0, 0, 0, 0, 'Ốp lưng', ''),
(151, 31, 'HTC U12 Life', 0, '18000000.0000', 2000000, '174.jpg', '[\"175.jpg\",\"236.jpg\",\"322.jpg\",\"48.jpg\"]', 1545014245, 1, '3 năm', 0, 0, 0, 0, 'Sạc nhanh', ''),
(152, 6, 'OPPO A3s 16GB', 0, '4300000.0000', 300000, '176.jpg', '[\"177.jpg\",\"216.png\",\"320.png\",\"414.png\",\"56.png\",\"65.png\"]', 1545014302, 0, '1 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(153, 6, 'OPPO A3s 32 GB', 0, '8000000.0000', 1000000, '178.jpg', '[\"179.jpg\",\"217.png\",\"321.png\",\"415.png\",\"57.png\",\"66.png\",\"71.png\"]', 1545014374, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(154, 6, 'OPPO A7', 0, '8000000.0000', 500000, '180.jpg', '[\"181.jpg\"]', 1545014414, 0, '3 tháng', 0, 0, 0, 0, 'Ốp lưng', ''),
(155, 6, 'OPPO A7 64 GB', 0, '10000000.0000', 300000, '182.jpg', '[\"183.jpg\",\"237.jpg\",\"323.jpg\"]', 1545014466, 0, '3 tháng', 0, 0, 0, 0, 'Kính cường lực', ''),
(156, 6, 'OPPO A7 2018', 0, '13000000.0000', 2000000, '184.jpg', '[\"185.jpg\",\"238.jpg\",\"322.png\",\"416.png\"]', 1545014512, 0, '3 năm', 0, 0, 0, 0, 'TAI NGHE', ''),
(157, 6, 'OPPO F3 lite', 0, '6500000.0000', 1000000, '186.jpg', '[\"187.jpg\",\"239.jpg\",\"324.jpg\",\"49.jpg\",\"53.jpg\"]', 1545016809, 0, '3 tháng', 0, 0, 0, 0, 'Tai nghe', ''),
(158, 6, 'OPPO F7', 0, '8000000.0000', 300000, '188.jpg', '[\"189.jpg\",\"218.png\",\"323.png\",\"417.png\",\"58.png\",\"67.png\",\"72.png\"]', 1545016862, 0, '3 tháng', 0, 0, 0, 0, '', ''),
(159, 6, 'OPPO F7 Youth', 0, '8000000.0000', 0, '190.jpg', '[\"191.jpg\",\"219.png\",\"324.png\"]', 1545016918, 0, '1 tháng', 0, 0, 0, 0, '', ''),
(171, 6, 'OPPO F9', 0, '13000000.0000', 600000, '192.jpg', '[\"193.jpg\",\"240.jpg\",\"325.png\",\"418.png\",\"54.jpg\",\"68.png\"]', 1545017000, 11, '12 tháng', 0, 0, 0, 0, 'tai nghe samsung', ''),
(162, 6, 'OPPO R17 Pro', 0, '14000000.0000', 0, '196.jpg', '[\"197.jpg\",\"241.jpg\",\"325.jpg\"]', 1545017067, 0, '3 năm', 0, 0, 0, 0, 'sạc', ''),
(163, 3, 'Samsung Galaxy A7', 0, '7000000.0000', 500000, '198.jpg', '[\"199.jpg\",\"242.jpg\",\"326.jpg\",\"411.jpg\",\"56.jpg\",\"62.jpg\"]', 1545017124, 0, '3 tháng', 0, 0, 0, 0, 'Ốp lưng', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `payment` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `security` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `type`, `status`, `user_id`, `user_name`, `user_email`, `user_phone`, `amount`, `payment`, `payment_info`, `message`, `security`, `created`) VALUES
(33, 0, 0, 0, 'Vũ Duy Mạnh ', 'thinhhanh1@gmail.com', '0969160198', '29990000.0000', 'offline', '', 'ád', '', 1545073723),
(31, 0, 0, 20, 'Bùi Khánh Linh', 'linhlen@gmail.com', '0965235698', '62380000.0000', 'nganluong', '', 'kí túc xá Bách Khoa', '', 1545068242),
(29, 0, 0, 20, 'Vũ Duy Mạnh', 'thinhhanh1@gmail.com', '0969160198', '20070000.0000', 'offline', '', 'đa', '', 1545043529),
(30, 0, 0, 20, 'Vũ Duy Mạnh', 'thinhhanh1@gmail.com', '0969160198', '42790000.0000', 'offline', '', 'sdad', '', 1545044268);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `created`) VALUES
(21, 'Nguyễn Trọng Cảnh', 'cumanh.neymar@yahoo.com', '0123456789', 'abc', 'e10adc3949ba59abbe56e057f20f883e', 1544808288),
(20, 'Vũ Duy Mạnh', 'thinhhanh1@gmail.com', '0969160198', 'chung cư GREENPARK, Yên Hoà, Cầu Giấy, Hà Nội', 'cc6b3249d8ad27a6d4b20506b1bca8e8', 1544797885),
(22, 'Vũ Duy Mạnh ', 'thinhhanh2@gmail.com', '0969160198', 'abcdef', 'e10adc3949ba59abbe56e057f20f883e', 1544987266);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `news` ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
