@extends('layout.utama')
@section('judul','Form Tambah Data User')

@section('content')
<div class="container-xl">
    <p><h3>Formulir Tambah Data User</h3> </p>

</div>
<div class="row">
    <form action="/data_petugas/simpan" method="POST" class="form-horizontal">
    {{csrf_field()}}
        <div class="form-group">
            <div class="box box-default color-palette-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-tag"></i> Data User</h3>
                    </div>
                        <div class="box-body">

                            <!-- /.col -->
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">No Telpon</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="no_telp" name="no_telp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="email" name="email" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Role</label>
                                <div class="col-sm-3">
                                        <select class="form-control" name="role" id="role ">
                                            <option value="1">Admin </option>
                                            <option value="2">Petugas</option>
                                            <option value="3">Pelanggan </option>
                                            
                                     
                                        </select>
                                </div>
                        </div>
                
                        
                                            

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
            </div>
        </div>
    </form>
</div>
@endsection