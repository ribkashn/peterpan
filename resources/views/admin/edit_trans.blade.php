@extends('layout.utama')
@section('judul','Form Cuci Mobil')

@section('content')
<div class="container-xl">
    <p><h3>Formulir Layanan Cuci Mobil</h3> </p>

</div>
<div class="row">
    <form action="/transaksi/update/{{$data_trans->id_trans}}" method="POST" class="form-horizontal">
    {{csrf_field()}}
        <div class="form-group">
            <div class="box box-default color-palette-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-tag"></i> Transaksi Status</h3>
                    </div>
                        <div class="box-body">

                            <!-- /.col -->
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Status Pesanan</label>
                                <div class="col-sm-3">
                                        <select class="form-control" name="status_cuci" id="status_cuci ">
                                            <option value="0">Pesanan Diproses</option>
                                            <option value="1">Pesanan Diterima</option>
                                            <option value="2">Proses Cuci</option>
                                            <option value="3">Selesai</option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Paket</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="paket" name="paket" value="{{ $data_trans->id_paket }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $data_trans->harga }}" readonly >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Plat Nomor</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" value="{{ $data_trans->plat_nomor }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{ $data_trans->nama_pelanggan }}" readonly>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Cuci</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="datepicker" name="datepicker" value="{{ $data_trans->datepicker }}">
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label class="col-sm-2 control-label">Bukti Bayar</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" id="bukti_image"name="bukti_image" value="{{ $data_trans->bukti_image }}">
                                </div>
                            </div> -->                     

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