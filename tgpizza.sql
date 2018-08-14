-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 14, 2018 lúc 03:24 AM
-- Phiên bản máy phục vụ: 10.1.33-MariaDB
-- Phiên bản PHP: 7.2.6

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
(1, 'Bánh Phô Mai 2 Lớp', '<p>C&oacute; 2 ph&ocirc; mai</p>', 'http://localhost/tgpizza/pizzaCode/public/upload/banh-pho-mai-2-lop.jpg', 'link ảnh', '2018-07-05 07:25:05', '2018-07-31 20:17:48'),
(2, 'Bánh Lạp Xưởng - Xúc Xích', 'phủ lạp xưởng - xúc xích', 'http://localhost/tgpizza/pizzaCode/public/upload/lap-xuong-xuc-xich.jpg', 'link ảnh', '2018-07-05 07:27:24', '2018-07-05 07:27:24'),
(3, 'Bánh Pizza Gà Cua', 'gà cua', 'http://localhost/tgpizza/pizzaCode/public/upload/ga-cua.jpg', 'link ảnh', '2018-07-05 07:28:59', '2018-07-05 07:28:59'),
(4, 'Bánh Phủ Xúc Xích', 'phủ xúc xích', 'http://localhost/tgpizza/pizzaCode/public/upload/phu-xuc-xich.jpg', 'link ảnh', '2018-07-05 07:30:29', '2018-07-05 07:30:29'),
(5, 'Bánh Pizza Hải Sản', 'hải sản', 'http://localhost/tgpizza/pizzaCode/public/upload/hai-san.jpg', 'link ảnh', '2018-07-05 07:31:37', '2018-07-05 07:31:37'),
(6, 'Bánh Xúc Xích Chà Bông', 'xúc xích chà bông', 'http://localhost/tgpizza/pizzaCode/public/upload/xuc-xich-cha-bong.jpg', 'link ảnh', '2018-07-05 07:33:30', '2018-07-05 07:33:30'),
(7, 'Bánh Xúc Xích, Thịt, Cua', 'xúc xích, thịt, cua', 'http://localhost/tgpizza/pizzaCode/public/upload/xuc-xich-thit-cua.jpg', 'link ảnh', '2018-07-05 07:34:56', '2018-07-05 07:34:56'),
(8, 'Bánh Pizza Bò', 'bò', 'http://localhost/tgpizza/pizzaCode/public/upload/bo.jpg', 'link ảnh', '2018-07-05 07:35:46', '2018-07-05 07:35:46'),
(9, 'Bánh Cá Ngừ , Tôm, Cua', 'cá ngừ , tôm, cua', 'http://localhost/tgpizza/pizzaCode/public/upload/ca-ngu-tom-cua.jpg', 'link ảnh', '2018-07-05 07:36:57', '2018-07-05 07:36:57'),
(10, 'Bánh Xúc Xích, Thịt Xông Khói', 'xúc xích, thịt xông khói', 'http://localhost/tgpizza/pizzaCode/public/upload/xuc-xich-thit-xong-khoi.jpg', 'link ảnh', '2018-07-05 07:38:38', '2018-07-05 07:38:38'),
(11, 'Bánh Pizza Rau Củ', 'rau củ', 'http://localhost/tgpizza/pizzaCode/public/upload/rau-cu.jpg', 'link ảnh', '2018-07-05 07:39:35', '2018-07-05 07:39:35'),
(12, 'Bánh Pizza Tôm, Thịt, Cua', '<p>t&ocirc;m, thịt, cua</p>', 'http://localhost/tgpizza/pizzaCode/public/upload/tom-thit-cua.jpg', 'link ảnh', '2018-07-05 07:40:43', '2018-07-31 20:20:12');

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
(26, 'Chi Nhánh Ô Môn', 'o mon', 1, '2018-08-04 00:24:33', '2018-08-04 07:25:47'),
(28, 'Chi Nhánh Hậu Giang', '1ggggggggggggggg', 1, '2018-08-04 01:15:33', '2018-08-04 01:49:46'),
(29, 'Chi Nhánh Hậu Giang', 'hau giang', 1, '2018-08-04 01:17:10', '2018-08-04 01:48:01'),
(37, 's', 's', 1, '2018-08-09 08:14:31', '2018-08-09 08:14:31');

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
(56, '', '', '', 0, '', '', 1, '2018-08-10 07:18:07', '2018-08-10 07:18:07'),
(57, '', '', '', 0, '', '', 1, '2018-08-10 07:18:21', '2018-08-10 07:18:21'),
(58, '', '', '', 0, '', '', 1, '2018-08-10 07:18:39', '2018-08-10 07:18:39'),
(59, '', '', '', 0, '', '', 1, '2018-08-10 07:18:54', '2018-08-10 07:18:54'),
(60, '', '', '', 0, '', '', 1, '2018-08-10 07:19:07', '2018-08-10 07:19:07'),
(61, '', '', '', 0, '', '', 1, '2018-08-10 07:19:21', '2018-08-10 07:19:21'),
(63, '', '', '', 0, '', '', 62, '2018-08-10 07:27:34', '2018-08-10 07:27:34'),
(64, '', '', '', 0, '', '', 62, '2018-08-10 07:29:23', '2018-08-10 07:29:23'),
(65, '', '', '', 0, '', '', 62, '2018-08-10 07:31:25', '2018-08-10 07:31:25'),
(66, '', '', '', 0, '', '', 62, '2018-08-10 07:34:24', '2018-08-10 07:34:24');

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
(1, 1, 1, '30000', '2018-07-10 23:33:58', '2018-07-10 23:33:58'),
(2, 1, 2, '60000', '2018-07-10 23:39:04', '2018-07-10 23:39:04'),
(3, 1, 3, '90000', '2018-07-10 23:39:17', '2018-07-10 23:39:17'),
(4, 2, 1, '30000', '2018-07-10 23:39:28', '2018-07-10 23:39:28'),
(5, 2, 2, '60000', '2018-07-10 23:39:35', '2018-07-10 23:39:35'),
(6, 2, 3, '90000', '2018-07-10 23:39:43', '2018-07-10 23:39:43'),
(7, 3, 1, '30000', '2018-07-10 23:39:57', '2018-07-10 23:39:57'),
(8, 3, 2, '60000', '2018-07-10 23:40:04', '2018-07-10 23:40:04'),
(9, 3, 3, '90000', '2018-07-10 23:40:11', '2018-07-10 23:40:11'),
(10, 4, 1, '30000', '2018-07-10 23:40:25', '2018-07-10 23:40:25'),
(11, 4, 2, '60000', '2018-07-10 23:40:34', '2018-07-10 23:40:34'),
(12, 4, 3, '90000', '2018-07-10 23:40:42', '2018-07-10 23:40:42'),
(13, 5, 1, '30000', '2018-07-10 23:41:01', '2018-07-10 23:41:01'),
(14, 5, 2, '60000', '2018-07-10 23:41:07', '2018-07-10 23:41:07'),
(15, 5, 3, '90000', '2018-07-10 23:41:14', '2018-07-10 23:41:14'),
(16, 6, 1, '30000', '2018-07-10 23:41:21', '2018-07-10 23:41:21'),
(17, 6, 2, '60000', '2018-07-10 23:41:29', '2018-07-10 23:41:29'),
(18, 6, 3, '90000', '2018-07-10 23:41:36', '2018-07-10 23:41:36'),
(19, 7, 1, '30000', '2018-07-10 23:41:43', '2018-07-10 23:41:43'),
(20, 7, 2, '60000', '2018-07-10 23:41:51', '2018-07-10 23:41:51'),
(21, 7, 3, '90000', '2018-07-10 23:41:58', '2018-07-10 23:41:58'),
(22, 8, 1, '30000', '2018-07-10 23:42:05', '2018-07-10 23:42:05'),
(23, 8, 2, '60000', '2018-07-10 23:42:11', '2018-07-10 23:42:11'),
(24, 8, 3, '90000', '2018-07-10 23:42:18', '2018-07-10 23:42:18'),
(25, 9, 1, '30000', '2018-07-10 23:42:25', '2018-07-10 23:42:25'),
(26, 9, 2, '60000', '2018-07-10 23:42:34', '2018-07-10 23:42:34'),
(27, 9, 3, '90000', '2018-07-10 23:42:41', '2018-07-10 23:42:41'),
(28, 10, 1, '30000', '2018-07-10 23:42:49', '2018-07-10 23:42:49'),
(29, 10, 2, '60000', '2018-07-10 23:42:56', '2018-07-10 23:42:56'),
(30, 10, 3, '90000', '2018-07-10 23:43:03', '2018-07-10 23:43:03'),
(31, 11, 1, '30000', '2018-07-10 23:43:23', '2018-07-10 23:43:23'),
(32, 11, 2, '60000', '2018-07-10 23:43:29', '2018-07-10 23:43:29'),
(33, 11, 3, '90000', '2018-07-10 23:43:36', '2018-07-10 23:43:36'),
(34, 12, 1, '30000', '2018-07-10 23:43:43', '2018-07-10 23:43:43'),
(35, 12, 2, '60000', '2018-07-10 23:43:49', '2018-07-10 23:43:49'),
(36, 12, 3, '90000', '2018-07-10 23:43:57', '2018-07-10 23:43:57');

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
(18, 4, 14, 360000, 1, 1, '2018-07-19 13:12:57', '2018-08-08 06:37:44'),
(19, 4, 14, 180000, 1, 1, '2018-07-19 13:41:45', '2018-08-08 06:37:44'),
(20, 4, 14, 480000, 1, 1, '2018-07-19 19:06:23', '2018-08-08 06:37:44'),
(21, 4, 14, 1260000, 1, 1, '2018-07-19 19:23:54', '2018-08-10 06:22:58'),
(22, 4, 15, 180000, 0, 1, '2018-07-28 08:06:35', '2018-08-08 06:37:44'),
(23, 4, 15, 180000, 0, 1, '2018-07-28 08:07:11', '2018-08-08 06:37:44'),
(24, 4, 16, 360000, 0, 1, '2018-07-28 08:07:54', '2018-08-08 06:37:44'),
(25, 4, 16, 360000, 0, 1, '2018-07-28 08:08:15', '2018-08-08 06:37:44'),
(26, 4, 17, 180000, 0, 1, '2018-07-28 08:08:49', '2018-08-08 06:37:44'),
(27, 4, 17, 330000, 0, 1, '2018-07-28 08:09:08', '2018-08-08 06:37:44'),
(28, 4, 18, 330000, 0, 1, '2018-07-28 08:09:41', '2018-08-08 06:37:44'),
(29, 4, 18, 180000, 0, 1, '2018-07-28 08:09:55', '2018-08-08 06:37:44'),
(30, 4, 19, 270000, 0, 1, '2018-07-28 08:11:05', '2018-08-08 06:37:44'),
(31, 4, 19, 90000, 0, 1, '2018-07-28 08:11:32', '2018-08-08 06:37:44'),
(32, 4, 20, 300000, 0, 1, '2018-07-28 08:12:30', '2018-08-08 06:37:44'),
(33, 4, 20, 180000, 0, 1, '2018-07-28 08:12:58', '2018-08-08 06:37:44'),
(34, 4, 21, 390000, 0, 1, '2018-07-28 08:13:54', '2018-08-08 06:37:44'),
(35, 4, 21, 360000, 0, 1, '2018-07-28 08:17:09', '2018-08-08 06:37:44'),
(36, 4, 22, 180000, 0, 1, '2018-07-28 08:18:10', '2018-08-08 06:37:44'),
(37, 4, 22, 510000, 0, 1, '2018-07-28 08:18:22', '2018-08-08 06:37:44'),
(38, 4, 23, 180000, 0, 1, '2018-07-28 08:19:23', '2018-08-08 06:37:44'),
(39, 4, 23, 180000, 0, 1, '2018-07-28 08:19:56', '2018-08-08 06:37:44'),
(40, 4, 24, 90000, 0, 1, '2018-07-28 08:20:34', '2018-08-08 06:37:44'),
(41, 4, 24, 180000, 0, 1, '2018-07-28 08:20:46', '2018-08-08 06:37:44'),
(42, 2, 14, 750000, 0, 1, '2018-08-07 23:49:04', '2018-08-07 23:52:46'),
(43, 1, 23, 480000, 0, 1, '2018-08-10 02:46:53', '2018-08-10 02:46:53'),
(44, 1, 18, 390000, 1, 1, '2018-08-10 02:47:36', '2018-08-10 02:47:55'),
(45, 1, 14, 360000, 0, 1, '2018-08-10 06:22:51', '2018-08-10 06:22:51'),
(46, 1, 19, 90000, 1, 1, '2018-08-10 06:23:46', '2018-08-10 06:24:06'),
(47, 1, 39, 120000, 1, 1, '2018-08-10 06:25:20', '2018-08-10 06:25:33'),
(48, 1, 54, 180000, 1, 1, '2018-08-10 06:59:01', '2018-08-10 06:59:17'),
(49, 1, 55, 180000, 1, 1, '2018-08-10 07:00:29', '2018-08-10 07:00:42'),
(50, 1, 53, 180000, 1, 1, '2018-08-10 07:02:01', '2018-08-10 07:02:13'),
(51, 1, 53, 180000, 1, 1, '2018-08-10 07:08:19', '2018-08-10 07:08:27'),
(52, 1, 60, 180000, 1, 1, '2018-08-10 07:20:42', '2018-08-10 07:20:58'),
(53, 1, 61, 180000, 1, 1, '2018-08-10 07:21:46', '2018-08-10 07:21:55'),
(54, 1, 59, 180000, 1, 1, '2018-08-10 07:22:29', '2018-08-10 07:22:39'),
(55, 1, 58, 180000, 1, 1, '2018-08-10 07:23:18', '2018-08-10 07:23:30'),
(56, 1, 57, 180000, 1, 1, '2018-08-10 07:24:11', '2018-08-10 07:24:19'),
(57, 1, 56, 180000, 1, 1, '2018-08-10 07:24:51', '2018-08-10 07:25:08'),
(58, 62, 63, 180000, 1, 1, '2018-08-10 07:27:49', '2018-08-10 07:28:01'),
(59, 62, 64, 180000, 1, 1, '2018-08-10 07:29:33', '2018-08-10 07:29:40'),
(60, 62, 65, 180000, 1, 1, '2018-08-10 07:31:37', '2018-08-10 07:31:44'),
(61, 62, 66, 180000, 1, 1, '2018-08-10 07:34:35', '2018-08-10 07:34:43'),
(62, 1, 56, 150000, 1, 1, '2018-08-10 08:11:39', '2018-08-10 08:12:18'),
(63, 1, 56, 30000, 1, 1, '2018-08-13 06:24:15', '2018-08-13 06:24:46');

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
(35, 18, 2, 2, 1, 2, '60000', '120000', '2018-07-19 13:12:57', '2018-07-19 13:38:16'),
(36, 18, 1, 2, 1, 1, '30000', '60000', '2018-07-19 13:15:30', '2018-07-19 13:38:16'),
(37, 18, 3, 2, 1, 3, '90000', '180000', '2018-07-19 13:15:30', '2018-07-19 13:38:16'),
(38, 19, 1, 1, 1, 1, '30000', '30000', '2018-07-19 13:41:45', '2018-07-19 13:41:45'),
(39, 19, 2, 1, 1, 2, '60000', '60000', '2018-07-19 13:41:45', '2018-07-19 13:53:31'),
(40, 19, 3, 1, 1, 3, '90000', '90000', '2018-07-19 13:41:45', '2018-07-19 13:41:45'),
(41, 20, 1, 1, 1, 1, '30000', '30000', '2018-07-19 19:06:23', '2018-07-19 19:06:23'),
(42, 20, 2, 6, 1, 2, '60000', '360000', '2018-07-19 19:06:23', '2018-07-19 19:07:03'),
(43, 20, 3, 1, 1, 3, '90000', '90000', '2018-07-19 19:06:23', '2018-07-19 19:06:23'),
(44, 21, 1, 1, 1, 1, '30000', '30000', '2018-07-19 19:23:55', '2018-07-19 19:23:55'),
(45, 21, 2, 4, 1, 2, '60000', '240000', '2018-07-19 19:23:55', '2018-07-19 19:24:04'),
(46, 21, 3, 11, 1, 3, '90000', '990000', '2018-07-19 19:23:55', '2018-07-19 19:23:55'),
(47, 22, 1, 1, 1, 1, '30000', '30000', '2018-07-28 08:06:35', '2018-07-28 08:06:35'),
(48, 22, 2, 1, 1, 2, '60000', '60000', '2018-07-28 08:06:35', '2018-07-28 08:06:35'),
(49, 22, 3, 1, 1, 3, '90000', '90000', '2018-07-28 08:06:35', '2018-07-28 08:06:35'),
(50, 23, 4, 1, 2, 1, '30000', '30000', '2018-07-28 08:07:11', '2018-07-28 08:07:11'),
(51, 23, 5, 1, 2, 2, '60000', '60000', '2018-07-28 08:07:11', '2018-07-28 08:07:11'),
(52, 23, 6, 1, 2, 3, '90000', '90000', '2018-07-28 08:07:11', '2018-07-28 08:07:11'),
(53, 24, 4, 2, 2, 1, '30000', '60000', '2018-07-28 08:07:54', '2018-07-28 08:07:54'),
(54, 24, 5, 2, 2, 2, '60000', '120000', '2018-07-28 08:07:54', '2018-07-28 08:07:54'),
(55, 24, 6, 2, 2, 3, '90000', '180000', '2018-07-28 08:07:54', '2018-07-28 08:07:54'),
(56, 25, 7, 2, 3, 1, '30000', '60000', '2018-07-28 08:08:15', '2018-07-28 08:08:15'),
(57, 25, 8, 2, 3, 2, '60000', '120000', '2018-07-28 08:08:15', '2018-07-28 08:08:15'),
(58, 25, 9, 2, 3, 3, '90000', '180000', '2018-07-28 08:08:15', '2018-07-28 08:08:15'),
(59, 26, 7, 1, 3, 1, '30000', '30000', '2018-07-28 08:08:49', '2018-07-28 08:08:49'),
(60, 26, 8, 1, 3, 2, '60000', '60000', '2018-07-28 08:08:49', '2018-07-28 08:08:49'),
(61, 26, 9, 1, 3, 3, '90000', '90000', '2018-07-28 08:08:49', '2018-07-28 08:08:49'),
(62, 27, 16, 1, 6, 1, '30000', '30000', '2018-07-28 08:09:08', '2018-07-28 08:09:08'),
(63, 27, 17, 2, 6, 2, '60000', '120000', '2018-07-28 08:09:08', '2018-07-28 08:09:08'),
(64, 27, 18, 2, 6, 3, '90000', '180000', '2018-07-28 08:09:08', '2018-07-28 08:09:08'),
(65, 28, 19, 1, 7, 1, '30000', '30000', '2018-07-28 08:09:41', '2018-07-28 08:09:41'),
(66, 28, 20, 2, 7, 2, '60000', '120000', '2018-07-28 08:09:41', '2018-07-28 08:09:41'),
(67, 28, 21, 2, 7, 3, '90000', '180000', '2018-07-28 08:09:41', '2018-07-28 08:09:41'),
(68, 29, 34, 1, 12, 1, '30000', '30000', '2018-07-28 08:09:55', '2018-07-28 08:09:55'),
(69, 29, 35, 1, 12, 2, '60000', '60000', '2018-07-28 08:09:55', '2018-07-28 08:09:55'),
(70, 29, 36, 1, 12, 3, '90000', '90000', '2018-07-28 08:09:55', '2018-07-28 08:09:55'),
(71, 30, 34, 1, 12, 1, '30000', '30000', '2018-07-28 08:11:05', '2018-07-28 08:11:05'),
(72, 30, 35, 1, 12, 2, '60000', '60000', '2018-07-28 08:11:06', '2018-07-28 08:11:06'),
(73, 30, 36, 1, 12, 3, '90000', '90000', '2018-07-28 08:11:06', '2018-07-28 08:11:06'),
(74, 30, 31, 1, 11, 1, '30000', '30000', '2018-07-28 08:11:14', '2018-07-28 08:11:14'),
(75, 30, 32, 1, 11, 2, '60000', '60000', '2018-07-28 08:11:14', '2018-07-28 08:11:14'),
(76, 31, 25, 1, 9, 1, '30000', '30000', '2018-07-28 08:11:32', '2018-07-28 08:11:32'),
(77, 31, 26, 1, 9, 2, '60000', '60000', '2018-07-28 08:11:33', '2018-07-28 08:11:33'),
(78, 32, 16, 1, 6, 1, '30000', '30000', '2018-07-28 08:12:30', '2018-07-28 08:12:30'),
(79, 32, 18, 3, 6, 3, '90000', '270000', '2018-07-28 08:12:30', '2018-07-28 08:12:35'),
(80, 33, 19, 1, 7, 1, '30000', '30000', '2018-07-28 08:12:58', '2018-07-28 08:12:58'),
(81, 33, 20, 1, 7, 2, '60000', '60000', '2018-07-28 08:12:58', '2018-07-28 08:12:58'),
(82, 33, 21, 1, 7, 3, '90000', '90000', '2018-07-28 08:12:58', '2018-07-28 08:12:58'),
(83, 34, 13, 1, 5, 1, '30000', '30000', '2018-07-28 08:13:54', '2018-07-28 08:16:36'),
(84, 34, 15, 4, 5, 3, '90000', '360000', '2018-07-28 08:13:54', '2018-07-28 08:16:36'),
(85, 35, 4, 3, 2, 1, '30000', '90000', '2018-07-28 08:17:09', '2018-07-28 08:17:09'),
(86, 35, 6, 3, 2, 3, '90000', '270000', '2018-07-28 08:17:09', '2018-07-28 08:17:09'),
(87, 36, 31, 1, 11, 1, '30000', '30000', '2018-07-28 08:18:10', '2018-07-28 08:18:10'),
(88, 36, 32, 1, 11, 2, '60000', '60000', '2018-07-28 08:18:10', '2018-07-28 08:18:10'),
(89, 36, 33, 1, 11, 3, '90000', '90000', '2018-07-28 08:18:11', '2018-07-28 08:18:11'),
(90, 37, 13, 2, 5, 1, '30000', '60000', '2018-07-28 08:18:22', '2018-07-28 08:18:22'),
(91, 37, 14, 3, 5, 2, '60000', '180000', '2018-07-28 08:18:22', '2018-07-28 08:18:22'),
(92, 37, 15, 3, 5, 3, '90000', '270000', '2018-07-28 08:18:22', '2018-07-28 08:18:22'),
(93, 38, 22, 1, 8, 1, '30000', '30000', '2018-07-28 08:19:23', '2018-07-28 08:19:23'),
(94, 38, 23, 1, 8, 2, '60000', '60000', '2018-07-28 08:19:23', '2018-07-28 08:19:23'),
(95, 38, 24, 1, 8, 3, '90000', '90000', '2018-07-28 08:19:23', '2018-07-28 08:19:23'),
(96, 39, 1, 1, 1, 1, '30000', '30000', '2018-07-28 08:19:56', '2018-07-28 08:19:56'),
(97, 39, 2, 1, 1, 2, '60000', '60000', '2018-07-28 08:19:56', '2018-07-28 08:19:56'),
(98, 39, 3, 1, 1, 3, '90000', '90000', '2018-07-28 08:19:56', '2018-07-28 08:19:56'),
(99, 40, 1, 1, 1, 1, '30000', '30000', '2018-07-28 08:20:35', '2018-07-28 08:20:35'),
(100, 40, 2, 1, 1, 2, '60000', '60000', '2018-07-28 08:20:35', '2018-07-28 08:20:35'),
(101, 41, 22, 1, 8, 1, '30000', '30000', '2018-07-28 08:20:46', '2018-07-28 08:20:46'),
(102, 41, 23, 1, 8, 2, '60000', '60000', '2018-07-28 08:20:46', '2018-07-28 08:20:46'),
(103, 41, 24, 1, 8, 3, '90000', '90000', '2018-07-28 08:20:46', '2018-07-28 08:20:46'),
(104, 42, 1, 5, 1, 1, '30000', '150000', '2018-08-07 23:49:04', '2018-08-07 23:52:46'),
(105, 42, 2, 4, 1, 2, '60000', '240000', '2018-08-07 23:49:04', '2018-08-07 23:52:46'),
(106, 42, 3, 1, 1, 3, '90000', '90000', '2018-08-07 23:49:04', '2018-08-07 23:49:04'),
(107, 42, 34, 4, 12, 1, '30000', '120000', '2018-08-07 23:51:25', '2018-08-07 23:52:46'),
(108, 42, 35, 1, 12, 2, '60000', '60000', '2018-08-07 23:51:25', '2018-08-07 23:51:25'),
(109, 42, 36, 1, 12, 3, '90000', '90000', '2018-08-07 23:51:25', '2018-08-07 23:51:25'),
(110, 43, 1, 7, 1, 1, '30000', '210000', '2018-08-10 09:46:53', '2018-08-10 09:46:53'),
(111, 43, 4, 2, 2, 1, '30000', '60000', '2018-08-10 09:46:53', '2018-08-10 09:46:53'),
(112, 43, 10, 1, 4, 1, '30000', '30000', '2018-08-10 09:46:53', '2018-08-10 09:46:53'),
(113, 43, 25, 6, 9, 1, '30000', '180000', '2018-08-10 09:46:53', '2018-08-10 09:46:53'),
(114, 44, 7, 4, 3, 1, '30000', '120000', '2018-08-10 09:47:36', '2018-08-10 09:47:36'),
(115, 44, 10, 8, 4, 1, '30000', '240000', '2018-08-10 09:47:36', '2018-08-10 09:47:36'),
(116, 44, 25, 1, 9, 1, '30000', '30000', '2018-08-10 09:47:36', '2018-08-10 09:47:36'),
(117, 45, 25, 12, 9, 1, '30000', '360000', '2018-08-10 13:22:51', '2018-08-10 13:22:51'),
(118, 46, 25, 3, 9, 1, '30000', '90000', '2018-08-10 13:23:46', '2018-08-10 13:23:46'),
(119, 47, 25, 4, 9, 1, '30000', '120000', '2018-08-10 13:25:20', '2018-08-10 13:25:20'),
(120, 48, 25, 1, 9, 1, '30000', '30000', '2018-08-10 13:59:01', '2018-08-10 13:59:01'),
(121, 48, 26, 1, 9, 2, '60000', '60000', '2018-08-10 13:59:01', '2018-08-10 13:59:01'),
(122, 48, 27, 1, 9, 3, '90000', '90000', '2018-08-10 13:59:01', '2018-08-10 13:59:01'),
(123, 49, 12, 1, 4, 3, '90000', '90000', '2018-08-10 14:00:29', '2018-08-10 14:00:29'),
(124, 49, 25, 1, 9, 1, '30000', '30000', '2018-08-10 14:00:29', '2018-08-10 14:00:29'),
(125, 49, 26, 1, 9, 2, '60000', '60000', '2018-08-10 14:00:29', '2018-08-10 14:00:29'),
(126, 50, 2, 1, 1, 2, '60000', '60000', '2018-08-10 14:02:01', '2018-08-10 14:02:01'),
(127, 50, 25, 1, 9, 1, '30000', '30000', '2018-08-10 14:02:01', '2018-08-10 14:02:01'),
(128, 50, 27, 1, 9, 3, '90000', '90000', '2018-08-10 14:02:01', '2018-08-10 14:02:01'),
(129, 51, 26, 3, 9, 2, '60000', '180000', '2018-08-10 14:08:19', '2018-08-10 14:08:19'),
(130, 52, 25, 6, 9, 1, '30000', '180000', '2018-08-10 14:20:42', '2018-08-10 14:20:42'),
(131, 53, 25, 6, 9, 1, '30000', '180000', '2018-08-10 14:21:46', '2018-08-10 14:21:46'),
(132, 54, 25, 6, 9, 1, '30000', '180000', '2018-08-10 14:22:29', '2018-08-10 14:22:29'),
(133, 55, 25, 6, 9, 1, '30000', '180000', '2018-08-10 14:23:18', '2018-08-10 14:23:18'),
(134, 56, 25, 6, 9, 1, '30000', '180000', '2018-08-10 14:24:11', '2018-08-10 14:24:11'),
(135, 57, 25, 6, 9, 1, '30000', '180000', '2018-08-10 14:24:51', '2018-08-10 14:24:51'),
(136, 58, 25, 6, 9, 1, '30000', '180000', '2018-08-10 14:27:49', '2018-08-10 14:27:49'),
(137, 59, 25, 6, 9, 1, '30000', '180000', '2018-08-10 14:29:33', '2018-08-10 14:29:33'),
(138, 60, 25, 6, 9, 1, '30000', '180000', '2018-08-10 14:31:37', '2018-08-10 14:31:37'),
(139, 61, 25, 6, 9, 1, '30000', '180000', '2018-08-10 14:34:35', '2018-08-10 14:34:35'),
(140, 62, 25, 5, 9, 1, '30000', '150000', '2018-08-10 15:11:39', '2018-08-10 15:11:39'),
(141, 63, 25, 1, 9, 1, '30000', '30000', '2018-08-13 13:24:15', '2018-08-13 13:24:15');

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
(21, 56, 0, 3600, 0, 1, '2018-08-10 07:18:07', '2018-08-13 06:24:46'),
(22, 57, 56, 18000, 0, 1, '2018-08-10 07:18:21', '2018-08-10 07:24:19'),
(23, 58, 57, 18000, 0, 1, '2018-08-10 07:18:39', '2018-08-10 07:28:01'),
(24, 59, 58, 21600, 0, 1, '2018-08-10 07:18:54', '2018-08-10 07:31:44'),
(25, 60, 59, 21600, 0, 1, '2018-08-10 07:19:07', '2018-08-10 07:34:44'),
(26, 61, 60, 18000, 0, 1, '2018-08-10 07:19:21', '2018-08-10 07:34:44'),
(27, 63, 61, 14400, 0, 1, '2018-08-10 07:27:34', '2018-08-10 07:34:44'),
(28, 64, 63, 0, 0, 1, '2018-08-10 07:29:23', '2018-08-10 07:33:35'),
(29, 65, 63, 7200, 0, 1, '2018-08-10 07:31:25', '2018-08-10 07:34:43'),
(30, 66, 65, 3600, 0, 1, '2018-08-10 07:34:24', '2018-08-10 07:34:43');

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
(1, 'Loại Nhỏ', '16cm', '2018-07-05 07:56:51', '2018-07-05 07:56:51'),
(2, 'Loại Vừa', '22cm', '2018-07-05 07:57:40', '2018-07-05 07:57:40'),
(3, 'Loại Lớn', '26cm', '2018-07-05 07:57:55', '2018-07-05 07:57:55');

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
(1, 19, 766303, 'Nhân viên nhan vien chi nhanh 1 của cửa hàng s. Vào lúc 09-08-2018 15:16:05', 37, 38, '2018-08-09 08:16:05', '2018-08-09 08:16:05'),
(2, 21, 563542, 'Nhân viên nhan vien chi nhanh 1 của cửa hàng s. Vào lúc 09-08-2018 15:17:25', 37, 38, '2018-08-09 08:17:25', '2018-08-09 08:17:25'),
(3, 14, 7801, 'Nhân viên Admin của cửa hàng ####. Vào lúc 10-08-2018 09:48:27', 0, 1, '2018-08-10 02:48:27', '2018-08-10 02:48:27'),
(4, 64, 3600, 'Nhân viên khanhpro của cửa hàng Chi Nhánh Ô Môn. Vào lúc 10-08-2018 14:33:35', 26, 62, '2018-08-10 07:33:35', '2018-08-10 07:33:35'),
(5, 56, 18000, 'Nhân viên khanhpro của cửa hàng Chi Nhánh Ô Môn. Vào lúc 10-08-2018 15:08:09', 26, 62, '2018-08-10 08:08:09', '2018-08-10 08:08:09');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
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
(1, 'Phân Cấp Lần 1', 5, 1, '10', '2018-07-15 21:21:36', '2018-08-01 01:24:00'),
(2, 'Phân Cấp Lần 2', 6, 0, '20', '2018-07-15 21:21:43', '2018-08-01 01:24:00');

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

