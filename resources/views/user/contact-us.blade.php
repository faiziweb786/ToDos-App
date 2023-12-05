@extends('user.layouts.app')
@section('title', 'Contact Us')
@section('content')


@if(session('success'))
    <div class="alert alert-success w-50 text-white">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger w-50 text-white">
        {{ session('error') }}
    </div>
@endif

    <div class="contact">
        <div class="site_container">
            <h2>contact us</h2>
            @foreach ($contacts as $contact)
            <div class="row">
                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="payment_method_col">
                        <h3>Address</h3>
                        <p>
                            {{ $contact->address }}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa-solid fa-mobile-button"></i>
                    </div>
                    <div class="payment_method_col">
                        <h3>phone</h3>
                        <p>{{ $contact->pnumber }}</p>
                        <p>{{ $contact->opt_number }}</p>
                        <p>{{ $contact->comp_email }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div class="payment_method_col">
                        <h3>working</h3>
                        <p>{{ $contact->start_day }} - {{ $contact->end_day }} {{ $contact->start_time }} - {{ $contact->end_time }} </p>
                        <p>Off Days</p>
                        <p>{{ $contact->off_day }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="payment_method_col">
                        <h3>email Address</h3>
                        <p>{{ $contact->email }}</p>
                        <p>{{ $contact->opt_email }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="contact_form">
        <div class="row pt-5 mt-5">
            <div class="col-md-6">
                <h3>Contact us</h3>
                <p>If You Are Interested In Talking To Us About A Project, Pleas Send Us A Message</p>
                <div class="icon">
                    <a href="">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-pinterest-p"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <form action="{{ route('message-store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control w-75 @error('name')
                                is-invalid
                            @enderror" value="{{ old('name') }}" id="name"
                                placeholder="Your Name*">
                        </div>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control w-75" id="email"
                                placeholder="Your Email*">
                        </div>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="form-group">
                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" id="subject" placeholder="Subject">
                        </div>
                        <span class="text-danger">
                            @error('subject')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="form-group">
                            <textarea name="message" value="{{ old('message') }}" class="form-control" id="message" placeholder="Message*" rows="5"></textarea>
                        </div>
                        <span class="text-danger">
                            @error('message')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn">send message</button>
                </form>
            </div>
        </div>
    </div>






@endsection
