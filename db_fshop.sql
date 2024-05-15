-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2024 lúc 09:37 AM
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
-- Cơ sở dữ liệu: `db_fshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_chitietdonhang` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_chitietdonhang`, `id_donhang`, `id_sanpham`, `soluong`, `gia`) VALUES
(35, 40, 30, 2, 16490000),
(36, 41, 18, 3, 18490000),
(38, 42, 20, 2, 19490000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `id_chitiet` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `thuonghieu` varchar(10) NOT NULL,
  `masp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`id_chitiet`, `id_sanpham`, `thuonghieu`, `masp`) VALUES
(10, 17, 'ASUS', 'FX517ZC-HN077W'),
(11, 18, 'ASUS', 'FA506ICB-HN355W'),
(12, 19, 'ACER', 'A315-58-35AG'),
(13, 20, 'ACER', 'A715-42G-R4XX'),
(15, 21, 'ACER', 'PT516-52s-75E3'),
(16, 22, 'ACER', 'SFX16-51G-516Q'),
(17, 23, 'ASUS', 'GX650RW-LO999W'),
(18, 24, 'ASUS', 'GA503RS-LN892W'),
(19, 25, 'HP', '7C0T3PA'),
(20, 26, 'HP', '7C144PA'),
(21, 27, 'HP', '6K773PA'),
(22, 28, 'HP', '7C0S5PA'),
(23, 29, 'MSI', 'Alpha-15-B5EEK-216VN'),
(24, 30, 'MSI', 'GF63-Thin-11SC-664VN'),
(25, 31, 'MSI', 'Katana-GF66 12UCK-81');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendm` varchar(50) NOT NULL,
  `noibat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `tendm`, `noibat`) VALUES
(9, 'Laptop ASUS', 0),
(10, 'Laptop Acer', 1),
(11, 'Laptop MSI', 0),
(12, 'Laptop HP', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(11) NOT NULL,
  `tenkhachhang` varchar(50) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `tenkhachhang`, `sodienthoai`, `diachi`, `ghichu`, `tongtien`, `id_taikhoan`) VALUES
(40, 'khang', '0369455664', 'Đồng Tháp', '', 32980000, 3),
(41, 'dvkhang', '0369455664', 'Cần Thơ', 'Hàng dễ vỡ khó đền', 55470000, 1),
(42, 'Dương Văn Khang', '0369455664', 'Đồng Tháp', '', 60470000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quatang`
--

CREATE TABLE `quatang` (
  `id_quatang` int(11) NOT NULL,
  `tenqt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quatang`
--

INSERT INTO `quatang` (`id_quatang`, `tenqt`) VALUES
(11, 'Chuột ASUS TUF M3 trị giá 450.000đ'),
(12, 'Bảo hành 24 tháng'),
(13, 'Ưu đãi nâng RAM lên 16GB chỉ 590.000đ'),
(14, 'Balo Acer'),
(15, 'Ưu đãi khi mua Microsoft 365 bản quyền'),
(16, 'Balo Gaming trị giá 1.700.000đ'),
(17, 'Dịch vụ bảo hành 3S1 VIP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `gia` int(11) NOT NULL,
  `hinhanh` varchar(70) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `id_quatang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `tensp`, `gia`, `hinhanh`, `id_danhmuc`, `id_quatang`) VALUES
