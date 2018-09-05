-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 29, 2018 lúc 08:12 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tgpizza`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banh`
--

CREATE TABLE `banh` (
  `b_id` int(11) NOT NULL,
  `b_ten` varchar(100) NOT NULL,
  `b_mota` text,
  `b_anh` text NOT NULL,
  `b_bst` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `banh`
--

INSERT INTO `banh` (`b_id`, `b_ten`, `b_mota`, `b_anh`, `b_bst`, `created_at`, `updated_at`) VALUES
(17, 'Phô mai 2 lớp', '<p><span style=\"color:#ff8c00\"><strong>Ph&ocirc; mai 2 lớp c&oacute; chứa nhiều ph&ocirc; mai thơm ngon b&eacute;o ngậy</strong></span></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535441982.jpg', NULL, '2018-08-28 07:37:53', '2018-08-28 07:39:42'),
(18, 'Lạp xưởng - xúc xích', '<p><span style=\"color:#ff8c00\"><strong>B&aacute;nh c&oacute; chứa nhiều lạp xưởng v&agrave; ph&ocirc; mai</strong></span></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535442113.jpg', NULL, '2018-08-28 07:41:53', '2018-08-28 07:41:53'),
(19, 'Gà Cua', '<p><strong><span style=\"color:#ff8c00\">B&aacute;nh được l&agrave;m từ thịt g&agrave; thơm ngon v&agrave; cua biển tương xay</span></strong></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535442289.jpg', NULL, '2018-08-28 07:44:49', '2018-08-28 07:44:49'),
(20, 'Xúc xích nướng (đặc biệt)', '<p><strong><span style=\"color:#ff8c00\">X&uacute;c x&iacute;ch nướng đặc biệt được phủ đầy x&uacute;c x&iacute;ch chi&ecirc;n gi&ograve;n thơm ngon</span></strong></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535442382.jpg', NULL, '2018-08-28 07:46:22', '2018-08-28 07:46:22'),
(21, 'Hải sản (tôm, cua, mực)', '<p><strong><span style=\"color:#ff8c00\">Hải sản được l&agrave;m từ nhiều nguy&ecirc;n liệu như t&ocirc;m, cua, mực c&aacute;c loại hải sản tươi ngon</span></strong></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535442542.jpg', NULL, '2018-08-28 07:49:02', '2018-08-28 07:49:02'),
(22, 'Xúc xích trà bông', '<p><strong><span style=\"color:#ff8c00\">B&aacute;nh được phủ x&uacute;c x&iacute;ch kết hợp tr&agrave; b&ocirc;ng thơm ngon m&ugrave;i vị tươi mới</span></strong></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535442621.jpg', NULL, '2018-08-28 07:50:21', '2018-08-28 07:50:21'),
(23, 'Xúc xích - thịt - cua', '<p><strong><span style=\"color:#ff8c00\">B&aacute;nh được l&agrave;m từ x&uacute;c x&iacute;ch - thịt lợn v&agrave; cua m&ugrave;i vị quen thuộc v&agrave; s&aacute;ng tạo giữa hải sản v&agrave; c&aacute;c nguy&ecirc;n liệu quen thuộc với người Việt Nam</span></strong></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535442776.jpg', NULL, '2018-08-28 07:52:56', '2018-08-28 07:54:08'),
(24, 'Pizza thịt bò', '<p><strong><span style=\"color:#ff8c00\">B&aacute;nh được l&agrave;m từ c&aacute;c loại thịt b&ograve; tuyển chọn, thơm ngon, tương ngọt</span></strong></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535442986.jpg', NULL, '2018-08-28 07:56:26', '2018-08-28 07:56:26'),
(25, 'Cá ngừ - Tôm - Cua', '<p><strong><span style=\"color:#ff8c00\">B&aacute;nh được l&agrave;m từ nguy&ecirc;n liệu c&aacute; ngừ đại dương, c&aacute;c loại t&ocirc;m, cua biển thơm ngon kết hợp lại mang m&ugrave;i vị c&aacute;c thực phẩm từ đại dương</span></strong></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535443136.jpg', NULL, '2018-08-28 07:58:56', '2018-08-28 07:58:56'),
(26, 'Xúc xích - thịt xong khói', '<p><strong><span style=\"color:#ff8c00\">B&aacute;nh được l&agrave;m từ x&uacute;c x&iacute;ch thơm ngon, thịt x&ocirc;ng kh&oacute;i đặc biệt, m&ugrave;i vị h&ograve;a quyện trong từ mẫu b&aacute;nh</span></strong></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535443356.png', NULL, '2018-08-28 08:02:36', '2018-08-28 08:02:36'),
(27, 'Rau củ', '<p><strong><span style=\"color:#ff8c00\">B&aacute;nh được l&agrave;m từ h&agrave;nh t&acirc;y, ớt chu&ocirc;ng, thơm, bắp đảm bảo thơm ngon v&agrave; th&iacute;ch hợp cho người ăn ki&ecirc;n hoặc giảm c&acirc;n</span></strong></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535443446.jpg', NULL, '2018-08-28 08:04:06', '2018-08-28 08:04:19'),
(28, 'Tôm - Thịt - Cua', '<p><strong><span style=\"color:#ff8c00\">B&aacute;nh được l&agrave;m từ thịt, t&ocirc;m v&agrave; cua tươi ngon&nbsp;</span></strong></p>', 'http://localhost/thegioipizza/pizzaCode/public/upload/1535443529.jpg', NULL, '2018-08-28 08:05:29', '2018-08-28 08:05:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chinhanh`
--

CREATE TABLE `chinhanh` (
  `id_chinhanh` int(11) NOT NULL,
  `ten_chinhanh` varchar(100) NOT NULL COMMENT 'tên của chi nhánh',
  `diachi_chinhanh` text NOT NULL COMMENT 'địa chỉ chi nhánh',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chinhanh`
--

INSERT INTO `chinhanh` (`id_chinhanh`, `ten_chinhanh`, `diachi_chinhanh`, `created_by`, `created_at`, `updated_at`) VALUES
(109, 'Chi nhánh 1', 'Cần Thơ', 1, '2018-08-28 07:05:12', '2018-08-28 07:05:12'),
(110, 'Chi nhánh 2', 'Sóc Trăng', 1, '2018-08-28 07:07:23', '2018-08-28 07:07:23'),
(111, 'Chi nhánh 3', 'Hậu Giang', 1, '2018-08-28 07:11:18', '2018-08-28 07:11:18'),
(119, 'Chi nhánh Trà Vinh', 'Thành phố Trà Vinh', 1, '2018-08-28 12:24:13', '2018-08-28 12:24:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL COMMENT 'lấy id từ bảng users làm khóa chính',
  `customer_birthday` text,
  `customer_cmnd` text,
  `customer_cmnd_ngaycap` text,
  `customer_gender` int(1) DEFAULT NULL COMMENT '0: nữ , 1: nam',
  `customer_address` text COMMENT 'địa chỉ khách hàng',
  `customer_image` text COMMENT 'ảnh đại diện',
  `id_employee` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`user_id`, `customer_birthday`, `customer_cmnd`, `customer_cmnd_ngaycap`, `customer_gender`, `customer_address`, `customer_image`, `id_employee`, `created_at`, `updated_at`) VALUES
(92, '28/08/2018', '00000000', '28/08/2018', 0, 'Ninh Kieu, 3/2', '92.jpg', 0, '2018-08-28 06:37:50', '2018-08-28 11:10:25'),
(93, '', '', '', 0, '', '', 0, '2018-08-28 06:41:17', '2018-08-28 06:41:17'),
(94, '', '', '', 0, '', '', 0, '2018-08-28 06:41:32', '2018-08-28 06:41:32'),
(95, '', '', '', 0, '', '', 0, '2018-08-28 06:42:15', '2018-08-28 06:42:15'),
(96, '', '', '', 0, '', '', 0, '2018-08-28 06:42:43', '2018-08-28 06:42:43'),
(97, '', '', '', 0, '', '', 0, '2018-08-28 06:43:36', '2018-08-28 06:43:36'),
(98, '', '', '', 0, '', '', 0, '2018-08-28 06:44:04', '2018-08-28 06:44:04'),
(99, '', '', '', 0, '', '', 0, '2018-08-28 06:44:29', '2018-08-28 06:44:29'),
(100, '', '', '', 0, '', '', 0, '2018-08-28 06:44:52', '2018-08-28 06:44:52'),
(101, '', '', '', 0, '', '', 0, '2018-08-28 06:45:24', '2018-08-28 06:45:24'),
(102, '', '', '', 0, '', '', 0, '2018-08-28 06:45:39', '2018-08-28 06:45:39'),
(103, '', '', '', 0, '', '', 0, '2018-08-28 06:46:11', '2018-08-28 06:46:11'),
(104, '', '', '', 0, '', '', 0, '2018-08-28 06:48:20', '2018-08-28 06:48:20'),
(105, '', '', '', 0, '', '', 0, '2018-08-28 06:48:47', '2018-08-28 06:48:47'),
(106, '', '', '', 0, '', '', 0, '2018-08-28 06:49:15', '2018-08-28 06:49:15'),
(107, '', '', '', 0, '', '', 0, '2018-08-28 06:50:09', '2018-08-28 06:50:09'),
(108, '', '', '', 0, '', '', 0, '2018-08-28 06:50:45', '2018-08-28 06:50:45'),
(118, '28/08/2018', '00000000', '28/08/2018', 1, 'Cần Thơ', '118.jpg', 0, '2018-08-28 12:18:00', '2018-08-28 12:20:50'),
(120, '', '', '', 0, '', '', 0, '2018-08-28 12:38:20', '2018-08-28 12:38:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gia`
--

CREATE TABLE `gia` (
  `g_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `g_tien` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `gia`
--

INSERT INTO `gia` (`g_id`, `b_id`, `l_id`, `g_tien`, `created_at`, `updated_at`) VALUES
(49, 17, 7, '30000', '2018-08-28 08:06:56', '2018-08-28 08:06:56'),
(50, 17, 8, '60000', '2018-08-28 08:07:08', '2018-08-28 08:07:08'),
(51, 17, 9, '90000', '2018-08-28 08:07:17', '2018-08-28 08:07:17'),
(52, 18, 7, '30000', '2018-08-28 08:07:26', '2018-08-28 08:07:26'),
(53, 18, 8, '60000', '2018-08-28 08:07:39', '2018-08-28 08:07:39'),
(54, 18, 9, '90000', '2018-08-28 08:07:48', '2018-08-28 08:07:48'),
(55, 19, 7, '30000', '2018-08-28 08:07:58', '2018-08-28 08:07:58'),
(56, 19, 8, '60000', '2018-08-28 08:08:05', '2018-08-28 08:08:05'),
(57, 19, 9, '90000', '2018-08-28 08:08:12', '2018-08-28 08:08:12'),
(58, 20, 7, '30000', '2018-08-28 08:08:21', '2018-08-28 08:08:21'),
(59, 20, 8, '60000', '2018-08-28 08:08:28', '2018-08-28 08:08:28'),
(61, 20, 9, '90000', '2018-08-28 08:09:13', '2018-08-28 08:09:13'),
(62, 21, 7, '30000', '2018-08-28 08:09:41', '2018-08-28 08:09:41'),
(63, 21, 8, '60000', '2018-08-28 08:09:50', '2018-08-28 08:09:50'),
(64, 21, 9, '90000', '2018-08-28 08:09:59', '2018-08-28 08:09:59'),
(65, 22, 7, '30000', '2018-08-28 08:10:11', '2018-08-28 08:10:11'),
(66, 22, 8, '60000', '2018-08-28 08:10:19', '2018-08-28 08:10:19'),
(67, 22, 9, '90000', '2018-08-28 08:10:27', '2018-08-28 08:10:27'),
(68, 23, 7, '30000', '2018-08-28 08:10:35', '2018-08-28 08:10:35'),
(69, 23, 8, '60000', '2018-08-28 08:10:43', '2018-08-28 08:10:43'),
(70, 23, 9, '90000', '2018-08-28 08:10:51', '2018-08-28 08:10:51'),
(71, 24, 7, '30000', '2018-08-28 08:11:02', '2018-08-28 08:11:02'),
(72, 24, 8, '60000', '2018-08-28 08:11:09', '2018-08-28 08:11:09'),
(73, 24, 9, '90000', '2018-08-28 08:11:17', '2018-08-28 08:11:17'),
(74, 25, 7, '30000', '2018-08-28 08:11:28', '2018-08-28 08:11:28'),
(75, 25, 8, '60000', '2018-08-28 08:11:37', '2018-08-28 08:11:37'),
(76, 25, 9, '90000', '2018-08-28 08:11:45', '2018-08-28 08:11:45'),
(77, 26, 7, '30000', '2018-08-28 08:11:53', '2018-08-28 08:11:53'),
(78, 26, 8, '60000', '2018-08-28 08:12:00', '2018-08-28 08:12:00'),
(79, 26, 9, '90000', '2018-08-28 08:12:11', '2018-08-28 08:12:11'),
(80, 27, 7, '30000', '2018-08-28 08:12:22', '2018-08-28 08:12:22'),
(81, 27, 8, '60000', '2018-08-28 08:12:29', '2018-08-28 08:12:29'),
(82, 27, 9, '90000', '2018-08-28 08:12:38', '2018-08-28 08:12:38'),
(83, 28, 7, '30000', '2018-08-28 08:12:48', '2018-08-28 08:12:48'),
(84, 28, 8, '60000', '2018-08-28 08:13:16', '2018-08-28 08:13:16'),
(85, 28, 9, '90000', '2018-08-28 08:13:26', '2018-08-28 08:13:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `hd_id` int(11) NOT NULL,
  `id_nhan_vien_lap_hh` int(11) DEFAULT NULL COMMENT 'lấy từ bảng users ra nhân viên lập hóa đơn',
  `id_khachhang` int(11) NOT NULL COMMENT 'lấy id từ bảng users ra khách hàng đã mua',
  `tong_tien_hoa_don` int(11) NOT NULL COMMENT 'tổng số tiền của hóa đơn',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0: chưa duyệt là ở frontend ,1 đã duyệt khi ở backend, -1 còn trong giỏ hàng chưa xác nhận đặt',
  `id_phan_cap` int(11) NOT NULL COMMENT 'biết đang chia ở cấp mấy',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`hd_id`, `id_nhan_vien_lap_hh`, `id_khachhang`, `tong_tien_hoa_don`, `status`, `id_phan_cap`, `created_at`, `updated_at`) VALUES
(99, 2, 95, 180000, 1, 4, '2018-08-28 08:44:59', '2018-08-28 08:46:36'),
(100, 2, 95, 30000, -1, 4, '2018-08-28 08:46:46', '2018-08-28 08:46:46'),
(101, 2, 92, 180000, 1, 4, '2018-08-28 08:48:05', '2018-08-28 08:48:21'),
(102, 2, 98, 180000, 1, 4, '2018-08-28 08:52:07', '2018-08-28 08:52:23'),
(103, 2, 101, 180000, 1, 4, '2018-08-28 09:06:05', '2018-08-28 09:06:19'),
(104, 2, 104, 240000, 1, 4, '2018-08-28 09:06:48', '2018-08-28 09:07:56'),
(105, 2, 105, 330000, 1, 4, '2018-08-28 09:07:20', '2018-08-28 09:07:51'),
(106, 2, 107, 120000, 1, 4, '2018-08-28 09:08:25', '2018-08-28 09:09:19'),
(107, 2, 108, 180000, 1, 4, '2018-08-28 09:08:43', '2018-08-28 09:09:15'),
(108, 2, 107, 90000, 1, 4, '2018-08-28 11:29:17', '2018-08-28 11:32:26'),
(109, 2, 93, 60000, 1, 4, '2018-08-28 11:50:50', '2018-08-28 11:52:42'),
(110, 1, 92, 30000, 1, 4, '2018-08-28 11:52:08', '2018-08-28 11:59:14'),
(111, 1, 118, 210000, 1, 4, '2018-08-28 12:19:02', '2018-08-28 12:19:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `hdct_id` int(11) NOT NULL,
  `hd_id` int(11) NOT NULL COMMENT 'lấy từ bảng hoadon',
  `g_id` int(11) NOT NULL COMMENT 'lấy từ bảng giá ; giá từng loại bánh',
  `so_luong_mua` int(11) NOT NULL COMMENT 'số lượng khách hàng mua',
  `b_id` int(11) NOT NULL COMMENT 'lấy từ bảng banh : ra tên bánh',
  `l_id` int(11) NOT NULL COMMENT 'lấy ra tên loại bánh',
  `g_tien` text NOT NULL COMMENT 'giá tiền của bánh',
  `thanh_tien` text NOT NULL COMMENT 'tiền của từng bánh , lấy số lượng nhân với giá tiền',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`hdct_id`, `hd_id`, `g_id`, `so_luong_mua`, `b_id`, `l_id`, `g_tien`, `thanh_tien`, `created_at`, `updated_at`) VALUES
(224, 99, 49, 1, 17, 7, '30000', '30000', '2018-08-28 08:44:59', '2018-08-28 08:44:59'),
(225, 99, 50, 1, 17, 8, '60000', '60000', '2018-08-28 08:44:59', '2018-08-28 08:44:59'),
(226, 99, 54, 1, 18, 9, '90000', '90000', '2018-08-28 08:45:06', '2018-08-28 08:45:06'),
(227, 100, 55, 1, 19, 7, '30000', '30000', '2018-08-28 08:46:47', '2018-08-28 08:46:47'),
(228, 100, 73, 1, 24, 9, '90000', '90000', '2018-08-28 08:46:54', '2018-08-28 08:46:54'),
(229, 101, 62, 1, 21, 7, '30000', '30000', '2018-08-28 08:48:05', '2018-08-28 08:48:05'),
(230, 101, 63, 1, 21, 8, '60000', '60000', '2018-08-28 08:48:05', '2018-08-28 08:48:05'),
(231, 101, 79, 1, 26, 9, '90000', '90000', '2018-08-28 08:48:11', '2018-08-28 08:48:11'),
(232, 102, 74, 1, 25, 7, '30000', '30000', '2018-08-28 08:52:07', '2018-08-28 08:52:07'),
(233, 102, 75, 1, 25, 8, '60000', '60000', '2018-08-28 08:52:07', '2018-08-28 08:52:07'),
(234, 102, 79, 1, 26, 9, '90000', '90000', '2018-08-28 08:52:13', '2018-08-28 08:52:13'),
(235, 103, 49, 1, 17, 7, '30000', '30000', '2018-08-28 09:06:05', '2018-08-28 09:06:05'),
(236, 103, 50, 1, 17, 8, '60000', '60000', '2018-08-28 09:06:05', '2018-08-28 09:06:05'),
(237, 103, 51, 1, 17, 9, '90000', '90000', '2018-08-28 09:06:05', '2018-08-28 09:06:05'),
(238, 104, 49, 1, 17, 7, '30000', '30000', '2018-08-28 09:06:48', '2018-08-28 09:06:48'),
(239, 104, 50, 1, 17, 8, '60000', '60000', '2018-08-28 09:06:48', '2018-08-28 09:06:48'),
(240, 104, 78, 1, 26, 8, '60000', '60000', '2018-08-28 09:06:55', '2018-08-28 09:06:55'),
(241, 104, 79, 1, 26, 9, '90000', '90000', '2018-08-28 09:06:55', '2018-08-28 09:06:55'),
(242, 105, 65, 1, 22, 7, '30000', '30000', '2018-08-28 09:07:21', '2018-08-28 09:07:21'),
(243, 105, 66, 1, 22, 8, '60000', '60000', '2018-08-28 09:07:21', '2018-08-28 09:07:21'),
(244, 105, 67, 1, 22, 9, '90000', '90000', '2018-08-28 09:07:21', '2018-08-28 09:07:21'),
(245, 105, 68, 1, 23, 7, '30000', '30000', '2018-08-28 09:07:28', '2018-08-28 09:07:28'),
(246, 105, 69, 2, 23, 8, '60000', '120000', '2018-08-28 09:07:28', '2018-08-28 09:07:36'),
(247, 106, 62, 1, 21, 7, '30000', '30000', '2018-08-28 09:08:25', '2018-08-28 09:08:25'),
(248, 106, 64, 1, 21, 9, '90000', '90000', '2018-08-28 09:08:26', '2018-08-28 09:08:26'),
(249, 107, 74, 1, 25, 7, '30000', '30000', '2018-08-28 09:08:43', '2018-08-28 09:08:43'),
(250, 107, 76, 1, 25, 9, '90000', '90000', '2018-08-28 09:08:44', '2018-08-28 09:08:44'),
(251, 107, 84, 1, 28, 8, '60000', '60000', '2018-08-28 09:08:49', '2018-08-28 09:08:49'),
(252, 108, 49, 1, 17, 7, '30000', '30000', '2018-08-28 11:29:17', '2018-08-28 11:29:17'),
(253, 108, 50, 1, 17, 8, '60000', '60000', '2018-08-28 11:29:17', '2018-08-28 11:29:17'),
(254, 109, 49, 2, 17, 7, '30000', '60000', '2018-08-28 11:50:50', '2018-08-28 11:50:50'),
(255, 110, 74, 1, 25, 7, '30000', '30000', '2018-08-28 11:52:08', '2018-08-28 11:52:08'),
(256, 111, 62, 1, 21, 7, '30000', '30000', '2018-08-28 12:19:02', '2018-08-28 12:19:02'),
(257, 111, 64, 2, 21, 9, '90000', '180000', '2018-08-28 12:19:02', '2018-08-28 12:19:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoahong`
--

CREATE TABLE `hoahong` (
  `hh_id` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL COMMENT 'lấy id từ bảng users',
  `id_cha` int(11) NOT NULL DEFAULT '0' COMMENT 'lấy id từ bảng users nếu ko có là làm gốc, 0 ; là gốc',
  `tien_hoa_hong` int(11) NOT NULL DEFAULT '0' COMMENT 'xử lý HD',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0: đã lãnh, 1: chưa lãnh',
  `danh_dau` int(1) NOT NULL DEFAULT '0' COMMENT '0: là chưa ăn bánh, 1: là ăn rồi',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoahong`
--

INSERT INTO `hoahong` (`hh_id`, `id_khachhang`, `id_cha`, `tien_hoa_hong`, `status`, `danh_dau`, `created_at`, `updated_at`) VALUES
(47, 92, 0, 6000, 0, 1, '2018-08-28 06:37:50', '2018-08-28 11:59:14'),
(48, 93, 0, 30000, 0, 1, '2018-08-28 06:41:17', '2018-08-28 11:52:42'),
(49, 94, 0, 18000, 0, 1, '2018-08-28 06:41:32', '2018-08-28 09:06:19'),
(50, 95, 92, 0, 0, 1, '2018-08-28 06:42:15', '2018-08-28 11:39:22'),
(51, 96, 92, 0, 0, 0, '2018-08-28 06:42:43', '2018-08-28 06:42:43'),
(52, 97, 92, 0, 0, 0, '2018-08-28 06:43:36', '2018-08-28 06:43:36'),
(53, 98, 93, 18000, 0, 1, '2018-08-28 06:44:04', '2018-08-28 08:52:23'),
(54, 99, 93, 0, 0, 0, '2018-08-28 06:44:29', '2018-08-28 06:44:29'),
(55, 100, 93, 0, 0, 0, '2018-08-28 06:44:53', '2018-08-28 06:44:53'),
(56, 101, 94, 18000, 0, 1, '2018-08-28 06:45:24', '2018-08-28 09:06:19'),
(57, 102, 94, 0, 0, 0, '2018-08-28 06:45:39', '2018-08-28 06:45:39'),
(58, 103, 94, 0, 0, 0, '2018-08-28 06:46:11', '2018-08-28 06:46:11'),
(59, 104, 95, 48100, 0, 1, '2018-08-28 06:48:20', '2018-08-28 11:32:26'),
(60, 105, 104, 32100, 0, 1, '2018-08-28 06:48:47', '2018-08-28 11:32:26'),
(61, 106, 105, 15600, 0, 1, '2018-08-28 06:49:15', '2018-08-28 11:32:26'),
(62, 107, 106, 15600, 0, 1, '2018-08-28 06:50:09', '2018-08-28 11:32:26'),
(63, 108, 107, 7200, 0, 1, '2018-08-28 06:50:45', '2018-08-28 09:09:16'),
(64, 118, 0, 0, 0, 1, '2018-08-28 12:18:00', '2018-08-28 12:22:19'),
(65, 120, 92, 0, 0, 0, '2018-08-28 12:38:20', '2018-08-28 12:38:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaibanh`
--

CREATE TABLE `loaibanh` (
  `l_id` int(11) NOT NULL,
  `l_ten` varchar(100) NOT NULL,
  `l_kichthuoc` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaibanh`
--

INSERT INTO `loaibanh` (`l_id`, `l_ten`, `l_kichthuoc`, `created_at`, `updated_at`) VALUES
(7, 'Loại nhỏ', '16cm', '2018-08-28 07:27:01', '2018-08-28 07:27:01'),
(8, 'Loại vừa', '19cm', '2018-08-28 07:35:41', '2018-08-28 07:35:41'),
(9, 'Loại lớn', '26cm', '2018-08-28 07:35:51', '2018-08-28 07:35:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loghoahong`
--

CREATE TABLE `loghoahong` (
  `id` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL COMMENT 'lấy từ id từ bảng users',
  `so_tien_da_tra` int(11) NOT NULL DEFAULT '0' COMMENT 'số tiền chi nhánh đã trả cho khách hàng',
  `ngay_tra` text NOT NULL COMMENT 'ngày đã trả tiền',
  `id_chinhanh` int(11) NOT NULL COMMENT 'biết chi nhánh nào trả',
  `id_nhan_vien_tra` int(11) NOT NULL COMMENT 'biết người náo ở chi nhánh đó trả',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loghoahong`
--

INSERT INTO `loghoahong` (`id`, `id_khachhang`, `so_tien_da_tra`, `ngay_tra`, `id_chinhanh`, `id_nhan_vien_tra`, `created_at`, `updated_at`) VALUES
(14, 92, 86500, 'Nhân viên cn1 nhan vien 1 của cửa hàng Chi nhánh 1. Vào lúc 28-08-2018 18:24:46', 109, 112, '2018-08-28 11:24:46', '2018-08-28 11:24:46'),
(15, 95, 58900, 'Nhân viên cn1 nhan vien 1 của cửa hàng Chi nhánh 1. Vào lúc 28-08-2018 18:39:22', 109, 112, '2018-08-28 11:39:22', '2018-08-28 11:39:22'),
(16, 118, 42000, 'Nhân viên cn1 nhan vien 1 của cửa hàng Chi nhánh 1. Vào lúc 28-08-2018 19:22:19', 109, 112, '2018-08-28 12:22:19', '2018-08-28 12:22:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_tien_banh_chi_nhanh`
--

CREATE TABLE `log_tien_banh_chi_nhanh` (
  `id` int(11) NOT NULL,
  `id_chinhanh` int(11) NOT NULL,
  `sotien` text NOT NULL,
  `ngay_tra` text NOT NULL COMMENT 'ngày trả tiền cho chi nhánh',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_tien_chi_ho`
--

CREATE TABLE `log_tien_chi_ho` (
  `id` int(11) NOT NULL,
  `id_chinhanh` int(11) NOT NULL,
  `sotien` text NOT NULL,
  `ngay_tra` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `log_tien_chi_ho`
--

INSERT INTO `log_tien_chi_ho` (`id`, `id_chinhanh`, `sotien`, `ngay_tra`, `created_at`, `updated_at`) VALUES
(2, 111, '0', '28/08/2018 - 18:23:49', '2018-08-28 11:23:49', '2018-08-28 11:23:49'),
(3, 109, '86500', '28/08/2018 - 18:25:40', '2018-08-28 11:25:40', '2018-08-28 11:25:40'),
(4, 109, '58900', '28/08/2018 - 18:40:27', '2018-08-28 11:40:27', '2018-08-28 11:40:27'),
(5, 109, '42000', '28/08/2018 - 19:22:47', '2018-08-28 12:22:47', '2018-08-28 12:22:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancap`
--

CREATE TABLE `phancap` (
  `pc_id` int(11) NOT NULL,
  `pc_ten` text NOT NULL,
  `pc_socap` int(2) NOT NULL,
  `status` int(11) NOT NULL,
  `pc_tile` text NOT NULL COMMENT 'tỉ lệ để chia hoa hồng',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phancap`
--

INSERT INTO `phancap` (`pc_id`, `pc_ten`, `pc_socap`, `status`, `pc_tile`, `created_at`, `updated_at`) VALUES
(3, 'Phân Cấp 4', 4, 0, '25', '2018-08-28 07:02:11', '2018-08-28 07:04:09'),
(4, 'Phân Cấp 5', 5, 1, '20', '2018-08-28 07:02:41', '2018-08-28 07:04:09'),
(5, 'Phân cấp 6', 6, 0, '16', '2018-08-28 07:04:00', '2018-08-28 07:04:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tien_banh_chi_nhanh`
--

CREATE TABLE `tien_banh_chi_nhanh` (
  `id` int(11) NOT NULL,
  `id_chinhanh` int(11) NOT NULL,
  `id_loaibanh` int(11) NOT NULL COMMENT 'loai bánh',
  `id_banh` int(11) NOT NULL,
  `id_gia` int(11) NOT NULL,
  `sl_mua` text NOT NULL COMMENT 'số lượng bánh chi nhánh mua',
  `sotien` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '0: chưa trả : 1: trả rồi',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tien_chi_nhanh_tra_cho_khach`
--

CREATE TABLE `tien_chi_nhanh_tra_cho_khach` (
  `id` int(11) NOT NULL,
  `id_chinhanh` int(11) NOT NULL COMMENT 'biết chi nhánh nào đã thanh toán',
  `sotien` text NOT NULL COMMENT 'số tiền của chi nhánh đó trả',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tien_chi_nhanh_tra_cho_khach`
--

INSERT INTO `tien_chi_nhanh_tra_cho_khach` (`id`, `id_chinhanh`, `sotien`, `created_at`, `updated_at`) VALUES
(17, 109, '0', '2018-08-28 07:05:12', '2018-08-28 12:22:47'),
(18, 110, '0', '2018-08-28 07:07:24', '2018-08-28 07:07:24'),
(19, 111, '0', '2018-08-28 07:11:18', '2018-08-28 11:23:50'),
(20, 119, '0', '2018-08-28 12:24:13', '2018-08-28 12:24:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tongtienhoahong`
--

CREATE TABLE `tongtienhoahong` (
  `id_khachhang` int(11) NOT NULL COMMENT 'lấy id từ bảng users làm khóa chính',
  `tien_da_lanh` int(11) NOT NULL DEFAULT '0' COMMENT 'tổng số tiền khách hàng đã lãnh',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tongtienhoahong`
--

INSERT INTO `tongtienhoahong` (`id_khachhang`, `tien_da_lanh`, `created_at`, `updated_at`) VALUES
(92, 42000, '2018-08-28 08:41:41', '2018-08-28 11:59:14'),
(93, 12000, '2018-08-28 08:41:41', '2018-08-28 11:52:42'),
(94, 0, '2018-08-28 08:41:51', '2018-08-28 08:41:51'),
(95, 18000, '2018-08-28 08:41:51', '2018-08-28 08:46:36'),
(96, 0, '2018-08-28 08:42:00', '2018-08-28 08:42:00'),
(97, 0, '2018-08-28 08:42:00', '2018-08-28 08:42:00'),
(98, 18000, '2018-08-28 08:42:06', '2018-08-28 08:52:23'),
(99, 0, '2018-08-28 08:42:06', '2018-08-28 08:42:06'),
(100, 0, '2018-08-28 08:42:13', '2018-08-28 08:42:13'),
(101, 18000, '2018-08-28 08:42:13', '2018-08-28 09:06:19'),
(102, 0, '2018-08-28 08:42:20', '2018-08-28 08:42:20'),
(103, 0, '2018-08-28 08:42:20', '2018-08-28 08:42:20'),
(104, 16000, '2018-08-28 08:42:27', '2018-08-28 09:07:56'),
(105, 16500, '2018-08-28 08:42:27', '2018-08-28 09:07:51'),
(106, 0, '2018-08-28 08:42:40', '2018-08-28 08:42:40'),
(107, 8400, '2018-08-28 08:42:40', '2018-08-28 11:32:26'),
(108, 7200, '2018-08-28 08:42:44', '2018-08-28 09:09:16'),
(118, 42000, '2018-08-28 12:18:00', '2018-08-28 12:19:08'),
(120, 0, '2018-08-28 12:38:20', '2018-08-28 12:38:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userprofile`
--

CREATE TABLE `userprofile` (
  `user_id` int(11) NOT NULL COMMENT 'lấy id từ bảng users làm khóa chính',
  `user_cmnd` text COMMENT 'cmnd của nhân viên',
  `user_ngaycap_cmnd` text COMMENT 'ngày cấp cmnd',
  `user_gender` int(1) DEFAULT NULL COMMENT '0 : nữ, 1: nam',
  `user_address` text COMMENT 'địa chỉ nhân viên',
  `user_image` text COMMENT 'ảnh đại diện',
  `id_chinhanh` int(11) NOT NULL COMMENT 'lưu id chi nhánh , biết nv ở chi nhánh nào',
  `user_at` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `userprofile`
--

INSERT INTO `userprofile` (`user_id`, `user_cmnd`, `user_ngaycap_cmnd`, `user_gender`, `user_address`, `user_image`, `id_chinhanh`, `user_at`, `created_at`, `updated_at`) VALUES
(112, '111111101', '2010-08-01', 1, 'Cần Thơ', 'http://localhost/thegioipizza/pizzaCode/public/upload/tải xuống (1).jpg', 109, 1, '2018-08-28 07:14:49', '2018-08-28 07:14:49'),
(113, '111111102', '2010-01-01', 1, 'Cần Thơ', '', 109, 1, '2018-08-28 07:16:24', '2018-08-28 07:16:51'),
(114, '222222201', '2010-01-01', 1, 'Sóc Trăng', 'http://localhost/thegioipizza/pizzaCode/public/upload/tải xuống.jpg', 110, 1, '2018-08-28 07:18:56', '2018-08-28 07:18:56'),
(115, '222222202', '2010-01-01', 0, 'Sóc Trăng', 'http://localhost/thegioipizza/pizzaCode/public/upload/tải xuống (2).jpg', 110, 1, '2018-08-28 07:20:51', '2018-08-28 07:20:51'),
(116, '333333301', '2010-01-01', 1, 'Hậu Giang', 'http://localhost/thegioipizza/pizzaCode/public/upload/avatar-4.jpg', 111, 1, '2018-08-28 07:24:29', '2018-08-28 07:24:29'),
(117, '333333302', '2010-01-01', 1, 'Hậu Giang', 'http://localhost/thegioipizza/pizzaCode/public/upload/Face-of-handsome-young-man-in-black-shirt.jpg', 111, 1, '2018-08-28 07:25:47', '2018-08-28 07:25:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '0: admin, 1: nhân viên, 2: khách hàng, 3 : chi nhánh',
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1' COMMENT '0:là khóa , 1: là không khóa',
  `remember_token` varchar(80) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `phone`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Admin', 'admin@admin.com', '1234567890', '$2y$10$plzfXpJY2mgCLxrIxE25dOf1RhR/UpyFo8K2eb5y4AFsoQu/ghMRK', 0, '8xmSNbUFeoVrDfFJEJHrn35kjDyMPZmLZ9BY3XdbcbkRo4noy1yRzYyeJkb1', '2018-07-12 07:36:30', '2018-08-27 14:11:10'),
(92, 2, 'Khách 1', 'khach1@gmail.com', '0123456001', '$2y$10$.cJ2A2RehKbHmH0zAdZRt.EAygOWpxPLZsIvf1l1lT7I/ZSR8/476', 1, 'zDWKxtJal1yp5vRVK0EHSUlg8NupEvy1Zm2L8EfCpzVGoX1t3z1uk3Ol846p', '2018-08-28 06:37:50', '2018-08-28 12:31:00'),
(93, 2, 'Khách 2', '', '0123456002', '$2y$10$eXTuwMAxKQpF0R47Q2L.K.ZVxVaWyCNfhbyqluj3K/6c2jw2QoS7C', 1, '5QmyGKdqMBYsvm5JGIV0IIfzrhzTxpvWkU5q45zrrWtQx3yup2YTsFWTkcZO', '2018-08-28 06:41:17', '2018-08-28 11:57:53'),
(94, 2, 'Khách 3', '', '0123456003', '$2y$10$TbG8V7G5hBKywLqkaz02P.IeHQrPHWXCTgqn6d3SiM5HLutmWZkmu', 1, NULL, '2018-08-28 06:41:31', '2018-08-28 06:41:31'),
(95, 2, 'Khách 4', '', '0123456004', '$2y$10$fslZ0ozTxu9sPeht3KgAL.6m3BJfkeTGr6slnINZWSbjnRES/Vlf6', 1, '69SmXK7MyoUtlPKLeWEi5Z4kalO5sdgko2EdN8niqacIYr3DMRXrgNLbm7AT', '2018-08-28 06:42:15', '2018-08-28 08:47:47'),
(96, 2, 'Khách 5', '', '0123456005', '$2y$10$HKOJKC2YoLdTIl5yr1se6.fd.ALniSQdyxErNcsI9PGqfHAhuiK4.', 1, NULL, '2018-08-28 06:42:43', '2018-08-28 06:42:43'),
(97, 2, 'Khách 6', '', '0123456006', '$2y$10$wGQSaTaenglANkWEciqLZ.fuVMJj5jrOrHjceQ3CiBNUKBQMY3G0q', 1, NULL, '2018-08-28 06:43:36', '2018-08-28 06:43:36'),
(98, 2, 'Khách 7', '', '0123456007', '$2y$10$kEadUlWEqxp.WbHJ0S8/SOvTDt4i58/CFXs.4q8K4drP4YgBpO3MK', 1, 'ZVsXElBkRiU1PGlGMpEr5ENKPTYcr4WjWJ7FJKniSn9skMPSt5UrFlczzIzj', '2018-08-28 06:44:04', '2018-08-28 09:05:36'),
(99, 2, 'Khách 8', '', '0123456001', '$2y$10$IS0tMCdLAHhufTCPTHcpv.XfPk/CPTopDSeaGiPzyM0RExG2ZoDye', 1, NULL, '2018-08-28 06:44:29', '2018-08-28 06:44:29'),
(100, 2, 'Khách 9', '', '0123456009', '$2y$10$mhJUmWPDm8QrFkUNEyTxu.pPd2tx7blH5ATY926mFG26sqDZH2P0y', 1, NULL, '2018-08-28 06:44:52', '2018-08-28 06:44:52'),
(101, 2, 'Khách 10', '', '0123456010', '$2y$10$jecdDXzRHwcRsmWhA7sddeo7SmLqOHHPHJrjzPilUBNbCz0.VEn3i', 1, 'xXYx3Sa1G49dsdIcdx1kjk7aJbmz9J35DZNLjoJEYNp7xIcz8nI2FUjalNVZ', '2018-08-28 06:45:23', '2018-08-28 09:06:36'),
(102, 2, 'Khách 11', '', '0123456011', '$2y$10$Uo.yt/d44Sqm70tdXNFD0eM7B4SClDCOVUI053cl8wTtUmXgA7bjO', 1, NULL, '2018-08-28 06:45:39', '2018-08-28 06:45:39'),
(103, 2, 'Khách 12', '', '0123456012', '$2y$10$.brodWAeoyFW8JbrSYYfPeQP.RfcqDJZAfBuL9ykN5OVAZw9XEdnG', 1, NULL, '2018-08-28 06:46:11', '2018-08-28 06:46:53'),
(104, 2, 'Khách 14', '', '0123456014', '$2y$10$mh8UVedKp7X2DbjhiTxvL.r09YX604/gHp5X10uZ5LBAHu1G3GjMe', 1, 'myxQw4FkN1fQBbgboLDsK546b0rNBHY1jgt4NIRUaJDsRKU1taUaAqzOTXR6', '2018-08-28 06:48:20', '2018-08-28 09:07:08'),
(105, 2, 'Khách 15', '', '0123456015', '$2y$10$R5aJLGWJPFFTf7x/cmbGaeYUgBPtFvHabJSwyZE33JGmdHJ2rC8ze', 1, 'O609FBzRu8p3JnAV0MYiMsyIWKeocVbek8sC2gQwTSqwssa6cpDwoAlAJ37M', '2018-08-28 06:48:46', '2018-08-28 09:08:06'),
(106, 2, 'Khách 16', '', '0123456016', '$2y$10$A94Uniwi5bHAf2g8oZ.A0.5HilG0n6B.pJclbDgcitbD2OKJ0yO/m', 1, NULL, '2018-08-28 06:49:15', '2018-08-28 06:49:15'),
(107, 2, 'Khách 17', '', '0123456017', '$2y$10$alDz/32pGzKSUC6UAeEXueK5ytsEDP4CZx4gW6lzwr7Y0Dr/Mw/Ha', 1, '5de8bM4B7J5Dn6F9euBrWXyzy0b64ir1mQXZEUTL8RD1BtI8rUPWMO5FMD7o', '2018-08-28 06:50:08', '2018-08-28 11:38:38'),
(108, 2, 'Khách 18', '', '0123456018', '$2y$10$jQ3h0ZLDq17/krt9QTF8iu9lLadVrDdhKQNqsN1tiAg3t3pvaZ8n2', 1, 'dI3tptgshSvH3tkmuaiosldzQVrQ3O3wwkSXffXcZQ9SemCiCTdjoA5amcu0', '2018-08-28 06:50:45', '2018-08-28 09:09:35'),
(109, 3, 'Chủ 1', 'chu1@gmail.com', '0987654001', '$2y$10$UKSCTynisS/CzVJC..j8U.y8CLdbyybzgre1Q8wcXqkJuUiMzmXJ6', 1, '7cm3oWgo9DCB5O3SO1VIe9fftt9YFwj2yKRBo6qwC237NUzUo9KdGkOSriok', '2018-08-28 07:05:11', '2018-08-28 12:36:08'),
(110, 3, 'Chủ 2', 'chu2@gmail.com', '0987654002', '$2y$10$BR9DDcwKO5EZYJWYMEnJjOv9.PWHI1Xc/vG4CzBHsNqBIWKBCIAyW', 1, NULL, '2018-08-28 07:07:23', '2018-08-28 07:07:23'),
(111, 3, 'Chủ 3', 'chu3@gmail.com', '0987654003', '$2y$10$o6yEL/9YARrEA3lwzsWs/.aST..edN0ZmLZVqXH2mCrPciQNvpCIO', 1, NULL, '2018-08-28 07:11:18', '2018-08-28 07:11:39'),
(112, 1, 'cn1 nhan vien 1', 'cn1nv1@gmail.com', '0111111001', '$2y$10$2TOZDzZ9CYaLozWCOA.xVea0N662si/qTLoY0xk74e89uvO/7lv92', 1, 'S0DjDJwntbziTSEF6WM9YMTTXObfbI2wcA4DhFKI277w1HQJgVA7IsnxRAAO', '2018-08-28 07:14:49', '2018-08-28 12:24:44'),
(113, 1, 'cn1 nhan vien 2', 'cn1nv2@gmail.com', '011111002', '$2y$10$GYh3NsiVNdAQTBhHS4QduevoEbHBkl22LmqamXLHBk/4AvyAyHgZ6', 1, NULL, '2018-08-28 07:16:24', '2018-08-28 07:16:24'),
(114, 1, 'cn2 nhan vien 1', 'cn2nv1@gmail.com', '0222222001', '$2y$10$Z6EIkeaVOCybJ99N0l6VlOzK/Wit1tIQRak42Q6rEq1MJoNzocTHC', 1, NULL, '2018-08-28 07:18:56', '2018-08-28 07:18:56'),
(115, 1, 'CN2 nhan vien 2', 'cn2nv2@gmail.com', '022222002', '$2y$10$vhLSbBbj3uKuGIw71kZO/eJCCp72C7GO2kMRIIVxaCzHLf2fSdFQu', 1, NULL, '2018-08-28 07:20:51', '2018-08-28 07:20:51'),
(116, 1, 'cn3 nhan vien 1', 'cn3nv1@gmail.com', '033333001', '$2y$10$Qwu4DMjGl/Ts6VYwlwNslOCiatjmCdg5UskxNup8T5nhSo7wl9sz6', 1, NULL, '2018-08-28 07:24:29', '2018-08-28 07:24:29'),
(117, 1, 'cn3 nhan vien 2', 'cn3nv2@gmail.com', '033333002', '$2y$10$fUD0VeN600AyJpZrekkqAeDRiCalX5VcNLwiZ3Mb/Q1Glf51J27Ta', 1, NULL, '2018-08-28 07:25:47', '2018-08-28 07:25:47'),
(118, 2, 'Khách Luân', 'luan@gmail.com', '0123456000', '$2y$10$0gGhA849VdZIL5Sop4JDde3vEEHLSZ5at8lhYcqjRXlcvS3pp2MVu', 1, '3bf1QckI6Ub24UNjpsKdzUvsY6q9HTAXp06xmZlsiSbZ8rwtmaAPAh7ywh5i', '2018-08-28 12:18:00', '2018-08-28 12:21:24'),
(119, 3, 'Nguyễn Văn Một', 'tonquyen@gmail.com', '1234567899', '$2y$10$0gGhA849VdZIL5Sop4JDde3vEEHLSZ5at8lhYcqjRXlcvS3pp2MVu', 1, NULL, '2018-08-28 12:24:13', '2018-08-28 12:26:44'),
(120, 2, 'Nguyễn Văn A', '', '0123455001', '$2y$10$IWbbgSq/vp8UpHWwTTVHN.7LHOtzp2z0d8y/oMFIkvlh4UfW4qw0O', 1, NULL, '2018-08-28 12:38:20', '2018-08-28 12:38:20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banh`
--
ALTER TABLE `banh`
  ADD PRIMARY KEY (`b_id`);

--
-- Chỉ mục cho bảng `chinhanh`
--
ALTER TABLE `chinhanh`
  ADD PRIMARY KEY (`id_chinhanh`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`g_id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`hd_id`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`hdct_id`);

--
-- Chỉ mục cho bảng `hoahong`
--
ALTER TABLE `hoahong`
  ADD PRIMARY KEY (`hh_id`);

--
-- Chỉ mục cho bảng `loaibanh`
--
ALTER TABLE `loaibanh`
  ADD PRIMARY KEY (`l_id`);

--
-- Chỉ mục cho bảng `loghoahong`
--
ALTER TABLE `loghoahong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `log_tien_banh_chi_nhanh`
--
ALTER TABLE `log_tien_banh_chi_nhanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `log_tien_chi_ho`
--
ALTER TABLE `log_tien_chi_ho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phancap`
--
ALTER TABLE `phancap`
  ADD PRIMARY KEY (`pc_id`);

--
-- Chỉ mục cho bảng `tien_banh_chi_nhanh`
--
ALTER TABLE `tien_banh_chi_nhanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tien_chi_nhanh_tra_cho_khach`
--
ALTER TABLE `tien_chi_nhanh_tra_cho_khach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tongtienhoahong`
--
ALTER TABLE `tongtienhoahong`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banh`
--
ALTER TABLE `banh`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `gia`
--
ALTER TABLE `gia`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `hd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `hdct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT cho bảng `hoahong`
--
ALTER TABLE `hoahong`
  MODIFY `hh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `loaibanh`
--
ALTER TABLE `loaibanh`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `loghoahong`
--
ALTER TABLE `loghoahong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `log_tien_banh_chi_nhanh`
--
ALTER TABLE `log_tien_banh_chi_nhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `log_tien_chi_ho`
--
ALTER TABLE `log_tien_chi_ho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phancap`
--
ALTER TABLE `phancap`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tien_banh_chi_nhanh`
--
ALTER TABLE `tien_banh_chi_nhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tien_chi_nhanh_tra_cho_khach`
--
ALTER TABLE `tien_chi_nhanh_tra_cho_khach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tongtienhoahong`
--
ALTER TABLE `tongtienhoahong`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT COMMENT 'lấy id từ bảng users làm khóa chính', AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
