@extends('app')
@section('head')
    Tabungan
@endsection
@section('title2')
    Tabungan
@endsection
@section('style')
    <style>
        @media (max-width: 767px) {
            .btn-cari {
                /* padding: 4px 4px !important; */
                padding-left: 10px;
                padding-right: 10px;
                margin-left: 85%;
                padding-top: 2px;
                padding-bottom: 2px
            }
            .content-end {
                justify-content: end;
                padding-right: -20px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="card p-3">
        <div class="d-grid gap-4 justify-content-md-end content-end">
            <div class="row text-end">
                <small class="ml-auto">Sisa Saldo</small>
                <h5 class="fw-bold text-primary">Rp. 450.000</h5>
            </div>
        </div>
        <form action="#" method="get">
            @csrf
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="" class="fw-bold">Nama</label>
                    <input name="name" type="text" class="form-control" placeholder="Nama"
                        value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
                </div>
                <div class="col-md-2">
                    <label for="" class="fw-bold">Angkatan</label>
                    <input name="angkatan" type="number" class="form-control" placeholder="Angkatan"
                        value="{{ isset($_GET['angkatan']) ? $_GET['angkatan'] : '' }}">
                </div>
                <div class="col-md-3">
                    <label for="" class="fw-bold">Jurusan</label>
                    <select name="shift" class="form-select">
                        <option value="">- All -</option>
                        <option value="">REKAYASA PERANGKAT LUNAK</option>
                    </select>
                </div>

                <div class="col-md-1 pt-0">
                    <button type="submit" class="btn btn-primary mt-4 btn-cari">Cari</button>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Jumlah Sisa</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>12/12/2023</strong></td>
                        <td><span class="bx bx-up-arrow-alt text-success"></span>Rp. 200.000</td>
                        <td></span>Rp. -</td>
                        <td><span class="fw-semibold">Rp. 500.000</span></td>
                    </tr>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>12/12/2023</strong></td>
                        <td>Rp. -</td>
                        <td><span class="bx bx-down-arrow-alt text-danger"></span>Rp. 50.000</td>
                        <td><span class="fw-semibold">Rp. 450.000</span></td>
                    </tr>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>13/12/2023</strong></td>
                        <td>Rp. -</td>
                        <td><span class="bx bx-down-arrow-alt text-danger"></span>Rp. 50.000</td>
                        <td><span class="fw-semibold">Rp. 400.000</span></td>
                    </tr>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>14/12/2023</strong></td>
                        <td>Rp. -</td>
                        <td><span class="bx bx-down-arrow-alt text-danger"></span>Rp. 50.000</td>
                        <td><span class="fw-semibold">Rp. 350.000</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
