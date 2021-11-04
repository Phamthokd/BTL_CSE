-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2021 lúc 03:15 PM
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
(3, 'lái xe'),
(4, 'bác sĩ'),
(5, 'nhân viên giao hàng');

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
  `phone_number` int(10) UNSIGNED ZEROFILL NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `group_id` int(6) UNSIGNED NOT NULL,
  `userid` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `infor_users`
--

INSERT INTO `infor_users` (`infor_id`, `first_name`, `last_name`, `age`, `address`, `date`, `phone_number`, `gender`, `group_id`, `userid`) VALUES
(1, 'Phạm Văn', 'A', 21, 'Hải Dương', '2000-11-09', 0999887777, 'nam', 3, 1),
(2, 'Lê Thị', 'B', 24, 'Hà Nam', '1996-11-05', 0978456452, 'nữ', 4, 4),
(31, 'phạm', 'Thọ', 21, 'VP', '2001-01-27', 0397327836, 'nam', 1, 8),
(34, 'Lê Đình', 'Thọ', 20, 'Hà Nội', '2001-01-11', 0987456456, 'nam', 1, 13),
(35, 'Trần', 'Văn Sinh', 20, 'Hà Nội', '2001-11-11', 0978657897, 'nam', 1, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(6) UNSIGNED NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `infor_id` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `plan`
--

INSERT INTO `plan` (`plan_id`, `title`, `date_start`, `date_end`, `infor_id`) VALUES
(79, 'Nộp bài tập nhóm', '2021-11-05', '2021-11-06', 31),
(80, 'Hoàn thiện BTL', '2021-11-04', '2021-11-05', 31),
(82, 'Ôn tập ', '2021-11-04', '2021-11-06', 31),
(83, 'Thi môn CSE 485', '2021-11-06', '2021-11-07', 31),
(84, 'ôn tập TKUD', '2021-11-07', '2021-11-09', 31),
(85, 'Thi TKUD', '2021-11-09', '2021-11-10', 31),
(87, 'Ôn tập AI ', '2021-11-07', '2021-11-11', 31),
(88, 'Thi môn AI', '2021-11-11', '2021-11-12', 31),
(89, 'Nghỉ', '2021-11-12', '2021-11-14', 31);

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
(1, 'phamthokd1@gmail.com', 'a', '2021-11-03 18:13:35', 0, 1, 78),
(4, 'phamthokd2@gmail.com', 'b', '2021-10-31 02:19:40', 0, 1, 5),
(8, 'phamthokd19@gmail.com', '$2y$10$0wB9tc7IztkIrz3I53Z7b.BsF59XgfZMbEWHqhARp8ppJS3aQyt26', '2021-11-03 00:38:47', 0, 1, 0),
(12, 'phamthokd@gmail.com', '$2y$10$JonCK1JxQocCjXGsHP/RjuqIY2g.FBWCTq7rTXX3fBrd5H99q6MFu', '2021-11-04 00:43:27', 1, 1, 127),
(13, 'thold6789@gmail.com', '$2y$10$FNO1QEQvx5.LLUbaDsk2ZexFQZfzXFcIXfw.eywXGW4gunGwJGzw2', '2021-11-04 00:45:21', 0, 1, 0),
(14, 'sinh16420011@gmail.com', '$2y$10$A.wovXdkmr.3SRHCrMkx5.bG5liKPtOt6.Yu6epTh9nqW6a/D0c6u', '2021-11-04 21:06:16', 0, 1, 0);

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
  MODIFY `group_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `infor_users`
--
ALTER TABLE `infor_users`
  MODIFY `infor_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`infor_id`) REFERENCES `infor_users` (`infor_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
