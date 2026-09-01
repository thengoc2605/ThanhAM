<?php
session_start();
require_once '../connect.php';

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Xử lý khi Admin lưu form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ids       = $_POST['id'] ?? [];
    $ten       = $_POST['ten_chi_so'] ?? [];
    $gia_tri   = $_POST['gia_tri'] ?? [];
    $mo_ta_phu = $_POST['mo_ta_phu'] ?? [];

    $stmt = $pdo->prepare("UPDATE chi_so_tac_dong SET ten_chi_so = ?, gia_tri = ?, mo_ta_phu = ? WHERE id = ?");

    foreach ($ids as $i => $id) {
        $stmt->execute([
            trim($ten[$i] ?? ''),
            (int)($gia_tri[$i] ?? 0),
            trim($mo_ta_phu[$i] ?? ''),
            $id
        ]);
    }

    echo "<script>alert('Đã cập nhật số liệu Báo cáo tác động!'); window.location.href='sua_bao_cao_tac_dong.php';</script>";
    exit;
}

// Lấy danh sách chỉ số hiện có
$stmt = $pdo->query("SELECT * FROM chi_so_tac_dong ORDER BY id ASC");
$ds_chi_so = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Báo cáo tác động - Admin Thanh Âm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="dong_hanh_admin.php"><i class="fa-solid fa-arrow-left me-2"></i>QUAY
                LẠI</a>
            <span class="navbar-text text-white-50">Hệ thống quản trị Thanh Âm</span>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-gradient bg-primary text-white p-4 rounded-top-4">
                        <h4 class="mb-1"><i class="fa-solid fa-chart-pie me-2"></i> Báo Cáo Tác Động</h4>
                        <p class="mb-0 text-white-50 small">Các số liệu này hiển thị ở đầu trang "Đồng hành cùng Thanh
                            Âm" cho khách xem</p>
                    </div>
                    <div class="card-body p-4">

                        <?php if (empty($ds_chi_so)): ?>
                        <div class="alert alert-warning">Chưa có chỉ số nào trong bảng <code>chi_so_tac_dong</code>.
                        </div>
                        <?php else: ?>
                        <form method="POST">
                            <?php foreach ($ds_chi_so as $i => $cs): ?>
                            <div class="border rounded-3 p-3 mb-3 bg-light-subtle">
                                <input type="hidden" name="id[]" value="<?= $cs['id'] ?>">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold small text-muted">Mã chỉ số</label>
                                        <input type="text" class="form-control-plaintext fw-bold"
                                            value="<?= htmlspecialchars($cs['ma_chi_so']) ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Tên hiển thị</label>
                                        <input type="text" class="form-control" name="ten_chi_so[]"
                                            value="<?= htmlspecialchars($cs['ten_chi_so']) ?>" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold">Giá trị</label>
                                        <input type="number" class="form-control" name="gia_tri[]"
                                            value="<?= (int)$cs['gia_tri'] ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Ghi chú phụ (tuỳ chọn)</label>
                                        <input type="text" class="form-control" name="mo_ta_phu[]"
                                            value="<?= htmlspecialchars($cs['mo_ta_phu'] ?? '') ?>"
                                            placeholder="VD: Trường KT Tiền Giang">
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                <a href="dong_hanh_admin.php" class="btn btn-outline-secondary px-4">
                                    <i class="fa-solid fa-arrow-left me-1"></i> Quay lại
                                </a>
                                <button type="submit" class="btn btn-success px-5 fw-bold shadow-sm">
                                    <i class="fa-solid fa-floppy-disk me-1"></i> Lưu thay đổi
                                </button>
                            </div>
                        </form>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>