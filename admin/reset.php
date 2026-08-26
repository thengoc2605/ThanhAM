<?php
require_once '../connect.php'; // Đảm bảo đường dẫn này trỏ đúng file connect của bạn

// Tạo mã hóa an toàn cho mật khẩu 'admin123'
$new_password = password_hash('admin123', PASSWORD_DEFAULT);

// Cập nhật vào bảng users
$sql = "UPDATE users SET password = '$new_password' WHERE username = 'admin'";

if ($pdo->query($sql)) {
    echo "<h3>Thành công!</h3>";
    echo "<p>Mật khẩu cho tài khoản <b>admin</b> đã được đặt lại thành: <b>admin123</b></p>";
    echo "<p>Hãy quay lại trang <a href='login.php'>login.php</a> để đăng nhập.</p>";
    echo "<p style='color:red;'>LƯU Ý: Sau khi đăng nhập thành công, hãy <b>XÓA file reset.php này đi</b> để bảo mật hệ thống!</p>";
} else {
    echo "Có lỗi xảy ra khi cập nhật mật khẩu.";
}
?>