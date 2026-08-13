<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Quản Lý & Khóa Lịch (Overrides)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <style>
        .fc-event { cursor: pointer; }
        .fc-day-past {
            background-color: #f8f9fa !important;
            opacity: 0.8;
        }
    </style>
</head>
<body class="bg-light p-4">

<div class="container bg-white p-4 rounded shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
            <h3 class="fw-bold text-danger mb-1">Admin Dashboard - Quản Lý Ngoại Lệ & Khóa Lịch</h3>
            <p class="text-muted small mb-0">Chỉ cho phép thao tác khóa / mở khóa lịch từ ngày hiện tại trở về sau</p>
        </div>
        
        <div class="d-flex align-items-center gap-3">
            <input type="hidden" id="clinic_id" value="{{ $clinicId ?? 1 }}">
            <div class="d-flex align-items-center gap-2">
                <label for="service_type_filter" class="fw-bold text-nowrap">Dịch vụ:</label>
                <select id="service_type_filter" class="form-select border-primary fw-semibold">
                    <option value="implant">Trồng Răng Implant</option>
                    <option value="veneers">Dán Sứ Veneers</option>
                </select>
            </div>
        </div>
    </div>

    <div id="adminCalendar"></div>
</div>

<!-- Modal Thao Tác Tùy Chỉnh / Khóa Lịch (Overrides) -->
<div class="modal fade" id="overrideModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title fw-bold" id="modalTitle">🔒 Cập Nhật Khóa Lịch / Ngoại Lệ</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="overrideForm">
                    <input type="hidden" id="modal_clinic_id" name="clinic_id">
                    <input type="hidden" id="modal_service_type" name="service_type">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Loại hành động:</label>
                        <select id="action_type" class="form-select fw-semibold border-danger">
                            <option value="block">🔒 Khóa khung giờ (Block Time)</option>
                            <option value="custom_time">⏰ Đổi khung giờ làm việc riêng trong ngày</option>
                            <option value="unblock_full_day">🔓 Mở khóa nguyên ngày (Unblock Full Day)</option>
                        </select>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-semibold">Từ ngày:</label>
                            <input type="date" id="modal_override_date" name="override_date" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-semibold">Đến ngày:</label>
                            <input type="date" id="modal_end_date" name="end_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3 p-3 bg-light border rounded">
                        <div class="text-secondary small mb-1">Thời gian đã chọn:</div>
                        <div id="selected_info_display" class="fw-bold text-danger"></div>
                    </div>

                    <div class="form-check mb-3" id="full_day_container">
                        <input class="form-check-input" type="checkbox" id="is_full_day" name="is_full_day" value="1">
                        <label class="form-check-label fw-semibold" for="is_full_day">
                            Khóa NGUYÊN NGÀY (Không nhận lịch trong khoảng ngày chọn)
                        </label>
                    </div>

                    <div class="row g-2 mb-3" id="time_range_container">
                        <div class="col-6">
                            <label class="form-label small fw-semibold">Giờ Bắt Đầu:</label>
                            <input type="time" id="start_time" name="start_time" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-semibold">Giờ Kết Thúc:</label>
                            <input type="time" id="end_time" name="end_time" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3" id="reason_container">
                        <label class="form-label fw-semibold">Lý do (Bảo trì, Bận, Đổi ca...)</label>
                        <input type="text" id="reason" name="reason" class="form-control" placeholder="Ví dụ: Bận họp / Bảo trì phòng khám">
                    </div>

                    <button type="submit" class="btn btn-danger w-100 fw-bold py-2">Xác Nhận Cập Nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Chi Tiết / Mở Khóa Slot Bị Block (Unblock Modal) -->
