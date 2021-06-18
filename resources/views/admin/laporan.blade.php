@extends('layout.utama')
@section('judul','Laporan')

@section('content')
<div class="container-xl">
    <p><h3>Laporan Transaksi</h3> </p>

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
          <a href="/transaksi/export?tgl_awal={{ request('tgl_awal') }}&tgl_akhir= {{ request('tgl_akhir') }}" class="btn btn-primary mt-4">Download</a>
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
                      <th>Paket</th>
                      <th>Nama</th>
                      <th>Tanggal Cuci</th>
                      <th>Petugas</th>
                      <th>Harga</th>
                      <th>Status Pesanan</th>
                      
                      
                  </tr>
                
                  @foreach ($data_trans as $key)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $key->paket}}</td>
                      <td>{{ $key->nama_pelanggan}}</td>
                      <td>{{ $key->datepicker}}</td>
                      <td>{{ $key->nama_petugas}}</td>
                      <td>{{ $key->harga}}</td>
                      <td class="text-success"> 
                        @if ($key->status_cuci == 1)
                          Pesanan Diterima
                        @elseif ($key->status_cuci == 2)
                          Proses Cuci
                        @elseif ($key->status_cuci == 3)
                          Selesai
                        @else
                          Pesanan Diproses
                        @endif
                      </td> 
                  </tr>
                  @endforeach  
                </table>
             </div>
              
          </div>
          
</div>
        <!-- ./col -->
@endsection