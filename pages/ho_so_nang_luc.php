<?php
/**
 * Trang: Hồ sơ năng lực - Thanh Âm
 * Dùng chung header.php / footer.php đã có của site.
 * CSS riêng cho trang này nằm ở file assets/css/style_HoSoNangLuc.css
 * (tách riêng, KHÔNG gộp vào style.css gốc), nạp qua thẻ <link> bên dưới.
 * Mọi selector trong file CSS đó đều nằm trong namespace .hsnl để không
 * đụng vào style.css gốc.
 */
require_once __DIR__ . '/../includes/header.php';
?>

<link rel="stylesheet" href="/ThanhAM/assets/css/style_HoSoNangLuc.css">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&amp;family=Sora:wght@600;700;800&amp;display=swap"
    rel="stylesheet">

<main class="hsnl">

    <!-- ============ HERO ============ -->
    <section class="hsnl-hero">
        <div class="hsnl-wrap hsnl-hero-inner">
            <div class="hsnl-eyebrow">
                <span class="hsnl-wave"><span style="height:8px"></span><span style="height:16px"></span><span
                        style="height:10px"></span><span style="height:20px"></span><span
                        style="height:6px"></span></span>
                Hồ sơ năng lực · 2026
            </div>
            <h1>Thanh Âm — Trợ lý giao tiếp cá nhân ứng dụng AI</h1>
            <div class="hsnl-tagline">Trao tiếng nói – Chạm trái tim</div>
            <p class="hsnl-lead">Thanh Âm được hình thành từ một vấn đề rất thực tế: có những người có rất nhiều điều
                muốn nói nhưng lại gặp khó khăn để nói ra. Chúng tôi xây dựng một giải pháp hỗ trợ giao tiếp toàn diện,
                giúp người dùng nhập nội dung, diễn đạt, phát giọng, tiếp nhận thông tin và chủ động tương tác trong đời
                sống hằng ngày.</p>
            <div class="hsnl-hero-quote">"Thanh Âm không nói thay con người. Thanh Âm giúp con người có cơ hội được lên
                tiếng."</div>
        </div>
        <div class="hsnl-facts hsnl-wrap" style="max-width:1180px;margin:0 auto;padding-left:0;padding-right:0;">
            <div class="hsnl-fact"><b>26/06/2025</b><span>Ngày thành lập</span></div>
            <div class="hsnl-fact"><b>06 thành viên</b><span>Đội ngũ sáng lập</span></div>
            <div class="hsnl-fact"><b>04 cố vấn</b><span>Chuyên môn đồng hành</span></div>
            <div class="hsnl-fact"><b>50+ em</b><span>Đã được hỗ trợ thực tế</span></div>
        </div>
    </section>

    <!-- ============ SUB NAV ============ -->
    <nav class="hsnl-subnav">
        <div class="hsnl-subnav-inner">
            <a href="#gioi-thieu">1. Giới thiệu</a>
            <a href="#san-pham">2. Sản phẩm &amp; dịch vụ</a>
            <a href="#thanh-tich">3. Thành tích &amp; dấu ấn</a>
            <a href="#thong-diep">4. Thông điệp thương hiệu</a>
        </div>
    </nav>

    <!-- ============ 1. GIỚI THIỆU ============ -->
    <section class="hsnl-section" id="gioi-thieu">
        <div class="hsnl-wrap">
            <div class="hsnl-kicker"><span class="hsnl-num">1</span><span>Giới thiệu về Thanh Âm</span></div>
            <h2>Từ một nhu cầu thật, đến một giải pháp toàn diện</h2>
            <p class="hsnl-intro">Thanh Âm được thành lập ngày <b>26/06/2025</b>, hoạt động trong lĩnh vực Công nghệ
                &amp; Trí tuệ nhân tạo (AI), với định hướng phát triển các giải pháp công nghệ hỗ trợ giao tiếp toàn
                diện. Thanh Âm hiện được xây dựng và phát triển bởi đội ngũ 06 thành viên, cùng Ban cố vấn chuyên môn
                trong các lĩnh vực phần mềm – phần cứng, tài chính, công nghệ AI và đối tác đối ngoại — giúp dự án tiếp
                cận theo hướng đa ngành, kết hợp công nghệ, sản phẩm, kinh doanh, truyền thông và giá trị xã hội.</p>

            <div class="hsnl-sub">Đội ngũ sáng lập</div>
            <div class="hsnl-grid-founders">
                <div class="hsnl-founder">
                    <h4>Lưu Gia Hân</h4>
                    <div class="hsnl-role">Đồng sáng lập &amp; Đại diện Dự án · Phụ trách Chiến lược, Kinh doanh, Đối
                        tác &amp; Truyền thông</div>
                    <div class="hsnl-role-en">Co-Founder &amp; Project Representative — Strategy, Business, Partnership
                        &amp; Communications</div>
                    <ul>
                        <li>Đại diện dự án Thanh Âm; định hướng chiến lược, mục tiêu và kế hoạch phát triển</li>
                        <li>Xây dựng kế hoạch kinh doanh và phát triển thị trường</li>
                        <li>Phát triển quan hệ đối tác và hoạt động đối ngoại; kết nối trường học, tổ chức, doanh nghiệp
                        </li>
                        <li>Định hướng và triển khai truyền thông, xây dựng thông điệp, nội dung và hình ảnh thương hiệu
                        </li>
                    </ul>
                </div>
                <div class="hsnl-founder">
                    <h4>Nguyễn Văn Trực</h4>
                    <div class="hsnl-role">Đồng sáng lập &amp; Trưởng ban Công nghệ · Phát triển Cốt lõi &amp; Tích hợp
                        Hệ thống</div>
                    <div class="hsnl-role-en">Co-Founder &amp; Technical Lead — Core Development &amp; System
                        Integration</div>
                    <ul>
                        <li>Chịu trách nhiệm chính về định hướng công nghệ và phát triển kỹ thuật</li>
                        <li>Xây dựng kiến trúc hệ thống và giải pháp công nghệ</li>
                        <li>Trực tiếp phát triển các thành phần và tính năng cốt lõi</li>
                        <li>Kiểm soát chất lượng, tiến độ, khả năng tích hợp; bảo đảm hệ thống ổn định và vận hành tốt
                        </li>
                    </ul>
                </div>
                <div class="hsnl-founder">
                    <h4>Đỗ Chí Duy</h4>
                    <div class="hsnl-role">Đồng sáng lập &amp; Kỹ sư Phần mềm · Phát triển Phần mềm &amp; Tính năng
                    </div>
                    <div class="hsnl-role-en">Co-Founder &amp; Software Engineer — Software &amp; Feature Development
                    </div>
                    <ul>
                        <li>Phát triển các thành phần phần mềm và module chức năng</li>
                        <li>Xây dựng và triển khai các tính năng theo yêu cầu sản phẩm</li>
                        <li>Phát triển logic xử lý, dữ liệu và các thành phần kỹ thuật</li>
                        <li>Kiểm thử, xử lý lỗi, tối ưu hiệu năng; phối hợp tích hợp module</li>
                    </ul>
                </div>
                <div class="hsnl-founder">
                    <h4>Phạm Thế Ngọc</h4>
                    <div class="hsnl-role">Đồng sáng lập &amp; Kỹ sư Phần mềm · Phát triển Phần mềm &amp; Tính năng
                    </div>
                    <div class="hsnl-role-en">Co-Founder &amp; Software Engineer — Software &amp; Feature Development
                    </div>
                    <ul>
                        <li>Phát triển các thành phần phần mềm và module chức năng</li>
                        <li>Xây dựng và triển khai các tính năng theo yêu cầu sản phẩm</li>
                        <li>Tham gia phát triển logic xử lý, dữ liệu và các thành phần kỹ thuật</li>
                        <li>Kiểm thử, xử lý lỗi, tối ưu hiệu năng; bảo đảm tính năng ổn định, sẵn sàng vận hành</li>
                    </ul>
                </div>
                <div class="hsnl-founder">
                    <h4>Nguyễn Hoàng Anh</h4>
                    <div class="hsnl-role">Đồng sáng lập &amp; Trưởng ban Sáng tạo / Người phát ngôn</div>
                    <div class="hsnl-role-en">Co-Founder &amp; Creative Lead / Spokesperson</div>
                    <ul>
                        <li>Phụ trách định hướng sáng tạo, concept, hình ảnh và nhận diện thương hiệu</li>
                        <li>Thiết kế UI/UX, slide pitching và ấn phẩm</li>
                        <li>Đảm nhiệm đại diện phát ngôn, truyền tải câu chuyện, giá trị và sứ mệnh của Thanh Âm</li>
                    </ul>
                </div>
                <div class="hsnl-founder">
                    <h4>Nguyễn Thanh Quốc Bảo</h4>
                    <div class="hsnl-role">Đồng sáng lập &amp; Phụ trách Tài chính &amp; Tài liệu</div>
                    <div class="hsnl-role-en">Co-Founder — Finance &amp; Documentation</div>
                    <ul>
                        <li>Phụ trách quản lý tài chính; lập kế hoạch và theo dõi ngân sách, thu – chi</li>
                        <li>Quản lý chứng từ và số liệu tài chính</li>
                        <li>Hỗ trợ xây dựng, hoàn thiện và quản lý hồ sơ, tài liệu, biểu mẫu phục vụ dự án</li>
                    </ul>
                </div>
            </div>

            <div class="hsnl-sub">Ban cố vấn</div>
            <div class="hsnl-grid-advisors">
                <div class="hsnl-advisor">
                    <span class="hsnl-field">Phần mềm &amp; Phần cứng</span>
                    <h4>ThS. Lê Phương Vũ Phong</h4>
                    <p>Tư vấn định hướng công nghệ phần mềm, phần cứng và khả năng triển khai các giải pháp kỹ thuật.
                    </p>
                </div>
                <div class="hsnl-advisor">
                    <span class="hsnl-field">Tài chính</span>
                    <h4>ThS. Phạm Trần Ngọc Hương</h4>
                    <p>Tư vấn về tài chính, ngân sách, quản lý nguồn lực và định hướng phát triển bền vững về tài chính.
                    </p>
                </div>
                <div class="hsnl-advisor">
                    <span class="hsnl-field">Công nghệ &amp; AI</span>
                    <h4>ThS. Huỳnh Thị Nhật Hằng</h4>
                    <p>Tư vấn chuyên môn về công nghệ, AI, lập trình và định hướng phát triển kỹ thuật của sản phẩm.</p>
                </div>
                <div class="hsnl-advisor">
                    <span class="hsnl-field">Đối tác &amp; Kết nối</span>
                    <h4>ThS. Phan Thị Bích Trâm</h4>
                    <p>Tư vấn về phát triển quan hệ đối tác, hoạt động đối ngoại và kết nối với các tổ chức, đơn vị liên
                        quan.</p>
                </div>
            </div>

            <div class="hsnl-mv" style="margin-top:46px;">
                <div class="hsnl-mv-card">
                    <h3>Tầm nhìn</h3>
                    <p>Thanh Âm hướng tới trở thành nền tảng công nghệ hỗ trợ giao tiếp toàn diện, ứng dụng trí tuệ nhân
                        tạo để phá bỏ những rào cản đang ngăn cách con người với việc thể hiện tiếng nói, cảm xúc và bản
                        sắc của chính mình.</p>
                    <p>Hướng đến một tương lai nơi công nghệ không thay thế tiếng nói của con người, mà trở thành chiếc
                        cầu nối đưa những tiếng nói từng bị bỏ lại phía sau đến gần hơn với cộng đồng.</p>
                    <blockquote>"Một tương lai nơi không ai bị bỏ lại phía sau bởi rào cản giao tiếp, nơi công nghệ mở
                        đường để mọi tiếng nói được cất lên và được lắng nghe."</blockquote>
                </div>
                <div class="hsnl-mv-card">
                    <h3>Sứ mệnh</h3>
                    <p>Dùng công nghệ để trao thêm cơ hội giao tiếp, giúp mỗi người có thể thể hiện suy nghĩ, cảm xúc và
                        nhu cầu của mình một cách chủ động, tự nhiên và phù hợp với bản thân.</p>
                    <p>Đặc biệt hướng tới những người gặp hạn chế về khả năng giao tiếp, xây dựng các giải pháp có thể
                        triển khai trong gia đình, trường học, trung tâm hỗ trợ, tổ chức xã hội và doanh nghiệp — góp
                        phần tạo ra một xã hội bao trùm, nơi mọi người đều được giao tiếp, thấu hiểu và kết nối.</p>
                </div>
            </div>

            <div class="hsnl-sub">Giá trị cốt lõi</div>
            <div class="hsnl-grid-values">
                <div class="hsnl-value">
                    <div class="hsnl-vnum">01</div>
                    <h4>Nhân văn</h4>
                    <p>Lấy con người làm trung tâm. Mọi sản phẩm bắt đầu từ một nhu cầu thật và một câu chuyện thật.</p>
                </div>
                <div class="hsnl-value">
                    <div class="hsnl-vnum">02</div>
                    <h4>Đồng cảm</h4>
                    <p>Lắng nghe bằng trái tim — thấu hiểu những khó khăn phía sau một hành động giao tiếp.</p>
                </div>
                <div class="hsnl-value">
                    <div class="hsnl-vnum">03</div>
                    <h4>Sáng tạo</h4>
                    <p>Biến giới hạn thành cơ hội, ứng dụng AI để mở rộng khả năng giao tiếp của con người.</p>
                </div>
                <div class="hsnl-value">
                    <div class="hsnl-vnum">04</div>
                    <h4>Kết nối</h4>
                    <p>Lan tỏa giá trị tốt đẹp; xây cầu nối giữa người dùng, gia đình, trường học, doanh nghiệp và cộng
                        đồng.</p>
                </div>
                <div class="hsnl-value">
                    <div class="hsnl-vnum">05</div>
                    <h4>Phát triển bền vững</h4>
                    <p>Công nghệ song hành trách nhiệm xã hội, hướng tới giá trị lâu dài và khả năng tiếp cận rộng rãi.
                    </p>
                </div>
            </div>

            <div class="hsnl-sub">Chính sách chất lượng</div>
            <div class="hsnl-grid-quality">
                <div class="hsnl-quality-item"><span class="hsnl-check">✓</span>
                    <div><b>Lấy người dùng làm trung tâm</b><span>Mọi tính năng xây dựng dựa trên nhu cầu và trải nghiệm
                            giao tiếp thực tế.</span></div>
                </div>
                <div class="hsnl-quality-item"><span class="hsnl-check">✓</span>
                    <div><b>Đơn giản và dễ tiếp cận</b><span>Giảm tối đa thao tác không cần thiết, đặc biệt khi người
                            dùng cần phản hồi nhanh.</span></div>
                </div>
                <div class="hsnl-quality-item"><span class="hsnl-check">✓</span>
                    <div><b>Cá nhân hóa</b><span>Hệ thống hướng tới khả năng thích ứng theo từng người dùng.</span>
                    </div>
                </div>
                <div class="hsnl-quality-item"><span class="hsnl-check">✓</span>
                    <div><b>Ổn định &amp; liên tục cải tiến</b><span>Sản phẩm được kiểm thử, đánh giá và cải tiến dựa
                            trên phản hồi thực tế.</span></div>
                </div>
                <div class="hsnl-quality-item"><span class="hsnl-check">✓</span>
                    <div><b>An toàn và có trách nhiệm</b><span>Chú trọng bảo vệ dữ liệu người dùng và sử dụng AI có
                            trách nhiệm.</span></div>
                </div>
                <div class="hsnl-quality-item"><span class="hsnl-check">✓</span>
                    <div><b>Đo lường tác động</b><span>Đo lường khả năng cải thiện trải nghiệm và mức độ chủ động giao
                            tiếp của người thụ hưởng.</span></div>
                </div>
            </div>

            <figure class="hsnl-figure">
                <img src="/ThanhAM/uploads/images/doi-ngu-mai-am-nhan-ai.png"
                    alt="Thành viên dự án Thanh Âm và các em tại Mái ấm nhân ái" loading="lazy">
                <figcaption>Hình 1 — Thành viên dự án và các em tại Mái ấm nhân ái</figcaption>
            </figure>
        </div>
    </section>

    <!-- ============ 2. SẢN PHẨM & DỊCH VỤ ============ -->
    <section class="hsnl-section alt" id="san-pham">
        <div class="hsnl-wrap">
            <div class="hsnl-kicker"><span class="hsnl-num">2</span><span>Sản phẩm &amp; dịch vụ</span></div>
            <h2>Một hệ giải pháp, nhiều điểm chạm giao tiếp</h2>
            <p class="hsnl-intro">Thanh Âm phát triển theo mô hình B2C kết hợp B2B và B2B2C, trong đó người dùng cuối
                vẫn luôn là trung tâm của sản phẩm.</p>

            <div class="hsnl-sub">Nhóm khách hàng</div>
            <div class="hsnl-grid-groups">
                <div class="hsnl-group">
                    <span class="hsnl-gtag">Nhóm 1</span>
                    <h4>Người dùng &amp; người thụ hưởng trực tiếp</h4>
                    <ul>
                        <li>Người không thể nói hoặc gặp hạn chế về khả năng nói</li>
                        <li>Người nói khó, nói không rõ hoặc gặp trở ngại khi diễn đạt</li>
                        <li>Người khiếm thính hoặc khó tiếp nhận, xử lý, tương tác qua lời nói</li>
                        <li>Người cần hỗ trợ chuyển đổi giữa lời nói và văn bản</li>
                        <li>Người lớn tuổi, bệnh nhân sau bệnh gặp khó khăn giao tiếp</li>
                        <li>Trẻ chậm phát triển ngôn ngữ</li>
                        <li>Gia đình, người chăm sóc và người hỗ trợ</li>
                    </ul>
                </div>
                <div class="hsnl-group">
                    <span class="hsnl-gtag">Nhóm 2</span>
                    <h4>Tổ chức triển khai</h4>
                    <ul>
                        <li>Trường học</li>
                        <li>Trung tâm giáo dục đặc biệt</li>
                        <li>Trung tâm hỗ trợ người khuyết tật</li>
                        <li>Cơ sở chăm sóc và phục hồi chức năng</li>
                        <li>Tổ chức xã hội và tổ chức cộng đồng</li>
                    </ul>
                </div>
                <div class="hsnl-group">
                    <span class="hsnl-gtag">Nhóm 3</span>
                    <h4>Đối tác đồng hành</h4>
                    <ul>
                        <li>Doanh nghiệp thực hiện CSR/ESG</li>
                        <li>Quỹ xã hội và tổ chức phi lợi nhuận</li>
                        <li>Đơn vị công nghệ</li>
                        <li>Chuyên gia giáo dục, ngôn ngữ, giao tiếp, âm ngữ trị liệu, tâm lý – giáo dục và AI</li>
                    </ul>
                </div>
            </div>

            <div class="hsnl-sub">Hệ thống sản phẩm &amp; dịch vụ</div>
            <div class="hsnl-grid-system">
                <div class="hsnl-system-card">
                    <div class="hsnl-vnum">01</div>
                    <h4>Giải pháp Thanh Âm cá nhân</h4>
                    <p>Giải pháp hỗ trợ giao tiếp dành cho cá nhân: nhập nội dung, gợi ý từ &amp; câu, chỉnh sửa, phát
                        giọng, cá nhân hóa giọng đọc, giao tiếp nhanh 1 chạm, thư viện câu, AI hỗ trợ trả lời, SOS.</p>
                </div>
                <div class="hsnl-system-card">
                    <div class="hsnl-vnum">02</div>
                    <h4>Giải pháp cho trường học &amp; trung tâm</h4>
                    <p>Giúp trường học, trung tâm và đơn vị hỗ trợ triển khai Thanh Âm cho nhiều người dùng qua một hệ
                        thống, thay vì triển khai riêng lẻ.</p>
                </div>
                <div class="hsnl-system-card">
                    <div class="hsnl-vnum">03</div>
                    <h4>Chương trình hỗ trợ cộng đồng</h4>
                    <ul>
                        <li>Tài trợ tài khoản / thiết bị</li>
                        <li>Triển khai tại trường học / trung tâm</li>
                        <li>Chương trình nâng cao nhận thức</li>
                        <li>Chương trình CSR thiết kế riêng</li>
                    </ul>
                </div>
                <div class="hsnl-system-card">
                    <div class="hsnl-vnum">04</div>
                    <h4>Giải pháp B2B &amp; API</h4>
                    <p>Định hướng dài hạn: cung cấp công nghệ cho doanh nghiệp và đối tác, tích hợp năng lực AI, giọng
                        nói và hỗ trợ giao tiếp vào hệ thống khác.</p>
                </div>
            </div>

            <div class="hsnl-sub">Sản phẩm tiêu biểu — THANH ÂM</div>
            <p style="font-size:14.5px;line-height:1.75;color:var(--tam-sub);max-width:760px;margin-bottom:20px;">Giải
                pháp công nghệ hỗ trợ giao tiếp dành cho những người gặp khó khăn trong khả năng nói — không dừng lại ở
                việc "nhập văn bản → phát giọng", mà hướng tới một quy trình giao tiếp trọn vẹn:</p>
            <div class="hsnl-flow">
                <div class="hsnl-flow-step">Muốn nói</div><span class="hsnl-flow-arrow">→</span>
                <div class="hsnl-flow-step">Nhập nội dung</div><span class="hsnl-flow-arrow">→</span>
                <div class="hsnl-flow-step">AI hỗ trợ</div><span class="hsnl-flow-arrow">→</span>
                <div class="hsnl-flow-step">Chỉnh sửa</div><span class="hsnl-flow-arrow">→</span>
                <div class="hsnl-flow-step">Chọn nhanh</div><span class="hsnl-flow-arrow">→</span>
                <div class="hsnl-flow-step">Phát giọng</div><span class="hsnl-flow-arrow">→</span>
                <div class="hsnl-flow-step">Tiếp tục giao tiếp</div><span class="hsnl-flow-arrow">→</span>
                <div class="hsnl-flow-step" style="background:var(--tam-tint2);color:var(--tam-red);">SOS khi cần</div>
            </div>

            <div class="hsnl-grid-features" style="margin-top:24px;">
                <div class="hsnl-feature">
                    <div class="hsnl-fico">01</div>
                    <h4>Phát giọng nói</h4>
                    <p>Chuyển nội dung người dùng nhập thành giọng nói để người đối diện nghe và hiểu.</p>
                </div>
                <div class="hsnl-feature">
                    <div class="hsnl-fico">02</div>
                    <h4>Ghi âm &amp; hiển thị lời nói</h4>
                    <p>Chuyển lời nói của người đối diện thành văn bản để người dùng theo dõi và phản hồi.</p>
                </div>
                <div class="hsnl-feature">
                    <div class="hsnl-fico">03</div>
                    <h4>Cá nhân hóa giọng đọc</h4>
                    <p>Hướng tới khả năng tạo trải nghiệm giọng nói phù hợp với từng người.</p>
                </div>
                <div class="hsnl-feature">
                    <div class="hsnl-fico">04</div>
                    <h4>AI gợi ý trả lời</h4>
                    <p>Phân tích nội dung và ngữ cảnh để đề xuất câu trả lời phù hợp.</p>
                </div>
                <div class="hsnl-feature">
                    <div class="hsnl-fico">05</div>
                    <h4>1 chạm — giao tiếp nhanh</h4>
                    <p>Truy cập nhanh những câu giao tiếp thường xuyên sử dụng.</p>
                </div>
                <div class="hsnl-feature">
                    <div class="hsnl-fico">06</div>
                    <h4>Nhập liệu thông minh</h4>
                    <p>Hỗ trợ sửa chính tả, nhận diện lỗi gõ, viết tắt và cách diễn đạt phổ biến.</p>
                </div>
                <div class="hsnl-feature">
                    <div class="hsnl-fico">07</div>
                    <h4>SOS</h4>
                    <p>Kích hoạt nhanh lời cầu cứu và gửi định vị trong tình huống cần trợ giúp.</p>
                </div>
                <div class="hsnl-feature">
                    <div class="hsnl-fico">08</div>
                    <h4>Thư viện câu giao tiếp</h4>
                    <p>Cho phép mỗi người xây dựng bộ câu giao tiếp phù hợp với cuộc sống của mình.</p>
                </div>
                <div class="hsnl-feature">
                    <div class="hsnl-fico">09</div>
                    <h4>AI học thói quen sử dụng</h4>
                    <p>Ghi nhận cách người dùng thường dùng từ, cụm từ, câu để cá nhân hóa trải nghiệm.</p>
                </div>
            </div>

            <div class="hsnl-sub">Công nghệ</div>
            <div class="hsnl-grid-tech">
                <div class="hsnl-tech"><b>Text-to-Speech (TTS)</b><span>Chuyển nội dung văn bản thành giọng nói.</span>
                </div>
                <div class="hsnl-tech"><b>Speech-to-Text (STT)</b><span>Chuyển lời nói thành văn bản.</span></div>
                <div class="hsnl-tech"><b>AI xử lý ngôn ngữ</b><span>Hỗ trợ hiểu, xử lý và đề xuất nội dung giao
                        tiếp.</span></div>
                <div class="hsnl-tech"><b>AI gợi ý trả lời</b><span>Hỗ trợ người dùng phản hồi phù hợp với ngữ
                        cảnh.</span></div>
                <div class="hsnl-tech"><b>Cá nhân hóa giọng nói</b><span>Hướng tới trải nghiệm giọng nói phù hợp từng
                        người dùng.</span></div>
                <div class="hsnl-tech"><b>Giao tiếp đa phương thức</b><span>Kết hợp văn bản, giọng nói và các phương
                        thức hỗ trợ trực quan.</span></div>
            </div>
            <div class="hsnl-tech-quote">"Công nghệ phải bắt đầu từ con người và quay trở lại phục vụ con người."</div>

            <div class="hsnl-sub">Hệ sinh thái Thanh Âm</div>
            <p style="font-size:14.5px;line-height:1.75;color:var(--tam-sub);max-width:760px;margin-bottom:22px;">Thanh
                Âm không định vị mình đơn thuần là một ứng dụng, mà hướng đến xây dựng một hệ sinh thái công nghệ vì
                giao tiếp hòa nhập — kết nối người yếu thế với gia đình, nhà trường, tổ chức xã hội, doanh nghiệp và
                cộng đồng.</p>
            <div class="hsnl-chain">
                <div class="hsnl-chain-step">Người dùng<small>tạo nhu cầu thực tế</small></div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step">Thanh Âm<small>phát triển giải pháp</small></div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step">Trường học / trung tâm<small>triển khai</small></div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step">Chuyên gia<small>đóng góp chuyên môn</small></div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step">Doanh nghiệp<small>cung cấp nguồn lực</small></div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step">Cộng đồng<small>mở rộng tác động</small></div>
            </div>

            <div class="hsnl-sub">Thị trường quốc tế</div>
            <p style="font-size:14.5px;line-height:1.75;color:var(--tam-sub);max-width:760px;margin-bottom:6px;">Thanh
                Âm định hướng phát triển thị trường theo lộ trình từng bước, mở rộng dần từ nền tảng trong nước ra khu
                vực.</p>
            <figure class="hsnl-figure">
                <img src="/ThanhAM/uploads/images/lo-trinh-thi-truong.png"
                    alt="Lộ trình phát triển thị trường của Thanh Âm" loading="lazy" style="background:#fff;">
                <figcaption>Hình 2 — Lộ trình phát triển của Thanh Âm</figcaption>
            </figure>
        </div>
    </section>

    <!-- ============ 3. THÀNH TÍCH & DẤU ẤN ============ -->
    <section class="hsnl-section" id="thanh-tich">
        <div class="hsnl-wrap">
            <div class="hsnl-kicker"><span class="hsnl-num">3</span><span>Thành tích &amp; dấu ấn</span></div>
            <h2>Được ghi nhận từ cuộc thi đến cộng đồng</h2>

            <div class="hsnl-sub">Giải thưởng</div>
            <div class="hsnl-grid-awards">
                <div class="hsnl-award">
                    <h4>🏆 Giải Nhất — Cuộc thi Khởi nghiệp Sáng tạo, Trường Đại học Tiền Giang</h4>
                    <p>Dấu mốc quan trọng trong hành trình phát triển của Thanh Âm, ghi nhận tiềm năng của ý tưởng và
                        định hướng khởi nghiệp đổi mới sáng tạo.</p>
                </div>
                <div class="hsnl-award m2">
                    <h4>🎗️ Giải Dự án Cộng đồng — Cuộc thi Khởi nghiệp Sáng tạo, Trường Đại học Tiền Giang</h4>
                    <p>Ghi nhận giá trị xã hội và tính cộng đồng, đặc biệt trong việc ứng dụng AI để hỗ trợ người gặp
                        khó khăn trong giao tiếp.</p>
                </div>
                <div class="hsnl-award m3">
                    <h4>🥉 Giải Ba — Cuộc thi Đổi mới Sáng tạo Công nghệ cấp Thành phố, INNOX 2026</h4>
                    <p>Ghi nhận hướng tiếp cận kết hợp giữa công nghệ, trí tuệ nhân tạo và giải quyết vấn đề xã hội của
                        Thanh Âm.</p>
                </div>
            </div>

            <div class="hsnl-sub">Truyền thông &amp; dấu ấn</div>
            <div class="hsnl-grid-media">
                <div class="hsnl-media">
                    <span class="hsnl-mtag">VTV</span>
                    <div>
                        <h4>Được truyền thông trên VTV</h4>
                        <p>Thanh Âm được giới thiệu trên Đài Truyền hình Việt Nam, góp phần lan tỏa câu chuyện về công
                            nghệ AI và định hướng hỗ trợ giao tiếp.</p>
                    </div>
                </div>
                <div class="hsnl-media">
                    <span class="hsnl-mtag">ĐT</span>
                    <div>
                        <h4>Đưa tin trên Đài PT-TH Đồng Tháp</h4>
                        <p>Ghi nhận những nỗ lực ứng dụng công nghệ để tạo ra giá trị xã hội và hỗ trợ cộng đồng.</p>
                    </div>
                </div>
            </div>

            <div class="hsnl-sub">Hợp tác &amp; tác động cộng đồng</div>
            <div class="hsnl-coop">
                <div class="hsnl-coop-text">
                    <h4>Hợp tác cùng Trường Khuyết tật Nhân Ái</h4>
                    <p>Thanh Âm đã triển khai hoạt động hợp tác, hỗ trợ tại Trường Khuyết tật Nhân Ái, góp phần đưa giải
                        pháp đến gần hơn với đối tượng thụ hưởng thực tế. Hoạt động tạo cơ hội để đội ngũ tiếp xúc với
                        nhu cầu thực tế, quan sát trải nghiệm giao tiếp và tiếp tục hoàn thiện sản phẩm theo hướng lấy
                        người dùng làm trung tâm.</p>
                </div>
                <div class="hsnl-coop-stat"><b>50+</b><span>em nhỏ đã được hỗ trợ trực tiếp</span></div>
            </div>

            <div class="hsnl-sub">Dấu ấn hành trình</div>
            <div class="hsnl-chain">
                <div class="hsnl-chain-step">Ý tưởng</div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step">Nghiên cứu vấn đề</div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step">Phát triển sản phẩm</div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step">Kiểm chứng thực tế</div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step">Mở rộng sản phẩm</div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step">B2B / API</div>
                <div class="hsnl-chain-arrow">→</div>
                <div class="hsnl-chain-step" style="background:var(--tam-tint2);color:var(--tam-red);">Thị trường Đông
                    Nam Á</div>
            </div>

            <div class="hsnl-grid-figures2">
                <figure class="hsnl-figure" style="margin-top:0;">
                    <img src="/ThanhAM/uploads/images/giai-nhat-dai-hoc-tien-giang.png"
                        alt="Đội ngũ Thanh Âm nhận Giải Nhất tại Trường Đại học Tiền Giang" loading="lazy">
                    <figcaption>Hình 3 — Dự án đạt Giải Nhất, Cuộc thi Khởi nghiệp tại Trường Đại học Tiền Giang
                    </figcaption>
                </figure>
                <figure class="hsnl-figure" style="margin-top:0;">
                    <img src="/ThanhAM/uploads/images/giai-ba-innox-2026.png"
                        alt="Đội ngũ Thanh Âm nhận Giải Ba INNOX 2026" loading="lazy">
                    <figcaption>Hình 4 — Dự án đạt Giải Ba, Cuộc thi Đổi mới Sáng tạo Công nghệ cấp Thành phố INNOX 2026
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>

    <!-- ============ 4. THÔNG ĐIỆP THƯƠNG HIỆU ============ -->
    <section class="hsnl-brand" id="thong-diep">
        <div class="hsnl-wrap hsnl-brand-inner">
            <span class="hsnl-wave hsnl-wave-lg"><span style="height:10px"></span><span style="height:22px"></span><span
                    style="height:14px"></span><span style="height:26px"></span><span style="height:8px"></span><span
                    style="height:18px"></span></span>
            <div class="hsnl-brand-word">THANH ÂM</div>
            <div class="hsnl-brand-tag">Trao tiếng nói – Chạm trái tim</div>
            <blockquote>"Có những người không thiếu điều muốn nói. Họ chỉ thiếu một công cụ để nói ra." Thanh Âm được
                tạo ra để trở thành công cụ đó — không thay thế con người, không nói thay con người, mà trao thêm khả
                năng để mỗi người được chủ động thể hiện điều mình muốn nói.</blockquote>
            <p style="font-size:14.5px;color:rgba(255,255,255,.8);line-height:1.75;margin-bottom:24px;">Từ một người
                dùng, đến một gia đình. Từ một lớp học, đến một trường học. Từ một doanh nghiệp, đến một chương trình
                cộng đồng — Thanh Âm mong muốn biến công nghệ thành một cây cầu để những tiếng nói từng bị bỏ lại phía
                sau có thể được cất lên, được lắng nghe và được kết nối với thế giới.</p>
            <div class="hsnl-motto">"Không để ai bị bỏ lại phía sau trong chuyển đổi số"</div>
            <a href="/ThanhAM/pages/danh_sach_tai_tro.php" class="hsnl-cta">Đồng hành cùng Thanh Âm</a>
        </div>
    </section>

</main>

<?php
include '../includes/footer.php';
?>