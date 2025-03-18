@extends('website.layouts.app')

@section('title', 'Service')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{route('website.home')}}">Home</a></li>
                    <li class="current">Service Details</li>
                </ol>
            </nav>
            <h1>Service Details</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

        <div class="container">

            <div class="row gy-5">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

                    <div class="service-box">
                        <h4>Serices List</h4>
                        <div class="services-list">
                            @foreach($services as $key => $service)
                            <a href="{{route('website.service',$service->id)}}" class="active"><i class="bi bi-arrow-right-circle"></i><span>{{$service->name}}</span></a>
                            @endforeach
                        </div>
                    </div><!-- End Services List -->

                    {{-- <div class="service-box">
                        <h4>Download Catalog</h4>
                        <div class="download-catalog">
                            <a href="#"><i class="bi bi-filetype-pdf"></i><span>Catalog PDF</span></a>
                            <a href="#"><i class="bi bi-file-earmark-word"></i><span>Catalog DOC</span></a>
                        </div>
                    </div><!-- End Services List --> --}}

                    <div class="help-box d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-headset help-icon"></i>
                        <h4>Have a Question?</h4>
                        <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>{{$settings[0]->phone ?? ''}}</span></p>
                        <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:{{ $settings[0]->email ?? '' }}">{{$settings[0]->email ?? ''}}</a></p>
                    </div>

                </div>
                <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('storage/' .  $serviceById->image) }}" alt="" class="img-fluid services-img">
                    <h3>{{$serviceById->name}}</h3>
                    <h5>  {{$serviceById->category->name}}</h5>

                    <p>
                      {{$serviceById->description}}
                    </p>


                </div>

            </div>

        </div>

    </section><!-- /Service Details Section -->

</main>
@endsection
