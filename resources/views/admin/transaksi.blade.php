@extends('layout.utama')
@section('judul','Cuci Mobil')

@section('content')
<div class="container-xl">
    <p><h3>Transaksi</h3> </p>

</div>
@if (session("status"))
    <h6 class="alert alert-success">{{ session("status")}}</h6>
@endif
<!-- Small boxes (Stat box) -->
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Rp.50,000</h4>

              <p>Cuci Mobil Regular</p>
            </div>
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <a href="/admin/mobil_reg/input" class="small-box-footer">
              Tambah Data <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h4>Rp.70,000</h4>

              <p>Premium Cuci Mobil</p>
            </div>
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <a href="/admin/mobil_pre/input" class="small-box-footer">
              Tambah Data <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h4>Rp.20,000</h4>

                <p>Cuci Motor Regular</p>
              </div>
              <div class="icon">
                <i class="fa fa-motorcycle"></i>
              </div>
              <a href="/admin/motor_reg/input" class="small-box-footer">
                Tambah Data <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
        </div>
        <!-- ./col -->
<!-- ./col -->
  <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
              <div class="inner">
                <h4>Rp.35,000</h4>

                <p>Premium Cuci Motor</p>
              </div>
              <div class="icon">
                <i class="fa fa-motorcycle"></i>
              </div>
              <a href="/admin/motor_pre/input" class="small-box-footer">
                Tambah Data <i class="fa fa-arrow-circle-right"></i>
              </a>
         </div>
  </div>
</div>
<div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Transaksi</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
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
                      <th>Bukti Bayar</th>
                      <th>Aksi</th>
                      
                  </tr>
                
                  @foreach ($data_trans as $key)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $key->paket}}</td>
                      <td>{{ $key->nama_pelanggan}}</td>
                      <td>{{ $key->datepicker}}</td>
                      <td>{{ $key->nama_petugas}}</td>
                      <td>Rp.{{ $key->harga}}</td>
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
                      <td>
                      <a href="/uploads/bukti_bayar/{{$key->bukti_image}}" target="_blank" rel="noopener noreferrer">Lihat Bukti Bayar</a>
                      </td>
                      <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info">Aksi</button>
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/transaksi/edit_trans/{{$key->id_trans}}">Edit Status</a></li>
                                <li><a href="/transaksi/delete_trans/{{$key->id_trans}}">Hapus</a></li>
                            </ul>
                        </div>
                      </td>
                  </tr>
                  @endforeach  
                </table>
             </div>
              
          </div>
          
</div>
        <!-- ./col -->
@endsection