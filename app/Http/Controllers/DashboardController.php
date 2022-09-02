<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
    public function index()
    {
        if(auth()->user()->level == 'admin') {
            return view('/home');
        } else {
            $absen = Attendance::whereDate('check_in', now())->where('user_id', auth()->user()->id)->first();
            return view('absensi', compact('absen'));
        }
    }

    public function downloadPdf(Request $request)
    {
        $sdate = $request->start_date;
        $ndate = $request->end_date;
        $absen = Attendance::with('user')->where('user_id', auth()->user()->id)
        ->whereBetween('check_in', [$sdate, $ndate])
        ->get();
        return view('report.list-absen-user', compact('absen'));
    }
}
