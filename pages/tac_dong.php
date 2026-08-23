<?php
// Include Header
include_once '../includes/header.php'; 
?>

<!-- Link file CSS riêng -->
<link rel="stylesheet" href="../assets/css/tacdong.css">

<main class="tacdong-container">

    <!-- Hero Banner -->
    <section class="td-hero">
        <h1>TÁC ĐỘNG XÃ HỘI</h1>
        <p>Thanh Âm - Hệ thống AI hỗ trợ giao tiếp cho người yếu thế<br>Trao tiếng nói - Chạm trái tim</p>
    </section>

    <!-- TAB CHÍNH (CẤP 1) -->
    <div class="td-main-tabs">
        <button class="td-tab-btn active" id="btn-main-trienkhai" onclick="switchMainTab('trienkhai')">Dự án triển
            khai</button>
        <button class="td-tab-btn" id="btn-main-baocao" onclick="switchMainTab('baocao')">Báo cáo tác động</button>
    </div>

    <!-- ==================== NỘI DUNG 1: DỰ ÁN TRIỂN KHAI ==================== -->
    <div id="main-content-trienkhai">

        <!-- TAB PHỤ (CẤP 2) -->
        <div class="td-sub-tabs">
            <button class="td-sub-btn active" id="btn-sub-hientai" onclick="switchSubTab('hientai')">Triển khai hiện
                tại</button>
            <button class="td-sub-btn" id="btn-sub-lichsu" onclick="switchSubTab('lichsu')">Lịch sử triển khai</button>
        </div>

        <!-- 1.1 Triển khai hiện tại -->
        <div id="sub-content-hientai">
            <div class="td-grid-2">
                <!-- Khung Trái: Thông tin -->
                <div class="td-box">
                    <div class="td-box-title"> Chương trình hỗ trợ hiện tại</div>
                    <div class="history-info" style="border:none;">
                        <p><strong>Địa điểm tổ chức:</strong> Trường Khuyết Tật Tỉnh Tiền Giang</p>
                        <p><strong>Thời gian:</strong> Tháng 09/2026</p>
                        <p><strong>Quy mô:</strong> 50 Trẻ em yếu thế</p>
                        <p><strong>Đơn vị tổ chức:</strong> Dự án Thanh Âm</p>
                        <p><strong>Đơn vị đồng hành:</strong> Thanh Âm - ĐH Tiền Giang - Trường KT</p>
                        <p><strong>Đơn vị thụ hưởng:</strong> Học sinh Trường KT Tiền Giang</p>
                        <p><strong>Đơn vị bảo trợ:</strong> Trường Đại học Tiền Giang</p>
                        <p><strong>Hỗ trợ:</strong> Hệ thống thiết bị và phần mềm AI</p>
                        <p><strong>Số lượng người đã có TB:</strong> 15 trẻ</p>
                        <p><strong>Số lượng người chưa có TB:</strong> 35 trẻ</p>
                        <p><strong>Số lượng người đã được HT:</strong> 20 trẻ</p>
                    </div>
                </div>

                <!-- Khung Phải: Đăng ký (Giống trang Đồng hành) -->
                <div class="td-box">
                    <div class="td-box-title"> Đăng ký đồng hành tài trợ</div>
                    <form id="form-tai-tro-td" onsubmit="submitFormTD(event)">
                        <div class="td-form-group">
                            <label>1. Họ Tên:</label>
                            <input type="text" required placeholder="Nhập họ tên">
                        </div>
                        <div class="td-form-group">
                            <label>2. SĐT:</label>
                            <input type="tel" required placeholder="Nhập số điện thoại">
                        </div>
                        <div class="td-form-group">
                            <label>3. Email:</label>
                            <input type="email" required placeholder="Nhập Email">
                        </div>
                        <div class="td-form-group">
                            <label>4. Hình thức hỗ trợ:</label>
                            <select id="hinh-thuc" onchange="toggleQR_TD(this.value)">
                                <option value="tienmat">Tiền mặt (Chuyển khoản / Mã QR)</option>
                                <option value="thietbi">Thiết bị</option>
                            </select>
                        </div>
                        <div class="td-form-group">
                            <label>5. Nội dung:</label>
                            <textarea rows="2" placeholder="Ghi chú thêm..."></textarea>
                        </div>

                        <!-- Mã QR -->
                        <div id="qr-box-td" class="qr-container active">
                            <label>6. QR/STK để chuyển khoản:</label>
                            <p style="font-size:0.85rem; margin: 5px 0;">MB Bank - <strong>0912991489</strong> - DU AN
                                THANH AM</p>
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://thatham.vfy.vn"
                                alt="Mã QR">
                        </div>

                        <button type="submit" class="btn-submit">7. XÁC NHẬN THÀNH CÔNG</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- 1.2 Lịch sử triển khai -->
        <div id="sub-content-lichsu" style="display: none;">
            <div class="td-quote">
                Thanh Âm tin rằng: "Dù mỗi người có một hoàn cảnh khác nhau, nhưng ai cũng xứng đáng được lắng nghe."
            </div>

            <!-- Khung 1 (Cứ tiếp khung như vậy, mỗi chương trình là 1 khung) -->
            <div class="history-card">
                <div class="history-info">
                    <h3 style="color:#0a2158; margin-top:0;">Chương trình hỗ trợ đợt 1</h3>
                    <p><strong>Địa điểm tổ chức:</strong> Trung tâm bảo trợ xã hội TP.HCM</p>
                    <p><strong>Thời gian:</strong> Từ 01/2025 đến 06/2025</p>
                    <p><strong>Quy mô:</strong> 30 Người yếu thế</p>
                    <p><strong>Đơn vị tổ chức:</strong> Dự án Thanh Âm</p>
                    <p><strong>Đơn vị đồng hành:</strong> CLB Sinh viên Tình nguyện</p>
                    <p><strong>Đơn vị thụ hưởng:</strong> Các bé khiếm khuyết ngôn ngữ</p>
                    <p><strong>Số lượng đã có TB:</strong> 10</p>
                    <p><strong>Số lượng chưa có TB:</strong> 20</p>
                    <p style="border:none; color:#c8115f; font-weight:bold; margin-top:10px;">Tổng kết: Đã trao tặng
                        thành công 20 bộ thiết bị</p>
                </div>
                <div class="history-media">
                    <span style="font-size: 3rem;">📸</span>
                    <p style="margin-top:10px;">Hình ảnh người dùng/gd/trường</p>
                    <p>Clip minh chứng</p>
                </div>
            </div>

            <!-- Khung 2 (Mẫu lặp lại) -->
            <div class="history-card">
                <div class="history-info">
                    <h3 style="color:#0a2158; margin-top:0;">Chương trình hỗ trợ đợt 2</h3>
                    <p><strong>Địa điểm tổ chức:</strong> Trường Chuyên biệt Bình Minh</p>
                    <p><strong>Thời gian:</strong> Từ 08/2025 đến 12/2025</p>
                    <p><strong>Quy mô:</strong> Cấp trường</p>
                    <p style="border:none; color:#c8115f; font-weight:bold; margin-top:10px;">Tổng kết: Hoàn thành phổ
                        cập ứng dụng cho 50 học sinh</p>
                </div>
                <div class="history-media">
                    <span style="font-size: 3rem;">🎥</span>
                    <p style="margin-top:10px;">Hình ảnh và Video minh chứng</p>
                </div>
            </div>

        </div>

    </div>

    <!-- ==================== NỘI DUNG 2: BÁO CÁO TÁC ĐỘNG ==================== -->
    <div id="main-content-baocao" style="display: none;">

        <h2 style="text-align: center; color:#0a2158; margin-bottom: 20px;">Thanh Âm đã hỗ trợ:</h2>

        <div class="td-quote">
            Thanh Âm tin rằng: "Dù mỗi người có một hoàn cảnh khác nhau, nhưng ai cũng xứng đáng được lắng nghe."
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">75</div>
                <div class="stat-label">Bé được tiếp cận</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">1</div>
                <div class="stat-label">Trường học</div>
                <div class="stat-detail">Đơn vị đồng hành/hỗ trợ:<br><strong>Trường KT Tiền Giang</strong></div>
            </div>
            <div class="stat-card">
                <div class="stat-number">20</div>
                <div class="stat-label">Người được trao<br>thiết bị</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">20</div>
                <div class="stat-label">Thiết bị<br>được trao</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">1</div>
                <div class="stat-label">Nhà tài trợ</div>
                <div class="stat-detail">Tên đơn vị:<br><strong>ĐH Tiền Giang</strong></div>
            </div>
        </div>
    </div>

