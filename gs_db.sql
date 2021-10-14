-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 14, 2021 at 01:24 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(12) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `content`, `date`) VALUES
(1, 'Harry', 'hiro@test.com', 'hello world', '2021-09-26 21:10:22'),
(2, 'Hiro', 'harry@test.com', 'hey mate', '2021-09-26 21:14:57'),
(3, 'Ken', 'ken@test.com', 'hey ken', '2021-09-26 21:14:57'),
(4, 'Taiji', 'taiji@test.com', 'Legal is my love', '2021-09-26 21:14:57'),
(5, 'Matsu', 'matsu@test.com', 'Think financially', '2021-09-26 21:14:57'),
(6, 'はりー', 'harry@test.com', 'はいr', '2021-09-26 22:13:10'),
(7, 'Harry', 'Harry', 'Harry', '2021-09-26 22:16:06'),
(8, 'Harry', 'test@gmail.cm', 'やってみた', '2021-09-26 22:43:50'),
(9, '荘博光', 'harry.s@17.live', '表示', '2021-09-26 22:44:43'),
(10, 'もういっかい', 'もういっかい', 'もういっかい', '2021-09-26 22:45:06'),
(11, '悪意マン', '', '', '2021-09-26 22:47:04'),
(12, '悪意マン', '悪意マン', '<script>alert(\"ハッキングしたよ\")</script>', '2021-09-26 22:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `Tweet`
--

CREATE TABLE `Tweet` (
  `id` int(12) NOT NULL,
  `username` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tweet`
--

INSERT INTO `Tweet` (`id`, `username`, `content`, `date`) VALUES
(1, 'Harry', 'はりー', '2021-10-01 23:19:38'),
(2, 'はりたん', '今日はいい日だ', '2021-10-01 23:20:04'),
(3, 'やってみよう', 'おもしろい', '2021-10-01 23:20:11'),
(4, 'Harry', '面白い機能', '2021-10-01 23:22:38'),
(5, 'じーず', '今日は面白い', '2021-10-01 23:39:25'),
(6, 'じーず', '今日から社会人3年目', '2021-10-02 00:15:23'),
(7, '本日', '明日になったね', '2021-10-02 00:17:07'),
(8, 'Harry', '最終チェック中', '2021-10-07 22:10:13'),
(12, '寝不足マン', '寝不足になりたい！', '2021-10-07 22:07:13'),
(14, '課題提出直前', 'もっとツイート', '2021-10-07 22:26:44'),
(15, '課題やっていこう', 'やってる？やってるわ！', '2021-10-07 22:27:06'),
(16, 'ツイート', '最後までツイートする', '2021-10-07 22:27:32'),
(18, '課題マン', 'できる！', '2021-10-14 21:50:36'),
(19, 'はりー', '課題やってる\r\n', '2021-10-14 22:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `lid` varchar(32) DEFAULT NULL,
  `lpw` varchar(16) DEFAULT NULL,
  `kanri_flg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `username`, `lid`, `lpw`, `kanri_flg`) VALUES
(1, 'Harry', 'harry1', 'harry1', 1),
(2, 'はりー', 'harry2', 'harry2', 0),
(3, 'そー', 'harry3', 'harry3', 0),
(4, 'そうひろみつ', 'hiromitsu_so', 'hiromitsu', 0),
(5, 'そうひろみつ', 'hiromitsu_so', 'hiromitsu', 0),
(6, '課題マン', 'kadai', 'kadai', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Tweet`
--
ALTER TABLE `Tweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Tweet`
--
ALTER TABLE `Tweet`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
