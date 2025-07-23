@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="bg-gradient-to-br from-primary-50 to-green-50 dark:from-gray-800 dark:to-gray-900 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left">
                    <h1
                        class="text-4xl lg:text-5xl font-bold text-primary-600 dark:text-primary-400 mb-6 animate-fade-in-up">
                        Selamat Datang di Desa Slorok
                    </h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 animate-fade-in-up animation-delay-200">
                        Desa yang maju, mandiri, dan sejahtera untuk semua warga
                    </p>
                    <a href="{{ route('profile') }}"
                        class="inline-block bg-primary-600 hover:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-200 transform hover:-translate-y-1 hover:shadow-lg animate-fade-in-up animation-delay-400">
                        Jelajahi Desa
                    </a>
                </div>
                <div class="animate-fade-in-right animation-delay-600">
                    <img src="{{ asset('assets/img/desa.jpg') }}" alt="Pemandangan Desa"
                        class="w-full h-auto rounded-xl shadow-lg" />
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="infoCards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg text-center">
                    <i class="fas fa-users text-4xl text-primary-600 dark:text-primary-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">2,500</h3>
                    <p class="text-gray-600 dark:text-gray-300 font-medium">Jumlah Penduduk</p>
                </div>
                <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg text-center">
                    <i class="fas fa-home text-4xl text-primary-600 dark:text-primary-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">650</h3>
                    <p class="text-gray-600 dark:text-gray-300 font-medium">Kepala Keluarga</p>
                </div>
                <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg text-center">
                    <i class="fas fa-map text-4xl text-primary-600 dark:text-primary-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">6,26 km²</h3>
                    <p class="text-gray-600 dark:text-gray-300 font-medium">Luas Wilayah</p>
                </div>
                <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg text-center">
                    <i class="fas fa-seedling text-4xl text-primary-600 dark:text-primary-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">3</h3>
                    <p class="text-gray-600 dark:text-gray-300 font-medium">Dusun</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-4">
                    Galeri Kegiatan
                </h2>
                <p class="text-gray-600 dark:text-gray-300">
                    Dokumentasi momen dan kegiatan di Desa Slorok.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <article class="bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('assets/img/desa.jpg') }}" alt="Kegiatan 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-sm text-gray-500 dark:text-gray-400">15 Juli 2025</span>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mt-2">Pembangunan Infrastruktur Desa
                        </h3>
                    </div>
                </article>
                <article class="bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('assets/img/team.jpg') }}" alt="Kegiatan 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-sm text-gray-500 dark:text-gray-400">10 Juli 2025</span>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mt-2">Sosialisasi Bersama Tim KKN
                        </h3>
                    </div>
                </article>
                <article class="bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('assets/img/desa.jpg') }}" alt="Kegiatan 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-sm text-gray-500 dark:text-gray-400">05 Juli 2025</span>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mt-2">Gotong Royong Warga</h3>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('/assets/js/home.js') }}"></script>
@endpush