<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Spp;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $year = ['2020','2021','2022','2023','2024','2025'];
        $day = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday', 'Sunday'];
        $month = ['Januari','Februari','Maret','April','May','Juni','Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' ];

        // $data = [];
        foreach ($month as $key => $value) {
            // $data[] = Pembayaran::where(\DB::raw("DATE_FORMAT(created_at, '%W')"), $value)->sum('total');
            $data[] = Pembayaran::where('bulan', $value)->count();
        }
        return view('admin/dashboard')->with('month',json_encode($month, JSON_NUMERIC_CHECK))->with('data', json_encode($data, JSON_NUMERIC_CHECK));
        // return view('admin/dashboard');
    }
}
