<?php
session_start();
require_once '../connect.php'; // Đảm bảo đường dẫn đúng tới file connect của bạn

// Nếu đã đăng nhập rồi thì chuyển thẳng vào dashboard
if (isset($_SESSION['admin_logged_in'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = 'Vui lòng nhập đầy đủ thông tin!';
    } else {
        // Truy vấn đúng bảng nguoi_dung và cột ten_dang_nhap
        $stmt = $pdo->prepare("SELECT * FROM nguoi_dung WHERE ten_dang_nhap = ? LIMIT 1");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        // Đã sửa 'password' thành 'mat_khau' theo CSDL mới
        if ($admin && password_verify($password, $admin['mat_khau'])) {
            $_SESSION['admin_logged_in'] = true;
            // Đã sửa 'username' thành 'ten_dang_nhap' theo CSDL mới
            $_SESSION['admin_username'] = $admin['ten_dang_nhap'];
            
            // Bạn có thể lưu thêm họ tên để hiển thị trên thẻ điều hướng ở trang dashboard
            $_SESSION['admin_name'] = $admin['ho_ten']; 
            
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Sai tài khoản hoặc mật khẩu!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Quản trị - Thanh Âm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">THANH ÂM ADMIN</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($error): ?>
                        <div class="alert alert-danger py-2"><?= $error ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label>Tên đăng nhập</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>