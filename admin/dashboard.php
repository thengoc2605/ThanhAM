<?php
require_once '../connect.php';
require_once 'header_admin.php'; // Header chung

// ---------------------------------------------------------------
// THỐNG KÊ DỮ LIỆU TỪ HỆ THỐNG
// ---------------------------------------------------------------
try {
    $total_tai_tro = (int)$pdo->query("SELECT COUNT(*) FROM tai_tro")->fetchColumn();
} catch (Exception $e) { $total_tai_tro = 0; }

try {
    $total_dong_hanh = (int)$pdo->query("SELECT COUNT(*) FROM dong_hanh_chien_luoc")->fetchColumn();
} catch (Exception $e) { $total_dong_hanh = 0; }

try {
    $total_cau_chuyen = (int)$pdo->query("SELECT COUNT(*) FROM cau_chuyen")->fetchColumn();
} catch (Exception $e) { $total_cau_chuyen = 0; }

try {
    $total_giai_phap = (int)$pdo->query("SELECT COUNT(*) FROM giai_phap_tinh_nang")->fetchColumn();
} catch (Exception $e) { $total_giai_phap = 0; }

try {
    $total_lo_trinh = (int)$pdo->query("SELECT COUNT(*) FROM lo_trinh_phat_trien")->fetchColumn();
} catch (Exception $e) { $total_lo_trinh = 0; }

try {
    $recent_tai_tro = $pdo->query("SELECT * FROM tai_tro ORDER BY id DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) { $recent_tai_tro = []; }

$admin_user = htmlspecialchars($_SESSION['admin_username'] ?? 'Quản Trị Viên');
?>

<!-- =====================================================================
     STYLE TÙY CHỈNH DASHBOARD HIỆN ĐẠI & HIỆU ỨNG MƯỢT MÀ
     ===================================================================== -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
:root {
    --db-navy: #071e33;
    --db-navy-dark: #041220;
    --db-primary: #034f8f;
    --db-primary-light: #e0f2fe;
    --db-cyan: #0284c7;
    --db-magenta: #8c315e;
    --db-magenta-light: #fae8f0;
    --db-red: #d71920;
    --db-gold: #f59e0b;
    --db-gold-light: #fef3c7;
    --db-green: #10b981;
    --db-green-light: #d1fae5;
    --db-purple: #7c3aed;
    --db-purple-light: #ede9fe;

    --db-bg: #f8fafc;
    --db-card-bg: #ffffff;
    --db-text: #0f172a;
    --db-text-muted: #64748b;
    --db-border: #e2e8f0;

    --db-radius-sm: 10px;
    --db-radius-md: 16px;
    --db-radius-lg: 22px;
    --db-radius-xl: 28px;

    --db-shadow-sm: 0 4px 12px rgba(3, 79, 143, 0.05);
    --db-shadow-md: 0 10px 28px rgba(3, 79, 143, 0.08);
    --db-shadow-hover: 0 18px 38px rgba(3, 79, 143, 0.14);
}

body {
    background-color: #f1f5f9 !important;
    font-family: 'Be Vietnam Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    color: var(--db-text) !important;
    -webkit-font-smoothing: antialiased;
}

.db-container {
    max-width: 1540px;
    margin: 0 auto;
    padding: 10px 24px 60px;
}

/* =====================================================================
   HERO WELCOME BANNER WITH ANIMATION
   ===================================================================== */
.db-hero {
    position: relative;
    background: linear-gradient(135deg, #071e33 0%, #034f8f 50%, #8c315e 100%);
    border-radius: var(--db-radius-xl);
    padding: 36px 38px;
    color: #ffffff;
    box-shadow: 0 14px 34px rgba(3, 79, 143, 0.18);
    margin-bottom: 30px;
    overflow: hidden;
    animation: dbSlideDown 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

@keyframes dbSlideDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.db-hero::before {
    content: "";
    position: absolute;
    top: -40%;
    right: -10%;
    width: 450px;
    height: 450px;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.28) 0%, transparent 70%);
    filter: blur(45px);
    pointer-events: none;
    animation: dbPulseGlow 6s ease-in-out infinite alternate;
}

.db-hero::after {
    content: "";
    position: absolute;
    bottom: -50%;
    left: 20%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(215, 25, 32, 0.2) 0%, transparent 70%);
    filter: blur(40px);
    pointer-events: none;
}

@keyframes dbPulseGlow {
    0% { transform: scale(1); opacity: 0.7; }
    100% { transform: scale(1.15); opacity: 1; }
}

.db-hero-content {
    position: relative;
    z-index: 2;
}

.db-greeting-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.14);
    border: 1px solid rgba(255, 255, 255, 0.25);
    padding: 6px 16px;
    border-radius: 999px;
    font-size: 0.82rem;
    font-weight: 700;
    color: #e0f2fe;
    margin-bottom: 12px;
    backdrop-filter: blur(10px);
}

