<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Merk;
use App\Mobil;
use Illuminate\Support\Facades\File;
class DataMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = Merk::all();
        $mobil = Mobil::with('merk')->get();
        return view('datamobil.index', compact('merk','mobil'));
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
            'id_merk'=> 'required|exists:merk,id',
            'nama'=> 'required|string',
            'warna'=> 'required|string',
            'jumlah_kursi'=> 'required',
            'no_polisi'=>'required',
            'tahun_beli'=> 'required'
            
        ]);
        $data = Mobil::create($request->all());
        if ($request->hasFile('gambar')) {
            $upload_photo = $request->file('gambar');
            $extension = $upload_photo->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $tujuanPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $upload_photo->move($tujuanPath, $filename);
            $data->gambar = $filename;
            $data->save();
        }
        // dd($data);
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
        $data = Mobil::with('merk')->where('id', $id)->first();
        return view('datamobil.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $mobil = Mobil::with(['merk'])->where('id', $id)->first();
       $merk = Merk::all();
       return view('datamobil.edit', compact('mobil','merk')); 
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
            'nama'=> 'required|string',
            'warna'=> 'required|string',
            'jumlah_kursi'=> 'required',
            'no_polisi'=>'required',
            'tahun_beli'=> 'required',
            'id_merk'=> 'required|exists:merk,id'
            
        ]);
        $data = Mobil::find($id);
        $data->update($request->all());
        // dd($data);
        if ($request->hasFile('gambar')) {
            $upload_gambar = $request->file('gambar');
            $extension = $upload_gambar->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $tujuanPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $upload_gambar->move($tujuanPath, $filename);
            if ($data->gambar) {
                $gambar_lama = $data->gambar;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $data->gambar;

                try {
                   File::delete($filepath);
               } catch (FileNotFoundException $e) {
                           // return redirect()->back()->with(['error' => $e->getMessage()]);
               }
           }
           $data->gambar = $filename;
           $data->save();



       }
       return redirect()->route('mobil.index')->with('status','Data Berhasil dirubah');

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mobil::find($id);
        $data->delete();
        return redirect()->back()->with('status','Data berhasil dirubah');
    }
}
