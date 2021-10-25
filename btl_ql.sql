-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2021 lúc 05:33 PM
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
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `infor_users`
--

INSERT INTO `infor_users` (`infor_id`, `first_name`, `last_name`, `age`, `address`, `date`, `phone_number`, `gender`, `email`) VALUES
(2, 'phạm', 'thọ', 20, 'VP', '2021-10-19', 397327836, 'Male', ''),
(3, 'phạm', 'thọ', 20, 'VP', '2021-10-19', 397327836, 'Male', ''),
(4, 'phạm', 'thọ', 20, 'VP', '2021-02-11', 397327836, 'Male', ''),
(5, 'phạm', 'thọ', 0, '', '2021-02-11', 397327836, 'Male', ''),
(6, '', '', 0, '', '0000-00-00', 0, '', ''),
(7, '', '', 0, '', '0000-00-00', 0, '', ''),
(10, 'phạm', 'thọ', 20, 'VP', '2021-10-25', 397327836, 'Male', ''),
(11, 'phạm', 'thọ', 21, 'VP', '2021-10-25', 397327836, 'Male', ''),
(12, 'phạm', 'thọ', 21, 'VP', '2021-10-25', 397327836, 'Male', ''),
(13, 'phạm', 'thọ', 20, 'VP', '2021-10-06', 0, '', 'email'),
(14, 'phạm', 'thọ', 20, 'VP', '2021-10-14', 397327836, 'Male', 'email'),
(15, '', '', 0, '', '0000-00-00', 0, '', 'email'),
(16, 'phạm', 'Thọ', 22, 'VP', '2021-10-12', 397327836, 'Male', 'phamthokd@gmail.com'),
(17, 'phạm', 'Thọ', 20, 'VP', '2021-10-20', 397327836, 'Male', 'phamthokd19@gmail.com'),
(18, 'phạm', 'Thọ', 20, 'VP', '2021-10-06', 397327836, 'Male', 'phamthokd19@gmail.com'),
(19, 'phạm', 'Thọ', 20, 'VP', '2021-10-06', 397327836, 'Male', 'phamthokd19@gmail.com'),
(20, 'phạm', 'Thọ', 20, 'VP', '2021-10-14', 397327836, 'Male', 'phamthokd19@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userid` mediumint(6) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_level` tinyint(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userid`, `email`, `password`, `registration_date`, `user_level`, `status`) VALUES
(36, 'phamtho1@gmail.com', '$2y$10$PSSyzyF593LQNHkkI9e4LObO.3A7WRWjguIlzxiuCgLDTbVHGsM4S', '2021-10-19 17:18:45', 0, 0),
(37, 'phamtho6@gmail.com', '$2y$10$772J2zDKlPo4myCSl3NQGuvEg7TrQLN4sfPOxGUPzkfcWX8UGO4FS', '2021-10-19 21:59:02', 0, 0),
(39, 'phamtho5@gmail.com', '$2y$10$s2o7o6zPUP0cy0P9rasfcOd4paFom4EgV5Z0BjSK9PQYYjzfwaCV6', '2021-10-19 23:09:57', 0, 0),
(55, 'phamthokd@gmail.com', '$2y$10$e1Sun6/8iJwcIITTYwDF/.2y3p0EU32NX7fjeurb/7QilFyktq0Te', '2021-10-25 21:22:12', 127, 0),
(57, 'phamthokd19@gmail.com', '$2y$10$XXjKGVFEoVh9i1zJplAAF.fwmr2BPTvjB7bDD0kaN/aHDPFMS9MWa', '2021-10-25 22:15:59', 66, 1);

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
  MODIFY `infor_id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
