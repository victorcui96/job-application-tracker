@extends('master-layout')
     
@section('content')
    {{-- @if (Route::has('login')) --}}
    @if (Auth::check())
        <a href="{{ url('/home') }}">Home</a>
    @else
        <div class="column is-12 registration-form">
        <form action="#.php" method="post">
            <h2>Sign up for an account</h2>                        
            <label for="name">Name: </label>
            <input type="text" id="name" name="user_name">
            <label for="email">Email: </label>
            <input type="email" id="email" name="user_email">
            <label for="password">Password:</label>
            <input type="password" id="password" name="user_password">
        </form>
        </div>
    @endif
@endsection

