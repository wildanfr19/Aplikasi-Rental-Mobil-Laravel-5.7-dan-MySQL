@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-4">
     <div class="card">
       <div class="card-header"><strong>Tambah Jenis Bayar</strong></div>

       <div class="card-body">
        <form method="POST" action="{{ route('jenbay.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="jenis_bayar">Jenis Bayar</label>
            <input type="text" name="jenis_bayar" id="jenis_bayar" required="required" placeholder="ketik" autocomplete="off" class="form-control">
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
        <strong>Daftar Merk</strong>
      </div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <table class="table table-bordered" id="tblDetail" width="100%">
          <thead>
            <tr>
              <th width="10%">No.</th>
              <th>Jenis Bayar</th>
              <th width="27%">AKSI</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; @endphp
            @foreach($data as $row)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $row->jenis_bayar }}</td>
              <td>
                <form action="{{ route('jenbay.destroy', $row->id) }}" method="POST">
                  @csrf
                  @method("DELETE")
                  <a href="{{ route('jenbay.edit', $row->id) }}" class="btn btn-sm btn-primary" title=""><i class="fa fa-edit"></i> Ubah</a>
                  <button type="submit" onclick="return confirm('Yakin anda menghapus ini?')" class="btn btn-sm btn-warning"><i class="fa fa-trash"></i> Hapus</button>
                </form>

              </td>
              @endforeach  
            </tr>
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
