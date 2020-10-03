
@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-4">
     <div class="card">
       <div class="card-header"><strong>Tambah Pemesan</strong></div>

       <div class="card-body">
        <form method="POST" action="{{ route('pemesan.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nama">Nama Pemesan</label>
            <input type="text" name="nama" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
          <div class="form-group">
          <label for="jenis_kelamin">Nama Merk</label>
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>

          <div class="form-group">
            <label for="nama">Alamat</label>
            <textarea name="alamat" id="alamat" equired="required" placeholder="ketik" autocomplete="off" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" required="required" placeholder="ketik" autocomplete="off" class="form-control-file">
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
        <strong>Daftar Pemesan</strong>
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
              <th>Nama</th>
              <th>Kelamin</th>
              <th width="40%">AKSI</th>
            </tr>
          </thead>
          <tbody>
            @php $no =1; @endphp
            @foreach($data as $row)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $row->nama }}</td>
              <td>{{ $row->jenis_kelamin }}</td>
              <td>
                <form action="{{ route('pemesan.destroy', $row->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{ route('pemesan.edit', $row->id) }}" class="btn  btn-sm btn-primary" title=""><i class="fa fa-edit"></i> Ubah</a>
                  <a href="{{ route('pemesan.show', $row->id) }}" class="btn  btn-sm btn-primary" title=""><i class="fa fa-eye"></i> Detail</a>
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
