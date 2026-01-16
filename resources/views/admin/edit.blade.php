@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container py-5">

<h2 class="fw-bold mb-4">Edit User</h2>

<form action="{{ route('admins.update', $admin->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Name</label>
    <input name="name" class="form-control"
           value="{{ $admin->name }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input name="email" type="email"
           class="form-control"
           value="{{ $admin->email }}" required>
</div>

<div class="mb-3">
    <label>New Password (optional)</label>
    <input name="password" type="password"
           class="form-control">
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('admins.index') }}" class="btn btn-secondary">Cancel</a>

</form>

</div>
@endsection
