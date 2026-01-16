@extends('layouts.app')

@section('title', 'Home - Paw Home')

@section('content')

{{-- Hero Section --}}
<section class="py-5 text-center bg-light">
    <div class="container">
        <h1 class="display-4 text-primary fw-bold">Welcome to Paw Home 🐾</h1>
        <p class="lead text-dark">Where pets find love and homes 🏡</p>
    </div>
</section>

{{-- Picture / Image Placeholder --}}
<section class="py-5">
    <div class="container text-center">
        <h2 class="mb-4 text-warning">Meet Our Friends</h2>
        <div >
            <img src="{{ asset('https://i0.pickpik.com/photos/504/271/771/friends-cat-and-dog-cats-and-dogs-pet-preview.jpg') }}"
            class="img-fluid w-100 rounded-3 shadow"
            class="bg-secondary rounded-3" style="height:427px;">
           
            
        </div>
    </div>
</section>

{{-- Info Section --}}
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-primary text-center mb-4">How We Help</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <h3 class="text-warning">🐶 Rescue</h3>
                <p>We rescue abandoned and stray pets.</p>
            </div>
            <div class="col-md-4">
                <h3 class="text-success">❤️ Adopt</h3>
                <p>Connecting loving families with pets.</p>
            </div>
            <div class="col-md-4">
                <h3 class="text-info">📚 Educate</h3>
                <p>Spreading awareness about responsible pet care.</p>
            </div>
        </div>
    </div>
</section>

{{-- Call to Action --}}
<section class="py-5 text-center" style="background-color:#ffd93b;">
    <div class="container">
        <h2 class="fw-bold">Ready to make a difference?</h2>
        <a href="{{ url('/adopt') }}" class="btn btn-primary btn-lg mt-3">Adopt Now</a>
    </div>
</section>

@endsection






