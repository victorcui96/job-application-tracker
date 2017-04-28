@extends('master-layout')
     
@section('content')
    {{-- @if (Route::has('login')) --}}
{{--     @if (Auth::check())
        <a href="{{ url('/home') }}">Home</a>
    --}} 
    <div id="registration-form">
        <form method="POST" action="/register">
            {{ csrf_field() }}
            <h2>Sign up for an account</h2>                        
            <label for="name">Username: </label>
            <input type="text" id="name" name="user_name">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <button type="submit"> Register </button>
        </form>
    </div>
    <!-- This script handles cross-site forgeries -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
@endsection