.db-pulse-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #38bdf8;
    box-shadow: 0 0 0 0 rgba(56, 189, 248, 0.7);
    animation: dbDotPulse 2s infinite;
}

@keyframes dbDotPulse {
    0% { box-shadow: 0 0 0 0 rgba(56, 189, 248, 0.7); }
    70% { box-shadow: 0 0 0 8px rgba(56, 189, 248, 0); }
    100% { box-shadow: 0 0 0 0 rgba(56, 189, 248, 0); }
}

.db-hero-title {
    font-family: 'Sora', sans-serif;
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 800;
    margin: 0 0 8px;
    letter-spacing: -0.02em;
    color: #ffffff;
}

.db-hero-desc {
    color: rgba(255, 255, 255, 0.85);
    font-size: 0.98rem;
    max-width: 680px;
    margin: 0 0 20px;
    line-height: 1.6;
}

/* Live Clock & Action Pills */
.db-hero-meta {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
}

.db-clock-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(0, 0, 0, 0.25);
    border: 1px solid rgba(255, 255, 255, 0.18);
    padding: 8px 18px;
    border-radius: 999px;
    font-size: 0.88rem;
    font-weight: 600;
    color: #ffffff;
    backdrop-filter: blur(8px);
}

.db-hero-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #ffffff;
    color: var(--db-navy) !important;
    padding: 9px 20px;
    border-radius: 999px;
    font-weight: 700;
    font-size: 0.88rem;
    text-decoration: none;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    transition: all 0.25s ease;
}

.db-hero-btn:hover {
    background: #e0f2fe;
    color: var(--db-primary) !important;
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.25);
}

/* =====================================================================
   4 KPI STAT CARDS WITH HOVER GLOW
   ===================================================================== */
.db-stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 32px;
}

.db-stat-card {
    background: #ffffff;
    border-radius: var(--db-radius-lg);
    border: 1px solid var(--db-border);
    padding: 24px 22px;
    box-shadow: var(--db-shadow-sm);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    animation: dbCardFadeIn 0.6s ease forwards;
}

@keyframes dbCardFadeIn {
    from { opacity: 0; transform: translateY(16px); }
    to { opacity: 1; transform: translateY(0); }
}

.db-stat-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--db-shadow-hover);
    border-color: #93c5fd;
}

.db-stat-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--stat-grad, linear-gradient(90deg, #034f8f, #0284c7));
}

.db-stat-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 16px;
}

.db-stat-icon-wrap {
    width: 52px;
    height: 52px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    transition: transform 0.3s ease;
}

.db-stat-card:hover .db-stat-icon-wrap {
    transform: scale(1.1) rotate(-6deg);
}

