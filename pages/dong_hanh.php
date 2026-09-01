<?php
// Include Header đã có sẵn
include_once '../includes/header.php';
require_once '../connect.php';

// ==========================================================
// 1. Lấy thông tin chương trình ĐANG DIỄN RA mới nhất (Tab Tài trợ)
// ==========================================================
$stmt = $pdo->query("SELECT * FROM chuong_trinh WHERE trang_thai = 'dang_dien_ra' ORDER BY id DESC LIMIT 1");
$ct = $stmt->fetch(PDO::FETCH_ASSOC);

// Nếu không tìm thấy chương trình nào, gán mảng rỗng để tránh lỗi
if (!$ct) {
    $ct = [];
}

// Tính toán tự động số lượng cần hỗ trợ thêm
$chi_tieu = (int)($ct['chi_tieu_so_luong'] ?? 0);
$da_ho_tro = (int)($ct['so_luong_hien_tai'] ?? 0);
$can_ho_tro_them = max(0, $chi_tieu - $da_ho_tro);

// Loại hình hỗ trợ do Admin tự nhập (thiết bị / quà / tiền mặt / xe lăn...)
// Mặc định là "thiết bị" nếu Admin chưa cập nhật
$loai_ho_tro = !empty($ct['loai_ho_tro']) ? $ct['loai_ho_tro'] : 'thiết bị';

// ==========================================================
// 2. Lấy danh sách chương trình ĐÃ HOÀN THÀNH (Tab Lịch sử triển khai)
//    -> Khi Admin bấm "Xác nhận hoàn thành" ở trang sua_chuong_trinh.php,
//       chương trình sẽ tự động chuyển trang_thai = 'da_hoan_thanh' và
//       xuất hiện ở đây cho khách xem.
// ==========================================================
$stmt_ls = $pdo->query("SELECT * FROM chuong_trinh WHERE trang_thai = 'da_hoan_thanh' ORDER BY id DESC");
$ds_lich_su = $stmt_ls->fetchAll(PDO::FETCH_ASSOC);

// ==========================================================
// 3. Lấy chỉ số Báo cáo tác động (hiển thị NGAY ĐẦU TRANG)
// ==========================================================
$stmt_cs = $pdo->query("SELECT * FROM chi_so_tac_dong ORDER BY id ASC");
$ds_chi_so = $stmt_cs->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Link đến file CSS (đã gộp toàn bộ style của trang Tác động vào đây) -->
<link rel="stylesheet" href="../assets/css/donghanh.css">

