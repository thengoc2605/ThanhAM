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
    ['name' => 'Lưu Gia Hân', 'role' => 'Đồng sáng lập & Đại diện Dự án', 'focus' => 'Chiến lược, Kinh doanh, Đối tác & Truyền thông', 'detail' => 'Đại diện dự án Thanh Âm; phụ trách định hướng chiến lược, kinh doanh, phát triển thị trường, quan hệ đối tác, đối ngoại và truyền thông thương hiệu.', 'image' => '/ThanhAM/Images/GIaHan.jpg'],
    ['name' => 'Nguyễn Văn Trực', 'role' => 'Đồng sáng lập & Trưởng ban Công nghệ', 'focus' => 'Phát triển Cốt lõi & Tích hợp Hệ thống', 'detail' => 'Định hướng công nghệ, xây dựng kiến trúc hệ thống, phát triển thành phần cốt lõi, kiểm soát chất lượng, tiến độ và khả năng vận hành.', 'image' => '/ThanhAM/Images/VanTruc.jpg'],
    ['name' => 'Đỗ Chí Duy', 'role' => 'Đồng sáng lập & Kỹ sư Phần mềm', 'focus' => 'Phát triển Phần mềm & Tính năng', 'detail' => 'Phát triển module và tính năng, tham gia xử lý logic và dữ liệu, kiểm thử, sửa lỗi, tối ưu hiệu năng và tích hợp hệ thống.', 'image' => '/ThanhAM/Images/ChiDuy.jpg'],
    ['name' => 'Phạm Thế Ngọc', 'role' => 'Đồng sáng lập & Kỹ sư Phần mềm', 'focus' => 'Phát triển Phần mềm & Tính năng', 'detail' => 'Phát triển module và tính năng, tham gia xử lý logic và dữ liệu, kiểm thử, sửa lỗi, tối ưu hiệu năng và tích hợp hệ thống.', 'image' => '/ThanhAM/Images/TheNgoc.jpg'],
    ['name' => 'Nguyễn Hoàng Anh', 'role' => 'Đồng sáng lập & Trưởng ban Sáng tạo / Người phát ngôn', 'focus' => 'Sáng tạo, UI/UX, Nhận diện & Phát ngôn', 'detail' => 'Phụ trách concept, hình ảnh, nhận diện thương hiệu, UI/UX, slide pitching và truyền tải câu chuyện, giá trị, sứ mệnh của Thanh Âm.', 'image' => '/ThanhAM/Images/HoangAnh.jpg'],
    ['name' => 'Nguyễn Thanh Quốc Bảo', 'role' => 'Đồng sáng lập & Phụ trách Tài chính & Tài liệu', 'focus' => 'Tài chính & Quản lý hồ sơ', 'detail' => 'Quản lý ngân sách, thu - chi, chứng từ và số liệu; hỗ trợ xây dựng, hoàn thiện và quản lý hồ sơ, tài liệu, biểu mẫu của dự án.', 'image' => '/ThanhAM/Images/QuocBao.jpg'],
];

$advisors = [
    ['name' => 'ThS. Lê Phương Vũ Phong', 'role' => 'Phần mềm & Phần cứng', 'detail' => 'Tư vấn định hướng công nghệ phần mềm, phần cứng và khả năng triển khai các giải pháp kỹ thuật.', 'image' => '/ThanhAM/Images/VuPhong.png'],
    ['name' => 'ThS. Phạm Trần Ngọc Hương', 'role' => 'Tài chính', 'detail' => 'Tư vấn về tài chính, ngân sách, quản lý nguồn lực và định hướng phát triển bền vững về tài chính.', 'image' => '/ThanhAM/Images/NgocHuong.jpg'],
    ['name' => 'ThS. Huỳnh Thị Nhật Hằng', 'role' => 'Phát triển Công nghệ & AI', 'detail' => 'Tư vấn chuyên môn về công nghệ, AI, lập trình và định hướng phát triển kỹ thuật của sản phẩm.', 'image' => '/ThanhAM/Images/NhatHang.png'],
    ['name' => 'ThS. Phan Thị Bích Trâm', 'role' => 'Đối tác & Kết nối', 'detail' => 'Tư vấn về phát triển quan hệ đối tác, hoạt động đối ngoại và kết nối với các tổ chức, đơn vị liên quan.', 'image' => '/ThanhAM/Images/BichTram.jpg'],
];

