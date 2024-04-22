@extends('layout.petugas.template')
@section('title', 'Table Buku | Admin')
@section('content')
    <main class="relative h-full pt-2 max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <nav class="relative flex flex-wrap  items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="text-white opacity-50" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                            aria-current="page">Tables</li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">Tables</h6>
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                            <span
                                class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text"
                                class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                placeholder="Type here..." />
                        </div>
                    </div>
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                        <li class="flex items-center pl-4 xl:hidden">
                            <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                                sidenav-trigger>
                                <div class="w-4.5 overflow-hidden">
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                </div>
                            </a>
                        </li>
                        <li class="flex items-center px-4">
                            <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                                <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                                <!-- fixed-plugin-button-nav  -->
                            </a>
                        </li>

                        <!-- notifications -->
                    </ul>
                </div>
            </div>
        </nav>
    </main>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->


        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6 class="dark:text-white">Tabel Peminjaman Prioritas</h6>
                            {{-- <button class="btn btn-success mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#modalCreate">Create</button> --}}
                            <a href="{{ route('petugas.peminjaman.exportPdf') }}" class="btn btn-danger mb-3">Export PDF</a>
                            <a href="{{ route('petugas.peminjaman.exportExcel') }}" class="btn btn-success mb-3">Export
                                Excel</a>

                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table
                                    class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                No</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                User</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Buku</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                stok_buku</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Tanggal Peminjaman</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Tanggal Pengembalian</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Status Peminjaman</th>

                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Action</th>
                                            <th
                                                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($priority as $item)
                                            @if ($item->status_peminjaman != 'Dikembalikan' && $item->status_peminjaman != 'Dipinjam' && $item->buku->stock != 0)
                                                <tr>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $loop->iteration }}</span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->user->name_lengkap }}</span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->buku->judul }}</span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                            {{ $item->buku->stock }}
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        @if ($item->tanggal_peminjaman === '' || $item->tanggal_peminjaman === null)
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">Menunggu</span>
                                                        @else
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->tanggal_peminjaman }}</span>
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        @if ($item->tanggal_pengembalian === '' || $item->tanggal_pengembalian === null)
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">Belum
                                                                Dikembalikan</span>
                                                        @else
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->tanggal_pengembalian }}</span>
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                            @if ($item->status_peminjaman == 'Dipinjam')
                                                                <div class="" role="alert">
                                                                    Dipinjam
                                                                </div>
                                                            @elseif ($item->status_peminjaman == 'Dikembalikan')
                                                                <div class="" role="alert">
                                                                    Dikembalikan
                                                                </div>
                                                            @elseif ($item->status_peminjaman == '')
                                                                <div class="" role="alert">
                                                                    Menunggu
                                                                </div>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="p-2  align-middle items-center  bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <div class="flex justify-evenly">
                                                            @if ($item->status_peminjaman == '' || $item->status_peminjaman == null)
                                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                                    data-bs-target="#approveModal{{ $item->id }}">Approve</button>
                                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#declinestockModal{{ $item->id }}">Decline</button>
                                                            @elseif ($item->status_peminjaman == 'Dipinjam')
                                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                                    disabled
                                                                    data-bs-target="#approveModal{{ $item->id }}">Approved</button>
                                                                {{-- @else
                                                            
                                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                                    data-bs-target="#approveModal{{ $item->id }}">Approve</button>
                                                                     <button class="btn btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#declinestockModal{{ $item->id }}">Decline</button> --}}
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- table 2 --}}
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6 class="dark:text-white">Tabel Peminjaman Non Prioritas</h6>
                            {{-- <button class="btn btn-success mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#modalCreate">Create</button> --}}
                            <a href="{{ route('petugas.peminjaman.exportPdf') }}" class="btn btn-danger mb-3">Export
                                PDF</a>
                            <a href="{{ route('petugas.peminjaman.exportExcel') }}" class="btn btn-success mb-3">Export
                                Excel</a>

                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table
                                    class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                No</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                User</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Buku</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                stok_buku</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Tanggal Peminjaman</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Tanggal Pengembalian</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Status Peminjaman</th>

                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Action</th>
                                            <th
                                                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman as $item)
                                            @if ($item->status_peminjaman != 'Dikembalikan' && $item->status_peminjaman != 'Dipinjam')
                                                <tr>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $loop->iteration }}</span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->user->name_lengkap }}</span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->buku->judul }}</span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                            {{ $item->buku->stock }}

                                                        </span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        @if ($item->tanggal_peminjaman === '' || $item->tanggal_peminjaman === null)
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">Menunggu</span>
                                                        @else
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->tanggal_peminjaman }}</span>
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        @if ($item->tanggal_pengembalian === '' || $item->tanggal_pengembalian === null)
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">Belum
                                                                Dikembalikan</span>
                                                        @else
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->tanggal_pengembalian }}</span>
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                            @if ($item->status_peminjaman == 'Dipinjam')
                                                                <div class="" role="alert">
                                                                    Dipinjam
                                                                </div>
                                                            @elseif ($item->status_peminjaman == 'Dikembalikan')
                                                                <div class="" role="alert">
                                                                    Dikembalikan
                                                                </div>
                                                            @elseif ($item->status_peminjaman == '')
                                                                <div class="" role="alert">
                                                                    Menunggu
                                                                </div>
                                                            @else
                                                                <div class="" role="alert">
                                                                    {{ $item->status_peminjaman }}
                                                                </div>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="p-2  align-middle items-center  bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <div class="flex justify-evenly">
                                                            @if ($item->status_peminjaman == '' && $item->buku->stock != 0)
                                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                                    data-bs-target="#approveModal{{ $item->id }}">Approve</button>
                                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#declinestockModal{{ $item->id }}">Decline</button>
                                                            @elseif ($item->status_peminjaman == 'Dipinjam' && $item->buku->stock != 0)
                                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                                    disabled
                                                                    data-bs-target="#approveModal{{ $item->id }}">Approved</button>
                                                            @elseif ($item->status_peminjaman == '' && $item->buku->stock == 0)
                                                                {{-- <button class="btn btn-warning" data-bs-toggle="modal" disabled
                                                                data-bs-target="#approveModal{{ $item->id }}">Stock kosong</button> --}}
                                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#declinestockModal{{ $item->id }}">Decline</button>
                                                            @elseif ($item->status_peminjaman == 'Ditolak')
                                                                {{-- <button class="btn btn-warning" data-bs-toggle="modal" disabled
                                                                data-bs-target="#approveModal{{ $item->id }}">Stock kosong</button> --}}
                                                                <button class="btn btn-danger" disabled
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#declinestockModal{{ $item->id }}">Declined</button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- table 3 --}}
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6 class="dark:text-white">Data peminjaman yang telah di Approve</h6>
                            {{-- <button class="btn btn-success mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#modalCreate">Create</button> --}}
                            {{-- <a href="{{ route('petugas.peminjaman.exportPdf') }}" class="btn btn-danger mb-3">Export PDF</a>
                            <a href="{{ route('petugas.peminjaman.exportExcel') }}" class="btn btn-success mb-3">Export
                                Excel</a> --}}

                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table
                                    class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                No</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                User</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Buku</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                stok_buku</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                no_telp</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Tanggal Peminjaman</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Tanggal Pengembalian</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Status Peminjaman</th>

                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Action</th>
                                            <th
                                                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman as $item)
                                            @if (
                                                $item->status_peminjaman != '' &&
                                                    $item->status_peminjaman != 'Dikembalikan' &&
                                                    $item->status_peminjaman != 'Ditolak')
                                                <tr>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $loop->iteration }}</span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->user->name_lengkap }}</span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->buku->judul }}</span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                            {{ $item->buku->stock }}

                                                        </span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                            {{ $item->no_telp }}

                                                        </span>
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        @if ($item->tanggal_peminjaman === '' || $item->tanggal_peminjaman === null)
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">Menunggu</span>
                                                        @else
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->tanggal_peminjaman }}</span>
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        @if ($item->tanggal_pengembalian === '' || $item->tanggal_pengembalian === null)
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">Belum
                                                                Dikembalikan</span>
                                                        @else
                                                            <span
                                                                class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $item->tanggal_pengembalian }}</span>
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span
                                                            class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                            @if ($item->status_peminjaman == 'Dipinjam')
                                                                <div class="" role="alert">
                                                                    Dipinjam
                                                                </div>
                                                            @elseif ($item->status_peminjaman == 'Dikembalikan')
                                                                <div class="" role="alert">
                                                                    Dikembalikan
                                                                </div>
                                                            @elseif ($item->status_peminjaman == '')
                                                                <div class="" role="alert">
                                                                    Menunggu
                                                                </div>
                                                            @elseif ($item->status_peminjaman == 'Ditolak')
                                                                <div class="" role="alert">
                                                                    Ditolak
                                                                </div>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="p-2  align-middle items-center  bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <div class="flex justify-evenly">
                                                            @if ($item->status_peminjaman == '')
                                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                                    data-bs-target="#approveModal{{ $item->id }}">Approve</button>
                                                            @elseif ($item->status_peminjaman == 'Dipinjam' && strtotime($item->tanggal_pengembalian) > strtotime(date('Y-m-d')))
                                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                                    disabled
                                                                    data-bs-target="#approveModal{{ $item->id }}">Approved</button>
                                                            @elseif ($item->status_peminjaman == 'Ditolak')
                                                                {{-- <button class="btn btn-warning" data-bs-toggle="modal" disabled
                                                                data-bs-target="#approveModal{{ $item->id }}">Stock kosong</button> --}}
                                                                <button class="btn btn-danger" disabled
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#declinestockModal{{ $item->id }}">Declined</button>
                                                            @elseif(strtotime($item->tanggal_pengembalian) < strtotime(date('Y-m-d')))
                                                                <button class="btn btn-warning" disabled
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#declinestockModal{{ $item->id }}">Terlambat</button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
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
        {{-- @include('admin.user.edit') --}}
        @include('petugas.peminjaman.approve')
        @include('petugas.peminjaman.decline')
        {{-- @include('admin.user.delete') --}}
    </main>
@endsection
