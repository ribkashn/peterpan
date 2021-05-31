@extends('layout.utama')
@section('judul','Form Cuci Motor')

@section('content')
<div class="container-xl">
    <p><h3>Formulir Layanan Cuci Mobil</h3> </p>

</div>
<div class="row">
    <form action="/mobil_reg/simpan" method="POST" class="form-horizontal">
    {{csrf_field()}}
        <div class="form-group">
            <div class="box box-default color-palette-box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-tag"></i> Paket Regular Cuci Mobil</h3>
                    </div>
                        <div class="box-body">

                            <!-- /.col -->
                        <h5>Isilah formulir dibawah ini sesuai dengan data kendaraan dan jadwal cuci yang anda inginkan</h5>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Paket</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="paket" name="paket" value="Regular Mobil" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="harga" name="harga" value="Rp.50,000" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Plat Nomor</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" placeholder="Plat Nomor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama">
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Cuci</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="datepicker" name="datepicker" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bukti Bayar</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="bukti_bayar"name="bukti_bayar">
                            </div>
                            <span class="help-block">Lakukan Pembayaran Untuk Layanan Cuci Reguler Mobil Rp.50,000</span>
                            <div class="box-body">

                                <div class="callout callout-warning">
                                    <h4 class="text-primary">Bank BRI</h4>
                                    <p>No Rekening : 178 000 000 00</p>
                                    <p>Nama Pemilik Rekening : Car Wash Id</p>
                                </div>
                            </div>
                        </div>                     

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Pesan</button>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
            </div>
        </div>
    </form>
</div>
@endsection