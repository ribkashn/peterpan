@extends('layout.utama')
@section('judul','Cuci Motor')

@section('content')
<div class="container-xl">
    <p><h3>Daftar Pesanan</h3> </p>

</div>
<!-- Small boxes (Stat box) -->
<div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Status Pesanan Anda</h3>

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
                      
                  </tr>
                
                  @foreach ($data_trans as $key)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $key->paket}}</td>
                      <td>{{ $key->nama_pelanggan}}</td>
                      <td>{{ $key->datepicker}}</td>
                      <td></td>
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
       

@endsection