<main class="donghanh-container">

    <!-- Hero Header Banner -->
    <section class="dh-hero">
        <h1>ĐỒNG HÀNH CÙNG THANH ÂM</h1>
        <p>Hệ thống AI hỗ trợ giao tiếp cho người yếu thế — Trao tiếng nói, Chạm trái tim</p>
    </section>

    <!-- ==================== BÁO CÁO TÁC ĐỘNG (Đặt đầu trang) ==================== -->
    <section id="baocao-tac-dong" class="td-box" style="margin-bottom:35px;">
        <div style="text-align:center; margin-bottom:15px;">
            <h2 style="color:#0a2158; font-size:1.5rem; margin-bottom:6px;">THANH ÂM ĐÃ HỖ TRỢ</h2>
            <p style="color:#64748b; font-size:0.95rem; margin:0;">Những con số tác động xã hội thực tế từ dự án</p>
        </div>

        <div class="td-quote" style="margin-top:0;">
            Thanh Âm tin rằng: "Dù mỗi người có một hoàn cảnh khác nhau, nhưng ai cũng xứng đáng được lắng nghe."
        </div>

        <?php if (!empty($ds_chi_so)): ?>
        <div class="stats-grid">
            <?php foreach ($ds_chi_so as $cs): ?>
            <div class="stat-card">
                <div class="stat-number"><?= (int)$cs['gia_tri'] ?></div>
                <div class="stat-label"><?= htmlspecialchars($cs['ten_chi_so']) ?></div>
                <?php if (!empty($cs['mo_ta_phu'])): ?>
                <div class="stat-detail"><?= htmlspecialchars($cs['mo_ta_phu']) ?></div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <p style="text-align:center; color:#94a3b8; padding:20px 0;">Đang cập nhật số liệu tác động...</p>
        <?php endif; ?>
    </section>

    <!-- Nút chọn 3 chế độ (Thêm style inline để chia 3 cột đều nhau) -->
    <div class="dh-tabs-main"
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 15px; margin-bottom: 30px;">
        <div class="dh-tab-card active" id="btn-tab-taitro" onclick="switchDHTab('taitro')">
            <h2> TÀI TRỢ CHƯƠNG TRÌNH</h2>
            <p>"Quý Doanh nghiệp/Nhà tài trợ muốn tài trợ cho chương trình đang diễn ra"</p>
        </div>
        <div class="dh-tab-card" id="btn-tab-donghanh" onclick="switchDHTab('donghanh')">
            <h2> ĐỒNG HÀNH CHIẾN LƯỢC</h2>
            <p>"Quý Doanh nghiệp/Nhà tài trợ muốn hợp tác đồng hành cùng Thanh Âm"</p>
        </div>
        <div class="dh-tab-card" id="btn-tab-lichsu" onclick="switchDHTab('lichsu')">
            <h2> LỊCH SỬ TRIỂN KHAI</h2>
            <p>"Xem lại hành trình và các chương trình Thanh Âm đã thực hiện"</p>
        </div>
    </div>

    <!-- ==================== NỘI DUNG TAB 1: TÀI TRỢ ==================== -->
    <div id="content-taitro">
        <div class="dh-grid-2">

            <!-- Cột trái: Thông tin chương trình -->
            <div class="dh-box">
                <div class="dh-box-title"> THÔNG TIN CHƯƠNG TRÌNH HỖ TRỢ</div>
                <div class="info-list-item">
                    <strong>Chương trình:</strong>
                    <span><?= htmlspecialchars($ct['tieu_de'] ?? 'Đang cập nhật') ?></span>
                </div>
                <div class="info-list-item">
                    <strong>Địa điểm tổ chức:</strong>
                    <span><?= htmlspecialchars($ct['dia_diem'] ?? 'Đang cập nhật') ?></span>
                </div>
                <div class="info-list-item">
                    <strong>Thời gian:</strong>
                    <span><?= htmlspecialchars($ct['thoi_gian'] ?? 'Đang cập nhật') ?></span>
                </div>
                <div class="info-list-item">
                    <strong>Đơn vị tổ chức:</strong>
                    <span><?= htmlspecialchars($ct['don_vi_to_chuc'] ?? 'Dự án Thanh Âm') ?></span>
                </div>
                <div class="info-list-item">
                    <strong>Đơn vị đồng hành:</strong>
                    <span><?= htmlspecialchars($ct['don_vi_dong_hanh'] ?? 'Chưa có') ?></span>
                </div>
                <div class="info-list-item">
                    <strong>Đơn vị thụ hưởng:</strong>
                    <span><?= htmlspecialchars($ct['don_vi_thu_huong'] ?? 'Đang cập nhật') ?></span>
                </div>
                <div class="info-list-item">
                    <strong>Đơn vị bảo trợ:</strong>
                    <span><?= htmlspecialchars($ct['don_vi_bao_tro'] ?? 'Đang cập nhật') ?></span>
                </div>
                <div class="info-list-item">
                    <strong>Đối tượng hỗ trợ:</strong>
                    <span><?= htmlspecialchars($ct['doi_tuong_ho_tro'] ?? 'Đang cập nhật') ?></span>
                </div>
                <div class="info-list-item">
                    <strong>Số người đã có <?= htmlspecialchars($loai_ho_tro) ?>:</strong>
                    <span><?= (int)($ct['so_co_thiet_bi'] ?? 0) ?> trẻ</span>
                </div>
                <div class="info-list-item">
                    <strong>Số người chưa có <?= htmlspecialchars($loai_ho_tro) ?>:</strong>
                    <span><?= (int)($ct['so_chua_thiet_bi'] ?? 0) ?> trẻ</span>
                </div>
                <div class="info-list-item">
                    <strong>Số người đã được hỗ trợ:</strong> <span><?= $da_ho_tro ?> trẻ</span>
                </div>
                <div class="info-list-item" style="border:none;">
                    <strong style="color:#c8115f;">Số người cần hỗ trợ thêm:</strong> <span
                        style="color:#c8115f; font-weight:bold;"><?= $can_ho_tro_them ?> trẻ</span>
                </div>
            </div>

            <!-- Cột phải: Form Tài trợ -->
            <div class="dh-box">
                <div class="dh-box-title"> ĐĂNG KÝ ĐỒNG HÀNH TÀI TRỢ</div>
                <form id="form-tai-tro" onsubmit="submitFormTaiTro(event)">
                    <div class="dh-form-group">
                        <label>1. Họ và Tên / Tên Đơn vị *</label>
                        <input type="text" name="ho_ten" required placeholder="Nhập họ tên hoặc tên tổ chức">
                    </div>
                    <div class="dh-form-group">
                        <label>2. Số điện thoại *</label>
                        <input type="tel" name="sdt" required placeholder="Nhập số điện thoại liên hệ">
                    </div>
                    <div class="dh-form-group">
                        <label>3. Email *</label>
                        <input type="email" name="email" required placeholder="Nhập địa chỉ Email">
                    </div>
                    <div class="dh-form-group">
                        <label>4. Hình thức hỗ trợ *</label>
                        <select id="hinh-thuc-ho-tro" name="hinh_thuc" onchange="toggleHinhThucTaiTro(this.value)">
                            <option value="tien_mat">Tiền (Chuyển khoản / Mã QR)</option>
                            <option value="thiet_bi">Thiết bị (Máy tính bảng / Điện thoại Android)</option>
                        </select>
                    </div>
                    <div class="dh-form-group">
                        <label>5. Lời nhắn / Nội dung hỗ trợ</label>
                        <textarea name="loi_nhan" rows="3"
                            placeholder="Nhập ghi chú hoặc nội dung hỗ trợ..."></textarea>
                    </div>

                    <!-- Khung QR hiển thị khi chọn Tiền -->
                    <div id="qr-bank-box" class="qr-container active">
                        <strong>Thông tin khoản ủng hộ:</strong>
                        <p style="font-size:0.88rem; margin: 4px 0;">Ngân hàng: <strong>VietinBank</strong></p>
                        <p style="font-size:0.88rem; margin: 4px 0;">STK: <strong>101881199507</strong> - Chủ TK:
                            <strong>DU AN THANH AM</strong>
                        </p>
                        <img src="https://img.vietqr.io/image/VietinBank-101881199507-compact.png?accountName=DU%20AN%20THANH%20AM"
                            alt="Mã QR Chuyển khoản"
                            style="max-width: 180px; height: auto; margin: 10px 0; border-radius: 8px;">
                        <p style="font-size:0.78rem; color:#64748b;">*Vui lòng chuyển khoản với nội dung: <strong>TT[Số
                                điện thoại]</strong> (Ví dụ: TT0912991489) để hệ thống tự động xác nhận.</p>
                    </div>

                    <button type="submit" id="btn-submit-tt" class="btn-submit-dh"> XÁC NHẬN TÀI TRỢ</button>
                </form>
            </div>

        </div>
    </div>

    <!-- ==================== NỘI DUNG TAB 2: ĐỒNG HÀNH ==================== -->
    <div id="content-donghanh" style="display: none;">

        <div
            style="background:#f8fafc; border-left:4px solid #144fb0; padding:15px 20px; margin-bottom:25px; border-radius:0 10px 10px 0;">
            <p style="margin:0; font-style:italic; color:#334155;">
                "Trân trọng kính mời Quý Doanh nghiệp / Quý Nhà tài trợ dành thời gian tìm hiểu Hồ sơ THANH ÂM để hiểu
                rõ hơn về dự án, định hướng và cơ hội đồng hành."
            </p>
        </div>

        <!-- Khung xem Hồ sơ & Chọn gói -->
        <div class="dh-box" style="margin-bottom:30px;">
            <div class="dh-box-title">1. TÌM HIỂU HỒ SƠ & CHỌN GÓI HỢP TÁC</div>
            <p style="font-size:0.92rem; color:#4b5163;">Quý vị có thể xem trực tuyến hoặc tải về bộ Hồ sơ dự án bên
                dưới:</p>

            <div style="display:flex; gap:15px; flex-wrap:wrap; margin-bottom:25px;">
                <a href="#" class="btn-submit-dh"
                    style="width:auto; padding:8px 20px; font-size:0.88rem; background:#0a2158; text-decoration:none;">
                    Hồ sơ hợp tác chi tiết (PDF)</a>
                <a href="#" class="btn-submit-dh"
                    style="width:auto; padding:8px 20px; font-size:0.88rem; background:#144fb0; text-decoration:none;">
                    Slide Hồ sơ trình chiếu</a>
                <a href="#" class="btn-submit-dh"
                    style="width:auto; padding:8px 20px; font-size:0.88rem; background:#d9a441; text-decoration:none;">
                    Hồ sơ CSR Dự án</a>
            </div>

            <p style="font-weight:700; color:#0a2158; margin-bottom:10px;">Lựa chọn gói hợp tác đồng hành cùng THANH ÂM:
            </p>
            <div class="packages-grid">
                <div class="package-card" onclick="selectPackage(this, 'GÓI 01 – TIA SÁNG')">
                    <h4>GÓI 01 – TIA SÁNG</h4>
                    <p style="font-size:0.8rem; color:#64748b;">Đồng hành hỗ trợ trải nghiệm công nghệ AI cho trẻ em</p>
                </div>
                <div class="package-card" onclick="selectPackage(this, 'GÓI 02 – LAN TỎA')">
                    <h4>GÓI 02 – LAN TỎA</h4>
                    <p style="font-size:0.8rem; color:#64748b;">Đồng hành truyền thông & hỗ trợ quy mô trường học</p>
                </div>
                <div class="package-card" onclick="selectPackage(this, 'GÓI 03 – ĐỐI TÁC CHIẾN LƯỢC')">
                    <h4>GÓI 03 – ĐỐI TÁC CHIẾN LƯỢC</h4>
                    <p style="font-size:0.8rem; color:#64748b;">Bảo trợ toàn diện & Đồng phát triển tác động xã hội</p>
                </div>
            </div>
            <input type="hidden" id="selected-package-val" name="goi_hop_tac" value="">
        </div>

        <!-- Khung 2 cột: Form liên hệ & Thông tin Thanh Âm -->
        <div class="dh-grid-2">
            <div class="dh-box">
                <div class="dh-box-title">2. THÔNG TIN ĐỐI TÁC ĐĂNG KÝ</div>
                <form id="form-dong-hanh" onsubmit="submitFormDongHanh(event)">
                    <div class="dh-form-group">
                        <label>Họ và tên người đại diện *</label>
                        <input type="text" name="ho_ten" required placeholder="Nhập họ tên">
                    </div>
                    <div class="dh-form-group">
                        <label>Tên Doanh nghiệp / Đơn vị *</label>
                        <input type="text" name="ten_dn" required placeholder="Nhập tên doanh nghiệp hoặc tổ chức">
                    </div>
                    <div class="dh-form-group">
                        <label>Số điện thoại *</label>
                        <input type="tel" name="sdt" required placeholder="Nhập số điện thoại">
                    </div>
                    <div class="dh-form-group">
                        <label>Email *</label>
                        <input type="email" name="email" required placeholder="Nhập Email">
                    </div>
                    <button type="submit" id="btn-submit-dh" class="btn-submit-dh"> XÁC NHẬN GỬI THÔNG TIN</button>
                </form>
            </div>

            <!-- Cột thông tin Thanh Âm -->
            <div class="dh-box" style="background:#f8fafc;">
                <div class="dh-box-title"> THÔNG TIN LIÊN HỆ THANH ÂM</div>
                <p style="font-size:0.92rem; color:#4b5163; line-height:1.7;">
                    Quý Đối tác có thể trao đổi trực tiếp với ban điều hành dự án Thanh Âm qua các kênh sau:
                </p>
                <div style="margin-top:20px; font-size:0.93rem; line-height:2;">
                    <p style="margin:0;">📞 <strong>Hotline:</strong> 0865357517</p>
                    <p style="margin:0;">💬 <strong>Zalo:</strong> 0912991489</p>
                    <p style="margin:0;">✉️ <strong>Email:</strong> thanham.vfy@gmail.com</p>
                    <p style="margin:0;">🌐 <strong>Website:</strong> thanham.vn</p>
                    <p style="margin:0;"> facebook.com/thanham.vfy</p>
                </div>
            </div>
        </div>

    </div>

    <!-- ==================== NỘI DUNG TAB 3: LỊCH SỬ TRIỂN KHAI (Dữ liệu động từ DB) ==================== -->
    <div id="content-lichsu" style="display: none;">
        <div class="td-quote">
            Thanh Âm tin rằng: "Dù mỗi người có một hoàn cảnh khác nhau, nhưng ai cũng xứng đáng được lắng nghe."
        </div>

        <?php if (!empty($ds_lich_su)): ?>
        <?php foreach ($ds_lich_su as $ls): ?>
        <div class="history-card" style="grid-template-columns: 1fr;">
            <div class="history-info">
                <h3 style="color:#0a2158; margin-top:0;"><?= htmlspecialchars($ls['tieu_de']) ?></h3>

                <?php if (!empty($ls['dia_diem'])): ?>
                <p><strong>Địa điểm tổ chức:</strong> <?= htmlspecialchars($ls['dia_diem']) ?></p>
                <?php endif; ?>

                <?php if (!empty($ls['thoi_gian'])): ?>
                <p><strong>Thời gian:</strong> <?= htmlspecialchars($ls['thoi_gian']) ?></p>
                <?php endif; ?>

                <p><strong>Đơn vị tổ chức:</strong> <?= htmlspecialchars($ls['don_vi_to_chuc'] ?: 'Dự án Thanh Âm') ?>
                </p>

                <?php if (!empty($ls['don_vi_dong_hanh'])): ?>
                <p><strong>Đơn vị đồng hành:</strong> <?= htmlspecialchars($ls['don_vi_dong_hanh']) ?></p>
                <?php endif; ?>

                <?php if (!empty($ls['don_vi_thu_huong'])): ?>
                <p><strong>Đơn vị thụ hưởng:</strong> <?= htmlspecialchars($ls['don_vi_thu_huong']) ?></p>
                <?php endif; ?>

                <?php if (!empty($ls['don_vi_bao_tro'])): ?>
                <p><strong>Đơn vị bảo trợ:</strong> <?= htmlspecialchars($ls['don_vi_bao_tro']) ?></p>
                <?php endif; ?>

                <?php if (!empty($ls['doi_tuong_ho_tro'])): ?>
                <p><strong>Đối tượng hỗ trợ:</strong> <?= htmlspecialchars($ls['doi_tuong_ho_tro']) ?></p>
                <?php endif; ?>

                <?php $loai_ls = !empty($ls['loai_ho_tro']) ? $ls['loai_ho_tro'] : 'thiết bị'; ?>
                <p><strong>Số lượng đã có <?= htmlspecialchars($loai_ls) ?>:</strong> <?= (int)$ls['so_co_thiet_bi'] ?>
                </p>
                <p><strong>Số lượng chưa có <?= htmlspecialchars($loai_ls) ?>:</strong>
                    <?= (int)$ls['so_chua_thiet_bi'] ?></p>
                <p><strong>Chỉ tiêu / Đã hỗ trợ:</strong> <?= (int)$ls['so_luong_hien_tai'] ?> /
                    <?= (int)$ls['chi_tieu_so_luong'] ?></p>

                <?php if (!empty($ls['mo_ta'])): ?>
                <p style="border:none; color:#c8115f; font-weight:bold; margin-top:10px;">
                    Tổng kết: <?= nl2br(htmlspecialchars($ls['mo_ta'])) ?>
                </p>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p style="text-align:center; color:#94a3b8; padding:40px 0;">
            Chưa có chương trình nào hoàn thành để hiển thị. Hãy quay lại sau nhé!
        </p>
        <?php endif; ?>
    </div>

