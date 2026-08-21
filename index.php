<?php
require_once 'config.php';
require_once 'connect.php';
include 'includes/header.php';

// Truy vấn dữ liệu từ CSDL
$result_programs = $conn->query("SELECT * FROM programs WHERE status = 'ongoing' ORDER BY id DESC LIMIT 3");
$result_kpis = $conn->query("SELECT * FROM impact_kpis LIMIT 4");
$result_features = $conn->query("SELECT * FROM features WHERE status = 1 LIMIT 3");
?>

<!-- 1. HERO SECTION (Hiện đại, thu hút nhà đầu tư) -->
<section class="hero-section">
    <div class="hero-bg-overlay"></div>
    <div class="container hero-container">
        <div class="hero-content">
            <span class="badge-tag"><i class="fa-solid fa-sparkles"></i> AI vì Cộng Đồng 2026</span>
            <h1 class="hero-title">THANH ÂM – Trao Tiếng Nói, Chạm Trái Tim Bằng Công Nghệ AI</h1>
            <p class="hero-subtitle">
                Giải pháp trí tuệ nhân tạo tiên phong hỗ trợ giao tiếp cho người yếu thế và học sinh khiếm thanh.
                Đồng hành cùng doanh nghiệp kiến tạo giá trị CSR bền vững.
            </p>

            <div class="hero-actions">
                <a href="<?php echo BASE_URL; ?>pages/dong-hanh.php" class="btn btn-primary-gradient btn-lg">
                    <i class="fa-solid fa-handshake"></i> Hợp Tác & Đầu Tư CSR
                </a>
                <a href="<?php echo BASE_URL; ?>pages/trai-nghiem.php" class="btn btn-glass btn-lg">
                    <i class="fa-solid fa-circle-play"></i> Trải Nghiệm AI
                </a>
            </div>

            <!-- Thanh tra cứu nhanh -->
            <form action="<?php echo BASE_URL; ?>pages/danh-sach-tai-tro.php" method="GET" class="hero-search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="keyword" placeholder="Tra cứu mã chứng nhận tài trợ, tên nhà đầu tư...">
                <button type="submit">Tra cứu</button>
            </form>
        </div>
    </div>
</section>

<!-- 2. QUICK NAV BAR (6 Khối tính năng nổi) -->
<div class="quick-nav-container">
    <div class="container">
        <div class="quick-nav-grid">
            <a href="<?php echo BASE_URL; ?>pages/ve-thanh-am.php" class="quick-card">
                <div class="quick-icon"><i class="fa-solid fa-building-user"></i></div>
                <span>Về Dự Án</span>
            </a>
            <a href="<?php echo BASE_URL; ?>pages/giai-phap.php" class="quick-card">
                <div class="quick-icon"><i class="fa-solid fa-brain"></i></div>
                <span>Giải Pháp AI</span>
            </a>
            <a href="<?php echo BASE_URL; ?>pages/trai-nghiem.php" class="quick-card">
                <div class="quick-icon"><i class="fa-solid fa-mobile-vibration"></i></div>
                <span>Trải Nghiệm App</span>
            </a>
            <a href="<?php echo BASE_URL; ?>pages/dong-hanh.php" class="quick-card">
                <div class="quick-icon"><i class="fa-solid fa-heart-circle-check"></i></div>
                <span>Đồng Hành CSR</span>
            </a>
            <a href="<?php echo BASE_URL; ?>pages/tac-dong.php" class="quick-card">
                <div class="quick-icon"><i class="fa-solid fa-chart-pie"></i></div>
                <span>Tác Động Xã Hội</span>
            </a>
            <a href="<?php echo BASE_URL; ?>pages/thu-vien-ho-so.php" class="quick-card">
                <div class="quick-icon"><i class="fa-solid fa-file-pdf"></i></div>
                <span>Hồ Sơ Năng Lực</span>
            </a>
        </div>
    </div>
</div>

