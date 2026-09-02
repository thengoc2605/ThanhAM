<?php
/**
 * pages/giaiphap.php — Trang "Giải pháp" (Pro VIP Modern UI)
 * Dùng chung header.php / footer.php với các trang khác.
 */

require_once __DIR__ . '/../connect.php';

$page_title = 'Giải pháp công nghệ AI · Thanh Âm';

// ---------------------------------------------------------------
// DỮ LIỆU TÍNH NĂNG
// ---------------------------------------------------------------
$features_main = [
    [
        'id'      => 'nhap-van-ban',
        'icon'    => 'fa-keyboard',
        'title'   => 'Nhập văn bản & phát giọng',
        'badge'   => 'Text to Speech',
        'summary' => 'Nhập câu muốn nói và để hệ thống phát giọng tự nhiên theo ý muốn.',
        'purpose' => 'Người dùng có thể gõ nội dung cần truyền đạt rồi phát đi bằng giọng đọc rõ ràng, giúp giao tiếp nhanh hơn, tự tin hơn và dễ hiểu hơn trong mọi tình huống.',
        'target'  => 'Người không nói được, người cần hỗ trợ giao tiếp nhanh, trẻ em và người cao tuổi.',
        'steps'   => [
            'Mở giao diện chính của ứng dụng.',
            'Nhập văn bản hoặc dán câu cần nói.',
            'Nhấn nút phát để hệ thống đọc to nội dung.',
            'Lưu các câu thường dùng để phát lại nhanh.',
        ],
        'video'   => 'tinhnang1.mp4',
    ],
    [
        'id'      => 'goi-y-nhanh',
        'icon'    => 'fa-bolt',
        'title'   => 'Gợi ý nhanh',
        'badge'   => 'Quick Suggest',
        'summary' => 'Hiển thị các câu gợi ý nhanh phù hợp với nhu cầu giao tiếp tức thời.',
        'purpose' => 'Hệ thống đề xuất những câu nói phổ biến và phù hợp với ngữ cảnh để người dùng không cần nhập lại từ đầu, tiết kiệm thời gian và giảm rào cản khi trao đổi.',
        'target'  => 'Người cần phản hồi nhanh, người có khó khăn khi viết, người dùng trong môi trường học tập và y tế.',
        'steps'   => [
            'Chọn mục gợi ý nhanh trong giao diện chính.',
            'Xem các câu gợi ý theo tình huống.',
            'Nhấn câu mong muốn để phát ngay.',
            'Chỉnh sửa lại nếu cần trước khi phát.',
        ],
        'video'   => 'tinhnang2.mp4',
    ],
    [
        'id'      => 'ghi-am',
        'icon'    => 'fa-microphone',
        'title'   => 'Ghi âm',
        'badge'   => 'Voice Recording',
        'summary' => 'Ghi lại giọng nói, lưu trữ và phát lại khi cần.',
        'purpose' => 'Tính năng ghi âm giúp người dùng lưu lại đoạn nói, nghe lại, đánh giá cách phát âm và rèn luyện kỹ năng giao tiếp hằng ngày.',
        'target'  => 'Người luyện phát âm, trẻ em, người tập phục hồi giọng nói và người chăm sóc.',
        'steps'   => [
            'Nhấn nút ghi âm trong màn hình chính.',
            'Nói theo câu hoặc đoạn muốn lưu.',
            'Dừng ghi âm khi đã hoàn tất.',
            'Nghe lại và lưu trữ vào thư viện riêng.',
        ],
        'video'   => 'tinhnang3.mp4',
    ],
    [
        'id'      => 'ca-nhan-hoa',
        'icon'    => 'fa-sliders',
        'title'   => 'Cá nhân hóa',
        'badge'   => 'Personalize',
        'summary' => 'Điều chỉnh giọng nói, tốc độ và cách hiển thị theo từng người dùng.',
        'purpose' => 'Mỗi người có thể thiết lập giọng nói, tốc độ phát âm, ưu tiên từ vựng và giao diện theo phong cách riêng, giúp trải nghiệm gần gũi và phù hợp hơn.',
        'target'  => 'Mọi người dùng, đặc biệt trẻ em, người cao tuổi và người có nhu cầu đặc thù.',
        'steps'   => [
            'Vào phần cài đặt cá nhân hóa.',
            'Chọn giọng đọc, âm lượng và tốc độ phù hợp.',
            'Chỉnh sửa từ vựng và câu hay dùng.',
            'Lưu cấu hình để áp dụng trên toàn hệ thống.',
        ],
        'video'   => 'tinhnang4.mp4',
    ],
    [
        'id'      => 'sua-chinh-ta',
        'icon'    => 'fa-spell-check',
        'title'   => 'Sửa lỗi chính tả',
        'badge'   => 'Grammar Fix',
        'summary' => 'Tự động phát hiện lỗi ngữ pháp và chính tả trước khi phát âm.',
        'purpose' => 'Giúp người dùng viết đúng, rõ ràng và mạch lạc hơn, đồng thời tránh hiểu nhầm khi câu nói được đọc to bởi hệ thống AI.',
        'target'  => 'Người mới học viết, người học tiếng Việt, người cần hỗ trợ giao tiếp văn bản.',
        'steps'   => [
            'Nhập câu cần soạn thảo.',
            'Hệ thống tự động gợi ý sửa lỗi.',
            'Chạm chọn từ đúng hoặc chấp nhận sửa tự động.',
            'Phát câu đã chỉnh sửa để kiểm tra lại.',
        ],
        'video'   => 'tinhnang5.mp4',
    ],
    [
        'id'      => 'goi-y-ai',
        'icon'    => 'fa-brain',
        'title'   => 'Đưa ra gợi ý từ AI',
        'badge'   => 'AI Suggestion',
        'summary' => 'AI đề xuất câu trả lời phù hợp theo tình huống và ngữ cảnh.',
        'purpose' => 'Khi tham gia hội thoại, hệ thống phân tích ngữ cảnh và đề xuất các câu trả lời ngắn gọn, tự nhiên, dễ phát âm để người dùng lựa chọn nhanh.',
        'target'  => 'Người có khó khăn khi suy nghĩ câu trả lời, người dùng cần tương tác nhanh trong công việc và sinh hoạt.',
        'steps'   => [
            'Bắt đầu trò chuyện hoặc mở hộp thoại.',
            'Xem các đề xuất câu trả lời của AI.',
            'Chọn câu phù hợp nhất.',
            'Phát câu đó ngay lập tức.',
        ],
        'video'   => 'tinhnang6.mp4',
    ],
    [
        'id'      => 'ghi-nho-cau',
        'icon'    => 'fa-bookmark',
        'title'   => 'Ghi nhớ câu nói hay dùng',
        'badge'   => 'Favorite Phrase',
        'summary' => 'Lưu lại những câu hay dùng để phát ngay từng khi cần.',
        'purpose' => 'Câu nói quen thuộc như chào hỏi, cảm ơn, xin phép, hỏi thăm... được lưu lại để người dùng phát nhanh mà không phải gõ lại mỗi lần.',
        'target'  => 'Người cần giao tiếp hàng ngày, người chăm sóc và giáo viên.',
        'steps'   => [
            'Chọn câu muốn lưu.',
            'Nhấn nút đánh dấu yêu thích.',
            'Câu đó được đưa vào danh sách câu hay dùng.',
            'Mở thư viện để phát nhanh khi cần.',
        ],
        'video'   => 'tinhnang7.mp4',
    ],
    [
        'id'      => 'chu-de-va-luu',
        'icon'    => 'fa-folder-plus',
        'title'   => 'Tạo chủ đề & lưu câu thường ngày',
        'badge'   => 'Topic Library',
        'summary' => 'Tạo danh mục chủ đề riêng và lưu các câu nói thường dùng theo từng nhóm.',
        'purpose' => 'Hệ thống giúp người dùng sắp xếp câu nói theo chủ đề như gia đình, trường học, bệnh viện, mua sắm, giúp tìm kiếm và sử dụng tiện lợi hơn.',
        'target'  => 'Người dùng có nhu cầu cá nhân hóa giao tiếp theo môi trường cụ thể.',
        'steps'   => [
            'Tạo một chủ đề mới.',
            'Thêm câu nói vào chủ đề tương ứng.',
            'Phân loại theo tình huống và hoàn cảnh.',
            'Mở chủ đề để phát nhanh khi cần.',
        ],
        'video'   => 'tinhnang8.mp4',
    ],
    [
        'id'      => 'tinh-nang-9',
        'icon'    => 'fa-triangle-exclamation',
        'title'   => 'SOS – Hỗ trợ khẩn cấp',
        'badge'   => 'Emergency SOS',
        'summary' => 'Hỗ trợ người dùng liên hệ với người thân, bạn bè hoặc người giám hộ trong trường hợp khẩn cấp.',
        'purpose' => 'Tạo thêm một lớp hỗ trợ an toàn cho người dùng khi gặp tình huống khẩn cấp và khó có thể tự giao tiếp hoặc gọi trợ giúp theo cách thông thường.',
        'target'  => 'Người gặp khó khăn giao tiếp, trẻ em, người cao tuổi, người cần hỗ trợ đặc biệt và người giám hộ.',
        'steps'   => [
            'Chọn chức năng “SOS” trong ứng dụng.',
            'Thêm số điện thoại của người thân, bạn bè hoặc người giám hộ vào danh bạ khẩn cấp.',
            'Hệ thống lưu danh sách các liên hệ khẩn cấp.',
            'Khi gặp nguy hiểm, bấm nút “SOS” trên màn hình.',
            'Hệ thống gửi SMS đến các liên hệ đã lưu, kèm thông tin vị trí.',
            'Hệ thống lần lượt thực hiện cuộc gọi đến các liên hệ trong danh sách.',
            'Nếu không có ai bắt máy, có thể chuyển sang số khẩn cấp 113, 114 hoặc 115.',
        ],
        'video'   => 'tinhnang9.mp4',
    ],
    [
        'id'      => 'lich-su-hoi-thoai',
        'icon'    => 'fa-clock-rotate-left',
        'title'   => 'Lịch sử hội thoại',
        'badge'   => 'Conversation History',
        'summary' => 'Xem lại các cuộc trò chuyện và câu nói đã dùng trước đó.',
        'purpose' => 'Người dùng có thể theo dõi, tìm lại câu nói đã dùng, đánh giá quá trình trao đổi và dễ dàng quay lại nội dung quan trọng khi cần.',
        'target'  => 'Người chăm sóc, giáo viên, người dùng thường xuyên giao tiếp và cần tra cứu thông tin cũ.',
        'steps'   => [
            'Mở phần lịch sử hội thoại.',
            'Chọn cuộc trò chuyện hoặc câu nói cần xem lại.',
            'Nhấn phát lại nếu muốn nghe lại.',
            'Tìm kiếm nhanh theo thời gian hoặc chủ đề.',
        ],
        'video'   => 'tinhnang10.mp4',
    ],
    [
        'id'      => 'goi-vip',
        'icon'    => 'fa-crown',
        'title'   => 'Gói VIP',
        'badge'   => 'Premium Access',
        'summary' => 'Mở khóa trải nghiệm cao cấp với các tính năng ưu tiên và quyền truy cập mở rộng.',
        'purpose' => 'Gói VIP mang đến quyền truy cập nâng cao, lưu trữ nhiều nội dung hơn, tích hợp ưu tiên và trải nghiệm hiện đại phù hợp cho người dùng cần nhiều tiện ích hơn.',
        'target'  => 'Người dùng muốn trải nghiệm đầy đủ các tính năng nâng cao và tùy chỉnh sâu hơn.',
        'steps'   => [
            'Chọn gói VIP trong phần tài khoản.',
            'Xem các quyền lợi và gói dịch vụ.',
            'Kích hoạt gói để mở khóa tính năng cao cấp.',
            'Sử dụng trải nghiệm ưu tiên theo nhu cầu.',
        ],
        'video'   => 'tinhnang11.mp4',
    ],
];

