
@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-10">
     <div class="card">
       <div class="card-header"><strong>Detail Mobil</strong></div>

       <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <img src="{{ asset('img/datapemesan/'. $data->foto) }}" alt="" class="img-thumbnail mb-4">
          </div>
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><b>{{ $data->nama }}</b></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><b>{{ $data->jenis_kelamin }}</b></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><b>{{ $data->alamat }}</b></td>
              </tr>
            </table>  
          </div>        
        </div>
        <div class="row">
          <div class="col">
            <form action="POST" method="{{ route('pemesan.destroy', $data->id) }}">
              @csrf
              @method('DELETE')
              <a href="{{ route('pemesan.edit', $data->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</button>
              <a href="{{ route('pemesan.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
</div>
@endsection