<!-- 3. BÀI TOÁN & GIẢI PHÁP AI CỐT LÕI -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="section-header">
            <span class="sub-title">CÔNG NGHỆ TIÊN PHONG</span>
            <h2>Giải Pháp AI Hỗ Trợ Giao Tiếp Tối Ưu</h2>
            <p>Ứng dụng mô hình nhận dạng giọng nói chuyên biệt cho phát âm không chuẩn</p>
        </div>

        <div class="feature-grid">
            <?php if ($result_features && $result_features->num_rows > 0): ?>
            <?php while($feat = $result_features->fetch_assoc()): ?>
            <div class="feature-card">
                <div class="feature-icon-box">
                    <i class="fa-solid <?php echo htmlspecialchars($feat['icon']); ?>"></i>
                </div>
                <h3><?php echo htmlspecialchars($feat['title']); ?></h3>
                <p><?php echo htmlspecialchars($feat['summary']); ?></p>
                <a href="<?php echo BASE_URL; ?>pages/giai-phap.php" class="link-arrow">Tìm hiểu công nghệ <i
                        class="fa-solid fa-arrow-right"></i></a>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 4. CHỈ SỐ TÁC ĐỘNG XÃ HỘI (Minh bạch với Nhà đầu tư) -->
<section class="section-padding bg-gradient-dark text-white">
    <div class="container">
        <div class="section-header text-white">
            <span class="sub-title text-cyan">MINH BẠCH & ĐO LƯỜNG</span>
            <h2>Chỉ Số Tác Động Xã Hội (S-ROI)</h2>
            <p>Mọi đóng góp đều được số hóa và báo cáo minh bạch theo chuẩn mực CSR</p>
        </div>

        <div class="kpi-grid">
            <?php if ($result_kpis && $result_kpis->num_rows > 0): ?>
            <?php while($kpi = $result_kpis->fetch_assoc()): ?>
            <div class="kpi-box">
                <div class="kpi-num"><?php echo number_format($kpi['kpi_value']); ?>+</div>
                <div class="kpi-name"><?php echo htmlspecialchars($kpi['kpi_title']); ?></div>
                <span class="kpi-sub"><?php echo htmlspecialchars($kpi['sub_text']); ?></span>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 5. CHƯƠNG TRÌNH KÊU GỌI ĐỒNG HÀNH (CSR & INVESTMENT) -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="section-header">
            <span class="sub-title">CƠ HỘI ĐỒNG HÀNH</span>
            <h2>Chương Trình Cần Sự Chung Tay</h2>
            <p>Kết nối nguồn lực doanh nghiệp để mở rộng quy mô dự án ra toàn quốc</p>
        </div>

        <div class="program-grid">
            <?php if ($result_programs && $result_programs->num_rows > 0): ?>
            <?php while($prog = $result_programs->fetch_assoc()): ?>
            <div class="program-card-modern">
                <div class="prog-badge"><i class="fa-solid fa-location-dot"></i>
                    <?php echo htmlspecialchars($prog['location']); ?></div>
                <h3><?php echo htmlspecialchars($prog['title']); ?></h3>
                <p class="prog-desc"><?php echo htmlspecialchars($prog['description']); ?></p>

                <div class="prog-meta">
                    <span>Đơn vị nhận:
                        <strong><?php echo htmlspecialchars($prog['beneficiary_unit']); ?></strong></span>
                    <?php $percent = ($prog['target_count'] > 0) ? round(($prog['current_count'] / $prog['target_count']) * 100) : 0; ?>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar-fill" style="width: <?php echo $percent; ?>%;"></div>
                    </div>
                    <div class="prog-stats">
                        <span>Tiến độ:
                            <strong><?php echo $prog['current_count']; ?>/<?php echo $prog['target_count']; ?></strong></span>
                        <span class="text-primary font-bold"><?php echo $percent; ?>%</span>
                    </div>
                </div>

                <a href="<?php echo BASE_URL; ?>pages/dong-hanh.php?program_id=<?php echo $prog['id']; ?>"
                    class="btn btn-primary-gradient w-100 text-center">
                    Đồng Hành Ngay
                </a>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 6. BANNER GỌI VỐN / HỢP TÁC CSR (CTA) -->
<section class="cta-banner">
    <div class="container cta-flex">
        <div class="cta-text">
            <h2>Bạn Là Doanh Nghiệp Hoặc Nhà Đầu Tư Tác Động?</h2>
            <p>Tải ngay Hồ Sơ Năng Lực để xem chi tiết mô hình hoạt động và kế hoạch phát triển 2026.</p>
        </div>
        <div class="cta-buttons">
            <a href="<?php echo BASE_URL; ?>pages/thu-vien-ho-so.php" class="btn btn-light-btn">
                <i class="fa-solid fa-download"></i> Tải Hồ Sơ Năng Lực
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>