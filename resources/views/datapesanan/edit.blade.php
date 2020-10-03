
@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-4">
     <div class="card">
       <div class="card-header"><strong>Tambah Pesanan</strong></div>

       <div class="card-body">
        <form method="POST" action="{{ route('pesanan.update', $data->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="id_pemesan">Nama Pemesan</label>
            <select name="id_pemesan" id="id_pemesan" class="form-control">
              @foreach($pemesan as $row)
              <option value="{{ $row->id }}" {{ $data->id_pemesan == $row->id ? 'selected':'' }}>{{ $row->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
           <label for="id_mobil">Mobil</label>
           <select name="id_mobil" id="id_mobil" class="form-control">
             @foreach($mobil as $row)
             <option value="{{ $row->id }}" {{ $data->id_mobil == $row->id ? 'selected':'' }}>{{ $row->nama }}</option>
             @endforeach
           </select>
         </div>
         <div class="form-group">
           <label for="id_perjalanan">Perjalanan</label>
           <select name="id_perjalanan" id="id_perjalanan" class="form-control">
            @foreach($perjalanan as $row)
            <option value="{{ $row->id }}" {{ $data->id_perjalanan == $row->id ? 'selected':'' }}>{{ $row->asal }} - {{ $row->tujuan }} ({{ $row->jarak }} KM)</option>
            @endforeach
           </select>
         </div>
         <div class="row">
          <div class="form-group col-6">
            <label for="warna">Jenis Bayar</label>
            <select name="id_jenis_bayar" id="id_jenis_bayar" class="form-control">
             @foreach($jenbay as $row)
             <option value="{{ $row->id }}" {{ $data->id_jenis_bayar == $row->id ? 'selected':'' }}>{{ $row->jenis_bayar }}</option>
             @endforeach
           </select>
           </div>
           <div class="form-group col-6">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" value="{{ $data->harga }}" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="{{ $data->tgl_pinjam }}" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
          <div class="form-group col-6">
            <label for="tgl_kembali">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" value="{{ $data->tgl_kembali }}" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
          <a href="{{ route('pesanan.index') }}" class="btn btn-sm btn-primary" title=""> Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>


</div>
</div>
@endsection
