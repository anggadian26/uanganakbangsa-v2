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
    <div class="card p-3 position-relative">
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
                    <select name="jurusan_id" class="form-select">
                        <option value="">- All -</option>
                        @foreach ($jurusan as $i)
                            <option value="{{ $i->jurusan_id }}"
                                {{ isset($_GET['jurusan_id']) && $_GET['jurusan_id'] == $i->jurusan_id ? 'selected' : '' }}>
                                {{ $i->jurusan_code }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-1 pt-0">
                    <button type="submit" class="btn btn-primary mt-4 btn-cari">Cari</button>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap position-static">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <td>Aksi</td>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Jurusan</th>
                        <th>Total Saldo</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (count($siswa) < 1 || $siswa == null)
                        <tr>
                            <td colspan="8" style="padding: 20px; font-size: 20px;"><span>No data found</span> </td>
                        </tr>
                    @else
                        @foreach ($siswa as $i)
                            @include('tabungan.admin.modal.modal_penarikan')
                            @include('tabungan.admin.modal.modal_pemasukkan')
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#modalPenarikan{{ $i->id }}"><i
                                                    class="bx bx-transfer me-1 text-danger"></i>
                                                Penarikan</a>
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#modalPemasukkan{{ $i->id }}"><i
                                                    class="bx bx-transfer me-1 text-success"></i>
                                                Pemasukkan</a>
                                        </div>
                                    </div>
                                </td>
                                <td><strong>{{ $i->name }}</strong></td>
                                <td>{{ $i->angkatan }}</td>
                                <td>{{ $i->jurusan_code }}</td>
                                <td><span class="fw-semibold">Rp. {{ number_format($i->saldo_amount, 0, ',', '.') }}</span>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
