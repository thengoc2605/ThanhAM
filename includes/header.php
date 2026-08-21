<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>

<body>

    <!-- 1. TOP BAR (Thanh đỏ thẫm trên cùng) -->
    <div class="top-bar">
        <div class="container top-bar-content">
            <div class="top-links">
                <a href="<?php echo BASE_URL; ?>pages/ve-thanh-am.php">VỀ THANH ÂM</a>
                <a href="<?php echo BASE_URL; ?>pages/media.php">TIN TỨC & MEDIA</a>
                <a href="<?php echo BASE_URL; ?>pages/thu-vien-ho-so.php">HỒ SƠ TÀI LIỆU</a>
                <a href="<?php echo BASE_URL; ?>pages/dong-hanh.php">HỢP TÁC CSR</a>
            </div>
            <div class="top-utils">
                <a href="tel:0865357517"><i class="fa-solid fa-phone"></i> 0865.357.517</a>
                <a href="mailto:thanham.vfy@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                <span class="lang-picker"><i class="fa-solid fa-globe"></i> VI</span>
            </div>
        </div>
    </div>

    <!-- 2. MAIN HEADER (Logo + Nút Đăng ký & Trải nghiệm) -->
    <header class="main-header">
        <div class="container header-container">
            <a href="<?php echo BASE_URL; ?>" class="logo-box">
                <div class="logo-text">THANH ÂM</div>
                <span class="logo-sub">TRAO TIẾNG NÓI - CHẠM TRÁI TIM</span>
            </a>

            <div class="header-right-actions">
                <a href="<?php echo BASE_URL; ?>pages/dong-hanh.php" class="btn btn-outline">
                    <i class="fa-solid fa-hand-holding-heart"></i> Đồng Hành
                </a>
                <a href="<?php echo BASE_URL; ?>pages/trai-nghiem.php" class="btn btn-primary">
                    <i class="fa-solid fa-mobile-screen-button"></i> Trải Nghiệm App
                </a>
            </div>
        </div>
    </header>

    <!-- 3. FLOATING WIDGET (Cố định góc phải) -->
    <div class="floating-widget">
        <a href="https://zalo.me/0912991489" target="_blank" class="widget-btn zalo" title="Chat Zalo">
            <i class="fa-solid fa-comment-dots"></i>
        </a>
        <a href="tel:0865357517" class="widget-btn phone" title="Gọi Hotline">
            <i class="fa-solid fa-phone-volume"></i>
        </a>
        <a href="<?php echo BASE_URL; ?>pages/danh-sach-tai-tro.php" class="widget-btn search" title="Tra cứu">
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>
    </div>