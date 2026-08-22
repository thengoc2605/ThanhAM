<?php
// Kết nối cơ sở dữ liệu (điều chỉnh đường dẫn file db.php của bạn nếu cần)
// require_once '../config/db.php'; 

// Include Header đã có sẵn
include_once '../includes/header.php'; 
?>
<main class="media-container">
    <!-- Hero Banner Trang Media -->
    <section class="media-hero">
        <h1>TRUYỀN THÔNG & TƯ LIỆU MEDIA</h1>
        <p>Hệ thống lưu trữ Video, Giải thưởng và Báo chí đưa tin về Dự án THANH ÂM</p>
    </section>

    <!-- Thanh Điều Hướng Tab (Navigation Tabs) -->
    <div class="media-tabs-wrapper">
        <div class="media-tabs">
            <button class="tab-btn active" onclick="openTab(event, 'video-section')">
                <i class="fa-solid fa-circle-play"></i> VIDEO CỦA THANH ÂM
            </button>
            <button class="tab-btn" onclick="openTab(event, 'award-section')">
                <i class="fa-solid fa-trophy"></i> GIẢI THƯỞNG
            </button>
            <button class="tab-btn" onclick="openTab(event, 'news-section')">
                <i class="fa-solid fa-newspaper"></i> TRUYỀN THÔNG
            </button>
        </div>
    </div>

    <!-- TAB 1: VIDEO CỦA THANH ÂM -->
    <section id="video-section" class="tab-content active">
        <div class="video-grid">
            <!-- Video 1: Giới thiệu -->
            <div class="video-card">
                <div class="video-info">
                    <h3>Video giới thiệu Thanh Âm</h3>
                    <p>• Thanh Âm là ai?</p>
                    <p>• Thanh Âm ra đời vì lý do gì?</p>
                    <p>• Đối tượng mà Thanh Âm hướng tới</p>
                </div>
                <div class="video-embed">
                    <video controls preload="metadata" title="Video giới thiệu Thanh Âm">
                        <!-- Thay đổi đường dẫn đến file video thực tế của bạn -->
                        <source src="/ThanhAM/uploads/Videos/Clip giới thiệu.mp4" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ xem video này.
                    </video>
                </div>
            </div>

            <!-- Video 2: Mời hợp tác -->
            <div class="video-card reverse">
                <div class="video-embed">
                    <video controls preload="metadata" title="Mời hợp tác với Thanh Âm">
                        <!-- Thay đổi đường dẫn đến file video thực tế của bạn -->
                        <source src="/ThanhAM/uploads/Videos/Clip mời hợp tác.mp4" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ xem video này.
                    </video>
                </div>
                <div class="video-info highlight">
                    <h3>Video mời hợp tác</h3>
                    <h4>VÌ SAO THANH ÂM MUỐN ĐỒNG HÀNH?</h4>
                    <p>Lan tỏa giá trị nhân văn và đồng hành tạo tác động xã hội bền vững cho cộng đồng yếu thế.</p>
                </div>
            </div>

            <!-- Video 3: Hướng dẫn cài đặt -->
            <div class="video-card">
                <div class="video-info">
                    <h3>Video hướng dẫn cài đặt</h3>
                    <p>Các bước tải, cài đặt và cấp quyền ứng dụng THANH ÂM trên thiết bị Android nhanh chóng, đơn giản.
                    </p>
                </div>
                <div class="video-embed">
                    <video controls preload="metadata" title="Video hướng dẫn cài đặt">
                        <!-- Thay đổi đường dẫn đến file video thực tế của bạn -->
                        <source src="/ThanhAM/uploads/Videos/huong_dan_cai_dat.mp4" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ xem video này.
                    </video>
                </div>
            </div>

            <!-- Video 4: Hướng dẫn sử dụng -->
            <div class="video-card reverse">
                <div class="video-embed">
                    <video controls preload="metadata" title="Video hướng dẫn sử dụng">
                        <!-- Thay đổi đường dẫn đến file video thực tế của bạn -->
                        <source src="/ThanhAM/uploads/Videos/clip sử dụng chung.mp4" type="video/mp4">
                        Trình duyệt của bạn không hỗ trợ xem video này.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Video hướng dẫn sử dụng</h3>
                    <p>Chi tiết cách thao tác các tính năng: Chuyển giọng nói, Giao tiếp 1 Chạm, Phát tin khẩn cấp
                        SOS,...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TAB 2: GIẢI THƯỞNG -->
    <section id="award-section" class="tab-content">
        <div class="awards-grid">
            <!-- Giải 1 -->
            <div class="award-card">
                <div class="award-badge">Giải Nhất</div>
                <h3>Cuộc thi Khởi nghiệp Sáng tạo</h3>
                <span class="award-org">Trường Đại học Tiền Giang</span>
                <p>Đây là một dấu mốc quan trọng trong hành trình phát triển của Thanh Âm, ghi nhận tiềm năng của ý
                    tưởng và định hướng khởi nghiệp đổi mới sáng tạo.</p>
            </div>

            <!-- Giải 2 -->
            <div class="award-card">
                <div class="award-badge community">Giải Dự án Cộng đồng</div>
                <h3>Cuộc thi Khởi nghiệp Sáng tạo</h3>
                <span class="award-org">Trường Đại học Tiền Giang</span>
                <p>Giải thưởng ghi nhận giá trị xã hội và tính cộng đồng của Thanh Âm, đặc biệt trong việc ứng dụng công
                    nghệ và trí tuệ nhân tạo để hỗ trợ những người gặp khó khăn trong giao tiếp, góp phần thúc đẩy một
                    môi trường bao trùm, nhân văn và không để ai bị bỏ lại phía sau.</p>
            </div>

            <!-- Giải 3 -->
            <div class="award-card">
                <div class="award-badge third">Giải Ba</div>
                <h3>Cuộc thi Đổi mới Sáng tạo Công nghệ cấp Thành phố</h3>
                <span class="award-org">INNOX 2026</span>
                <p>Thành tích này là sự ghi nhận đối với hướng tiếp cận kết hợp giữa công nghệ, trí tuệ nhân tạo và giải
                    quyết vấn đề xã hội của Thanh Âm.</p>
            </div>
        </div>
    </section>

    <!-- TAB 3: TRUYỀN THÔNG -->
    <section id="news-section" class="tab-content">
        <div class="news-grid">
            <!-- Báo chí 1: VTV -->
            <div class="news-card">
                <div class="news-header">
                    <span class="news-source">VTV</span>
                    <h3>Được truyền thông trên VTV</h3>
                </div>
                <p class="news-desc">Thanh Âm được giới thiệu trên Đài Truyền hình Việt Nam (VTV), góp phần lan tỏa câu
                    chuyện về công nghệ AI và định hướng hỗ trợ giao tiếp cho những người gặp khó khăn trong giao tiếp.
                </p>
                <div class="video-embed">
                    <iframe src="https://www.youtube.com/embed/r8NzExe47Gw" title="Truyền thông VTV"
                        allowfullscreen></iframe>
                </div>
                <div class="qr-box">
                    <img src="/ThanhAM/uploads/Images/QR VTV.png" alt="QR Link YouTube VTV"
                        onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=https://youtube.com'">
                    <span>Quét mã QR dẫn tới link Youtube gốc</span>
                </div>
            </div>

            <!-- Báo chí 2: Đồng Tháp -->
            <div class="news-card">
                <div class="news-header">
                    <span class="news-source dt">THĐ T</span>
                    <h3>Được đưa tin trên Đài Phát thanh – Truyền hình Đồng Tháp</h3>
                </div>
                <p class="news-desc">Dự án Thanh Âm được giới thiệu trên Đài Phát thanh – Truyền hình Đồng Tháp, ghi
                    nhận những nỗ lực ứng dụng công nghệ để tạo ra giá trị xã hội và hỗ trợ cộng đồng.</p>
                <div class="video-embed">
                    <iframe src="https://www.youtube.com/embed/qk1BXTK_cqk" title="Truyền thông TH Đồng Tháp"
                        allowfullscreen></iframe>
                </div>
                <div class="qr-box">
                    <img src="/ThanhAM/uploads/Images/QR ĐT.png" alt="QR Link YouTube Đồng Tháp"
                        onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=https://youtube.com'">
                    <span>Quét mã QR dẫn tới link Youtube gốc</span>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// Hàm xử lý chuyển Tab
function openTab(evt, tabName) {
    let i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove("active");
    }
    tablinks = document.getElementsByClassName("tab-btn");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }
    document.getElementById(tabName).classList.add("active");
    evt.currentTarget.classList.add("active");
}
</script>

<?php 
// Include Footer đã có sẵn
include_once '../includes/footer.php'; 
?>