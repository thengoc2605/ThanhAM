<?php
// Tắt hiển thị lỗi HTML để không làm hỏng chuỗi JSON trả về
error_reporting(0); 
header('Content-Type: application/json');
require_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ho_ten    = trim($_POST['ho_ten'] ?? '');
    $sdt       = trim($_POST['sdt'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $hinh_thuc = trim($_POST['hinh_thuc'] ?? 'tienmat');
    $loi_nhan  = trim($_POST['loi_nhan'] ?? '');

    if (empty($ho_ten) || empty($sdt) || empty($email)) {
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin bắt buộc!']);
        exit;
    }

    // 1. Nếu tài trợ Thiết bị -> Lưu trực tiếp
    if ($hinh_thuc === 'thietbi') {
        $stmt = $pdo->prepare("INSERT INTO tai_tro (ho_ten, sdt, email, hinh_thuc, loi_nhan, trang_thai) VALUES (?, ?, ?, ?, ?, 'completed')");
        $stmt->execute([$ho_ten, $sdt, $email, $hinh_thuc, $loi_nhan]);
        echo json_encode(['status' => 'success', 'type' => 'thietbi']);
        exit;
    }

    // 2. Nếu tài trợ Tiền mặt 
    // ĐÃ SỬA: Ghép thêm thời gian (timestamp) và một số ngẫu nhiên để đảm bảo tính duy nhất tuyệt đối.
    // Mã sinh ra sẽ có dạng: TT0865357517_1718...
    $sdt_sach = preg_replace('/[^0-9]/', '', $sdt);
    $ma_giao_dich = "TT" . $sdt_sach . "_" . time() . rand(10, 99);

    /* ========== TẠM THỜI TẮT CHECK NGÂN HÀNG ĐỂ TEST FORM ==========
    $checkBank = $pdo->prepare("SELECT * FROM bank_transactions WHERE noi_dung LIKE ? OR ma_giao_dich = ? LIMIT 1");
    $checkBank->execute(['%' . $ma_giao_dich . '%', $ma_giao_dich]);
    $transaction = $checkBank->fetch();

    if (!$transaction) {
        echo json_encode([
            'status' => 'error', 
            'message' => 'Hệ thống chưa ghi nhận tiền chuyển khoản cho cú pháp [' . $ma_giao_dich . ']. Vui lòng hoàn thành chuyển khoản hoặc chờ 1-2 phút rồi bấm lại!'
        ]);
        exit;
    }
    ================================================================*/

    // Mặc định cho qua và lưu luôn vào CSDL (sau này làm tool ngân hàng xong thì mở comment ra)
    try {
        $stmt = $pdo->prepare("INSERT INTO tai_tro (ho_ten, sdt, email, hinh_thuc, loi_nhan, ma_giao_dich, trang_thai) VALUES (?, ?, ?, ?, ?, ?, 'completed')");
        $stmt->execute([$ho_ten, $sdt, $email, $hinh_thuc, $loi_nhan, $ma_giao_dich]);

        echo json_encode(['status' => 'success', 'type' => 'tienmat']);
    } catch (PDOException $e) {
        // Tùy chọn: Chỉnh sửa lại câu thông báo lỗi cho thân thiện hơn với người dùng
        echo json_encode(['status' => 'error', 'message' => 'Hệ thống đang xử lý nhiều giao dịch, vui lòng thử lại!']);
    }
}
?>