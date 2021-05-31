@extends('layout.utama')
@section('judul','Cuci Mobil')

@section('content')
<div class="container-xl">
    <p><h3>Layanan Cuci Mobil</h3> </p>

</div>
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
            <a href="/mobil_reg/input" class="small-box-footer">
              Pesan Sekarang <i class="fa fa-arrow-circle-right"></i>
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
            <a href="/mobil_pre/input" class="small-box-footer">
              Pesan Sekarang <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
@endsection