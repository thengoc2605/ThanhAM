<?php
/**
 * pages/cauchuyen.php — Trang "Câu chuyện" (Pro VIP Modern UI)
 * Dùng chung header.php / footer.php với các trang khác.
 */

require_once __DIR__ . '/../connect.php';

$page_title = 'Câu chuyện truyền cảm hứng · Thanh Âm';

// ---------------------------------------------------------------
// DỮ LIỆU CÂU CHUYỆN
// Quy tắc riêng tư:
//  - is_public = true  => chỉ dùng cho câu chuyện của Hân (tên thật, ảnh mặt)
//  - is_public = false => ẩn danh, mô tả chung, ảnh/clip quay từ phía sau lưng
//  - consent  = true   => hiển thị dòng "Đã được sự đồng ý từ phía ..."
// ---------------------------------------------------------------
$stories = [
    [
        "id"           => "gia-han",
        "code"         => "Câu chuyện của Lưu Gia Hân",
        "category"     => "featured",
        "is_public"    => true,
        "name"         => "Lưu Gia Hân",
        "meta"         => "Trường Đại học Tiền Giang · Đồng sáng lập & Đại diện Dự án",
        "background"   => "Năm 2 tuổi, Gia Hân mắc viêm não Nhật Bản. Sau biến cố ấy, Hân mất đi khả năng nói – một điều tưởng chừng rất bình thường nhưng lại trở thành rào cản trong cuộc sống hằng ngày. Hân vẫn có suy nghĩ, cảm xúc, ước mơ và rất nhiều điều muốn được chia sẻ. Chỉ là, những điều ấy không thể dễ dàng được cất thành lời. Có những lúc Hân muốn nói một câu rất đơn giản, muốn giải thích điều mình đang nghĩ, muốn trò chuyện với mọi người nhưng lại phải tìm một cách khác để người đối diện hiểu mình. Không phải Hân không muốn cất tiếng. Chỉ là có những lúc, im lặng trở thành cách duy nhất.",
        "share_user"   => "“Có những lúc mình biết mình muốn nói gì, muốn giải thích hay muốn kể cho mọi người nghe rất nhiều điều, nhưng việc không thể nói thành lời khiến mình buộc phải im lặng. Trước đây, mỗi khi giao tiếp, mình thường phải viết ra giấy, nhắn tin hoặc nhờ người khác nói giúp. Có những câu rất đơn giản nhưng để truyền đạt được đầy đủ suy nghĩ của mình lại mất rất nhiều thời gian.\n\nKhi sử dụng THANH ÂM, mình cảm thấy việc giao tiếp trở nên chủ động hơn. Mình có thể nhập điều mình muốn nói, chỉnh sửa lại câu chữ rồi để ứng dụng hỗ trợ phát thành giọng nói. Điều mình vui nhất không chỉ là app có thể nói thay mình, mà là mình có thể tự mình lựa chọn điều muốn nói và nói ra theo cách của mình. THANH ÂM giúp mình cảm thấy khoảng cách giữa ‘muốn nói’ và ‘có thể nói’ không còn quá xa nữa. Mình hy vọng sẽ có thêm nhiều người giống mình có thể sử dụng công nghệ để giao tiếp dễ dàng hơn, tự tin hơn và không còn phải im lặng chỉ vì mình không thể cất tiếng.”",
        "share_family" => "“Từ nhỏ, Gia Hân đã phải đối mặt với một rào cản rất lớn trong giao tiếp. Điều khiến gia đình thương nhất không phải là việc con không thể nói, mà là có rất nhiều điều con muốn chia sẻ nhưng đôi khi không thể truyền đạt được trọn vẹn.\n\nKhi THANH ÂM được đưa vào sử dụng, chúng tôi nhận thấy Hân chủ động hơn trong giao tiếp. Những điều trước đây phải viết ra hoặc nhờ người khác hỗ trợ giờ đây có thể được Hân tự mình diễn đạt bằng giọng nói thông qua ứng dụng. Với gia đình, giá trị của THANH ÂM không chỉ nằm ở công nghệ. Điều quý giá hơn là ứng dụng giúp Hân có thêm một cách để tự thể hiện suy nghĩ, cảm xúc và nhu cầu của mình.”",
        "consent"      => true,
        "media_type"   => "image",
        "media_note"   => "Lưu Gia Hân tại Trường Đại học Tiền Giang",
        "media_src"    => "/ThanhAM/Images/GIaHan.jpg",
        "media_link"   => "https://drive.google.com/drive/folders/1p4LIOm7ntJL_XZHjbi-U2W22_tHfFxco",
        "featured"     => true,
    ],
    [
        "id"           => "be-n",
        "code"         => "Hành trình của Bé N.",
        "category"     => "truong-hoc",
        "is_public"    => false,
        "name"         => "Bé N. (8 tuổi)",
        "meta"         => "Tại TP. Mỹ Tho · Học sinh Trường Khiếm Thính Nhân Ái",
        "share_user"   => "“Con thích được đến lớp học nói cùng các bạn. Con vẽ được nhiều hình con vật lắm, con muốn học thêm để nói chuyện được với bà ngoại mỗi khi về nhà.”",
        "share_family" => "“Nhà trường ghi nhận sự tiến bộ rõ rệt của bé N. trong khả năng phát âm và hòa nhập cùng bạn bè sau thời gian được chương trình hỗ trợ phần mềm và thiết bị.” — Giáo viên chủ nhiệm",
        "consent"      => true,
        "media_type"   => "image",
        "media_note"   => "Lớp học giao tiếp tại Mái ấm Nhân Ái (Góc chụp bảo mật)",
        "media_src"    => "/ThanhAM/uploads/Images/doi-ngu-mai-am-nhan-ai.png",
        "featured"     => false,
    ],
    [
        "id"           => "be-t",
        "code"         => "Hành trình của Bé T.",
        "category"     => "thiet-bi",
        "is_public"    => false,
        "name"         => "Bé T. (10 tuổi)",
        "meta"         => "Huyện Châu Thành, Tiền Giang · Học hòa nhập trường tiểu học",
        "share_user"   => "“Em cảm ơn các cô chú đã tặng máy trợ thính cho em. Bây giờ em nghe cô giáo giảng bài rõ hơn nhiều và tự tin giơ tay phát biểu trước lớp.”",
        "share_family" => "“Chúng tôi từng rất lo lắng vì hoàn cảnh khó khăn không đủ điều kiện mua thiết bị trợ thính cho con. Sự hỗ trợ kịp thời đã giúp con tiếp tục đến trường và không bị bỏ lại phía sau.” — Người giám hộ",
        "consent"      => true,
        "media_type"   => "video",
        "media_note"   => "Video ngắn ghi lại buổi trao thiết bị và hỗ trợ can thiệp",
        "media_video"  => "/ThanhAM/uploads/Videos/clip sử dụng chung.mp4",
        "featured"     => false,
    ],
    [
        "id"           => "be-k",
        "code"         => "Hành trình của Bé K.",
        "category"     => "can-thiep",
        "is_public"    => false,
        "name"         => "Bé K. (5 tuổi)",
        "meta"         => "TX. Cai Lậy, Tiền Giang · Lớp can thiệp sớm ngôn ngữ",
        "share_user"   => "“Bé rất thích giờ chơi âm nhạc cùng ứng dụng, mỗi lần nghe được tiếng trống và phát âm chuẩn từ là bé cười rất tươi và vỗ tay khoe mẹ.”",
        "share_family" => "“Chương trình can thiệp sớm kết hợp AI đã giúp bé K. cải thiện khả năng tập trung nghe – nói đáng kể chỉ sau vài tháng đồng hành.” — Chuyên viên can thiệp sớm",
        "consent"      => false,
        "media_type"   => "placeholder",
        "media_note"   => "Hoạt động can thiệp sớm âm ngữ trị liệu",
        "featured"     => false,
    ],
];

