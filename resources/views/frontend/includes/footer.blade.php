<!-- footer start -->
<footer>
    <div class="footer-bottom">
        <p>&copy; 2014-{{ now()->year }} <span
                style="color: #24b14d; font-weight:bold">{{ getConfig('company-name') }}</span> All rights reserved.</p>
    </div>
</footer>
<!-- footer end -->

<!-- pre-loader -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
      // Simulate loading time
      setTimeout(function() {
        // Hide preloader
        document.getElementById('preloader').style.display = 'none';
        // Show content
        document.getElementById('content').style.display = 'block';
      }, 1500); // Adjust the time as per your need
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuToggle = document.getElementById('check');
        var navLinks = document.querySelector('.nav-links');

        // Toggle the menu on button change
        menuToggle.addEventListener('change', function() {
            navLinks.classList.toggle('show', menuToggle.checked);
        });

        // Close the menu when a link is clicked (except for the Career link)
        document.querySelectorAll('.nav-links a:not(.exclude-close)').forEach(function(link) {
            link.addEventListener('click', function() {
                navLinks.classList.remove('show');
                menuToggle.checked = false;
            });
        });
    });
</script>



<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- pre-loader -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Simulate loading time
        setTimeout(function() {
            // Hide preloader
            document.getElementById('preloader').style.display = 'none';
            // Show content
            document.getElementById('content').style.display = 'block';
        }, 1500); // Adjust the time as per your need
    });
</script>
<!-- pre-loader end -->


{{-- JavaScript to handle navigation activation --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navLinks = document.querySelectorAll(".nav-links a");

        navLinks.forEach(link => {
            link.addEventListener("click", function() {
                navLinks.forEach(navLink => navLink.classList.remove("active"))
                this.classList.add("active");
            });
        });

        function setActiveNavLink() {
            const currentHash = window.location.hash;
            const activeNavLink = document.querySelector(`.nav-links a[href="${currentHash}"]`);
            if (activeNavLink) {
                activeNavLink.classList.add("active");
            }
        }
        setActiveNavLink();
    });
</script>

<!-- menu -->
<script>
    document.querySelectorAll('.nav-links a').forEach(item => {
        item.addEventListener('click', () => {
            document.getElementById('check').checked = false; // Collapse menu when any link is clicked
        });
    });
</script>

<script>
    $(document).ready(function() {
        function updateActiveClass() {
            $('a').removeClass('active');
            var hash = window.location.hash;
            $('a[href="' + hash + '"]').addClass('active');
        }
        updateActiveClass();
        $(window).on('hashchange', function() {
            updateActiveClass();
        });
    });
</script>






<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                700: {
                    items: 2, // Show 3 items on screens with width 768 pixels and above (laptops)
                    nav: true,
                },
                1200: {
                    items: 3, // Show 4 items on screens with width 1200 pixels and above (desktops)
                    nav: true,
                },
            },
        })
    })
</script>
<!-- Owl Carousel ends -->

<script>
    function toggleSeeMore() {
        var seeMoreSection = document.getElementById('seeMoreSection');
        seeMoreSection.classList.toggle('visible');
    }
</script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/c949492550.js" crossorigin="anonymous"></script>

<script src="{{ asset('js/frontend/splide-slider/js/splide.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('.splide', {
            type: 'slide',
            rewind: true,
            autoplay: true,
            interval: 3000
        }).mount();
    });
</script>

<!-- Scroll to top script -->
<script>
    function scrollToTop() {
        // Scroll to the top of the document with smooth behavior
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>

<!-- for the client -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'underline',
                    '|',
                    'bulletedList',
                    'numberedList'
                ]
            },
            language: 'en'
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    // Function to fade out the preloader
    function fadeOutPreloader() {
        document.getElementById('preloader').style.opacity = '0';
        setTimeout(function() {
            document.getElementById('preloader').style.display = 'none';
        }, 900);
    }
    setTimeout(fadeOutPreloader, 1000);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var scrollLinks = document.querySelectorAll('.scroll-link');
        var offset = 20; // Adjust the offset value based on your layout and preference

        scrollLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                var targetId = this.getAttribute('href').substring(1);
                var targetElement = document.getElementById(targetId);

                if (targetElement) {
                    var offsetTop = targetElement.offsetTop - offset;

                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>




</body>
