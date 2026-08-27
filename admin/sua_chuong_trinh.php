<?php
session_start();
require_once '../connect.php';

// Kiểm tra quyền đăng nhập admin (nếu hệ thống của bạn có dùng session này)
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Xử lý khi Admin lưu form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $sql = "UPDATE chuong_trinh SET 
            tieu_de = ?, dia_diem = ?, thoi_gian = ?, don_vi_to_chuc = ?, 
            don_vi_dong_hanh = ?, don_vi_thu_huong = ?, don_vi_bao_tro = ?, 
            doi_tuong_ho_tro = ?, so_co_thiet_bi = ?, so_chua_thiet_bi = ?, 
            chi_tieu_so_luong = ?, so_luong_hien_tai = ? 
            WHERE id = ?";
            
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['tieu_de'], $_POST['dia_diem'], $_POST['thoi_gian'], $_POST['don_vi_to_chuc'],
        $_POST['don_vi_dong_hanh'], $_POST['don_vi_thu_huong'], $_POST['don_vi_bao_tro'],
        $_POST['doi_tuong_ho_tro'], $_POST['so_co_thiet_bi'], $_POST['so_chua_thiet_bi'],
        $_POST['chi_tieu_so_luong'], $_POST['so_luong_hien_tai'], $id
    ]);
    
    echo "<script>alert('Cập nhật thành công!'); window.location.href='sua_chuong_trinh.php';</script>";
    exit;
}

// Lấy chương trình hiện tại ra form
$stmt = $pdo->query("SELECT * FROM chuong_trinh WHERE trang_thai = 'dang_dien_ra' ORDER BY id DESC LIMIT 1");
$ct = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$ct) {
    die("<div class='container mt-5'><div class='alert alert-warning'>Không tìm thấy chương trình nào đang diễn ra để chỉnh sửa! <a href='dong_hanh_admin.php'>Quay lại</a></div></div>");
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa chương trình - Admin Thanh Âm</title>
    <!-- Nhúng Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">

    <!-- Navbar đơn giản -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="dong_hanh_admin.php"><i class="fa-solid fa-arrow-left me-2"></i>QUAY
                LẠI</a>
            </a>
            <span class="navbar-text text-white-50">Hệ thống quản trị Thanh Âm</span>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-gradient bg-primary text-white p-4 rounded-top-4">
                        <h4 class="mb-1"><i class="fa-solid fa-pen-to-square me-2"></i> Chỉnh Sửa Chương Trình</h4>
                        <p class="mb-0 text-white-50 small">Cập nhật thông tin chi tiết và số liệu cho chương trình đang
                            diễn ra</p>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $ct['id'] ?>">

                            <!-- Thông tin chung -->
                            <h5 class="text-primary mb-3 fw-bold border-bottom pb-2"><i
                                    class="fa-solid fa-circle-info me-1"></i> Thông Tin Chung</h5>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tên chương trình:</label>
                                <input type="text" class="form-control" name="tieu_de"
                                    value="<?= htmlspecialchars($ct['tieu_de']) ?>" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Địa điểm:</label>
                                    <input type="text" class="form-control" name="dia_diem"
                                        value="<?= htmlspecialchars($ct['dia_diem']) ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Thời gian:</label>
                                    <input type="text" class="form-control" name="thoi_gian"
                                        value="<?= htmlspecialchars($ct['thoi_gian']) ?>">
                                </div>
                            </div>

                            <!-- Các đơn vị liên quan -->
                            <h5 class="text-primary mb-3 fw-bold border-bottom pb-2 pt-3"><i
                                    class="fa-solid fa-handshake me-1"></i> Các Đơn Vị & Đối Tượng</h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Đơn vị tổ chức:</label>
                                    <input type="text" class="form-control" name="don_vi_to_chuc"
                                        value="<?= htmlspecialchars($ct['don_vi_to_chuc']) ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Đơn vị đồng hành:</label>
                                    <input type="text" class="form-control" name="don_vi_dong_hanh"
                                        value="<?= htmlspecialchars($ct['don_vi_dong_hanh']) ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Đơn vị thụ hưởng:</label>
                                    <input type="text" class="form-control" name="don_vi_thu_huong"
                                        value="<?= htmlspecialchars($ct['don_vi_thu_huong']) ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Đơn vị bảo trợ:</label>
                                    <input type="text" class="form-control" name="don_vi_bao_tro"
                                        value="<?= htmlspecialchars($ct['don_vi_bao_tro']) ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Đối tượng hỗ trợ:</label>
                                <input type="text" class="form-control" name="doi_tuong_ho_tro"
                                    value="<?= htmlspecialchars($ct['doi_tuong_ho_tro']) ?>">
                            </div>

                            <!-- Thống kê số lượng -->
                            <h5 class="text-primary mb-3 fw-bold border-bottom pb-2 pt-3"><i
                                    class="fa-solid fa-chart-pie me-1"></i> Số Liệu Thống Kê</h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Số người đã có thiết bị:</label>
                                    <input type="number" class="form-control" name="so_co_thiet_bi"
                                        value="<?= $ct['so_co_thiet_bi'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Số người chưa có thiết bị:</label>
                                    <input type="number" class="form-control" name="so_chua_thiet_bi"
                                        value="<?= $ct['so_chua_thiet_bi'] ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Chỉ tiêu số lượng (Tổng cần hỗ trợ):</label>
                                    <input type="number" class="form-control" name="chi_tieu_so_luong"
                                        value="<?= $ct['chi_tieu_so_luong'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Số người đã được hỗ trợ:</label>
                                    <input type="number" class="form-control" name="so_luong_hien_tai"
                                        value="<?= $ct['so_luong_hien_tai'] ?>">
                                </div>
                            </div>

                            <!-- Nút hành động -->
                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                <a href="dashboard.php" class="btn btn-outline-secondary px-4">
                                    <i class="fa-solid fa-arrow-left me-1"></i> Quay lại
                                </a>
                                <button type="submit" class="btn btn-success px-5 fw-bold shadow-sm">
                                    <i class="fa-solid fa-floppy-disk me-1"></i> Lưu thay đổi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>