</main>

<!-- ==================== MODAL LÁ THƯ CẢM ƠN ==================== -->
<div id="thankyou-modal" class="modal-overlay">
    <div class="letter-box">
        <h3> THƯ CẢM ƠN</h3>
        <p id="thankyou-message">
            Trân trọng cảm ơn Quý Đối tác / Quý Nhà tài trợ đã gửi thông tin đồng hành.<br><br>
            <strong>THANH ÂM sẽ sớm liên hệ trực tiếp với Quý Vị trong thời gian ngắn nhất!</strong>
        </p>
        <button class="btn-submit-dh" style="width:auto; padding:8px 30px;" onclick="closeModal()">Đóng lại</button>
    </div>
</div>

<!-- JavaScript Điều Hướng Trang & Xử Lý Gửi Dữ Liệu -->
<script>
// 1. Hàm chuyển 3 Tab (Tài trợ / Đồng hành / Lịch sử)
function switchDHTab(tab) {
    const tabs = ['taitro', 'donghanh', 'lichsu'];

    // Tắt tất cả tab và content
    tabs.forEach(t => {
        document.getElementById('btn-tab-' + t).classList.remove('active');
        document.getElementById('content-' + t).style.display = 'none';
    });

    // Bật tab và content được chọn
    document.getElementById('btn-tab-' + tab).classList.add('active');
    document.getElementById('content-' + tab).style.display = 'block';
}

