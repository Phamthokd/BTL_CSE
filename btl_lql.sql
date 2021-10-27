-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 06:00 PM
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
-- Cơ sở dữ liệu: `btl_lql`
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
(1, 'học sinh'),
(2, 'bác sĩ'),
(3, 'công an'),
(4, 'kỹ sư');

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
  `email` varchar(60) CHARACTER SET utf8 NOT NULL,
  `group_id` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `infor_users`
--

INSERT INTO `infor_users` (`infor_id`, `first_name`, `last_name`, `age`, `address`, `date`, `phone_number`, `gender`, `email`, `group_id`) VALUES
(1, 'phạm', 'Thọ', 20, 'VP', '2001-01-27', 397327836, 'Male', 'phamthokd@gmail.com', 1),
(3, 'phạm', 'Thọ', 21, 'VP', '2001-02-27', 397327836, 'Male', 'phamthokd@gmail.com', 2),
(4, 'phạm', 'Thọ', 21, 'VP', '2001-01-27', 397327836, 'Male', 'phamthokd@gmail.com', 3),
(5, 'phạm', 'Thọ', 20, 'VP', '2001-01-27', 397327836, 'Male', 'phamthokd@gmail.com', 1),
(6, 'phạm', 'Thọ', 20, 'VP', '2001-01-27', 397327836, 'Male', 'phamthokd@gmail.com', 1),
(7, 'phạm', 'Thọ', 21, 'VP', '2001-01-27', 397327836, 'Male', 'phamthokd@gmail.com', 1),
(8, 'phạm', 'Thọ', 21, 'VP', '2001-01-27', 397327836, 'Male', 'phamthokd@gmail.com', 1),
(9, 'phạm', 'Thọ', 22, 'VP', '2001-02-20', 397327836, 'Male', 'phamthokd@gmail.com', 1),
(10, 'phạm', 'Thọ', 22, 'VP', '0000-00-00', 397327836, 'Male', 'phamthokd@gmail.com', 1),
(11, 'phạm', 'Thọ', 22, 'VP', '2001-01-27', 397327836, 'Male', 'phamthokd@gmail.com', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(6) UNSIGNED NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `content` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `infor_id` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'phamthokd@gmail.com', '$2y$10$UboetvKod7HIWzYwLiYQX.jDHihxyvYCil42d2/12nwncSh74wWhG', '2021-10-27 22:41:07', 1, 1, 127);

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
  ADD KEY `group_id` (`group_id`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `group_users`
--
ALTER TABLE `group_users`
  MODIFY `group_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `infor_users`
--
ALTER TABLE `infor_users`
  MODIFY `infor_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `infor_users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_users` (`group_id`);

--
-- Các ràng buộc cho bảng `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`infor_id`) REFERENCES `infor_users` (`infor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
