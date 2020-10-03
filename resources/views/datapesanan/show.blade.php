
@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-8">
     <div class="card">
       <div class="card-header"><strong>Detail Pesanan</strong></div>

       <div class="card-body">
        <div class="row">
          <div class="col-sm-4">
            Nama Pemesan <br>
            Tanggal Pinjam <br>
            Tanggal Kembali <br>
            Mobil <br>
            Perjalanan <br>
            Total Harga <br>
            Jenis Bayar <br>
          </div>
          <div class="col-sm-1">
            : <br>
            : <br>
            : <br>
            : <br>
            : <br>
            : <br>
            : <br>
          </div>
          <div class="col-sm-6">
            <strong>{{ $data->pemesan->nama }}</strong><br>
            <strong>{{ $data->tgl_pinjam }}</strong><br>
            <strong>{{ $data->tgl_kembali  }}</strong><br>
            <strong>{{ $data->mobil->nama }}</strong><br>
            <strong>{{ $data->perjalanan->asal }} - {{ $data->perjalanan->tujuan }}</strong><br>
            <strong>Rp. {{ number_format($data->harga, 2, ',', '.') }}</strong><br>
            <strong>{{ $data->jenbay->jenis_bayar }}</strong><br>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col">
            <form action="{{ route('pesanan.destroy', $data->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('pesanan.edit', $data->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
              <button type="submit"class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</button>
              <a href="{{ route('pesanan.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
</div>
@endsection
