<?php
require_once '../connect.php';
require_once 'header_admin.php'; 

// Lấy danh sách Đăng ký tài trợ
$stmt_tai_tro = $pdo->query("SELECT * FROM tai_tro ORDER BY id DESC");
$ds_tai_tro = $stmt_tai_tro->fetchAll(PDO::FETCH_ASSOC);

// Lấy danh sách Đối tác đồng hành
$stmt_dong_hanh = $pdo->query("SELECT * FROM dong_hanh_chien_luoc ORDER BY id DESC");
$ds_dong_hanh = $stmt_dong_hanh->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid px-4">
    <!-- Nút chuyển đổi Tab dữ liệu -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-primary mb-0"><i class="fa-solid fa-table me-2"></i>Dữ Liệu Đồng Hành & Tài Trợ</h4>
        <div>
            <button class="btn btn-primary me-2" onclick="showSection('tai-tro')">Danh sách Tài Trợ</button>
            <button class="btn btn-info text-white" onclick="showSection('dong-hanh')">Đối Tác Chiến Lược</button>
            <a href="sua_chuong_trinh.php" class="btn btn-warning text-dark fw-bold shadow-sm">
                <i class="fa-solid fa-gear me-1"></i> Cấu Hình Chương Trình
            </a>
        </div>
    </div>

    <!-- Bảng Tài Trợ -->
    <div class="card shadow mb-4" id="section-tai-tro">
        <div class="card-header py-3 bg-primary text-white">
            <h6 class="m-0 fw-bold"><i class="fa-solid fa-heart me-2"></i>Danh Sách Đăng Ký Tài Trợ (Cá nhân/Tổ chức)
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Họ Tên</th>
                            <th>Số Điện Thoại</th>
                            <th>Email</th>
                            <th>Hình Thức</th>
                            <th>Mã Giao Dịch</th>
                            <th>Lời Nhắn</th>
                            <th>Ngày Tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ds_tai_tro)): ?>
                        <?php foreach ($ds_tai_tro as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><b><?= htmlspecialchars($row['ho_ten']) ?></b></td>
                            <td><?= htmlspecialchars($row['sdt']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td>
                                <?php if ($row['hinh_thuc'] == 'tien_mat'): ?>
                                <span class="badge bg-success">Tiền mặt</span>
                                <?php else: ?>
                                <span class="badge bg-info text-dark">Thiết bị</span>
                                <?php endif; ?>
                            </td>
                            <td><code><?= htmlspecialchars($row['ma_giao_dich'] ?? 'N/A') ?></code></td>
                            <td><?= htmlspecialchars($row['loi_nhan']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($row['ngay_tao'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Chưa có dữ liệu</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bảng Đối Tác Chiến Lược -->
    <div class="card shadow mb-4 d-none" id="section-dong-hanh">
        <div class="card-header py-3 bg-info text-white">
            <h6 class="m-0 fw-bold"><i class="fa-solid fa-briefcase me-2"></i>Danh Sách Đối Tác Đồng Hành Chiến Lược
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Người Đại Diện</th>
                            <th>Tên Doanh Nghiệp</th>
                            <th>Số Điện Thoại</th>
                            <th>Email</th>
                            <th>Gói Hợp Tác</th>
                            <th>Ngày Đăng Ký</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ds_dong_hanh)): ?>
                        <?php foreach ($ds_dong_hanh as $dh): ?>
                        <tr>
                            <td><?= $dh['id'] ?></td>
                            <td><b><?= htmlspecialchars($dh['ho_ten_dai_dien']) ?></b></td>
                            <td><span
                                    class="text-primary fw-bold"><?= htmlspecialchars($dh['ten_doanh_nghiep']) ?></span>
                            </td>
                            <td><?= htmlspecialchars($dh['sdt']) ?></td>
                            <td><?= htmlspecialchars($dh['email']) ?></td>
                            <td><span
                                    class="badge bg-warning text-dark"><?= htmlspecialchars($dh['goi_hop_tac']) ?></span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($dh['ngay_tao'])) ?></td>
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
function showSection(type) {
    if (type === 'tai-tro') {
        document.getElementById('section-tai-tro').classList.remove('d-none');
        document.getElementById('section-dong-hanh').classList.add('d-none');
    } else {
        document.getElementById('section-dong-hanh').classList.remove('d-none');
        document.getElementById('section-tai-tro').classList.add('d-none');
    }
}
</script>
<script href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>