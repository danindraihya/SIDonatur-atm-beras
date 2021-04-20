<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;
use App\Models\DonasiUang;
use App\Models\DonasiBeras;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'jumlahDonatur' => Donatur::all()->count(),
            'donasiUang' => DonasiUang::all()->sum('nominal'),
            'donasiBeras' => DonasiBeras::all()->sum('jumlah'),
        ];
        return view('home', $data);
    }
}
