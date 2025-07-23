<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Untuk saat ini, kita hanya menampilkan view.
        // Nanti di sini Anda bisa menambahkan logika untuk mengambil data
        // statistik untuk ditampilkan di dashboard.
        return view('admin.dashboard');
    }
}