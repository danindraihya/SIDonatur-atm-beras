<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;
use App\Models\DonasiUang;
use App\Models\DonasiBeras;
use Carbon\Carbon;

class HomeController extends Controller
{

    private $chartLabel;
    private $chartDataDonasiUang;
    private $chartDataDonasiBeras;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->chartLabel = collect();
        $this->chartDataDonasiUang = collect();
        $this->chartDataDonasiBeras = collect();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->generateChartData();
        $data = [
            'jumlahDonatur' => Donatur::all()->count(),
            'jumlahDonasiUang' => DonasiUang::all()->sum('nominal'),
            'jumlahDonasiBeras' => DonasiBeras::all()->sum('jumlah'),
            'chartLabel' => $this->chartLabel,
            'chartDataDonasiUang' => $this->chartDataDonasiUang,
            'chartDataDonasiBeras' => $this->chartDataDonasiBeras,
        ];
        return view('home', $data);
    }


    private function generateChartData()
    {
        for ($i = 30; $i >= 0; $i--) {
            $date = Carbon::today()->subDay($i);
            $this->chartLabel->push($date->format('d/m'));
            $this->chartDataDonasiUang->push($this->sumDonasiUangByDate($date));
            $this->chartDataDonasiBeras->push($this->sumDonasiBerasByDate($date));
        }
    }

    private function sumDonasiUangByDate($date)
    {
        return DonasiUang::query()
            ->whereDate('created_at', $date)
            ->sum('nominal');
    }

    private function sumDonasiBerasByDate($date)
    {
        return DonasiBeras::query()
            ->whereDate('created_at', $date)
            ->sum('jumlah');
    }
}
