-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 24, 2021 at 10:22 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `compute_company_balance` (IN `regis_id` INT(10), IN `total` FLOAT)  BEGIN
DECLARE vat float;
DECLARE aftervat float;
DECLARE servicefee float;
DECLARE for_coach float;
DECLARE day DATE;

SET vat = total*0.07;
SET aftervat = total*0.93;
SET servicefee = aftervat*0.15;
SET for_coach = aftervat*0.85;
SET day = compute_expected_date();

INSERT INTO company_account(registration_id,total_in ,vat  ,after_vat ,service_fee ,give_to_coach ,expected_transaction_date )
VALUES (regis_id,total,vat,aftervat,servicefee,for_coach,day);

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `calculateFee` (`sub_total` FLOAT) RETURNS FLOAT BEGIN  
DECLARE fee float;
SET fee = sub_total *0.15;
RETURN fee; END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `compute_expected_date` () RETURNS DATE BEGIN 
DECLARE day DATE; 
SET day = DATE_ADD(CURDATE(), INTERVAL 15 DAY );
RETURN day;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(250) DEFAULT NULL,
  `category_description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Personal Stylist', 'Find a perfect personal stylist for yourself'),
(2, 'Life Coach', 'Hiring a life coach now.'),
(3, 'Fitness Trainer', 'Find the right fitness trainer for yourself.'),
(4, 'Wellness', 'Anything about your wellness and self-care'),
(5, 'Gaming', 'Improve your skills, fulfill your dreams'),
(6, 'Cooking', 'Improve your learning. Find your kitchen coach.');

-- --------------------------------------------------------

--
-- Table structure for table `Coach`
--

CREATE TABLE `Coach` (
  `unique_id` int(200) UNSIGNED NOT NULL,
  `coach_id` int(50) UNSIGNED NOT NULL,
  `national_id` varchar(13) DEFAULT NULL,
  `address1` varchar(1000) DEFAULT NULL,
  `address2` varchar(1000) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `occupation` varchar(250) DEFAULT NULL,
  `skills` varchar(255) NOT NULL,
  `available_time` varchar(200) DEFAULT NULL,
  `education` varchar(250) DEFAULT NULL,
  `social_media` varchar(250) DEFAULT NULL,
  `Bank_account` varchar(250) NOT NULL,
  `Bankaccount_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Coach`
--

INSERT INTO `Coach` (`unique_id`, `coach_id`, `national_id`, `address1`, `address2`, `description`, `occupation`, `skills`, `available_time`, `education`, `social_media`, `Bank_account`, `Bankaccount_name`) VALUES
(1477175082, 6, '1234567890123', 'Condo A', 'Bangkok, Thailand', 'I am an ordinary person with a blessed heart. ', 'Game Developer at Rockstar', 'Programming, and gaming', 'Monday to Wednesday, 6PM to 12PM.', 'Computer Science Harvard University', 'Instagram: @Malissssssss', 'Marlis Enoch Koolen', '1234567'),
(1037261954, 7, '1234567890123', 'Condo B', 'Thailand', 'Hello, if you want to become rich and beautiful like me just signup my course.            ', 'Rich and beautiful manager at Apple', 'Managing Task', 'Everyday,24/7            ', 'Harvard University', '@Richyyyy', 'Richy Garls', '1234355'),
(1423231459, 8, '1234567890123', 'Ideo Condo', 'Bangkok', 'My nickname is Mint. Just call me with my nickname', 'Consultant', 'Investment', 'Sunday and Monday', 'B.B.A, Chulalongkorn University', 'none', 'Porntip M.', '12344566778'),
(1362410906, 9, '1234567890123', 'D Condo', 'Pathumthani', 'Hello, Im the great programmer. I can write any language including machine language.', 'ENJENIR', 'Coding, Programming, Any language', 'Monday - Friday, 9AM-10PM', 'Sirindhorn International Institute of Technology', '-', 'Somsak W.', '123456'),
(1006883794, 10, '1234567890123', 'Condo A', 'Bangkok ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis vestibulum nulla            ', 'CPE Student ', 'Computer language, C C++', 'Tue 12:00 - 20:00            ', 'SIIT, Thammasat University Rangsit', 'IG: @khunbam', 'Bam', '1234567'),
(697324147, 11, '1234567890123', 'Condo A', 'Pathumthani', 'abcd', 'CPE student', 'Coding, Programming, Any language', 'Tue 12:00 -20:00            ', 'Thammasat University', '@earnism ', 'Nutsuda P.', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `company_account`
--

CREATE TABLE `company_account` (
  `recordno` int(10) NOT NULL,
  `registration_id` int(10) UNSIGNED DEFAULT NULL,
  `total_in` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `after_vat` float DEFAULT NULL,
  `service_fee` float DEFAULT NULL,
  `give_to_coach` float DEFAULT NULL,
  `expected_transaction_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_account`
--

INSERT INTO `company_account` (`recordno`, `registration_id`, `total_in`, `vat`, `after_vat`, `service_fee`, `give_to_coach`, `expected_transaction_date`) VALUES
(1, 16, 3500, 245, 3255, 488.25, 2766.75, '2021-12-09'),
(2, 17, 1500, 105, 1395, 209.25, 1185.75, '2021-12-09'),
(3, 18, 3000, 210, 2790, 418.5, 2371.5, '2021-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `image_video` varchar(1000) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `course_short_description` varchar(250) DEFAULT NULL,
  `course_description` varchar(1000) DEFAULT NULL,
  `regular_price` float DEFAULT NULL,
  `buffet_price` float DEFAULT NULL,
  `buffet_hour` int(200) NOT NULL,
  `unique_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`course_id`, `course_name`, `image_video`, `category_id`, `course_short_description`, `course_description`, `regular_price`, `buffet_price`, `buffet_hour`, `unique_id`) VALUES
