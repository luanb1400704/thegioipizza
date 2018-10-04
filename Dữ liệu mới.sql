-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2018 lúc 05:26 PM
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
(180, 'Chi Nhánh 1', 'Tỉnh 1', 1, '2018-10-01 16:25:59', '2018-10-01 16:25:59'),
(181, 'Chi Nhánh 2', 'Tỉnh 2', 1, '2018-10-01 16:28:18', '2018-10-01 16:28:18'),
(182, 'Chi Nhánh 3', 'Tỉnh 3', 1, '2018-10-01 16:29:43', '2018-10-01 16:29:43');

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
(137, '', '', '', 0, '', '', 1, '2018-10-01 15:55:44', '2018-10-01 15:55:44'),
(138, '', '', '', 0, '', '', 1, '2018-10-01 15:56:17', '2018-10-01 15:56:17'),
(139, '', '', '', 0, '', '', 1, '2018-10-01 15:56:46', '2018-10-01 15:56:46'),
(140, '', '', '', 0, '', '', 1, '2018-10-01 15:57:19', '2018-10-01 15:57:19'),
(141, '', '', '', 0, '', '', 1, '2018-10-01 15:57:39', '2018-10-01 15:57:39'),
(142, '', '', '', 0, '', '', 1, '2018-10-01 15:58:18', '2018-10-01 15:58:18'),
(143, '', '', '', 0, '', '', 1, '2018-10-01 15:58:45', '2018-10-01 15:58:45'),
(144, '', '', '', 0, '', '', 1, '2018-10-01 15:59:08', '2018-10-01 15:59:08'),
(145, '', '', '', 0, '', '', 1, '2018-10-01 15:59:56', '2018-10-01 15:59:56'),
(146, '', '', '', 0, '', '', 1, '2018-10-01 16:00:23', '2018-10-01 16:00:23'),
(147, '', '', '', 0, '', '', 1, '2018-10-01 16:00:57', '2018-10-01 16:00:57'),
(148, '', '', '', 0, '', '', 1, '2018-10-01 16:01:30', '2018-10-01 16:01:30'),
(149, '', '', '', 0, '', '', 1, '2018-10-01 16:02:00', '2018-10-01 16:02:00'),
(150, '', '', '', 0, '', '', 1, '2018-10-01 16:02:39', '2018-10-01 16:02:39'),
(151, '', '', '', 0, '', '', 1, '2018-10-01 16:03:16', '2018-10-01 16:03:16'),
(152, '', '', '', 0, '', '', 1, '2018-10-01 16:03:43', '2018-10-01 16:03:43'),
(153, '', '', '', 0, '', '', 1, '2018-10-01 16:05:07', '2018-10-01 16:05:07'),
(154, '', '', '', 0, '', '', 1, '2018-10-01 16:05:34', '2018-10-01 16:05:34'),
(155, '', '', '', 0, '', '', 1, '2018-10-01 16:06:03', '2018-10-01 16:06:03'),
(156, '', '', '', 0, '', '', 1, '2018-10-01 16:06:39', '2018-10-01 16:06:39'),
(157, '', '', '', 0, '', '', 1, '2018-10-01 16:07:09', '2018-10-01 16:07:09'),
(158, '', '', '', 0, '', '', 1, '2018-10-01 16:07:39', '2018-10-01 16:07:39'),
(159, '', '', '', 0, '', '', 1, '2018-10-01 16:07:58', '2018-10-01 16:07:58'),
(160, '', '', '', 0, '', '', 1, '2018-10-01 16:08:32', '2018-10-01 16:08:32'),
(161, '', '', '', 0, '', '', 1, '2018-10-01 16:09:00', '2018-10-01 16:09:00'),
(162, '', '', '', 0, '', '', 1, '2018-10-01 16:09:29', '2018-10-01 16:09:29'),
(163, '', '', '', 0, '', '', 1, '2018-10-01 16:09:52', '2018-10-01 16:09:52'),
(164, '', '', '', 0, '', '', 1, '2018-10-01 16:10:30', '2018-10-01 16:10:30'),
(165, '', '', '', 0, '', '', 1, '2018-10-01 16:11:03', '2018-10-01 16:11:03'),
(166, '', '', '', 0, '', '', 1, '2018-10-01 16:11:44', '2018-10-01 16:11:44'),
(167, '', '', '', 0, '', '', 1, '2018-10-01 16:12:13', '2018-10-01 16:12:13'),
(168, '', '', '', 0, '', '', 1, '2018-10-01 16:13:06', '2018-10-01 16:13:06'),
(169, '', '', '', 0, '', '', 1, '2018-10-01 16:13:31', '2018-10-01 16:13:31'),
(170, '', '', '', 0, '', '', 1, '2018-10-01 16:14:10', '2018-10-01 16:14:10'),
(171, '', '', '', 0, '', '', 1, '2018-10-01 16:14:38', '2018-10-01 16:14:38'),
(172, '', '', '', 0, '', '', 1, '2018-10-01 16:15:30', '2018-10-01 16:15:30'),
(173, '', '', '', 0, '', '', 1, '2018-10-01 16:16:05', '2018-10-01 16:16:05'),
(174, '', '', '', 0, '', '', 1, '2018-10-01 16:17:40', '2018-10-01 16:17:40'),
(175, '', '', '', 0, '', '', 1, '2018-10-01 16:18:38', '2018-10-01 16:18:38'),
(176, '', '', '', 0, '', '', 1, '2018-10-01 16:19:22', '2018-10-01 16:19:22'),
(177, '', '', '', 0, '', '', 1, '2018-10-01 16:20:01', '2018-10-01 16:20:01'),
(178, '', '', '', 0, '', '', 1, '2018-10-01 16:20:48', '2018-10-01 16:20:48'),
(179, '', '', '', 0, '', '', 1, '2018-10-01 16:21:21', '2018-10-01 16:21:21');

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
(120, 2, 137, 330000, 1, 7, '2018-10-01 16:50:15', '2018-10-01 16:53:54');

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
(268, 120, 49, 11, 17, 7, '30000', '330000', '2018-10-01 16:50:15', '2018-10-01 16:50:15');

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
  `danh_dau` varchar(20) NOT NULL DEFAULT '0' COMMENT '0: là chưa ăn bánh, 1: là ăn rồi',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoahong`
--

INSERT INTO `hoahong` (`hh_id`, `id_khachhang`, `id_cha`, `tien_hoa_hong`, `status`, `danh_dau`, `created_at`, `updated_at`) VALUES
(74, 137, 0, 0, 0, '31-10-2018', '2018-10-01 15:55:44', '2018-10-01 16:54:28'),
(75, 138, 137, 0, 0, '', '2018-10-01 15:56:18', '2018-10-01 15:56:18'),
(76, 139, 137, 0, 0, '', '2018-10-01 15:56:46', '2018-10-01 15:56:46'),
(77, 140, 138, 0, 0, '', '2018-10-01 15:57:19', '2018-10-01 15:57:19'),
(78, 141, 138, 0, 0, '', '2018-10-01 15:57:39', '2018-10-01 15:57:39'),
(79, 142, 140, 0, 0, '', '2018-10-01 15:58:19', '2018-10-01 15:58:19'),
(80, 143, 140, 0, 0, '', '2018-10-01 15:58:45', '2018-10-01 15:58:45'),
(81, 144, 140, 0, 0, '', '2018-10-01 15:59:08', '2018-10-01 15:59:08'),
(82, 145, 142, 0, 0, '', '2018-10-01 15:59:56', '2018-10-01 15:59:56'),
(83, 146, 142, 0, 0, '', '2018-10-01 16:00:23', '2018-10-01 16:00:23'),
(84, 147, 142, 0, 0, '', '2018-10-01 16:00:57', '2018-10-01 16:00:57'),
(85, 148, 145, 0, 0, '', '2018-10-01 16:01:30', '2018-10-01 16:01:30'),
(86, 149, 147, 0, 0, '', '2018-10-01 16:02:00', '2018-10-01 16:02:00'),
(87, 150, 143, 0, 0, '', '2018-10-01 16:02:39', '2018-10-01 16:02:39'),
(88, 151, 143, 0, 0, '', '2018-10-01 16:03:16', '2018-10-01 16:03:16'),
(89, 152, 143, 0, 0, '', '2018-10-01 16:03:43', '2018-10-01 16:03:43'),
(90, 153, 150, 0, 0, '', '2018-10-01 16:05:07', '2018-10-01 16:05:07'),
(91, 154, 144, 0, 0, '', '2018-10-01 16:05:34', '2018-10-01 16:05:34'),
(92, 155, 144, 0, 0, '', '2018-10-01 16:06:03', '2018-10-01 16:06:03'),
(93, 156, 144, 0, 0, '', '2018-10-01 16:06:39', '2018-10-01 16:06:39'),
(94, 157, 141, 0, 0, '', '2018-10-01 16:07:09', '2018-10-01 16:07:09'),
(95, 158, 141, 0, 0, '', '2018-10-01 16:07:39', '2018-10-01 16:07:39'),
(96, 159, 141, 0, 0, '', '2018-10-01 16:07:58', '2018-10-01 16:07:58'),
(97, 160, 157, 0, 0, '', '2018-10-01 16:08:32', '2018-10-01 16:08:32'),
(98, 161, 157, 0, 0, '', '2018-10-01 16:09:00', '2018-10-01 16:09:00'),
(99, 162, 158, 0, 0, '', '2018-10-01 16:09:29', '2018-10-01 16:09:29'),
(100, 163, 158, 0, 0, '', '2018-10-01 16:09:52', '2018-10-01 16:09:52'),
(101, 164, 158, 0, 0, '', '2018-10-01 16:10:30', '2018-10-01 16:10:30'),
(102, 165, 159, 0, 0, '', '2018-10-01 16:11:03', '2018-10-01 16:11:03'),
(103, 166, 159, 0, 0, '', '2018-10-01 16:11:44', '2018-10-01 16:11:44'),
(104, 167, 159, 0, 0, '', '2018-10-01 16:12:13', '2018-10-01 16:12:13'),
(105, 168, 139, 0, 0, '', '2018-10-01 16:13:06', '2018-10-01 16:13:06'),
(106, 169, 168, 0, 0, '', '2018-10-01 16:13:31', '2018-10-01 16:13:31'),
(107, 170, 168, 0, 0, '', '2018-10-01 16:14:10', '2018-10-01 16:14:10'),
(108, 171, 168, 0, 0, '', '2018-10-01 16:14:38', '2018-10-01 16:14:38'),
(109, 172, 169, 0, 0, '', '2018-10-01 16:15:30', '2018-10-01 16:15:30'),
(110, 173, 169, 0, 0, '', '2018-10-01 16:16:05', '2018-10-01 16:16:05'),
(111, 174, 169, 0, 0, '', '2018-10-01 16:17:40', '2018-10-01 16:17:40'),
(112, 175, 170, 0, 0, '', '2018-10-01 16:18:38', '2018-10-01 16:18:38'),
(113, 176, 170, 0, 0, '', '2018-10-01 16:19:22', '2018-10-01 16:19:22'),
(114, 177, 170, 0, 0, '', '2018-10-01 16:20:01', '2018-10-01 16:20:01'),
(115, 178, 171, 0, 0, '', '2018-10-01 16:20:48', '2018-10-01 16:20:48'),
(116, 179, 171, 0, 0, '', '2018-10-01 16:21:21', '2018-10-01 16:21:21');

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
(17, 137, 66000, 'Nhân viên nhân viên 11 của cửa hàng Chi Nhánh 1. Vào lúc 01-10-2018 23:54:28', 180, 183, '2018-10-01 16:54:28', '2018-10-01 16:54:28');

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
(6, 'Phân cấp 4', 4, 0, '20', '2018-10-01 16:40:39', '2018-10-01 16:41:24'),
(7, 'Phân cấp 5', 5, 1, '20', '2018-10-01 16:40:55', '2018-10-01 16:41:24'),
(8, 'Phân cấp 3', 3, 0, '12', '2018-10-01 16:41:15', '2018-10-01 16:41:24');

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
(23, 180, '66000', '2018-10-01 16:25:59', '2018-10-01 16:54:28'),
(24, 181, '0', '2018-10-01 16:28:18', '2018-10-01 16:28:18'),
(25, 182, '0', '2018-10-01 16:29:43', '2018-10-01 16:29:43');

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
(137, 66000, '2018-10-01 15:55:44', '2018-10-01 16:53:54'),
(138, 0, '2018-10-01 15:56:18', '2018-10-01 15:56:18'),
(139, 0, '2018-10-01 15:56:46', '2018-10-01 15:56:46'),
(140, 0, '2018-10-01 15:57:19', '2018-10-01 15:57:19'),
(141, 0, '2018-10-01 15:57:39', '2018-10-01 15:57:39'),
(142, 0, '2018-10-01 15:58:19', '2018-10-01 15:58:19'),
(143, 0, '2018-10-01 15:58:45', '2018-10-01 15:58:45'),
(144, 0, '2018-10-01 15:59:08', '2018-10-01 15:59:08'),
(145, 0, '2018-10-01 15:59:56', '2018-10-01 15:59:56'),
(146, 0, '2018-10-01 16:00:23', '2018-10-01 16:00:23'),
(147, 0, '2018-10-01 16:00:57', '2018-10-01 16:00:57'),
(148, 0, '2018-10-01 16:01:30', '2018-10-01 16:01:30'),
(149, 0, '2018-10-01 16:02:00', '2018-10-01 16:02:00'),
(150, 0, '2018-10-01 16:02:39', '2018-10-01 16:02:39'),
(151, 0, '2018-10-01 16:03:16', '2018-10-01 16:03:16'),
(152, 0, '2018-10-01 16:03:43', '2018-10-01 16:03:43'),
(153, 0, '2018-10-01 16:05:07', '2018-10-01 16:05:07'),
(154, 0, '2018-10-01 16:05:34', '2018-10-01 16:05:34'),
(155, 0, '2018-10-01 16:06:03', '2018-10-01 16:06:03'),
(156, 0, '2018-10-01 16:06:39', '2018-10-01 16:06:39'),
(157, 0, '2018-10-01 16:07:09', '2018-10-01 16:07:09'),
(158, 0, '2018-10-01 16:07:39', '2018-10-01 16:07:39'),
(159, 0, '2018-10-01 16:07:59', '2018-10-01 16:07:59'),
(160, 0, '2018-10-01 16:08:32', '2018-10-01 16:08:32'),
(161, 0, '2018-10-01 16:09:00', '2018-10-01 16:09:00'),
(162, 0, '2018-10-01 16:09:29', '2018-10-01 16:09:29'),
(163, 0, '2018-10-01 16:09:52', '2018-10-01 16:09:52'),
(164, 0, '2018-10-01 16:10:30', '2018-10-01 16:10:30'),
(165, 0, '2018-10-01 16:11:03', '2018-10-01 16:11:03'),
(166, 0, '2018-10-01 16:11:45', '2018-10-01 16:11:45'),
(167, 0, '2018-10-01 16:12:13', '2018-10-01 16:12:13'),
(168, 0, '2018-10-01 16:13:06', '2018-10-01 16:13:06'),
(169, 0, '2018-10-01 16:13:31', '2018-10-01 16:13:31'),
(170, 0, '2018-10-01 16:14:10', '2018-10-01 16:14:10'),
(171, 0, '2018-10-01 16:14:38', '2018-10-01 16:14:38'),
(172, 0, '2018-10-01 16:15:30', '2018-10-01 16:15:30'),
(173, 0, '2018-10-01 16:16:05', '2018-10-01 16:16:05'),
(174, 0, '2018-10-01 16:17:40', '2018-10-01 16:17:40'),
(175, 0, '2018-10-01 16:18:38', '2018-10-01 16:18:38'),
(176, 0, '2018-10-01 16:19:22', '2018-10-01 16:19:22'),
(177, 0, '2018-10-01 16:20:01', '2018-10-01 16:20:01'),
(178, 0, '2018-10-01 16:20:48', '2018-10-01 16:20:48'),
(179, 0, '2018-10-01 16:21:21', '2018-10-01 16:21:21');

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
(183, '000000000', '1990-01-01', 1, 'Tỉnh 1', '', 180, 1, '2018-10-01 16:32:21', '2018-10-01 16:32:21'),
(184, '000000000', '1990-01-01', 1, 'Tỉnh 1', '', 180, 1, '2018-10-01 16:33:10', '2018-10-01 16:33:10'),
(185, '000000000', '1990-01-01', 1, 'Tỉnh 1', '', 180, 1, '2018-10-01 16:34:06', '2018-10-01 16:34:06'),
(186, '000000000', '1990-01-01', 1, 'Tỉnh 2', '', 181, 1, '2018-10-01 16:34:58', '2018-10-01 16:34:58'),
(187, '000000000', '1990-01-01', 1, 'Tỉnh 2', '', 181, 1, '2018-10-01 16:35:38', '2018-10-01 16:35:38'),
(188, '000000000', '1990-01-01', 1, 'Tỉnh 2', '', 181, 1, '2018-10-01 16:36:28', '2018-10-01 16:36:28'),
(189, '000000000', '1990-01-01', 1, 'Tỉnh 3', '', 182, 1, '2018-10-01 16:37:16', '2018-10-01 16:37:16'),
(190, '000000000', '1990-01-01', 1, 'Tỉnh 3', '', 182, 1, '2018-10-01 16:38:33', '2018-10-01 16:38:33'),
(191, '000000000', '1990-01-01', 1, 'Tỉnh 3', '', 182, 1, '2018-10-01 16:39:17', '2018-10-01 16:39:17');

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
(1, 0, 'Admin', 'admin@admin.com', '1234567890', '$2y$10$plzfXpJY2mgCLxrIxE25dOf1RhR/UpyFo8K2eb5y4AFsoQu/ghMRK', 0, 'JCTaiRDTzsalYAtLuCyx9YUOmayhopHceUAwAJIyrELYz1o6lu6DvUzHrvLC', '2018-07-12 07:36:30', '2018-10-02 14:42:16'),
(137, 2, 'Khách 1', '', '0123000001', '$2y$10$plzfXpJY2mgCLxrIxE25dOf1RhR/UpyFo8K2eb5y4AFsoQu/ghMRK', 1, 'AfAkd4fI7MgESfDp69JRzm3SHiVSYqzygjXwQoyNvhhHMPn2oDSI2OM6Vw7X', '2018-10-01 15:55:44', '2018-10-02 14:20:07'),
(138, 2, 'Khách 2', '', '0123000002', '$2y$10$Kyy3FqMYqin4jor84AAoluNK9eHvwOZMJe7.70RQe/TjC1.M1EZ3O', 1, NULL, '2018-10-01 15:56:17', '2018-10-01 16:49:16'),
(139, 2, 'Khách 3', '', '0123000003', '$2y$10$xgah1vOeTok/lVM.2wrVqe5CIH9.g6TZYcrjSzXxhj23UUKZruV/y', 1, NULL, '2018-10-01 15:56:45', '2018-10-01 16:49:22'),
(140, 2, 'Khách 4', '', '0123000004', '$2y$10$VfUTMKnWPBR/cRWZWqtcku8PVv10OmRwo5ZLv6H6WvQcI9T/fID7u', 1, NULL, '2018-10-01 15:57:19', '2018-10-01 15:57:19'),
(141, 2, 'Khách 5', '', '0123000005', '$2y$10$rrBzzaKSbqY07Xdx9JMNvOSLRf7lI0vAVZasVOvmgoG21zDbkEZdq', 1, NULL, '2018-10-01 15:57:39', '2018-10-01 15:57:39'),
(142, 2, 'Khách 7', '', '0123000007', '$2y$10$LiHSvHzkKRcGoxePAXA9B.V/jvTPqok5OODXyucQBxJxHDI4iLAgS', 1, NULL, '2018-10-01 15:58:18', '2018-10-01 15:58:18'),
(143, 2, 'Khách 8', '', '0123000008', '$2y$10$LDBDrO8H77ZpOd9iUr.VZuvEphznjKiMA6R9i0Pm.6u.hJ45oNFP.', 1, NULL, '2018-10-01 15:58:45', '2018-10-01 15:58:45'),
(144, 2, 'Khách 9', '', '0123000009', '$2y$10$RaBpmzPGvOv1YfVvQbzp3eY9Ni3XREIZ5PRj0TOrivnEq8EWCFPIK', 1, NULL, '2018-10-01 15:59:08', '2018-10-01 15:59:08'),
(145, 2, 'Khách 17', '', '0123000017', '$2y$10$kWw3dK.4f.emikMDg3j6IOenQXTh9vR0BXJRGfinzmHp8u7ffLbhG', 1, NULL, '2018-10-01 15:59:56', '2018-10-01 15:59:56'),
(146, 2, 'Khách 18', '', '0123000018', '$2y$10$VuD4J4C889AkGtq5AuxOMuiF7H7TxaNOM9rbrDFNxt7Of4E5ykCqS', 1, NULL, '2018-10-01 16:00:23', '2018-10-01 16:00:23'),
(147, 2, 'Khách 19', '', '0123000019', '$2y$10$i13ADsm2bTm1k27RYnwRJum5O0Ja3bukhfK6NRGHuV30xlooMLfl6', 1, NULL, '2018-10-01 16:00:57', '2018-10-01 16:00:57'),
(148, 2, 'Khách 43', '', '0123000043', '$2y$10$ccfX082ZsyprV1Wy1POr7eT3AgAi9dC9BxEufmtIyWfRVm6ZQ0ViG', 1, NULL, '2018-10-01 16:01:30', '2018-10-01 16:01:30'),
(149, 2, 'Khách 44', '', '0123000044', '$2y$10$8UK5c8qVsAPxaM.x9LyDeOig6dthYLjdYIMaBDTo2qZY5VVM886XO', 1, NULL, '2018-10-01 16:02:00', '2018-10-01 16:02:00'),
(150, 2, 'Khách 20', '', '01230000020', '$2y$10$dkndLXOkqwsLDRb7jrKsj.O6eynyxcwCPXiZwP7aS4vi.upyGoWJe', 1, NULL, '2018-10-01 16:02:39', '2018-10-01 16:02:39'),
(151, 2, 'Khách 21', '', '0123000021', '$2y$10$7NSlVTzCrNZ33jJTARdLdOMyJ6AFTLD9Mx2Y172rLU9XbY4Tg/J0y', 1, NULL, '2018-10-01 16:03:16', '2018-10-01 16:03:16'),
(152, 2, 'Khách 22', '', '0123000022', '$2y$10$SNu0YdfXAwa0o5ErJqTrme5t4VhcWbbY2hVwTC57W/vZLGO4NdM1.', 1, NULL, '2018-10-01 16:03:43', '2018-10-01 16:03:43'),
(153, 2, 'Khách 45', '', '0123000045', '$2y$10$DY4OZdbkQqLmQO0RdmZN9.1b1yBJ9xX1qqStUykWZY6IBU/F9f5uW', 1, NULL, '2018-10-01 16:05:07', '2018-10-01 16:05:07'),
(154, 2, 'Khách 23', '', '0123000023', '$2y$10$jKwc1i5Y2vnqgBNuJa9T7OLoYwKQHPvRnVztHpPPTZwBu/ilDhkte', 1, NULL, '2018-10-01 16:05:34', '2018-10-01 16:05:34'),
(155, 2, 'Khách 24', '', '0123000024', '$2y$10$1qBjpEk.qLoHa9muZZ9iIeIAXpPux1sBIY1YW3kEnp.Zo/cp7OT/6', 1, NULL, '2018-10-01 16:06:03', '2018-10-01 16:06:03'),
(156, 2, 'Khách 25', '', '0123000025', '$2y$10$yOqcUKICoi/7SVjNJwg.d.yaftolXeNlnCuu/c63b5qa4tWKGc6qa', 1, NULL, '2018-10-01 16:06:39', '2018-10-01 16:06:39'),
(157, 2, 'Khách 10', '', '0123000010', '$2y$10$GRA5jol7HaDxlUw.U2KFMON7m.CqnN9xOxbBUXE1vBU5co6zr6uba', 1, NULL, '2018-10-01 16:07:09', '2018-10-01 16:07:09'),
(158, 2, 'Khách 11', '', '0123000011', '$2y$10$gO/JCY36QorITVHBYmANxuAgicZs7pt2X0PIv5WGb9i.KDiadOdeO', 1, NULL, '2018-10-01 16:07:39', '2018-10-01 16:07:39'),
(159, 2, 'Khách 12', '', '0123000012', '$2y$10$pNeksFX/am5eFVuGCkgOluxfLRY3cfVL32HgJAM.pMMNFzizrcC1a', 1, NULL, '2018-10-01 16:07:58', '2018-10-01 16:07:58'),
(160, 2, 'Khách 26', '', '0123000026', '$2y$10$tDw.SXb/kKfn5CgJUr8q8.FolkMbEqpwl1kJ5N/dG6WWI8t/0VSfK', 1, NULL, '2018-10-01 16:08:32', '2018-10-01 16:08:32'),
(161, 2, 'Khách 28', '', '0123000028', '$2y$10$ci9OO3QRQuaaBkLloNFcGuLapTUhbh8tRbdS9zGMuw2lshNMolatm', 1, NULL, '2018-10-01 16:08:59', '2018-10-01 16:08:59'),
(162, 2, 'Khách 29', '', '0123000029', '$2y$10$WQj2zPLSVaoAdWlZRSNyIuG0XwQX2on7yCwWGJ2KDV3WK3GXh184q', 1, NULL, '2018-10-01 16:09:29', '2018-10-01 16:09:29'),
(163, 2, 'Khách 30', '', '0123000030', '$2y$10$NDdIDQ23VLxaYuBbgfs1r..Fsgss9S4JFsmwZ/7EmnPtxdQ/gh5Z.', 1, NULL, '2018-10-01 16:09:52', '2018-10-01 16:09:52'),
(164, 2, 'Khách 31', '', '0123000031', '$2y$10$35KUE6Vrm8MwnLVHUbAM3.yJEK/z/0Gt27CKGXn9G/B/itUe3zjdG', 1, NULL, '2018-10-01 16:10:30', '2018-10-01 16:10:30'),
(165, 2, 'Khách 32', '', '0123000032', '$2y$10$AfVCfxFHX8bZyuUAOezFPOVPlUnwkaM/Me/AjxZ0irmDu42ILzsTa', 1, NULL, '2018-10-01 16:11:03', '2018-10-01 16:11:03'),
(166, 2, 'Khách 33', '', '0123000033', '$2y$10$A.zkVTT5xXuczhfE.3HOResYpS6.AXInQTTyscLT2WyshCA.EYwDa', 1, NULL, '2018-10-01 16:11:44', '2018-10-01 16:11:44'),
(167, 2, 'Khách 34', '', '0123000034', '$2y$10$r0YsQGv/LaVl0aA1AjiWUeCDyct6ULZ1DV52C9SSGOcY6gJp.gf7O', 1, NULL, '2018-10-01 16:12:13', '2018-10-01 16:12:13'),
(168, 2, 'Khách 6', '', '0123000006', '$2y$10$34xH9Be8QsdwanpwD.Z5e.1ICXceDVI4yQ.Q3pV2WKVrYzV40kkCa', 1, NULL, '2018-10-01 16:13:06', '2018-10-01 16:13:06'),
(169, 2, 'Khách 13', '', '0123000013', '$2y$10$m8B/FPMuSiNEvmcl4lqIbu2rqst7gaP5Lzu7zEXWBoHbFieYxBbJ2', 1, NULL, '2018-10-01 16:13:31', '2018-10-01 16:13:31'),
(170, 2, 'Khách 14', '', '0123000014', '$2y$10$XoSNXDQ2IpuExskcpBj2..OwG2j.dQaycD9iKM/BYXqo181rVFPLm', 1, NULL, '2018-10-01 16:14:10', '2018-10-01 16:14:10'),
(171, 2, 'Khách 15', '', '0123000015', '$2y$10$mHDfg4w/GCSvPdDpcaME5.DCMHJgDhdNA7ktBBJUQqfToK44Z6wBu', 1, NULL, '2018-10-01 16:14:38', '2018-10-01 16:14:38'),
(172, 2, 'Khách 35', '', '0123000035', '$2y$10$iFD0k9/R9sb2HpvIXRWqvO5wD7rR.9vUh9IJSEK3dnSnA0X5Nf3me', 1, NULL, '2018-10-01 16:15:30', '2018-10-01 16:15:30'),
(173, 2, 'Khách 36', '', '0123000036', '$2y$10$XfuRYcxtxFA6F9zYrneqG.BGum46wnwWwcdpxvVPStMxWx7HXQvjS', 1, NULL, '2018-10-01 16:16:05', '2018-10-01 16:16:05'),
(174, 2, 'Khách 37', '', '0123000037', '$2y$10$D1xXMKxvS.nyLR8AYfgNH.WGCKyWyJNQzKFPLscK5SWQ7U5/TpJ16', 1, NULL, '2018-10-01 16:17:40', '2018-10-01 16:17:40'),
(175, 2, 'Khách 39', '', '0123000039', '$2y$10$tf2od9Ga9L3NtWrGiK3wwO1sN9SKGaGdw6ByzVezpLiysIhs9XGrS', 1, NULL, '2018-10-01 16:18:38', '2018-10-01 16:18:38'),
(176, 2, 'Khách 38', '', '0123000038', '$2y$10$ZAAZroemvVhm35tOvaH0ouGzqpTcJ7oJmXrsVQFYNekbYa8mvhzqi', 1, NULL, '2018-10-01 16:19:22', '2018-10-01 16:19:22'),
(177, 2, 'Khách 40', '', '0123000040', '$2y$10$BQysGaRG9ieB0u6ShR4YA.ycZnWffF/2iL6.fm9ZC.3kZ3pFtOQve', 1, NULL, '2018-10-01 16:20:01', '2018-10-01 16:20:01'),
(178, 2, 'Khách 41', '', '0123000041', '$2y$10$X.pq7ouLlMUrYmJsY0Ucwe9fvbYw.r4fWZ9mGVF6F3yPT938lgytC', 1, NULL, '2018-10-01 16:20:48', '2018-10-01 16:20:48'),
(179, 2, 'Khách 42', '', '0123000042', '$2y$10$dxQr1rn01J0WFrOZkInSwuF8Vw1l1x3xQu7hpF9Ln2VG/Nip1Nm8u', 1, NULL, '2018-10-01 16:21:21', '2018-10-01 16:21:21'),
(180, 3, 'nguyễn văn 1', 'chinhanh1@gmail.com', '0124000001', '$2y$10$mBh3KainSONxHsyivT4k3.hCJt4fqKrx9n4CutJkHM5zIq0.Qwu26', 1, '4ZSVvwnmcTA7T1YAr5c39G9vfTI1JSPaS2je4pyINYTuU01YyRgktMrnsKf9', '2018-10-01 16:25:59', '2018-10-01 16:53:20'),
(181, 3, 'nguyễn văn 2', 'chinhanh2@gmail.com', '0124000002', '$2y$10$nFIE7R4F5XnyW7gt8F8Pr.kHOaW9ApVf304rePC0Ig/KOKb6H3t0S', 1, NULL, '2018-10-01 16:28:18', '2018-10-01 16:28:18'),
(182, 3, 'nguyễn văn 3', 'chinhanh3@gmail.com', '0124000003', '$2y$10$5N02xb/YwxnLnwcHtUdWt.5hZ18hcNIKkn2fvG6qMCREzLfvVl/y6', 1, NULL, '2018-10-01 16:29:43', '2018-10-01 16:29:43'),
(183, 1, 'nhân viên 11', 'nhanvien11@gmail.com', '0125000001', '$2y$10$pujiOsNK2gDvUobO/SpC0uJNaKwz.fNgtWqYGghYZN0r7bo4bMg5i', 1, 'gr6Fo0MEAUAk1ZnZdbjh2Z9UgGn88j10sSEqHdRrIMTg7scHCzw7ZeejaMwP', '2018-10-01 16:32:21', '2018-10-01 16:54:38'),
(184, 1, 'Nhân viên 12', 'nhanvien12@gmail.com', '0125000002', '$2y$10$dqU.AfSJmW7rKvwVnqPsSOsImJ0RQbtQywuRkkKvFqZq.msJwZGL.', 1, NULL, '2018-10-01 16:33:10', '2018-10-01 16:33:10'),
(185, 1, 'Nhân viên 13', 'nhanvien13@gmail.com', '0125000003', '$2y$10$3bE7qy2m8Xlg0bHDm3GVTu.BAbrmwOGhr1F8k2h2yoQx1B/ckpuwG', 1, NULL, '2018-10-01 16:34:06', '2018-10-01 16:34:06'),
(186, 1, 'Nhân viên 21', 'nhanvien21@gmail.com', '0125000004', '$2y$10$OhVW.41gIqE0Mva/oUUweeZS9HC.WbFeRWFYDBFWaZAgy5/vzGHMC', 1, NULL, '2018-10-01 16:34:57', '2018-10-01 16:34:57'),
(187, 1, 'nhân viên 22', 'nhanvien22@gmail.com', '0125000005', '$2y$10$P.qDYZq.zYIz.yRVdjHUMu3/f9n/Qow9gpUwqOMvUp0Ea1LI/PaVu', 1, NULL, '2018-10-01 16:35:38', '2018-10-01 16:35:38'),
(188, 1, 'nhân viên 23', 'nhanvien23@gmail.com', '0125000006', '$2y$10$9M3RJD6tNeQsUXpB13m2t.YW5OZxu7KOdd3Qr7C9HOvHHMrP6TanO', 1, NULL, '2018-10-01 16:36:28', '2018-10-01 16:36:28'),
(189, 1, 'nhân viên 31', 'nhanvien31@gmail.com', '0125000007', '$2y$10$kznx3fiPVBOXKpUIYeQIl.j1S4a4o1HbdxpeYPUOd8dzTGKcjm0py', 1, NULL, '2018-10-01 16:37:16', '2018-10-01 16:37:16'),
(190, 1, 'nhân viên 32', 'nhanvien32@gmail.com', '0125000008', '$2y$10$YqQ6zXEx/1ORzm238YOVAO9tzlBN3QNpKNHSwVKOEy.NepVJYGCGa', 1, NULL, '2018-10-01 16:38:33', '2018-10-01 16:38:33'),
(191, 1, 'Nhân viên 33', 'nhanvien33@gmail.com', '0125000009', '$2y$10$MGN3JBxYQ4uJJ767/eo1DeZKmKKXjLRW1SOtESqf5o6JASS038IQe', 1, NULL, '2018-10-01 16:39:17', '2018-10-01 16:39:17');

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
  MODIFY `hd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `hdct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT cho bảng `hoahong`
--
ALTER TABLE `hoahong`
  MODIFY `hh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `loaibanh`
--
ALTER TABLE `loaibanh`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `loghoahong`
--
ALTER TABLE `loghoahong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `log_tien_banh_chi_nhanh`
--
ALTER TABLE `log_tien_banh_chi_nhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `log_tien_chi_ho`
--
ALTER TABLE `log_tien_chi_ho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phancap`
--
ALTER TABLE `phancap`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tien_banh_chi_nhanh`
--
ALTER TABLE `tien_banh_chi_nhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tien_chi_nhanh_tra_cho_khach`
--
ALTER TABLE `tien_chi_nhanh_tra_cho_khach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tongtienhoahong`
--
ALTER TABLE `tongtienhoahong`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT COMMENT 'lấy id từ bảng users làm khóa chính', AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
