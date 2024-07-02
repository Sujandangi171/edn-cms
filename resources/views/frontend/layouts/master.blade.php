<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/service.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/client.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/why.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/business.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/gallery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/career.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/testimonial.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/join-us/join-hire.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/join-us/join-recruit.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/css/career-form/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/css/career-details/career-details.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{--
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/config/' getConfig('fav-icon') }}"> --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/config/' . getConfig('fav-icon')) }}">

    <!-- Splide CSS -->
    <link rel="stylesheet" href="{{ asset('js/frontend/splide-slider/css/splide.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    {{-- Magnific Popup --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }

        .mastermain {
            max-width: 1980px;
            margin: 0 auto;
        }

        .input-file-upload-btn {
            position: relative;
            top: -38px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>

    @yield('css')

    <title>{{ getConfig('company-name') }}</title>
</head>

<body>
    <!-- pre-loader start -->
    {{-- <div id="preloader">
        <img src='{{ asset('uploads/config/' . getConfig('preloader')) }}' id="loader" alt="Loading...">
    </div> --}}
    <!-- pre-loader End -->


    {{-- <div class="mastermain"> --}}
    @include('frontend.includes.header')
    @yield('content')
    @include('frontend.includes.footer')
    {{-- </div> --}}

    {{-- Magnific Popup --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('.popup-test').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

        });

        $(document).ready(function() {
            $('.popup-test').trigger('click');
        });
    </script>

    @yield('js')




</body>
