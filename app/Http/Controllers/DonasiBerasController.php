<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;
use App\Models\DonasiBeras;

class DonasiBerasController extends Controller
{
    
    public function index() {


        return view('donasi_beras.index', [
            'donasiBeras' => DonasiBeras::all(),
            'listDonatur' => Donatur::pluck('nama', 'id'),
        ]);

    }

    public function store(Request $request) {

        $this->validate($request, [
            'donatur' => 'required',
            'jumlah' => 'required'
        ]);

        $donasiBeras = new DonasiBeras;
        $donasiBeras->donatur_id = $request->input('donatur');
        $donasiBeras->jumlah = $request->input('jumlah');
        $donasiBeras->save();

        return redirect()->back();

    }

    public function update(Request $request) {
        $this->validate($request, [
            'donatur' => 'required',
            'jumlah' => 'required'
        ]);

        $donasiBeras = DonasiBeras::find($request->input('id'));
        $donasiBeras->donatur_id = $request->input('donatur');
        $donasiBeras->jumlah = $request->input('jumlah');
        $donasiBeras->save();

        return redirect()->back();
    }

    public function destroy(Request $request) {

        $donasiBeras = donasiBeras::find($request->input('id'));
        $donasiBeras->delete();

        return redirect()->back();
    }

}
