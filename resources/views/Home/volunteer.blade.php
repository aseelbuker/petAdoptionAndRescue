@extends('layouts.app')

@section('title', 'Volunteer Dashboard')

@section('content')

<div class="container-fluid">
    <div class="row">

        {{-- SIDEBAR --}}
        <div class="col-md-2 bg-white border-end min-vh-100 p-3">
            <h5 class="fw-bold mb-4">❤️ Volunteer</h5>

            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link fw-semibold active" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#urgent">Urgent / Emergency</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#rescue">Rescue Missions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#food">Food / Item Distribution</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#lost_found">Lost & Found</a>
                </li>
            </ul>

            <hr>
            <a href="#" class="text-danger text-decoration-none">Logout</a>
        </div>

        {{-- MAIN CONTENT --}}
        <div class="col-md-10 bg-light min-vh-100 p-4">

            {{-- TOP STATS --}}
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted">Completed</h6>
                            <h3 class="fw-bold">
                                {{ $reports->where('status','completed')->count() }}
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted">Active Tasks</h6>
                            <h3 class="fw-bold">{{ $reports->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CATEGORIES SETUP --}}
            @php
            $sections = [
                'urgent' => [
                    'title' => 'Urgent / Emergency',
                    'statuses' => ['injured', 'trapped', 'emergency'],
                    'badge' => 'danger',
                ],
                'rescue' => [
                    'title' => 'Rescue Missions',
                    'statuses' => ['rescue'],
                    'badge' => 'warning',
                ],
                'food' => [
                    'title' => 'Food / Item Distribution',
                    'statuses' => ['hungry'],
                    'badge' => 'info',
                ],
                'lost_found' => [
                    'title' => 'Lost & Found',
                    'statuses' => ['lost', 'found'],
                    'badge' => 'primary',
                ],
            ];
            @endphp

            {{-- DASHBOARD SECTIONS --}}
            @foreach($sections as $key => $section)

                <div id="{{ $key }}" class="mb-5">

                    <h5 class="fw-bold mb-3">{{ $section['title'] }}</h5>

                    @forelse($reports->whereIn('status', $section['statuses']) as $report)

                        <div class="d-flex align-items-center justify-content-between border rounded p-3 mb-3 bg-white shadow-sm">

                            {{-- LEFT --}}
                            <div class="d-flex gap-3 align-items-center">

                                {{-- IMAGE --}}
                                @if($report->reportImage && $report->reportImage->isNotEmpty())
                                    <img
                                        src="{{ asset('storage/'.$report->reportImage->first()->path) }}"
                                        width="70"
                                        height="70"
                                        class="rounded"
                                        style="object-fit:cover"
                                    >
                                @else
                                    <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center"
                                         style="width:70px;height:70px">
                                        No Image
                                    </div>
                                @endif

                                {{-- INFO --}}
                                <div>
                                    <span class="badge bg-{{ $section['badge'] }}">
                                        {{ ucfirst($report->status) }}
                                    </span>

                                    <h6 class="fw-bold mt-1 mb-1">
                                        {{ $report->pet_type }} – {{ $report->age }}
                                    </h6>

                                    <p class="small text-muted mb-1">
                                        📍 {{ $report->location }}
                                    </p>

                                    @if($report->urgent)
                                        <span class="badge bg-danger">Urgent</span>
                                    @endif
                                </div>
                            </div>

                            {{-- RIGHT --}}
                            <a href="{{ route('reports.show', $report->id) }}"
                               class="btn btn-dark btn-sm">
                                View Task
                            </a>

                        </div>

                    @empty
                        <p class="text-muted">No tasks available in this section.</p>
                    @endforelse

                </div>

            @endforeach

        </div>
    </div>
</div>

@endsection
