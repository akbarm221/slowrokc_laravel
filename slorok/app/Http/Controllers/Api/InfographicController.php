<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EducationStatistic; // Import model kita

class InfographicController extends Controller
{
    public function getEducationData()
    {
        // Ambil semua data dari tabel, urutkan sesuai keinginan
        $stats = EducationStatistic::orderBy('id', 'asc')->get();

        // Format data agar sesuai dengan kebutuhan Chart.js
        $labels = $stats->pluck('level');
        $data = $stats->pluck('count');

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}