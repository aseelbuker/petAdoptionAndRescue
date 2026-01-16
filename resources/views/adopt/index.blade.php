@extends('layouts.app')

@section('title', 'Adopt a Pet - Paw Home')

@section('content')

{{-- Header --}}
<section class="py-4 bg-light">
    <div class="container">
        <h2 class="fw-bold text-primary">Find Your Perfect Pet</h2>
        <p class="text-muted">Search through pets waiting for their forever home.</p>
    </div>
</section>

<section class="py-4">
    <div class="container">
        <div class="row">

            {{-- FILTERS (UI only for now) --}}
            <div class="col-md-3">
                <div class="card shadow-sm p-3">
                    <h5 class="fw-bold mb-3">Filters</h5>
                    <p class="text-muted small">Filters coming soon</p>
                </div>
            </div>

            {{-- PET LIST --}}
            <div class="col-md-9">

                {{-- COUNT --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="text-muted">{{ $pets->count() }} pets found</div>
                </div>

                <div class="row g-3">

                    @forelse ($pets as $pet)
                        <div class="col-md-4">
                            <div class="card shadow-sm h-100">

                                {{-- IMAGE --}}
                                @if ($pet->images->first())
                                    <img
                                        src="{{ asset('storage/'.$pet->images->first()->path) }}"
                                        class="card-img-top"
                                        style="height:220px; object-fit:cover;"
                                    >
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center"
                                         style="height:220px;">
                                        <span class="text-muted">No Image</span>
                                    </div>
                                @endif

                                {{-- BODY --}}
                                <div class="card-body">
                                    <h5 class="fw-bold">{{ $pet->name }}</h5>

                                    <p class="small text-muted mb-2">
                                        {{ $pet->breed ?? 'Unknown breed' }} · {{ $pet->age }} years old
                                    </p>

                                    <p class="small text-muted">
                                        {{ Str::limit($pet->description, 80) }}
                                    </p>

                                    <a href="{{ route('adopt.show', $pet->id) }}"
                                       class="btn btn-outline-primary w-100">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">No pets available for adoption yet.</p>
                        </div>
                    @endforelse

                </div>

            </div>
        </div>
    </div>
</section>

@endsection
