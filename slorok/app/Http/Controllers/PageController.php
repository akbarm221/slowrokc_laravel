<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Menyiapkan data umum yang dibutuhkan oleh semua view.
     * Ini adalah data sementara agar tidak error.
     */
    private function getViewData()
    {
        return [
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
                'socialMedia' => [] // Dikosongkan sementara
            ],
        ];
    }

    public function profile()
    {
        // Kode ini hanya menampilkan view dan mengirim data dummy di atas
        return view('pages.profile', $this->getViewData());
    }

    public function infografis()
    {
        return view('pages.infografis', $this->getViewData());
    }

    public function layanan()
    {
        return view('pages.layanan', $this->getViewData());
    }

    public function bumdes()
    {
        return view('pages.bumdes', $this->getViewData());
    }

    public function hiddenPage()
    {
        return view('pages.hidden', $this->getViewData());
    }
}