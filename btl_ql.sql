-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 05:11 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl_ql`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_users`
--

CREATE TABLE `group_users` (
  `group_id` int(6) UNSIGNED NOT NULL,
  `group_name` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `group_users`
--

INSERT INTO `group_users` (`group_id`, `group_name`) VALUES
(1, 'sinh viên'),
(2, 'giáo viên'),
(3, 'bác sĩ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `infor_users`
--

CREATE TABLE `infor_users` (
  `infor_id` int(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `age` int(10) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `phone_number` int(60) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `group_id` int(6) UNSIGNED NOT NULL,
  `userid` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `infor_users`
--

INSERT INTO `infor_users` (`infor_id`, `first_name`, `last_name`, `age`, `address`, `date`, `phone_number`, `gender`, `group_id`, `userid`) VALUES
(23, 'phạm', 'thọ', 26, 'VP', '2001-01-27', 397327837, 'khác', 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(6) UNSIGNED NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime DEFAULT NULL,
  `infor_id` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `plan`
--

INSERT INTO `plan` (`plan_id`, `title`, `date_start`, `date_end`, `infor_id`) VALUES
(1, 'dự sinh nhật', '2021-10-31 00:00:00', '2021-10-31 00:00:00', 23),
(2, 'dự đám cưới', '2021-12-16 00:00:00', '2021-12-17 00:00:00', 23),
(3, 'hello', '2021-09-29 00:00:00', '2021-09-30 00:00:00', NULL),
(4, 'hehe', '2021-09-29 00:00:00', '2021-09-30 00:00:00', NULL),
(5, 'abc', '2021-10-06 00:00:00', '2021-10-07 00:00:00', NULL),
(7, 'jdhasd', '2021-10-07 00:00:00', '2021-10-08 00:00:00', NULL),
(8, 'đầ', '2021-09-28 00:00:00', '2021-09-29 00:00:00', NULL),
(9, 'đasa', '2021-10-05 00:00:00', '2021-10-06 00:00:00', NULL),
(10, 'fsafsda', '2021-10-06 00:00:00', '2021-10-07 00:00:00', NULL),
(11, 'fasdfd', '2021-09-29 00:00:00', '2021-09-30 00:00:00', NULL),
(12, 'adsad', '2021-09-29 00:00:00', '2021-09-30 00:00:00', NULL),
(13, 'hehehe', '2021-10-06 00:00:00', '2021-10-07 00:00:00', NULL),
(14, 'kakaka', '2021-10-05 00:00:00', '2021-10-06 00:00:00', NULL),
(15, 'kkkk', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(16, 'hhaaha', '2021-09-28 00:00:00', '2021-09-29 00:00:00', NULL),
(17, 'abc', '2021-10-07 00:00:00', '2021-10-08 00:00:00', NULL),
(18, 'abgcagc', '2021-10-06 00:00:00', '2021-10-07 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userid` int(6) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_level` tinyint(10) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `code` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userid`, `email`, `password`, `registration_date`, `user_level`, `status`, `code`) VALUES
(2, 'phamthokd1@gmail.com', 'a', '2021-10-28 21:54:27', 0, 0, 5),
(3, 'phamthokd@gmail.com', '$2y$10$v1awJo3a7x8kM9Z7pCGyqekROvNmnPbl1Nty8oU8DRCW53giWx//W', '2021-10-28 19:31:05', 0, 1, 127);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`group_id`);

--
-- Chỉ mục cho bảng `infor_users`
--
ALTER TABLE `infor_users`
  ADD PRIMARY KEY (`infor_id`),
  ADD UNIQUE KEY `infor_users_ibfk_2` (`userid`) USING BTREE,
  ADD KEY `infor_users_ibfk_1` (`group_id`);

--
-- Chỉ mục cho bảng `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `infor_id` (`infor_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `group_users`
--
ALTER TABLE `group_users`
  MODIFY `group_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `infor_users`
--
ALTER TABLE `infor_users`
  MODIFY `infor_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `infor_users`
--
ALTER TABLE `infor_users`
  ADD CONSTRAINT `infor_users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_users` (`group_id`),
  ADD CONSTRAINT `infor_users_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Các ràng buộc cho bảng `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`infor_id`) REFERENCES `infor_users` (`infor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
