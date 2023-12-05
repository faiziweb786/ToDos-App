@extends('user.layouts.app')
@section('title', 'Services')
@section('content')

<div class="services" id="services">
    <div class="site_container">
        <h2>our services</h2>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-3">
                    <div class="icon">
                        <img src="{{ asset('storage/service/' . $service->image) }}" width="100px"
                            height="100px" class="img-fluid rounded-circle pb-3" alt="">
                    </div>
                    <div class="payment_method_col">
                        <h5>{{ $service->title }}</h5>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection