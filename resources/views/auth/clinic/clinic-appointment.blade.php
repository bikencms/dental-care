<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Quản Lý & Khóa Lịch Theo clinic_schedules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container bg-white p-4 rounded shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
            <h3 class="fw-bold text-danger mb-1">Admin Dashboard - Quản Lý Lịch Làm Việc</h3>
            <p class="text-muted small mb-0">Quản lý trạng thái is_active theo ngày trong tuần & dịch vụ</p>
        </div>
        
        <!-- Bộ lọc Loại Dịch Vụ -->
        <div class="d-flex align-items-center gap-2">
            <label for="service_type_filter" class="fw-bold text-nowrap">Dịch vụ:</label>
            <select id="service_type_filter" class="form-select border-primary fw-semibold">
                <option value="implant">Trồng Răng Implant</option>
                <option value="veneers">Dán Sứ Veneers</option>
            </select>
        </div>
    </div>

    <div id="adminCalendar"></div>
</div>

<!-- Modal Admin Block / Unblock Khung Giờ Cố Định -->
<div class="modal fade" id="blockModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title fw-bold">Cập Nhật Trạng Thái Lịch</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="blockForm">
                    <input type="hidden" id="clinic_id" name="clinic_id" value="{{ $clinicId ?? 1 }}">
                    <input type="hidden" id="block_service_type" name="service_type">
                    <input type="hidden" id="block_day_of_week" name="day_of_week">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Thông tin ngày chọn:</label>
                        <div id="block_day_display" class="p-2 bg-light border rounded text-danger fw-bold"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hành động:</label>
                        <select name="is_active" id="block_is_active" class="form-select">
                            <option value="0">🔒 Khóa/Tắt Lịch (is_active = 0)</option>
                            <option value="1">🟢 Mở/Bật Lịch (is_active = 1)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ghi chú lý do (Nội bộ)</label>
                        <input type="text" class="form-control" name="note" placeholder="Ví dụ: Nghỉ định kỳ, Bảo trì phòng...">
                    </div>

                    <button type="submit" class="btn btn-danger w-100 fw-bold">Xác Nhận Cập Nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('adminCalendar');
    const blockModal = new bootstrap.Modal(document.getElementById('blockModal'));

    // Mảng tên các ngày trong tuần
    const daysOfWeekNames = [
        'Chủ Nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'
    ];

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay'
        },
        allDaySlot: false,
        selectable: true,
        selectOverlap: true,
        
        // Tải slots từ API
        events: function(fetchInfo, successCallback, failureCallback) {
            $.ajax({
                url: '/api/v1/appointments/slots',
                type: 'GET',
                data: {
                    clinic_id: $('#clinic_id').val(),
                    service_type: $('#service_type_filter').val(),
                    start: fetchInfo.startStr,
                    end: fetchInfo.endStr
                },
                success: function(response) {
                    successCallback(response);
                },
                error: function() {
                    failureCallback();
                }
            });
        },

        // Khi Admin quét/chọn khung giờ trên lịch
        select: function (info) {
            const startDate = new Date(info.start);
            const dayOfWeek = startDate.getDay(); // 0: Chủ Nhật, 1: Thứ 2, ..., 6: Thứ 7
            const selectedService = $('#service_type_filter').val();

            // Gán dữ liệu vào Modal Form
            $('#block_service_type').val(selectedService);
            $('#block_day_of_week').val(dayOfWeek);

            // Hiển thị thông tin trực quan
            const dateStr = startDate.toLocaleDateString('vi-VN');
            const dayName = daysOfWeekNames[dayOfWeek];
            const serviceName = selectedService === 'implant' ? 'Trồng Răng Implant' : 'Dán Sứ Veneers';

            $('#block_day_display').html(`
                Dịch vụ: <strong>${serviceName}</strong><br>
                Ngày: <strong>${dayName} (${dateStr})</strong><br>
                Mã ngày (day_of_week): <strong>${dayOfWeek}</strong>
            `);

            blockModal.show();
        },

        // Hiển thị thông tin khi click vào sự kiện có sẵn
        eventClick: function(info) {
            const props = info.event.extendedProps;
            if (props && !props.is_blocked) {
                alert(`Thông tin Slot:\nĐã đặt: ${props.booked_count}/${props.max_patients}\nBắt đầu: ${props.slot_start}\nKết thúc: ${props.slot_end}`);
            }
        }
    });

    calendar.render();

    // Sự kiện đổi loại dịch vụ -> Reload lại dữ liệu Lịch
    $('#service_type_filter').on('change', function() {
        calendar.refetchEvents();
    });

    // Submit Block / Unblock Form qua AJAX
    $('#blockForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/api/v1/schedules/toggle-block',
            type: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert(response.message);
                blockModal.hide();
                $('#blockForm')[0].reset();
                calendar.refetchEvents(); // Tải lại calendar sau khi cập nhật
            },
            error: function (xhr) {
                const msg = xhr.responseJSON?.message || 'Không thể cập nhật lịch làm việc!';
                alert(msg);
            }
        });
    });
});
</script>
</body>
</html>