@extends('layouts.app') {{-- Hoặc tên layout chính của bạn --}}

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-clinic-medical text-primary me-2"></i>Quản lý Phòng Khám Của Tôi</h2>
        <a href="{{ route('my-clinic.edit') }}" class="btn btn-warning">
            <i class="fas fa-edit me-1"></i> Chỉnh sửa thông tin
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($clinic->image)
                        <img src="{{ asset('storage/' . $clinic->image) }}" alt="{{ $clinic->name }}" class="img-fluid rounded border mb-3">
                    @else
                        <div class="bg-light p-5 rounded border mb-3 text-muted">
                            <i class="fas fa-hospital-alt fa-4x"></i>
                            <p class="mt-2 mb-0">Chưa có hình ảnh</p>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h3 class="fw-bold text-dark mb-3">{{ $clinic->name }}</h3>
                    <p class="text-muted"><strong>Slug:</strong> <code>{{ $clinic->slug }}</code></p>
                    <p><strong>Địa chỉ:</strong> {{ $clinic->address }}, {{ $clinic->district }}, {{ $clinic->city }}</p>
                    <p><strong>Đánh giá:</strong> ⭐ {{ $clinic->rating ?? 0 }} / 5 ({{ $clinic->review_count ?? 0 }} đánh giá)</p>
                    <hr>
                    <h5>Mô tả phòng khám:</h5>
                    <p class="text-secondary">{{ $clinic->description ?? 'Chưa có mô tả.' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection