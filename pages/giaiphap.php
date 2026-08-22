<?php
/**
 * pages/giaiphap.php — Trang "Giải pháp"
 * Dùng chung header.php / footer.php với trangchu.php, vethanham.php.
 */

require_once __DIR__ . '/../connect.php';

$page_title = 'Giải pháp';

// ---------------------------------------------------------------
// DỮ LIỆU TÍNH NĂNG
// ---------------------------------------------------------------
$features_main = [
    [
        'id'      => 'phatgiong',
        'icon'    => 'fa-microphone-lines',
        'title'   => 'Phát giọng',
        'summary' => 'Chuyển giọng nói không chuẩn thành âm thanh rõ ràng, dễ hiểu.',
        'purpose' => 'Chuẩn hoá phát âm theo thời gian thực bằng mô hình AI, giúp người nghe hiểu đúng thông điệp ngay cả khi giọng nói gốc bị méo, ngọng hoặc khó nghe.',
        'target'  => 'Người khiếm thanh, người hạn chế khả năng nói, người mới tập nói sau phẫu thuật/phục hồi chức năng.',
        'steps'   => [
            'Mở ứng dụng Thanh Âm, chọn mục "Phát giọng".',
            'Nhấn giữ nút micro và nói như bình thường.',
            'Hệ thống AI xử lý và phát lại giọng nói đã được chuẩn hoá qua loa.',
            'Có thể lưu lại đoạn ghi âm để luyện tập phát âm.',
        ],
        'video'   => 'phat-giong.mp4',
    ],
    [
        'id'      => 'vanban',
        'icon'    => 'fa-keyboard',
        'title'   => 'Văn bản',
        'summary' => 'Gõ chữ để hệ thống đọc to thay lời muốn nói.',
        'purpose' => 'Chuyển văn bản thành giọng nói tự nhiên (Text-to-Speech), hỗ trợ giao tiếp cho người không thể phát âm hoặc gặp khó khăn khi nói trực tiếp.',
        'target'  => 'Người mất khả năng nói, người khiếm thính giao tiếp với người không biết ngôn ngữ ký hiệu, bệnh nhân sau phẫu thuật vùng hầu họng.',
        'steps'   => [
            'Chọn mục "Văn bản" trên màn hình chính.',
            'Gõ hoặc dán nội dung cần truyền đạt vào ô nhập liệu.',
            'Nhấn nút phát để hệ thống đọc to nội dung.',
            'Có thể lưu câu thường dùng để tái sử dụng nhanh.',
        ],
        'video'   => 'van-ban.mp4',
    ],
    [
        'id'      => 'canhanhoa',
        'icon'    => 'fa-sliders',
        'title'   => 'Cá nhân hóa',
        'summary' => 'Tùy chỉnh giọng đọc, tốc độ và bộ từ vựng riêng.',
        'purpose' => 'Cho phép mỗi người dùng điều chỉnh giọng nói tổng hợp (nam/nữ/trẻ em), tốc độ đọc, và xây dựng bộ từ vựng/câu quen dùng của riêng mình để giao tiếp tự nhiên hơn.',
        'target'  => 'Mọi nhóm người dùng, đặc biệt trẻ em và người có nhu cầu giao tiếp đặc thù theo hoàn cảnh sống.',
        'steps'   => [
            'Vào mục "Cá nhân hóa" trong phần Cài đặt.',
            'Chọn giọng đọc, tốc độ, âm lượng phù hợp.',
            'Thêm các từ/câu thường dùng vào bộ từ vựng cá nhân.',
            'Lưu lại để áp dụng cho toàn bộ ứng dụng.',
        ],
        'video'   => 'ca-nhan-hoa.mp4',
    ],
    [
        'id'      => 'mocham',
        'icon'    => 'fa-hand-pointer',
        'title'   => '1 Chạm',
        'summary' => 'Thẻ từ vựng biểu cảm giúp truyền đạt nhu cầu tức thì.',
        'purpose' => 'Bộ thẻ hình ảnh/biểu tượng cho các nhu cầu cơ bản (đói, khát, đau, mệt, muốn đi vệ sinh...) — chỉ cần chạm 1 lần là phát ra câu nói tương ứng, không cần gõ chữ.',
        'target'  => 'Trẻ chậm phát triển ngôn ngữ, người khuyết tật vận động kèm khó khăn ngôn ngữ, người cần phản hồi tức thời trong tình huống khẩn cấp nhẹ.',
        'steps'   => [
            'Mở mục "1 Chạm" từ màn hình chính.',
            'Chọn thẻ biểu tượng phù hợp với nhu cầu hiện tại.',
            'Hệ thống tự động phát câu nói tương ứng.',
            'Có thể thêm thẻ mới theo nhu cầu cá nhân.',
        ],
        'video'   => 'mot-cham.mp4',
    ],
    [
        'id'      => 'suachinhta',
        'icon'    => 'fa-spell-check',
        'title'   => 'Sửa chính tả',
        'summary' => 'Tự động phát hiện và gợi ý sửa lỗi khi soạn văn bản.',
        'purpose' => 'Hỗ trợ người dùng gặp khó khăn về ngôn ngữ viết đúng chính tả và ngữ pháp trước khi hệ thống đọc to, tránh gây hiểu lầm cho người nghe.',
        'target'  => 'Người khiếm thính, trẻ chậm phát triển ngôn ngữ, người mới học chữ hoặc học tiếng Việt.',
        'steps'   => [
            'Bật tính năng "Sửa chính tả" trong mục Văn bản.',
            'Gõ nội dung như bình thường, lỗi sẽ được gạch chân.',
            'Nhấn vào từ được gạch chân để xem gợi ý sửa.',
            'Chọn từ đúng để thay thế tự động.',
        ],
        'video'   => 'sua-chinh-ta.mp4',
    ],
    [
        'id'      => 'sos',
        'icon'    => 'fa-triangle-exclamation',
        'title'   => 'SOS',
        'summary' => 'Gửi vị trí và thông điệp cứu hộ khẩn cấp chỉ với 1 nút.',
        'purpose' => 'Trong tình huống khẩn cấp, người dùng chỉ cần bấm giữ nút SOS để gửi vị trí GPS hiện tại kèm thông điệp cầu cứu đến người thân/số khẩn cấp đã lưu sẵn, kể cả khi không thể nói.',
        'target'  => 'Người cao tuổi sống một mình, bệnh nhân, người khuyết tật vận động và ngôn ngữ, trẻ em khi ở nhà một mình.',
        'steps'   => [
            'Bấm giữ nút SOS màu đỏ trong 3 giây.',
            'Hệ thống tự động gửi vị trí + tin nhắn khẩn đến liên hệ đã cài đặt.',
            'Có thể huỷ trong 5 giây đầu nếu bấm nhầm.',
            'Cài đặt danh sách liên hệ khẩn cấp trong phần Cài đặt SOS.',
        ],
        'video'   => 'sos.mp4',
    ],
    [
        'id'      => 'goiytraloi',
        'icon'    => 'fa-comments',
        'title'   => 'Gợi ý trả lời',
        'summary' => 'AI đề xuất sẵn các câu trả lời phù hợp ngữ cảnh.',
        'purpose' => 'Khi đang trò chuyện, hệ thống phân tích ngữ cảnh và gợi ý sẵn 2-3 câu trả lời ngắn gọn, phù hợp — giúp người dùng phản hồi nhanh mà không cần soạn từ đầu.',
        'target'  => 'Người hạn chế khả năng nói/gõ chữ chậm, người cao tuổi, người cần giao tiếp nhanh trong công việc hoặc y tế.',
        'steps'   => [
            'Trong khung chat của ứng dụng, nhận tin nhắn/câu hỏi từ người đối diện.',
            'Hệ thống hiển thị 2-3 gợi ý trả lời phía trên bàn phím.',
            'Chạm vào gợi ý để phát ngay hoặc chỉnh sửa trước khi gửi.',
        ],
        'video'   => 'goi-y-tra-loi.mp4',
    ],
    [
        'id'      => 'thuvien',
        'icon'    => 'fa-book-open',
        'title'   => 'Thư viện',
        'summary' => 'Kho câu nói, từ vựng và bài luyện tập theo chủ đề.',
        'purpose' => 'Lưu trữ có hệ thống các câu nói thông dụng theo chủ đề (gia đình, trường học, y tế, mua sắm...) và các bài luyện phát âm, giúp người dùng tra cứu và luyện tập mọi lúc.',
        'target'  => 'Mọi nhóm người dùng, đặc biệt hữu ích cho giáo viên giáo dục đặc biệt và người chăm sóc khi hướng dẫn luyện tập.',
        'steps'   => [
            'Vào mục "Thư viện" trên thanh điều hướng.',
            'Chọn chủ đề cần tra cứu hoặc luyện tập.',
            'Nhấn vào từng câu để nghe mẫu phát âm chuẩn.',
            'Đánh dấu "yêu thích" các câu hay dùng để truy cập nhanh.',
        ],
        'video'   => 'thu-vien.mp4',
    ],
];

