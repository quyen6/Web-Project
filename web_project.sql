-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 03, 2024 lúc 03:13 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_project`
--
CREATE DATABASE IF NOT EXISTS `web_project` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `web_project`;
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotToken` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `activeToken` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `administrators`
--

INSERT INTO `administrators` (`id`, `fullname`, `email`, `phone`, `password`, `forgotToken`, `activeToken`, `status`, `create_at`, `update_at`) VALUES
(1, 'Đặng Hoàng Việt', 'hvkmkmkm21@gmail.com', '0972017749', '$2y$10$x1Ofqiw8f/96qiy79.0ck.ujegNx5uly2w0hsU1dKT0g/KoRyObia', NULL, NULL, 1, '2024-07-26 07:18:26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cartegory_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `cartegory_Id`) VALUES
(1, 'Apple', 1),
(2, 'Samsung', 1),
(3, 'Xiaomi', 1),
(4, 'Oppo', 1),
(5, 'Realmi', 1),
(6, 'Vivo', 1),
(7, 'Huawei', 1),
(8, 'Acer', 2),
(9, 'Macbook', 2),
(10, 'Dell', 2),
(11, 'HP', 2),
(12, 'Lenovo', 2),
(13, 'Asus', 2),
(14, 'MSI', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartegory`
--

CREATE TABLE `cartegory` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cartegory`
--

INSERT INTO `cartegory` (`id`, `name`) VALUES
(1, 'Điện thoại'),
(2, 'Laptop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int(11) NOT NULL,
  `code_cart` int(11) DEFAULT NULL,
  `product_Id` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `giamua` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_details`
--

INSERT INTO `cart_details` (`id`, `code_cart`, `product_Id`, `soLuong`, `giamua`) VALUES
(76, 6840, 4, 1, '26.691.100'),
(77, 3065, 72, 1, '17.841.500'),
(78, 2151, 3, 1, '14.004.900'),
(79, 2151, 4, 1, '26.691.100'),
(80, 2151, 5, 2, '28.151.200'),
(81, 7612, 14, 1, '9.690.300'),
(82, 6348, 72, 1, '17.841.500'),
(83, 1617, 67, 1, '19.081.700'),
(84, 8585, 72, 1, '17.841.500'),
(85, 8585, 73, 1, '20.491.800'),
(86, 164, 4, 1, '26.691.100'),
(87, 4243, 3, 1, '14.004.900'),
(88, 7739, 9, 1, '43.990.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `hoTen` varchar(50) DEFAULT NULL,
  `soDienThoai` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hinhThucNhanHang` varchar(50) DEFAULT NULL,
  `tinh` varchar(50) DEFAULT NULL,
  `huyen` varchar(50) DEFAULT NULL,
  `diaChi` varchar(100) DEFAULT NULL,
  `ghiChu` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `hoTen`, `soDienThoai`, `email`, `hinhThucNhanHang`, `tinh`, `huyen`, `diaChi`, `ghiChu`) VALUES
(42, 'MYQUYEN', '0572017749', 'hoangvietpk16@gmail.com', 'home', 'Sơn La', 'Thành phố Sơn La', 'xóm 16đ', NULL),
(43, 'hoangviet', '0872017749', 'hoangvietpk16@gmail.com', 'home', 'Sơn La', 'Thành phố Sơn La', 'xóm 16', NULL),
(44, 'Quyên', '0992017749', 'hoangvietpk16@gmail.com', 'home', 'Sơn La', 'Thành phố Sơn La', 'xóm 16', 'saaaa'),
(45, 'Việt', '0532017749', 'hoangvietpk16@gmail.com', 'home', 'Sơn La', 'Thành phố Sơn La', 'xóm 16 thông trung hải', NULL),
(46, 'Quyên', '0532017749', 'hoangvietpk16@gmail.com', 'home', 'Sơn La', 'Thành phố Sơn La', '166/1c', NULL),
(47, 'Kim Long', '0532017749', 'hoangvieqqqqqqqtpk16@gmail.com', 'home', 'Sơn La', 'Thành phố Sơn La', 'xóm 16đssssss', NULL),
(48, 'Myỹ hoa', '0872017749', 'hoangvietpssssk16@gmail.com', 'home', 'Sơn La', 'Huyện Bắc Yên', 'sa', NULL),
(49, 'Nam Trường', '0334017749', 'accclonpk16@gmail.com', 'home', 'Quảng Ninh', 'Thành phố Hạ Long', 'thôn tam kì', NULL),
(50, 'Xuân thư', '0835198401', 'hoangvietpk11116@gmail.com', 'home', 'Cà Mau', 'Huyện Năm Căn', 'Khu vực 104', 'Chyển vô nhà'),
(51, 'Viet Dang', '0972017749', 'hoangvietpk1202223@gmail.com', 'home', 'Bắc Giang', 'Thành phố Bắc Giang', 'xóm 16', 'hahaaa'),
(52, 'Viet Dang', '0972017749', 'hvkmkmkm21@gmail.com', 'home', 'Yên Bái', 'Thành phố Yên Bái', '166/1c', 'sđssdsdsđs');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `province_id`, `name`) VALUES
(1, 1, 'Quận Ba Đình'),
(2, 1, 'Quận Hoàn Kiếm'),
(3, 1, 'Quận Tây Hồ'),
(4, 1, 'Quận Long Biên'),
(5, 1, 'Quận Cầu Giấy'),
(6, 1, 'Quận Đống Đa'),
(7, 1, 'Quận Hai Bà Trưng'),
(8, 1, 'Quận Hoàng Mai'),
(9, 1, 'Quận Thanh Xuân'),
(10, 1, 'Huyện Sóc Sơn'),
(11, 1, 'Huyện Đông Anh'),
(12, 1, 'Huyện Gia Lâm'),
(13, 1, 'Quận Nam Từ Liêm'),
(14, 1, 'Huyện Thanh Trì'),
(15, 1, 'Quận Bắc Từ Liêm'),
(16, 1, 'Huyện Mê Linh'),
(17, 1, 'Quận Hà Đông'),
(18, 1, 'Thị xã Sơn Tây'),
(19, 1, 'Huyện Ba Vì'),
(20, 1, 'Huyện Phúc Thọ'),
(21, 1, 'Huyện Đan Phượng'),
(22, 1, 'Huyện Hoài Đức'),
(23, 1, 'Huyện Quốc Oai'),
(24, 1, 'Huyện Thạch Thất'),
(25, 1, 'Huyện Chương Mỹ'),
(26, 1, 'Huyện Thanh Oai'),
(27, 1, 'Huyện Thường Tín'),
(28, 1, 'Huyện Phú Xuyên'),
(29, 1, 'Huyện Ứng Hòa'),
(30, 1, 'Huyện Mỹ Đức'),
(31, 2, 'Thành phố Hà Giang'),
(32, 2, 'Huyện Đồng Văn'),
(33, 2, 'Huyện Mèo Vạc'),
(34, 2, 'Huyện Yên Minh'),
(35, 2, 'Huyện Quản Bạ'),
(36, 2, 'Huyện Vị Xuyên'),
(37, 2, 'Huyện Bắc Mê'),
(38, 2, 'Huyện Hoàng Su Phì'),
(39, 2, 'Huyện Xín Mần'),
(40, 2, 'Huyện Bắc Quang'),
(41, 2, 'Huyện Quang Bình'),
(42, 3, 'Thành phố Cao Bằng'),
(43, 3, 'Huyện Bảo Lâm'),
(44, 3, 'Huyện Bảo Lạc'),
(45, 3, 'Huyện Hà Quảng'),
(46, 3, 'Huyện Trùng Khánh'),
(47, 3, 'Huyện Hạ Lang'),
(48, 3, 'Huyện Quảng Hòa'),
(49, 3, 'Huyện Hoà An'),
(50, 3, 'Huyện Nguyên Bình'),
(51, 3, 'Huyện Thạch An'),
(52, 4, 'Thành Phố Bắc Kạn'),
(53, 4, 'Huyện Pác Nặm'),
(54, 4, 'Huyện Ba Bể'),
(55, 4, 'Huyện Ngân Sơn'),
(56, 4, 'Huyện Bạch Thông'),
(57, 4, 'Huyện Chợ Đồn'),
(58, 4, 'Huyện Chợ Mới'),
(59, 4, 'Huyện Na Rì'),
(60, 5, 'Thành phố Tuyên Quang'),
(61, 5, 'Huyện Lâm Bình'),
(62, 5, 'Huyện Na Hang'),
(63, 5, 'Huyện Chiêm Hóa'),
(64, 5, 'Huyện Hàm Yên'),
(65, 5, 'Huyện Yên Sơn'),
(66, 5, 'Huyện Sơn Dương'),
(67, 6, 'Thành phố Lào Cai'),
(68, 6, 'Huyện Bát Xát'),
(69, 6, 'Huyện Mường Khương'),
(70, 6, 'Huyện Si Ma Cai'),
(71, 6, 'Huyện Bắc Hà'),
(72, 6, 'Huyện Bảo Thắng'),
(73, 6, 'Huyện Bảo Yên'),
(74, 6, 'Thị xã Sa Pa'),
(75, 6, 'Huyện Văn Bàn'),
(76, 7, 'Thành phố Điện Biên Phủ'),
(77, 7, 'Thị Xã Mường Lay'),
(78, 7, 'Huyện Mường Nhé'),
(79, 7, 'Huyện Mường Chà'),
(80, 7, 'Huyện Tủa Chùa'),
(81, 7, 'Huyện Tuần Giáo'),
(82, 7, 'Huyện Điện Biên'),
(83, 7, 'Huyện Điện Biên Đông'),
(84, 7, 'Huyện Mường Ảng'),
(85, 7, 'Huyện Nậm Pồ'),
(86, 8, 'Thành phố Lai Châu'),
(87, 8, 'Huyện Tam Đường'),
(88, 8, 'Huyện Mường Tè'),
(89, 8, 'Huyện Sìn Hồ'),
(90, 8, 'Huyện Phong Thổ'),
(91, 8, 'Huyện Than Uyên'),
(92, 8, 'Huyện Tân Uyên'),
(93, 8, 'Huyện Nậm Nhùn'),
(94, 9, 'Thành phố Sơn La'),
(95, 9, 'Huyện Quỳnh Nhai'),
(96, 9, 'Huyện Thuận Châu'),
(97, 9, 'Huyện Mường La'),
(98, 9, 'Huyện Bắc Yên'),
(99, 9, 'Huyện Phù Yên'),
(100, 9, 'Huyện Mộc Châu'),
(101, 9, 'Huyện Yên Châu'),
(102, 9, 'Huyện Mai Sơn'),
(103, 9, 'Huyện Sông Mã'),
(104, 9, 'Huyện Sốp Cộp'),
(105, 9, 'Huyện Vân Hồ'),
(106, 10, 'Thành phố Yên Bái'),
(107, 10, 'Thị xã Nghĩa Lộ'),
(108, 10, 'Huyện Lục Yên'),
(109, 10, 'Huyện Văn Yên'),
(110, 10, 'Huyện Mù Căng Chải'),
(111, 10, 'Huyện Trấn Yên'),
(112, 10, 'Huyện Trạm Tấu'),
(113, 10, 'Huyện Văn Chấn'),
(114, 10, 'Huyện Yên Bình'),
(115, 11, 'Thành phố Hòa Bình'),
(116, 11, 'Huyện Đà Bắc'),
(117, 11, 'Huyện Lương Sơn'),
(118, 11, 'Huyện Kim Bôi'),
(119, 11, 'Huyện Cao Phong'),
(120, 11, 'Huyện Tân Lạc'),
(121, 11, 'Huyện Mai Châu'),
(122, 11, 'Huyện Lạc Sơn'),
(123, 11, 'Huyện Yên Thủy'),
(124, 11, 'Huyện Lạc Thủy'),
(125, 12, 'Thành phố Thái Nguyên'),
(126, 12, 'Thành phố Sông Công'),
(127, 12, 'Huyện Định Hóa'),
(128, 12, 'Huyện Phú Lương'),
(129, 12, 'Huyện Đồng Hỷ'),
(130, 12, 'Huyện Võ Nhai'),
(131, 12, 'Huyện Đại Từ'),
(132, 12, 'Thị xã Phổ Yên'),
(133, 12, 'Huyện Phú Bình'),
(134, 13, 'Thành phố Lạng Sơn'),
(135, 13, 'Huyện Tràng Định'),
(136, 13, 'Huyện Bình Gia'),
(137, 13, 'Huyện Văn Lãng'),
(138, 13, 'Huyện Cao Lộc'),
(139, 13, 'Huyện Văn Quan'),
(140, 13, 'Huyện Bắc Sơn'),
(141, 13, 'Huyện Hữu Lũng'),
(142, 13, 'Huyện Chi Lăng'),
(143, 13, 'Huyện Lộc Bình'),
(144, 13, 'Huyện Đình Lập'),
(145, 14, 'Thành phố Hạ Long'),
(146, 14, 'Thành phố Móng Cái'),
(147, 14, 'Thành phố Cẩm Phả'),
(148, 14, 'Thành phố Uông Bí'),
(149, 14, 'Huyện Bình Liêu'),
(150, 14, 'Huyện Tiên Yên'),
(151, 14, 'Huyện Đầm Hà'),
(152, 14, 'Huyện Hải Hà'),
(153, 14, 'Huyện Ba Chẽ'),
(154, 14, 'Huyện Vân Đồn'),
(155, 14, 'Thị xã Đông Triều'),
(156, 14, 'Thị xã Quảng Yên'),
(157, 14, 'Huyện Cô Tô'),
(158, 15, 'Thành phố Bắc Giang'),
(159, 15, 'Huyện Yên Thế'),
(160, 15, 'Huyện Tân Yên'),
(161, 15, 'Huyện Lạng Giang'),
(162, 15, 'Huyện Lục Nam'),
(163, 15, 'Huyện Lục Ngạn'),
(164, 15, 'Huyện Sơn Động'),
(165, 15, 'Huyện Yên Dũng'),
(166, 15, 'Huyện Việt Yên'),
(167, 15, 'Huyện Hiệp Hòa'),
(168, 16, 'Thành phố Việt Trì'),
(169, 16, 'Thị xã Phú Thọ'),
(170, 16, 'Huyện Đoan Hùng'),
(171, 16, 'Huyện Hạ Hoà'),
(172, 16, 'Huyện Thanh Ba'),
(173, 16, 'Huyện Phù Ninh'),
(174, 16, 'Huyện Yên Lập'),
(175, 16, 'Huyện Cẩm Khê'),
(176, 16, 'Huyện Tam Nông'),
(177, 16, 'Huyện Lâm Thao'),
(178, 16, 'Huyện Thanh Sơn'),
(179, 16, 'Huyện Thanh Thuỷ'),
(180, 16, 'Huyện Tân Sơn'),
(181, 17, 'Thành phố Vĩnh Yên'),
(182, 17, 'Thành phố Phúc Yên'),
(183, 17, 'Huyện Lập Thạch'),
(184, 17, 'Huyện Tam Dương'),
(185, 17, 'Huyện Tam Đảo'),
(186, 17, 'Huyện Bình Xuyên'),
(187, 17, 'Huyện Yên Lạc'),
(188, 17, 'Huyện Vĩnh Tường'),
(189, 17, 'Huyện Sông Lô'),
(190, 18, 'Thành phố Bắc Ninh'),
(191, 18, 'Huyện Yên Phong'),
(192, 18, 'Huyện Quế Võ'),
(193, 18, 'Huyện Tiên Du'),
(194, 18, 'Thành phố Từ Sơn'),
(195, 18, 'Huyện Thuận Thành'),
(196, 18, 'Huyện Gia Bình'),
(197, 18, 'Huyện Lương Tài'),
(198, 19, 'Thành phố Hải Dương'),
(199, 19, 'Thành phố Chí Linh'),
(200, 19, 'Huyện Nam Sách'),
(201, 19, 'Thị xã Kinh Môn'),
(202, 19, 'Huyện Kim Thành'),
(203, 19, 'Huyện Thanh Hà'),
(204, 19, 'Huyện Cẩm Giàng'),
(205, 19, 'Huyện Bình Giang'),
(206, 19, 'Huyện Gia Lộc'),
(207, 19, 'Huyện Tứ Kỳ'),
(208, 19, 'Huyện Ninh Giang'),
(209, 19, 'Huyện Thanh Miện'),
(210, 20, 'Quận Hồng Bàng'),
(211, 20, 'Quận Ngô Quyền'),
(212, 20, 'Quận Lê Chân'),
(213, 20, 'Quận Hải An'),
(214, 20, 'Quận Kiến An'),
(215, 20, 'Quận Đồ Sơn'),
(216, 20, 'Quận Dương Kinh'),
(217, 20, 'Huyện Thuỷ Nguyên'),
(218, 20, 'Huyện An Dương'),
(219, 20, 'Huyện An Lão'),
(220, 20, 'Huyện Kiến Thuỵ'),
(221, 20, 'Huyện Tiên Lãng'),
(222, 20, 'Huyện Vĩnh Bảo'),
(223, 20, 'Huyện Cát Hải'),
(224, 20, 'Huyện Bạch Long Vĩ'),
(225, 21, 'Thành phố Hưng Yên'),
(226, 21, 'Huyện Văn Lâm'),
(227, 21, 'Huyện Văn Giang'),
(228, 21, 'Huyện Yên Mỹ'),
(229, 21, 'Thị xã Mỹ Hào'),
(230, 21, 'Huyện Ân Thi'),
(231, 21, 'Huyện Khoái Châu'),
(232, 21, 'Huyện Kim Động'),
(233, 21, 'Huyện Tiên Lữ'),
(234, 21, 'Huyện Phù Cừ'),
(235, 22, 'Thành phố Thái Bình'),
(236, 22, 'Huyện Quỳnh Phụ'),
(237, 22, 'Huyện Hưng Hà'),
(238, 22, 'Huyện Đông Hưng'),
(239, 22, 'Huyện Thái Thụy'),
(240, 22, 'Huyện Tiền Hải'),
(241, 22, 'Huyện Kiến Xương'),
(242, 22, 'Huyện Vũ Thư'),
(243, 23, 'Thành phố Phủ Lý'),
(244, 23, 'Thị xã Duy Tiên'),
(245, 23, 'Huyện Kim Bảng'),
(246, 23, 'Huyện Thanh Liêm'),
(247, 23, 'Huyện Bình Lục'),
(248, 23, 'Huyện Lý Nhân'),
(249, 24, 'Thành phố Nam Định'),
(250, 24, 'Huyện Mỹ Lộc'),
(251, 24, 'Huyện Vụ Bản'),
(252, 24, 'Huyện Ý Yên'),
(253, 24, 'Huyện Nghĩa Hưng'),
(254, 24, 'Huyện Nam Trực'),
(255, 24, 'Huyện Trực Ninh'),
(256, 24, 'Huyện Xuân Trường'),
(257, 24, 'Huyện Giao Thủy'),
(258, 24, 'Huyện Hải Hậu'),
(259, 25, 'Thành phố Ninh Bình'),
(260, 25, 'Thành phố Tam Điệp'),
(261, 25, 'Huyện Nho Quan'),
(262, 25, 'Huyện Gia Viễn'),
(263, 25, 'Huyện Hoa Lư'),
(264, 25, 'Huyện Yên Khánh'),
(265, 25, 'Huyện Kim Sơn'),
(266, 25, 'Huyện Yên Mô'),
(267, 26, 'Thành phố Thanh Hóa'),
(268, 26, 'Thị xã Bỉm Sơn'),
(269, 26, 'Thành phố Sầm Sơn'),
(270, 26, 'Huyện Mường Lát'),
(271, 26, 'Huyện Quan Hóa'),
(272, 26, 'Huyện Bá Thước'),
(273, 26, 'Huyện Quan Sơn'),
(274, 26, 'Huyện Lang Chánh'),
(275, 26, 'Huyện Ngọc Lặc'),
(276, 26, 'Huyện Cẩm Thủy'),
(277, 26, 'Huyện Thạch Thành'),
(278, 26, 'Huyện Hà Trung'),
(279, 26, 'Huyện Vĩnh Lộc'),
(280, 26, 'Huyện Yên Định'),
(281, 26, 'Huyện Thọ Xuân'),
(282, 26, 'Huyện Thường Xuân'),
(283, 26, 'Huyện Triệu Sơn'),
(284, 26, 'Huyện Thiệu Hóa'),
(285, 26, 'Huyện Hoằng Hóa'),
(286, 26, 'Huyện Hậu Lộc'),
(287, 26, 'Huyện Nga Sơn'),
(288, 26, 'Huyện Như Xuân'),
(289, 26, 'Huyện Như Thanh'),
(290, 26, 'Huyện Nông Cống'),
(291, 26, 'Huyện Đông Sơn'),
(292, 26, 'Huyện Quảng Xương'),
(293, 26, 'Thị xã Nghi Sơn'),
(294, 27, 'Thành phố Vinh'),
(295, 27, 'Thị xã Cửa Lò'),
(296, 27, 'Thị xã Thái Hoà'),
(297, 27, 'Huyện Quế Phong'),
(298, 27, 'Huyện Quỳ Châu'),
(299, 27, 'Huyện Kỳ Sơn'),
(300, 27, 'Huyện Tương Dương'),
(301, 27, 'Huyện Nghĩa Đàn'),
(302, 27, 'Huyện Quỳ Hợp'),
(303, 27, 'Huyện Quỳnh Lưu'),
(304, 27, 'Huyện Con Cuông'),
(305, 27, 'Huyện Tân Kỳ'),
(306, 27, 'Huyện Anh Sơn'),
(307, 27, 'Huyện Diễn Châu'),
(308, 27, 'Huyện Yên Thành'),
(309, 27, 'Huyện Đô Lương'),
(310, 27, 'Huyện Thanh Chương'),
(311, 27, 'Huyện Nghi Lộc'),
(312, 27, 'Huyện Nam Đàn'),
(313, 27, 'Huyện Hưng Nguyên'),
(314, 27, 'Thị xã Hoàng Mai'),
(315, 28, 'Thành phố Hà Tĩnh'),
(316, 28, 'Thị xã Hồng Lĩnh'),
(317, 28, 'Huyện Hương Sơn'),
(318, 28, 'Huyện Đức Thọ'),
(319, 28, 'Huyện Vũ Quang'),
(320, 28, 'Huyện Nghi Xuân'),
(321, 28, 'Huyện Can Lộc'),
(322, 28, 'Huyện Hương Khê'),
(323, 28, 'Huyện Thạch Hà'),
(324, 28, 'Huyện Cẩm Xuyên'),
(325, 28, 'Huyện Kỳ Anh'),
(326, 28, 'Huyện Lộc Hà'),
(327, 28, 'Thị xã Kỳ Anh'),
(328, 29, 'Thành Phố Đồng Hới'),
(329, 29, 'Huyện Minh Hóa'),
(330, 29, 'Huyện Tuyên Hóa'),
(331, 29, 'Huyện Quảng Trạch'),
(332, 29, 'Huyện Bố Trạch'),
(333, 29, 'Huyện Quảng Ninh'),
(334, 29, 'Huyện Lệ Thủy'),
(335, 29, 'Thị xã Ba Đồn'),
(336, 30, 'Thành phố Đông Hà'),
(337, 30, 'Thị xã Quảng Trị'),
(338, 30, 'Huyện Vĩnh Linh'),
(339, 30, 'Huyện Hướng Hóa'),
(340, 30, 'Huyện Gio Linh'),
(341, 30, 'Huyện Đa Krông'),
(342, 30, 'Huyện Cam Lộ'),
(343, 30, 'Huyện Triệu Phong'),
(344, 30, 'Huyện Hải Lăng'),
(345, 30, 'Huyện Cồn Cỏ'),
(346, 31, 'Thành phố Huế'),
(347, 31, 'Huyện Phong Điền'),
(348, 31, 'Huyện Quảng Điền'),
(349, 31, 'Huyện Phú Vang'),
(350, 31, 'Thị xã Hương Thủy'),
(351, 31, 'Thị xã Hương Trà'),
(352, 31, 'Huyện A Lưới'),
(353, 31, 'Huyện Phú Lộc'),
(354, 31, 'Huyện Nam Đông'),
(355, 32, 'Quận Liên Chiểu'),
(356, 32, 'Quận Thanh Khê'),
(357, 32, 'Quận Hải Châu'),
(358, 32, 'Quận Sơn Trà'),
(359, 32, 'Quận Ngũ Hành Sơn'),
(360, 32, 'Quận Cẩm Lệ'),
(361, 32, 'Huyện Hòa Vang'),
(362, 32, 'Huyện Hoàng Sa'),
(363, 33, 'Thành phố Tam Kỳ'),
(364, 33, 'Thành phố Hội An'),
(365, 33, 'Huyện Tây Giang'),
(366, 33, 'Huyện Đông Giang'),
(367, 33, 'Huyện Đại Lộc'),
(368, 33, 'Thị xã Điện Bàn'),
(369, 33, 'Huyện Duy Xuyên'),
(370, 33, 'Huyện Quế Sơn'),
(371, 33, 'Huyện Nam Giang'),
(372, 33, 'Huyện Phước Sơn'),
(373, 33, 'Huyện Hiệp Đức'),
(374, 33, 'Huyện Thăng Bình'),
(375, 33, 'Huyện Tiên Phước'),
(376, 33, 'Huyện Bắc Trà My'),
(377, 33, 'Huyện Nam Trà My'),
(378, 33, 'Huyện Núi Thành'),
(379, 33, 'Huyện Phú Ninh'),
(380, 33, 'Huyện Nông Sơn'),
(381, 34, 'Thành phố Quảng Ngãi'),
(382, 34, 'Huyện Bình Sơn'),
(383, 34, 'Huyện Trà Bồng'),
(384, 34, 'Huyện Sơn Tịnh'),
(385, 34, 'Huyện Tư Nghĩa'),
(386, 34, 'Huyện Sơn Hà'),
(387, 34, 'Huyện Sơn Tây'),
(388, 34, 'Huyện Minh Long'),
(389, 34, 'Huyện Nghĩa Hành'),
(390, 34, 'Huyện Mộ Đức'),
(391, 34, 'Thị xã Đức Phổ'),
(392, 34, 'Huyện Ba Tơ'),
(393, 34, 'Huyện Lý Sơn'),
(394, 35, 'Thành phố Quy Nhơn'),
(395, 35, 'Huyện An Lão'),
(396, 35, 'Thị xã Hoài Nhơn'),
(397, 35, 'Huyện Hoài Ân'),
(398, 35, 'Huyện Phù Mỹ'),
(399, 35, 'Huyện Vĩnh Thạnh'),
(400, 35, 'Huyện Tây Sơn'),
(401, 35, 'Huyện Phù Cát'),
(402, 35, 'Thị xã An Nhơn'),
(403, 35, 'Huyện Tuy Phước'),
(404, 35, 'Huyện Vân Canh'),
(405, 36, 'Thành phố Tuy Hoà'),
(406, 36, 'Thị xã Sông Cầu'),
(407, 36, 'Huyện Đồng Xuân'),
(408, 36, 'Huyện Tuy An'),
(409, 36, 'Huyện Sơn Hòa'),
(410, 36, 'Huyện Sông Hinh'),
(411, 36, 'Huyện Tây Hoà'),
(412, 36, 'Huyện Phú Hoà'),
(413, 36, 'Thị xã Đông Hòa'),
(414, 37, 'Thành phố Nha Trang'),
(415, 37, 'Thành phố Cam Ranh'),
(416, 37, 'Huyện Cam Lâm'),
(417, 37, 'Huyện Vạn Ninh'),
(418, 37, 'Thị xã Ninh Hòa'),
(419, 37, 'Huyện Khánh Vĩnh'),
(420, 37, 'Huyện Diên Khánh'),
(421, 37, 'Huyện Khánh Sơn'),
(422, 37, 'Huyện Trường Sa'),
(423, 38, 'Thành phố Phan Rang-Tháp Chàm'),
(424, 38, 'Huyện Bác Ái'),
(425, 38, 'Huyện Ninh Sơn'),
(426, 38, 'Huyện Ninh Hải'),
(427, 38, 'Huyện Ninh Phước'),
(428, 38, 'Huyện Thuận Bắc'),
(429, 38, 'Huyện Thuận Nam'),
(430, 39, 'Thành phố Phan Thiết'),
(431, 39, 'Thị xã La Gi'),
(432, 39, 'Huyện Tuy Phong'),
(433, 39, 'Huyện Bắc Bình'),
(434, 39, 'Huyện Hàm Thuận Bắc'),
(435, 39, 'Huyện Hàm Thuận Nam'),
(436, 39, 'Huyện Tánh Linh'),
(437, 39, 'Huyện Đức Linh'),
(438, 39, 'Huyện Hàm Tân'),
(439, 39, 'Huyện Phú Quí'),
(440, 40, 'Thành phố Kon Tum'),
(441, 40, 'Huyện Đắk Glei'),
(442, 40, 'Huyện Ngọc Hồi'),
(443, 40, 'Huyện Đắk Tô'),
(444, 40, 'Huyện Kon Plông'),
(445, 40, 'Huyện Kon Rẫy'),
(446, 40, 'Huyện Đắk Hà'),
(447, 40, 'Huyện Sa Thầy'),
(448, 40, 'Huyện Tu Mơ Rông'),
(449, 40, 'Huyện Ia H\' Drai'),
(450, 41, 'Thành phố Pleiku'),
(451, 41, 'Thị xã An Khê'),
(452, 41, 'Thị xã Ayun Pa'),
(453, 41, 'Huyện KBang'),
(454, 41, 'Huyện Đăk Đoa'),
(455, 41, 'Huyện Chư Păh'),
(456, 41, 'Huyện Ia Grai'),
(457, 41, 'Huyện Mang Yang'),
(458, 41, 'Huyện Kông Chro'),
(459, 41, 'Huyện Đức Cơ'),
(460, 41, 'Huyện Chư Prông'),
(461, 41, 'Huyện Chư Sê'),
(462, 41, 'Huyện Đăk Pơ'),
(463, 41, 'Huyện Ia Pa'),
(464, 41, 'Huyện Krông Pa'),
(465, 41, 'Huyện Phú Thiện'),
(466, 41, 'Huyện Chư Pưh'),
(467, 42, 'Thành phố Buôn Ma Thuột'),
(468, 42, 'Thị Xã Buôn Hồ'),
(469, 42, 'Huyện Ea H\'leo'),
(470, 42, 'Huyện Ea Súp'),
(471, 42, 'Huyện Buôn Đôn'),
(472, 42, 'Huyện Cư M\'gar'),
(473, 42, 'Huyện Krông Búk'),
(474, 42, 'Huyện Krông Năng'),
(475, 42, 'Huyện Ea Kar'),
(476, 42, 'Huyện M\'Đrắk'),
(477, 42, 'Huyện Krông Bông'),
(478, 42, 'Huyện Krông Pắc'),
(479, 42, 'Huyện Krông A Na'),
(480, 42, 'Huyện Lắk'),
(481, 42, 'Huyện Cư Kuin'),
(482, 43, 'Thành phố Gia Nghĩa'),
(483, 43, 'Huyện Đăk Glong'),
(484, 43, 'Huyện Cư Jút'),
(485, 43, 'Huyện Đắk Mil'),
(486, 43, 'Huyện Krông Nô'),
(487, 43, 'Huyện Đắk Song'),
(488, 43, 'Huyện Đắk R\'Lấp'),
(489, 43, 'Huyện Tuy Đức'),
(490, 44, 'Thành phố Đà Lạt'),
(491, 44, 'Thành phố Bảo Lộc'),
(492, 44, 'Huyện Đam Rông'),
(493, 44, 'Huyện Lạc Dương'),
(494, 44, 'Huyện Lâm Hà'),
(495, 44, 'Huyện Đơn Dương'),
(496, 44, 'Huyện Đức Trọng'),
(497, 44, 'Huyện Di Linh'),
(498, 44, 'Huyện Bảo Lâm'),
(499, 44, 'Huyện Đạ Huoai'),
(500, 44, 'Huyện Đạ Tẻh'),
(501, 44, 'Huyện Cát Tiên'),
(502, 45, 'Thị xã Phước Long'),
(503, 45, 'Thành phố Đồng Xoài'),
(504, 45, 'Thị xã Bình Long'),
(505, 45, 'Huyện Bù Gia Mập'),
(506, 45, 'Huyện Lộc Ninh'),
(507, 45, 'Huyện Bù Đốp'),
(508, 45, 'Huyện Hớn Quản'),
(509, 45, 'Huyện Đồng Phú'),
(510, 45, 'Huyện Bù Đăng'),
(511, 45, 'Huyện Chơn Thành'),
(512, 45, 'Huyện Phú Riềng'),
(513, 46, 'Thành phố Tây Ninh'),
(514, 46, 'Huyện Tân Biên'),
(515, 46, 'Huyện Tân Châu'),
(516, 46, 'Huyện Dương Minh Châu'),
(517, 46, 'Huyện Châu Thành'),
(518, 46, 'Thị xã Hòa Thành'),
(519, 46, 'Huyện Gò Dầu'),
(520, 46, 'Huyện Bến Cầu'),
(521, 46, 'Thị xã Trảng Bàng'),
(522, 47, 'Thành phố Thủ Dầu Một'),
(523, 47, 'Huyện Bàu Bàng'),
(524, 47, 'Huyện Dầu Tiếng'),
(525, 47, 'Thị xã Bến Cát'),
(526, 47, 'Huyện Phú Giáo'),
(527, 47, 'Thị xã Tân Uyên'),
(528, 47, 'Thành phố Dĩ An'),
(529, 47, 'Thành phố Thuận An'),
(530, 47, 'Huyện Bắc Tân Uyên'),
(531, 48, 'Thành phố Biên Hòa'),
(532, 48, 'Thành phố Long Khánh'),
(533, 48, 'Huyện Tân Phú'),
(534, 48, 'Huyện Vĩnh Cửu'),
(535, 48, 'Huyện Định Quán'),
(536, 48, 'Huyện Trảng Bom'),
(537, 48, 'Huyện Thống Nhất'),
(538, 48, 'Huyện Cẩm Mỹ'),
(539, 48, 'Huyện Long Thành'),
(540, 48, 'Huyện Xuân Lộc'),
(541, 48, 'Huyện Nhơn Trạch'),
(542, 49, 'Thành phố Vũng Tàu'),
(543, 49, 'Thành phố Bà Rịa'),
(544, 49, 'Huyện Châu Đức'),
(545, 49, 'Huyện Xuyên Mộc'),
(546, 49, 'Huyện Long Điền'),
(547, 49, 'Huyện Đất Đỏ'),
(548, 49, 'Thị xã Phú Mỹ'),
(549, 49, 'Huyện Côn Đảo'),
(550, 50, 'Quận 1'),
(551, 50, 'Quận 12'),
(552, 50, 'Quận Gò Vấp'),
(553, 50, 'Quận Bình Thạnh'),
(554, 50, 'Quận Tân Bình'),
(555, 50, 'Quận Tân Phú'),
(556, 50, 'Quận Phú Nhuận'),
(557, 50, 'Thành phố Thủ Đức'),
(558, 50, 'Quận 3'),
(559, 50, 'Quận 10'),
(560, 50, 'Quận 11'),
(561, 50, 'Quận 4'),
(562, 50, 'Quận 5'),
(563, 50, 'Quận 6'),
(564, 50, 'Quận 8'),
(565, 50, 'Quận Bình Tân'),
(566, 50, 'Quận 7'),
(567, 50, 'Huyện Củ Chi'),
(568, 50, 'Huyện Hóc Môn'),
(569, 50, 'Huyện Bình Chánh'),
(570, 50, 'Huyện Nhà Bè'),
(571, 50, 'Huyện Cần Giờ'),
(572, 51, 'Thành phố Tân An'),
(573, 51, 'Thị xã Kiến Tường'),
(574, 51, 'Huyện Tân Hưng'),
(575, 51, 'Huyện Vĩnh Hưng'),
(576, 51, 'Huyện Mộc Hóa'),
(577, 51, 'Huyện Tân Thạnh'),
(578, 51, 'Huyện Thạnh Hóa'),
(579, 51, 'Huyện Đức Huệ'),
(580, 51, 'Huyện Đức Hòa'),
(581, 51, 'Huyện Bến Lức'),
(582, 51, 'Huyện Thủ Thừa'),
(583, 51, 'Huyện Tân Trụ'),
(584, 51, 'Huyện Cần Đước'),
(585, 51, 'Huyện Cần Giuộc'),
(586, 51, 'Huyện Châu Thành'),
(587, 52, 'Thành phố Mỹ Tho'),
(588, 52, 'Thị xã Gò Công'),
(589, 52, 'Thị xã Cai Lậy'),
(590, 52, 'Huyện Tân Phước'),
(591, 52, 'Huyện Cái Bè'),
(592, 52, 'Huyện Cai Lậy'),
(593, 52, 'Huyện Châu Thành'),
(594, 52, 'Huyện Chợ Gạo'),
(595, 52, 'Huyện Gò Công Tây'),
(596, 52, 'Huyện Gò Công Đông'),
(597, 52, 'Huyện Tân Phú Đông'),
(598, 53, 'Thành phố Bến Tre'),
(599, 53, 'Huyện Châu Thành'),
(600, 53, 'Huyện Chợ Lách'),
(601, 53, 'Huyện Mỏ Cày Nam'),
(602, 53, 'Huyện Giồng Trôm'),
(603, 53, 'Huyện Bình Đại'),
(604, 53, 'Huyện Ba Tri'),
(605, 53, 'Huyện Thạnh Phú'),
(606, 53, 'Huyện Mỏ Cày Bắc'),
(607, 54, 'Thành phố Trà Vinh'),
(608, 54, 'Huyện Càng Long'),
(609, 54, 'Huyện Cầu Kè'),
(610, 54, 'Huyện Tiểu Cần'),
(611, 54, 'Huyện Châu Thành'),
(612, 54, 'Huyện Cầu Ngang'),
(613, 54, 'Huyện Trà Cú'),
(614, 54, 'Huyện Duyên Hải'),
(615, 54, 'Thị xã Duyên Hải'),
(616, 55, 'Thành phố Vĩnh Long'),
(617, 55, 'Huyện Long Hồ'),
(618, 55, 'Huyện Mang Thít'),
(619, 55, 'Huyện  Vũng Liêm'),
(620, 55, 'Huyện Tam Bình'),
(621, 55, 'Thị xã Bình Minh'),
(622, 55, 'Huyện Trà Ôn'),
(623, 55, 'Huyện Bình Tân'),
(624, 56, 'Thành phố Cao Lãnh'),
(625, 56, 'Thành phố Sa Đéc'),
(626, 56, 'Thành phố Hồng Ngự'),
(627, 56, 'Huyện Tân Hồng'),
(628, 56, 'Huyện Hồng Ngự'),
(629, 56, 'Huyện Tam Nông'),
(630, 56, 'Huyện Tháp Mười'),
(631, 56, 'Huyện Cao Lãnh'),
(632, 56, 'Huyện Thanh Bình'),
(633, 56, 'Huyện Lấp Vò'),
(634, 56, 'Huyện Lai Vung'),
(635, 56, 'Huyện Châu Thành'),
(636, 57, 'Thành phố Long Xuyên'),
(637, 57, 'Thành phố Châu Đốc'),
(638, 57, 'Huyện An Phú'),
(639, 57, 'Thị xã Tân Châu'),
(640, 57, 'Huyện Phú Tân'),
(641, 57, 'Huyện Châu Phú'),
(642, 57, 'Huyện Tịnh Biên'),
(643, 57, 'Huyện Tri Tôn'),
(644, 57, 'Huyện Châu Thành'),
(645, 57, 'Huyện Chợ Mới'),
(646, 57, 'Huyện Thoại Sơn'),
(647, 58, 'Thành phố Rạch Giá'),
(648, 58, 'Thành phố Hà Tiên'),
(649, 58, 'Huyện Kiên Lương'),
(650, 58, 'Huyện Hòn Đất'),
(651, 58, 'Huyện Tân Hiệp'),
(652, 58, 'Huyện Châu Thành'),
(653, 58, 'Huyện Giồng Riềng'),
(654, 58, 'Huyện Gò Quao'),
(655, 58, 'Huyện An Biên'),
(656, 58, 'Huyện An Minh'),
(657, 58, 'Huyện Vĩnh Thuận'),
(658, 58, 'Thành phố Phú Quốc'),
(659, 58, 'Huyện Kiên Hải'),
(660, 58, 'Huyện U Minh Thượng'),
(661, 58, 'Huyện Giang Thành'),
(662, 59, 'Quận Ninh Kiều'),
(663, 59, 'Quận Ô Môn'),
(664, 59, 'Quận Bình Thuỷ'),
(665, 59, 'Quận Cái Răng'),
(666, 59, 'Quận Thốt Nốt'),
(667, 59, 'Huyện Vĩnh Thạnh'),
(668, 59, 'Huyện Cờ Đỏ'),
(669, 59, 'Huyện Phong Điền'),
(670, 59, 'Huyện Thới Lai'),
(671, 60, 'Thành phố Vị Thanh'),
(672, 60, 'Thành phố Ngã Bảy'),
(673, 60, 'Huyện Châu Thành A'),
(674, 60, 'Huyện Châu Thành'),
(675, 60, 'Huyện Phụng Hiệp'),
(676, 60, 'Huyện Vị Thuỷ'),
(677, 60, 'Huyện Long Mỹ'),
(678, 60, 'Thị xã Long Mỹ'),
(679, 61, 'Thành phố Sóc Trăng'),
(680, 61, 'Huyện Châu Thành'),
(681, 61, 'Huyện Kế Sách'),
(682, 61, 'Huyện Mỹ Tú'),
(683, 61, 'Huyện Cù Lao Dung'),
(684, 61, 'Huyện Long Phú'),
(685, 61, 'Huyện Mỹ Xuyên'),
(686, 61, 'Thị xã Ngã Năm'),
(687, 61, 'Huyện Thạnh Trị'),
(688, 61, 'Thị xã Vĩnh Châu'),
(689, 61, 'Huyện Trần Đề'),
(690, 62, 'Thành phố Bạc Liêu'),
(691, 62, 'Huyện Hồng Dân'),
(692, 62, 'Huyện Phước Long'),
(693, 62, 'Huyện Vĩnh Lợi'),
(694, 62, 'Thị xã Giá Rai'),
(695, 62, 'Huyện Đông Hải'),
(696, 62, 'Huyện Hoà Bình'),
(697, 63, 'Thành phố Cà Mau'),
(698, 63, 'Huyện U Minh'),
(699, 63, 'Huyện Thới Bình'),
(700, 63, 'Huyện Trần Văn Thời'),
(701, 63, 'Huyện Cái Nước'),
(702, 63, 'Huyện Đầm Dơi'),
(703, 63, 'Huyện Năm Căn'),
(704, 63, 'Huyện Phú Tân'),
(705, 63, 'Huyện Ngọc Hiển');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `tenSanPham` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cartegory_Id` int(11) DEFAULT NULL,
  `brand_Id` int(11) DEFAULT NULL,
  `giam` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaSanPham` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaKhuyenMai` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluongsp` int(11) DEFAULT NULL,
  `soluongbanra` int(11) DEFAULT NULL,
  `anhSanPham` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongTinSanPham` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `kichThuocManHinh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `congNgheManHinh` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `doPhanGiaiManHinh` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cameraSau` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cameraTruoc` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `chipset` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardDoHoa` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dungLuongRam` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `boNhoTrong` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoaiRam` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `oCung` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `heDieuHanh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `tenSanPham`, `cartegory_Id`, `brand_Id`, `giam`, `giaSanPham`, `giaKhuyenMai`, `soluongsp`, `soluongbanra`, `anhSanPham`, `thongTinSanPham`, `kichThuocManHinh`, `congNgheManHinh`, `doPhanGiaiManHinh`, `cameraSau`, `cameraTruoc`, `chipset`, `cardDoHoa`, `dungLuongRam`, `boNhoTrong`, `LoaiRam`, `oCung`, `pin`, `heDieuHanh`, `status`, `create_at`) VALUES