$awards = [
    ['badge' => 'Giải Nhất', 'icon' => 'fa-trophy', 'title' => 'Cuộc thi Khởi nghiệp Sáng tạo, Trường Đại học Tiền Giang', 'desc' => 'Ghi nhận tiềm năng của ý tưởng và định hướng khởi nghiệp đổi mới sáng tạo.'],
    ['badge' => 'Giải Dự án Cộng đồng', 'icon' => 'fa-heart', 'title' => 'Cuộc thi Khởi nghiệp Sáng tạo, Trường Đại học Tiền Giang', 'desc' => 'Ghi nhận giá trị xã hội và tính cộng đồng của Thanh Âm trong việc hỗ trợ người gặp khó khăn giao tiếp.'],
    ['badge' => 'Giải Ba', 'icon' => 'fa-medal', 'title' => 'Cuộc thi Đổi mới Sáng tạo Công nghệ cấp Thành phố - INNOX 2026', 'desc' => 'Ghi nhận hướng tiếp cận kết hợp công nghệ, AI và giải quyết vấn đề xã hội.'],
];

$award_images = [
    ['src' => '/ThanhAM/uploads/Images/giai-nhat-tien-giang.png', 'alt' => 'Hình ảnh Giải Nhất Cuộc thi Khởi nghiệp Sáng tạo, Trường Đại học Tiền Giang', 'title' => 'Giải Nhất - Đại học Tiền Giang'],
    ['src' => '/ThanhAM/uploads/Images/giai-ba-innox-2026-chung-ket.png', 'alt' => 'Hình ảnh Giải Ba Cuộc thi Đổi mới Sáng tạo Công nghệ INNOX 2026', 'title' => 'Giải Ba - INNOX 2026'],
];

$dev_stages = [
    ['period' => 'Giai đoạn 1 · 06/2025 - 08/2025', 'title' => 'Hình thành và xây dựng sản phẩm', 'desc' => 'THANH ÂM bắt đầu hành trình từ những bước đầu tiên trong việc xây dựng, học hỏi và nghiên cứu công nghệ. Đội ngũ vừa tìm hiểu nhu cầu thực tế, vừa tự mày mò, thử nghiệm và từng bước phát triển ứng dụng. Đây là giai đoạn đặt nền móng cho sản phẩm, từ ý tưởng ban đầu đến những phiên bản đầu tiên của THANH ÂM.'],
    ['period' => 'Giai đoạn 2 · 08/2025 - 10/2025', 'title' => 'Hoàn thiện bản thử nghiệm và kiểm chứng thực tế', 'desc' => 'Sau quá trình nghiên cứu và phát triển, THANH ÂM dần hoàn thiện phiên bản thử nghiệm đầu tiên. Sản phẩm được đưa đến sử dụng thử trong thực tế để thu thập phản hồi, quan sát trải nghiệm và xác định những điểm cần cải thiện. Đây là bước chuyển quan trọng từ việc phát triển trên lý thuyết sang kiểm chứng bằng nhu cầu và trải nghiệm thực tế.'],
    ['period' => 'Giai đoạn 3 · 10/2025 - 12/2025', 'title' => 'Bước ra đấu trường cấp trường', 'desc' => 'Từ một sản phẩm đang trong quá trình hoàn thiện, THANH ÂM chính thức mang dự án đến đấu trường khởi nghiệp và đổi mới sáng tạo cấp trường. Đây là cơ hội để đội ngũ trình bày sản phẩm, câu chuyện, giá trị xã hội và định hướng phát triển trước hội đồng chuyên môn, đồng thời tiếp nhận những góc nhìn và góp ý có giá trị để tiếp tục hoàn thiện dự án. Giai đoạn này đánh dấu bước chuyển của THANH ÂM từ một ý tưởng công nghệ đang được xây dựng thành một dự án có khả năng được giới thiệu, đánh giá và ghi nhận.'],
    ['period' => 'Giai đoạn 4 · 12/2025 - 02/2026', 'title' => 'Cải thiện và nâng cấp sản phẩm', 'desc' => 'Sau quá trình thi đấu và tiếp nhận phản hồi, đội ngũ THANH ÂM tiếp tục tập trung cải thiện, chỉnh sửa và nâng cấp sản phẩm. Các tính năng được rà soát, trải nghiệm người dùng được hoàn thiện và định hướng phát triển được điều chỉnh phù hợp hơn với nhu cầu thực tế. Đây cũng là giai đoạn đội ngũ củng cố nền tảng công nghệ và chuẩn bị cho bước phát triển tiếp theo của THANH ÂM.'],
    ['period' => 'Giai đoạn 5 · 02/2026 - 05/2026', 'title' => 'Vươn ra đấu trường cấp thành phố', 'desc' => 'Với sản phẩm và định hướng được nâng cấp, THANH ÂM tiếp tục bước ra đấu trường đổi mới sáng tạo cấp thành phố, mở rộng phạm vi cạnh tranh và tiếp cận với nhiều chuyên gia, tổ chức và dự án khác. Đây là dấu mốc cho thấy THANH ÂM từng bước trưởng thành cả về sản phẩm, công nghệ, khả năng trình bày dự án và giá trị xã hội, đồng thời được ghi nhận tại Cuộc thi Đổi mới Sáng tạo Công nghệ cấp Thành phố - INNOX 2026.'],
    ['period' => 'Giai đoạn 6 · 05/2026 - nay', 'title' => 'Hoàn thiện và phát triển bền vững', 'desc' => 'Sau những dấu mốc tại các cuộc thi, THANH ÂM không dừng lại ở thành tích mà tiếp tục chỉnh sửa, hoàn thiện và phát triển sản phẩm. Đội ngũ tập trung nâng cấp tính năng, cải thiện trải nghiệm người dùng, hoàn thiện định hướng sản phẩm và từng bước mở rộng khả năng ứng dụng trong thực tế. Từ một dự án được hình thành bằng sự học hỏi và mày mò, THANH ÂM đang từng bước phát triển thành một giải pháp công nghệ xã hội có khả năng mở rộng, hướng đến triển khai tại trường học, trung tâm, cộng đồng, doanh nghiệp và phát triển B2B/API trong tương lai. Định hướng dài hạn của dự án là tiếp tục mở rộng từ thị trường trong nước đến khu vực Đông Nam Á.'],
];

