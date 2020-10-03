@extends('layouts.master')

@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-car"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Data Mobil</span>
            <span class="info-box-number">
              {{ $mobil }}
              <small></small>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Data Pemesan</span>
            <span class="info-box-number">{{ $pemesan }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book-open"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Data Pesanan</span>
            <span class="info-box-number">{{ $pesanan }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Data Akun</span>
            <span class="info-box-number">2</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  <div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header">
                <strong>Akun yang sedang login</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('img/nm.jpg') }}" alt="" class="img-thumbnail mb-4">
                    </div>
                    <div class="col-md-9">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ Auth::user()->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><b>{{ Auth::user()->email }}</b></td>
                            </tr>
                            <tr>
                                <td>Tanggal & Jam Login</td>
                                <td>:</td>
                                <td><b>{{ Auth::user()->updated_at }}</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
    <!-- /.row -->

 
  </div><!--/. container-fluid -->
</section> 
@endsection
