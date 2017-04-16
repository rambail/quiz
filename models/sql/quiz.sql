-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2017 at 07:04 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_bank_id` int(11) NOT NULL,
  `question_option` text NOT NULL,
  `id` int(11) NOT NULL,
  `score` float NOT NULL DEFAULT '0',
  `result_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_bank_id`, `question_option`, `id`, `score`, `result_id`) VALUES
(20, 1, '57', 1, 1, 1),
(21, 3, '52', 1, 0.5, 1),
(22, 3, '54', 1, 0.5, 1),
(23, 6, 'Keyboard___CPU', 1, 0.25, 1),
(24, 6, 'Red___Green', 1, 0.25, 1),
(25, 6, 'Good Morning___Good Night', 1, 0.25, 1),
(26, 6, 'Honda___BMW', 1, 0.25, 1),
(27, 7, 'blue', 1, 1, 1),
(53, 7, 'red', 1, 0, 2),
(54, 8, 'India is the great country', 1, 0, 2),
(55, 6, 'Honda___BMW', 1, 0.25, 2),
(56, 6, 'Good Morning___Good Night', 1, 0.25, 2),
(57, 6, 'Keyboard___CPU', 1, 0.25, 2),
(58, 6, 'Red___Green', 1, 0.25, 2),
(59, 1, '57', 1, 1, 2),
(60, 3, '53', 1, 0, 2),
(61, 3, '55', 1, 0, 2),
(130, 1, '57', 1, 1, 3),
(131, 3, '52', 1, 0.5, 3),
(132, 3, '54', 1, 0.5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'MEP'),
(2, 'AC'),
(3, 'TVS'),
(4, 'Traction');

-- --------------------------------------------------------

--
-- Table structure for table `essay`
--

CREATE TABLE IF NOT EXISTS `essay` (
  `essay_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_bank_id` int(11) NOT NULL,
  `essay_text` longtext NOT NULL,
  PRIMARY KEY (`essay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `valid_for_days` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `group_name`, `price`, `valid_for_days`) VALUES
(1, 'CMRL', 0, 0),
(2, 'FMS contractor', 0, 30);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'Easy'),
(2, 'Difficult'),
(4, 'Very Difficult');

-- --------------------------------------------------------

--
-- Table structure for table `match_column`
--

CREATE TABLE IF NOT EXISTS `match_column` (
  `match_column_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_bank_id` int(11) NOT NULL,
  `column` varchar(1000) NOT NULL,
  `column_match` varchar(1000) NOT NULL,
  `score` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`match_column_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `match_column`
--

INSERT INTO `match_column` (`match_column_id`, `question_bank_id`, `column`, `column_match`, `score`) VALUES
(1, 3, 'WPC', 'Bridging of 2 feeders ', 0.25),
(2, 3, 'Distance protection', 'Bird nesting wires', 0.25),
(3, 3, 'Interrupter', 'Extending supply', 0.25),
(4, 3, 'Neutral section', 'Track Magnet', 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_bank_id` int(11) NOT NULL,
  `question_option` varchar(1000) NOT NULL,
  `score` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`option_id`, `question_bank_id`, `question_option`, `score`) VALUES
