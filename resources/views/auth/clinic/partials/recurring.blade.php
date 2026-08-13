@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <strong>Thành công!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
<div class="d-flex gap-2 pt-4 border-top align-items-center flex-wrap">
    <!-- Nút Cấu hình lịch cố định (To, nổi bật, mở Modal) -->
    <button type="button" 
            class="btn btn-primary btn-lg px-4 py-2 fw-bold shadow-sm d-flex align-items-center btn-hover-elevate" 
            data-bs-toggle="modal" 
            data-bs-target="#scheduleConfigModal">
        <i class="fas fa-calendar-alt fs-5 me-2"></i> 
        Cấu hình lịch khám
    </button>
</div>
<!-- Modal Popup Cấu hình lịch khám -->
<div class="modal fade" id="scheduleConfigModal" tabindex="-1" aria-labelledby="scheduleConfigModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- modal-xl để form rộng rãi -->
        <div class="modal-content border-0 shadow-lg">
            
            <div class="container bg-white p-4 rounded shadow-sm">
                <div class="mb-4 border-bottom pb-3">
                    <h3 class="fw-bold text-primary mb-1">Cấu Hình Lịch Cố Định - Phòng Khám #{{ $clinicId }}</h3>
                    <p class=" mb-0 text-danger">
                        Cấu hình khung giờ hoạt động định kỳ theo ngày trong tuần. 
                        Khung giờ này sẽ tự động **áp dụng từ {{ date('d') }}/{{ $currentMonth }} trở về sau**.
                    </p>
                </div>

                <form action="{{ route('dashboard.clinic.recurring.store', ['id' => $clinicId]) }}" method="POST">
                    @csrf

                    <!-- Cấu hình chung -->
                    <div class="row g-3 p-3 bg-light rounded border mb-4 position-relative">
                        <!-- Spinner loading khi gọi API -->
                        <div id="loading-overlay" class="position-absolute top-0 start-0 w-100 h-100 bg-white bg-opacity-75 d-none justify-content-center align-items-center" style="z-index: 10;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Đang tải...</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Dịch vụ áp dụng:</label>
                            <!-- Thêm ID select_service_type -->
                            <select name="service_type" id="select_service_type" class="form-select border-primary fw-semibold">
                                <option value="implant" {{ (old('service_type', $currentServiceType ?? '') == 'implant') ? 'selected' : '' }}>Trồng Răng Implant</option>
                                <option value="veneers" {{ (old('service_type', $currentServiceType ?? '') == 'veneers') ? 'selected' : '' }}>Dán Sứ Veneers</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Thời lượng 1 ca (phút):</label>
                            <!-- Thêm ID input_slot_duration -->
                            <select name="slot_duration_minutes" id="input_slot_duration" class="form-select">
                                <option value="15">15 phút / ca</option>
                                <option value="30">30 phút / ca</option>
                                <option value="45">45 phút / ca</option>
                                <option value="60">60 phút / ca</option>
                                <option value="90">90 phút / ca</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Số bệnh nhân tối đa / ca:</label>
                            <!-- Thêm ID input_max_patients -->
                            <input type="number" name="max_patients_per_slot" id="input_max_patients" class="form-control" 
                                value="{{ old('max_patients_per_slot', $currentMaxPatients ?? 1) }}" min="1" required>
                        </div>
                    </div>

                    <!-- Bảng thiết lập khung giờ -->
                    <h5 class="fw-bold text-secondary mb-3">Cấu hình theo các ngày trong tuần</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px;" class="text-center">Mở</th>
                                    <th style="width: 150px;">Ngày trong tuần</th>
                                    <th>Giờ Bắt Đầu</th>
                                    <th>Giờ Kết Thúc</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                @endphp

                                @foreach($days as $dayCode => $dayName)
                                @php
                                    $existingSchedule = isset($schedules[$dayCode]) ? $schedules[$dayCode]->first() : null;
                                    $isActive = $existingSchedule ? $existingSchedule->is_active : true;
                                    $startTime = $existingSchedule ? substr($existingSchedule->start_time, 0, 5) : '07:00';
                                    $endTime = $existingSchedule ? substr($existingSchedule->end_time, 0, 5) : '19:00';
                                @endphp
                                <tr id="row_day_{{ $dayCode }}">
                                    <td class="text-center">
                                        <input type="hidden" name="schedules[{{ $dayCode }}][day_of_week]" value="{{ $dayCode }}">
                                        <input class="form-check-input day-checkbox" type="checkbox" 
                                            name="schedules[{{ $dayCode }}][is_active]" value="1" 
                                            id="day_{{ $dayCode }}" {{ $isActive ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <label for="day_{{ $dayCode }}" class="fw-bold text-dark cursor-pointer mb-0">
                                            {{ $dayName }}
                                        </label>
                                    </td>
                                    <td>
                                        <input type="time" name="schedules[{{ $dayCode }}][start_time]" 
                                            class="form-control start-time" value="{{ $startTime }}" 
                                            {{ $isActive ? 'required' : 'disabled' }}>
                                    </td>
                                    <td>
                                        <input type="time" name="schedules[{{ $dayCode }}][end_time]" 
                                            class="form-control end-time" value="{{ $endTime }}" 
                                            {{ $isActive ? 'required' : 'disabled' }}>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="reset" class="btn btn-secondary">Đặt Lại</button>
                        <button type="submit" class="btn btn-primary fw-bold px-4">Lưu & Áp Dụng Lịch</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<style>
    /* Hiệu ứng nổi bật cho nút chính */
    .btn-hover-elevate {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        border: none;
        transition: all 0.3s ease !important;
    }

    .btn-hover-elevate:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(13, 110, 253, 0.3) !important;
        background: linear-gradient(135deg, #0b5ed7 0%, #084298 100%);
    }

    /* Bo góc mềm mại cho modal */
    #scheduleConfigModal .modal-content {
        border-radius: 12px;
        overflow: hidden;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        const clinicId = "{{ $clinicId }}";
        const apiUrl = "{{ route('clinic.recurring.by_service', ['id' => $clinicId]) }}";

        // Xử lý Checkbox Bật/Tắt hàng ngày
        $(document).on('change', '.day-checkbox', function() {
            const row = $(this).closest('tr');
            const isDisabled = !$(this).is(':checked');
            
            row.find('.start-time, .end-time').prop('disabled', isDisabled).prop('required', !isDisabled);
        });

        // Xử lý Gọi API khi thay đổi Service Type
        $('#select_service_type').on('change', function() {
            const selectedService = $(this).val();
            $('#loading-overlay').removeClass('d-none').addClass('d-flex');

            $.ajax({
                url: apiUrl,
                type: 'GET',
                data: { service_type: selectedService },
                success: function(response) {
                    if (response.success) {
                        // 1. Cập nhật Thời lượng & Số bệnh nhân
                        $('#input_slot_duration').val(response.slot_duration_minutes);
                        $('#input_max_patients').val(response.max_patients_per_slot);

                        // 2. Cập nhật lịch từng ngày trong tuần
                        $.each(response.schedules, function(dayCode, data) {
                            const row = $('#row_day_' + dayCode);
                            const checkbox = row.find('.day-checkbox');
                            const startTimeInput = row.find('.start-time');
                            const endTimeInput = row.find('.end-time');

                            checkbox.prop('checked', data.is_active);
                            startTimeInput.val(data.start_time).prop('disabled', !data.is_active).prop('required', data.is_active);
                            endTimeInput.val(data.end_time).prop('disabled', !data.is_active).prop('required', data.is_active);
                        });
                    }
                },
                error: function(xhr) {
                    console.error('Lỗi khi tải dữ liệu lịch:', xhr);
                    alert('Không thể tải cấu hình lịch của dịch vụ này. Vui lòng thử lại!');
                },
                complete: function() {
                    $('#loading-overlay').removeClass('d-flex').addClass('d-none');
                }
            });
        });

        // 🟢 THÊM DÒNG NÀY: Tự động gọi API cho service đang được chọn sẵn (implant) ngay khi trang vừa load xong
        $('#select_service_type').trigger('change');
    });
</script>