$principles = [
    ['title' => 'Nhân văn - Lấy con người làm trung tâm', 'desc' => 'Mọi sản phẩm bắt đầu từ một nhu cầu thật và một câu chuyện thật; công nghệ phục vụ con người, không làm mất đi giá trị và cảm xúc.'],
    ['title' => 'Đồng cảm - Lắng nghe bằng trái tim', 'desc' => 'Không chỉ nhận diện âm thanh, Thanh Âm hướng đến thấu hiểu những khó khăn phía sau một hành động giao tiếp.'],
    ['title' => 'Sáng tạo - Biến giới hạn thành cơ hội', 'desc' => 'Không ngừng tìm kiếm cách tiếp cận mới, ứng dụng AI để mở rộng khả năng giao tiếp của con người.'],
    ['title' => 'Kết nối - Lan tỏa giá trị tốt đẹp', 'desc' => 'Xây dựng cầu nối giữa người dùng, gia đình, trường học, chuyên gia, doanh nghiệp và cộng đồng.'],
    ['title' => 'Phát triển bền vững - Công nghệ vì con người', 'desc' => 'Phát triển công nghệ song hành với trách nhiệm xã hội, hướng tới giá trị lâu dài và khả năng tiếp cận rộng rãi.'],
];

$duties = [
    ['title' => 'Lấy con người làm trung tâm', 'desc' => 'Nghiên cứu nhu cầu và khó khăn giao tiếp thực tế; phát triển sản phẩm dựa trên trải nghiệm và nhu cầu của người thụ hưởng.'],
    ['title' => 'Công nghệ phục vụ con người', 'desc' => 'Ứng dụng AI và công nghệ hỗ trợ giao tiếp, giúp người dùng chủ động thể hiện suy nghĩ, cảm xúc và nhu cầu.'],
    ['title' => 'Đơn giản - dễ tiếp cận', 'desc' => 'Thiết kế giải pháp trực quan, giảm thao tác không cần thiết và hỗ trợ giao tiếp nhanh chóng trong tình huống thực tế.'],
    ['title' => 'Cá nhân hóa', 'desc' => 'Phát triển tính năng thích ứng với cách giao tiếp, thói quen và nhu cầu riêng của từng người dùng.'],
    ['title' => 'An toàn và có trách nhiệm', 'desc' => 'Chú trọng bảo vệ dữ liệu người dùng, kiểm soát việc ứng dụng AI và phát triển công nghệ an toàn, có trách nhiệm.'],
    ['title' => 'Liên tục cải tiến', 'desc' => 'Tiếp nhận phản hồi để kiểm thử, đánh giá, sửa đổi và nâng cấp sản phẩm.'],
    ['title' => 'Kết nối và hợp tác', 'desc' => 'Kết nối người dùng, gia đình, trường học, trung tâm, chuyên gia, doanh nghiệp và cộng đồng.'],
    ['title' => 'Đo lường tác động xã hội', 'desc' => 'Đánh giá mức độ cải thiện khả năng giao tiếp, sự chủ động và khả năng kết nối của người thụ hưởng.'],
];

