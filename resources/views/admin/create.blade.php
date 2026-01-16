
@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<div class="container py-5">

<h2 class="fw-bold mb-4">Create User</h2>

<form action="{{ route('admins.store') }}" method="POST">
@csrf

<div class="mb-3">
    <label>Name</label>
    <input name="name" class="form-control" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input name="email" type="email" class="form-control" required>
</div>

<div class="mb-3">
    <label>Password</label>
    <input name="password" type="password" class="form-control" required>
</div>

<button class="btn btn-primary">Create</button>
<a href="{{ route('admins.index') }}" class="btn btn-secondary">Cancel</a>

</form>

</div>
@endsection
