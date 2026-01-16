
@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5">

<h2 class="fw-bold mb-4">Manage Users</h2>

<a href="{{ route('admins.create') }}" class="btn btn-primary mb-3">
    + Create User
</a>
  <h2>Welcome, {{ Auth::guard('admin')->user()->name }}</h2>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th width="200">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
        <tr>
            <td>{{ $admin->id }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>
                <a href="{{ route('admins.edit', $admin->id) }}"
                   class="btn btn-sm btn-warning">
                    Edit
                </a>

                <form action="{{ route('admins.destroy', $admin->id) }}"
                      method="POST"
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Delete user?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
