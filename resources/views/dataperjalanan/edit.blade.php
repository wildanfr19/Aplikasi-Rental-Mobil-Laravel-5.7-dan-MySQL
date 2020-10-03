@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-4">
     <div class="card">
       <div class="card-header"><strong>Ubah Perjalanan</strong></div>

       <div class="card-body">
      <form method="POST" action="{{ route('perjalanan.update', $data->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="asal">Asal</label>
          <input type="text" name="asal" id="asal" value="{{ $data->asal }}" required="required" placeholder="ketik" autocomplete="off" class="form-control">
        </div>

        <div class="form-group">
          <label for="tujuan">Tujuan</label>
          <input type="text" name="tujuan" id="tujuan" value="{{ $data->tujuan }}" required="required" placeholder="ketik" autocomplete="off" class="form-control">
        </div>
        <div class="form-group">
          <label for="jarak">Jarak</label>
          <input type="number" name="jarak" id="jarak" value="{{ $data->jarak }}" required="required" placeholder="ketik" autocomplete="off" class="form-control">
        </div>
        
        <div class="form-group">
          <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
          <a href="{{ route('perjalanan.index') }}" class="btn btn-sm btn-primary" title=""><i class="fa fa-reload"></i> Kembali</a>
        </div>
      </form>
      </div>
    </div>
  </div>

  
</div>
</div>
@endsection

