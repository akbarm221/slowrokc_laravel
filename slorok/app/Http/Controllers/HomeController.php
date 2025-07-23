<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Hapus 'use Illuminate\Support\Facades\File;' karena tidak digunakan lagi untuk config

class HomeController extends Controller
{
    public function index()
    {
        // Data sementara untuk pengujian, agar tidak error
        $dummyData = [
            'site' => ['title' => 'Desa Slorok'],
            'infoCards' => [],
            'contact' => [
                'address' => '', 'phone' => '', 'email' => '',
                'workingHours' => ['weekdays' => '', 'saturday' => '', 'sunday' => ''],
                'socialMedia' => []
            ],
            'news' => []
        ];

        return view('pages.home', $dummyData);
    }
}