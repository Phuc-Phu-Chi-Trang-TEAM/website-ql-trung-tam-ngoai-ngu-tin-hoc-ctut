-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2019 lúc 10:00 AM
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
  `Ma_giao_vien` int(11) NOT NULL,
  `Ma_lop_hoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giang_day`
--

INSERT INTO `giang_day` (`Ma_giao_vien`, `Ma_lop_hoc`) VALUES
(1, 1),
(1, 2),
(0, 3),
(0, 4),
(0, 5),
(0, 6),
(0, 7),
(0, 8),
(0, 9),
(0, 10),
(0, 11),
(0, 12),
(2, 13),
(0, 14);

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
-- Đang đổ dữ liệu cho bảng `giao_vien`
--

INSERT INTO `giao_vien` (`Ma_giao_vien`, `Ten_giao_vien`, `Ngay_sinh`, `Noi_sinh`, `CMND`, `Hoc_vi`, `Ma_chuyen_nganh`, `Dia_chi`, `Dien_thoai`, `Email`, `Ghi_chu`) VALUES
(1, 'Nguyễn Thanh Tâm', '1991-12-12', 'An Giang', '875465369', 'Thạc sĩ', 2, NULL, NULL, NULL, NULL),
(2, 'Nguyễn Thanh Trung', '1990-12-12', 'An Giang', '764757970', 'Thạc sĩ', 2, NULL, NULL, NULL, NULL);

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
('13', '1'),
('2', '3'),
('3', '13');

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
  `Ngay_sinh` date DEFAULT NULL,
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
(2, 'Dương Thị Thùy Trang', '1998-12-12', 'Cần Thơ', '875747906', NULL, NULL, NULL, NULL),
(3, 'Lư Huỳnh Tấn Phú', '1998-01-01', 'Kiên Giang', '574786979', NULL, NULL, NULL, NULL);

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
-- Cấu trúc bảng cho bảng `lich_hoc`
--