</main>

<!-- Modal Thư Cảm Ơn -->
<div id="td-thankyou-modal" class="modal-overlay">
    <div class="letter-box">
        <h3 style="color:#0a2158;"> THƯ CẢM ƠN</h3>
        <p id="td-thankyou-message" style="margin: 20px 0; line-height:1.6; color:#475569;">
            Chuyển khoản xong sẽ có thư cảm ơn hiện lên.<br>
            1 vài ngày sau sẽ có giấy chứng gửi về mail của bạn.<br>
            Nếu bạn chọn hỗ trợ thiết bị thì chúng tôi sẽ liên hệ sau qua mail/zalo.
        </p>
        <button class="btn-submit" style="width:auto; padding:8px 30px;" onclick="closeModalTD()">Đóng lại</button>
    </div>
</div>

<script>
// Chuyển Tab Chính (Cấp 1)
function switchMainTab(tabName) {
    document.getElementById('btn-main-trienkhai').classList.remove('active');
    document.getElementById('btn-main-baocao').classList.remove('active');
    document.getElementById('main-content-trienkhai').style.display = 'none';
    document.getElementById('main-content-baocao').style.display = 'none';

    if (tabName === 'trienkhai') {
        document.getElementById('btn-main-trienkhai').classList.add('active');
        document.getElementById('main-content-trienkhai').style.display = 'block';
    } else {
        document.getElementById('btn-main-baocao').classList.add('active');
        document.getElementById('main-content-baocao').style.display = 'block';
    }
}