require __DIR__ . '/../includes/header.php';
?>

<link rel="stylesheet" href="/ThanhAM/assets/css/style2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<section class="page-header">
    <div class="container">
        <div class="breadcrumb">
            <a href="/ThanhAM/index.php">Trang chủ</a> / Về Thanh Âm
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
                            <dt>Tên dự án</dt>
                            <dd>Thanh Âm</dd>
                            <dt>Địa chỉ</dt>
                            <dd>Mỹ Tho, Tiền Giang</dd>
                            <dt>Hotline</dt>
                            <dd><a href="tel:0865357517">0865357517</a></dd>
                            <dt>Zalo</dt>
                            <dd><a href="https://zalo.me/0912991489" target="_blank"
                                    rel="noopener">zalo.me/0912991489</a></dd>
                            <dt>Website</dt>
                            <dd><a href="#" target="_blank" rel="noopener">thanham.vn</a></dd>
                            <dt>Fanpage</dt>
                            <dd><a href="#" target="_blank" rel="noopener">facebook.com/thanham</a></dd>
                        </dl>
                        <h4>Sứ mệnh</h4>
                        <p>Dùng công nghệ để trao thêm cơ hội giao tiếp, giúp mỗi người có thể thể hiện suy nghĩ, cảm xúc và nhu cầu của mình một cách chủ động, tự nhiên và phù hợp với bản thân.
Thanh Âm đặc biệt hướng tới những người gặp hạn chế về khả năng giao tiếp, đồng thời xây dựng các giải pháp có thể được triển khai trong gia đình, trường học, trung tâm hỗ trợ, tổ chức xã hội và doanh nghiệp.
Chúng tôi tin rằng công nghệ chỉ thực sự có ý nghĩa khi được đặt trong tay con người và phục vụ con người, góp phần tạo ra một xã hội bao trùm, nơi mọi người đều có cơ hội được giao tiếp, được thấu hiểu và được kết nối.
</p>
                        <h4>Tầm nhìn</h4>
                        <p>Thanh Âm hướng tới trở thành nền tảng công nghệ hỗ trợ giao tiếp toàn diện, ứng dụng trí tuệ nhân tạo để phá bỏ những rào cản đang ngăn cách con người với việc thể hiện tiếng nói, cảm xúc và bản sắc của chính mình.
Thanh Âm hướng đến một tương lai nơi công nghệ không thay thế tiếng nói của con người, mà trở thành chiếc cầu nối đưa những tiếng nói từng bị bỏ lại phía sau đến gần hơn với cộng đồng, để mỗi người đều có cơ hội được bày tỏ và được lắng nghe.

