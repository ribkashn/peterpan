@extends('layout.utama')
@section('judul','Data User')

@section('content')
<div class="container-xl">
    <p><h3>Data User</h3> </p>

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
              <h4>Tambah</h4>

              <p>Data User</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="/data_petugas/input" class="small-box-footer">
              Tambah Data <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
<!-- ./col -->
</div>
<div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar User</h3>

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
                      <th>Nama</th>
                      <th>No Telp</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Role</th>
                      <th>Aksi</th>
                      
                  </tr>
                
                  @foreach ($data_user as $key)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $key->name}}</td>
                      <td>{{ $key->no_telp}}</td>
                      <td>{{ $key->email}}</td>
                      <td>{{ $key->password}}</td>
                      <td>
                        @if ($key->role == 1)
                          Admin
                        @elseif ($key->role == 2)
                          Petugas
                        @else
                          Pelanggan
                        @endif
                      </td>

                      
                      <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info">Aksi</button>
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                        
                                <li><a href="/data_petugas/delete_petugas/{{$key->id}}">Hapus</a></li>
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