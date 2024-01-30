@extends('frontend.master')
@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Notes</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">Notes</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Notes Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Notes</h6>
            <h1 class="mb-5">Notes</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-2.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-3.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4 justify-content-center">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-2.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-3.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4 justify-content-center">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-2.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-3.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item bg-light" style="height: 350px; width: 300px;">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end"
                                style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                style="border-radius: 0 30px 30px 0;">Bye Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">BDT 149.00</h3>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Notes End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Our Students Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('frontend') }}/img/testimonial-1.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('frontend') }}/img/testimonial-2.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('frontend') }}/img/testimonial-3.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('frontend') }}/img/testimonial-4.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Join Button  -->
<div class="text-center">
    <a class="btn btn-primary py-3 px-5 mt-2" href="{{ route('student-login') }}">Join Now As a Student</a>
</div>
@endsection
