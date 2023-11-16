@extends('user.layouts.app')
@section('title', 'Home')
@section('content')




    <div class="home_inner mb-5">
        <div class="home_col">
            <h2 class="welcome_h">welcome to our ToDo app</h2>
            <p class="welcome_p">Welcome To Our Application! We're Thrilled To Have You On Board As Part Of Our Growing Community. Whether
                You're Here To Simplify Your Daily Tasks. Thank You For Choosing Our Application. We Can't Wait To Embark On
                This Exciting Journey With You. Let's Get Started!</p>
            <span class="alert ml-5 text-white">To known our system please visit ITems</span>
        </div>
        <div class="home_col">
                    <img src="{{asset('/storage/'.Auth::user()->profile_image)}}" alt="{{ auth()->user()->name }}" width="300px"
                        height="300px" style="margin-right:50px" class="rounded-circle">
        </div>
    </div>

    <div id="myCarousal" class="carousel slide" data-ride="carousel" data-interval="2000">
        <ol class="carousel-indicators">
            @if ($carousals)
                @foreach ($carousals as $carousal)
                    @if ($loop->first)
                        <li data-target="#myCarousal" data-slide-to="0" class="active"></li>
                    @else
                        <li data-target="#myCarousal" data-slide-to="1"></li>
                    @endif
                @endforeach
            @endif
        </ol>
        <div class="carousel-inner rounded">
            @if ($carousals)
                @foreach ($carousals as $carousal)
                    <div class="carousel-item @if ($loop->first) active @endif">

                        <img class="d-block w-100" src="{{ asset('storage/carousal/' . $carousal->image) }}"
                            alt="{{ $carousal->id }}">
                    </div>
                @endforeach
            @endif
        </div>
        <a class="carousel-control-prev" href="#myCarousal" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousal" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    
    @if ($sliders)
    @foreach ($sliders as $slider)
        @if ($slider->status == 1)
            <div id="myCarousal" class="carousel slide" data-ride="carousel" data-interval="4000">
                @if ($slider->dots == 1)
                    <ol class="carousel-indicators">
                            @foreach ($slider->slides as $slide)
                                @if ($loop->first)
                                    <li data-target="#myCarousal" data-slide-to="0" class="active"></li>
                                @else
                                    <li data-target="#myCarousal" data-slide-to="1"></li>
                                @endif
                            @endforeach
                    </ol>
                @endif
                <div class="carousel-inner rounded">
                    @foreach ($slider->slides as $slide)
                        <div class="carousel-item @if ($loop->first) active @endif"
                            style="padding: 50px 0 0 110px">
                            <img class="rounded" src="{{ asset('storage/slide/' . $slide->image) }}" width="500px"
                                height="300px" alt="...">
                            <div class="carousel-caption d-none d-md-block" style="left: 54% !important; width: 400px">
                                <h2>{{ $slide->title }}</h2>
                                <p>{{ $slide->text }}</p>
                                <a href="{{ $slide->link }}" class="btn btn-success">Button</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($slider->arrow == 1)
                    <a class="carousel-control-prev" href="#myCarousal" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousal" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                @endif
            </div>
        @endif
        @endforeach
    @endif




@endsection
