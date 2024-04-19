<!-- sidenav  -->
<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0 " aria-expanded="false">
    <div class="h-19">
      <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
      <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
        <img src="{{ asset('back/img/logo-ct-dark.png') }}" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
        <img src="{{ asset('back/img/logo-ct.png') }}" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Perpustakaan Abi</span>
      </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
      <ul class="flex flex-col pl-0 mb-0">
        <li class="mt-0.5 w-full">
          @if (request()->is('petugas'))
          <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="{{ url('/petugas') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="ri-dashboard-line"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
          </a>
          @else
          <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/petugas') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="ri-book-fill"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
          </a>
          @endif
        </li>
        <li class="w-full mt-4">
          <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Table</h6>
        </li>
        <li class="mt-0.5 w-full">
          @if (request()->is('petugas/buku'))
          <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="{{ url('/petugas/buku') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="ri-dashboard-line"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Buku</span>
          </a>
          @else
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/petugas/buku') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="ri-book-fill"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Buku</span>
          </a>
          @endif
        </li>

        <li class="mt-0.5 w-full">
          @if (request()->is('petugas/kategori'))
          <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="{{ url('/petugas/kategori') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="ri-dashboard-line"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Kategori Buku</span>
          </a>
          @else
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/petugas/kategori') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="ri-book-fill"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Kategori Buku</span>
          </a>
          @endif
        </li>
        
        <li class="mt-0.5 w-full">
          @if (request()->is('petugas/peminjaman'))
          <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="{{ url('/petugas/peminjaman') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="ri-dashboard-line"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Peminjaman Buku</span>
          </a>
          @else
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/petugas/peminjaman') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="ri-book-fill"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Peminjaman Buku</span>
          </a>
          @endif
        </li>

        <li class="mt-0.5 w-full">
          @if (request()->is('petugas/ulasan'))
          <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="{{ url('/petugas/ulasan') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="ri-dashboard-line"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Ulasan Buku</span>
          </a>
          @else
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ url('/petugas/ulasan') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="ri-book-fill"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Ulasan Buku</span>
          </a>
          @endif
        </li>
       
 
        
        <li class="mt-0.5 w-full">
          <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('logout') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="ri-logout-box-fill"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Logout</span>
          </a>
        </li>
      </ul>
      
    </div>
  </aside>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const sidebarLinks = document.querySelectorAll(".sidebar-link");
  
      sidebarLinks.forEach(link => {
        link.addEventListener("click", function() {
          sidebarLinks.forEach(link => {
            link.classList.remove("active");
          });
          this.classList.add("active");
        });
      });
    });
  </script>
  
  <!-- end sidenav -->