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
                      <th>Rating</th>
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
                      <td>
                        @if ($key->rating == 1)
                          Sangat Tidak Puas
                        @elseif ($key->rating == 2)
                          Tidak Puas
                        @elseif ($key->rating == 3)
                          Sedang
                        @elseif ($key->rating == 4)
                          Puas
                        @elseif ($key->rating == 5)
                          Sedang
                        @else
                          -
                        @endif
                      </td>
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