$all_features = $features_main;

try {
    $stmt_db_features = $pdo->query("SELECT slug AS id, bieu_tuong AS icon, tieu_de AS title, nhan AS badge, tom_tat AS summary, noi_dung AS noi_dung, video, thu_tu FROM giai_phap_tinh_nang WHERE trang_thai = 1 ORDER BY thu_tu ASC, id ASC");
    $db_features = $stmt_db_features->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($db_features)) {
        $all_features = array_map(static function (array $feature): array {
            return [
                'id' => $feature['id'],
                'icon' => $feature['icon'] ?: 'fa-lightbulb',
                'title' => $feature['title'],
                'badge' => $feature['badge'] ?: 'Thanh Âm',
                'summary' => $feature['summary'] ?: '',
                'purpose' => '',
                'target' => '',
                'steps' => [],
                'video' => $feature['video'] ?: '',
                'noi_dung' => $feature['noi_dung'],
            ];
        }, $db_features);
    }
} catch (PDOException $e) {
    // Giữ dữ liệu cũ cho đến khi migration được import.
}

// ---------------------------------------------------------------
// DỮ LIỆU ĐỐI TƯỢNG SỬ DỤNG
// ---------------------------------------------------------------
$audiences = [
    [
        'icon'  => 'fa-comment-slash',
        'title' => 'Người khiếm thanh / Mất tiếng nói',
        'desc'  => 'Người không thể phát âm hoặc bị hạn chế khả năng nói do bẩm sinh, bệnh lý hoặc chấn thương thanh quản.'
    ],
    [
        'icon'  => 'fa-ear-deaf',
        'title' => 'Người khiếm thính & Điếc',
        'desc'  => 'Cần công cụ chuyển đổi thông minh giữa văn bản, giọng nói và hình ảnh để giao tiếp hai chiều thuận tiện trong xã hội.'
    ],
    [
        'icon'  => 'fa-person-cane',
        'title' => 'Người cao tuổi suy giảm vận động',
        'desc'  => 'Hỗ trợ giao tiếp dễ dàng, nhắc lịch uống thuốc định kỳ và gửi tín hiệu cứu hộ khẩn cấp một chạm khi ở một mình.'
    ],
    [
        'icon'  => 'fa-bed-pulse',
        'title' => 'Bệnh nhân sau phẫu thuật & Trị liệu',
        'desc'  => 'Người đang điều trị phục hồi chức năng vùng hầu họng hoặc gặp khó khăn giao tiếp tạm thời trong bệnh viện.'
    ],
    [
        'icon'  => 'fa-child-reaching',
        'title' => 'Trẻ chậm phát triển ngôn ngữ & Tự kỷ',
        'desc'  => 'Hỗ trợ luyện tập phát âm, thể hiện nhu cầu cảm xúc qua hệ thống thẻ hình ảnh AAC trực quan, dễ tiếp cận.'
    ],
    [
        'icon'  => 'fa-people-roof',
        'title' => 'Gia đình & Người chăm sóc',
        'desc'  => 'Cầu nối thấu hiểu suy nghĩ, tâm tư và hỗ trợ người thân giao tiếp hòa nhập chủ động tốt hơn mỗi ngày.'
    ],
    [
        'icon'  => 'fa-school',
        'title' => 'Trường chuyên biệt & Trung tâm can thiệp',
        'desc'  => 'Ứng dụng làm công cụ trợ giảng, đánh giá mức độ tiến bộ và hỗ trợ học sinh có nhu cầu giao tiếp đặc thù.'
    ],
    [
        'icon'  => 'fa-building-columns',
        'title' => 'Doanh nghiệp & Cơ quan hành chính',
        'desc'  => 'Triển khai giải pháp hỗ trợ tiếp cận dịch vụ công bằng, văn minh cho người yếu thế tại quầy tiếp dân và văn phòng.'
    ],
    [
        'icon'  => 'fa-circle-nodes',
        'title' => 'Mọi cá nhân gặp rào cản giao tiếp',
        'desc'  => 'Bất kỳ ai cần một phương tiện hỗ trợ biểu đạt tiếng nói và cảm xúc trong những hoàn cảnh đặc biệt của cuộc sống.'
    ],
];

