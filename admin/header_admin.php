<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra quyền truy cập Admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ Thống Quản Trị - Dự Án Thanh Âm</title>
    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-white" href="dashboard.php">
                <i class="fa-solid fa-compact-disc me-2 text-info"></i>Thanh Âm Admin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard.php"><i class="fa-solid fa-house me-1"></i> Trang
                            Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dong_hanh_admin.php"><i
                                class="fa-solid fa-handshake me-1"></i> Quyên Góp & Đồng Hành</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="lo_trinh_phat_trien.php"><i class="fa-solid fa-timeline me-1"></i> Lộ Trình</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="giai_phap_admin.php"><i class="fa-solid fa-wand-magic-sparkles me-1"></i> Giải Pháp</a>
                    </li>
                    <!-- Bây tự thêm nha -->
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-50" href="#"><i class="fa-solid fa-book-open me-1"></i>
                            Bánh mì </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-50" href="#"><i class="fa-solid fa-file-pdf me-1"></i>
                            Bánh bao
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center text-white">
                    <span class="me-3 small">
                        Xin chào, <b><?= htmlspecialchars($_SESSION['admin_username'] ?? 'Admin') ?></b>
                    </span>
                    <a href="logout.php" class="btn btn-outline-light btn-sm">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Đăng xuất
                    </a>
                </div>
            </div>
        </div>
    </nav>