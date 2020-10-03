
@extends('layouts.master')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-4">
     <div class="card">
       <div class="card-header"><strong>Tambah Pesanan</strong></div>

       <div class="card-body">
        <form method="POST" action="{{ route('pesanan.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="id_pemesan">Nama Pemesan</label>
            <select name="id_pemesan" id="id_pemesan" class="form-control">
              @foreach($pemesan as $row)
              <option value="{{ $row->id }}">{{ $row->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
           <label for="id_mobil">Mobil</label>
           <select name="id_mobil" id="id_mobil" class="form-control">
             @foreach($mobil as $row)
             <option value="{{ $row->id }}">{{ $row->nama }}</option>
             @endforeach
           </select>
         </div>
         <div class="form-group">
           <label for="id_perjalanan">Perjalanan</label>
           <select name="id_perjalanan" id="id_perjalanan" class="form-control">
            @foreach($perjalanan as $row)
            <option value="{{ $row->id }}">{{ $row->asal }} - {{ $row->tujuan }} ({{ $row->jarak }} KM)</option>
            @endforeach
           </select>
         </div>
         <div class="row">
          <div class="form-group col-6">
            <label for="warna">Jenis Bayar</label>
            <select name="id_jenis_bayar" id="id_jenis_bayar" class="form-control">
             @foreach($jenbay as $row)
             <option value="{{ $row->id }}">{{ $row->jenis_bayar }}</option>
             @endforeach
           </select>
           </div>
           <div class="form-group col-6">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
          <div class="form-group col-6">
            <label for="tgl_kembali">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" required="required" placeholder="ketik" autocomplete="off" class="form-control">
          </div>
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
      <strong>Daftar Pesanan</strong>
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
            <th>Pemesan</th>
            <th>Mobil</th>
            <th>Jenis Bayar</th>
            <th width="40%">AKSI</th>
          </tr>
        </thead>
        <tbody>
          @php $no =1; @endphp
          @foreach($data as $row)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->pemesan->nama }}</td>
            <td>{{ $row->mobil->nama }}</td>
            <td>{{ $row->jenbay->jenis_bayar }}</td>
            <td>
              <form action="{{ route('pesanan.destroy', $row->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('pesanan.edit', $row->id) }}" class="btn btn-sm btn-primary" title=""><i class="fa fa-edit"></i> Ubah</a>
                <a href="{{ route('pesanan.show', $row->id) }}" class="btn btn-sm btn-warning" title=""><i class="fa fa-eye"></i> Detail</a>
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
