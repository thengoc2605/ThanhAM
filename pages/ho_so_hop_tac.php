<?php
/**
 * Trang: Hồ sơ hợp tác - Thanh Âm
 * Dùng chung header.php / footer.php đã có của site.
 * CSS riêng cho trang này nằm ở file assets/css/style_HoSoHopTac.css
 * (tách riêng, KHÔNG gộp vào style.css gốc và KHÔNG gộp vào
 * style_HoSoNangLuc.css), nạp qua thẻ <link> bên dưới.
 * Mọi selector trong file CSS đó đều nằm trong namespace .hshtac.
 */
require_once __DIR__ . '/../includes/header.php';
?>

<link rel="stylesheet" href="/ThanhAM/assets/css/style_HoSoHopTac.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&amp;family=Sora:wght@600;700;800&amp;display=swap"
    rel="stylesheet">

<main class="hshtac">

    <!-- ============ HERO ============ -->
    <section class="hshtac-hero">
        <div class="hshtac-wrap hshtac-hero-inner">
            <div class="hshtac-eyebrow">
                <span class="hshtac-wave"><span style="height:8px"></span><span style="height:16px"></span><span
                        style="height:10px"></span><span style="height:20px"></span><span
                        style="height:6px"></span></span>
                Hồ sơ hợp tác · Dành cho Doanh nghiệp tài trợ (CSR/ESG)
            </div>
            <h1>Cùng Thanh Âm tạo tác động xã hội thiết thực và đo lường được</h1>
            <div class="hshtac-tagline">Trao tiếng nói – Chạm trái tim</div>
            <p class="hshtac-lead">Thanh Âm là giải pháp công nghệ hỗ trợ giao tiếp dành cho những người gặp khó khăn
                trong giao tiếp. Doanh nghiệp đồng hành cùng Thanh Âm sẽ cùng thắp lên những tia sáng của kết nối và hy
                vọng — chuyển hóa mỗi khoản tài trợ thành hỗ trợ thiết thực cho cộng đồng cần được trợ giúp.</p>
            <div class="hshtac-hero-quote">"Thanh Âm đóng vai trò cung cấp giải pháp, hướng dẫn sử dụng, hỗ trợ kỹ
                thuật, phối hợp triển khai và ghi nhận tác động trong phạm vi hợp tác."</div>
        </div>
        <div class="hshtac-facts hshtac-wrap" style="max-width:1180px;margin:0 auto;padding-left:0;padding-right:0;">
            <div class="hshtac-fact"><b>3 mô hình</b><span>Hình thức hợp tác linh hoạt</span></div>
            <div class="hshtac-fact"><b>4 hình thức</b><span>Hỗ trợ dành cho doanh nghiệp</span></div>
            <div class="hshtac-fact"><b>3 gói tài trợ</b><span>Từ 10 triệu đến dài hạn nhiều năm</span></div>
            <div class="hshtac-fact"><b>Input–Output</b><span>Khung đo lường tác động rõ ràng</span></div>
        </div>
    </section>

    <!-- ============ SUB NAV ============ -->
    <nav class="hshtac-subnav">
        <div class="hshtac-subnav-inner">
            <a href="#gioi-thieu">1. Giới thiệu &amp; Mục tiêu</a>
            <a href="#mo-hinh">2. Mô hình &amp; Hình thức hỗ trợ</a>
            <a href="#quyen-loi">3. Quyền lợi &amp; Trách nhiệm</a>
            <a href="#tac-dong">4. Đo lường tác động</a>
            <a href="#cac-goi">5. Các gói hợp tác</a>
        </div>
    </nav>

    <!-- ============ 1. GIỚI THIỆU & MỤC TIÊU ============ -->
    <section class="hshtac-section" id="gioi-thieu">
        <div class="hshtac-wrap">
            <div class="hshtac-kicker"><span class="hshtac-num hshtac-roman">I</span><span>Giới thiệu Thanh Âm</span>
            </div>
            <h2>Giải pháp AI hỗ trợ giao tiếp cho người yếu thế</h2>
            <p class="hshtac-intro">Thanh Âm là giải pháp công nghệ hỗ trợ giao tiếp dành cho những người gặp khó khăn
                trong giao tiếp, hướng đến việc mở ra cơ hội được giao tiếp, được lắng nghe và được hòa nhập cho mỗi
                người.</p>

            <div class="hshtac-mv-card" style="max-width:820px;margin-bottom:28px;">
                <h3>Thông điệp dự án</h3>
                <p>Thanh Âm là một dự án công nghệ được xây dựng với sứ mệnh tạo ra những giải pháp giao tiếp toàn diện,
                    để mỗi người, dù gặp hạn chế về khả năng trong giao tiếp, vẫn có thể được lắng nghe, kết nối và thể
                    hiện tiếng nói của mình.</p>
            </div>

            <p style="font-size:14.5px;line-height:1.8;color:var(--tam-sub);max-width:820px;margin-bottom:14px;">Doanh
                nghiệp đồng hành cùng Thanh Âm sẽ cùng thắp lên những tia sáng của kết nối và hy vọng, mở ra cơ hội được
                giao tiếp, được lắng nghe và được hòa nhập cho những người gặp khó khăn trong giao tiếp. Từ mỗi khoản
                tài trợ, Thanh Âm chuyển hóa thành những hỗ trợ thiết thực dành cho các hoàn cảnh và cộng đồng cần được
                trợ giúp, để những tia sáng nhỏ ấy có thể lan tỏa và chạm đến nhiều cuộc đời hơn.</p>
            <p style="font-size:14.5px;line-height:1.8;color:var(--tam-sub);max-width:820px;margin-bottom:22px;">Từ mỗi
                nguồn lực, doanh nghiệp có thể lựa chọn trao hỗ trợ trực tiếp đến người hoặc đơn vị thụ hưởng, hoặc đồng
                hành duy trì giải pháp để Thanh Âm có thể tiếp tục phục vụ cộng đồng.</p>

            <div class="hshtac-quality-item" style="max-width:820px;">
                <span class="hshtac-check">i</span>
                <div><b>Vai trò của Thanh Âm</b><span>Cung cấp giải pháp, hướng dẫn sử dụng, hỗ trợ kỹ thuật, phối hợp
                        triển khai và ghi nhận tác động trong phạm vi hợp tác.</span></div>
            </div>

            <div class="hshtac-kicker" style="margin-top:52px;"><span class="hshtac-num hshtac-roman">II</span><span>Mục
                    tiêu hợp tác</span></div>
            <h2>Kết nối nguồn lực doanh nghiệp với nhu cầu thực tế của cộng đồng</h2>
            <p class="hshtac-intro">Thanh Âm hướng đến việc kết nối nguồn lực của doanh nghiệp với nhu cầu thực tế của
                cộng đồng thông qua ba mục tiêu trọng tâm:</p>

            <div class="hshtac-grid-groups">
                <div class="hshtac-group">
                    <span class="hshtac-gtag">Mục tiêu 1</span>
                    <h4>Trao cơ hội</h4>
                    <p style="font-size:13.8px;line-height:1.65;color:#3a4351;">Giúp những người gặp khó khăn trong giao
                        tiếp có thêm cơ hội để thể hiện nhu cầu, suy nghĩ và kết nối với mọi người xung quanh.</p>
                </div>
                <div class="hshtac-group">
                    <span class="hshtac-gtag">Mục tiêu 2</span>
                    <h4>Tạo tác động</h4>
                    <p style="font-size:13.8px;line-height:1.65;color:#3a4351;">Chuyển nguồn lực CSR/ESG thành những
                        hoạt động hỗ trợ cụ thể, có đối tượng hưởng lợi và kết quả có thể ghi nhận.</p>
                </div>
                <div class="hshtac-group">
                    <span class="hshtac-gtag">Mục tiêu 3</span>
                    <h4>Duy trì giá trị</h4>
                    <p style="font-size:13.8px;line-height:1.65;color:#3a4351;">Tạo thêm nguồn lực để Thanh Âm duy trì,
                        cải thiện và phát triển giải pháp, qua đó tiếp tục phục vụ cộng đồng bền vững, lâu dài.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ 2. MÔ HÌNH & HÌNH THỨC HỖ TRỢ ============ -->
    <section class="hshtac-section alt" id="mo-hinh">
        <div class="hshtac-wrap">
            <div class="hshtac-kicker"><span class="hshtac-num hshtac-roman">III</span><span>Mô hình hợp tác</span>
            </div>
            <h2>Phương thức kết nối linh hoạt giữa Doanh nghiệp và Cộng đồng</h2>
            <p class="hshtac-intro">Doanh nghiệp có thể lựa chọn hình thức hỗ trợ phù hợp với định hướng CSR/ESG và nhu
                cầu thực tế của người thụ hưởng.</p>

            <div class="hshtac-form-card">
                <h4>Hình thức 1 — Hỗ trợ trực tiếp người thụ hưởng</h4>
                <figure><img src="/ThanhAM/uploads/images/hinh-thuc-1-ho-tro-truc-tiep.png"
                        alt="Sơ đồ hình thức hỗ trợ trực tiếp người thụ hưởng" loading="lazy"></figure>
                <p>Hình thức hỗ trợ có thể bao gồm trao tặng thiết bị, tài trợ chi phí sử dụng giải pháp, hỗ trợ chi phí
                    kết nối Internet hoặc các nguồn lực cần thiết khác để người thụ hưởng có điều kiện tiếp cận và sử
                    dụng Thanh Âm.</p>
                <p>Đối với hình thức hỗ trợ trực tiếp, doanh nghiệp là bên trực tiếp trao tặng hoặc chuyển giao nguồn
                    tài trợ đến người, trường học, trung tâm hoặc đơn vị thụ hưởng theo phạm vi chương trình đã thống
                    nhất. Cách thức này giúp doanh nghiệp chủ động xác định đối tượng, hình thức và phạm vi hỗ trợ, đồng
                    thời tạo điều kiện để nguồn lực được trao đến đúng đối tượng cần hỗ trợ.</p>
                <div class="hshtac-note">Trong quá trình triển khai, Thanh Âm đóng vai trò kết nối và hỗ trợ chuyên môn:
                    cung cấp giải pháp, hướng dẫn tiếp cận và sử dụng, hỗ trợ kỹ thuật, phối hợp với doanh nghiệp và đơn
                    vị thụ hưởng, đồng thời hỗ trợ theo dõi và ghi nhận kết quả trong phạm vi hợp tác.</div>
            </div>

            <div class="hshtac-form-card">
                <h4>Hình thức 2 — Đồng hành duy trì giải pháp cộng đồng</h4>
                <figure><img src="/ThanhAM/uploads/images/hinh-thuc-2-dong-hanh-duy-tri.png"
                        alt="Sơ đồ hình thức đồng hành duy trì giải pháp cộng đồng" loading="lazy"></figure>
                <p>Nguồn lực doanh nghiệp đồng hành cùng Thanh Âm được sử dụng trong phạm vi đã thống nhất nhằm duy trì
                    hoạt động ổn định, nâng cao chất lượng giải pháp và mở rộng khả năng phục vụ cộng đồng. Tùy theo
                    hình thức và quy mô hợp tác, nguồn lực có thể được phân bổ cho các hạng mục sau:</p>
                <ol class="hshtac-numlist">
                    <li><b class="hshtac-nl-num">01</b>
                        <div><span class="hshtac-nl-title">Duy trì hệ thống và nền tảng Thanh Âm</span><span
                                class="hshtac-nl-desc">Đảm bảo nền tảng và các chức năng cốt lõi được vận hành ổn định,
                                liên tục và sẵn sàng phục vụ người dùng.</span></div>
                    </li>
                    <li><b class="hshtac-nl-num">02</b>
                        <div><span class="hshtac-nl-title">Máy chủ, cơ sở dữ liệu và hạ tầng kỹ thuật</span><span
                                class="hshtac-nl-desc">Chi phí máy chủ, lưu trữ dữ liệu, đường truyền và hạ tầng cần
                                thiết để hệ thống hoạt động ổn định, an toàn.</span></div>
                    </li>
                    <li><b class="hshtac-nl-num">03</b>
                        <div><span class="hshtac-nl-title">API, dịch vụ công nghệ và công cụ bên thứ ba</span><span
                                class="hshtac-nl-desc">Mua, duy trì và gia hạn các API, dịch vụ, phần mềm cần thiết cho
                                vận hành, tích hợp và phát triển.</span></div>
                    </li>
                    <li><b class="hshtac-nl-num">04</b>
                        <div><span class="hshtac-nl-title">Hỗ trợ kỹ thuật và hỗ trợ người sử dụng</span><span
                                class="hshtac-nl-desc">Hỗ trợ người dùng tiếp cận, sử dụng giải pháp; tiếp nhận và xử lý
                                các vấn đề kỹ thuật.</span></div>
                    </li>
                    <li><b class="hshtac-nl-num">05</b>
                        <div><span class="hshtac-nl-title">Bảo trì, sửa lỗi và nâng cấp ứng dụng</span><span
                                class="hshtac-nl-desc">Bảo trì định kỳ, khắc phục lỗi, cải thiện chức năng hiện có nhằm
                                đảm bảo trải nghiệm ổn định.</span></div>
                    </li>
                    <li><b class="hshtac-nl-num">06</b>
                        <div><span class="hshtac-nl-title">Phát triển tính năng mới</span><span
                                class="hshtac-nl-desc">Đầu tư R&amp;D các tính năng mới nâng cao khả năng hỗ trợ giao
                                tiếp, cải thiện trải nghiệm người dùng.</span></div>
                    </li>
                    <li><b class="hshtac-nl-num">07</b>
                        <div><span class="hshtac-nl-title">Cập nhật công nghệ, hiệu năng và bảo mật</span><span
                                class="hshtac-nl-desc">Tối ưu hiệu năng, tăng cường bảo mật dữ liệu, cải thiện tính ổn
                                định và khả năng mở rộng.</span></div>
                    </li>
                    <li><b class="hshtac-nl-num">08</b>
                        <div><span class="hshtac-nl-title">Triển khai các chương trình hỗ trợ cộng đồng</span><span
                                class="hshtac-nl-desc">Sử dụng cho chi phí triển khai chương trình tại trường học, trung
                                tâm, đơn vị cộng đồng phù hợp.</span></div>
                    </li>
                    <li><b class="hshtac-nl-num">09</b>
                        <div><span class="hshtac-nl-title">Theo dõi, tổng hợp và ghi nhận tác động xã hội</span><span
                                class="hshtac-nl-desc">Thu thập, tổng hợp kết quả đo lường được: số người/đơn vị hỗ trợ,
                                phạm vi triển khai, mức độ tiếp cận.</span></div>
                    </li>
                    <li><b class="hshtac-nl-num">10</b>
                        <div><span class="hshtac-nl-title">Các chi phí kỹ thuật và chuyên môn cần thiết khác</span><span
                                class="hshtac-nl-desc">Các khoản chi phí hợp lý khác phục vụ duy trì, vận hành, nâng cấp
                                và phát triển, trong phạm vi thỏa thuận.</span></div>
                    </li>
                </ol>
                <div class="hshtac-sub" style="margin-top:28px;font-size:16px;">Nguyên tắc sử dụng nguồn lực</div>
                <div class="hshtac-flow" style="margin-bottom:14px;">
                    <div class="hshtac-flow-step">Đúng mục đích</div><span class="hshtac-flow-arrow">→</span>
                    <div class="hshtac-flow-step">Đúng phạm vi</div><span class="hshtac-flow-arrow">→</span>
                    <div class="hshtac-flow-step">Có thể ghi nhận</div><span class="hshtac-flow-arrow">→</span>
                    <div class="hshtac-flow-step" style="background:var(--tam-tint2);color:var(--tam-red);">Tạo giá trị
                        lâu dài</div>
                </div>
                <p style="font-size:13.6px;color:var(--tam-sub);">Việc phân bổ cụ thể giữa các hạng mục sẽ được xác định
                    dựa trên quy mô chương trình, hình thức hợp tác, nhu cầu thực tế và thỏa thuận giữa doanh nghiệp và
                    Thanh Âm. Các số liệu và kết quả tác động chỉ được ghi nhận trong phạm vi Thanh Âm có khả năng thu
                    thập, kiểm chứng và xác nhận.</p>
            </div>

            <div class="hshtac-form-card">
                <h4>Hình thức 3 — CSR kết hợp</h4>
                <figure><img src="/ThanhAM/uploads/images/mo-hinh-hop-tac-csr.png"
                        alt="Mô hình hợp tác CSR kết hợp: phân bổ nguồn lực để tạo tác động bền vững" loading="lazy">
                </figure>
                <p>Qua mô hình này, doanh nghiệp không chỉ tạo ra tác động xã hội trực tiếp và thiết thực đến cộng đồng,
                    mà còn góp phần duy trì nền tảng, phát triển hạ tầng và mở rộng khả năng tiếp cận giải pháp Thanh
                    Âm, từ đó tạo nên giá trị bền vững và lâu dài cho người thụ hưởng.</p>
            </div>

            <div class="hshtac-kicker" style="margin-top:52px;"><span class="hshtac-num hshtac-roman">IV</span><span>Các
                    hình thức hỗ trợ</span></div>
            <h2>4 lựa chọn tài trợ linh hoạt dành cho doanh nghiệp</h2>
            <div class="hshtac-grid-system">
                <div class="hshtac-system-card">
                    <div class="hshtac-vnum">01</div>
                    <h4>Tài trợ thiết bị</h4>
                    <ul>
                        <li>Điện thoại thông minh</li>
                        <li>Chi phí kết nối Internet: Wi-Fi, 4G/5G</li>
                        <li>Thiết bị, phụ kiện phù hợp</li>
                        <li>Các điều kiện hỗ trợ khác theo nhu cầu thực tế (có thể trao trực tiếp)</li>
                    </ul>
                </div>
                <div class="hshtac-system-card">
                    <div class="hshtac-vnum">02</div>
                    <h4>Hỗ trợ duy trì &amp; vận hành</h4>
                    <p>Doanh nghiệp đồng hành với Thanh Âm thông qua việc hỗ trợ một phần chi phí cần thiết để duy trì
                        giải pháp và các hoạt động phục vụ cộng đồng.</p>
                </div>
                <div class="hshtac-system-card">
                    <div class="hshtac-vnum">03</div>
                    <h4>Hỗ trợ chương trình cộng đồng</h4>
                    <p>Tài trợ một chương trình cụ thể tại: trường học, trung tâm hỗ trợ, cộng đồng địa phương hoặc các
                        chương trình xã hội phù hợp.</p>
                </div>
                <div class="hshtac-system-card">
                    <div class="hshtac-vnum">04</div>
                    <h4>Đồng xây dựng chương trình CSR riêng</h4>
                    <p>Cùng Thanh Âm xây dựng chương trình mang dấu ấn riêng theo đối tượng, địa điểm, quy mô, ngân
                        sách, thời gian và mục tiêu tác động. Ví dụ: "[Tên doanh nghiệp] × Thanh Âm — Trao tiếng nói,
                        Chạm trái tim".</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ 3. QUYỀN LỢI & TRÁCH NHIỆM ============ -->
    <section class="hshtac-section" id="quyen-loi">
        <div class="hshtac-wrap">
            <div class="hshtac-kicker"><span class="hshtac-num hshtac-roman">V</span><span>Quyền lợi dành cho doanh
                    nghiệp tài trợ</span></div>
            <h2>Tối đa hóa giá trị thương hiệu và tác động CSR/ESG</h2>
            <div class="hshtac-grid-features">
                <div class="hshtac-feature">
                    <div class="hshtac-fico">01</div>
                    <h4>Tạo tác động xã hội cụ thể</h4>
                    <p>Góp phần hỗ trợ trực tiếp người gặp khó khăn trong giao tiếp qua tài trợ tài khoản, thiết bị, hỗ
                        trợ trung tâm/trường học hoặc duy trì giải pháp theo đúng định hướng CSR.</p>
                </div>
                <div class="hshtac-feature">
                    <div class="hshtac-fico">02</div>
                    <h4>Chương trình CSR mang dấu ấn riêng</h4>
                    <p>Xây dựng chương trình riêng mang tên doanh nghiệp hoặc chiến dịch, ví dụ "[Tên doanh nghiệp] –
                        Thắp sáng kết nối cùng Thanh Âm".</p>
                </div>
                <div class="hshtac-feature">
                    <div class="hshtac-fico">03</div>
                    <h4>Có số liệu để ghi nhận tác động</h4>
                    <p>Được cung cấp số liệu: số người/tài khoản/thiết bị được hỗ trợ, số trường học/trung tâm thụ
                        hưởng, lượt sử dụng và khảo sát mức độ hài lòng.</p>
                </div>
                <div class="hshtac-feature">
                    <div class="hshtac-fico">04</div>
                    <h4>Nhận tư liệu phục vụ CSR/ESG</h4>
                    <p>Nhận báo cáo tác động, hình ảnh, case study, câu chuyện người thụ hưởng, chứng nhận đồng hành
                        phục vụ báo cáo phát triển bền vững, mạng xã hội, truyền thông nội bộ.</p>
                </div>
                <div class="hshtac-feature">
                    <div class="hshtac-fico">05</div>
                    <h4>Quyền lợi nhận diện thương hiệu</h4>
                    <p>Hiển thị logo trên ấn phẩm, trang giới thiệu chương trình, ghi nhận tại hoạt động cộng đồng và
                        đồng thương hiệu (co-branding).</p>
                </div>
                <div class="hshtac-feature">
                    <div class="hshtac-fico">06</div>
                    <h4>Tham gia trực tiếp hoạt động cộng đồng</h4>
                    <p>Cử đại diện/nhân viên tham gia hoạt động trao tặng, tình nguyện, nâng cao nhận thức và trải
                        nghiệm giải pháp.</p>
                </div>
                <div class="hshtac-feature">
                    <div class="hshtac-fico">07</div>
                    <h4>Ghi nhận đóng góp, PR &amp; hồ sơ CSR/ESG</h4>
                    <p>Nhận chứng nhận đồng hành, hỗ trợ truyền thông PR trên các kênh dự án, được hỗ trợ xây dựng câu
                        chuyện "Doanh nghiệp tạo tác động xã hội".</p>
                </div>
            </div>

            <div class="hshtac-kicker" style="margin-top:52px;"><span
                    class="hshtac-num hshtac-roman">VI</span><span>Nghĩa vụ của doanh nghiệp tài trợ</span></div>
            <h2>10 nguyên tắc phối hợp minh bạch và hiệu quả</h2>
            <ol class="hshtac-numlist" style="max-width:820px;">
                <li><b class="hshtac-nl-num">01</b>
                    <div><span class="hshtac-nl-title">Cam kết tài trợ</span><span class="hshtac-nl-desc">Thực hiện tài
                            trợ đúng giá trị, hình thức và thời gian (gói 6 tháng, 1 năm, 3 năm hoặc theo chiến dịch).
                            Thông báo kịp thời nếu có thay đổi.</span></div>
                </li>
                <li><b class="hshtac-nl-num">02</b>
                    <div><span class="hshtac-nl-title">Thống nhất nội dung</span><span class="hshtac-nl-desc">Phối hợp
                            thống nhất đối tượng, phạm vi, địa điểm, quy mô, thời gian, hình thức hỗ trợ và chỉ số tác
                            động trước khi triển khai.</span></div>
                </li>
                <li><b class="hshtac-nl-num">03</b>
                    <div><span class="hshtac-nl-title">Bố trí người đại diện phối hợp</span><span
                            class="hshtac-nl-desc">Cử đại diện phụ trách, phản hồi kịp thời các xác nhận và xử lý vấn đề
                            phát sinh trong quá trình hợp tác.</span></div>
                </li>
                <li><b class="hshtac-nl-num">04</b>
                    <div><span class="hshtac-nl-title">Phối hợp triển khai</span><span class="hshtac-nl-desc">Cung cấp
                            thông tin xác minh người thụ hưởng, tham gia các hoạt động trao tặng và nghiệm thu chương
                            trình.</span></div>
                </li>
                <li><b class="hshtac-nl-num">05</b>
                    <div><span class="hshtac-nl-title">Tài trợ thiết bị &amp; điều kiện</span><span
                            class="hshtac-nl-desc">Đảm bảo đúng số lượng, chất lượng thiết bị/hiện vật tài trợ. Trao
                            trực tiếp cho đối tượng thụ hưởng, không mặc định chuyển qua Thanh Âm.</span></div>
                </li>
                <li><b class="hshtac-nl-num">06</b>
                    <div><span class="hshtac-nl-title">Cung cấp thông tin thương hiệu</span><span
                            class="hshtac-nl-desc">Cung cấp logo, brand guideline, thông tin giới thiệu và đại diện phát
                            ngôn chính xác khi truyền thông/co-branding.</span></div>
                </li>
                <li><b class="hshtac-nl-num">07</b>
                    <div><span class="hshtac-nl-title">Minh bạch và tuân thủ</span><span class="hshtac-nl-desc">Thanh
                            toán/chuyển giao đúng tiến độ, sử dụng thương hiệu Thanh Âm đúng phạm vi, truyền thông đúng
                            kết quả thực tế.</span></div>
                </li>
                <li><b class="hshtac-nl-num">08</b>
                    <div><span class="hshtac-nl-title">Bảo vệ quyền riêng tư</span><span class="hshtac-nl-desc">Không tự
                            ý công khai hoặc thương mại hóa thông tin, hình ảnh cá nhân của người thụ hưởng khi chưa có
                            sự đồng ý phù hợp.</span></div>
                </li>
                <li><b class="hshtac-nl-num">09</b>
                    <div><span class="hshtac-nl-title">Xác nhận kết quả</span><span class="hshtac-nl-desc">Phối hợp xác
                            nhận việc trao tặng, số lượng hỗ trợ và cung cấp các chứng từ thuộc trách nhiệm của doanh
                            nghiệp.</span></div>
                </li>
                <li><b class="hshtac-nl-num">10</b>
                    <div><span class="hshtac-nl-title">Hoàn tất chương trình</span><span class="hshtac-nl-desc">Hoàn tất
                            các nội dung trách nhiệm, phối hợp nghiệm thu hồ sơ và xử lý các vấn đề tồn đọng sau khi kết
                            thúc chương trình.</span></div>
                </li>
            </ol>

            <div class="hshtac-kicker" style="margin-top:52px;"><span
                    class="hshtac-num hshtac-roman">VII</span><span>Cam kết của Thanh Âm</span></div>
            <h2>Trách nhiệm vận hành và minh bạch từ phía dự án</h2>
            <div class="hshtac-grid-quality" style="max-width:900px;">
                <div class="hshtac-quality-item"><span class="hshtac-check">✓</span>
                    <div><b>Đúng phạm vi hợp tác</b><span>Cung cấp giải pháp công nghệ theo đúng phạm vi hợp tác.</span>
                    </div>
                </div>
                <div class="hshtac-quality-item"><span class="hshtac-check">✓</span>
                    <div><b>Hướng dẫn sử dụng</b><span>Hướng dẫn người thụ hưởng tiếp cận và sử dụng giải pháp.</span>
                    </div>
                </div>
                <div class="hshtac-quality-item"><span class="hshtac-check">✓</span>
                    <div><b>Hỗ trợ kỹ thuật</b><span>Hỗ trợ kỹ thuật trong khả năng tốt nhất.</span></div>
                </div>
                <div class="hshtac-quality-item"><span class="hshtac-check">✓</span>
                    <div><b>Phối hợp triển khai</b><span>Phối hợp triển khai chương trình và kết nối với các đơn vị thụ
                            hưởng phù hợp.</span></div>
                </div>
                <div class="hshtac-quality-item"><span class="hshtac-check">✓</span>
                    <div><b>Báo cáo &amp; tư liệu</b><span>Theo dõi, tổng hợp số liệu và cung cấp báo cáo/tư liệu theo
                            thỏa thuận.</span></div>
                </div>
                <div class="hshtac-quality-item"><span class="hshtac-check">✓</span>
                    <div><b>Bảo vệ riêng tư</b><span>Cam kết bảo vệ thông tin riêng tư của người thụ hưởng.</span></div>
                </div>
            </div>
            <div class="hshtac-tech-quote" style="max-width:820px;">"Tuyệt đối không đưa ra các số liệu tác động chưa
                được xác minh."</div>

            <div class="hshtac-kicker" style="margin-top:52px;"><span
                    class="hshtac-num hshtac-roman">VIII</span><span>Nguyên tắc sử dụng nguồn lực</span></div>
            <h2>Minh bạch tuyệt đối trong quản lý tài chính và hỗ trợ</h2>
            <div class="hshtac-grid-groups">
                <div class="hshtac-group">
                    <span class="hshtac-gtag">Hỗ trợ trực tiếp</span>
                    <h4>Đối với hỗ trợ trực tiếp</h4>
                    <p style="font-size:13.8px;line-height:1.65;color:#3a4351;">Nguồn lực được doanh nghiệp trao tặng
                        hoặc hỗ trợ trực tiếp đến người/đơn vị thụ hưởng. Thanh Âm không phải là bên nhận và phân bổ
                        nguồn tài trợ tiền mặt này.</p>
                </div>
                <div class="hshtac-group">
                    <span class="hshtac-gtag">Duy trì giải pháp</span>
                    <h4>Đối với hỗ trợ duy trì &amp; phát triển</h4>
                    <p style="font-size:13.8px;line-height:1.65;color:#3a4351;">Khoản hỗ trợ dành cho Thanh Âm được sử
                        dụng đúng phạm vi và mục đích đã thống nhất nhằm duy trì hạ tầng kỹ thuật, nâng cấp giải pháp và
                        mở rộng khả năng phục vụ cộng đồng dài hạn.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ 4. ĐO LƯỜNG TÁC ĐỘNG ============ -->
    <section class="hshtac-section alt" id="tac-dong">
        <div class="hshtac-wrap">
            <div class="hshtac-kicker"><span class="hshtac-num hshtac-roman">IX</span><span>Báo cáo và ghi nhận tác
                    động</span></div>
            <h2>Khung đo lường tác động chuẩn mực: Input – Output – Outcome – Impact</h2>
            <figure class="hshtac-figure">
                <img src="/ThanhAM/uploads/images/mo-hinh-bao-cao-tac-dong.png"
                    alt="Mô hình báo cáo tác động: khung đo lường Input - Output - Outcome - Impact" loading="lazy">
                <figcaption>Khung đo lường tác động xã hội của Thanh Âm — số liệu chỉ được ghi nhận và báo cáo trong
                    phạm vi có khả năng thu thập, kiểm chứng và xác nhận minh bạch.</figcaption>
            </figure>

            <div class="hshtac-kicker" style="margin-top:52px;"><span class="hshtac-num hshtac-roman">X</span><span>Giá
                    trị doanh nghiệp nhận được</span></div>
            <h2>6 trụ cột giá trị cốt lõi cho doanh nghiệp</h2>
            <div class="hshtac-grid-values">
                <div class="hshtac-value">
                    <div class="hshtac-vnum">01</div>
                    <h4>Social Impact</h4>
                    <p>Tạo ra tác động xã hội cụ thể, thiết thực cho cộng đồng người yếu thế.</p>
                </div>
                <div class="hshtac-value">
                    <div class="hshtac-vnum">02</div>
                    <h4>Impact Data</h4>
                    <p>Có số liệu rõ ràng, minh bạch để ghi nhận kết quả tài trợ.</p>
                </div>
                <div class="hshtac-value">
                    <div class="hshtac-vnum">03</div>
                    <h4>CSR/ESG Reporting</h4>
                    <p>Sở hữu đầy đủ tư liệu, hình ảnh, báo cáo cho hoạt động CSR/ESG.</p>
                </div>
                <div class="hshtac-value">
                    <div class="hshtac-vnum">04</div>
                    <h4>Community Branding</h4>
                    <p>Gắn kết thương hiệu với một hoạt động cộng đồng nhân văn và có chiều sâu.</p>
                </div>
                <div class="hshtac-value">
                    <div class="hshtac-vnum">05</div>
                    <h4>Employee Engagement</h4>
                    <p>Tạo cơ hội cho nhân viên trực tiếp tham gia các hoạt động ý nghĩa.</p>
                </div>
                <div class="hshtac-value">
                    <div class="hshtac-vnum">06</div>
                    <h4>Long-term Value</h4>
                    <p>Góp phần duy trì một giải pháp công nghệ phục vụ cộng đồng bền vững.</p>
                </div>
            </div>

            <div class="hshtac-kicker" style="margin-top:52px;"><span class="hshtac-num hshtac-roman">XI</span><span>Giá
                    trị hai bên cùng nhận</span></div>
            <h2>Cộng hưởng sức mạnh giữa Doanh nghiệp và Thanh Âm</h2>
            <figure class="hshtac-figure">
                <img src="/ThanhAM/uploads/images/mo-hinh-win-win.png"
                    alt="Mô hình hợp tác cùng phát triển Win-Win giữa doanh nghiệp và Thanh Âm" loading="lazy">
                <figcaption>Mô hình hợp tác cùng phát triển (Win – Win): giá trị xã hội cộng hưởng cùng phát triển bền
                    vững.</figcaption>
            </figure>
        </div>
    </section>

    <!-- ============ 5. CÁC GÓI HỢP TÁC ============ -->
    <section class="hshtac-section" id="cac-goi">
        <div class="hshtac-wrap">
            <div class="hshtac-kicker"><span class="hshtac-num hshtac-roman">XII</span><span>Các gói hợp tác Doanh
                    nghiệp – Thanh Âm</span></div>
            <h2>Giải pháp tài trợ đa dạng theo quy mô và ngân sách</h2>

            <!-- GÓI 1 -->
            <div class="hshtac-package pkg-1">
                <div class="hshtac-package-head">
                    <span class="hshtac-pkg-tag">Gói 01</span>
                    <h3>TIA SÁNG — Đồng hành tạo tác động trực tiếp</h3>
                    <div class="hshtac-pkg-sub">Dành cho doanh nghiệp mới bắt đầu hoặc thử nghiệm hoạt động CSR/ESG
                    </div>
                    <div class="hshtac-pkg-quote">"Một khoản hỗ trợ – Một cơ hội được lên tiếng"</div>
                </div>
                <div class="hshtac-package-meta">
                    <div><b>3–6 tháng</b><span>Thời gian đồng hành</span></div>
                    <div><b>10–50 triệu VNĐ</b><span>Ngân sách tham khảo</span></div>
                    <div><b>Cá nhân / nhóm nhỏ</b><span>Quy mô phù hợp</span></div>
                </div>
                <div class="hshtac-package-body">
                    <figure><img src="/ThanhAM/uploads/images/goi-01-tia-sang.png"
                            alt="Gói 01 Tia Sáng - đồng hành tạo tác động trực tiếp" loading="lazy"></figure>
                    <p style="font-size:14.3px;line-height:1.75;color:#3a4351;margin-bottom:20px;">Gói Tia Sáng được
                        thiết kế dành cho các doanh nghiệp mong muốn bắt đầu hoặc thử nghiệm hoạt động CSR/ESG thông qua
                        một chương trình có phạm vi rõ ràng, ngân sách phù hợp và khả năng ghi nhận tác động cụ thể.
                        Doanh nghiệp có thể trực tiếp đồng hành cùng Thanh Âm trong việc đưa giải pháp hỗ trợ giao tiếp
                        đến những cá nhân, trường học, trung tâm hoặc đơn vị có nhu cầu.</p>
                    <div class="hshtac-package-cols">
                        <div>
                            <h5>Hình thức đồng hành</h5>
                            <ul>
                                <li>Trang bị thiết bị hỗ trợ giao tiếp</li>
                                <li>Hỗ trợ SIM 4G và chi phí kết nối</li>
                                <li>Triển khai tại trường học, trung tâm hoặc đơn vị xã hội</li>
                                <li>Duy trì hệ thống, nền tảng và chi phí cần thiết để giải pháp hoạt động ổn định</li>
                            </ul>
                            <h5>Quyền lợi đồng hành</h5>
                            <ul>
                                <li>Xác nhận vai trò Nhà tài trợ/Đối tác đồng hành theo thỏa thuận</li>
                                <li>Báo cáo số liệu và kết quả triển khai cơ bản</li>
                                <li>Cung cấp hình ảnh, tư liệu hoạt động CSR khi có điều kiện phù hợp</li>
                                <li>Ghi nhận thương hiệu trong phạm vi phù hợp với mức độ đồng hành</li>
                            </ul>
                        </div>
                        <div>
                            <h5>Giá trị dành cho doanh nghiệp</h5>
                            <ul>
                                <li><b>Tạo tác động trực tiếp:</b> nguồn lực chuyển hóa thành hỗ trợ cụ thể</li>
                                <li><b>Dễ dàng bắt đầu CSR:</b> triển khai từ một nhóm nhỏ, phù hợp ngân sách hiện tại
                                </li>
                                <li><b>Có cơ sở ghi nhận tác động:</b> số liệu về phạm vi hỗ trợ và hoạt động triển khai
                                </li>
                                <li><b>Gia tăng giá trị thương hiệu:</b> ghi nhận vai trò Nhà tài trợ/Đối tác đồng hành
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="hshtac-package-quote">"Mỗi khoản hỗ trợ không chỉ góp phần duy trì một giải pháp công
                        nghệ, mà còn góp phần tạo thêm cơ hội để một người được giao tiếp, được thể hiện và được lắng
                        nghe."</div>
                </div>
            </div>

            <!-- GÓI 2 -->
            <div class="hshtac-package pkg-2">
                <div class="hshtac-package-head">
                    <span class="hshtac-pkg-tag">Gói 02</span>
                    <h3>LAN TỎA — Đồng hành xây dựng chương trình CSR có đo lường</h3>
                    <div class="hshtac-pkg-sub">Dành cho doanh nghiệp muốn xây dựng hoạt động CSR/ESG dài hạn</div>
                    <div class="hshtac-pkg-quote">"Không chỉ trao đi nguồn lực – cùng tạo nên một chương trình có tác
                        động được ghi nhận"</div>
                </div>
                <div class="hshtac-package-meta">
                    <div><b>12 tháng</b><span>Thời gian đồng hành</span></div>
                    <div><b>50–200 triệu VNĐ</b><span>Ngân sách tham khảo</span></div>
                    <div><b>Diện rộng</b><span>Quy mô phù hợp</span></div>
                </div>
                <div class="hshtac-package-body">
                    <figure><img src="/ThanhAM/uploads/images/goi-02-lan-toa.png"
                            alt="Gói 02 Lan Tỏa - đồng hành xây dựng chương trình CSR có đo lường" loading="lazy">
                    </figure>
                    <p style="font-size:14.3px;line-height:1.75;color:#3a4351;margin-bottom:20px;">Gói Lan Tỏa dành cho
                        các doanh nghiệp mong muốn xây dựng hoạt động CSR/ESG dài hạn, không dừng lại ở một khoản tài
                        trợ đơn lẻ mà cùng Thanh Âm phát triển một chương trình có phạm vi triển khai rõ ràng, số liệu
                        theo dõi và kết quả tác động có thể ghi nhận, đồng thời tăng cường sự tham gia của nhân viên.
                    </p>
                    <div class="hshtac-package-cols">
                        <div>
                            <h5>Hình thức đồng hành</h5>
                            <ul>
                                <li>Tài trợ diện rộng, mở rộng khả năng tiếp cận đến nhiều người thụ hưởng</li>
                                <li>Hỗ trợ máy chủ, API và hạ tầng kỹ thuật</li>
                                <li>Hỗ trợ nghiên cứu, phát triển và nâng cấp tính năng</li>
                                <li>Đồng xây dựng và co-branding một chương trình CSR riêng</li>
                                <li>Hỗ trợ triển khai, đào tạo và kết nối với đơn vị thụ hưởng</li>
                            </ul>
                            <h5>Quyền lợi đồng hành</h5>
                            <ul>
                                <li>Ghi nhận logo thương hiệu trên ấn phẩm và hạng mục truyền thông phù hợp</li>
                                <li>Xây dựng Impact Story — câu chuyện tác động từ chương trình đồng hành</li>
                                <li>Báo cáo định kỳ theo mô hình Input – Output – Outcome</li>
                                <li>Tổ chức Employee Engagement cho nhân viên tham gia hoạt động xã hội</li>
                                <li>Ghi nhận vai trò Đối tác đồng hành/Đối tác chiến lược theo thỏa thuận</li>
                            </ul>
                        </div>
                        <div>
                            <h5>Giá trị dành cho doanh nghiệp</h5>
                            <ul>
                                <li><b>Xây dựng CSR dài hạn:</b> chuyển từ tài trợ ngắn hạn sang chương trình xuyên
                                    suốt, có kế hoạch rõ ràng</li>
                                <li><b>Đo lường được tác động:</b> theo dõi Input → Output → Outcome, làm dữ liệu tham
                                    khảo cho báo cáo CSR/ESG</li>
                                <li><b>Gia tăng nhận diện thương hiệu:</b> gắn thương hiệu với một câu chuyện tác động
                                    cụ thể, thay vì chỉ là đơn vị tài trợ</li>
                            </ul>
                        </div>
                    </div>
                    <div class="hshtac-package-quote">"12 tháng đồng hành – Tạo tác động – Đo lường kết quả – Lan tỏa
                        giá trị."</div>
                </div>
            </div>

            <!-- GÓI 3 -->
            <div class="hshtac-package pkg-3">
                <div class="hshtac-package-head">
                    <span class="hshtac-pkg-tag">Gói 03</span>
                    <h3>ĐỐI TÁC CHIẾN LƯỢC — Cùng xây dựng giá trị cộng đồng dài hạn</h3>
                    <div class="hshtac-pkg-sub">Dành cho doanh nghiệp có định hướng CSR/ESG dài hạn</div>
                    <div class="hshtac-pkg-quote">"Từ một chương trình CSR đến một cam kết tạo giá trị xã hội dài hạn"
                    </div>
                </div>
                <div class="hshtac-package-meta">
                    <div><b>2–3 năm</b><span>Thời gian hợp tác</span></div>
                    <div><b>Từ 200 triệu VNĐ/năm</b><span>Ngân sách tham khảo</span></div>
                    <div><b>Toàn quốc</b><span>Quy mô mở rộng</span></div>
                </div>
                <div class="hshtac-package-body">
                    <figure><img src="/ThanhAM/uploads/images/goi-03-cung-phat-trien.png"
                            alt="Gói 03 Đối tác chiến lược - cùng phát triển giá trị xã hội dài hạn" loading="lazy">
                    </figure>
                    <p style="font-size:14.3px;line-height:1.75;color:#3a4351;margin-bottom:20px;">Gói Đối tác Chiến
                        lược dành cho các doanh nghiệp mong muốn không chỉ tài trợ cho một chương trình xã hội mà trở
                        thành đối tác đồng hành cùng Thanh Âm trong quá trình phát triển và mở rộng một giải pháp công
                        nghệ xã hội có khả năng tạo tác động trên quy mô lớn.</p>
                    <div class="hshtac-package-cols">
                        <div>
                            <h5>Hình thức đồng hành</h5>
                            <ul>
                                <li>Mở rộng quy mô triển khai trên toàn quốc</li>
                                <li>Đồng phát triển các tính năng mới, cải tiến công nghệ</li>
                                <li>Hỗ trợ phát triển hạ tầng công nghệ và năng lực vận hành</li>
                                <li>Xây dựng chiến dịch cộng đồng thường niên mang dấu ấn chung</li>
                                <li>Đồng xây dựng các chương trình CSR/ESG chuyên biệt</li>
                            </ul>
                            <h5>Quyền lợi Đối tác Chiến lược</h5>
                            <ul>
                                <li>Ghi nhận danh hiệu Đối tác Chiến lược của Thanh Âm</li>
                                <li>Co-branding dài hạn trong các chương trình, chiến dịch phù hợp</li>
                                <li>CSR Impact Report định kỳ, tổng hợp chỉ số tác động</li>
                                <li>Xây dựng Case Study CSR/ESG về hành trình đồng hành</li>
                                <li>Cơ hội xuất hiện trong truyền thông, PR và câu chuyện tác động</li>
                                <li>Tham gia định hướng và đồng phát triển chương trình/tính năng</li>
                            </ul>
                        </div>
                        <div>
                            <h5>Giá trị dành cho doanh nghiệp</h5>
                            <ul>
                                <li><b>Từ tài trợ đến đối tác chiến lược:</b> tham gia định hướng và mở rộng tác động xã
                                    hội</li>
                                <li><b>Tạo tác động quy mô lớn:</b> mở rộng giải pháp đến nhiều địa phương và nhóm đối
                                    tượng</li>
                                <li><b>Đồng hành đổi mới công nghệ vì xã hội:</b> tham gia hỗ trợ R&amp;D các tính năng
                                    mới</li>
                                <li><b>Câu chuyện CSR/ESG có chiều sâu:</b> case study dài hạn từ nguồn lực → triển khai
                                    → kết quả → tác động</li>
                            </ul>
                        </div>
                    </div>
                    <div class="hshtac-package-quote">"2–3 năm đồng hành – Cùng phát triển – Cùng mở rộng tác động –
                        Cùng tạo giá trị xã hội dài hạn."</div>
                </div>
            </div>

            <!-- BẢNG SO SÁNH -->
            <div class="hshtac-sub">12.4 Bảng so sánh chi tiết các gói hợp tác</div>
            <div class="hshtac-table-wrap">
                <table class="hshtac-table">
                    <thead>
                        <tr>
                            <th>Hạng mục</th>
                            <th>Tia Sáng</th>
                            <th>Lan Tỏa</th>
                            <th>Đối tác Chiến lược</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Thời gian</td>
                            <td>3–6 tháng</td>
                            <td>12 tháng</td>
                            <td>2–3 năm</td>
                        </tr>
                        <tr>
                            <td>Ngân sách tham khảo</td>
                            <td>10–50 triệu</td>
                            <td>50–200 triệu</td>
                            <td>Từ 200 triệu/năm</td>
                        </tr>
                        <tr>
                            <td>Hỗ trợ trực tiếp người thụ hưởng</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                        </tr>
                        <tr>
                            <td>Tài trợ tài khoản &amp; thiết bị</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                        </tr>
                        <tr>
                            <td>Hỗ trợ trường học / trung tâm</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                        </tr>
                        <tr>
                            <td>Hỗ trợ duy trì hệ thống &amp; hạ tầng API</td>
                            <td>Có thể</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                        </tr>
                        <tr>
                            <td>Phát triển tính năng mới</td>
                            <td>Theo thỏa thuận</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                        </tr>
                        <tr>
                            <td>Đo lường &amp; báo cáo tác động</td>
                            <td>Cơ bản</td>
                            <td>Định kỳ</td>
                            <td>Dài hạn (CSR Report)</td>
                        </tr>
                        <tr>
                            <td>Impact Story &amp; Case Study</td>
                            <td>Có thể</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                        </tr>
                        <tr>
                            <td>Logo &amp; co-branding</td>
                            <td>Theo thỏa thuận</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                        </tr>
                        <tr>
                            <td>Employee Engagement</td>
                            <td>Có thể</td>
                            <td class="hshtac-yes">✓</td>
                            <td class="hshtac-yes">✓</td>
                        </tr>
                        <tr>
                            <td>Đồng xây dựng chiến dịch thường niên</td>
                            <td>—</td>
                            <td>Có thể</td>
                            <td class="hshtac-yes">✓</td>
                        </tr>
                        <tr>
                            <td>Danh hiệu Đối tác Chiến lược</td>
                            <td>—</td>
                            <td>—</td>
                            <td class="hshtac-yes">✓</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- CUSTOM PROGRAM -->
            <div class="hshtac-sub" style="margin-top:48px;">12.5 Tùy chỉnh chương trình riêng (Custom CSR Program)
            </div>
            <div class="hshtac-form-card">
                <p style="font-style:italic;color:var(--tam-magenta);margin-bottom:14px;">"Mỗi doanh nghiệp một mục tiêu
                    – Cùng Thanh Âm thiết kế một chương trình tạo tác động riêng"</p>
                <figure><img src="/ThanhAM/uploads/images/custom-csr-program.png"
                        alt="Custom CSR Program - thiết kế chương trình riêng theo mục tiêu doanh nghiệp"
                        loading="lazy"></figure>
                <p>Bên cạnh các gói hợp tác tiêu chuẩn, doanh nghiệp có thể lựa chọn Custom CSR Program để cùng Thanh Âm
                    xây dựng một chương trình CSR/ESG riêng, được thiết kế theo mục tiêu xã hội, nhóm đối tượng, ngân
                    sách và định hướng thương hiệu của doanh nghiệp — phù hợp với các doanh nghiệp mong muốn triển khai
                    chương trình mang dấu ấn riêng thay vì sử dụng mô hình tài trợ cố định.</p>

                <div class="hshtac-package-cols" style="margin-top:18px;">
                    <div>
                        <h5>Nội dung được tùy chỉnh</h5>
                        <ul>
                            <li><b>Đối tượng thụ hưởng:</b> cá nhân, nhóm cần hỗ trợ giao tiếp, trường học, trung tâm/tổ
                                chức xã hội, khu vực địa phương...</li>
                            <li><b>Quy mô triển khai:</b> từ hỗ trợ một cá nhân/nhóm nhỏ đến chương trình quy mô lớn tại
                                nhiều địa phương</li>
                            <li><b>Hình thức hỗ trợ:</b> tài trợ tài khoản, thiết bị, Internet/SIM 4G, hỗ trợ kỹ thuật,
                                hạ tầng, phát triển/nâng cấp</li>
                            <li><b>Thời gian đồng hành:</b> 3–6 tháng, 12 tháng hoặc nhiều năm với chương trình dài hạn
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h5>Quy trình xây dựng chương trình</h5>
                        <div class="hshtac-steps">
                            <div class="hshtac-step"><span class="hshtac-step-n">1</span>
                                <h5>Xác định mục tiêu</h5>
                                <p>Trao đổi về mục tiêu CSR/ESG, nhóm đối tượng và vấn đề xã hội mong muốn đồng hành.
                                </p>
                            </div>
                            <div class="hshtac-step"><span class="hshtac-step-n">2</span>
                                <h5>Thiết kế chương trình</h5>
                                <p>Thống nhất phạm vi, hình thức hỗ trợ, thời gian, ngân sách và chỉ số theo dõi.</p>
                            </div>
                            <div class="hshtac-step"><span class="hshtac-step-n">3</span>
                                <h5>Triển khai</h5>
                                <p>Thanh Âm phối hợp cùng doanh nghiệp và đơn vị liên quan triển khai đến nhóm thụ
                                    hưởng.</p>
                            </div>
                            <div class="hshtac-step"><span class="hshtac-step-n">4</span>
                                <h5>Theo dõi &amp; ghi nhận</h5>
                                <p>Kết quả phù hợp được tổng hợp, ghi nhận và báo cáo theo phạm vi đã thống nhất.</p>
                            </div>
                            <div class="hshtac-step"><span class="hshtac-step-n">5</span>
                                <h5>Đánh giá &amp; mở rộng</h5>
                                <p>Sau mỗi giai đoạn, hai bên đánh giá kết quả để điều chỉnh hoặc mở rộng chương trình.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hshtac-package-quote" style="margin-top:20px;">"Không có một mô hình CSR phù hợp cho tất cả
                    doanh nghiệp. Với Custom CSR Program, Thanh Âm cùng doanh nghiệp thiết kế chương trình phù hợp với
                    chính mục tiêu, nguồn lực và giá trị mà doanh nghiệp muốn tạo ra cho cộng đồng."</div>
            </div>

            <!-- NGUYÊN TẮC NGÂN SÁCH -->
            <div class="hshtac-sub" style="margin-top:48px;">12.6 Nguyên tắc ngân sách &amp; phương thức tài trợ</div>
            <p style="font-size:14.3px;line-height:1.75;color:var(--tam-sub);max-width:820px;margin-bottom:6px;">Thanh
                Âm áp dụng nguyên tắc "Thiết kế ngân sách theo tác động xã hội" — ngân sách không được xác định đơn
                thuần theo một mức tài trợ cố định, mà được xây dựng dựa trên quy mô, mục tiêu và nguồn lực cần thiết để
                tạo ra tác động thực tế.</p>

            <div class="hshtac-sub" style="font-size:16px;margin-top:26px;">Các yếu tố xác định ngân sách</div>
            <div class="hshtac-budget-grid">
                <div class="hshtac-budget-item"><b>Quy mô tác động</b><span>Phạm vi triển khai, số lượng địa điểm và mức
                        độ mở rộng của chương trình.</span></div>
                <div class="hshtac-budget-item"><b>Số người hưởng lợi</b><span>Số lượng cá nhân, nhóm người, trường học,
                        trung tâm hoặc cộng đồng được hỗ trợ.</span></div>
                <div class="hshtac-budget-item"><b>Nguồn lực kỹ thuật</b><span>Tài khoản, thiết bị, máy chủ, API,
                        Internet, phát triển và nâng cấp tính năng.</span></div>
                <div class="hshtac-budget-item"><b>Nguồn lực triển khai</b><span>Nhân sự, đào tạo, hỗ trợ kỹ thuật, vận
                        hành và theo dõi chương trình.</span></div>
                <div class="hshtac-budget-item"><b>Thời gian đồng hành</b><span>Chiến dịch ngắn hạn, 3–6 tháng, 12 tháng
                        hoặc chương trình dài hạn nhiều năm.</span></div>
            </div>

            <div class="hshtac-sub" style="font-size:16px;margin-top:34px;">Phương thức tài trợ linh hoạt</div>
            <div class="hshtac-fund-grid">
                <div class="hshtac-fund-item"><b>Tài trợ một lần</b><span>Phù hợp với chiến dịch hoặc chương trình hỗ
                        trợ có phạm vi cụ thể.</span></div>
                <div class="hshtac-fund-item"><b>Tài trợ theo giai đoạn</b><span>Nguồn lực phân bổ theo từng giai đoạn
                        triển khai và đánh giá kết quả.</span></div>
                <div class="hshtac-fund-item"><b>Tài trợ theo quý</b><span>Phù hợp doanh nghiệp muốn theo dõi, phân bổ
                        ngân sách CSR định kỳ.</span></div>
                <div class="hshtac-fund-item"><b>Tài trợ theo năm</b><span>Phù hợp chương trình CSR/ESG có kế hoạch
                        triển khai liên tục 12 tháng.</span></div>
                <div class="hshtac-fund-item"><b>Tài trợ theo số người hưởng lợi</b><span>Ngân sách xác định theo số
                        lượng người/đơn vị dự kiến được hỗ trợ.</span></div>
            </div>
            <div class="hshtac-tech-quote" style="max-width:820px;">"Linh hoạt về ngân sách – Rõ ràng về mục tiêu – Đo
                lường theo tác động." Thanh Âm không đặt ra một mức tài trợ bắt buộc cho mọi doanh nghiệp; mỗi khoản
                đóng góp được thiết kế dựa trên khả năng nguồn lực và mục tiêu tác động mà doanh nghiệp mong muốn cùng
                tạo ra.</div>
        </div>
    </section>

    <!-- ============ THÔNG ĐIỆP KHÉP LẠI ============ -->
    <section class="hshtac-brand">
        <div class="hshtac-wrap hshtac-brand-inner">
            <span class="hshtac-wave hshtac-wave-lg"><span style="height:10px"></span><span
                    style="height:22px"></span><span style="height:14px"></span><span style="height:26px"></span><span
                    style="height:8px"></span><span style="height:18px"></span></span>
            <div class="hshtac-brand-word">THANH ÂM</div>
            <div class="hshtac-brand-tag">Trao tiếng nói – Chạm trái tim</div>
            <blockquote>Mỗi doanh nghiệp đều có một cách riêng để tạo ra giá trị cho cộng đồng. Thanh Âm tin rằng, khi
                công nghệ, nguồn lực doanh nghiệp và tinh thần trách nhiệm xã hội cùng hội tụ, chúng ta có thể tạo nên
                những thay đổi thiết thực và bền vững hơn. Từ một khoản hỗ trợ, một chương trình CSR hay một mối quan hệ
                hợp tác dài hạn, mỗi sự đồng hành đều có thể góp phần mang giải pháp hỗ trợ giao tiếp đến gần hơn với
                những người đang cần được kết nối và lắng nghe.</blockquote>
            <p style="font-size:14.5px;color:rgba(255,255,255,.85);line-height:1.75;margin-bottom:8px;">Thanh Âm trân
                trọng từng sự đồng hành của Quý Doanh nghiệp và mong muốn cùng Quý Doanh nghiệp biến trách nhiệm xã hội
                thành những giá trị cụ thể, có tác động và có khả năng lan tỏa lâu dài.</p>
            <p style="font-size:14.5px;color:rgba(255,255,255,.85);line-height:1.75;margin-bottom:24px;">Rất hân hạnh
                được đồng hành cùng Quý Doanh nghiệp trên hành trình kiến tạo những giá trị xã hội bền vững và nhân văn.
            </p>
            <div class="hshtac-motto">Cùng trao cơ hội. Cùng tạo tác động. Cùng lan tỏa giá trị.</div>
            <a href="/ThanhAM/pages/danh_sach_tai_tro.php" class="hshtac-cta">Đăng ký hợp tác cùng Thanh Âm</a>
        </div>
    </section>

</main>

<?php
include '../includes/footer.php';
?>