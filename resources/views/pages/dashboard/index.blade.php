@extends('layouts.master')
@section('main')
  <div class="title">Dashboard</div>
  <div class="content-wrapper">
    <div class="row same-height">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body d-flex flex-column gap-3">
            <div class="d-flex gap-3">
              <div class="card bg-primary text-white" style="width: 18rem;">
                <div class="card-body d-flex gap-3 justify-content-between align-items-center">
                  <div>
                    <h5 class="card-title">Total Customer</h5>
                    <p class="card-text fs-1 fw-bolder">{{ $totalPelanggan }}</p>
                  </div>
                  <i class="fa-solid fa-user fs-1"></i>
                </div>
              </div>
              <div class="card bg-primary text-white" style="width: 18rem;">
                <div class="card-body d-flex gap-3 justify-content-between align-items-center">
                  <div>
                    <h5 class="card-title">Total Terapis</h5>
                    <p class="card-text fs-1 fw-bolder">{{ $totalTerapis }}</p>
                  </div>
                  <i class="fa-solid fa-user fs-1"></i>
                </div>
              </div>
              <div class="card bg-success text-white" style="width: 18rem;">
                <div class="card-body d-flex gap-3 justify-content-between align-items-center">
                  <div>
                    <h5 class="card-title">Total Pesanan</h5>
                    <p class="card-text fs-1 fw-bolder">{{ $totalPesanan }}</p>
                  </div>
                  <i class="fa-solid fa-shopping-cart fs-1"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
