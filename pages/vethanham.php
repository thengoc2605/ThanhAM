<?php
/**
 * pages/vethanham.php — Trang "Về Thanh Âm"
 * Dùng chung header.php / footer.php với trangchu.php.
 * Giao diện hiện đại, chuyên nghiệp, tối ưu UI/UX.
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
    [
        'name' => 'Lưu Gia Hân',
        'role' => 'Đồng sáng lập & Đại diện Dự án',
        'focus' => 'Chiến lược, Kinh doanh, Đối tác & Truyền thông',
        'detail' => 'Đại diện dự án Thanh Âm; phụ trách định hướng chiến lược, kinh doanh, phát triển thị trường, quan hệ đối tác, đối ngoại và truyền thông thương hiệu.',
        'image' => '/ThanhAM/Images/GIaHan.jpg'
    ],
    [
        'name' => 'Nguyễn Văn Trực',
        'role' => 'Đồng sáng lập & Trưởng ban Công nghệ',
        'focus' => 'Phát triển Cốt lõi & Tích hợp Hệ thống',
        'detail' => 'Định hướng công nghệ, xây dựng kiến trúc hệ thống, phát triển thành phần cốt lõi, kiểm soát chất lượng, tiến độ và khả năng vận hành.',
        'image' => '/ThanhAM/Images/VanTruc.jpg'
    ],
    [
        'name' => 'Đỗ Chí Duy',
        'role' => 'Đồng sáng lập & Kỹ sư Phần mềm',
        'focus' => 'Phát triển Phần mềm & Tính năng',
        'detail' => 'Phát triển module và tính năng, tham gia xử lý logic và dữ liệu, kiểm thử, sửa lỗi, tối ưu hiệu năng và tích hợp hệ thống.',
        'image' => '/ThanhAM/Images/ChiDuy.jpg'
    ],
    [
        'name' => 'Phạm Thế Ngọc',
        'role' => 'Đồng sáng lập & Kỹ sư Phần mềm',
        'focus' => 'Phát triển Phần mềm & Tính năng',
        'detail' => 'Phát triển module và tính năng, tham gia xử lý logic và dữ liệu, kiểm thử, sửa lỗi, tối ưu hiệu năng và tích hợp hệ thống.',
        'image' => '/ThanhAM/Images/TheNgoc.jpg'
    ],
    [
        'name' => 'Nguyễn Hoàng Anh',
        'role' => 'Đồng sáng lập & Trưởng ban Sáng tạo / Người phát ngôn',
        'focus' => 'Sáng tạo, UI/UX, Nhận diện & Phát ngôn',
        'detail' => 'Phụ trách concept, hình ảnh, nhận diện thương hiệu, UI/UX, slide pitching và truyền tải câu chuyện, giá trị, sứ mệnh của Thanh Âm.',
        'image' => '/ThanhAM/Images/HoangAnh.jpg'
    ],
    [
        'name' => 'Nguyễn Thanh Quốc Bảo',
        'role' => 'Đồng sáng lập & Phụ trách Tài chính & Tài liệu',
        'focus' => 'Tài chính & Quản lý hồ sơ',
        'detail' => 'Quản lý ngân sách, thu - chi, chứng từ và số liệu; hỗ trợ xây dựng, hoàn thiện và quản lý hồ sơ, tài liệu, biểu mẫu của dự án.',
        'image' => '/ThanhAM/Images/QuocBao.jpg'
    ],
];

$advisors = [
    [
        'name' => 'ThS. Lê Phương Vũ Phong',
        'role' => 'Phần mềm & Phần cứng',
        'detail' => 'Tư vấn định hướng công nghệ phần mềm, phần cứng và khả năng triển khai các giải pháp kỹ thuật.',
        'image' => '/ThanhAM/Images/VuPhong.png'
    ],
    [
        'name' => 'ThS. Phạm Trần Ngọc Hương',
        'role' => 'Tài chính',
        'detail' => 'Tư vấn về tài chính, ngân sách, quản lý nguồn lực và định hướng phát triển bền vững về tài chính.',
        'image' => '/ThanhAM/Images/NgocHuong.jpg'
    ],
    [
        'name' => 'ThS. Huỳnh Thị Nhật Hằng',
        'role' => 'Phát triển Công nghệ & AI',
        'detail' => 'Tư vấn chuyên môn về công nghệ, AI, lập trình và định hướng phát triển kỹ thuật của sản phẩm.',
        'image' => '/ThanhAM/Images/NhatHang.png'
    ],
    [
        'name' => 'ThS. Phan Thị Bích Trâm',
        'role' => 'Đối tác & Kết nối',
        'detail' => 'Tư vấn về phát triển quan hệ đối tác, hoạt động đối ngoại và kết nối với các tổ chức, đơn vị liên quan.',
        'image' => '/ThanhAM/Images/BichTram.jpg'
    ],
];

$awards = [
    [
        'badge' => 'Giải Nhất',
        'icon' => 'fa-trophy',
        'title' => 'Cuộc thi Khởi nghiệp Sáng tạo, Trường Đại học Tiền Giang',
        'desc' => 'Ghi nhận tiềm năng của ý tưởng và định hướng khởi nghiệp đổi mới sáng tạo ứng dụng công nghệ trong hỗ trợ cộng đồng.'
    ],
    [
        'badge' => 'Giải Dự án Cộng đồng',
        'icon' => 'fa-heart',
        'title' => 'Cuộc thi Khởi nghiệp Sáng tạo, Trường Đại học Tiền Giang',
        'desc' => 'Ghi nhận giá trị xã hội sâu sắc và tính nhân văn của Thanh Âm trong việc hỗ trợ người gặp khó khăn giao tiếp.'
    ],
    [
        'badge' => 'Giải Ba Chung kết',
        'icon' => 'fa-medal',
        'title' => 'Cuộc thi Đổi mới Sáng tạo Công nghệ cấp Thành phố - INNOX 2026',
        'desc' => 'Ghi nhận hướng tiếp cận kết hợp công nghệ AI tiên tiến, khả năng ứng dụng thực tế và giải quyết bài toán xã hội.'
    ],
];

$award_images = [
    [
        'src' => '/ThanhAM/uploads/Images/giai-nhat-tien-giang.png',
        'alt' => 'Hình ảnh Giải Nhất Cuộc thi Khởi nghiệp Sáng tạo, Trường Đại học Tiền Giang',
        'title' => 'Giải Nhất - Khởi nghiệp Sáng tạo ĐH Tiền Giang'
    ],
    [
        'src' => '/ThanhAM/uploads/Images/giai-ba-innox-2026-chung-ket.png',
        'alt' => 'Hình ảnh Giải Ba Cuộc thi Đổi mới Sáng tạo Công nghệ INNOX 2026',
        'title' => 'Giải Ba - Đổi mới Sáng tạo INNOX 2026'
    ],
];

$dev_stages = [
    [
        'num' => '01',
        'period' => 'Giai đoạn 1 · 06/2025 - 08/2025',
        'title' => 'Hình thành và xây dựng sản phẩm',
        'desc' => 'THANH ÂM bắt đầu hành trình từ những bước đầu tiên trong việc xây dựng, học hỏi và nghiên cứu công nghệ. Đội ngũ vừa tìm hiểu nhu cầu thực tế, vừa tự mày mò, thử nghiệm và từng bước phát triển ứng dụng. Đây là giai đoạn đặt nền móng cho sản phẩm, từ ý tưởng ban đầu đến những phiên bản đầu tiên của THANH ÂM.'
    ],
    [
        'num' => '02',
        'period' => 'Giai đoạn 2 · 08/2025 - 10/2025',
        'title' => 'Hoàn thiện bản thử nghiệm và kiểm chứng thực tế',
        'desc' => 'Sau quá trình nghiên cứu và phát triển, THANH ÂM dần hoàn thiện phiên bản thử nghiệm đầu tiên. Sản phẩm được đưa đến sử dụng thử trong thực tế để thu thập phản hồi, quan sát trải nghiệm và xác định những điểm cần cải thiện. Đây là bước chuyển quan trọng từ việc phát triển trên lý thuyết sang kiểm chứng bằng nhu cầu và trải nghiệm thực tế.'
    ],
    [
        'num' => '03',
        'period' => 'Giai đoạn 3 · 10/2025 - 12/2025',
        'title' => 'Bước ra đấu trường cấp trường',
        'desc' => 'Từ một sản phẩm đang trong quá trình hoàn thiện, THANH ÂM chính thức mang dự án đến đấu trường khởi nghiệp và đổi mới sáng tạo cấp trường. Đây là cơ hội để đội ngũ trình bày sản phẩm, câu chuyện, giá trị xã hội và định hướng phát triển trước hội đồng chuyên môn, đồng thời tiếp nhận những góc nhìn và góp ý có giá trị để tiếp tục hoàn thiện dự án. Giai đoạn này đánh dấu bước chuyển của THANH ÂM từ một ý tưởng công nghệ đang được xây dựng thành một dự án có khả năng được giới thiệu, đánh giá và ghi nhận.'
    ],
    [
        'num' => '04',
        'period' => 'Giai đoạn 4 · 12/2025 - 02/2026',
        'title' => 'Cải thiện và nâng cấp sản phẩm',
        'desc' => 'Sau quá trình thi đấu và tiếp nhận phản hồi, đội ngũ THANH ÂM tiếp tục tập trung cải thiện, chỉnh sửa và nâng cấp sản phẩm. Các tính năng được rà soát, trải nghiệm người dùng được hoàn thiện và định hướng phát triển được điều chỉnh phù hợp hơn với nhu cầu thực tế. Đây cũng là giai đoạn đội ngũ củng cố nền tảng công nghệ và chuẩn bị cho bước phát triển tiếp theo của THANH ÂM.'
    ],
    [
        'num' => '05',
        'period' => 'Giai đoạn 5 · 02/2026 - 05/2026',
        'title' => 'Vươn ra đấu trường cấp thành phố',
        'desc' => 'Với sản phẩm và định hướng được nâng cấp, THANH ÂM tiếp tục bước ra đấu trường đổi mới sáng tạo cấp thành phố, mở rộng phạm vi cạnh tranh và tiếp cận với nhiều chuyên gia, tổ chức và dự án khác. Đây là dấu mốc cho thấy THANH ÂM từng bước trưởng thành cả về sản phẩm, công nghệ, khả năng trình bày dự án và giá trị xã hội, đồng thời được ghi nhận tại Cuộc thi Đổi mới Sáng tạo Công nghệ cấp Thành phố - INNOX 2026.'
    ],
    [
        'num' => '06',
        'is_current' => true,
        'period' => 'Giai đoạn 6 · 05/2026 - Hiện tại & Tương lai',
        'title' => 'Hoàn thiện và phát triển bền vững',
        'desc' => 'Sau những dấu mốc tại các cuộc thi, THANH ÂM không dừng lại ở thành tích mà tiếp tục chỉnh sửa, hoàn thiện và phát triển sản phẩm. Đội ngũ tập trung nâng cấp tính năng, cải thiện trải nghiệm người dùng, hoàn thiện định hướng sản phẩm và từng bước mở rộng khả năng ứng dụng trong thực tế. Từ một dự án được hình thành bằng sự học hỏi và mày mò, THANH ÂM đang từng bước phát triển thành một giải pháp công nghệ xã hội có khả năng mở rộng, hướng đến triển khai tại trường học, trung tâm, cộng đồng, doanh nghiệp và phát triển B2B/API trong tương lai. Định hướng dài hạn của dự án là tiếp tục mở rộng từ thị trường trong nước đến khu vực Đông Nam Á.'
    ],
];

// Dữ liệu lộ trình được quản lý từ khu vực admin; giữ dữ liệu mẫu làm dự phòng
// để trang vẫn hiển thị nếu CSDL chưa được cập nhật migration.
try {
    $stmt_dev_stages = $pdo->query("SELECT so_thu_tu AS num, thoi_gian AS period, tieu_de AS title, mo_ta AS `desc`, la_hien_tai AS is_current FROM lo_trinh_phat_trien ORDER BY so_thu_tu ASC, id ASC");
    $db_dev_stages = $stmt_dev_stages->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($db_dev_stages)) {
        $dev_stages = $db_dev_stages;
    }
} catch (PDOException $e) {
    // Cho phép site hoạt động trước khi người quản trị import migration.
}

$principles = [
    [
        'icon' => 'fa-heart',
        'title' => 'Nhân văn - Lấy con người làm trung tâm',
        'desc' => 'Mọi sản phẩm bắt đầu từ một nhu cầu thật và một câu chuyện thật; công nghệ phục vụ con người, không làm mất đi giá trị và cảm xúc.'
    ],
    [
        'icon' => 'fa-ear-listen',
        'title' => 'Đồng cảm - Lắng nghe bằng trái tim',
        'desc' => 'Không chỉ nhận diện âm thanh, Thanh Âm hướng đến thấu hiểu những khó khăn phía sau một hành động giao tiếp.'
    ],
    [
        'icon' => 'fa-lightbulb',
        'title' => 'Sáng tạo - Biến giới hạn thành cơ hội',
        'desc' => 'Không ngừng tìm kiếm cách tiếp cận mới, ứng dụng AI để mở rộng khả năng giao tiếp của con người.'
    ],
    [
        'icon' => 'fa-network-wired',
        'title' => 'Kết nối - Lan tỏa giá trị tốt đẹp',
        'desc' => 'Xây dựng cầu nối giữa người dùng, gia đình, trường học, chuyên gia, doanh nghiệp và cộng đồng.'
    ],
    [
        'icon' => 'fa-seedling',
        'title' => 'Phát triển bền vững - Công nghệ vì con người',
        'desc' => 'Phát triển công nghệ song hành với trách nhiệm xã hội, hướng tới giá trị lâu dài và khả năng tiếp cận rộng rãi.'
    ],
];

$duties = [
    [
        'title' => 'Lấy con người làm trung tâm',
        'desc' => 'Nghiên cứu nhu cầu và khó khăn giao tiếp thực tế; phát triển sản phẩm dựa trên trải nghiệm và nhu cầu của người thụ hưởng.'
    ],
    [
        'title' => 'Công nghệ phục vụ con người',
        'desc' => 'Ứng dụng AI và công nghệ hỗ trợ giao tiếp, giúp người dùng chủ động thể hiện suy nghĩ, cảm xúc và nhu cầu.'
    ],
    [
        'title' => 'Đơn giản - dễ tiếp cận',
        'desc' => 'Thiết kế giải pháp trực quan, giảm thao tác không cần thiết và hỗ trợ giao tiếp nhanh chóng trong tình huống thực tế.'
    ],
    [
        'title' => 'Cá nhân hóa trải nghiệm',
        'desc' => 'Phát triển tính năng thích ứng với cách giao tiếp, thói quen và nhu cầu riêng biệt của từng người dùng.'
    ],
    [
        'title' => 'An toàn và có trách nhiệm',
        'desc' => 'Chú trọng bảo vệ dữ liệu người dùng, kiểm soát việc ứng dụng AI và phát triển công nghệ an toàn, có đạo đức.'
    ],
    [
        'title' => 'Liên tục cải tiến',
        'desc' => 'Tiếp nhận phản hồi từ cộng đồng để kiểm thử, đánh giá, sửa đổi và nâng cấp sản phẩm ngày càng hoàn thiện.'
    ],
    [
        'title' => 'Kết nối và hợp tác đa bên',
        'desc' => 'Kết nối người dùng, gia đình, trường học, trung tâm, chuyên gia, doanh nghiệp và cộng đồng.'
    ],
    [
        'title' => 'Đo lường tác động xã hội',
        'desc' => 'Đánh giá mức độ cải thiện khả năng giao tiếp, sự chủ động và khả năng hòa nhập kết nối của người thụ hưởng.'
    ],
];

require __DIR__ . '/../includes/header.php';
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="../assets/css/style2.css?v=<?= time(); ?>">
<link rel="stylesheet" href="/ThanhAM/assets/css/style2.css?v=<?= time(); ?>">

<style>
<?php
$cssPath2 = __DIR__ . '/../assets/css/style2.css';
if (file_exists($cssPath2)) {
    echo file_get_contents($cssPath2);
}
?>
</style>

<main class="vta-page">

    <!-- ==================== HERO SECTION ==================== -->
    <section class="vta-hero">
        <div class="vta-container">
            <div class="vta-hero-content">
                <div class="vta-breadcrumb">
                    <a href="/ThanhAM/index.php"><i class="fa-solid fa-house"></i> Trang chủ</a>
                    <span>/</span>
                    <span>Về Thanh Âm</span>
                </div>
                
                <div>
                    <span class="vta-badge-glow">
                        <span class="pulse-dot"></span> Dự án AI vì cộng đồng · Tiền Giang
                    </span>
                </div>

                <h1>Thanh Âm — Trợ Lý Giao Tiếp AI</h1>
                <div class="vta-hero-slogan">Trao tiếng nói – Chạm trái tim</div>
                <p class="vta-hero-desc">
                    Câu chuyện, con người và hành trình kiến tạo giải pháp công nghệ AI hỗ trợ giao tiếp toàn diện cho người gặp khó khăn ngôn ngữ, mang lại cơ hội kết nối và hòa nhập cộng đồng bình đẳng.
                </p>

                <!-- Impact Stats Grid -->
                <div class="vta-hero-stats">
                    <div class="vta-stat-item">
                        <span class="vta-stat-num">26/06/2025</span>
                        <span class="vta-stat-label">Ngày thành lập</span>
                    </div>
                    <div class="vta-stat-item">
                        <span class="vta-stat-num">06 Thành viên</span>
                        <span class="vta-stat-label">Đội ngũ sáng lập</span>
                    </div>
                    <div class="vta-stat-item">
                        <span class="vta-stat-num">04 Thạc sĩ</span>
                        <span class="vta-stat-label">Ban cố vấn chuyên môn</span>
                    </div>
                    <div class="vta-stat-item">
                        <span class="vta-stat-num">03+ Giải thưởng</span>
                        <span class="vta-stat-label">Vinh danh & Ghi nhận</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== STICKY TABS NAVIGATION ==================== -->
    <div class="vta-tabs-wrap">
        <div class="vta-container">
            <nav class="vta-tabs-nav" role="tablist">
                <button type="button" class="vta-tab-btn <?= tabClass('tongquan', $active_tab); ?>" data-tab-btn="tongquan">
                    <i class="fa-solid fa-shapes"></i> Tổng quan dự án
                </button>
                <button type="button" class="vta-tab-btn <?= tabClass('lichsu', $active_tab); ?>" data-tab-btn="lichsu">
                    <i class="fa-solid fa-timeline"></i> Lộ trình phát triển
                </button>
                <button type="button" class="vta-tab-btn <?= tabClass('hoatdong', $active_tab); ?>" data-tab-btn="hoatdong">
                    <i class="fa-solid fa-scale-balanced"></i> Nguyên tắc &amp; Nhiệm vụ
                </button>
            </nav>
        </div>
    </div>

    <!-- ==================== TAB CONTENT PANELS ==================== -->
    <div class="vta-container">

        <!-- -------------------- TAB 1: TỔNG QUAN -------------------- -->
        <div class="vta-tab-panel <?= tabClass('tongquan', $active_tab); ?>" data-tab-panel="tongquan">
            
            <!-- Sứ mệnh & Tầm nhìn Grid -->
            <div class="vta-sec-header center">
                <span class="vta-tag">Định hướng cốt lõi</span>
                <h2 class="vta-sec-title">Sứ mệnh &amp; Tầm nhìn</h2>
                <p class="vta-sec-desc">Công nghệ chỉ thực sự có ý nghĩa khi được đặt trong tay con người và phục vụ con người.</p>
            </div>

            <div class="vta-mv-grid">
                <div class="vta-mv-card mission">
                    <div class="vta-mv-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                    <h3>Sứ mệnh</h3>
                    <p>
                        Dùng công nghệ để trao thêm cơ hội giao tiếp, giúp mỗi người có thể thể hiện suy nghĩ, cảm xúc và nhu cầu của mình một cách chủ động, tự nhiên và phù hợp với bản thân.
                    </p>
                    <p>
                        Thanh Âm đặc biệt hướng tới những người gặp hạn chế về khả năng giao tiếp, đồng thời xây dựng các giải pháp có thể được triển khai trong gia đình, trường học, trung tâm hỗ trợ, tổ chức xã hội và doanh nghiệp.
                    </p>
                    <div class="vta-mv-quote">
                        "Góp phần tạo ra một xã hội bao trùm, nơi mọi người đều có cơ hội được giao tiếp, được thấu hiểu và được kết nối."
                    </div>
                </div>

                <div class="vta-mv-card vision">
                    <div class="vta-mv-icon"><i class="fa-solid fa-compass"></i></div>
                    <h3>Tầm nhìn</h3>
                    <p>
                        Thanh Âm hướng tới trở thành nền tảng công nghệ hỗ trợ giao tiếp toàn diện, ứng dụng trí tuệ nhân tạo để phá bỏ những rào cản đang ngăn cách con người với việc thể hiện tiếng nói, cảm xúc và bản sắc của chính mình.
                    </p>
                    <p>
                        Hướng đến một tương lai nơi công nghệ không thay thế tiếng nói của con người, mà trở thành chiếc cầu nối đưa những tiếng nói từng bị bỏ lại phía sau đến gần hơn với cộng đồng.
                    </p>
                    <div class="vta-mv-quote">
                        “Một tương lai nơi không ai bị bỏ lại phía sau bởi rào cản giao tiếp, nơi công nghệ mở đường để mọi tiếng nói được cất lên và được lắng nghe.”
                    </div>
                </div>
            </div>

            <!-- 5 Giá trị cốt lõi -->
            <div class="vta-values-section">
                <div class="vta-sec-header center">
                    <span class="vta-tag magenta">Kim chỉ nam</span>
                    <h2 class="vta-sec-title">5 Giá Trị Cốt Lõi</h2>
                    <p class="vta-sec-desc">Những nguyên tắc dẫn lối trong từng dòng mã nguồn, từng tính năng và mỗi bước đi của Thanh Âm.</p>
                </div>

                <div class="vta-values-grid">
                    <?php foreach ($principles as $p): ?>
                    <div class="vta-value-card">
                        <div class="vta-value-icon">
                            <i class="fa-solid <?= htmlspecialchars($p['icon']); ?>"></i>
                        </div>
                        <h4><?= htmlspecialchars($p['title']); ?></h4>
                        <p><?= htmlspecialchars($p['desc']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Đội ngũ Sáng lập -->
            <div class="vta-team-section">
                <div class="vta-sec-header">
                    <span class="vta-tag">Nhân sự nòng cốt</span>
                    <h2 class="vta-sec-title">Đội Ngũ Sáng Lập</h2>
                    <p class="vta-sec-desc">6 thành viên trẻ nhiệt huyết, kết hợp hài hòa giữa kỹ thuật công nghệ AI, quản trị kinh doanh, thiết kế sáng tạo và truyền thông xã hội.</p>
                </div>

                <div class="vta-founders-grid">
                    <?php foreach ($founders as $f): ?>
                    <div class="vta-member-card">
                        <div class="vta-member-photo-wrap">
                            <?php if (!empty($f['image'])): ?>
                            <img src="<?= htmlspecialchars($f['image']); ?>" alt="<?= htmlspecialchars($f['name']); ?>" loading="lazy">
                            <?php else: ?>
                            <div class="vta-avatar-placeholder"><?= htmlspecialchars(mb_substr($f['name'], 0, 1)); ?></div>
                            <?php endif; ?>
                            <span class="vta-member-badge"><?= htmlspecialchars($f['role']); ?></span>
                        </div>
                        <div class="vta-member-body">
                            <h4><?= htmlspecialchars($f['name']); ?></h4>
                            <div class="vta-member-role"><?= htmlspecialchars($f['role']); ?></div>
                            <div class="vta-member-focus"><i class="fa-solid fa-bolt"></i> <?= htmlspecialchars($f['focus']); ?></div>
                            <p class="vta-member-desc"><?= htmlspecialchars($f['detail']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Ban cố vấn -->
                <div class="vta-sec-header" style="margin-top: 50px;">
                    <span class="vta-tag gold">Chuyên gia đồng hành</span>
                    <h2 class="vta-sec-title">Ban Cố Vấn Chuyên Môn</h2>
                    <p class="vta-sec-desc">Đồng hành cùng Thanh Âm trong việc cung cấp định hướng chuyên môn, phản biện khoa học và kết nối mạng lưới đối tác.</p>
                </div>

                <div class="vta-advisors-grid">
                    <?php foreach ($advisors as $a): ?>
                    <div class="vta-advisor-card">
                        <div class="vta-advisor-avatar">
                            <img src="<?= htmlspecialchars($a['image']); ?>" alt="<?= htmlspecialchars($a['name']); ?>" loading="lazy">
                        </div>
                        <h4><?= htmlspecialchars($a['name']); ?></h4>
                        <span class="vta-advisor-field"><?= htmlspecialchars($a['role']); ?></span>
                        <p class="vta-advisor-desc"><?= htmlspecialchars($a['detail']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Giải thưởng & Dấu ấn -->
            <div class="vta-awards-section">
                <div class="vta-sec-header center">
                    <span class="vta-tag gold">Thành tích &amp; Ghi nhận</span>
                    <h2 class="vta-sec-title">Giải Thưởng &amp; Dấu Ấn Đạt Được</h2>
                    <p class="vta-sec-desc">Những giải thưởng là minh chứng cho sự nỗ lực không ngừng và tính thực tiễn cao của dự án Thanh Âm.</p>
                </div>

                <div class="vta-awards-grid">
                    <?php foreach ($awards as $aw): ?>
                    <div class="vta-award-card">
                        <span class="vta-award-badge-top"><i class="fa-solid fa-award"></i> <?= htmlspecialchars($aw['badge']); ?></span>
                        <div class="vta-award-icon">
                            <i class="fa-solid <?= htmlspecialchars($aw['icon']); ?>"></i>
                        </div>
                        <h4><?= htmlspecialchars($aw['title']); ?></h4>
                        <p><?= htmlspecialchars($aw['desc']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Award Gallery -->
                <div class="vta-gallery-block">
                    <div class="vta-gallery-head">
                        <div>
                            <h3><i class="fa-solid fa-images" style="color: var(--tam-blue); margin-right: 8px;"></i> Hình ảnh Vinh danh &amp; Giải thưởng</h3>
                            <p style="margin: 4px 0 0; font-size: 0.85rem; color: var(--tam-text-muted);">Nhấn vào hình ảnh để xem kích thước lớn</p>
                        </div>
                        <a href="https://drive.google.com/drive/folders/18_2pdK2US4QYegbnItjVlaRa72XUK_Xy?usp=drive_link" target="_blank" rel="noopener" class="vta-drive-btn" style="width: auto; padding: 9px 20px; font-size: 0.85rem;">
                            <i class="fa-solid fa-photo-film"></i> Xem thư mục hình &amp; clip tư liệu
                        </a>
                    </div>

                    <div class="vta-gallery-grid">
                        <?php foreach ($award_images as $image): ?>
                        <button type="button" class="vta-gallery-item" data-lightbox-src="<?= htmlspecialchars($image['src']); ?>" data-lightbox-alt="<?= htmlspecialchars($image['alt']); ?>">
                            <img src="<?= htmlspecialchars($image['src']); ?>" alt="<?= htmlspecialchars($image['alt']); ?>" loading="lazy">
                            <div class="vta-gallery-overlay">
                                <span><i class="fa-solid fa-trophy"></i> <?= htmlspecialchars($image['title']); ?></span>
                                <div class="vta-zoom-hint"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                            </div>
                        </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Hệ thống tổ chức & Liên hệ -->
            <div class="vta-org-contact-grid" style="margin-top: 48px;">
                <div class="vta-box-card">
                    <div class="vta-box-head">
                        <div class="vta-box-icon"><i class="fa-solid fa-sitemap"></i></div>
                        <div>
                            <h3>Hệ Thống Tổ Chức</h3>
                            <p>Cơ cấu nhân sự &amp; phân quyền vận hành</p>
                        </div>
                    </div>

                    <div class="vta-org-preview">
                        <img src="/ThanhAM/assets/images/so-do-to-chuc.png" alt="Sơ đồ tổ chức Thanh Âm"
                            onerror="this.onerror=null;this.replaceWith(Object.assign(document.createElement('div'),{style:'padding:20px;color:var(--tam-text-muted);font-size:0.9rem;',innerHTML:'<i class=&quot;fa-solid fa-diagram-project&quot; style=&quot;font-size:2rem;color:var(--tam-blue);margin-bottom:8px;display:block;&quot;></i>Sơ đồ phân cấp cấu trúc tổ chức dự án Thanh Âm'}));">
                    </div>

                    <a class="vta-drive-btn" href="https://drive.google.com/drive/folders/1p4LIOm7ntJL_XZHjbi-U2W22_tHfFxco?usp=drive_link" target="_blank" rel="noopener">
                        <i class="fa-solid fa-folder-open"></i> Xem thư mục hình hệ thống tổ chức trên Drive
                    </a>
                </div>

                <div class="vta-box-card">
                    <div class="vta-box-head">
                        <div class="vta-box-icon"><i class="fa-solid fa-address-card"></i></div>
                        <div>
                            <h3>Thông Tin Liên Hệ Dự Án</h3>
                            <p>Kết nối hợp tác &amp; phản hồi</p>
                        </div>
                    </div>

                    <dl class="vta-contact-list">
                        <dt><i class="fa-solid fa-signature"></i> Tên dự án</dt>
                        <dd>Thanh Âm (Thanh Âm AI)</dd>
                        
                        <dt><i class="fa-solid fa-location-dot"></i> Địa chỉ</dt>
                        <dd>TP. Mỹ Tho, Tỉnh Tiền Giang</dd>
                        
                        <dt><i class="fa-solid fa-phone"></i> Hotline</dt>
                        <dd><a href="tel:0865357517">0865 357 517</a></dd>
                        
                        <dt><i class="fa-solid fa-comments"></i> Zalo</dt>
                        <dd><a href="https://zalo.me/0912991489" target="_blank" rel="noopener">zalo.me/0912991489</a></dd>
                        
                        <dt><i class="fa-solid fa-globe"></i> Website</dt>
                        <dd><a href="/ThanhAM/index.php">thanham.vn</a></dd>
                        
                        <dt><i class="fa-brands fa-facebook"></i> Fanpage</dt>
                        <dd><a href="https://facebook.com" target="_blank" rel="noopener">facebook.com/thanham.vfy</a></dd>
                    </dl>

                    <div class="vta-quality-badge">
                        <i class="fa-solid fa-circle-check"></i>
                        <div>
                            <strong>Cam kết chất lượng thực tế</strong>
                            <p>Mọi thiết bị và phần mềm trước khi bàn giao đều được kiểm thử trực tiếp với chính người dùng thực tế.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- -------------------- TAB 2: LỊCH SỬ & HÀNH TRÌNH -------------------- -->
        <div class="vta-tab-panel <?= tabClass('lichsu', $active_tab); ?>" data-tab-panel="lichsu">
            
            <div class="vta-founding-badge-wrap">
                <div class="vta-founding-pill">
                    <i class="fa-solid fa-flag-checkered"></i> Ngày thành lập chính thức: 26/06/2025
                </div>
            </div>

            <div class="vta-sec-header center">
                <span class="vta-tag">Dòng thời gian</span>
                <h2 class="vta-sec-title">Hành Trình 6 Giai Đoạn Phát Triển</h2>
                <p class="vta-sec-desc">Từ ý tưởng mày mò nghiên cứu đến sản phẩm hoàn thiện được ghi nhận và vươn xa.</p>
            </div>

            <div class="vta-timeline-wrap">
                <div class="vta-timeline-line"></div>

                <?php foreach ($dev_stages as $stage): ?>
                <div class="vta-timeline-step <?= !empty($stage['is_current']) ? 'current' : ''; ?>">
                    <div class="vta-timeline-node">
                        <?= htmlspecialchars($stage['num']); ?>
                    </div>
                    <div class="vta-timeline-content">
                        <span class="vta-timeline-period">
                            <i class="fa-solid fa-clock"></i> <?= htmlspecialchars($stage['period']); ?>
                        </span>
                        <h4><?= htmlspecialchars($stage['title']); ?></h4>
                        <p><?= htmlspecialchars($stage['desc']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>

        <!-- -------------------- TAB 3: CÁCH THỨC HOẠT ĐỘNG -------------------- -->
        <div class="vta-tab-panel <?= tabClass('hoatdong', $active_tab); ?>" data-tab-panel="hoatdong">
            
            <div class="vta-sec-header center">
                <span class="vta-tag magenta">Khung vận hành</span>
                <h2 class="vta-sec-title">Nguyên Tắc &amp; Chức Năng Hoạt Động</h2>
                <p class="vta-sec-desc">Đảm bảo tính chuẩn mực, an toàn, nhân văn và tối ưu hóa tác động xã hội dài hạn.</p>
            </div>

            <div class="vta-ops-grid">
                <!-- Nguyên tắc hoạt động -->
                <div class="vta-ops-col">
                    <div class="vta-ops-card">
                        <div class="vta-box-head">
                            <div class="vta-box-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                            <div>
                                <h3>5 Nguyên Tắc Hoạt Động</h3>
                                <p>Định hướng cốt lõi cho mọi quyết định</p>
                            </div>
                        </div>

                        <div class="vta-ops-list">
                            <?php foreach ($principles as $i => $p): ?>
                            <div class="vta-ops-item">
                                <div class="vta-ops-num"><?= sprintf('%02d', $i + 1); ?></div>
                                <div class="vta-ops-body">
                                    <h4><?= htmlspecialchars($p['title']); ?></h4>
                                    <p><?= htmlspecialchars($p['desc']); ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Chức năng - Nhiệm vụ -->
                <div class="vta-ops-col">
                    <div class="vta-ops-card">
                        <div class="vta-box-head">
                            <div class="vta-box-icon" style="background: var(--tam-magenta-light); color: var(--tam-magenta);">
                                <i class="fa-solid fa-list-check"></i>
                            </div>
                            <div>
                                <h3>8 Chức Năng - Nhiệm Vụ</h3>
                                <p>Trách nhiệm và cam kết của đội ngũ dự án</p>
                            </div>
                        </div>

                        <div class="vta-ops-list">
                            <?php foreach ($duties as $i => $d): ?>
                            <div class="vta-ops-item duty">
                                <div class="vta-ops-num"><?= sprintf('%02d', $i + 1); ?></div>
                                <div class="vta-ops-body">
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

    </div>

</main>

<!-- Lightbox Modal for Award Images -->
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