require __DIR__ . '/../includes/header.php';
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Sora:wght@400;600;700;800&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="../assets/css/stylegiaiphap.css?v=<?= time(); ?>">
<link rel="stylesheet" href="/ThanhAM/assets/css/stylegiaiphap.css?v=<?= time(); ?>">

<style>
<?php
$cssPathGP = __DIR__ . '/../assets/css/stylegiaiphap.css';
if (file_exists($cssPathGP)) {
    echo file_get_contents($cssPathGP);
}
?>
</style>

<main class="gp-page">

    <!-- ==================== HERO SECTION ==================== -->
    <section class="gp-hero">
        <div class="gp-container">
            <div class="gp-hero-content">
                <div class="gp-breadcrumb">
                    <a href="/ThanhAM/index.php"><i class="fa-solid fa-house"></i> Trang chủ</a>
                    <span>/</span>
                    <span>Giải pháp công nghệ AI</span>
                </div>

                <div>
                    <span class="gp-badge-glow">
                        <span class="pulse-dot"></span> Hệ sinh thái công nghệ AI toàn diện
                    </span>
                </div>

                <h1>Giải Pháp Công Nghệ Đột Phá</h1>
                <div class="gp-hero-slogan">Trao tiếng nói – Kết nối mọi trái tim</div>
                <p class="gp-hero-desc">
                    Hệ thống AI xử lý ngôn ngữ tự nhiên và chuyển đổi giọng nói đa phương thức thời gian thực — xóa bỏ mọi rào cản giao tiếp, hỗ trợ người yếu thế tự tin biểu đạt suy nghĩ và hòa nhập cuộc sống.
                </p>

                <!-- Stats ribbon -->
                <div class="gp-hero-stats">
                    <div class="gp-stat-item">
                        <span class="gp-stat-num">10+</span>
                        <span class="gp-stat-label">Tính năng AI thông minh</span>
                    </div>
                    <div class="gp-stat-item">
                        <span class="gp-stat-num">&lt; 0.5s</span>
                        <span class="gp-stat-label">Tốc độ xử lý tức thì</span>
                    </div>
                    <div class="gp-stat-item">
                        <span class="gp-stat-num">98%</span>
                        <span class="gp-stat-label">Độ chính xác chuẩn hóa</span>
                    </div>
                    <div class="gp-stat-item">
                        <span class="gp-stat-num">100%</span>
                        <span class="gp-stat-label">Đa nền tảng Web &amp; App</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="gp-container">

        <!-- ==================== PHẦN 1: TRUNG TÂM TÍNH NĂNG ==================== -->
        <section class="gp-features-hub">
            <div class="gp-sec-header center">
                <span class="gp-tag"><i class="fa-solid fa-wand-magic-sparkles"></i> Bảng điều khiển công nghệ</span>
                <h2 class="gp-sec-title">Hệ Thống Tính Năng Đa Phương Thức</h2>
                <p class="gp-sec-desc">Chạm vào từng tính năng bên dưới để khám phá cơ chế vận hành AI, công dụng thực tiễn và quy trình sử dụng chi tiết.</p>
            </div>

            <!-- Grid of Feature Selector Buttons -->
            <div class="gp-buttons-grid" id="gpFeatureButtons">
                <?php foreach ($all_features as $index => $f): ?>
                <button type="button" class="gp-feature-btn <?= $index === 0 ? 'active' : ''; ?>" data-feature-target="<?= htmlspecialchars($f['id']); ?>">
                    <div class="gp-feature-circle">
                        <i class="fa-solid <?= htmlspecialchars($f['icon']); ?>"></i>
                    </div>
                    <span class="gp-feature-label"><?= htmlspecialchars($f['title']); ?></span>
                </button>
                <?php endforeach; ?>
            </div>

            <!-- Feature Detail Showcase Panel -->
            <div class="gp-detail-panel" id="gpDetailPanel">
                <?php foreach ($all_features as $index => $f): ?>
                <article class="gp-detail-article" data-feature-article="<?= htmlspecialchars($f['id']); ?>" <?= $index !== 0 ? 'style="display:none;"' : ''; ?>>
                    
                    <div class="gp-detail-head">
                        <div class="gp-detail-head-icon">
                            <i class="fa-solid <?= htmlspecialchars($f['icon']); ?>"></i>
                        </div>
                        <div>
                            <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;">
                                <h3><?= htmlspecialchars($f['title']); ?></h3>
                                <span class="gp-tag" style="margin-bottom:0; font-size:0.7rem;"><?= htmlspecialchars($f['badge']); ?></span>
                            </div>
                            <p class="gp-detail-summary"><?= htmlspecialchars($f['summary']); ?></p>
                        </div>
                    </div>

                    <div class="gp-detail-body">
                        <!-- Left: Info & Steps -->
                        <div class="gp-detail-text-col">
                            <div class="gp-detail-info-block">
                                <h4><i class="fa-solid fa-circle-info"></i> Công dụng &amp; Giá trị mang lại</h4>
                                <?php if (array_key_exists('noi_dung', $f)): ?>
                                <div><?= $f['noi_dung']; ?></div>
                                <?php else: ?>
                                <p><?= htmlspecialchars($f['purpose']); ?></p>
                                <?php endif; ?>
                            </div>

                            <?php if (!array_key_exists('noi_dung', $f)): ?>
                            <div class="gp-detail-info-block">
                                <h4><i class="fa-solid fa-users-viewfinder"></i> Đối tượng phù hợp</h4>
                                <p><?= htmlspecialchars($f['target']); ?></p>
                            </div>
                            <?php endif; ?>

                            <div class="gp-detail-info-block">
                                <h4><i class="fa-solid fa-list-check"></i> Các bước sử dụng</h4>
                                <div class="gp-steps-list">
                                    <?php foreach ($f['steps'] as $sIndex => $step): ?>
                                    <div class="gp-step-item">
                                        <span class="gp-step-num"><?= $sIndex + 1; ?></span>
                                        <span class="gp-step-text"><?= htmlspecialchars($step); ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Video / Visual Demo -->
                        <div class="gp-detail-video-col">
                            <div class="gp-detail-info-block">
                                <h4><i class="fa-solid fa-clapperboard"></i> Video minh họa &amp; Trải nghiệm UI</h4>
                                <div class="gp-video-box">
                                    <?php
                                    $video_type = strtolower(pathinfo($f['video'] ?? '', PATHINFO_EXTENSION)) === 'mov' ? 'video/quicktime' : 'video/mp4';
                                    ?>
                                    <?php if (!empty($f['video'])): ?><video controls preload="none" poster="/ThanhAM/assets/images/video-poster-<?= htmlspecialchars($f['id']); ?>.jpg">
                                        <source src="/ThanhAM/assets/videos/<?= htmlspecialchars($f['video']); ?>" type="<?= $video_type; ?>">
                                        <source src="/ThanhAM/uploads/Videos/<?= htmlspecialchars($f['video']); ?>" type="<?= $video_type; ?>">
                                    </video><?php endif; ?>
                                    <div class="gp-video-fallback">
                                        <i class="fa-solid fa-circle-play"></i>
                                        <span>Video minh họa tính năng: <b><?= htmlspecialchars($f['title']); ?></b><br><small>Hệ thống AI xử lý theo thời gian thực</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- ==================== PHẦN 2: MÔ HÌNH VẬN HÀNH AI ==================== -->
        <section class="gp-workflow-section">
            <div class="gp-sec-header center">
                <span class="gp-tag magenta"><i class="fa-solid fa-diagram-project"></i> Kiến trúc công nghệ</span>
                <h2 class="gp-sec-title">Quy Trình Xử Lý Đa Tầng AI</h2>
                <p class="gp-sec-desc">Mô hình vận hành khép kín từ khâu thu thập tín hiệu đến chuẩn hóa giọng nói và phản hồi thông minh.</p>
            </div>

            <div class="gp-pipeline-grid">
                <div class="gp-pipeline-card">
                    <span class="gp-pipe-step-badge">Bước 01</span>
                    <div class="gp-pipe-icon"><i class="fa-solid fa-headset"></i></div>
                    <h4>Thu Nhận Tín Hiệu</h4>
                    <p>Tiếp nhận âm thanh giọng nói méo, chữ gõ, cử chỉ 1 chạm hoặc hình ảnh tài liệu từ người dùng.</p>
                </div>

                <div class="gp-pipeline-card">
                    <span class="gp-pipe-step-badge">Bước 02</span>
                    <div class="gp-pipe-icon"><i class="fa-solid fa-microchip"></i></div>
                    <h4>AI Xử Lý &amp; Chuẩn Hóa</h4>
                    <p>Mô hình AI lọc nhiễu, tái tạo trường âm, sửa ngữ pháp và phân tích ngữ cảnh giao tiếp theo thời gian thực.</p>
                </div>

                <div class="gp-pipeline-card">
                    <span class="gp-pipe-step-badge">Bước 03</span>
                    <div class="gp-pipe-icon"><i class="fa-solid fa-volume-high"></i></div>
                    <h4>Phát Giọng Tự Nhiên</h4>
                    <p>Tổng hợp và phát ra giọng đọc trong trẻo, tự nhiên với ngữ điệu truyền cảm qua loa thiết bị.</p>
                </div>

                <div class="gp-pipeline-card">
                    <span class="gp-pipe-step-badge">Bước 04</span>
                    <div class="gp-pipe-icon"><i class="fa-solid fa-brain"></i></div>
                    <h4>Học Máy &amp; Thích Ứng</h4>
                    <p>Hệ thống tự động học thói quen, gợi ý câu trả lời và cá nhân hóa bộ từ vựng riêng cho từng người dùng.</p>
                </div>
            </div>
        </section>

        <!-- ==================== PHẦN 3: ĐỐI TƯỢNG SỬ DỤNG ==================== -->
        <section class="gp-audience-section">
            <div class="gp-sec-header center">
                <span class="gp-tag gold"><i class="fa-solid fa-users"></i> Độ bao phủ xã hội</span>
                <h2 class="gp-sec-title">9 Nhóm Đối Tượng Phù Hợp</h2>
                <p class="gp-sec-desc">Thanh Âm được thiết kế để đồng hành và mở rộng khả năng tiếp cận cho mọi cá nhân trong xã hội.</p>
            </div>

            <div class="gp-audience-grid">
                <?php foreach ($audiences as $i => $a): ?>
                <div class="gp-aud-card">
                    <span class="gp-aud-num"><?= sprintf('%02d', $i + 1); ?></span>
                    <div class="gp-aud-icon">
                        <i class="fa-solid <?= htmlspecialchars($a['icon']); ?>"></i>
                    </div>
                    <h4><?= htmlspecialchars($a['title']); ?></h4>
                    <p><?= htmlspecialchars($a['desc']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- ==================== PHẦN 4: TIÊU CHUẨN KỸ THUẬT & AN TOÀN ==================== -->
        <div class="gp-standards-grid">
            <div class="gp-std-card">
                <div class="gp-std-icon"><i class="fa-solid fa-shield-halved"></i></div>
                <div class="gp-std-body">
                    <h4>Bảo Mật Trên Thiết Bị (On-Device)</h4>
                    <p>Dữ liệu giọng nói và văn bản cá nhân được mã hóa an toàn, ưu tiên xử lý trực tiếp trên máy người dùng.</p>
                </div>
            </div>

            <div class="gp-std-card">
                <div class="gp-std-icon"><i class="fa-solid fa-wifi"></i></div>
                <div class="gp-std-body">
                    <h4>Linh Hoạt Offline &amp; Online</h4>
                    <p>Các tính năng giao tiếp cốt lõi như Phát giọng, 1 Chạm, SOS vẫn hoạt động mượt mà ngay cả khi mất mạng Internet.</p>
                </div>
            </div>

            <div class="gp-std-card">
                <div class="gp-std-icon"><i class="fa-solid fa-universal-access"></i></div>
                <div class="gp-std-body">
                    <h4>Chuẩn Tiếp Cận Quốc Tế (WCAG 2.1)</h4>
                    <p>Giao diện tương phản cao, phông chữ dễ đọc, nút bấm lớn hỗ trợ tối đa cho người khiếm thị nhẹ và khó vận động.</p>
                </div>
            </div>
        </div>

        <!-- ==================== PHẦN 5: CALL TO ACTION ==================== -->
        <section class="gp-cta-section">
            <div class="gp-cta-content">
                <h2>Sẵn Sàng Trải Nghiệm Giải Pháp Thanh Âm?</h2>
                <p>
                    Hãy để công nghệ AI nhân văn trở thành người bạn đồng hành tin cậy, giúp mỗi người tự tin cất lên tiếng nói của riêng mình trong đời sống hằng ngày.
                </p>
                <div class="gp-cta-actions">
                    <a href="/ThanhAM/pages/dong_hanh.php" class="gp-btn-gold">
                        <i class="fa-solid fa-hand-holding-heart"></i> Đồng hành cùng dự án
                    </a>
                    <a href="/ThanhAM/pages/cauchuyen.php" class="gp-btn-outline-white">
                        <i class="fa-solid fa-book-open-reader"></i> Đọc những câu chuyện thực tế
                    </a>
                </div>
            </div>
        </section>

    </div>

</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>

<!-- ============ JS TƯƠNG TÁC CHỌN TÍNH NĂNG ============ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.gp-feature-btn[data-feature-target]');
    const articles = document.querySelectorAll('.gp-detail-article[data-feature-article]');

    function stopAllVideos() {
        document.querySelectorAll('.gp-video-box video').forEach(video => {
            if (!video.paused) {
                video.pause();
            }
            video.currentTime = 0;
        });
    }

    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = btn.getAttribute('data-feature-target');

            // Stop any currently playing video before switching
            stopAllVideos();

            // Update button active state
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Show target article
            articles.forEach(art => {
                const articleId = art.getAttribute('data-feature-article');
                if (articleId === targetId) {
                    art.style.display = 'block';
                } else {
                    art.style.display = 'none';
                }
            });
        });
    });
});
</script>

<script src="/ThanhAM/assets/js/main.js"></script>
<?php
$conn->close();
?>