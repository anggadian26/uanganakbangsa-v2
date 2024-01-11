@extends('app')
@section('head')
    Beranda
@endsection
@section('title2')
    Beranda
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Hai {{ Auth::user()->name }} 🎉</h5>
                            <p class="mt-5">
                                Total Saldo Semua Siswa
                            </p>
                            <h5 class="fw-bold">Rp {{ number_format($total_saldo, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <span class="badge rounded-pill bg-success"><i class='rounded bx bx-up-arrow-alt'></i></span>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Pemasukkan</span>
                            <h3 class="fs-4 text-nowrap mb-1">{{ $totalPemasukkan >= 1000000 ? number_format($totalPemasukkan / 1000000, 3, ',', '') . ' M' : number_format($totalPemasukkan / 1000, 0, ',', '') . ' K' }}</h3>
                            <small>{{ \Carbon\Carbon::now()->format('F') }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <span class="badge rounded-pill bg-danger"><i class='rounded bx bx-down-arrow-alt'></i></span>
                                </div>
                                
                            </div>
                            <span class="fw-semibold d-block mb-1">Pengeluaran</span>
                            <h3 class="fs-4 text-nowrap mb-1">{{ $totalPenarikan >= 1000000 ? number_format($totalPenarikan / 1000000, 3, ',', '') . ' M' : number_format($totalPenarikan / 1000, 0, ',', '') . ' K' }}</h3>
                            <small>{{ \Carbon\Carbon::now()->format('F') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                        <div id="totalRevenueChart" class="px-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
