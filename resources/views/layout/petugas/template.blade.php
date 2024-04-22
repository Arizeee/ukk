<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('back/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('back/img/favicon.png') }}" />
    <title>Dashboard Bravest</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <!-- Nucleo Icons -->
    <link href="{{ asset('back/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('back/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>


  </head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-green-500 dark:hidden min-h-75"></div>
    {{-- panggil sidebar menu --}}
    @include('layout.petugas.sidebar')
   
    {{-- include memecah bagian --}}

    {{-- panggil section content --}}
    @yield('content')

  </body>
  <!-- plugin for charts  -->
  <script src="{{ asset('back/js/plugins/chartjs.min.js') }}" async></script>
  <!-- plugin for scrollbar  -->
  <script src="{{ asset('back/js/plugins/perfect-scrollbar.min.js') }}" async></script>
  <!-- main script file  -->
  <script src="{{ asset('back/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
      const sidebarLinks = document.querySelectorAll(".sidebar-link");

      sidebarLinks.forEach(link => {
          link.addEventListener("click", function(event) {
              sidebarLinks.forEach(link => {
                  link.classList.remove("active");
              });
              this.classList.add("active");
          });
      });
  });
</script>

</html>
