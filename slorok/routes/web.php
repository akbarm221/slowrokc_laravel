<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController; // Tambahkan ini
use App\Http\Controllers\Auth\FirebaseAuthController; // <--- PASTIKAN BARIS INI BENAR

// Rute untuk halaman Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk halaman lainnya
Route::get('/profil', [PageController::class, 'profile'])->name('profile');
Route::get('/infografis', [PageController::class, 'infografis'])->name('infografis');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/bumdes', [PageController::class, 'bumdes'])->name('bumdes');

// Rute untuk halaman tersembunyi (dari link di footer)
Route::get('/team-profile', [PageController::class, 'hiddenPage'])->name('hidden.page');

/* |--------------------------------------------------------------------------
| Rute untuk Data Grafik (API)
|--------------------------------------------------------------------------
*/
Route::get('/data/infografis/pendidikan', [InfographicController::class, 'getEducationData'])->name('data.infographics.education');
Route::get('/data/infografis/pendidikan', [InfographicController::class, 'getEducationData']);

// Rute untuk menampilkan halaman login admin
Route::get('/admin/login', [FirebaseAuthController::class, 'showLoginForm'])->name('admin.login');

// Rute yang akan dipanggil oleh JavaScript untuk verifikasi token
Route::post('/firebase/verify-token', [FirebaseAuthController::class, 'verifyToken'])->name('firebase.verify_token');

Route::post('/admin/logout', [FirebaseAuthController::class, 'logout'])->name('admin.logout');


/* |--------------------------------------------------------------------------
| Rute Admin yang Dilindungi
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Nanti semua rute admin lainnya (misal: untuk edit data) akan ditaruh di sini
});