<div class="modal fade" id="unblockModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title fw-bold">Chi Tiết Slot Bị Khóa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Ngày:</strong> <span id="unblock_date"></span></p>
                <p><strong>Khung giờ:</strong> <span id="unblock_time"></span></p>
                <p><strong>Lý do khóa:</strong> <span id="unblock_reason" class="text-danger fw-bold"></span></p>
                
                <input type="hidden" id="unblock_override_id">
                <input type="hidden" id="unblock_slot_start">
                <input type="hidden" id="unblock_slot_end">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" id="btnConfirmUnblock" class="btn btn-success fw-bold">🔓 Mở Khóa Slot Trở Lại</button>
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
    const overrideModal = new bootstrap.Modal(document.getElementById('overrideModal'));
    const unblockModal = new bootstrap.Modal(document.getElementById('unblockModal'));

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const formatYMD = (d) => {
        const y = d.getFullYear();
        const m = String(d.getMonth() + 1).padStart(2, '0');
        const day = String(d.getDate()).padStart(2, '0');
        return `${y}-${m}-${day}`;
    };

    const todayStr = formatYMD(today);
    $('#modal_override_date, #modal_end_date').attr('min', todayStr);

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        timeZone: 'local',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay'
        },
        slotDuration: '00:30:00',
        slotMinTime: '07:00:00',
        slotMaxTime: '23:00:00',
        allDaySlot: false,
        selectable: true,
        selectOverlap: true,
        
        selectAllow: function(selectInfo) {
            return selectInfo.start >= today;
        },

        events: function(fetchInfo, successCallback, failureCallback) {
            const startDate = fetchInfo.startStr.split('T')[0];
            const endDate = fetchInfo.endStr.split('T')[0];

            $.ajax({
                url: '/api/v1/appointments/slots',
                type: 'GET',
                data: {
                    clinic_id: $('#clinic_id').val(),
                    service_type: $('#service_type_filter').val(),
                    start: startDate,
                    end: endDate
                },
                success: function(response) {
                    // 🔥 XỬ LÝ FIX LỖI KHÓA NGUYÊN NGÀY:
                    // Chuyển đổi các event khóa nguyên ngày để phủ full khung thời gian làm việc (07:00 - 23:00)
                    const formattedEvents = response.map(evt => {
                        const props = evt.extendedProps || {};
                        
                        // Nếu là khóa nguyên ngày hoặc không có khung giờ cụ thể
                        if (props.is_blocked && (props.is_full_day || !props.slot_start)) {
                            const dateStr = props.appointment_date || (evt.start ? evt.start.split('T')[0] : '');
                            
                            return {
                                ...evt,
                                allDay: false, // Bắt buộc false để render vừa vặn vào lưới timeGrid
                                start: `${dateStr}T07:00:00`,
                                end: `${dateStr}T23:00:00`
                            };
                        }
                        return evt;
                    });

                    successCallback(formattedEvents);
                },
                error: function() {
                    failureCallback();
                }
            });
        },

        eventClick: function(info) {
            const startDateObj = info.event.start;
            
            if (startDateObj < today) {
                alert('Không thể thao tác (Khóa/Mở khóa) trên các ngày đã qua trong quá khứ!');
                return;
            }

            const props = info.event.extendedProps;
            const endDateObj = info.event.end;

            if (props && props.is_blocked) {
                if (props.holiday_id) {
                    alert('Đây là lịch nghỉ lễ chung, không thể hủy khóa tại đây!');
                    return;
                }

                const dateStr = props.appointment_date || startDateObj.toISOString().split('T')[0];
                
                // Hiển thị nhãn thời gian rõ ràng nếu là Nguyên Ngày
                const isFullDay = props.is_full_day || (!props.slot_start && !props.slot_end);
                const timeDisplay = isFullDay ? '🔒 NGUYÊN NGÀY (07:00 - 23:00)' : `${props.slot_start} -${props.slot_end}`;

                $('#unblock_date').text(dateStr);
                $('#unblock_time').text(timeDisplay);
                $('#unblock_reason').text(props.blocked_reason || info.event.title);
                
                $('#unblock_override_id').val(props.override_id || '');
                $('#unblock_slot_start').val(dateStr + ' ' + (props.slot_start || '07:00:00'));
                $('#unblock_slot_end').val(dateStr + ' ' + (props.slot_end || '23:00:00'));
                
                unblockModal.show();
                return;
            }

            openModalWithRange(startDateObj, endDateObj);
        },

        select: function (info) {
            if (info.start < today) {
                alert('Vui lòng chỉ chọn từ ngày hiện tại trở về sau!');
                calendar.unselect();
                return;
            }
            openModalWithRange(info.start, info.end);
        }
    });

    calendar.render();

    function openModalWithRange(startDateObj, endDateObj) {
        const startDateStr = formatYMD(startDateObj);
        
        let tempEndDate = new Date(endDateObj);
        if (tempEndDate.getHours() === 0 && tempEndDate.getMinutes() === 0) {
            tempEndDate.setDate(tempEndDate.getDate() - 1);
        }
        const endDateStr = formatYMD(tempEndDate);

        const startTimeStr = String(startDateObj.getHours()).padStart(2, '0') + ':' + String(startDateObj.getMinutes()).padStart(2, '0');
        const endTimeStr = String(endDateObj.getHours()).padStart(2, '0') + ':' + String(endDateObj.getMinutes()).padStart(2, '0');

        $('#modal_clinic_id').val($('#clinic_id').val());
        $('#modal_service_type').val($('#service_type_filter').val());
        $('#modal_override_date').val(startDateStr);
        $('#modal_end_date').val(endDateStr);
        $('#start_time').val(startTimeStr);
        $('#end_time').val(endTimeStr);
        $('#is_full_day').prop('checked', false);
        $('#time_range_container').show();

        const serviceText = $('#service_type_filter').val() === 'implant' ? 'Trồng Răng Implant' : 'Dán Sứ Veneers';

        $('#selected_info_display').html(`
            Dịch vụ: <strong>${serviceText}</strong><br>
            Khoảng ngày: <strong>${startDateStr}${startDateStr !== endDateStr ? 'đến ' + endDateStr : ''}</strong><br>
            Khung giờ: <strong>${startTimeStr} -${endTimeStr}</strong>
        `);

        overrideModal.show();
    }

    $('#is_full_day').on('change', function() {
        if ($(this).is(':checked')) {
            $('#time_range_container').hide();
            $('#start_time, #end_time').prop('required', false);
        } else {
            $('#time_range_container').show();
            $('#start_time, #end_time').prop('required', true);
        }
    });

    // 1. Xử lý Ẩn/Hiện các trường trên UI theo loại hành động
    $('#action_type').on('change', function() {
        const action = $(this).val();

        if (action === 'block') {
            $('#modalTitle').text('🔒 Khóa Khung Giờ (Block Time)');
            $('#full_day_container').show();
            $('#time_range_container').show();
            $('#reason_container').show();
            $('#start_time, #end_time').prop('required', !$('#is_full_day').is(':checked'));
        } 
        else if (action === 'custom_time') {
            $('#modalTitle').text('⏰ Đổi Khung Giờ Làm Việc Riêng');
            $('#full_day_container').hide();
            $('#is_full_day').prop('checked', false);
            $('#time_range_container').show();
            $('#reason_container').show();
            $('#start_time, #end_time').prop('required', true);
        } 
        else if (action === 'unblock_full_day') {
            $('#modalTitle').text('🔓 Mở Khóa Nguyên Ngày (Xóa tất cả vết khóa)');
            $('#full_day_container').hide();
            $('#is_full_day').prop('checked', false);
            $('#time_range_container').hide();   // Ẩn khung giờ
            $('#reason_container').hide();       // Ẩn lý do
            $('#start_time, #end_time').prop('required', false);
        }
    });

    $('#service_type_filter').on('change', function() {
        calendar.refetchEvents();
    });

    // 2. Cập nhật xử lý Submit Form gửi API
    $('#overrideForm').on('submit', function (e) {
        e.preventDefault();

        const selectedDate = new Date($('#modal_override_date').val());
        selectedDate.setHours(0, 0, 0, 0);
        
        if (selectedDate < today) {
            alert('Ngày được chọn nằm trong quá khứ! Vui lòng chọn từ ngày hiện tại trở đi.');
            return;
        }

        const actionType = $('#action_type').val();
        const clinicId = $('#modal_clinic_id').val();
        const serviceType = $('#modal_service_type').val();
        const startDate = $('#modal_override_date').val();
        const endDate = $('#modal_end_date').val();

        // ========================================================
        // TRƯỜNG HỢP 1: MỞ KHÓA NGUYÊN NGÀY (Gửi API XÓA BẢN GHI)
        // ========================================================
        if (actionType === 'unblock_full_day') {
            if (!confirm(`Bạn có chắc chắn muốn MỞ KHÓA TẤT CẢ các khung giờ bị khóa từ ngày ${startDate} đến ${endDate}?`)) {
                return;
            }

            $.ajax({
                url: '/api/v1/unblock-range', // API endpoint riêng để xóa bản ghi khóa
                type: 'POST', // Hoặc DELETE tùy bạn định nghĩa ở Route
                data: {
                    clinic_id: clinicId,
                    service_type: serviceType,
                    start_date: startDate,
                    end_date: endDate
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert(response.message || 'Đã mở khóa nguyên ngày thành công!');
                    overrideModal.hide();
                    $('#overrideForm')[0].reset();
                    $('#action_type').val('block').trigger('change');
                    calendar.refetchEvents(); // Render lại lịch trên FullCalendar
                },
                error: function (xhr) {
                    alert(xhr.responseJSON?.message || 'Có lỗi xảy ra khi mở khóa lịch!');
                }
            });
            return; // Dừng lại, không chạy xuống đoạn khóa lịch bên dưới
        }

        // ========================================================
        // TRƯỜNG HỢP 2: KHÓA LỊCH / ĐỔI GIỜ TỰ CHỌN (Gửi API TẠO MỚI)
        // ========================================================
        const apiUrl = actionType === 'block' ? '/api/v1/block-time' : '/api/v1/set-custom-time';
        const payload = {
            clinic_id: clinicId,
            service_type: serviceType,
            override_date: startDate,
            end_date: endDate,
            reason: $('#reason').val(),
            is_full_day: $('#is_full_day').is(':checked') ? 1 : 0,
            start_time: $('#start_time').val(),
            end_time: $('#end_time').val()
        };

        $.ajax({
            url: apiUrl,
            type: 'POST',
            data: payload,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert(response.message || 'Cập nhật thành công!');
                overrideModal.hide();
                $('#overrideForm')[0].reset();
                $('#action_type').val('block').trigger('change');
                calendar.refetchEvents();
            },
            error: function (xhr) {
                alert(xhr.responseJSON?.message || 'Có lỗi xảy ra khi cập nhật lịch!');
            }
        });
    });

    $('#btnConfirmUnblock').on('click', function() {
        const overrideId = $('#unblock_override_id').val();
        
        if (!overrideId) {
            alert('Không tìm thấy thông tin ID khung giờ khóa!');
            return;
        }

        if (!confirm('Bạn có chắc chắn muốn mở khóa cho khung giờ này?')) return;

        var clinicId = $('#clinic_id').val();

        $.ajax({
            url: `/api/v1/overrides/${overrideId}`,
            type: 'DELETE',
            data: {
                clinic_id: clinicId,
                service_type: $('#service_type_filter').val(),
                override_id: overrideId
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert(response.message || 'Đã mở khóa khung giờ thành công!');
                unblockModal.hide();
                calendar.refetchEvents();
            },
            error: function(xhr) {
                alert(xhr.responseJSON?.message || 'Lỗi khi hủy khóa lịch!');
            }
        });
    });
});
</script>
</body>
</html>