-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 17, 2019 lúc 09:26 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tides_current`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(5, 8, '_edit_lock', '1559639025:1'),
(6, 8, '_wp_trash_meta_status', 'publish'),
(7, 8, '_wp_trash_meta_time', '1559639075'),
(8, 9, '_edit_last', '1'),
(9, 9, '_edit_lock', '1559641119:1'),
(10, 9, 'advanced_ads_ad_options', 'a:10:{s:7:\"visitor\";a:0:{}s:8:\"visitors\";a:0:{}s:6:\"output\";a:5:{s:9:\"allow_php\";s:1:\"0\";s:8:\"position\";s:0:\"\";s:6:\"margin\";a:4:{s:3:\"top\";s:0:\"\";s:5:\"right\";s:0:\"\";s:6:\"bottom\";s:0:\"\";s:4:\"left\";s:0:\"\";}s:10:\"wrapper-id\";s:0:\"\";s:13:\"wrapper-class\";s:0:\"\";}s:4:\"type\";s:5:\"plain\";s:3:\"url\";i:0;s:5:\"width\";i:0;s:6:\"height\";i:0;s:10:\"conditions\";a:0:{}s:11:\"expiry_date\";i:0;s:11:\"description\";s:0:\"\";}'),
(85, 34, '_wp_trash_meta_status', 'publish'),
(86, 34, '_wp_trash_meta_time', '1559717846'),
(87, 2, '_edit_lock', '1560414789:1'),
(108, 40, '_menu_item_type', 'post_type'),
(109, 40, '_menu_item_menu_item_parent', '0'),
(110, 40, '_menu_item_object_id', '2'),
(111, 40, '_menu_item_object', 'page'),
(112, 40, '_menu_item_target', ''),
(113, 40, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(114, 40, '_menu_item_xfn', ''),
(115, 40, '_menu_item_url', ''),
(117, 2, '_edit_last', '1'),
(118, 2, '_advads_ad_settings', 'a:1:{s:11:\"disable_ads\";i:0;}'),
(119, 42, '_menu_item_type', 'custom'),
(120, 42, '_menu_item_menu_item_parent', '0'),
(121, 42, '_menu_item_object_id', '42'),
(122, 42, '_menu_item_object', 'custom'),
(123, 42, '_menu_item_target', ''),
(124, 42, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(125, 42, '_menu_item_xfn', ''),
(126, 42, '_menu_item_url', 'http://localhost/wordpress/sample-page/'),
(128, 44, '_wp_trash_meta_status', 'publish'),
(129, 44, '_wp_trash_meta_time', '1560243902'),
(130, 46, '_wp_trash_meta_status', 'publish'),
(131, 46, '_wp_trash_meta_time', '1560244791'),
(142, 51, '_edit_lock', '1560397566:1'),
(143, 52, '_edit_lock', '1560397998:1'),
(144, 53, '_edit_lock', '1560399188:1'),
(150, 55, '_edit_lock', '1560399202:1'),
(159, 57, '_edit_lock', '1560414802:1'),
(160, 58, '_edit_lock', '1560416957:1'),
(161, 58, '_wp_trash_meta_status', 'publish'),
(162, 58, '_wp_trash_meta_time', '1560416989'),
(163, 59, '_edit_last', '1'),
(164, 59, '_edit_lock', '1560745864:1'),
(165, 59, 'cfs_fields', 'a:3:{i:0;a:8:{s:2:\"id\";i:3;s:4:\"name\";s:8:\"location\";s:5:\"label\";s:8:\"location\";s:4:\"type\";s:4:\"text\";s:5:\"notes\";s:0:\"\";s:9:\"parent_id\";i:0;s:6:\"weight\";i:0;s:7:\"options\";a:2:{s:13:\"default_value\";s:0:\"\";s:8:\"required\";s:1:\"0\";}}i:1;a:8:{s:2:\"id\";i:4;s:4:\"name\";s:8:\"latitude\";s:5:\"label\";s:8:\"latitude\";s:4:\"type\";s:4:\"text\";s:5:\"notes\";s:0:\"\";s:9:\"parent_id\";i:0;s:6:\"weight\";i:1;s:7:\"options\";a:2:{s:13:\"default_value\";s:0:\"\";s:8:\"required\";s:1:\"0\";}}i:2;a:8:{s:2:\"id\";i:5;s:4:\"name\";s:9:\"longitude\";s:5:\"label\";s:10:\"longitude	\";s:4:\"type\";s:4:\"text\";s:5:\"notes\";s:0:\"\";s:9:\"parent_id\";i:0;s:6:\"weight\";i:2;s:7:\"options\";a:2:{s:13:\"default_value\";s:0:\"\";s:8:\"required\";s:1:\"0\";}}}'),
(166, 59, 'cfs_rules', 'a:0:{}'),
(167, 59, 'cfs_extras', 'a:3:{s:5:\"order\";s:1:\"0\";s:7:\"context\";s:6:\"normal\";s:11:\"hide_editor\";s:1:\"0\";}'),
(168, 61, '_edit_lock', '1560487480:1'),
(169, 62, '_edit_lock', '1560506343:1'),
(241, 64, '_edit_lock', '1560746663:1'),
(243, 64, 'location', '1'),
(244, 64, 'latitude', '2'),
(245, 64, 'longitude', '3'),
(246, 64, '_edit_last', '1'),
(247, 64, '_encloseme', '1'),
(248, 64, '_advads_ad_settings', 'a:1:{s:11:\"disable_ads\";i:0;}'),
(249, 66, '_edit_lock', '1560756159:1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(2, 1, '2019-05-27 08:57:38', '2019-05-27 08:57:38', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/wordpress/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p> [posts_data_table] </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>\n\n[wp-posts-table]\n\n</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2019-06-11 09:12:51', '2019-06-11 09:12:51', '', 0, 'http://localhost/wordpress/?page_id=2', 0, 'page', '', 0),
(3, 1, '2019-05-27 08:57:38', '2019-05-27 08:57:38', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our website address is: http://localhost/wordpress.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What personal data we collect and why we collect it</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Comments</h3><!-- /wp:heading --><!-- wp:paragraph --><p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Media</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Contact forms</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Embedded content from other websites</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Analytics</h3><!-- /wp:heading --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Your contact information</h2><!-- /wp:heading --><!-- wp:heading --><h2>Additional information</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>How we protect your data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What data breach procedures we have in place</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What third parties we receive data from</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What automated decision making and/or profiling we do with user data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Industry regulatory disclosure requirements</h3><!-- /wp:heading -->', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2019-05-27 08:57:38', '2019-05-27 08:57:38', '', 0, 'http://localhost/wordpress/?page_id=3', 0, 'page', '', 0),
(8, 1, '2019-06-04 09:04:35', '2019-06-04 09:04:35', '{\n    \"sidebars_widgets[sidebar-1]\": {\n        \"value\": [\n            \"search-2\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2019-06-04 09:00:45\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '0ef10aac-2639-49c9-94fb-344a2e0352d0', '', '', '2019-06-04 09:04:35', '2019-06-04 09:04:35', '', 0, 'http://localhost/wordpress/?p=8', 0, 'customize_changeset', '', 0),
(9, 1, '2019-06-04 09:22:02', '2019-06-04 09:22:02', 'Nam Tran Ads', 'My ads', '', 'publish', 'closed', 'closed', '', 'my-ads', '', '', '2019-06-04 09:22:02', '2019-06-04 09:22:02', '', 0, 'http://localhost/wordpress/?post_type=advanced_ads&#038;p=9', 0, 'advanced_ads', '', 0),
(34, 1, '2019-06-05 06:57:26', '2019-06-05 06:57:26', '{\n    \"old_sidebars_widgets_data\": {\n        \"value\": {\n            \"wp_inactive_widgets\": [],\n            \"sidebar-1\": [\n                \"search-2\"\n            ]\n        },\n        \"type\": \"global_variable\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2019-06-05 06:57:26\"\n    },\n    \"sidebars_widgets[sidebar-1]\": {\n        \"value\": [\n            \"search-2\",\n            \"advads_ad_widget-3\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2019-06-05 06:57:26\"\n    },\n    \"widget_advads_ad_widget[3]\": {\n        \"value\": [],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2019-06-05 06:57:26\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '8657a837-031b-4541-903b-bdb0e7cf7576', '', '', '2019-06-05 06:57:26', '2019-06-05 06:57:26', '', 0, 'http://localhost/wordpress/2019/06/05/8657a837-031b-4541-903b-bdb0e7cf7576/', 0, 'customize_changeset', '', 0),
(40, 1, '2019-06-05 09:19:05', '2019-06-05 09:19:05', '', 'About me', '', 'publish', 'closed', 'closed', '', '40', '', '', '2019-06-11 09:00:17', '2019-06-11 09:00:17', '', 0, 'http://localhost/wordpress/?p=40', 2, 'nav_menu_item', '', 0),
(41, 1, '2019-06-11 08:50:41', '2019-06-11 08:50:41', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/wordpress/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>\n\n[posts_data_table]\n\n</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2019-06-11 08:50:41', '2019-06-11 08:50:41', '', 2, 'http://localhost/wordpress/2019/06/11/2-revision-v1/', 0, 'revision', '', 0),
(42, 1, '2019-06-11 08:58:50', '2019-06-11 08:58:50', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2019-06-11 09:00:17', '2019-06-11 09:00:17', '', 0, 'http://localhost/wordpress/?p=42', 1, 'nav_menu_item', '', 0),
(43, 1, '2019-06-11 09:04:08', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2019-06-11 09:04:08', '0000-00-00 00:00:00', '', 0, 'http://localhost/wordpress/?p=43', 0, 'post', '', 0),
(44, 1, '2019-06-11 09:05:02', '2019-06-11 09:05:02', '{\n    \"show_on_front\": {\n        \"value\": \"page\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2019-06-11 09:05:02\"\n    },\n    \"page_on_front\": {\n        \"value\": \"2\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2019-06-11 09:05:02\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '95a161d7-7702-4223-836d-80a4689b1c3b', '', '', '2019-06-11 09:05:02', '2019-06-11 09:05:02', '', 0, 'http://localhost/wordpress/2019/06/11/95a161d7-7702-4223-836d-80a4689b1c3b/', 0, 'customize_changeset', '', 0),
(45, 1, '2019-06-11 09:12:43', '2019-06-11 09:12:43', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/wordpress/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p> [posts_data_table] </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>\n\n[wp-posts-table]\n\n</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2019-06-11 09:12:43', '2019-06-11 09:12:43', '', 2, 'http://localhost/wordpress/2019/06/11/2-revision-v1/', 0, 'revision', '', 0),
(46, 1, '2019-06-11 09:19:51', '2019-06-11 09:19:51', '{\n    \"sidebars_widgets[sidebar-1]\": {\n        \"value\": [\n            \"advads_ad_widget-3\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2019-06-11 09:19:51\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '4cacee60-2c8c-463c-ac8d-32a81b660333', '', '', '2019-06-11 09:19:51', '2019-06-11 09:19:51', '', 0, 'http://localhost/wordpress/2019/06/11/4cacee60-2c8c-463c-ac8d-32a81b660333/', 0, 'customize_changeset', '', 0),
(51, 1, '2019-06-13 03:32:32', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2019-06-13 03:32:32', '0000-00-00 00:00:00', '', 0, 'http://localhost/wordpress/?p=51', 0, 'post', '', 0),
(52, 1, '2019-06-13 03:48:37', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2019-06-13 03:48:37', '0000-00-00 00:00:00', '', 0, 'http://localhost/wordpress/?p=52', 0, 'post', '', 0),
(53, 1, '2019-06-13 04:11:07', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2019-06-13 04:11:07', '0000-00-00 00:00:00', '', 0, 'http://localhost/wordpress/?p=53', 0, 'post', '', 0),
(55, 1, '2019-06-13 04:15:33', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2019-06-13 04:15:33', '0000-00-00 00:00:00', '', 0, 'http://localhost/wordpress/?p=55', 0, 'post', '', 0),
(57, 1, '2019-06-13 08:35:40', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2019-06-13 08:35:40', '0000-00-00 00:00:00', '', 0, 'http://localhost/wordpress/?page_id=57', 0, 'page', '', 0),
(58, 1, '2019-06-13 09:09:49', '2019-06-13 09:09:49', '{\n    \"show_on_front\": {\n        \"value\": \"page\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2019-06-13 09:09:17\"\n    },\n    \"sidebars_widgets[sidebar-1]\": {\n        \"value\": [\n            \"advads_ad_widget-3\",\n            \"search-4\"\n        ],\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2019-06-13 09:09:49\"\n    },\n    \"widget_search[4]\": {\n        \"value\": {\n            \"encoded_serialized_instance\": \"YToxOntzOjU6InRpdGxlIjtzOjY6IlNlYXJjaCI7fQ==\",\n            \"title\": \"Search\",\n            \"is_widget_customizer_js_value\": true,\n            \"instance_hash_key\": \"e61e11e0afb413242a16a5ab83ac3883\"\n        },\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2019-06-13 09:09:49\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '1bfd2164-9f73-4719-9a5f-985fd88f5537', '', '', '2019-06-13 09:09:49', '2019-06-13 09:09:49', '', 0, 'http://localhost/wordpress/?p=58', 0, 'customize_changeset', '', 0),
(59, 1, '2019-06-14 04:32:01', '2019-06-14 04:32:01', '', 'Location', '', 'publish', 'closed', 'closed', '', 'location', '', '', '2019-06-14 04:32:01', '2019-06-14 04:32:01', '', 0, 'http://localhost/wordpress/?post_type=cfs&#038;p=59', 0, 'cfs', '', 0),
(61, 1, '2019-06-14 04:43:19', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2019-06-14 04:43:19', '0000-00-00 00:00:00', '', 0, 'http://localhost/wordpress/?p=61', 0, 'post', '', 0),
(62, 1, '2019-06-14 10:01:16', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2019-06-14 10:01:16', '0000-00-00 00:00:00', '', 0, 'http://localhost/wordpress/?page_id=62', 0, 'page', '', 0),
(64, 1, '2019-06-17 04:43:10', '2019-06-17 04:43:10', '<!-- wp:paragraph -->\n<p>test13</p>\n<!-- /wp:paragraph -->', 'test13', '', 'publish', 'closed', 'closed', '', 'test13', '', '', '2019-06-17 04:43:12', '2019-06-17 04:43:12', '', 0, 'http://localhost/wordpress/?p=64', 0, 'post', '', 0),
(65, 1, '2019-06-17 04:43:10', '2019-06-17 04:43:10', '<!-- wp:paragraph -->\n<p>test13</p>\n<!-- /wp:paragraph -->', 'test13', '', 'inherit', 'closed', 'closed', '', '64-revision-v1', '', '', '2019-06-17 04:43:10', '2019-06-17 04:43:10', '', 64, 'http://localhost/wordpress/2019/06/17/64-revision-v1/', 0, 'revision', '', 0),
(66, 1, '2019-06-17 04:43:10', '2019-06-17 04:43:10', '<!-- wp:paragraph -->\r\n<p>test14</p>\r\n<!-- /wp:paragraph -->', 'test14', '', 'publish', 'closed', 'closed', '', 'test14', '', '', '2019-06-17 04:43:12', '2019-06-17 04:43:12', '', 0, 'http://localhost/wordpress/?p=66', 0, 'post', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT cho bảng `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
