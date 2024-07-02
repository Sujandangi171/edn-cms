
  <!-- Services Starts -->
  <section id="service">
      <div class="text">
          <div class="title">Our Services</div>
          <p>ENDEVOR offers a wide range of IT services, including but not limited to:</p>
      </div>
      <div class="container">
          @foreach ($services as $key => $service)
              <div class="content-box{{ ($key + 1) % 2 === 0 ? ' transition-box' : '' }}">
                  {!! $service->icon !!}
                  <h3>{{ $service->title }}</h3>
                  <p>{{ limitWords($service->description, 15) }}</p>
              </div>
          @endforeach
      </div>

  </section>
  <!-- Services Ends -->
