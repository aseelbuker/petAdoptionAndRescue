@extends('layouts.app')

@section('title', $pet->name . ' - Adopt')

@section('content')

<div class="container py-5">

    {{-- BACK --}}
    <a href="{{ route('adopt.index') }}" class="btn btn-outline-secondary mb-4">
        ← Back to Adopt
    </a>

    <div class="row">

        {{-- IMAGES --}}
        <div class="col-md-6">
            @if($pet->images->count())
                <div id="petCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @foreach($pet->images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img
                                    src="{{ asset('storage/' . $image->path) }}"
                                    class="d-block w-100 rounded"
                                    style="height:400px; object-fit:cover;"
                                >
                            </div>
                        @endforeach

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            @else
                <div class="bg-light d-flex align-items-center justify-content-center rounded"
                     style="height:400px">
                    <span class="text-muted">No Image Available</span>
                </div>
            @endif
        </div>

        {{-- DETAILS --}}
        <div class="col-md-6">
            <h2 class="fw-bold">{{ $pet->name }}</h2>

            <p class="text-muted mb-2">
                {{ ucfirst($pet->type) }} • {{ $pet->age }} years • {{ ucfirst($pet->gender) }}
            </p>

            <span class="badge bg-success mb-3">
                {{ ucfirst($pet->status) }}
            </span>

            <hr>

            <ul class="list-unstyled">
                <li><strong>Breed:</strong> {{ $pet->breed ?? 'Unknown' }}</li>
                <li><strong>Size:</strong> {{ ucfirst($pet->size) }}</li>
            </ul>

            <hr>

            <h5>Description</h5>
            <p class="text-muted">
                {{ $pet->description ?? 'No description provided.' }}
            </p>

            <hr>

            {{-- ACTION --}}
            <button class="btn btn-primary w-100">
                Request Adoption
            </button>
        </div>

    </div>
</div>

@endsection
