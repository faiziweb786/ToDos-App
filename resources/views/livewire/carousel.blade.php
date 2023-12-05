<div class="container">
    @if ($sliders)
        @foreach ($sliders as $slider)
            @if ($slider->status == 1)
                <div id="myCarousel{{ $slider->id }}" class="carousel slide mx-auto" data-ride="carousel"
                    data-interval="4000">
                    @if ($slider->dots == 1)
                        <ol class="carousel-indicators">
                            @foreach ($slider->slides as $slide)
                                <li data-target="#myCarousel{{ $slider->id }}" data-slide-to="{{ $loop->index }}"
                                    class="@if ($loop->first) active @endif"></li>
                            @endforeach
                        </ol>
                    @endif
                    <div class="carousel-inner">
                        @foreach ($slider->slides as $slide)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <div class="row pt-4 mt-4">
                                    <div class="col-md-6 testure text-center text-light">
                                        <div class="text">
                                            <h2>{{ $slide->title }}</h2>
                                             <p>{{ $slide->text }}</p>
                                            <a href="{{ $slide->link }}" class="btn">Button</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 w-100">
                                        <img class="img-fluid d-block mx-auto rounded"
                                            src="{{ asset('storage/slide/' . $slide->image) }}" alt="...">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($slider->arrow == 1)
                        <a class="carousel-control-prev" href="#myCarousel{{ $slider->id }}" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel{{ $slider->id }}" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    @endif
                </div>
            @endif
        @endforeach
    @endif
</div>
