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

    .btn-view-survey:hover .hover-eye-icon {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
    }
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Appointment</li>
            </ol>
        </nav>
        <h2 class="h4">Appointment List</h2>
        <p class="mb-0">Manager Appointment</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0"><a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"><svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg> New Appointment</a>
        <div class="btn-group ms-2 ms-lg-3"><button type="button" class="btn btn-sm btn-outline-gray-600">Share</button> <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button></div>
    </div>
</div>
<div class="table-settings mb-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-9 col-lg-8 d-md-flex">
            <div class="input-group me-2 me-lg-3 fmxw-300"><span class="input-group-text"><svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg> </span><input type="text" class="form-control" placeholder="Search appointment"></div><select class="form-select fmxw-200 d-none d-md-inline" aria-label="Message select example 2">
                <option selected="selected">All</option>
                <option value="1">Pending</option>
                <option value="2">Confirmed</option>
                <option value="3">Finished</option>
                <option value="3">Cancelled</option>
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
            <option value="1">Send Email</option>
            <option value="2">Change Group</option>
            <option value="3">Delete User</option>
        </select>
        <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button>
    </div>
    <table class="table user-table table-hover align-items-center">
    <thead>
        <tr>
            <th class="border-bottom">
                <div class="form-check dashboard-check">
                    <input class="form-check-input" type="checkbox" value="" id="userCheck55">
                    <label class="form-check-label" for="userCheck55"></label>
                </div>
            </th>
            <th class="border-bottom">Status</th>
            <th class="border-bottom">Full Name</th>
            <th class="border-bottom">Interested Service</th>
            <th class="border-bottom">View Consultation Assessments</th>
            <th class="border-bottom">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>
                <div class="form-check dashboard-check">
                    <input class="form-check-input" type="checkbox" value="" id="userCheck{{ $user->id ?? $loop->index }}">
                    <label class="form-check-label" for="userCheck{{ $user->id ?? $loop->index }}"></label>
                </div>
            </td>
            <td>
                <span class="fw-normal 
                @switch($user->status)
                    @case('new') text-info @break
                    @case('pending') text-warning @break
                    @case('confirmed') text-success @break
                    @default text-secondary
                @endswitch
                ">{{ ucfirst($user->status) }}</span>
            </td>
            <td>
                <a href="#" class="d-flex align-items-center">
                    <img src="{{ $user->avatar ?? '../assets/img/team/profile-picture-1.jpg' }}" class="avatar rounded-circle me-3" alt="Avatar">
                    <div class="d-block">
                        <span class="fw-bold">{{ $user->fullname }} ({{ $user->phone }})</span>
                        <div class="small text-gray">{{ $user->email }}</div>
                    </div>
                </a>
            </td>
            <td>
                @if( count($user->interest) == 1 && in_array('dental_implants', (array)($user->interest ?? [])) )
                <span class="fw-normal badge bg-primary">
                    Implant
                </span>
                @elseif( count($user->interest) >= 2 )
                <span class="fw-normal badge bg-secondary">
                    Both
                </span>
                @else
                <span class="fw-normal badge bg-info">
                    Veneers
                </span>
                @endif
            </td>
            <td>
                @if($user->consultationAssessment)
                <!-- Nút hiển thị icon Eye khi Hover -->
                <button type="button" 
                        class="btn btn-sm btn-outline-primary btn-view-survey d-inline-flex align-items-center gap-2"
                        data-bs-toggle="modal" 
                        data-bs-target="#surveyModal"
                        data-fullname="{{ $user->fullname }}"
                        data-arrival-date="{{ $user->consultationAssessment->arrival_date ?? 'N/A' }}"
                        data-stay-length="{{ $user->consultationAssessment->length_of_stay ?? 'N/A' }}"
                        data-missing-teeth="{{ $user->consultationAssessment->missing_teeth_duration ?? 'N/A' }}"
                        data-health-condition="{{ $user->consultationAssessment->health_condition ?? 'Neither' }}">
                    <span class="text-truncate" style="max-width: 180px;">{{ $user->briefly ?? 'View Survey' }}</span>
                    <svg class="icon icon-xs hover-eye-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                @endif
            </td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg> View Details
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z"></path>
                            </svg> Suspend
                        </a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- BOOTSTRAP 5 MODAL: SURVEY CONSULTATION ASSESSMENTS -->
