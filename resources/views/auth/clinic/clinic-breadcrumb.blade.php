<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="/dashboard/clinic">Clinic</a></li>
                @if(isset($clinic->name))
                <li class="breadcrumb-item active" aria-current="page">{{ $clinic->name }}</li>
                @endif
            </ol>
        </nav>
    </div>
    
    <div class="btn-toolbar mb-2 mb-md-0 d-flex align-items-center gap-2">
        <!-- 1. Nút New Clinic -->
        <button type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#createClinicModal">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg> 
            New Clinic
        </button>
    
        <!-- 2. NÚT PREVIEW -->
        <a href="{{ isset($clinic) ? route('my-clinic.preview', $clinic->id) : '#' }}" target="_blank" class="btn btn-sm btn-outline-info d-inline-flex align-items-center">
            <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
            Preview
        </a>

        <!-- 3. NÚT PUBLIC / UNPUBLISH -->
        @if (!$clinic->is_published)
            <!-- 3A. NÚT PUBLIC (Draft -> Public) -->
            <form action="{{ route('my-clinic.publish', $clinic->id) }}" method="POST" class="d-inline-flex align-items-center m-0">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-sm btn-success text-white fw-bold d-inline-flex align-items-center px-3 shadow-sm btn-publish">
                    <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Publish Clinic
                </button>
            </form>
        @else
            <!-- 3B. NÚT UNPUBLISH (Public -> Draft) -->
            <form action="{{ route('my-clinic.unpublish', $clinic->id) }}" method="POST" class="d-inline-flex align-items-center m-0" onsubmit="return confirm('Bạn có chắc muốn đưa clinic này về dạng bản nháp?');">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-sm btn-warning text-dark fw-bold d-inline-flex align-items-center px-3 shadow-sm">
                    <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                    </svg>
                    Unpublish
                </button>
            </form>
        @endif
    </div>
</div>

<!-- CSS bổ sung để tăng hiệu ứng thị giác cho nút Public -->
<style>
    .btn-publish {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border: none;
        transition: all 0.25s ease-in-out;
    }
    .btn-publish:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.35) !important;
    }
</style>
<!-- BOOTSTRAP 5 MODAL: CREATE NEW CLINIC -->
<div class="modal fade" id="createClinicModal" tabindex="-1" aria-labelledby="createClinicModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header bg-gray-800 text-white">
                <h5 class="modal-title fw-bold text-white" id="createClinicModalLabel">
                    <i class="fas fa-clinic-medical me-2"></i>Add New Clinic
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('dashboard.clinic.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    
                    <!-- Row 1: Name & Slug -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="clinicName" class="form-label fw-semibold">Clinic Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="clinicName" name="name" required placeholder="e.g. Elite Dental Clinic">
                        </div>
                        <div class="col-md-6">
                            <label for="clinicSlug" class="form-label fw-semibold">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control bg-light" id="clinicSlug" name="slug" required placeholder="elite-dental-clinic">
                        </div>
                    </div>

                    <!-- Row 2: City & District -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="clinicCity" class="form-label fw-semibold">City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="clinicCity" name="city" required placeholder="e.g. Ho Chi Minh City">
                        </div>
                        <div class="col-md-6">
                            <label for="clinicDistrict" class="form-label fw-semibold">District <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="clinicDistrict" name="district" required placeholder="e.g. District 1">
                        </div>
                    </div>

                    <!-- Row 3: Detail Address -->
                    <div class="mb-3">
                        <label for="clinicAddress" class="form-label fw-semibold">Full Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="clinicAddress" name="address" required placeholder="e.g. 51B Tu Xuong, Ward 7">
                    </div>

                    <!-- Row 4: Image File Upload -->
                    <div class="mb-3">
                        <label for="clinicImage" class="form-label fw-semibold">Main Banner / Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="clinicImage" name="image" accept="image/*" required>
                        <div class="form-text text-muted">Upload high quality image for clinic card & banner display.</div>
                    </div>

                    <!-- Row 5: Rating & Review Count (Default values pre-filled) -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="clinicRating" class="form-label fw-semibold">Initial Rating</label>
                            <input type="number" step="0.01" min="1" max="5" class="form-control" id="clinicRating" name="rating" value="5.00">
                        </div>
                        <div class="col-md-6">
                            <label for="clinicReviewCount" class="form-label fw-semibold">Initial Review Count</label>
                            <input type="number" min="0" class="form-control" id="clinicReviewCount" name="review_count" value="0">
                        </div>
                    </div>

                    <!-- Row 6: Description -->
                    <div class="mb-2">
                        <label for="clinicDescription" class="form-label fw-semibold">Short Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="clinicDescription" name="description" rows="3" required placeholder="Brief description (~3 sentences) introducing the clinic service and facilities..."></textarea>
                    </div>

                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gray-800 fw-bold">
                        <i class="fas fa-plus-circle me-1"></i> Save Clinic
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('clinicName');
        const slugInput = document.getElementById('clinicSlug');

        if (nameInput && slugInput) {
            nameInput.addEventListener('input', function () {
                let title = this.value;
                
                // Chuyển sang tiếng Việt không dấu & slugify
                let slug = title.toLowerCase()
                    .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // Bỏ dấu tiếng Việt
                    .replace(/đ/g, 'd').replace(/Đ/g, 'd')
                    .replace(/[^a-z0-9 -]/g, '') // Bỏ ký tự đặc biệt
                    .replace(/\s+/g, '-') // Thay khoảng trắng bằng dấu gạch ngang
                    .replace(/-+/g, '-'); // Bỏ dấu gạch ngang trùng lặp

                slugInput.value = slug;
            });
        }
    });
</script>