(17, 'Laptop ASUS TUF Dash F15 FX517ZC-HN079W (i5-12450H Win 11)', 21490000, 'asus_tuf_dash_f15_fx517zc.png', 9, 11),
(18, 'Laptop ASUS TUF Gaming A15 FA506ICB-HN355W (R5-4600H Win 11)', 18490000, 'asus-tuf-gaming-a15-fa506icb-hn355w-r5.png', 9, 11),
(19, 'Áo Polo Thể Thao Nữ Airycool Nẹp Khóa', 249000, 'ao-polo-the-thao-nu-nep.png', 10, 17),
(20, 'Áo Polo Thể Thao Nam Airycool Nẹp Khóa', 249000, 'ao-polo-the-thao-nam-nep.png', 10, 16),
(21, 'Quần Short Thể Thao Nam Cắt Lazer Yody Sport', 399000, 'quan-short-nam-yody.png', 10, 14),
(22, 'Bộ Đồ Thể Thao Nữ Double Face Có Mũ', 424500, 'bo-do-the-thao-nu-yody.png', 10, 14),
(23, 'Laptop ASUS ROG Zephyrus Duo 16 GX650RX-LO156W (R9-6900HX Win 11)', 114990000, 'asus-rog-zephyrus-duo-16-gx650rx-lo023w-r9.png', 9, 13),
(24, 'Laptop ASUS ROG Zephyrus G15 GA503RS-LN892W (R9-6900HS Win 11)', 63990000, 'asus-rog-zephyrus-g15-ga503rs.png', 9, 12),
(25, 'Bộ Đồ Thể Thao Nữ Gió Phối Lé', 444500, 'bo-do-the-thao-nu-yody-sam.png', 12, 12),
(26, 'Laptop HP Omen 16-n0085AX (7C144PA) (R9-6900HX Win 11)', 58990000, 'hp-omen-16-n0085ax-7c144pa.png', 12, 15),
(27, 'Áo Polo Thể Thao Nam Airycool Điều Hoà Phối Lé Nổi Bật', 249000, 'ao-polo-the-thao-nam-yody-sam.png', 12, 14),
(28, 'Áo Polo Nam Cafe Đá In Sườn', 259000, 'ao-polo-the-thao-nam-cafe.png', 12, 15),
(29, 'Áo Polo Nữ Cafe Đá In Sườn', 259000, 'ao-polo-the-thao-nu-cafe.png', 11, 12),
(30, 'Áo Polo Thể Thao Nam Airycool Điều Hoà Lé Sườn Phối Màu', 249000, 'ao-polo-the-thao-nam-yody.png', 11, 12),
(31, 'Áo Polo Thể Thao Nữ Airycool Điều Hoà Phối Lé Nổi Bật', 249000, 'ao-polo-the-thao-nu-yody.png', 9, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_taikhoan` int(11) NOT NULL,
  `tentaikhoan` varchar(20) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `quyen` tinyint(4) NOT NULL,
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `tentaikhoan`, `matkhau`, `quyen`, `sdt`) VALUES
(1, 'khang', '123', 0, 0),
(3, 'abc', '111', 0, 0),
(4, 'admin', '999', 1, 0),
(6, 'ngh', '123', 0, 329595322),
(7, 'nghu', '123', 0, 12345654);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongsokythuat`
--

CREATE TABLE `thongsokythuat` (
  `id_thongsokythuat` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `cpu` varchar(70) NOT NULL,
  `ram` varchar(70) NOT NULL,
  `ocung` varchar(80) NOT NULL,
  `cardohoa` varchar(80) NOT NULL,
  `manhinh` varchar(100) NOT NULL,
  `conggiaotiep` varchar(500) NOT NULL,
  `audio` varchar(70) NOT NULL,
  `banphim` varchar(50) NOT NULL,
  `lan` varchar(50) NOT NULL,
  `wifi` varchar(50) NOT NULL,
  `bluetooth` varchar(10) NOT NULL,
  `webcam` varchar(100) NOT NULL,
  `hedieuhanh` varchar(50) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `trongluong` varchar(20) NOT NULL,
  `mausac` varchar(50) NOT NULL,
  `kichthuoc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongsokythuat`
--

INSERT INTO `thongsokythuat` (`id_thongsokythuat`, `id_sanpham`, `cpu`, `ram`, `ocung`, `cardohoa`, `manhinh`, `conggiaotiep`, `audio`, `banphim`, `lan`, `wifi`, `bluetooth`, `webcam`, `hedieuhanh`, `pin`, `trongluong`, `mausac`, `kichthuoc`) VALUES
(7, 17, 'Intel Core i5-12450H 3.3GHz up to 4.4GHz 12MB', '8GB DDR5 4800MHz (2x SO-DIMM socket, up to 32GB SDRAM)', '512GB SSD M.2 NVMe™ PCIe® 3.0 (Còn trống 1 khe SSD M.2 PCIE)', 'NVIDIA GeForce  RTX™ 3050 4GB Up to 1550MHz* at 75W (1500MHz Boost Clock+50MHz O', '15.6\" FHD (1920 x 1080), Anti-Glare Display, 62.5% sRGB, 144Hz, IPS, Adaptive-Sync, 250 nits', '1x Thunderbolt™ 4 support DisplayPort™ 1x USB 3.2 Gen 2 Type-C support DisplayPort™ / power delivery / G-SYNC 2x USB 3.2 Gen 1 Type-A 1x HDMI 2.0b 1x RJ45 1x 3.5mm Combo Audio Jack', 'Dolby Atmos', 'Backlit Chiclet Keyboard', '10/100/1000 Mbps', '802.11ax (2X2)', 'v5.2', '720P HD camera', 'Windows 11 Home', '4 Cell 76WHr', '2.0 kg', 'Graphite Black', '35.4 x 25.1 x 1.99 ~ 2.07 cm'),
(8, 18, 'AMD Ryzen 5 4600H 3.0GHz up to 4.0GHz 8MB', '8GB DDR4 3200MHz (2x SO-DIMM socket, up to 32GB SDRAM)\r\n', '512GB M.2 NVMe™ PCIe® 3.0 SSD (2 slots)', 'NVIDIA® GeForce RTX™ 3050 4GB GDDR6, Up to 1600MHz at 60W (75W with Dynamic Boos', '15.6\" FHD (1920 x 1080) IPS, 144Hz, Wide View, 250nits, Narrow Bezel, Non-Glare with 45% NTSC, 63% s', '1x USB 3.2 Gen 1 Type-C support DisplayPort™\"\r\n3x USB 3.2 Gen 1 Type-A\r\n1x RJ-45 LAN\r\n1x HDMI 2.0b\r\n1x COMBO audio jack\r\n', 'DTS:X® Ultra\r\n', 'RGB', '10/100/1000 Mbps', 'Wi-Fi 6(802.11ax) (2x2)', 'v5.1', '720P HD camera', 'Windows 11 Home', '3 Cell 48WHr', '2.3 kg', 'Graphite Black', '35.9 x 25.6 x 2.28 ~ 2.45 cm'),
(9, 19, 'Intel Core i3-1115G4 1.7GHz up to 4.1GHz 6MB\r\n', '4GB DDR4 2400MHz Onboard (1x SO-DIMM socket, up to 12GB SDRAM)\r\n', '256GB SSD M.2 PCIE (Còn trống 1 khe 2.5\" SATA)\r\n', 'Intel UHD Graphics', '15.6\" FHD (1920 x 1080), Acer ComfyView LCD, Anti-Glare\r\n', '2x USB 3.2 Gen 1 Type-A \r\n1x USB 2.0\r\n1x HDMI®2.0 port with HDCP support\r\n1x RJ45\r\n1x DC-in jack for AC adapter\r\n1x 3.5 mm headphone/speaker jack, supporting headsets with built-in microphone', 'Realtek High Definition', 'Không hỗ trợ led', '10/100/1000 Mbps', '802.11a/b/g/n/ac', 'v5.0', '720p HD Webcam', 'Windows 11 Home', '2 Cell 36.7 Whr', '1.7 kg', 'Bạc', '363.4 x 238.4 x 19.9 (mm)'),
(10, 20, 'AMD Ryzen 5-5625U 2.3GHz up to 4.3GHz 16MB', '8GB DDR4 3200MHz (2x SO-DIMM socket, up to 32GB SDRAM)', '512GB PCIe® NVMe™ M.2 SSD (1 slot)', 'NVIDIA GeForce RTX 3050 4GB GDDR6', '15.6\" FHD (1920 x 1080) 144Hz SlimBezel, Acer ComfyView™ IPS LED LCD', '	1 x USB Type-C™ port: USB 3.2 Gen 1 (up to 5 Gbps)\n2 x USB 3.2 Gen 1 ports with one featuring power-off USB charging\n1x USB 2.0 port\n1 x 3.5 mm headphone/speaker jack, supporting headsets with built-in\n1x HDMI® port with HDCP support\n1x Ethernet (RJ-45) port\n1x DC-in jack for AC adapter\nFingerPrint', 'True Harmony; Dolby® Audio Premium', 'Led-Keyboard', 'Gigabit', 'Wi-Fi 6E (2x2)', 'v5.2', 'HD Webcam', 'Windows 11 Home', '3 Cell 50Whr', '2.1 kg', 'Đen', '363.4 x 254.5 x 22.9 (mm)'),
(11, 21, 'Intel® Core™ i9-12900H 3.8GHz up to 5.0GHz 24MB', '32GB LPDDR5 4800MHz Onboard', '1024GB+1024GB PCIe NVMe SED SSD RAID (2 slots)', 'NVIDIA®GeForce®RTX™3080Ti 16GB GDDR6', '16\" WQXGA (2560 x 1600) IPS, 240Hz, 500nits, ComfyView In-plane Switching (IPS) Technology, sRGB: 10', '2x USB Type-C™ports supporting: DisplayPort over USB-C, Thunderbolt 4, USB charging 5 V; 3 A, DC-in port 20 V; 65 W\r\n1x USB 3.2 Gen 2 port featuring power-off USB charging\r\n1x USB 3.2 Gen 2 port\r\n1x HDMI®2.1 port with HDCP support\r\n1x 3.5 mm headphone/speaker jack, supporting headsets with built-in microphone\r\n1x Ethernet (RJ-45) port\r\n1x DC-in jack for AC adapter\r\nFingerPrin', 'DTS:X ULTRA', 'RGB 3 Zone', 'INTEL Killer™ Ethernet E3100G', 'Killer Wireless Wi-Fi 6E 1675s', 'v5.2', '1080p HD video at 60 fps with Temporal Noise Reduction', 'Windows 11 Home', '4 Cell 99,98Whr', '2.4 kg', 'Steel Gray', '358.5 x 262.4 x 19.9 (mm)'),
(12, 22, 'Intel Core i5-11320H 3.2GHz up to 4.5GHz 8MB', '16GB LPDDR4X 4266MHz Onboard', '512GB SSD M.2 PCIE Gen3x4 (2 slot)', 'NVIDIA GeForce RTX 3050 + Intel Iris Xe Graphics', '16.1\" FHD (1920 x 1080), IPS, Acer ComfyViewTM LED-backlit TFT LCD,300nits, 100% sRGB', '1x USB 3.2 Gen 2 Type-C Ports Supporting: DisplayPort over USB-C, DC-in port 20 V; 60 or 90 W, USB charging 5 V; 3 A; Thunderbolt 4\r\n2 x USB 3.2 Gen 1 ports with one featuring power-off USB charging\r\n1 x HDMI 2.0 port with HDCP support Input and output\r\n1 x DC-in jack for AC adapter\r\n1 x 3.5 mm headphone/speaker jack, supporting headsets with built-in microphone\r\nFingerPrint', 'DTS Audio', 'Led-Keyboard', 'None', 'Intel® Wireless Wi-Fi 6 AX201 (2x2)', 'v5.1', '720p HD', 'Windows 11 Home', '4 Cell 59Whr', '1.9 kg', 'Steel Gray', '367.8 x 236.1 x 18.9 (mm)'),
(13, 23, 'AMD Ryzen 9 6900HX 3.3GHz up to 4.9GHz 16MB', 'AMD Ryzen 9 6900HX 3.3GHz up to 4.9GHz 16MB', '2TB M.2 NVMe™ PCIe® 4.0 Performance SSD (2 slots)', 'NVIDIA® GeForce RTX™ 3080Ti 16GB GDDR6 With ROG Boost: 1445 MHz* at 165W (1395MH', '16\" WQXGA (2560 x 1600) 16:10, anti-glare display, DCI-P3:100%, Pantone Validated, 165Hz, 3ms, FreeS', '1x USB 3.2 Gen 2 Type-C support DisplayPort / power delivery / G-SYNC\r\n1x USB 3.2 Gen 2 Type-C support DisplayPort™\r\n2x USB 3.2 Gen 2 Type-A\r\n1x HDMI 2.1\r\n1x RJ45 LAN port\r\n1x 3.5mm Combo Audio Jack', 'Dolby Atmos, 6-speaker(dual-force woofer) system with Smart Amplifier ', 'Backlit Chiclet Keyboard Per-Key RGB', '10/100/1000/2500 Mbps', 'Wi-Fi 6E(802.11ax)(2x2)', 'v5.2', '720P HD IR Camera for Windows Hello', 'Windows 11 Home', '4 Cell 90WHr', '2.6 kg', 'Black', '35.5 x 26.6 x 2.05 ~ 2.05 (cm)'),
(14, 24, 'AMD Ryzen 9 6900HS 3.3GHz up to 4.9GHz 16MB', '32GB (16GB Onboard + 16GB) DDR5 4800MHz (1x SO-DIMM socket, up to 48GB', '1TB M.2 NVMe™ PCIe® 4.0 SSD (2 slots)', '	\r\nNVIDIA® GeForce RTX™ 3080 8GB GDDR6 With ROG Boost: 1295MHz* at 120W (1245MHz', '15.6\" WQHD (2560 x 1440) 16:9, anti-glare display, DCI-P3:100%, Pantone Validated, 240Hz, 3ms, IPS-l', '2x USB 3.2 Gen 2 Type-C support DisplayPort™ / power delivery\r\n2x USB 3.2 Gen 2 Type-A\r\n1x HDMI 2.0b\r\n1x RJ45\r\n1x 3.5mm Combo Audio Jack', '2x 2W tweeter, Dolby Atmos', 'Backlit Chiclet Keyboard RGB', '10/100/1000/2500 Mbps', 'Wi-Fi 6E(802.11ax) (2x2)', 'v5.2', '720P HD IR Camera for Windows Hello', 'Windows 11 Home', '4 Cell 90WHr', '1.9 kg', 'Eclipse Gray', '35.5 x 24.3 x 1.99 cm'),
(15, 25, 'Intel Core i9-12900H 2.5GHz up to 5.0GHz 24MB', '16GB (8x2) DDR5 4800MHz (2x SO-DIMM socket, up to 32GB SDRAM)', '512 GB PCIe® NVMe™ TLC M.2 SSD', 'NVIDIA® GeForce RTX™ 3060 6GB GDDR6', '16.0\" UHD+ (3840 x 2400), OLED, multitouch-enabled, UWVA, edge-to-edge glass, micro-edge, Low Blue L', '	2x Thunderbolt™ 4 with USB4™ Type-C® 40Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)\r\n1x SuperSpeed USB Type-A 10Gbps signaling rate (HP Sleep and Charge)\r\n1x SuperSpeed USB Type-A 10Gbps signaling rate\r\n1x HDMI 2.1\r\n1x AC smart pin\r\n1x headphone/microphone combo', 'Audio by Bang & Olufsen; Quad speakers; HP Audio Boost', 'có', 'none', 'Intel® Wi-Fi 6E AX211 (2x2)', 'v5.3 combo', 'HP True Vision 5MP IR camera with camera shutter, temporal noise reduction and integrated dual array', 'Windows 11 Home', '6 Cell 83WHr', '2.32 kg', 'Natural silver Aluminum', '35.74 x 25.18 x 1.99 cm'),
(16, 26, 'AMD Ryzen 9 6900HX 3.3GHz up to 4.9GHz 16MB', '32GB (16x2) DDR5 4800MHz (2x SO-DIMM socket, up to 32GB SDRAM)', '1 TB PCIe® NVMe™ TLC M.2 SSD', 'NVIDIA® GeForce RTX™ 3070Ti 8GB GDDR6', '16.1\"  QHD (2560 x 1440), 165 Hz, 3 ms response time, IPS, micro-edge, anti-glare, Low Blue Light, 3', '2x SuperSpeed USB Type-C® 10Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)\r\n1x SuperSpeed USB Type-A 5Gbps signaling rate (HP Sleep and Charge)\r\n2x SuperSpeed USB Type-A 5Gbps signaling rate\r\n1x HDMI 2.1\r\n1x RJ-45\r\n1x AC smart pin\r\n1x headphone/microphone combo', 'Audio by Bang & Olufsen; DTS:X® Ultra; Dual speakers; HP Audio Boost', 'White', 'Integrated 10/100/1000 GbE LAN', 'MediaTek Wi-Fi 6 MT7921 (2x2)', 'v5.2', 'HP Wide Vision 720p HD camera with temporal noise reduction and integrated dual array digital microp', 'Windows 11 Home', '6 Cell 83WHr', '2.35 kg', 'Mica silver', '36.9 x 24.8 x 2.3 cm'),
(17, 27, 'Intel Core i7-1255U 1.7GHz up to 4.7GHz 12MB', '16GB LPDDR4x 4266MHz (Onboard)', '1 TB PCIe® NVMe™ TLC M.2 SSD', 'Intel® Iris® Xᵉ Graphics', '13.5\" 3K2K (3000 x 2000), OLED, multitouch-enabled, UWVA, edge-to-edge glass, micro-edge, anti-refle', '2x Thunderbolt™ 4 with USB4™ Type-C® 40Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)\r\n1x SuperSpeed USB Type-A 10Gbps signaling rate (HP Sleep and Charge)\r\n1x headphone/microphone combo\r\nFingerPrint', 'Bang & Olufsen, Quad Speakers, HP Audio Boost', 'có', 'none', 'Intel® Wi-Fi 6E AX211 (2x2)', 'v5.2', 'HP True Vision 5MP IR camera with camera shutter, temporal noise reduction and integrated dual array', 'Windows 11 Home', '4 Cell 66WHr', '1.36 kg', 'Nocturne blue aluminum', '29.8 x 22.04 x 1.69 cm'),
(18, 28, 'Intel Core i7-12700H 2.3GHz up to 4.7GHz 24MB', '16GB (8x2) DDR5 4800MHz (2x SO-DIMM socket, up to 32GB SDRAM)', '512GB PCIe® NVMe™ TLC M.2 SSD (Còn trống 1 khe SSD M.2 PCIE)', 'NVIDIA® GeForce RTX™ 3060 6GB GDDR6', '16.1\" FHD (1920 x 1080), 144Hz, IPS, micro-edge, anti-glare, 250 nits, 45% NTSC', '	1x SuperSpeed USB Type-C® 5Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)\r\n1x SuperSpeed USB Type-A 5Gbps signaling rate (HP Sleep and Charge)\r\n2x SuperSpeed USB Type-A 5Gbps signaling rate\r\n1x HDMI 2.1\r\n1x RJ-45\r\n1x AC smart pin\r\n1x headphone/microphone combo', 'Audio by B&O; Dual speakers; HP Audio Boost', 'có', '10/100/1000 GbE LAN', 'Intel® Wi-Fi 6E AX211 (2x2)', 'v5.3', 'HP Wide Vision 720p HD camera with temporal noise reduction and integrated dual array digital microp', 'Windows 11 Home', '4 Cell 70WHr', '2.46 kg', 'Performance blue', '37 x 26 x 2.35 cm'),
(19, 29, 'AMD Ryzen 5 5600H 3.3GHz up to 4.2GHz 16MB', '8GB (8x1) DDR4 3200MHz (2x SO-DIMM socket, up to 64GB SDRAM)', '512GB SSD M.2 PCIE Gen3x4 (2 slots)', 'AMD Radeon™ RX 6600M 8GB GDDR6 + AMD Radeon™ Graphics', '15.6\" FHD (1920x1080), 144Hz', '1x Type-C (USB 3.2 Gen1 / DP)\r\n2x Type-A USB 3.2 Gen1\r\n1x Type-A USB 2.0\r\n1x RJ45\r\n1x (4K @ 60Hz) HDMI\r\n1x Mic-in/Headphone-out Combo Jack', '2x 2W Speaker', 'RGB Backlight Keyboard', 'Gb LAN', 'AMD Wi-Fi 6E RZ608', 'v5.1', 'HD type (30fps@720p)', 'Windows 11 Home', '4 Cell 90WHr', '2.35 kg', 'Đen', '359 x 259 x 23.95 mm'),
(20, 30, 'Intel Core i5-11400H 2.7GHz up to 4.5GHz 12MB', '8GB DDR4 3200MHz (2x SO-DIMM socket, up to 64GB SDRAM)', '512GB SSD M.2 PCIE, x1 slot 2.5\" SATA3', 'NVIDIA® GeForce RTX™ 1650 4GB GDDR6, Up to 1172.5MHz Boost Clock, 40W Maximum Gr', '15.6\" FHD (1920 x 1080) 144Hz, 45% NTSC, IPS-Level, close to 65%sRGB', '1x Type-C USB3.2 Gen1\r\n3x Type-A USB3.2 Gen1\r\n1x RJ45\r\n1x (4K @ 30Hz) HDMI\r\n1x Mic-in\r\n1x Headphone-out', '2x 2W Speaker', 'Red', 'Gb LAN', '802.11 ax Wi-Fi 6', 'v5.1', 'HD type (30fps@720p)', 'Windows 11 Home', '3 Cell 51WHr', '1.86 kg', 'Đen', '359 x 254 x 21.7 mm'),
(21, 31, 'Intel Core i5-12450H 3.3GHz up to 4.4GHz 12MB', '8GB (8x1) DDR4 3200MHz (2x SO-DIMM socket, up to 64GB SDRAM)', '512GB NVMe PCIe SSD Gen4x4 (1 slot, support M.2 2280 PCIe 4.0x4)', 'NVIDIA® GeForce RTX™ 3050 4GB GDDR6, Up to 1550MHz Boost Clock, 60W Maximum Grap', '15.6\" FHD (1920x1080), 144Hz, IPS-Level, 45% NTSC', '2x Type-A USB 3.2 Gen 1\r\n1x Type-C USB 3.2 Gen 1\r\n1x Type-A USB 2.0\r\n1x (4K @ 60Hz) HDMI\r\n1x RJ45\r\n1x Mic-in/Headphone-out Combo Jack', '2x 2W Speaker', 'RGB Backlight Keyboard', 'Gb LAN', 'Intel Wi-Fi 6 AX201(2*2 ax)', 'v5.2', 'HD type (30fps@720p)', 'Windows 11 Home', '3 Cell 53.5WHr', '2.25 kg', 'Đen', '359 x 259 x 24.9 mm');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_chitietdonhang`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `chitietdonhang_ibfk_1` (`id_donhang`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`id_chitiet`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `lk_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `quatang`
--
ALTER TABLE `quatang`
  ADD PRIMARY KEY (`id_quatang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_quatang` (`id_danhmuc`),
  ADD KEY `id_danhmuc` (`id_danhmuc`),
  ADD KEY `id_quatang_2` (`id_quatang`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Chỉ mục cho bảng `thongsokythuat`
--
ALTER TABLE `thongsokythuat`
  ADD PRIMARY KEY (`id_thongsokythuat`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id_chitietdonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `id_chitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `quatang`
--
ALTER TABLE `quatang`
  MODIFY `id_quatang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `thongsokythuat`
--
ALTER TABLE `thongsokythuat`
  MODIFY `id_thongsokythuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `lk_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_dm` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`),
  ADD CONSTRAINT `lk_qt` FOREIGN KEY (`id_quatang`) REFERENCES `quatang` (`id_quatang`);

--
-- Các ràng buộc cho bảng `thongsokythuat`
--
ALTER TABLE `thongsokythuat`
  ADD CONSTRAINT `thongsokythuat_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
