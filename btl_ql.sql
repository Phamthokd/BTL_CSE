-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 12:55 PM
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
(1, 'Phạm', 'Thọ', 20, 'VP', '2001-01-27', 397327836, 'nam', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(6) UNSIGNED NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `content` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
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
(1, 'phamthokd@gmail.com', '$2y$10$ao8eO5j6B.ZIo/lVE4mY2eAPwhj8bzz727eLGrT1STYfgu6wDh5Ji', '2021-10-28 16:58:55', 0, 0, 127);

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
  ADD KEY `infor_users_ibfk_1` (`group_id`),
  ADD KEY `infor_users_ibfk_2` (`userid`);

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
  MODIFY `infor_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
