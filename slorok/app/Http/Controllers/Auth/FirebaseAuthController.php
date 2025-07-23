<?php

namespace App\Http\Controllers\Auth; // <--- PASTIKAN BARIS INI BENAR


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Pastikan Anda memiliki model User

class FirebaseAuthController extends Controller
{
    public function showLoginForm()
    {
        // Data sementara untuk layout
        $viewData = [
            'site' => ['title' => 'Desa Slorok'],
            'contact' => [
                'address' => 'Alamat desa akan ditampilkan di sini...',
                'phone' => '(000) 1234-5678',
                'email' => 'info@slorok.desa.id',
                'workingHours' => [
                    'weekdays' => 'Senin - Jumat: 08:00 - 16:00',
                    'saturday' => 'Sabtu: 08:00 - 12:00',
                    'sunday' => 'Minggu: Tutup',
                ],
                'socialMedia' => []
            ],
        ];

        // Kirim data ke view login
        return view('auth.login', $viewData);
    }

    public function verifyToken(Request $request)
    {
        $idToken = $request->input('idToken');

        $firebase = (new Factory)->withServiceAccount(config('firebase.credentials.file'));
        $auth = $firebase->createAuth();

        try {
            $verifiedIdToken = $auth->verifyIdToken($idToken);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Token tidak valid.'], 401);
        }

        $uid = $verifiedIdToken->claims()->get('sub');
        $firebaseUser = $auth->getUser($uid);

        // Cari user di database Anda, atau buat baru jika belum ada
        $user = User::firstOrCreate(
            ['firebase_uid' => $uid],
            [
                'name' => $firebaseUser->displayName ?? 'Admin User',
                'email' => $firebaseUser->email,
                'password' => bcrypt(uniqid()), // Beri password acak karena tidak akan dipakai
            ]
        );

        // Login user ke dalam sesi Laravel
        Auth::login($user);

        return response()->json(['status' => 'success', 'message' => 'Login berhasil!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}