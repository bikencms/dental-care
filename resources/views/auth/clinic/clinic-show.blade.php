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
                <div class="d-flex gap-2 pt-2 border-top">
                    <a href="#booking-form" class="btn btn-primary px-4 fw-semibold">
                        <i class="far fa-calendar-check me-2"></i>Book Appointment
                    </a>
                    <a href="tel:{{ $clinic->phone ?? '+84799108727' }}" class="btn btn-outline-secondary px-3">
                        <i class="fas fa-phone-alt me-1"></i> Call Clinic
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Layout (2 Columns) -->
    <div class="row g-4">
        <!-- Left Column: Services, Procedures & Doctors -->
        <div class="col-lg-8">
            
            <!-- SECTION 1: SERVICES OFFERED -->
            @include('auth.clinic.clinic-service', [
                'clinic' => $clinic,
            ])

            <!-- SECTION 2: CLINIC PROCEDURES & PRICING (MỚI THÊM) -->
            @include('auth.clinic.clinic-procedure', [
                'clinic' => $clinic,
            ])
        

            <!-- SECTION 3: OUR DOCTORS / SPECIALISTS -->
            @include('auth.clinic.clinic-doctor', [
                'clinic' => $clinic,
            ])

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