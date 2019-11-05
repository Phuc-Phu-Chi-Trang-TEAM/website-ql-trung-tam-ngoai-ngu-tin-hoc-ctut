-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2019 lúc 09:36 AM
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
  `Ma_buoi_hoc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `buoi_hoc`
--

INSERT INTO `buoi_hoc` (`Ma_buoi_hoc`, `Ghi_chu`) VALUES
('CH', 'Chiều'),
('SA', 'Sáng');

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
(1, 'Toeic', 1500000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giang_day`
--

CREATE TABLE `giang_day` (
  `Ma_giao_vien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Ma_lop_hoc` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giao_vien`
--

CREATE TABLE `giao_vien` (
  `Ma_giao_vien` int(11) NOT NULL,
  `Ten_giao_vien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ngay_sinh` datetime DEFAULT NULL,
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
  `Hoc_vi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Chuyen_nganh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dia_chi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dien_thoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa_hoc`
--

CREATE TABLE `khoa_hoc` (
  `Ma_khoa_hoc` int(11) NOT NULL,
  `Ten_khoa_hoc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ghi_chu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
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
  `Ma_khoa_hoc` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ma_buoi_hoc` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ma_chung_chi` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `Ma_nguoi_dung` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Mat_khau` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Quyen` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'C101', NULL),
(2, 'C102', NULL);

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
-- Chỉ mục cho bảng `giang_day`
--
ALTER TABLE `giang_day`
  ADD PRIMARY KEY (`Ma_giao_vien`);

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
-- AUTO_INCREMENT cho bảng `chung_chi`
--
ALTER TABLE `chung_chi`
  MODIFY `Ma_chung_chi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `giao_vien`
--
ALTER TABLE `giao_vien`
  MODIFY `Ma_giao_vien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoc_vien`
--
ALTER TABLE `hoc_vien`
  MODIFY `Ma_hoc_vien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  MODIFY `Ma_khoa_hoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `Ma_lop_hoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phong_hoc`
--
ALTER TABLE `phong_hoc`
  MODIFY `Ma_phong_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
