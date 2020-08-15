-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2020 lúc 08:45 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mobileshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `content`) VALUES
(2, 'scafaddd,m'),
(6, 'dadd\r\nsadsaf\r\n21'),
(7, '\'dfghaa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(36, 'Nokia', 'brand1.png'),
(37, 'Samsung', 'brand3.png'),
(38, 'Apple', 'brand4.png'),
(39, 'Htc', 'brand5.png'),
(40, 'LG', 'brand6.png'),
(41, 'Sony', 'sony.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `email`, `address`, `content`) VALUES
(5, 'Lê Quang Khải', 'fcxomben99@gmail.com', '09209', 'nam định', 'giao hàng hơi chậm!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `productid`, `quantity`) VALUES
(10, 8, 2),
(10, 7, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `shipname` varchar(50) DEFAULT NULL,
  `shipphone` varchar(50) DEFAULT NULL,
  `shipaddress` varchar(200) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `totalprice` double NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `iduser`, `shipname`, `shipphone`, `shipaddress`, `createdat`, `totalprice`, `note`) VALUES
(10, 6, 'Lê Quang Khải', '0868845289', 'ND', '2020-05-26 01:25:26', 22600000, 'Giao trước 5h chiều!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cateid` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `promotionprice` double DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `cateid`, `price`, `promotionprice`, `description`) VALUES
(4, 'Sony microsoft', 'product-4.jpg', 41, 5500000, 5000000, 'Sản phẩm được sản xuất bởi Sony'),
(5, 'Samsung galaxy s5', 'product-1.jpg', 37, 6700000, 6500000, 'Một sản phẩm của Samsung'),
(6, 'Nokia lumia 1320', 'product-2.jpg', 36, 4500000, 4000000, 'Một sản phẩm của Nokia'),
(7, 'LG leon 2015', 'product-3.jpg', 40, 5400000, 5000000, 'Một sản phẩm của LG'),
(8, 'Iphone 6', 'product-5.jpg', 38, 6500000, 6300000, 'Một sản phẩm của Apple'),
(9, 'Samsung galaxy note 4', 'product-6.jpg', 37, 4500000, 4200000, 'Một sản phẩm của Samsung'),
(10, 'iPhone 7 Plus 32GB', '8ue3O.png', 38, 12999000, 9990000, 'Một sản phẩm của apple'),
(11, 'iPhone 11 64GB', 'vfVsD.png', 38, 21990000, 21698999, 'Một sản phẩm của apple'),
(12, 'iPhone 8 Plus 64GB', 'VNkd6.png', 38, 15990000, 14989998, 'Một sản phẩm của apple'),
(14, 'Samsung Galaxy A31', '4Uv3Z.png', 37, 6490000, 6290000, 'Một sản phẩm của samsung'),
(15, 'Nokia 7.2', 'YIzcb.png', 36, 6190000, 4590000, 'Một sản phẩm của nokia'),
(16, 'Sony Xperia 1 II', '45HJ3.jpeg', 41, 5600000, 5390000, 'Một sản phẩm của sony'),
(17, 'LG K51S', 'mBt6F.jpeg', 40, 7690000, 7590000, 'Một sản phẩm của LG'),
(18, 'HTC Wildfire R70', 'SC5o0.jpeg', 39, 5790000, 5590000, 'Một sản phẩm của htc'),
(19, 'Nokia C2', 'ivEY2.png', 36, 2689000, 254998, 'Một sản phẩm của nokia'),
(20, 'Samsung Galaxy A71', 'N3MBO.png', 37, 10490000, 9790000, 'Một sản phẩm của samsung'),
(21, 'iPhone 11 Pro Max ', 'IfNGx.png', 38, 33990000, 30590000, 'Một sản phẩm của'),
(22, 'HTC One M10 Mini', 'Xuh6f.png', 39, 3450000, 3000000, 'Một sản phẩm của HTC'),
(23, 'LG V60 ThinQ', 'JMI8Y.png', 40, 6500000, 6300000, 'Chiếc điện thoại LG V60 ThinQ đánh dấu sự trở lại của LG trong năm 2020, smartphone nổi bật với camera có khả năng quay video 8K, pin siêu khủng 5.000 mAh cùng vi xử lý Snapdragon 865 tích hợp modem mạng 5G hiện đại'),
(24, 'Sony Xperia 10 II', 'VO9cy.jpeg', 41, 7650000, 7250000, 'Sony Xperia 10 II (đọc thành Xperia Ten Mark Two) được trang bị màn hình OLED, cụm 3 camera cải tiến cùng vi xử lý Snapdragon 665. Mẫu smartphone mới này của Sony có thể sẽ đi kèm một mức giá dễ chịu hơn nhằm hướng đến đối tượng khách hàng tầm trung'),
(25, 'Nokia 8.3', 'ur2Jq.png', 36, 5370000, 5000000, 'Nokia 8.3 nổi bật với danh hiệu smartphone 5G đầu tiên của Nokia, bên cạnh đó là những cải tiến mạnh mẽ về hiệu năng và chất lượng camera.'),
(26, 'Samsung Galaxy S20 Ultra', 'i7oSe.png', 37, 27490000, 25489999, 'Samsung Galaxy S20 Ultra siêu phẩm công nghệ hàng đầu của Samsung mới ra mắt với nhiều đột phá công nghệ, màn hình tràn viền không khuyết điểm, hiệu năng đỉnh cao, camera độ phân giải siêu khủng 108 MP cùng khả năng zoom 100X thách thức mọi giới hạn smart'),
(27, 'iPhone SE 64GB', 'CgQYP.png', 38, 8560000, 8200000, 'iPhone SE 2020 đã bất ngờ ra mắt với thiết kế 4.7 inch nhỏ gọn, chip A13 Bionic mạnh mẽ như trên iPhone 11 và đặc biệt sở hữu mức giá tốt chưa từng có.'),
(28, 'HTC Breeze', 'bMKx2.png', 39, 3400000, 3199998, 'Một sản phẩm của'),
(29, ' LG K61', 'bgnC9.jpeg', 40, 5779999, 5599999, 'Một sản phẩm của'),
(30, 'LG Q51', 'VTz9o.jpeg', 40, 7540000, 7300000, 'LG Q51 là chiếc điện thoại thuộc dòng Q-series mới được LG ra mắt trong năm nay, smartphone nổi bật với thiết kế màn hình giọt nước tràn viền, hiệu năng tốt cùng nhiều nâng cấp mạnh mẽ về cấu hình và camera'),
(31, 'Sony H8266', 'h4aDH.png', 41, 5854000, 5500000, 'Khi nói đến smartphone Sony, đa phần chúng ta đều nghĩ ngay tới chiếc điện thoại với thiết kế khung viền rất dày, đặc biệt là viền cạnh trên - cạnh dưới và với Sony H8266 thì mọi chuyện sẽ thay đổi.'),
(32, 'Sony Xperia XZ1 Ultra', 'qw2iT.png', 41, 7650000, 7500000, 'Một sản phẩm của sony');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `image`, `link`) VALUES
(8, 'h4-slide.png', '#'),
(9, 'h4-slide2.png', '#'),
(10, 'h4-slide3.png', '#'),
(11, 'h4-slide4.png', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `pass` varchar(55) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `phone`, `address`, `level`) VALUES
(6, 'Lê Quang Khải', 'fcxomben99@gmail.com', '6a79857be87a20fa8352afae324d7d15', '0868845289', 'ND22', 1),
(7, 'Lê Quang Khải', 'fcxomben992@gmail.com', '7b9357ab9b96f7b6eb18caba9bbe2fe2', '08688452892', 'ND23', 0),
(13, 'Lê Quang Khải', 'fcxomben9924@gmail.com', '7b9357ab9b96f7b6eb18caba9bbe2fe2', '086884528921', 'ND23', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `orderid` (`orderid`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cateid` (`cateid`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cateid`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
