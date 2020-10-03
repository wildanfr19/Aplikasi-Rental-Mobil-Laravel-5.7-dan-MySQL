
@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-4">
     <div class="card">
       <div class="card-header"><strong>Tambah Mobil</strong></div>

       <div class="card-body">
        <form method="POST" action="{{ route('mobil.update', $mobil->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="merk">Nama Merk</label>

            <select name="id_merk" id="merk" class="form-control">
              @foreach($merk as $row)
              <option value="{{ $row->id }}" {{ $mobil->id_merk == $row->id ? 'selected':''}}>{{ $row->merk }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Nama Mobil</label>
            <input type="text" name="nama" id="nama" value="{{ $mobil->nama }}" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="warna">Warna Mobil</label>
              <input type="text" name="warna" id="warna" value="{{ $mobil->warna }}" required="required" placeholder="ketik" autocomplete="off" class="form-control">
            </div>
            <div class="form-group col-6">
              <label for="jumlah_kursi">Jumlah Kursi</label>
              <input type="number" name="jumlah_kursi" value="{{ $mobil->jumlah_kursi }}" id="jumlah_kursi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="no_polisi">No Polisi</label>
              <input type="text" name="no_polisi" id="no_polisi" value="{{ $mobil->no_polisi }}" required="required" placeholder="ketik" autocomplete="off" class="form-control">
            </div>
            <div class="form-group col-6">
              <label for="tahun_beli">Tahun Beli</label>
              <input type="number" name="tahun_beli" id="tahun_beli" value="{{ $mobil->tahun_beli }}" required="required" placeholder="ketik" autocomplete="off" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar Mobil</label>
            <input type="file" name="gambar" id="gambar"  placeholder="ketik" autocomplete="off" class="form-control-file">
            <img src="{{ asset('img/' . $mobil->gambar) }}" width="100" height="100" alt="">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-success" name="Ubah"><i class="fa fa-plus"></i> Ubah</button>
            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
            <a href="{{ route('mobil.index') }}" class="btn btn-sm btn-primary" title=""> Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>


</div>
</div>
@endsection