<div class="modal fade" id="surveyModal" tabindex="-1" aria-labelledby="surveyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold text-white" id="surveyModalLabel">
                    Consultation Assessment — <span id="modalPatientName" class="text-warning"></span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                
                <!-- PART 1: TRAVEL & SCHEDULE INFORMATION -->
                <div class="card border-0 bg-light rounded-3 p-3 mb-4">
                    <h6 class="fw-bold text-primary mb-3">
                        <i class="fas fa-plane-departure me-2"></i>Part 1: Travel & Schedule Information
                    </h6>
                    <p class="text-muted small mb-3">
                        1. What is your expected arrival date in Vietnam, and how long do you plan to stay? 
                        <br><em>(Note: Approximate dates are perfectly fine if you haven't booked flights yet).</em>
                    </p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Expected Arrival Date <span class="text-danger">*</span></label>
                            <div class="form-control bg-white" id="modalArrivalDate">N/A</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Length of Stay <span class="text-danger">*</span></label>
                            <div class="form-control bg-white" id="modalStayLength">N/A</div>
                        </div>
                    </div>
                </div>

                <!-- PART 2: MEDICAL & DENTAL ASSESSMENT -->
                <div class="card border-0 bg-light rounded-3 p-3">
                    <h6 class="fw-bold text-primary mb-3">
                        <i class="fas fa-user-md me-2"></i>Part 2: Medical & Dental Assessment
                    </h6>
                    
                    <!-- Câu 2 -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">
                            2. How long have you been missing the tooth/teeth? <span class="text-danger">*</span>
                        </label>
                        <div class="d-flex flex-column gap-2 ms-2" id="modalMissingTeethGroup">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" disabled id="teeth_less_6m">
                                <label class="form-check-label text-dark" for="teeth_less_6m">Less than 6 months</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" disabled id="teeth_6m_2y">
                                <label class="form-check-label text-dark" for="teeth_6m_2y">6 months – 2 years</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" disabled id="teeth_more_2y">
                                <label class="form-check-label text-dark" for="teeth_more_2y">More than 2 years</label>
                            </div>
                        </div>
                    </div>

                    <!-- Câu 3 -->
                    <div>
                        <label class="form-label fw-bold text-dark mb-1">
                            3. Do you currently have Diabetes or smoke tobacco? <span class="text-danger">*</span>
                        </label>
                        <div class="form-text text-muted mb-2">
                            (This information is essential for our specialists to ensure the highest success rate for your implants).
                        </div>
                        <div class="d-flex flex-column gap-2 ms-2" id="modalHealthGroup">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" disabled id="health_neither">
                                <label class="form-check-label text-dark" for="health_neither">Neither</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" disabled id="health_diabetes">
                                <label class="form-check-label text-dark" for="health_diabetes">Yes, I have Diabetes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" disabled id="health_smoke">
                                <label class="form-check-label text-dark" for="health_smoke">Yes, I smoke</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" disabled id="health_both">
                                <label class="form-check-label text-dark" for="health_both">Both</label>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        <nav aria-label="Page navigation example">
            <ul class="pagination mb-0">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
        <div class="fw-normal small mt-4 mt-lg-0">Showing <b>5</b> out of <b>25</b> entries</div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const surveyModal = document.getElementById('surveyModal');

    if (surveyModal) {
        surveyModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            // Đọc data attributes từ button
            const fullname = button.getAttribute('data-fullname') || 'N/A';
            const arrivalDate = button.getAttribute('data-arrival-date') || 'N/A';
            const stayLength = button.getAttribute('data-stay-length') || 'N/A';
            const missingTeeth = button.getAttribute('data-missing-teeth') || '';
            const healthCondition = button.getAttribute('data-health-condition') || '';

            // Gán thông tin Part 1
            document.getElementById('modalPatientName').textContent = fullname;
            document.getElementById('modalArrivalDate').textContent = arrivalDate;
            document.getElementById('modalStayLength').textContent = stayLength;

            // Set state cho Part 2 - Câu 2 (Missing teeth)
            document.getElementById('teeth_less_6m').checked = (missingTeeth === 'Less than 6 months');
            document.getElementById('teeth_6m_2y').checked = (missingTeeth === '6 months – 2 years');
            document.getElementById('teeth_more_2y').checked = (missingTeeth === 'More than 2 years');

            // Set state cho Part 2 - Câu 3 (Health condition)
            document.getElementById('health_neither').checked = (healthCondition === 'Neither');
            document.getElementById('health_diabetes').checked = (healthCondition === 'Diabetes');
            document.getElementById('health_smoke').checked = (healthCondition === 'Smoke');
            document.getElementById('health_both').checked = (healthCondition === 'Both');
        });
    }
});
</script>
@endsection