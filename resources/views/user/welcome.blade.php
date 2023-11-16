    @extends('user.layouts.app')

    @section('content')
            <div id="myCarousal" class="carousel slide" data-ride="carousel" data-interval="4000">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousal" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousal" data-slide-to="1"></li>
                    <li data-target="#myCarousal" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner rounded">
                    <div class="carousel-item active" style="padding: 50px 0 0 100px">
                        <div class="image">
                            <img src="{{ asset('images/car.jpg') }}" width="500px" height="300px" alt="...">
                        </div>
                        <div class="carousel-caption d-none d-md-block" style="left: 54% !important; width: 400px">
                            <h2>First</h2>
                            <p>Swiper.js provides various options and customization, so make sure to refer to the Swiper.js documentation for more advanced configurations and styling options.</p>
                            <a href="#" class="btn btn-success">Button</a>
                        </div>
                    </div>
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
    @endsection
