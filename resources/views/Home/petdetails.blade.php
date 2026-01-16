@extends('layouts.app')

@section('title', 'Pet Details - Paw Home')

@section('content')

<section class="py-4 bg-light">
    <div class="container">
        <h2 class="fw-bold text-primary">Pet Details</h2>
        <p class="text-muted">Learn more about this lovely pet before adopting.</p>
    </div>
</section>

<section class="py-4">
    <div class="container">

        <div class="row">

            {{-- Pet Image --}}
            <div class="col-md-5">
                <div class="card shadow-sm">
                   <div class="bg-light text-center p-4">
                        <img src="https://via.placeholder.com/400x300"
                             class="img-fluid rounded"
                             alt="Pet Photo">
                    </div>
                </div>
            </div>

            {{-- Pet Details --}}
            <div class="col-md-7">
                <div class="card p-4 shadow-sm">

                    <h2 class="fw-bold">Buddy</h2>

                    <p class="text-muted">
                        Golden Retriever • 3 years old <br>
                        Male • Medium Size
                    </p>

                    <hr>

                    <h5 class="fw-bold">Description</h5>
                    <p>
                        Friendly and energetic dog looking for a loving family. 
                        Good with kids and other pets.
                    </p>

                    <hr>

                    <h5 class="fw-bold">Location</h5>
                    <p>
                        <i class="bi bi-geo-alt"></i> Los Angeles, CA
                    </p>

                    <hr>

                    <h5 class="fw-bold">Health & Behavior</h5>
                    <ul>
                        <li>Vaccinated</li>
                        <li>House trained</li>
                        <li>Good with children</li>
                    </ul>

                    <hr>

                    <a href="#" class="btn btn-primary btn-lg w-100 mt-2">
                        Start Adoption Process
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
