@extends('layout.utama')
@section('judul','Hitung Gaji')

@section('content')
<div class="container-xl">
    <p><h3>Hitung Gaji Petugas</h3> </p>

</div>
@if (session("status"))
    <h6 class="alert alert-success">{{ session("status")}}</h6>
@endif

<div class="row">
    <form action="/detail_gaji/update/{{$data_petugas->id}}" method="POST" class="form-horizontal">
    {{csrf_field()}}
        <div class="form-group">
            <div class="box box-default color-palette-box">
                        <div class="box-body">

                            <!-- /.col -->

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Id Petugas</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="id" name="id" value="{{ $data_petugas->id }}" readonly >
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Petugas</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ $data_petugas->nama_petugas }}" readonly >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Uang Harian</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="uang_harian" name="uang_harian" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tips </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="tip" name="tip" value="{{ $data_petugas->tip }}" readonly >
                            </div>s
                        </div>
                        <!--<div class="form-group">
                            <label class="col-sm-2 control-label">Pendapatan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="pendapatan" name="pendapatan" value="{{ $data_petugas->pendapatan }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Persentase Pendapatan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="persen_pendapatan" name="persen_pendapatan" value="{{ $data_petugas->persen_pendapatan }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bonus</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="bonus" name="bonus" value="{{ $data_petugas->bonus }}"  >
                            </div>
                        </div> -->
                        
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Hitung</button>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
            </div>
        </div>
    </form>
</div>
@endsection