(1, 1, 'To boost low voltage.', 0),
(2, 1, 'To give redundancy in supply.', 1),
(3, 1, 'To improve power factor.', 0),
(4, 1, 'To eliminate harmonics.', 0),
(5, 1, 'There is no topology of ring main.', 0),
(6, 2, 'Variable speed drive', 0.5),
(7, 2, 'Safe ethernet', 0),
(8, 2, 'Water tank', 0),
(9, 2, 'Fire rated fans', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `paid_date` int(11) NOT NULL,
  `payment_gateway` varchar(100) NOT NULL DEFAULT 'Paypal',
  `payment_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `transaction_id` varchar(1000) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qcl`
--

CREATE TABLE IF NOT EXISTS `qcl` (
  `qcl_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `noq` int(11) NOT NULL,
  PRIMARY KEY (`qcl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `qcl`
--

INSERT INTO `qcl` (`qcl_id`, `quiz_id`, `category_id`, `level_id`, `noq`) VALUES
(68, 2, 1, 1, 3),
(69, 2, 3, 1, 1),
(70, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE IF NOT EXISTS `question_bank` (
  `question_bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type_id` int(11) NOT NULL DEFAULT '1',
  `nos_option` int(11) NOT NULL DEFAULT '2',
  `question` text NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `level_id` int(11) NOT NULL DEFAULT '1',
  `no_time_served` int(11) NOT NULL DEFAULT '0',
  `no_time_corrected` int(11) NOT NULL DEFAULT '0',
  `no_time_incorrected` int(11) NOT NULL DEFAULT '0',
  `no_time_unattempted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`question_bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`question_bank_id`, `question_type_id`, `nos_option`, `question`, `description`, `category_id`, `level_id`, `no_time_served`, `no_time_corrected`, `no_time_incorrected`, `no_time_unattempted`) VALUES
(1, 1, 5, 'What is Ring Main?', 'Main distribution network which can be fed by 2 supply from either side is called Ring Main', 1, 1, 0, 0, 0, 0),
(2, 2, 4, 'Which of the listed equipment belong to Air conditioning system?', 'The equipment forms a part of air conditioning system.', 2, 2, 0, 0, 0, 0),
(3, 3, 4, 'Match the following equipment and function in Traction system.', 'The equipment with its function has to be matched in columns', 4, 4, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE IF NOT EXISTS `question_type` (
  `question_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` varchar(100) NOT NULL,
  PRIMARY KEY (`question_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Multiple Choice Single Answer'),
(2, 'Multiple Choice Multiple Answer'),
(3, 'Match the Column'),
(4, 'Essay');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `group_id` text NOT NULL,
  `question_bank_ids` text NOT NULL,
  `noq` int(11) NOT NULL,
  `correct_score` float NOT NULL,
  `incorrect_score` float NOT NULL,
  `ip_address` text NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '10',
  `maximum_attempts` int(11) NOT NULL DEFAULT '1',
  `pass_percentage` float NOT NULL DEFAULT '50',
  `view_answer` int(11) NOT NULL DEFAULT '1',
  `camera_req` int(11) NOT NULL DEFAULT '1',
  `question_selection` int(11) NOT NULL DEFAULT '1',
  `gen_certificate` int(11) NOT NULL DEFAULT '0',
  `certificate_text` text,
  `with_login` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_name`, `description`, `start_date`, `end_date`, `group_id`, `question_bank_ids`, `noq`, `correct_score`, `incorrect_score`, `ip_address`, `duration`, `maximum_attempts`, `pass_percentage`, `view_answer`, `camera_req`, `question_selection`, `gen_certificate`, `certificate_text`, `with_login`) VALUES
(1, 'Sample Quiz', 'Sample Quiz Sample Quiz', 1460344840, 1491880840, '3,1', '1,3,6,7', 4, 1, 0, '', 10, 10, 50, 1, 1, 0, 0, NULL, 1),
(2, 'Sample Quiz 2', '<p>Sample Quiz 2</p>', 1457687593, 1491898393, '4,3,1', '', 5, 1, 0, '', 100, 10, 50, 1, 0, 1, 1, 'ID: #{result_id}<br>\r\n \r\n<br><br>\r\n<center>\r\n<font style=''font-size:32px;''>Certificate</font><br><br><br>\r\n<h4>This is certified that {first_name}  {last_name} has attempted the quiz ''{quiz_name}'' and obtained {percentage_obtained}% marks.<br>\r\nHis/her result status is {status}<br>\r\n</h4>\r\n\r\n</center>\r\n<br><br><br><br><br><br> \r\n{qr_code}<br>\r\nDate: {generated_date}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `result_status` varchar(100) NOT NULL DEFAULT 'Open',
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `categories` text NOT NULL,
  `category_range` text NOT NULL,
  `r_question_bank_ids` text NOT NULL,
  `individual_time` text NOT NULL,
  `total_time` int(11) NOT NULL DEFAULT '0',
  `score_obtained` float NOT NULL DEFAULT '0',
  `percentage_obtained` float NOT NULL DEFAULT '0',
  `attempted_ip` varchar(100) NOT NULL,
  `score_individual` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `manual_valuation` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `quiz_id`, `id`, `result_status`, `start_time`, `end_time`, `categories`, `category_range`, `r_question_bank_ids`, `individual_time`, `total_time`, `score_obtained`, `percentage_obtained`, `attempted_ip`, `score_individual`, `photo`, `manual_valuation`) VALUES
(1, 2, 1, 'Open', 1490539671, 0, '', '', '', '', 0, 0, 0, '127.0.0.1', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organisation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `last_login` date DEFAULT NULL,
  `last_latitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT '13.0738342',
  `last_longitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT '80.1933406',
  `status` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `mobile`, `organisation`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `last_login`, `last_latitude`, `last_longitude`, `status`) VALUES
(1, 'cgmei', 'cgmei.cmrl@tn.gov.in', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', '9445868000', 'CMRL', 'yyQsTnxwtt8RbiPAxH6FV7Mi7f_d82st', 1462530139, NULL, NULL, NULL, 0, 1487911004, '2017-02-24', '13.0731984', '80.1937223', 10),
(2, 'jgmtvs', 'jgmtvs.cmrl@tn.gov.in', '$2a$06$f3knEgYB/tJRqg./CBxJReBjvLCgTm.3qk5yJjsGR3EILLLUGwd6i', '9445868000', 'CMRL', 'MBhbEF1e1k8TimYKWYocCOTGVlz6DGyN', NULL, NULL, 1462530146, NULL, 0, 1465056650, '2016-06-04', '13.0737921', '80.1937575', 10),
(3, 'admin', 'admin.cmrl@tn.gov.in', '$2a$10$vCkYc3H9OvSVt9n.R/mi3ORO2.89CJvZnj1AfYxhBGS.xlSOBfwlO', '9445868313', 'CMRL', 'w5Tn7c2x6cQD-tbe17svdH1ZTvI8iD7B', 1462530159, 'cgmei.cmrl@tn.gov.in', NULL, NULL, 0, 0, '0000-00-00', '13.0738342', '80.1937575', 10),
(4, 'madhavan', 'jgmle@cmrl.gov.in', '$2y$13$iSVpdo1eyqRyOQ47IhYBMeiWE63.J4juXazf/klhTL22ppr3N0d8y', '9445868200', 'CMRL', 'AyOSO3zf9A-gY0UTaTLfhgZClH5Ya74J', NULL, NULL, NULL, '218.248.28.146', 1465542817, 1472358067, '2016-08-28', '13.1284383', '80.216415', 10),
(5, 'pspurusoth', 'ps.purusoth@yahoo.com', '$2y$13$JlEe5R/KOu0sYEorFZUErepXyzvhY1mgLffNSyb8G6uSmqPmy1JXC', '9884269759', 'CMRL', 'ioVTEz0Jmi7-m4QyiJkpZOuCcP0M3SIz', NULL, NULL, NULL, '218.248.28.146', 1466165007, 1467273159, '2016-06-30', '13.0740547', '80.1747771', 10),
(6, 'balamurugan', 'balacmrl@gmail.com', '$2y$13$X4sbRqXwXGt8BlQZ6OfWa.PPdPx4qbVHaXfFArKmUoDUrwtJcr2/a', '9445893857', 'CMRL', 'F_8ReJMM-m9lKAYJ9_pmdkGcGNDOfNNe', NULL, NULL, NULL, '218.248.28.146', 1466499402, 1487573925, '2017-02-20', '12.9866209', '80.1752257', 10),
(7, 'Premkumar', 'amle@cmrl.gov.in', '$2y$13$6iQxAl2olboAA9WXqv7tnuKdMpJTC4XZkPNcb3it1Sp3PA7JBg9QC', '9445868317', 'CMRL', 'VsbS7MPMkilaTZbuSvDlgdKl8MonGH7T', NULL, NULL, NULL, '218.248.28.146', 1467011551, 1487910838, '2017-02-24', '13.0730115', '80.1940016', 10),
(8, 'Manoj Kumar', 'manojkumar.cmrl@johnsonliftsltd.com', '$2y$13$D.Izt1ngQuXzIhXqIKqGc.wc8YK36NCYa.G2qKTO44QtWc3hoAydm', '7338725192', 'JLPL', 'hnor9mGzQ3kQxC63GS-MZe68GmLjbyJh', NULL, NULL, NULL, '218.248.28.146', 1467011748, 1467629155, '2016-07-04', '13.0971401', '80.1976556', 10),
(9, 'Nandakumar', 'nandabagayam@gmail.com', '$2y$13$BPrlbKQaCbQs4EQxVQhUE.YE.nQz4rXXMvOLyOfxplD3cAkFJQtb6', '+919894789333', 'JLPL', 'X0pWYoxnJh41Jf_-nr3TrfrNQiJC3r58', NULL, NULL, NULL, '218.248.28.146', 1467185408, 1487757287, '2017-02-22', '12.9885554', '80.1765579', 10),
(10, 'Dillibabu', 'sdillibabu623@gmail.com', '$2y$13$xhURa/gwR6AgixxCRHm1euJ30v2.xzuvrFx6151TOkIv82wkTaeTa', '+917358777810', 'JLPL', 'qN_im5dQzoyvvOEVnGtwgBdDp-BJK749', NULL, NULL, NULL, '218.248.28.146', 1467185631, 1488082746, '2017-02-26', '13.0731955', '80.193721', 10),
(11, 'Rajendran', 'rajendran93455@gmaul.com', '$2y$13$ocATuBIJ.yRVGJBB0CMUW.qceEPPJz7VEgRVsdZfXlLk4i2aDECja', '+919962092848', 'JLPL', 'gvgLTcPa4eXc-iBDsERZDzPenlfwVbwN', NULL, NULL, NULL, '218.248.28.146', 1467185769, 1487677666, '2017-02-21', '13.0036488', '80.2080348', 10),
(12, 'Sadhasivam', 'sadhasivam.ps@gmail.com', '$2y$13$bbJi0JfB9yKmq97btQ46XebUy04Kw7vzWSfvfQUtwUVBqvnUJRC/C', '+919944110413', 'JLPL', 'j9BYjAbFp2aw9L_RRhjvYMQeQdSZdso8', NULL, NULL, NULL, '218.248.28.146', 1467185910, 1487977568, '2017-02-24', '13.0046637', '80.2018465', 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
