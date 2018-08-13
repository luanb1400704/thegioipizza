-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 04, 2018 lúc 09:34 AM
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
(26, 'Chi Nhánh Ô Môn', 'o mon', 1, '2018-08-04 00:24:33', '2018-08-04 07:25:47');

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
(14, '19/07/2018', '1', '19/07/2018', 1, '1', '', 0, '2018-07-19 08:56:00', '2018-07-19 08:56:00'),
(15, '28/07/1990', '111111111', '28/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-28 07:52:33', '2018-07-28 07:52:33'),
(16, '28/07/1990', '222222222', '28/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-28 07:54:42', '2018-07-28 07:54:42'),
(17, '28/07/1990', '333333333', '28/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-28 07:57:51', '2018-07-28 07:57:51'),
(18, '28/07/1990', '444444444', '28/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-28 07:58:53', '2018-07-28 07:58:53'),
(19, '28/07/2018', '55555555', '28/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-28 08:00:28', '2018-07-28 08:00:28'),
(20, '28/07/2018', '666666666', '28/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-28 08:01:24', '2018-07-28 08:01:24'),
(21, '28/07/2018', '777777777', '28/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-28 08:02:15', '2018-07-28 08:02:15'),
(22, '28/07/2018', '888888888', '28/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-28 08:03:12', '2018-07-28 08:03:12'),
(23, '28/07/2018', '999999999', '28/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-28 08:04:19', '2018-07-28 08:04:19'),
(24, '28/07/2018', '101010101', '28/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-28 08:05:17', '2018-07-28 08:05:17'),
(25, '29/07/1980', '0123456789', '29/07/2018', 1, 'Cần Thơ', '', 0, '2018-07-29 04:02:27', '2018-07-29 04:02:27'),
(27, '04/08/1990', '033333357', '04/08/2015', 1, 'Cần Thơ', '', 0, '2018-08-03 22:16:06', '2018-08-03 22:16:06'),
(28, '04/08/2018', '1', '04/08/2018', 1, '1', '', 0, '2018-08-03 22:28:28', '2018-08-03 22:28:28'),
(29, '04/08/2018', '1', '04/08/2018', 1, '1', '', 0, '2018-08-03 22:43:44', '2018-08-03 22:43:44'),
(30, '04/08/2018', '1', '04/08/2018', 1, '1', '', 0, '2018-08-03 22:45:18', '2018-08-03 22:45:18'),
(32, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-08-03 23:27:35', '2018-08-03 23:27:35'),
(33, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-08-03 23:35:38', '2018-08-03 23:35:38'),
(34, NULL, NULL, NULL, NULL, NULL, '', 0, '2018-08-03 23:37:05', '2018-08-03 23:37:05');

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
(18, 2, 14, 360000, 1, 1, '2018-07-19 13:12:57', '2018-07-20 02:12:58'),
(19, 2, 14, 180000, 1, 1, '2018-07-19 13:41:45', '2018-07-20 02:13:01'),
(20, 2, 14, 480000, 1, 1, '2018-07-19 19:06:23', '2018-07-20 02:13:05'),
(21, 2, 14, 1260000, 0, 1, '2018-07-19 19:23:54', '2018-07-19 19:24:05'),
(22, 2, 15, 180000, 0, 1, '2018-07-28 08:06:35', '2018-07-28 08:07:00'),
(23, 2, 15, 180000, 0, 1, '2018-07-28 08:07:11', '2018-07-28 08:07:20'),
(24, 2, 16, 360000, 0, 1, '2018-07-28 08:07:54', '2018-07-28 08:07:59'),
(25, 2, 16, 360000, 0, 1, '2018-07-28 08:08:15', '2018-07-28 08:08:20'),
(26, 2, 17, 180000, 0, 1, '2018-07-28 08:08:49', '2018-07-28 08:08:57'),
(27, 2, 17, 330000, 0, 1, '2018-07-28 08:09:08', '2018-07-28 08:09:13'),
(28, 2, 18, 330000, 0, 1, '2018-07-28 08:09:41', '2018-07-28 08:09:47'),
(29, 2, 18, 180000, 0, 1, '2018-07-28 08:09:55', '2018-07-28 08:10:02'),
(30, 2, 19, 270000, 0, 1, '2018-07-28 08:11:05', '2018-07-28 08:11:18'),
(31, 2, 19, 90000, 0, 1, '2018-07-28 08:11:32', '2018-07-28 08:11:36'),
(32, 2, 20, 300000, 0, 1, '2018-07-28 08:12:30', '2018-07-28 08:12:35'),
(33, 2, 20, 180000, 0, 1, '2018-07-28 08:12:58', '2018-07-28 08:13:03'),
(34, 2, 21, 390000, 0, 1, '2018-07-28 08:13:54', '2018-07-28 08:16:36'),
(35, 2, 21, 360000, 0, 1, '2018-07-28 08:17:09', '2018-07-28 08:17:16'),
(36, 2, 22, 180000, 0, 1, '2018-07-28 08:18:10', '2018-07-28 08:18:14'),
(37, 2, 22, 510000, 0, 1, '2018-07-28 08:18:22', '2018-07-28 08:18:26'),
(38, 2, 23, 180000, 0, 1, '2018-07-28 08:19:23', '2018-07-28 08:19:38'),
(39, 2, 23, 180000, 0, 1, '2018-07-28 08:19:56', '2018-07-28 08:20:02'),
(40, 2, 24, 90000, 0, 1, '2018-07-28 08:20:34', '2018-07-28 08:20:38'),
(41, 2, 24, 180000, 0, 1, '2018-07-28 08:20:46', '2018-07-28 08:20:55');

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
(103, 41, 24, 1, 8, 3, '90000', '90000', '2018-07-28 08:20:46', '2018-07-28 08:20:46');

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
(1, 14, 10, 0, 0, 0, '2018-07-19 08:56:00', '2018-07-19 08:56:00'),
(2, 15, 14, 0, 0, 0, '2018-07-28 07:52:33', '2018-07-28 07:52:33'),
(3, 16, 15, 0, 0, 0, '2018-07-28 07:54:42', '2018-07-28 07:54:42'),
(4, 17, 16, 0, 0, 0, '2018-07-28 07:57:51', '2018-07-28 07:57:51'),
(5, 18, 16, 0, 0, 0, '2018-07-28 07:58:53', '2018-07-28 07:58:53'),
(6, 19, 15, 0, 0, 0, '2018-07-28 08:00:28', '2018-07-28 08:00:28'),
(7, 20, 18, 0, 0, 0, '2018-07-28 08:01:24', '2018-07-28 08:01:24'),
(8, 21, 18, 0, 0, 0, '2018-07-28 08:02:15', '2018-07-28 08:02:15'),
(9, 22, 17, 0, 0, 0, '2018-07-28 08:03:12', '2018-07-28 08:03:12'),
(10, 23, 17, 0, 0, 0, '2018-07-28 08:04:19', '2018-07-28 08:04:19'),
(11, 24, 19, 0, 0, 0, '2018-07-28 08:05:17', '2018-07-28 08:05:17');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logtienchiho`
--

CREATE TABLE `logtienchiho` (
  `id` int(11) NOT NULL,
  `id_chinhanh` int(11) NOT NULL,
  `sotien` text NOT NULL,
  `ngay_tra` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logtienchinhanh`
--

CREATE TABLE `logtienchinhanh` (
  `id` int(11) NOT NULL,
  `id_chinhanh` int(11) NOT NULL,
  `sotien` text NOT NULL,
  `ngay_tra` text NOT NULL COMMENT 'ngày trả tiền cho chi nhánh',
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
(1, 'Phân Cấp Lần 1', 5, 1, '10', '2018-07-15 21:21:36', '2018-08-01 01:24:00'),
(2, 'Phân Cấp Lần 2', 6, 0, '20', '2018-07-15 21:21:43', '2018-08-01 01:24:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tienchiho`
--

CREATE TABLE `tienchiho` (
  `id` int(11) NOT NULL,
  `id_chinhanh` int(11) NOT NULL COMMENT 'biết chi nhánh nào đã thanh toán',
  `sotien` text NOT NULL COMMENT 'số tiền của chi nhánh đó trả',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tienchinhanh`
--

CREATE TABLE `tienchinhanh` (
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
-- Đang đổ dữ liệu cho bảng `tienchinhanh`
--

INSERT INTO `tienchinhanh` (`id`, `id_chinhanh`, `id_loaibanh`, `id_banh`, `id_gia`, `sl_mua`, `sotien`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, '', '10000000', 0, '2018-07-13 03:29:00', '2018-07-13 03:29:00'),
(2, 2, 0, 0, 0, '', '20000000', 0, '2018-07-13 03:50:06', '2018-07-13 03:50:06'),
(3, 3, 0, 0, 0, '', '30000000', 0, '2018-07-13 03:50:14', '2018-07-13 03:50:14'),
(4, 4, 0, 0, 0, '', '40000000', 0, '2018-07-13 03:50:20', '2018-07-13 03:50:20'),
(5, 5, 0, 0, 0, '', '11555', 0, '2018-07-13 03:50:25', '2018-07-13 04:10:02'),
(6, 1, 0, 0, 0, '', '11', 0, '2018-07-13 03:50:32', '2018-07-13 03:50:32');

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
(10, '', NULL, 1, '1', 'http://localhost/tgpizza/pizzaCode/public/upload/Screenshot (1).png', 2, 0, '2018-07-15 06:59:05', '2018-07-15 06:59:37');

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
(1, 0, 'Admin', 'admin@admin.com', '0000', '$2y$10$plzfXpJY2mgCLxrIxE25dOf1RhR/UpyFo8K2eb5y4AFsoQu/ghMRK', 1, '0IwNxJYtqYwcyLodC3ROHsRn9GbtlAvpswboMYMC1dQljmmvWQDNc2AtxDxa', '2018-07-12 07:36:30', '2018-08-04 07:25:37'),
(3, 1, 'Nhan vien truc quay', 'nhanvien1@gmail.com', '0', '$2y$10$ngoPUGDMB7vNnJxTDDqNU.A2r35r4ubdCDz5V4CSa6MSVyyVa2Va2', 1, 'Vk131HZPIVNNptodaOyoeJzpA62t835hDfpaTQEELfRLdtq3Ij9hmS6SBM4O', '2018-07-06 09:42:28', '2018-07-15 07:05:10'),
(4, 1, 'Nhan vien truc quay 2', 'nhanvien2@gmail.com', '0', '$2y$10$X.om26iHmpfNGndYN1sBWuTUaeUqdfRPJmQrSQUrvCX8GlvTSrEKG', 1, 'kopasma4yukljheDbTfXhrD7q34X4iMZTMiJLwxcCDiJ6MtbcUZNkHHLzfyg', '2018-07-06 08:52:51', '2018-07-06 01:52:21'),
(5, 1, 'nhân viên số 3', 'nhanvien3@gmail.com', '0972705702', '$2y$10$LQwHuPsBLLLZpRXNu4Rz/ufD9f2NeRC1nAznal3lZiC6H9aVHJJ46', 1, 'MikCMWvQbjKCNvkuQ0yeIasiIYW3Y6qTQf2X6s47JbgmKyZskaibUGjvi6rs', '2018-07-12 07:27:46', '2018-07-15 06:55:34'),
(7, 1, 'Quốc Khánh', 'khanh@gmail.com', '0972705703', '$2y$10$jDKAdFUac9nURicLuhwbLeSmyTZaQO9q1o9bUDATcANuToCfIHKqS', 1, 'U54QzUPsge7WxfE4E4yk94mGDdFNqA1mrAM6k1JoJkjCOMFAyPYLYeVmdOUg', '2018-07-13 05:26:32', '2018-08-01 15:08:19'),
(8, 1, 'Đoàn Minh Nhựt', 'nhut@gmail.com', '0972705702', '$2y$10$c9tU5BpCJy26QH7Tb0RlRe4.YCxv58ctwoAdo7bvLTpaX2bi/6Tpm', 1, 'iOTvBrTnPbXISrrbX7FKKy6KzDkiKjZzwbv1GuCvaxCy73bj1ysadt8GToa8', '2018-07-13 05:31:15', '2018-07-15 21:23:13'),
(10, 1, '1', '_@a.com', '1', '$2y$10$jN0NOpHrXhKJ98GRAKqSW.FjYM/E7TfjYssUiKfKhXr1xia.Wtl3G', 1, 'mQLUfwBZphpqxjkICBgc2hThYQ9yWK1awnlHdfzWgDBdQkdjQLPFh7mxF8n8', '2018-07-15 06:59:05', '2018-08-01 15:08:09'),
(11, 2, 'q', '1', '1', '$2y$10$Q1PVUEeOJrEiWR.NCcuKQO3koSb4mpfVE7HTEMo4hIZ7FnAYwdvRu', 1, NULL, '2018-07-19 08:51:42', '2018-07-19 08:51:42'),
(12, 2, 'q', '1', '1', '$2y$10$A6lz/Z0ycyRr/gv/kusOQuH3kJ7nSIJb7zW9jp3MDifpKz3DEUfDq', 1, NULL, '2018-07-19 08:54:56', '2018-07-19 08:54:56'),
(13, 2, 'q', '1', '1', '$2y$10$x7/6Z.hOTxlVHSg0D88QiOdFwHgtVLsUG8nliGGrHdEwQDOv6bSGS', 1, NULL, '2018-07-19 08:55:36', '2018-07-19 08:55:36'),
(14, 2, '1', '1', '11', '$2y$10$0yp1NqwtPsg7q84B1tiZL.D9PFnyGkILYunuWjQlsyIeuOI3iytA6', 1, 'On4pDsxfvDrlGa7w3f73QY83iezbv34PbWFtjS1yHkn9kPSVgGvhwSFfZMv9', '2018-07-19 08:56:00', '2018-07-28 15:06:00'),
(15, 2, 'Lê Văn Nhất', '1', '0123456001', '$2y$10$CpnTahEHDpybOCdjPdGgZexm2Bdb8EWptkaSFz1r2hPKdKSvSGZ4a', 1, 'B5shEKVkfkWhbDNwp4Hr4HEwAO1sX5mOX9epyX4VnCl0ntO8onqHSyrMvHz5', '2018-07-28 07:52:33', '2018-07-28 15:07:26'),
(16, 2, 'Lê Văn Nhị', '1', '0123456002', '$2y$10$BG4K/N3I5GklB.SkncLOCOvdzP0x0piIqpQs.vamXifv/RmM7T4ri', 1, 'bdIOJqZgXeMiWJOrLmt5rF8MSmwtjvkstlDGiiVol56dWco1y9QZ0XCOMkEc', '2018-07-28 07:54:42', '2018-07-28 15:08:28'),
(17, 2, 'Lê Văn Tam', '1', '0123456003', '$2y$10$0zq8gIdIoMAMX1jomcvWNuiXbN0K2yMKX6y1As4Mq1QPrg6KDhBxi', 1, '2kbBumqytSWOof4Cl9tvvAKbnlzpfr5E5qaQPxW4wlA4ZX8Xsgstxth7x5VY', '2018-07-28 07:57:51', '2018-07-28 15:09:18'),
(18, 2, 'Lê Văn Tứ', '1', '0123456004', '$2y$10$XPe3xV0iQJfEwqdA1BA.2etQS0HP8tbT1dWqrPZRXL5s4EBHtgFQS', 1, 'Ev8gzeVUukjanPLi9BkCSqBNegjhze3OjAd0XGWoJYV3CBrVp5up2uf2X893', '2018-07-28 07:58:53', '2018-07-28 15:10:14'),
(19, 2, 'Lê Văn Ngũ', '1', '0123456005', '$2y$10$AjuxAZGCLEsjKPZ0dgczeeuuedvQadjGJUG/sx/QVuYPANbDiVqpS', 1, 'jOThwGMbdn4J2VVbfnkgvVexdpb1pk6bFF5UP0PX0iyjiZdGevIFO8wgVt91', '2018-07-28 08:00:28', '2018-07-28 15:11:42'),
(20, 2, 'Lê Văn Lục', '1', '0123456006', '$2y$10$ww73FYOO9haXpzYamsOR4O1HFAFIQ6.l2EBrBFPAEIaZIk4cAZPfm', 1, 't8TtlFKloQ14SC0Q38FhREx4P6bJpxcZaM7q3N1m9dTmhdUNbKifvGWgdizK', '2018-07-28 08:01:24', '2018-07-28 15:13:13'),
(21, 2, 'Lê Văn Thất', '1', '0123456007', '$2y$10$aXGRkHFCR5V1aIwQpQjmOOQTfT.YkHpnpbD8Qxd1NbI4zbh1nstaW', 1, 'IKK4qjTFPdhXMSCJ29cMmmoDNji0S6DFhDvB0PnkHItP8l24GKN4M7N1NKE0', '2018-07-28 08:02:15', '2018-07-28 15:17:40'),
(22, 2, 'Lê Văn Bát', '1', '0123456008', '$2y$10$.aSD3LPAoKdhatU7MR7WAOW6KuTNInbM7R970ze2zFSLSyTmAoFmG', 1, 'SUTnprdTIbyEnVnqBIe2AmjpQaW73Z6Q1pgnZuZPpuUWuErVkfHCXqjHzLEl', '2018-07-28 08:03:11', '2018-07-28 15:18:31'),
(23, 2, 'Lê Văn Cửu', '1', '0123456009', '$2y$10$uLIHu1KD9PIw6avOaYhhUOoT3Myo28ggT7X3xUCO9lECVs/hqJgBG', 1, 'fhZktaxOlstORjxO0e4invJrYXuJVJYzY7x8yBdNJeZDfhfAo051sBwt2q8N', '2018-07-28 08:04:19', '2018-07-28 15:20:09'),
(24, 2, 'Lê Văn Thập', '1', '0123456010', '$2y$10$aqdbtwVVNJm6CHAxrg3vXeP.s04wdsI5JM5z.vX/BlP2Nc1IjxaUe', 1, NULL, '2018-07-28 08:05:17', '2018-07-28 08:05:17'),
(25, 3, 'Đoàn Minh Nhựt', 'nhut@gmail.com', '0972705702', '$2y$10$1VcZS38uNmJ61YhSnep1Cul4SV0E/VYiQHbP/dI7J7lxG.oMOB5si', 1, NULL, '2018-08-04 00:24:02', '2018-08-04 00:24:02'),
(26, 3, 'Đoàn Minh Nhựt', 'nhut@gmail.com', '0972705702', '$2y$10$h.yaaQ66QMmK4RYSCJzX4u/hZSiRmUzCBbrLqxb8VGRLGJQ5rPzlu', 1, NULL, '2018-08-04 00:24:33', '2018-08-04 00:24:33');

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
-- Chỉ mục cho bảng `logtienchiho`
--
ALTER TABLE `logtienchiho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logtienchinhanh`
--
ALTER TABLE `logtienchinhanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phancap`
--
ALTER TABLE `phancap`
  ADD PRIMARY KEY (`pc_id`);

--
-- Chỉ mục cho bảng `tienchiho`
--
ALTER TABLE `tienchiho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tienchinhanh`
--
ALTER TABLE `tienchinhanh`
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
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `gia`
--
ALTER TABLE `gia`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `hd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `hdct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `hoahong`
--
ALTER TABLE `hoahong`
  MODIFY `hh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `loaibanh`
--
ALTER TABLE `loaibanh`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loghoahong`
--
ALTER TABLE `loghoahong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `logtienchiho`
--
ALTER TABLE `logtienchiho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `logtienchinhanh`
--
ALTER TABLE `logtienchinhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phancap`
--
ALTER TABLE `phancap`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tienchiho`
--
ALTER TABLE `tienchiho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tienchinhanh`
--
ALTER TABLE `tienchinhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tongtienhoahong`
--
ALTER TABLE `tongtienhoahong`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT COMMENT 'lấy id từ bảng users làm khóa chính';

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