--
-- Đang đổ dữ liệu cho bảng `tien_banh_chi_nhanh`
--

INSERT INTO `tien_banh_chi_nhanh` (`id`, `id_chinhanh`, `id_loaibanh`, `id_banh`, `id_gia`, `sl_mua`, `sotien`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, '', '10000000', 0, '2018-07-13 03:29:00', '2018-07-13 03:29:00'),
(2, 2, 0, 0, 0, '', '20000000', 0, '2018-07-13 03:50:06', '2018-07-13 03:50:06'),
(3, 3, 0, 0, 0, '', '30000000', 0, '2018-07-13 03:50:14', '2018-07-13 03:50:14'),
(4, 4, 0, 0, 0, '', '40000000', 0, '2018-07-13 03:50:20', '2018-07-13 03:50:20'),
(5, 5, 0, 0, 0, '', '11555', 0, '2018-07-13 03:50:25', '2018-07-13 04:10:02'),
(6, 1, 0, 0, 0, '', '11', 0, '2018-07-13 03:50:32', '2018-07-13 03:50:32');

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
(1, 26, '521600', '2018-08-09 07:25:15', '2018-08-10 08:08:09'),
(2, 26, '500000', '2018-08-09 07:25:27', '2018-08-09 07:25:27'),
(3, 26, '500000', '2018-08-09 07:26:02', '2018-08-09 07:26:02'),
(4, 26, '500000', '2018-08-09 07:30:01', '2018-08-09 07:30:01'),
(5, 26, '180000', '2018-08-09 07:30:05', '2018-08-09 07:30:05'),
(6, 26, '1000000', '2018-08-09 07:30:10', '2018-08-09 07:30:10'),
(7, 26, '70000', '2018-08-09 07:30:13', '2018-08-09 07:30:13'),
(8, 26, '0', '2018-08-09 07:30:32', '2018-08-09 07:30:32'),
(9, 26, '998887', '2018-08-09 07:38:38', '2018-08-09 07:38:38'),
(10, 37, '1329845', '2018-08-09 08:14:31', '2018-08-09 08:17:25');

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
(56, 7200, '2018-08-10 07:18:07', '2018-08-13 06:24:46'),
(57, 3600, '2018-08-10 07:18:21', '2018-08-10 07:24:20'),
(58, 3600, '2018-08-10 07:18:39', '2018-08-10 07:23:30'),
(59, 3600, '2018-08-10 07:18:54', '2018-08-10 07:22:39'),
(60, 3600, '2018-08-10 07:19:07', '2018-08-10 07:20:58'),
(61, 3600, '2018-08-10 07:19:21', '2018-08-10 07:21:55'),
(63, 3600, '2018-08-10 07:27:34', '2018-08-10 07:28:01'),
(64, 3600, '2018-08-10 07:29:23', '2018-08-10 07:29:40'),
(65, 3600, '2018-08-10 07:31:25', '2018-08-10 07:31:44'),
(66, 3600, '2018-08-10 07:34:24', '2018-08-10 07:34:43');

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
(7, '', NULL, 1, 'cần thơ', 'http://localhost/tgpizza/pizzaCode/public/upload/Capture.PNG', 1, 0, '2018-07-13 05:26:32', '2018-07-15 21:23:26'),
(8, '', NULL, 1, 'hậu giang', 'http://localhost/tgpizza/pizzaCode/public/upload/Screenshot (1).png', 4, 0, '2018-07-13 05:31:15', '2018-07-15 21:23:13'),
(10, '', NULL, 1, '1', 'http://localhost/tgpizza/pizzaCode/public/upload/Screenshot (1).png', 2, 0, '2018-07-15 06:59:05', '2018-07-15 06:59:37'),
(33, '1', '1', 1, '1', '', 28, 1, '2018-08-06 06:30:54', '2018-08-06 06:30:54'),
(35, '0297428', '6229-04-13', 1, 'đ', '', 26, 1, '2018-08-06 06:46:40', '2018-08-06 06:46:40'),
(36, '1111111', '1111-11-11', 1, '1', '', 26, 1, '2018-08-09 07:15:33', '2018-08-09 07:15:33'),
(38, '1234221', '1111-11-11', 0, 'sdsss', '', 37, 1, '2018-08-09 08:15:32', '2018-08-09 08:15:32'),
(62, '111', '1111-11-11', 1, '111', '', 26, 1, '2018-08-10 07:26:41', '2018-08-10 07:26:41');

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
(1, 0, 'Admin', 'admin@admin.com', '0000', '$2y$10$plzfXpJY2mgCLxrIxE25dOf1RhR/UpyFo8K2eb5y4AFsoQu/ghMRK', 1, 'jrlQDQnQNv8kgoqWb9olzNKur043IXqh98ASYlCttdjC3gPPguj8a1dTXtMO', '2018-07-12 07:36:30', '2018-08-13 13:43:49'),
(3, 1, 'Nhan vien truc quay', 'nhanvien1@gmail.com', '0', '$2y$10$ngoPUGDMB7vNnJxTDDqNU.A2r35r4ubdCDz5V4CSa6MSVyyVa2Va2', 1, 'Vk131HZPIVNNptodaOyoeJzpA62t835hDfpaTQEELfRLdtq3Ij9hmS6SBM4O', '2018-07-06 09:42:28', '2018-07-15 07:05:10'),
(4, 1, 'Nhan vien truc quay 2', 'nhanvien2@gmail.com', '0', '$2y$10$X.om26iHmpfNGndYN1sBWuTUaeUqdfRPJmQrSQUrvCX8GlvTSrEKG', 1, 'kopasma4yukljheDbTfXhrD7q34X4iMZTMiJLwxcCDiJ6MtbcUZNkHHLzfyg', '2018-07-06 08:52:51', '2018-07-06 01:52:21'),
(5, 1, 'nhân viên số 3', 'nhanvien3@gmail.com', '0972705702', '$2y$10$LQwHuPsBLLLZpRXNu4Rz/ufD9f2NeRC1nAznal3lZiC6H9aVHJJ46', 1, 'MikCMWvQbjKCNvkuQ0yeIasiIYW3Y6qTQf2X6s47JbgmKyZskaibUGjvi6rs', '2018-07-12 07:27:46', '2018-07-15 06:55:34'),
(7, 1, 'Quốc Khánh', 'khanh@gmail.com', '0972705703', '$2y$10$jDKAdFUac9nURicLuhwbLeSmyTZaQO9q1o9bUDATcANuToCfIHKqS', 1, '06Tilv7uRsJsKlGNRS957I3uTWBROlOv39wd4RUxJ7BGfbCZ7LfoCDLVG3DU', '2018-07-13 05:26:32', '2018-08-09 14:05:33'),
(8, 1, 'Đoàn Minh Nhựt', 'nhut@gmail.com', '0972705702', '$2y$10$c9tU5BpCJy26QH7Tb0RlRe4.YCxv58ctwoAdo7bvLTpaX2bi/6Tpm', 1, 'iOTvBrTnPbXISrrbX7FKKy6KzDkiKjZzwbv1GuCvaxCy73bj1ysadt8GToa8', '2018-07-13 05:31:15', '2018-07-15 21:23:13'),
(10, 1, '1', '_@a.com', '1', '$2y$10$jN0NOpHrXhKJ98GRAKqSW.FjYM/E7TfjYssUiKfKhXr1xia.Wtl3G', 1, 'mQLUfwBZphpqxjkICBgc2hThYQ9yWK1awnlHdfzWgDBdQkdjQLPFh7mxF8n8', '2018-07-15 06:59:05', '2018-08-01 15:08:09'),
(11, 0, 'q', '1', '1', '$2y$10$Q1PVUEeOJrEiWR.NCcuKQO3koSb4mpfVE7HTEMo4hIZ7FnAYwdvRu', 1, NULL, '2018-07-19 08:51:42', '2018-08-07 02:05:54'),
(25, 3, 'Đoàn Minh Nhựt', 'nhut@gmail.com', '0972705702', '$2y$10$1VcZS38uNmJ61YhSnep1Cul4SV0E/VYiQHbP/dI7J7lxG.oMOB5si', 1, NULL, '2018-08-04 00:24:02', '2018-08-04 00:24:02'),
(26, 3, 'Đoàn Minh Nhựt', 'nhut@gmail.com', '0972705702', '$2y$10$h.yaaQ66QMmK4RYSCJzX4u/hZSiRmUzCBbrLqxb8VGRLGJQ5rPzlu', 1, NULL, '2018-08-04 00:24:33', '2018-08-04 00:24:33'),
(27, 3, 'Nguyễn Quốc Khánh', 'khanh@gmail.com', '0972705706', '$2y$10$AJNIosaHH4edcLqubVz7DO9ZLKNFwWGrNJPsM9xXNNr57aks/9sZq', 1, NULL, '2018-08-04 01:12:14', '2018-08-04 01:12:14'),
(28, 3, 'Nguyễn Quốc Khánh', 'khanh@gmail.com', '09727057022', '$2y$10$6CjL2G7Od7WqomgN/Fh6muYjJQdzYBPNknn/63F8upBeoVlWFQXGK', 1, NULL, '2018-08-04 01:15:33', '2018-08-04 01:15:33'),
(29, 3, 'Nguyễn Quốc Khánh', 'khanh@gmail.comn', '09727057034', '$2y$10$D7BltqoBOBopPlhRLrvUU.ffs8tGhQb9eNULSxn57d9V5hnLVO4Mq', 1, NULL, '2018-08-04 01:17:10', '2018-08-04 01:17:10'),
(30, 1, '1', '1@gmail.com', '1', '$2y$10$mPDZOiXZypoKxJJ1nzmfqe3YLtIxXR6x2EScGaSqnbq0FelgoSpme', 1, NULL, '2018-08-06 06:28:24', '2018-08-06 06:28:24'),
(31, 1, '1', '1@gmail.com', '1', '$2y$10$0ik76f/czyxjfPaFV6df4er.kqIZHSxPAyx760wgI0mNoxWX9SDBq', 1, NULL, '2018-08-06 06:29:37', '2018-08-06 06:29:37'),
(32, 1, '1', '1@gmail.com', '1', '$2y$10$yDzA9ElOMJoDouZTko7LT.J1VwImmfrbHdfpJ4BRjkR0LMAHkfdcS', 1, NULL, '2018-08-06 06:30:28', '2018-08-06 06:30:28'),
(33, 1, '1', '1@gmail.com', '1', '$2y$10$Kpmtpobrh94IQkL.ixXhv.8z9Fh2sjfAXNv1GnARqcB3GfEuda4p6', 1, NULL, '2018-08-06 06:30:54', '2018-08-06 06:30:54'),
(34, 1, 'nguyen quoc khanh', 'khanh@gmail.com', '9097414', '$2y$10$0Yefx4nMLZJIW689TkptbO9zTldgOgl5lPt8SVs2dVyoi/kIqAM12', 1, 'KmSJ3QbP9wEYJ7fzWG5JWf7uFqbyrm855ZtnWqFRxvPr26131lZ2ml7jRBkR', '2018-08-06 06:46:26', '2018-08-09 14:13:44'),
(35, 1, 'nguyen quoc khanh', 'khanh@gmail.com', '9097414', '$2y$10$WY2tEWk2P4Qq7JDZUD7l/.i.gVkIlIElCnjCQyE8kPNc09Ej3T6Za', 1, NULL, '2018-08-06 06:46:40', '2018-08-06 06:46:40'),
(36, 1, 'nv1', 'nv1@gmail.com', '123456789', '$2y$10$W/qflCP3rUDQ8m1b5eNLBOIdxo8SKJJeF5XG6FBGJ5emhZlcZpwQC', 1, 'xhzaprYF9Rz5rbk6YpBZGpnk04bVaScZdv5dxez6PYmFsG8bs1qz5l70AgZL', '2018-08-09 07:15:32', '2018-08-09 15:12:46'),
(37, 3, 'chi nhanh 1', 'cn1@gmail.com', '1233454567', '$2y$10$Wev2rzXt/itD0FQ3exa9I.Kc14MtNEMg1r5sNmUPWFqWmRHydd.1y', 1, NULL, '2018-08-09 08:14:31', '2018-08-09 08:14:31'),
(38, 1, 'nhan vien chi nhanh 1', 'nvcn1@gmail.com', '123564', '$2y$10$IOOSMEH6sAXgQnio4rhdFeEZqi0j1ACro7UJXz.yhRRoXLz.wrw7.', 1, 'V5F32O8oDRoNNvDia5IzDs6098gysufJo8anSj3MWqvj6Erv7oBoZvVGgB1u', '2018-08-09 08:15:32', '2018-08-09 15:39:15'),
(56, 2, 'anh A', '', '1', '$2y$10$pWHcejqj3A8PoN46c20YUOhQSaY1ICL0nOXHEAT0COArPjfc28x2i', 1, NULL, '2018-08-10 07:18:07', '2018-08-10 07:18:07'),
(57, 2, 'anh B', '', '2', '$2y$10$zmZmtEdg1Mp0IAK7Unwg2eDITBRyyEW5LK/BesYuw04K4dF5TOBrO', 1, NULL, '2018-08-10 07:18:21', '2018-08-10 07:18:21'),
(58, 2, 'anh C', '', '3', '$2y$10$cvRC8ytELS9IaW76XZlm3O017wWompiXM9SrdufBhBfBlaW7ldfsW', 1, NULL, '2018-08-10 07:18:39', '2018-08-10 07:18:39'),
(59, 2, 'anh D', '', '4', '$2y$10$QKN3tozY7vAAGmlDBW.EDuxsqQuyA.9K5YZ8wPXR/HWGG8Z6dRyxq', 1, NULL, '2018-08-10 07:18:54', '2018-08-10 07:18:54'),
(60, 2, 'anh E', '', '5', '$2y$10$XGDvNS1h/nhj9IBUfDwjXe0KAQXbcMVAoNSSlnoiUEz8EbVeLlYay', 1, NULL, '2018-08-10 07:19:06', '2018-08-10 07:19:06'),
(61, 2, 'anh F', '', '6', '$2y$10$zc2WOte8RBYh.10WtiOc0OjHVYgdJpUfSq7OJdpaJwUv1md2MnZwm', 1, NULL, '2018-08-10 07:19:21', '2018-08-10 07:19:21'),
(62, 1, 'khanhpro', 'khanhpro@gmail.com.vn', '1234', '$2y$10$ohNu5KFCv1rlwsiPZFuUtuCuBaWYzQgK3/4ONeBhsIuZzGMUiutAO', 1, 'SYDoWkNN4KlxCdNg5bzXCgbAT72wp2Ss8XuHykSA6k0iYhfvE0ekPFa5sFjo', '2018-08-10 07:26:41', '2018-08-10 15:09:07'),
(63, 2, 'anh H', '', '7', '$2y$10$PoC7eBrfwFoIPXoLlWF8I.w/vkjOjqN8imc4l0iGbtJQJQHFO.5iC', 1, NULL, '2018-08-10 07:27:34', '2018-08-10 07:27:34'),
(64, 2, 'anh G', '', '8', '$2y$10$C16KTe5th7QYxfmhDeMZAeZCXURiFHpFAKqfP8kDpLujt4IGmx1iG', 1, NULL, '2018-08-10 07:29:23', '2018-08-10 07:29:23'),
(65, 2, 'anh K', '', '9', '$2y$10$XZluGA79ipi.afAzxcfi/uvV01gvq/Ra5I05.9NDtAUsIYFpbRqMS', 1, NULL, '2018-08-10 07:31:25', '2018-08-10 07:31:25'),
(66, 2, 'anh J', '', '10', '$2y$10$oWHEvM1Jy9R/VwmTzPLI7OfDGK.nQv5jPF9IForZIJWAyPZjTgsey', 1, NULL, '2018-08-10 07:34:24', '2018-08-10 07:34:24');

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
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `gia`
--
ALTER TABLE `gia`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `hd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `hdct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT cho bảng `hoahong`
--
ALTER TABLE `hoahong`
  MODIFY `hh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `loaibanh`
--
ALTER TABLE `loaibanh`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loghoahong`
--
ALTER TABLE `loghoahong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `log_tien_banh_chi_nhanh`
--
ALTER TABLE `log_tien_banh_chi_nhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `log_tien_chi_ho`
--
ALTER TABLE `log_tien_chi_ho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phancap`
--
ALTER TABLE `phancap`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tien_banh_chi_nhanh`
--
ALTER TABLE `tien_banh_chi_nhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tien_chi_nhanh_tra_cho_khach`
--
ALTER TABLE `tien_chi_nhanh_tra_cho_khach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tongtienhoahong`
--
ALTER TABLE `tongtienhoahong`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT COMMENT 'lấy id từ bảng users làm khóa chính', AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
