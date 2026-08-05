@extends('layouts.app')
@section('content')
<style>
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg></a></li>
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="/dashboard/clinic">Clinic</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $clinic->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0"><a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"><svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg> New Clinic</a>
        <div class="btn-group ms-2 ms-lg-3"><button type="button" class="btn btn-sm btn-outline-gray-600">Share</button> <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button></div>
    </div>
</div>
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
                <div class="d-flex gap-2 pt-2 border-top">
                    <a href="#booking-form" class="btn btn-primary px-4 fw-semibold">
                        <i class="far fa-calendar-check me-2"></i>Book Appointment
                    </a>
                    <a href="tel:{{ $clinic->phone ?? '#' }}" class="btn btn-outline-secondary px-3">
                        <i class="fas fa-phone-alt me-1"></i> Call Clinic
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Layout (2 Columns) -->
    <div class="row g-4">
        <!-- Left Column: Services & Doctors -->
        <div class="col-lg-8">
            
            <!-- SECTION 1: SERVICES OFFERED -->
            <div class="card border-0 shadow-sm rounded-3 p-4 mb-4">
                <h4 class="fw-bold text-dark mb-3 border-bottom pb-2">
                    <i class="fas fa-concierge-bell text-primary me-2"></i>Services Offered
                </h4>
                
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @forelse($clinic->services as $service)
                    <div class="col">
                        <div class="p-3 border rounded-3 bg-light h-100 d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fw-bold text-dark mb-1">{{ $service->name }}</h6>
                                <p class="text-muted small mb-0">{{ Str::limit($service->description ?? 'Professional dental care service.', 60) }}</p>
                            </div>
                            @if(isset($service->price))
                            <span class="badge bg-success-subtle text-success fw-bold ms-2">
                                ${{ number_format($service->price) }}
                            </span>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-muted mb-0">No services listed for this clinic yet.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- SECTION 2: OUR DOCTORS / SPECIALISTS -->
            <div class="card border-0 shadow-sm rounded-3 p-4 mb-4">
                <h4 class="fw-bold text-dark mb-3 border-bottom pb-2">
                    <i class="fas fa-user-md text-primary me-2"></i>Medical Specialists & Doctors
                </h4>

                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @forelse($clinic->doctors as $doctor)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-none bg-light p-3 rounded-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ $doctor->avatar ? asset('storage/' . $doctor->avatar) : asset('assets/images/default-doctor.jpg') }}" 
                                     class="rounded-circle img-thumbnail flex-shrink-0" 
                                     style="width: 70px; height: 70px; object-fit: cover;" 
                                     alt="{{ $doctor->name }}">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">{{ $doctor->name }}</h6>
                                    <span class="badge bg-primary-subtle text-primary mb-1">
                                        {{ $doctor->title ?? 'Dental Specialist' }}
                                    </span>
                                    <p class="text-muted small mb-0">
                                        {{ $doctor->is_expert_10_years ? '10+' : '5+' }} Years Exp.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-muted mb-0">No doctors profiles currently available.</p>
                    </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Right Column: Sidebar (Location Map & Booking Form) -->
        <div class="col-lg-4">
            <!-- Sidebar Widget: Working Hours & Location -->
            <div class="card border-0 shadow-sm rounded-3 p-4 mb-4">
                <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">
                    <i class="fas fa-clock text-primary me-2"></i>Opening Hours
                </h5>
                <ul class="list-unstyled mb-0 fs-7">
                    <li class="d-flex justify-content-between py-1 border-bottom">
                        <span class="text-muted">Monday - Friday</span>
                        <span class="fw-semibold text-dark">07:00 AM - 07:00 PM</span>
                    </li>
                    <li class="d-flex justify-content-between py-1 border-bottom">
                        <span class="text-muted">Saturday</span>
                        <span class="fw-semibold text-dark">07:00 AM - 05:00 PM</span>
                    </li>
                    <li class="d-flex justify-content-between py-1">
                        <span class="text-muted">Sunday</span>
                        <span class="text-danger fw-semibold">Closed</span>
                    </li>
                </ul>
            </div>

            <!-- Sidebar Widget: Quick Booking Form -->
            <div class="card border-0 shadow-sm rounded-3 p-4" id="booking-form">
                <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">
                    <i class="fas fa-paper-plane text-primary me-2"></i>Request Consultation
                </h5>
                <form action="#" method="POST">
                    @csrf
                    <input type="hidden" name="clinic_id" value="{{ $clinic->id }}">
                    
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Full Name</label>
                        <input type="text" class="form-control" name="fullname" required placeholder="John Doe">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" required placeholder="+84 ...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Interested Service</label>
                        <select class="form-select" name="service_id">
                            <option value="">Select a service</option>
                            @foreach($clinic->services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Message / Brief Request</label>
                        <textarea class="form-control" name="briefly" rows="3" placeholder="Describe your symptoms or preferred time..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2">
                        Submit Request
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection