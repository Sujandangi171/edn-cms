 <!-- about starts -->
 <section id="about">
     <div class="title">About - ENDEAVOR</div>

     <div class="content-container">
         <div class="section1 col-6">
             <p class="para">{!! $about->content_english ?? '' !!}</p>
         </div>


         <div class="section2 col-6">
             <div class="background-and-image-container">
                 <div class="back"></div>

                 @if (isset($about->files))
                     <img src="{{ asset('uploads/images/' . $about->files->value('title')) }}" alt="">
                 @endif
             </div>
         </div>
     </div>
 </section>
 <!-- about ends -->
