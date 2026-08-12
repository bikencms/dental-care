@extends('layouts.app')
@section('content')
<style>
</style>
@include('auth.clinic.clinic-breadcrumb')
 <!-- Header Section: Image Banner & Primary Info -->
<div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-4">
    <div class="row g-0">
        <!-- Clinic Image Banner -->
        <div class="col-lg-5 position-relative bg-light">
            <img src="{{ $clinic->image ? asset('storage/' . $clinic->image) : asset('assets/images/default-clinic.jpg') }}" 
                 class="clinic-detail-banner" 
                 alt="{{ $clinic->name }}">
            <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-3 px-3 py-2 fw-bold shadow-sm">
                <span class="fw-normal text-white fw-semibold d-flex align-items-center">{{ number_format($clinic->rating ?? 0, 1) }} <svg class="icon icon-xxs" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"></path>
                </svg> ({{ $clinic->review_count ?? 0 }} reviews)</span>
            </span>
        </div>

        <!-- Clinic Main Summary -->
        <div class="col-lg-7 p-4 d-flex flex-column justify-content-between">
            <div>
                <h2 class="fw-bold text-dark mb-2">{{ $clinic->name }}</h2>
                
                <!-- Location / District & City -->
                <p class="text-primary fw-semibold mb-2">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    {{ $clinic->address }}, {{ $clinic->district->name ?? $clinic->district }}, {{ $clinic->city }}
                </p>

                <!-- Tags List -->
                @if($clinic->tags && $clinic->tags->count() > 0)
                <div class="d-flex flex-wrap gap-2 mb-3">
                    @foreach($clinic->tags as $tag)
                        <span class="badge bg-light text-secondary border fw-normal px-2 py-1">
                            #{{ $tag->name }}
                        </span>
                    @endforeach
                </div>
                @endif

                <!-- Languages Spoken -->
                <div class="mb-3">
                    <span class="text-muted small fw-bold text-uppercase d-block mb-1">Languages Spoken:</span>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-1">
                            <img src="{{ asset('assets/images/svg/vn.svg') }}" alt="Language VI" width="18">
                        </span>
                        <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-1">
                            <img src="{{ asset('assets/images/svg/us.svg') }}" alt="Language EN" width="18">
                        </span>
                    </div>
                </div>

                <!-- Description Short -->
                <p class="text-muted small lh-base mb-3">
                    {{ $clinic->description }}
                </p>
            </div>

            <!-- Call to Action -->
            <div class="d-flex gap-2 pt-2 border-top align-items-center flex-wrap">
                <!-- Nút Đặt lịch khám (Cho khách hàng) -->
                <a href="#booking-form" class="btn btn-primary px-4 fw-semibold">
                    <i class="far fa-calendar-check me-2"></i>Book Appointment
                </a>

                <!-- Nút Gọi điện -->
                <a href="tel:{{ $clinic->phone ?? '+84799108727' }}" class="btn btn-outline-secondary px-3">
                    <i class="fas fa-phone-alt me-1"></i> Call Clinic
                </a>

                <!-- Nút Cấu hình lịch cố định (Dành cho Admin/Quản lý) -->
                <a href="{{ route('dashboard.clinic.recurring.index', ['id' => $clinic->id]) }}" 
                class="btn btn-outline-primary px-3 fw-semibold">
                    <i class="fas fa-clock me-1"></i> Cấu hình lịch khám
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Layout (2 Columns) -->
<div class="row g-4">
    <!-- Left Column: Services, Procedures, Doctors & Account -->
    <div class="col-lg-12">
                    
        <div class="container-fluid py-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1"><i class="fas fa-clock text-primary me-2"></i>Quản Lý Khung Giờ Khám Online</h4>
                    <p class="text-muted small mb-0">Thiết lập khung giờ hoạt động cố định tuần theo từng dịch vụ trước khi mở cho khách hàng đặt lịch.</p>
                </div>
            </div>

            <!-- TAB CHỌN DỊCH VỤ (IMPLANT / VENEER) -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-3 bg-white rounded">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="fw-bold text-dark"><i class="fas fa-layer-group me-2"></i>Chọn Loại Dịch Vụ Cấu Hình:</span>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-primary active px-4 py-2 fw-bold" id="tab-implant" onclick="switchService('implant')">
                                <i class="fas fa-tooth me-2"></i>Trồng Răng Implant
                            </button>
                            <button type="button" class="btn btn-outline-primary px-4 py-2 fw-bold" id="tab-veneer" onclick="switchService('veneers')">
                                <i class="fas fa-smile me-2"></i>Dán Sứ Veneer
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORM LƯU CẤU HÌNH KHUNG GIỜ -->
            <form action="#" method="POST" id="scheduleManageForm">
                @csrf
                <input type="hidden" name="service_type" id="input_service_type" value="implant">

                <!-- BƯỚC 1: CẤU HÌNH KHUNG GIỜ CỐ ĐỊNH HÀNG TUẦN -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-primary text-white py-3">
                        <h6 class="card-title fw-bold mb-0">
                            <i class="fas fa-calendar-plus me-2"></i>BƯỚC 1: CẤU HÌNH KHUNG GIỜ CỐ ĐỊNH HÀNG TUẦN (RECURRING TEMPLATE)
                        </h6>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted small">
                            <i class="fas fa-info-circle me-1"></i> Nhập khoảng giờ khám cố định trong tuần. Hệ thống sẽ tự động tách thành các <b>block 30 phút</b> lặp lại cho mọi tuần trong tháng.
                        </p>

                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light text-center small">
                                    <tr>
                                        <th style="width: 60px;">STT</th>
                                        <th style="width: 220px;">Thứ Trong Tuần</th>
                                        <th>Khung Giờ (Bắt đầu - Kết thúc)</th>
                                        <th style="width: 100px;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody id="templateRowsContainer">
                                    <!-- Rows generated by JS -->
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <!-- Nút thêm dòng -->
                            <button type="button" 
                                    id="btnAddScheduleRow" 
                                    class="btn btn-sm btn-outline-success fw-bold" 
                                    onclick="addScheduleRow()">
                                <i class="fas fa-plus me-1"></i> + Thêm dòng khung giờ mới
                            </button>

                            <!-- Nút LƯU KHUNG GIỜ THEO SERVICE -->
                            <button type="button" 
                                    id="btnSaveServiceSchedule" 
                                    class="btn btn-primary fw-bold px-4" 
                                    onclick="saveScheduleByService()">
                                <i class="fas fa-save me-1"></i> Lưu Khung Giờ (<span id="lblCurrentService">IMPLANT</span>)
                            </button>
                        </div>
                    </div>
                </div>

                <!-- BƯỚC 2: XEM & QUẢN LÝ BẬT/TẮT CÁC SLOT 30 PHÚT -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-dark text-white py-3 d-flex justify-content-between align-items-center">
                        <h6 class="card-title fw-bold mb-0">
                            <i class="fas fa-sliders-h me-2"></i>BƯỚC 2: BẬT / TẮT THỦ CÔNG KHUNG GIỜ TRONG TUẦN (30 PHÚT / SLOT)
                        </h6>
                        <span class="badge bg-warning text-dark"><i class="fas fa-bolt me-1"></i>Cho phép Enable/Disable từng ô giờ</span>
                    </div>
                    <div class="card-body p-4 bg-light">
                        <div class="row g-3" id="slotsPreviewGrid">
                            <!-- Preview Grid Slot 30 phút theo các Thứ -->
                        </div>
                    </div>
                </div>

                <!-- FOOTER ACTIONS -->
                <div class="card border-0 shadow-sm p-3 bg-white d-flex flex-row justify-content-between align-items-center">
                    <div class="text-muted small">
                        <i class="fas fa-shield-alt text-success me-1"></i> Cấu hình sẽ tự động áp dụng cho các lịch hẹn mới từ thời điểm này.
                    </div>
                    <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">
                        <i class="fas fa-save me-2"></i>Lưu & Áp Dụng Khung Giờ
                    </button>
                </div>
            </form>
            <script>
                const daysList = [
                    { id: 1, name: 'Thứ Hai' },
                    { id: 2, name: 'Thứ Ba' },
                    { id: 3, name: 'Thứ Tư' },
                    { id: 4, name: 'Thứ Năm' },
                    { id: 5, name: 'Thứ Sáu' },
                    { id: 6, name: 'Thứ Bảy' },
                    { id: 0, name: 'Chủ Nhật' } // Đã bổ sung Chủ Nhật
                ];

                // Sinh danh sách Option cách nhau 30 phút (07:00 -> 21:00)
                function getTimeOptionsHTML() {
                    let html = '';
                    for (let h = 7; h <= 19; h++) {
                        let hourStr = h < 10 ? '0' + h : h;
                        html += `<option value="${hourStr}:00">${hourStr}:00</option>`;
                        html += `<option value="${hourStr}:30">${hourStr}:30</option>`;
                    }
                    html += `<option value="21:00">21:00</option>`;
                    return html;
                }

                const timeOptions = getTimeOptionsHTML();

                // Thêm dòng cấu hình mới
                function addScheduleRow(dayVal = 1, startVal = '10:30', endVal = '12:00') {
                    const container = document.getElementById('templateRowsContainer');

                    const currentRowsCount = container.children.length;
                    // Giới hạn tối đa 7 dòng (cho 7 ngày trong tuần)
                    if (currentRowsCount >= 7) {
                        checkAddButtonStatus();
                        return;
                    }
                                    
                    const index = container.children.length;

                    let daysOptions = daysList.map(d => 
                        `<option value="${d.id}" ${d.id == dayVal ? 'selected' : ''}>${d.name}</option>`
                    ).join('');

                    const rowHTML = `
                        <tr id="row_${index}">
                            <td class="text-center fw-bold row-stt">${index + 1}</td>
                            <td>
                                <select name="template[${index}][day_of_week]" class="form-select form-select-sm" onchange="generateSlotsPreview()">
                                    ${daysOptions}
                                </select>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <select name="template[${index}][start_time]" class="form-select form-select-sm select-start" style="width: 120px;" onchange="generateSlotsPreview()">
                                        ${timeOptions}
                                    </select>
                                    <span class="fw-bold text-muted">đến</span>
                                    <select name="template[${index}][end_time]" class="form-select form-select-sm select-end" style="width: 120px;" onchange="generateSlotsPreview()">
                                        ${timeOptions}
                                    </select>
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow(this)">
                                    <svg data-slot="icon" class="icon icon-xs" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    `;

                    container.insertAdjacentHTML('beforeend', rowHTML);
                    const newRow = container.lastElementChild;
                    newRow.querySelector('.select-start').value = startVal;
                    newRow.querySelector('.select-end').value = endVal;

                    updateSTT();
                    generateSlotsPreview();
                }

                // Hàm Bật / Tắt nút "+ Thêm dòng khung giờ mới" nếu đã đủ 7 ngày
                function checkAddButtonStatus() {
                    const container = document.getElementById('templateRowsContainer');
                    const addBtn = document.getElementById('btnAddScheduleRow');
                    const rowCount = container.children.length;

                    if (rowCount >= 7) {
                        addBtn.disabled = true;
                        addBtn.classList.add('disabled');
                        addBtn.title = 'Đã đạt tối đa 7 ngày trong tuần';
                    } else {
                        addBtn.disabled = false;
                        addBtn.classList.remove('disabled');
                        addBtn.title = '';
                    }
                }

                function removeRow(btn) {
                    btn.closest('tr').remove();
                    updateSTT();
                    generateSlotsPreview();
                }

                function updateSTT() {
                    document.querySelectorAll('#templateRowsContainer tr').forEach((tr, idx) => {
                        tr.querySelector('.row-stt').textContent = idx + 1;
                    });
                }

                // Tách khoảng giờ thành từng Block 30 phút để Bật/Tắt thủ công
                function generateSlotsPreview() {
                    const grid = document.getElementById('slotsPreviewGrid');
                    grid.innerHTML = '';

                    daysList.forEach(day => {
                        let daySlots = [];
                        const rows = document.querySelectorAll('#templateRowsContainer tr');

                        rows.forEach(row => {
                            const dayOfWeek = row.querySelector('select[name*="[day_of_week]"]').value;
                            if (dayOfWeek == day.id) {
                                const startTime = row.querySelector('.select-start').value;
                                const endTime = row.querySelector('.select-end').value;
                                daySlots = daySlots.concat(splitInto30MinSlots(startTime, endTime));
                            }
                        });

                        if (daySlots.length > 0) {
                            let slotsHTML = daySlots.map(timeStr => `
                                <label class="btn btn-sm btn-primary px-2 py-1 slot-btn" style="font-size: 12px;">
                                    <input type="checkbox" name="active_slots[${day.id}][${timeStr}]" value="1" checked class="d-none" onchange="toggleSlotBtn(this)">
                                    <i class="fas fa-check me-1"></i>${timeStr}
                                </label>
                            `).join('');

                            grid.innerHTML += `
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 shadow-sm p-3 bg-white h-100">
                                        <h6 class="fw-bold text-primary mb-2 border-bottom pb-2">${day.name}</h6>
                                        <div class="d-flex flex-wrap gap-1">
                                            ${slotsHTML}
                                        </div>
                                    </div>
                                </div>
                            `;
                        }
                    });

                    if (grid.innerHTML.trim() === '') {
                        grid.innerHTML = `<div class="text-center text-muted py-4"><i class="fas fa-calendar-times mb-2 fa-2x"></i><br>Chưa có khung giờ nào được thiết lập. Hãy thêm dòng ở Bước 1.</div>`;
                    }
                }

                // Tách khoảng giờ (VD: 10:30 đến 12:00 -> ['10:30', '11:00', '11:30'])
                function splitInto30MinSlots(start, end) {
                    let slots = [];
                    let [hStart, mStart] = start.split(':').map(Number);
                    let [hEnd, mEnd] = end.split(':').map(Number);

                    let currMinutes = hStart * 60 + mStart;
                    let endMinutes = hEnd * 60 + mEnd;

                    while (currMinutes < endMinutes) {
                        let h = Math.floor(currMinutes / 60);
                        let m = currMinutes % 60;
                        let timeStr = (h < 10 ? '0' + h : h) + ':' + (m === 0 ? '00' : m);
                        slots.push(timeStr);
                        currMinutes += 30;
                    }
                    return slots;
                }

                function toggleSlotBtn(checkbox) {
                    const label = checkbox.closest('label');
                    const icon = label.querySelector('i');

                    if (checkbox.checked) {
                        label.classList.remove('btn-outline-secondary');
                        label.classList.add('btn-primary');
                        icon.className = 'fas fa-check me-1';
                    } else {
                        label.classList.remove('btn-primary');
                        label.classList.add('btn-outline-secondary');
                        icon.className = 'fas fa-times me-1';
                    }
                }

                // Toàn bộ dữ liệu của cả 2 dịch vụ truyền từ Laravel Controller
                const allExistingSchedules = @json($existingSchedules ?? ['implant' => [], 'veneers' => []]);

                // Biến lưu dịch vụ hiện tại đang chọn (mặc định 'implant')
                let currentServiceType = 'implant';

                document.addEventListener('DOMContentLoaded', () => {
                    // Tải dữ liệu mặc định cho tab Implant ban đầu
                    loadScheduleByService(currentServiceType);
                });

                // Hàm hiển thị danh sách khung giờ lên bảng theo service_type
                function loadScheduleByService(serviceType) {
                    currentServiceType = serviceType;
                    document.getElementById('input_service_type').value = serviceType;

                    const container = document.getElementById('templateRowsContainer');
                    container.innerHTML = '';

                    const schedules = allExistingSchedules[serviceType] || [];

                    if (schedules.length > 0) {
                        schedules.forEach(item => {
                            addScheduleRow(item.day_of_week, item.start_time, item.end_time);
                        });
                    } else {
                        // Mặc định ban đầu nếu chưa có dữ liệu: Tạo đủ 7 ngày (Thứ 2 đến Chủ Nhật)
                        const defaultDays = [1, 2, 3, 4, 5, 6, 0]; // 1..6 là T2-T7, 0 là Chủ Nhật
                        defaultDays.forEach(day => {
                            addScheduleRow(day, '07:00', '19:00');
                        });
                    }
                }

                // Hàm gọi khi bấm chuyển Tab dịch vụ trên giao diện
                function switchService(type) {
                    // Đổi style active trên tab
                    document.getElementById('tab-implant').classList.toggle('active', type === 'implant');
                    document.getElementById('tab-veneer').classList.toggle('active', type === 'veneers');

                    // Nạp dữ liệu tương ứng của dịch vụ đó
                    loadScheduleByService(type);
                }
            </script>
            <script>
                // URL API Lưu Lịch (Truyền clinicId từ Blade)
                const saveScheduleUrl = "{{ route('api.clinic-schedules.save-service', $clinic->id) }}";
                const csrfToken = "{{ csrf_token() }}";

                // Cập nhật nhãn tên Service trên nút Lưu khi đổi Tab
                function loadScheduleByService(serviceType) {
                    currentServiceType = serviceType;
                    document.getElementById('input_service_type').value = serviceType;
                    
                    // Cập nhật text nút Lưu
                    const lbl = document.getElementById('lblCurrentService');
                    if (lbl) {
                        lbl.textContent = serviceType.toUpperCase();
                    }

                    const container = document.getElementById('templateRowsContainer');
                    container.innerHTML = '';

                    const schedules = allExistingSchedules[serviceType] || [];

                    if (schedules.length > 0) {
                        schedules.forEach(item => {
                            addScheduleRow(item.day_of_week, item.start_time, item.end_time);
                        });
                    } else {
                        const defaultDays = [1, 2, 3, 4, 5, 6, 0];
                        defaultDays.forEach(day => {
                            addScheduleRow(day, '07:00', '19:00');
                        });
                    }
                }

                // HÀM CALL API LƯU KHUNG GIỜ
                async function saveScheduleByService() {
                    const btn = document.getElementById('btnSaveServiceSchedule');
                    const rows = document.querySelectorAll('#templateRowsContainer tr');
                    
                    // 1. Gom dữ liệu từ giao diện
                    let schedulesData = [];
                    let hasError = false;

                    rows.forEach(tr => {
                        const dayOfWeek = tr.querySelector('select[name*="[day_of_week]"]').value;
                        const startTime = tr.querySelector('.select-start').value;
                        const endTime = tr.querySelector('.select-end').value;

                        if (startTime >= endTime) {
                            hasError = true;
                            tr.classList.add('table-danger');
                        } else {
                            tr.classList.remove('table-danger');
                            schedulesData.push({
                                day_of_week: parseInt(dayOfWeek),
                                start_time: startTime,
                                end_time: endTime
                            });
                        }
                    });

                    if (hasError) {
                        alert('Có dòng có thời gian Bắt đầu lớn hơn hoặc bằng Thời gian Kết thúc. Vui lòng kiểm tra lại!');
                        return;
                    }

                    // 2. Disable nút để tránh spam click
                    const originalText = btn.innerHTML;
                    btn.disabled = true;
                    btn.innerHTML = `<i class="fas fa-spinner fa-spin me-1"></i> Đang lưu...`;

                    try {
                        // 3. Call API Fetch
                        const response = await fetch(saveScheduleUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                service_type: currentServiceType,
                                schedules: schedulesData
                            })
                        });

                        const result = await response.json();

                        if (response.ok && result.success) {
                            alert(result.message);
                            // Cập nhật lại mảng dữ liệu client để không bị mất khi chuyển tab
                            allExistingSchedules[currentServiceType] = schedulesData;
                        } else {
                            alert(result.message || 'Lưu khung giờ thất bại!');
                        }
                    } catch (err) {
                        console.error('Save Schedule Error:', err);
                        alert('Lỗi kết nối máy chủ! Vui lòng thử lại sau.');
                    } finally {
                        btn.disabled = false;
                        btn.innerHTML = originalText;
                    }
                }
            </script>
        </div>
        <!-- SECTION: ONLINE BOOKING MANAGEMENT -->
        <div class="card border-0 shadow-lg rounded-3 mb-4 position-relative overflow-hidden">
            <!-- Accent Top Line -->
            <div class="position-absolute top-0 start-0 end-0 bg-primary" style="height: 4px;"></div>

            <div class="card-header bg-white border-0 pt-4 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-dark mb-1 d-flex align-items-center gap-2">
                        <span class="p-2 bg-primary-subtle text-primary rounded-3">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                        Quản Lý Đặt Phòng / Lịch Khám Online
                    </h4>
                    <p class="text-muted small mb-0">Xem và điều phối danh sách các lịch đặt chỗ của khách hàng theo thời gian thực.</p>
                </div>
                <div class="d-flex gap-2">
                    <!-- THAY ĐỔI: Nút kích hoạt Popup Modal -->
                    <button type="button" class="btn btn-primary btn-sm px-3 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#createBookingModal">
                        <i class="fas fa-plus me-1"></i> Tạo lịch mới
                    </button>
                </div>
            </div>

            <div class="card-body px-4">
                <!-- Thống kê nhanh / Quick Badges -->
                <div class="row g-3 mb-4">
                    <div class="col-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-start border-4 border-warning">
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Chờ xác nhận</span>
                            <h3 class="fw-bold text-dark mb-0">{{ $clinic->appointments_pending_count ?? 0 }}</h3>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-start border-4 border-success">
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Đã xác nhận</span>
                            <h3 class="fw-bold text-dark mb-0">{{ $clinic->appointments_confirmed_count ?? 0 }}</h3>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-start border-4 border-info">
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Hôm nay</span>
                            <h3 class="fw-bold text-dark mb-0">{{ $clinic->appointments_today_count ?? 0 }}</h3>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-start border-4 border-danger">
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Đã hủy</span>
                            <h3 class="fw-bold text-dark mb-0">{{ $clinic->appointments_cancelled_count ?? 0 }}</h3>
                        </div>
                    </div>
                </div>

                @if(View::exists('auth.clinic.clinic-booking'))
                    @include('auth.clinic.clinic-booking', ['clinic' => $clinic])
                @else
                    <!-- Bảng danh sách lịch hẹn -->
                    <div class="table-responsive rounded-3 border">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr class="text-secondary text-uppercase small">
                                    <th scope="col" class="py-3 ps-3">Mã đơn</th>
                                    <th scope="col" class="py-3">Khách hàng</th>
                                    <th scope="col" class="py-3">Ngày & Giờ</th>
                                    <th scope="col" class="py-3">Dịch vụ / Phòng</th>
                                    <th scope="col" class="py-3">Trạng thái</th>
                                    <th scope="col" class="py-3 text-end pe-3">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clinic->appointments ?? [] as $appointment)
                                <tr>
                                    <td class="ps-3 fw-bold text-primary">#{{ $appointment->code ?? $appointment->id }}</td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $appointment->user_name ?? $appointment->name }}</div>
                                        <small class="text-muted"><i class="fas fa-phone text-xs me-1"></i>{{ $appointment->phone }}</small>
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ \Carbon\Carbon::parse($appointment->booking_date)->format('d/m/Y') }}</div>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i>{{ $appointment->booking_time }}</small>
                                    </td>
                                    <td>{{ $appointment->service_name ?? 'Khám tổng quát' }}</td>
                                    <td>
                                        @if(($appointment->status ?? 'pending') == 'pending')
                                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2.5 py-1">Chờ xác nhận</span>
                                        @elseif($appointment->status == 'confirmed')
                                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1">Đã xác nhận</span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2.5 py-1">{{ $appointment->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-3">
                                        <a href="{{ route('admin.appointments.show', $appointment->id ?? 1) }}" class="btn btn-sm btn-light border me-1" title="Xem chi tiết">
                                            <i class="fas fa-eye text-secondary"></i>
                                        </a>
                                        <a href="{{ route('admin.appointments.edit', $appointment->id ?? 1) }}" class="btn btn-sm btn-primary" title="Cập nhật">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="far fa-calendar-times fa-2x mb-2 d-block text-secondary"></i>
                                        Chưa có lịch đặt phòng / cuộc hẹn nào gần đây.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- SECTION 4: CLINIC ACCOUNT MANAGEMENT -->
        @hasrole('Admin') 
        @include('auth.clinic.clinic-account', [
            'clinic' => $clinic,
        ])
        @endhasrole

        <!-- SECTION 2: CLINIC PROCEDURES & PRICING -->
        @include('auth.clinic.clinic-procedure', [
            'clinic' => $clinic,
        ])

        <!-- SECTION 3: OUR DOCTORS / SPECIALISTS -->
        @include('auth.clinic.clinic-doctor', [
            'clinic' => $clinic,
        ])

    </div>
</div>

<!-- ==========================================
     POPUP MODAL: TẠO LỊCH ĐẶT MỚI (BỔ SUNG MỚI)
     ========================================== -->
<!-- POPUP MODAL: QUẢN LÝ LỊCH KHÁM TỰ ĐỘNG (CLINIC SCHEDULE) -->
<div class="modal fade" id="createBookingModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header bg-primary text-white py-3">
                <h5 class="modal-title fw-bold" id="scheduleModalLabel">
                    <i class="fas fa-calendar-alt me-2"></i>Cấu Hình Khung Giờ Khám Online Tự Động
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="POST" id="scheduleForm">
                @csrf
                @method('PUT')
                
                <div class="modal-body p-4 bg-light">
                    <!-- Nav Tabs Chọn Dịch Vụ: Implant vs Veneer -->
                    <div class="d-flex align-items-center justify-content-between mb-3 bg-white p-2 rounded border">
                        <span class="fw-bold text-secondary ps-2">Chọn Loại Dịch Vụ Để Cấu Hình:</span>
                        <ul class="nav nav-pills" id="serviceTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active px-4 fw-semibold" id="implant-tab" data-bs-toggle="tab" data-bs-target="#implant-panel" type="button" role="tab" onclick="setScheduleType('implant')">
                                    <i class="fas fa-tooth me-1"></i> Trồng Răng Implant
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 fw-semibold" id="veneer-tab" data-bs-toggle="tab" data-bs-target="#veneer-panel" type="button" role="tab" onclick="setScheduleType('veneer')">
                                    <i class="fas fa-smile me-1"></i> Dán Sứ Veneer
                                </button>
                            </li>
                        </ul>
                    </div>

                    <input type="hidden" name="schedule_type" id="selected_schedule_type" value="implant">
                    <input type="hidden" name="slot_duration_minutes" value="30">

                    <!-- Thiết lập chung cho Slots -->
                    <div class="row g-3 bg-white p-3 rounded border mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Số bệnh nhân tối đa / Slot (30 phút)</label>
                            <input type="number" name="max_patients_per_slot" class="form-control form-control-sm" value="2" min="1" required>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <small class="text-muted"><i class="fas fa-info-circle me-1"></i> Lịch lưu tại đây sẽ tự động lặp lại cho mọi tuần trong tháng cho tới khi có thay đổi mới.</small>
                        </div>
                    </div>

                    <!-- Layout Bảng Lịch Tuần -->
                    <div class="tab-content" id="serviceTabContent">
                        @php
                            $days = [
                                1 => 'Thứ Hai',
                                2 => 'Thứ Ba',
                                3 => 'Thứ Tư',
                                4 => 'Thứ Năm',
                                5 => 'Thứ Sáu',
                                6 => 'Thứ Bảy',
                                0 => 'Chủ Nhật'
                            ];
                            
                            // Lưới khung giờ 30 phút từ 07:00 đến 20:30
                            $timeSlots = [];
                            for ($h = 7; $h <= 20; $h++) {
                                $timeSlots[] = sprintf('%02d:00', $h);
                                $timeSlots[] = sprintf('%02d:30', $h);
                            }
                        @endphp

                        <div class="tab-pane fade show active" id="implant-panel" role="tabpanel">
                            @include('auth.clinic.partials.schedule-grid', ['type' => 'implant', 'days' => $days, 'timeSlots' => $timeSlots])
                        </div>

                        <div class="tab-pane fade" id="veneer-panel" role="tabpanel">
                            @include('auth.clinic.partials.schedule-grid', ['type' => 'veneer', 'days' => $days, 'timeSlots' => $timeSlots])
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-white px-4">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary px-4 fw-semibold">
                        <i class="fas fa-save me-1"></i> Lưu & Áp Dụng Lịch Tuần
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function setScheduleType(type) {
    document.getElementById('selected_schedule_type').value = type;
}

function updateSlotStyle(checkbox) {
    const label = checkbox.closest('label');
    if (checkbox.checked) {
        label.classList.remove('btn-outline-secondary');
        label.classList.add('btn-primary');
    } else {
        label.classList.remove('btn-primary');
        label.classList.add('btn-outline-secondary');
    }
}

function toggleWholeDay(type, dayIndex, isChecked) {
    const container = document.getElementById(`slots_container_${type}_${dayIndex}`);
    const checkboxes = container.querySelectorAll('.slot-checkbox');
    checkboxes.forEach(cb => {
        cb.checked = isChecked;
        updateSlotStyle(cb);
    });
}
</script>
@endsection