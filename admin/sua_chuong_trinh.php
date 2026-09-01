<?php
session_start();
require_once '../connect.php';

// Kiểm tra quyền đăng nhập admin (nếu hệ thống của bạn có dùng session này)
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// ==========================================================
// Xử lý khi Admin submit form (3 hành động: capnhat / hoan_thanh / tao_moi)
// ==========================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'capnhat';

    // ---- Hành động: Tạo chương trình mới (dùng khi không còn chương trình nào đang diễn ra) ----
    if ($action === 'tao_moi') {
        $sql = "INSERT INTO chuong_trinh
                (tieu_de, dia_diem, thoi_gian, don_vi_to_chuc, don_vi_dong_hanh, don_vi_thu_huong,
                 don_vi_bao_tro, doi_tuong_ho_tro, loai_ho_tro, so_co_thiet_bi, so_chua_thiet_bi,
                 chi_tieu_so_luong, so_luong_hien_tai, mo_ta, trang_thai)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'dang_dien_ra')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['tieu_de'], $_POST['dia_diem'], $_POST['thoi_gian'], $_POST['don_vi_to_chuc'],
            $_POST['don_vi_dong_hanh'], $_POST['don_vi_thu_huong'], $_POST['don_vi_bao_tro'],
            $_POST['doi_tuong_ho_tro'], trim($_POST['loai_ho_tro'] ?? '') ?: 'thiết bị',
            $_POST['so_co_thiet_bi'], $_POST['so_chua_thiet_bi'],
            $_POST['chi_tieu_so_luong'], $_POST['so_luong_hien_tai'], $_POST['mo_ta'] ?? null
        ]);

        echo "<script>alert('Đã tạo chương trình mới!'); window.location.href='sua_chuong_trinh.php';</script>";
        exit;
    }

    // ---- Hành động: Cập nhật (capnhat) hoặc Xác nhận hoàn thành (hoan_thanh) ----
    $id = $_POST['id'];
    $trang_thai_moi = ($action === 'hoan_thanh') ? 'da_hoan_thanh' : 'dang_dien_ra';

    $sql = "UPDATE chuong_trinh SET
            tieu_de = ?, dia_diem = ?, thoi_gian = ?, don_vi_to_chuc = ?,
            don_vi_dong_hanh = ?, don_vi_thu_huong = ?, don_vi_bao_tro = ?,
            doi_tuong_ho_tro = ?, loai_ho_tro = ?, so_co_thiet_bi = ?, so_chua_thiet_bi = ?,
            chi_tieu_so_luong = ?, so_luong_hien_tai = ?, mo_ta = ?, trang_thai = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['tieu_de'], $_POST['dia_diem'], $_POST['thoi_gian'], $_POST['don_vi_to_chuc'],
        $_POST['don_vi_dong_hanh'], $_POST['don_vi_thu_huong'], $_POST['don_vi_bao_tro'],
        $_POST['doi_tuong_ho_tro'], trim($_POST['loai_ho_tro'] ?? '') ?: 'thiết bị',
        $_POST['so_co_thiet_bi'], $_POST['so_chua_thiet_bi'],
        $_POST['chi_tieu_so_luong'], $_POST['so_luong_hien_tai'], $_POST['mo_ta'] ?? null,
        $trang_thai_moi, $id
    ]);

    if ($action === 'hoan_thanh') {
        $msg = 'Đã xác nhận hoàn thành! Chương trình đã được chuyển vào mục Lịch sử triển khai để khách xem.';
    } else {
        $msg = 'Cập nhật thành công!';
    }

    echo "<script>alert('" . addslashes($msg) . "'); window.location.href='sua_chuong_trinh.php';</script>";
    exit;
}

// ==========================================================
// Lấy chương trình hiện tại ra form
// ==========================================================
$stmt = $pdo->query("SELECT * FROM chuong_trinh WHERE trang_thai = 'dang_dien_ra' ORDER BY id DESC LIMIT 1");
$ct = $stmt->fetch(PDO::FETCH_ASSOC);