$features_extra = [
    [
        'id'      => 'docvanban',
        'icon'    => 'fa-volume-high',
        'title'   => 'Đọc văn bản',
        'summary' => 'Đọc to nội dung từ ảnh, tài liệu hoặc trang web.',
        'purpose' => 'Quét văn bản từ ảnh chụp hoặc dán nội dung từ tài liệu/trang web để hệ thống đọc to, hỗ trợ người khiếm thị nhẹ hoặc khó đọc chữ nhỏ.',
        'target'  => 'Người cao tuổi, người khiếm thính cần đọc hiểu văn bản dài, người có khó khăn về thị lực.',
        'steps'   => [
            'Chọn mục "Đọc văn bản" trong phần tính năng mở rộng.',
            'Chụp ảnh tài liệu hoặc dán văn bản cần đọc.',
            'Nhấn phát để nghe nội dung được đọc to, rõ ràng.',
        ],
        'video'   => 'doc-van-ban.mp4',
    ],
    [
        'id'      => 'nhaclich',
        'icon'    => 'fa-bell',
        'title'   => 'Nhắc lịch',
        'summary' => 'Nhắc giờ uống thuốc, tái khám và các lịch quan trọng.',
        'purpose' => 'Đặt lời nhắc bằng giọng nói cho các mốc thời gian quan trọng (uống thuốc, tái khám, lịch học), giảm gánh nặng ghi nhớ cho người dùng và người chăm sóc.',
        'target'  => 'Bệnh nhân cần tuân thủ phác đồ điều trị, người cao tuổi, gia đình/người chăm sóc theo dõi lịch trình.',
        'steps'   => [
            'Vào mục "Nhắc lịch", nhấn "Thêm lời nhắc mới".',
            'Nhập nội dung, chọn thời gian và tần suất lặp lại.',
            'Hệ thống sẽ phát thông báo bằng giọng nói đúng giờ đã đặt.',
        ],
        'video'   => 'nhac-lich.mp4',
    ],
];

