-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 01, 2026 lúc 02:10 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS `giai_phap_tinh_nang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(150) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `bieu_tuong` varchar(100) DEFAULT 'fa-lightbulb',
  `nhan` varchar(100) DEFAULT NULL,
  `tom_tat` text DEFAULT NULL,
  `noi_dung` mediumtext NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `thu_tu` int(11) NOT NULL DEFAULT 0,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_cap_nhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_giai_phap_slug` (`slug`),
  KEY `idx_giai_phap_thu_tu` (`thu_tu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `giai_phap_tinh_nang` (`slug`, `tieu_de`, `bieu_tuong`, `nhan`, `tom_tat`, `noi_dung`, `video`, `trang_thai`, `thu_tu`) VALUES
('nhap-van-ban', 'Nhập văn bản & phát giọng', 'fa-keyboard', 'Text to Speech', 'Nhập câu muốn nói và để hệ thống phát giọng tự nhiên theo ý muốn.', '<p>Người dùng nhập nội dung cần truyền đạt rồi phát bằng giọng đọc rõ ràng.</p><ol><li>Mở giao diện chính.</li><li>Nhập hoặc dán câu cần nói.</li><li>Nhấn nút phát.</li><li>Lưu câu thường dùng để phát lại nhanh.</li></ol>', 'tinhnang1.mp4', 1, 1),
('goi-y-nhanh', 'Gợi ý nhanh', 'fa-bolt', 'Quick Suggest', 'Hiển thị các câu gợi ý nhanh phù hợp với nhu cầu giao tiếp tức thời.', '<p>Hệ thống đề xuất câu nói phổ biến theo ngữ cảnh, giúp người dùng phản hồi nhanh hơn.</p><ol><li>Mở mục gợi ý nhanh.</li><li>Xem câu theo tình huống.</li><li>Chọn câu muốn phát.</li><li>Chỉnh sửa nếu cần.</li></ol>', 'tinhnang2.mp4', 1, 2),
('ghi-am', 'Ghi âm', 'fa-microphone', 'Voice Recording', 'Ghi lại giọng nói, lưu trữ và phát lại khi cần.', '<p>Ghi âm giúp người dùng lưu lại đoạn nói, nghe lại và luyện tập giao tiếp.</p><ol><li>Nhấn nút ghi âm.</li><li>Nói nội dung muốn lưu.</li><li>Dừng ghi âm.</li><li>Nghe lại và lưu trữ.</li></ol>', 'tinhnang3.mp4', 1, 3),
('ca-nhan-hoa', 'Cá nhân hóa', 'fa-sliders', 'Personalize', 'Điều chỉnh giọng nói, tốc độ và cách hiển thị theo từng người dùng.', '<p>Người dùng thiết lập giọng nói, tốc độ phát âm, từ vựng và giao diện phù hợp.</p><ol><li>Mở phần cài đặt.</li><li>Chọn giọng đọc và tốc độ.</li><li>Chỉnh sửa từ vựng.</li><li>Lưu cấu hình.</li></ol>', 'tinhnang4.mp4', 1, 4),
('sua-chinh-ta', 'Sửa lỗi chính tả', 'fa-spell-check', 'Grammar Fix', 'Tự động phát hiện lỗi ngữ pháp và chính tả trước khi phát âm.', '<p>Hỗ trợ viết đúng, rõ ràng và hạn chế hiểu nhầm khi câu được đọc to.</p><ol><li>Nhập câu cần soạn thảo.</li><li>Xem gợi ý sửa lỗi.</li><li>Chọn từ đúng.</li><li>Phát câu đã chỉnh sửa.</li></ol>', 'tinhnang5.mp4', 1, 5),
('goi-y-ai', 'Đưa ra gợi ý từ AI', 'fa-brain', 'AI Suggestion', 'AI đề xuất câu trả lời phù hợp theo tình huống và ngữ cảnh.', '<p>AI phân tích ngữ cảnh và đề xuất câu trả lời ngắn gọn, tự nhiên, dễ phát âm.</p><ol><li>Bắt đầu hội thoại.</li><li>Xem đề xuất từ AI.</li><li>Chọn câu phù hợp.</li><li>Phát câu ngay.</li></ol>', 'tinhnang6.mp4', 1, 6),
('ghi-nho-cau', 'Ghi nhớ câu nói hay dùng', 'fa-bookmark', 'Favorite Phrase', 'Lưu lại những câu hay dùng để phát ngay khi cần.', '<p>Các câu quen thuộc được lưu lại để người dùng phát nhanh mà không phải gõ lại.</p><ol><li>Chọn câu muốn lưu.</li><li>Nhấn đánh dấu yêu thích.</li><li>Mở thư viện câu nói.</li><li>Phát nhanh khi cần.</li></ol>', 'tinhnang7.mp4', 1, 7),
('chu-de-va-luu', 'Tạo chủ đề & lưu câu thường ngày', 'fa-folder-plus', 'Topic Library', 'Tạo danh mục chủ đề riêng và lưu câu nói theo từng nhóm.', '<p>Sắp xếp câu nói theo gia đình, trường học, bệnh viện hoặc mua sắm để dễ tìm và sử dụng.</p><ol><li>Tạo chủ đề mới.</li><li>Thêm câu nói vào chủ đề.</li><li>Phân loại theo hoàn cảnh.</li><li>Mở chủ đề để phát nhanh.</li></ol>', 'tinhnang8.mp4', 1, 8),
('tinh-nang-9', 'SOS – Hỗ trợ khẩn cấp', 'fa-triangle-exclamation', 'Emergency SOS', 'Hỗ trợ liên hệ người thân, bạn bè hoặc người giám hộ trong trường hợp khẩn cấp.', '<p>Tạo thêm một lớp hỗ trợ an toàn cho người khó có thể tự giao tiếp hoặc gọi trợ giúp theo cách thông thường.</p><ol><li>Chọn chức năng SOS.</li><li>Thêm số điện thoại vào danh bạ khẩn cấp.</li><li>Hệ thống lưu danh sách liên hệ.</li><li>Bấm nút SOS khi gặp nguy hiểm.</li><li>Gửi SMS kèm thông tin vị trí.</li><li>Lần lượt gọi các liên hệ đã lưu.</li><li>Nếu không ai bắt máy, có thể liên hệ 113, 114 hoặc 115.</li></ol>', 'tinhnang9.mp4', 1, 9),
('lich-su-hoi-thoai', 'Lịch sử hội thoại', 'fa-clock-rotate-left', 'Conversation History', 'Xem lại các cuộc trò chuyện và câu nói đã dùng trước đó.', '<p>Người dùng có thể tìm lại câu nói, theo dõi quá trình trao đổi và phát lại nội dung quan trọng.</p><ol><li>Mở phần lịch sử hội thoại.</li><li>Chọn cuộc trò chuyện.</li><li>Phát lại nếu cần.</li><li>Tìm kiếm theo thời gian hoặc chủ đề.</li></ol>', 'tinhnang10.mp4', 1, 10),
('goi-vip', 'Gói VIP', 'fa-crown', 'Premium Access', 'Mở khóa trải nghiệm cao cấp với quyền truy cập mở rộng.', '<p>Gói VIP cung cấp thêm dung lượng lưu trữ, quyền truy cập nâng cao và trải nghiệm tùy chỉnh sâu hơn.</p><ol><li>Chọn gói VIP.</li><li>Xem quyền lợi.</li><li>Kích hoạt gói.</li><li>Sử dụng các tính năng cao cấp.</li></ol>', 'tinhnang11.mp4', 1, 11);

-- Cấu trúc bảng cho bảng `lo_trinh_phat_trien`
CREATE TABLE IF NOT EXISTS `lo_trinh_phat_trien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_thu_tu` int(11) NOT NULL DEFAULT 1,
  `thoi_gian` varchar(100) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL,
  `la_hien_tai` tinyint(1) NOT NULL DEFAULT 0,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_cap_nhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_lo_trinh_thu_tu` (`so_thu_tu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `lo_trinh_phat_trien` (`so_thu_tu`, `thoi_gian`, `tieu_de`, `mo_ta`, `la_hien_tai`)
SELECT 1, 'Giai đoạn 1 · 06/2025 - 08/2025', 'Hình thành và xây dựng sản phẩm', 'THANH ÂM bắt đầu hành trình từ những bước đầu tiên trong việc xây dựng, học hỏi và nghiên cứu công nghệ.', 0
WHERE NOT EXISTS (SELECT 1 FROM `lo_trinh_phat_trien`);
INSERT INTO `lo_trinh_phat_trien` (`so_thu_tu`, `thoi_gian`, `tieu_de`, `mo_ta`, `la_hien_tai`)
SELECT 2, 'Giai đoạn 2 · 08/2025 - 10/2025', 'Hoàn thiện bản thử nghiệm và kiểm chứng thực tế', 'Hoàn thiện phiên bản thử nghiệm đầu tiên, đưa vào sử dụng thực tế và thu thập phản hồi.', 0
WHERE NOT EXISTS (SELECT 1 FROM `lo_trinh_phat_trien` WHERE `so_thu_tu` = 2);
INSERT INTO `lo_trinh_phat_trien` (`so_thu_tu`, `thoi_gian`, `tieu_de`, `mo_ta`, `la_hien_tai`)
SELECT 3, 'Giai đoạn 3 · 10/2025 - 12/2025', 'Bước ra đấu trường cấp trường', 'Trình bày sản phẩm, câu chuyện và giá trị xã hội trước hội đồng chuyên môn.', 0
WHERE NOT EXISTS (SELECT 1 FROM `lo_trinh_phat_trien` WHERE `so_thu_tu` = 3);
INSERT INTO `lo_trinh_phat_trien` (`so_thu_tu`, `thoi_gian`, `tieu_de`, `mo_ta`, `la_hien_tai`)
SELECT 4, 'Giai đoạn 4 · 12/2025 - 02/2026', 'Cải thiện và nâng cấp sản phẩm', 'Rà soát tính năng, hoàn thiện trải nghiệm người dùng và củng cố nền tảng công nghệ.', 0
WHERE NOT EXISTS (SELECT 1 FROM `lo_trinh_phat_trien` WHERE `so_thu_tu` = 4);
INSERT INTO `lo_trinh_phat_trien` (`so_thu_tu`, `thoi_gian`, `tieu_de`, `mo_ta`, `la_hien_tai`)
SELECT 5, 'Giai đoạn 5 · 02/2026 - 05/2026', 'Vươn ra đấu trường cấp thành phố', 'Mở rộng phạm vi cạnh tranh, tiếp cận chuyên gia và được ghi nhận tại INNOX 2026.', 0
WHERE NOT EXISTS (SELECT 1 FROM `lo_trinh_phat_trien` WHERE `so_thu_tu` = 5);
INSERT INTO `lo_trinh_phat_trien` (`so_thu_tu`, `thoi_gian`, `tieu_de`, `mo_ta`, `la_hien_tai`)
SELECT 6, 'Giai đoạn 6 · 05/2026 - Hiện tại & Tương lai', 'Hoàn thiện và phát triển bền vững', 'Tiếp tục nâng cấp sản phẩm, mở rộng khả năng ứng dụng thực tế và hướng đến thị trường Đông Nam Á.', 1
WHERE NOT EXISTS (SELECT 1 FROM `lo_trinh_phat_trien` WHERE `so_thu_tu` = 6);


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
(2, 'partners', 'Đơn vị đồng hành', 1, ''),
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
  `loai_ho_tro` varchar(100) DEFAULT 'thiết bị',
  `so_co_thiet_bi` int(11) DEFAULT 0,
  `so_chua_thiet_bi` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuong_trinh`
--

INSERT INTO `chuong_trinh` (`id`, `tieu_de`, `dia_diem`, `thoi_gian`, `don_vi_thu_huong`, `don_vi_tai_tro`, `chi_tieu_so_luong`, `so_luong_hien_tai`, `trang_thai`, `mo_ta`, `ngay_tao`, `don_vi_to_chuc`, `don_vi_dong_hanh`, `don_vi_bao_tro`, `doi_tuong_ho_tro`, `loai_ho_tro`, `so_co_thiet_bi`, `so_chua_thiet_bi`) VALUES
(1, 'Trao quà tặng tại Trường KT Nhân Ái', 'Mỹ Tho, Tiền Giang', '30/9/2026', 'Trường Khuyết tật Nhân Ái', NULL, 100, 60, 'da_hoan_thanh', '', '2026-08-21 09:13:27', 'Dự án Thanh Âm', 'Thanh Âm - ĐH Tiền Giang - Trường KT', 'ĐH Tiền Giang', 'Học sinh khó khăn', 'Sách vở', 20, 40),
(2, 'hsdjkfdm', 'Trường Khuyết Tật Nhân Ái tỉnh Đồng Tháp', '28/8/2026', 'Học sinh Trường Khuyết Tật Nhân Ái', NULL, 35, 20, 'da_hoan_thanh', 'Kêu gọi quyên góp điện thoại cũ/mới còn dùng tốt.', '2026-08-21 09:13:27', 'Dự án Thanh Âm', 'Thanh Âm - ĐH Tiền Giang - Trường KT', 'ĐH Tiền Giang', 'Học sinh khó khăn', 'thiết bị', 15, 35),
(3, 'Trao thanh âm - Tặng tương lai', 'Mỹ Tho, Tiền Giang', '30/9/2026', 'Học sinh yếu thế', NULL, 100, 80, 'dang_dien_ra', 'Cho các em vượt khó', '2026-09-01 02:26:37', 'Dự án Thanh Âm', 'Thanh Âm - ĐH TG - Trường KT', 'ĐH Tiền Giang', 'Học sinh khó khăn', 'Sách vở', 50, 40);

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
(7, 'Nguyễn Thanh Trà', 'CTTNHH 1 thành viên', '0986532476', '1tv.haha@gmail.com', 'GÓI 03 – ĐỐI TÁC CHIẾN LƯỢC', '2026-08-26 11:29:13'),
(8, 'truc', 'truc', '035455478', 'truc@gmail.com', 'GÓI 02 – LAN TỎA', '2026-08-31 12:10:25');

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
(12, 'Nguyễn Thị Trúc Mai', '0983547815', 'mai123@gmail.com', 'thiet_bi', 'Hỗ trợ', 'TT0983547815_178774368415', '', '2026-08-26 11:28:04');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `doi_tac`
--
ALTER TABLE `doi_tac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dong_hanh_chien_luoc`
--
ALTER TABLE `dong_hanh_chien_luoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