CREATE TABLE `lich_hoc` (
  `Ma_lich_hoc` int(11) NOT NULL,
  `Ma_lop_hoc` int(11) NOT NULL,
  `Ngay_hoc` date NOT NULL,
  `Thu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lich_hoc`
--

INSERT INTO `lich_hoc` (`Ma_lich_hoc`, `Ma_lop_hoc`, `Ngay_hoc`, `Thu`) VALUES
(343, 13, '2019-11-12', 3),
(344, 13, '2019-11-14', 5),
(345, 13, '2019-11-16', 7),
(346, 13, '2019-11-19', 3),
(347, 13, '2019-11-21', 5),
(348, 13, '2019-11-23', 7),
(349, 13, '2019-11-26', 3),
(350, 13, '2019-11-28', 5),
(351, 13, '2019-11-30', 7),
(352, 13, '2019-12-03', 3),
(353, 13, '2019-12-05', 5),
(354, 13, '2019-12-07', 7),
(355, 13, '2019-12-10', 3),
(356, 13, '2019-12-12', 5),
(357, 13, '2019-12-14', 7),
(358, 13, '2019-12-17', 3),
(359, 13, '2019-12-19', 5),
(360, 13, '2019-12-21', 7),
(361, 13, '2019-12-24', 3),
(362, 13, '2019-12-26', 5),
(363, 13, '2019-12-28', 7),
(364, 13, '2019-12-31', 3),
(365, 13, '2020-01-02', 5),
(366, 13, '2020-01-04', 7),
(367, 13, '2020-01-07', 3),
(368, 13, '2020-01-09', 5),
(369, 13, '2020-01-11', 7),
(370, 13, '2020-01-14', 3),
(371, 13, '2020-01-16', 5),
(372, 13, '2020-01-18', 7),
(373, 13, '2020-01-21', 3),
(374, 13, '2020-01-23', 5),
(375, 13, '2020-01-25', 7),
(376, 13, '2020-01-28', 3),
(377, 13, '2020-01-30', 5),
(378, 13, '2020-02-01', 7),
(379, 13, '2020-02-04', 3),
(380, 13, '2020-02-06', 5),
(381, 13, '2020-02-08', 7),
(382, 13, '2020-02-11', 3),
(383, 13, '2020-02-13', 5),
(384, 13, '2020-02-15', 7),
(385, 13, '2020-02-18', 3),
(386, 13, '2020-02-20', 5),
(387, 13, '2020-02-22', 7),
(388, 13, '2020-02-25', 3),
(389, 13, '2020-02-27', 5),
(390, 13, '2020-02-29', 7),
(391, 13, '2020-03-03', 3),
(392, 13, '2020-03-05', 5),
(393, 13, '2020-03-07', 7),
(394, 13, '2020-03-10', 3),
(395, 13, '2020-03-12', 5),
(396, 13, '2020-03-14', 7),
(397, 13, '2020-03-17', 3),
(398, 13, '2020-03-19', 5),
(399, 13, '2020-03-21', 7),
(400, 13, '2020-03-24', 3),
(401, 13, '2020-03-26', 5),
(402, 13, '2020-03-28', 7),
(403, 13, '2020-03-31', 3),
(404, 13, '2020-04-02', 5),
(405, 13, '2020-04-04', 7),
(406, 13, '2020-04-07', 3),
(407, 13, '2020-04-09', 5),
(408, 13, '2020-04-11', 7),
(409, 13, '2020-04-14', 3),
(410, 13, '2020-04-16', 5),
(411, 13, '2020-04-18', 7),
(412, 13, '2020-04-21', 3),
(413, 13, '2020-04-23', 5),
(414, 13, '2020-04-25', 7),
(415, 13, '2020-04-28', 3),
(416, 13, '2020-04-30', 5),
(417, 13, '2020-05-02', 7),
(418, 13, '2020-05-05', 3),
(419, 13, '2020-05-07', 5),
(420, 13, '2020-05-09', 7),
(421, 13, '2020-05-12', 3),
(422, 13, '2020-05-14', 5),
(423, 13, '2020-05-16', 7),
(424, 13, '2020-05-19', 3),
(425, 13, '2020-05-21', 5),
(426, 13, '2020-05-23', 7),
(427, 13, '2020-05-26', 3),
(428, 13, '2020-05-28', 5),
(429, 13, '2020-05-30', 7),
(430, 13, '2020-06-02', 3),
(431, 13, '2020-06-04', 5),
(432, 13, '2020-06-06', 7),
(433, 13, '2020-06-09', 3),
(434, 13, '2020-06-11', 5),
(435, 13, '2020-06-13', 7),
(436, 13, '2020-06-16', 3),
(437, 13, '2020-06-18', 5),
(438, 13, '2020-06-20', 7),
(439, 13, '2020-06-23', 3),
(440, 13, '2020-06-25', 5),
(441, 13, '2020-06-27', 7),
(442, 13, '2020-06-30', 3),
(443, 13, '2020-07-02', 5),
(444, 13, '2020-07-04', 7),
(445, 13, '2020-07-07', 3),
(446, 13, '2020-07-09', 5),
(447, 13, '2020-07-11', 7),
(448, 13, '2020-07-14', 3),
(449, 13, '2020-07-16', 5),
(450, 13, '2020-07-18', 7),
(451, 13, '2020-07-21', 3),
(452, 13, '2020-07-23', 5),
(453, 13, '2020-07-25', 7),
(454, 13, '2020-07-28', 3),
(455, 13, '2020-07-30', 5),
(456, 13, '2020-08-01', 7),
(457, 13, '2020-08-04', 3),
(458, 13, '2020-08-06', 5),
(459, 13, '2020-08-08', 7),
(460, 13, '2020-08-11', 3),
(461, 13, '2020-08-13', 5),
(462, 13, '2020-08-15', 7),
(463, 13, '2020-08-18', 3),
(464, 13, '2020-08-20', 5),
(465, 13, '2020-08-22', 7),
(466, 13, '2020-08-25', 3),
(467, 13, '2020-08-27', 5),
(468, 13, '2020-08-29', 7),
(469, 13, '2020-09-01', 3),
(470, 13, '2020-09-03', 5),
(471, 13, '2020-09-05', 7),
(472, 13, '2020-09-08', 3),
(473, 13, '2020-09-10', 5),
(474, 13, '2020-09-12', 7),
(475, 13, '2020-09-15', 3),
(476, 13, '2020-09-17', 5),
(477, 13, '2020-09-19', 7),
(478, 13, '2020-09-22', 3),
(479, 13, '2020-09-24', 5),
(480, 13, '2020-09-26', 7),
(481, 13, '2020-09-29', 3),
(482, 13, '2020-10-01', 5),
(483, 13, '2020-10-03', 7),
(484, 13, '2020-10-06', 3),
(485, 13, '2020-10-08', 5),
(486, 13, '2020-10-10', 7),
(487, 13, '2020-10-13', 3),
(488, 13, '2020-10-15', 5),
(489, 13, '2020-10-17', 7),
(490, 13, '2020-10-20', 3),
(491, 13, '2020-10-22', 5),
(492, 13, '2020-10-24', 7),
(493, 13, '2020-10-27', 3),
(494, 13, '2020-10-29', 5),
(495, 13, '2020-10-31', 7),
(496, 13, '2020-11-03', 3),
(497, 13, '2020-11-05', 5),
(498, 13, '2020-11-07', 7),
(499, 13, '2020-11-10', 3),
(500, 13, '2020-11-12', 5),
(501, 13, '2020-11-14', 7),
(502, 13, '2020-11-17', 3),
(503, 13, '2020-11-19', 5),
(504, 13, '2020-11-21', 7),
(505, 13, '2020-11-24', 3),
(506, 13, '2020-11-26', 5),
(507, 13, '2020-11-28', 7),
(508, 13, '2020-12-01', 3),
(509, 13, '2020-12-03', 5),
(510, 13, '2020-12-05', 7),
(511, 13, '2020-12-08', 3),
(512, 13, '2020-12-10', 5),
(540, 14, '2019-11-12', 3),
(541, 14, '2019-11-14', 5),
(542, 14, '2019-11-16', 7),
(543, 14, '2019-11-19', 3),
(544, 14, '2019-11-21', 5),
(545, 14, '2019-11-23', 7),
(546, 14, '2019-11-26', 3),
(547, 14, '2019-11-28', 5),
(548, 14, '2019-11-30', 7),
(549, 14, '2019-12-03', 3),
(550, 14, '2019-12-05', 5),
(551, 14, '2019-12-07', 7),
(552, 14, '2019-12-10', 3),
(553, 14, '2019-12-12', 5),
(554, 14, '2019-12-14', 7),
(555, 14, '2019-12-17', 3),
(556, 14, '2019-12-19', 5),
(557, 14, '2019-12-21', 7),
(558, 14, '2019-12-24', 3),
(559, 14, '2019-12-26', 5),
(560, 14, '2019-12-28', 7),
(561, 14, '2019-12-31', 3),
(562, 14, '2020-01-02', 5),
(563, 14, '2020-01-04', 7),
(564, 14, '2020-01-07', 3),
(565, 14, '2020-01-09', 5);

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
-- Đang đổ dữ liệu cho bảng `lop_hoc`
--

INSERT INTO `lop_hoc` (`Ma_lop_hoc`, `Ten_lop_hoc`, `So_luong_hoc_vien`, `Ghi_chu`, `Ma_khoa_hoc`, `Ma_buoi_hoc`, `Ma_chung_chi`, `Ngay_khai_giang`, `Ngay_be_giang`, `Ma_kieu_lich_hoc`, `Ma_phong_hoc`) VALUES
(1, 'Lớp Toeic 450+  1 (11/2019)', 2, NULL, 1, 1, 2, '2019-11-10', '2020-01-10', 1, 1),
(2, 'Lớp Toeic 450+  1 (8/2019)', 1, NULL, 1, 1, 2, '2019-08-10', '2019-10-10', 2, 1),
(3, 'Lớp Toeic 450+  2 (11/2019)', 1, NULL, 1, 1, 2, '2019-11-10', '2020-01-10', 2, 1),
(4, 'Lớp Toeic 550+ 1 (11/2019)', 0, NULL, 2, 1, 2, '2019-11-10', '2020-01-10', 1, 1),
(5, 'Lớp Toeic 550+ 2 (11/2019)', 0, NULL, 2, 1, 2, '2019-11-10', '2019-01-10', 1, 1),
(6, 'Lớp Toeic 550+ 3 (11/2019)', 0, NULL, 2, 1, 2, '2019-11-10', '2019-01-10', 2, 1),
(7, 'Lớp Toeic 550+ 4 (11/2019)', 0, NULL, 2, 1, 2, '2019-11-10', '2020-01-10', 1, 1),
(8, 'Lớp Toeic 450+ 20/11', 0, NULL, 1, 1, 2, '2019-11-11', '2019-01-11', 1, 1),
(9, 'Lớp Toeic 450+ 20/11', 0, NULL, 1, 1, 2, '2019-11-11', '2020-01-11', 1, 1),
(10, 'Lớp Toeic 550+ 2 (11/2019)', 0, NULL, 1, 1, 2, '2019-11-11', '2020-01-11', 1, 1),
(11, 'Lớp Toeic 450+ 20/11', 0, NULL, 1, 1, 2, '2019-11-11', '2020-01-11', 1, 1),
(12, 'Lớp Toeic 450+ 20/11', 0, NULL, 1, 1, 2, '2019-11-11', '2020-01-11', 1, 1),
(13, 'Lớp Toeic 450+ 20/11', 1, NULL, 1, 1, 2, '2019-11-11', '2020-12-11', 2, 1),
(14, 'Lớp Toeic 450+ 20/11', 0, 'Lớp 1', 2, 1, 2, '2019-11-10', '2020-01-10', 2, 1);

--
-- Bẫy `lop_hoc`
--
DELIMITER $$
CREATE TRIGGER `after_insert_lop_hoc` AFTER INSERT ON `lop_hoc` FOR EACH ROW BEGIN
insert into giang_day set giang_day.Ma_lop_hoc = new.Ma_lop_hoc ;
END
$$
DELIMITER ;

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
  MODIFY `Ma_chung_chi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `chuyen_nganh`
--
ALTER TABLE `chuyen_nganh`
  MODIFY `Ma_chuyen_nganh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `giao_vien`
--
ALTER TABLE `giao_vien`
  MODIFY `Ma_giao_vien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hoc_vien`
--
ALTER TABLE `hoc_vien`
  MODIFY `Ma_hoc_vien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT cho bảng `lich_hoc`
--
ALTER TABLE `lich_hoc`
  MODIFY `Ma_lich_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=566;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `Ma_lop_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD CONSTRAINT `lop_hoc_ibfk_1` FOREIGN KEY (`Ma_buoi_hoc`) REFERENCES `buoi_hoc` (`Ma_buoi_hoc`),
  ADD CONSTRAINT `lop_hoc_ibfk_2` FOREIGN KEY (`Ma_chung_chi`) REFERENCES `chung_chi` (`Ma_chung_chi`),
  ADD CONSTRAINT `lop_hoc_ibfk_3` FOREIGN KEY (`Ma_khoa_hoc`) REFERENCES `khoa_hoc` (`Ma_khoa_hoc`),
  ADD CONSTRAINT `lop_hoc_ibfk_4` FOREIGN KEY (`Ma_kieu_lich_hoc`) REFERENCES `kieu_lich_hoc` (`Ma_kieu_lich_hoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
