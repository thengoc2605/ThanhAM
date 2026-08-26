<?php
require_once '../connect.php'; // Đảm bảo gọi đúng file kết nối

// 1. Tạo mật khẩu mã hóa chuẩn từ chính máy tính của bạn
$mat_khau_moi = 'admin123';
$hash_chuan = password_hash($mat_khau_moi, PASSWORD_DEFAULT);

// 2. Kiểm tra xem tài khoản admin có tồn tại không
$stmt = $pdo->query("SELECT * FROM nguoi_dung WHERE ten_dang_nhap = 'admin'");
$user = $stmt->fetch();

if (!$user) {
    // Nếu chưa có tài khoản admin (do lỗi lúc import SQL), tự động tạo mới
    $sql_insert = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, ho_ten, vai_tro) 
                   VALUES ('admin', '$hash_chuan', 'Quản Trị Viên', 'quan_tri')";
    $pdo->query($sql_insert);
    echo "<h3 style='color: green;'>Đã tạo mới tài khoản thành công!</h3>";
} else {
    // Nếu đã có, tiến hành cập nhật lại mật khẩu
    $sql_update = "UPDATE nguoi_dung SET mat_khau = '$hash_chuan' WHERE ten_dang_nhap = 'admin'";
    $pdo->query($sql_update);
    echo "<h3 style='color: blue;'>Đã đặt lại mật khẩu thành công!</h3>";
}

echo "<p>Tài khoản: <b>admin</b></p>";
echo "<p>Mật khẩu: <b>admin123</b></p>";
echo "<br><a href='login.php' style='padding: 10px 20px; background: #0d6efd; color: white; text-decoration: none; border-radius: 5px;'>Quay lại trang Đăng nhập</a>";
?>