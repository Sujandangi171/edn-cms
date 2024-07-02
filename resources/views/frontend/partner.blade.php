 <!-- business start -->
 <section id="business">
     <div class="business-text">
         <div class="title">Business Affiliation</div>
     </div>
     <div class="business-logo">
         <div class="logo-row">

             @foreach ($partners as $partner)
                 <a href="{{ $partner->link }}" target="_blank">
                     <img src="{{ asset('uploads/business/' . $partner->files()->value('title')) }}" alt="Logo 1">
                 </a>
             @endforeach
         </div>
     </div>

 </section>
 <!-- business end -->
