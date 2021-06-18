@extends('layout.utama')
@section('judul','Detail Gaji')

@section('content')
<div class="container-xl">
    <p><h3>Detail Gaji</h3> </p>

</div>

<!-- Small boxes (Stat box) -->
<div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Gaji Petugas</h3>

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
                      <th>Id Petugas</th>
                      <th>Nama</th>
                      <th>Uang Harian</th>
                      <th>Pendapatan</th>
                      <th>Bonus</th>
                      <th>Tips</th>
                      <th>Gaji</th>
                      <th>Aksi</th>

                      
                      
                  </tr>
                
                  @foreach ($data_petugas as $key)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $key->id}}</td>
                      <td>{{ $key->nama_petugas}}</td>
                      <td>Rp.{{ $key->uang_harian}}</td>
                      <td>Rp.{{ $key->pendapatan = $key->uang_harian *20/100}}</td>
                      <td>Rp.{{ $key->bonus = $key->uang_harian *5/100}}</td>
                      <td>{{ $key->tips}}</td>
                      <td>Rp.{{ $key->uang_harian+$key->pendapatan+$key->bonus+$key->tips }}</td>
                      <td>
                      <div class="btn-group">
                            <button type="button" class="btn btn-info">Aksi</button>
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/detail_gaji/edit_gaji/{{$key->id}}">Edit Status</a></li>
                               
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