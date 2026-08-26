<?php
// Include Header đã có sẵn
include_once '../includes/header.php'; 
require_once '../connect.php';

// Lấy thông tin chương trình đang diễn ra mới nhất
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
?>

<!-- Link đến file CSS riêng của trang Đồng hành -->
<link rel="stylesheet" href="../assets/css/donghanh.css">

<main class="donghanh-container">

    <!-- Hero Header Banner -->
    <section class="dh-hero">
        <h1>ĐỒNG HÀNH CÙNG THANH ÂM</h1>
        <p>Hệ thống AI hỗ trợ giao tiếp cho người yếu thế — Trao tiếng nói, Chạm trái tim</p>
    </section>

    <!-- Nút chọn chế độ TÀI TRỢ / ĐỒNG HÀNH -->
    <div class="dh-tabs-main">
        <div class="dh-tab-card active" id="btn-tab-taitro" onclick="switchDHTab('taitro')">
            <h2> TÀI TRỢ CHƯƠNG TRÌNH</h2>
            <p>"Quý Doanh nghiệp/Quý Nhà tài trợ muốn tài trợ cho chương trình đang diễn ra"</p>
        </div>
        <div class="dh-tab-card" id="btn-tab-donghanh" onclick="switchDHTab('donghanh')">
            <h2> ĐỒNG HÀNH CHIẾN LƯỢC</h2>
            <p>"Quý Doanh nghiệp/Quý Nhà tài trợ muốn hợp tác đồng hành cùng Thanh Âm"</p>
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
                    <strong>Số người đã có thiết bị:</strong> <span><?= (int)($ct['so_co_thiet_bi'] ?? 0) ?> trẻ</span>
                </div>
                <div class="info-list-item">
                    <strong>Số người chưa có thiết bị:</strong> <span><?= (int)($ct['so_chua_thiet_bi'] ?? 0) ?>
                        trẻ</span>
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
                        <strong>Thông margin khoản ủng hộ:</strong>
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
            <p style="font-size:0.92rem; color:#4b5163;">
                Quý vị có thể xem trực tuyến hoặc tải về bộ Hồ sơ dự án bên dưới:
            </p>

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
            <!-- Đã sửa value mặc định thành rỗng để bắt lỗi dễ hơn -->
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
// 1. Hàm chuyển Tab Tài trợ / Đồng hành
function switchDHTab(tab) {
    const tabTT = document.getElementById('btn-tab-taitro');
    const tabDH = document.getElementById('btn-tab-donghanh');
    const contentTT = document.getElementById('content-taitro');
    const contentDH = document.getElementById('content-donghanh');

    if (tab === 'taitro') {
        tabTT.classList.add('active');
        tabDH.classList.remove('active');
        contentTT.style.display = 'block';
        contentDH.style.display = 'none';
    } else {
        tabDH.classList.add('active');
        tabTT.classList.remove('active');
        contentDH.style.display = 'block';
        contentTT.style.display = 'none';
    }
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