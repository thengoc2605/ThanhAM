<?php
session_start();
require_once '../connect.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$action = $_POST['action'] ?? '';
$message = '';
$error = '';

try {
    if ($action === 'save') {
        $id = (int)($_POST['id'] ?? 0);
        $so_thu_tu = max(1, (int)($_POST['so_thu_tu'] ?? 1));
        $thoi_gian = trim($_POST['thoi_gian'] ?? '');
        $tieu_de = trim($_POST['tieu_de'] ?? '');
        $mo_ta = trim($_POST['mo_ta'] ?? '');
        $la_hien_tai = isset($_POST['la_hien_tai']) ? 1 : 0;

        if ($thoi_gian === '' || $tieu_de === '' || $mo_ta === '') {
            throw new RuntimeException('Vui lòng nhập đầy đủ thời gian, tiêu đề và mô tả.');
        }

        $pdo->beginTransaction();
        if ($la_hien_tai) {
            $pdo->exec('UPDATE lo_trinh_phat_trien SET la_hien_tai = 0');
        }
        if ($id > 0) {
            $stmt = $pdo->prepare('UPDATE lo_trinh_phat_trien SET so_thu_tu = ?, thoi_gian = ?, tieu_de = ?, mo_ta = ?, la_hien_tai = ? WHERE id = ?');
            $stmt->execute([$so_thu_tu, $thoi_gian, $tieu_de, $mo_ta, $la_hien_tai, $id]);
            $message = 'Đã cập nhật giai đoạn.';
        } else {
            $stmt = $pdo->prepare('INSERT INTO lo_trinh_phat_trien (so_thu_tu, thoi_gian, tieu_de, mo_ta, la_hien_tai) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$so_thu_tu, $thoi_gian, $tieu_de, $mo_ta, $la_hien_tai]);
            $message = 'Đã thêm giai đoạn.';
        }
        $pdo->commit();
    } elseif ($action === 'delete') {
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0) {
            $stmt = $pdo->prepare('DELETE FROM lo_trinh_phat_trien WHERE id = ?');
            $stmt->execute([$id]);
            $message = 'Đã xóa giai đoạn.';
        }
    }
} catch (Throwable $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    $error = $e->getMessage();
}

$edit_stage = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare('SELECT * FROM lo_trinh_phat_trien WHERE id = ?');
    $stmt->execute([(int)$_GET['edit']]);
    $edit_stage = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}
$stages = $pdo->query('SELECT * FROM lo_trinh_phat_trien ORDER BY so_thu_tu ASC, id ASC')->fetchAll(PDO::FETCH_ASSOC);
require_once 'header_admin.php';
?>

<div class="container-fluid px-4 pb-5">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fa-solid fa-timeline me-2 text-warning"></i>Quản Lý Lộ Trình Phát Triển</h1>
        <a href="../pages/vethanham.php?tab=lichsu" target="_blank" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-up-right-from-square me-1"></i>Xem trang công khai</a>
    </div>

    <?php if ($message): ?><div class="alert alert-success"><?= htmlspecialchars($message) ?></div><?php endif; ?>
    <?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning fw-bold"><?= $edit_stage ? 'Sửa giai đoạn' : 'Thêm giai đoạn' ?></div>
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="action" value="save">
                        <input type="hidden" name="id" value="<?= (int)($edit_stage['id'] ?? 0) ?>">
                        <div class="mb-3"><label class="form-label fw-semibold">Số thứ tự</label><input type="number" min="1" name="so_thu_tu" class="form-control" required value="<?= htmlspecialchars($edit_stage['so_thu_tu'] ?? (count($stages) + 1)) ?>"></div>
                        <div class="mb-3"><label class="form-label fw-semibold">Thời gian</label><input type="text" name="thoi_gian" class="form-control" required value="<?= htmlspecialchars($edit_stage['thoi_gian'] ?? '') ?>" placeholder="Giai đoạn 1 · 06/2025 - 08/2025"></div>
                        <div class="mb-3"><label class="form-label fw-semibold">Tiêu đề</label><input type="text" name="tieu_de" class="form-control" required value="<?= htmlspecialchars($edit_stage['tieu_de'] ?? '') ?>"></div>
                        <div class="mb-3"><label class="form-label fw-semibold">Mô tả</label><textarea name="mo_ta" class="form-control" rows="6" required><?= htmlspecialchars($edit_stage['mo_ta'] ?? '') ?></textarea></div>
                        <div class="form-check mb-3"><input type="checkbox" name="la_hien_tai" class="form-check-input" id="la_hien_tai" <?= !empty($edit_stage['la_hien_tai']) ? 'checked' : '' ?>><label class="form-check-label" for="la_hien_tai">Đánh dấu là giai đoạn hiện tại</label></div>
                        <button class="btn btn-primary w-100" type="submit"><i class="fa-solid fa-floppy-disk me-1"></i><?= $edit_stage ? 'Lưu thay đổi' : 'Thêm giai đoạn' ?></button>
                        <?php if ($edit_stage): ?><a href="lo_trinh_phat_trien.php" class="btn btn-link w-100 mt-2">Hủy sửa</a><?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold">Danh sách giai đoạn</div>
                <div class="card-body p-0"><div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead class="table-light"><tr><th>STT</th><th>Giai đoạn</th><th>Thời gian</th><th>Trạng thái</th><th class="text-end">Thao tác</th></tr></thead><tbody>
                <?php foreach ($stages as $stage): ?><tr><td class="fw-bold"><?= (int)$stage['so_thu_tu'] ?></td><td><div class="fw-bold"><?= htmlspecialchars($stage['tieu_de']) ?></div><small class="text-muted"><?= htmlspecialchars($stage['mo_ta']) ?></small></td><td><?= htmlspecialchars($stage['thoi_gian']) ?></td><td><?= !empty($stage['la_hien_tai']) ? '<span class="badge bg-success">Hiện tại</span>' : '' ?></td><td class="text-end text-nowrap"><a href="?edit=<?= (int)$stage['id'] ?>" class="btn btn-sm btn-outline-primary" title="Sửa"><i class="fa-solid fa-pen"></i></a> <form method="post" class="d-inline" onsubmit="return confirm('Xóa giai đoạn này?');"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= (int)$stage['id'] ?>"><button class="btn btn-sm btn-outline-danger" title="Xóa"><i class="fa-solid fa-trash"></i></button></form></td></tr><?php endforeach; ?>
                <?php if (!$stages): ?><tr><td colspan="5" class="text-center text-muted py-4">Chưa có dữ liệu. Hãy import migration và thêm giai đoạn đầu tiên.</td></tr><?php endif; ?>
                </tbody></table></div></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
