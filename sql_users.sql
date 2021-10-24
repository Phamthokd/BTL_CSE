-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2021 lúc 07:46 AM
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
-- Cấu trúc bảng cho bảng `infor_users`
--

CREATE TABLE `infor_users` (
  `infor_id` mediumint(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `age` int(10) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `phone_number` int(60) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `infor_users`
--

INSERT INTO `infor_users` (`infor_id`, `first_name`, `last_name`, `age`, `address`, `date`, `phone_number`, `gender`) VALUES
(2, 'phạm', 'thọ', 20, 'VP', '2021-10-19', 397327836, 'Male'),
(3, 'phạm', 'thọ', 20, 'VP', '2021-10-19', 397327836, 'Male'),
(4, 'phạm', 'thọ', 20, 'VP', '2021-02-11', 397327836, 'Male'),
(5, 'phạm', 'thọ', 0, '', '2021-02-11', 397327836, 'Male');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userid` mediumint(6) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_level` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userid`, `email`, `password`, `registration_date`, `user_level`, `status`) VALUES
(36, 'phamtho1@gmail.com', '$2y$10$PSSyzyF593LQNHkkI9e4LObO.3A7WRWjguIlzxiuCgLDTbVHGsM4S', '2021-10-19 17:18:45', 0, 0),
(37, 'phamtho6@gmail.com', '$2y$10$772J2zDKlPo4myCSl3NQGuvEg7TrQLN4sfPOxGUPzkfcWX8UGO4FS', '2021-10-19 21:59:02', 0, 0),
(38, 'phamthokd19@gmail.com', '$2y$10$Tb4J7agQljlEcGdUD.M9R./CTT9vpxvpb6U1CVeuycOhsRw2.eNn2', '2021-10-19 22:59:12', 0, 0),
(39, 'phamtho5@gmail.com', '$2y$10$s2o7o6zPUP0cy0P9rasfcOd4paFom4EgV5Z0BjSK9PQYYjzfwaCV6', '2021-10-19 23:09:57', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `infor_users`
--
ALTER TABLE `infor_users`
  ADD PRIMARY KEY (`infor_id`);

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
-- AUTO_INCREMENT cho bảng `infor_users`
--
ALTER TABLE `infor_users`
  MODIFY `infor_id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
