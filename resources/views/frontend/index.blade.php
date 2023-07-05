@extends('frontend.main_master')
@section('main')

            <!-- banner-area -->
            @include('frontend.home_all.home_slide')
            <!-- banner-area-end -->

            <!-- about-area -->
            @include('frontend.home_all.home_about')
            <!-- about-area-end -->

            <!-- services-area -->
            @include('frontend.home_all.home_services')
            <!-- services-area-end -->

            <!-- work-process-area -->
            @include('frontend.home_all.home_working')
            <!-- work-process-area-end -->

            <!-- portfolio-area -->

            <!-- portfolio-area-end -->
            @include('frontend.home_all.home_portfolio')
            <!-- partner-area -->
            @include('frontend.home_all.home_parteners')
            <!-- partner-area-end -->

            <!-- testimonial-area -->
            @include('frontend.home_all.home_testimonial')
            <!-- testimonial-area-end -->

            <!-- blog-area -->
            @include('frontend.home_all.home_blog')
            <!-- blog-area-end -->

            <!-- contact-area -->
            @include('frontend.home_all.home_contact_area')
            <!-- contact-area-end -->
            @endsection