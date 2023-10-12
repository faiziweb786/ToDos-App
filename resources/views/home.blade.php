@extends('layouts.app')
@section('title' , 'Home')
@section('content')




        <div class="home_inner">
            <div class="home_col">
                <h2>welcome to our ToDo app</h2>
                <p>Welcome To Our Application! We're Thrilled To Have You On Board As Part Of Our Growing Community. Whether You're Here To Simplify Your Daily Tasks. Thank You For Choosing Our Application. We Can't Wait To Embark On This Exciting Journey With You. Let's Get Started!</p>
                <span class="alert ml-5 text-white">To known our system please visit ITems</span>
            </div>
            <div class="home_col">
                <img src="{{ asset('images/avatar.png') }}" alt="" width="300px" height="300px" style="margin-right:50px">
            </div>
        </div>


@endsection
