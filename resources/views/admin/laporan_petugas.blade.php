@extends('layout.utama')
@section('judul','Laporan')

@section('content')
<div class="container-xl">
    <p><h3>Laporan Pendapatan Petugas</h3> </p>

</div>
@if (session("status"))
    <h6 class="alert alert-success">{{ session("status")}}</h6>
@endif
<!-- Small boxes (Stat box) -->

<div class="box box-primary">
  <div class="box-header with-border">
        <div class="btn-group">
                  <button type="button" class="btn btn-default btn-flat">Daftar Laporan</button>
                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="/laporan/transaksi">Laporan Pendapatan Transaksi</a></li>
                    <li><a href="/laporan_pelanggan">Laporan Pelanggan</a></li>
                    <li><a href="/laporan/petugas">Laporan Petugas</a></li>
                  </ul>
        </div>
  </div>
  <div class="card-body mt-3">
    <form action="" method="post" id ="form">
    {{csrf_field()}}
    

      <div class="row">
        <div class="col-md-3 col-12">
          <div class="form-group">
              
                <label for="tgl_awal">Tanggal Mulai</label>
                  <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="{{request('tgl_awal') ? request('tgl_awal') : ''}}">
              
          </div>
        </div>

        <div class="col-md-3 col-12">
          <div class="form-group">
              
                <label for="tgl_akhir">Tanggal Sampai</label>
                  <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="{{request('tgl_akhir') ? request('tgl_akhir') : ''}}">
              
          </div>
        </div>

        <div class="col-md-4 col-12">
          <button type="submit" class="btn btn-primary mt-4">Submit</button>
          <a href="/petugas/export?tgl_awal={{ request('tgl_awal') }}&tgl_akhir= {{ request('tgl_akhir') }}" class="btn btn-primary mt-4">Download</a>
        </div>
      </div>
    </form>
  </div>
      
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-striped">
                  <tr>
                      <th>No</th>
                      <th>Id Petugas</th>
                      <th>Nama</th>
                      <th>Uang Harian</th>
                      <th>Pendapatan</th>
                      <th>Bonus</th>
                      <th>Gaji</th>
                      

                      
                      
                  </tr>
                
                  @foreach ($data_petugas as $key)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $key->id}}</td>
                      <td>{{ $key->nama_petugas}}</td>
                      <td>Rp.{{ $key->uang_harian}}</td>
                      <td>Rp.{{ $key->pendapatan = $key->uang_harian *20/100}}</td>
                      <td>Rp.{{ $key->bonus = $key->uang_harian *5/100}}</td>
                      <td>Rp.{{ $key->uang_harian+$key->pendapatan+$key->bonus }}</td>
                      
                      
                  </tr>
                  @endforeach  
                </table>
             </div>
              
          </div>
          
</div>
        <!-- ./col -->
@endsection