<?php
/**
 * pages/cauchuyen.php — Trang "Câu chuyện"
 * Dùng chung header.php / footer.php với các trang khác.
 */

require_once __DIR__ . '/../connect.php';

$page_title = 'Câu chuyện';

// ---------------------------------------------------------------
// DỮ LIỆU CÂU CHUYỆN
// Quy tắc riêng tư:
//  - is_public = true  => chỉ dùng cho câu chuyện của Hân (tên thật, ảnh mặt)
//  - is_public = false => ẩn danh, mô tả chung chung, ảnh/clip quay từ phía sau lưng
//  - consent  = true    => hiển thị dòng "Đã được sự đồng ý từ phía ..."
// ---------------------------------------------------------------
$stories = [
    [
        "code"         => "Câu chuyện của Lưu Gia Hân",
        "is_public"    => true,
        "name"         => "Lưu Gia Hân",
        "meta"         => "Trường Đại học Tiền Giang",
        "background"   => "Năm 2 tuổi, Gia Hân mắc viêm não Nhật Bản. Sau biến cố ấy, Hân mất đi khả năng nói – một điều tưởng chừng rất bình thường nhưng lại trở thành rào cản trong cuộc sống hằng ngày. Hân vẫn có suy nghĩ, cảm xúc, ước mơ và rất nhiều điều muốn được chia sẻ. Chỉ là, những điều ấy không thể dễ dàng được cất thành lời. Có những lúc Hân muốn nói một câu rất đơn giản, muốn giải thích điều mình đang nghĩ, muốn trò chuyện với mọi người nhưng lại phải tìm một cách khác để người đối diện hiểu mình. Không phải Hân không muốn cất tiếng. Chỉ là có những lúc, im lặng trở thành cách duy nhất.",
        "share_user"   => "“Có những lúc mình biết mình muốn nói gì, muốn giải thích hay muốn kể cho mọi người nghe rất nhiều điều, nhưng việc không thể nói thành lời khiến mình buộc phải im lặng. Trước đây, mỗi khi giao tiếp, mình thường phải viết ra giấy, nhắn tin hoặc nhờ người khác nói giúp. Có những câu rất đơn giản nhưng để truyền đạt được đầy đủ suy nghĩ của mình lại mất rất nhiều thời gian. Khi sử dụng THANH ÂM, mình cảm thấy việc giao tiếp trở nên chủ động hơn. Mình có thể nhập điều mình muốn nói, chỉnh sửa lại câu chữ rồi để ứng dụng hỗ trợ phát thành giọng nói. Điều mình vui nhất không chỉ là app có thể nói thay mình, mà là mình có thể tự mình lựa chọn điều muốn nói và nói ra theo cách của mình. THANH ÂM giúp mình cảm thấy khoảng cách giữa ‘muốn nói’ và ‘có thể nói’ không còn quá xa nữa. Mình hy vọng sẽ có thêm nhiều người giống mình có thể sử dụng công nghệ để giao tiếp dễ dàng hơn, tự tin hơn và không còn phải im lặng chỉ vì mình không thể cất tiếng.”",
        "share_family" => "“Từ nhỏ, Gia Hân đã phải đối mặt với một rào cản rất lớn trong giao tiếp. Điều khiến gia đình thương nhất không phải là việc con không thể nói, mà là có rất nhiều điều con muốn chia sẻ nhưng đôi khi không thể truyền đạt được trọn vẹn. Khi THANH ÂM được đưa vào sử dụng, chúng tôi nhận thấy Hân chủ động hơn trong giao tiếp. Những điều trước đây phải viết ra hoặc nhờ người khác hỗ trợ giờ đây có thể được Hân tự mình diễn đạt bằng giọng nói thông qua ứng dụng. Với gia đình, giá trị của THANH ÂM không chỉ nằm ở công nghệ. Điều quý giá hơn là ứng dụng giúp Hân có thêm một cách để tự thể hiện suy nghĩ, cảm xúc và nhu cầu của mình.”",
        "consent"      => true,
        "media_type"   => "image",
        "media_note"   => "Ảnh: Lưu Gia Hân tại Trường Đại học Tiền Giang",
        "media_src"    => "/ThanhAM/Images/1787227705858_1853320507020962622_3605127511309582209_3c9cd69c27377da59bc50a89386b9878.jpg",
        "media_link"   => "https://drive.google.com/drive/folders/1p4LIOm7ntJL_XZHjbi-U2W22_tHfFxco",
        "reverse"      => false,
        "featured"     => true,
    ],
    [
        "code"         => "Câu chuyện 2",
        "is_public"    => false,
        "name"         => "Bé N.",
        "meta"         => "Tại Mỹ Tho, học Trường Khiếm Thính Nhân Ái",
        "share_user"   => "“Con thích được đến lớp học nói cùng các bạn. Con vẽ được nhiều hình con vật lắm, con muốn học thêm để nói chuyện được với bà ngoại.”",
        "share_family" => "“Nhà trường ghi nhận sự tiến bộ rõ rệt của bé N. trong khả năng phát âm và hòa nhập cùng bạn bè sau thời gian được chương trình hỗ trợ.” — Giáo viên chủ nhiệm",
        "consent"      => false,
        "media_type"   => "image",
        "media_note"   => "Ảnh chụp từ phía sau, không công khai danh tính",
        "reverse"      => true,
        "featured"     => false,
    ],
    [
        "code"         => "Câu chuyện 3",
        "is_public"    => false,
        "name"         => "Bé T.",
        "meta"         => "Tại Châu Thành, Tiền Giang, học hòa nhập tại trường tiểu học địa phương",
        "share_user"   => "“Em cảm ơn các cô chú đã tặng máy trợ thính cho em. Bây giờ em nghe cô giáo giảng bài rõ hơn nhiều.”",
        "share_family" => "“Chúng tôi từng rất lo lắng vì hoàn cảnh khó khăn không đủ điều kiện mua thiết bị trợ thính cho con. Sự hỗ trợ kịp thời đã giúp con tiếp tục đến trường.” — Người giám hộ",
        "consent"      => true,
        "media_type"   => "video",
        "media_note"   => "Video ngắn ghi lại buổi trao thiết bị (quay từ phía sau)",
        "reverse"      => false,
        "featured"     => false,
    ],
    [
        "code"         => "Câu chuyện 4",
        "is_public"    => false,
        "name"         => "Bé K.",
        "meta"         => "Tại Cai Lậy, Tiền Giang, đang theo học lớp can thiệp sớm",
        "share_user"   => "“Bé rất thích giờ chơi âm nhạc, mỗi lần nghe được tiếng trống là bé cười rất tươi.”",
        "share_family" => "“Chương trình can thiệp sớm đã giúp bé K. cải thiện khả năng nghe – nói đáng kể chỉ sau vài tháng.” — Trung tâm can thiệp sớm",
        "consent"      => false,
        "media_type"   => "image",
        "media_note"   => "Ảnh chụp từ phía sau, không công khai danh tính",
        "reverse"      => true,
        "featured"     => false,
    ],
];

