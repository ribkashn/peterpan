@extends('layout.utama')
@section('judul','Cuci Motor')

@section('content')
<div class="container-xl">
    <p><h3>Daftar Pesanan</h3> </p>

</div>
@if (session("status"))
    <h6 class="alert alert-success">{{ session("status")}}</h6>
@endif
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
                      <th>Tips</th>
                      <th>Status Pesanan</th>
                      <th>Rating</th>
                      <th>Beri Rating</th>
                    
                  </tr>
                
                  @foreach ($data_trans as $key)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $key->paket}}</td>
                      <td>{{ $key->nama_pelanggan}}</td>
                      <td>{{ $key->datepicker}}</td>
                      <td>{{ $key->nama_petugas}}</td>
                      <td>{{ $key->harga}}</td>
                      <td>{{ $key->tips}}</td>
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
                        @if($key->rating != 0)
                          {{ $key->rating}}
                        @endif
                      </td>
                      <td>
                      @if($key->status_cuci == 3)
                            <a href="/rating/edit_rating/{{$key->id_trans}}" class="btn btn-sm btn-primary mt-4"> Beri Rating</a>
                      @endif
                      </td>
                  </tr>
                  @endforeach  
                </table>
             </div>
              
          </div>
          
</div>
       

@endsection