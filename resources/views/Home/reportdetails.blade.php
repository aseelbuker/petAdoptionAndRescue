
@extends('layouts.app')

@section('title', 'Report Details')

@section('content')

<section class="py-4 bg-light text-center">
    <div class="container">
        <h1 class="fw-bold text-primary">Pet Report Details</h1>
        <p class="text-muted">Full information about this report</p>
    </div>
</section>

<div class="container py-5">

{{-- Status --}}
<div class="card mb-4">
    <div class="card-body">
        <span class="badge bg-warning text-capitalize">
            {{ $report->status }}
        </span>

        @if($report->urgent)
            <span class="badge bg-danger ms-2">Urgent</span>
        @endif
    </div>
</div>

{{-- Photos --}}
@if($report->photos && count($report->photos))
<div class="card mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Photos</h5>
        <div class="d-flex flex-wrap gap-3">
            @foreach($report->photos as $photo)
                <img src="{{ asset('storage/' . $photo) }}"
                     class="rounded shadow"
                     style="width:180px;height:180px;object-fit:cover;">
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- Pet Info --}}
<div class="card mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Pet Information</h5>
        <p><strong>Type:</strong> {{ $report->pet_type }}</p>
        <p><strong>Breed:</strong> {{ $report->breed ?? 'N/A' }}</p>
        <p><strong>Size:</strong> {{ $report->size }}</p>
        <p><strong>Age:</strong> {{ $report->age }}</p>
        <p><strong>Color / Markings:</strong> {{ $report->color_markings ?? 'N/A' }}</p>
    </div>
</div>

{{-- Location --}}
<div class="card mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Location</h5>
        <p>{{ $report->location }}</p>
        <p>
            {{ \Carbon\Carbon::parse($report->date_time)->format('d M Y, H:i') }}
        </p>
    </div>
</div>

{{-- Reporter --}}
<div class="card mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Reporter</h5>
        <p><strong>Name:</strong> {{ $report->name }}</p>
        <p><strong>Phone:</strong> {{ $report->phone }}</p>
        <p><strong>Email:</strong> {{ $report->email }}</p>
    </div>
</div>

{{-- Extra --}}
@if($report->additional_info)
<div class="card mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Additional Info</h5>
        <p>{{ $report->additional_info }}</p>
    </div>
</div>
@endif

<div class="d-flex justify-content-between">
    <a href="{{ route('volunteer.index') }}" class="btn btn-secondary">
        ← Back to Volunteer Tasks
    </a>

    <button class="btn btn-success">
        Accept Task
    </button>
</div>

</div>
@endsection
