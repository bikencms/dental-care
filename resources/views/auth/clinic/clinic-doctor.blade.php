<div class="card border-0 shadow-sm rounded-3 p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
        <h4 class="fw-bold text-dark mb-0">
            <i class="fas fa-user-md text-primary me-2"></i>Medical Specialists & Doctors
        </h4>
        <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
            <i class="fas fa-plus fs-7"></i> Add Doctor
        </button>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-3">
        @forelse($clinic->doctors as $doctor)
        <div class="col">
            <div class="card h-100 border-0 shadow-none bg-light p-3 rounded-3">
                <div class="d-flex align-items-start gap-3">
                    <img src="{{ $doctor->avatar ? asset('storage/' . $doctor->avatar) : asset('assets/images/default-doctor.jpg') }}" 
                         class="rounded-circle img-thumbnail flex-shrink-0" 
                         style="width: 70px; height: 70px; object-fit: cover;" 
                         alt="{{ $doctor->name }}">
                    <div class="flex-grow-1">
                        <h6 class="fw-bold text-dark mb-1">{{ $doctor->name }}</h6>
                        <span class="badge bg-primary-subtle text-primary mb-2">
                            {{ $doctor->title ?? 'Specialist' }}
                        </span>
                        
                        <!-- Badges hiển thị tiêu chí bác sĩ -->
                        <div class="d-flex flex-wrap gap-1">
                            @if($doctor->is_expert_10_years)
                                <span class="badge bg-success-subtle text-success border border-success-subtle fs-8">
                                    <i class="fas fa-award me-1"></i>10+ Yrs Exp.
                                </span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle fs-8">
                                    <i class="fas fa-user-clock me-1"></i>5+ Yrs Exp.
                                </span>
                            @endif

                            @if($doctor->has_high_degree)
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle fs-8">
                                    <i class="fas fa-user-graduate me-1"></i>High Degree
                                </span>
                            @endif

                            @if($doctor->has_studied_abroad)
                                <span class="badge bg-info-subtle text-info border border-info-subtle fs-8">
                                    <i class="fas fa-globe-americas me-1"></i>Abroad Trained
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="p-4 border border-dashed rounded-3 text-center bg-light">
                <i class="fas fa-user-md text-muted fs-3 mb-2 d-block"></i>
                <p class="text-muted small mb-3">No doctor profiles currently available.</p>
                <button type="button" class="btn btn-sm btn-primary fw-semibold px-3 d-inline-flex align-items-center gap-2 mx-auto" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                    <i class="fas fa-plus"></i> Add First Doctor
                </button>
            </div>
        </div>
        @endforelse
    </div>
</div>
<!-- BOOTSTRAP 5 MODAL: ADD DOCTOR -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold text-white" id="addDoctorModalLabel">
                    <i class="fas fa-user-md me-2"></i>Add Doctor Profile
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('my-clinic.doctors.store', $clinic->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    
                    <!-- Doctor Name -->
                    <div class="mb-3">
                        <label for="doctorName" class="form-label fw-semibold">Doctor Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="doctorName" name="name" required placeholder="e.g. Dr. John Doe">
                    </div>

                    <!-- Title / Specialty -->
                    <div class="mb-3">
                        <label for="doctorTitle" class="form-label fw-semibold">Title / Specialty</label>
                        <input type="text" class="form-control" id="doctorTitle" name="title" placeholder="e.g. Specialist In Orthodontics, Chief Surgeon">
                    </div>

                    <!-- Qualifications / Features Checklist -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold mb-2">Qualifications & Experience</label>
                        <div class="border rounded-2 p-3 bg-light d-flex flex-column gap-2">
                            
                            <!-- 10+ Years Experience -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_expert_10_years" id="isExpert10" value="1">
                                <label class="form-check-label fw-medium text-dark" for="isExpert10">
                                    <i class="fas fa-award text-success me-1"></i> 10+ Years of Experience
                                </label>
                            </div>

                            <!-- High Degree -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="has_high_degree" id="hasHighDegree" value="1">
                                <label class="form-check-label fw-medium text-dark" for="hasHighDegree">
                                    <i class="fas fa-user-graduate text-warning me-1"></i> High Degree (Master, PhD, Specialist Degree)
                                </label>
                            </div>

                            <!-- Studied Abroad -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="has_studied_abroad" id="hasStudiedAbroad" value="1">
                                <label class="form-check-label fw-medium text-dark" for="hasStudiedAbroad">
                                    <i class="fas fa-globe-americas text-info me-1"></i> Studied / Trained Abroad
                                </label>
                            </div>

                        </div>
                    </div>

                    <!-- Avatar Upload -->
                    <div class="mb-3">
                        <label for="doctorAvatar" class="form-label fw-semibold">Profile Photo / Avatar</label>
                        <input type="file" class="form-control" id="doctorAvatar" name="avatar" accept="image/*">
                        <div class="form-text">Recommended: Square image ratio (e.g. 300x300px).</div>
                    </div>

                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-bold">
                        <i class="fas fa-save me-1"></i> Save Doctor
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>