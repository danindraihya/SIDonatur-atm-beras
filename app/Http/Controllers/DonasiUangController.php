<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;
use App\Models\DonasiUang;

class DonasiUangController extends Controller
{

    public function index() {


        return view('donasi_uang.index', [
            'donasiUang' => DonasiUang::all(),
            'listDonatur' => Donatur::pluck('nama', 'id'),
        ]);

    }

    public function store(Request $request) {

        $this->validate($request, [
            'donatur' => 'required',
            'nominal' => 'required'
        ]);

        $donasiUang = new DonasiUang;
        $donasiUang->donatur_id = $request->input('donatur');
        $donasiUang->nominal = $request->input('nominal');
        $donasiUang->save();

        return redirect()->back();

    }

    public function update(Request $request) {
        $this->validate($request, [
            'donatur' => 'required',
            'nominal' => 'required'
        ]);

        $donasiUang = DonasiUang::find($request->input('id'));
        $donasiUang->donatur_id = $request->input('donatur');
        $donasiUang->nominal = $request->input('nominal');
        $donasiUang->save();

        return redirect()->back();
    }

    public function destroy(Request $request) {

        $donasiUang = DonasiUang::find($request->input('id'));
        $donasiUang->delete();

        return redirect()->back();
    }

   
}
