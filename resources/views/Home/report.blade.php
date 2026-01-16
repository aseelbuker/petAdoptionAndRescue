@extends('layouts.app')

@section('title', 'Report a Pet - Paw Home')

@section('content')

{{-- Page Header --}}
<section class="py-4 text-center bg-light">
    <div class="container">
        <h1 class="fw-bold text-primary">Report a Pet</h1>
        <p class="text-muted">
            Help us rescue pets in need by providing accurate information.
        </p>
    </div>
</section>

<div class="container py-5">

<form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
@csrf

{{-- ================= PET STATUS ================= --}}
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Pet Status</h5>

        <div class="row g-3">
            @php
                $statuses = [
                    'injured' => 'Injured – Needs medical attention',
                    'lost' => 'Lost – Missing pet',
                    'found' => 'Found – Found a pet',
                    'rescue' => 'Rescue – Needs rescue',
                    'hungry' => 'Hungry – No food',
                ];
            @endphp

            @foreach ($statuses as $key => $label)
                <div class="col-md-4">
                    <label class="form-check border rounded-3 p-3 w-100">
                        <input
                            class="form-check-input me-2"
                            type="radio"
                            name="status"
                            value="{{ $key }}"
                            required
                        >
                        <span class="fw-semibold">{{ $label }}</span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ================= PET PHOTOS ================= --}}
<div class="card shadow-sm mb-4">
    <div class="card-body text-center">
        <h5 class="fw-bold mb-3">Pet Photos</h5>
        <input
            type="file"
            name="petsImage[]"
            class="form-control w-50 mx-auto"
            multiple
        >
        <small class="text-muted d-block mt-2">
            Upload clear photos (JPG, PNG – max 2MB each)
        </small>
    </div>
</div>

{{-- ================= PET DETAILS ================= --}}
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Pet Details</h5>

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label fw-semibold">Pet Type</label>
                <select name="pet_type" class="form-select" required>
                    <option value="" disabled selected>Select pet type</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Breed</label>
                <input
                    type="text"
                    name="breed"
                    class="form-control"
                    placeholder="e.g. Golden Retriever"
                >
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Size</label>
                <select name="size" class="form-select" required>
                    <option value="" disabled selected>Select size</option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Age</label>
                <select name="age" class="form-select" required>
                    <option value="" disabled selected>Select age</option>
                    <option value="puppy">Puppy / Kitten</option>
                    <option value="young">Young</option>
                    <option value="adult">Adult</option>
                    <option value="senior">Senior</option>
                </select>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold">Color / Markings</label>
                <textarea
                    name="color_markings"
                    class="form-control"
                    rows="2"
                    placeholder="Describe colors, spots, scars, collar, etc."
                ></textarea>
            </div>

        </div>
    </div>
</div>

{{-- ================= LOCATION & CONTACT ================= --}}
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Location & Contact</h5>

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label fw-semibold">Location</label>
                <input
                    type="text"
                    name="location"
                    class="form-control"
                    placeholder="Street, area, or landmark"
                    required
                >
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Date & Time</label>
                <input
                    type="datetime-local"
                    name="date_time"
                    class="form-control"
                    required
                >
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Your Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Full name"
                    required
                >
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Phone</label>
                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    placeholder="e.g. 092-1234567"
                    required
                >
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="you@example.com"
                    required
                >
            </div>

        </div>
    </div>
</div>

{{-- ================= ADDITIONAL INFO ================= --}}
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Additional Information</h5>

        <textarea
            name="additional_info"
            class="form-control mb-3"
            rows="3"
            placeholder="Anything else volunteers should know?"
        ></textarea>

        <div class="form-check mb-2">
            <input
                class="form-check-input"
                type="checkbox"
                name="urgent"
                value="1"
            >
            <label class="form-check-label fw-semibold">
                Urgent priority
            </label>
        </div>

        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                name="allow_contact"
                value="1"
            >
            <label class="form-check-label fw-semibold">
                Allow public contact
            </label>
        </div>
    </div>
</div>

{{-- ================= SUBMIT ================= --}}
<div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary btn-lg">
        Submit Report
    </button>
</div>

</form>

</div>
@endsection
