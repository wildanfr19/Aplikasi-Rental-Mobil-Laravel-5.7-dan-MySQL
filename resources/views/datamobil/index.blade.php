
@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-4">
     <div class="card">
       <div class="card-header"><strong>Tambah Mobil</strong></div>

       <div class="card-body">
        <form method="POST" action="{{ route('mobil.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="merk">Nama Merk</label>

            <select name="id_merk" id="merk" class="form-control">
              @foreach($merk as $row)
              <option value="{{ $row->id }}">{{ $row->merk }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Nama Mobil</label>
            <input type="text" name="nama" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="warna">Warna Mobil</label>
              <input type="text" name="warna" id="warna" required="required" placeholder="ketik" autocomplete="off" class="form-control">
            </div>
            <div class="form-group col-6">
              <label for="jumlah_kursi">Jumlah Kursi</label>
              <input type="number" name="jumlah_kursi" id="jumlah_kursi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="no_polisi">No Polisi</label>
              <input type="text" name="no_polisi" id="no_polisi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
            </div>
            <div class="form-group col-6">
              <label for="tahun_beli">Tahun Beli</label>
              <input type="number" name="tahun_beli" id="tahun_beli" required="required" placeholder="ketik" autocomplete="off" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar Mobil</label>
            <input type="file" name="gambar" id="gambar" required="required" placeholder="ketik" autocomplete="off" class="form-control-file">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <strong>Daftar Mobil</strong>
      </div>

      <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-bordered" id="tblDetail">
          <thead>
            <tr>
              <th>No.</th>
              <th>Mobil</th>
              <th>Merk</th>
              <th>Kursi</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            @php $no =1; @endphp
            @foreach($mobil as $row)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $row->nama }}</td>
              <td>{{ $row->merk->merk }}</td>
              <td>{{ $row->jumlah_kursi }}</td>
              <td>
                <form action="{{ route('mobil.destroy', $row->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{ route('mobil.edit', $row->id) }}" class="btn  btn-sm btn-primary" title=""><i class="fa fa-edit"></i> Ubah</a>
                  <a href="{{ route('mobil.show', $row->id) }}" class="btn  btn-sm btn-primary" title=""><i class="fa fa-eye"></i> Detail</a>
                  <button type="submit" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#tblDetail').DataTable();
  } );

</script>

@endpush
