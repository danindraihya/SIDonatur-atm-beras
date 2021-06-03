<?php

namespace App\Http\Controllers;

use App\Models\DonasiBeras;
use App\Models\DonasiUang;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function show(Request $request)
    {
        $year = Str::substr($request->week, 0, 4);
        $week = Str::substr($request->week, 6, 2);
        $date = $this->createDate($year, $week);
        $start = $date->startOfWeek()->toDateString();
        $end = $date->endOfWeek()->toDateString();

        return view('laporan.show', [
            'date' => $date,
            'donasiUang' => DonasiUang::whereBetween('created_at', [$start, $end])->get(),
            'donasiBeras' => DonasiBeras::whereBetween('created_at', [$start, $end])->get(),
        ]);
    }

    private function createDate($year, $week)
    {
        $date = new Carbon();
        $date->setISODate($year, $week);
        return $date;
    }

    public function cetak(Request $request)
    {
        $donasiUang = DonasiUang::whereBetween('created_at', [$request->startDate, $request->endDate])->get();
        $donasiBeras = DonasiBeras::whereBetween('created_at', [$request->startDate, $request->endDate])->get();
        
        $pdf = PDF::loadview('laporan.cetak', ['donasiUang' => $donasiUang, 'donasiBeras' => $donasiBeras, 'startDate' => $request->startDate, 'endDate' => $request->endDate]);
        return $pdf->stream("invoice.pdf");
    }
}
