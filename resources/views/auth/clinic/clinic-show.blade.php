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
            @include('auth.clinic.partials.recurring',
            [
                'clinicId' => $clinicId, 
                'schedules' => $schedules, 
                'currentMonth' => $currentMonth, 
                'nextMonth' => $nextMonth,
                'currentDuration' => $currentDuration,
                'currentMaxPatients' => $currentMaxPatients,
                'currentServiceType' => $currentServiceType   
            ])
        </div>
    </div>
</div>

@include('auth.clinic.partials.tab', ['clinic' => $clinic])

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