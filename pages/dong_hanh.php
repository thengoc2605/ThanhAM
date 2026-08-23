<?php
// Include Header đã có sẵn
include_once '../includes/header.php'; 
?>

<!-- Link đến file CSS riêng của trang Đồng hành -->
<!-- Sửa lại đường dẫn href cho khớp với thư mục của bạn -->
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
                    <strong>Chương trình:</strong> <span>Trao Thanh Âm - Tặng Tương Lai</span>
                </div>
                <div class="info-list-item">
                    <strong>Địa điểm tổ chức:</strong> <span>Trường Khuyết Tật Tỉnh Tiền Giang</span>
                </div>
                <div class="info-list-item">
                    <strong>Thời gian:</strong> <span>Tháng 09/2026</span>
                </div>
                <div class="info-list-item">
                    <strong>Đơn vị tổ chức:</strong> <span>Dự án Thanh Âm</span>
                </div>
                <div class="info-list-item">
                    <strong>Đơn vị đồng hành:</strong> <span>Thanh Âm - ĐH Tiền Giang - Trường KT</span>
                </div>
                <div class="info-list-item">
                    <strong>Đơn vị thụ hưởng:</strong> <span>Học sinh Trường KT Tiền Giang</span>
                </div>
                <div class="info-list-item">
                    <strong>Đơn vị bảo trợ:</strong> <span>Trường Đại học Tiền Giang</span>
                </div>
                <div class="info-list-item">
                    <strong>Đối tượng hỗ trợ:</strong> <span>50 Trẻ em yếu thế/khiếm khuyết giọng nói</span>
                </div>
                <div class="info-list-item">
                    <strong>Số người đã có thiết bị:</strong> <span>15 trẻ</span>
                </div>
                <div class="info-list-item">
                    <strong>Số người chưa có thiết bị:</strong> <span>35 trẻ</span>
                </div>
                <div class="info-list-item">
                    <strong>Số người đã được hỗ trợ:</strong> <span>20 trẻ</span>
                </div>
                <div class="info-list-item" style="border:none;">
                    <strong style="color:#c8115f;">Số người cần hỗ trợ thêm:</strong> <span
                        style="color:#c8115f; font-weight:bold;">30 trẻ</span>
                </div>
            </div>

            <!-- Cột phải: Form Tài trợ -->
            <div class="dh-box">
                <div class="dh-box-title"> ĐĂNG KÝ ĐỒNG HÀNH TÀI TRỢ</div>
                <form id="form-tai-tro" onsubmit="submitFormTaiTro(event)">
                    <div class="dh-form-group">
                        <label>1. Họ và Tên / Tên Đơn vị *</label>
                        <input type="text" required placeholder="Nhập họ tên hoặc tên tổ chức">
                    </div>
                    <div class="dh-form-group">
                        <label>2. Số điện thoại *</label>
                        <input type="tel" required placeholder="Nhập số điện thoại liên hệ">
                    </div>
                    <div class="dh-form-group">
                        <label>3. Email *</label>
                        <input type="email" required placeholder="Nhập địa chỉ Email">
                    </div>
                    <div class="dh-form-group">
                        <label>4. Hình thức hỗ trợ *</label>
                        <select id="hinh-thuc-ho-tro" onchange="toggleHinhThucTaiTro(this.value)">
                            <option value="tienmat">Tiền mặt (Chuyển khoản / Mã QR)</option>
                            <option value="thietbi">Thiết bị (Máy tính bảng / Điện thoại Android)</option>
                        </select>
                    </div>
                    <div class="dh-form-group">
                        <label>5. Lời nhắn / Nội dung hỗ trợ</label>
                        <textarea rows="3" placeholder="Nhập ghi chú hoặc nội dung hỗ trợ..."></textarea>
                    </div>

                    <!-- Khung QR hiển thị khi chọn Tiền mặt -->
                    <div id="qr-bank-box" class="qr-container active">
                        <strong>Thông tin chuyển khoản ủng hộ:</strong>
                        <p style="font-size:0.88rem; margin: 4px 0;">Ngân hàng: <strong>MB Bank</strong></p>
                        <p style="font-size:0.88rem; margin: 4px 0;">STK: <strong>0912991489</strong> - Chủ TK:
                            <strong>DU AN THANH AM</strong>
                        </p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=https://thatham.vfy.vn"
                            alt="Mã QR Chuyển khoản">
                        <p style="font-size:0.78rem; color:#64748b;">*Vui lòng quét mã QR hoặc chuyển khoản với nội
                            dung: [Họ tên] - [SĐT] - Tai tro Thanh Am</p>
                    </div>

                    <button type="submit" class="btn-submit-dh"> XÁC NHẬN TÀI TRỢ</button>
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
            <input type="hidden" id="selected-package-val" value="Chưa chọn gói">
        </div>

        <!-- Khung 2 cột: Form liên hệ & Thông tin Thanh Âm -->
        <div class="dh-grid-2">

            <div class="dh-box">
                <div class="dh-box-title">2. THÔNG TIN ĐỐI TÁC ĐĂNG KÝ</div>
                <form id="form-dong-hanh" onsubmit="submitFormDongHanh(event)">
                    <div class="dh-form-group">
                        <label>Họ và tên người đại diện *</label>
                        <input type="text" required placeholder="Nhập họ tên">
                    </div>
                    <div class="dh-form-group">
                        <label>Tên Doanh nghiệp / Đơn vị *</label>
                        <input type="text" required placeholder="Nhập tên doanh nghiệp hoặc tổ chức">
                    </div>
                    <div class="dh-form-group">
                        <label>Số điện thoại *</label>
                        <input type="tel" required placeholder="Nhập số điện thoại">
                    </div>
                    <div class="dh-form-group">
                        <label>Email *</label>
                        <input type="email" required placeholder="Nhập Email">
                    </div>
                    <button type="submit" class="btn-submit-dh"> XÁC NHẬN GỬI THÔNG TIN</button>
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

<!-- JavaScript Điều Hướng Trang -->
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
    if (val === 'tienmat') {
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
    document.getElementById('thankyou-message').innerHTML =
        "Trân trọng cảm ơn tấm lòng hảo tâm của Quý Nhà tài trợ đã ủng hộ chương trình!<br><br>Hệ thống đã ghi nhận thông tin tài trợ. Giấy chứng nhận và thông báo xác nhận sẽ được gửi qua Email/Zalo của Quý vị trong ít ngày tới.";
    document.getElementById('thankyou-modal').classList.add('active');
}

// 5. Xử lý submit Form Đồng hành
function submitFormDongHanh(e) {
    e.preventDefault();
    const pkg = document.getElementById('selected-package-val').value;
    document.getElementById('thankyou-message').innerHTML =
        "Trân trọng cảm ơn Quý Doanh nghiệp / Quý Nhà tài trợ đã đăng ký hợp tác " + (pkg !== 'Chưa chọn gói' ? "<b>[" +
            pkg + "]</b>" : "") +
        ".<br><br><strong>THANH ÂM sẽ sớm liên hệ với Quý Đối tác để trao đổi chi tiết.</strong>";
    document.getElementById('thankyou-modal').classList.add('active');
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