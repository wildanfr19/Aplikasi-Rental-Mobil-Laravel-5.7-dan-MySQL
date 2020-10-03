
@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-4">
     <div class="card">
       <div class="card-header"><strong>Ubah Pemesan</strong></div>

       <div class="card-body">
        <form method="POST" action="{{ route('pemesan.update', $data->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama">Nama Pemesan</label>
            <input type="text" name="nama" value="{{ $data->nama }}" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
          <div class="form-group">
          <label for="jenis_kelamin">Nama Merk</label>
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
            <option value="L" {{ ($data->jenis_kelamin === 'L') ?'selected' : ''}}>Laki-laki</option>
            <option value="P" {{ ($data->jenis_kelamin === 'P') ?'selected' : ''}}>Perempuan</option>
          </select>
        </div>

          <div class="form-group">
            <label for="nama">Alamat</label>
            <textarea name="alamat" id="alamat" equired="required" placeholder="ketik" autocomplete="off" class="form-control"> {{ $data->alamat }}</textarea>
          </div>
          <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto"  placeholder="ketik" autocomplete="off" class="form-control-file">
            <img src="{{ asset('img/datapemesan/' . $data->foto) }}" alt="" width="100" height="100">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Ubah</button>
            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
            <a href="{{ route('pemesan.index') }}" class="btn btn-sm btn-primary" title=""> Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>


</div>
</div>
@endsection

