<!-- career start -->
<section id="career" style="">
    <div class="career-text">
        <!-- <p class="career-head">Career</p> -->
        <div class="title" style="text-shadow: 2px 2px 4px #626262;">Career</div>
        <p>{!! $career->content_english ?? '' !!}</p>
    </div>
    <div class="career-btn">
        <a href="{{ route('frontend.vacancies.index') }}" class="btn1">Join us</a>
        <a href="#contact" class="btn2">Contact</a>
    </div>
</section>
<!-- career end -->