function e($str) { return htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); }

require __DIR__ . '/../includes/header.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="/ThanhAM/assets/css/stylecauchuyen.css">

<!-- ============================== HERO / QUOTE BANNER ============================== -->
<section class="story-hero">
    <div class="container hero-quote-card">
        <span class="hero-eyebrow">Thanh Âm đã hỗ trợ</span>
        <span class="quote-mark">“</span>
        <h1>Thanh Âm tin rằng: <em>“Dù mỗi người có một hoàn cảnh khác nhau,<br class="hide-mobile"> nhưng ai cũng xứng đáng được lắng nghe.”</em></h1>
        <p class="hero-sub">Mỗi câu chuyện dưới đây là một hành trình có thật — nơi sự lắng nghe, thấu hiểu và đồng hành đã tạo nên những đổi thay ấm áp.</p>
    </div>
</section>

<!-- ============================== DANH SÁCH CÂU CHUYỆN ============================== -->
<main class="container">
    <div class="section-head">
        <span class="eyebrow">Những hành trình được lắng nghe</span>
        <h2>Câu chuyện từ cộng đồng Thanh Âm</h2>
        <p>Vì sự an toàn và quyền riêng tư của các em nhỏ, chỉ những trường hợp đã đồng ý công khai mới hiển thị đầy đủ danh tính. Các câu chuyện còn lại được ẩn danh theo đúng cam kết bảo mật của Thanh Âm.</p>
    </div>

    <div class="story-list">
        <?php foreach ($stories as $s): ?>
        <article class="story-card<?= $s['reverse'] ? ' reverse' : '' ?><?= $s['featured'] ? ' featured' : '' ?>">

            <div class="story-body">
    <span class="story-tag <?= $s['is_public'] ? 'public' : 'private' ?>">
        <?= $s['is_public'] ? '★ Câu chuyện được công khai' : '🔒 Câu chuyện ẩn danh' ?>
    </span>

    <h3><?= e($s['code']) ?><?= $s['is_public'] ? ' — ' . e($s['name']) : '' ?></h3>
    <div class="story-meta">
        <?= e($s['name']) ?>
        <span> · <?= e($s['meta']) ?></span>
    </div>

    <?php if (!empty($s['background'])): ?>
        <p class="story-background"><?= e($s['background']) ?></p>
    <?php endif; ?>

    <div class="story-quote-block">
        <?= e($s['share_user']) ?>
        <span class="who">Chia sẻ từ <?= $s['is_public'] ? e($s['name']) : 'nhân vật trong câu chuyện' ?></span>
    </div>

    <div class="story-quote-block">
        <?= e($s['share_family']) ?>
        <span class="who">Chia sẻ từ gia đình / nhà trường / người giám hộ</span>
    </div>

    <?php if ($s['consent']): ?>
    <div class="consent-note">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#c8115f" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <span>Đã được sự đồng ý từ phía <?= $s['is_public'] ? 'gia đình và nhà trường để công khai câu chuyện này.' : 'gia đình / nhà trường cho việc chia sẻ hình ảnh (ẩn danh, không lộ diện).' ?></span>
    </div>
    <?php endif; ?>
