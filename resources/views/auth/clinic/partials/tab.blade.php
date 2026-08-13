<div class="clinic-tabs-wrapper">
    <!-- Thanh Tab Header -->
    <div class="tab-navigation">
        <button class="tab-btn active" onclick="openTab(event, 'tab-1')">
            <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
            <span>Tài khoản</span>
        </button>
        <button class="tab-btn" onclick="openTab(event, 'tab-2')">
            <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/><path d="M9 7h1m-1 4h1m4-4h1m-1 4h1"/></svg>
            <span>Cơ sở vật chất</span>
        </button>
        <button class="tab-btn" onclick="openTab(event, 'tab-3')">
            <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
            <span>Tiêu chuẩn vô trùng</span>
        </button>
        <button class="tab-btn" onclick="openTab(event, 'tab-4')">
            <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/><path d="M12 11v3m-1.5-1.5h3"/></svg>
            <span>Đội ngũ Bác sĩ</span>
        </button>
        <button class="tab-btn" onclick="openTab(event, 'tab-5')">
            <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/><path d="M12 13l3-3 4 4"/></svg>
            <span>Before & After</span>
        </button>
        <button class="tab-btn" onclick="openTab(event, 'tab-6')">
            <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/><path d="M12 8v4l3 3"/></svg>
            <span>Đánh giá khách hàng</span>
        </button>
        <button class="tab-btn" onclick="openTab(event, 'tab-7')">
            <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/><path d="M7 15h.01M11 15h2"/></svg>
            <span>Bảng giá dịch vụ</span>
        </button>
    </div>

    <!-- Nội dung các Tab giữ nguyên cấu trúc cũ -->
    <div class="tab-content-container">
        <!-- TAB 1: Dịch vụ & Bộ lọc -->
        <div id="tab-1" class="tab-content active">
            @hasrole('Admin') 
                @include('auth.clinic.clinic-account', [
                    'clinic' => $clinic,
                ])
            @endhasrole
        </div>

        <!-- TAB 2: Cơ sở vật chất -->
        <div id="tab-2" class="tab-content">
            <h2>Cơ Sở Vật Chất & Trang Thiết Bị Hiện Đại</h2>
            <p class="subtitle">Phòng khám đầu tư đồng bộ công nghệ chẩn đoán hình ảnh tiên tiến nhất Châu Âu.</p>
            <div class="facility-grid">
                <div class="facility-item">
                    <div class="facility-img-holder">Máy CT ConeBeam 3D</div>
                    <h4>Máy CT ConeBeam 3D i-CAT</h4>
                    <p>Chụp toàn cảnh hàm mặt 3D liều tia thấp, cho hình ảnh cấu trúc xương chi tiết đến từng milimet.</p>
                </div>
                <div class="facility-item">
                    <div class="facility-img-holder">Máy Quét Hàm iTero 5D</div>
                    <h4>Máy Quét Hàm iTero Element 5D</h4>
                    <p>Lấy dấu răng kỹ thuật số trong 60 giây, mô phỏng kết quả niềng răng ngay lập tức.</p>
                </div>
                <div class="facility-item">
                    <div class="facility-img-holder">Kính Hiển Vi Phẫu Thuật</div>
                    <h4>Kính Hiển Vi Phẫu Thuật CJ-Optik</h4>
                    <p>Phóng đại lên đến 30 lần, hỗ trợ điều trị tủy và phẫu thuật đạt độ chính xác vi phẫu.</p>
                </div>
            </div>
        </div>

        <!-- TAB 3: Tiêu chuẩn vô trùng -->
        <div id="tab-3" class="tab-content">
            <h2>Tiêu Chuẩn Vô Trùng Chuẩn Y Tế Quốc Tế</h2>
            <div class="sterilization-info">
                <div class="steril-box">
                    <div class="steril-number">01</div>
                    <h4>Quy Trình 1 Chiều Khép Kín</h4>
                    <p>Dụng cụ đi theo chu trình khép kín: Phân loại -> Ngâm rửa siêu âm -> Sấy khô -> Đóng gói -> Hấp tiệt trùng AutoClave.</p>
                </div>
                <div class="steril-box">
                    <div class="steril-number">02</div>
                    <h4>Bộ Dụng Cụ Riêng Biệt</h4>
                    <p>Mỗi khách hàng được sử dụng 1 bộ tay khoan và 1 bộ dụng cụ khám riêng biệt hoàn toàn đã tiệt trùng.</p>
                </div>
                <div class="steril-box">
                    <div class="steril-number">03</div>
                    <h4>Khử Trùng Khống Khí UV</h4>
                    <p>Phòng phẫu thuật trang bị hệ thống áp lực âm và đèn cực tím UV tiệt trùng không khí tự động hàng ngày.</p>
                </div>
            </div>
        </div>

        <!-- TAB 4: Đội ngũ Bác sĩ -->
        <div id="tab-4" class="tab-content">
            @include('auth.clinic.clinic-doctor', [
                'clinic' => $clinic,
            ])
        </div>

        <!-- TAB 5: Before & After Gallery -->
        <div id="tab-5" class="tab-content">
            <h2>Hình Ảnh Thực Tế Trước & Sau Điều Trị</h2>
            <div class="gallery-grid">
                <div class="gallery-card">
                    <div class="ba-comparison">
                        <div class="ba-box before">Trước</div>
                        <div class="ba-box after">Sau</div>
                    </div>
                    <h4>Khách hàng: Nguyễn T. (32 tuổi)</h4>
                    <p><strong>Điều trị:</strong> Niềng răng trong suốt Invisalign 18 tháng giải quyết tình trạng hô nhẹ và lệch lạc.</p>
                </div>
                <div class="gallery-card">
                    <div class="ba-comparison">
                        <div class="ba-box before">Trước</div>
                        <div class="ba-box after">Sau</div>
                    </div>
                    <h4>Khách hàng: Trần V. (45 tuổi)</h4>
                    <p><strong>Điều trị:</strong> Trồng 2 trụ Implant vị trí răng hàm, khôi phục 100% chức năng ăn nhai.</p>
                </div>
            </div>
        </div>

        <!-- TAB 6: Testimonial -->
        <div id="tab-6" class="tab-content">
            <h2>Đánh Giá Từng Khách Hàng (Testimonials)</h2>
            <div class="reviews-container">
                <div class="review-card">
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <p class="review-text">"Tôi rất sợ đau khi làm răng nhưng đội ngũ bác sĩ ở đây làm việc cực kỳ nhẹ nhàng. Quá trình cấy Implant hoàn toàn không đau như tôi nghĩ!"</p>
                    <div class="reviewer-name">- Chị Mai Phương (Quận 1, TP.HCM)</div>
                </div>
                <div class="review-card">
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <p class="review-text">"Cơ sở vật chất hiện đại, phòng khám vô trùng sạch sẽ. Đội ngũ lễ tân nhiệt tình hỗ trợ nhắc lịch tái khám đúng hạn."</p>
                    <div class="reviewer-name">- Anh Quốc Bảo (Bình Thạnh, TP.HCM)</div>
                </div>
            </div>
        </div>

        <!-- TAB 7: PriceList -->
        <div id="tab-7" class="tab-content">
            @include('auth.clinic.clinic-procedure', [
                'clinic' => $clinic,
            ])
        </div>
    </div>
