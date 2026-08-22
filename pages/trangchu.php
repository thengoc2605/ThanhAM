<?php
/**
 * pages/trangchu.php — Trang chủ
 */

require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '/../includes/functions.php';

// ---------------------------------------------------------------
// 1) Bảng tin chính: các chương trình đang triển khai (ongoing)
// ---------------------------------------------------------------
$programs = fetchAll($conn, "
    SELECT title, location, target_count, current_count, description
    FROM programs
    WHERE status = 'ongoing'
    ORDER BY created_at DESC
    LIMIT 3
");

// ---------------------------------------------------------------
// 2) Dải tính năng AI (features)
// ---------------------------------------------------------------
$features = fetchAll($conn, "
    SELECT title, icon, summary
    FROM features
    WHERE status = 1
    ORDER BY id ASC
    LIMIT 3
");

// ---------------------------------------------------------------
// 3) Chỉ số tác động (impact_kpis)
// ---------------------------------------------------------------
$kpis = fetchAll($conn, "
    SELECT kpi_title, kpi_value, sub_text
    FROM impact_kpis
    ORDER BY id ASC
");

require __DIR__ . '/../includes/header.php';
?>

<main>

    <!-- ============ HERO ============ -->
    <section class="hero">
        <h1>Thanh Âm hân hạnh phục vụ!</h1>
        <p>Chuyển hoá giọng nói không chuẩn thành tiếng nói được thấu hiểu — để không ai bị bỏ lại phía sau trong giao tiếp hằng ngày.</p>
    </section>

    <!-- ============ BẢNG TIN CHƯƠNG TRÌNH ============ -->
    <section class="information-box" style="margin-bottom:30px;">
        <div class="information-title">
            <span class="icon">📰</span> Bảng tin Thanh Âm
        </div>
        <div class="information-content">
            <?php if (empty($programs)): ?>
                <div class="notice">
                    <div class="notice-content">
                        <p class="notice-text">Hiện chưa có chương trình nào đang triển khai.</p>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($programs as $p):
                    $percent = $p['target_count'] > 0
                        ? min(100, round(($p['current_count'] / $p['target_count']) * 100))
                        : 0;
                ?>
                    <div class="notice">
                        <div class="notice-icon <?= $percent < 50 ? 'red' : ''; ?>">📣</div>
                        <div class="notice-content">
                            <p class="notice-text">
                                <strong><?= htmlspecialchars($p['title']); ?></strong><br>
                                <?= htmlspecialchars($p['description'] ?: 'Cập nhật thông tin chương trình sẽ sớm có mặt tại đây.'); ?>
                            </p>
                            <div class="notice-tags">
                                <?php if (!empty($p['location'])): ?>
                                    <span class="tag">📍 <?= htmlspecialchars($p['location']); ?></span>
                                <?php endif; ?>
                                <span class="tag <?= $percent < 50 ? 'red' : ''; ?>">
                                    Đã đạt <?= (int)$p['current_count']; ?>/<?= (int)$p['target_count']; ?> (<?= $percent; ?>%)
                                </span>
                            </div>
                            <a href="/ThanhAM/pages/dong_hanh.php" class="cooperation-link">
                                Đăng ký đồng hành ngay →
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- ============ LIÊN HỆ NHANH ============ -->
    <section class="information-box" style="margin-bottom:30px;">
        <div class="information-title">
            <span class="icon">☎️</span> Cần hỗ trợ ngay?
        </div>
        <div class="information-content">
            <div class="notice">
                <div class="notice-icon">📞</div>
                <div class="notice-content">
                    <p class="notice-text">
                        <strong>Hotline miễn phí:</strong>
                        <a href="tel:0865357517">0865357517</a>
                    </p>
                </div>
            </div>
            <div class="notice">
                <div class="notice-icon">💬</div>
                <div class="notice-content">
                    <p class="notice-text">
                        <strong>Zalo hỗ trợ:</strong>
                        <a href="https://zalo.me/0912991489" target="_blank" rel="noopener">0912991489</a>
                    </p>
                </div>
            </div>
            <div class="notice">
                <div class="notice-icon">✉️</div>
                <div class="notice-content">
                    <p class="notice-text">
                        <strong>Email dự án:</strong>
                        <a href="mailto:thanham.vfy@gmail.com">thanham.vfy@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ CHỈ SỐ TÁC ĐỘNG ============ -->
    <?php if (!empty($kpis)): ?>
    <section class="information-box" style="margin-bottom:30px;">
        <div class="information-title">
            <span class="icon">📊</span> Chỉ số tác động
        </div>
        <div class="information-content">
            <div class="notice-tags" style="padding:20px 0;">
                <?php foreach ($kpis as $k): ?>
                    <span class="tag">
                        <strong><?= (int)$k['kpi_value']; ?>+</strong>
                        &nbsp;<?= htmlspecialchars($k['kpi_title']); ?>
                        <?php if (!empty($k['sub_text'])): ?>
                            (<?= htmlspecialchars($k['sub_text']); ?>)
                        <?php endif; ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ============ TÍNH NĂNG AI ============ -->
    <?php if (!empty($features)): ?>
    <section class="information-box">
        <div class="information-title">
            <span class="icon">🤖</span> Tính năng AI nổi bật
        </div>
        <div class="information-content">
            <?php foreach ($features as $f): ?>
                <div class="notice">
                    <div class="notice-icon"><?= htmlspecialchars($f['icon'] ?: '⭐'); ?></div>
                    <div class="notice-content">
                        <p class="notice-text">
                            <strong><?= htmlspecialchars($f['title']); ?></strong><br>
                            <?= htmlspecialchars($f['summary']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>