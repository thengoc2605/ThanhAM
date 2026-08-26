<?php
header('Content-Type: application/json');
require_once '../connect.php'; // Gọi file connect từ thư mục gốc

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ho_ten = trim($_POST['ho_ten'] ?? '');
    $ten_dn = trim($_POST['ten_dn'] ?? '');
    $sdt    = trim($_POST['sdt'] ?? '');
    $email  = trim($_POST['email'] ?? '');
    $goi    = trim($_POST['goi_hop_tac'] ?? 'Chưa chọn gói');

    if (empty($ho_ten) || empty($ten_dn) || empty($sdt) || empty($email)) {
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin bắt buộc!']);
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO dong_hanh_chien_luoc (ho_ten_dai_dien, ten_doanh_nghiep, sdt, email, goi_hop_tac) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$ho_ten, $ten_dn, $sdt, $email, $goi])) {
        echo json_encode(['status' => 'success', 'package' => $goi]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Không thể lưu dữ liệu!']);
    }
}
?>