(1, 'Your Style Palette', '2464b0df216b5626574b75d65678982d.jpg,b8275bdd26190ba58385cc7080bd2e72.jpg,a4b46882cd7c05927a87ca08a4dfb5fd.jpg', 1, 'Aenean malesuada eget orci ut aliquet. Vivamus congue egestas orci,et facilisis lorem lacinia at. Proin justo mauris, finibus ut efficitur.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rutrum, risus sit amet congue hendrerit, arcu augue malesuada massa, suscipit commodo neque sem quis nulla. Duis porttitor tellus quis lorem bibendum ultrices. Nam dictum libero ante. Proin nisi felis, semper nec augue id, mattis tempor dolor. Nullam pretium enim nec diam vulputate sodales. Nunc eros arcu, laoreet a laoreet consectetur, tempor vel elit. Proin purus ipsum, sodales et posuere non, mattis sodales ex. Aenean malesuada eget orci ut aliquet. Vivamus congue egestas orci, et facilisis lorem lacinia at. Proin justo mauris, finibus ut efficitur a, viverra at quam. Nam eget egestas ante, a gravida enim. Ut interdum tincidunt purus sit amet aliquam. Etiam malesuada, risus ut laoreet ultrices, nunc ex vulputate erat, eu ultricies nulla diam a tortor.\r\n', 1000, 9800, 10, 1037261954),
(3, 'Your Personal Color', 'a4b46882cd7c05927a87ca08a4dfb5fd.jpg,b8275bdd26190ba58385cc7080bd2e72.jpg,2464b0df216b5626574b75d65678982d.jpg', 1, 'Knowing your personal color. You will become your own stylist. Explore your personal coloring and take your beautiful palette everywhere.', 'Curabitur non congue sapien. Integer iaculis aliquet congue. Curabitur hendrerit dolor sapien, vel euismod ipsum auctor ac. Morbi non scelerisque elit. Nunc in nibh quis justo congue tincidunt. Morbi vulputate urna in magna faucibus pharetra a et lectus. Ut sollicitudin cursus vestibulum. Phasellus tempus purus purus, non lacinia velit pharetra vitae. Phasellus cursus elit vitae erat semper, ac elementum neque laoreet. Cras eleifend lorem et enim egestas, eget tempus diam venenatis. Sed ultrices tempus nisl, eu vestibulum libero tristique sit amet. Donec rutrum cursus enim id vestibulum. Nunc eu sodales velit. Pellentesque eget nibh non felis rhoncus iaculis ac vel dolor. Pellentesque et mauris maximus, suscipit urna vel, congue orci.', 1000, 4800, 5, 1037261954),
(4, 'Cultural Stylist', 'ccc4783f47b34a5520fcc9f7d91e5f6b.jpg,d95391167e92e70c8ed0581ed92e2a59.jpg,ecdcb42e3d3f748b73be359f5ffdd8cf.jpg', 1, 'Maecenas in fermentum libero, a posuere dolor. Donec rhoncus felis magna, id consectetur diam semper id.', 'Suspendisse at tellus in erat dapibus rutrum. Sed tincidunt at arcu sed rutrum. Donec sit amet neque eget lectus tincidunt tristique vel nec enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In egestas id risus nec commodo. Aenean mattis, ante ac ultricies dictum, erat velit rhoncus erat, sit amet volutpat urna massa sed quam. Suspendisse eget erat dolor. Vestibulum ipsum neque, consequat sit amet interdum ac, imperdiet in augue. Maecenas eu dapibus neque. Integer lacinia urna faucibus tellus interdum faucibus. \r\n- Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n- Fusce sagittis justo eu libero commodo egestas.', 500, 5000, 10, 1423231459),
(5, 'take picture like pro', '7cc492bcda38f181873d0ed1ba92b204.jpg,b3b063637ad9d4e1c5fbac5aa214075f.jpg', 1, 'Running out of content here. Sorry ;(                                    ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nFusce sagittis justo eu libero commodo egestas.\r\nMorbi id sapien pretium, lobortis est nec, tristique risus.\r\nNunc et mauris molestie, vehicula magna et, tempus ante.\r\nPellentesque laoreet lorem sit amet commodo aliquam.', 800, 4700, 6, 1423231459),
(7, 'How to Style Like Senior Programmer.', '1c7eacd2e4ecd31e1c3a350dfbbc1d1b.jpg,9a85560d1e22c6a0221f9923d35ff90b.jpg', 1, 'It is so easy to look profession. I\'ll teach you how to look like senior engineer. You\'ll look like them in one hour', 'Tell me not to do something and I’ll do it twice and take pictures\r\nI’m suffering from an extreme case of not being a Kardashian\r\nRollin’ with the homies\r\nToday’s the kind of day I live for\r\nSimple but significant\r\nIn 2019, I’m going to be better than I’ve ever been before', 500, 4700, 10, 1362410906),
(8, 'Sed scelerisque facilisis', 'fc013c9246cf3c351bbe03b9fedef685.jpg,2fcec9e3d712dc96a28efc665b56af18.jpg,3cd7fa3da6e8e152ca25632007605490.jpg,029e148e93be50d49bf85b58393b39d1.jpg', 6, 'Sed scelerisque facilisis ligula volutpat condimentum. Integer semper arcu ', 'Nunc et odio dignissim enim pharetra vulputate. Nulla tincidunt facilisis luctus. Nunc dignissim tellus vehicula sem venenatis tincidunt. In facilisis vitae nisi et ornare. Etiam aliquam, nibh vel bibendum elementum, leo ipsum suscipit dolor, at commodo neque ligula aliquet ex. Donec suscipit ipsum ac vestibulum tempor. Donec rhoncus justo in neque lobortis, a convallis lacus pulvinar. Suspendisse potenti. Aliquam ac purus pretium libero interdum iaculis vitae at enim. Cras bibendum tempus elit, dignissim tincidunt nunc molestie sed. Donec quis ex cursus, iaculis tortor nec, pellentesque dui. In diam mi, vestibulum in volutpat sit amet, egestas id libero. Pellentesque feugiat sed est at accumsan. Maecenas libero ante, pharetra vel sem quis, feugiat dictum sapien.', 700, 6800, 10, 1006883794),
(9, 'Become best player', '238dfe50a817d1f5340920c4146232b5.jpg,23844deda2de9771c7a1880cb4f41e38.jpg,abae1ba2118887f6ce76b717fb9b1c63.jpg,9ea5a8e328173be017d9e26e1de47775.jpg', 5, 'asdasddsfdsgfasdgfgfdgadgfg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets', 600, 5800, 10, 697324147),
(10, 'Dressing and Mood', 'b8275bdd26190ba58385cc7080bd2e72.jpg,2464b0df216b5626574b75d65678982d.jpg,a4b46882cd7c05927a87ca08a4dfb5fd.jpg', 1, 'Just another example course. You can introduce yourself here or tell something about course.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1000, 4800, 5, 1037261954),
(11, 'Your Personal Color', '2464b0df216b5626574b75d65678982d.jpg,a4b46882cd7c05927a87ca08a4dfb5fd.jpg,b8275bdd26190ba58385cc7080bd2e72.jpg', 1, 'Quisque tincidunt mattis semper. Aliquam sagittis ornare orci, eget semper ex pulvinar maximus. Mauris ut ex in augue tincidunt luctus.', 'Curabitur non congue sapien. Integer iaculis aliquet congue. Curabitur hendrerit dolor sapien, vel euismod ipsum auctor ac. Morbi non scelerisque elit. Nunc in nibh quis justo congue tincidunt. Morbi vulputate urna in magna faucibus pharetra a et lectus. Ut sollicitudin cursus vestibulum. Phasellus tempus purus purus, non lacinia velit pharetra vitae. Phasellus cursus elit vitae erat semper, ac elementum neque laoreet. Cras eleifend lorem et enim egestas, eget tempus diam venenatis. Sed ultrices tempus nisl, eu vestibulum libero tristique sit amet. Donec rutrum cursus enim id vestibulum. Nunc eu sodales velit. Pellentesque eget nibh non felis rhoncus iaculis ac vel dolor. Pellentesque et mauris maximus, suscipit urna vel, congue orci.', 1000, 4800, 5, 1037261954);

-- --------------------------------------------------------

--
-- Table structure for table `Income`
--

CREATE TABLE `Income` (
  `income_id` int(255) NOT NULL,
  `Date` date DEFAULT NULL,
  `registration_id` int(20) UNSIGNED DEFAULT NULL,
  `unique_id` int(200) UNSIGNED DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `slip_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Income`
--

INSERT INTO `Income` (`income_id`, `Date`, `registration_id`, `unique_id`, `amount`, `slip_img`) VALUES
(13, '2021-11-24', 4, 1362410906, 5750, '84e914749de4f5add5d2901c9ee0fe39.jpg'),
(14, '2021-11-24', 4, 1362410906, 2300, '8d40e0cb0d716493f0fa51fefa522887.jpg'),
(15, '2021-11-24', 8, 1331682162, 4025, '3a8300df76beea6e9066f6ed50bd8010.png'),
(16, '2021-11-24', 17, 1006883794, 1725, '4680509f69771385cb72072fc6c72021.jpg'),
(17, '2021-11-24', 18, 1331682162, 3450, 'e7f9cadc1a5db031ff23591d3710c731.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) UNSIGNED DEFAULT NULL,
  `outgoing_msg_id` int(255) UNSIGNED DEFAULT NULL,
  `msg` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1331682162, 1362410906, 'hello'),
(2, 1362410906, 1331682162, 'hi'),
(3, 1006883794, 1331682162, 'Hello'),
(4, 1037261954, 1331682162, 'interested'),
(5, 1331682162, 1037261954, 'in what?'),
(6, 1037261954, 1331682162, 'you <3'),
(7, 1362410906, 1331682162, 'Hello'),
(8, 1362410906, 1477175082, 'Hi coach'),
(9, 1362410906, 1477175082, 'Melis Koolen'),
(10, 1362410906, 1331682162, 'Earn Nutsuda');

-- --------------------------------------------------------

--
-- Table structure for table `Outcome`
--

CREATE TABLE `Outcome` (
  `outcome_id` int(255) NOT NULL,
  `Date` date DEFAULT NULL,
  `registration_id` int(20) UNSIGNED DEFAULT NULL,
  `unique_id` int(20) UNSIGNED DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Outcome`
--

INSERT INTO `Outcome` (`outcome_id`, `Date`, `registration_id`, `unique_id`, `amount`) VALUES
(10, '2021-11-23', 4, 1362410906, 500),
(11, '2021-11-24', 8, 1006883794, 3000),
(12, '2021-11-24', 17, 1423231459, 2275),
(13, '2021-11-24', 17, 1423231459, 2275),
(14, '2021-11-24', 17, 1362410906, 2000),
(15, '2021-11-24', 18, 1037261954, 2371.5);

-- --------------------------------------------------------

--
-- Table structure for table `Registration`
--

CREATE TABLE `Registration` (
  `resgistration_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `timestamp` date DEFAULT NULL,
  `study_hour` int(2) DEFAULT NULL,
  `slip_photo` varchar(50) DEFAULT NULL,
  `sub_total` float DEFAULT NULL,
  `fees` float DEFAULT NULL,
  `unique_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Registration`
--

INSERT INTO `Registration` (`resgistration_id`, `course_id`, `timestamp`, `study_hour`, `slip_photo`, `sub_total`, `fees`, `unique_id`, `amount`) VALUES
(11, 4, '2021-11-24', 4, '38e99676714d854f71655f4d860cd885.jpg', 2000, 300, 1362410906, 2300),
(12, 4, '2021-11-24', 8, 'b8038f1890508406ef788c40f7464528.jpg', 4000, 600, 1362410906, 4600),
(14, 4, '2021-11-24', 10, '84e914749de4f5add5d2901c9ee0fe39.jpg', 5000, 750, 1362410906, 5750),
(15, 4, '2021-11-24', 4, '8d40e0cb0d716493f0fa51fefa522887.jpg', 2000, 300, 1362410906, 2300),
(16, 8, '2021-11-24', 5, '3a8300df76beea6e9066f6ed50bd8010.png', 3500, 525, 1331682162, 4025),
(17, 7, '2021-11-24', 3, '4680509f69771385cb72072fc6c72021.jpg', 1500, 225, 1006883794, 1725),
(18, 3, '2021-11-24', 3, 'e7f9cadc1a5db031ff23591d3710c731.jpg', 3000, 450, 1331682162, 3450);

--
-- Triggers `Registration`
--
DELIMITER $$
CREATE TRIGGER `get_company_income` AFTER INSERT ON `Registration` FOR EACH ROW BEGIN
DECLARE temp float;
call compute_company_balance(New.resgistration_id,New.sub_total);
SELECT SUM(service_fee) INTO temp FROM company_account;
SET @current_profit = temp;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `income_record` AFTER INSERT ON `Registration` FOR EACH ROW BEGIN
DECLARE temp float;
INSERT INTO Income(date,registration_id,unique_id,amount,slip_img) VALUES(CURDATE(),New.resgistration_id,New.unique_id,New.amount,New.slip_photo);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `unique_id` int(200) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `img` varchar(400) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(216322991, 'Ant', 'Mod', 'abb@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '163759361389820171_3326209097442011_1385904445119791104_n.jpg', 'Offline now'),
(697324147, 'Nutsuda', 'Ploysopond', 'earn@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1637736619istockphoto-1319763830-170667a.jpg', 'Offline now'),
(753862350, 'Lilly', 'May', 'lillymay@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '1637652230huseyin-topcu-F5h3Gz2OcwU-unsplash.jpg', 'Active now'),
(1006883794, 'Khun', 'Bam', 'bam@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '1637733385richy.jpg', 'Active now'),
(1037261954, 'Richy ', 'Garl', 'richy1234@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1637691575michael-dam-mEZ3PoFGs_k-unsplash.jpg', 'Offline now'),
(1331682162, 'Earn', 'Nutsuda', 'earn@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '1637681602lucas-lenzi-b5zPZ8_7vhw-unsplash.jpg', 'Active now'),
(1362410906, 'Somsak', 'Wattana', 'somsakgg@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '1637699529ben-parker-OhKElOkQ3RE-unsplash.jpg', 'Offline now'),
(1423231459, 'Porntip', 'Metharom', 'porntip@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1637697608guilherme-stecanella-_dH-oQF9w-Y-unsplash.jpg', 'Offline now'),
(1477175082, 'Marlis', 'Koolen', 'Marlis_k@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1637679195joel-mott-LaK153ghdig-unsplash.jpg', 'Offline now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `Coach`
--
ALTER TABLE `Coach`
  ADD PRIMARY KEY (`coach_id`),
  ADD KEY `unique_id` (`unique_id`);

--
-- Indexes for table `company_account`
--
ALTER TABLE `company_account`
  ADD PRIMARY KEY (`recordno`),
  ADD UNIQUE KEY `registration_id` (`registration_id`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unique_id` (`unique_id`) USING BTREE;

--
-- Indexes for table `Income`
--
ALTER TABLE `Income`
  ADD PRIMARY KEY (`income_id`),
  ADD KEY `unique_id` (`unique_id`),
  ADD KEY `registration_id` (`registration_id`) USING BTREE;

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `incoming_msg_id` (`incoming_msg_id`,`outgoing_msg_id`),
  ADD KEY `outgoing_msg_id` (`outgoing_msg_id`);

--
-- Indexes for table `Outcome`
--
ALTER TABLE `Outcome`
  ADD PRIMARY KEY (`outcome_id`),
  ADD KEY `course_id` (`registration_id`),
  ADD KEY `coach_id` (`unique_id`);

--
-- Indexes for table `Registration`
--
ALTER TABLE `Registration`
  ADD PRIMARY KEY (`resgistration_id`),
  ADD KEY `courseid` (`course_id`),
  ADD KEY `unique_id` (`unique_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Coach`
--
ALTER TABLE `Coach`
  MODIFY `coach_id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company_account`
--
ALTER TABLE `company_account`
  MODIFY `recordno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Course`
--
ALTER TABLE `Course`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Income`
--
ALTER TABLE `Income`
  MODIFY `income_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Outcome`
--
ALTER TABLE `Outcome`
  MODIFY `outcome_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Registration`
--
ALTER TABLE `Registration`
  MODIFY `resgistration_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Coach`
--
ALTER TABLE `Coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`unique_id`) REFERENCES `users` (`unique_id`);

--
-- Constraints for table `company_account`
--
ALTER TABLE `company_account`
  ADD CONSTRAINT `company_account_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `Registration` (`resgistration_id`);

--
-- Constraints for table `Course`
--
ALTER TABLE `Course`
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `Category` (`category_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`incoming_msg_id`) REFERENCES `users` (`unique_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`outgoing_msg_id`) REFERENCES `users` (`unique_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