// Đếm số chương trình đã hoàn thành (chỉ để hiển thị thông tin nhanh)
$stmt_dem = $pdo->query("SELECT COUNT(*) FROM chuong_trinh WHERE trang_thai = 'da_hoan_thanh'");
$so_luong_lich_su = (int)$stmt_dem->fetchColumn();
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
            <span class="navbar-text text-white-50">Hệ thống quản trị Thanh Âm — Đã hoàn thành: <?= $so_luong_lich_su ?>
                chương trình</span>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <?php if ($ct): ?>
                <!-- =============================================================
                     CÓ CHƯƠNG TRÌNH ĐANG DIỄN RA -> HIỂN THỊ FORM CHỈNH SỬA
                ============================================================== -->
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-gradient bg-primary text-white p-4 rounded-top-4">
                        <h4 class="mb-1"><i class="fa-solid fa-pen-to-square me-2"></i> Chỉnh Sửa Chương Trình</h4>
                        <p class="mb-0 text-white-50 small">Cập nhật thông tin chi tiết và số liệu cho chương trình đang
                            diễn ra</p>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" id="form-sua-ct">
                            <input type="hidden" name="id" value="<?= $ct['id'] ?>">
                            <input type="hidden" name="action" id="form-action" value="capnhat">

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

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Loại hình hỗ trợ:</label>
                                <input type="text" class="form-control" name="loai_ho_tro" id="input-loai-ho-tro"
                                    value="<?= htmlspecialchars($ct['loai_ho_tro'] ?? 'thiết bị') ?>"
                                    placeholder="VD: thiết bị, quà, tiền mặt, xe lăn, sách vở..."
                                    oninput="capNhatNhanLoaiHoTro()">
                                <div class="form-text">Không phải đợt nào cũng là "thiết bị" — có thể là quà, tiền
                                    mặt, xe lăn... Gõ vào đây để đổi nhãn 2 ô số liệu bên dưới.</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Số người đã có
                                        <span id="nhan-da-co"
                                            class="text-primary"><?= htmlspecialchars($ct['loai_ho_tro'] ?? 'thiết bị') ?></span>:</label>
                                    <input type="number" class="form-control" name="so_co_thiet_bi"
                                        value="<?= $ct['so_co_thiet_bi'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Số người chưa có
                                        <span id="nhan-chua-co"
                                            class="text-primary"><?= htmlspecialchars($ct['loai_ho_tro'] ?? 'thiết bị') ?></span>:</label>
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

                            <!-- Tổng kết chương trình (hiển thị ở Lịch sử triển khai khi hoàn thành) -->
                            <h5 class="text-primary mb-3 fw-bold border-bottom pb-2 pt-3"><i
                                    class="fa-solid fa-flag-checkered me-1"></i> Tổng Kết Chương Trình</h5>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nội dung tổng kết:</label>
                                <textarea class="form-control" name="mo_ta" rows="3"
                                    placeholder="VD: Đã trao tặng thành công 20 bộ thiết bị cho các em học sinh..."><?= htmlspecialchars($ct['mo_ta'] ?? '') ?></textarea>
                                <div class="form-text">Nội dung này sẽ hiển thị ở mục "Lịch sử triển khai" trên trang
                                    Đồng hành sau khi bạn bấm <strong>Xác nhận hoàn thành</strong>.</div>
                            </div>

                            <!-- Nút hành động -->
                            <div
                                class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top flex-wrap gap-2">
                                <a href="dong_hanh_admin.php" class="btn btn-outline-secondary px-4">
                                    <i class="fa-solid fa-arrow-left me-1"></i> Quay lại
                                </a>
                                <div class="d-flex gap-2">
                                    <button type="submit"
                                        onclick="document.getElementById('form-action').value='capnhat';"
                                        class="btn btn-success px-4 fw-bold shadow-sm">
                                        <i class="fa-solid fa-floppy-disk me-1"></i> Lưu thay đổi
                                    </button>
                                    <button type="submit" onclick="return confirmHoanThanh();"
                                        class="btn btn-warning text-dark px-4 fw-bold shadow-sm">
                                        <i class="fa-solid fa-flag-checkered me-1"></i> Xác nhận hoàn thành
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php else: ?>
                <!-- =============================================================
                     KHÔNG CÒN CHƯƠNG TRÌNH NÀO ĐANG DIỄN RA -> FORM TẠO MỚI
                ============================================================== -->
                <div class="alert alert-warning rounded-4 shadow-sm p-4 mb-4">
                    <h5 class="fw-bold mb-1"><i class="fa-solid fa-circle-exclamation me-2"></i>Không có chương trình
                        nào đang diễn ra</h5>
                    <p class="mb-0">Chương trình gần nhất có thể đã được <strong>xác nhận hoàn thành</strong> và
                        chuyển vào Lịch sử triển khai. Vui lòng tạo một chương trình mới bên dưới để hiển thị cho
                        khách trên trang Đồng hành.</p>
                </div>

                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-gradient bg-success text-white p-4 rounded-top-4">
                        <h4 class="mb-1"><i class="fa-solid fa-circle-plus me-2"></i> Tạo Chương Trình Mới</h4>
                        <p class="mb-0 text-white-50 small">Nhập thông tin chương trình sẽ hiển thị ở Tab "Tài trợ" trên
                            trang Đồng hành</p>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST">
                            <input type="hidden" name="action" value="tao_moi">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tên chương trình: *</label>
                                <input type="text" class="form-control" name="tieu_de" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Địa điểm:</label>
                                    <input type="text" class="form-control" name="dia_diem">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Thời gian:</label>
                                    <input type="text" class="form-control" name="thoi_gian">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Đơn vị tổ chức:</label>
                                    <input type="text" class="form-control" name="don_vi_to_chuc"
                                        value="Dự án Thanh Âm">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Đơn vị đồng hành:</label>
                                    <input type="text" class="form-control" name="don_vi_dong_hanh">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Đơn vị thụ hưởng:</label>
                                    <input type="text" class="form-control" name="don_vi_thu_huong">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Đơn vị bảo trợ:</label>
                                    <input type="text" class="form-control" name="don_vi_bao_tro">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Đối tượng hỗ trợ:</label>
                                <input type="text" class="form-control" name="doi_tuong_ho_tro">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Loại hình hỗ trợ:</label>
                                <input type="text" class="form-control" name="loai_ho_tro" value="thiết bị"
                                    placeholder="VD: thiết bị, quà, tiền mặt, xe lăn, sách vở...">
                                <div class="form-text">Không phải đợt nào cũng là "thiết bị" — có thể là quà, tiền
                                    mặt, xe lăn...</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Số người đã nhận hỗ trợ:</label>
                                    <input type="number" class="form-control" name="so_co_thiet_bi" value="0">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Số người chưa nhận hỗ trợ:</label>
                                    <input type="number" class="form-control" name="so_chua_thiet_bi" value="0">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Chỉ tiêu số lượng:</label>
                                    <input type="number" class="form-control" name="chi_tieu_so_luong" value="0">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Số người đã được hỗ trợ:</label>
                                    <input type="number" class="form-control" name="so_luong_hien_tai" value="0">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Mô tả:</label>
                                <textarea class="form-control" name="mo_ta" rows="2"></textarea>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                <a href="dong_hanh_admin.php" class="btn btn-outline-secondary px-4">
                                    <i class="fa-solid fa-arrow-left me-1"></i> Quay lại
                                </a>
                                <button type="submit" class="btn btn-success px-5 fw-bold shadow-sm">
                                    <i class="fa-solid fa-plus me-1"></i> Tạo chương trình
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <script>
    // Cập nhật nhãn "Số người đã/chưa có [loại hình hỗ trợ]" theo thời gian thực
    function capNhatNhanLoaiHoTro() {
        const val = document.getElementById('input-loai-ho-tro').value.trim() || 'thiết bị';
        document.getElementById('nhan-da-co').innerText = val;
        document.getElementById('nhan-chua-co').innerText = val;
    }

    function confirmHoanThanh() {
        const ok = confirm(
            "Bạn có chắc muốn XÁC NHẬN HOÀN THÀNH chương trình này?\n\n" +
            "Chương trình sẽ được chuyển vào mục 'Lịch sử triển khai' trên trang Đồng hành " +
            "và không còn hiển thị ở Tab 'Tài trợ' nữa."
        );
        if (ok) {
            document.getElementById('form-action').value = 'hoan_thanh';
        }
        return ok;
    }
    </script>

</body>

</html>