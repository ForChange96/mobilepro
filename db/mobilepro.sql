-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 02, 2018 lúc 06:54 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mobilepro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `status`) VALUES
(1, 'Phụ kiện', 1),
(2, 'Điện thoại', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `hotline` varchar(15) DEFAULT NULL,
  `hotline2` varchar(15) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `hotline`, `hotline2`, `address`, `email`) VALUES
(1, '+84 167 780 841', '+84 123 456 789', 'Số 4 - Ngách 132/85 - Xóm Mới - Nguyên Xá - Bắc Từ Liêm - Hà Nội', 'mobilepro@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `password`, `email`, `fullname`, `address`, `phone_number`, `status`) VALUES
(1, 'transon', '202cb962ac59075b964b07152d234b70', 'transon996@gmail.com', 'Trần Văn Sơn', 'Cổng xóm Trôi - Xuân Kỳ - Đông Xuân - Sóc Sơn - Hà Nội', '09827544686', 1),
(2, 'nguyenhien', '202cb962ac59075b964b07152d234b70', 'theladoi995@gmail.com', 'Nguyễn Văn Hiển', '123 - Dịch Vọng - Cầu Giấy - Hà Nội', '9683546520', 1),
(3, 'daongoc96', '202cb962ac59075b964b07152d234b70', 'ngocdao96x@gmail.com', 'Đào Xuân Ngọc', 'Cổng làng Nguyên Xá - Minh Khai - Bắc Từ Liêm - Hà Nội', '1698566848', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite`
--

CREATE TABLE `favorite` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `favorite`
--

INSERT INTO `favorite` (`customer_id`, `product_id`) VALUES
(1, 31);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `features`
--

CREATE TABLE `features` (
  `features_id` int(11) NOT NULL,
  `f_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `features`
--

INSERT INTO `features` (`features_id`, `f_name`) VALUES
(1, 'Chống nước'),
(2, 'Cảm biến vân tay'),
(3, 'Chụp ảnh xoá phông'),
(4, 'Hỗ trợ 4G'),
(5, 'Sạc pin nhanh'),
(6, 'Màn hình tràn viền'),
(7, 'Sạc không dây');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `features_join`
--

CREATE TABLE `features_join` (
  `features_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `features_join`
--

INSERT INTO `features_join` (`features_id`, `product_id`) VALUES
(1, 31),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(2, 31),
(2, 33),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(3, 31),
(3, 33),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(4, 31),
(4, 33),
(4, 35),
(4, 36),
(4, 37),
(4, 38),
(5, 31),
(5, 33),
(5, 35),
(5, 37),
(5, 38),
(6, 31),
(6, 35),
(6, 36),
(6, 37),
(6, 38),
(7, 31),
(7, 33),
(7, 35),
(7, 36),
(7, 37),
(7, 38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `link_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img_link_350` varchar(200) DEFAULT NULL,
  `img_link_300` varchar(200) DEFAULT NULL,
  `img_link_500` varchar(200) DEFAULT NULL,
  `img_link_700` varchar(200) DEFAULT NULL,
  `img_link_original` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`link_id`, `product_id`, `img_link_350`, `img_link_300`, `img_link_500`, `img_link_700`, `img_link_original`) VALUES
(18, 31, '../product/350/1517212470iphone-x.jpg', '../product/300/1517212470iphone-x.jpg', '../product/500/1517212470iphone-x.jpg', '../product/700/1517212470iphone-x.jpg', '../product/original/1517212470iphone-x.jpg'),
(19, 31, '../product/350/15198093281.jpg', '../product/300/15198093281.jpg', '../product/500/15198093281.jpg', '../product/700/15198093281.jpg', '../product/original/15198093281.jpg'),
(20, 31, '../product/350/1517199685iphone-x-silver-00.jpg', '../product/300/1517199685iphone-x-silver-00.jpg', '../product/500/1517199685iphone-x-silver-00.jpg', '../product/700/1517199685iphone-x-silver-00.jpg', '../product/original/1517199685iphone-x-silver-00.jpg'),
(21, 31, '../product/350/1517199674iphone-x-gray-select-2017__1_.jpg', '../product/300/1517199674iphone-x-gray-select-2017__1_.jpg', '../product/500/1517199674iphone-x-gray-select-2017__1_.jpg', '../product/700/1517199674iphone-x-gray-select-2017__1_.jpg', '../product/original/1517199674iphone-x-gray-select-2017__1_.jpg'),
(22, 32, '../product/350/15173931591.jpg', '../product/300/15173931591.jpg', '../product/500/15173931591.jpg', '../product/700/15173931591.jpg', '../product/original/15173931591.jpg'),
(23, 32, '../product/350/15172004618x2048.jpg', '../product/300/15172004618x2048.jpg', '../product/500/15172004618x2048.jpg', '../product/700/15172004618x2048.jpg', '../product/original/15172004618x2048.jpg'),
(24, 32, '../product/350/151722191315172097843.jpg', '../product/300/151722191315172097843.jpg', '../product/500/151722191315172097843.jpg', '../product/700/151722191315172097843.jpg', '../product/original/151722191315172097843.jpg'),
(25, 32, '../product/350/1517200447bg1-800x800.jpg', '../product/300/1517200447bg1-800x800.jpg', '../product/500/1517200447bg1-800x800.jpg', '../product/700/1517200447bg1-800x800.jpg', '../product/original/1517200447bg1-800x800.jpg'),
(26, 33, '../product/350/1517393254q.jpg', '../product/300/1517393254q.jpg', '../product/500/1517393254q.jpg', '../product/700/1517393254q.jpg', '../product/original/1517393254q.jpg'),
(27, 33, '../product/350/1517200597o-2.jpg', '../product/300/1517200597o-2.jpg', '../product/500/1517200597o-2.jpg', '../product/700/1517200597o-2.jpg', '../product/original/1517200597o-2.jpg'),
(28, 33, '../product/350/15172090274.jpg', '../product/300/15172090274.jpg', '../product/500/15172090274.jpg', '../product/700/15172090274.jpg', '../product/original/15172090274.jpg'),
(29, 33, '../product/350/15172090311.jpg', '../product/300/15172090311.jpg', '../product/500/15172090311.jpg', '../product/700/15172090311.jpg', '../product/original/15172090311.jpg'),
(30, 34, '../product/350/1517199997P1492624962_op-lung-galaxy-s8-nillkin-nature-tpu-trong-suot-06mm-6.jpg', '../product/300/1517199997P1492624962_op-lung-galaxy-s8-nillkin-nature-tpu-trong-suot-06mm-6.jpg', '../product/500/1517199997P1492624962_op-lung-galaxy-s8-nillkin-nature-tpu-trong-suot-06mm-6.jpg', '../product/700/1517199997P1492624962_op-lung-galaxy-s8-nillkin-nature-tpu-trong-suot-06mm-6.jpg', '../product/original/1517199997P1492624962_op-lung-galaxy-s8-nillkin-nature-tpu-trong-suot-06mm-6.jpg'),
(31, 34, '../product/350/15172000028.jpg', '../product/300/15172000028.jpg', '../product/500/15172000028.jpg', '../product/700/15172000028.jpg', '../product/original/15172000028.jpg'),
(32, 34, '../product/350/1517199989sku_463070_1.jpg', '../product/300/1517199989sku_463070_1.jpg', '../product/500/1517199989sku_463070_1.jpg', '../product/700/1517199989sku_463070_1.jpg', '../product/original/1517199989sku_463070_1.jpg'),
(33, 34, '../product/350/1517210710q0.jpg', '../product/300/1517210710q0.jpg', '../product/500/1517210710q0.jpg', '../product/700/1517210710q0.jpg', '../product/original/1517210710q0.jpg'),
(34, 35, '../product/350/1517199880s8-01.jpg', '../product/300/1517199880s8-01.jpg', '../product/500/1517199880s8-01.jpg', '../product/700/1517199880s8-01.jpg', '../product/original/1517199880s8-01.jpg'),
(35, 35, '../product/350/1517199880s8-02.jpg', '../product/300/1517199880s8-02.jpg', '../product/500/1517199880s8-02.jpg', '../product/700/1517199880s8-02.jpg', '../product/original/1517199880s8-02.jpg'),
(36, 35, '../product/350/1517199880148347.jpg', '../product/300/1517199880148347.jpg', '../product/500/1517199880148347.jpg', '../product/700/1517199880148347.jpg', '../product/original/1517199880148347.jpg'),
(37, 35, '../product/350/1517199880s-l1000-700x700.jpg', '../product/300/1517199880s-l1000-700x700.jpg', '../product/500/1517199880s-l1000-700x700.jpg', '../product/700/1517199880s-l1000-700x700.jpg', '../product/original/1517199880s-l1000-700x700.jpg'),
(38, 36, '../product/350/1517389643not.jpg', '../product/300/1517389643not.jpg', '../product/500/1517389643not.jpg', '../product/700/1517389643not.jpg', '../product/original/1517389643not.jpg'),
(39, 36, '../product/350/1517389643note8-3.jpg', '../product/300/1517389643note8-3.jpg', '../product/500/1517389643note8-3.jpg', '../product/700/1517389643note8-3.jpg', '../product/original/1517389643note8-3.jpg'),
(40, 36, '../product/350/1517389643note8-2.jpg', '../product/300/1517389643note8-2.jpg', '../product/500/1517389643note8-2.jpg', '../product/700/1517389643note8-2.jpg', '../product/original/1517389643note8-2.jpg'),
(41, 36, '../product/350/1517389643note8.jpg', '../product/300/1517389643note8.jpg', '../product/500/1517389643note8.jpg', '../product/700/1517389643note8.jpg', '../product/original/1517389643note8.jpg'),
(42, 37, '../product/350/1517390211v30.jpg', '../product/300/1517390211v30.jpg', '../product/500/1517390211v30.jpg', '../product/700/1517390211v30.jpg', '../product/original/1517390211v30.jpg'),
(43, 37, '../product/350/1517392445LG.jpg', '../product/300/1517392445LG.jpg', '../product/500/1517392445LG.jpg', '../product/700/1517392445LG.jpg', '../product/original/1517392445LG.jpg'),
(44, 37, '../product/350/1517390211v30-3.jpg', '../product/300/1517390211v30-3.jpg', '../product/500/1517390211v30-3.jpg', '../product/700/1517390211v30-3.jpg', '../product/original/1517390211v30-3.jpg'),
(45, 37, '../product/350/1517390212LG-V30.jpg', '../product/300/1517390212LG-V30.jpg', '../product/500/1517390212LG-V30.jpg', '../product/700/1517390212LG-V30.jpg', '../product/original/1517390212LG-V30.jpg'),
(46, 38, '../product/350/1517393381q.jpg', '../product/300/1517393381q.jpg', '../product/500/1517393381q.jpg', '../product/700/1517393381q.jpg', '../product/original/1517393381q.jpg'),
(47, 38, '../product/350/1517392892a8-3.jpg', '../product/300/1517392892a8-3.jpg', '../product/500/1517392892a8-3.jpg', '../product/700/1517392892a8-3.jpg', '../product/original/1517392892a8-3.jpg'),
(48, 38, '../product/350/1517393403q.jpg', '../product/300/1517393403q.jpg', '../product/500/1517393403q.jpg', '../product/700/1517393403q.jpg', '../product/original/1517393403q.jpg'),
(49, 38, '../product/350/1517392892a8-4.jpg', '../product/300/1517392892a8-4.jpg', '../product/500/1517392892a8-4.jpg', '../product/700/1517392892a8-4.jpg', '../product/original/1517392892a8-4.jpg'),
(50, 40, '../product/350/15198065011.jpg', '../product/300/15198065011.jpg', '../product/500/15198065011.jpg', '../product/700/15198065011.jpg', '../product/original/15198065011.jpg'),
(51, 40, '../product/350/15198065012.jpg', '../product/300/15198065012.jpg', '../product/500/15198065012.jpg', '../product/700/15198065012.jpg', '../product/original/15198065012.jpg'),
(52, 40, '../product/350/15198065013.jpg', '../product/300/15198065013.jpg', '../product/500/15198065013.jpg', '../product/700/15198065013.jpg', '../product/original/15198065013.jpg'),
(53, 40, '../product/350/15198065024.jpg', '../product/300/15198065024.jpg', '../product/500/15198065024.jpg', '../product/700/15198065024.jpg', '../product/original/15198065024.jpg'),
(54, 41, '../product/350/15198068901.jpg', '../product/300/15198068901.jpg', '../product/500/15198068901.jpg', '../product/700/15198068901.jpg', '../product/original/15198068901.jpg'),
(55, 41, '../product/350/15198068902.jpg', '../product/300/15198068902.jpg', '../product/500/15198068902.jpg', '../product/700/15198068902.jpg', '../product/original/15198068902.jpg'),
(56, 41, '../product/350/15198068903.jpg', '../product/300/15198068903.jpg', '../product/500/15198068903.jpg', '../product/700/15198068903.jpg', '../product/original/15198068903.jpg'),
(57, 41, '../product/350/15198068904.jpg', '../product/300/15198068904.jpg', '../product/500/15198068904.jpg', '../product/700/15198068904.jpg', '../product/original/15198068904.jpg'),
(58, 42, '../product/350/15198080061.jpg', '../product/300/15198080061.jpg', '../product/500/15198080061.jpg', '../product/700/15198080061.jpg', '../product/original/15198080061.jpg'),
(59, 42, '../product/350/15198080062.jpg', '../product/300/15198080062.jpg', '../product/500/15198080062.jpg', '../product/700/15198080062.jpg', '../product/original/15198080062.jpg'),
(60, 42, '../product/350/15198080063.jpg', '../product/300/15198080063.jpg', '../product/500/15198080063.jpg', '../product/700/15198080063.jpg', '../product/original/15198080063.jpg'),
(61, 42, '../product/350/15198080064.jpg', '../product/300/15198080064.jpg', '../product/500/15198080064.jpg', '../product/700/15198080064.jpg', '../product/original/15198080064.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `m_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `m_name`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'HTC'),
(4, 'Sony'),
(5, 'LG'),
(6, 'Oppo'),
(7, 'Google'),
(8, 'Xiaomi'),
(9, 'Meizu'),
(10, 'Huawei'),
(11, 'Nokia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`) VALUES
(1, 'transon996@gmail.com'),
(2, '1@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `price`, `number`) VALUES
(1, 1, 23, 29900000, 2),
(2, 1, 28, 18000000, 1),
(5, 6, 32, 40000, 1),
(6, 6, 31, 29990000, 1),
(7, 7, 32, 40000, 1),
(8, 7, 31, 29990000, 1),
(9, 8, 33, 18990000, 1),
(11, 10, 35, 18990000, 3),
(12, 11, 32, 40000, 1),
(13, 12, 31, 29990000, 1),
(14, 13, 34, 40000, 1),
(15, 14, 36, 21990000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `p_name` varchar(100) DEFAULT NULL,
  `p_description` text,
  `p_content` text,
  `p_old_price` int(11) DEFAULT NULL,
  `p_price` int(11) DEFAULT NULL,
  `is_hot_product` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `num_star` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `manufacturer_id`, `p_name`, `p_description`, `p_content`, `p_old_price`, `p_price`, `is_hot_product`, `status`, `num_star`) VALUES
(31, 2, 2, 'Iphone X  64GB', 'Điện thoại Apple iPhone X – Sau 10 năm, Apple lại làm nên một cuộc cách mạng. \r\nĐược cải tiến toàn diện về mọi mặt so với những thế hệ trước, iPhone X sẽ là sự lựa chọn không thể qua khi người dùng đang tìm kiếm một chiếc smartphone cao cấp.', '<h2 style=\"margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; color: #333333; outline: none; zoom: 1; overflow: hidden;\">\"<a style=\"margin: 0px; padding: 0px; text-decoration-line: none; font-stretch: normal; line-height: 18px; color: #50a8e3; outline: none; zoom: 1;\" title=\"Điện thoại iPhone X 64GB\" href=\"https://www.thegioididong.com/dtdd/iphone-x-64gb\" target=\"_blank\" rel=\"noopener\" type=\"Điện thoại iPhone X 64GB\">iPhone X gi&aacute;</a>\" l&agrave; cụm từ được&nbsp;rất nhiều người mong chờ muốn biết v&agrave; t&igrave;m kiếm tr&ecirc;n Google bởi đ&acirc;y l&agrave; chiếc điện thoại m&agrave; Apple kỉ niệm 10 năm iPhone đầu ti&ecirc;n được b&aacute;n ra.</h2>\r\n<h3 style=\"margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; color: #333333; outline: none; zoom: 1; overflow: hidden;\"><strong style=\"margin: 0px; padding: 0px;\">Thiết kế đột ph&aacute;</strong></h3>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Như c&aacute;c bạn cũng đ&atilde; biết th&igrave; đ&atilde; 4 năm kể từ iPhone 6 v&agrave; iPhone 6 Plus Apple vẫn chưa c&oacute; thay đổi n&agrave;o đ&aacute;ng kể trong thiết kế của m&igrave;nh.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Nhưng với iPhone X th&igrave; đ&oacute; lại l&agrave; 1 c&acirc;u chuyện ho&agrave;n to&agrave;n kh&aacute;c, m&aacute;y chuyển qua sử dụng m&agrave;n h&igrave;nh tỉ lệ 19,5:9 mới mẻ với phần diện t&iacute;ch hiển thị mặt trước cực lớn.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Mặt lưng k&iacute;nh hỗ trợ sạc nhanh kh&ocirc;ng d&acirc;y cũng như phần camera k&eacute;p đặt dọc cũng l&agrave; những thứ đầu ti&ecirc;n xuất hiện tr&ecirc;n 1 chiếc iPhone.</p>\r\n<h3 style=\"margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; color: #333333; outline: none; zoom: 1; overflow: hidden;\"><strong style=\"margin: 0px; padding: 0px;\">M&agrave;n h&igrave;nh với tai thỏ</strong></h3>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Điểm khiến iPhone X bị ch&ecirc; nhiều nhất đ&oacute; ch&iacute;nh l&agrave; phần \"tai thỏ\" ph&iacute;a tr&ecirc;n m&agrave;n h&igrave;nh, Apple đ&atilde; chấp nhận điều n&agrave;y để đặt cụm camera&nbsp;TrueDept mới của h&atilde;ng.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">iPhone X sử dụng tấm nền&nbsp;<a style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: #50a8e3;\" title=\"T&igrave;m hiểu m&agrave;n h&igrave;nh OLED\" href=\"https://www.thegioididong.com/hoi-dap/man-hinh-oled-la-gi-905762\" target=\"_blank\" rel=\"noopener\">OLED</a>&nbsp;(được tinh chỉnh bởi Apple) thay v&igrave; LCD như những chiếc iPhone trước đ&acirc;y v&agrave; điều n&agrave;y đem lại cho m&aacute;y 1 m&agrave;u đen thể hiện rất s&acirc;u cũng khả năng t&aacute;i tạo m&agrave;u sắc kh&ocirc;ng k&eacute;m phần ch&iacute;nh x&aacute;c.</p>\r\n<h3 style=\"margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; color: #333333; outline: none; zoom: 1; overflow: hidden;\"><strong style=\"margin: 0px; padding: 0px;\">Face ID tạo n&ecirc;n đột ph&aacute;</strong></h3>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Touch ID tr&ecirc;n iPhone X đ&atilde; bị loại bỏ, thay v&agrave;o đ&oacute; l&agrave; bạn sẽ chuyển qua sử dụng Face ID, một phương thức bảo mật sinh trắc học mới của Apple.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Với sự trợ gi&uacute;p của cụm&nbsp;camera&nbsp;TrueDept th&igrave; iPhone X c&oacute; khả năng nhận diện khu&ocirc;n mặt 3D của người d&ugrave;ng từ đ&oacute; mở kh&oacute;a chiếc iPhone một c&aacute;ch nhanh ch&oacute;ng.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Tuy sẽ hơi hụt hẫng khi Touch ID đ&atilde; qu&aacute; quen thuộc tr&ecirc;n những chiếc iPhone như tốc độ cũng như trải nghiệm \"kh&oacute;a như kh&ocirc;ng kh&oacute;a\" của Face ID ho&agrave;n to&agrave;n c&oacute; thể khiến bạn y&ecirc;n t&acirc;m sử dụng.</p>\r\n<h3 style=\"margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; color: #333333; outline: none; zoom: 1; overflow: hidden;\"><strong style=\"margin: 0px; padding: 0px;\">Thao t&aacute;c vuốt v&agrave; vuốt</strong></h3>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Kh&ocirc;ng c&ograve;n ph&iacute;m Home cứng n&ecirc;n c&aacute;c thao t&aacute;c tr&ecirc;n iPhone X cũng ho&agrave;n to&agrave;n kh&aacute;c so với những đ&agrave;n anh đi trước.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Giờ đ&acirc;y chỉ với thao t&aacute;c vuốt v&agrave; vuốt từ cạnh dưới l&agrave; bạn đ&atilde; c&oacute; thể truy cập v&agrave;o đa nhiệm, trở về m&agrave;n h&igrave;nh Home một c&aacute;ch nhanh ch&oacute;ng.</p>\r\n<h3 style=\"margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; color: #333333; outline: none; zoom: 1; overflow: hidden;\"><strong style=\"margin: 0px; padding: 0px;\">Camera cải tiến</strong></h3>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">iPhone X vẫn sở hữu bộ đ&ocirc;i camera với độ ph&acirc;n giải 12 MP nhưng camera tele thứ 2 với khẩu độ được n&acirc;ng l&ecirc;n mức f/2.4 so với f/2.8 của iPhone 7 Plus.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Ngo&agrave;i ra th&igrave; cả 2 camera tr&ecirc;n iPhone X đều sở hữu cho m&igrave;nh khả năng chống rung quang học gi&uacute;p bạn dễ d&agrave;ng bắt trọn mọi khoảnh khắc trong cuộc sống.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Camera trước độ ph&acirc;n giải 7 MP với khả năng selfie x&oacute;a ph&ocirc;ng đ&aacute;p ứng tốt mọi nhu cầu tự sướng của giới trẻ hiện nay.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Bộ đ&ocirc;i camera tr&ecirc;n iPhone X được đ&aacute;nh gi&aacute; rất cao về chất lượng ảnh chụp v&agrave; l&agrave; một trong những chiếc camera phone chụp ảnh đẹp nhất trong năm 2017.</p>\r\n<h3 style=\"margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; color: #333333; outline: none; zoom: 1; overflow: hidden;\"><strong style=\"margin: 0px; padding: 0px;\">Hiệu năng mạnh mẽ</strong></h3>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Hiệu năng của những chiếc iPhone chưa bao giờ l&agrave; vấn đề v&agrave; với iPhone X th&igrave; mọi thứ vẫn rất ấn tượng.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Con chip&nbsp;<a style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: #50a8e3;\" title=\"Apple A11 Bionic 6 nh&acirc;n\" href=\"https://www.thegioididong.com/tin-tuc/chi-tiet-a11-bionic-chip-co-nhieu-thanh-phan-apple-tu-trong-nhat-tu-truoc-den-nay-1021653\" target=\"_blank\" rel=\"noopener\">Apple A11 Bionic 6 nh&acirc;n</a>&nbsp;kết hợp với 3 GB RAM th&igrave; iPhone X tự tin l&agrave; chiếc&nbsp;<a style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: #50a8e3;\" title=\"Điện thoại di động\" href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" rel=\"noopener\">smartphone</a>&nbsp;mạnh mẽ nhất m&agrave; Apple từng sản xuất.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Ngo&agrave;i ra với iPhone X th&igrave; Apple cũng nhấn mạnh với trải nghiệm thực tế ảo tăng cường gi&uacute;p bạn c&oacute; những ph&uacute;t gi&acirc;y thư gi&atilde;n th&uacute; vị.</p>\r\n<p style=\"margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: #333333; font-family: Helvetica, Arial, \'DejaVu Sans\', \'Liberation Sans\', Freesans, sans-serif; font-size: 16px;\">Vi&ecirc;n pin tr&ecirc;n iPhone X c&oacute; dung lượng&nbsp;2716 mAh (lớn hơn cả tr&ecirc;n iPhone 8 Plus) cho bạn sử dụng kh&aacute; ổn trong khoảng một ng&agrave;y li&ecirc;n tục</p>', 32990000, 29990000, 1, 1, 5),
(32, 1, 2, 'Ốp lưng Iphone X', 'Chất liệu: da cao cấp', '', NULL, 40000, 1, 1, 3),
(33, 2, 4, 'Sony xperia xz', 'Sony Xperia XZ với thiết kế cực đẹp, cùng camera chất lượng hơn, nhiều tính năng tiện ích hơn.', '', NULL, 18990000, 1, 1, 5),
(34, 1, 1, 'Ốp lưng Galaxy S8', 'abc', '', NULL, 40000, 1, 1, 4),
(35, 2, 1, 'Samsung galaxy S8', 'Galaxy S7, Galaxy S7 Edge là những sản phẩm rất thành công của Samsung, nhưng Galaxy S8 hứa hẹn sẽ còn mang đến cho hãng công nghệ Hàn Quốc nhiều chiến tích vẻ vang hơn nữa, khi nó gần như hoàn hảo về mọi khía cạnh, từ thiết kế, màn hình, hiệu năng, tính năng đến camera', '', NULL, 18990000, 1, 1, 0),
(36, 2, 1, 'Samsung galaxy note 8', 'Một lần nữa, hãng điện thoại Samsung đã khiến những fan hâm mộ và người dùng công nghệ phải mãn nhãn với thiết kế cũng như cấu hình đẳng cấp của thế hệ tiếp theo thuộc dòng sản phẩm Note – Samsung Galaxy Note 8', '', NULL, 21990000, 1, 1, 5),
(37, 2, 5, 'LG V30', 'LG V30 là Smartphone hội tụ những tinh hoa từ các Flagship cao cấp nhất: Máy sở hữu màn hình P-OLED tỷ lệ 18:9, 2 camera sau 16MP & 13MP cho chất lượng ảnh chụp cực kỳ chuyên nghiệp, tích hợp công nghệ âm thanh B&O và sở hữu cấu hình phần cứng khủng như Samsung Note 8. Máy mới 100% Fullbox gồm: thân máy, sạc, cable type-C, tai nghe, chọc sim, sách hướng dẫn. Bảo hành 12 tháng', '', NULL, 17990000, 1, 1, 0),
(38, 2, 1, 'Samsung galaxy A8', 'Bộ đôi Samsung A8 2018 và Galaxy A8+ 2018 chính thức trình làng với khả năng selfie kép, cùng màn hình tỷ lệ 18.5: 9 cho trải nghiệm xem rộng hơn. Với thiết kế hiện đại, hứa hẹn bộ đôi sản phẩm này sẽ tiếp bước sự thành công của Samsung tại thị trường Việt Nam.', '', NULL, 9990000, 1, 1, 0),
(39, 2, 2, 'a', 'a', '<p>a</p>', NULL, 10000, 1, 0, 0),
(40, 1, 8, 'Gậy selfie xiaomi stick', 'Gậy tự sướng Bluetooth selfie stick tripod Xiaomi có thiết kế đặc biệt kết nối bluetooth 3.0, sang trọng đơn giản mà thông minh cho phép bạn có thể dễ dàng tự sướng ở mọi nơi mọi lúc', '<ul>\r\n<li><span style=\"color: #000000; font-size: 12pt;\">L&agrave; gậy tự sướng t&iacute;ch hợp gi&aacute; cho điện thoại gi&uacute;p bạn tự sướng từ xa qua n&uacute;t điều khiển bluetooth</span></li>\r\n<li><span style=\"color: #000000; font-size: 12pt;\">Gi&aacute; kẹp c&oacute; thể xoay 360&deg;</span></li>\r\n<li><span style=\"color: #000000; font-size: 12pt;\">C&oacute; thể dễ d&agrave;ng để bỏ v&agrave;o t&uacute;i quần &aacute;o hoặc t&uacute;i x&aacute;ch để mang theo b&ecirc;n m&igrave;nh</span></li>\r\n<li><span style=\"color: #000000; font-size: 12pt;\">Kết nối bluetooth 3.0 (ph&ugrave; hợp với tất cả c&aacute;c loại smart phone hiện nay)</span></li>\r\n<li><span style=\"color: #000000; font-size: 12pt;\">Sử dụng cực dễ d&agrave;ng&nbsp;</span></li>\r\n<li><span style=\"color: #000000; font-size: 12pt;\">Thiết kế kệ 3 ch&acirc;n c&ugrave;ng n&uacute;t tự sướng bluetooth rời, cho ph&eacute;p bạn c&oacute; thể dễ d&agrave;ng tự sướng ở mọi nơi mọi l&uacute;c</span></li>\r\n</ul>', NULL, 290000, 0, 1, 0),
(41, 1, 1, 'Tai nghe Bluetooth Samsung Level U', 'kiểu dáng tinh tế, phong cách với những với màu sắc bắt mắt & hợp thời trang tạo nên một phong cách cho người tiêu dùng sự năng động và trẻ trung trong khi đeo lên sử dụng', '<ul class=\"policy\">\r\n<li>Đệm tai được thiết kế mềm mại, linh hoạt.</li>\r\n<li>C&oacute; thể điều chỉnh k&iacute;ch thước khung tai nghe ph&ugrave; hợp với nhu cầu.</li>\r\n<li>Cung cấp hơn 9 giờ nghe nhạc, 9 giờ đ&agrave;m thoại v&agrave; 300 giờ cho thời gian chờ.</li>\r\n<li>Chất lượng &acirc;m thanh tuyệt hảo nhờ c&ocirc;ng nghệ giảm tiếng ồn NR v&agrave; EC.</li>\r\n<li>Kết nối nam ch&acirc;m giữa hai đầu tai nghe của Level U sẽ giữ tai nghe khi kh&ocirc;ng sử dụng.</li>\r\n<li>Dung lượng pin 200mAh (l&otilde;i pin Li-ion).</li>\r\n<li>Sản phẩm ch&iacute;nh h&atilde;ng Samsung.</li>\r\n</ul>', NULL, 1450000, 0, 1, 0),
(42, 1, 8, 'Pin dự phòng Xiaomi 10.000 mAh Gen 2', 'Pin dự phòng Xiaomi 10.000 mAh Gen 2 là một trong những sản phẩm mới được ra mắt gần đây của Xiaomi. Sản phẩm này có kiểu dáng không thay đổi so với phiên bản trước nhưng hỗ trợ sạc nhanh ở cả hai chiều ở sạc vào và sạc ra.', '<h3>Pin dự ph&ograve;ng Xiaomi Mi Gen 2 10000 mAh</h3>\r\n<p style=\"color: black; text-align: justify; font-size: 14px;\">Những sản phẩm của Xiaomi lu&ocirc;n được biết đến với đặc trưng &ldquo;ngon, bổ, rẻ&rdquo; v&agrave; pin dự ph&ograve;ng cũng kh&ocirc;ng phải l&agrave; một ngoại lệ. Với pin dự ph&ograve;ng Xiaomi Mi Gen 2 c&oacute; dung lượng l&ecirc;n đến 10000 mAh, người d&ugrave;ng c&oacute; thể thoải m&aacute;i sử dụng những thiết bị di động của m&igrave;nh trong cả ng&agrave;y m&agrave; kh&ocirc;ng phải băn khoăn về việc t&igrave;m kiếm ổ điện để sạc pin trong trường hợp khẩn cấp.</p>\r\n<h3>Thiết kế pin dự ph&ograve;ng Xiaomi Mi Gen 2 10000 mAh</h3>\r\n<p style=\"color: black; text-align: justify; font-size: 14px;\">Xiaomi Mi Gen 2 10000 mAh vẫn được l&agrave;m từ kim loại rất chắc chắn v&agrave; tạo vẻ sang trọng tương tự như những chiếc điện thoại của h&atilde;ng.</p>\r\n<p style=\"color: black; text-align: justify; font-size: 14px;\">Mọi chi tiết tr&ecirc;n pin đều được ho&agrave;n thiện tốt, hai cạnh b&ecirc;n được bo cong gi&uacute;p người d&ugrave;ng cầm nắm thoải m&aacute;i trong l&ograve;ng b&agrave;n tay. Đặc biệt, ở phi&ecirc;n bản mới n&agrave;y Xiaomi đ&atilde; bổ sung cho sản phẩm m&agrave;u xanh đen nh&igrave;n rất lạ v&agrave; bắt mắt.</p>\r\n<h3>T&iacute;nh năng pin dự ph&ograve;ng Xiaomi Mi Gen 2 10000 mAh</h3>\r\n<p style=\"color: black; text-align: justify; font-size: 14px;\">Pin dự ph&ograve;ng của Xiaomi c&oacute; 1 n&uacute;t nguồn, 4 đ&egrave;n LED để th&ocirc;ng b&aacute;o dung lượng pin c&ograve;n lại, 1 cổng microUSB để sạc cho pin v&agrave; 1 cổng USB để sạc cho c&aacute;c thiết bị di động (smartphone, tablet, m&aacute;y nghe nhạc).</p>\r\n<p style=\"color: black; text-align: justify; font-size: 14px;\">Rất đ&aacute;ng khen cho Xiaomi khi c&ocirc;ng ty được mệnh danh &ldquo;Apple Ch&acirc;u &Aacute;&rdquo; n&agrave;y đ&atilde; trang bị cho Xiaomi Mi Gen 2 10000 mAh c&ocirc;ng nghệ sạc nhanh theo ti&ecirc;u chuẩn Quick Charge 2.0 của Qualcomm theo cả 2 chiều sạc v&agrave;o pin v&agrave; sạc ra thiết bị, một t&iacute;nh năng rất hữu &iacute;ch, nhất l&agrave; khi vi&ecirc;n pin n&agrave;y c&oacute; dung lượng l&ecirc;n đến 10000 mAh, đ&ograve;i hỏi thời gian sạc rất l&acirc;u với c&ocirc;ng nghệ cũ.</p>\r\n<h3>Hiệu năng pin dự ph&ograve;ng Xiaomi Mi Gen 2 10000 mAh</h3>\r\n<p style=\"color: black; text-align: justify; font-size: 14px;\">Qua trải nghiệm thực tế, Xiaomi Mi Gen 2 10000 mAh cho hiệu suất chuyển đổi tốt. Vi&ecirc;n pin n&agrave;y c&oacute; thể sạc đầy 100% cho Xiaomi Mi 5S (pin 3100 mAh), 100% cho Sony Xperia XZ (2900 mAh) rồi tiếp tục sạc được 25% cho Xiaomi Mi 5S.</p>\r\n<p style=\"color: black; text-align: justify; font-size: 14px;\">Trong đ&oacute;, thời gian để Xiaomi Mi Gen 2 10000 mAh sạc đầy cho Xiaomi Mi 5S chỉ khoảng 1 giờ 40 ph&uacute;t, c&ograve;n thời gian sạc đầy cho vi&ecirc;n pin n&agrave;y l&agrave; 3 giờ 40 ph&uacute;t nếu d&ugrave;ng củ sạc hỗ trợ sạc nhanh, đ&uacute;ng với th&ocirc;ng số của c&ocirc;ng nghệ sạc nhanh m&agrave; n&oacute; được trang bị. Trong suốt qu&aacute; tr&igrave;nh sạc pin cho smartphone, d&ograve;ng sạc ra cũng rất ổn định, kh&ocirc;ng hề c&oacute; hiện tượng biến đổi d&ograve;ng điện.</p>', NULL, 330000, 0, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `content` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `report`
--

INSERT INTO `report` (`report_id`, `email`, `content`) VALUES
(2, 'transon996@gmail.com', 'Personally, I believe this is the best answer. Of course Javascript tries its best, but jQuery better solves more edge cases, which is why jQuery is still so popular today, it better figures out the incompatibilities. Hypothetically, next year some new browser doesn\'t use window.location correctly, and in that case my money would be on jQuery. Yes, Javascript has improved since 1994, but now you have smartphones, tablets, so many browsers, more edge cases. It\'s funny to hear new developers call');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `support`
--

CREATE TABLE `support` (
  `support_id` int(11) NOT NULL,
  `s_name` varchar(100) DEFAULT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `s_phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `support`
--

INSERT INTO `support` (`support_id`, `s_name`, `s_email`, `s_phone_number`) VALUES
(1, 'Ngô Văn Khánh', 'khanhngo96@gmail.com', '0942012172'),
(2, 'Nguyễn Văn Hiển', 'HienNguyen123@gmail.com', '0986683468');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `o_date` date DEFAULT NULL,
  `o_total` int(11) DEFAULT NULL,
  `o_status` int(11) DEFAULT '0',
  `o_shipper` varchar(100) DEFAULT NULL,
  `recipients` varchar(100) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `shipping_address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `o_date`, `o_total`, `o_status`, `o_shipper`, `recipients`, `phone_number`, `shipping_address`) VALUES
(1, 1, '2018-01-13', 77800000, 1, 'Nguyễn Văn D', NULL, NULL, NULL),
(6, 1, '2018-02-06', 33033000, 1, 'Ngô Văn Khánh', 'Trần Văn Sơn', '09827544686', 'Sóc Sơn - Hà Nội'),
(7, 1, NULL, 33033000, 0, NULL, 'Trần Văn Sơn', '09827544686', 'Xuân Kỳ - Đông Xuân - Sóc Sơn - Hà Nội'),
(8, 1, NULL, 20889000, 0, NULL, 'Trần Văn Sơn', '09827544686', 'Cổng xóm Trôi - Xuân Kỳ - Đông Xuân - Sóc Sơn - Hà Nội'),
(10, 1, '2018-02-22', 62667000, 1, 'Hieu', 'Trần Văn Sơn', '09827544686', 'Cổng xóm Trôi - Xuân Kỳ - Đông Xuân - Sóc Sơn - Hà Nội'),
(11, 2, '2018-02-28', 44000, 1, 'Ngô Văn Khánh', 'Nguyễn Văn Hiển', '9683546520', '123 - Dịch Vọng - Cầu Giấy - Hà Nội'),
(12, 2, NULL, 32989000, 0, NULL, 'Nguyễn Văn Hiển', '9683546520', '123 - Dịch Vọng - Cầu Giấy - Hà Nội'),
(13, 2, NULL, 44000, 0, NULL, 'Nguyễn Văn Hiển', '9683546520', '123 - Dịch Vọng - Cầu Giấy - Hà Nội'),
(14, 2, NULL, 24189000, 0, NULL, 'Nguyễn Văn Hiển', '9683546520', '123 - Dịch Vọng - Cầu Giấy - Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`) VALUES
(1, 'transon', '202cb962ac59075b964b07152d234b70', 'Trần Văn Sơn'),
(2, 'admin', '202cb962ac59075b964b07152d234b70', 'administrator'),
(7, 'admin2', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn A'),
(8, 'admin3', '202cb962ac59075b964b07152d234b70', 'Nguyễn Thị B');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vote_product`
--

CREATE TABLE `vote_product` (
  `vote_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `num_star` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vote_product`
--

INSERT INTO `vote_product` (`vote_id`, `customer_id`, `product_id`, `num_star`) VALUES
(1, 1, 31, 5),
(2, 1, 33, 5),
(3, 1, 32, 3),
(4, 2, 36, 5),
(5, 2, 34, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`customer_id`,`product_id`);

--
-- Chỉ mục cho bảng `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`features_id`);

--
-- Chỉ mục cho bảng `features_join`
--
ALTER TABLE `features_join`
  ADD PRIMARY KEY (`features_id`,`product_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`link_id`);

--
-- Chỉ mục cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Chỉ mục cho bảng `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Chỉ mục cho bảng `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`support_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `vote_product`
--
ALTER TABLE `vote_product`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `features`
--
ALTER TABLE `features`
  MODIFY `features_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `support`
--
ALTER TABLE `support`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `vote_product`
--
ALTER TABLE `vote_product`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
