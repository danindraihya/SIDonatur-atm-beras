<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;
use App\Models\JenisDonatur;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDonatur = Donatur::all();

        return view('donatur.index')->with('listDonatur', $listDonatur);
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

        return redirect('/donatur')->with('success', 'Berhasil menambahkan donatur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $donatur = Donatur::find($request->id)->delete();
        
        return redirect('/donatur')->with('success', 'Berhasil menghapus data donatur');
    }
}
