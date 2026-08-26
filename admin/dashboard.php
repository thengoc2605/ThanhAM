<?php
session_start();
require_once '../connect.php';

// Kiểm tra quyền truy cập (chưa đăng nhập thì đẩy ra trang login)
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

// 1. Thống kê tổng quan
$totalTaiTro = $pdo->query("SELECT COUNT(*) FROM tai_tro")->fetchColumn();
$totalDongHanh = $pdo->query("SELECT COUNT(*) FROM dong_hanh_chien_luoc")->fetchColumn();

// 2. Lấy dữ liệu chi tiết
$recentTaiTro = $pdo->query("SELECT * FROM tai_tro ORDER BY id DESC")->fetchAll();
$recentDongHanh = $pdo->query("SELECT * FROM dong_hanh_chien_luoc ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Thanh Âm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .stat-card {
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        border: 3px solid transparent;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
    }

    /* Viền nổi bật cho Box đang được chọn */
    .stat-card.active {
        border-color: #0d6efd !important;
    }
    </style>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Thanh Âm Admin</a>
            <div class="d-flex align-items-center">
                <span class="navbar-text me-3 text-white">
                    Xin chào, <b><?= htmlspecialchars($_SESSION['admin_username'] ?? 'Admin') ?></b>
                </span>
                <!-- Nút chuyển sang trang sửa chương trình -->
                <a href="sua_chuong_trinh.php" class="btn btn-warning btn-sm me-2 text-dark fw-bold">⚙️ Sửa Chương
                    Trình</a>
                <a href="logout.php" class="btn btn-danger btn-sm">Đăng xuất</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid px-4">
        <div class="row">

            <!-- Thẻ Thống kê Tài trợ -->
            <div class="col-md-6 mb-4">
                <div class="card text-white bg-success shadow stat-card active" id="card-tai-tro"
                    onclick="switchTab('tai-tro')">
                    <div class="card-body">
                        <h5 class="card-title">TỔNG LƯỢT TÀI TRỢ</h5>
                        <h2 class="display-5 fw-bold"><?= $totalTaiTro ?></h2>
                        <p class="card-text text-white-50 mb-0"><small>(Nhấp để xem bảng Tài trợ)</small></p>
                    </div>
                </div>
            </div>

            <!-- Thẻ Thống kê Đồng hành -->
            <div class="col-md-6 mb-4">
                <div class="card text-white bg-info shadow stat-card" id="card-dong-hanh"
                    onclick="switchTab('dong-hanh')">
                    <div class="card-body">
                        <h5 class="card-title">ĐỐI TÁC ĐỒNG HÀNH</h5>
                        <h2 class="display-5 fw-bold"><?= $totalDongHanh ?></h2>
                        <p class="card-text text-white-50 mb-0"><small>(Nhấp để xem bảng Đối tác)</small></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bảng Dữ liệu Tài trợ (Mặc định hiển thị) -->
        <div class="card shadow mb-4" id="section-tai-tro">
            <div class="card-header py-3 d-flex justify-content-between align-items-center bg-white">
                <h6 class="m-0 font-weight-bold text-success">Danh Sách Lượt Tài Trợ</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Họ Tên</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Hình thức</th>
                                <th>Nội dung / Mã GD</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($recentTaiTro) > 0): ?>
                            <?php foreach ($recentTaiTro as $row): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= htmlspecialchars($row['ho_ten']) ?></td>
                                <td><?= htmlspecialchars($row['sdt']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td>
                                    <?php if($row['hinh_thuc'] == 'tien_mat'): ?>
                                    <span class="badge bg-success">Tiền</span>
                                    <?php elseif($row['hinh_thuc'] == 'thiet_bi'): ?>
                                    <span class="badge bg-warning text-dark">Thiết bị</span>
                                    <?php else: ?>
                                    <span class="badge bg-secondary">Khác</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($row['loi_nhan']) ?>
                                    <br>
                                    <small
                                        class="text-muted"><?= htmlspecialchars($row['ma_giao_dich'] ?? '') ?></small>
                                </td>
                                <td><?= $row['ngay_tao'] ?? 'N/A' ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Chưa có dữ liệu</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Bảng Dữ liệu Đối tác Đồng hành (Mặc định ẩn) -->
        <div class="card shadow mb-4 d-none" id="section-dong-hanh">
            <div class="card-header py-3 d-flex justify-content-between align-items-center bg-white">
                <h6 class="m-0 font-weight-bold text-info">Danh Sách Đối Tác Đồng Hành</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Người Đại Diện</th>
                                <th>Doanh Nghiệp</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Gói Hợp Tác</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($recentDongHanh) > 0): ?>
                            <?php foreach ($recentDongHanh as $row): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= htmlspecialchars($row['ho_ten_dai_dien']) ?></td>
                                <td><?= htmlspecialchars($row['ten_doanh_nghiep']) ?></td>
                                <td><?= htmlspecialchars($row['sdt']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><span
                                        class="badge bg-info text-dark"><?= htmlspecialchars($row['goi_hop_tac'] ?? '') ?></span>
                                </td>
                                <td><?= $row['ngay_tao'] ?? 'N/A' ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Chưa có dữ liệu</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>
    function switchTab(tabName) {
        const sectionTaiTro = document.getElementById('section-tai-tro');
        const sectionDongHanh = document.getElementById('section-dong-hanh');
        const cardTaiTro = document.getElementById('card-tai-tro');
        const cardDongHanh = document.getElementById('card-dong-hanh');

        if (tabName === 'tai-tro') {
            sectionTaiTro.classList.remove('d-none');
            sectionDongHanh.classList.add('d-none');

            cardTaiTro.classList.add('active');
            cardDongHanh.classList.remove('active');
        } else if (tabName === 'dong-hanh') {
            sectionDongHanh.classList.remove('d-none');
            sectionTaiTro.classList.add('d-none');

            cardDongHanh.classList.add('active');
            cardTaiTro.classList.remove('active');
        }
    }
    </script>
</body>

</html>