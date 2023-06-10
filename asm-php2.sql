-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 10, 2023 lúc 07:01 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm-php2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Đang xử lý',
  `user_id` int(11) DEFAULT NULL,
  `voucher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pro_color_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Xe đạp địa hình'),
(3, 'Xe đạp đua'),
(4, 'Xe đạp đường phố'),
(5, 'Xe đạp trẻ em'),
(6, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(2, 'Xanh dương'),
(3, 'Đen'),
(5, 'Vàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `quantity`, `cate_id`, `image`) VALUES
(4, 'ROAD BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 30, 4, 'new1.png'),
(5, 'Men&#39;s BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 20, 2, 'new3.png'),
(6, 'Ladies&#39; BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 10, 4, 'bestseller1.png'),
(7, 'ROAD BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 20, 6, 'bestseller5.png'),
(8, 'E-Bikes BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 15, 3, 'bestseller8.png'),
(9, 'Children&#39;s BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 12, 5, 'bestseller1.png'),
(10, 'Men&#39;s BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 10, 4, 'bestseller3.png'),
(11, 'ROAD BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 20, 6, 'bestseller4.png'),
(12, 'E-Bikes BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 9, 3, 'new2.png'),
(13, 'Ladies&#39; BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 20, 5, 'bestseller8.png'),
(14, 'E-Bikes BICYCLES', 'Với chất lượng tuyệt vời. Sử dụng khung hợp kim nhôm nhẹ giúp xe đạp siêu nhẹ, siêu bền. Bộ chuyển động Shimano- 21 tốc độ ( Nhật Bản ). Thiết kế thời trang, nhẹ nhàng, thanh thoát, nước sơn 3 lớp cao cấp chống bong tróc, chịu mọi thời tiết…', 10, 5, 'new4.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `price`) VALUES
(2, 4, 2, 1100000),
(3, 4, 3, 1100000),
(4, 4, 5, 1200000),
(5, 5, 2, 1100000),
(6, 5, 3, 1100000),
(7, 5, 5, 1650000),
(8, 6, 2, 1100000),
(9, 6, 3, 1100000),
(10, 6, 5, 1650000),
(11, 7, 2, 1200000),
(12, 4, 3, 1100000),
(13, 7, 5, 1650000),
(14, 8, 2, 1100000),
(15, 8, 3, 1100000),
(16, 8, 5, 1650000),
(17, 9, 2, 1100000),
(18, 9, 3, 1100000),
(19, 9, 5, 1650000),
(20, 10, 2, 1100000),
(21, 10, 3, 1100000),
(22, 10, 5, 1650000),
(26, 11, 2, 1100000),
(27, 11, 3, 1650000),
(28, 11, 5, 1650000),
(29, 12, 2, 1100000),
(30, 12, 3, 1100000),
(31, 12, 5, 1650000),
(32, 13, 2, 1100000),
(33, 13, 3, 1100000),
(34, 13, 5, 1650000),
(35, 14, 2, 1100000),
(36, 14, 3, 1650000),
(37, 14, 5, 1650000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'thangnq', '1234', 'thangmanu.97@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `min_price` int(11) NOT NULL,
  `expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `name`, `discount`, `quantity`, `min_price`, `expiry`) VALUES
(1, 'demo', 10000, 1, 50000, '2023-06-16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_user` (`user_id`),
  ADD KEY `bill_voucher` (`voucher_id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail-bill` (`bill_id`),
  ADD KEY `bill_detail-pro_color` (`pro_color_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmt-pro` (`product_id`),
  ADD KEY `cmt-user` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro-cate` (`cate_id`);

--
-- Chỉ mục cho bảng `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro-color-pro` (`product_id`),
  ADD KEY `pro-color-color` (`color_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bill_voucher` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail-bill` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `bill_detail-pro_color` FOREIGN KEY (`pro_color_id`) REFERENCES `product_color` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `cmt-pro` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cmt-user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `pro-cate` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `pro-color-color` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `pro-color-pro` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
