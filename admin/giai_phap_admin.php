<?php
session_start();
require_once '../connect.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Đảm bảo bảng giai_phap_tinh_nang tồn tại trong database
try {
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `giai_phap_tinh_nang` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `slug` varchar(100) NOT NULL UNIQUE,
            `tieu_de` varchar(255) NOT NULL,
            `bieu_tuong` varchar(100) DEFAULT 'fa-lightbulb',
            `nhan` varchar(100) DEFAULT NULL,
            `tom_tat` text DEFAULT NULL,
            `noi_dung` longtext DEFAULT NULL,
            `video` varchar(255) DEFAULT NULL,
            `trang_thai` tinyint(1) DEFAULT 1,
            `thu_tu` int(11) DEFAULT 0,
            `ngay_tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // Khởi tạo dữ liệu mẫu nếu bảng đang trống
    $checkCount = $pdo->query("SELECT COUNT(*) FROM `giai_phap_tinh_nang`")->fetchColumn();
    if ((int)$checkCount === 0) {
        $sampleData = [
            ['phat-giong', 'Phát giọng AI', 'fa-microphone-lines', 'AI Speech-to-Speech', 'Chuyển giọng nói không chuẩn thành âm thanh rõ ràng, dễ hiểu.', '<h4>Công dụng & Giá trị</h4><p>Chuẩn hoá phát âm theo thời gian thực bằng mô hình AI, giúp người nghe hiểu đúng thông điệp ngay cả khi giọng nói gốc bị méo, ngọng hoặc khó nghe do hạn chế vận động cơ miệng.</p><h4>Đối tượng phù hợp</h4><p>Người khiếm thanh, người hạn chế khả năng nói, người mới tập nói sau phẫu thuật hoặc phục hồi chức năng.</p><h4>Quy trình 4 bước</h4><ol><li>Mở ứng dụng Thanh Âm, chọn mục "Phát giọng".</li><li>Nhấn giữ nút micro và nói tự nhiên theo thói quen.</li><li>Hệ thống AI xử lý và phát lại giọng nói đã được chuẩn hoá qua loa.</li><li>Có thể lưu lại đoạn ghi âm để luyện tập phát âm hằng ngày.</li></ol>', 'phat-giong.mp4', 1, 1],
            ['van-ban', 'Văn bản (Text to Speech)', 'fa-keyboard', 'Text-to-Speech', 'Gõ chữ để hệ thống đọc to thay lời muốn nói.', '<h4>Công dụng & Giá trị</h4><p>Chuyển văn bản thành giọng nói tự nhiên với ngữ điệu truyền cảm, hỗ trợ giao tiếp cho người không thể phát âm hoặc gặp khó khăn khi nói chuyện trực tiếp.</p><h4>Đối tượng phù hợp</h4><p>Người mất khả năng nói, người khiếm thính giao tiếp với người không biết ngôn ngữ ký hiệu, bệnh nhân sau phẫu thuật hầu họng.</p><h4>Quy trình 4 bước</h4><ol><li>Chọn mục "Văn bản" trên màn hình chính của ứng dụng.</li><li>Gõ hoặc dán nội dung cần truyền đạt vào ô nhập liệu.</li><li>Nhấn nút phát để hệ thống đọc to nội dung với giọng đọc tự nhiên.</li><li>Lưu lại các câu thường dùng vào danh mục yêu thích để tái sử dụng nhanh.</li></ol>', 'van-ban.mp4', 1, 2],
            ['ca-nhan-hoa', 'Cá nhân hóa giọng đọc', 'fa-sliders', 'Custom Voice AI', 'Tùy chỉnh giọng đọc, tốc độ và bộ từ vựng riêng.', '<h4>Công dụng & Giá trị</h4><p>Cho phép mỗi người dùng điều chỉnh giọng nói tổng hợp (nam/nữ/trẻ em, phương ngữ vùng miền), tốc độ đọc, và xây dựng bộ từ vựng/câu quen dùng của riêng mình để giao tiếp tự nhiên và gần gũi hơn.</p><h4>Đối tượng phù hợp</h4><p>Mọi nhóm người dùng, đặc biệt trẻ em và người có nhu cầu giao tiếp đặc thù theo môi trường sống.</p><h4>Quy trình 4 bước</h4><ol><li>Vào mục "Cá nhân hóa" trong phần Cài đặt hệ thống.</li><li>Chọn mẫu giọng đọc, tốc độ và âm lượng phù hợp với sở thích.</li><li>Thêm các từ/câu thường dùng vào bộ từ vựng cá nhân.</li><li>Lưu cấu hình để áp dụng đồng bộ cho toàn bộ ứng dụng.</li></ol>', 'ca-nhan-hoa.mp4', 1, 3],
            ['mot-cham', 'Giao tiếp 1 Chạm', 'fa-hand-pointer', 'AAC Visual Touch', 'Thẻ từ vựng biểu cảm giúp truyền đạt nhu cầu tức thì.', '<h4>Công dụng & Giá trị</h4><p>Bộ thẻ hình ảnh/biểu tượng trực quan cho các nhu cầu cơ bản (đói, khát, đau, mệt, muốn đi vệ sinh, cảm xúc...) — chỉ cần chạm 1 lần là phát ra câu nói tương ứng mà không cần thao tác gõ chữ phức tạp.</p><h4>Đối tượng phù hợp</h4><p>Trẻ chậm phát triển ngôn ngữ, người khuyết tật vận động kèm khó khăn ngôn ngữ, người cần phản hồi tức thời trong tình huống khẩn cấp.</p><h4>Quy trình 4 bước</h4><ol><li>Mở mục "1 Chạm" từ màn hình chính.</li><li>Chọn thẻ biểu tượng hình ảnh phù hợp với nhu cầu hiện tại.</li><li>Hệ thống tự động phát câu nói tương ứng với âm lượng rõ ràng.</li><li>Dễ dàng tạo thêm thẻ mới theo nhu cầu và thói quen cá nhân.</li></ol>', 'mot-cham.mp4', 1, 4],
            ['sua-chinh-ta', 'Sửa chính tả & Ngữ pháp', 'fa-spell-check', 'NLP Grammar AI', 'Tự động phát hiện và gợi ý sửa lỗi khi soạn văn bản.', '<h4>Công dụng & Giá trị</h4><p>Hỗ trợ người dùng gặp khó khăn về ngôn ngữ viết đúng chính tả và cấu trúc ngữ pháp trước khi hệ thống phát âm, giúp truyền tải thông điệp chính xác và tránh gây hiểu lầm cho người nghe.</p><h4>Đối tượng phù hợp</h4><p>Người khiếm thính, trẻ chậm phát triển ngôn ngữ, người mới học chữ hoặc học tiếng Việt.</p><h4>Quy trình 4 bước</h4><ol><li>Bật tính năng "Sửa chính tả" trong mục soạn thảo Văn bản.</li><li>Gõ nội dung như bình thường, các từ chưa đúng sẽ được hệ thống gạch chân.</li><li>Nhấn vào từ được gạch chân để xem danh sách gợi ý sửa.</li><li>Chọn từ đúng để thay thế tự động chỉ với một lần chạm.</li></ol>', 'sua-chinh-ta.mp4', 1, 5],
            ['sos', 'SOS Khẩn cấp', 'fa-triangle-exclamation', 'Emergency GPS', 'Gửi vị trí và thông điệp cứu hộ khẩn cấp chỉ với 1 nút.', '<h4>Công dụng & Giá trị</h4><p>Trong tình huống khẩn cấp, người dùng chỉ cần bấm giữ nút SOS để gửi vị trí GPS hiện tại kèm thông điệp cầu cứu bằng âm thanh và tin nhắn đến người thân/số khẩn cấp đã lưu sẵn, ngay cả khi không thể cất tiếng.</p><h4>Đối tượng phù hợp</h4><p>Người cao tuổi sống một mình, bệnh nhân, người khuyết tật vận động và ngôn ngữ, trẻ em khi ở nhà một mình.</p><h4>Quy trình 4 bước</h4><ol><li>Bấm giữ nút SOS màu đỏ trong 3 giây để kích hoạt.</li><li>Hệ thống tự động phát âm thanh cảnh báo và gửi tọa độ GPS đến danh bạ khẩn cấp.</li><li>Có thể hủy kích hoạt trong 5 giây đầu nếu bấm nhầm.</li><li>Dễ dàng thiết lập danh sách liên hệ người thân trong mục Cài đặt SOS.</li></ol>', 'sos.mp4', 1, 6],
            ['goi-y-tra-loi', 'Gợi ý trả lời thông minh', 'fa-comments', 'Smart Context AI', 'AI đề xuất sẵn các câu trả lời phù hợp ngữ cảnh.', '<h4>Công dụng & Giá trị</h4><p>Khi đang trong cuộc trò chuyện, hệ thống tự động phân tích ngữ cảnh câu hỏi của đối phương và gợi ý sẵn 2-3 câu phản hồi ngắn gọn, phù hợp — giúp người dùng tương tác tức thì mà không cần soạn thảo từ đầu.</p><h4>Đối tượng phù hợp</h4><p>Người hạn chế khả năng nói/gõ chữ chậm, người cao tuổi, người cần giao tiếp nhanh trong công việc hoặc môi trường y tế.</p><h4>Quy trình 4 bước</h4><ol><li>Trong khung trò chuyện của ứng dụng, lắng nghe câu hỏi từ người đối diện.</li><li>Hệ thống AI hiển thị 2-3 gợi ý câu trả lời thông minh phía trên bàn phím.</li><li>Chạm vào gợi ý để phát ngay hoặc chỉnh sửa nhanh trước khi phát âm.</li></ol>', 'goi-y-tra-loi.mp4', 1, 7],
            ['thu-vien', 'Thư viện câu giao tiếp', 'fa-book-open', 'AAC Repository', 'Kho câu nói, từ vựng và bài luyện tập theo chủ đề.', '<h4>Công dụng & Giá trị</h4><p>Lưu trữ có hệ thống hàng nghìn câu nói thông dụng theo chủ đề (gia đình, trường học, bệnh viện, mua sắm, giao tiếp xã hội...) cùng các bài luyện phát âm, giúp tra cứu và luyện tập thuận tiện mọi lúc mọi nơi.</p><h4>Đối tượng phù hợp</h4><p>Mọi nhóm người dùng, đặc biệt hữu ích cho giáo viên giáo dục đặc biệt và người chăm sóc khi hướng dẫn can thiệp.</p><h4>Quy trình 4 bước</h4><ol><li>Vào mục "Thư viện" trên thanh điều hướng chính.</li><li>Chọn danh mục chủ đề cần tra cứu hoặc luyện tập.</li><li>Nhấn vào từng câu để nghe giọng phát âm mẫu chuẩn.</li><li>Đánh dấu sao "Yêu thích" để đưa câu nói ra màn hình truy cập nhanh.</li></ol>', 'thu-vien.mp4', 1, 8]
        ];
        $ins = $pdo->prepare("INSERT INTO `giai_phap_tinh_nang` (`slug`, `tieu_de`, `bieu_tuong`, `nhan`, `tom_tat`, `noi_dung`, `video`, `trang_thai`, `thu_tu`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        foreach ($sampleData as $row) {
            $ins->execute($row);
        }
    }
} catch (Throwable $e) {
    // Bỏ qua lỗi khởi tạo nếu đã có
}

function cleanEditorHtml(string $html): string
{
    $html = strip_tags($html, '<p><br><strong><b><em><i><u><ol><ul><li><h3><h4><blockquote><div><span>');
    return preg_replace('/<([a-z0-9]+)(?:\s[^>]*)?>/i', '<$1>', $html) ?? '';
}

$action = $_POST['action'] ?? '';
$message = '';
$error = '';

try {
    if ($action === 'save') {
        $id = (int)($_POST['id'] ?? 0);
        $slug = trim($_POST['slug'] ?? '');
        $title = trim($_POST['tieu_de'] ?? '');
        $icon = trim($_POST['bieu_tuong'] ?? '') ?: 'fa-lightbulb';
        $label = trim($_POST['nhan'] ?? '');
        $summary = trim($_POST['tom_tat'] ?? '');
        $content = cleanEditorHtml($_POST['noi_dung'] ?? '');
        $video = trim($_POST['video'] ?? '');
        $status = isset($_POST['trang_thai']) ? 1 : 0;
        $order = max(0, (int)($_POST['thu_tu'] ?? 0));

        if (!preg_match('/^[a-z0-9-]+$/', $slug) || $title === '' || trim(strip_tags($content)) === '') {
            throw new RuntimeException('Slug chỉ dùng chữ thường, số, dấu gạch ngang; Tiêu đề và Nội dung không được bỏ trống.');
        }

        if ($id > 0) {
            $stmt = $pdo->prepare('UPDATE giai_phap_tinh_nang SET slug = ?, tieu_de = ?, bieu_tuong = ?, nhan = ?, tom_tat = ?, noi_dung = ?, video = ?, trang_thai = ?, thu_tu = ? WHERE id = ?');
            $stmt->execute([$slug, $title, $icon, $label, $summary, $content, $video, $status, $order, $id]);
            $message = 'Đã cập nhật thành công tính năng: ' . htmlspecialchars($title);
        } else {
            $stmt = $pdo->prepare('INSERT INTO giai_phap_tinh_nang (slug, tieu_de, bieu_tuong, nhan, tom_tat, noi_dung, video, trang_thai, thu_tu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$slug, $title, $icon, $label, $summary, $content, $video, $status, $order]);
            $message = 'Đã thêm mới thành công tính năng: ' . htmlspecialchars($title);
        }
    } elseif ($action === 'delete') {
        $delId = (int)($_POST['id'] ?? 0);
        $stmt = $pdo->prepare('DELETE FROM giai_phap_tinh_nang WHERE id = ?');
        $stmt->execute([$delId]);
        $message = 'Đã xóa tính năng khỏi hệ thống.';
    } elseif ($action === 'toggle_status') {
        $toggleId = (int)($_POST['id'] ?? 0);
        $stmt = $pdo->prepare('UPDATE giai_phap_tinh_nang SET trang_thai = 1 - trang_thai WHERE id = ?');
        $stmt->execute([$toggleId]);
        $message = 'Đã thay đổi trạng thái hiển thị.';
    }
} catch (Throwable $e) {
    $error = $e->getCode() === '23000' ? 'Lỗi: Mã Slug đã tồn tại trong hệ thống. Vui lòng chọn slug khác.' : $e->getMessage();
}

$edit_feature = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare('SELECT * FROM giai_phap_tinh_nang WHERE id = ?');
    $stmt->execute([(int)$_GET['edit']]);
    $edit_feature = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

$features = $pdo->query('SELECT * FROM giai_phap_tinh_nang ORDER BY thu_tu ASC, id ASC')->fetchAll(PDO::FETCH_ASSOC);

// Thống kê nhanh
$totalCount = count($features);
$activeCount = count(array_filter($features, fn($f) => (int)$f['trang_thai'] === 1));
$hiddenCount = $totalCount - $activeCount;
$videoCount = count(array_filter($features, fn($f) => !empty($f['video'])));

require_once 'header_admin.php';
?>

<!-- =====================================================================
     STYLE TÙY CHỈNH CHO TRANG QUẢN TRỊ GIẢI PHÁP PRO VIP
     ===================================================================== -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">

<style>
:root {
    --adm-navy: #071e33;
    --adm-navy-dark: #041220;
    --adm-primary: #034f8f;
    --adm-primary-light: #e0f2fe;
    --adm-accent: #0284c7;
    --adm-magenta: #8c315e;
    --adm-magenta-light: #fae8f0;
    --adm-red: #d71920;
    --adm-gold: #f59e0b;
    --adm-gold-light: #fef3c7;
    --adm-green: #10b981;
    --adm-green-light: #d1fae5;
    --adm-bg: #f8fafc;
    --adm-card-bg: #ffffff;
    --adm-text: #1e293b;
    --adm-text-muted: #64748b;
    --adm-border: #e2e8f0;
    --adm-border-focus: #38bdf8;
    --adm-radius-sm: 8px;
    --adm-radius-md: 14px;
    --adm-radius-lg: 20px;
    --adm-radius-xl: 26px;
    --adm-shadow-sm: 0 2px 8px rgba(3, 79, 143, 0.05);
    --adm-shadow-md: 0 8px 24px rgba(3, 79, 143, 0.08);
    --adm-shadow-hover: 0 14px 32px rgba(3, 79, 143, 0.12);
}

body {
    background-color: #f1f5f9 !important;
    font-family: 'Be Vietnam Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    color: var(--adm-text) !important;
}

.gp-adm-container {
    max-width: 1540px;
    margin: 0 auto;
    padding: 10px 24px 60px;
}

/* Page Header */
.gp-adm-header {
    background: linear-gradient(135deg, #071e33 0%, #034f8f 60%, #8c315e 100%);
    border-radius: var(--adm-radius-xl);
    padding: 28px 32px;
    color: #ffffff;
    box-shadow: var(--adm-shadow-md);
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
}

.gp-adm-header::before {
    content: "";
    position: absolute;
    top: -50%;
    right: -10%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.25) 0%, transparent 70%);
    filter: blur(40px);
    pointer-events: none;
}

.gp-adm-header-title {
    font-family: 'Sora', 'Be Vietnam Pro', sans-serif;
    font-size: 1.75rem;
    font-weight: 800;
    margin: 0 0 6px;
    color: #ffffff;
    letter-spacing: -0.02em;
    display: flex;
    align-items: center;
    gap: 12px;
}

.gp-adm-header-desc {
    color: rgba(255, 255, 255, 0.82);
    font-size: 0.94rem;
    margin: 0;
    max-width: 700px;
}

.gp-adm-btn-public {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.35);
    color: #ffffff !important;
    backdrop-filter: blur(8px);
    border-radius: var(--adm-radius-md);
    padding: 10px 20px;
    font-weight: 700;
    font-size: 0.88rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.25s ease;
}

.gp-adm-btn-public:hover {
    background: #ffffff;
    color: var(--adm-navy) !important;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}

/* Stat Cards */
.gp-stat-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 28px;
}

.gp-stat-card {
    background: #ffffff;
    border-radius: var(--adm-radius-lg);
    border: 1px solid var(--adm-border);
    padding: 20px 22px;
    box-shadow: var(--adm-shadow-sm);
    display: flex;
    align-items: center;
    gap: 18px;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.gp-stat-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--adm-shadow-hover);
}

.gp-stat-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    flex-shrink: 0;
}

.gp-stat-icon.blue { background: #e0f2fe; color: #0284c7; }
.gp-stat-icon.green { background: #d1fae5; color: #10b981; }
.gp-stat-icon.gray { background: #f1f5f9; color: #64748b; }
.gp-stat-icon.gold { background: #fef3c7; color: #d97706; }

.gp-stat-num {
    font-family: 'Sora', sans-serif;
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--adm-navy);
    line-height: 1.1;
    margin-bottom: 3px;
}

.gp-stat-label {
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--adm-text-muted);
    text-transform: uppercase;
    letter-spacing: 0.04em;
}

/* Alert Boxes */
.gp-alert {
    border-radius: var(--adm-radius-md);
    padding: 14px 20px;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 0.92rem;
    font-weight: 600;
    box-shadow: var(--adm-shadow-sm);
}

.gp-alert-success {
    background: #ecfdf5;
    border: 1px solid #a7f3d0;
    color: #065f46;
}

.gp-alert-danger {
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #991b1b;
}

/* Main Cards */
.gp-card {
    background: #ffffff;
    border-radius: var(--adm-radius-xl);
    border: 1px solid var(--adm-border);
    box-shadow: var(--adm-shadow-sm);
    overflow: hidden;
    height: 100%;
}

.gp-card-header {
    background: #ffffff;
    padding: 22px 28px;
    border-bottom: 1px solid var(--adm-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
}

.gp-card-header-title {
    font-family: 'Sora', sans-serif;
    font-size: 1.18rem;
    font-weight: 800;
    color: var(--adm-navy);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.gp-card-header-subtitle {
    font-size: 0.84rem;
    color: var(--adm-text-muted);
    margin-top: 2px;
}

.gp-card-body {
    padding: 28px;
}

/* Editing Banner */
.gp-edit-banner {
    background: linear-gradient(135deg, #fef3c7 0%, #fffbeb 100%);
    border: 1px solid #fde68a;
    border-radius: var(--adm-radius-md);
    padding: 14px 18px;
    margin-bottom: 22px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    color: #92400e;
    font-size: 0.9rem;
    font-weight: 600;
}

/* Form Styles */
.gp-form-sec {
    margin-bottom: 26px;
    padding-bottom: 22px;
    border-bottom: 1px dashed var(--adm-border);
}

.gp-form-sec:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.gp-form-sec-title {
    font-family: 'Sora', sans-serif;
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--adm-navy);
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.gp-form-sec-title i {
    color: var(--adm-accent);
}

.gp-label {
    font-size: 0.84rem;
    font-weight: 700;
    color: #334155;
    margin-bottom: 6px;
    display: block;
}

.gp-label .req {
    color: var(--adm-red);
}

.gp-input, .gp-select, .gp-textarea {
    width: 100%;
    padding: 10px 14px;
    border-radius: var(--adm-radius-sm);
    border: 1.5px solid var(--adm-border);
    font-family: 'Be Vietnam Pro', sans-serif;
    font-size: 0.9rem;
    color: var(--adm-text);
    background: #ffffff;
    transition: all 0.2s ease;
}

.gp-input:focus, .gp-select:focus, .gp-textarea:focus {
    border-color: var(--adm-accent);
    box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
    outline: none;
}

.gp-input-help {
    font-size: 0.76rem;
    color: var(--adm-text-muted);
    margin-top: 5px;
}

/* Icon Picker & Preview */
.gp-icon-picker-box {
    display: flex;
    align-items: center;
    gap: 12px;
}

.gp-icon-preview {
    width: 46px;
    height: 46px;
    border-radius: 12px;
    background: var(--adm-primary-light);
    color: var(--adm-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    border: 1.5px solid #bae6fd;
    flex-shrink: 0;
    transition: all 0.2s ease;
}

.gp-quick-icons {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 10px;
}

.gp-icon-chip {
    background: #f1f5f9;
    border: 1px solid var(--adm-border);
    border-radius: 20px;
    padding: 4px 10px;
    font-size: 0.78rem;
    font-weight: 600;
    color: #475569;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
}

.gp-icon-chip:hover {
    background: var(--adm-primary-light);
    color: var(--adm-primary);
    border-color: #93c5fd;
    transform: translateY(-1px);
}

/* Rich Editor */
.gp-editor-wrapper {
    border: 1.5px solid var(--adm-border);
    border-radius: var(--adm-radius-md);
    overflow: hidden;
    background: #ffffff;
    transition: border-color 0.2s;
}

.gp-editor-wrapper:focus-within {
    border-color: var(--adm-accent);
    box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
}

.gp-editor-toolbar {
    background: #f8fafc;
    border-bottom: 1.5px solid var(--adm-border);
    padding: 8px 10px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 4px;
}

.gp-tb-btn {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #334155;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.15s ease;
}

.gp-tb-btn:hover {
    background: var(--adm-primary-light);
    color: var(--adm-primary);
    border-color: #93c5fd;
}

.gp-tb-sep {
    width: 1px;
    height: 22px;
    background: #cbd5e1;
    margin: 0 4px;
}

.gp-rich-editor {
    min-height: 240px;
    max-height: 480px;
    overflow-y: auto;
    padding: 16px;
    font-size: 0.92rem;
    line-height: 1.7;
    color: var(--adm-text);
    outline: none;
}

.gp-rich-editor:empty::before {
    content: attr(data-placeholder);
    color: #94a3b8;
    pointer-events: none;
}

.gp-rich-editor h3, .gp-rich-editor h4 {
    font-family: 'Sora', sans-serif;
    color: var(--adm-navy);
    margin-top: 14px;
    margin-bottom: 6px;
}

.gp-rich-editor ol, .gp-rich-editor ul {
    padding-left: 24px;
    margin-bottom: 12px;
}

.gp-rich-editor li {
    margin-bottom: 4px;
}

/* Quick templates bar */
.gp-quick-templates {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 8px;
    flex-wrap: wrap;
}

.gp-template-btn {
    background: #f8fafc;
    border: 1px dashed #94a3b8;
    border-radius: 6px;
    padding: 3px 10px;
    font-size: 0.76rem;
    font-weight: 600;
    color: #475569;
    cursor: pointer;
    transition: all 0.2s ease;
}

.gp-template-btn:hover {
    background: #e0f2fe;
    border-color: #0284c7;
    color: #0284c7;
}

/* Toggle Switch */
.gp-switch-label {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
}

.gp-switch {
    position: relative;
    display: inline-block;
    width: 48px;
    height: 26px;
}

.gp-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.gp-slider {
    position: absolute;
    cursor: pointer;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: #cbd5e1;
    transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 34px;
}

.gp-slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

input:checked + .gp-slider {
    background-color: #10b981;
}

input:checked + .gp-slider:before {
    transform: translateX(22px);
}

/* Form Action Buttons */
.gp-form-actions {
    display: flex;
    gap: 12px;
    margin-top: 24px;
    position: sticky;
    bottom: 16px;
    background: #ffffff;
    padding-top: 14px;
    border-top: 1px solid var(--adm-border);
    z-index: 10;
}

.gp-btn-submit {
    flex: 1;
    background: linear-gradient(135deg, #034f8f 0%, #0284c7 100%);
    color: #ffffff;
    border: none;
    border-radius: var(--adm-radius-md);
    padding: 12px 22px;
    font-weight: 700;
    font-size: 0.95rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
    box-shadow: 0 4px 14px rgba(3, 79, 143, 0.25);
    transition: all 0.25s ease;
}

.gp-btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(3, 79, 143, 0.35);
}

.gp-btn-cancel {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid var(--adm-border);
    border-radius: var(--adm-radius-md);
    padding: 12px 20px;
    font-weight: 600;
    font-size: 0.92rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.gp-btn-cancel:hover {
    background: #e2e8f0;
    color: var(--adm-navy);
}

/* Table Styles */
.gp-table-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.gp-search-input-box {
    position: relative;
    max-width: 320px;
    width: 100%;
}

.gp-search-input-box i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--adm-text-muted);
}

.gp-search-input {
    width: 100%;
    padding: 9px 14px 9px 38px;
    border-radius: 20px;
    border: 1.5px solid var(--adm-border);
    font-size: 0.88rem;
    outline: none;
    transition: all 0.2s ease;
}

.gp-search-input:focus {
    border-color: var(--adm-accent);
    box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
}

.gp-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.gp-table th {
    background: #f8fafc;
    padding: 14px 16px;
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--adm-text-muted);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-bottom: 1.5px solid var(--adm-border);
}

.gp-table td {
    padding: 16px;
    border-bottom: 1px solid var(--adm-border-light);
    vertical-align: middle;
    font-size: 0.88rem;
}

.gp-table tr:hover td {
    background: #f8fafc;
}

.gp-order-badge {
    width: 30px;
    height: 30px;
    border-radius: 8px;
    background: #f1f5f9;
    color: var(--adm-navy);
    font-weight: 800;
    font-size: 0.82rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.gp-feat-cell {
    display: flex;
    align-items: center;
    gap: 14px;
}

.gp-feat-icon-avatar {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: var(--adm-primary-light);
    color: var(--adm-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.gp-feat-title {
    font-weight: 700;
    color: var(--adm-navy);
    font-size: 0.94rem;
    margin-bottom: 3px;
}

.gp-feat-subtags {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
}

.gp-pill-badge {
    font-size: 0.72rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 12px;
}

.gp-pill-badge.slug {
    background: #f1f5f9;
    color: #475569;
    font-family: monospace;
}

.gp-pill-badge.label {
    background: var(--adm-magenta-light);
    color: var(--adm-magenta);
}

.gp-status-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.78rem;
    font-weight: 700;
}

.gp-status-pill.active {
    background: #d1fae5;
    color: #065f46;
}

.gp-status-pill.hidden {
    background: #f1f5f9;
    color: #64748b;
}

.gp-status-pill .dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
}

.gp-status-pill.active .dot { background: #10b981; }
.gp-status-pill.hidden .dot { background: #94a3b8; }

.gp-act-btn {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.88rem;
    border: 1px solid var(--adm-border);
    background: #ffffff;
    color: #334155;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s ease;
}

.gp-act-btn.edit:hover {
    background: var(--adm-primary-light);
    color: var(--adm-primary);
    border-color: #93c5fd;
}

.gp-act-btn.view:hover {
    background: #fef3c7;
    color: #b45309;
    border-color: #fde68a;
}

.gp-act-btn.delete:hover {
    background: #fee2e2;
    color: #dc2626;
    border-color: #fca5a5;
}

/* Modal Styling */
.gp-modal {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(4, 18, 32, 0.65);
    backdrop-filter: blur(8px);
}

.gp-modal.open {
    display: flex;
    animation: modalFade 0.2s ease forwards;
}

@keyframes modalFade {
    from { opacity: 0; }
    to { opacity: 1; }
}

.gp-modal-dialog {
    background: #ffffff;
    border-radius: var(--adm-radius-xl);
    width: 100%;
    max-width: 680px;
    max-height: 85vh;
    display: flex;
    flex-direction: column;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
    overflow: hidden;
}

.gp-modal-head {
    padding: 20px 24px;
    border-bottom: 1px solid var(--adm-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.gp-modal-body {
    padding: 24px;
    overflow-y: auto;
}

.gp-modal-close {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: none;
    background: #f1f5f9;
    color: #475569;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    transition: all 0.2s;
}

.gp-modal-close:hover {
    background: #fee2e2;
    color: #dc2626;
}

/* Responsive */
@media (max-width: 1200px) {
    .gp-stat-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .gp-adm-container {
        padding: 10px 12px 40px;
    }
    .gp-adm-header {
        padding: 20px;
    }
    .gp-stat-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="gp-adm-container">

    <!-- ==================== HEADER BANNER ==================== -->
    <div class="gp-adm-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h1 class="gp-adm-header-title">
                <i class="fa-solid fa-wand-magic-sparkles text-info"></i> Quản Lý Tính Năng Giải Pháp
            </h1>
            <p class="gp-adm-header-desc">
                Trung tâm cấu hình nội dung hiển thị cho các module AI, mô tả công dụng, hướng dẫn sử dụng và video minh họa tại trang <b>Giải pháp</b>.
            </p>
        </div>
        <div>
            <a href="../pages/giaiphap.php" target="_blank" class="gp-adm-btn-public">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Xem Trang Công Khai
            </a>
        </div>
    </div>

    <!-- ==================== THỐNG KÊ NHANH ==================== -->
    <div class="gp-stat-grid">
        <div class="gp-stat-card">
            <div class="gp-stat-icon blue">
                <i class="fa-solid fa-cubes"></i>
            </div>
            <div>
                <div class="gp-stat-num"><?= $totalCount ?></div>
                <div class="gp-stat-label">Tổng số tính năng</div>
            </div>
        </div>
        <div class="gp-stat-card">
            <div class="gp-stat-icon green">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div>
                <div class="gp-stat-num"><?= $activeCount ?></div>
                <div class="gp-stat-label">Đang hiển thị</div>
            </div>
        </div>
        <div class="gp-stat-card">
            <div class="gp-stat-icon gray">
                <i class="fa-solid fa-eye-slash"></i>
            </div>
            <div>
                <div class="gp-stat-num"><?= $hiddenCount ?></div>
                <div class="gp-stat-label">Đang ẩn / Lưu nháp</div>
            </div>
        </div>
        <div class="gp-stat-card">
            <div class="gp-stat-icon gold">
                <i class="fa-solid fa-video"></i>
            </div>
            <div>
                <div class="gp-stat-num"><?= $videoCount ?></div>
                <div class="gp-stat-label">Có video minh họa</div>
            </div>
        </div>
    </div>

    <!-- Thông báo Alert -->
    <?php if ($message): ?>
    <div class="gp-alert gp-alert-success">
        <i class="fa-solid fa-circle-check fs-5"></i>
        <span><?= $message ?></span>
    </div>
    <?php endif; ?>

    <?php if ($error): ?>
    <div class="gp-alert gp-alert-danger">
        <i class="fa-solid fa-triangle-exclamation fs-5"></i>
        <span><?= $error ?></span>
    </div>
    <?php endif; ?>

    <!-- ==================== LAYOUT CHÍNH: 2 CỘT ==================== -->
    <div class="row g-4">
        
        <!-- CỘT TRÁI (COL-XL-5): FORM THÊM / CHỈNH SỬA -->
        <div class="col-xl-5">
            <div class="gp-card" id="form-card">
                <div class="gp-card-header">
                    <div>
                        <h2 class="gp-card-header-title">
                            <i class="fa-solid <?= $edit_feature ? 'fa-pen-to-square text-warning' : 'fa-circle-plus text-primary' ?>"></i>
                            <?= $edit_feature ? 'Chỉnh Sửa Tính Năng' : 'Thêm Tính Năng Mới' ?>
                        </h2>
                        <div class="gp-card-header-subtitle">
                            <?= $edit_feature ? 'Cập nhật thông tin & nội dung định dạng' : 'Điền thông tin để xuất bản tính năng mới' ?>
                        </div>
                    </div>
                </div>

                <div class="gp-card-body">
                    
                    <?php if ($edit_feature): ?>
                    <div class="gp-edit-banner">
                        <div>
                            <i class="fa-solid fa-triangle-exclamation me-1"></i>
                            Đang chỉnh sửa: <b><?= htmlspecialchars($edit_feature['tieu_de']) ?></b> (ID: #<?= $edit_feature['id'] ?>)
                        </div>
                        <a href="giai_phap_admin.php" class="btn btn-sm btn-outline-dark" style="border-radius: 20px; font-weight: 700;">
                            <i class="fa-solid fa-xmark me-1"></i> Hủy
                        </a>
                    </div>
                    <?php endif; ?>

                    <form method="post" id="feature-form">
                        <input type="hidden" name="action" value="save">
                        <input type="hidden" name="id" value="<?= (int)($edit_feature['id'] ?? 0) ?>">

                        <!-- PHẦN 1: THÔNG TIN CƠ BẢN -->
                        <div class="gp-form-sec">
                            <div class="gp-form-sec-title">
                                <i class="fa-solid fa-circle-info"></i> 1. Thông tin định danh
                            </div>

                            <div class="mb-3">
                                <label class="gp-label" for="tieu-de">Tên tính năng <span class="req">*</span></label>
                                <input id="tieu-de" type="text" name="tieu_de" class="gp-input" required 
                                       value="<?= htmlspecialchars($edit_feature['tieu_de'] ?? '') ?>" 
                                       placeholder="Ví dụ: Phát giọng AI (Speech-to-Speech)">
                                <div class="gp-input-help">Tên chính hiển thị trên nút chọn và tiêu đề khung chi tiết.</div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-7">
                                    <label class="gp-label" for="slug">Mã Slug (URL / ID) <span class="req">*</span></label>
                                    <input id="slug" type="text" name="slug" class="gp-input" required 
                                           value="<?= htmlspecialchars($edit_feature['slug'] ?? '') ?>" 
                                           placeholder="phat-giong-ai">
                                    <div class="gp-input-help">Chữ thường, số và dấu gạch ngang (tự sinh từ tiêu đề).</div>
                                </div>
                                <div class="col-md-5">
                                    <label class="gp-label" for="thu-tu">Thứ tự hiển thị</label>
                                    <input id="thu-tu" type="number" min="0" name="thu_tu" class="gp-input" 
                                           value="<?= htmlspecialchars($edit_feature['thu_tu'] ?? count($features) + 1) ?>">
                                    <div class="gp-input-help">Số nhỏ hơn sẽ đứng trước.</div>
                                </div>
                            </div>
                        </div>

                        <!-- PHẦN 2: BIỂU TƯỢNG & NHẬN DIỆN -->
                        <div class="gp-form-sec">
                            <div class="gp-form-sec-title">
                                <i class="fa-solid fa-icons"></i> 2. Biểu tượng &amp; Nhãn phụ
                            </div>

                            <div class="mb-3">
                                <label class="gp-label" for="bieu-tuong">Biểu tượng FontAwesome</label>
                                <div class="gp-icon-picker-box">
                                    <div class="gp-icon-preview" id="icon-preview">
                                        <i class="fa-solid <?= htmlspecialchars($edit_feature['bieu_tuong'] ?? 'fa-lightbulb') ?>"></i>
                                    </div>
                                    <input id="bieu-tuong" type="text" name="bieu_tuong" class="gp-input" 
                                           value="<?= htmlspecialchars($edit_feature['bieu_tuong'] ?? 'fa-lightbulb') ?>" 
                                           placeholder="fa-microphone-lines">
                                </div>

                                <!-- Gợi ý icon thường dùng -->
                                <div class="gp-quick-icons">
                                    <span class="gp-icon-chip" data-icon="fa-microphone-lines"><i class="fa-solid fa-microphone-lines"></i> Micro</span>
                                    <span class="gp-icon-chip" data-icon="fa-keyboard"><i class="fa-solid fa-keyboard"></i> Bàn phím</span>
                                    <span class="gp-icon-chip" data-icon="fa-sliders"><i class="fa-solid fa-sliders"></i> Cài đặt</span>
                                    <span class="gp-icon-chip" data-icon="fa-hand-pointer"><i class="fa-solid fa-hand-pointer"></i> 1 Chạm</span>
                                    <span class="gp-icon-chip" data-icon="fa-spell-check"><i class="fa-solid fa-spell-check"></i> Chính tả</span>
                                    <span class="gp-icon-chip" data-icon="fa-triangle-exclamation"><i class="fa-solid fa-triangle-exclamation"></i> SOS</span>
                                    <span class="gp-icon-chip" data-icon="fa-comments"><i class="fa-solid fa-comments"></i> Trò chuyện</span>
                                    <span class="gp-icon-chip" data-icon="fa-book-open"><i class="fa-solid fa-book-open"></i> Thư viện</span>
                                    <span class="gp-icon-chip" data-icon="fa-volume-high"><i class="fa-solid fa-volume-high"></i> Âm lượng</span>
                                    <span class="gp-icon-chip" data-icon="fa-bell"><i class="fa-solid fa-bell"></i> Chuông</span>
                                    <span class="gp-icon-chip" data-icon="fa-brain"><i class="fa-solid fa-brain"></i> AI Não bộ</span>
                                    <span class="gp-icon-chip" data-icon="fa-shield-halved"><i class="fa-solid fa-shield-halved"></i> Bảo mật</span>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="gp-label" for="nhan">Nhãn công nghệ / Badge</label>
                                    <input id="nhan" type="text" name="nhan" class="gp-input" 
                                           value="<?= htmlspecialchars($edit_feature['nhan'] ?? '') ?>" 
                                           placeholder="Ví dụ: AI Speech-to-Speech">
                                </div>
                                <div class="col-md-6">
                                    <label class="gp-label" for="video">Tên file Video</label>
                                    <input id="video" type="text" name="video" class="gp-input" 
                                           value="<?= htmlspecialchars($edit_feature['video'] ?? '') ?>" 
                                           placeholder="phat-giong.mp4">
                                </div>
                            </div>

                            <div class="mt-3">
                                <label class="gp-label" for="tom-tat">Mô tả tóm tắt ngắn</label>
                                <textarea id="tom-tat" name="tom_tat" class="gp-textarea" rows="2" 
                                          placeholder="Tóm tắt 1 câu ngắn gọn về giá trị của tính năng..."><?= htmlspecialchars($edit_feature['tom_tat'] ?? '') ?></textarea>
                            </div>
                        </div>

                        <!-- PHẦN 3: NỘI DUNG CHI TIẾT (RICH EDITOR) -->
                        <div class="gp-form-sec">
                            <div class="gp-form-sec-title">
                                <i class="fa-solid fa-file-lines"></i> 3. Nội dung chi tiết &amp; Hướng dẫn <span class="req">*</span>
                            </div>

                            <div class="gp-editor-wrapper">
                                <div class="gp-editor-toolbar" role="toolbar">
                                    <button type="button" class="gp-tb-btn" data-command="bold" title="In đậm (Ctrl+B)"><i class="fa-solid fa-bold"></i></button>
                                    <button type="button" class="gp-tb-btn" data-command="italic" title="In nghiêng (Ctrl+I)"><i class="fa-solid fa-italic"></i></button>
                                    <button type="button" class="gp-tb-btn" data-command="underline" title="Gạch chân (Ctrl+U)"><i class="fa-solid fa-underline"></i></button>
                                    
                                    <div class="gp-tb-sep"></div>
                                    
                                    <button type="button" class="gp-tb-btn" data-command="formatBlock" data-value="h4" title="Tiêu đề mục (H4)"><i class="fa-solid fa-heading"></i></button>
                                    <button type="button" class="gp-tb-btn" data-command="insertOrderedList" title="Danh sách số 1. 2. 3."><i class="fa-solid fa-list-ol"></i></button>
                                    <button type="button" class="gp-tb-btn" data-command="insertUnorderedList" title="Danh sách chấm"><i class="fa-solid fa-list-ul"></i></button>
                                    
                                    <div class="gp-tb-sep"></div>

                                    <button type="button" class="gp-tb-btn" data-command="justifyLeft" title="Căn trái"><i class="fa-solid fa-align-left"></i></button>
                                    <button type="button" class="gp-tb-btn" data-command="justifyCenter" title="Căn giữa"><i class="fa-solid fa-align-center"></i></button>
                                    <button type="button" class="gp-tb-btn" data-command="removeFormat" title="Xóa định dạng"><i class="fa-solid fa-eraser"></i></button>
                                </div>

                                <div id="rich-editor" class="gp-rich-editor" contenteditable="true" 
                                     data-placeholder="Nhập nội dung chi tiết: Công dụng, Đối tượng phù hợp, Quy trình hướng dẫn..."><?= $edit_feature ? $edit_feature['noi_dung'] : '' ?></div>
                                <textarea name="noi_dung" id="noi-dung" hidden></textarea>
                            </div>

                            <!-- Chèn nhanh mẫu cấu trúc -->
                            <div class="gp-quick-templates">
                                <span style="font-size: 0.78rem; font-weight: 700; color: #64748b;">Chèn mẫu nhanh:</span>
                                <button type="button" class="gp-template-btn" id="btn-tmpl-purpose">+ Mục Công dụng</button>
                                <button type="button" class="gp-template-btn" id="btn-tmpl-target">+ Mục Đối tượng</button>
                                <button type="button" class="gp-template-btn" id="btn-tmpl-steps">+ Mục 4 Bước</button>
                            </div>
                        </div>

                        <!-- PHẦN 4: TRẠNG THÁI HIỂN THỊ -->
                        <div class="gp-form-sec">
                            <label class="gp-switch-label">
                                <div class="gp-switch">
                                    <input type="checkbox" name="trang_thai" id="trang_thai" <?= !isset($edit_feature['trang_thai']) || $edit_feature['trang_thai'] ? 'checked' : '' ?>>
                                    <span class="gp-slider"></span>
                                </div>
                                <div>
                                    <div style="font-weight: 700; font-size: 0.92rem; color: var(--adm-navy);">Hiển thị công khai</div>
                                    <div style="font-size: 0.78rem; color: var(--adm-text-muted);">Bật để tính năng xuất hiện trực tiếp trên trang Giải pháp.</div>
                                </div>
                            </label>
                        </div>

                        <!-- ACTIONS -->
                        <div class="gp-form-actions">
                            <button class="gp-btn-submit" type="submit">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <?= $edit_feature ? 'Lưu Thay Đổi' : 'Thêm Mới Tính Năng' ?>
                            </button>
                            <?php if ($edit_feature): ?>
                            <a href="giai_phap_admin.php" class="gp-btn-cancel">Hủy</a>
                            <?php endif; ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- CỘT PHẢI (COL-XL-7): DANH SÁCH TÍNH NĂNG -->
        <div class="col-xl-7">
            <div class="gp-card">
                <div class="gp-card-header">
                    <div>
                        <h2 class="gp-card-header-title">
                            <i class="fa-solid fa-list-check text-primary"></i> Danh Sách Tính Năng Hệ Thống
                        </h2>
                        <div class="gp-card-header-subtitle">
                            <?= count($features) ?> tính năng đã thiết lập · Sắp xếp theo thứ tự hiển thị
                        </div>
                    </div>
                </div>

                <div class="gp-card-body p-0">
                    
                    <!-- Search & Filter Bar -->
                    <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div class="gp-search-input-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" id="tableSearch" class="gp-search-input" placeholder="Tìm kiếm tính năng, slug...">
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary filter-btn active" data-filter="all">Tất cả (<?= $totalCount ?>)</button>
                            <button type="button" class="btn btn-sm btn-outline-success filter-btn" data-filter="active">Đang bật (<?= $activeCount ?>)</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary filter-btn" data-filter="hidden">Đang ẩn (<?= $hiddenCount ?>)</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="gp-table" id="featuresTable">
                            <thead>
                                <tr>
                                    <th style="width: 60px;" class="text-center">STT</th>
                                    <th>Tính năng &amp; Nhãn</th>
                                    <th>Video</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end" style="width: 130px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($features)): ?>
                                <?php foreach ($features as $f): ?>
                                <tr data-status="<?= (int)$f['trang_thai'] === 1 ? 'active' : 'hidden' ?>" 
                                    data-search="<?= htmlspecialchars(strtolower($f['tieu_de'] . ' ' . $f['slug'] . ' ' . ($f['nhan'] ?? ''))) ?>">
                                    
                                    <!-- STT -->
                                    <td class="text-center">
                                        <span class="gp-order-badge">#<?= (int)$f['thu_tu'] ?></span>
                                    </td>

                                    <!-- Tên & Biểu tượng -->
                                    <td>
                                        <div class="gp-feat-cell">
                                            <div class="gp-feat-icon-avatar">
                                                <i class="fa-solid <?= htmlspecialchars($f['bieu_tuong'] ?: 'fa-lightbulb') ?>"></i>
                                            </div>
                                            <div>
                                                <div class="gp-feat-title"><?= htmlspecialchars($f['tieu_de']) ?></div>
                                                <div class="gp-feat-subtags">
                                                    <span class="gp-pill-badge slug"><?= htmlspecialchars($f['slug']) ?></span>
                                                    <?php if (!empty($f['nhan'])): ?>
                                                    <span class="gp-pill-badge label"><?= htmlspecialchars($f['nhan']) ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if (!empty($f['tom_tat'])): ?>
                                                <div style="font-size: 0.8rem; color: #64748b; margin-top: 3px; max-width: 320px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                    <?= htmlspecialchars($f['tom_tat']) ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Video -->
                                    <td>
                                        <?php if (!empty($f['video'])): ?>
                                        <span style="font-size: 0.82rem; font-weight: 600; color: #0284c7; display: inline-flex; align-items: center; gap: 4px;">
                                            <i class="fa-solid fa-circle-play text-danger"></i> <?= htmlspecialchars($f['video']) ?>
                                        </span>
                                        <?php else: ?>
                                        <span style="font-size: 0.8rem; color: #94a3b8;">Chưa có</span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- Trạng thái -->
                                    <td>
                                        <form method="post" style="display: inline;">
                                            <input type="hidden" name="action" value="toggle_status">
                                            <input type="hidden" name="id" value="<?= (int)$f['id'] ?>">
                                            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;" title="Bấm để bật/tắt">
                                                <?php if ((int)$f['trang_thai'] === 1): ?>
                                                <span class="gp-status-pill active"><span class="dot"></span> Đang bật</span>
                                                <?php else: ?>
                                                <span class="gp-status-pill hidden"><span class="dot"></span> Đang ẩn</span>
                                                <?php endif; ?>
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Thao tác -->
                                    <td class="text-end">
                                        <div style="display: inline-flex; gap: 6px;">
                                            <!-- Xem trước Preview Modal -->
                                            <button type="button" class="gp-act-btn view btn-preview" 
                                                    data-title="<?= htmlspecialchars($f['tieu_de']) ?>" 
                                                    data-icon="<?= htmlspecialchars($f['bieu_tuong'] ?: 'fa-lightbulb') ?>"
                                                    data-badge="<?= htmlspecialchars($f['nhan'] ?? '') ?>"
                                                    data-summary="<?= htmlspecialchars($f['tom_tat'] ?? '') ?>"
                                                    data-video="<?= htmlspecialchars($f['video'] ?? '') ?>"
                                                    data-content="<?= htmlspecialchars($f['noi_dung'] ?? '') ?>"
                                                    title="Xem trước nội dung">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>

                                            <!-- Sửa -->
                                            <a href="?edit=<?= (int)$f['id'] ?>" class="gp-act-btn edit" title="Chỉnh sửa tính năng">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <!-- Xóa -->
                                            <form method="post" style="display: inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tính năng \'<?= htmlspecialchars(addslashes($f['tieu_de'])) ?>\'?');">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?= (int)$f['id'] ?>">
                                                <button type="submit" class="gp-act-btn delete" title="Xóa tính năng">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="fa-solid fa-folder-open fs-2 d-block mb-2 text-secondary"></i>
                                        Chưa có tính năng nào trong cơ sở dữ liệu. Hãy thêm tính năng đầu tiên ở khung bên trái.
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- ==================== PREVIEW MODAL ==================== -->
<div class="gp-modal" id="previewModal">
    <div class="gp-modal-dialog">
        <div class="gp-modal-head">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div class="gp-feat-icon-avatar" id="modal-icon-wrap" style="width: 42px; height: 42px; font-size: 1.2rem;">
                    <i class="fa-solid fa-lightbulb" id="modal-icon"></i>
                </div>
                <div>
                    <h3 style="font-family: 'Sora', sans-serif; font-size: 1.15rem; font-weight: 800; color: var(--adm-navy); margin: 0;" id="modal-title">Tiêu đề tính năng</h3>
                    <span class="gp-pill-badge label" id="modal-badge" style="margin-top: 2px; display: inline-block;">Badge</span>
                </div>
            </div>
            <button type="button" class="gp-modal-close" id="modal-close">&times;</button>
        </div>
        <div class="gp-modal-body">
            <div style="background: #f8fafc; border-left: 4px solid #0284c7; padding: 12px 16px; border-radius: 6px; font-size: 0.9rem; color: #334155; margin-bottom: 18px;" id="modal-summary">
                Tóm tắt ngắn gọn của tính năng...
            </div>
            
            <div style="font-size: 0.92rem; line-height: 1.7; color: #1e293b;" id="modal-content">
                Nội dung chi tiết...
            </div>

            <div id="modal-video-box" style="margin-top: 20px; display: none;">
                <div style="font-weight: 700; font-size: 0.85rem; color: #475569; margin-bottom: 6px;">
                    <i class="fa-solid fa-film text-primary me-1"></i> File video liên kết: <code id="modal-video-name"></code>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== JAVASCRIPT TƯƠNG TÁC ==================== -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editor = document.getElementById('rich-editor');
    const hiddenContent = document.getElementById('noi-dung');
    const titleInput = document.getElementById('tieu-de');
    const slugInput = document.getElementById('slug');
    const iconInput = document.getElementById('bieu-tuong');
    const iconPreview = document.getElementById('icon-preview');
    const idInput = document.querySelector('input[name="id"]');
    
    // 1. Tự sinh Slug từ Tiêu đề
    let slugWasEdited = Boolean(idInput && idInput.value && parseInt(idInput.value) > 0);
    if (slugInput) {
        slugInput.addEventListener('input', () => { slugWasEdited = true; });
    }
    if (titleInput && slugInput) {
        titleInput.addEventListener('input', () => {
            if (slugWasEdited) return;
            slugInput.value = titleInput.value
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .replace(/đ/g, 'd')
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-|-$/g, '');
        });
    }

    // 2. Icon Picker & Live Preview
    if (iconInput && iconPreview) {
        iconInput.addEventListener('input', () => {
            let val = iconInput.value.trim();
            if (!val.startsWith('fa-')) val = 'fa-' + val;
            iconPreview.innerHTML = `<i class="fa-solid ${val}"></i>`;
        });

        document.querySelectorAll('.gp-icon-chip').forEach(chip => {
            chip.addEventListener('click', () => {
                const iconClass = chip.getAttribute('data-icon');
                iconInput.value = iconClass;
                iconPreview.innerHTML = `<i class="fa-solid ${iconClass}"></i>`;
            });
        });
    }

    // 3. Rich Text Editor Toolbar
    document.querySelectorAll('.gp-tb-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            editor.focus();
            const cmd = button.getAttribute('data-command');
            const val = button.getAttribute('data-value') || null;
            document.execCommand(cmd, false, val);
        });
    });

    // Chèn mẫu nhanh
    const btnTmplPurpose = document.getElementById('btn-tmpl-purpose');
    const btnTmplTarget = document.getElementById('btn-tmpl-target');
    const btnTmplSteps = document.getElementById('btn-tmpl-steps');

    if (btnTmplPurpose) {
        btnTmplPurpose.addEventListener('click', () => {
            editor.focus();
            document.execCommand('insertHTML', false, '<h4>Công dụng & Giá trị mang lại</h4><p>Mô tả chi tiết giải pháp giúp người dùng giải quyết vấn đề giao tiếp như thế nào...</p>');
        });
    }

    if (btnTmplTarget) {
        btnTmplTarget.addEventListener('click', () => {
            editor.focus();
            document.execCommand('insertHTML', false, '<h4>Đối tượng phù hợp</h4><p>Người khiếm thanh, trẻ chậm phát triển ngôn ngữ, người cao tuổi, người chăm sóc...</p>');
        });
    }

    if (btnTmplSteps) {
        btnTmplSteps.addEventListener('click', () => {
            editor.focus();
            document.execCommand('insertHTML', false, '<h4>Quy trình 4 bước sử dụng</h4><ol><li>Mở ứng dụng và chọn tính năng tương ứng.</li><li>Thao tác nói hoặc gõ nội dung cần truyền đạt.</li><li>Hệ thống AI xử lý và phát âm thanh đã được chuẩn hóa.</li><li>Lưu lại hoặc chia sẻ cho người đối diện.</li></ol>');
        });
    }

    // Submit form -> Đồng bộ nội dung editor vào textarea
    const form = document.getElementById('feature-form');
    if (form && editor && hiddenContent) {
        form.addEventListener('submit', () => {
            hiddenContent.value = editor.innerHTML;
        });
    }

    // 4. Live Search & Status Filter trong Bảng
    const searchInput = document.getElementById('tableSearch');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const tableRows = document.querySelectorAll('#featuresTable tbody tr');

    function filterTable() {
        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
        const activeFilterBtn = document.querySelector('.filter-btn.active');
        const currentFilter = activeFilterBtn ? activeFilterBtn.getAttribute('data-filter') : 'all';

        tableRows.forEach(row => {
            const searchData = row.getAttribute('data-search') || '';
            const status = row.getAttribute('data-status') || '';
            
            const matchesQuery = query === '' || searchData.includes(query);
            const matchesFilter = currentFilter === 'all' || status === currentFilter;

            if (matchesQuery && matchesFilter) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterTable);
    }

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            filterButtons.forEach(b => {
                b.classList.remove('active');
                if (b.classList.contains('btn-success')) b.className = 'btn btn-sm btn-outline-success filter-btn';
                else b.className = 'btn btn-sm btn-outline-secondary filter-btn';
            });
            btn.classList.add('active');
            if (btn.getAttribute('data-filter') === 'active') btn.className = 'btn btn-sm btn-success filter-btn active';
            else btn.className = 'btn btn-sm btn-secondary filter-btn active';

            filterTable();
        });
    });

    // 5. Preview Modal
    const previewModal = document.getElementById('previewModal');
    const modalClose = document.getElementById('modal-close');
    const modalTitle = document.getElementById('modal-title');
    const modalIcon = document.getElementById('modal-icon');
    const modalBadge = document.getElementById('modal-badge');
    const modalSummary = document.getElementById('modal-summary');
    const modalContent = document.getElementById('modal-content');
    const modalVideoBox = document.getElementById('modal-video-box');
    const modalVideoName = document.getElementById('modal-video-name');

    document.querySelectorAll('.btn-preview').forEach(btn => {
        btn.addEventListener('click', () => {
            const title = btn.getAttribute('data-title');
            const icon = btn.getAttribute('data-icon');
            const badge = btn.getAttribute('data-badge');
            const summary = btn.getAttribute('data-summary');
            const video = btn.getAttribute('data-video');
            const content = btn.getAttribute('data-content');

            if (modalTitle) modalTitle.textContent = title;
            if (modalIcon) modalIcon.className = 'fa-solid ' + icon;
            if (modalBadge) {
                modalBadge.textContent = badge || 'Tính năng AI';
                modalBadge.style.display = badge ? 'inline-block' : 'none';
            }
            if (modalSummary) modalSummary.textContent = summary || 'Không có mô tả tóm tắt.';
            if (modalContent) modalContent.innerHTML = content || '<em>Chưa có nội dung chi tiết.</em>';
            
            if (modalVideoBox && modalVideoName) {
                if (video) {
                    modalVideoName.textContent = video;
                    modalVideoBox.style.display = 'block';
                } else {
                    modalVideoBox.style.display = 'none';
                }
            }

            if (previewModal) previewModal.classList.add('open');
        });
    });

    if (modalClose && previewModal) {
        modalClose.addEventListener('click', () => {
            previewModal.classList.remove('open');
        });
        previewModal.addEventListener('click', (e) => {
            if (e.target === previewModal) previewModal.classList.remove('open');
        });
    }
});
</script>

</body>
</html>
