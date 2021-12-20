-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-18 08:34:46
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `movie_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `actors`
--

CREATE TABLE `actors` (
  `actor_id` smallint(6) NOT N  ULL,
  `actor_first_name` varchar(255) DEFAULT NULL,
  `actor_last_name` varchar(255) DEFAULT NULL,
  `actor_gender` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `actors`
--

INSERT INTO `actors` (`actor_id`, `actor_first_name`, `actor_last_name`, `actor_gender`) VALUES
(1, '柔伊', '莎達娜', 'f'),
(2, '山姆', '沃辛頓', 'm'),
(3, '雪歌妮', '薇佛', 'f');

-- --------------------------------------------------------

--
-- 資料表結構 `directors`
--

CREATE TABLE `directors` (
  `director_id` smallint(6) NOT NULL,
  `director_first_name` varchar(255) DEFAULT NULL,
  `director_last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `directors`
--

INSERT INTO `directors` (`director_id`, `director_first_name`, `director_last_name`) VALUES
(1, '詹姆斯', '卡麥隆');

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `movie_id` smallint(6) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `movie_year` smallint(4) DEFAULT NULL,
  `movie_time` smallint(3) DEFAULT NULL,
  `movie_genres` varchar(255) DEFAULT NULL,
  `photoURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_title`, `movie_year`, `movie_time`, `movie_genres`, `photoURL`) VALUES
(1, '阿凡達', 2009, 170, '科幻', 'https://upload.wikimedia.org/wikipedia/zh/2/2f/Avatar_2009_movie.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `movies_cast`
--

CREATE TABLE `movies_cast` (
  `movie_id` smallint(6) NOT NULL,
  `actor_id` smallint(6) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `movies_cast`
--

INSERT INTO `movies_cast` (`movie_id`, `actor_id`, `role`) VALUES
(1, 1, '妮特麗'),
(1, 2, '傑克 薩利裡 托米'),
(1, 3, '葛莉絲');

-- --------------------------------------------------------

--
-- 資料表結構 `movies_directors`
--

CREATE TABLE `movies_directors` (
  `director_id` smallint(6) NOT NULL,
  `movie_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `movies_directors`
--

INSERT INTO `movies_directors` (`director_id`, `movie_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ratings`
--

CREATE TABLE `ratings` (
  `movie_id` smallint(6) NOT NULL,
  `stars` float DEFAULT NULL,
  `rating_num` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `ratings`
--

INSERT INTO `ratings` (`movie_id`, `stars`, `rating_num`) VALUES
(1, 8.5, '4');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`username`, `password`, `isAdmin`) VALUES
('test', '1234', 1),
('yao', '1234', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actor_id`);

--
-- 資料表索引 `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`director_id`);

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- 資料表索引 `movies_cast`
--
ALTER TABLE `movies_cast`
  ADD PRIMARY KEY (`movie_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- 資料表索引 `movies_directors`
--
ALTER TABLE `movies_directors`
  ADD PRIMARY KEY (`director_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- 資料表索引 `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`movie_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `movies_cast`
--
ALTER TABLE `movies_cast`
  ADD CONSTRAINT `movies_cast_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`),
  ADD CONSTRAINT `movies_cast_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`);

--
-- 資料表的限制式 `movies_directors`
--
ALTER TABLE `movies_directors`
  ADD CONSTRAINT `movies_directors_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directors` (`director_id`),
  ADD CONSTRAINT `movies_directors_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`);

--
-- 資料表的限制式 `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
