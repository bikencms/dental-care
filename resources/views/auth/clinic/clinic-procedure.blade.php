<div class="card border-0 shadow-sm rounded-3 p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
        <h4 class="fw-bold text-dark mb-0">
            <i class="fas fa-list-check text-primary me-2"></i>Procedures & Treatments
        </h4>
        <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addProcedureModal">
            <i class="fas fa-plus fs-7"></i> Add Procedure
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle border-0 mb-0">
            <thead class="table-light">
                <tr class="fs-7 text-muted text-uppercase">
                    <th scope="col" class="py-3">Procedure Name</th>
                    <th scope="col" class="py-3">Service Category</th>
                    <th scope="col" class="py-3 text-center">Duration</th>
                    <th scope="col" class="py-3 text-end">Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clinic->procedures as $procedure)
                <tr>
                    <!-- Procedure Name -->
                    <td class="fw-semibold text-dark">
                        <i class="fas fa-check-circle text-success me-2 fs-7"></i>{{ $procedure->procedure_name }}
                    </td>
                    
                    <!-- Service Name / Category -->
                    <td>
                        <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-1">
                            {{ $procedure->service->name ?? 'General' }}
                        </span>
                    </td>

                    <!-- Procedure Duration -->
                    <td class="text-center text-muted small">
                        @if($procedure->procedure_duration)
                            <i class="far fa-clock me-1"></i>{{ $procedure->procedure_duration }}
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>

                    <!-- Procedure Price -->
                    <td class="text-end fw-bold text-success">
                        @if($procedure->procedure_price)
                            VND{{ number_format($procedure->procedure_price) }}
                        @else
                            <span class="text-muted small fw-normal">Contact for Quote</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">
                        <div class="p-3 border border-dashed rounded-3 bg-light d-inline-block mw-100" style="min-width: 300px;">
                            <i class="fas fa-list-check text-muted fs-3 mb-2 d-block"></i>
                            <p class="text-muted small mb-3">No specific procedures available at the moment.</p>
                            <button type="button" class="btn btn-sm btn-primary fw-semibold px-3 d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addProcedureModal">
                                <i class="fas fa-plus"></i> Add First Procedure
                            </button>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<!-- BOOTSTRAP 5 MODAL: ADD PROCEDURE -->
<div class="modal fade" id="addProcedureModal" tabindex="-1" aria-labelledby="addProcedureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold text-white" id="addProcedureModalLabel">
                    <i class="fas fa-list-check me-2"></i>Add Clinic Procedure
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('my-clinic.procedures.store', $clinic->id) }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    
                    <!-- Procedure Name -->
                    <div class="mb-3">
                        <label for="procedureName" class="form-label fw-semibold">Procedure Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="procedureName" name="procedure_name" required placeholder="e.g. Tooth Extraction, Laser Whitening">
                    </div>

                    <!-- Service Category (Dropdown select from clinic services) -->
                    <div class="mb-3">
                        <label for="serviceId" class="form-label fw-semibold">Service Category <span class="text-danger">*</span></label>
                        <select class="form-select" id="serviceId" name="service_id" required>
                            <option value="" selected disabled>-- Select Service --</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                        @if($clinic->services->isEmpty())
                            <div class="form-text text-warning">
                                <i class="fas fa-exclamation-triangle me-1"></i>Please add at least one Service first.
                            </div>
                        @endif
                    </div>

                    <div class="row g-3">
                        <!-- Procedure Price -->
                        <div class="col-md-6">
                            <label for="procedurePrice" class="form-label fw-semibold">Price (VND)</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="procedurePrice" name="procedure_price" placeholder="e.g. 250">
                        </div>

                        <!-- Duration -->
                        <div class="col-md-6">
                            <label for="procedureDuration" class="form-label fw-semibold">Duration</label>
                            <input type="text" class="form-control" id="procedureDuration" name="procedure_duration" placeholder="e.g. 45 mins, 1 hour">
                        </div>
                    </div>

                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-bold" @if($clinic->services->isEmpty()) disabled @endif>
                        <i class="fas fa-save me-1"></i> Save Procedure
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>