<!-- why start -->
<section id="why">
    <!-- <div class="title">Why ENDEAVOR?</> -->


    <div class="why-text">
        <p class="why-end">OUR PROCESS</p>
        <p>
            {!! $whyUs->content_english ?? '' !!}
        </p>
    </div>
    <div class="columns">

        @foreach ($processes as $key => $process)
            <div class="column">
                <div class="circle">
                    <div class="circle-number">{{ $key + 1 }}</div>
                </div>
                <div class="explanation">
                    <h5 class="topic"> {{ $process->title }}</h5>
                    <p> {{ $process->description }}</p>
                </div>
            </div>
        @endforeach

    </div>
    <style>
        #why {
            background-image: url('{{ asset('why.jpg') }}');
            /* other styles */
        }
    </style>

</section>
<!-- why end -->
