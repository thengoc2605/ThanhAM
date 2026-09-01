<?php
require_once '../connect.php';
require_once 'header_admin.php';

// Lấy danh sách Đăng ký tài trợ
$stmt_tai_tro = $pdo->query("SELECT * FROM tai_tro ORDER BY id DESC");
$ds_tai_tro = $stmt_tai_tro->fetchAll(PDO::FETCH_ASSOC);

// Lấy danh sách Đối tác đồng hành
$stmt_dong_hanh = $pdo->query("SELECT * FROM dong_hanh_chien_luoc ORDER BY id DESC");
$ds_dong_hanh = $stmt_dong_hanh->fetchAll(PDO::FETCH_ASSOC);

// Lấy danh sách chương trình ĐÃ HOÀN THÀNH (hiển thị ở trang Đồng hành - Tab Lịch sử)
$stmt_lich_su = $pdo->query("SELECT * FROM chuong_trinh WHERE trang_thai = 'da_hoan_thanh' ORDER BY id DESC");
$ds_lich_su = $stmt_lich_su->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid px-4">
    <!-- Nút chuyển đổi Tab dữ liệu -->
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h4 class="fw-bold text-primary mb-0"><i class="fa-solid fa-table me-2"></i>Dữ Liệu Đồng Hành & Tài Trợ</h4>
        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-primary" onclick="showSection('tai-tro')">Danh sách Tài Trợ</button>
            <button class="btn btn-info text-white" onclick="showSection('dong-hanh')">Đối Tác Chiến Lược</button>
            <button class="btn btn-secondary text-white" onclick="showSection('lich-su')">Lịch Sử Chương Trình</button>
            <a href="sua_chuong_trinh.php" class="btn btn-warning text-dark fw-bold shadow-sm">
                <i class="fa-solid fa-gear me-1"></i> Cấu Hình Chương Trình
            </a>
            <a href="sua_bao_cao_tac_dong.php" class="btn btn-dark fw-bold shadow-sm">
                <i class="fa-solid fa-chart-pie me-1"></i> Báo Cáo Tác Động
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

    <!-- Bảng Lịch Sử Chương Trình (đã hoàn thành - đang hiển thị công khai ở trang Đồng hành) -->
    <div class="card shadow mb-4 d-none" id="section-lich-su">
        <div class="card-header py-3 bg-secondary text-white d-flex justify-content-between align-items-center">
            <h6 class="m-0 fw-bold"><i class="fa-solid fa-clock-rotate-left me-2"></i>Lịch Sử Chương Trình Đã Hoàn
                Thành</h6>
            <a href="sua_chuong_trinh.php" class="btn btn-sm btn-light fw-bold">
                <i class="fa-solid fa-gear me-1"></i> Quản lý chương trình hiện tại
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên Chương Trình</th>
                            <th>Địa Điểm</th>
                            <th>Thời Gian</th>
                            <th>Đã Hỗ Trợ / Chỉ Tiêu</th>
                            <th>Tổng Kết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ds_lich_su)): ?>
                        <?php foreach ($ds_lich_su as $ls): ?>
                        <tr>
                            <td><?= $ls['id'] ?></td>
                            <td><b><?= htmlspecialchars($ls['tieu_de']) ?></b></td>
                            <td><?= htmlspecialchars($ls['dia_diem'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ls['thoi_gian'] ?? '') ?></td>
                            <td><span class="badge bg-success"><?= (int)$ls['so_luong_hien_tai'] ?> /
                                    <?= (int)$ls['chi_tieu_so_luong'] ?></span></td>
                            <td><?= htmlspecialchars($ls['mo_ta'] ?? '') ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Chưa có chương trình nào được xác nhận hoàn thành</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <p class="text-muted small mt-2 mb-0">
                <i class="fa-solid fa-circle-info me-1"></i>
                Danh sách này được đưa vào Tab "Lịch sử triển khai" trên trang công khai Đồng hành. Để thêm chương
                trình mới vào đây, hãy vào <strong>Cấu Hình Chương Trình</strong> và bấm nút
                <strong>"Xác nhận hoàn thành"</strong>.
            </p>
        </div>
    </div>
</div>

<script>
function showSection(type) {
    const sections = ['tai-tro', 'dong-hanh', 'lich-su'];
    sections.forEach(s => {
        document.getElementById('section-' + s).classList.add('d-none');
    });
    document.getElementById('section-' + type).classList.remove('d-none');
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>