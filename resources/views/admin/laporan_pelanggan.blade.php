@extends('layout.utama')
@section('judul','Laporan ')

@section('content')
<div class="container-xl">
    <p><h3>Laporan Data Pelanggan </h3> </p>

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
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-striped">
                  <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Total Transaksi</th>
                      
                      
                  </tr>
                
                  @foreach ($data_trans as $key)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $key->nama_pelanggan}}</td>
                      <td>Rp.{{ $key->harga}}</td>
                      
                  </tr>
                  @endforeach  
                </table>
             </div>
              
          </div>
          
</div>
        <!-- ./col -->
@endsection