// 2. Hàm ẩn/hiện mã QR khi chọn hình thức tài trợ
function toggleHinhThucTaiTro(val) {
    const qrBox = document.getElementById('qr-bank-box');
    if (val === 'tien_mat') {
        qrBox.classList.add('active');
    } else {
        qrBox.classList.remove('active');
    }
}

// 3. Hàm chọn Gói Hợp Tác
function selectPackage(element, packageName) {
    document.querySelectorAll('.package-card').forEach(el => el.classList.remove('selected'));
    element.classList.add('selected');
    document.getElementById('selected-package-val').value = packageName;
}

// 4. Xử lý submit Form Tài trợ
function submitFormTaiTro(e) {
    e.preventDefault();
    const btn = document.getElementById('btn-submit-tt');
    const originalText = btn.innerText;
    const hinhThuc = document.getElementById('hinh-thuc-ho-tro').value;

    btn.disabled = true;
    btn.innerText = "Đang xử lý...";

    const formData = new FormData(document.getElementById('form-tai-tro'));

    fetch('../modules/process-tai-tro.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            btn.disabled = false;
            btn.innerText = originalText;

            if (data.status === 'success') {
                let msg = hinhThuc === 'thiet_bi' ?
                    "Trân trọng cảm ơn tấm lòng hảo tâm tài trợ thiết bị của Quý vị!<br><br>Hệ thống đã ghi nhận thông tin và chúng tôi sẽ liên hệ với Quý vị trong thời gian sớm nhất." :
                    "Hệ thống đã xác nhận giao dịch chuyển khoản thành công!<br><br>Trân trọng cảm ơn tấm lòng hảo tâm của Quý Nhà tài trợ.";

                document.getElementById('thankyou-message').innerHTML = msg;
                document.getElementById('thankyou-modal').classList.add('active');
                document.getElementById('form-tai-tro').reset();
            } else {
                alert(data.message);
            }
        })
        .catch(() => {
            btn.disabled = false;
            btn.innerText = originalText;
            alert("Có lỗi kết nối hệ thống! Vui lòng thử lại sau.");
        });
}