(1, 'iPhone 15 Pro Max 256GB | Chính hãng VN/A', 1, 1, '16', '34.990.000', '29.391.600', 56, 5, 'iphone-15-pro-max-duchuy_wzct-z4.jpg', '<p><strong>iPhone 15 Pro Max</strong>&nbsp;kh&ocirc;ng chỉ ghi điểm với&nbsp;<strong>cấu h&igrave;nh mạnh mẽ</strong>&nbsp;m&agrave; c&ograve;n g&acirc;y ấn tượng với&nbsp;<strong>nhiều t&iacute;nh năng mới</strong>&nbsp;đ&aacute;ng ch&uacute; &yacute;. Từ thiết kế khung titan cho tới hiệu năng đột ph&aacute;, tất cả đều được n&acirc;ng cấp để mang tới cho người d&ugrave;ng trải nghiệm smartphone tuyệt vời chưa từng c&oacute;. Những t&iacute;nh năng n&agrave;y sẽ được tr&igrave;nh b&agrave;y chi tiết hơn trong c&aacute;c phần b&agrave;i viết dưới đ&acirc;y, gi&uacute;p bạn c&oacute; c&aacute;i nh&igrave;n to&agrave;n diện về sự đột ph&aacute; của iPhone 15 ProMax.</p>\r\n', '6.7 inches', 'Super Retina XDR OLED', '', 'Camera chính: 48MP, 24 mm, ƒ/1.78 Camera góc siêu rộng: 12 MP, 13 mm, ƒ/2.2 Camera Tele: 12 MP', '12MP, ƒ/1.9', 'Apple A17 Pro 6 nhân', '', '8 GB', '256 GB', '', '', ' 4422 mAh', 'iOS 17', 0, '2024-07-31 17:25:29'),
(2, 'iPhone 15 128GB | Chính hãng VN/A', 1, 1, '13', '22.990.000', '20.001.300', 98, 2, 'iphone-15-15-plus-hong.jpg', '<p>&nbsp; &nbsp;<strong>iPhone 15 128GB</strong>&nbsp;được trang bị&nbsp;<strong>m&agrave;n h&igrave;nh Dynamic Island k&iacute;ch thước 6.1 inch</strong>&nbsp;với c&ocirc;ng nghệ hiển thị&nbsp;<strong>Super Retina XDR</strong>&nbsp;m&agrave;n lại trải nghiệm h&igrave;nh ảnh vượt trội. Điện thoại với mặt lưng k&iacute;nh nh&aacute;m chống b&aacute;m mồ h&ocirc;i c&ugrave;ng&nbsp;<strong>5 phi&ecirc;n bản m&agrave;u sắc</strong>&nbsp;lựa chọn:&nbsp;<strong>Hồng, V&agrave;ng, Xanh l&aacute;, Xanh dương v&agrave; đen</strong>. Camera tr&ecirc;n <strong>iPhone15 series</strong> cũng được n&acirc;ng cấp l&ecirc;n&nbsp;<strong>cảm biến 48MP</strong>&nbsp;c&ugrave;ng t&iacute;nh năng chụp<strong>&nbsp;zoom quang học tới 2x</strong>. C&ugrave;ng với thiết kế cổng sạc thay đổi từ lightning sang USB-C v&ocirc; c&ugrave;ng ấn tượng.</p>\r\n', '6.1 inches', 'Super Retina XDR OLED', '', 'Chính 48 MP & Phụ 12 MP', '12MP, ƒ/1.9', 'Apple A16 Bionic 6 nhân', '', '6 GB', '128 GB', '', '', '3349 mAh', 'iOS 17', 1, '2024-07-31 17:31:55'),
(3, 'iPhone 13 128GB | Chính hãng VN/A', 1, 1, '19', '17.290.000', '14.004.900', 42, 8, 'iphone-13-mau-hong_0rc0-nj.jpg', '<p>Cuối năm 2020, bộ 4 iPhone 12 đ&atilde; được ra mắt với nhiều c&aacute;i tiến. Sau đ&oacute;, mọi sự quan t&acirc;m lại đổ dồn v&agrave;o sản phẩm tiếp theo &ndash;&nbsp;<strong>iPhone 13.</strong>&nbsp;Vậy iP&nbsp;13 sẽ c&oacute; những g&igrave; nổi bật, h&atilde;y t&igrave;m hiểu ngay sau đ&acirc;y nh&eacute;!</p>\r\n\r\n<ul>\r\n	<li>Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao</li>\r\n	<li>Kh&ocirc;ng gian hiển thị sống động - M&agrave;n h&igrave;nh 6.1&quot; Super Retina XDR độ s&aacute;ng cao, sắc n&eacute;t</li>\r\n	<li>Trải nghiệm điện ảnh đỉnh cao - Camera k&eacute;p 12MP, hỗ trợ ổn định h&igrave;nh ảnh quang học</li>\r\n	<li>Tối ưu điện năng - Sạc nhanh 20 W, đầy 50% pin trong khoảng 30 ph&uacute;t</li>\r\n</ul>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '6.1 inches', 'Super Retina XDR OLED', '', 'Camera góc rộng: 12MP, f/1.6 Camera góc siêu rộng: 12MP, ƒ/2.4', '12MP, f/2.2', 'Apple A15', '', '4 GB', '128 GB', '', '', '3240mAh', 'iOS 15', 1, '2024-07-31 17:34:49'),
(4, 'iPhone 14 Pro Max 128GB | Chính hãng VN/A', 1, 1, '11', '29.990.000', '26.691.100', 93, 7, 'iphone-14-pro-max-tim.jpeg', '<p><strong>iPhone 14 Pro Max</strong> sở hữu thiết kế m&agrave;n h&igrave;nh Dynamic Island ấn tượng c&ugrave;ng m&agrave;n h&igrave;nh OLED 6,7 inch hỗ trợ always-on display v&agrave; hiệu năng vượt trội với chip A16 Bionic. B&ecirc;n cạnh đ&oacute; m&aacute;y c&ograve;n sở hữu nhiều n&acirc;ng cấp về camera với cụm camera sau 48MP, camera trước 12MP d&ugrave;ng bộ nhớ RAM 6GB đa nhiệm vượt trội. C&ugrave;ng ph&acirc;n t&iacute;ch chi tiết th&ocirc;ng số si&ecirc;u phẩm n&agrave;y ngay sau đ&acirc;y.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '6.7 inches', 'Super Retina XDR OLED', '', 'Camera chính: 48 MP, f/1.8, 24mm, 1.22µm, PDAF, OIS Camera góc siêu rộng: 12 MP, f/2.2, 13mm, 120˚, 1.4µm, PDAF', 'Camera selfie: 12 MP, f/1.9, 23mm, 1/3.6', 'Apple A16 Bionic 6-core', '', '6 GB', ' 128 GB', '', '', '4.323 mAh', 'iOS 16', 1, '2024-07-31 17:37:04'),
(5, 'iPhone 15 Pro 256GB | Chính hãng VN/A', 1, 1, '12', '31.990.000', '28.151.200', 98, 2, 'iphone-15-pro-max-duchuy_wzct-z4.jpg', '<p><strong>iPhone 15 Pro 256GB&nbsp;</strong>l&agrave; sự kết hợp ho&agrave;n hảo giữa thiết kế đẹp mắt, hiệu năng mạnh mẽ v&agrave; camera h&agrave;ng đầu. iPhone 15 Pro mang lại cho người d&ugrave;ng sự sang trọng từ thiết kế m&agrave;u sắc. Nếu bạn l&agrave; người y&ecirc;u c&ocirc;ng nghệ v&agrave; đam m&ecirc; chụp ảnh, chiếc điện thoại n&agrave;y chắc chắn sẽ l&agrave; một lựa chọn tuyệt vời.</p>\r\n', '6.1 inches', 'Super Retina XDR OLED', '', 'Camera chính: 48MP, 24 mm, ƒ/1.78, Camera góc siêu rộng: 12 MP, 13 mm, ƒ/2.2 Camera Tele 3x: 12 MP, 77 mm, ƒ/2.8', '12MP, ƒ/1.9', 'Apple A17 Pro 6 nhân', '', '8 GB', '256 GB', '', '', '3274 mAh', 'iOS 17', 1, '2024-07-31 17:38:46'),
(6, 'iPhone 12 128GB | Chính hãng VN/A', 1, 1, '26', '17.990.000', '13.312.600', 60, NULL, 'xanh-la_e4eu-h7_k9ab-0u_w89j-ak.jpg', '<p><strong>iPhone 12</strong> hiện nay l&agrave; c&aacute;i t&ecirc;n &ldquo;sốt x&igrave;nh xịch&rdquo; bởi đ&acirc;y l&agrave; một trong 4 si&ecirc;u phẩm vừa được ra mắt của Apple với những đột ph&aacute; về cả thiết kế lẫn cấu h&igrave;nh. Phi&ecirc;n bản Apple iPhone 12 128GB ch&iacute;nh l&agrave; một trong những chiếc iPhone được săn đ&oacute;n nhất bởi dung lượng bộ nhớ khủng, cho ph&eacute;p bạn thoải m&aacute;i với v&ocirc; v&agrave;n ứng dụng.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '6.1 inches', 'Super Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone', '', '12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS 12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6', '12 MP, f/2.2, 23mm (wide), 1/3.6', 'Apple A14 Bionic (5 nm)', '', '4 GB', '128 GB', '', '', 'Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Powe', 'iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)', 1, '2024-07-31 17:41:25'),
(7, 'iPhone 12 Pro Max 256GB I Chính hãng VN/A', 1, 1, '14', '31.990.000', '27.511.400', 63, NULL, 'xam.jpg', '<p>Với một cấu h&igrave;nh hiệu năng c&oacute; thể n&oacute;i mạnh nhất trong năm 2020 cũng như duy tr&igrave; được sự mạnh mẽ n&agrave;y cho đến nhiều năm nữa. Đ&ograve;i hỏi khả năng lưu trữ của iPhone phải cao để tr&aacute;nh thiếu dung lượng. <strong>iPhone 12 Pro Max 256GB</strong> ch&iacute;nh h&atilde;ng (VN/A) sẽ l&agrave; một sự lựa chọn đ&uacute;ng nhất cho bạn.</p>\r\n', '6.7 inches', 'Super Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone', '', '12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS 12 MP, f/2.0, 52mm (telephoto), 1/3.4', '12 MP, f/2.2, 23mm (wide), 1/3.6', 'Apple A14 Bionic (5 nm)', '', '6 GB', '256 GB', '', '', 'Li-Ion, sạc nhanh 18W, sạc không dây 15W, USB Powe', 'iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)', 1, '2024-07-31 17:43:30'),
(8, 'iPhone 11 64GB | Chính hãng VN/A', 1, 1, '26', '11.990.000', '8.872.600', 70, NULL, 'vang_xrer-zl.jpg', '<p><strong>iPhone 11</strong>&nbsp;sở hữu hiệu năng kh&aacute; mạnh mẽ, ổn định trong thời gian d&agrave;i nhờ được trang bị chipset A13 Bionic. M&agrave;n h&igrave;nh LCD 6.1 inch sắc n&eacute;t c&ugrave;ng chất lượng hiển thị Full HD của m&aacute;y cho trải nghiệm h&igrave;nh ảnh mượt m&agrave; v&agrave; c&oacute; độ tương phản cao. Hệ thống camera hiện đại được t&iacute;ch hợp những t&iacute;nh năng c&ocirc;ng nghệ mới kết hợp với vi&ecirc;n Pin dung lượng 3110mAh, gi&uacute;p n&acirc;ng cao trải nghiệm của người d&ugrave;ng</p>\r\n', '6.1 inches', 'IPS LCD', '', 'Camera kép 12MP: - Camera góc rộng: ƒ/1.8 aperture - Camera siêu rộng: ƒ/2.4 aperture', '12 MP, ƒ/2.2 aperture', 'A13 Bionic', '', '4 GB', '64 GB', '', '', ' 3110 mAh', 'iOS 13 hoặc cao hơn (Tùy vào phiên bản phát hành)', 1, '2024-07-31 17:47:21'),
(9, 'Samsung Galaxy Z Fold6', 1, 2, '0', '43.990.000', '43.990.000', 199, 1, 'samsung-galaxy-z-fold6-5g-xanh_unbw-ob.jpg', '<p><strong>Samsung Z Fold 6</strong> l&agrave; si&ecirc;u phẩm điện thoại gập được ra mắt ng&agrave;y 10/7, hiệu năng dẫn đầu ph&acirc;n kh&uacute;c với chip 8 nh&acirc;n Snapdragon 8 Gen 3 for Galaxy, 12GB RAM c&ugrave;ng bộ nhớ trong từ 256GB đến 1TB. Thay đổi mạnh mẽ về hiệu năng v&agrave; thiết kế, Galaxy Z Fold 6 hứa hẹn sẽ l&agrave; chiếc smartphone AI đ&aacute;ng sở hữu nhất nửa cuối năm 2024.</p>\r\n', '7.6 inches', 'Dynamic AMOLED 2X', '', 'Camera góc rộng: 50.0 MP, f/1.8, Thu phóng quang học 2x Camera chụp góc siêu rộng: 12.0 MP, f/2.2 Camera ống kính tele: 10.0 MP, f/2.4, Thu phóng Quang học 3x', 'Camera bên ngoài:10 MP, f/2.2 Camera bên trong: 4 MP, F1.8', 'Snapdragon 8 Gen 3 for Galaxy Tăng lên 42% AI', '', '12 GB', '256 GB', '', '', '4400 mAh', 'Android', 1, '2024-07-31 17:51:19'),
(10, 'Samsung Galaxy Z Flip6', 1, 2, '0', '28.990.000', '28.990.000', 900, NULL, 'samsung-galaxy-z-flip6-5g-xanh-maya.jpg', '<p><strong>Samsung Z Flip 6</strong> l&agrave; chiếc điện thoại gập vỏ s&ograve; chạy chip Snapdragon 8 Gen 3 for Galaxy mạnh mẽ bậc nhất hiện nay. M&aacute;y c&oacute; cụm camera k&eacute;p độ ph&acirc;n giải 50MP sắc n&eacute;t. Đi k&egrave;m l&agrave; bộ nhớ RAM 12GB v&agrave; thời lượng pin được n&acirc;ng cấp th&ecirc;m 4 tiếng sử dụng. M&agrave;n h&igrave;nh ngo&agrave;i Z Flip6 tăng k&iacute;ch thước l&ecirc;n 3.4 inch cho khả năng đa nhiệm vượt trội. Sản phẩm ch&iacute;nh thức được ra mắt ng&agrave;y 10/7/2024 tại sự kiện Galaxy Unpacked diễn ra ở thủ đ&ocirc; Paris nước Ph&aacute;p.</p>\r\n', '6.7 inches', 'Dynamic AMOLED 2X', '', 'Camera góc chụp rộng: 50.0 MP, f/1.8, thu phóng quang học 2x Góc chụp siêu rộng: 12.0 MP, f/2.2', '10.0 MP, f/2.2', 'Snapdragon 8 Gen 3 for Galaxy Tăng lên 42% AI', '', '12 GB', '256 GB', '', '', '4000 mAh', 'Android', 1, '2024-07-31 17:52:59'),
(11, 'Samsung Galaxy Z Flip5 256GB', 1, 2, '38', '25.990.000', '16.113.800', 203, NULL, 'samsung-galaxy-z-flip5-5g.png', '<p><strong>Samsung Galaxy Z Flip 5</strong> c&oacute; thiết kế m&agrave;n h&igrave;nh rộng 6.7 inch v&agrave; độ ph&acirc;n giải Full HD+ (1080 x 2640 Pixels), dung lượng RAM 8GB, bộ nhớ trong 256GB. M&agrave;n h&igrave;nh Dynamic AMOLED 2X của điện thoại n&agrave;y hiển thị r&otilde; n&eacute;t v&agrave; sắc n&eacute;t, mang đến trải nghiệm ấn tượng khi sử dụng.</p>\r\n', '6.7 inches', 'Dynamic AMOLED 2X', '', 'Camera siêu rộng: 12MP, F2.2, 123°, 1.12 μm, FF Camera chính: 12MP, F1.8, Dual Pixel, 1.8μm, OIS', '10MP, F2.4, 1.22μm', 'Snapdragon 8 Gen 2 for Galaxy', '', '8 GB', '256 GB', '', '', '3700 mAh', 'Android 13', 1, '2024-07-31 17:54:51'),
(12, 'Samsung Galaxy S24 Ultra 12GB 256GB', 1, 2, '12', '33.990.000', '29.911.200', 532, NULL, 'galaxy-s24-ultra-5g-xam.jpg', '<p><strong>Samsung S24 Ultra</strong> l&agrave; si&ecirc;u phẩm smartphone đỉnh cao mở đầu năm 2024 đến từ nh&agrave; Samsung với chip Snapdragon 8 Gen 3 For Galaxy mạnh mẽ, c&ocirc;ng nghệ tương lai Galaxy AI c&ugrave;ng khung viền Titan đẳng cấp hứa hẹn sẽ mang tới nhiều sự thay đổi lớn về mặt thiết kế v&agrave; cấu h&igrave;nh. SS Galaxy S24 bản Ultra sở hữu m&agrave;n h&igrave;nh 6.8 inch Dynamic AMOLED 2X tần số qu&eacute;t 120Hz. M&aacute;y cũng sở hữu camera ch&iacute;nh 200MP, camera zoom quang học 50MP, camera tele 10MP v&agrave; camera g&oacute;c si&ecirc;u rộng 12MP.</p>\r\n', '6.8 inches', 'Dynamic AMOLED 2X', '', 'Camera chính: 200MP, Laser AF, OIS Camera: 50MP, PDAF, OIS, zoom quang học 5x Camera tele: 10MP Camera góc siêu rộng: 12 MP, f/2.2, 13mm, 120˚', '12 MP, f/2.2', 'Snapdragon 8 Gen 3 For Galaxy', '', '12 GB', '256 GB', '', '', '5,000mAh', 'Android 14, One UI 6.1', 1, '2024-07-31 17:57:04'),
(13, 'Samsung Galaxy S23 8GB 128GB', 1, 2, '40', '22.990.000', '13.794.000', 422, NULL, 'galaxy-s23.jpeg', '<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong><br />\r\n- Galaxy AI tiện &iacute;ch - Khoanh v&ugrave;ng search đa năng, l&agrave; trợ l&yacute; chỉnh ảnh, chat th&ocirc;ng minh, phi&ecirc;n dịch trực tiếp<br />\r\n- Hiệu năng vượt trội với con chip h&agrave;ng đầu Qualcomm - Phục vụ tốt nhu cầu đa nhiệm ng&agrave;y của người d&ugrave;ng.<br />\r\n- Trang bị bộ 3 ống k&iacute;nh với camera ch&iacute;nh 50MP - Đem lại khả năng quay video v&agrave; chụp ra những bức ảnh tốt, h&agrave;i h&ograve;a, sống động hơn.<br />\r\n- N&acirc;ng cấp trải nghiệm với m&agrave;n h&igrave;nh Dynamic AMOLED 2X - Ph&ugrave; hợp d&ugrave;ng để xem phim hay chơi c&aacute;c tựa game c&oacute; nội dung h&igrave;nh ảnh đồ họa cao.<br />\r\n- Sở hữu lối thiết kế sang trọng, đẳng cấp c&ugrave;ng c&aacute;c bảng m&agrave;u sắc thời thượng, trẻ trung.</p>\r\n', '6.1 inches', 'Dynamic AMOLED 2X', '', 'Camera chính 50 MP & Phụ 12 MP, 10 MP', '12MP', 'Snapdragon 8 Gen 2 for Galaxy', '', '8 GB', '128 GB', '', '', '3900 mAh', 'Android 13', 1, '2024-07-31 18:00:19'),
(14, 'Samsung Galaxy A55 5G 8GB 128GB', 1, 2, '3', '9.990.000', '9.690.300', 531, 1, 'samsung-galaxy-a55-5g-den.jpg', '<p><strong>Samsung Galaxy A55</strong> thiết kế sang trọng, hiện đại với m&agrave;n h&igrave;nh rộng 6.6 inch, tấm nền Super AMOLED c&ugrave;ng độ ph&acirc;n giải Full HD+ cho h&igrave;nh ảnh hiển thị mượt m&agrave;, sắc n&eacute;t. Sở hữu con chip Exynos 1480, c&ugrave;ng tần số qu&eacute;t 120 Hz cho trải nghiệm sử dụng kh&ocirc;ng bị giật, lag.</p>\r\n', '6.6 inches', 'Super AMOLED', '', 'Camera chính: 50 MP OIS+HDR Camera góc rộng: 12MP Camera macro: 5MP', '32 MP', 'Exynos 1480 4nm 2.4GHz', '', '', '8 GB', '', '', '128 GB', 'Android 14', 1, '2024-07-31 18:03:04'),
(15, 'Samsung Galaxy S24 8GB 256GB', 1, 2, '9', '22.990.000', '20.920.900', 542, NULL, 'galaxy-s24-5g-tim_7r90-vs.jpg', '<p><strong>Điện thoại Samsung Galaxy S24</strong> được trang bị bộ xử l&yacute; Exynos 2400 do Samsung tự sản xuất với 10 nh&acirc;n CPU c&ugrave;ng bộ nhớ RAM 8GB, bộ nhớ trong 256GB. M&agrave;n h&igrave;nh thiết bị với k&iacute;ch thước 6.2 inch với khung viền si&ecirc;u mỏng c&ugrave;ng c&ocirc;ng nghệ Dynamic AMOLED 2X. Ph&iacute;a sau điện thoại l&agrave; cụm ba camera 50MP + 10MP + 12MP. C&ugrave;ng với đ&oacute;, Samsung S24 sở hữu nhiều t&iacute;nh năng AI hữu &iacute;ch như dịch thuật trực tiếp, t&igrave;m kiếm bằng h&igrave;nh ảnh,...</p>\r\n', '6.2 inches', 'Dynamic AMOLED 2X', '', 'Camera chính 50 MP, f/1.8 Camera tele: 10 MP, f/2.4, PDAF, OIS, zoom quang học 3x Camera góc siêu rộng: 12 MP, f/2.2, 120˚', '12 MP, f/2.2', 'Exynos 2400', '', '8 GB', '256 GB', '', '', '4000 mAh', 'Android 14, One UI 6.1', 1, '2024-07-31 18:05:54'),
(16, 'Samsung Galaxy A54 5G 8GB 128GB', 1, 2, '13', '10.490.000', '9.126.300', 123, NULL, 'xanh_lt1p-gd.jpg', '<p><strong>Samsung Galaxy A54</strong> c&oacute; những điểm đột ph&aacute; mới như: m&agrave;n h&igrave;nh Super AMOLED 6.4 inch tr&agrave;n viền v&ocirc; cực Infinity-O, độ s&aacute;ng đến 1000 nits, tần số qu&eacute;t l&ecirc;n đến 120Hz. Samsung A54 cũng sở hữu cụm 3 camera ph&acirc;n giải cao 50.0 MP + 12.0 MP + 5.0 MP với t&iacute;nh năng ổn định kỹ thuật số v&agrave; Auto-framing kết hợp chống rung OIS.</p>\r\n', '6.4 inches', 'Super AMOLED', '', 'Camera góc rộng: 50 MP, f/1.8, PDAF, OIS Camera góc siêu rộng: 12MP, f/2.2, 123˚, 1.12µm Camera macro: 5MP, f/2.4', 'Camera góc rộng: 32 MP, f/2.2, 26mm, 1/2.8', 'Exynos 1380 (5 nm)', '', '8 GB', '128 GB', '', '', '5000 mAh', 'Android 13', 1, '2024-07-31 18:08:37'),
(17, 'Xiaomi Redmi Note 13 Pro Plus 5G 8GB 256GB', 1, 3, '12', '10.990.000', '9.671.200', 125, NULL, 'redmi-note-13-pro-plus-5g-den.jpg', '<p><strong>Xiaomi Redmi Note 13 Pro Plus</strong> sở hữu m&agrave;n h&igrave;nh rộng 6.67 inch, trang bị bộ vi xử l&yacute; Dimensity 7200 đem lại hiệu năng kinh ngạc. Với dung lượng pin 5000 mAh c&ugrave;ng hỗ trợ sạc nhanh l&ecirc;n đến 120W. Camera 200MP v&agrave; khả năng zoom 4x mở ra những trải nghiệm chụp ảnh độc đ&aacute;o v&agrave; đa dạng.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '6.67 inches', 'AMOLED', '', 'Chính 200 MP & Phụ 8 MP, 2 MP', '16 MP', 'Mediatek Dimensity 7200 Ultra (4 nm)', '', '8 GB', '256 GB', '', '', '5000 mAh', 'Android 13', 1, '2024-07-31 18:12:31'),
(18, 'Xiaomi Redmi Note 13 Pro 4G', 1, 3, '8', '7.290.000', '6.706.800', 23, NULL, 'redmi-note-13-pro-4g-den.jpg', '<p><strong>Xiaomi Redmi Note 13 Pro</strong> được trang bị chip MediaTek Helio G99-Ultra được sản xuất theo tiến tr&igrave;nh 6nm, dung lượng RAM 8GB, bộ nhớ trong 128GB. Điện thoại sở hữu thời gian sử dụng l&acirc;u d&agrave;i nhờ vi&ecirc;n pin 5000mAh c&ugrave;ng khả năng sạc nhanh 67W. Ngo&agrave;i ra, m&aacute;y c&ograve;n được trang bị m&agrave;n h&igrave;nh AMOLED 6.67 inch, độ ph&acirc;n giải 2400x1080 pixels c&ugrave;ng tần số qu&eacute;t 120Hz.</p>\r\n', '6.67 inches', 'AMOLED', '', 'Chính 200 MP & Phụ 8 MP, 2 MP', '16 MP', 'MediaTek Helio G99-Ultra 8 nhân', '', '8 GB', '128 GB', '', '', '5000 mAh', 'Android 13', 1, '2024-07-31 18:14:43'),
(19, 'Xiaomi 13T Pro 5G', 1, 3, '13', '16.990.000', '14.781.300', 86, NULL, 'xiaomi-13t-5g-den.jpg', '<p><strong>Xiaomi 13T Pro</strong> l&agrave; flagship mới nhất nh&agrave; Xiaomi, mạnh mẽ ấn tượng với chip MediaTek Dimensity 9200+, c&ugrave;ng với đ&oacute; l&agrave; RAM 12GB v&agrave; bộ nhớ trong l&ecirc;n tới 512GB. Đặc biệt, khả năng chụp ảnh đỉnh cao nhờ cụm camera si&ecirc;u chất, vi&ecirc;n pin lớn 5000mAh c&ugrave;ng sạc nhanh 120W. Tất cả sẽ mang tới một si&ecirc;u phẩm đ&igrave;nh đ&aacute;m gi&uacute;p bạn c&oacute; được trải nghiệm độc đ&aacute;o v&agrave; khẳng định được c&aacute; t&iacute;nh của m&igrave;nh.</p>\r\n', '6.67 inches', 'AMOLED', '', 'Camera chính góc rộng: 50 MP, 1/1.22', '20 MP, f/2,2', 'MediaTek Dimensity 9200+', '', '12 GB', '512 GB', '', '', '5000 mAh', 'Android 13', 1, '2024-07-31 18:16:59'),
(20, 'Xiaomi POCO X6 Pro 5G 8GB 256GB', 1, 3, '15', '9.990.000', '8.491.500', 23, NULL, 'xiaomi-redmi-k70e-den.jpg', '<p><strong>Điện thoại Xiaomi Poco X6 Pr</strong>o được trang bị con chip Dimensity 8300 Ultra 8 nh&acirc;n, tiến tr&igrave;nh 4nm, t&iacute;ch hợp với GPU Mali-G615 c&ugrave;ng RAM 8GB, bộ nhớ trong 256GB. M&aacute;y sở hữu 3 camera sau với camera ch&iacute;nh 64MP v&agrave; 1 camera selfie 16MP. Ngo&agrave;i ra m&aacute;y X6 Pro được trang bị m&agrave;n h&igrave;nh AMOLED 6.67 inch, độ ph&acirc;n giải 1220 x 2712 pixels c&ugrave;ng tần số qu&eacute;t 120Hz.&nbsp;</p>\r\n', '6.67 inches', 'AMOLED', '', 'Camera góc siêu rộng: 64 MP, f/1.7 Camera góc siêu rộng: 8 MP, 120° FOV, f/2.2 Camera macro: 2 MP, f/2.4', 'Camera góc siêu rộng: 16 MP', 'Dimensity 8300-Ultra', '', '8 GB', '256 GB', '', '', '5000 mAh', 'Android 14', 1, '2024-07-31 18:19:28'),
(21, 'Xiaomi POCO M6 (6GB 128GB)', 1, 3, '9', '4.290.000', '3.903.900', 86, NULL, 'xiaomi-poco-m6.jpg', '<p><strong>POCO M6 5G</strong> hỗ trợ xử l&yacute; đa nhiệm cực mượt c&ugrave;ng l&uacute;c nhiều ứng dụng với bộ nhớ RAM lớn c&ugrave;ng chipset Helio G91-Ultra mạnh mẽ h&agrave;ng đầu. Đi k&egrave;m theo đ&oacute; l&agrave; m&agrave;n h&igrave;nh AdaptiveSync 6.79 inches với tần số qu&eacute;t 90Hz, độ s&aacute;ng tối đa 550 nits v&agrave; độ ph&acirc;n giải FHD+, đảm bảo chất lượng hiển thị cực n&eacute;t. Đồng thời, hệ thống m&aacute;y ảnh tr&ecirc;n Xiaomi POCO M6 cũng kh&aacute; ấn tượng với camera sau 108MP c&ugrave;ng camera trước 13MP đều hỗ trợ quay phim 1080p.</p>\r\n', '6.79 inches', 'IPS LCD', '', 'Camera chính: 108MP siêu rõ ống kính 6P, f/1,75 Camera macro: 2MP f/2,4', '13MP, f/2,45', 'Helio G91-Ultra', '', '6 GB', '128 GB', '', '', ' 5030 mAh', 'Android 13', 1, '2024-07-31 18:21:50'),
(22, 'Xiaomi Redmi Note 12 Pro 5G', 1, 3, '22', '9.490.000', '7.402.200', 46, NULL, 'redmi-note-12-pro-5g-xanh.jpg', '<p><strong>Xiaomi Redmi Note 12 Pro</strong> sở hữu cấu h&igrave;nh vượt trội gồm chip MediaTek Dimensity 1080, hệ thống ba camera với cảm biến ch&iacute;nh 50MP v&agrave; mạng 5G. Ngo&agrave;i ra, m&agrave;n h&igrave;nh Note 12 Pro 5G c&oacute; k&iacute;ch thước kh&aacute; lớn khoảng 6.67 inch, tấm nền AMOLED, tần số qu&eacute;t 120Hz khiến chiếc điện thoại nổi bật trong tầm gi&aacute; dưới 8 triệu.</p>\r\n', '6.67 inches', 'AMOLED', '', 'Camera góc rộng: 50MP, f/1.9, PDAF, OIS Camera góc siêu rộng: 8 MP, f/1.9, 119˚ Camera macro: 2 MP, f/2.4', 'Camera góc rộng: 16 MP', 'MediaTek Dimensity 1080 8 nhân', '', '8 GB', '256 GB', '', '', '5000 mAh', 'Android 12', 1, '2024-07-31 18:24:12'),
(23, 'OPPO Reno12 F 5G', 1, 4, '0', '9.490.000', '9.490.000', 100, NULL, 'oppo-reno12-f-5g_lfgj-q7.jpg', '<p><strong>Điện thoại OPPO Reno12 F 5G</strong> c&oacute; dung lượng lưu trữ 8GB+256GB kết hợp chipset MediaTek D6300 đem đến sự ổn định để xử l&yacute; c&aacute;c t&aacute;c vụ kh&aacute;c nhau. Với camera sau độ ph&acirc;n giải cao l&ecirc;n đến 50 MP v&agrave; camera selfie 32MP, gi&uacute;p đem đến h&igrave;nh ảnh sắc n&eacute;t khi chụp v&agrave; quay video. Dung lượng pin của điện thoại lớn 5.000 mAh sẽ cho ph&eacute;p đ&aacute;p ứng c&aacute;c nhu cầu c&aacute; nh&acirc;n như chơi game hay lướt web cả ng&agrave;y. B&ecirc;n cạnh đ&oacute;, m&agrave;n h&igrave;nh của điện thoại 6.67 inch, với độ l&agrave;m mới 120 Hz, kh&ocirc;ng lo bị giật lag khi sử dụng.</p>\r\n', '6.7 inches', 'AMOLED', '', '50MP Camera góc rộng: 8MP Camera xóa phông: 2MP', '32MP', 'Dimensity 6300 6nm', '', '8 GB', '256 GB', '', '', '5000 mAh', 'Android 14', 1, '2024-07-31 18:28:05'),
(24, 'OPPO Reno11 F 5G', 1, 4, '11', '8.990.000', '8.001.100', 78, NULL, 'oppo-reno11-f-5g-xanh.jpg', '<p><strong>OPPO Reno11 F 5G</strong> cung cấp trải nghiệm hiển thị, xử l&yacute; si&ecirc;u mượt m&agrave; với m&agrave;n h&igrave;nh AMOLED 6.7 inch hiện đại c&ugrave;ng chipset MediaTek Dimensity 7050 mạnh mẽ. Hệ thống quay chụp tr&ecirc;n thế hệ Reno11 F 5G n&agrave;y được cải thiện hơn th&ocirc;ng qua cụm 3 camera với độ ph&acirc;n giải lần lượt l&agrave; 64MP, 8MP v&agrave; 2MP. Ngo&agrave;i ra, cung cấp năng lượng cho thế hệ OPPO smartphone n&agrave;y l&agrave; vi&ecirc;n pin 5000mAh c&ugrave;ng sạc nhanh 67W, mang tới trải nghiệm liền mạch suốt ng&agrave;y d&agrave;i.</p>\r\n', '6.7 inches', 'AMOLED', '', 'Camera góc rộng: 64 MP, f/1.7 Camera góc siêu rộng: 8 MP, f/2.2 Camera macro: 2 MP, f/2.4', 'Camera góc rộng: 32 MP, f/2.4, 22mm, 1/2.74', 'Mediatek Dimensity 7050 (6 nm)', '', '8 GB', '256 GB', '', '', '5000 mAh', 'ColorOS 14 Android 14 - Thuật toán tối ưu hiệu năng', 1, '2024-07-31 18:29:44'),
(25, 'OPPO Reno12 5G', 1, 4, '0', '12.990.000', '12.990.000', 354, NULL, 'oppo-reno12-5g.jpg', '<p><strong>Điện thoại OPPO Reno12 F 5G</strong> c&oacute; dung lượng lưu trữ 8GB+256GB kết hợp chipset MediaTek D6300 đem đến sự ổn định để xử l&yacute; c&aacute;c t&aacute;c vụ kh&aacute;c nhau. Với camera sau độ ph&acirc;n giải cao l&ecirc;n đến 50 MP v&agrave; camera selfie 32MP, gi&uacute;p đem đến h&igrave;nh ảnh sắc n&eacute;t khi chụp v&agrave; quay video. Dung lượng pin của điện thoại lớn 5.000 mAh sẽ cho ph&eacute;p đ&aacute;p ứng c&aacute;c nhu cầu c&aacute; nh&acirc;n như chơi game hay lướt web cả ng&agrave;y. B&ecirc;n cạnh đ&oacute;, m&agrave;n h&igrave;nh của điện thoại 6.67 inch, với độ l&agrave;m mới 120 Hz, kh&ocirc;ng lo bị giật lag khi sử dụng.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '6.7 inches', 'AMOLED', '', '50MP + OIS Camera góc rộng: 8MP Camera xóa phông: 2MP', '32MP', 'Dimensity 7300 (4nm)', '', '12 GB', '256 GB', '', '', '5000 mAh', 'Android 14', 1, '2024-07-31 18:33:38'),
(26, 'OPPO Find X5 Pro 12GB 256GB', 1, 4, '13', '17.490.000', '15.216.300', 86, NULL, 'oppo-find-x5-pro-chinh-hang-duchuymobile.jpg', '<p><strong>OPPO Find X5 Pro</strong> sở hữu thiết kế tinh tế, đẳng cấp với mặt sau chất liệu gốm, th&ecirc;m v&agrave;o đ&oacute; l&agrave; camera Hasseblad c&ugrave;ng m&agrave;n h&igrave;nh 1 tỷ m&agrave;u Bionic v&agrave; hiệu năng vượt trội từ chip Snapdragon 8 Gen 1. Hệ thống camera đột ph&aacute; với 3 camera sau v&agrave; camera selfie chất lượng cao cho những bức ảnh ấn tượng, đặc biệt l&agrave; khả năng quay đếm 4K.</p>\r\n', '6.7 inches', 'AMOLED', '', 'Camera chính: 50MP, f/1.7 Camera góc rộng: 50MP, f/2.2; FOV 112° Camera tele: 13MP, f/2.4', 'Camera chính 32MP: f/2.4; FOV 90°, ống kính: 5P, lấy nét cố định', 'Qualcomm Snapdragon 8 Gen 1', '', '12 GB', ' 256 GB', '', '', '5000 mAh', 'ColorOS 12.1 dựa trên Android 12', 1, '2024-07-31 18:35:58'),
(27, 'OPPO Find N3 16GB', 1, 4, '7', '44.990.000', '41.840.700', 521, NULL, 'oppo-find-n3-duc-huy.jpg', '<p><strong>OPPO Find N3 </strong>được ch&iacute;nh thức ra mắt ng&agrave;y 26/10 tại thị trường Việt Nam mang đến nhiều n&acirc;ng cấp mới mẻ. Tr&ecirc;n phi&ecirc;n bản điện thoại gập thế hệ thứ 3 n&agrave;y, OPPO tạo ra một mẫu flagship mạnh mẽ hơn với chip Qualcomm Snapdragon&reg; 8 Gen 2 Mobile Platform, 16GB RAM, m&agrave;n h&igrave;nh ch&iacute;nh 7.82 inch, m&agrave;n hinh ngo&agrave;i 6.31 inch c&ugrave;ng hệ thống camera Hasselblad đầy ấn tượng.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '7.82 inches', 'OLED', '', 'Camera chính: 48MP, f/1.7, OIS Camera góc rộng: 48MP, f/2.2 Camera Tele: 64MP, f/2.6', 'Màn hình chính: 20MP, f/2.2 Màn hình ngoài: 32MP, f/2.4', 'Snapdragon 8 Gen 2 8 nhân', '', '16 GB', '512 GB', '', '', '4805 mAh', 'Android 13', 1, '2024-07-31 18:37:45'),
(28, 'Realme C67 (8GB 128GB)', 1, 5, '18', '5.290.000', '4.337.800', 23, NULL, 'realme-c67-4g-den_bkcm-zg.jpg', '<p><strong>Điện thoại realme C67</strong> c&oacute; cấu h&igrave;nh mạnh mẽ với chipset Snapdragon 685 6nm, dung lượng RAM 8GB, bộ nhớ trong 128 GB c&ugrave;ng vi&ecirc;n pin Li-po 5000 mAh. Mặt trước c&oacute; m&agrave;n h&igrave;nh k&iacute;ch thước 6.72 inch, camera trước 8 MP v&agrave; mặt sau c&oacute; camera 108 MP + 2 MP. Mẫu điện thoại realme n&agrave;y được ho&agrave;n thiện từ khung viền v&agrave; mặt sau bằng nhựa, cho cảm gi&aacute;c cầm nhẹ nh&agrave;ng, thoải m&aacute;i.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '6.72 inches', 'IPS LCD', '', 'Camera AI: 108MP, f/1.8 2MP, f/2.4', '8 MP, f/2.05', 'Snapdragon 685 8 nhân', '', '8 GB', '128 GB', '', '', '5000 mAh', 'Android 14', 1, '2024-07-31 18:41:04'),
(29, 'Realme C53 (8GB 256GB)', 1, 5, '20', '4.790.000', '3.832.000', 14, NULL, 'realme-c53-duchuymobile.jpg', '<p><strong>Realme C53</strong> g&acirc;y bất ngờ với người d&ugrave;ng khi sở hữu cụm camera v&ocirc; c&ugrave;ng chất lượng. V&agrave; để chất lượng chụp h&igrave;nh tr&ecirc;n C53 được tối ưu nhất, Realme đ&atilde; trang bị cho chiếc điện thoại Realme tầm trung của m&igrave;nh vi xử l&yacute; Tiger T612, 6GB RAM c&ugrave;ng dung lượng lưu trữ cực lớn, l&ecirc;n tới 128GB để người d&ugrave;ng c&oacute; thể thoải m&aacute;i quay, chụp c&aacute;c nội dung c&oacute; chất lượng cao.</p>\r\n', '6.74 inches', 'IPS LCD', '', 'Camera chính: 50MP', '8MP', 'Unisoc Tiger T612', '', '8GB + Mở rộng 8GB', '256 GB', '', '', '5000 mAh', 'Android 13', 1, '2024-07-31 18:43:02'),
(30, 'Realme C61 (4GB 128GB)', 1, 5, '0', '3.590.000', '3.590.000', 10, NULL, 'realme-c61-xanh.jpg', '<p><strong>Điện thoại realme C61</strong> nổi bật với hiệu suất hoạt động ổn định v&agrave; mượt m&agrave; c&ugrave;ng l&uacute;c nhiều t&aacute;c vụ kh&aacute;c nhau nhờ trang bị chip UNISOC T612 c&ugrave;ng GPU Mali-G57. Kết hợp với RAM 4GB (C&oacute; thể mở rộng l&ecirc;n đến 8GB), bộ nhớ trong 128GB c&ograve;n đem đến kh&ocirc;ng gian lưu trữ dữ liệu đủ để đ&aacute;p ứng c&aacute;c nhu cầu của người d&ugrave;ng. B&ecirc;n cạnh đ&oacute;, m&aacute;y c&ograve;n t&iacute;ch hợp bộ đ&ocirc;i camera gồm camera selfie 5MP v&agrave; camera sau 50MP cho ảnh chụp sắc n&eacute;t, r&otilde; r&agrave;ng.&nbsp;</p>\r\n', '6.745 inches', 'IPS LCD', '', 'Camera góc rộng: 50 MP, ƒ/1.8, 1/2.5', '5MP', 'Unisoc Tiger T612', '', '4 GB', '128 GB', '', '', '5000 mAh', 'Android 14', 1, '2024-07-31 18:47:34'),
(31, 'vivo Y03 4GB 64GB', 1, 6, '3', '2.990.000', '2.900.300', 78, NULL, 'dien-thoai-vivo-y03_1.webp', '<p><strong>vivo Y03</strong> chạy tr&ecirc;n hệ điều h&agrave;nh Android 14 OS, được trang bị chipset MediaTek Helio G85 gi&uacute;p tăng khả năng xử l&yacute; v&agrave; n&acirc;ng cao hiệu năng. M&agrave;n h&igrave;nh IPS LCD k&iacute;ch thước 6.56 inch, độ ph&acirc;n giải HD+ kết hợp với tần số qu&eacute;t 90Hz mang đến cho người d&ugrave;ng trải nghiệm mượt m&agrave;. B&ecirc;n cạnh đ&oacute; dung lượng pin l&ecirc;n đến 5000mAh gi&uacute;p người d&ugrave;ng thoải m&aacute;i sử dụng trong một thời gian d&agrave;i chỉ sau một lần sạc.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '6.56 inches', 'LCD', '', '13 MP, f/2.2, PDAF 0.08 MP, f/3.0', '5 MP, f/2.2', 'MediaTek Helio G85', '', '4GB + Mở rộng 4GB', '64 GB', '', '', '5000 mAh', 'Android 14, Funtouch OS 14', 1, '2024-07-31 18:56:53'),
(32, 'vivo V30E 12GB 256GB', 1, 6, '0', '10.490.000', '10.490.000', 463, NULL, 'vivo-v30e-trang_9q5s-ke.jpg', '<p><strong>Điện thoại vivo V30E</strong> mạnh mẽ với chipset Snapdragon 6 Gen 1, kết hợp với 12GB RAM v&agrave; 256GB bộ nhớ trong, đảm bảo hiệu suất ấn tượng cho mọi t&aacute;c vụ. M&agrave;n h&igrave;nh AMOLED 6.68 inch của m&aacute;y cung cấp trải nghiệm h&igrave;nh ảnh sắc n&eacute;t đi k&egrave;m cụm camera k&eacute;p ở mặt sau với camera ch&iacute;nh l&ecirc;n đến 50MP. Vivo V30E c&ograve;n sở hữu pin dung lượng 5.500 mAh, hỗ trợ sạc nhanh 44W, tối ưu h&oacute;a trải nghiệm sử dụng h&agrave;ng ng&agrave;y.</p>\r\n', '6.78 inches', 'AMOLED', '', 'Camera góc rộng: 50 MP, f/1.8, 1/1.95', '32 MP HD Selfie Camera f/2.0, 84º FoV, 5P lens', 'Qualcomm SM6450 Snapdragon 6 Gen 1 (4 nm)', '', '12 GB', '256 GB', '', '', '5500 mAh', 'Android 14 OS', 1, '2024-07-31 18:58:23'),
(33, 'vivo V29E 8GB 256GB', 1, 6, '11', '8.990.000', '8.001.100', 52, NULL, 'vivo-v29e_14_.webp', '<p><strong>vivo V29e</strong> sở hữu m&agrave;n h&igrave;nh k&iacute;ch thước 6.67 inch c&ugrave;ng tần số qu&eacute;t 120Hz, dải m&agrave;u DCI-P3 1.07 tỷ m&agrave;u mang lại khả năng hiển thị r&otilde; n&eacute;t v&agrave; sống động. Điện thoại ẩn chứa camera ch&iacute;nh 64MP c&ugrave;ng cảm biến si&ecirc;u rộng 8MP. So với thế hệ tiền nhiệm, d&ograve;ng vivo V29e được h&atilde;ng ưu &aacute;i trang bị bộ chipset Snapdragon 695 kết hợp c&ugrave;ng bộ nhớ RAM 8GB để mang đến hiệu suất tối đa. Mặt kh&aacute;c, h&atilde;ng c&ograve;n t&iacute;ch hợp vi&ecirc;n pin 4800 mAh &ldquo;si&ecirc;u khủng&rdquo; c&ugrave;ng c&ocirc;ng nghệ sạc nhanh 44W.</p>\r\n', '6.67 inches', 'AMOLED', '', 'Camera chính: 64MP, f/1.79, OIS Camera góc siêu rộng: 8MP, f/2.2', '50 MP, f/2.0, AF', 'Qualcomm Snapdragon 695', '', '8 GB', ' 256 GB', '', '', '4800 mAh', 'Android 13', 1, '2024-07-31 19:00:53'),
(34, 'vivo V27e 8GB 256GB', 1, 6, '11', '8.990.000', '8.001.100', 42, NULL, 'mau-tim.jpg', '<p><strong>Vivo V27e</strong> sở hữu con chip MediaTek Helio G99, bộ nhớ RAM chuẩn 8GB c&ugrave;ng 128GB ROM, người d&ugrave;ng cũng c&oacute; thể lựa chọn phi&ecirc;n bản cấu h&igrave;nh n&acirc;ng cấp với 12GB RAM v&agrave; 256GB bộ nhớ. Điện thoại sở hữu k&iacute;ch thước m&agrave;n h&igrave;nh 6.62 inch, tấm nền AMOLED. B&ecirc;n cạnh đ&oacute; Vivo V27e c&ograve;n được trangbị 3 camera, ống k&iacute;nh ch&iacute;nh 64MP, dung lượng pin 4600mAh, thiết kế m&agrave;n h&igrave;nh đục lỗ chứa camera selfie 32MP.</p>\r\n', '6.62 inches', 'AMOLED', '', 'Camera góc rộng: 64MP, f/1.8, PDAF, OIS Camera macro: 2MP, f/2.4 Camera đo độ sâu: 2MP, f/2.4', 'Trước 32MP', 'Mediatek MT8781 Helio G99 (6nm)', '', '8 GB', ' 256 GB', '', '', '4600 mAh', 'Funtouch OS 13', 1, '2024-07-31 19:02:54'),
(35, 'Huawei Mate 50 RS Porsche Design (12GB | 512GB)', 1, 7, '0', '40.990.000', '40.990.000', 10, NULL, 'huawei-mate-50-rs-porsche-design-duchuymobile-1.jpg', '<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '6.74 inches', ' OLED, 1 tỷ màu, 120Hz', '', ' 50MP + 48MP + 13MP', ' 13 MP, f/2.4 + TOF 3D', ' Snapdragon 8+ Gen1 4G', '', '12 GB', '512 GB', '', '', ' 4700 mAh', 'HarmonyOS 3.0', 1, '2024-07-31 19:10:22'),
(36, 'Huawei Pura 70 Ultra (16GB | 512GB)', 1, 7, '0', '34.990.000', '34.990.000', 8, NULL, 'huawei-pura-70-ultra-xanh.jpg', '<p><strong>Huawei Pura 70 Ultra</strong> ch&iacute;nh thức được h&atilde;ng Huawei ra mắt mới đ&acirc;y với nhiều n&acirc;ng cấp đ&aacute;ng gi&aacute;, nhất l&agrave; cụm 3 camera &quot;th&ograve; thụt&quot; độc đ&aacute;o với nhiều t&iacute;nh năng hỗ trợ chụp ảnh chất lượng. &nbsp;</p>\r\n\r\n<p>Ngo&agrave;i ra, chiếc điện thoại cao cấp Huawei Pura 70 Ultra c&ograve;n c&oacute; m&agrave;n h&igrave;nh d&ugrave;ng tấm nền OLED LTPO cao cấp, hiệu năng vượt trội nhờ vi xử l&yacute; Kirin 9010, c&ugrave;ng thanh RAM khủng đến 16GB đa nhiệm mượt m&agrave;.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', ' 6.8 inches', ' LTPO OLED, 1B colors, HDR, 120Hz, 2500 nits (peak)', '', ' 50MP + 50MP + 40MP', ' 13 MP, f/2.4, (ultrawide)', ' Kirin 9010 (7 nm)', '', '16 GB', '512 GB', '', '', ' 5200 mAh, 100w', ' HarmonyOS 4.2', 1, '2024-07-31 19:12:16'),
(37, 'Huawei Nova 12 Ultra 5G 1TB', 1, 7, '0', '18.990.000', '18.990.000', 5, NULL, 'huawei-nova-12-pro-dh_prw3-fn_h49v-uz.jpg', '<p><strong>Huawei Nova 12 Pro&nbsp;Ultra 5G</strong> sở hữu một cấu h&igrave;nh ấn tượng với con chip Kirin 9000S 5G, m&agrave;n h&igrave;nh OLED cong 120 Hz c&ugrave;ng hệ thống camera 50 MP do h&atilde;ng tự ph&aacute;t triển. Đi k&egrave;m l&agrave; một thiết kế lạ mắt với cụm camera sau c&ugrave;ng phần notch độc đ&aacute;o. Điện thoại sẽ c&ograve;n được trang bị vi&ecirc;n pin 4900 mAh t&iacute;ch hợp sạc nhanh 100 W để đảm bảo khả năng hoạt động bền bỉ.</p>\r\n', ' 6.76 inches', 'LTPO OLED, 1B colors, HDR, 120Hz', '', ' 2 camera: 50 + 8MP', ' 2 Camera (8 + 60MP)', ' Kirin 9000SL', '', '12 GB', ' 1TB', '', '', '4600mAh, 100W', ' HarmonyOS 4.0', 1, '2024-07-31 19:15:59'),
(38, 'Apple MacBook Air M1 256GB 2020 I Chính hãng Apple Việt Nam', 2, 9, '18', '22.990.000', '18.851.800', 100, NULL, 'bac.jpg', '<p><strong>Macbook Air M1</strong> l&agrave; d&ograve;ng sản phẩm c&oacute; thiết kế mỏng nhẹ, sang trọng v&agrave; tinh tế c&ugrave;ng với đ&oacute; l&agrave; gi&aacute; th&agrave;nh phải chăng n&ecirc;n MacBook Air đ&atilde; thu h&uacute;t được đ&ocirc;ng đảo người d&ugrave;ng y&ecirc;u th&iacute;ch v&agrave; lựa chọn. Đ&acirc;y cũng l&agrave; một trong những phi&ecirc;n bản <strong>Macbook Air</strong> mới nhất m&agrave; kh&aacute;ch h&agrave;ng kh&ocirc;ng thể bỏ qua khi đến với CellphoneS. Dưới đ&acirc;y l&agrave; chi tiết về thiết kế, cấu h&igrave;nh của m&aacute;y.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '13.3 inches', 'Độ sáng 400 nits Hỗ trợ dải màu P3 True-Tone', '', '', '', '', 'GPU 7 nhân, 16 nhân Neural Engine', '8GB', '', 'LPDDR4', '256GB SSD', '49.9-watt lithium-polymer, củ sạc công suất 30W', 'macOS Big Sur', 1, '2024-07-31 19:19:14'),
(39, 'Apple MacBook Air M2 2022 8GB 256GB I Chính hãng Apple Việt Nam', 2, 9, '28', '32.990.000', '23.752.800', 123, NULL, 'macbook-air-m2-256gb-2022-chinh-hang-2x.jpg', '<p><strong>Macbook Air M2 2022</strong> với thiết kế sang trọng, vẻ ngo&agrave;i si&ecirc;u mỏng đầy lịch l&atilde;m. Mẫu Macbook Air mới với những n&acirc;ng cấp về thiết kế v&agrave; cấu h&igrave;nh c&ugrave;ng gi&aacute; b&aacute;n phải chăng, đ&acirc;y sẽ l&agrave; một thiết bị l&yacute; tưởng cho c&ocirc;ng việc v&agrave; giải tr&iacute;.</p>\r\n', '13.6 inches', 'Liquid Retina Display', '', '', '', '', '8 nhân GPU, 16 nhân Neural Engine', '8GB', '', '', '256GB', ' 52,6 Wh', 'MacOS', 1, '2024-07-31 19:22:28'),
(40, 'MacBook Air M3 13 inch 2024 8GB - 256GB | Chính hãng Apple Việt Nam', 2, 9, '3', '27.990.000', '27.150.300', 156, NULL, 'bac.jpg', '<p><strong>Apple Macbook Air 13 M3</strong> với con chip Apple M3 mạnh mẽ c&ugrave;ng c&ocirc;ng nghệ d&ograve; tia tốc độ cao mang lại trải nghiệm d&ugrave;ng mượt m&agrave;. Laptop sở hữu một thiết kế si&ecirc;u mỏng với độ d&agrave;y 1,13 cm gi&uacute;p người d&ugrave;ng dễ d&agrave;ng mang theo. Macbook Air 13 được trang bị wifi 6E mang lại tốc độ nhanh hơn đến 2x lần so với wifi 622.</p>\r\n', '13.6 inches', 'True Tone', '', '', '', '', 'GPU 8 Lõi', '8GB', '', '', '256GB SSD', '', ' MacOS', 1, '2024-07-31 19:24:34'),
(41, 'MacBook Pro 16 inch M1 Max 10 CPU - 32 GPU 32GB 1TB 2021 | Chính hãng Apple Việt Nam', 2, 9, '41', '92.990.000', '54.864.100', 245, NULL, 'macbook-pro-2021_40hc-1z_t6qe-jj_a1yu-vu.jpg', '<p><strong>Macbook Pro M1 Max 16 inch &ndash; </strong>Thiết kế sang trọng, hiệu năng vượt trội<strong>.&nbsp;</strong>Kh&ocirc;ng chỉ l&agrave; điểm nhận biết tr&ecirc;n c&aacute;c thiết bị smartphone, hiện nay tai thỏ đ&atilde; xuất hiện tr&ecirc;n thế hệ Macbook mới nhất. Macbook Pro M1 Max với thiết kế độc đ&aacute;o, m&agrave;n h&igrave;nh chất lượng mang lại trải nghiệm vượt &nbsp;trội. M&aacute;y t&iacute;nh Macbook Pro 16 inch 2021 được trang bị cấu h&igrave;nh cực khủng với chip Apple M1 Max với 10CPU, 32GPU đi k&egrave;m dung lượng l&ecirc;n đến RAM 32GB v&agrave; bộ nhớ SSD 1TB mang lại hiệu suất vượt trội.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '16.2 inches', '120Hz, Liquid Retina, Mini LED, XDR', '', '', '', '', '32 GPU', '32GB', '', '', '1TB SSD', '', 'MacOS', 1, '2024-07-31 19:26:51'),
(42, 'MacBook Air 15 inch M2 2023 8GB 256GB sạc 70W | Chính hãng Apple Việt Nam', 2, 9, '19', '32.990.000', '26.721.900', 236, NULL, 'macbook-air-15-inch-2023-chinh-hang-duchuymobile.jpg', '<p><strong>Macbook Air 15 inch M2 2023</strong> sạc 70W sở hữu th&ocirc;ng số hiệu năng vượt trội v&agrave; thiết kế tinh tế với chip M2 mạnh mẽ kết hợp c&ugrave;ng m&agrave;n h&igrave;nh Retina sắc n&eacute;t. Thiết kế b&ecirc;n ngo&agrave;i của ph&acirc;n kh&uacute;c Macbook n&agrave;y cũng kh&aacute; gọn nhẹ, sang trọng khi chỉ d&agrave;y 11.5mm v&agrave; nặng kh&ocirc;ng qu&aacute; 1.51kg. Đặc biệt hơn, Macbook Air 15 inch M2 2023 c&ograve;n mang lại trải nghiệm l&agrave;m việc v&agrave; giải tr&iacute; kh&ocirc;ng giới hạn với thời lượng pin khủng c&ugrave;ng c&ocirc;ng suất sạc ấn tượng đạt tới 70W.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '15.3 inches', 'Liquid Retina 1 tỷ màu Độ sáng 500 nits', '', '', '', '', '10 nhân GPU', '8GB', '', '', 'SSD 256GB', '', 'MacOS', 1, '2024-07-31 19:29:00'),
(43, 'MacBook Pro 14 M3 8GB - 512GB | Chính hãng Apple Việt Nam', 2, 9, '3', '39.990.000', '38.790.300', 289, NULL, 'macbook-pro-m3-2023-den-dh_env1-4w.jpg', '<p><strong>Macbook Pro M3 14 inch</strong> được trang bị con chip được thiết kế tr&ecirc;n tiến tr&igrave;nh 3nm Apple M3 mới c&ugrave;ng với đ&oacute; l&agrave; bộ nhớ RAM 8GB v&agrave; bộ nhớ lưu trữ 512GB vượt trội. M&agrave;n h&igrave;nh Macbook Pro với k&iacute;ch thước 14 inch Liquid Retina XDR mang lại khả năng hiển thị vượt trội. M&aacute;y t&iacute;nh Macbook Pro M3 mới sẽ c&oacute; hai phi&ecirc;n bản m&agrave;u sắc cho người d&ugrave;ng lựa chọn l&agrave; bạc v&agrave; x&aacute;m kh&ocirc;ng gian.</p>\r\n', '14.2 inches', 'Độ sáng XDR: 1000 nit liên tục ở chế độ toàn màn hình Độ sáng đỉnh 1600 nit (chỉ nội dung HDR) True Tone ProMotion', '', '', '', '', '10 nhân Neural Engine 16 nhân', '8GB', '', '', '512GB', '70Wh', 'MacOS', 1, '2024-07-31 19:31:44'),
(44, 'Laptop Gaming Acer Nitro 5 Tiger AN515 58 52SP', 2, 8, '26', '28.300.000', '20.942.000', 276, NULL, '28_1_17.webp', '<p><strong>Laptop Acer Nitro 5 Tiger AN515-58-52SP</strong> mang vẻ ngoài phong thái sắc sảo, tích hợp hàng loạt c&ocirc;ng ngh&ecirc;̣ ph&acirc;̀n m&ecirc;̀m đời mới và đặc bi&ecirc;̣t là b&ocirc;̣ vi xử lý Intel ổn định. Chứa đựng hi&ecirc;̣u năng si&ecirc;u vượt tr&ocirc;̣i đ&atilde; góp ph&acirc;̀n làm n&ecirc;n chi&ecirc;́c laptop Acer Nitro 5 d&acirc;̃n đ&acirc;̀u ph&acirc;n khúc.</p>\r\n', '15.6 inches', 'Acer ComfyView LED-backlit TFT LCD', '', '', '', '', 'NVIDIA® GeForce RTX™ 3050 with 4GB of dedicated GDDR6 VRAM', '8 GB', '', '8GB DDR4 3200MHz', '512GB PCIe NVMe SED SSD cắm sẵn (nâng cấp tối đa 2TB Gen4, 16 Gb/s, NVMe và 1 TB 2.5-inch 5400 RPM)', '4-cell, 57.5 Wh', 'Windows 11 Home', 1, '2024-07-31 19:34:04'),
(45, 'Laptop Acer Gaming Aspire 7 A715-76-53PJ', 2, 8, '12', '16.990.000', '14.951.200', 354, NULL, 'text_ng_n_6_18.webp', '<p><strong>Laptop Acer Gaming Aspire 7 A715-76-53PJ</strong> l&agrave; chiếc laptop sở hữu cấu h&igrave;nh mạnh với bộ vi xử l&yacute; Intel Core thế hệ 12 v&agrave; card đồ họa Intel UHD Graphics. M&aacute;y c&oacute; m&agrave;n h&igrave;nh 15.6 inch, độ ph&acirc;n giải Full HD (1920 x 1080), bộ nhớ RAM 16GB DDR4 v&agrave; dung lượng lưu trữ SSD 512GB. Ngo&agrave;i ra, m&aacute;y c&ograve;n được trang bị c&aacute;c cổng kết nối như HDMI, USB Type-C, USB 3.2 Gen 1 Type-A, RJ-45 v&agrave; c&oacute; khả năng chơi game tốt.</p>\r\n', '15.6 inches', 'Acer ComfyView', '', '', '', '', 'Intel UHD Graphics', '16 GB', '', 'DDR4 3200Mhz', '512GB PCIe NVMe SSD (Nâng cấp tối đa 1 TB SSD PCIe Gen4, 16 Gb/s, NVMe)', '3-cell, 50Wh', 'Windows 11 Home', 1, '2024-07-31 19:36:11'),
(46, 'Laptop Acer Aspire 3 A314-42P-R3B3 NX.KSFSV.001', 2, 8, '12', '13.990.000', '12.311.200', 562, NULL, 'laptop-acer-aspire-3-a314-42p-r3b3_1_.webp', '<p><strong>Laptop Acer Aspire 3 A314-42P-R3B3</strong> l&agrave; chiếc laptop chất lượng c&oacute; trang bị bộ vi xử l&yacute; AMD Ryzen 7 5700U, bộ nhớ RAM 16GB v&agrave; ổ cứng SSD dung lượng 512GB. M&agrave;n h&igrave;nh của m&aacute;y c&oacute; k&iacute;ch thước 14.0 inch, độ ph&acirc;n giải FHD (1920 x 1200) IPS, Acer ComfyView&trade;. Thiết bị cũng được hỗ trợ card đồ họa AMD Radeon Graphics.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '14 inches', '45% NTSC LED Backlit Acer ComfyView', '', '', '', '', 'AMD Radeon™ Graphics', '16 GB', '', 'LPDDR4X Onboard', '512GB PCIe Gen4 NVMe (nâng cấp tối đa 1 TB PCIe Gen3)', '3 cell 50 Wh', 'Windows 11', 1, '2024-07-31 19:38:01'),
(47, 'Laptop Acer Gaming Aspire 5 A515-58GM-53PZ', 2, 8, '17', '20.490.000', '17.006.700', 45, NULL, 'text_ng_n_1__4_31.webp', '<p><strong>Laptop Acer Aspire 3 A314-42P-R3B3</strong> l&agrave; chiếc laptop chất lượng c&oacute; trang bị bộ vi xử l&yacute; AMD Ryzen 7 5700U, bộ nhớ RAM 16GB v&agrave; ổ cứng SSD dung lượng 512GB. M&agrave;n h&igrave;nh của m&aacute;y c&oacute; k&iacute;ch thước 14.0 inch, độ ph&acirc;n giải FHD (1920 x 1200) IPS, Acer ComfyView&trade;. Thiết bị cũng được hỗ trợ card đồ họa AMD Radeon Graphics.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '15.6 inches', 'Viền mỏng Màn hình chống chói Acer ComfyView', '', '', '', '', 'NVIDIA GeForce RTX 2050 4GB GDDR6', '8 GB', '', 'DDR4 3200MHz', '512GB PCIe NVMe Gen4 (2 khe, nâng cấp tối đa 2TB SSD)', '50Wh Li-ion', 'Windows 11 Home', 1, '2024-07-31 19:39:27'),
(48, 'Laptop Gaming Acer Nitro 5 AN515 58 52SP', 2, 8, '26', '28.300.000', '20.942.000', 78, NULL, '28_1_17.webp', '<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong><br />\r\n- Chip Core i5-12500H c&ugrave;ng card rời RTX&trade; 3050 4GB cho khả năng chiến c&aacute;c tựa game AAA, chỉnh sửa h&igrave;nh ảnh tr&ecirc;n PTS, Render video ngắn mượt m&agrave;.<br />\r\n- Ram 8GB + 1 khe trống cho ph&eacute;p n&acirc;ng cấp tối đa đến 32GB, ổ cứng SSD 512GB cho khả năng n&acirc;ng cấp vượt trội.<br />\r\n- M&agrave;n h&igrave;nh Full HD k&iacute;ch thước chuẩn 15.6 inch, tần số qu&eacute;t 144Hz, tấm nền IPS mang lại chất lượng hiển thị sắc n&eacute;t.<br />\r\n- T&iacute;ch hợp Webcam 720p cho ph&eacute;p đ&agrave;m thoại th&ocirc;ng qua video thoải m&aacute;i.<br />\r\n- Trọng lượng 2.5 kg cho cảm gi&aacute;c cầm chắc tay.<br />\r\n- Đ&egrave;n b&agrave;n ph&iacute;m được t&iacute;ch hợp đ&egrave;n - Thoả sức l&agrave;m việc trong m&ocirc;i trường thiếu s&aacute;ng<br />\r\n- Năng lượng bất tận cả ng&agrave;y với vi&ecirc;n pin 4-cell, 57.5 Wh.<br />\r\n- M&aacute;y đi k&egrave;m Windows 11 bản quyền.</p>\r\n', '15.6 inches', 'IPS 144Hz Acer ComfyView', '', '', '', '', 'NVIDIA® GeForce RTX™ 3050 4GB GDDR6', '8 GB', '', '8GB DDR4 3200MHz, tối đa 32GB', '512 GB PCIe NVMe SED SSD cắm sẵn Nâng cấp tối đa 2TB Gen4, NVMe và 1 TB 2.5-inch 5400 RPM', '4-cell, 57.5 Wh', 'Windows 11 Home', 1, '2024-07-31 19:42:58'),
(49, 'Laptop Gaming Acer Nitro V ANV15-51-55CA', 2, 8, '7', '27.990.000', '26.030.700', 225, NULL, 'laptop-gaming-acer-nitro-v-anv15-51-55ca-1.webp', '<p><strong>Laptop Gaming Nitro V ANV15-51-55CA&nbsp;</strong>đem lại trải nghiệm gaming mạnh mẽ với bộ vi xử l&yacute; Intel Gen 13 i5-13420H, c&ugrave;ng card đồ họa rời NVIDIA RTX 4050. Ngo&agrave;i ra, ấn phẩm laptop Acer gaming n&agrave;y cũng được trang bị 16GB RAM DDR5, cung cấp khả năng xử l&yacute; đa nhiệm mượt m&agrave;, v&agrave; bộ nhớ SSD 512GB, đảm bảo tốc độ truy xuất dữ liệu si&ecirc;u nhanh ch&oacute;ng. C&ugrave;ng với đ&oacute; l&agrave; k&iacute;ch thước m&agrave;n h&igrave;nh 15,6 inch, tần số qu&eacute;t 144Hz gi&uacute;p tối ưu h&oacute;a trải nghiệm h&igrave;nh ảnh sắc n&eacute;t v&agrave; mượt m&agrave; cho game thủ. đem lại trải nghiệm gaming mạnh mẽ với bộ vi xử l&yacute; Intel Gen 13 i5-13420H, c&ugrave;ng card đồ họa rời NVIDIA RTX 4050. Ngo&agrave;i ra, ấn phẩm laptop Acer gaming n&agrave;y cũng được trang bị 16GB RAM DDR5, cung cấp khả năng xử l&yacute; đa nhiệm mượt m&agrave;, v&agrave; bộ nhớ SSD 512GB, đảm bảo tốc độ truy xuất dữ liệu si&ecirc;u nhanh ch&oacute;ng. C&ugrave;ng với đ&oacute; l&agrave; k&iacute;ch thước m&agrave;n h&igrave;nh 15,6 inch, tần số qu&eacute;t 144Hz gi&uacute;p tối ưu h&oacute;a trải nghiệm h&igrave;nh ảnh sắc n&eacute;t v&agrave; mượt m&agrave; cho game thủ.</p>\r\n', '15.6 inches', 'Acer ComfyView LED-backlit TFT LCD 45% NTSC', '', '', '', '', 'NVIDIA GeForce RTX 4050 6GB GDDR6 VRAM', '16 GB', '', 'DDR5 5200 MHz', '512GB PCIe NVMe SSD (nâng cấp tối đa 2TB)', '4 cell, 57Wh', 'Windows 11 Home', 1, '2024-07-31 19:44:35'),
(50, 'Laptop Acer Swift Go 14 AI SFG14-73-53X7 NX.KSLSV.001', 2, 8, '3', '23.990.000', '23.270.300', 454, NULL, 'laptop-acer-swift-go-14-ai-sfg14-73-53x7.webp', '<p><strong>Laptop Acer Swift Go 14 AI SFG14-73-53X7</strong> hỗ trợ t&iacute;nh to&aacute;n, xử l&yacute; đồ hoạ si&ecirc;u mượt m&agrave; với CPU Intel Core Ultra 5-125H c&ugrave;ng card đồ họa Onboard Intel Arc. Kết hợp với đ&oacute; l&agrave; RAM 16GB LPDDR5x 6400MHz, v&agrave; SSD 512GB M.2 NVMe, hỗ trợ xử l&yacute; đa t&aacute;c vụ c&ugrave;ng 1 l&uacute;c v&agrave; lưu trữ, truy xuất dữ liệu mượt m&agrave;. Ngo&agrave;i ra, thế hệ laptop Acer Swift Go n&agrave;y c&ograve;n bao gồm m&agrave;n h&igrave;nh 14 inch IPS 120Hz độ ph&acirc;n giải 2880 x 1800, cung cấp khả năng hiển thị sắc n&eacute;t h&agrave;ng đầu.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '14 inches', '', '', '', '', '', 'Intel Arc Graphics', '16 GB', '', 'LPDDR5x 6400MHz', '512GB SSD M.2 NVMe', '4 cell 65 Wh , Pin liền', 'Windows 11 Home SL', 1, '2024-07-31 19:46:16'),
(51, 'Laptop Dell Inspiron 15 3520-5810BLK 102F0', 2, 10, '7', '13.990.000', '13.010.700', 854, NULL, 'text_ng_n_5__4_26.webp', '<p><strong>Laptop Dell Inspiron 15 3520-5810BLK 102F0</strong> trang bị con chip Core i5-1155G7 thế hệ 11 với hiệu năng ấn tượng, 8GB RAM n&acirc;ng cấp tối đa đến 16GB thoải m&aacute;i lưu trữ. Laptop Dell Inspiron 15 3520-5810BLK 102F0 cảm ứng với thiết kế nhỏ gọn, trọng lượng chỉ 1.9kg , m&agrave;n h&igrave;nh 15.6 inch chất lượng Full HD cực r&otilde; n&eacute;t.</p>\r\n', '15.6 inches', 'Độ sáng 250 nits Độ phủ màu NTSC 45% Màn hình chống chói', '', '', '', '', 'Intel Iris Xe Graphics', '8GB', '', 'DDR4 2666 MHz', '256GB', 'lithium-polymer', 'Windows 11', 1, '2024-07-31 19:48:53'),
(52, 'Laptop Dell Vostro 3520 F0V0VI3', 2, 10, '19', '11.990.000', '9.711.900', 51, NULL, 'dell-vostro-v3500-i5-1135g7-mx330.jpeg', '<p><strong>Laptop Dell Vostro 3520 F0V0VI3</strong> sử dụng bị bộ vi xử l&yacute; Intel Core i3 - 1215U kết hợp với RAM dung lượng 8GB cho khả năng xử l&yacute; c&ocirc;ng việc h&agrave;ng ng&agrave;y hiệu quả. M&aacute;y được trang bị ổ cứng SSD PCIe tốc độ cao với dung lượng 512GB gi&uacute;p bạn truy cập v&agrave; tải th&ocirc;ng tin nhanh ch&oacute;ng. M&agrave;n h&igrave;nh full HD k&iacute;ch thước 15.6 inch mang đến những khung h&igrave;nh mượt m&agrave; v&agrave; sắc n&eacute;t. M&aacute;y c&oacute; c&aacute;c cổng giao tiếp th&ocirc;ng dụng để bạn dễ d&agrave;ng chia sẻ dữ liệu.&nbsp;</p>\r\n', '15.6 inches', 'Độ sáng 250 nits Độ phủ màu NTSC 45% Thời gian phản hồi 35 ms Màn hình chống chói', '', '', '', '', 'Intel UHD Graphics', '8 GB', '', 'DDR4 SODIMM', '512GB PCIE', ' 3-cell, 41 Wh lithium-polymer', 'Windows 11', 1, '2024-07-31 19:51:09');
INSERT INTO `product` (`id`, `tenSanPham`, `cartegory_Id`, `brand_Id`, `giam`, `giaSanPham`, `giaKhuyenMai`, `soluongsp`, `soluongbanra`, `anhSanPham`, `thongTinSanPham`, `kichThuocManHinh`, `congNgheManHinh`, `doPhanGiaiManHinh`, `cameraSau`, `cameraTruoc`, `chipset`, `cardDoHoa`, `dungLuongRam`, `boNhoTrong`, `LoaiRam`, `oCung`, `pin`, `heDieuHanh`, `status`, `create_at`) VALUES
(53, 'Laptop Dell Gaming G7 15 7500 i7 10750H', 2, 10, '0', '24.999.000', '24.999.000', 100, NULL, 'dell-gaming-g7-15-7500-i7-10750h.jpg', NULL, '15.6 inches', NULL, NULL, NULL, NULL, NULL, 'VGA Nvidia GeForce GTX 1660Ti 6G', '8Gb - 2*4Gb (2 khe ram, hỗ trợ 32Gb)', NULL, NULL, '512Gb SSD (1 x 2.5\" SATA , 2 x M.2 NVMe)', '4 cell', 'Windows 10 Home', 1, '2024-07-31 19:53:38'),
(54, 'Laptop Dell Vostro 3520 Y4G15', 2, 10, '8', '18.990.000', '17.470.800', 521, NULL, 'dell-vostro-v3500-i5-1135g7-mx330.jpeg', '<p><strong>Laptop Dell Vostro 3520 Y4G15</strong> được đ&aacute;nh gi&aacute; cao về cấu h&igrave;nh mạnh mẽ nhờ chip i7 gen 12 kết hợp c&ugrave;ng thanh RAM DDR4 8GB v&agrave; ổ cứng SSD dung lượng cao. B&ecirc;n cạnh đ&oacute;, m&agrave;n h&igrave;nh của laptop cũng c&oacute; khả năng hiển thị Full HD chuy&ecirc;n nghiệp qua tần số qu&eacute;t 120Hz. Dựa tr&ecirc;n hệ điều h&agrave;nh Free OS, d&ograve;ng laptop Dell Vostro n&agrave;y cung cấp đa dạng tiện &iacute;ch với giao diện th&acirc;n thiện để người d&ugrave;ng thuận tiện thao t&aacute;c.&nbsp;</p>\r\n', '15.6 inches', 'Màn hình chống chói Độ phủ màu 45% NTSC Độ sáng 250 nits AG, Flat', '', '', '', '', 'NVIDIA GeForce MX550, 2 GB, GDDR6', '8 GB', '', 'DDR4, 2666 MHz', '512 GB, M.2 2230, PCIe NVMe SSD', '4-cell, 54 Wh lithium-polymer', 'Free OS', 1, '2024-07-31 19:56:01'),
(55, 'Laptop Dell Vostro 3520 GD02R', 2, 10, '11', '13.990.000', '12.451.100', 125, NULL, 'dell-vostro-v3500-i5-1135g7-mx330.jpeg', '<p><strong>Laptop Dell Vostro 3520 GD02R</strong> l&agrave; d&ograve;ng laptop văn ph&ograve;ng mang phong c&aacute;ch thiết kế hiện đại, trang bị bộ vi xử l&yacute; Intel Core i5-1135G7 mạnh mẽ, dung lượng RAM 8G. M&aacute;y với m&agrave;n h&igrave;nh 15,6 inches hiển thị sắc n&eacute;t với t&iacute;nh năng chống ch&oacute;i.</p>\r\n', '15.6 inches', 'Độ sáng 250 nits Độ phủ màu NTSC 45% Thời gian phản hồi 35 ms Màn hình chống chói', '', '', '', '', 'Intel Iris Xe Graphics', '8 GB', '', 'DDR4', '512GB PCIE M.2 2230', '', 'FREE OS', 1, '2024-07-31 20:03:21'),
(56, 'Laptop HP Pavilion 14-DV2073TU 7C0P2PA', 2, 11, '20', '20.990.000', '16.792.000', 23, NULL, 'text_ng_n_7__47.webp', '<p><strong>Laptop HP Pavilion 14-DV2073TU 7C0P2PA</strong> l&agrave; một trong những d&ograve;ng m&aacute;y c&oacute; trọng lượng nhẹ nh&agrave;ng. Cụ thể sản phẩm c&oacute; độ mỏng 17mm v&agrave; trọng lượng l&agrave; 1,41kg. Với trọng lượng n&agrave;y sẽ tương đương nhiều mẫu laptop m&agrave;n h&igrave;nh 14 inch. Nhờ đ&oacute; m&agrave; t&iacute;nh di động của sản phẩm được n&acirc;ng cấp vượt bậc.</p>\r\n', '14 inches', 'BrightView Độ sáng 250 nits Độ phủ màu 45% NTSC', '', '', '', '', 'Intel Iris Xe Graphics', '16 GB', '', 'DDR4 3200MHz', '512 GB PCIe NVMe M.2 SSD', '3-cell, 43 Wh Li-ion', 'Windows 11 Home 64', 1, '2024-07-31 20:07:07'),
(57, 'Laptop HP 15S-FQ5231TU 8U241PA', 2, 11, '19', '11.990.000', '9.711.900', 467, NULL, 'text_ng_n_2__4_21.webp', '<p><strong>Laptop HP 15S-FQ5231TU 8U241PA </strong>sở hữu cấu h&igrave;nh với con chip I3-1215U c&ugrave;ng với bộ nhớ RAM 8GB c&ugrave;ng ổ cứng lưu trữ dung lượng 256GB PCIE gi&uacute;p hoạt động ổn định. C&ugrave;ng với đ&oacute;, mẫu laptop HP n&agrave;y sở hữu hiện đại c&ugrave;ng m&agrave;n h&igrave;nh hiển thị 15.6 inch rộng r&atilde;i.</p>\r\n', '15.6 inches', '', '', '', '', '', 'Intel UHD Graphics', '8 GB', '', 'DDR4 3200', '256GB M.2 NVMe PCIe', '3 cell', 'Windows 11 Home', 1, '2024-07-31 20:13:13'),
(58, 'Laptop HP Gaming Victus 15-FB1023AX 94F20PA', 2, 11, '31', '24.490.000', '16.898.100', 42, NULL, 'text_ng_n_14__4_4_1.webp', '<p><strong>Laptop HP Gaming Victus 15 FB1023AX 94F20PA </strong>được trang bị bộ xử l&yacute; trung t&acirc;m AMD Ryzen 5 7535HS 6 nh&acirc;n, 12 luồng với tốc độ xung nhịp l&ecirc;n tới 4.5GHz. RAM dung lượng 8GB xử l&yacute; tốt khối lượng c&ocirc;ng việc tốt v&agrave; ph&ugrave; hợp để thiết kế đồ hoạ 2D. VGA NVIDIA Geforce RTX 2050 4GB tr&ecirc;n laptop HP Victus n&agrave;y mang tới trải nghiệm chiến game mượt m&agrave; tr&ecirc;n m&agrave;n h&igrave;nh rộng 15.6 inch c&ugrave;ng tần số qu&eacute;t 144Hz ấn tượng.&nbsp;</p>\r\n', '15.6 inches', 'Micro-edge Chống chói Độ sáng tối đa 250 nits Độ phủ màu 45% NTSC', '', '', '', '', 'NVIDIA GeForce RTX 2050 4GB GDD6', '8 GB', '', 'DDR5 4800 MHz', '512 GB PCIe Gen4 NVMe TLC M.2 SSD', '52.5 Wh , 3 Cell', 'Windows 11 Home', 1, '2024-07-31 20:16:24'),
(59, 'Laptop HP Pavilion 15-EG2089TU 7C0R1PA', 2, 11, '8', '21.900.000', '20.148.000', 87, NULL, 'text_ng_n_7__47.webp', '<p><strong>Laptop HP Pavilion 15-EG2089TU 7C0R1PA</strong> sở hữu ngoại h&igrave;nh nhỏ gọn, sang trọng, v&agrave; vẫn đảm bảo hiệu suất ổn định nhờ con chip mạnh mẽ. N&oacute;&nbsp;c&oacute; ngoại h&igrave;nh vu&ocirc;ng vức sang trọng. Tổng thể m&aacute;y kh&aacute; thanh thoat với trọng lượng nhẹ chưa đến 1.8kg. Nhờ đ&oacute; người d&ugrave;ng đem theo thiết bị một c&aacute;ch dễ d&agrave;ng khi đặt trong balo, t&uacute;i x&aacute;ch.&nbsp;Laptop sở hữu k&iacute;ch thước m&agrave;n h&igrave;nh 15.6 inch, độ s&aacute;ng 250 nits, kết hợp c&ocirc;ng nghệ BrightView mang đến chất lượng hiển thị r&otilde; r&agrave;ng, chi tiết, sử dụng ở những nơi c&oacute; &aacute;nh nắng gắt cũng kh&ocirc;ng bị ảnh hưởng tới qu&aacute; tr&igrave;nh trải nghiệm.Laptop trang bị con chip Intel Core i7-1260P v&agrave; 12 nh&acirc;n, 16 luồng đạt tối đa 4.7 GHz với khả năng tiết kiệm điện năng vượt trội, k&eacute;o d&agrave;i thời gian sử dụng l&acirc;u d&agrave;i.</p>\r\n', '15.6 inches', 'Bright View Độ sáng 250nits Độ phủ màu 45% NTSC Tần số quét 60Hz', '', '', '', '', 'Intel Iris Xe Graphics', '8 GB', '', 'DDR4 3200MHz (2 x 4GB)', '512GB SSD PCIe NVMe M.2', ' 3 Cell 41 WHrs 3440mAh', 'Windows 11 Home', 1, '2024-07-31 20:18:00'),
(60, 'Laptop Lenovo LOQ 15IAX9 83GS001RVN', 2, 12, '9', '22.490.000', '20.465.900', 91, NULL, 'text_ng_n_15__7_14.webp', '<p><strong>Laptop Lenovo LOQ 15IAX9 83GS001RVN</strong> được trang bị bộ xử l&yacute; Intel Core i5-12450HX với 8 l&otilde;i, 12 luồng c&ugrave;ng RAM DDR5-4800 cho khả năng đa nhiệm ấn tượng. Ổ cứng SSD 512GB chuẩn kết nối PCIe r&uacute;t ngắn thời gian truy xuất dữ liệu v&agrave; c&oacute; thể n&acirc;ng cấp với l&ecirc;n đến 1TB. M&agrave;n h&igrave;nh 15.6 inch cho v&ugrave;ng hiển thị rộng v&agrave; tốc độ phản hồi nhanh nhờ tần số qu&eacute;t 144Hz. Sản phẩm laptop Lenovo Gaming trang bị đầy đủ cổng giao tiếp để kết nối với nhiều thiết bị ngoại vi.&nbsp;</p>\r\n', '15.6 inches', 'Độ sáng 300 nits Màn hình chống chói Độ phủ màu 100% sRGB G-SYNC', '', '', '', '', 'NVIDIA GeForce RTX 3050 6GB GDDR6, Boost Clock 1732MHz, TGP 95W', '12 GB', '', '1 x 12GB SO-DIMM DDR5-4800', '512 GB SSD M.2 2242 PCIe 4.0x4 NVMe (1 khe SSD M.2 trống nâng cấp tối đa đến 1TB)', '60Wh', 'Windows 11 Home Single Language', 1, '2024-07-31 20:22:12'),
(61, 'Laptop Lenovo Ideapad Slim 5 14IAH8 83BF002NVN', 2, 12, '11', '17.290.000', '15.388.100', 56, NULL, 'text_ng_n_7__47.webp', '<p><strong>Laptop Lenovo Ideapad Slim 5 14IAH8 83BF002NVN</strong> l&agrave; một lựa chọn đ&aacute;ng c&acirc;n nhắc trong ph&acirc;n kh&uacute;c tầm trung. Với thiết kế hiện đại, mỏng nhẹ c&ugrave;ng bộ nhớ ấn tượng, sản phẩm laptop Lenovo Ideapad hứa hẹn sẽ khiến người d&ugrave;ng h&agrave;i l&ograve;ng.&nbsp;Bộ nhớ RAM 16GB Soldered LPDDR5 của laptop Lenovo Ideapad Slim 5 14IAH8 83BF002NVN cung cấp đủ kh&ocirc;ng gian để chạy nhiều ứng dụng v&agrave; c&ocirc;ng việc c&ugrave;ng một l&uacute;c m&agrave; kh&ocirc;ng l&agrave;m giảm hiệu suất hoạt động. Từ đ&oacute;, bạn c&oacute; thể sử dụng c&aacute;c phần mềm đ&ograve;i hỏi nhiều t&agrave;i nguy&ecirc;n với tốc độ xử l&yacute; đa nhiệm, mượt m&agrave;.&nbsp;</p>\r\n', '14 inches', 'Độ sáng 300nits Màn hình chống chói Độ phủ màu 45% NTSC TÜV Low Blue Light', '', '', '', '', 'Intel UHD Graphics', '16 GB', '', 'LPDDR5-4800 Onboard', '512GB SSD M.2 2242 PCIe 4.0x4 NVMe (nâng cấp tối đa đến 1TB)', ' 56.6Wh', 'Windows 11 Home', 1, '2024-07-31 20:23:53'),
(62, 'Laptop Lenovo V14 G4 AMN 82YT00M8VN', 2, 12, '24', '14.990.000', '11.392.400', 234, 1, 'laptop-lenovo-v14-g4-amn-82yt00m8vn-thumbnails.webp', '<p><strong>Laptop Lenovo V14 G4 AMN 82YT00M8VN</strong> sở hữu hiệu năng mạnh mẽ khi được trang bị con chip Ryzen 5 7520U, 16GB RAM v&agrave; 512GB dung lượng bộ nhớ. Với m&agrave;n h&igrave;nh 14 inch Full HD, sản phẩm laptop Lenovo V n&agrave;y kh&ocirc;ng chỉ mang tới sự nhỏ gọn, cơ động m&agrave; c&ograve;n c&oacute; được chất lượng h&igrave;nh ảnh sắc n&eacute;t. Thiết kế tối giản, lịch sự của laptop V14 G4 AMN 82YT00M8VN c&ugrave;ng độ bền chuẩn qu&acirc;n đội sẽ ph&ugrave; hợp để người d&ugrave;ng tiện lợi mang theo v&agrave; sử dụng ở bất kỳ nơi đ&acirc;u.</p>\r\n', '14 inches', 'Độ sáng 300nits Màn hình chống chói', '', '', '', '', 'AMD Radeon 610M Graphics', '16GB', '', 'LPDDR5-5500 Onboard', '512GB SSD M.2 2242 PCIe 4.0x4 NVMe', '38Wh', 'Windows 11 Home Single Language', 1, '2024-07-31 20:25:19'),
(63, 'Laptop Lenovo Gaming Legion 5 15ARH7H 82RD003TVN', 2, 12, '28', '35.900.000', '25.848.000', 46, NULL, 'fthy.webp', '<p><strong>Laptop Lenovo Gaming Legion 5 15ARH7H 82RD003TVN </strong>sở hữu vẻ ngo&agrave;i độc đ&aacute;o với t&ocirc;ng m&agrave;u x&aacute;m bạc lạ mắt cực c&aacute; t&iacute;nh. Từng g&oacute;c cạnh của laptop được thiết kế v&ocirc; c&ugrave;ng tỉ mỉ, lớp ngo&agrave;i l&agrave;m bằng hợp kim nh&ocirc;m mang đến sự chắc chắn v&agrave; bền bỉ cho sản phẩm n&agrave;y. Laptop được trang bị CPU AMD với hiệu suất cao gi&uacute;p xử l&yacute; c&aacute;c t&aacute;c vụ đơn giản một c&aacute;ch nhanh ch&oacute;ng v&agrave; dễ d&agrave;ng.</p>\r\n\r\n<p>Th&ecirc;m v&agrave;o đ&oacute;, laptop c&ograve;n được trang bị card RTX 3060 c&oacute; khả năng mang đến tốc độ xử l&yacute; h&igrave;nh ảnh chất lượng, gi&uacute;p h&igrave;nh ảnh chuyển động mượt m&agrave; giữa c&aacute;c khung h&igrave;nh nhằm để game thủ thưởng thức c&aacute;c tựa game đồ họa cao.</p>\r\n', '15.6 inches', 'IPS 300nits Anti-glare, 100% sRGB, Dolby Vision, Free-Sync, G-Sync, DC dimmer', '', '', '', '', 'NVIDIA GeForce RTX 3060', '16 GB', '', 'DDR5-4800', '512GB SSD M.2 2280 PCIe 4.0x4 NVMe', '80Wh', 'Windows 11 Home', 1, '2024-07-31 20:26:39'),
(64, 'Laptop MSI Cyborg 15 A12VE-412VN', 2, 14, '24', '24.990.000', '18.992.400', 87, NULL, 'text_ng_n_9__1_110.webp', '<p><strong>Laptop MSI Cyborg 15 A12VE-412VN</strong> thuộc d&ograve;ng laptop MSI gaming cao cấp với hiệu năng xuất sắc. Với c&ocirc;ng nghệ xử l&yacute; h&agrave;ng đầu kết hợp c&ugrave;ng những linh kiện chất lượng cao, phi&ecirc;n bản rất xứng đ&aacute;ng để c&aacute;c game thủ trang bị cho nhu cầu sử dụng của bản th&acirc;n.&nbsp;Laptop được thiết kế với bộ chip i5-12450H thế hệ thứ 12 của Intel c&oacute; khả năng đảm nhiệm xử l&yacute; những ứng dụng nặng một c&aacute;ch hiệu quả. B&ecirc;n cạnh đ&oacute;, chiếc laptop gaming n&agrave;y c&ograve;n g&acirc;y ấn tượng với card đồ họa RTX 4050 thuộc thế hệ RTX 40 Series. Nhờ sự kết hợp ho&agrave;n hảo giữa hai th&ocirc;ng số n&agrave;y m&agrave; laptop c&oacute; thể ho&agrave;n tất nhanh ch&oacute;ng mọi t&aacute;c vụ đa nhiệm m&agrave; kh&ocirc;ng lo gi&aacute;n đoạn.</p>\r\n', '15.6 inches', 'Độ phủ màu 45% NTSC, 65% sRGB', '', '', '', '', 'NVIDIA GeForce RTX 4050 6GB 40W', '8 GB', '', 'DDR5 4800MHz', '512GB NVMe PCIe Gen 4 SSD', '3 cell, 53.5Whr', 'Windows 11 Home', 1, '2024-07-31 20:28:52'),
(65, 'Laptop MSI Gaming GF63 Thin 11UC-1228VN', 2, 14, '21', '20.990.000', '16.582.100', 63, NULL, 'text_ng_n_9__1_10.webp', '<p><strong>Laptop MSI gaming GF63 thin 11UC-1228VN</strong> được trang bị bộ xử l&yacute; Core i7 11800H từ Intel với RAM 8GB chuẩn DDR4 k&egrave;m SSD 512GB cho khả năng lưu trữ lớn. Sản phẩm sử dụng card đồ họa NVIDIA GeForce RTX 3050 kết hợp c&ugrave;ng m&agrave;n h&igrave;nh 15.6 inch, tần số qu&eacute;t 144Hz mang đến trải nghiệm chiến game mượt m&agrave;.</p>\r\n', '15.6 inches', '', '', '', '', '', 'NVIDIA GeForce RTX 3050, 4GB GDDR6', '8 GB', '', 'DDR4-3200', '512GB PCIE', '3-Cell 52.4 (Whr)', 'Windows 11 Home', 1, '2024-07-31 20:30:17'),
(66, 'Laptop MSI Gaming GF63 Thin 12UC-803VN', 2, 14, '16', '18.990.000', '15.951.600', 45, NULL, 'text_ng_n_9__1_110.webp', '<p><strong>Laptop MSI Gaming GF63 Thin 12UC-803VN </strong>c&oacute; hiệu năng xử l&yacute; từ chipset Intel Core i5 thế hệ 12 Alder Lake c&ugrave;ng với card rời NVIDIA GeForce RTX 3050 4GB. Laptop trang bị RAM 8GB hỗ trợ n&acirc;ng cấp đến 64GB c&ugrave;ng ổ cứng SSD dung lượng 512GB. M&aacute;y sử dụng m&agrave;n h&igrave;nh IPS, 15.6 inch FullHD với tần số qu&eacute;t 144Hz c&ugrave;ng nhiều c&ocirc;ng nghệ tuyệt vời.</p>\r\n', '15.6 inches', 'Độ sáng 400 nits Màn hình chống chói Độ phủ màu 45% sRGB Thời gian phản hồi 25ms', '', '', '', '', 'NVIDIA GeForce RTX 3050 4 GB GDDR6', '8 GB', '', 'DDR4', '512 GB SSD NVMe PCIe Gen 4.0 Hỗ trợ khe cắm HDD SATA 2.5 inch mở rộng', '52.4 Wh', 'Windows 11 Home SL', 1, '2024-07-31 20:31:55'),
(67, 'Laptop MSI Gaming Thin GF63 12VE-454VN', 2, 14, '17', '22.990.000', '19.081.700', 62, 1, 'text_ng_n_9__1_10.webp', '<p><strong>Laptop MSI Gaming Thin GF63 12VE-454VN&nbsp;</strong>l&agrave; một chiếc laptop gaming sở hữu bộ xử l&yacute; Intel Core i5 v&agrave; card đồ họa NVIDIA GeForce RTX 4050 mạnh mẽ vượt trội. Với bộ nhớ RAM 16GB DDR4 3200 v&agrave; ổ cứng SSD 512GB gi&uacute;p truy cập dữ liệu nhanh ch&oacute;ng. Pin 52.4 Wh gi&uacute;p sử dụng thoải m&aacute;i trong thời gian d&agrave;i, v&agrave; cổng kết nối đa dạng bao gồm USB Type-C/DP, USB Type A, HDMI, &hellip; M&agrave;n h&igrave;nh 15.6 inch IPS FHD với tần số qu&eacute;t 144Hz mang lại trải nghiệm hiển thị sống động.&nbsp;</p>\r\n', '15.6 inches', 'Độ phủ màu 45% NTSC', '', '', '', '', 'NVIDIA GeForce RTX 4050 6 GB GDDR6 Intel Iris Xe', '16 GB', '', 'DDR4 3200Mhz', ' 512 GB SSD M.2 NVMe', '52.4 Wh', 'Windows 11 Home', 1, '2024-07-31 20:34:07'),
(68, 'Laptop MSI Modern 14 C13M-458VN', 2, 14, '33', '17.990.000', '12.053.300', 42, NULL, 'text_ng_n_1__1_111.webp', '<p><strong>Laptop MSI Modern 14 C13M-458VN I5 </strong>l&agrave; d&ograve;ng sản phẩm được kế thừa thiết kế truyền thống nhưng lại thể hiện được sự thanh lịch, gọn nhẹ v&agrave; cực kỳ dễ di chuyển. Đặc biệt, thế hệ laptop MSI Modernn&agrave;y c&ograve;n sở hữu một cấu h&igrave;nh mạnh mẽ gi&uacute;p người d&ugrave;ng c&oacute; thể xử l&yacute; mọi t&aacute;c vụ nhanh ch&oacute;ng v&agrave; mượt m&agrave;. L&agrave; mẫu laptop được thiết kế với một thiết kế mỏng nhẹ, sang trọng v&agrave; hiện đại. B&ecirc;n cạnh đ&oacute;, từng đường n&eacute;t, chi tiết được ho&agrave;n thiện chỉn chu v&ocirc; c&ugrave;ng ph&ugrave; hợp cho những người d&ugrave;ng cần di chuyển nhiều.</p>\r\n', '14 inches', 'Chống chói, góc mở 180 độ', '', '', '', '', 'Intel Iris Xe Graphics', '8 GB', '', 'DDR4 3200MHz Onboard', '512GB SSD M.2 NVMe / 1 x M.2 NVMe', '3 cell, 39.3Whr', 'Windows 11 Home', 1, '2024-07-31 20:35:41'),
(69, 'Laptop MSI Gaming Bravo 15 B7ED-010VN', 2, 14, '11', '18.490.000', '16.456.100', 489, NULL, 'text_ng_n_12__3_11.webp', '<p><strong>MSI Bravo 15</strong> l&agrave; d&ograve;ng laptop sở hữu một cấu h&igrave;nh vượt trội với con chip R5-7535HS c&ugrave;ng với đ&oacute; l&agrave; bộ nhớ RAM 16GB (8GB + 8GB). B&ecirc;n cạnh đ&oacute;, laptop c&ograve;n được trang bị ổ cứng thể rắn SSD PCIE với dung lượng 512GB v&agrave; card đồ họa VGA 4GB RX6550M. Laptop c&ograve;n sở hữu một m&agrave;n h&igrave;nh 15.6 inch 144HZ mang lại một trải nghiệm hiển thị vượt trội.</p>\r\n', '15.6 inches', 'Độ phủ màu 45% NTSC', '', '', '', '', 'AMD Radeon RX 6550M, 4 GB', '16 GB', '', 'DDR5 4800 MHz', '512 GB SSD NVMe PCIe Gen 4.0 (Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng)', '3 cell, 53 Wh', 'Windows 11 Home SL', 1, '2024-07-31 20:37:07'),
(70, 'Laptop ASUS VivoBook Go 14 E1404FA-NK177W', 2, 13, '14', '14.490.000', '12.461.400', 23, NULL, 'asus-vivobook-a515ep-bq193t-i5-1135g7.jpg', '<p><strong>Laptop Asus Vivobook Go 14 E1404FA-NK177W</strong> l&agrave; một sản phẩm thuộc series Asus Vivobook do đ&oacute; laptop Asus Vivobook Go 14 E1404FA-NK177W sở hữu nhiều đặc điểm của series n&agrave;y. B&ecirc;n cạnh đ&oacute; l&agrave; nhiều t&iacute;nh năng được n&acirc;ng cấp, hỗ trợ tối ưu trong qu&aacute; tr&igrave;nh sử dụng của người d&ugrave;ng.&nbsp;Laptop sở hữu một thiết kế si&ecirc;u mỏng nhẹ với tổng trọng lượng chỉ khoảng 1.38kg. laptop với thiết kế bản lề phẳng c&oacute; thể mở rộng l&ecirc;n đến 180 độ. B&agrave;n ph&iacute;m thiết bị với thiết kế r&uacute;t gọn sở hữu một h&agrave;nh tr&igrave;nh ph&iacute;m tối ưu c&ugrave;ng độ nảy tốt gi&uacute;p mang lại cho người d&ugrave;ng trải nghiệm g&otilde; thoải m&aacute;i.</p>\r\n', '14 inches', 'Tỉ lệ 16:9 Độ sáng tối đa 250nits Độ phủ màu 45% NTSC Màn hình chống chói Công nghệ LCD', '', '', '', '', 'AMD Radeon Graphics', '16 GB', '', 'LPDDR5 onboard', 'SSD 512GB M.2 NVMe PCIe 3.0', '42WHrs, 3S1P, Li-ion 3 cell', 'Windows 11 Home', 1, '2024-07-31 20:39:45'),
(71, 'Laptop ASUS TUF Gaming F15 FX507ZC4-HN074W', 2, 13, '26', '25.990.000', '19.232.600', 452, NULL, 'text_ng_n_2__3_24.webp', '<p><strong>Laptop Asus Tuf Gaming F15 FX507ZC4-HN074W </strong>l&agrave; d&ograve;ng laptop gaming c&oacute; hiệu năng vượt trội, nhiều t&iacute;nh năng t&acirc;n tiến v&agrave; tuyệt vời cho game thủ. Mẫu laptop n&agrave;y kh&ocirc;ng chỉ thực hiện tốt khả năng xử l&yacute; đồ họa m&agrave; c&ograve;n c&oacute; những chuyển động nhanh nhạy chuẩn x&aacute;c.&nbsp;Laptop c&oacute; khả năng chiến game cực khủng nhờ con chip Intel Core i5 12500H. Bạn c&oacute; thể thoải m&aacute;i thực hiện c&aacute;c t&aacute;c vụ phức tạp như chạy code, xử l&yacute; đồ họa hoặc chiến game.&nbsp;Thiết bị c&ograve;n sở hữu đồ họa ấn tượng nhờ NVIDIA GeForce RTX 3050 laptop GPU c&ugrave;ng c&ocirc;ng nghệ Mux Switch v&agrave; NVIDIA Optimus. Nhờ vậy bạn c&oacute; thể trải nghiệm khả năng chơi game mượt m&agrave;, chuyển động chuẩn x&aacute;c trong từng khung h&igrave;nh.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n', '15.6 inches', 'Độ sáng 250nits Độ phủ màu: NTSC 45%, SRGB 62.50%, Adobe 47.34% Màn hình chống chói Adaptive-Sync', '', '', '', '', 'NVIDIA GeForce RTX 3050 4GB GDDR6 Intel Iris Xe Graphics', '8 GB', '', 'DDR4-3200 SO-DIMM', '512GB PCIe 3.0 NVMe M.2 SSD (1 khe SSD M.2 trống nâng cấp tối đa đến 1TB)', '56WHrs, 4S1P, 4-cell Li-ion', 'Windows 11 Home', 1, '2024-07-31 20:40:56'),
(72, 'Laptop ASUS VivoBook 15 OLED A1505VA-L1114W', 2, 13, '15', '20.990.000', '17.841.500', 318, 3, 'text_ng_n_2__2_57.webp', '<p><strong>Laptop Asus Vivobook 15 OLED A1505VA-L1114W</strong> mang đến những trải nghiệm l&agrave;m việc v&agrave; giải tr&iacute; tuyệt vời khi sở hữu th&ocirc;ng số cấu h&igrave;nh v&ocirc; c&ugrave;ng ấn tượng. Thiết bị gi&uacute;p bạn ho&agrave;n th&agrave;nh mọi c&ocirc;ng việc nhanh ch&oacute;ng khi t&iacute;ch hợp bộ vi xử l&yacute; h&agrave;ng đầu. Với m&agrave;n h&igrave;nh OLED rực rỡ, chiếc laptop Asus Vivobook cũng mở ra một thế giới giải tr&iacute; v&ocirc; c&ugrave;ng phong ph&uacute; v&agrave; ch&acirc;n thực.&nbsp;Asus Vivobook 15 OLED được trang bị bộ vi xử l&yacute; thế hệ thứ 13 Intel Core i5-13500H, chiếc laptop gi&uacute;p bạn xử l&yacute; mọi t&aacute;c vụ v&ocirc; c&ugrave;ng mượt m&agrave; v&agrave; nhanh ch&oacute;ng. Với 12 nh&acirc;n v&agrave; xung nhịp l&ecirc;n đến 4.7GHz, bộ vi xử l&yacute; gi&uacute;p bạn tăng năng suất l&agrave;m việc, cũng như mang đến những trải nghiệm giải tr&iacute; ấn tượng.</p>\r\n', '15.6 inches', 'Thời gian phản hồi 0.2ms Tần số quét 60Hz Độ sáng tối đa 600nits HDR Độ phủ màu 100% DCI-P3 Display HDR True Black 600 1.07 tỷ màu TÜV Rheinland-certified SGS Eye Care Display', '', '', '', '', 'Intel Iris Xe Graphics', '16 GB', '', 'DDR4', '512GB M.2 NVMe PCIe 3.0 SSD', '50WHrs, 3S1P, 3-cell Li-ion', 'Windows 11 Home', 1, '2024-07-31 20:42:50'),
(73, 'Laptop ASUS Zenbook 14 OLED UM3402YA-KM405W', 2, 13, '18', '24.990.000', '20.491.800', 127, 1, 'text_ng_n_17__4_9.webp', '<p><strong>Laptop Asus Zenbook 14 OLED UM3402YA-KM405W</strong> sở hữu sức mạnh đỉnh cao với vi xử l&yacute; AMD Ryzen 5 - 7530 2.0 GHz, RAM 16GB LPDDR4X ổn định trong mọi t&aacute;c vụ. Với ổ SSD 512GB M.2 NVMe&trade; PCIe&reg; 3.0, Zenbook 14 đảm bảo dung lượng lớn để lưu trữ dữ liệu. M&agrave;n h&igrave;nh laptop Asus Zenbook 14&quot; NanoEdge OLED 2.8K của m&aacute;y mang lại trải nghiệm hiển thị tuyệt vời với khả năng lọc &aacute;nh s&aacute;ng xanh đến 70%.&nbsp;</p>\r\n', '14 inches', 'Thời gian phản hồi 0.2ms Độ sáng tối đa 400 nit HDR Độ phủ màu 100% DCI-P3 Display HDR True Black 600 1 tỉ màu PANTONE Validated Glossy display Giảm ánh sáng xanh 70% SGS Eye Care Display', '', '', '', '', 'AMD Radeon Graphics', '16 GB', '', 'LPDDR4X Onboard', '512GB M.2 NVMe PCIe 3.0 SSD', '75WHrs, 2S2P, 4-cell Li-ion', 'Windows 11 Home', 1, '2024-07-31 20:44:29'),
(74, 'Laptop ASUS ROG Strix G16 G614JU-N3135W', 2, 13, '21', '39.990.000', '31.592.100', 100, NULL, 'text_ng_n_1__1_96_1_1_1_1.webp', '<p><strong>Laptop Asus ROG Strix G16</strong> mang đến một thiết kế cực kỳ ấn tượng, đậm chất Gaming cho c&aacute;c game thủ ch&iacute;nh hiệu. Với hiệu năng cực đỉnh c&ugrave;ng cấu h&igrave;nh m&aacute;y mạnh mẽ, gi&uacute;p bạn c&oacute; thể trải nghiệm chơi game ấn tượng. M&agrave;n h&igrave;nh laptop Asus Gaming n&agrave;y sắc n&eacute;t cho từng chi tiết được hiển thị một c&aacute;ch ch&acirc;n thật v&agrave; sống động. Laptop trang bị cho m&igrave;nh một bộ vi xử l&yacute; Intel Core i5 thế hệ 13 mới nhất cho ph&eacute;p m&aacute;y vận h&agrave;nh mượt m&agrave; mọi t&aacute;c vụ. Tốc độ xử l&yacute; l&ecirc;n đến 4.6GHz gi&uacute;p tăng hiệu suất, giảm thời gian xử l&yacute; v&agrave; cho bạn trải nghiệm tuyệt vời ở c&aacute;c tựa game nặng hay tr&igrave;nh thiết kế đồ họa nhiều chi tiết.</p>\r\n', '16 inches', 'Tần số quét 165Hz Thời gian phản hồi 7ms Độ sáng 250nits Độ phủ màu 100% SRGB % Màn hình chống chói G-Sync Dolby Vision HDR', '', '', '', '', 'NVIDIA GeForce RTX 4050 6GB GDDR6', '8 GB', '', 'DDR5-4800 SO-DIMM', '512GB PCIe 4.0 NVMe M.2 SSD Hỗ trợ SSD M.2 SSD PCIe 512GB/1TB/2TB G4x4 Khe cắm mở rộng (bao gồm cả đã sử dụng): 2x DDR5 SO-DIMM 2x PCIe', '90WHrs, 4S1P, 4-cell Li-ion', 'Windows 11 Home', 1, '2024-07-31 20:46:18'),
(75, 'Laptop Asus Vivobook S 15 S5507QA-MA089WS Copilot+ X Elite', 2, 13, '0', '34.990.000', '34.990.000', 111, NULL, 'text_ng_n_15__7_26.webp', '<p><strong>Asus Vivobook S 15 S5507 </strong>d&ograve;ng laptop AI nổi bật với bộ xử l&yacute; Snapdragon&reg; X Elite 3.4GHz, GPU Adreno&trade;, RAM tối đa 32GB v&agrave; bộ nhớ SSD 1TB . Sản phẩm c&ograve;n sở hữu m&agrave;n h&igrave;nh OLED 15.6-inch 3K HDR, 120Hz, 100% DCI-P3 , c&ugrave;ng c&ocirc;ng nghệ bảo vệ mắt ti&ecirc;n tiến. Điểm đặc biệt của chiếc laptop Asus Vivobook n&agrave;y c&ograve;n nằm ở khả năng t&iacute;ch hợp AI Copilot n&acirc;ng cao hiệu suất l&agrave;m việc v&agrave; s&aacute;ng tạo.</p>\r\n', '15.6 inches', 'Độ phân giải 3K Tỉ lệ 16:9 Thời gian phản hồi 0.2ms Độ sáng 600nits HDR Độ phủ màu 100% DCI-P3 Công nghệ Low Blue Light phát ra ít hơn 70% ánh sáng xanh gây hại Công nghệ bảo vệ mắt SGS Eye Care Display', '', '', '', '', 'Qualcomm Adreno GPU', '32GB', '', 'LPDDR5X Onboard', '1TB M.2 NVMe PCIe 4.0 SSD', '70WHrs, 3S1P, 3-cell Li-ion', 'Windows 11 Home', 1, '2024-07-31 20:48:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_Id` int(11) DEFAULT NULL,
  `anhMoTa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_Id`, `anhMoTa`) VALUES
(1, 1, 'iphone-15-pro-max_9__1.webp'),
(2, 1, 'iphone-15-pro-max_4__1.webp'),
(5, 2, 'vn_iphone_15_pink_pdp_image_position-2_design_2.webp'),
(6, 2, 'vn_iphone_15_pink_pdp_image_position-7_features_specs_2.jpg'),
(7, 3, 'iphone_13_128gb_-_4_1_.webp'),
(8, 3, 'iphone_13_128gb_-_1_1_.webp'),
(9, 4, '896_2.png'),
(10, 4, '2522.png'),
(11, 5, 'iphone-15-pro-256gb_3_.webp'),
(12, 5, 'iphone-15-pro-256gb_8_.webp'),
(13, 6, '_0004_iphone_12_green_hero_2-up_cropped_screen__usen_4.webp'),
(14, 7, '_0003_iphone_12_pro_graphite_hero_2-up_lean_cropped_screen__usen_3.jpg'),
(15, 8, 'iphone-11-trang-3-1_1.jpg'),
(16, 8, 'iphone-11-trang_1.jpg'),
(17, 9, 'samsung-galaxy-z-fold-6-xanh_3_.webp'),
(18, 9, 'samsung-galaxy-z-fold-6-xanh_4_.webp'),
(19, 9, 'samsung_galaxy_z_fold_6_-_1_2.webp'),
(20, 10, 'samsung-galaxy-z-flip-6-xanh-duong-3_2.webp'),
(21, 10, 'samsung-galaxy-z-flip-6-xanh-duong-1_2.webp'),
(22, 10, 'samsung_galaxy_z_flip_6_-_1.webp'),
(23, 11, 'samsung-galaxy-z-flip5-tim-1_2.webp'),
(24, 11, 'samsung-galaxy-z-flip-xam-3_2.webp'),
(25, 11, 'samsung-galaxy-z-flip-xam-6_2.webp'),
(26, 11, 'galaxy_z_flip5_256gb_-_9.webp'),
(27, 12, 'samsung-galaxy-s24-ultra_7_.webp'),
(28, 12, 'samsung-galaxy-s24-ultra_5_.webp'),
(29, 12, 'samsung_galaxy_s24_ultra_256gb_-_1.png'),
(30, 13, 'samsung-s23_1.webp'),
(31, 13, 't_i_xu_ng_14_1.webp'),
(32, 13, 'samsung_s23_-_1_1_1.webp'),
(33, 14, 'samsung_galaxy_a55_5g_8gb_128gb_-_4.webp'),
(34, 14, 'samsung_galaxy_a55_5g_8gb_128gb_-_3.png'),
(35, 14, 'samsung_galaxy_a55_5g_8gb_128gb_-_2.png'),
(36, 15, 'samsung-galaxy-s24_8_.png'),
(37, 15, 's24-256.webp'),
(38, 15, 'samsung_galaxy_s24_256gb_-_9.webp'),
(39, 15, 'samsung_galaxy_s24_256gb_-_1.png'),
(40, 16, 'galaxy-a54-128-7.webp'),
(41, 16, 'galaxy-a54-256-5_3.webp'),
(42, 16, 'galaxy-a54-256-3_1.webp'),
(43, 16, 'galaxy-a54-128-1.webp'),
(44, 17, 'xiaomi_redmi_note_13_pro_plus_5g_8gb_256gb_-_11.webp'),
(45, 17, 'xiaomi_redmi_note_13_pro_plus_5g_8gb_256gb_-_4.webp'),
(46, 17, 'xiaomi_redmi_note_13_pro_plus_5g_8gb_256gb_-_10.webp'),
(47, 17, 'xiaomi_redmi_note_13_pro_plus_5g_8gb_256gb_-_7.webp'),
(48, 17, 'xiaomi_redmi_note_13_pro_plus_5g_8gb_256gb_-_3.webp'),
(49, 17, 'xiaomi_redmi_note_13_pro_plus_5g_8gb_256gb_-_1.webp'),
(50, 18, 'xiaomi_redmi_note_13_pro_4g_-_3.webp'),
(51, 18, 'xiaomi_redmi_note_13_pro_4g_-_10.webp'),
(52, 18, 'xiaomi_redmi_note_13_pro_4g_-_7.png'),
(53, 18, 'xiaomi_redmi_note_13_pro_4g_-_1.webp'),
(54, 19, 'xiaomi-13t-pro_9_.webp'),
(55, 19, 'xiaomi_13t_pro_-_6.webp'),
(56, 19, 'xiaomi_13t_pro_-_4.webp'),
(57, 19, 'xiaomi_13t_pro_-_1.webp'),
(58, 20, 'xiaomi_poco_x6_pro_5g_8gb_256gb_-_10.png'),
(59, 20, 'xiaomi_poco_x6_pro_5g_8gb_256gb_-_3.webp'),
(60, 20, 'xiaomi_poco_x6_pro_5g_8gb_256gb_-_5.png'),
(61, 20, 'xiaomi_poco_x6_pro_5g_8gb_256gb_-_6.webp'),
(62, 20, 'xiaomi_poco_x6_pro_5g_8gb_256gb_-_1.webp'),
(63, 21, 'poco_m6_-_6.webp'),
(64, 21, 'poco_m6_-_3.webp'),
(65, 21, 'poco_m6_-_1.png'),
(66, 22, 'gtt7766_8_.webp'),
(67, 22, 'gtt7766_5_.webp'),
(68, 22, 'gtt7766_2_.webp'),
(69, 23, 'oppo-reno12-f-5g_lfgj-q7 (1).jpg'),
(70, 24, 'dien-thoai-oppo-reno-11-f-2.webp'),
(71, 24, 'oppo_reno_11_f_-_8.png'),
(72, 24, 'oppo_reno_11_f_-_3.png'),
(73, 24, 'oppo_reno_11_f_-_1.webp'),
(74, 25, 'OPPO-12-Enduring1-D-v2.webp'),
(75, 25, 'oppo-reno12.PNG'),
(76, 26, 'oppo-find-x5-pro-1.webp'),
(77, 26, 'oppo_find_x5_pro_12gb_256gb_-_5.webp'),
(78, 26, 'oppo_find_x5_pro_12gb_256gb_-_4.webp'),
(79, 26, 'oppo_find_x5_pro_12gb_256gb_-_1.webp'),
(80, 27, 'find_n3_-_combo_product_-_gold.webp'),
(81, 27, 'oppo_find_n3_fold_-_10.webp'),
(82, 27, 'oppo_find_n3_fold_-_3.png'),
(83, 27, 'oppo_find_n3_fold_-_2.webp'),
(84, 27, 'oppo_find_n3_fold_-_1.webp'),
(85, 28, 'realme-c67-den-1_1.webp'),
(86, 28, 'realme_c67_4gb_128gb_-_7.webp'),
(87, 28, 'realme_c67_4gb_128gb_-_3.png'),
(88, 28, 'realme_c67_4gb_128gb_-_1.webp'),
(89, 29, 'realme-c53-5.webp'),
(90, 29, 'realme-c53-4.webp'),
(91, 29, 'realme-c53-2.webp'),
(92, 29, 'realme-c53-3.webp'),
(93, 29, 'realme-c53-1.webp'),
(94, 30, 'frame_133_1_3.webp'),
(95, 30, 'realme_c61_4gb_128gb_-_5.webp'),
(96, 30, 'realme_c61_4gb_128gb_-_3.webp'),
(97, 30, 'realme_c61_4gb_128gb_-_2.webp'),
(98, 30, 'realme_c61_4gb_128gb_-_1.webp'),
(99, 31, 'vivo-y03-xanh-3.png'),
(100, 31, 'vivo-y03-den-2.webp'),
(101, 31, 'dien-thoai-vivo-y03-26-03-2024-3.webp'),
(102, 31, 'dien-thoai-vivo-y03-26-03-2024-4.png'),
(103, 31, 'dien-thoai-vivo-y03-26-03-2024-2.webp'),
(104, 31, 'dien-thoai-vivo-y03-26-03-2024-1.webp'),
(105, 32, 'dien-thoai-vivo-v30e_6_.webp'),
(106, 32, 'vivo_v30e_12gb_256gb_-_5-11.webp'),
(107, 32, 'vivo_v30e_12gb_256gb_-_4-10.png'),
(108, 32, 'dien-thoai-vivo-v30e-9.webp'),
(109, 32, 'dien-thoai-vivo-v30e-7.png'),
(110, 33, 'vivo-v29e_12_.webp'),
(111, 33, 'vivo_v29e_-_17.webp'),
(112, 33, 'vivo_v29e_-_18.png'),
(113, 33, 'vivo_v29e_-_12.webp'),
(114, 33, 'vivo_v29e_-_19.webp'),
(115, 33, 'vivo_v29e_-_11.webp'),
(116, 34, 'vivo-v27-023.webp'),
(117, 34, 'vivo_v27e_-_6.webp'),
(118, 34, 'vivo_v27e_-_4.webp'),
(119, 34, 'vivo_v27e_-_2.webp'),
(120, 34, 'vivo_v27e_-_1.webp'),
(121, 35, 'thiet-ke_piig-rw.jpg'),
(122, 35, 'e.jpg'),
(123, 36, 'chip-huawei-pura-70-ultra.jpg'),
(124, 36, 'man-hinh-huawei-pura-70-ultra.jpg'),
(125, 36, 'gia-huawei-pura-70-ultra.jpg'),
(126, 37, 'bb_6260-go_wvuz-il.jpg'),
(127, 37, 'aa_7xfl-hf_mukb-jn.jpg'),
(128, 38, 'macbookm1.webp'),
(129, 38, 'macbook-air-2020-m1_6_.webp'),
(130, 38, 'macbook-air-2020-m1_4_.webp'),
(131, 38, 'macbook-air-2020-m1_2_.webp'),
(132, 38, 'macbook-air-2020-m1_1_.webp'),
(133, 38, 'mac_air_ksp.webp'),
(134, 39, '6_17_6.webp'),
(135, 39, '4_33_8.webp'),
(136, 39, '3_40_7.webp'),
(137, 39, '2_54_9.webp'),
(138, 40, 'macbook-air-m3-13-inch-2024_9_.webp'),
(139, 40, 'macbook-air-m3-13-inch-2024_3__3.png'),
(140, 40, 'text_ng_n_9__4_70.webp'),
(141, 40, 'macbook-air-m3-13-inch-2024_8_.webp'),
(142, 40, 'macbook-air-m3-13-inch-2024_4__3.webp'),
(143, 41, 'macbook-pro-2021-007_4.webp'),
(144, 41, 'macbook-pro-2021-005_3.webp'),
(145, 41, 'macbook-pro-2021-004_3.webp'),
(146, 41, 'macbook-pro-2021-05_4_2.webp'),
(147, 42, 'macbook-air-15-inch-m2-2023-12_3.webp'),
(148, 42, 'macbook-air-15-inch-m2-2023-5_3.webp'),
(149, 42, 'macbook-air-15-inch-m2-2023-6_3.webp'),
(150, 42, 'macbook-air-15-inch-m2-2023-7_3.webp'),
(151, 42, 'macbook-air-15-inch-m2-2023-4_3.jpg'),
(152, 42, 'macbook-air-15-inch-m2-2023-3_3.webp'),
(153, 42, 'macbook-air-15-inch-m2-2023-2_3.jpg'),
(154, 43, 'macbook-pro-14-inch-m3-2023_3__1.webp'),
(155, 43, 'macbook-pro-14-inch-m3-2023_2__1.webp'),
(156, 43, 'macbook-pro-14-inch-m3-2023_8__1.webp'),
(157, 43, 'macbook-pro-14-inch-m3-2023_5__1.webp'),
(158, 43, 'frame_104_6_4.webp'),
(159, 44, '36_1_11.webp'),
(160, 44, '29_1_17.webp'),
(161, 44, 'laptop_gaming_acer_nitro_5_tiger_an515_58_52sp.webp'),
(162, 45, 'text_ng_n_2__4_14.webp'),
(163, 45, 'text_ng_n_1__3_17.webp'),
(164, 45, 'laptop_acer_gaming_aspire_7_a715-76-53pj.webp'),
(165, 46, 'laptop-acer-aspire-3-a314-42p-r3b3_2_.webp'),
(166, 46, 'laptop-acer-aspire-3-a314-42p-r3b3_3_.webp'),
(167, 46, 'laptop-acer-aspire-3-a314-42p-r3b3.webp'),
(168, 47, 'laptop-acer-aspire-3-a314-42p-r3b3_2_.webp'),
(169, 47, 'laptop-acer-aspire-3-a314-42p-r3b3_3_.webp'),
(170, 47, 'laptop-acer-aspire-3-a314-42p-r3b3.webp'),
(171, 48, 'laptop-gaming-acer-nitro-5-an515-58-52sp-10.webp'),
(172, 48, '35_1_11.webp'),
(173, 48, '29_1_17 (1).webp'),
(174, 48, '36_1_11.webp'),
(175, 49, 'laptop-gaming-acer-nitro-v-anv15-51-55ca_5_.webp'),
(176, 49, 'laptop-gaming-acer-nitro-v-anv15-51-55ca_6_.webp'),
(177, 49, 'laptop-gaming-acer-nitro-v-anv15-51-55ca_7_.webp'),
(178, 49, 'laptop-gaming-acer-nitro-v-anv15-51-55ca_8_.webp'),
(179, 49, 'laptop_gaming_acer_nitro_v_anv15-51-55caq.webp'),
(180, 50, 'laptop-acer-swift-go-14-ai-sfg14-73-53x7_3_.webp'),
(181, 50, 'laptop-acer-swift-go-14-ai-sfg14-73-53x7_2_.webp'),
(182, 50, 'laptop-acer-swift-go-14-ai-sfg14-73-53x7_1_.webp'),
(183, 50, 'laptop-acer-swift-go-14-ai-sfg14-73-53x7-10.webp'),
(184, 51, 'text_ng_n_5__4_26 (1).webp'),
(185, 51, 'text_ng_n_3__3_28.webp'),
(186, 51, 'text_ng_n_1__3_36.webp'),
(187, 51, 'laptop-dell-inspiron-15-3520-5810blk-102f0-10.webp'),
(188, 52, 'text_ng_n_13__6_19.webp'),
(189, 52, 'text_ng_n_16__5_18.webp'),
(190, 52, 'group_533_1_.webp'),
(191, 54, 'text_ng_n_22__2_5.png'),
(192, 54, 'text_ng_n_20__3_4.webp'),
(193, 54, 'group_533.webp'),
(194, 54, 'text_ng_n_16__5_18.webp'),
(195, 55, 'text_ng_n_7__146.webp'),
(196, 55, 'text_ng_n_1__2_67.webp'),
(197, 55, 'laptop-dell-vostro-3520-gd02r-10_1_.webp'),
(198, 55, 'text_ng_n_20__3_4.webp'),
(199, 56, 'text_ng_n_8__1_21.webp'),
(200, 56, 'text_ng_n_11__2_17.webp'),
(201, 56, 'demo_latop_-_t_th_ng_tin_1_5.webp'),
(202, 57, 'laptop-hp-15s-fq5231tu-8u241pa_1_.webp'),
(203, 57, 'text_ng_n_8__1_21.webp'),
(204, 57, 'text_ng_n_11__2_17.webp'),
(205, 58, 'text_ng_n_17__5_1_1.webp'),
(206, 58, 'text_ng_n_16__4_4_1.webp'),
(207, 58, 'text_ng_n_15__6_2_1.webp'),
(208, 59, 'demo_latop_-_t_th_ng_tin_1__10.webp'),
(209, 59, 'laptop-hp-15s-fq5231tu-8u241pa_1_.webp'),
(210, 59, 'text_ng_n_8__1_21.webp'),
(211, 59, 'text_ng_n_11__2_17.webp'),
(212, 60, 'text_ng_n_9__4_21.webp'),
(213, 60, 'text_ng_n_7_34.webp'),
(214, 60, 'text_ng_n_13__6_14.webp'),
(215, 60, 'text_ng_n_1__4_39.webp'),
(216, 60, 'laptop-lenovo-loq-15iax9-83gs001rvn-15.webp'),
(217, 61, 'text_ng_n_7__119.png'),
(218, 61, 'text_ng_n_11__2_81.webp'),
(219, 61, 'text_ng_n_1__2_33.webp'),
(220, 61, 'text_ng_n_5__3_21.webp'),
(221, 61, 'laptop-lenovo-ideapad-slim-5-14iah8-83bf002nvn-10.webp'),
(222, 62, 'text_ng_n_22__3_8.webp'),
(223, 62, 'text_ng_n_21__3_8.webp'),
(224, 62, 'text_ng_n_20__4_12.webp'),
(225, 63, '3_119.webp'),
(226, 63, '1_154_2.webp'),
(227, 63, '6_80.webp'),
(228, 64, 'text_ng_n_14__2_6.webp'),
(229, 64, 'text_ng_n_17__3_5.webp'),
(230, 64, 'text_ng_n_10__2_88.webp'),
(231, 64, 'text_ng_n_11__2_88.webp'),
(232, 64, 'laptop_msi_cyborg_15_a12ve-412vn.png'),
(233, 65, 'text_ng_n_13__13.webp'),
(234, 65, 'text_ng_n_11__1_6.webp'),
(235, 65, 'text_ng_n_12__12.webp'),
(236, 65, 'laptop_msi_gaming_gf63_thin_11uc-1228vn.webp'),
(237, 66, 'demo_latop_-_msi_1.webp'),
(238, 66, 'text_ng_n_17__3_5.webp'),
(239, 66, 'text_ng_n_10__2_88.webp'),
(240, 66, 'text_ng_n_11__2_88.webp'),
(241, 67, 'laptop_msi_gaming_thin_gf63_12ve-454vn.webp'),
(242, 67, 'text_ng_n_13__13.webp'),
(243, 67, 'text_ng_n_11__1_6.webp'),
(244, 67, 'text_ng_n_12__12.webp'),
(245, 68, 'text_ng_n_5__1_93.webp'),
(246, 68, 'text_ng_n_4__1_97.webp'),
(247, 68, 'text_ng_n_3__1_95.png'),
(248, 68, 'laptop_msi_modern_14_c13m-458vn.webp'),
(249, 69, 'text_ng_n_16__2_7.webp'),
(250, 69, 'text_ng_n_15__4_6.webp'),
(251, 69, 'text_ng_n_13__4_9.webp'),
(252, 69, 'text_ng_n_14__2_8.webp'),
(253, 69, 'laptop_msi_bravo_15_b7ed_010vn.webp'),
(254, 70, 'text_ng_n_-_2023-06-08t001503.144_1.webp'),
(255, 70, 'text_ng_n_-_2023-06-08t005150.492.webp'),
(256, 70, 'text_ng_n_-_2023-06-08t001534.826_1.webp'),
(257, 70, 'text_ng_n_-_2023-06-08t005213.228.webp'),
(258, 70, 'laptop-asus-vivobook-go-14-e1404fa-nk177w.webp'),
(259, 71, 'text_ng_n_7__117.webp'),
(260, 71, 'text_ng_n_8__1_89.webp'),
(261, 71, 'text_ng_n_9__1_103.webp'),
(262, 71, 'text_ng_n_3__2_24.webp'),
(263, 71, 'laptop_asus_tuf_gaming_f15_fx507zc4-hn074w.webp'),
(264, 72, 'text_ng_n_4__1_103.webp'),
(265, 72, 'text_ng_n_3_74.png'),
(266, 72, 'text_ng_n_7__91.webp'),
(267, 72, 'text_ng_n_3__1_101.webp'),
(268, 72, 'laptop_asus_vivobook_15_oled_a1505va-l1114w_1_.webp'),
(269, 73, 'text_ng_n_15__5_12.webp'),
(270, 73, 'text_ng_n_13__5_12.webp'),
(271, 73, 'text_ng_n_12__4_15.webp'),
(272, 73, 'text_ng_n_11__4_14.webp'),
(273, 73, 'text_ng_n_16__3_10.webp'),
(274, 73, 'laptop-asus-tuf-gaming-f15-fx506hf-hn014w_1_.webp'),
(275, 74, 'text_ng_n_13__3_3_1_1_1_1.webp'),
(276, 74, 'text_ng_n_11__2_44_1_1_1_1.webp'),
(277, 74, 'text_ng_n_10__2_44_1_1_1_1.webp'),
(278, 74, 'text_ng_n_5__1_85_1_1_1_1.webp'),
(279, 74, 'text_ng_n_6__81_1_1_1_1.webp'),
(280, 74, 'text_ng_n_3_53_1_1_1_1.webp'),
(281, 74, 'laptop_asus_rog_strix_g16_g614ju-n3135w.webp'),
(282, 75, 'text_ng_n_11__5_29.webp'),
(283, 75, 'laptop-asus-vivobook-s-15-s5507qa-ma089ws-copilot-x-elite_2__3.webp'),
(284, 75, 'laptop-asus-vivobook-s-15-s5507qa-ma089ws-copilot-x-elite_4__1.webp'),
(285, 75, 'laptop-asus-vivobook-s-15-s5507qa-ma089ws-copilot-x-elite_3__1.webp'),
(286, 75, 'laptop-asus-vivobook-s-15-s5507qa-ma089ws-copilot-x-elite_1__2.webp'),
(287, 75, 'laptop-asus-vivobook-s-15-s5507qa-ma089ws-copilot-x-elite_2.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'Hà Nội'),
(2, 'Hà Giang'),
(3, 'Cao Bằng'),
(4, 'Bắc Kạn'),
(5, 'Tuyên Quang'),
(6, 'Lào Cai'),
(7, 'Điện Biên'),
(8, 'Lai Châu'),
(9, 'Sơn La'),
(10, 'Yên Bái'),
(11, 'Hoà Bình'),
(12, 'Thái Nguyên'),
(13, 'Lạng Sơn'),
(14, 'Quảng Ninh'),
(15, 'Bắc Giang'),
(16, 'Phú Thọ'),
(17, 'Vĩnh Phúc'),
(18, 'Bắc Ninh'),
(19, 'Hải Dương'),
(20, 'Hải Phòng'),
(21, 'Hưng Yên'),
(22, 'Thái Bình'),
(23, 'Hà Nam'),
(24, 'Nam Định'),
(25, 'Ninh Bình'),
(26, 'Thanh Hóa'),
(27, 'Nghệ An'),
(28, 'Hà Tĩnh'),
(29, 'Quảng Bình'),
(30, 'Quảng Trị'),
(31, 'Thừa Thiên Huế'),
(32, 'Đà Nẵng'),
(33, 'Quảng Nam'),
(34, 'Quảng Ngãi'),
(35, 'Bình Định'),
(36, 'Phú Yên'),
(37, 'Khánh Hòa'),
(38, 'Ninh Thuận'),
(39, 'Bình Thuận'),
(40, 'Kon Tum'),
(41, 'Gia Lai'),
(42, 'Đắk Lắk'),
(43, 'Đắk Nông'),
(44, 'Lâm Đồng'),
(45, 'Bình Phước'),
(46, 'Tây Ninh'),
(47, 'Bình Dương'),
(48, 'Đồng Nai'),
(49, 'Bà Rịa - Vũng Tàu'),
(50, 'Hồ Chí Minh'),
(51, 'Long An'),
(52, 'Tiền Giang'),
(53, 'Bến Tre'),
(54, 'Trà Vinh'),
(55, 'Vĩnh Long'),
(56, 'Đồng Tháp'),
(57, 'An Giang'),
(58, 'Kiên Giang'),
(59, 'Cần Thơ'),
(60, 'Hậu Giang'),
(61, 'Sóc Trăng'),
(62, 'Bạc Liêu'),
(63, 'Cà Mau');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `customer_Id` int(11) DEFAULT NULL,
  `code_cart` varchar(11) DEFAULT NULL,
  `cart_status` int(11) DEFAULT NULL,
  `cart_payment` varchar(50) DEFAULT NULL,
  `create_cart` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `customer_Id`, `code_cart`, `cart_status`, `cart_payment`, `create_cart`) VALUES
(40, 42, '4809', 6, 'momo', '2024-08-13 08:07:00'),
(41, 43, '6840', 2, 'vnpay', '2024-08-13 08:46:23'),
(42, 44, '3065', 2, 'Tiền mặt', '2024-08-13 08:50:53'),
(43, 45, '2151', 3, 'vnpay', '2024-08-13 08:52:34'),
(44, 46, '7612', 4, 'Tiền mặt', '2024-08-13 09:29:28'),
(45, 47, '6348', 4, 'Chuyển khoản', '2024-08-13 09:32:04'),
(46, 48, '1617', 6, 'Tiền mặt', '2024-08-13 14:45:16'),
(47, 49, '8585', 4, 'momo', '2024-08-13 19:44:34'),
(48, 50, '164', 4, 'Tiền mặt', '2024-08-16 14:37:53'),
(49, 51, '4243', 2, 'Tiền mặt', '2024-08-27 11:42:15'),
(50, 52, '7739', 1, 'Tiền mặt', '2024-08-27 18:20:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokenlogin`
--

CREATE TABLE `tokenlogin` (
  `id` int(11) NOT NULL,
  `admin_Id` int(11) DEFAULT NULL,
  `token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cartegory`
--
ALTER TABLE `cartegory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_Id` (`brand_Id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tokenlogin`
--
ALTER TABLE `tokenlogin`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `cartegory`
--
ALTER TABLE `cartegory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--

-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--

-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=706;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--

-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT cho bảng `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tokenlogin`
--
ALTER TABLE `tokenlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
