@extends('website.layouts.app')

@section('title', 'Aboutus')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('website.home') }}">Home</a></li>
                    <li class="text-danger">AboutUs</li>
                </ol>
            </nav>
            <h1 class="text-danger">About Us</h1>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- About Us Section -->
    <section id="about-us" class="about-us section">
        <div class="container">
            <div class="row gy-5">
                <div class="col-xl-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ">
                        @if (!empty($aboutuses) && isset($aboutuses[0]))
                        <img src="{{ asset('storage/' . $aboutuses[0]->image) }}" class="img-fluid w-100 mb-4" alt="{{ $aboutuses[0]->title }}">
                        <h3 class="mb-3">{{ $aboutuses[0]->title ?? '' }}</h3>
                        <div class="about-description">
                            {!! $aboutuses[0]->description !!}
                        </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->

</main>

@endsection
