@props(['contact'])

<footer class="bg-gray-100 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            {{-- Kontak Kami --}}
            <div>
                <h3 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-4">Kontak Kami</h3>
                <div class="space-y-3 text-gray-600 dark:text-gray-300">
                    <p class="flex items-start space-x-3">
                        <i class="fas fa-map-marker-alt text-primary-600 dark:text-primary-400 mt-1 flex-shrink-0"></i>
                        <span>{{ $contact['address'] }}</span>
                    </p>
                    <p class="flex items-center space-x-3">
                        <i class="fas fa-phone text-primary-600 dark:text-primary-400 flex-shrink-0"></i>
                        <span>{{ $contact['phone'] }}</span>
                    </p>
                    <p class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-primary-600 dark:text-primary-400 flex-shrink-0"></i>
                        <span>{{ $contact['email'] }}</span>
                    </p>
                </div>
            </div>

            {{-- Jam Pelayanan --}}
            <div>
                <h3 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-4">Jam Pelayanan</h3>
                <div class="space-y-2 text-gray-600 dark:text-gray-300">
                    <p>{{ $contact['workingHours']['weekdays'] }}</p>
                    <p>{{ $contact['workingHours']['saturday'] }}</p>
                    <p>{{ $contact['workingHours']['sunday'] }}</p>
                </div>
            </div>

            {{-- Media Sosial --}}
            <div>
                <h3 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-4">Media Sosial</h3>
                <div class="flex space-x-4">
                    @foreach ($contact['socialMedia'] as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 bg-primary-600 hover:bg-primary-700 text-white rounded-full flex items-center justify-center transition-all duration-200 transform hover:-translate-y-1">
                            <i class="{{ $social['icon'] }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="border-t border-gray-200 dark:border-gray-700 pt-8 text-center text-gray-600 dark:text-gray-400">
            <a href="{{ route('hidden.page') }}"> {{-- Ganti dengan route yang sesuai --}}
                <p>&copy; 2025 Develop by MMD FILKOM 18 Universitas Brawijaya. Semua hak dilindungi.</p>
            </a>
        </div>
    </div>
</footer>