@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-4">
     <div class="card">
       <div class="card-header"><strong>Tambah Perjalanan</strong></div>

       <div class="card-body">
        <form method="POST" action="{{ route('perjalanan.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="asal">Asal</label>
            <input type="text" name="asal" id="asal" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>

          <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" name="tujuan" id="tujuan" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
          <div class="form-group">
            <label for="jarak">Jarak</label>
            <input type="number" name="jarak" id="jarak" required="required" placeholder="ketik" autocomplete="off" class="form-control">
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
        <strong>Daftar Perjalanan</strong>
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
              <th>Asal</th>
              <th>Tujuan</th>
              <th>Jarak</th>
              <th width="27%">AKSI</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; @endphp
            @foreach($data as $row)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $row->asal }}</td>
              <td>{{ $row->tujuan }}</td>
              <td>{{ $row->jarak }}</td>
              <td>
                <form action="{{ route('perjalanan.destroy', $row->id) }}" method="POST">
                  @csrf
                  @method("DELETE")
                  <a href="{{ route('perjalanan.edit', $row->id) }}" class="btn btn-sm btn-primary" title=""><i class="fa fa-edit"></i> Ubah</a>
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
