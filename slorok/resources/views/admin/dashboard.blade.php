@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        
        {{-- Header Dashboard --}}
        <div class="pb-8 border-b border-gray-200 dark:border-gray-700">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!
            </h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
                Ini adalah pusat kendali untuk mengelola konten website Desa Slorok.
            </p>
        </div>

        {{-- Konten Dashboard (Contoh Kartu Statistik) --}}
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-chart-bar text-3xl text-primary-500"></i>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelola Infografis</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Ubah data kependudukan, pertanian, dan APBD.</p>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <a href="#" class="text-sm font-medium text-primary-600 hover:text-primary-700">
                        Masuk &rarr;
                    </a>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-info-circle text-3xl text-blue-500"></i>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelola Profil Desa</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Ubah sejarah, visi, misi, dan struktur desa.</p>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">
                        Masuk &rarr;
                    </a>
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-images text-3xl text-accent"></i>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelola Galeri</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tambah atau hapus foto kegiatan desa.</p>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <a href="#" class="text-sm font-medium text-accent hover:opacity-80">
                        Masuk &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection