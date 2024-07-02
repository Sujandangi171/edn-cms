  <!-- home start -->
  <section class="splide">
      <div class="splide__slider ">
          <div class="splide__track">
              <ul class="splide__list ">
                  @foreach ($sliders as $slider)
                      <li class="splide__slide">
                          <div class="">
                              <h3>{!! $slider->title ?? '' !!}</h3>
                              <p>{!! $slider->short_description ?? '' !!}</p>
                          </div>
                          <img class="{{ $slider->has_content ? 'dark-image' : '' }}"
                              src="{{ asset('uploads/sliders/' . $slider->files()->value('title')) }}" alt="">
                      </li>
                  @endforeach
              </ul>
          </div>
      </div>

      <div class="splide__progress">
          <div class="splide__progress__bar"></div>
      </div>
  </section>

  <!-- home end -->
