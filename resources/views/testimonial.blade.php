@extends('layouts.master')
@section('content')
<!--hero start-->
    <div class="container-fluid bg-primary p-5 hero-header mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-1 text-white animated zoomIn">Testimonial</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Testimonial</a>
            </div>
        </div>
    </div>
    <!--hero end-->
    <!--testimonial start-->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h5 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h5>
                <h1 class="display-5 mb-0">What People Say About Our Services</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @foreach($all_testimonials as $testimonial)
                <div class="text-center pb-4">
                    <img class="img-fluid mx-auto rounded-circle" src="{{ asset('public/uploads/testimonials/' .$testimonial->image) }}" style="width: 100px; height: 100px;" >
                    <div class="testimonial-text bg-light rounded p-4 mt-n5">
                        <p class="mt-5">{{ $testimonial->desc }}
                        </p>
                        <h4 class="text-truncate">{{ $testimonial->name }}</h4>
                        <i>{{ $testimonial->title }}</i>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--testimonial end-->
@endsection