<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\Pemesan;
use App\Mobil;
use App\Perjalanan;
use App\Jenbay;
class DataPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesan = Pemesan::all();
        $mobil = Mobil::all();
        $perjalanan = Perjalanan::all();
        $jenbay = Jenbay::all();
        $data = Pesanan::with(['pemesan','mobil','perjalanan','jenbay'])->get();
        return view('datapesanan.index', compact('data','pemesan','mobil','perjalanan','jenbay'));
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
        $request->validate([
            'id_pemesan'=> 'required|exists:pemesan,id',
            'id_mobil'=> 'required|exists:mobil,id',
            'id_perjalanan'=>'required|exists:perjalanan,id',
            'id_jenis_bayar'=>'required|exists:jenis_bayar,id'

        ]);
        $data = Pesanan::create($request->all());
        return redirect()->back()->with('status','Data Pesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pesanan::with(['pemesan','mobil','perjalanan','jenbay'])->where('id', $id)->first();
        return view('datapesanan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemesan = Pemesan::all();
        $mobil = Mobil::all();
        $perjalanan = Perjalanan::all();
        $jenbay = Jenbay::all();
        $data = Pesanan::find($id);
        return view('datapesanan.edit', compact('data','pemesan','mobil','perjalanan','jenbay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pemesan'=> 'required|exists:pemesan,id',
            'id_mobil'=> 'required|exists:mobil,id',
            'id_perjalanan'=>'required|exists:perjalanan,id',
            'id_jenis_bayar'=>'required|exists:jenis_bayar,id'

        ]);
        $data = Pesanan::find($id);
        $data->update($request->all());
        return redirect()->route('pesanan.index')->with('status','Data Pesanan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pesanan::find($id);
        $data->delete();
        return redirect()->back()->with('status','Data berhasil dihapus');
    }
}
