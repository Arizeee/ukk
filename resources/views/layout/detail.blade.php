
<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== FAVICON ===============-->
      <link rel="shortcut icon" href="{{ asset('front/assets/img/flaticon.png') }}" type="image/x-icon">
    
      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

      <!--=============== SWIPER CSS ===============-->  
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

      <link rel="stylesheet" href="{{ asset('front/landing/assets/css/swiper-bundle.min.css') }}">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="{{ asset('front/landing/assets/css/style.css') }}">


      <title>Responsive book website - Bedimcode</title>
   </head>
   <body>
      <!-- ga kepake -->

      <!--==================== MAIN ====================-->
      @include('layout.landing.navbar')
        <!-- Header-->
        <!-- Section-->
        @yield('content')
        <!-- Footer-->
        @include('layout.landing.footer')
      

      <!--========== SCROLL UP ==========-->
      <a href="" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
      </a>

      <!--=============== SCROLLREVEAL ===============-->
      <script src=""></script>

      <!--=============== SWIPER JS ===============-->
      <script src="{{ asset('front/landing/assets/js/swiper-bundle.min.js') }}"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      <!--=============== MAIN JS ===============-->
      <script src="{{ asset('front/landing/assets/js/main.js') }}"></script>
   </body>
</html>