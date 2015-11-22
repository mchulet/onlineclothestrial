-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2015 at 10:35 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dressapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE IF NOT EXISTS `admin_details` (
`admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`admin_id`, `name`, `username`, `password`, `date_reg`) VALUES
(1, 'sachin', 'sachin', 'sac', '2014-02-05 20:54:04'),
(2, 'abc', 'abcd', 'abcd', '2014-02-05 20:59:05'),
(3, 'aaaa', 'aaa', 'aaa', '2014-02-05 22:25:13'),
(4, 'Logitia Solutions Pvt Ltd', 'Logitia', 'Logitia', '2014-02-18 00:54:26'),
(5, 'sanjog', 'sanjog121', 'sanjog', '2014-05-20 09:08:27'),
(6, '111', '111', '111', '2014-05-23 09:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `body_types`
--

CREATE TABLE IF NOT EXISTS `body_types` (
`body_types_id` int(11) NOT NULL,
  `body_types_name` varchar(255) NOT NULL,
  `body_types_value` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `body_types`
--

INSERT INTO `body_types` (`body_types_id`, `body_types_name`, `body_types_value`, `status`) VALUES
(1, 'Column body shape', 'Column body shape', 1),
(2, 'Pear body shape', 'Pear body shape', 1),
(3, 'Apple body shape', 'Apple body shape', 1),
(4, 'Hourglass body shape', 'Hourglass body shape', 1),
(5, 'Inverted body triangle', 'Inverted body triangle', 1),
(6, 'Ruler Body Shape', 'Ruler Body Shape', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_info`
--

CREATE TABLE IF NOT EXISTS `contact_form_info` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_form_info`
--

INSERT INTO `contact_form_info` (`id`, `name`, `email`, `subject`, `message`, `status`) VALUES
(1, 'Ashly', 'sme@test.com', 'ggg', 'adsdasd', 1),
(2, 'Ashish Laturiya', 'ashish.laturiya@logitia.in', 'Testing', 'This is nothing but only testing.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `iso_code_2` varchar(2) NOT NULL DEFAULT '',
  `iso_code_3` varchar(3) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso_code_2`, `iso_code_3`) VALUES
