@extends('layouts.app')
@section('content')
<style>
    /* Hiệu ứng hiển thị Icon Eye khi Rê Chuột (Hover) */
    .btn-view-survey .hover-eye-icon {
        opacity: 0;
        visibility: hidden;
        transform: scale(0.7);
        transition: all 0.25s ease-in-out;
    }

    .btn-view-survey .hover-eye-icon {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
    }
    /* Đảm bảo ảnh lấp đầy khung 180px mà không bị méo/biến dạng */
    .clinic-avatar {
        object-fit: cover;
        object-position: center;
        transition: transform 0.3s ease;
    }

    /* Hiệu ứng zoom nhẹ ảnh khi hover vào card */
    .clinic-card:hover .clinic-avatar {
        transform: scale(1.05);
    }
</style>
@include('auth.clinic.clinic-breadcrumb')
<div class="table-settings mb-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-9 col-lg-8 d-md-flex">
            <div class="input-group me-2 me-lg-3 fmxw-300"><span class="input-group-text"><svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg> </span><input type="text" class="form-control" placeholder="Search clinic"></div><select class="form-select fmxw-200 d-none d-md-inline" aria-label="Message select example 2">
                <option selected="selected">All</option>
                <option value="1">Active</option>
                <option value="2">Delete</option>
            </select>
        </div>
        <div class="col-3 col-lg-4 d-flex justify-content-end">
            <div class="btn-group">
                <div class="dropdown me-1"><button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path>
                        </svg> <span class="visually-hidden">Toggle Dropdown</span></button>
                    <div class="dropdown-menu dropdown-menu-end pb-0" style=""><span class="small ps-3 fw-bold text-dark">Show</span> <a class="dropdown-item d-flex align-items-center fw-bold" href="#">10 <svg class="icon icon-xxs ms-auto" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg></a><a class="dropdown-item fw-bold" href="#">20</a> <a class="dropdown-item fw-bold rounded-bottom" href="#">30</a></div>
                </div>
                <div class="dropdown"><button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                        </svg> <span class="visually-hidden">Toggle Dropdown</span></button>
                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end pb-0"><span class="small ps-3 fw-bold text-dark">Show</span> <a class="dropdown-item d-flex align-items-center fw-bold" href="#">10 <svg class="icon icon-xxs ms-auto" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg></a><a class="dropdown-item fw-bold" href="#">20</a> <a class="dropdown-item fw-bold rounded-bottom" href="#">30</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-body shadow border-0 table-wrapper table-responsive">
    <div class="d-flex mb-3">
        <select class="form-select fmxw-200" aria-label="Message select example">
            <option selected="selected">Bulk Action</option>
            <option value="3">Delete</option>
        </select>
        <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
        @foreach($clinics as $clinic)
        <div class="col">
            <div class="card h-100 shadow-sm border-0 position-relative clinic-card hover-elevation">
                <!-- Header Card: Checkbox & Rating Badge -->
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pt-3 px-3">
                    <div class="form-check dashboard-check">
                        <input class="form-check-input" type="checkbox" value="{{ $clinic->id }}" id="clinicCheck{{ $clinic->id ?? $loop->index }}">
                        <label class="form-check-label" for="clinicCheck{{ $clinic->id ?? $loop->index }}"></label>
                    </div>
                    
                    <!-- Rating Badge -->
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success text-dark px-2 py-1 fw-bold d-flex align-items-center gap-1 me-2">
                        <svg class="icon icon-xxs" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"></path>
                        </svg>
                        <span class="fw-normal text-white fw-semibold">{{ number_format($clinic->rating ?? 0, 1) }}</span>
                        </span>
                        <span class="badge bg-warning text-dark px-2 py-1 fw-bold d-flex align-items-center gap-1">
                            <svg class="icon icon-xxs" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"></path>
                            </svg>
                            <span class="fw-normal text-white text-muted">{{ $clinic->review_count ?? 0 }} </span>
                        </span>
                    </div>
                </div>

                <!-- Body Card: Ảnh & Thông tin phòng khám -->
                <div class="card-body text-center pt-0 px-3">
                    <!-- Banner / Image Clinic -->
                    <div class="clinic-image-wrapper mx-auto mb-3 rounded-3 overflow-hidden bg-light" style="height: 180px;">
                        <img src="{{ $clinic->image ? asset('storage/' . $clinic->image) : asset('assets/images/default-clinic.jpg') }}" 
                            class="w-100 h-100 clinic-avatar" 
                            alt="{{ $clinic->name }}">
                    </div>

                    <!-- Tên phòng khám -->
                    <h5 class="card-title fw-bold text-dark mb-2 text-truncate" title="{{ $clinic->name }}">
                        {{ $clinic->name }}
                    </h5>

                    <!-- Thành phố & Quận/Huyện -->
                    <p class="text-primary small mb-2 fw-semibold">
                        <i class="fas fa-map-marker-alt me-1"></i>{{ $clinic->district }}, {{ $clinic->city }}
                    </p>

                    <!-- Địa chỉ chi tiết -->
                    <p class="text-muted small mb-3 text-truncate" title="{{ $clinic->address }}">
                        <i class="fas fa-location-dot me-1"></i>{{ $clinic->address }}
                    </p>
                </div>

                <!-- Footer Card: Action Buttons -->
                <div class="card-footer bg-light border-0 p-3 text-center">
                    <a href="{{ route('dashboard.clinic.show', [ 'id' => $clinic->id ]) }}" 
                    class="btn btn-outline-primary btn-sm w-100 btn-view-clinic d-flex align-items-center justify-content-center gap-2">
                        <span>View Clinic Details</span>
                        <svg class="icon icon-xs hover-eye-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        {{ $clinics->links() }}
    </div>
</div>
@endsection