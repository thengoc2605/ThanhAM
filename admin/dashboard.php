<?php
require_once '../connect.php';
require_once 'header_admin.php'; // Gọi Header dùng chung

// Thống kê nhanh từ DB cho Trang chủ Admin
$total_tai_tro = $pdo->query("SELECT COUNT(*) FROM tai_tro")->fetchColumn();
$total_dong_hanh = $pdo->query("SELECT COUNT(*) FROM dong_hanh_chien_luoc")->fetchColumn();
$total_cau_chuyen = $pdo->query("SELECT COUNT(*) FROM cau_chuyen")->fetchColumn();
?>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold">Bảng Điều Khiển Hệ Thống</h1>
    </div>

    <!-- Thống kê tổng quan -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-start border-primary border-4 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="text-xs fw-bold text-primary text-uppercase mb-1">Lượt Đăng Ký Tài Trợ</div>
                    <div class="h5 mb-0 fw-bold text-gray-800"><?= $total_tai_tro ?> lượt</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-start border-success border-4 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="text-xs fw-bold text-success text-uppercase mb-1">Đối Tác Đồng Hành</div>
                    <div class="h5 mb-0 fw-bold text-gray-800"><?= $total_dong_hanh ?> doanh nghiệp</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-start border-info border-4 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="text-xs fw-bold text-info text-uppercase mb-1">Câu Chuyện Đã Đăng</div>
                    <div class="h5 mb-0 fw-bold text-gray-800"><?= $total_cau_chuyen ?> bài viết</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Danh sách các phân hệ Quản lý -->
    <h5 class="fw-bold mb-3 text-secondary">Phân Hệ Quản Lý System</h5>
    <div class="row g-3">
        <!-- Module Đồng Hành (Của bạn) -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-4">
                    <div class="fs-1 text-primary mb-2"><i class="fa-solid fa-handshake"></i></div>
                    <h5 class="card-title fw-bold">Quản Lý Đồng Hành</h5>
                    <p class="card-text text-muted small">Xem danh sách đăng ký tài trợ hiện vật, tiền mặt và các gói
                        hợp tác doanh nghiệp.</p>
                    <a href="dong_hanh_admin.php" class="btn btn-primary w-100 fw-bold">Truy Cập Quản Lý</a>
                </div>
            </div>
        </div>

        <!-- Module Cấu Hình Chương Trình (Của bạn) -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-4">
                    <div class="fs-1 text-success mb-2"><i class="fa-solid fa-sliders"></i></div>
                    <h5 class="card-title fw-bold">Chương Trình Đang Chạy</h5>
                    <p class="card-text text-muted small">Chỉnh sửa thông tin tiêu đề, đối tượng, đơn vị bảo trợ và chỉ
                        tiêu số lượng.</p>
                    <a href="sua_chuong_trinh.php" class="btn btn-success w-100 fw-bold">Chỉnh Sửa Thông Tin</a>
                </div>
            </div>
        </div>

        <!-- Module Dành Cho Bạn Của Bạn Liên Kết -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0 bg-light">
                <div class="card-body text-center p-4">
                    <div class="fs-1 text-secondary mb-2"><i class="fa-solid fa-folder-plus"></i></div>
                    <h5 class="card-title fw-bold text-secondary">Các Module Khác</h5>
                    <p class="card-text text-muted small">Các tính năng quản lý bài viết, câu chuyện, tài liệu truyền
                        thông (Đang phát triển).</p>
                    <button class="btn btn-outline-secondary w-100" disabled>Chờ Liên Kết</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>