<?php
/**
 * pages/vethanham.php — Trang "Về Thanh Âm"
 * Dùng chung header.php / footer.php với trangchu.php.
 * Style riêng của trang này vẫn lấy từ style2.css.
 */

require_once __DIR__ . '/../connect.php';

$page_title = 'Về Thanh Âm';

$allowed_tabs = ['tongquan', 'lichsu', 'hoatdong'];
$active_tab = $_GET['tab'] ?? 'tongquan';
if (!in_array($active_tab, $allowed_tabs, true)) {
    $active_tab = 'tongquan';
}

function tabClass(string $key, string $active): string
{
    return $key === $active ? 'active' : '';
}

$founders = [
  ['name' => 'Trần Thế Ngọc',        'role' => 'Trưởng nhóm dự án',             'image' => '/ThanhAM/Images/1784204336401_8555190357952235068_8555190357952235068_9419a9d719ab0d6b4d73608cc2920a4e.jpg'],
  ['name' => 'Nguyễn Văn B',          'role' => 'Đồng sáng lập - Kỹ thuật AI',  'image' => '/ThanhAM/Images/1784281300270_3685464955857165475_g4671258149823797589_42459c4e6dbaa972f7d02cd3f46d1e88.jpg'],
  ['name' => 'Lê Thị C',              'role' => 'Đồng sáng lập - Sản phẩm',     'image' => '/ThanhAM/Images/1784281307669_3685464955857165475_g4671258149823797589_0e846df7e3a7f2ae9aacd3933a671f99.jpg'],
  ['name' => 'Phạm Văn D',            'role' => 'Đồng sáng lập - Vận hành',     'image' => '/ThanhAM/Images/1787227705858_1853320507020962622_3605127511309582209_3c9cd69c27377da59bc50a89386b9878.jpg'],
    ['name' => 'Hoàng Thị E',           'role' => 'Đồng sáng lập - Truyền thông',  'image' => '/ThanhAM/Images/1787227746874_1853320507020962622_3605127511309582209_609e5081fad0d5ab50b16a44a63ee17d.jpg'],
    ['name' => 'Đỗ Văn F',              'role' => 'Đồng sáng lập - Tài chính',    'image' => '/ThanhAM/Images/1787227766009_1853320507020962622_3605127511309582209_570f60cf61a0f05faac2ddffe9e33ac9.jpg'],
];

$advisors = [
  ['name' => 'ThS. Nguyễn Thị G', 'role' => 'Cố vấn Giáo dục đặc biệt',       'image' => '/ThanhAM/Images/gv1.jpg'],
  ['name' => 'TS. Trần Văn H',    'role' => 'Cố vấn Công nghệ AI',             'image' => '/ThanhAM/Images/gv2.jpg'],
  ['name' => 'ThS. Lê Văn I',     'role' => 'Cố vấn Chiến lược cộng đồng',     'image' => '/ThanhAM/Images/gv3.png'],
  ['name' => 'CN. Phạm Thị K',    'role' => 'Cố vấn Pháp lý - Phi lợi nhuận', 'image' => '/ThanhAM/Images/gv4.png'],
];

$awards = [
    ['badge' => 'Giải Nhất', 'icon' => 'fa-trophy', 'title' => 'Cuộc thi Sáng kiến Vì cộng đồng 2026', 'desc' => 'Hạng mục Công nghệ hỗ trợ người yếu thế, cấp tỉnh Tiền Giang.'],
    ['badge' => 'Giải Ba', 'icon' => 'fa-medal', 'title' => 'Cuộc thi Khởi nghiệp Đổi mới Sáng tạo', 'desc' => 'Bảng dự án sinh viên, khu vực Đồng bằng sông Cửu Long.'],
    ['badge' => 'Giải Cộng đồng', 'icon' => 'fa-heart', 'title' => 'Bình chọn của cộng đồng', 'desc' => 'Dự án được yêu thích nhất do người dùng và mạnh thường quân bình chọn.'],
];

$dev_stages = [
    ['period' => 'Giai đoạn 1 · 06/2025 - 12/2025', 'title' => 'Hình thành ý tưởng & nghiên cứu bài toán', 'desc' => 'Khảo sát nhu cầu giao tiếp của học sinh khuyết tật tại Tiền Giang, xây dựng đề xuất giải pháp AI chuyển đổi giọng nói.'],
    ['period' => 'Giai đoạn 2 · 01/2026 - 04/2026', 'title' => 'Xây dựng & thử nghiệm mô hình AI', 'desc' => 'Phát triển mô hình nhận diện giọng nói không chuẩn, thử nghiệm nội bộ và tinh chỉnh độ chính xác.'],
    ['period' => 'Giai đoạn 3 · 05/2026 - nay', 'title' => 'Triển khai thí điểm tại cộng đồng', 'desc' => 'Đưa ứng dụng vào sử dụng thực tế tại Trường Khuyết tật Nhân Ái, thu thập phản hồi để cải tiến liên tục.'],
];

