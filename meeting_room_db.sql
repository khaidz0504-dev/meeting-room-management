-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2026 lúc 12:58 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `meeting_room_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_history`
--

CREATE TABLE `booking_history` (
  `id` int(11) NOT NULL,
  `room_name` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `meeting_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `booking_history`
--

INSERT INTO `booking_history` (`id`, `room_name`, `user_name`, `meeting_date`, `start_time`, `end_time`, `status`) VALUES
(1, 'Meeting Room A', 'Nguyễn Văn An', '2026-07-14', '08:00:00', '10:00:00', 'Hoàn thành'),
(2, 'Meeting Room C', 'Trần Minh Khang', '2026-07-14', '13:00:00', '15:00:00', 'Hoàn thành'),
(3, 'Meeting Room F', 'Lê Quốc Huy', '2026-07-15', '09:00:00', '11:00:00', 'Đã đặt'),
(4, 'Meeting Room J', 'Phạm Thanh Tùng', '2026-07-16', '14:00:00', '16:00:00', 'Đã đặt'),
(5, 'Meeting Room A', 'Nguyễn Văn A', '2026-07-15', '08:00:00', '10:00:00', 'Đã hoàn thành'),
(6, 'Meeting Room B', 'Trần Văn B', '2026-07-16', '09:00:00', '11:00:00', 'Đang họp'),
(7, 'Meeting Room C', 'Lê Văn C', '2026-07-17', '13:00:00', '15:00:00', 'Đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `equipment` varchar(255) DEFAULT NULL,
  `status` enum('Hoạt động','Bảo trì') DEFAULT 'Hoạt động',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `booking_history`
--
ALTER TABLE `booking_history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `booking_history`
--
ALTER TABLE `booking_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
