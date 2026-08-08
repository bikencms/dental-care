<!-- SECTION 1: SERVICES OFFERED -->
<div class="card border-0 shadow-sm rounded-3 p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
        <h4 class="fw-bold text-dark mb-0">
            <i class="fas fa-concierge-bell text-primary me-2"></i>Services Offered
        </h4>
        <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addServiceModal">
            <i class="fas fa-plus fs-7"></i> Add Service
        </button>
    </div>
    
    <div class="row row-cols-1 row-cols-md-2 g-3">
        @forelse($clinic->services as $service)
        <div class="col">
            <div class="p-3 border rounded-3 bg-light h-100 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold text-dark mb-1">{{ $service->name }}</h6>
                    @if(isset($service->category))
                        <span class="badge bg-secondary-subtle text-secondary border fs-8 mb-1">{{ $service->category }}</span>
                    @endif
                    <p class="text-muted small mb-0">{{ Str::limit($service->description ?? 'Professional dental care service.', 60) }}</p>
                </div>
                @if(isset($service->pivot->starting_price))
                <div class="text-end ms-2">
                    <span class="badge bg-success-subtle text-success fw-bold d-block">
                        VND{{ number_format($service->pivot->starting_price) }}
                    </span>
                    @if($service->pivot->unit)
                        <span class="text-muted small" style="font-size: 0.75rem;">/ {{ $service->pivot->unit }}</span>
                    @endif
                </div>
                @endif
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="p-4 border border-dashed rounded-3 text-center bg-light">
                <i class="fas fa-concierge-bell text-muted fs-3 mb-2 d-block"></i>
                <p class="text-muted small mb-3">No services listed for this clinic yet.</p>
                <button type="button" class="btn btn-sm btn-primary fw-semibold px-3 d-inline-flex align-items-center gap-2 mx-auto" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                    <i class="fas fa-plus"></i> Add First Service
                </button>
            </div>
        </div>
        @endforelse
    </div>
</div>
<!-- BOOTSTRAP 5 MODAL: ADD SERVICE -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold text-white" id="addServiceModalLabel">
                    <i class="fas fa-concierge-bell me-2"></i>Add Service to Clinic
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('my-clinic.services.store', $clinic->id) }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    
                    <!-- Service Name -->
                    <div class="mb-3">
                        <label for="serviceName" class="form-label fw-semibold">Service Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="serviceName" name="name" required placeholder="e.g. Teeth Whitening">
                    </div>

                    <!-- Service Slug (Auto-generated) -->
                    <div class="mb-3">
                        <label for="serviceSlug" class="form-label fw-semibold">Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-light" id="serviceSlug" name="slug" required placeholder="teeth-whitening">
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="serviceCategory" class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="serviceCategory" name="category" required placeholder="e.g. Cosmetic Dentistry, Orthodontics">
                    </div>

                    <hr class="my-3 text-muted opacity-25">

                    <!-- ClinicService Pivot Data -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="startingPrice" class="form-label fw-semibold">Starting Price (VND) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0" class="form-control" id="startingPrice" required name="starting_price" required placeholder="e.g. 150">
                        </div>
                        <div class="col-md-6">
                            <label for="serviceUnit" class="form-label fw-semibold">Unit <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="serviceUnit" name="unit" required placeholder="e.g. tooth, session, package">
                        </div>
                    </div>

                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-bold">
                        <i class="fas fa-save me-1"></i> Save Service
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- JS Auto-Slugify cho Service Name -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const serviceNameInput = document.getElementById('serviceName');
    const serviceSlugInput = document.getElementById('serviceSlug');

    if (serviceNameInput && serviceSlugInput) {
        serviceNameInput.addEventListener('input', function () {
            let title = this.value;
            let slug = title.toLowerCase()
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .replace(/đ/g, 'd').replace(/Đ/g, 'd')
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            serviceSlugInput.value = slug;
        });
    }
});
</script>