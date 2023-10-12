    @extends('layouts.app')

    @section('content')


    <div class="welcome_inner">
        <div class="welcome_col">
            <h2>welcome to our ToDo app</h2>
            <p>Welcome To Our Application! We're Thrilled To Have You On Board As Part Of Our Growing Community. Whether You're Here To Simplify Your Daily Tasks. Thank You For Choosing Our Application. We Can't Wait To Embark On This Exciting Journey With You. Let's Get Started!</p>
            <a class="main_btn" href="{{ route('login') }}">Get Started</a>
        </div>
        <div class="welcome_col">
            <img src="{{ asset('images/avatar.png') }}" alt="" width="300px" height="300px" style="margin-right:50px">
        </div>
    </div>

  

    @endsection