</div>
<style>
/* Styling Tổng Thể */
.clinic-tabs-wrapper {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    margin: 20px auto;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    background: #ffffff;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

/* Thanh Tab Header Navigation */
.tab-navigation {
    display: flex;
    background-color: #f8fafc;
    border-bottom: 2px solid #e2e8f0;
    overflow: hidden;
    white-space: nowrap;
    scrollbar-width: thin;
}

.tab-btn {
    padding: 14px 20px;
    border: none;
    background: transparent;
    font-size: 14px;
    font-weight: 600;
    color: #64748b;
    cursor: pointer;
    transition: all 0.25s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border-bottom: 2px solid transparent;
    margin-bottom: -2px;
}

/* Tối ưu Kích thước & Hiệu ứng Icon SVG */
.tab-icon {
    width: 18px;
    height: 18px;
    flex-shrink: 0;
    stroke: #64748b;
    transition: all 0.25s ease;
}

.tab-btn:hover {
    background-color: #f1f5f9;
    color: #0284c7;
}

.tab-btn:hover .tab-icon {
    stroke: #0284c7;
    transform: translateY(-1px);
}

.tab-btn.active {
    background-color: #ffffff;
    color: #0284c7;
    border-bottom: 2px solid #0284c7;
}

.tab-btn.active .tab-icon {
    stroke: #0284c7;
}

/* Các đoạn CSS phụ khác giữ nguyên từ bản trước */
.tab-content-container { padding: 25px; }
.tab-content { display: none; animation: fadeIn 0.3s ease; }
.tab-content.active { display: block; }

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(4px); }
    to { opacity: 1; transform: translateY(0); }
}

