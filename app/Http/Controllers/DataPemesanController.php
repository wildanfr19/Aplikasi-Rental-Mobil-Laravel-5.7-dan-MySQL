<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Pemesan;
use Illuminate\Support\Facades\File;
class DataPemesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pemesan::all();
        return view('datapemesan.index', compact('data'));
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
        $data = Pemesan::create($request->all());
        if ($request->hasFile('foto')) {
            $upload_photo = $request->file('foto');
            $extension = $upload_photo->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $tujuanPath = public_path() . DIRECTORY_SEPARATOR . 'img/datapemesan/';
            $upload_photo->move($tujuanPath, $filename);
            $data->foto = $filename;
            $data->save();
        }
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
        $data = Pemesan::find($id);
        return view('datapemesan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pemesan::find($id);
        return view('datapemesan.edit', compact('data'));
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
        $data = Pemesan::find($id);
        $data->update($request->all());
         if ($request->hasFile('foto')) {
             $upload_gambar = $request->file('foto');
             $extension = $upload_gambar->getClientOriginalExtension();
             $filename = md5(time()).'.'.$extension;
             $tujuanPath = public_path() . DIRECTORY_SEPARATOR . 'img/datapemesan/';
             $upload_gambar->move($tujuanPath, $filename);
             if ($data->foto) {
                 $gambar_lama = $data->foto;
                 $filepath = public_path() . DIRECTORY_SEPARATOR . 'img/datapemesan/' . DIRECTORY_SEPARATOR . $data->foto;

                 try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                            // return redirect()->back()->with(['error' => $e->getMessage()]);
                }
            }
            $data->foto = $filename;
            $data->save();



        }
        return redirect()->route('pemesan.index')->with('status','Data Berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemesan::find($id);
        $data->delete();
        return redirect()->back()->with('status','Data berhasil dihapus');
    }
}
