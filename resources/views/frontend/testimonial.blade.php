

<div class="title">Testimonials</div>

<div class="testimonial-container">
    <div class="owl-carousel">
        @foreach ($testimonials as $testimonial)
        <!-- Testimonial Slide -->
        <div class="testimonial-box">
            <div class="testimonial-image">
                <img class="img-thumbnail"
                    src="{{ asset('uploads/testimonials/' . $testimonial->files()->value('title')) }}"
                    alt="Profile Image">
            </div>
            <strong class="testimonial-word">"{{ $testimonial->words }}"</strong>

            <p class="testimonial-text">
                @if ($testimonial->name)
                {{ $testimonial->name }}
                @endif

                @if ($testimonial->name && $testimonial->post)
                , {{ $testimonial->post }}
                @elseif($testimonial->post)
                {{ $testimonial->post }}
                @endif

                @if (($testimonial->name || $testimonial->post) && $testimonial->company)
                , {{ $testimonial->company }}
                @elseif($testimonial->company)
                {{ $testimonial->company }}
                @endif
            </p>

        </div>
        @endforeach

    </div>
    <style>
        #testimonial {
            background-image: url('{{ asset(' testimonial-bg.jpg') }}');
        }
    </style>
</div>