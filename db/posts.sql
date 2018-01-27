-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2018 at 04:01 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_pagoda`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`) VALUES
(1, NULL, 'hello world.<br>', NULL),
(2, NULL, 'មុន​ឈាន​ដល់​វគ្គ​ពាក់​កណ្ដាល​ផ្ដាច់ព្រ័ត្រ​នេះ ​​ក្រុម​យុវជន​កំពង់​ផែ A ​បាន​យក​ឈ្នះ​លើ​ក្រុម​យុវជន​កំពង់​ផែ B ​ដោយ​លទ្ធផល ២-១ ​ស្រប​ពេល​ដែល​ក្រុម Hurrican A ​បាន​យក​ឈ្នះ​លើ​ក្រុមស្នងការ​ដ្ឋាន​នគរ​បាល​ខេត្ត​ព្រះ​សីហនុ B ៧-៣។ ចំណែក​ឯ​ក្រុម​ស្នងការ​ដ្ឋាន​នគរ​បាល​ខេត្ត​ព្រះ​សីហនុ A ​បាន​យក​ឈ្នះ​លើ​ក្រុម sihanoukville ​ស្វិតស្វាញ​មែនទែន ​ដោយ​ត្រូវ​ដក​គ្នា​ដល់​ទៅ​២​នាក់ ​ទើប​អាច​យក​ឈ្នះ​បាន។ ​មួយ​ក្រុម​ចុង​ក្រោយ​ដែល​ឡើង​ទៅ​វគ្គ​ពាក់​កណ្ដាល​ផ្ដាច់ព្រ័ត្រ​ដែរ​នោះ​គឺ​ក្រុម​ Nazaro Sport Club ​ដែល​យក​ឈ្នះ​លើ​ក្រុមស្នងការដ្ឋាន​ខេត្ត​កំពត A ក្នុង​លទ្ធផល ៣ – ១។', NULL),
(3, NULL, '<header class=\"entry-header\" [removed]><h1 class=\"entry-title\" [removed]>រក​ឃើញ​៤​ក្រុម​ត្រូវ​លេង ​ដណ្ដើម​ពាន​នៅ​តំបន់​ព្រះ​សីហនុ​ហើយ</h1><footer class=\"entry-meta\" [removed]><span class=\"posted-on\" [removed]><span class=\"screen-reader-text\" [removed]>POSTED ON</span><time class=\"entry-date published\" datetime=\"2018-01-21T10:01:53+00:00\" [removed]>JANUARY 21, 2018</time></span><span class=\"byline\" [removed]><span class=\"screen-reader-text\" [removed]>BY</span><span class=\"author vcard\" [removed]><a class=\"url fn n\" href=\"http://news.bookingkh.com/blog/author/rithysek/\" [removed]>PU CHHROY</a></span></span></footer></header><div class=\"post-thumbnail\" [removed]><img src=\"http://news.bookingkh.com/wp-content/uploads/2018/01/tigerstreet_2_large-1100x574.jpg\" class=\"attachment-post-thumbnail size-post-thumbnail wp-post-image\" alt=\"\" [removed] width=\"1100\" height=\"574\"></div><div class=\"entry-content\" [removed]><div id=\"ess-main-wrapper\" [removed]><div id=\"ess-wrap-inline-networks\" class=\"ess-inline-networks-container ess-clear ess-inline-top ess-diagonal-icon ess-inline-layout-text-only\" [removed]><ul class=\"ess-social-network-lists\" [removed]><li class=\"ess-social-networks ess-facebook ess-spacing ess-social-sharing\" [removed]><a href=\"http://www.facebook.com/sharer.php?u=http://news.bookingkh.com/blog/sport/four-teams-have-been-found-in-preah-sihanouk/&t=រក​ឃើញ​៤​ក្រុម​ត្រូវ​លេង ​ដណ្ដើម​ពាន​នៅ​តំបន់​ព្រះ​សីហនុ​ហើយ\" class=\"ess-social-network-link ess-social-share ess-display-counts\" rel=\"nofollow\" data-social-name=\"facebook\" data-min-count=\"0\" data-post-id=\"125\" data-location=\"inline\" [removed]><span class=\"inline-networks socicon ess-icon socicon-facebook\" [removed]></span><span class=\"ess-text\" [removed]>Facebook</span><span class=\"ess-social-count\" [removed]></span></a></li><li class=\"ess-social-networks ess-linkedin ess-spacing ess-social-sharing\" [removed]><a href=\"http://www.linkedin.com/shareArticle?mini=true&url=http://news.bookingkh.com/blog/sport/four-teams-have-been-found-in-preah-sihanouk/&title=រក​ឃើញ​៤​ក្រុម​ត្រូវ​លេង ​ដណ្ដើម​ពាន​នៅ​តំបន់​ព្រះ​សីហនុ​ហើយ\" class=\"ess-social-network-link ess-social-share ess-display-counts\" rel=\"nofollow\" data-social-name=\"linkedin\" data-min-count=\"0\" data-post-id=\"125\" data-location=\"inline\" [removed]><span class=\"inline-networks socicon ess-icon socicon-linkedin\" [removed]></span><span class=\"ess-text\" [removed]>LinkedIn</span><span class=\"ess-social-count\" [removed]></span></a></li><li class=\"ess-social-networks ess-googleplus ess-spacing ess-social-sharing\" [removed]><a href=\"https://plus.google.com/share?url=http://news.bookingkh.com/blog/sport/four-teams-have-been-found-in-preah-sihanouk/&t=រក​ឃើញ​៤​ក្រុម​ត្រូវ​លេង ​ដណ្ដើម​ពាន​នៅ​តំបន់​ព្រះ​សីហនុ​ហើយ\" class=\"ess-social-network-link ess-social-share ess-display-counts\" rel=\"nofollow\" data-social-name=\"googleplus\" data-min-count=\"0\" data-post-id=\"125\" data-location=\"inline\" [removed]><span class=\"inline-networks socicon ess-icon socicon-googleplus\" [removed]></span><span class=\"ess-text\" [removed]>Google+</span><span class=\"ess-social-count\" [removed]></span></a></li><li class=\"ess-social-networks ess-stumbleupon ess-spacing ess-social-sharing\" [removed]><a href=\"http://www.stumbleupon.com/badge?url=http://news.bookingkh.com/blog/sport/four-teams-have-been-found-in-preah-sihanouk/&title=រក​ឃើញ​៤​ក្រុម​ត្រូវ​លេង ​ដណ្ដើម​ពាន​នៅ​តំបន់​ព្រះ​សីហនុ​ហើយ\" class=\"ess-social-network-link ess-social-share ess-display-counts\" rel=\"nofollow\" data-social-name=\"stumbleupon\" data-min-count=\"0\" data-post-id=\"125\" data-location=\"inline\" [removed]><span class=\"inline-networks socicon ess-icon socicon-stumbleupon\" [removed]></span><span class=\"ess-text\" [removed]>StumbleUpon</span><span class=\"ess-social-count\" [removed]></span></a></li><li class=\"ess-social-networks ess-pinterest ess-spacing ess-social-sharing\" [removed]><a href=\"http://news.bookingkh.com/blog/sport/four-teams-have-been-found-in-preah-sihanouk/#\" class=\"ess-social-network-link ess-social-share-pinterest ess-display-counts\" rel=\"nofollow\" data-social-name=\"pinterest\" data-min-count=\"0\" data-post-id=\"125\" data-location=\"inline\" [removed]><span class=\"inline-networks socicon ess-icon socicon-pinterest\" [removed]></span><span class=\"ess-text\" [removed]>Pinterest</span><span class=\"ess-social-count\" [removed]></span></a></li><li class=\"ess-all-networks ess-social-networks\" [removed]><div class=\"ess-social-network-link\" [removed]><span class=\"ess-all-networks-button\" [removed]></span></div><br></li><li class=\"ess-total-share ess-social-networks\" data-post-id=\"125\" [removed]><div class=\"ess-total-share-block\" [removed]><span> </span><span class=\"ess-total-count\" [removed]>0</span></div></li></ul></div></div><p [removed]>ការ​ប្រកួត​ពាន​រង្វាន់ Tiger Street Football Festival 2018 ​បាន​ឈាន​ដល់​វគ្គ​៤​ក្រុម​ចុង​ក្រោយ​ហើយ ​ដោយ​ក្រុម​ទាំង​៤​នោះ​រួម​មាន ​ក្រុម​យុវជន​កំពង់​ផែ A ​ក្រុម ​Hurrican A ​ក្រុម​ស្នងការ​ដ្ឋាន​នគរ​បាល​ខេត្ត​ព្រះ​សីហនុ A ​និង​ក្រុម​ Nazaro Sport Club ។</p><p [removed]><img class=\"alignnone size-medium wp-image-126\" src=\"http://news.bookingkh.com/wp-content/uploads/2018/01/tiger2_3_large-300x200.jpg\" alt=\"\" [removed] width=\"300\" height=\"200\"></p><p [removed]>មុន​ឈាន​ដល់​វគ្គ​ពាក់​កណ្ដាល​ផ្ដាច់ព្រ័ត្រ​នេះ ​​ក្រុម​យុវជន​កំពង់​ផែ A ​បាន​យក​ឈ្នះ​លើ​ក្រុម​យុវជន​កំពង់​ផែ B ​ដោយ​លទ្ធផល ២-១ ​ស្រប​ពេល​ដែល​ក្រុម Hurrican A ​បាន​យក​ឈ្នះ​លើ​ក្រុមស្នងការ​ដ្ឋាន​នគរ​បាល​ខេត្ត​ព្រះ​សីហនុ B ៧-៣។ ចំណែក​ឯ​ក្រុម​ស្នងការ​ដ្ឋាន​នគរ​បាល​ខេត្ត​ព្រះ​សីហនុ A ​បាន​យក​ឈ្នះ​លើ​ក្រុម sihanoukville ​ស្វិតស្វាញ​មែនទែន ​ដោយ​ត្រូវ​ដក​គ្នា​ដល់​ទៅ​២​នាក់ ​ទើប​អាច​យក​ឈ្នះ​បាន។ ​មួយ​ក្រុម​ចុង​ក្រោយ​ដែល​ឡើង​ទៅ​វគ្គ​ពាក់​កណ្ដាល​ផ្ដាច់ព្រ័ត្រ​ដែរ​នោះ​គឺ​ក្រុម​ Nazaro Sport Club ​ដែល​យក​ឈ្នះ​លើ​ក្រុមស្នងការដ្ឋាន​ខេត្ត​កំពត A ក្នុង​លទ្ធផល ៣ – ១។</p><p [removed]><img class=\"alignnone size-medium wp-image-127\" src=\"http://news.bookingkh.com/wp-content/uploads/2018/01/tigerstreet_2_large-300x200.jpg\" alt=\"\" [removed] width=\"300\" height=\"200\"></p><p [removed]>ការ​ប្រកួត​នៅ​វគ្គ​ពាក់​កណ្ដាល​ផ្ដាច់ព្រ័ត្រ​នេះ​ដែរ នឹង​មាន​ការ​ផ្សាយ​បន្ដ​ផ្ទាល់​តា​មរយៈទូរទស្សន៍ ហង្សមាស HDTV ​។ ខណៈដែល​ក្រុម​ទាំង​៤​លេង​នៅ​វគ្គ​ពាក់​កណ្ដាល​ផ្ដាច់ព្រ័ត្រ​នេះ ​នឹង​មាន​ឱកាស​ស្វ័យប្រវត្តិ​ទៅលេង​វគ្គ​ផ្ដាច់ព្រ័ត្រ​នៅ​រាជ​ធានី​ភ្នំពេញ ​ជាមួយ​ក្រុម​២​ទៀត​ដែល​ជ្រើសចេញ​ពី​ការ​ប្រកួត​​ចាញ់​គេ​នៅ​វគ្គ​៨​ក្រុម​ចុង​ក្រោយ។</p><p [removed]>ការ​ប្រកួត​នៅ​តាម​តំបន់​ព្រះ​សីហនុ​នេះ ​ក្រុម​ដែល​បាន​ចំណាត់​ថ្នាក់​លេខ​១​នឹង​ទទួល​បាន​ប្រាក់​រង្វាន់ ១ ៥០០​ដុល្លារ ​ក្រុម​លេខ​២​ទទួល​បាន​១ ០០០​ដុល្លារ ​ក្រុម​លេខ​៣​ទទួល​បាន​ ៥០០​ដុល្លារ​និង​ក្រុម​លេខ​៤​ទទួល​បាន​២០០​ដុល្លារ។ ​ខណៈ​ដែល​ក្រុម​មាន​សិទ្ធិ​ចូលរួម​ប្រកួត​វគ្គ​ផ្ដាច់ព្រ័ត្រ​ជើង​ឯក​ប្រចាំ​ប្រទេស​វិញ ​នៅ​មណ្ឌល​ព្រះ​សីហនុ​នេះ​អនុញ្ញាតិ​ឱ្យ​តែ​៦​ក្រុម​ប៉ុណ្ណោះ៕</p><p [removed]><br class=\"Apple-interchange-newline\"></p></div>', NULL),
(4, NULL, '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>ID<br></td><td>Name<br></td><td>Date of birht<br></td><td>Gender<br></td><td>Position<br></td><td>Working place<br></td><td>Salary<br></td><td>Address<br></td><td>University<br></td><td>Year <br></td></tr><tr><td>1<br></td><td>Rin Theary<br></td><td>29299392939<br></td><td>Girl<br></td><td>Web dev<br></td><td>Abc<br></td><td>10000<br></td><td>Phnom Penh<br></td><td>UP<br></td><td>4<br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p>                                                        <br></p>', NULL),
(7, NULL, '<ol><li>Hi this is the first step.</li><li>the next step is just for that.<br></li></ol>', NULL),
(8, NULL, '<p><img [removed]><span [removed]Comic Sans MS\";></span><br></p>', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
