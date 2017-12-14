@extends('layouts.app')


@section('content')
	<p>{{$title}}</p>
 	<h1>Developed by <a href="https://tarekfouda.herokuapp.com/home.html"> Tarek Fouda </a></h1>
 	<div class="jumbotron text-center">
        <h1>Welcome To Trader Interactive!</h1>
        <p>This is a simple webapplication where the user can view some listings for Cars, Motorcycles, Trucks and RVs that are stored in our database</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
    </div>
@endsection