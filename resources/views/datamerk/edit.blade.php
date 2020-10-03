@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-4">
     <div class="card">
       <div class="card-header"><strong>Tambah Merk</strong></div>

       <div class="card-body">
        <form method="POST" action="{{ route('merk.update', $data->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="merk">Nama Merk</label>
            <input type="text" name="merk" value="{{ $data->merk }}" id="merk" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Ubah</button>
            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
            <a href="{{ route('merk.index') }}" class="btn btn-sm btn-primary" title=""><i class="fa fa-reload"></i> Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>

 
</div>
</div>
@endsection