.db-stat-icon-wrap.pink { background: #fee2e2; color: #dc2626; }
.db-stat-icon-wrap.green { background: #d1fae5; color: #059669; }
.db-stat-icon-wrap.blue { background: #e0f2fe; color: #0284c7; }
.db-stat-icon-wrap.gold { background: #fef3c7; color: #d97706; }

.db-stat-badge {
    font-size: 0.74rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 999px;
    background: #f1f5f9;
    color: #475569;
}

.db-stat-num {
    font-family: 'Sora', sans-serif;
    font-size: 2.1rem;
    font-weight: 800;
    color: var(--db-navy);
    line-height: 1;
    margin-bottom: 6px;
}

.db-stat-label {
    font-size: 0.86rem;
    font-weight: 600;
    color: var(--db-text-muted);
}

/* =====================================================================
   MANAGEMENT MODULES (6 CARDS GRID)
   ===================================================================== */
.db-section-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.db-section-title {
    font-family: 'Sora', sans-serif;
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--db-navy);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.db-modules-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-bottom: 36px;
}

.db-module-card {
    background: #ffffff;
    border-radius: var(--db-radius-xl);
    border: 1px solid var(--db-border);
    padding: 30px 26px;
    box-shadow: var(--db-shadow-sm);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.db-module-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--db-shadow-hover);
    border-color: rgba(3, 79, 143, 0.3);
}

.db-module-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.db-module-icon {
    width: 60px;
    height: 60px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    transition: transform 0.3s ease;
}

.db-module-card:hover .db-module-icon {
    transform: scale(1.12);
}

.db-module-icon.cyan { background: #e0f2fe; color: #0284c7; }
.db-module-icon.green { background: #d1fae5; color: #10b981; }
.db-module-icon.gold { background: #fef3c7; color: #d97706; }
.db-module-icon.magenta { background: #fae8f0; color: #8c315e; }
.db-module-icon.purple { background: #ede9fe; color: #7c3aed; }
.db-module-icon.blue { background: #dbeafe; color: #2563eb; }

.db-module-tag {
    font-size: 0.74rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 4px 12px;
    border-radius: 999px;
    background: #f1f5f9;
    color: #475569;
}

.db-module-card h3 {
    font-family: 'Sora', sans-serif;
    font-size: 1.22rem;
    font-weight: 800;
    color: var(--db-navy);
    margin: 0 0 10px;
}

.db-module-card p {
    font-size: 0.9rem;
    color: var(--db-text-muted);
    line-height: 1.62;
    margin: 0 0 24px;
    flex-grow: 1;
}

.db-module-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 12px 18px;
    border-radius: var(--db-radius-md);
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.25s ease;
    border: none;
}

.db-module-btn.cyan { background: #e0f2fe; color: #0369a1; }
.db-module-btn.cyan:hover { background: #0284c7; color: #ffffff; }

.db-module-btn.green { background: #d1fae5; color: #047857; }
.db-module-btn.green:hover { background: #10b981; color: #ffffff; }

.db-module-btn.gold { background: #fef3c7; color: #b45309; }
.db-module-btn.gold:hover { background: #d97706; color: #ffffff; }

.db-module-btn.magenta { background: #fae8f0; color: #9d174d; }
.db-module-btn.magenta:hover { background: #8c315e; color: #ffffff; }

.db-module-btn.purple { background: #ede9fe; color: #6d28d9; }
.db-module-btn.purple:hover { background: #7c3aed; color: #ffffff; }

.db-module-btn.blue { background: #dbeafe; color: #1d4ed8; }
.db-module-btn.blue:hover { background: #2563eb; color: #ffffff; }

/* =====================================================================
   BOTTOM ROW: RECENT ACTIVITY & SYSTEM STATUS
   ===================================================================== */
.db-bottom-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 22px;
}

.db-card-panel {
    background: #ffffff;
    border-radius: var(--db-radius-xl);
    border: 1px solid var(--db-border);
    padding: 26px;
    box-shadow: var(--db-shadow-sm);
}

.db-card-panel-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    padding-bottom: 14px;
    border-bottom: 1px solid var(--db-border);
}

.db-card-panel-head h4 {
    font-family: 'Sora', sans-serif;
    font-size: 1.08rem;
    font-weight: 800;
    color: var(--db-navy);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Recent Donations List */
.db-act-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.db-act-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 14px;
    background: #f8fafc;
    border-radius: var(--db-radius-md);
    border: 1px solid var(--db-border);
    transition: all 0.2s ease;
}

.db-act-item:hover {
    background: #ffffff;
    border-color: #cbd5e1;
    transform: translateX(4px);
    box-shadow: var(--db-shadow-sm);
}

.db-act-user {
    display: flex;
    align-items: center;
    gap: 12px;
}

.db-act-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: var(--db-primary-light);
    color: var(--db-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 0.9rem;
}

.db-act-name {
    font-weight: 700;
    font-size: 0.9rem;
    color: var(--db-navy);
    margin-bottom: 2px;
}

.db-act-date {
    font-size: 0.76rem;
    color: var(--db-text-muted);
}

/* System Health Info */
.db-health-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.db-health-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.88rem;
    padding-bottom: 10px;
    border-bottom: 1px dashed var(--db-border);
}

.db-health-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.db-health-label {
    color: var(--db-text-muted);
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
}

.db-health-val {
    font-weight: 700;
    color: var(--db-navy);
}

/* =====================================================================
   RESPONSIVE DESIGN
   ===================================================================== */
@media (max-width: 1200px) {
    .db-stats-row {
        grid-template-columns: repeat(2, 1fr);
    }
    .db-modules-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .db-bottom-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .db-container {
        padding: 10px 12px 40px;
    }
    .db-hero {
        padding: 24px 20px;
    }
    .db-stats-row {
        grid-template-columns: 1fr;
    }
    .db-modules-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="db-container">

    <!-- ==================== HERO WELCOME BANNER ==================== -->
    <section class="db-hero">
        <div class="db-hero-content">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                <div>
                    <div class="db-greeting-badge">
                        <span class="db-pulse-dot"></span> Hệ Thống Quản Trị Trung Tâm · Dự Án Thanh Âm
                    </div>
                    <h1 class="db-hero-title">
                        Xin chào, <span id="greeting-name"><?= $admin_user ?></span> 👋
                    </h1>
                    <p class="db-hero-desc">
                        Chào mừng bạn trở lại bảng điều khiển! Tại đây bạn có thể theo dõi số liệu quyên góp, quản lý giải pháp AI, lộ trình phát triển và các chiến dịch xã hội.
                    </p>
                </div>
            </div>

            <!-- Meta Clock & Quick Action -->
            <div class="db-hero-meta">
                <div class="db-clock-pill">
                    <i class="fa-regular fa-clock text-warning"></i>
                    <span id="liveClock">Đang cập nhật thời gian...</span>
                </div>
                <a href="../index.php" target="_blank" class="db-hero-btn">
                    <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i> Xem Website Chính
                </a>
                <a href="giai_phap_admin.php" class="db-hero-btn">
                    <i class="fa-solid fa-wand-magic-sparkles text-info"></i> Quản Lý Tính Năng
                </a>
            </div>
        </div>
    </section>

    <!-- ==================== 4 KPI STAT CARDS ==================== -->
    <div class="db-stats-row">
        
        <!-- STAT 1: ĐĂNG KÝ TÀI TRỢ -->
        <div class="db-stat-card" style="--stat-grad: linear-gradient(90deg, #d71920, #f59e0b);">
            <div class="db-stat-top">
                <div class="db-stat-icon-wrap pink">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <span class="db-stat-badge">Quyên góp</span>
            </div>
            <div>
                <div class="db-stat-num counter" data-target="<?= $total_tai_tro ?>"><?= $total_tai_tro ?></div>
                <div class="db-stat-label">Lượt đăng ký tài trợ</div>
            </div>
        </div>

        <!-- STAT 2: ĐỐI TÁC ĐỒNG HÀNH -->
        <div class="db-stat-card" style="--stat-grad: linear-gradient(90deg, #10b981, #0284c7);">
            <div class="db-stat-top">
                <div class="db-stat-icon-wrap green">
                    <i class="fa-solid fa-handshake"></i>
                </div>
                <span class="db-stat-badge">Doanh nghiệp</span>
            </div>
            <div>
                <div class="db-stat-num counter" data-target="<?= $total_dong_hanh ?>"><?= $total_dong_hanh ?></div>
                <div class="db-stat-label">Đối tác đồng hành chiến lược</div>
            </div>
        </div>

        <!-- STAT 3: TÍNH NĂNG GIẢI PHÁP AI -->
        <div class="db-stat-card" style="--stat-grad: linear-gradient(90deg, #0284c7, #034f8f);">
            <div class="db-stat-top">
                <div class="db-stat-icon-wrap blue">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </div>
                <span class="db-stat-badge">Công nghệ AI</span>
            </div>
            <div>
                <div class="db-stat-num counter" data-target="<?= $total_giai_phap ?>"><?= $total_giai_phap ?></div>
                <div class="db-stat-label">Tính năng hệ sinh thái AI</div>
            </div>
        </div>

        <!-- STAT 4: CÂU CHUYỆN & LỘ TRÌNH -->
        <div class="db-stat-card" style="--stat-grad: linear-gradient(90deg, #f59e0b, #d97706);">
            <div class="db-stat-top">
                <div class="db-stat-icon-wrap gold">
                    <i class="fa-solid fa-timeline"></i>
                </div>
                <span class="db-stat-badge">Hành trình</span>
            </div>
            <div>
                <div class="db-stat-num counter" data-target="<?= $total_lo_trinh ?>"><?= $total_lo_trinh ?></div>
                <div class="db-stat-label">Giai đoạn lộ trình phát triển</div>
            </div>
        </div>

    </div>

    <!-- ==================== PHÂN HỆ QUẢN TRỊ CHÍNH (6 CARDS) ==================== -->
    <div class="db-section-head">
        <h2 class="db-section-title">
            <i class="fa-solid fa-shapes text-primary"></i> Các Phân Hệ Quản Lý Hệ Thống
        </h2>
        <span style="font-size: 0.85rem; color: #64748b; font-weight: 600;">6 phân hệ điều khiển</span>
    </div>

    <div class="db-modules-grid">
        
        <!-- MODULE 1: GIẢI PHÁP AI -->
        <div class="db-module-card">
            <div>
                <div class="db-module-head">
                    <div class="db-module-icon cyan">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                    </div>
                    <span class="db-module-tag">AI Solutions</span>
                </div>
                <h3>Tính Năng Giải Pháp AI</h3>
                <p>Thêm, sửa, xóa các tính năng công nghệ AI, cấu hình icon FontAwesome, trình soạn thảo Rich Editor và video minh họa.</p>
            </div>
            <a href="giai_phap_admin.php" class="db-module-btn cyan">
                Quản Lý Tính Năng <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <!-- MODULE 2: ĐỒNG HÀNH & TÀI TRỢ -->
        <div class="db-module-card">
            <div>
                <div class="db-module-head">
                    <div class="db-module-icon green">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <span class="db-module-tag">Sponsorship</span>
                </div>
                <h3>Quyên Góp &amp; Đồng Hành</h3>
                <p>Theo dõi danh sách đăng ký tài trợ tiền mặt, thiết bị và hồ sơ đối tác chiến lược tham gia đồng hành cùng dự án.</p>
            </div>
            <a href="dong_hanh_admin.php" class="db-module-btn green">
                Xem Dữ Liệu Đồng Hành <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <!-- MODULE 3: LỘ TRÌNH PHÁT TRIỂN -->
        <div class="db-module-card">
            <div>
                <div class="db-module-head">
                    <div class="db-module-icon gold">
                        <i class="fa-solid fa-timeline"></i>
                    </div>
                    <span class="db-module-tag">Roadmap</span>
                </div>
                <h3>Lộ Trình Phát Triển</h3>
                <p>Quản lý các cột mốc thời gian từ khởi chạy ý tưởng, giải thưởng INNOX 2026 đến kế hoạch mở rộng thị trường Đông Nam Á.</p>
            </div>
            <a href="lo_trinh_phat_trien.php" class="db-module-btn gold">
                Quản Lý Lộ Trình <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <!-- MODULE 4: CẤU HÌNH CHƯƠNG TRÌNH -->
        <div class="db-module-card">
            <div>
                <div class="db-module-head">
                    <div class="db-module-icon magenta">
                        <i class="fa-solid fa-sliders"></i>
                    </div>
                    <span class="db-module-tag">Campaigns</span>
                </div>
                <h3>Chương Trình Đang Chạy</h3>
                <p>Cập nhật tiêu đề chương trình trao tặng, đối tượng thụ hưởng, đơn vị bảo trợ và chỉ tiêu số lượng thiết bị hỗ trợ.</p>
            </div>
            <a href="sua_chuong_trinh.php" class="db-module-btn magenta">
                Cấu Hình Chương Trình <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <!-- MODULE 5: BÁO CÁO TÁC ĐỘNG -->
        <div class="db-module-card">
            <div>
                <div class="db-module-head">
                    <div class="db-module-icon purple">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>
                    <span class="db-module-tag">Impact Report</span>
                </div>
                <h3>Báo Cáo Tác Động Xã Hội</h3>
                <p>Theo dõi số liệu đo lường tác động xã hội, số giờ giao tiếp được hỗ trợ và mức độ cải thiện ngôn ngữ của trẻ em.</p>
            </div>
            <a href="sua_bao_cao_tac_dong.php" class="db-module-btn purple">
                Xem Báo Cáo Tác Động <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <!-- MODULE 6: TRANG NGƯỜI DÙNG PUBLIC -->
        <div class="db-module-card">
            <div>
                <div class="db-module-head">
                    <div class="db-module-icon blue">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <span class="db-module-tag">Public Site</span>
                </div>
                <h3>Xem Trang Người Dùng</h3>
                <p>Khám phá trực tiếp toàn bộ trải nghiệm người dùng, kiểm tra hiển thị trên thiết bị di động và các trang nội dung.</p>
            </div>
            <a href="../index.php" target="_blank" class="db-module-btn blue">
                Mở Trang Người Dùng <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
        </div>

    </div>

    <!-- ==================== HOẠT ĐỘNG GẦN ĐÂY & THÔNG TIN HỆ THỐNG ==================== -->
    <div class="db-bottom-grid">
        
        <!-- CỘT TRÁI: DANH SÁCH TÀI TRỢ GẦN ĐÂY -->
        <div class="db-card-panel">
            <div class="db-card-panel-head">
                <h4><i class="fa-solid fa-clock-rotate-left text-primary"></i> Đăng Ký Tài Trợ Gần Đây</h4>
                <a href="dong_hanh_admin.php" class="btn btn-sm btn-outline-primary" style="border-radius: 20px; font-weight: 700; font-size: 0.78rem;">
                    Xem tất cả (<?= $total_tai_tro ?>)
                </a>
            </div>

            <div class="db-act-list">
                <?php if (!empty($recent_tai_tro)): ?>
                <?php foreach ($recent_tai_tro as $item): ?>
                <div class="db-act-item">
                    <div class="db-act-user">
                        <div class="db-act-avatar">
                            <?= mb_substr(trim($item['ho_ten'] ?? 'T'), 0, 1, 'UTF-8') ?>
                        </div>
                        <div>
                            <div class="db-act-name"><?= htmlspecialchars($item['ho_ten'] ?? 'Ẩn danh') ?></div>
                            <div class="db-act-date">
                                <i class="fa-solid fa-phone me-1"></i> <?= htmlspecialchars($item['sdt'] ?? '') ?>
                                <?php if (!empty($item['hinh_thuc'])): ?>
                                · <span class="badge bg-light text-dark"><?= htmlspecialchars($item['hinh_thuc'] === 'tien_mat' ? 'Tiền mặt' : 'Thiết bị') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle" style="font-weight: 700;">
                            <?= htmlspecialchars($item['ngay_tao'] ?? 'Gần đây') ?>
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <div class="text-center py-4 text-muted">
                    <i class="fa-solid fa-inbox fs-3 d-block mb-2 text-secondary"></i>
                    Chưa có đăng ký tài trợ nào trong hệ thống.
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- CỘT PHẢI: TRẠNG THÁI SERVER & HỆ THỐNG -->
        <div class="db-card-panel">
            <div class="db-card-panel-head">
                <h4><i class="fa-solid fa-server text-success"></i> Trạng Thái Hệ Thống</h4>
                <span class="badge bg-success" style="border-radius: 999px;">
                    <i class="fa-solid fa-circle-dot me-1"></i> Hoạt động tốt
                </span>
            </div>

            <div class="db-health-list">
                <div class="db-health-item">
                    <span class="db-health-label"><i class="fa-brands fa-php text-primary"></i> Phiên bản PHP</span>
                    <span class="db-health-val"><?= phpversion() ?></span>
                </div>
                <div class="db-health-item">
                    <span class="db-health-label"><i class="fa-solid fa-database text-warning"></i> Cơ sở dữ liệu</span>
                    <span class="db-health-val">MySQL (PDO Connected)</span>
                </div>
                <div class="db-health-item">
                    <span class="db-health-label"><i class="fa-solid fa-hard-drive text-info"></i> Máy chủ Web</span>
                    <span class="db-health-val"><?= htmlspecialchars($_SERVER['SERVER_SOFTWARE'] ?? 'Laragon / Apache') ?></span>
                </div>
                <div class="db-health-item">
                    <span class="db-health-label"><i class="fa-solid fa-shield-halved text-success"></i> Phiên đăng nhập</span>
                    <span class="db-health-val text-success">An toàn (Admin Session)</span>
                </div>
                <div class="db-health-item">
                    <span class="db-health-label"><i class="fa-solid fa-code-branch text-danger"></i> Phiên bản dự án</span>
                    <span class="db-health-val">Thanh Âm v2.0 (2026)</span>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- ==================== JAVASCRIPT ĐỒNG HỒ & HIỆU ỨNG ==================== -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Đồng hồ thời gian thực (Live Digital Clock)
    function updateClock() {
        const now = new Date();
        const days = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'];
        const dayName = days[now.getDay()];
        const dateStr = String(now.getDate()).padStart(2, '0') + '/' + 
                        String(now.getMonth() + 1).padStart(2, '0') + '/' + 
                        now.getFullYear();
        const timeStr = String(now.getHours()).padStart(2, '0') + ':' + 
                        String(now.getMinutes()).padStart(2, '0') + ':' + 
                        String(now.getSeconds()).padStart(2, '0');
        
        const clockEl = document.getElementById('liveClock');
        if (clockEl) {
            clockEl.textContent = `${dayName}, ${dateStr} - ${timeStr}`;
        }
    }
    updateClock();
    setInterval(updateClock, 1000);

    // 2. Hiệu ứng đếm số (Count-Up Animation)
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target') || 0;
        if (target === 0) return;
        
        let count = 0;
        const speed = target > 50 ? 30 : 60;
        const increment = Math.ceil(target / 20) || 1;

        const updateCount = () => {
            count += increment;
            if (count >= target) {
                counter.textContent = target;
            } else {
                counter.textContent = count;
                setTimeout(updateCount, speed);
            }
        };
        updateCount();
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>