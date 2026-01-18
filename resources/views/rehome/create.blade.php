@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h3 class="fw-bold mb-1">Find a New Home for Your Pet</h3>
            <p class="text-muted mb-4">
                Help your beloved pet find a caring new family by providing clear and accurate information.
            </p>

            <form method="POST" action="{{ route('rehome.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- ================= PET INFORMATION ================= --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">🐾 Pet Information</h5>

                        {{-- PET PHOTOS --}}
                        <div class="mb-4 text-center">
                            <label class="form-label fw-semibold">Pet Photos</label>
                            <div class="border rounded p-4">
                                <input type="file" name="pet_photos[]" class="form-control" multiple>
                                <small class="text-muted d-block mt-2">
                                    Upload PNG, JPG — up to 10MB
                                </small>
                            </div>
                        </div>

                        {{-- PET NAME + TYPE --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Pet Name</label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. Buddy">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Pet Type</label>
                                <select name="type" class="form-select">
                                    <option value="">Select type</option>
                                    <option>Dog</option>
                                    <option>Cat</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>

                        {{-- AGE / GENDER / SIZE --}}
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Age</label>
                                <input type="text" name="age" class="form-control" placeholder="2 years">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="">Select</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Size</label>
                                <select name="size" class="form-select">
                                    <option value="">Select</option>
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                </select>
                            </div>
                        </div>

                        {{-- BREED --}}
                        <div class="mb-3">
                            <label class="form-label">Breed</label>
                            <input type="text" name="breed" class="form-control" placeholder="e.g. Golden Retriever">
                        </div>

                        {{-- DESCRIPTION --}}
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4" class="form-control"
                                placeholder="Tell us about your pet’s personality, habits, and special needs..."></textarea>
                        </div>

                        {{-- HEALTH INFO --}}
                        <h6 class="fw-bold mb-2">Health Information</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="vaccinated" value="1">
                            <label class="form-check-label">Vaccinated</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="neutered" value="1">
                            <label class="form-check-label">Spayed / Neutered</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="microchipped" value="1">
                            <label class="form-check-label">Microchipped</label>
                        </div>

                    </div>
                </div>

                {{-- BUTTONS --}}
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary">
                        Save as Draft
                    </button>
                    <button type="submit" class="btn btn-primary px-4">
                        Publish
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