.tab-content h2 { color: #0f172a; margin-top: 0; margin-bottom: 20px; font-size: 22px; }
.filter-bar { display: flex; gap: 15px; margin-bottom: 20px; }
.form-control, .form-select { padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; }
.form-control { flex: 2; }
.form-select { flex: 1; }
.services-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 15px; }
.service-card { border: 1px solid #e2e8f0; border-radius: 8px; padding: 15px; background: #fff; position: relative; }
.card-badge { position: absolute; top: 10px; right: 10px; background: #10b981; color: white; padding: 2px 8px; font-size: 11px; border-radius: 4px; }
.facility-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
.facility-item { border: 1px solid #f1f5f9; padding: 15px; border-radius: 8px; text-align: center; background: #f8fafc; }
.facility-img-holder { height: 140px; background: #e2e8f0; display: flex; align-items: center; justify-content: center; border-radius: 6px; margin-bottom: 12px; color: #475569; font-weight: bold; }
.sterilization-info { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
.steril-box { background: #f0f9ff; padding: 20px; border-radius: 8px; border-left: 4px solid #0284c7; }
.steril-number { font-size: 24px; font-weight: bold; color: #0284c7; }
.doctor-list { display: flex; flex-direction: column; gap: 15px; }
.doctor-card { display: flex; gap: 20px; border: 1px solid #e2e8f0; padding: 15px; border-radius: 8px; align-items: center; }
.doc-avatar { font-size: 18px; font-weight: bold; background: #e0f2fe; color: #0284c7; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 50%; flex-shrink: 0; }
.doc-title { color: #0284c7; font-weight: bold; font-size: 14px; }
.gallery-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
.ba-comparison { display: flex; height: 120px; gap: 5px; margin-bottom: 10px; }
.ba-box { flex: 1; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #fff; border-radius: 4px; }
.ba-box.before { background: #64748b; }
.ba-box.after { background: #10b981; }
.reviews-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
.review-card { background: #fffdf5; padding: 18px; border-radius: 8px; border: 1px solid #fef3c7; }
.reviewer-name { font-weight: bold; text-align: right; margin-top: 10px; color: #475569; }
.price-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
.price-table th, .price-table td { border: 1px solid #e2e8f0; padding: 12px 15px; text-align: left; }
.price-table th { background-color: #0284c7; color: white; }
.price-table tr:nth-child(even) { background-color: #f8fafc; }
</style>
<script>
    // 1. Chức năng Chuyển Tab
function openTab(evt, tabId) {
    // Ẩn tất cả nội dung tab
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => content.classList.remove('active'));

    // Bỏ lớp active ở tất cả các nút
    const tabBtns = document.querySelectorAll('.tab-btn');
    tabBtns.forEach(btn => btn.classList.remove('active'));

    // Hiển thị tab được chọn & kích hoạt nút
    document.getElementById(tabId).classList.add('active');
    evt.currentTarget.classList.add('active');
}

// 2. Chức năng Lọc Dịch Vụ ở Tab 1
function filterServices() {
    const searchText = document.getElementById('serviceSearch').value.toLowerCase();
    const selectedCategory = document.getElementById('serviceCategory').value;
    const cards = document.querySelectorAll('.service-card');

    cards.forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase();
        const description = card.querySelector('p').textContent.toLowerCase();
        const category = card.getAttribute('data-category');

        const matchesSearch = title.includes(searchText) || description.includes(searchText);
        const matchesCategory = selectedCategory === 'all' || category === selectedCategory;

        if (matchesSearch && matchesCategory) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>