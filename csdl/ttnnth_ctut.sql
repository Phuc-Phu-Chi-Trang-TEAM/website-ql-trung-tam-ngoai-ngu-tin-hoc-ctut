-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2019 lúc 08:48 PM
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

--
-- Bẫy `buoi_hoc`
--
DELIMITER $$
CREATE TRIGGER `before_delete_buoi_hoc` BEFORE DELETE ON `buoi_hoc` FOR EACH ROW BEGIN
DELETE FROM lop_hoc WHERE Ma_buoi_hoc = old.Ma_buoi_hoc;
END
$$
DELIMITER ;

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
-- Bẫy `chung_chi`
--
DELIMITER $$
CREATE TRIGGER `before_delete_chung_chi` BEFORE DELETE ON `chung_chi` FOR EACH ROW BEGIN
DELETE FROM lop_hoc WHERE Ma_chung_chi = old.Ma_chung_chi;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyen_nganh`
--

CREATE TABLE `chuyen_nganh` (
  `Ma_chuyen_nganh` int(11) NOT NULL,
  `Ten_chuyen_nganh` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyen_nganh`
--

INSERT INTO `chuyen_nganh` (`Ma_chuyen_nganh`, `Ten_chuyen_nganh`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Ngôn ngữ Anh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giang_day`
--

CREATE TABLE `giang_day` (
  `Ma_giao_vien` int(11) DEFAULT NULL,
  `Ma_lop_hoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `Ma_chuyen_nganh` int(11) DEFAULT NULL,
  `Dia_chi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dien_thoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bẫy `giao_vien`
--
DELIMITER $$
CREATE TRIGGER `before_delete_giao_vien` BEFORE DELETE ON `giao_vien` FOR EACH ROW BEGIN
DELETE FROM lop_hoc WHERE Ma_giao_vien = old.Ma_giao_vien;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_lop`
--

CREATE TABLE `hoc_lop` (
  `Ma_hoc_vien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Ma_lop_hoc` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bẫy `hoc_lop`
--
DELIMITER $$
CREATE TRIGGER `after_delete_hoc_lop` AFTER DELETE ON `hoc_lop` FOR EACH ROW BEGIN
UPDATE lop_hoc SET So_luong_hoc_vien = So_luong_hoc_vien -1 WHERE Ma_lop_hoc = old.Ma_lop_hoc;
END
$$
DELIMITER ;
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
DELIMITER $$
CREATE TRIGGER `after_update_hoc_lop` AFTER UPDATE ON `hoc_lop` FOR EACH ROW BEGIN
UPDATE lop_hoc SET So_luong_hoc_vien = So_luong_hoc_vien -1 WHERE Ma_lop_hoc = old.Ma_lop_hoc;
UPDATE lop_hoc SET So_luong_hoc_vien = So_luong_hoc_vien +1 WHERE Ma_lop_hoc = new.Ma_lop_hoc;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_vien`
--

CREATE TABLE `hoc_vien` (
  `Ma_hoc_vien` int(11) NOT NULL,
  `Ten_hoc_vien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ngay_sinh` date DEFAULT NULL,
  `Noi_sinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CMND` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dia_chi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dien_thoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ghi_chu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bẫy `hoc_vien`
--
DELIMITER $$
CREATE TRIGGER `before_delete_hoc_vien` BEFORE DELETE ON `hoc_vien` FOR EACH ROW BEGIN
DELETE FROM hoc_lop WHERE Ma_hoc_vien = old.Ma_hoc_vien;
END
$$
DELIMITER ;

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
-- Bẫy `khoa_hoc`
--
DELIMITER $$
CREATE TRIGGER `before_delete_khoa_hoc` BEFORE DELETE ON `khoa_hoc` FOR EACH ROW BEGIN
DELETE FROM lop_hoc WHERE Ma_khoa_hoc = old.Ma_khoa_hoc;
END
$$
DELIMITER ;

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
(1, 'Thứ 2-4-6', ''),
(2, 'Thứ 3-5-7', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_hoc`
--

CREATE TABLE `lich_hoc` (
  `Ma_lich_hoc` int(11) NOT NULL,
  `Ma_lop_hoc` int(11) NOT NULL,
  `Ngay_hoc` date NOT NULL,
  `Thu` int(11) NOT NULL
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
  `Ma_kieu_lich_hoc` int(11) NOT NULL,
  `Ma_phong_hoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bẫy `lop_hoc`
--
DELIMITER $$
CREATE TRIGGER `after_insert_lop_hoc` AFTER INSERT ON `lop_hoc` FOR EACH ROW BEGIN
insert into giang_day set giang_day.Ma_lop_hoc = new.Ma_lop_hoc ;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_lop_hoc` BEFORE DELETE ON `lop_hoc` FOR EACH ROW BEGIN
DELETE FROM hoc_lop WHERE Ma_lop_hoc = old.Ma_lop_hoc;
DELETE FROM lich_hoc WHERE Ma_lop_hoc = old.Ma_lop_hoc;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `Ma_nguoi_dung` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Quyen` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`Ma_nguoi_dung`, `username`, `password`, `Quyen`) VALUES
(1, 'nhphuc', '$2y$10$6JmF8Jxg/dcQYQV46ZsgMezZOkWh2B50Jls2ZsZlQnMft.c8wBu7i', 'Admin'),
(2, 'ttchi', '$2y$10$R6Z/rLbdJQ6DKNPdrxArS.c4NPcNV5WMdcVOhUx3BKB5QXRZuG4K6', 'Admin');

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
(2, 'C102', NULL),
(3, 'C103', NULL);

--
-- Bẫy `phong_hoc`
--
DELIMITER $$
CREATE TRIGGER `before_delete_phong_hoc` BEFORE DELETE ON `phong_hoc` FOR EACH ROW BEGIN
DELETE FROM lop_hoc WHERE Ma_phong_hoc = old.Ma_phong_hoc;
END
$$
DELIMITER ;

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
-- Chỉ mục cho bảng `chuyen_nganh`
--
ALTER TABLE `chuyen_nganh`
  ADD PRIMARY KEY (`Ma_chuyen_nganh`);

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
-- Chỉ mục cho bảng `lich_hoc`
--
ALTER TABLE `lich_hoc`
  ADD PRIMARY KEY (`Ma_lich_hoc`);

--
-- Chỉ mục cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`Ma_lop_hoc`),
  ADD KEY `Ma_buoi_hoc` (`Ma_buoi_hoc`),
  ADD KEY `Ma_chung_chi` (`Ma_chung_chi`),
  ADD KEY `Ma_khoa_hoc` (`Ma_khoa_hoc`),
  ADD KEY `Ma_kieu_lich_hoc` (`Ma_kieu_lich_hoc`);

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
  MODIFY `Ma_chung_chi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chuyen_nganh`
--
ALTER TABLE `chuyen_nganh`
  MODIFY `Ma_chuyen_nganh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT cho bảng `kieu_lich_hoc`
--
ALTER TABLE `kieu_lich_hoc`
  MODIFY `Ma_kieu_lich_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lich_hoc`
--
ALTER TABLE `lich_hoc`
  MODIFY `Ma_lich_hoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `Ma_lop_hoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `Ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phong_hoc`
--
ALTER TABLE `phong_hoc`
  MODIFY `Ma_phong_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
