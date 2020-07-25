-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2020-07-25 19:18:16
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 資料庫： `chatbot`
--

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `categoryID` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`categoryID`, `category`) VALUES
('C001', '學習'),
('C002', '健康');

-- --------------------------------------------------------

--
-- 資料表結構 `chatroom`
--

CREATE TABLE `chatroom` (
  `userID` varchar(50) NOT NULL,
  `chatRoomID` int(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `roleName` varchar(50) NOT NULL,
  `habbitName` varchar(50) NOT NULL,
  `habbitStatus` varchar(10) NOT NULL DEFAULT '養成中',
  `habbitContent` varchar(50) NOT NULL,
  `remindTime` time NOT NULL,
  `completion` int(50) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `rolePhoto` text NOT NULL,
  `categoryID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `chatroom`
--

INSERT INTO `chatroom` (`userID`, `chatRoomID`, `nickname`, `role`, `roleName`, `habbitName`, `habbitStatus`, `habbitContent`, `remindTime`, `completion`, `created_at`, `rolePhoto`, `categoryID`) VALUES
('U005', 5, '水美眉', '媽媽', '阿姆', '讀英文', '暫停中', '每天讀英文500分鐘', '05:20:00', 1, '2020-07-18 15:36:37', '585543.jpg', 'C001'),
('U005', 10, '', '媽媽', '阿姆', '不喝手搖', '暫停中', '不喝清心、COCO', '05:20:00', 0, '2020-07-18 16:07:28', '254413.jpg', 'C002'),
('U005', 11, '', '媽媽', '阿姆', '喝水', '已完成', '喝滿5000CC', '05:20:00', 0, '2020-07-18 16:08:00', '585543.jpg', 'C002'),
('U001', 13, '', '爸爸', '小明的老爸', '喝水3000c.c', '養成中', '喝水3000c.c喝水3000c.c', '19:00:00', 0, '2020-07-18 16:42:41', '', 'C002');

-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

CREATE TABLE `post` (
  `userID` varchar(50) NOT NULL,
  `postID` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `post`
--

INSERT INTO `post` (`userID`, `postID`, `title`, `content`, `created_at`, `updated_at`, `likes`) VALUES
('U005', 1, '今天喝了珍奶5000cc', '我要改內容', '2020-07-25 15:25:13', '2020-07-25 15:25:13', 1),
('U005', 2, '剛剛吃了貓咪杯子蛋糕', '好可愛，好吃', '2020-07-25 15:38:32', '2020-07-25 15:38:32', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userID` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`userID`, `userName`, `gender`, `birthday`, `email`) VALUES
('U001', '小明', '男', '1999-01-01', 'test001@gmail.com'),
('U002', '小美', '女', '1999-01-02', 'test002@gmail.com'),
('U005', '小瓜', '男', '1999-02-21', 'ruby789@gmail.com');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- 資料表索引 `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`chatRoomID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- 資料表索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `chatRoomID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `chatroom`
--
ALTER TABLE `chatroom`
  ADD CONSTRAINT `chatroom_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `chatroom_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

--
-- 資料表的限制式 `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;
