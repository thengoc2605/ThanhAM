-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 26, 2026 lúc 01:17 PM
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
-- Cơ sở dữ liệu: `thanham_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cau_chuyen`
--

CREATE TABLE `cau_chuyen` (
  `id` int(11) NOT NULL,
  `ten_tac_gia` varchar(100) NOT NULL,
  `an_danh` tinyint(1) DEFAULT 0,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `trang_thai` enum('cho_duyet','da_duyet','an') DEFAULT 'da_duyet',
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cau_chuyen`
--

INSERT INTO `cau_chuyen` (`id`, `ten_tac_gia`, `an_danh`, `anh_dai_dien`, `tieu_de`, `noi_dung`, `hinh_anh`, `trang_thai`, `ngay_tao`) VALUES
(1, 'Em N.V.A (Trường Nhân Ái)', 1, NULL, 'Lần đầu em tự gọi đồ ăn', 'Nhờ ứng dụng Thanh Âm, em có thể phát âm thông điệp để cô bán hàng hiểu được mong muốn của em.', NULL, 'da_duyet', '2026-08-21 09:13:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_so_tac_dong`
--

CREATE TABLE `chi_so_tac_dong` (
  `id` int(11) NOT NULL,
  `ma_chi_so` varchar(50) NOT NULL,
  `ten_chi_so` varchar(100) NOT NULL,
  `gia_tri` int(11) DEFAULT 0,
  `mo_ta_phu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_so_tac_dong`
--

INSERT INTO `chi_so_tac_dong` (`id`, `ma_chi_so`, `ten_chi_so`, `gia_tri`, `mo_ta_phu`) VALUES
(1, 'reached', 'Người đã tiếp cận', 75, 'Học sinh & người dân'),
(2, 'partners', 'Đơn vị đồng hành', 1, 'Trường KT Nhân Ái'),
(3, 'devices_given', 'Thiết bị đã trao', 20, 'Điện thoại thông minh'),
(4, 'sponsors', 'Nhà tài trợ', 1, 'Doanh nghiệp & Cá nhân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chung_nhan`
--

CREATE TABLE `chung_nhan` (
  `id` int(11) NOT NULL,
  `ma_chung_nhan` varchar(50) NOT NULL,
  `ten_nha_tai_tro` varchar(100) NOT NULL,
  `chi_tiet_hien_vat` varchar(255) NOT NULL,
  `ngay_cap` date NOT NULL,
  `duong_dan_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chung_nhan`
--

INSERT INTO `chung_nhan` (`id`, `ma_chung_nhan`, `ten_nha_tai_tro`, `chi_tiet_hien_vat`, `ngay_cap`, `duong_dan_pdf`) VALUES
(1, 'TA-2026-001', 'Nguyễn Văn A', '2 Điện thoại VSmart cũ', '2026-02-20', NULL),
(2, 'TA-2026-002', 'Công ty ABC', 'Tài trợ ngân sách 5.000.000 VNĐ', '2026-02-21', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuong_trinh`
--

CREATE TABLE `chuong_trinh` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `dia_diem` varchar(255) DEFAULT NULL,
  `thoi_gian` varchar(100) DEFAULT NULL,
  `don_vi_thu_huong` varchar(255) DEFAULT NULL,
  `don_vi_tai_tro` varchar(255) DEFAULT NULL,
  `chi_tieu_so_luong` int(11) DEFAULT 0,
  `so_luong_hien_tai` int(11) DEFAULT 0,
  `trang_thai` enum('dang_dien_ra','da_hoan_thanh') DEFAULT 'dang_dien_ra',
  `mo_ta` text DEFAULT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `don_vi_to_chuc` varchar(255) DEFAULT 'Dự án Thanh Âm',
  `don_vi_dong_hanh` varchar(255) DEFAULT NULL,
  `don_vi_bao_tro` varchar(255) DEFAULT NULL,
  `doi_tuong_ho_tro` varchar(255) DEFAULT NULL,
  `so_co_thiet_bi` int(11) DEFAULT 0,
  `so_chua_thiet_bi` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuong_trinh`
--

INSERT INTO `chuong_trinh` (`id`, `tieu_de`, `dia_diem`, `thoi_gian`, `don_vi_thu_huong`, `don_vi_tai_tro`, `chi_tieu_so_luong`, `so_luong_hien_tai`, `trang_thai`, `mo_ta`, `ngay_tao`, `don_vi_to_chuc`, `don_vi_dong_hanh`, `don_vi_bao_tro`, `doi_tuong_ho_tro`, `so_co_thiet_bi`, `so_chua_thiet_bi`) VALUES
(1, 'Triển khai ứng dụng tại Trường KT Nhân Ái', 'Mỹ Tho, Tiền Giang', NULL, 'Trường Khuyết tật Nhân Ái', NULL, 50, 20, 'dang_dien_ra', 'Hỗ trợ thiết bị và cài đặt phần mềm giao tiếp AI cho học sinh.', '2026-08-21 09:13:27', 'Dự án Thanh Âm', NULL, NULL, NULL, 0, 0),
(2, 'Vận động 20 Smartphone cho học sinh nghèo', 'Trường khuyết tật nhân ái', '', 'Học sinh yếu thế', NULL, 20, 5, 'dang_dien_ra', 'Kêu gọi quyên góp điện thoại cũ/mới còn dùng tốt.', '2026-08-21 09:13:27', 'Dự án Thanh Âm', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doi_tac`
--

CREATE TABLE `doi_tac` (
  `id` int(11) NOT NULL,
  `ten_doi_tac` varchar(150) NOT NULL,
  `nguoi_lien_he` varchar(100) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `loi_nhan` text DEFAULT NULL,
  `trang_thai` enum('moi','da_lien_he','da_hop_tac') DEFAULT 'moi',
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dong_hanh_chien_luoc`
--

CREATE TABLE `dong_hanh_chien_luoc` (
  `id` int(11) NOT NULL,
  `ho_ten_dai_dien` varchar(255) NOT NULL,
  `ten_doanh_nghiep` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `goi_hop_tac` varchar(100) DEFAULT 'Chưa chọn gói',
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dong_hanh_chien_luoc`
--

INSERT INTO `dong_hanh_chien_luoc` (`id`, `ho_ten_dai_dien`, `ten_doanh_nghiep`, `sdt`, `email`, `goi_hop_tac`, `ngay_tao`) VALUES
(1, 'pham the ngoc', 'bánh bao', '03541545', 'ngocpham@gmail.com', 'GÓI 01 – TIA SÁNG', '2026-08-25 03:22:49'),
(2, 'gdfg', 'smnfknbs', '0365415', 'ngocne@gmail.com', 'Chưa chọn gói', '2026-08-25 11:07:23'),
(3, 'dfbcfvb', 'sxgdvsx', '032152', 'sfgsf@gmail.com', 'GÓI 03 – ĐỐI TÁC CHIẾN LƯỢC', '2026-08-25 11:07:41'),
(4, 'hihi', 'smnfknbs', '0365415', 'the@gmail.com', 'Chưa chọn gói', '2026-08-26 03:58:09'),
(5, 'gdfg', 'smnfknbs', '086535755', 'theng@gmail.com', 'GÓI 02 – LAN TỎA', '2026-08-26 03:58:32'),
(6, 'pham the ngoc', 'bánh mì', '0865357517', 'thengoc2605@gmail.com', 'GÓI 01 – TIA SÁNG', '2026-08-26 10:48:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giao_dich_ngan_hang`
--

CREATE TABLE `giao_dich_ngan_hang` (
  `id` int(11) NOT NULL,
  `ma_giao_dich` varchar(50) NOT NULL,
  `so_tien` decimal(15,2) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `vai_tro` enum('quan_tri','bien_tap') DEFAULT 'quan_tri',
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten_dang_nhap`, `mat_khau`, `ho_ten`, `email`, `vai_tro`, `ngay_tao`) VALUES
(1, 'admin', '$2y$10$VbAbvspE2RXfWmnVmMfqQOKalT4a6gr8ZWOzK5gg68wMSoPJhcL3.', 'Quản Trị Viên', 'thanham.vfy@gmail.com', 'quan_tri', '2026-08-21 09:13:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen_gop`
--

CREATE TABLE `quyen_gop` (
  `id` int(11) NOT NULL,
  `ten_nha_tai_tro` varchar(100) NOT NULL,
  `loai_tai_tro` enum('tien_mat','thiet_bi') DEFAULT 'tien_mat',
  `so_tien_hoac_hien_vat` varchar(255) NOT NULL,
  `chuong_trinh_id` int(11) DEFAULT NULL,
  `ma_chung_nhan` varchar(50) DEFAULT NULL,
  `trang_thai` enum('cho_duyet','da_duyet','tu_choi') DEFAULT 'da_duyet',
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen_gop`
--

INSERT INTO `quyen_gop` (`id`, `ten_nha_tai_tro`, `loai_tai_tro`, `so_tien_hoac_hien_vat`, `chuong_trinh_id`, `ma_chung_nhan`, `trang_thai`, `ngay_tao`) VALUES
(1, 'Nguyễn Văn A', 'thiet_bi', '2 Điện thoại VSmart cũ', 2, 'TA-2026-001', 'da_duyet', '2026-08-21 09:13:27'),
(2, 'Công ty ABC', 'tien_mat', '5,000,000 VNĐ', 1, 'TA-2026-002', 'da_duyet', '2026-08-21 09:13:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_lieu`
--

CREATE TABLE `tai_lieu` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `danh_muc` varchar(100) DEFAULT 'HoSoNangLuc',
  `duong_dan_file` varchar(255) NOT NULL,
  `dung_luong_file` varchar(20) DEFAULT NULL,
  `luot_tai` int(11) DEFAULT 0,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_lieu`
--

INSERT INTO `tai_lieu` (`id`, `tieu_de`, `danh_muc`, `duong_dan_file`, `dung_luong_file`, `luot_tai`, `ngay_tao`) VALUES
(1, 'Hồ sơ năng lực dự án THANH ÂM 2026', 'HoSoNangLuc', 'assets/docs/Ho_So_Nang_Luc_Thanh_Am.pdf', '2.5 MB', 0, '2026-08-21 09:13:27'),
(2, 'Báo cáo tác động xã hội đợt 1', 'BaoCaoKPI', 'assets/docs/Bao_Cao_Tac_Dong_2026.pdf', '1.8 MB', 0, '2026-08-21 09:13:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_tro`
--

CREATE TABLE `tai_tro` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hinh_thuc` enum('tien_mat','thiet_bi') NOT NULL,
  `loi_nhan` text DEFAULT NULL,
  `ma_giao_dich` varchar(50) DEFAULT NULL,
  `trang_thai` enum('cho_duyet','hoan_thanh') DEFAULT 'cho_duyet',
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_tro`
--

INSERT INTO `tai_tro` (`id`, `ho_ten`, `sdt`, `email`, `hinh_thuc`, `loi_nhan`, `ma_giao_dich`, `trang_thai`, `ngay_tao`) VALUES
(1, 'pham the ngoc', '035415654', 'ngocne123@gmail.com', 'thiet_bi', '', NULL, 'hoan_thanh', '2026-08-25 03:20:29'),
(2, 'hihi', '0121165152', 'thengoc@gmail.com', '', 'xin duoc ho tro', NULL, '', '2026-08-25 11:03:39'),
(3, 'gdfg', '035415455', 'thengoc@gmail.com', '', '', NULL, '', '2026-08-26 03:48:17'),
(4, 'gdfg', '0865357517', 'thengoc2605@gmail.com', '', '', 'TT0865357517', '', '2026-08-26 04:02:24'),
(5, 'gdfg', '03541545', 'thengoc@gmail.com', '', '', NULL, '', '2026-08-26 04:04:04'),
(10, 'pham the', '0865357517', 'thengoc2605@gmail.com', 'thiet_bi', 'Hỗ trợ nhiệt tình', 'TT0865357517_178774205318', '', '2026-08-26 11:00:53'),
(11, 'pham the ngoc', '0865357517', 'thengoc2605@gmail.com', 'tien_mat', '', 'TT0865357517_178774207470', '', '2026-08-26 11:01:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanh_vien_nhom`
--

CREATE TABLE `thanh_vien_nhom` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `chuc_vu` varchar(100) NOT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `tieu_su` text DEFAULT NULL,
  `thu_tu` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanh_vien_nhom`
--

INSERT INTO `thanh_vien_nhom` (`id`, `ho_ten`, `chuc_vu`, `anh_dai_dien`, `tieu_su`, `thu_tu`) VALUES
(1, 'Trần Thế Ngọc', 'Trưởng Nhóm Dự Án', NULL, 'Quản lý chung và định hướng chiến lược phát triển sản phẩm AI.', 1),
(2, 'Đội Ngũ Kỹ Thuật AI', 'Phát Triển Mô Hình', NULL, 'Nghiên cứu và tối ưu hóa mô hình nhận dạng giọng nói yếu thế.', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tien_trinh`
--

CREATE TABLE `tien_trinh` (
  `id` int(11) NOT NULL,
  `giai_doan` varchar(50) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `thu_tu` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tien_trinh`
--

INSERT INTO `tien_trinh` (`id`, `giai_doan`, `tieu_de`, `mo_ta`, `thu_tu`) VALUES
(1, '01/2026', 'Khởi chạy dự án THANH ÂM', 'Nghiên cứu bài toán giao tiếp cho học sinh khiếm thanh tại Tiền Giang.', 1),
(2, '02/2026', 'Thử nghiệm tại Trường KT Nhân Ái', 'Triển khai mô hình AI nhận diện giọng nói thử nghiệm đợt 1.', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_nang`
--

CREATE TABLE `tinh_nang` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `bieu_tuong` varchar(100) DEFAULT NULL,
  `tom_tat` text DEFAULT NULL,
  `chi_tiet` text DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh_nang`
--

INSERT INTO `tinh_nang` (`id`, `tieu_de`, `bieu_tuong`, `tom_tat`, `chi_tiet`, `trang_thai`) VALUES
(1, 'Chuyển đổi Giọng nói AI', 'fa-microphone-lines', 'Dịch ngôn ngữ không chuẩn của trẻ em/người khuyết tật thành văn bản chuẩn xác.', NULL, 1),
(2, 'Giao tiếp 1 Chạm', 'fa-hand-pointer', 'Thẻ từ vựng biểu cảm giúp người yếu thế truyền đạt nhu cầu tức thì.', NULL, 1),
(3, 'Cảnh báo Khẩn cấp SOS', 'fa-triangle-exclamation', 'Gửi vị trí và thông điệp cứu hộ khẩn cấp chỉ với 1 nút bấm.', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truyen_thong`
--

CREATE TABLE `truyen_thong` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `loai_tin` enum('tin_tuc','video','giai_thuong') DEFAULT 'tin_tuc',
  `duong_dan_lien_ket` varchar(255) NOT NULL,
  `ten_nguon` varchar(100) DEFAULT NULL,
  `ngay_dang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `truyen_thong`
--

INSERT INTO `truyen_thong` (`id`, `tieu_de`, `loai_tin`, `duong_dan_lien_ket`, `ten_nguon`, `ngay_dang`) VALUES
(1, 'Giải pháp AI hỗ trợ trẻ em yếu thế Tiền Giang', 'tin_tuc', 'https://example.com/baiet-viet', 'Báo Trẻ', '2026-02-15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cau_chuyen`
--
ALTER TABLE `cau_chuyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi_so_tac_dong`
--
ALTER TABLE `chi_so_tac_dong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_chi_so` (`ma_chi_so`);

--
-- Chỉ mục cho bảng `chung_nhan`
--
ALTER TABLE `chung_nhan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_chung_nhan` (`ma_chung_nhan`);

--
-- Chỉ mục cho bảng `chuong_trinh`
--
ALTER TABLE `chuong_trinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `doi_tac`
--
ALTER TABLE `doi_tac`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dong_hanh_chien_luoc`
--
ALTER TABLE `dong_hanh_chien_luoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giao_dich_ngan_hang`
--
ALTER TABLE `giao_dich_ngan_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- Chỉ mục cho bảng `quyen_gop`
--
ALTER TABLE `quyen_gop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_chung_nhan` (`ma_chung_nhan`),
  ADD KEY `chuong_trinh_id` (`chuong_trinh_id`);

--
-- Chỉ mục cho bảng `tai_lieu`
--
ALTER TABLE `tai_lieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tai_tro`
--
ALTER TABLE `tai_tro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_giao_dich` (`ma_giao_dich`);

--
-- Chỉ mục cho bảng `thanh_vien_nhom`
--
ALTER TABLE `thanh_vien_nhom`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tien_trinh`
--
ALTER TABLE `tien_trinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinh_nang`
--
ALTER TABLE `tinh_nang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `truyen_thong`
--
ALTER TABLE `truyen_thong`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cau_chuyen`
--
ALTER TABLE `cau_chuyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chi_so_tac_dong`
--
ALTER TABLE `chi_so_tac_dong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chung_nhan`
--
ALTER TABLE `chung_nhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chuong_trinh`
--
ALTER TABLE `chuong_trinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `doi_tac`
--
ALTER TABLE `doi_tac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dong_hanh_chien_luoc`
--
ALTER TABLE `dong_hanh_chien_luoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `giao_dich_ngan_hang`
--
ALTER TABLE `giao_dich_ngan_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `quyen_gop`
--
ALTER TABLE `quyen_gop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tai_lieu`
--
ALTER TABLE `tai_lieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tai_tro`
--
ALTER TABLE `tai_tro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `thanh_vien_nhom`
--
ALTER TABLE `thanh_vien_nhom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tien_trinh`
--
ALTER TABLE `tien_trinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tinh_nang`
--
ALTER TABLE `tinh_nang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `truyen_thong`
--
ALTER TABLE `truyen_thong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `quyen_gop`
--
ALTER TABLE `quyen_gop`
  ADD CONSTRAINT `fk_quyen_gop_chuong_trinh` FOREIGN KEY (`chuong_trinh_id`) REFERENCES `chuong_trinh` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
