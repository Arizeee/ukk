
@extends('layout.dashboard.template')
@section('title', 'Table Kategori Buku | Admin')
@section('content')
<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    <!-- Navbar -->
    
  
    <div class="w-full px-6 py-6 mx-auto">
      <!-- table 1 -->
  
      <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
          <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <h6 class="dark:text-white">Tabel Kategori Buku</h6>
              <a href="{{ route('ulasan.exportPdf') }}" class="btn btn-danger mb-3 mt-3 mx-2">Export PDF</a>
              <a href="{{ route('ulasan.exportExcel') }}" class="btn btn-success mb-3 mt-3 mx-2">Export Excel</a>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
              <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                  <thead class="align-bottom">
                    <tr>
                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">User</th>
                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Buku</th>
                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Ulasan</th>
                      <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Rating</th>
                      {{-- <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th> --}}
                      <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ulasan as $item)

                    <tr>
                      <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $loop->iteration }}</span>
                      </td>
                      <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->user->name_lengkap }}</span>
                      </td>
                      <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->buku->judul }}</span>
                      </td>
                      <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->ulasan }}</span>
                      </td>
                      <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->rating }}</span>
                      </td>
                      {{-- <td class="p-2  align-middle items-center  bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <div class="flex justify-evenly">
                          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">Delete</button>
                        </div>
                        </td> --}}
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- card 2 -->
    </div>
    {{-- @include('admin.kategori.edit')
    @include('admin.kategori.create') --}}
    {{-- @include('petugas.ulasan.delete') --}}
  </main>
@endsection