$principles = [
    ['title' => 'Lấy người dùng làm trung tâm', 'desc' => 'Mọi tính năng đều xuất phát từ nhu cầu thật của người yếu thế.'],
    ['title' => 'Minh bạch & phi lợi nhuận', 'desc' => 'Công khai nguồn tài trợ, cách sử dụng và kết quả tác động.'],
    ['title' => 'Đồng hành dài hạn', 'desc' => 'Không dừng ở tài trợ một lần, mà theo sát quá trình sử dụng.'],
];

$duties = [
    ['title' => 'Phát triển sản phẩm AI', 'desc' => 'Nghiên cứu, huấn luyện và cải tiến mô hình nhận diện giọng nói.'],
    ['title' => 'Kết nối nguồn lực', 'desc' => 'Vận động thiết bị, tài chính từ cá nhân và doanh nghiệp.'],
    ['title' => 'Triển khai & đào tạo', 'desc' => 'Lắp đặt thiết bị, hướng dẫn sử dụng tại các đơn vị thụ hưởng.'],
    ['title' => 'Đo lường tác động', 'desc' => 'Theo dõi số liệu, thu thập câu chuyện thực tế để báo cáo minh bạch.'],
];

require __DIR__ . '/../includes/header.php';
?>

<link rel="stylesheet" href="/ThanhAM/assets/css/style2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<section class="page-header">
  <div class="container">
    <div class="breadcrumb">
      <a href="/ThanhAM/pages/trangchu.php">Trang chủ</a> / Về Thanh Âm
    </div>
    <h1>Về Thanh Âm</h1>
    <p>Câu chuyện, con người và cách vận hành của dự án AI hỗ trợ giao tiếp cho người yếu thế tại Tiền Giang.</p>
  </div>
</section>

<div class="tabs-wrap">
  <div class="container">
    <nav class="tabs-nav">
      <button type="button" class="tab-btn <?= tabClass('tongquan', $active_tab); ?>" data-tab-btn="tongquan">
        <i class="fa-solid fa-table-cells-large"></i> Tổng quan
      </button>
      <button type="button" class="tab-btn <?= tabClass('lichsu', $active_tab); ?>" data-tab-btn="lichsu">
        <i class="fa-solid fa-timeline"></i> Lịch sử xây dựng và phát triển
      </button>
      <button type="button" class="tab-btn <?= tabClass('hoatdong', $active_tab); ?>" data-tab-btn="hoatdong">
        <i class="fa-solid fa-gears"></i> Cách thức hoạt động
      </button>
    </nav>
  </div>
</div>

