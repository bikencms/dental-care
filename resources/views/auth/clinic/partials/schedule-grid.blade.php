<div class="d-flex flex-column gap-3">
    @foreach($days as $dayIndex => $dayName)
        <div class="card border border-light-subtle rounded-3 shadow-sm">
            <div class="card-header bg-white py-2 d-flex justify-content-between align-items-center">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input day-toggle" type="checkbox" id="day_{{ $type }}_{{ $dayIndex }}" 
                           onchange="toggleWholeDay('{{ $type }}', {{ $dayIndex }}, this.checked)">
                    <label class="form-check-label fw-bold text-dark" for="day_{{ $type }}_{{ $dayIndex }}">
                        {{ $dayName }}
                    </label>
                </div>
                <small class="text-muted">Nhấp vào từng ô giờ 30 phút để Bật/Tắt nhanh</small>
            </div>
            <div class="card-body p-2 bg-light">
                <div class="d-flex flex-wrap gap-2" id="slots_container_{{ $type }}_{{ $dayIndex }}">
                    @foreach($timeSlots as $time)
                        @php
                            // Kiểm tra active sẵn trong DB (nếu có dữ liệu)
                            $isActive = isset($existingSchedules[$type][$dayIndex][$time]) && $existingSchedules[$type][$dayIndex][$time];
                        @endphp
                        <label class="btn btn-sm {{ $isActive ? 'btn-primary' : 'btn-outline-secondary' }} slot-btn" 
                               style="width: 75px;" 
                               id="btn_{{ $type }}_{{ $dayIndex }}_{{ str_replace(':', '', $time) }}">
                            <input type="checkbox" 
                                   name="schedules[{{ $type }}][{{ $dayIndex }}][{{ $time }}]" 
                                   value="1" 
                                   class="d-none slot-checkbox"
                                   {{ $isActive ? 'checked' : '' }}
                                   onchange="updateSlotStyle(this)">
                            {{ $time }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>