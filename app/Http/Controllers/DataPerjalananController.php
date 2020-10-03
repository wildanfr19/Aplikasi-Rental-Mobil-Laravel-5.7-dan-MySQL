<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perjalanan;     
class DataPerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Perjalanan::all();
        return view('dataperjalanan.index', compact('data'));
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
        $data = new Perjalanan;
        $data->asal = $request->asal;
        $data->tujuan = $request->tujuan;
        $data->jarak = $request->jarak;
        $data->save();
        return redirect()->back()->with('status','Data berhasil ditambahkan');
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
        $data = Perjalanan::find($id);
        return view('dataperjalanan.edit', compact('data'));
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
        $data = Perjalanan::find($id);
        $data->asal = $request->asal;
        $data->tujuan = $request->tujuan;
        $data->jarak = $request->jarak;
        $data->save();
        return redirect()->route('perjalanan.index')->with('status','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Perjalanan::find($id);
        $data->delete();
        return redirect()->back()->with('status','Data berhasil dihapus');
    }
}