// ---------------------------------------------------------------
// DỮ LIỆU ĐỐI TƯỢNG SỬ DỤNG
// ---------------------------------------------------------------
$audiences = [
    ['icon' => 'fa-comment-slash', 'title' => 'Người khiếm thanh / mất khả năng nói', 'desc' => 'Người không thể phát âm hoặc bị hạn chế khả năng nói do bẩm sinh, bệnh lý hoặc chấn thương.'],
    ['icon' => 'fa-ear-deaf', 'title' => 'Người khiếm thính', 'desc' => 'Cần công cụ chuyển đổi giữa văn bản, giọng nói và hình ảnh để giao tiếp hai chiều thuận tiện hơn.'],
    ['icon' => 'fa-person-cane', 'title' => 'Người cao tuổi', 'desc' => 'Hỗ trợ giao tiếp, nhắc lịch uống thuốc và kết nối khẩn cấp khi cần trợ giúp.'],
    ['icon' => 'fa-bed-pulse', 'title' => 'Bệnh nhân', 'desc' => 'Người đang điều trị, phục hồi chức năng vùng hầu họng hoặc gặp khó khăn tạm thời trong giao tiếp.'],
    ['icon' => 'fa-child-reaching', 'title' => 'Trẻ chậm phát triển ngôn ngữ', 'desc' => 'Hỗ trợ luyện phát âm và giao tiếp qua thẻ hình ảnh, câu nói mẫu dễ tiếp cận.'],
    ['icon' => 'fa-people-roof', 'title' => 'Gia đình / Người chăm sóc', 'desc' => 'Công cụ đồng hành để hiểu và hỗ trợ người thân giao tiếp tốt hơn mỗi ngày.'],
    ['icon' => 'fa-school', 'title' => 'Trường khuyết tật / Cơ sở giáo dục đặc biệt', 'desc' => 'Ứng dụng trong giảng dạy và hỗ trợ học sinh có nhu cầu giao tiếp đặc thù.'],
    ['icon' => 'fa-building-columns', 'title' => 'Doanh nghiệp giáo dục & cơ quan hành chính', 'desc' => 'Triển khai như một giải pháp hỗ trợ tiếp cận công bằng cho người yếu thế tại đơn vị.'],
    ['icon' => 'fa-circle-question', 'title' => 'Những ai cần sử dụng mà không thể...', 'desc' => 'Bất kỳ ai gặp rào cản giao tiếp trong hoàn cảnh cụ thể của riêng mình, dù không thuộc các nhóm trên.'],
];