// Chuyển Tab Phụ (Cấp 2)
function switchSubTab(tabName) {
    document.getElementById('btn-sub-hientai').classList.remove('active');
    document.getElementById('btn-sub-lichsu').classList.remove('active');
    document.getElementById('sub-content-hientai').style.display = 'none';
    document.getElementById('sub-content-lichsu').style.display = 'none';

    if (tabName === 'hientai') {
        document.getElementById('btn-sub-hientai').classList.add('active');
        document.getElementById('sub-content-hientai').style.display = 'block';
    } else {
        document.getElementById('btn-sub-lichsu').classList.add('active');
        document.getElementById('sub-content-lichsu').style.display = 'block';
    }
}

// Ẩn hiện QR Form Tài trợ
function toggleQR_TD(val) {
    const qrBox = document.getElementById('qr-box-td');
    if (val === 'tienmat') {
        qrBox.classList.add('active');
    } else {
        qrBox.classList.remove('active');
    }
}

// Xử lý Submit Form
function submitFormTD(e) {
    e.preventDefault();
    const hinhThuc = document.getElementById('hinh-thuc').value;
    let msg = "";

    if (hinhThuc === 'tienmat') {
        msg =
            "Chân thành cảm ơn Quý vị đã đồng hành!<br><br>Hệ thống đã ghi nhận thông tin. Giấy chứng nhận sẽ được gửi về Email của Quý vị trong vài ngày tới.";
    } else {
        msg =
            "Chân thành cảm ơn tấm lòng của Quý vị!<br><br>Ban tổ chức sẽ sớm liên hệ qua Email/Zalo để hướng dẫn quy trình trao tặng thiết bị.";
    }

    document.getElementById('td-thankyou-message').innerHTML = msg;
    document.getElementById('td-thankyou-modal').classList.add('active');
}

// Đóng modal
function closeModalTD() {
    document.getElementById('td-thankyou-modal').classList.remove('active');
}
</script>

<?php 
// Include Footer
include_once '../includes/footer.php'; 
?>