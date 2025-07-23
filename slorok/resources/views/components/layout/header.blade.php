<header
    class="fixed top-0 left-0 w-full h-16 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 z-40 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-between">
        {{-- Logo dan Nama Desa --}}
        <a href="{{ route('home') }}" class="flex items-center space-x-3">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Desa" class="w-10 h-10 rounded-full" />
            <span class="text-lg font-semibold text-primary-600 dark:text-primary-400">Desa Slorok</span>
        </a>

        {{-- Menu Navigasi Desktop --}}
        @php
            $navLinks = [
                ['name' => 'Beranda', 'icon' => 'fas fa-home', 'route' => 'home'],
                ['name' => 'Profile Desa', 'icon' => 'fas fa-info-circle', 'route' => 'profile'],
                ['name' => 'Infografis', 'icon' => 'fas fa-chart-bar', 'route' => 'infografis'],
                ['name' => 'Layanan', 'icon' => 'fas fa-cogs', 'route' => 'layanan'],
                ['name' => 'Bumdes', 'icon' => 'fas fa-store', 'route' => 'bumdes'],
            ];
        @endphp

        <nav class="hidden md:block">
            <ul class="flex space-x-8">
                @foreach ($navLinks as $link)
                            <li>
                                <a href="{{ route($link['route']) }}"
                                    class="flex items-center space-x-2 px-3 py-2 rounded-lg transition-all duration-200 
                                              {{ request()->routeIs($link['route'])
                    ? 'text-primary-600 bg-primary-50 dark:bg-primary-900/20'
                    : 'text-gray-600 dark:text-gray-300 hover:text-primary-600 hover:bg-primary-50 dark:hover:bg-primary-900/20' }}">
                                    <i class="{{ $link['icon'] }}"></i>
                                    <span>{{ $link['name'] }}</span>
                                </a>
                            </li>
                @endforeach
            </ul>
        </nav>

        {{-- Tombol Kontrol (Dark Mode & Mobile Menu) --}}
        <div class="flex items-center space-x-4">
            <button id="darkModeToggle"
                class="w-10 h-10 rounded-full border border-gray-300 dark:border-gray-600 flex items-center justify-center text-gray-600 dark:text-gray-300 hover:text-primary-600 hover:border-primary-600 transition-all duration-200">
                <i class="fas fa-moon"></i>
            </button>
            <button class="md:hidden w-10 h-10 flex flex-col justify-center items-center space-y-1"
                id="mobileMenuToggle">
                <span class="w-6 h-0.5 bg-gray-600 dark:bg-gray-300 transition-all duration-300"></span>
                <span class="w-6 h-0.5 bg-gray-600 dark:bg-gray-300 transition-all duration-300"></span>
                <span class="w-6 h-0.5 bg-gray-600 dark:bg-gray-300 transition-all duration-300"></span>
            </button>
        </div>
    </div>

    {{-- Menu Navigasi Mobile --}}
    <nav id="mobileMenu"
        class="md:hidden hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <ul class="px-4 py-2 space-y-1">
            @foreach ($navLinks as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-colors duration-200
                                      {{ request()->routeIs($link['route'])
                ? 'text-primary-600 bg-primary-50 dark:bg-primary-900/20'
                : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                            <i class="{{ $link['icon'] }} w-5"></i>
                            <span>{{ $link['name'] }}</span>
                        </a>
                    </li>
            @endforeach
        </ul>
    </nav>
</header>