@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sign Up</h2>

    <form method="POST" action="/register">
        @csrf

        <input type="text" name="name" placeholder="Name" required>
        <br><br>

        <input type="email" name="email" placeholder="Email" required>
        <br><br>

        <input type="password" name="password" placeholder="Password" required>
        <br><br>

        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <br><br>

        <button type="submit">Register</button>
    </form>
</div>
@endsection
