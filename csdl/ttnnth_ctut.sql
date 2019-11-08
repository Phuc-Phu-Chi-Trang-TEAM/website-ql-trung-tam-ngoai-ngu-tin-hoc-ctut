-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2019 lúc 04:26 PM
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
-- Cơ sở dữ liệu: `ttnnth_ctut`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buoi_hoc`
--

CREATE TABLE `buoi_hoc` (
  `Ma_buoi_hoc` int(11) NOT NULL,
  `Ten_buoi_hoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `buoi_hoc`
--

INSERT INTO `buoi_hoc` (`Ma_buoi_hoc`, `Ten_buoi_hoc`, `Ghi_chu`) VALUES
(1, 'Sáng', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cham_cong`
--

CREATE TABLE `cham_cong` (
  `Ma_giao_vien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Ma_lop_hoc` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chung_chi`
--

CREATE TABLE `chung_chi` (
  `Ma_chung_chi` int(11) NOT NULL,
  `Ten_chung_chi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Gia_tien` float DEFAULT NULL,
  `Ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chung_chi`
--

INSERT INTO `chung_chi` (`Ma_chung_chi`, `Ten_chung_chi`, `Gia_tien`, `Ghi_chu`) VALUES
(2, 'Toeic', 15000000, NULL),
(3, 'Tin học A', 500000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giao_vien`
--

CREATE TABLE `giao_vien` (
  `Ma_giao_vien` int(11) NOT NULL,
  `Ten_giao_vien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ngay_sinh` date DEFAULT NULL,
  `Noi_sinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CMND` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hoc_vi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Chuyen_nganh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dia_chi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dien_thoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_lop`
--

CREATE TABLE `hoc_lop` (
  `Ma_hoc_vien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Ma_lop_hoc` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoc_lop`
--

INSERT INTO `hoc_lop` (`Ma_hoc_vien`, `Ma_lop_hoc`) VALUES
('1', '1'),
('13', '1');

--
-- Bẫy `hoc_lop`
--
DELIMITER $$
CREATE TRIGGER `after_insert_hoc_lop` AFTER INSERT ON `hoc_lop` FOR EACH ROW BEGIN
UPDATE lop_hoc
SET
	So_luong_hoc_vien = So_luong_hoc_vien +1
WHERE
	lop_hoc.Ma_lop_hoc = new.Ma_lop_hoc;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_phong`
--

CREATE TABLE `hoc_phong` (
  `Ma_phong_hoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Ma_lop_hoc` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_vien`
--

CREATE TABLE `hoc_vien` (
  `Ma_hoc_vien` int(11) NOT NULL,
  `Ten_hoc_vien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ngay_sinh` datetime DEFAULT NULL,
  `Noi_sinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CMND` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dia_chi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dien_thoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoc_vien`
--

INSERT INTO `hoc_vien` (`Ma_hoc_vien`, `Ten_hoc_vien`, `Ngay_sinh`, `Noi_sinh`, `CMND`, `Dia_chi`, `Dien_thoai`, `Email`, `Ghi_chu`) VALUES
(1, 'Nguyễn Hoàng Phúc', '1998-12-12 00:00:00', 'Kiên Giang', '97857645', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa_hoc`
--

CREATE TABLE `khoa_hoc` (
  `Ma_khoa_hoc` int(11) NOT NULL,
  `Ten_khoa_hoc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa_hoc`
--

INSERT INTO `khoa_hoc` (`Ma_khoa_hoc`, `Ten_khoa_hoc`, `Ghi_chu`) VALUES
(1, 'Toeic 450+', NULL),
(2, 'Toeic 550+', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kieu_lich_hoc`
--

CREATE TABLE `kieu_lich_hoc` (
  `Ma_kieu_lich_hoc` int(11) NOT NULL,
  `Ten_kieu_lich_hoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ghi_chu` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kieu_lich_hoc`
--

INSERT INTO `kieu_lich_hoc` (`Ma_kieu_lich_hoc`, `Ten_kieu_lich_hoc`, `Ghi_chu`) VALUES
(1, 'Thứ 2-4-6', 'Học vào các ngày thứ 2,4,6 trong tuần'),
(2, 'Thứ 3-5-7', 'Học vào các ngày thứ 3,5,7 trong tuần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_giang`
--

CREATE TABLE `lich_giang` (
  `Ma_lich_giang` int(11) NOT NULL,
  `Ma_giao_vien` int(11) NOT NULL,
  `Ngay` date NOT NULL,
  `Ma_buoi_hoc` int(11) NOT NULL,
  `Ma_lop_hoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc`
--

CREATE TABLE `lop_hoc` (
  `Ma_lop_hoc` int(11) NOT NULL,
  `Ten_lop_hoc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `So_luong_hoc_vien` int(11) DEFAULT NULL,
  `Ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ma_khoa_hoc` int(11) DEFAULT NULL,
  `Ma_buoi_hoc` int(11) DEFAULT NULL,
  `Ma_chung_chi` int(11) DEFAULT NULL,
  `Ngay_khai_giang` date NOT NULL,
  `Ngay_be_giang` date NOT NULL,
  `Ma_kieu_lich_hoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc`
--

INSERT INTO `lop_hoc` (`Ma_lop_hoc`, `Ten_lop_hoc`, `So_luong_hoc_vien`, `Ghi_chu`, `Ma_khoa_hoc`, `Ma_buoi_hoc`, `Ma_chung_chi`, `Ngay_khai_giang`, `Ngay_be_giang`, `Ma_kieu_lich_hoc`) VALUES
(1, 'Lớp Toeic 450+  1 (11/2019)', 2, NULL, 1, 1, 2, '2019-11-10', '2020-01-10', 1),
(2, 'Lớp Toeic 450+  1 (8/2019)', 1, NULL, 1, 1, 2, '2019-08-10', '2019-10-10', 2),
(3, 'Lớp Toeic 450+  2 (11/2019)', 1, NULL, 1, 1, 2, '2019-11-10', '2020-01-10', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `Ma_nguoi_dung` int(11) NOT NULL,
  `Ten_dang_nhap` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Mat_khau` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Quyen` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`Ma_nguoi_dung`, `Ten_dang_nhap`, `Mat_khau`, `Quyen`) VALUES
(1, 'nhphuc', '$2y$10$yLKn70Wfci/2x75bW64EQ.690qu3Y6ytrjieqWWpGrn6L8H7AOnnC', 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_hoc`
--

CREATE TABLE `phong_hoc` (
  `Ma_phong_hoc` int(11) NOT NULL,
  `Ten_phong_hoc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_hoc`
--

INSERT INTO `phong_hoc` (`Ma_phong_hoc`, `Ten_phong_hoc`, `Ghi_chu`) VALUES
(1, 'C101', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `buoi_hoc`
--
ALTER TABLE `buoi_hoc`
  ADD PRIMARY KEY (`Ma_buoi_hoc`);

--
-- Chỉ mục cho bảng `cham_cong`
--
ALTER TABLE `cham_cong`
  ADD PRIMARY KEY (`Ma_giao_vien`);

--
-- Chỉ mục cho bảng `chung_chi`
--
ALTER TABLE `chung_chi`
  ADD PRIMARY KEY (`Ma_chung_chi`);

--
-- Chỉ mục cho bảng `giao_vien`
--
ALTER TABLE `giao_vien`
  ADD PRIMARY KEY (`Ma_giao_vien`);

--
-- Chỉ mục cho bảng `hoc_lop`
--
ALTER TABLE `hoc_lop`
  ADD PRIMARY KEY (`Ma_hoc_vien`);

--
-- Chỉ mục cho bảng `hoc_phong`
--
ALTER TABLE `hoc_phong`
  ADD PRIMARY KEY (`Ma_phong_hoc`);

--
-- Chỉ mục cho bảng `hoc_vien`
--
ALTER TABLE `hoc_vien`
  ADD PRIMARY KEY (`Ma_hoc_vien`);

--
-- Chỉ mục cho bảng `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  ADD PRIMARY KEY (`Ma_khoa_hoc`);

--
-- Chỉ mục cho bảng `kieu_lich_hoc`
--
ALTER TABLE `kieu_lich_hoc`
  ADD PRIMARY KEY (`Ma_kieu_lich_hoc`);

--
-- Chỉ mục cho bảng `lich_giang`
--
ALTER TABLE `lich_giang`
  ADD PRIMARY KEY (`Ma_lich_giang`);

--
-- Chỉ mục cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`Ma_lop_hoc`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`Ma_nguoi_dung`);

--
-- Chỉ mục cho bảng `phong_hoc`
--
ALTER TABLE `phong_hoc`
  ADD PRIMARY KEY (`Ma_phong_hoc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `buoi_hoc`
--
ALTER TABLE `buoi_hoc`
  MODIFY `Ma_buoi_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chung_chi`
--
ALTER TABLE `chung_chi`
  MODIFY `Ma_chung_chi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giao_vien`
--
ALTER TABLE `giao_vien`
  MODIFY `Ma_giao_vien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoc_vien`
--
ALTER TABLE `hoc_vien`
  MODIFY `Ma_hoc_vien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  MODIFY `Ma_khoa_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `kieu_lich_hoc`
--
ALTER TABLE `kieu_lich_hoc`
  MODIFY `Ma_kieu_lich_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lich_giang`
--
ALTER TABLE `lich_giang`
  MODIFY `Ma_lich_giang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `Ma_lop_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `Ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phong_hoc`
--
ALTER TABLE `phong_hoc`
  MODIFY `Ma_phong_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