// 5. Xử lý submit Form Đồng hành
function submitFormDongHanh(e) {
    e.preventDefault();

    const packageVal = document.getElementById('selected-package-val').value;
    if (!packageVal || packageVal.trim() === "") {
        alert("Vui lòng chọn một Gói Hợp Tác ở phía trên trước khi gửi thông tin!");
        return;
    }

    const btn = document.getElementById('btn-submit-dh');
    const originalText = btn.innerText;

    btn.disabled = true;
    btn.innerText = "Đang xử lý...";

    const formData = new FormData(document.getElementById('form-dong-hanh'));
    formData.append('goi_hop_tac', packageVal);

    fetch('../modules/process-dong-hanh.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            btn.disabled = false;
            btn.innerText = originalText;

            if (data.status === 'success') {
                document.getElementById('thankyou-message').innerHTML =
                    `Trân trọng cảm ơn Quý Doanh nghiệp / Quý Nhà tài trợ đã đăng ký hợp tác <b>[${packageVal}]</b>.<br><br><strong>THANH ÂM sẽ sớm liên hệ trực tiếp với Quý Đối tác!</strong>`;
                document.getElementById('thankyou-modal').classList.add('active');
                document.getElementById('form-dong-hanh').reset();
                document.getElementById('selected-package-val').value = "";
                document.querySelectorAll('.package-card').forEach(el => el.classList.remove('selected'));
            } else {
                alert(data.message);
            }
        })
        .catch(() => {
            btn.disabled = false;
            btn.innerText = originalText;
            alert("Có lỗi kết nối hệ thống! Vui lòng thử lại sau.");
        });
}

// 6. Đóng Modal
function closeModal() {
    document.getElementById('thankyou-modal').classList.remove('active');
}
</script>

<?php
// Include Footer đã có sẵn
include_once '../includes/footer.php';
?>