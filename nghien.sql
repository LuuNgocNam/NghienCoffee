-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 04:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nghien`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, '1', '1'),
(3, '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `id_bv` int(11) NOT NULL,
  `tenbv` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `tacgia` varchar(255) NOT NULL,
  `ngay` date NOT NULL,
  `binhluan` varchar(255) NOT NULL,
  `noidung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`id_bv`, `tenbv`, `hinhanh`, `tacgia`, `ngay`, `binhluan`, `noidung`) VALUES
(10, 'CÀ PHÊ ARABICA', 'public/img/product/image_1.jpg', 'Admin', '2018-11-28', ' 3', 'Nhắc đến cà phê Arabica người ta nghĩ ngay đến dòng cà phê với hương trái cây tự nhiên.'),
(11, 'CÀ PHÊ ROBUSTA', 'public/img/product/image_2.jpg', 'Admin', '2018-11-28', '4', 'Cà phê từ lâu đã trở thành thức uống quen thuộc của người Việt. Những người sành về cà phê.'),
(12, '3 MÔ HÌNH KINH DOANH CÀ PHÊ', 'public/img/product/image_3.jpg', 'Admin', '2018-11-28', '5', 'Bạn đang băn khoăn không biết nên lựa chọn mô hình nào để kinh doanh cà phê take away? Hãy tham khảo những đặc điểm nổi.'),
(13, '6 THỨC UỐNG CẦN CÓ TRONG MENU CÀ PHÊ TAKE AWAY', 'public/img/product/image_4.jpg', 'Admin', '2018-11-28', '5', 'Sự cạnh tranh gay gắt của cà phê truyền thống cũng như khó khăn trong tài chính, tìm kiếm mặt bằng đã kéo theo sự ra.'),
(14, '11 DỤNG CỤ PHA CHẾ CAFE TAKE AWAY THIẾT YẾU', 'public/img/product/image_5.jpg', 'Admin', '2018-11-28', '5', 'Nếu bạn đang lên ý tưởng kinh doanh cafe take away thì chắc chắn rằng việc trang bị đầy đủ các dụng cụ pha chế cafe.'),
(15, 'CÀ PHÊ MỘC LÀ GÌ? MÁCH BẠN CÁCH NHẬN BIẾT CAFE MỘC', 'public/img/product/image_6.jpg', 'Admin', '2018-11-28', '6', 'Khi nhắc đến cafe mộc chắc hẳn rất nhiều người trong chúng ta lầm tưởng đây là tên của một giống cà phê.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id_ct` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `danhgia` varchar(255) NOT NULL,
  `loinhac` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id_ct`, `ten`, `email`, `danhgia`, `loinhac`) VALUES
(1, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cthoadon`
--

CREATE TABLE `tbl_cthoadon` (
  `id_cthd` int(11) NOT NULL,
  `id_sphd` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cthoadon`
--

INSERT INTO `tbl_cthoadon` (`id_cthd`, `id_sphd`, `tensp`, `soluong`, `gia`, `tongtien`) VALUES
(0, 0, '', 0, 0, 0),
(91, 22, 'COFFEE CAPUCCINO2', 1, 3, 3),
(92, 21, 'COFFEE CAPUCCINO1', 1, 3, 3),
(92, 22, 'COFFEE CAPUCCINO2', 1, 3, 3),
(92, 23, 'COFFEE CAPUCCINO3', 1, 3, 3),
(93, 21, 'COFFEE CAPUCCINO1', 1, 3, 3),
(95, 21, 'COFFEE CAPUCCINO1', 1, 3, 3),
(95, 23, 'COFFEE CAPUCCINO3', 1, 3, 3),
(95, 26, 'GRILLED BEEF2', 1, 6, 6),
(96, 22, 'COFFEE CAPUCCINO2', 1, 3, 3),
(96, 32, 'LEMONADE JUICE2', 1, 4, 4),
(97, 22, 'Latte', 1, 3, 3),
(97, 23, 'Bạc xỉu', 1, 3, 3),
(97, 24, 'Esspresso', 1, 3, 3),
(98, 21, 'Capuchino', 1, 3, 3),
(98, 24, 'Esspresso', 1, 3, 3),
(100, 21, 'Capuchino', 1, 3, 3),
(101, 22, 'Latte', 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_datban`
--

CREATE TABLE `tbl_datban` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `ngay` varchar(255) NOT NULL,
  `gio` time NOT NULL,
  `loinhan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_datban`
--

INSERT INTO `tbl_datban` (`id`, `ten`, `sdt`, `ngay`, `gio`, `loinhan`) VALUES
(1, 'tình', '0965478923', '2022-03-07', '17:02:00', 'bàn rộng'),
(2, 'Nguyễn Tình', '0965478923', '2022-03-20', '11:30:00', ''),
(3, 'tình', '0965478923', '0005-12-21', '12:30:00', 'sdf'),
(4, 'lợn', '124', '0000-00-00', '01:00:00', 'ádfđg'),
(5, 'tình', '0965478923', '0000-00-00', '12:30:00', 'sdsfg'),
(6, 'tình', '', '0000-00-00', '00:00:00', ''),
(7, 'tinh', '123123123123', '0000-00-00', '12:30:00', 'xinhdep'),
(8, '123123', '123', '3/9/2022', '12:30:00', 'TINH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dichvu`
--

CREATE TABLE `tbl_dichvu` (
  `id_dv` int(11) NOT NULL,
  `tendv` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dichvu`
--

INSERT INTO `tbl_dichvu` (`id_dv`, `tendv`, `mota`, `hinhanh`) VALUES
(1, 'Dễ dàng đặt đồ', 'Giúp chủ doanh nghiệp tiết kiệm thời gian, nhân lực trong việc quản lý vận hành thông qua việc kiểm soát chi tiết đơn hàng.', 'public/img/product/choices.png'),
(2, 'GIao hàng nhanh ', 'Với tiêu chuẩn vận chuyển nghiêm ngặt, Nghiện Coffee đảm bảo đơn hàng được giao đến trong trạng thái tốt nhất với chi phí hợp lý nhất.', 'public/img/product/delivery-truck.png'),
(3, 'Hạt cà phê', 'các nhà rang cần phải cân nhắc, xem xét về việc lựa chọn loại hàng để cho ra sản phẩm tốt nhất', 'public/img/product/coffee-beans (2).png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `id_hd` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ngay` date NOT NULL,
  `pttt` varchar(255) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `chuthich` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`id_hd`, `ten`, `sdt`, `diachi`, `email`, `ngay`, `pttt`, `tongtien`, `chuthich`) VALUES
(95, '1', '1', '1', 'thangubbu@gmail.com', '2022-06-12', 'Chưa thành toán', 12, 'Chưa thành toán'),
(96, '2', '2', '2', 'nguyentinh17901@gmail.com', '2022-06-12', 'Đã thanh toán', 7, ''),
(97, 'nam', 'jkklkll', '', 'luunam2203@gmail.com', '2022-06-18', 'Đã thanh toán', 9, ''),
(98, '', '', '', '', '2022-06-18', 'Thanh toán trực tiếp', 6, 'chua thanh toan'),
(99, '1', '2', '', '3', '2012-03-11', 'Tiền mặt', 3, 'Đã thanh toán'),
(100, '', '', '', '', '2022-06-19', 'Thanh toán thẻ tín dụng/Ghi nợ', 3, 'chua thanh toan'),
(101, '1', '0793266228', 'ubi', 'luunam2203@gmail.com', '2022-06-20', 'Thanh toán trực tiếp', 3, 'chua thanh toan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`id_khachhang`, `tenkh`, `ngaysinh`, `email`, `sdt`, `diachi`) VALUES
(1, 'Nguyễn Thị Ngọc Ánh', '2001-03-03', 'beminhcodon@gmail.com', '**********', 'Ninh Bình'),
(3, 'Lưu Ngọc Sơn', '2001-04-04', 'beminhcodon@gmail.com', '**********', 'Uông Bí'),
(4, 'Mạc Quỳnh Mai', '2001-05-05', 'mai04092001@gmail.com', '**********', 'Uông Bí');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kho`
--

CREATE TABLE `tbl_kho` (
  `id_kho` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `soluongnhap` int(11) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kho`
--

INSERT INTO `tbl_kho` (`id_kho`, `id_sp`, `tensp`, `hinhanh`, `soluongnhap`, `soluongton`, `gia`) VALUES
(2, 21, 'COFFEE CAPUCCINO1', 'public/img/product/a1.jpg', 100, 84, 2.9),
(3, 22, 'COFFEE CAPUCCINO2', 'public/img/product/a2.jpg', 100, 99, 2.9),
(4, 23, 'COFFEE CAPUCCINO3', 'public/img/product/a3.jpg', 100, 100, 2.9),
(5, 24, 'COFFEE CAPUCCINO4', 'public/img/product/a4.jpg', 100, 99, 2.9),
(6, 25, 'GRILLED BEEF1', 'public/img/product/dish-1.jpg', 70, 70, 5.9),
(7, 26, 'GRILLED BEEF2', 'public/img/product/dish-2.jpg', 70, 70, 5.9),
(8, 27, 'GRILLED BEEF3', 'public/img/product/dish-3.jpg', 70, 70, 5.9),
(9, 28, 'GRILLED BEEF4', 'public/img/product/dish-4.jpg', 70, 70, 5.9),
(11, 29, 'GRILLED BEEF5', 'public/img/product/dish-5.jpg', 70, 70, 5.9),
(12, 30, 'GRILLED BEEF6', 'public/img/product/a6.jpg', 70, 70, 5.9),
(13, 31, 'LEMONADE JUICE1', 'public/img/product/drink-1.jpg', 80, 80, 3.9),
(14, 32, 'LEMONADE JUICE2', 'public/img/product/drink-2.jpg', 80, 80, 3.9),
(15, 33, 'LEMONADE JUICE3', 'public/img/product/drink-3.jpg', 80, 80, 3.9),
(16, 34, 'LEMONADE JUICE4', 'public/img/product/drink-4.jpg', 80, 80, 3.9),
(17, 35, 'LEMONADE JUICE5', 'public/img/product/drink-5.jpg', 80, 80, 3.9),
(18, 36, 'LEMONADE JUICE6', 'public/img/product/drink-6.jpg', 80, 80, 3.9),
(19, 37, 'HOT CAKE HONEY1', 'public/img/product/dessert-1.jpg', 90, 90, 4.9),
(20, 38, 'HOT CAKE HONEY2', 'public/img/product/dessert-2.jpg', 90, 90, 4.9),
(21, 39, 'HOT CAKE HONEY3', 'public/img/product/dessert-3.jpg', 90, 90, 4.9),
(22, 40, 'HOT CAKE HONEY4', 'public/img/product/dessert-4.jpg', 90, 90, 4.9),
(23, 41, 'HOT CAKE HONEY5', 'public/img/product/dessert-5.jpg', 90, 90, 4.9),
(24, 42, 'HOT CAKE HONEY6', 'public/img/product/dessert-6.jpg', 90, 90, 4.9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khuyenmai`
--

CREATE TABLE `tbl_khuyenmai` (
  `id_km` int(11) NOT NULL,
  `tenkm` varchar(255) NOT NULL,
  `chietkhau` varchar(255) NOT NULL,
  `ngaybd` date NOT NULL,
  `ngaykt` date NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_khuyenmai`
--

INSERT INTO `tbl_khuyenmai` (`id_km`, `tenkm`, `chietkhau`, `ngaybd`, `ngaykt`, `hinhanh`) VALUES
(3, 'Black Friday', '20%', '2020-11-26', '2020-11-26', 'public/img/product/black-friday-2020-vao-ngay-nao-1.jpg'),
(4, 'Noel', '25%', '2020-12-24', '2020-12-25', 'public/img/product/Noel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhanvien`
--

CREATE TABLE `tbl_nhanvien` (
  `id_nv` int(11) NOT NULL,
  `tennv` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `chucvu` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nhanvien`
--

INSERT INTO `tbl_nhanvien` (`id_nv`, `tennv`, `hinhanh`, `chucvu`, `ngaysinh`, `gioitinh`, `diachi`) VALUES
(3, 'Nguyễn Duy Long', 'public/admin/images/person_2.jpg', 'Đầu bếp', '2001-01-01', 'Nam', 'Hà Nội'),
(4, 'Nguyễn Thị Tình', 'public/admin/images/3e0f5e9ebf8870d62999.jpg', 'Kế toan', '2001-02-02', 'Nam', 'Hà Nội'),
(5, 'Lưu Ngọc Nam', 'public/admin/images/person_4.jpg', 'Bồi bàn', '2001-03-22', 'Nam', 'Uông Bí'),
(6, 'Nguyễn Thị Ngọc Ánh', 'public/admin/images/person_4.jpg', 'Lao công', '2001-09-17', 'Nữ', 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `gia` float NOT NULL,
  `loai` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `chuthich` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sp`, `tensp`, `gia`, `loai`, `hinhanh`, `chuthich`) VALUES
(21, 'Capuchino', 2.9, 'COFFEE', 'public/img/product/a1.jpg', 'một loại cà phê gồm có cà phê và lớp bọt sữa'),
(22, 'Latte', 2.9, 'COFFEE', 'public/img/product/a2.jpg', 'kiểu café sữa của Ý,  nguyên liệu chính là Espresso và sữa'),
(23, 'Bạc xỉu', 2.9, 'COFFEE', 'public/img/product/a3.jpg', ' một loại đồ uống được làm từ cà phê có pha sữa '),
(24, 'Esspresso', 2.9, 'COFFEE', 'public/img/product/a4.jpg', 'café được pha bằng máy, sử dụng nước nóng nén '),
(25, 'Bít tết', 5.9, 'Main Dish', 'public/img/product/dish-1.jpg', ' là một món ăn bao gồm miếng thịt bò lát phẳng, thường được nướng vỉ'),
(26, 'Cừu nướng', 5.9, 'Main Dish', 'public/img/product/dish-2.jpg', 'thịt sườn có màu đỏ hồng, mỡ thì trắng tươi, đồng thời sờ cảm nhận được độ săn chắc'),
(27, 'Bò nướng', 5.9, 'Main Dish', 'public/img/product/dish-3.jpg', ' thịt bò có màu đỏ tươi, tránh đỏ sẫm, nếu mua được loại bò tơ thì càng tuyệt hơn'),
(28, 'Gà hun khói', 5.9, 'Main Dish', 'public/img/product/dish-4.jpg', 'Các bộ phận của con gà hoặc toàn bộ nguyên con gà được nướng hoặc hun khói'),
(29, 'Tôm nướng', 5.9, 'Main Dish', 'public/img/product/a5.jpg', 'Mùi thơm nức mũi của món này sẽ làm cho nhiều người thèm thuồng đó!'),
(30, 'Cá nướng', 5.9, 'Main Dish', 'public/img/product/dish-6.jpg', 'Loại cá có vị thịt ngọt, thơm ngon và có công dụng tốt cho sức khỏe.'),
(31, 'Nước chanh', 3.9, 'Drinks', 'public/img/product/drink-1.jpg', 'một loại thức uống phổ biến được làm từ chanh bằng cách ép'),
(32, 'Rượu vang đỏ', 3.9, 'Drinks', 'public/img/product/drink-2.jpg', 'Một loại thức uống có cồn được lên men từ nho và chuyển đổi chúng thành rượu.'),
(33, 'Nước trái cây', 3.9, 'Drinks', 'public/img/product/drink-3.jpg', 'một dung dịch tự nhiên chứa các mô từ trái cây hoặc các loại rau.'),
(34, 'Rượu soju dâu', 3.9, 'Drinks', 'public/img/product/drink-4.jpg', 'oại đồ uống có cồn chưng cất không màu, trong suốt có xuất xứ từ bán đảo Triều Tiên.'),
(35, 'Trà đào cam xả', 3.9, 'Drinks', 'public/img/product/drink-5.jpg', 'Loại nước giải nhiệt rất phổ biến ở giới trẻ hiện nay.'),
(36, 'Soda dâu', 3.9, 'Drinks', 'public/img/product/drink-6.jpg', '1 loại thức uống làm từ dâu và soda chanh rất mát cho mùa hè.'),
(37, 'HOT CAKE HONEY1', 4.9, 'Desserts', 'public/img/product/dessert-1.jpg', 'A small river named Duden flows by their place and supplies'),
(38, 'HOT CAKE HONEY2', 4.9, 'Desserts', 'public/img/product/dessert-2.jpg', 'A small river named Duden flows by their place and supplies'),
(39, 'HOT CAKE HONEY3', 4.9, 'Desserts', 'public/img/product/dessert-3.jpg', 'A small river named Duden flows by their place and supplies'),
(40, 'HOT CAKE HONEY4', 4.9, 'Desserts', 'public/img/product/dessert-4.jpg', 'A small river named Duden flows by their place and supplies'),
(41, 'HOT CAKE HONEY5', 4.9, 'Desserts', 'public/img/product/dessert-5.jpg', 'A small river named Duden flows by their place and supplies'),
(42, 'HOT CAKE HONEY6', 4.9, 'Desserts', 'public/img/product/dessert-6.jpg', 'A small river named Duden flows by their place and supplies');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`id_bv`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id_ct`);

--
-- Indexes for table `tbl_cthoadon`
--
ALTER TABLE `tbl_cthoadon`
  ADD PRIMARY KEY (`id_cthd`,`id_sphd`);

--
-- Indexes for table `tbl_datban`
--
ALTER TABLE `tbl_datban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dichvu`
--
ALTER TABLE `tbl_dichvu`
  ADD PRIMARY KEY (`id_dv`);

--
-- Indexes for table `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`id_hd`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Indexes for table `tbl_kho`
--
ALTER TABLE `tbl_kho`
  ADD PRIMARY KEY (`id_kho`);

--
-- Indexes for table `tbl_khuyenmai`
--
ALTER TABLE `tbl_khuyenmai`
  ADD PRIMARY KEY (`id_km`);

--
-- Indexes for table `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD PRIMARY KEY (`id_nv`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `id_bv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id_ct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_datban`
--
ALTER TABLE `tbl_datban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_dichvu`
--
ALTER TABLE `tbl_dichvu`
  MODIFY `id_dv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kho`
--
ALTER TABLE `tbl_kho`
  MODIFY `id_kho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_khuyenmai`
--
ALTER TABLE `tbl_khuyenmai`
  MODIFY `id_km` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  MODIFY `id_nv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
