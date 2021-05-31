@extends('layout.utama')
@section('judul','Cuci Motor')

@section('content')
<div class="container-xl">
    <p><h3>Layanan Cuci Motor</h3> </p>

</div>
<!-- Small boxes (Stat box) -->
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h4>Rp.20,000</h4>

                <p>Cuci Motor Regular</p>
              </div>
              <div class="icon">
                <i class="fa fa-motorcycle"></i>
              </div>
              <a href="/motor_reg/input" class="small-box-footer">
                Pesan Sekarang <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
        </div>
        <!-- ./col -->
<!-- ./col -->
  <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
              <div class="inner">
                <h4>Rp.35,000</h4>

                <p>Premium Cuci Motor</p>
              </div>
              <div class="icon">
                <i class="fa fa-motorcycle"></i>
              </div>
              <a href="/motor_pre/input" class="small-box-footer">
                Pesan Sekarang <i class="fa fa-arrow-circle-right"></i>
              </a>
         </div>
  </div>
</div>
       

@endsection