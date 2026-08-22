<?php
include '../includes/header.php';
?>

<link rel="stylesheet" href="/ThanhAM/assets/css/style_DSTT.css">

<main class="sponsors-page">
    <section class="sponsors-hero">
        <h1>Danh sách tài trợ/đồng hành</h1>
        <p>Tri ân những cá nhân và tổ chức đã cùng Thanh Âm kiến tạo giá trị, mang lại<br class="sponsors-desktop-break"> tiếng nói cho cộng đồng yếu thế.</p>
    </section>

    <section class="sponsor-directory" aria-label="Danh sách nhà tài trợ">
        <div class="sponsor-search-wrap">
            <span aria-hidden="true">⌕</span>
            <input type="search" placeholder="Tìm kiếm theo Tên nhà tài trợ..." aria-label="Tìm kiếm nhà tài trợ">
            <small>* Hỗ trợ tìm kiếm, không áp dụng với nội dung đã ẩn.</small>
        </div>

        <div class="sponsor-featured">
            <article class="sponsor-image-card">
                <div class="sponsor-image-placeholder">
                    <span>ẢNH HOẠT ĐỘNG</span>
                    <strong>Thanh Âm</strong>
                </div>
                <div class="sponsor-featured-caption">
                    <span>Đồng hành Chiến lược</span>
                    <h2>Tập đoàn Công nghệ ABC</h2>
                    <p>Trợ lực hệ thống thiết bị hội nghị nhân năm 2024</p>
                </div>
            </article>

            <article class="sponsor-card sponsor-card-featured">
                <span class="sponsor-card-icon">♙</span>
                <h2>Nguyễn Văn A</h2>
                <p class="sponsor-type">Nhà tài trợ cá nhân</p>
                <p class="sponsor-description">Đóng góp quỹ phát triển ứng dụng di động.</p>
            </article>
        </div>

        <div class="sponsor-list">
            <article class="sponsor-card">
                <span class="sponsor-card-icon">◆</span>
                <h2>Quỹ Khuyến học XYZ</h2>
                <p class="sponsor-type">Tổ chức đồng hành</p>
                <p class="sponsor-description">Tài trợ bộ thiết bị thông minh cho trường học.</p>
            </article>

            <article class="sponsor-card">
                <span class="sponsor-card-icon">▣</span>
                <h2>Trần Thị B</h2>
                <p class="sponsor-type">Nhà tài trợ cá nhân</p>
                <p class="sponsor-description">Hỗ trợ chi phí duy trì server hàng tháng.</p>
            </article>

            <a class="sponsor-more" href="#dong-hanh">
                <span>→</span>
                <strong>Xem toàn bộ danh sách</strong>
            </a>
        </div>
    </section>

    <section class="sponsor-partnership" id="dong-hanh">
        <div class="partnership-copy">
            <span class="section-kicker">Mời hợp tác</span>
            <h2>Đồng hành cùng Thanh Âm</h2>
            <p>Mỗi sự đóng góp của bạn, dù là hiện vật hay tài chính, đều góp phần xây dựng một hệ sinh thái giao tiếp không rào cản. Hãy cùng chúng tôi lan tỏa yêu thương và công nghệ đến những người cần nó nhất.</p>

            <div class="bank-transfer">
                <div class="qr-placeholder">QR</div>
                <div>
                    <strong>THÔNG TIN CHUYỂN KHOẢN</strong>
                    <p>Ngân hàng TMCP Ngoại thương Việt Nam (VCB)</p>
                    <p>1234 5678 9999</p>
                    <p>Chủ TK: QUỸ DỰ ÁN THANH ÂM</p>
                    <small>Nội dung: [Tên bạn] - [SĐT] - Đồng hành</small>
                </div>
            </div>
        </div>

        <form class="partnership-form" action="#" method="post">
            <h2>Biểu mẫu đăng ký</h2>
            <div class="form-row">
                <label>Họ và Tên *<input type="text" name="name" placeholder="Nguyễn Văn A" required></label>
                <label>Số điện thoại *<input type="tel" name="phone" placeholder="09xxxxxxxx" required></label>
            </div>
            <label>Email liên hệ<input type="email" name="email" placeholder="email@example.com"></label>
            <label>Hình thức hỗ trợ<select name="support_type"><option>Chọn hình thức</option><option>Tài trợ tài chính</option><option>Tài trợ thiết bị</option><option>Đồng hành truyền thông</option></select></label>
            <label>Nội dung / Lời nhắn<textarea name="message" rows="4" placeholder="Chia sẻ thêm về mong muốn đồng hành của bạn..."></textarea></label>
            <button type="submit">Gửi thông tin đồng hành</button>
        </form>
    </section>
</main>

<?php
include '../includes/footer.php';
?>