require __DIR__ . '/../includes/header.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="/ThanhAM/assets/css/stylegiaiphap.css">

<section class="page-header">
  <div class="container">
    <div class="breadcrumb">
      <a href="/ThanhAM/pages/trangchu.php">Trang chủ</a> / Giải pháp
    </div>
    <h1>Giải pháp Thanh Âm</h1>
    <p>Bộ tính năng AI hỗ trợ giao tiếp — chạm vào từng biểu tượng để khám phá chi tiết cách sử dụng.</p>
  </div>
</section>

<div class="container">

  <!-- ================= PHẦN 1: TÍNH NĂNG ================= -->
  <section class="features-section">
    <h2 class="section-title"><i class="fa-solid fa-wand-magic-sparkles"></i> Các tính năng của hệ thống</h2>
    <p class="section-sub">Nhấn vào một biểu tượng để xem mô tả, công dụng, đối tượng phù hợp, hướng dẫn sử dụng và video minh hoạ.</p>

    <div class="feature-buttons" id="featureButtons">
      <?php foreach ($features_main as $f): ?>
        <button type="button" class="feature-btn" data-feature="<?= htmlspecialchars($f['id']); ?>">
          <span class="feature-circle"><i class="fa-solid <?= htmlspecialchars($f['icon']); ?>"></i></span>
          <span class="feature-label"><?= htmlspecialchars($f['title']); ?></span>
        </button>
      <?php endforeach; ?>

      <?php foreach ($features_extra as $f): ?>
        <button type="button" class="feature-btn feature-extra" data-feature="<?= htmlspecialchars($f['id']); ?>" hidden>
          <span class="feature-circle"><i class="fa-solid <?= htmlspecialchars($f['icon']); ?>"></i></span>
          <span class="feature-label"><?= htmlspecialchars($f['title']); ?></span>
        </button>
      <?php endforeach; ?>

      <button type="button" class="feature-btn feature-toggle-more" id="featureToggleMore">
        <span class="feature-circle"><i class="fa-solid fa-ellipsis"></i></span>
        <span class="feature-label">Thêm</span>
      </button>
    </div>

    <div class="feature-detail-panel" id="featureDetailPanel">

      <div class="feature-detail-placeholder" id="featureDetailPlaceholder">
        <i class="fa-solid fa-hand-point-up"></i>
        <p>Chọn một tính năng phía trên để xem thông tin chi tiết.</p>
      </div>

      <?php foreach (array_merge($features_main, $features_extra) as $f): ?>
        <article class="feature-detail" data-feature-detail="<?= htmlspecialchars($f['id']); ?>" hidden>
          <div class="feature-detail-head">
            <span class="feature-circle feature-circle-lg"><i class="fa-solid <?= htmlspecialchars($f['icon']); ?>"></i></span>
            <div>
              <h3><?= htmlspecialchars($f['title']); ?></h3>
              <p class="feature-detail-summary"><?= htmlspecialchars($f['summary']); ?></p>
            </div>
          </div>

          <div class="feature-detail-body">
            <div class="feature-detail-text">
              <h4><i class="fa-solid fa-circle-info"></i> Công dụng</h4>
              <p><?= htmlspecialchars($f['purpose']); ?></p>

              <h4><i class="fa-solid fa-users"></i> Đối tượng phù hợp</h4>
              <p><?= htmlspecialchars($f['target']); ?></p>

              <h4><i class="fa-solid fa-list-ol"></i> Hướng dẫn sử dụng</h4>
              <ol>
                <?php foreach ($f['steps'] as $step): ?>
                  <li><?= htmlspecialchars($step); ?></li>
                <?php endforeach; ?>
              </ol>
            </div>

            <div class="feature-detail-video">
              <h4><i class="fa-solid fa-clapperboard"></i> Video hướng dẫn</h4>
              <div class="video-frame">
                <video controls preload="none" poster="/ThanhAM/assets/images/video-poster-<?= htmlspecialchars($f['id']); ?>.jpg">
                  <source src="/ThanhAM/assets/videos/<?= htmlspecialchars($f['video']); ?>" type="video/mp4">
                </video>
                <div class="video-fallback">
                  <i class="fa-solid fa-video"></i>
                  <span>Chưa có video. Đặt file tại<br><code>assets/videos/<?= htmlspecialchars($f['video']); ?></code></span>
                </div>
              </div>
            </div>
          </div>
        </article>
      <?php endforeach; ?>

    </div>
  </section>

  <!-- ================= PHẦN 2: ĐỐI TƯỢNG SỬ DỤNG ================= -->
  <section class="audience-section">
    <h2 class="section-title"><i class="fa-solid fa-people-group"></i> Đối tượng sử dụng Thanh Âm</h2>
    <p class="section-sub">Thanh Âm được thiết kế để đồng hành cùng nhiều nhóm người khác nhau trong hành trình giao tiếp.</p>

    <div class="audience-grid">
      <?php foreach ($audiences as $i => $a): ?>
        <div class="audience-card">
          <div class="audience-num">0<?= $i + 1; ?></div>
          <div class="audience-ico"><i class="fa-solid <?= htmlspecialchars($a['icon']); ?>"></i></div>
          <h4><?= htmlspecialchars($a['title']); ?></h4>
          <p><?= htmlspecialchars($a['desc']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>

<!-- ============ JS TƯƠNG TÁC RIÊNG CHO TRANG GIẢI PHÁP ============ -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  var buttons        = document.querySelectorAll('.feature-btn[data-feature]');
  var details         = document.querySelectorAll('.feature-detail[data-feature-detail]');
  var placeholder      = document.getElementById('featureDetailPlaceholder');
  var panel            = document.getElementById('featureDetailPanel');
  var toggleMoreBtn    = document.getElementById('featureToggleMore');
  var extraButtons     = document.querySelectorAll('.feature-btn.feature-extra');

  function showFeature(id) {
    buttons.forEach(function (btn) {
      btn.classList.toggle('active', btn.getAttribute('data-feature') === id);
    });
    details.forEach(function (d) {
      d.hidden = d.getAttribute('data-feature-detail') !== id;
    });
    if (placeholder) placeholder.hidden = true;

    if (panel) {
      panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
  }

  buttons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var id = btn.getAttribute('data-feature');
      var alreadyActive = btn.classList.contains('active');

      if (alreadyActive) {
        buttons.forEach(function (b) { b.classList.remove('active'); });
        details.forEach(function (d) { d.hidden = true; });
        if (placeholder) placeholder.hidden = false;
      } else {
        showFeature(id);
      }
    });
  });

  if (toggleMoreBtn) {
    toggleMoreBtn.addEventListener('click', function () {
      var isOpen = toggleMoreBtn.classList.toggle('open');
      extraButtons.forEach(function (btn) {
        btn.hidden = !isOpen;
      });
      toggleMoreBtn.querySelector('.feature-label').textContent = isOpen ? 'Thu gọn' : 'Thêm';
      toggleMoreBtn.querySelector('i').className = isOpen
        ? 'fa-solid fa-chevron-up'
        : 'fa-solid fa-ellipsis';
    });
  }
});
</script>

<?php
$conn->close();
?>