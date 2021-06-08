<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisDonatur;
use App\Models\Donatur;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('donatur.index', [
            'listDonatur' => Donatur::all(),
            'listJenisDonatur' => JenisDonatur::pluck('label', 'id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_donatur' => 'required',
            'alamat' => 'required',
            'nomor_ponsel' => 'required'
        ]);

        $donatur = new Donatur;
        $donatur->nama = $request->input('nama');
        $donatur->jenis_donatur_id = $request->input('jenis_donatur');
        $donatur->alamat = $request->input('alamat');
        $donatur->nomor_ponsel = $request->input('nomor_ponsel');
        $donatur->save();

        return redirect()->back()->with('success', 'Berhasil menambahkan donatur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('donatur.show', [
            'donatur' => Donatur::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_donatur' => 'required',
            'alamat' => 'required',
            'nomor_ponsel' => 'required'
        ]);

        $donatur = Donatur::find($request->input('id'));
        $donatur->nama = $request->input('nama');
        $donatur->jenis_donatur_id = $request->input('jenis_donatur');
        $donatur->alamat = $request->input('alamat');
        $donatur->nomor_ponsel = $request->input('nomor_ponsel');
        $donatur->save();

        return redirect()->back()->with('success', 'Berhasil edit data donatur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Donatur::find($request->id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data donatur');
    }
}
