-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 04:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopquanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan1`
--

CREATE TABLE `binhluan1` (
  `mabl` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `idkh` int(11) NOT NULL,
  `idhanghoa` int(11) NOT NULL,
  `content` text NOT NULL,
  `luotthich` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idcomment`, `idkh`, `idhanghoa`, `content`, `luotthich`) VALUES
(1, 1, 1, 'đẹp', 5),
(2, 3, 3, 'Xịn', 10);

-- --------------------------------------------------------

--
-- Table structure for table `cthanghoa`
--

CREATE TABLE `cthanghoa` (
  `idhanghoa` int(11) NOT NULL,
  `idmau` int(11) NOT NULL,
  `idsize` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `giamgia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cthanghoa`
--

INSERT INTO `cthanghoa` (`idhanghoa`, `idmau`, `idsize`, `dongia`, `soluongton`, `hinh`, `giamgia`) VALUES
(1, 1, 1, 250000, 100, 'hinh1.1', 50000),
(1, 5, 1, 250000, 100, 'hinh1.2', 50000),
(2, 1, 1, 280000, 100, 'hinh1.7', 30000),
(2, 3, 1, 280000, 100, 'hinh1.6', 30000),
(3, 1, 1, 370000, 100, 'Polo1.0', 0),
(3, 6, 1, 370000, 100, 'Polo1.1', 0),
(4, 1, 1, 380000, 100, 'Polo2.1', 30000),
(4, 5, 1, 380000, 100, 'Polo2.2', 30000),
(5, 1, 1, 420000, 100, 'Shirt1.1', 0),
(6, 5, 1, 610000, 100, 'Pant1.0', 60000),
(7, 7, 1, 610000, 100, 'Pant1.1', 60000),
(8, 5, 1, 390000, 100, 'Shortpant1.1', 0),
(8, 7, 1, 390000, 100, 'Shortpant1.2', 0),
(9, 2, 1, 510000, 100, 'OutterWear1.1', 60000),
(10, 1, 1, 510000, 100, 'OutterWear1.2', 60000),
(10, 4, 1, 510000, 100, 'OutterWear1.3', 60000),
(11, 1, 1, 669000, 100, 'Cozy1.2', 69000),
(11, 2, 1, 669000, 100, 'Cozy1.1', 69000),
(12, 3, 1, 530000, 100, 'Cozy1.3', 0),
(12, 5, 1, 530000, 100, 'Cozy1.4', 0),
(13, 3, 1, 320000, 100, 'Acc1.2', 20000),
(13, 6, 1, 320000, 100, 'Acc1.1', 20000),
(14, 5, 1, 330000, 100, 'Acc1.4', 30000),
(14, 8, 1, 330000, 100, 'Acc1.5', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `mahh`, `soluongmua`, `mausac`, `size`, `thanhtien`, `tinhtrang`) VALUES
(1, 1, 5, 'Màu trắng', 0, 750000, 0),
(1, 1, 5, 'Màu đen', 0, 750000, 0),
(2, 3, 1, 'Màu trắng', 0, 370000, 0),
(2, 1, 5, 'Màu trắng', 0, 750000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(60) NOT NULL,
  `maloai` int(11) NOT NULL,
  `dacbiet` bit(1) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`) VALUES
(1, 'Levents® Blank Regular Fit Tee', 1, b'1', 5, '2024-02-08', 'Regular Fit là form áo được thiết kế dáng suông phù hợp với mọi dáng người. Có chiều dài ngang hông làm cho outfits trở nên năng động hơn, tôn dáng người thon gọn và cao ráo, dễ dàng che được mọi khuyết điểm trên cơ thể, giúp cho người mặc thoải mái khi di chuyển.'),
(2, 'Levents® \"My Animals\" Series Zebra Tee', 1, b'1', 10, '2024-12-12', 'Áo oversize có độ dài phủ quá mông,phần tay áo rộng rãi, dài tay áo chạm khuỷu tay người mặc, form dáng thoải mái, rộng rãi khi mặc.'),
(3, 'Levents® Classic Oversized Polo', 2, b'1', 17, '2020-08-08', 'Áo sơ mi form oversize với độ dài phủ qua mông, rộng rãi, tôn dáng nhưng vẫn rất thoải mái khi mặc.- Cổ áo và bo tay áo ôm gọn không quá chật hay quá rộng giúp cho outfits của bạn trong sang trọng hơn, không giãn sau nhiều lần giặt. Nút áo nhựa cao cấp dập chìm logo Levents sang trọng.Cổ áo đứng form, chắc chắn tạo sự thanh lịch, giúp phần vai và cổ trông thon gọn, cao ráo hơn'),
(4, 'Levents® Stripe Polo', 2, b'1', 17, '2020-08-08', 'Áo oversize có độ dài phủ quá mông,phần tay áo rộng rãi, dài tay áo chạm khuỷu tay người mặc, form dáng thoải mái, rộng rãi khi mặc. Phù hợp với mọi giới tính.Cấu trúc sản phẩm: Lì Ven Fabric. Lì Ven Fabric - dày dặn nhưng thoáng mát, mềm mịn và không bị nhăn.'),
(5, 'Levents® Cities Shirt', 3, b'1', 22, '2021-12-21', 'Cấu trúc sản phẩm: Cotton cao cấp.'),
(6, 'Levents® Classic Wash Straight Jeans', 4, b'0', 12, '2022-12-21', 'Classic Wash Straight Jeans với độ dài phù hợp, rộng rãi cùng dáng suông thẳng vừa, không quá ôm, không quá rộng mà vẫn đảm bảo mang đến sự thuận tiện và thoải mái cho hoạt động của người mặc một cách tốt nhất.'),
(7, 'Levents® Khaki Pants', 4, b'0', 12, '2022-12-21', 'Khaki Pants với độ dài phù hợp, rộng rãi cùng dáng suông thẳng vừa, không quá ôm, không quá rộng mà vẫn đảm bảo mang đến sự thuận tiện và thoải mái cho hoạt động của người mặc một cách tốt nhất.'),
(8, 'Levents® Classic Shortpants', 5, b'0', 21, '2020-12-21', 'Form shortpants với độ dài trên đầu gối, độ rộng vừa phải, thoải mái vận động cả ngày dài. Dễ phối với mọi outfits, cho những buổi cafe với bạn bè hay thể dục hằng ngày'),
(9, 'Levents® Dragon Sweater', 6, b'0', 31, '2023-12-30', 'Áo sweater có độ dài phủ quá mông, phần tay áo rộng rãi, phần tay áo rộng rãi, form dáng thoải mái, thoáng mát khi mặc.'),
(10, 'Levents® Classic Zipper Hoodie', 6, b'0', 21, '2023-12-30', 'Áo hoodie oversize có độ dài phủ qua mông, phần tay áo rộng rãi, phần tay áo rộng rãi, form dáng thoải mái, thoáng mát khi mặc.'),
(11, 'Levents® \"My Animals\" Series Panther Knit Sweater', 7, b'1', 76, '2023-12-21', 'Áo sweater có độ dài phủ quá mông, phần tay áo rộng rãi, phần tay áo rộng rãi, form dáng thoải mái, thoáng mát khi mặc.'),
(12, 'Levents® Knit Polo', 7, b'1', 78, '2023-12-21', 'Áo oversize có độ dài phủ quá mông,phần tay áo rộng rãi, dài tay áo chạm khuỷu tay người mặc, form dáng thoải mái, rộng rãi khi mặc. Phù hợp với mọi giới tính'),
(13, 'Levents® 2Tone Mini Shoulder Bag', 8, b'0', 21, '2024-12-21', 'Mini Shoulder Bag với thiết đơn giản nhưng vô cùng tinh tế và kích nhỏ gọn tiện lợi để sử dụng đi chơi, đi cafe hằng ngày'),
(14, 'Levents® Classic Cap', 8, b'0', 21, '2024-12-21', 'Form dáng sporty ôm gọn đầu tạo cảm giác thon gọn cho người đội. Màu sắc nổi bật, thích hợp để làm một phụ kiện cá tính khi dạo phố hay shopping.');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(1, 3, '0000-00-00', 1500000),
(2, 3, '0000-00-00', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachikh` text DEFAULT NULL,
  `sodienthoai` varchar(12) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachikh`, `sodienthoai`) VALUES
(1, 'Minh Minh', 'minhminh', '8f8e2909a8f683c31159ee51d593a642', 'minh@gmail.com', 'HCM', '90907896789'),
(2, 'Tú Trần', 'tutran', '8f8e2909a8f683c31159ee51d593a642', 'tu@gmail.com', 'KG', '9090789678'),
(3, 'Teo', 'teoteo', '3ff19fad9f5844248f601ab23381cc88', 'teo123@gmail.com', 'CT', '9090789698'),
(4, 'Ý Nhi', 'nhinhi', '87f038af05196e3dfa958a521f6f400e', 'ngvynhi.itc@gmail.com', 'HCM', '9090789699');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'T-shirt', 4),
(2, 'Polo', 4),
(3, 'Shirt', 4),
(4, 'Pants', 5),
(5, 'Shortpants', 5),
(6, 'Outter Wear', 6),
(7, 'Cozy', 6),
(8, 'Accessories', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mausac`
--

CREATE TABLE `mausac` (
  `idmau` int(11) NOT NULL,
  `mausac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mausac`
--

INSERT INTO `mausac` (`idmau`, `mausac`) VALUES
(1, 'Màu trắng'),
(2, 'Màu hồng'),
(3, 'Màu xanh navy'),
(4, 'Màu be đậm'),
(5, 'Màu đen'),
(6, 'Màu be'),
(7, 'Màu kem'),
(8, 'Màu xám nhạt');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnhanvien` int(11) NOT NULL,
  `hoten` varchar(250) NOT NULL,
  `diachi` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `matkhau` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`idnhanvien`, `hoten`, `diachi`, `username`, `matkhau`) VALUES
(1, 'Nguyễn Hạo Vy', 'HCM', 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `sizeao`
--

CREATE TABLE `sizeao` (
  `Idsize` int(11) NOT NULL,
  `size` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sizeao`
--

INSERT INTO `sizeao` (`Idsize`, `size`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan1`
--
ALTER TABLE `binhluan1`
  ADD PRIMARY KEY (`mabl`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`);

--
-- Indexes for table `cthanghoa`
--
ALTER TABLE `cthanghoa`
  ADD PRIMARY KEY (`idhanghoa`,`idmau`,`idsize`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`idmau`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnhanvien`);

--
-- Indexes for table `sizeao`
--
ALTER TABLE `sizeao`
  ADD PRIMARY KEY (`Idsize`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan1`
--
ALTER TABLE `binhluan1`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mausac`
--
ALTER TABLE `mausac`
  MODIFY `idmau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idnhanvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizeao`
--
ALTER TABLE `sizeao`
  MODIFY `Idsize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
