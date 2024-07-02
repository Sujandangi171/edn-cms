<!-- contact start -->
<section id="contact">
    <div class="title">Contact us</div>
    <div class="contact__content">
        <div class="contact__iframe">
            <iframe src="{{ getConfig('location') }}" width="" height="350" style="border:0; width: 100%;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <div class="contact-wrapper">
                <div class="contact__details">
                    <p><i class="fas fa-map-marker-alt"></i> <span>{!! getConfig('address') !!}</span></p>
                    <p><i class="fas fa-envelope"></i> <a
                            href="mailto:{{ getConfig('email') }}">{{ getConfig('email') }}</a></p>
                    <p><i class="fas fa-phone"></i> {{ getConfig('contact') }} </p>
                    <p>{{ getConfig('opening-days') }}</p>
                </div>

                <div class="qr-code">
                    <img src={{ asset('uploads/config/' . getConfig('qr-code')) }} alt="QR Code">
                </div>
            </div>
        </div>

        <div class="enquiry-form">
            <div class="enquiry"></div>
            <form action="{{ route('frontend.enquiries.store') }}" method="post">
                @csrf
                {{-- Subject --}}
                <div class="form-group">
                    <input type="subject" class="form-control" id="subject" name="subject" placeholder="Subject"
                        value="{{ old('subject') }}" required>
                    @error('subject')
                        <span class="text text-danger mt-2">{{ $message }}</span>
                    @enderror

                </div>

                {{-- Email --}}
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Name --}}
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Contact --}}
                <div class="form-group">
                    <input type="number" class="form-control" id="contact1" name="contact" placeholder="Contact"
                        value="{{ old('contact') }}" required>
                    @error('contact')
                        <span class="text text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>


                {{-- Message --}}
                <div class="form-group">
                    <textarea id="editor" name="message" placeholder="Message" class="form-control" rows="4">
                        {{ old('message') }}
                    </textarea>
                    @error('message')
                        <span class="text text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group captcha">
                    <div>
                        {!! NoCaptcha::display() !!}
                        {!! NoCaptcha::renderJs() !!}
                        @error('g-recaptcha-response')
                            <span class="text text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="contact-button">
                    <button type="submit" class="btn w-25"
                        style=" color:white; background-color: #24B14D; transition: background-color 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#4F5354'"
                        onmouseout="this.style.backgroundColor='#24B14D'">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Scroll to top button with Bootstrap styling -->
<button id="scrollToTopBtn" class="btn btn-success" onclick="scrollToTop()"
    style=" color:white; background-color: #24B14D; transition: background-color 0.3s ease; z-index:1000"
    onmouseover="this.style.backgroundColor='#4F5354'" onmouseout="this.style.backgroundColor='#24B14D'">
    <i class="fas fa-arrow-up"></i>
</button>




<!-- contact end -->