</div>

<div class="story-media">
    <?php if (!empty($s['media_src'])): ?>
        <img src="<?= e($s['media_src']) ?>" alt="<?= e($s['media_note']) ?>">
    <?php elseif ($s['is_public']): ?>
        <div class="media-placeholder">
            <svg width="46" height="46" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="4" stroke="#144fb0" stroke-width="2"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" stroke="#144fb0" stroke-width="2" stroke-linecap="round"/></svg>
            <span><?= e($s['media_note']) ?></span>
        </div>
    <?php else: ?>
        <div class="media-placeholder">
            <svg width="46" height="46" viewBox="0 0 24 24" fill="none"><path d="M12 3v9m0 0c-4 0-7 2.5-7 6.5V21h14v-2.5C19 14.5 16 12 12 12Z" stroke="#144fb0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span><?= e($s['media_note']) ?></span>
        </div>
        <div class="media-badge">Ẩn danh - chụp từ phía sau</div>
    <?php endif; ?>

    <?php if (!empty($s['media_link'])): ?>
        <a href="<?= e($s['media_link']) ?>" target="_blank" rel="noopener" class="media-drive-link">
            <i class="fa-brands fa-google-drive"></i> Xem ảnh/clip đầy đủ
        </a>
    <?php endif; ?>

    <?php if ($s['media_type'] === 'video'): ?>
    <button class="play-btn" onclick="alert('Phát video minh họa (demo)');" aria-label="Phát video">
        <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
    </button>
    <?php endif; ?>
</div>
        </article>
        <?php endforeach; ?>
    </div>
</main>

<!-- ============================== CTA ============================== -->
<section class="story-cta">
    <div class="container">
        <h2>Bạn cũng có thể trở thành một phần của câu chuyện tiếp theo</h2>
        <p>Mỗi đóng góp của bạn giúp Thanh Âm mang thêm cơ hội được lắng nghe đến với nhiều em nhỏ hơn nữa.</p>
        <a href="/ThanhAM/pages/donghanh.php" class="btn btn-accent">Đồng hành cùng Thanh Âm</a>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
<?php
$conn->close();
?>