function e($str) { return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8'); }

require __DIR__ . '/../includes/header.php';
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Sora:wght@400;600;700;800&family=Playfair+Display:ital,wght@0,600;1,600;1,700&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="../assets/css/stylecauchuyen.css?v=<?= time(); ?>">
<link rel="stylesheet" href="/ThanhAM/assets/css/stylecauchuyen.css?v=<?= time(); ?>">

<style>
<?php
$cssPath = __DIR__ . '/../assets/css/stylecauchuyen.css';
if (file_exists($cssPath)) {
    echo file_get_contents($cssPath);
}
?>
</style>

<main class="sc-page">

    <!-- ==================== HERO / QUOTE BANNER ==================== -->
    <section class="sc-hero">
        <div class="sc-container">
            <div class="sc-hero-content">
                <div class="sc-breadcrumb">
                    <a href="/ThanhAM/index.php"><i class="fa-solid fa-house"></i> Trang chủ</a>
                    <span>/</span>
                    <span>Câu chuyện truyền cảm hứng</span>
                </div>

                <div>
                    <span class="sc-badge-glow">
                        <span class="pulse-dot"></span> Hành trình lan tỏa yêu thương
                        <span class="sc-soundwave">
                            <span></span><span></span><span></span><span></span><span></span>
                        </span>
                    </span>
                </div>

                <h1>Những Hành Trình Được Lắng Nghe</h1>

                <div class="sc-hero-quote-card">
                    <i class="fa-solid fa-quote-left sc-quote-icon"></i>
                    <div class="sc-hero-quote-text">
                        Thanh Âm tin rằng: <em>“Dù mỗi người có một hoàn cảnh khác nhau, nhưng ai cũng xứng đáng được lắng nghe.”</em>
                    </div>
                    <p class="sc-hero-sub">
                        Mỗi câu chuyện dưới đây là một hành trình có thật — nơi sự thấu hiểu, công nghệ nhân văn và tình người đã biến những khoảng lặng thành nụ cười và tiếng nói tự tin.
                    </p>
                </div>

                <!-- Impact Stats Bar -->
                <div class="sc-hero-stats">
                    <div class="sc-stat-item">
                        <span class="sc-stat-num">50+ Em</span>
                        <span class="sc-stat-label">Đã được tiếp cận hỗ trợ</span>
                    </div>
                    <div class="sc-stat-item">
                        <span class="sc-stat-num">03+ Điểm trường</span>
                        <span class="sc-stat-label">Mái ấm & Trường khiếm thính</span>
                    </div>
                    <div class="sc-stat-item">
                        <span class="sc-stat-num">1.000+ Giờ</span>
                        <span class="sc-stat-label">Giao tiếp chủ động</span>
                    </div>
                    <div class="sc-stat-item">
                        <span class="sc-stat-num">100% Bảo mật</span>
                        <span class="sc-stat-label">Quyền riêng tư & Nhân phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="sc-container">

        <!-- ==================== SECTION HEADER & FILTER ==================== -->
        <div class="sc-sec-head">
            <span class="sc-tag"><i class="fa-solid fa-heart"></i> Lắng nghe &amp; Đồng cảm</span>
            <h2 class="sc-sec-title">Góc Nhìn Từ Những Người Trong Cuộc</h2>
            <p class="sc-sec-desc">
                Vì sự an toàn và sự tôn trọng quyền riêng tư của các em nhỏ, chỉ những trường hợp đã đồng ý công khai mới hiển thị danh tính. Các câu chuyện còn lại được ẩn danh theo cam kết đạo đức của Thanh Âm.
            </p>
        </div>

        <!-- Filter Buttons -->
        <div class="sc-filters">
            <button type="button" class="sc-filter-btn active" data-filter="all">
                <i class="fa-solid fa-layer-group"></i> Tất cả câu chuyện
            </button>
            <button type="button" class="sc-filter-btn" data-filter="featured">
                <i class="fa-solid fa-star"></i> Câu chuyện tiêu biểu (Gia Hân)
            </button>
            <button type="button" class="sc-filter-btn" data-filter="truong-hoc">
                <i class="fa-solid fa-school"></i> Mái ấm &amp; Trường học
            </button>
            <button type="button" class="sc-filter-btn" data-filter="thiet-bi">
                <i class="fa-solid fa-microchip"></i> Thiết bị &amp; Video
            </button>
            <button type="button" class="sc-filter-btn" data-filter="can-thiep">
                <i class="fa-solid fa-seedling"></i> Can thiệp sớm
            </button>
        </div>

        <!-- ==================== FEATURED STORY (LƯU GIA HÂN) ==================== -->
        <?php 
        $featured_story = null;
        $other_stories = [];
        foreach ($stories as $st) {
            if (!empty($st['featured'])) {
                $featured_story = $st;
            } else {
                $other_stories[] = $st;
            }
        }
        ?>

        <?php if ($featured_story): ?>
        <article class="sc-featured-card" data-category="<?= e($featured_story['category']) ?>" id="story-<?= e($featured_story['id']) ?>">
            <span class="sc-featured-ribbon">
                <i class="fa-solid fa-crown"></i> Câu chuyện tiêu biểu
            </span>

            <div class="sc-featured-body">
                <div class="sc-story-header">
                    <h3 class="sc-story-title"><?= e($featured_story['code']) ?></h3>
                    <div class="sc-story-meta">
                        <i class="fa-solid fa-user-check"></i> <?= e($featured_story['name']) ?>
                        <span>· <?= e($featured_story['meta']) ?></span>
                    </div>
                </div>

                <?php if (!empty($featured_story['background'])): ?>
                <p class="sc-story-background">
                    <i class="fa-solid fa-book-open" style="color: var(--sc-blue); margin-right: 6px;"></i>
                    <?= nl2br(e($featured_story['background'])) ?>
                </p>
                <?php endif; ?>

                <!-- Quote Switcher Tabs -->
                <div class="sc-quote-tabs-wrap">
                    <div class="sc-quote-tabs-nav">
                        <button type="button" class="sc-quote-tab-btn active" data-quote-tab="user-gh">
                            <i class="fa-solid fa-comment-dots"></i> Tâm sự của Gia Hân
                        </button>
                        <button type="button" class="sc-quote-tab-btn" data-quote-tab="family-gh">
                            <i class="fa-solid fa-people-roof"></i> Góc nhìn từ Gia đình
                        </button>
                    </div>

                    <div class="sc-quote-tab-pane active" id="quote-pane-user-gh">
                        <blockquote><?= nl2br(e($featured_story['share_user'])) ?></blockquote>
                        <div class="sc-speaker-tag">
                            <i class="fa-solid fa-microphone-lines"></i> Chia sẻ trực tiếp từ Lưu Gia Hân
                        </div>
                    </div>

                    <div class="sc-quote-tab-pane" id="quote-pane-family-gh">
                        <blockquote><?= nl2br(e($featured_story['share_family'])) ?></blockquote>
                        <div class="sc-speaker-tag">
                            <i class="fa-solid fa-heart"></i> Chia sẻ từ gia đình Gia Hân
                        </div>
                    </div>
                </div>

                <?php if ($featured_story['consent']): ?>
                <div class="sc-consent-badge">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Đã được sự đồng ý từ phía gia đình và nhân vật để công khai danh tính &amp; câu chuyện truyền cảm hứng này.</span>
                </div>
                <?php endif; ?>
            </div>

            <div class="sc-featured-media">
                <img src="<?= e($featured_story['media_src']) ?>" alt="<?= e($featured_story['media_note']) ?>" loading="lazy">
                <div class="sc-media-bottom-overlay">
                    <span class="sc-media-caption">
                        <i class="fa-solid fa-camera"></i> <?= e($featured_story['media_note']) ?>
                    </span>
                    <?php if (!empty($featured_story['media_link'])): ?>
                    <a href="<?= e($featured_story['media_link']) ?>" target="_blank" rel="noopener" class="sc-drive-btn">
                        <i class="fa-brands fa-google-drive"></i> Xem thư mục hình ảnh &amp; tư liệu Drive
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </article>
        <?php endif; ?>

        <!-- ==================== COMMUNITY STORIES GRID ==================== -->
        <div class="sc-story-grid">
            <?php foreach ($other_stories as $s): ?>
            <article class="sc-card" data-category="<?= e($s['category']) ?>" id="story-<?= e($s['id']) ?>">
                
                <div class="sc-card-media">
                    <span class="sc-privacy-badge">
                        <i class="fa-solid fa-shield-halved"></i> Ẩn danh bảo mật
                    </span>

                    <?php if (!empty($s['media_src'])): ?>
                        <img src="<?= e($s['media_src']) ?>" alt="<?= e($s['media_note']) ?>" loading="lazy">
                    <?php elseif ($s['media_type'] === 'video'): ?>
                        <div class="sc-placeholder-art">
                            <i class="fa-solid fa-circle-play"></i>
                            <span><?= e($s['media_note']) ?></span>
                        </div>
                        <button type="button" class="sc-video-play-btn" data-video-src="<?= e($s['media_video']) ?>" aria-label="Phát video câu chuyện">
                            <i class="fa-solid fa-play"></i>
                        </button>
                    <?php else: ?>
                        <div class="sc-placeholder-art">
                            <i class="fa-solid fa-child-reaching"></i>
                            <span><?= e($s['media_note']) ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="sc-card-body">
                    <h3><?= e($s['code']) ?></h3>
                    <div class="sc-card-meta">
                        <i class="fa-solid fa-user"></i> <?= e($s['name']) ?>
                        <span>· <?= e($s['meta']) ?></span>
                    </div>

                    <!-- Speech Bubble: User -->
                    <div class="sc-quote-bubble">
                        <?= nl2br(e($s['share_user'])) ?>
                        <span class="sc-quote-who">Lời tâm sự của bé</span>
                    </div>

                    <!-- Speech Bubble: Family / Teacher -->
                    <div class="sc-quote-bubble family">
                        <?= nl2br(e($s['share_family'])) ?>
                        <span class="sc-quote-who">Gia đình &amp; Nhà trường</span>
                    </div>

                    <div class="sc-consent-badge">
                        <i class="fa-solid fa-circle-check"></i>
                        <span><?= $s['consent'] ? 'Đã nhận được sự đồng thuận chia sẻ thông tin ẩn danh từ gia đình.' : 'Thông tin và tư liệu được bảo mật hình ảnh theo tiêu chuẩn nhân văn.' ?></span>
                    </div>
                </div>

            </article>
            <?php endforeach; ?>
        </div>

        <!-- ==================== ETHICS & PRIVACY PLEDGE ==================== -->
        <div class="sc-pledge-box">
            <div class="sc-pledge-icon">
                <i class="fa-solid fa-hand-holding-heart"></i>
            </div>
            <div class="sc-pledge-content">
                <h3>Cam Kết Nhân Văn &amp; Bảo Vệ Quyền Riêng Tư</h3>
                <p>
                    Tại Thanh Âm, sự tôn trọng và bảo vệ danh tính của các em nhỏ là nguyên tắc đạo đức bất khả xâm phạm. Mọi hình ảnh, clip và câu chuyện đều chỉ được sử dụng với mục đích lan tỏa thông điệp cộng đồng tích cực và đã thông qua sự đồng thuận đầy đủ từ gia đình hoặc người giám hộ hợp pháp.
                </p>
            </div>
        </div>

        <!-- ==================== CALL TO ACTION ==================== -->
        <section class="sc-cta-section">
            <div class="sc-cta-content">
                <h2>Cùng Thanh Âm Nối Dài Những Hành Trình Yêu Thương</h2>
                <p>
                    Mỗi sự chung tay đồng hành từ bạn là chiếc cầu nối tiếp thêm sức mạnh để nhiều em nhỏ gặp khó khăn ngôn ngữ được tự tin cất lên tiếng nói của chính mình.
                </p>
                <div class="sc-cta-actions">
                    <a href="/ThanhAM/pages/dong_hanh.php" class="sc-btn-gold">
                        <i class="fa-solid fa-hands-holding-child"></i> Đồng hành cùng Thanh Âm
                    </a>
                    <a href="/ThanhAM/pages/giaiphap.php" class="sc-btn-outline-white">
                        <i class="fa-solid fa-cubes"></i> Tìm hiểu giải pháp công nghệ
                    </a>
                </div>
            </div>
        </section>

    </div>

</main>

<!-- ==================== VIDEO MODAL ==================== -->
<div class="sc-video-modal" id="videoModal" aria-hidden="true">
    <button type="button" class="sc-modal-close" id="closeVideoModal" aria-label="Đóng video">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="sc-video-container">
        <video id="modalVideoPlayer" controls preload="metadata">
            <source src="" type="video/mp4">
            Trình duyệt của bạn không hỗ trợ phát video HTML5.
        </video>
    </div>
</div>

<!-- ==================== LIGHTBOX MODAL ==================== -->
<div class="lightbox" data-lightbox aria-hidden="true">
    <button type="button" class="lightbox-close" data-lightbox-close aria-label="Đóng ảnh">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <img src="" alt="" data-lightbox-image>
</div>

<?php
include '../includes/footer.php';
?>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // 1. FILTER CÂU CHUYỆN
    const filterButtons = document.querySelectorAll(".sc-filter-btn");
    const storyCards = document.querySelectorAll("article[data-category]");

    filterButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            filterButtons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");

            const filterValue = btn.getAttribute("data-filter");

            storyCards.forEach(card => {
                const category = card.getAttribute("data-category");
                if (filterValue === "all" || category === filterValue) {
                    card.style.display = "";
                    card.style.animation = "scTabFade 0.4s ease";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });

    // 2. TAB CHIA SẺ TRONG BÀI TIÊU BIỂU (GIA HÂN)
    const quoteTabButtons = document.querySelectorAll(".sc-quote-tab-btn");
    quoteTabButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            quoteTabButtons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");

            const targetTab = btn.getAttribute("data-quote-tab");
            document.querySelectorAll(".sc-quote-tab-pane").forEach(pane => pane.classList.remove("active"));

            const activePane = document.getElementById("quote-pane-" + targetTab);
            if (activePane) activePane.classList.add("active");
        });
    });

    // 3. VIDEO MODAL POPUP
    const videoModal = document.getElementById("videoModal");
    const videoPlayer = document.getElementById("modalVideoPlayer");
    const closeVideoBtn = document.getElementById("closeVideoModal");

    document.querySelectorAll("[data-video-src]").forEach(btn => {
        btn.addEventListener("click", () => {
            const videoSrc = btn.getAttribute("data-video-src");
            if (videoPlayer && videoSrc) {
                videoPlayer.src = videoSrc;
                videoModal.classList.add("open");
                videoModal.setAttribute("aria-hidden", "false");
                document.body.style.overflow = "hidden";
                videoPlayer.play().catch(() => {});
            }
        });
    });

    function closeVideo() {
        if (videoModal && videoPlayer) {
            videoPlayer.pause();
            videoPlayer.currentTime = 0;
            videoPlayer.src = "";
            videoModal.classList.remove("open");
            videoModal.setAttribute("aria-hidden", "true");
            document.body.style.overflow = "";
        }
    }

    if (closeVideoBtn) closeVideoBtn.addEventListener("click", closeVideo);
    if (videoModal) {
        videoModal.addEventListener("click", e => {
            if (e.target === videoModal) closeVideo();
        });
    }

    document.addEventListener("keydown", e => {
        if (e.key === "Escape") closeVideo();
    });
});
</script>

<script src="/ThanhAM/assets/js/main.js"></script>
<?php
$conn->close();
?>