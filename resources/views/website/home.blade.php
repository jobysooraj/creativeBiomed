@extends('website.layouts.app')

@section('title', 'Home Page')

@section('content')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <img src="{{ asset('website/assets/img/hero-bg.jpeg')}}" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 data-aos="fade-up" class="text-danger" data-aos-delay="100">Better digital experience with Creative Biomed</h2>
                    <p data-aos="fade-up" class="text-dark" data-aos-delay="200">Empowering Healthcare Through Precision, Innovation, and Expertise.</p>
                    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                        <a href="{{route('website.about')}}" class="btn-get-started">Get Started</a>
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>

                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                        "loop": true
                        , "speed": 600
                        , "autoplay": {
                            "delay": 5000
                        }
                        , "slidesPerView": "auto"
                        , "pagination": {
                            "el": ".swiper-pagination"
                            , "type": "bullets"
                            , "clickable": true
                        }
                        , "breakpoints": {
                            "320": {
                                "slidesPerView": 2
                                , "spaceBetween": 40
                            }
                            , "480": {
                                "slidesPerView": 3
                                , "spaceBetween": 60
                            }
                            , "640": {
                                "slidesPerView": 4
                                , "spaceBetween": 80
                            }
                            , "992": {
                                "slidesPerView": 6
                                , "spaceBetween": 120
                            }
                        }
                    }

                </script>
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="{{ asset('website/assets/img/clients/client-1.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('website/assets/img/clients/client-2.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('website/assets/img/clients/client-3.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('website/assets/img/clients/client-4.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('website/assets/img/clients/client-5.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('website/assets/img/clients/client-6.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('website/assets/img/clients/client-7.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('website/assets/img/clients/client-8.png')}}" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section section-bg dark-background">
        <div class="container position-relative">
            <div class="row gy-5">
                <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
                    <h3>Expert Preventive Maintenance Tips for IVD Equipment
                    </h3>
                    <p>
                        Proper maintenance ensures accurate diagnostics, cost savings, and long-term efficiency of IVD equipment. If you need professional servicing, training, or custom projects, Creative Biomed is here to support you
                    </p>
                    <a href="{{route('website.about')}}" class="about-btn align-self-center align-self-xl-start">
                        <span>About Us</span> <i class="bi bi-chevron-right"></i>
                    </a>
                </div>

                <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-briefcase"></i>
                            <h4><a href="#" class="stretched-link">IVD Equipment Servicing</a></h4>
                            <p>Routine maintenance and emergency repairs.</p>
                        </div>

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-gem"></i>
                            <h4><a href="#" class="stretched-link">Spare Parts Supply</a></h4>
                            <p> Genuine, high-quality parts for all major brands.
                            </p>
                        </div>

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-broadcast"></i>
                            <h4><a href="#" class="stretched-link">Training & Internships</a></h4>
                            <p>Hands-on training for biomedical engineers and lab technicians.
                            </p>
                        </div>

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-easel"></i>
                            <h4><a href="#" class="stretched-link">Project Development </a></h4>
                            <p>We undertake custom projects based on specific requirements and provide detailed project reports.
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section><!-- /About Section -->


    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-emoji-smile"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Happy Clients</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-journal-richtext"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Projects</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-headset"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-people"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hard Workers</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Tabs Section -->
    <section id="tabs" class="tabs section">

        <div class="container">

            <ul class="nav nav-tabs row d-flex" data-aos="fade-up" data-aos-delay="100">
                <li class="nav-item col-3">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tabs-tab-1">
                        <i class="bi bi-stethoscope"></i>
                        <h4 class="d-none d-lg-block">Regular Cleaning & Disinfection
                        </h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tabs-tab-2">
                        <i class="bi bi-heart-pulse"></i>
                        <h4 class="d-none d-lg-block">Calibration & Quality Control Checks</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tabs-tab-3">
                        <i class="bi bi-hospital"></i>
                        <h4 class="d-none d-lg-block">Check and Replace Consumable Parts
                        </h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tabs-tab-4">
                        <i class="bi bi-tools"></i>
                        <h4 class="d-none d-lg-block">Software & Firmware Updates
                        </h4>
                    </a>
                </li>
            </ul><!-- End Tab Nav -->

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                <div class="tab-pane fade active show" id="tabs-tab-1">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Regular Cleaning & Disinfection
                            </h3>
                            <p class="fst-italic">
                                IVD machines come into contact with various biological samples. To prevent contamination and ensure accurate results:

                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>Wipe surfaces with a non-corrosive disinfectant daily.
                                        .</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Clean reagent probes and sample aspiration areas to prevent blockages.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Use approved cleaning solutions to avoid damage to sensitive parts.</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('website/assets/img/servi-img1.jpeg')}}" alt="Diagnostic Equipment" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content Item -->

                <div class="tab-pane fade" id="tabs-tab-2">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Calibration & Quality Control Checks</h3>
                            <p>
                                Accurate test results depend on proper calibration and quality control (QC) measures:

                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>Perform daily, weekly, and monthly calibration using control reagents.
                                        .</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Use manufacturer-recommended calibrators and QC materials.
                                        .</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Record and monitor calibration data for trend analysis.
                                    </span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('website/assets/img/service-img2.jpeg')}}" alt="Therapeutic Equipment" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content Item -->

                <div class="tab-pane fade" id="tabs-tab-4">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3> Software & Firmware Updates
                            </h3>
                            <p>
                                Manufacturers frequently release software updates to improve functionality and fix bugs.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>Ensure that the latest software updates are installed.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Back up important test data before updating.
                                    </span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Perform routine system diagnostics to detect errors early.</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('website/assets/img/service-img3.jpeg')}}" alt="Patient Monitoring" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content Item -->

                <div class="tab-pane fade" id="tabs-tab-3">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Check and Replace Consumable Parts</h3>
                            <p>
                                IVD equipment contains filters, tubes, seals, and reagents that need regular replacement.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>Check for worn-out tubing and O-rings that might cause leaks.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Replace reagent and sample probes if they show signs of wear.
                                    </span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Keep spare parts in stock to avoid operational delays.
                                    </span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('website/assets/img/services.jpeg')}}" alt="Surgical Equipment" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content Item -->

            </div>


        </div>

    </section><!-- /Tabs Section -->

    <!-- Services Section -->
    <section id="services" class="services section section-bg dark-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Comprehensive Solutions for IVD and Biomedical Excellence</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                @foreach($services as $service)
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-briefcase icon flex-shrink-0"></i>
                        <div>

                            <h4 class="title"><a href="{{route('website.service',$service->id)}}" class="stretched-link">{{$service->name}}</a></h4>
                            <p class="description">{{$service->name}}</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->
                @endforeach


                <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="swiper-wrapper align-items-center">

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

    </section><!-- /Clients Section -->
    {{-- <div class="service-item d-flex position-relative h-100">
        <i class="bi bi-calendar4-week icon flex-shrink-0"></i>
        <div>
            <h4 class="title"><a href="service-details.html" class="stretched-link">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
        </div>
    </div> --}}


    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Product</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-books">Books</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/app-1.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/product-1.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Product 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/product-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/branding-1.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Branding 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/branding-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/books-1.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Books 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/books-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/app-2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/app-2.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/product-2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Product 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/product-2.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/branding-2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Branding 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/branding-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/books-2.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Books 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/books-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/app-3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/app-3.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/product-3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Product 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/product-3.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/branding-3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Branding 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/branding-3.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('website/assets/img/portfolio/books-3.jpg')}}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Books 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="assets/img/portfolio/books-3.jpg" title="Branding 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            <p>Excellence Through Client Experiences</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                        "loop": true
                        , "speed": 600
                        , "autoplay": {
                            "delay": 5000
                        }
                        , "slidesPerView": "auto"
                        , "pagination": {
                            "el": ".swiper-pagination"
                            , "type": "bullets"
                            , "clickable": true
                        }
                        , "breakpoints": {
                            "320": {
                                "slidesPerView": 1
                                , "spaceBetween": 40
                            }
                            , "1200": {
                                "slidesPerView": 3
                                , "spaceBetween": 10
                            }
                        }
                    }

                </script>
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('storage/' . $testimonial->image) }}" class="testimonial-img" alt="">
                            <h3>{{$testimonial->name}}</h3>
                            <h4>{{$testimonial->designation}}</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>{{$testimonial->message}}</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- /Testimonials Section -->



    {{-- <!-- Faq Section -->
    <section id="faq" class="faq section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                            <div class="faq-content">
                                <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                            <div class="faq-content">
                                <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                            <div class="faq-content">
                                <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                            <div class="faq-content">
                                <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div><!-- End Faq Column-->

            </div>

        </div>

    </section><!-- /Faq Section --> --}}

    <!-- Team Section -->
    <section id="team" class="team section section-bg dark-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Team</h2>
            <p>Meet the Professionals Behind Our Success</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                @foreach($teams as $index => $team)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{ asset('storage/' . $team->image) }}" class="img-fluid" alt="{{ $team->name }}">
                            <div class="social">
                                @if($team->twitter) <a href="{{ $team->twitter }}"><i class="bi bi-twitter-x"></i></a> @endif
                                @if($team->facebook) <a href="{{ $team->facebook }}"><i class="bi bi-facebook"></i></a> @endif
                                @if($team->instagram) <a href="{{ $team->instagram }}"><i class="bi bi-instagram"></i></a> @endif
                                @if($team->linkedin) <a href="{{ $team->linkedin }}"><i class="bi bi-linkedin"></i></a> @endif
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{ $team->name }}</h4>
                            <span>{{ $team->designation }}</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                @endforeach
            </div>
        </div>

    </section>

    <!-- /Team Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Connect with Creative Biomed</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6 ">
                    <div class="row gy-4">

                        <div class="col-lg-12">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>{{$settings[0]->company_address ?? ''}} </p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>{{$settings[0]->phone ?? ''}} </p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>{{$settings[0]->email ?? ''}} </p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>
                </div>

                <div class="col-lg-6">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{route('contactuses.store')}}" method="post" class="php-email-form">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="4" placeholder="Message" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                {{-- {{-- <div class="loading">Loading</div> --}}
                                {{-- <div class="error-message"></div> --}}
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

</main>
@endsection