Thanh Âm tin rằng: “Một tương lai nơi không ai bị bỏ lại phía sau bởi rào cản giao tiếp, nơi công nghệ mở đường để mọi tiếng nói được cất lên và được lắng nghe.”
</p>
                        <h4>Giá trị cốt lõi</h4>
                        <ol class="value-list">
                            <?php foreach ($principles as $principle): ?>
                            <li><strong><?= htmlspecialchars($principle['title']); ?></strong></li>
                            <?php endforeach; ?>
                        </ol>
                        <h4>Chính sách chất lượng</h4>
                        <p>Mọi thiết bị và phần mềm trước khi bàn giao đều được kiểm thử với chính người dùng thực tế.
                        </p>
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
                            <img src="/ThanhAM/assets/images/so-do-to-chuc.png" alt="Sơ đồ tổ chức Thanh Âm"
                                style="max-width:100%; border-radius:8px;"
                                onerror="this.onerror=null;this.replaceWith(Object.assign(document.createElement('div'),{innerHTML:'<i class=&quot;fa-solid fa-sitemap&quot;></i><br>Chưa có hình sơ đồ tổ chức.<br><small>Đặt ảnh tại assets/images/so-do-to-chuc.png</small>'}));">
                        </div>
                        <a class="media-link" href="https://drive.google.com/drive/folders/1p4LIOm7ntJL_XZHjbi-U2W22_tHfFxco?usp=drive_link" target="_blank" rel="noopener">
                            <i class="fa-solid fa-folder-open"></i> Xem thư mục hình hệ thống tổ chức
                        </a>
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
                                    <img src="<?= htmlspecialchars($f['image']); ?>"
                                        alt="<?= htmlspecialchars($f['name']); ?>">
                                    <?php else: ?>
                                    <?= htmlspecialchars(mb_substr($f['name'], 0, 1)); ?>
                                    <?php endif; ?>
                                </div>
                                <h4><?= htmlspecialchars($f['name']); ?></h4>
                                <span><?= htmlspecialchars($f['role']); ?></span>
                                <small><?= htmlspecialchars($f['focus']); ?></small>
                                <p><?= htmlspecialchars($f['detail']); ?></p>
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
                        <p class="card-intro">Ban Cố vấn đồng hành cùng Thanh Âm trong việc cung cấp định hướng chuyên môn, phản biện, tư vấn và hỗ trợ kết nối trong quá trình phát triển dự án.</p>
                        <div class="people-grid">
                            <?php foreach ($advisors as $a): ?>
                            <div class="person-card">
                                <div class="person-avatar">
                                    <img src="<?= htmlspecialchars($a['image']); ?>"
                                        alt="<?= htmlspecialchars($a['name']); ?>">
                                </div>
                                <h4><?= htmlspecialchars($a['name']); ?></h4>
                                <span><?= htmlspecialchars($a['role']); ?></span>
                                <p><?= htmlspecialchars($a['detail']); ?></p>
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
                                <div class="award-media"><i class="fa-solid <?= htmlspecialchars($aw['icon']); ?>"></i>
                                </div>
                                <div class="award-body">
                                    <span class="badge"><?= htmlspecialchars($aw['badge']); ?></span>
                                    <h4><?= htmlspecialchars($aw['title']); ?></h4>
                                    <p><?= htmlspecialchars($aw['desc']); ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <h4 class="gallery-title">Hình ảnh giải thưởng</h4>
                        <div class="award-gallery">
                            <?php foreach ($award_images as $image): ?>
                            <button type="button" class="award-gallery-item" data-lightbox-src="<?= htmlspecialchars($image['src']); ?>" data-lightbox-alt="<?= htmlspecialchars($image['alt']); ?>">
                                <img src="<?= htmlspecialchars($image['src']); ?>" alt="<?= htmlspecialchars($image['alt']); ?>">
                                <span><?= htmlspecialchars($image['title']); ?></span>
                            </button>
                            <?php endforeach; ?>
                        </div>
                        <a class="media-link" href="https://drive.google.com/drive/folders/18_2pdK2US4QYegbnItjVlaRa72XUK_Xy?usp=drive_link" target="_blank" rel="noopener">
                            <i class="fa-solid fa-photo-film"></i> Xem thư mục hình và clip giải thưởng
                        </a>
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

<div class="lightbox" data-lightbox aria-hidden="true">
    <button type="button" class="lightbox-close" data-lightbox-close aria-label="Đóng ảnh">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <img src="" alt="" data-lightbox-image>
</div>

<?php
include '../includes/footer.php';
?>

<script src="/ThanhAM/assets/js/main.js"></script>
<?php
$conn->close();
?>