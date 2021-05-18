-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 19, 2021 at 02:28 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doantotnghiep_phpthuan_appstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT '1',
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `updated_at`) VALUES
(6, 'TrungPhuNA', 'HCM', 'doanketthucmon@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0964984150', 1, 1, NULL, NULL, '2021-05-18 19:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` int(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gia đình', 'gia-dinh', NULL, NULL, 1, 1, '2019-02-12 19:31:47', '2021-05-16 03:00:02'),
(2, 'Game', 'game', NULL, NULL, 1, 1, '2019-02-12 19:31:56', '2021-05-16 02:51:35'),
(3, 'Truyện tranh', 'truyen-tranh', NULL, NULL, 1, 1, '2019-02-12 19:32:05', '2021-05-18 18:21:52'),
(4, 'Thể thao', 'the-thao', NULL, NULL, 1, 1, '2019-02-12 19:32:12', '2021-05-18 18:21:55'),
(34, 'Lịch sử', 'lich-su', NULL, NULL, 0, 1, '2019-02-14 16:48:35', '2021-05-16 02:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `comment` text,
  `id_user` int(11) DEFAULT NULL,
  `review` int(11) NOT NULL DEFAULT '0',
  `id_product` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `id_user`, `review`, `id_product`, `created_at`, `updated_at`) VALUES