(1, 'Afghanistan', 'AF', 'AFG'),
(2, 'Albania', 'AL', 'ALB'),
(3, 'Algeria', 'DZ', 'DZA'),
(4, 'American Samoa', 'AS', 'ASM'),
(5, 'Andorra', 'AD', 'AND'),
(6, 'Angola', 'AO', 'AGO'),
(7, 'Anguilla', 'AI', 'AIA'),
(8, 'Antarctica', 'AQ', 'ATA'),
(9, 'Antigua and Barbuda', 'AG', 'ATG'),
(10, 'Argentina', 'AR', 'ARG'),
(11, 'Armenia', 'AM', 'ARM'),
(12, 'Aruba', 'AW', 'ABW'),
(13, 'Australia', 'AU', 'AUS'),
(14, 'Austria', 'AT', 'AUT'),
(15, 'Azerbaijan', 'AZ', 'AZE'),
(16, 'Bahamas', 'BS', 'BHS'),
(17, 'Bahrain', 'BH', 'BHR'),
(18, 'Bangladesh', 'BD', 'BGD'),
(19, 'Barbados', 'BB', 'BRB'),
(20, 'Belarus', 'BY', 'BLR'),
(21, 'Belgium', 'BE', 'BEL'),
(22, 'Belize', 'BZ', 'BLZ'),
(23, 'Benin', 'BJ', 'BEN'),
(24, 'Bermuda', 'BM', 'BMU'),
(25, 'Bhutan', 'BT', 'BTN'),
(26, 'Bolivia', 'BO', 'BOL'),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH'),
(28, 'Botswana', 'BW', 'BWA'),
(29, 'Bouvet Island', 'BV', 'BVT'),
(30, 'Brazil', 'BR', 'BRA'),
(31, 'British Indian Ocean Territory', 'IO', 'IOT'),
(32, 'Brunei Darussalam', 'BN', 'BRN'),
(33, 'Bulgaria', 'BG', 'BGR'),
(34, 'Burkina Faso', 'BF', 'BFA'),
(35, 'Burundi', 'BI', 'BDI'),
(36, 'Cambodia', 'KH', 'KHM'),
(37, 'Cameroon', 'CM', 'CMR'),
(38, 'Canada', 'CA', 'CAN'),
(39, 'Cape Verde', 'CV', 'CPV'),
(40, 'Cayman Islands', 'KY', 'CYM'),
(41, 'Central African Republic', 'CF', 'CAF'),
(42, 'Chad', 'TD', 'TCD'),
(43, 'Chile', 'CL', 'CHL'),
(44, 'China', 'CN', 'CHN'),
(45, 'Christmas Island', 'CX', 'CXR'),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK'),
(47, 'Colombia', 'CO', 'COL'),
(48, 'Comoros', 'KM', 'COM'),
(49, 'Congo', 'CG', 'COG'),
(50, 'Cook Islands', 'CK', 'COK'),
(51, 'Costa Rica', 'CR', 'CRI'),
(52, 'Cote D''Ivoire', 'CI', 'CIV'),
(53, 'Croatia', 'HR', 'HRV'),
(54, 'Cuba', 'CU', 'CUB'),
(55, 'Cyprus', 'CY', 'CYP'),
(56, 'Czech Republic', 'CZ', 'CZE'),
(57, 'Denmark', 'DK', 'DNK'),
(58, 'Djibouti', 'DJ', 'DJI'),
(59, 'Dominica', 'DM', 'DMA'),
(60, 'Dominican Republic', 'DO', 'DOM'),
(61, 'East Timor', 'TP', 'TMP'),
(62, 'Ecuador', 'EC', 'ECU'),
(63, 'Egypt', 'EG', 'EGY'),
(64, 'El Salvador', 'SV', 'SLV'),
(65, 'Equatorial Guinea', 'GQ', 'GNQ'),
(66, 'Eritrea', 'ER', 'ERI'),
(67, 'Estonia', 'EE', 'EST'),
(68, 'Ethiopia', 'ET', 'ETH'),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK'),
(70, 'Faroe Islands', 'FO', 'FRO'),
(71, 'Fiji', 'FJ', 'FJI'),
(72, 'Finland', 'FI', 'FIN'),
(73, 'France', 'FR', 'FRA'),
(74, 'France, Metropolitan', 'FX', 'FXX'),
(75, 'French Guiana', 'GF', 'GUF'),
(76, 'French Polynesia', 'PF', 'PYF'),
(77, 'French Southern Territories', 'TF', 'ATF'),
(78, 'Gabon', 'GA', 'GAB'),
(79, 'Gambia', 'GM', 'GMB'),
(80, 'Georgia', 'GE', 'GEO'),
(81, 'Germany', 'DE', 'DEU'),
(82, 'Ghana', 'GH', 'GHA'),
(83, 'Gibraltar', 'GI', 'GIB'),
(84, 'Greece', 'GR', 'GRC'),
(85, 'Greenland', 'GL', 'GRL'),
(86, 'Grenada', 'GD', 'GRD'),
(87, 'Guadeloupe', 'GP', 'GLP'),
(88, 'Guam', 'GU', 'GUM'),
(89, 'Guatemala', 'GT', 'GTM'),
(90, 'Guinea', 'GN', 'GIN'),
(91, 'Guinea-bissau', 'GW', 'GNB'),
(92, 'Guyana', 'GY', 'GUY'),
(93, 'Haiti', 'HT', 'HTI'),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD'),
(95, 'Honduras', 'HN', 'HND'),
(96, 'Hong Kong', 'HK', 'HKG'),
(97, 'Hungary', 'HU', 'HUN'),
(98, 'Iceland', 'IS', 'ISL'),
(99, 'India', 'IN', 'IND'),
(100, 'Indonesia', 'ID', 'IDN'),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN'),
(102, 'Iraq', 'IQ', 'IRQ'),
(103, 'Ireland', 'IE', 'IRL'),
(104, 'Israel', 'IL', 'ISR'),
(105, 'Italy', 'IT', 'ITA'),
(106, 'Jamaica', 'JM', 'JAM'),
(107, 'Japan', 'JP', 'JPN'),
(108, 'Jordan', 'JO', 'JOR'),
(109, 'Kazakhstan', 'KZ', 'KAZ'),
(110, 'Kenya', 'KE', 'KEN'),
(111, 'Kiribati', 'KI', 'KIR'),
(112, 'North Korea', 'KP', 'PRK'),
(113, 'Korea, Republic of', 'KR', 'KOR'),
(114, 'Kuwait', 'KW', 'KWT'),
(115, 'Kyrgyzstan', 'KG', 'KGZ'),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO'),
(117, 'Latvia', 'LV', 'LVA'),
(118, 'Lebanon', 'LB', 'LBN'),
(119, 'Lesotho', 'LS', 'LSO'),
(120, 'Liberia', 'LR', 'LBR'),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY'),
(122, 'Liechtenstein', 'LI', 'LIE'),
(123, 'Lithuania', 'LT', 'LTU'),
(124, 'Luxembourg', 'LU', 'LUX'),
(125, 'Macau', 'MO', 'MAC'),
(126, 'Macedonia', 'MK', 'MKD'),
(127, 'Madagascar', 'MG', 'MDG'),
(128, 'Malawi', 'MW', 'MWI'),
(129, 'Malaysia', 'MY', 'MYS'),
(130, 'Maldives', 'MV', 'MDV'),
(131, 'Mali', 'ML', 'MLI'),
(132, 'Malta', 'MT', 'MLT'),
(133, 'Marshall Islands', 'MH', 'MHL'),
(134, 'Martinique', 'MQ', 'MTQ'),
(135, 'Mauritania', 'MR', 'MRT'),
(136, 'Mauritius', 'MU', 'MUS'),
(137, 'Mayotte', 'YT', 'MYT'),
(138, 'Mexico', 'MX', 'MEX'),
(139, 'Micronesia, Federated States of', 'FM', 'FSM'),
(140, 'Moldova, Republic of', 'MD', 'MDA'),
(141, 'Monaco', 'MC', 'MCO'),
(142, 'Mongolia', 'MN', 'MNG'),
(143, 'Montserrat', 'MS', 'MSR'),
(144, 'Morocco', 'MA', 'MAR'),
(145, 'Mozambique', 'MZ', 'MOZ'),
(146, 'Myanmar', 'MM', 'MMR'),
(147, 'Namibia', 'NA', 'NAM'),
(148, 'Nauru', 'NR', 'NRU'),
(149, 'Nepal', 'NP', 'NPL'),
(150, 'Netherlands', 'NL', 'NLD'),
(151, 'Netherlands Antilles', 'AN', 'ANT'),
(152, 'New Caledonia', 'NC', 'NCL'),
(153, 'New Zealand', 'NZ', 'NZL'),
(154, 'Nicaragua', 'NI', 'NIC'),
(155, 'Niger', 'NE', 'NER'),
(156, 'Nigeria', 'NG', 'NGA'),
(157, 'Niue', 'NU', 'NIU'),
(158, 'Norfolk Island', 'NF', 'NFK'),
(159, 'Northern Mariana Islands', 'MP', 'MNP'),
(160, 'Norway', 'NO', 'NOR'),
(161, 'Oman', 'OM', 'OMN'),
(162, 'Pakistan', 'PK', 'PAK'),
(163, 'Palau', 'PW', 'PLW'),
(164, 'Panama', 'PA', 'PAN'),
(165, 'Papua New Guinea', 'PG', 'PNG'),
(166, 'Paraguay', 'PY', 'PRY'),
(167, 'Peru', 'PE', 'PER'),
(168, 'Philippines', 'PH', 'PHL'),
(169, 'Pitcairn', 'PN', 'PCN'),
(170, 'Poland', 'PL', 'POL'),
(171, 'Portugal', 'PT', 'PRT'),
(172, 'Puerto Rico', 'PR', 'PRI'),
(173, 'Qatar', 'QA', 'QAT'),
(174, 'Reunion', 'RE', 'REU'),
(175, 'Romania', 'RO', 'ROM'),
(176, 'Russian Federation', 'RU', 'RUS'),
(177, 'Rwanda', 'RW', 'RWA'),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA'),
(179, 'Saint Lucia', 'LC', 'LCA'),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT'),
(181, 'Samoa', 'WS', 'WSM'),
(182, 'San Marino', 'SM', 'SMR'),
(183, 'Sao Tome and Principe', 'ST', 'STP'),
(184, 'Saudi Arabia', 'SA', 'SAU'),
(185, 'Senegal', 'SN', 'SEN'),
(186, 'Seychelles', 'SC', 'SYC'),
(187, 'Sierra Leone', 'SL', 'SLE'),
(188, 'Singapore', 'SG', 'SGP'),
(189, 'Slovak Republic', 'SK', 'SVK'),
(190, 'Slovenia', 'SI', 'SVN'),
(191, 'Solomon Islands', 'SB', 'SLB'),
(192, 'Somalia', 'SO', 'SOM'),
(193, 'South Africa', 'ZA', 'ZAF'),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS'),
(195, 'Spain', 'ES', 'ESP'),
(196, 'Sri Lanka', 'LK', 'LKA'),
(197, 'St. Helena', 'SH', 'SHN'),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM'),
(199, 'Sudan', 'SD', 'SDN'),
(200, 'Suriname', 'SR', 'SUR'),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM'),
(202, 'Swaziland', 'SZ', 'SWZ'),
(203, 'Sweden', 'SE', 'SWE'),
(204, 'Switzerland', 'CH', 'CHE'),
(205, 'Syrian Arab Republic', 'SY', 'SYR'),
(206, 'Taiwan', 'TW', 'TWN'),
(207, 'Tajikistan', 'TJ', 'TJK'),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA'),
(209, 'Thailand', 'TH', 'THA'),
(210, 'Togo', 'TG', 'TGO'),
(211, 'Tokelau', 'TK', 'TKL'),
(212, 'Tonga', 'TO', 'TON'),
(213, 'Trinidad and Tobago', 'TT', 'TTO'),
(214, 'Tunisia', 'TN', 'TUN'),
(215, 'Turkey', 'TR', 'TUR'),
(216, 'Turkmenistan', 'TM', 'TKM'),
(217, 'Turks and Caicos Islands', 'TC', 'TCA'),
(218, 'Tuvalu', 'TV', 'TUV'),
(219, 'Uganda', 'UG', 'UGA'),
(220, 'Ukraine', 'UA', 'UKR'),
(221, 'United Arab Emirates', 'AE', 'ARE'),
(222, 'United Kingdom', 'GB', 'GBR'),
(223, 'United States', 'US', 'USA'),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI'),
(225, 'Uruguay', 'UY', 'URY'),
(226, 'Uzbekistan', 'UZ', 'UZB'),
(227, 'Vanuatu', 'VU', 'VUT'),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT'),
(229, 'Venezuela', 'VE', 'VEN'),
(230, 'Viet Nam', 'VN', 'VNM'),
(231, 'Virgin Islands (British)', 'VG', 'VGB'),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR'),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF'),
(234, 'Western Sahara', 'EH', 'ESH'),
(235, 'Yemen', 'YE', 'YEM'),
(236, 'Yugoslavia', 'YU', 'YUG'),
(237, 'Democratic Republic of Congo', 'CD', 'COD'),
(238, 'Zambia', 'ZM', 'ZMB'),
(239, 'Zimbabwe', 'ZW', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_img_path` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `vendor_link` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_img_path`, `item_description`, `vendor_name`, `vendor_link`, `category_id`, `sub_category_id`, `model_id`, `date_reg`) VALUES
(24, 'shopsense-shoe-1', 'shopsense-shoe-1.png', 'shopsense-shoe-1', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-05 13:16:58'),
(25, 'shopsense-shoe-2', 'shopsense-shoe-2.png', 'shopsense-shoe-2', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-05 13:17:39'),
(26, 'shopsense-boot-1', 'shopsense-boot-1.png', 'shopsense-boot-1', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-05 13:18:53'),
(27, 'steven-madden-earrings-1', 'steven-madden-earrings-1.png', 'steven-madden-earrings-1', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-05 13:19:33'),
(28, 'shopsense-necklace-1', 'shopsense-necklace-1.png', 'shopsense-necklace-1', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-05 13:20:04'),
(29, 'shopsense-bracelet-1', 'shopsense-bracelet-1.png', 'shopsense-bracelet-1', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-05 13:20:26'),
(30, 'shopsense-bracelet-2', 'shopsense-bracelet-2.png', 'shopsense-bracelet-2', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-05 13:20:47'),
(31, 'shopsense-ring-1', 'shopsense-ring-1.png', 'shopsense-ring-1', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-05 13:22:03'),
(32, 'clutch-1', 'clutch-1.png', 'clutch-1', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-05 13:22:57'),
(33, 'clutch-2', 'clutch-2.png', 'clutch-2', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-05 13:23:17'),
(34, 'albertus-swanepoel-lexington-fedora', 'albertus-swanepoel-lexington-fedora.png', 'albertus-swanepoel-lexington-fedora', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-05 13:24:10'),
(55, 'shopsense-boot-2', 'shopsense-boot-2.png', '', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-09 05:49:32'),
(56, 'steven-madden-earrings-2', 'steven-madden-earrings-2.png', 'steven-madden-earrings-2', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-09 05:50:31'),
(57, 'steven-madden-earrings-3', 'steven-madden-earrings-3.png', 'steven-madden-earrings-3', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-09 05:50:45'),
(58, 'steven-madden-earrings-4', 'steven-madden-earrings-4.png', 'steven-madden-earrings-4', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-09 05:51:05'),
(59, 'shopsense-necklace-2', 'shopsense-necklace-2.png', 'shopsense-necklace-2', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-09 05:51:33'),
(60, 'shopsense-necklace-3', 'shopsense-necklace-3.png', 'shopsense-necklace-3', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-09 05:51:58'),
(61, 'steven-madden-earrings-5', 'steven-madden-earrings-5.png', 'steven-madden-earrings-5', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-09 05:53:00'),
(62, 'shopsense-ring-2', 'shopsense-ring-2.png', 'shopsense-ring-2', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-09 05:53:36'),
(63, 'shopsense-ring-3', 'shopsense-ring-3.png', 'shopsense-ring-3', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-09 05:54:31'),
(64, 'steven-madden-earrings-6', 'steven-madden-earrings-6.png', 'steven-madden-earrings-6', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-09 05:54:52'),
(65, 'steven-madden-earrings-7', 'steven-madden-earrings-7.png', 'steven-madden-earrings-7', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-09 05:55:10'),
(66, 'barbour-wax-trench-hat', 'barbour-wax-trench-hat.png', 'barbour-wax-trench-hat', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-09 05:55:38'),
(67, 'eugenia-kim-sequin-hat', 'eugenia-kim-sequin-hat.png', 'eugenia-kim-sequin-hat', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-09 05:56:17'),
(68, 'eugenia-kim-wide-brim-sun-hat', 'eugenia-kim-wide-brim-sun-hat.png', 'eugenia-kim-wide-brim-sun-hat', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-09 05:56:38'),
(69, 'shopsense-bracelet-3', 'shopsense-bracelet-3.png', 'shopsense-bracelet-3', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-09 05:57:07'),
(70, 'shopsense-bracelet-4', 'shopsense-bracelet-4.png', 'shopsense-bracelet-4', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-09 05:57:47'),
(71, 'shopsense-bracelet-5', 'shopsense-bracelet-5.png', 'shopsense-bracelet-5', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-09 05:58:15'),
(72, 'shopsense-bracelet-6', 'shopsense-bracelet-6.png', 'shopsense-bracelet-6', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-09 05:58:45'),
(73, 'shopsense-bracelet-7', 'shopsense-bracelet-7.png', 'shopsense-bracelet-7', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-09 05:59:50'),
(74, 'steven-madden-earrings-8', 'steven-madden-earrings-8.png', 'steven-madden-earrings-8', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-09 06:00:19'),
(75, 'steven-madden-earrings-9', 'steven-madden-earrings-9.png', 'steven-madden-earrings-9', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-09 06:00:43'),
(76, 'clutch-3', 'clutch-3.png', 'clutch-3', 'logitia', 'http://logitia.com/', 10, 0, 0, '2014-04-09 06:01:22'),
(77, 'clutch-4', 'clutch-4.png', 'clutch-4', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-09 06:02:03'),
(78, 'shopsense-shoe-3', 'shopsense-shoe-3.png', 'shopsense-shoe-3', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-09 06:02:43'),
(79, 'shopsense-shoe-4', 'shopsense-shoe-4.png', 'shopsense-shoe-4', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-09 06:03:02'),
(80, 'shopsense-boot-3', 'shopsense-boot-3.png', 'shopsense-boot-3', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-09 06:03:28'),
(81, 'shopsense-boot-4', 'shopsense-boot-4.png', 'shopsense-boot-4', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-09 06:03:59'),
(82, 'ripcurl-hat-1', 'ripcurl-hat-1.png', 'ripcurl-hat-1', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-09 06:05:56'),
(83, 'ripcurl-hat-2', 'ripcurl-hat-2.png', 'ripcurl-hat-2', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-09 06:06:49'),
(84, 'riviera-fedora', 'riviera-fedora.png', 'riviera-fedora', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-09 06:07:25'),
(85, 'ugg-hat-1', 'ugg-hat-1.png', 'ugg-hat-1', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-09 06:07:49'),
(86, 'vivien-sheriff-fitzgerald-hat', 'vivien-sheriff-fitzgerald-hat.png', 'vivien-sheriff-fitzgerald-hat', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-09 06:08:06'),
(87, 'shopsense-ring-4', 'shopsense-ring-4.png', 'shopsense-ring-4', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-09 06:08:37'),
(88, 'shopsense-ring-5', 'shopsense-ring-5.png', 'shopsense-ring-5', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-09 06:08:54'),
(89, 'clutch-5', 'clutch-5.png', 'clutch-5', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-09 06:17:49'),
(90, 'clutch-6', 'clutch-6.png', 'clutch-6', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-09 06:18:26'),
(91, 'clutch-7', 'clutch-7.png', 'clutch-7', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-09 06:18:43'),
(92, 'shopsense-bracelet-8', 'shopsense-bracelet-8.png', 'shopsense-bracelet-8', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-09 06:19:25'),
(93, 'shopsense-bracelet-9', 'shopsense-bracelet-9.png', 'shopsense-bracelet-9', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-09 06:19:54'),
(94, 'shopsense-bracelet-10', 'shopsense-bracelet-10.png', 'shopsense-bracelet-10', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-09 06:20:17'),
(95, 'shopsense-ring-6', 'shopsense-ring-6.png', 'shopsense-ring-6', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-09 06:20:46'),
(96, 'shopsense-pinky-ring-7', 'shopsense-pinky-ring-7.png', 'shopsense-pinky-ring-7', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-09 06:21:22'),
(97, 'shopsense-necklace-4', 'shopsense-necklace-4.png', 'shopsense-necklace-4', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-09 06:25:02'),
(98, 'shopsense-necklace-5', 'shopsense-necklace-5.png', 'shopsense-necklace-5', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-09 06:28:23'),
(99, 'shopsense-necklace-6', 'shopsense-necklace-6.png', 'shopsense-necklace-6', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-09 06:28:47'),
(100, 'shopsense-necklace-7', 'shopsense-necklace-7.png', 'shopsense-necklace-7', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-09 06:31:09'),
(101, 'Grace-inverted-triangle-body-shape-dresses-1', 'Grace-inverted-triangle-body-shape-dresses-1.png', 'Grace-inverted-triangle-body-shape-dresses-1', 'logitia', 'http://logitia.com/', 3, 0, 2, '2014-04-10 06:21:06'),
(102, 'Grace-inverted-triangle-body-shape-dresses-2', 'Grace-inverted-triangle-body-shape-dresses-2.png', 'Grace-inverted-triangle-body-shape-dresses-2', 'logitia', 'http://logitia.com/', 3, 0, 2, '2014-04-10 06:21:47'),
(103, 'Grace-inverted-triangle-body-shape-top-1', 'Grace-inverted-triangle-body-shape-top-1.png', 'Grace-inverted-triangle-body-shape-top-1', 'logitia', 'http://logitia.com/', 5, 0, 2, '2014-04-10 06:23:10'),
(104, 'Grace-inverted-triangle-body-shape-top-2', 'Grace-inverted-triangle-body-shape-top-2.png', 'Grace-inverted-triangle-body-shape-top-2', 'logitia', 'http://logitia.com/', 5, 0, 2, '2014-04-10 06:23:24'),
(105, 'Grace-inverted-triangle-body-shape-top-3', 'Grace-inverted-triangle-body-shape-top-3.png', 'Grace-inverted-triangle-body-shape-top-3', 'logitia', 'http://logitia.com/', 5, 0, 2, '2014-04-10 06:23:48'),
(106, 'Grace-inverted-triangle-body-shape-top-4', 'Grace-inverted-triangle-body-shape-top-4.png', 'Grace-inverted-triangle-body-shape-top-4', 'logitia', 'http://logitia.com/', 5, 0, 2, '2014-04-10 06:24:07'),
(107, 'Grace-inverted-triangle-body-shape-dresses-3', 'Grace-inverted-triangle-body-shape-dresses-3.png', 'Grace-inverted-triangle-body-shape-dresses-3', 'logitia', 'http://logitia.com/', 3, 0, 2, '2014-04-10 06:24:26'),
(108, 'Grace-inverted-triangle-body-shape-dresses-4', 'Grace-inverted-triangle-body-shape-dresses-4.png', 'Grace-inverted-triangle-body-shape-dresses-4', 'logitia', 'http://logitia.com/', 3, 0, 2, '2014-04-10 06:24:56'),
(109, 'Grace-inverted-triangle-body-shape-dresses-5', 'Grace-inverted-triangle-body-shape-dresses-5.png', 'Grace-inverted-triangle-body-shape-dresses-5', 'logitia', 'http://logitia.com/', 3, 0, 2, '2014-04-10 06:25:12'),
(110, 'Grace-inverted-triangle-body-shape-dresses-6', 'Grace-inverted-triangle-body-shape-dresses-6.png', 'Grace-inverted-triangle-body-shape-dresses-6', 'logitia', 'http://logitia.com/', 3, 0, 2, '2014-04-10 06:25:33'),
(111, 'Grace-inverted-triangle-body-shape-dresses-7', 'Grace-inverted-triangle-body-shape-dresses-7.png', 'Grace-inverted-triangle-body-shape-dresses-7', 'logitia', 'http://logitia.com/', 3, 0, 2, '2014-04-10 06:25:56'),
(112, 'Grace-inverted-triangle-body-shape-dresses-8', 'Grace-inverted-triangle-body-shape-dresses-8.png', 'Grace-inverted-triangle-body-shape-dresses-8', 'logitia', 'http://logitia.com/', 3, 0, 2, '2014-04-10 06:26:11'),
(113, 'Grace-inverted-triangle-body-shape-jeans-1', 'Grace-inverted-triangle-body-shape-jeans-1.png', 'Grace-inverted-triangle-body-shape-jeans-1', 'logitia', 'http://logitia.com/', 1, 0, 2, '2014-04-10 06:26:42'),
(114, 'Grace-inverted-triangle-body-shape-jeans-2', 'Grace-inverted-triangle-body-shape-jeans-2.png', 'Grace-inverted-triangle-body-shape-jeans-2', 'logitia', 'http://logitia.com/', 1, 0, 2, '2014-04-10 06:26:56'),
(115, 'Grace-inverted-triangle-body-shape-jeans-3', 'Grace-inverted-triangle-body-shape-jeans-3.png', 'Grace-inverted-triangle-body-shape-jeans-3', 'logitia', 'http://logitia.com/', 1, 0, 2, '2014-04-10 06:27:17'),
(116, 'Grace-inverted-triangle-body-shape-pants-1', 'Grace-inverted-triangle-body-shape-pants-1.png', 'Grace-inverted-triangle-body-shape-pants-1', 'logitia', 'http://logitia.com/', 2, 0, 2, '2014-04-10 06:27:31'),
(117, 'Grace-inverted-triangle-body-shape-pants-2', 'Grace-inverted-triangle-body-shape-pants-2.png', 'Grace-inverted-triangle-body-shape-pants-2', 'logitia', 'http://logitia.com/', 2, 0, 2, '2014-04-10 06:27:47'),
(118, 'Grace-inverted-triangle-body-shape-dresses-9', 'Grace-inverted-triangle-body-shape-dresses-9.png', 'Grace-inverted-triangle-body-shape-dresses-9', 'logitia', 'http://logitia.com/', 3, 0, 2, '2014-04-10 06:28:05'),
(119, 'Grace-inverted-triangle-body-shape-skirt-1', 'Grace-inverted-triangle-body-shape-skirt-1.png', 'Grace-inverted-triangle-body-shape-skirt-1', 'logitia', 'http://logitia.com/', 4, 0, 2, '2014-04-10 06:28:32'),
(120, 'Grace-inverted-triangle-body-shape-skirt-2', 'Grace-inverted-triangle-body-shape-skirt-2.png', 'Grace-inverted-triangle-body-shape-skirt-2', 'logitia', 'http://logitia.com/', 4, 0, 2, '2014-04-10 06:28:51'),
(121, 'Grace-inverted-triangle-body-shape-skirt-3', 'Grace-inverted-triangle-body-shape-skirt-3.png', 'Grace-inverted-triangle-body-shape-skirt-3', 'logitia', 'http://logitia.com/', 4, 0, 2, '2014-04-10 06:29:09'),
(122, 'Grace-inverted-triangle-body-shape-skirt-4', 'Grace-inverted-triangle-body-shape-skirt-4.png', 'Grace-inverted-triangle-body-shape-skirt-4', 'logitia', 'http://logitia.com/', 4, 0, 2, '2014-04-10 06:29:36'),
(123, 'Grace-inverted-triangle-body-shape-skirt-5', 'Grace-inverted-triangle-body-shape-skirt-5.png', 'Grace-inverted-triangle-body-shape-skirt-5', 'logitia', 'http://logitia.com/', 4, 0, 2, '2014-04-10 06:47:09'),
(124, 'Grace-inverted-triangle-body-shape-skirt-6', 'Grace-inverted-triangle-body-shape-skirt-6.png', 'Grace-inverted-triangle-body-shape-skirt-6', 'logitia', 'http://logitia.com/', 4, 0, 2, '2014-04-10 06:47:30'),
(125, 'Grace-inverted-triangle-body-shape-skirt-7', 'Grace-inverted-triangle-body-shape-skirt-7.png', 'Grace-inverted-triangle-body-shape-skirt-7', 'logitia', 'http://logitia.com/', 4, 0, 2, '2014-04-10 06:48:38'),
(126, 'Grace-inverted-triangle-body-shape-top-5', 'Grace-inverted-triangle-body-shape-top-5.png', 'Grace-inverted-triangle-body-shape-top-5', 'logitia', 'http://logitia.com/', 5, 0, 2, '2014-04-10 07:46:08'),
(127, 'Grace-inverted-triangle-body-shape-top-6', 'Grace-inverted-triangle-body-shape-top-6.png', 'Grace-inverted-triangle-body-shape-top-6', 'logitia', 'http://logitia.com/', 5, 0, 2, '2014-04-10 07:46:24'),
(128, 'Grace-inverted-triangle-body-shape-top-7', 'Grace-inverted-triangle-body-shape-top-7.png', 'Grace-inverted-triangle-body-shape-top-7', 'logitia', 'http://logitia.com/', 5, 0, 2, '2014-04-10 07:46:40'),
(129, 'Grace-inverted-triangle-body-shape-top-8', 'Grace-inverted-triangle-body-shape-top-8.png', 'Grace-inverted-triangle-body-shape-top-8', 'logitia', 'http://logitia.com/', 5, 0, 2, '2014-04-10 10:43:44'),
(163, 'audrey-ruler-body-shape-pants-1', 'audrey-ruler-body-shape-pants-1.png', 'audrey-ruler-body-shape-pants-1', 'logitia', 'http://logitia.com/', 2, 0, 1, '2014-04-10 11:14:30'),
(164, 'audrey-ruler-body-shape-jeans-1', 'audrey-ruler-body-shape-jeans-1.png', 'audrey-ruler-body-shape-jeans-1', 'logitia', 'http://logitia.com/', 1, 0, 1, '2014-04-10 11:14:45'),
(165, 'audrey-ruler-body-shape-jeans-2', 'audrey-ruler-body-shape-jeans-2.png', 'audrey-ruler-body-shape-jeans-2', 'logitia', 'http://logitia.com/', 1, 0, 1, '2014-04-10 11:15:10'),
(166, 'audrey-ruler-body-shape-pants-2', 'audrey-ruler-body-shape-pants-2.png', 'audrey-ruler-body-shape-pants-2', 'logitia', 'http://logitia.com/', 2, 0, 1, '2014-04-10 11:15:25'),
(167, 'audrey-ruler-body-shape-jeans-3', 'audrey-ruler-body-shape-jeans-3.png', 'audrey-ruler-body-shape-jeans-3', 'logitia', 'http://logitia.com/', 1, 0, 1, '2014-04-10 11:15:54'),
(168, 'audrey-ruler-body-shape-jeans-4', 'audrey-ruler-body-shape-jeans-4.png', 'audrey-ruler-body-shape-jeans-4', 'logitia', 'http://logitia.com/', 1, 0, 1, '2014-04-10 11:16:14'),
(169, 'audrey-ruler-body-shape-pants-3', 'audrey-ruler-body-shape-pants-3.png', 'audrey-ruler-body-shape-pants-3', 'logitia', 'http://logitia.com/', 2, 0, 1, '2014-04-10 11:16:30'),
(170, 'audrey-ruler-body-shape-dress-1', 'audrey-ruler-body-shape-dress-1.png', 'audrey-ruler-body-shape-dress-1', 'logitia', 'http://logitia.com/', 3, 0, 1, '2014-04-10 11:17:00'),
(171, 'audrey-ruler-body-shape-dress-2', 'audrey-ruler-body-shape-dress-2.png', 'audrey-ruler-body-shape-dress-2', 'logitia', 'http://logitia.com/', 3, 0, 1, '2014-04-10 11:17:18'),
(172, 'audrey-ruler-body-shape-dress-3', 'audrey-ruler-body-shape-dress-3.png', 'audrey-ruler-body-shape-dress-3', 'logitia', 'http://logitia.com/', 3, 0, 1, '2014-04-10 11:17:32'),
(173, 'audrey-ruler-body-shape-dress-4', 'audrey-ruler-body-shape-dress-4.png', 'audrey-ruler-body-shape-dress-4', 'logitia', 'http://logitia.com/', 3, 0, 1, '2014-04-10 11:18:10'),
(174, 'audrey-ruler-body-shape-dress-5', 'audrey-ruler-body-shape-dress-5.png', 'audrey-ruler-body-shape-dress-5', 'logitia', 'http://logitia.com/', 3, 0, 1, '2014-04-10 11:18:24'),
(175, 'audrey-ruler-body-shape-skirt-1', 'audrey-ruler-body-shape-skirt-1.png', 'audrey-ruler-body-shape-skirt-1', 'logitia', 'http://logitia.com/', 4, 0, 1, '2014-04-10 11:27:21'),
(176, 'audrey-ruler-body-shape-skirt-2', 'audrey-ruler-body-shape-skirt-2.png', 'audrey-ruler-body-shape-skirt-2', 'logitia', 'http://logitia.com/', 4, 0, 1, '2014-04-10 11:30:26'),
(177, 'audrey-ruler-body-shape-skirt-3', 'audrey-ruler-body-shape-skirt-3.png', 'audrey-ruler-body-shape-skirt-3', 'logitia', 'http://logitia.com/', 4, 0, 1, '2014-04-10 11:32:14'),
(178, 'audrey-ruler-body-shape-skirt-4', 'audrey-ruler-body-shape-skirt-4.png', 'audrey-ruler-body-shape-skirt-4', 'logitia', 'http://logitia.com/', 4, 0, 1, '2014-04-10 11:32:27'),
(179, 'audrey-ruler-body-shape-skirt-5', 'audrey-ruler-body-shape-skirt-5.png', 'audrey-ruler-body-shape-skirt-5', 'logitia', 'http://logitia.com/', 4, 0, 1, '2014-04-10 11:32:42'),
(180, 'audrey-ruler-body-shape-skirt-6', 'audrey-ruler-body-shape-skirt-6.png', 'audrey-ruler-body-shape-skirt-6', 'logitia', 'http://logitia.com/', 4, 0, 1, '2014-04-10 11:32:58'),
(181, 'audrey-ruler-body-shape-skirt-7', 'audrey-ruler-body-shape-skirt-7.png', 'audrey-ruler-body-shape-skirt-7', 'logitia', 'http://logitia.com/', 4, 0, 1, '2014-04-10 11:33:13'),
(182, 'audrey-ruler-body-shape-skirt-8', 'audrey-ruler-body-shape-skirt-8.png', 'audrey-ruler-body-shape-skirt-8', 'logitia', 'http://logitia.com/', 4, 0, 1, '2014-04-10 11:33:26'),
(183, 'audrey-ruler-body-shape-tops-1', 'audrey-ruler-body-shape-tops-1.png', 'audrey-ruler-body-shape-tops-1', 'logitia', 'http://logitia.com/', 5, 0, 1, '2014-04-10 11:34:03'),
(184, 'audrey-ruler-body-shape-tops-2', 'audrey-ruler-body-shape-tops-2.png', 'audrey-ruler-body-shape-tops-2', 'logitia', 'http://logitia.com/', 5, 0, 1, '2014-04-10 11:34:17'),
(185, 'audrey-ruler-body-shape-tops-3', 'audrey-ruler-body-shape-tops-3.png', 'audrey-ruler-body-shape-tops-3', 'logitia', 'http://logitia.com/', 5, 0, 1, '2014-04-10 11:34:28'),
(186, 'audrey-ruler-body-shape-tops-4', 'audrey-ruler-body-shape-tops-4.png', 'audrey-ruler-body-shape-tops-4', 'logitia', 'http://logitia.com/', 5, 0, 1, '2014-04-10 11:34:43'),
(187, 'audrey-ruler-body-shape-tops-5', 'audrey-ruler-body-shape-tops-5.png', 'audrey-ruler-body-shape-tops-5', 'logitia', 'http://logitia.com/', 5, 0, 1, '2014-04-10 11:34:56'),
(188, 'shopsense-bracelet-11', 'shopsense-bracelet-11.png', 'shopsense-bracelet-11', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-10 11:37:09'),
(189, 'shopsense-bracelet-12', 'shopsense-bracelet-12.png', 'shopsense-bracelet-12', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-10 11:39:06'),
(190, 'shopsense-bracelet-13', 'shopsense-bracelet-13.png', 'shopsense-bracelet-13', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-10 11:39:21'),
(191, 'shopsense-bracelet-14', 'shopsense-bracelet-14.png', 'shopsense-bracelet-14', 'logitia', 'http://logitia.com/', 10, 5, 0, '2014-04-10 11:39:36'),
(192, 'steven-madden-earrings-10', 'steven-madden-earrings-10.png', 'steven-madden-earrings-10', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-10 11:40:35'),
(193, 'steven-madden-earrings-11', 'steven-madden-earrings-11.png', 'steven-madden-earrings-11', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-10 11:40:57'),
(194, 'steven-madden-earrings-13', 'steven-madden-earrings-13.png', 'steven-madden-earrings-13', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-10 11:42:20'),
(195, 'steven-madden-earrings-15', 'steven-madden-earrings-15.png', 'steven-madden-earrings-15', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-10 11:42:45'),
(196, 'steven-madden-earrings-16', 'steven-madden-earrings-16.png', 'steven-madden-earrings-16', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-10 11:42:58'),
(197, 'steven-madden-earrings-17', 'steven-madden-earrings-17.png', 'steven-madden-earrings-17', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-10 11:43:15'),
(198, 'steven-madden-earrings-18', 'steven-madden-earrings-18.png', 'steven-madden-earrings-18', 'logitia', 'http://logitia.com/', 10, 3, 0, '2014-04-10 11:43:32'),
(199, 'clutch-8', 'clutch-8.png', 'clutch-8', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:44:29'),
(200, 'clutch-9', 'clutch-9.png', 'clutch-9', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:44:43'),
(201, 'shopsense-bag-1', 'shopsense-bag-1.png', 'shopsense-bag-1', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:44:58'),
(202, 'shopsense-bag-2', 'shopsense-bag-2.png', 'shopsense-bag-2', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:45:13'),
(203, 'shopsense-bag-3', 'shopsense-bag-3.png', 'shopsense-bag-3', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:45:34'),
(204, 'shopsense-bag-4', 'shopsense-bag-4.png', 'shopsense-bag-4', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:45:48'),
(205, 'shopsense-bag-5', 'shopsense-bag-5.png', 'shopsense-bag-5', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:46:01'),
(206, 'shopsense-bag-6', 'shopsense-bag-6.png', 'shopsense-bag-6', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:46:15'),
(207, 'shopsense-bag-7', 'shopsense-bag-7.png', 'shopsense-bag-7', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:46:56'),
(208, 'shopsense-bag-8', 'shopsense-bag-8.png', 'shopsense-bag-8', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:47:09'),
(209, 'shopsense-bag-9', 'shopsense-bag-9.png', 'shopsense-bag-9', 'logitia', 'http://logitia.com/', 10, 7, 0, '2014-04-10 11:47:20'),
(210, 'fascinator-1', 'fascinator-1.png', 'fascinator-1', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-10 11:48:48'),
(211, 'fascinator-2', 'fascinator-2.png', 'fascinator-2', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-10 11:49:08'),
(212, 'fascinator-3', 'fascinator-3.png', 'fascinator-3', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-10 11:49:22'),
(213, 'fascinator-4', 'fascinator-4.png', 'fascinator-4', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-10 11:49:33'),
(214, 'fascinator-5', 'fascinator-5.png', 'fascinator-5', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-10 11:49:51'),
(215, 'fascinator-6', 'fascinator-6.png', 'fascinator-6', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-10 11:50:08'),
(216, 'fascinator-7', 'fascinator-7.png', 'fascinator-7', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-10 11:54:23'),
(217, 'fascinator-8', 'fascinator-8.png', 'fascinator-8', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-10 11:54:38'),
(218, 'fascinator-10', 'fascinator-10.png', 'fascinator-10', 'logitia', 'http://logitia.com/', 10, 8, 0, '2014-04-10 11:55:01'),
(219, 'shopsense-necklace-8', 'shopsense-necklace-8.png', 'shopsense-necklace-8', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-10 11:58:22'),
(220, 'shopsense-necklace-9', 'shopsense-necklace-9.png', 'shopsense-necklace-9', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-10 11:58:40'),
(221, 'shopsense-necklace-10', 'shopsense-necklace-10.png', 'shopsense-necklace-10', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-10 11:58:53'),
(222, 'shopsense-necklace-11', 'shopsense-necklace-11.png', 'shopsense-necklace-11', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-10 11:59:08'),
(223, 'shopsense-necklace-12', 'shopsense-necklace-12.png', 'shopsense-necklace-12', 'logitia', 'http://logitia.com/', 10, 4, 0, '2014-04-10 11:59:24'),
(224, 'shopsense-house-of-harlow-ring-8', 'shopsense-house-of-harlow-ring-8.png', 'shopsense-house-of-harlow-ring-8', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-10 12:01:11'),
(225, 'shopsense-ring-9', 'shopsense-ring-9.png', 'shopsense-ring-9', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-10 12:03:41'),
(226, 'shopsense-ring-10', 'shopsense-ring-10.png', 'shopsense-ring-10', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-10 12:03:53'),
(227, 'shopsense-ring-11', 'shopsense-ring-11.png', 'shopsense-ring-11', 'logitia', 'http://logitia.com/', 10, 6, 0, '2014-04-10 12:04:08'),
(228, 'shopsense-shoe-5', 'shopsense-shoe-5.png', 'shopsense-shoe-5', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 12:05:00'),
(229, 'shopsense-shoe-6', 'shopsense-shoe-6.png', 'shopsense-shoe-6', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 12:05:16'),
(230, 'shopsense-shoe-7', 'shopsense-shoe-7.png', 'shopsense-shoe-7', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 12:05:34'),
(231, 'shopsense-shoe-8', 'shopsense-shoe-8.png', 'shopsense-shoe-8', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 12:05:52'),
(232, 'shopsense-shoe-9', 'shopsense-shoe-9.png', 'shopsense-shoe-9', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 12:06:05'),
(233, 'shopsense-shoe-10', 'shopsense-shoe-10.png', 'shopsense-shoe-10', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 12:06:19'),
(234, 'shopsense-boot-5', 'shopsense-boot-5.png', 'shopsense-boot-5', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:06:33'),
(235, 'shopsense-boot-6', 'shopsense-boot-6.png', 'shopsense-boot-6', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:57:07'),
(236, 'shopsense-boot-7', 'shopsense-boot-7.png', 'shopsense-boot-7', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:57:20'),
(237, 'shopsense-boot-8', 'shopsense-boot-8.png', 'shopsense-boot-8', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:57:35'),
(238, 'shopsense-boot-9', 'shopsense-boot-9.png', 'shopsense-boot-9', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:57:55'),
(239, 'shopsense-boot-10', 'shopsense-boot-10.png', 'shopsense-boot-10', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:58:17'),
(240, 'shopsense-boot-11', 'shopsense-boot-11.png', 'shopsense-boot-11', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:58:32'),
(241, 'shopsense-boot-12', 'shopsense-boot-12.png', 'shopsense-boot-12', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:58:50'),
(242, 'shopsense-boot-13', 'shopsense-boot-13.png', 'shopsense-boot-13', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:59:11'),
(243, 'shopsense-boot-14', 'shopsense-boot-14.png', 'shopsense-boot-14', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:59:24'),
(244, 'shopsense-boot-15', 'shopsense-boot-15.png', 'shopsense-boot-15', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:59:42'),
(245, 'shopsense-boot-16', 'shopsense-boot-16.png', 'shopsense-boot-16', 'logitia', 'http://logitia.com/', 9, 2, 0, '2014-04-10 12:59:55'),
(246, 'shopsense-shoe-11', 'shopsense-shoe-11.png', 'shopsense-shoe-11', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:01:11'),
(247, 'shopsense-shoe-12', 'shopsense-shoe-12.png', 'shopsense-shoe-12', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:01:26'),
(248, 'shopsense-shoe-13', 'shopsense-shoe-13.png', 'shopsense-shoe-13', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:01:43'),
(249, 'shopsense-shoe-14', 'shopsense-shoe-14.png', 'shopsense-shoe-14', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:01:56'),
(250, 'shopsense-shoe-15', 'shopsense-shoe-15.png', 'shopsense-shoe-15', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:02:11'),
(251, 'shopsense-shoe-16', 'shopsense-shoe-16.png', 'shopsense-shoe-16', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:02:22'),
(252, 'shopsense-shoe-17', 'shopsense-shoe-17.png', 'shopsense-shoe-17', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:02:34'),
(253, 'shopsense-shoe-18', 'shopsense-shoe-18.png', 'shopsense-shoe-18', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:02:48'),
(254, 'shopsense-shoe-19', 'shopsense-shoe-19.png', 'shopsense-shoe-19', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:03:12'),
(255, 'shopsense-shoe-20', 'shopsense-shoe-20.png', 'shopsense-shoe-20', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:03:24'),
(256, 'shopsense-shoe-21', 'shopsense-shoe-21.png', 'shopsense-shoe-21', 'logitia', 'http://logitia.com/', 9, 1, 0, '2014-04-10 13:03:36'),
(260, 'Miss Selfridge test dress', 'miss-selfridge-embroidered-baby-doll-dress2.png', 'floral dress', 'Miss Selfridge', 'http://bit.ly/1kbx28F', 3, 0, 0, '2014-05-10 06:22:47'),
(261, 'Miss Selfridge test dress', 'miss-selfridge-embroideredtest-dress-2.png', 'floral dress', 'Miss Selfridge', 'http://bit.ly/1kbx28F', 3, 0, 0, '2014-05-10 06:24:16'),
(262, 'Miss Selfridge test dress', 'miss-selfridge-embroideredtest-dress-21.png', 'floral dress', 'Miss Selfridge', 'http://bit.ly/1kbx28F', 3, 0, 0, '2014-05-10 06:24:21'),
(274, 'audrey-ruler-body-shape-tops-6', 'audrey-ruler-body-shape-tops-6.png', 'audrey-ruler-body-shape-tops-6', 'logitia', 'http://logitia.com', 5, 0, 1, '2015-07-09 05:40:24'),
(275, 'audrey-ruler-body-shape-tops-7', 'audrey-ruler-body-shape-tops-7.png', 'audrey-ruler-body-shape-tops-7', 'logitia', 'http://logitia.com', 5, 0, 1, '2015-07-09 05:40:24'),
(276, 'audrey-ruler-body-shape-tops-8', 'audrey-ruler-body-shape-tops-8.png', 'audrey-ruler-body-shape-tops-8', 'logitia', 'http://logitia.com', 5, 0, 1, '2015-07-09 05:41:53'),
(280, 'audrey-ruler-body-shape-tops-9', 'audrey-ruler-body-shape-tops-9.png', 'audrey-ruler-body-shape-tops-9', 'logitia', 'http://logitia.com', 5, 0, 1, '2015-07-09 06:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE IF NOT EXISTS `main_category` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_logo` varchar(255) NOT NULL,
  `category_details` text NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`category_id`, `category_name`, `category_logo`, `category_details`, `date_reg`) VALUES
(1, 'Jeans', 'jeans-icon.png', 'This category belongs to Jeans.', '2014-04-02 21:50:13'),
(2, 'Pants', 'pants-icon.png', 'This category belongs to Pants.', '2014-04-02 21:50:34'),
(3, 'Dresses', 'dress-icon.png', 'This category belongs to Dresses.', '2014-04-02 21:51:00'),
(4, 'Skirts', 'skirt-icon.png', 'This category belongs to Skirts.', '2014-04-02 21:51:17'),
(5, 'Tops', 'top-icon.png', 'This category belongs to Tops.', '2014-04-02 21:51:36'),
(6, 'Jackets & Coats', 'jacket-and-coat-icon.png', 'This category belongs to Jackets & Coats.', '2014-04-02 21:51:51'),
(7, 'Swimwear', 'swimwear-icon.png', 'This category belongs to Swimwear.', '2014-04-02 21:52:28'),
(8, 'Shorts', 'shorts-icon.png', 'This category belongs to Shorts.', '2014-04-02 21:52:46'),
(9, 'Shoes', 'shoes-icon.png', 'This category belongs to Shoes.', '2014-04-02 21:53:36'),
(10, 'Accessories', 'Accessories-Cateogry-icon.png', 'This category belongs to Accessories.', '2014-04-02 21:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
`model_id` int(11) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `model_body_type` varchar(100) NOT NULL,
  `model_body_type_name` varchar(100) NOT NULL,
  `model_body_desc` text NOT NULL,
  `model_img_path` varchar(255) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model_name`, `model_body_type`, `model_body_type_name`, `model_body_desc`, `model_img_path`, `date_reg`) VALUES
(1, 'Audrey', 'ruler_body_shape', 'Ruler Body Shape', 'dark hair. Small bust, no definite hips or waist. Legs are quite straight as shown ', 'Audrey.png', '2014-04-10 11:13:24'),
(2, 'Grace', 'inverted_triangle_body_shape', 'Inverted Triangle Body Shape', 'dark brown hair. Larger shoulders, average bust, no hips or defined waist. Longer legs. Quite athletic looking. ', 'Grace.png', '2015-07-09 07:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ashish.laturiya@logitia.in', 'e7f55eb51322693bb716428cf39256faebe7ddd0766c13871027dda74b477389', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
`sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL,
  `sub_category_logo` varchar(255) NOT NULL,
  `sub_category_details` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `sub_category_logo`, `sub_category_details`, `category_id`, `date_reg`) VALUES
(1, 'Shoes/Sandals', 'shoes-icon1.png', 'This category belongs to Shoes/Sandals......', 9, '2014-04-02 21:54:37'),
(2, 'Boots', 'boot-icon.png', 'This category belongs to Boots.', 9, '2014-04-02 21:55:07'),
(3, 'Earrings', 'subcateogry_earrings-icon.png', 'This category belongs to Earrings.', 10, '2014-04-02 21:55:32'),
(4, 'Necklaces', 'subcategory_necklaces_icon.png', 'This category belongs to Necklaces.', 10, '2014-04-02 21:55:50'),
(5, 'Bracelets', 'subcategory-braclets.png', 'This category belongs to Bracelets.', 10, '2014-04-02 21:56:15'),
(7, 'Handbags', 'subcateogry-handbag-icon.png', 'This category belongs to Handbags.', 10, '2014-04-02 22:00:41'),
(8, 'Hats/Fascinators', 'subcategory-hats--fascinators.png', 'This category belongs to Hats/Fascinators.', 10, '2014-04-02 22:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
`User_id` int(11) NOT NULL,
  `fb_id` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `body_type` int(11) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `act_key` varchar(255) NOT NULL,
  `active_user` varchar(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`User_id`, `fb_id`, `first_name`, `last_name`, `username`, `email`, `password`, `country`, `dob`, `body_type`, `user_image`, `act_key`, `active_user`) VALUES
(17, '', 'logitia', 'solutions', 'logitia', 'abc@logitia.com', '5c8f827ec45b793f637d87a6e90b4a48', 'India', '', 3, 'Jellyfish.jpg', '2034126687689476381253130991865742152100165777', 'N'),
(16, '', 'sa', 'kaskar', 'sanjog', 'sanjog121@gmail.com', '36351aca16ce566863b3c697b2cedcb4', 'Angola', '', 4, '', '18637123444299734937385935701349239070870070739', 'N'),
(7, '', 'sanjog', 'kaskar', 'sanjog121', 'sanjog121@gmail.com', '36351aca16ce566863b3c697b2cedcb4', '', '', 4, 'Jellyfish1.jpg', '153936331055085626438106227813499618741091609027', 'Y'),
(8, '', 'sachin', 'mule', 'sachinmule', 'sachinmule4587@gmail.com', '36351aca16ce566863b3c697b2cedcb4', '', '', 2, '', '92082067187076278410672309151136071853526939134', 'Y'),
(12, '', 'ashok', 'soni', 'aksoni', 'aksoni84@gmail.com', 'c223199626bf0875cbc4e5859c93040c', '', '', 5, '', '41322810310905704908753825121655041369721954367', 'N'),
(33, '', 'Fiona', 'Tye', 'fionatye', 'fionatye@bigpond.net.au', 'e10adc3949ba59abbe56e057f20f883e', 'Australia', '09 June 2014', 1, 'Untitled-1.png', '70643622741353591413639691542376669841514054101', 'N'),
(34, '', 'Vidhi', 'Vyas', 'Vidhi', 'vidhivyas2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'India', '03 November 1990', 1, '', '1255212931214001736412155083483421950751766097390', 'N'),
(35, '', 'Ashish', 'Laturiya', 'ashly', 'ashish.laturiya@logitia.in', 'e10adc3949ba59abbe56e057f20f883e', 'India', '01 July 2015', 3, 'register.png', '1183619415138566673011137116091548784171123665787', 'Y'),
(38, '100001382207498', 'Ashish', 'Laturiya', 'Ashish', 'ashishltr@gmail.com', '', '', '', 0, '', '864044571154527843015846327352315225071649486188', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `body_types`
--
ALTER TABLE `body_types`
 ADD PRIMARY KEY (`body_types_id`);

--
-- Indexes for table `contact_form_info`
--
ALTER TABLE `contact_form_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`item_id`), ADD KEY `category_id` (`category_id`), ADD KEY `sub_category_id` (`sub_category_id`), ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
 ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
 ADD PRIMARY KEY (`sub_category_id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
 ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `body_types`
--
ALTER TABLE `body_types`
MODIFY `body_types_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact_form_info`
--
ALTER TABLE `contact_form_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `main_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