<div class="container">

  <div class="tab-panel <?= tabClass('tongquan', $active_tab); ?>" data-tab-panel="tongquan">
    <div class="overview-grid">

      <div class="info-card">
        <div class="info-card-head">
          <div class="ico"><i class="fa-solid fa-circle-info"></i></div>
          <div>
            <h3>Thông tin chung</h3>
            <p>Liên hệ, sứ mệnh, tầm nhìn</p>
          </div>
          <i class="fa-solid fa-chevron-down chevron"></i>
        </div>
        <div class="card-detail">
          <div class="card-detail-inner">
            <dl>
              <dt>Tên dự án</dt><dd>Thanh Âm</dd>
              <dt>Địa chỉ</dt><dd>Mỹ Tho, Tiền Giang</dd>
              <dt>Hotline</dt><dd><a href="tel:0865357517">0865357517</a></dd>
              <dt>Zalo</dt><dd><a href="https://zalo.me/0912991489" target="_blank" rel="noopener">zalo.me/0912991489</a></dd>
              <dt>Website</dt><dd><a href="#" target="_blank" rel="noopener">thanham.vn</a></dd>
              <dt>Fanpage</dt><dd><a href="#" target="_blank" rel="noopener">facebook.com/thanham</a></dd>
            </dl>
            <h4>Sứ mệnh</h4>
            <p>Trao công cụ giao tiếp bằng AI cho trẻ em và người khuyết tật, để mọi tiếng nói đều được lắng nghe.</p>
            <h4>Tầm nhìn</h4>
            <p>Trở thành nền tảng hỗ trợ giao tiếp AI phổ biến nhất cho người yếu thế tại Việt Nam vào năm 2030.</p>
            <h4>Giá trị cốt lõi</h4>
            <p>Thấu cảm — Minh bạch — Bền vững — Cùng nhau hành động.</p>
            <h4>Chính sách chất lượng</h4>
            <p>Mọi thiết bị và phần mềm trước khi bàn giao đều được kiểm thử với chính người dùng thực tế.</p>
          </div>
        </div>
      </div>

      <div class="info-card">
        <div class="info-card-head">
          <div class="ico"><i class="fa-solid fa-sitemap"></i></div>
          <div>
            <h3>Hệ thống tổ chức</h3>
            <p>Sơ đồ nhân sự &amp; phân quyền</p>
          </div>
          <i class="fa-solid fa-chevron-down chevron"></i>
        </div>
        <div class="card-detail">
          <div class="card-detail-inner">
            <div class="org-chart-placeholder">
              <img src="/ThanhAM/assets/images/so-do-to-chuc.png"
                   alt="Sơ đồ tổ chức Thanh Âm"
                   style="max-width:100%; border-radius:8px;"
                   onerror="this.onerror=null;this.replaceWith(Object.assign(document.createElement('div'),{innerHTML:'<i class=&quot;fa-solid fa-sitemap&quot;></i><br>Chưa có hình sơ đồ tổ chức.<br><small>Đặt ảnh tại assets/images/so-do-to-chuc.png</small>'}));">
            </div>
          </div>
        </div>
      </div>

      <div class="info-card">
        <div class="info-card-head">
          <div class="ico"><i class="fa-solid fa-people-group"></i></div>
          <div>
            <h3>Nhà sáng lập</h3>
            <p>6 thành viên sáng lập</p>
          </div>
          <i class="fa-solid fa-chevron-down chevron"></i>
        </div>
        <div class="card-detail">
          <div class="card-detail-inner">
            <div class="people-grid">
              <?php foreach ($founders as $f): ?>
                <div class="person-card">
                  <div class="person-avatar">
                    <?php if (!empty($f['image'])): ?>
                      <img src="<?= htmlspecialchars($f['image']); ?>" alt="<?= htmlspecialchars($f['name']); ?>">
                    <?php else: ?>
                      <?= htmlspecialchars(mb_substr($f['name'], 0, 1)); ?>
                    <?php endif; ?>
                  </div>
                  <h4><?= htmlspecialchars($f['name']); ?></h4>
                  <span><?= htmlspecialchars($f['role']); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="info-card">
        <div class="info-card-head">
          <div class="ico"><i class="fa-solid fa-chalkboard-user"></i></div>
          <div>
            <h3>Ban cố vấn</h3>
            <p>4 thầy cô đồng hành</p>
          </div>
          <i class="fa-solid fa-chevron-down chevron"></i>
        </div>
        <div class="card-detail">
          <div class="card-detail-inner">
            <div class="people-grid">
              <?php foreach ($advisors as $a): ?>
                <div class="person-card">
                  <div class="person-avatar">
                    <img src="<?= htmlspecialchars($a['image']); ?>" alt="<?= htmlspecialchars($a['name']); ?>">
                  </div>
                  <h4><?= htmlspecialchars($a['name']); ?></h4>
                  <span><?= htmlspecialchars($a['role']); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="info-card">
        <div class="info-card-head">
          <div class="ico"><i class="fa-solid fa-award"></i></div>
          <div>
            <h3>Giải thưởng</h3>
            <p>Ghi nhận từ cộng đồng &amp; hội đồng</p>
          </div>
          <i class="fa-solid fa-chevron-down chevron"></i>
        </div>
        <div class="card-detail">
          <div class="card-detail-inner">
            <div class="award-grid">
              <?php foreach ($awards as $aw): ?>
                <div class="award-card">
                  <div class="award-media"><i class="fa-solid <?= htmlspecialchars($aw['icon']); ?>"></i></div>
                  <div class="award-body">
                    <span class="badge"><?= htmlspecialchars($aw['badge']); ?></span>
                    <h4><?= htmlspecialchars($aw['title']); ?></h4>
                    <p><?= htmlspecialchars($aw['desc']); ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="tab-panel <?= tabClass('lichsu', $active_tab); ?>" data-tab-panel="lichsu">
    <div class="founding-date">
      <i class="fa-solid fa-flag"></i> Ngày thành lập: 26/06/2025
    </div>
    <h2 class="section-title"><i class="fa-solid fa-road"></i> Các giai đoạn phát triển</h2>
    <div class="dev-timeline">
      <?php foreach ($dev_stages as $stage): ?>
        <div class="dev-step">
          <div class="dev-period"><?= htmlspecialchars($stage['period']); ?></div>
          <h4><?= htmlspecialchars($stage['title']); ?></h4>
          <p><?= htmlspecialchars($stage['desc']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="tab-panel <?= tabClass('hoatdong', $active_tab); ?>" data-tab-panel="hoatdong">
    <div class="two-col">
      <div>
        <h2 class="section-title"><i class="fa-solid fa-scale-balanced"></i> Nguyên tắc hoạt động</h2>
        <div class="principle-list">
          <?php foreach ($principles as $i => $p): ?>
            <div class="principle-item">
              <div class="num"><?= $i + 1; ?></div>
              <div>
                <h4><?= htmlspecialchars($p['title']); ?></h4>
                <p><?= htmlspecialchars($p['desc']); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <h2 class="section-title"><i class="fa-solid fa-list-check"></i> Chức năng - Nhiệm vụ</h2>
        <div class="duty-list">
          <?php foreach ($duties as $i => $d): ?>
            <div class="duty-item">
              <div class="num"><?= $i + 1; ?></div>
              <div>
                <h4><?= htmlspecialchars($d['title']); ?></h4>
                <p><?= htmlspecialchars($d['desc']); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>

<script src="/ThanhAM/assets/js/main.js"></script>
<?php
$conn->close();
?>