(27, NULL, 'Rất hay. Mong đọc được nhiều truyện hơn từ phía tác giả. Tôi sẽ giới thiệu sách cho mọi người tại khosandepkosago để họ có thời gian giải trí khi làm việc trong mảng sàn nhựa giả gỗ', 17, 5, 21, '2021-05-18 16:20:45', '2021-05-18 16:43:47'),
(28, NULL, 'Chả thấy hay mẹ gì cả, nó khiến tôi cảm thấy thất vọng vch', 17, 3, 21, '2021-05-18 16:47:59', '2021-05-18 16:47:59'),
(29, NULL, 'ey will face their biggest challenge of all: another family. The Croods need a new place to live. So, the first prehistoric family sets off into the world in search of a safer place to call home. ', 17, 5, 20, '2021-05-18 18:23:57', '2021-05-18 18:23:57'),
(30, NULL, 'Cách đây 3 ngày, Chelsea đã gặp Leicester City trong trận chung kết FA Cup. Ở trận đấu đó, \"The Blues\" đã phải nhận thất bại 0-1 với bàn thắng duy nhất của Tielemans, qua đó ngậm ngùi nhìn \"Bầy cáo\" đăng quang chức vô địch. Do đó, trận đấu này có thể xem là cơ hội không thể tuyệt vời hơn để đoàn quân của HLV Tuchel đòi lại món nợ đã vay trước đối thủ.', 17, 2, 20, '2021-05-18 18:24:40', '2021-05-18 18:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` tinyint(4) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(12, 8, 23, 1, 24000, '2019-03-02 16:31:43', '2019-03-02 16:31:43'),
(13, 9, 9, 2, 2940000, '2019-03-02 16:46:13', '2019-03-03 09:28:14'),
(14, 10, 20, 1, 2000000, '2019-03-21 11:30:15', '2019-03-21 11:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `descs` text,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT '0',
  `thumbn` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `content` text,
  `number` int(11) NOT NULL DEFAULT '0',
  `sold` int(11) DEFAULT '0',
  `total_review` int(11) NOT NULL DEFAULT '0',
  `number_review` int(11) NOT NULL DEFAULT '0',
  `head` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `hot` tinyint(11) DEFAULT '0',
  `pay` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `descs`, `slug`, `price`, `sale`, `thumbn`, `category_id`, `user_id`, `content`, `number`, `sold`, `total_review`, `number_review`, `head`, `view`, `hot`, `pay`, `created_at`, `updated_at`) VALUES
(20, 'The Croods: A New Age', 'The Croods have survived their fair share of dangers and disasters, from fanged prehistoric beasts to surviving the end of the world, but now they will face their biggest challe', 'the-croods-a-new-age', 2000000, 0, 'Screen Shot 2021-05-16 at 10.01.42 AM.png', 3, 17, 'The Croods have survived their fair share of dangers and disasters, from fanged prehistoric beasts to surviving the end of the world, but now they will face their biggest challenge of all: another family. The Croods need a new place to live. So, the first prehistoric family sets off into the world in search of a safer place to call home. When they discover an idyllic walled-in paradise that meets all their needs, they think their problems are solved ... except for one thing. Another family already lives there: the Bettermans. The Bettermans (emphasis on the \"better\")-with their elaborate tree house, amazing inventions and irrigated acres of fresh produce-are a couple of steps above the Croods on the evolutionary ladder. When they take the Croods in as the world\'s first houseguests, it isn\'t long before tensions escalate between the cave family and the modern family. Just when all seems lost, a new threat will propel both families on an epic adventure outside the safety of the wall, one that will force them to embrace their differences, draw strength from each other and forge a future together. The Croods: A New Age features the voice talent of returning stars Nicolas Cage as Grug Crood, Cathe', 1, 0, 2, 7, 0, 0, 0, 1, NULL, '2021-05-18 18:24:40'),
(21, 'Harry Potter and the Sorcerer\'s Stone', 'Không có âm thanh hay phụ đề bằng ngôn ngữ của bạn. Có phụ đề bằng Tiếng Anh, Tiếng Ba Lan, Tiếng Bồ Đào Nha (Brazil),', 'harry-potter-and-the-sorcerers-stone', 200000, 4, 'Screen Shot 2021-05-16 at 10.03.18 AM.png', 2, 17, 'In this enchanting film adaptation of J.K. Rowling\'s delightful bestseller, Harry Potter learns on his 11th birthday that he is the orphaned first son of two powerful wizards and possesses magical powers of his own. At Hogwarts School of Witchcraft and Wizardry, Harry embarks on the adventure of a lifetime. He learns the high-flying sport Quidditch and plays a thrilling game with living chess pieces on his way to face a Dark Wizard bent on destroying him. MPAA Rating: PG Rated PG for some scary moments and mild language. HARRY POTTER characters, names and related indicia are trademarks of and © Warner Bros. Entertainment Inc. Harry Potter Publishing Rights © JKR. Harry Potter and the Sorcerer\'s Stone & Package Design © 2001 Warner Bros. Entertainment Inc.', 2, 0, 2, 8, 0, 0, 0, 0, NULL, '2021-05-18 16:49:21'),
(22, 'Tom & Jerry', 'Không có âm thanh hay phụ đề bằng ngôn ngữ của bạn. Có phụ đề bằng Tiếng Anh, Tiếng Bồ Đào Nha (Brazil), ', 'tom-jerry', 0, 5, 'Screen Shot 2021-05-16 at 10.06.12 AM.png', 1, 0, 'One of the most beloved rivalries in history is re‐ignited when Jerry moves into New York City’s finest hotel on the eve of “the wedding of the century,” forcing the event’s desperate planner to hire Tom to get rid of him. The ensuing cat and mouse battle threatens to destroy her career, the wedding and possibly the hotel itself. But soon, an even bigger problem arises: a diabolically ambitious staffer conspiring against all three of them. An eye‐popping blend of classic animation and live action, Tom and Jerry’s new big‐screen adventure stakes new ground for the iconic characters and forces them to do the unthinkable...work together to save the day.', 2, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-05-16 03:06:55'),
(23, 'Harry Potter and the Prisoner of Azkaban', 'Không có âm thanh hay phụ đề bằng ngôn ngữ của bạn. Có phụ đề bằng Tiếng Anh, Tiếng Ba Lan, Tiếng Bồ Đào Nha (Brazil), Tiếng Croatia', 'harry-potter-and-the-prisoner-of-azkaban', 30000, 20, 'Screen Shot 2021-05-16 at 10.07.52 AM.png', 1, 0, 'Harry, Ron & Hermione, now teenagers, return for their third year at Hogwarts, where they are forced to face escaped prisoner, Sirius Black, who poses a great threat to Harry. Harry and his friends spend their third year learning how to handle a half-horse half-eagle Hippogriff, repel shape-shifting Boggarts and master the art of Divination. They also visit the wizarding village of Hogsmeade and the Shrieking Shack, which is considered the most haunted building in Britain. In addition to these new experiences, Harry must overcome the threats of the soul-sucking Dementors, outsmart a dangerous werewolf and finally deal with the truth about Sirius Black and his relationship to Harry and his parents. With his best friends, Harry masters advanced magic, crosses the barriers of time and changes the course of more than one life. Directed by Alfonso Cuaron and based on J.K. Rowling\'s third book, this wondrous spellbinder soars with laughs, and the kind of breathless surprise only found in a Harry Potter adventure. MPAA Rating: PG Rated PG for frightening moments, creature violence and mild language. HARRY POTTER characters, names and related indicia are trademarks of and © Warner Bros. Entertainment Inc. Harry Potter Publishing Rights © JKR. Harry Potter and the Prisoner of Azkaban & Package Design © 2004 Warner Bros. Entertainment Inc.', 10, 0, 0, 0, 0, 0, 0, 2, '2021-05-17 04:58:14', '2021-05-16 04:58:16'),
(25, 'aaa', NULL, 'aaa', 2000000, 2, '5Ygdzn.jpg', 4, 0, 'ôk', 2, 0, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `id_comment` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `name`, `comment`, `id_comment`, `id_user`, `id_product`, `created_at`, `updated_at`) VALUES
(6, 'Ry Mi', 'hat bụi nào hóa kiếm thân tôi', 18, 11, 24, '2019-03-19 08:19:29', '2019-03-19 08:19:29'),
(7, 'Yami 333', 'ec', 18, 13, 24, '2019-03-22 04:44:16', '2019-03-22 04:44:16'),
(8, 'Ry Mi', 'okokoo', 18, 11, 24, '2019-03-28 09:05:25', '2019-03-28 09:05:25'),
(9, 'RyMimm', 'Hello', 14, 11, 23, '2019-04-04 16:48:12', '2019-04-04 16:48:12'),
(10, 'RyMimm', 'Hư', 25, 11, 23, '2019-04-04 16:48:23', '2019-04-04 16:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(8, 26400, 11, 1, 'ok', '2019-03-02 16:31:43', '2019-03-21 11:04:56'),
(9, 3234000, 13, 1, 'k', '2019-03-02 16:46:13', '2019-03-03 09:53:35'),
(10, 2200000, 13, 1, 'ok', '2019-03-21 11:30:14', '2019-03-21 11:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `updated_at`) VALUES
(17, 'Hoàng Huy ', 'tranlehoanghuy@gmail.com', '0988111222', 'Ha Nội', 'fcea920f7412b5da7be0cf42b8c93759', 'avatar.jpeg', 1, NULL, '2021-05-16 04:02:05', '2021-05-18 19:09:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
