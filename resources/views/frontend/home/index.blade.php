@extends('frontend.layouts.master')

@section('content')

<div class="mastermain">
<section id="home">
    @include('frontend.slider')
</section>
</div>

<section id="about-us">
    @include('frontend.about-us')
</section>

<section id="services">
    @include('frontend.service')
</section>

<section id="client">
    @include('frontend.client')
</section>

<section id="why-us">
    @include('frontend.why')
</section>



<section id="businesses">
    @include('frontend.partner')
</section>

<section id="careers"
    style="backdrop-filter: blur(50px); background-image: url('career.jpg'); background-size: cover; background-position: center; ">
    @include('frontend.career')
</section>

{{-- <section id="testimonial">
    @include('frontend.testimonial')
</section> --}}

<section id="contacts">
    @include('frontend.contact')
</section>
@endsection