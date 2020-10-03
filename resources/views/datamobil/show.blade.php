
@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-8">
     <div class="card">
       <div class="card-header"><strong>Detail Mobil</strong></div>

       <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <img src="{{ asset('img/'. $data->gambar) }}" alt="" class="img-thumbnail mb-4">
          </div>
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><b>{{ $data->nama }}</b></td>
              </tr>
              <tr>
                <td>Merk</td>
                <td>:</td>
                <td><b>{{ $data->merk->merk }}</b></td>
              </tr>
              <tr>
                <td>Nomer Polisi</td>
                <td>:</td>
                <td><b>{{ $data->no_polisi }}</b></td>
              </tr>
              <tr>
                <td>Jumlah Kursi</td>
                <td>:</td>
                <td><b>{{ $data->jumlah_kursi }}</b></td>
              </tr>
              <tr>
                <td>Tahun Beli</td>
                <td>:</td>
                <td><b>{{ $data->tahun_beli }}</b></td>
              </tr>
            </table>  
          </div>        
        </div>
        <div class="row">
          <div class="col">
            <form action="POST" method="{{ route('mobil.destroy', $data->id) }}">
              @csrf
              @method('DELETE')
              <a href="{{ route('mobil.edit', $data->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</button>
              <a href="{{ route('mobil.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
</div>
@endsection

