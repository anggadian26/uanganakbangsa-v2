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
                    <label for="" class="fw-bold">Tanggal</label>
                    <input name="tanggal" type="date" class="form-control" placeholder="Tanggal"
                        value="{{ isset($_GET['tanggal']) ? $_GET['tanggal'] : '' }}">
                </div>
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
                <div class="col-md-1 pt-0">
                    <button type="submit" class="btn btn-primary mt-4 btn-cari">Cari</button>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap position-static">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Tanggal</td>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Jumlah Sisa</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (count($tabungan) < 1)
                        <tr>
                            <td colspan="8" style="padding: 20px; font-size: 20px;"><span>No data found</span> </td>
                        </tr>
                    @else
                        @foreach ($tabungan as $i)
                            @include('rekam-keuangan.modal.detailModal')
                            @php
                                $currentTime = now();
                                $createdAt = \Carbon\Carbon::parse($i->created_at);
                                $hoursDifference = $currentTime->diffInHours($createdAt);
                            @endphp
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#modalDetail{{ $i->tabungan_id }}"><i
                                                    class='bx me-1 bx-detail'></i>
                                                Detail</a>
                                            @if ($hoursDifference < 24)
                                                <a class="dropdown-item" href="{{ route('deleteRekamKeuangan', ['id' => $i->tabungan_id]) }}"  onclick="confirmDelete()"><i
                                                        class='bx me-1 bxs-trash text-danger'></i>
                                                    Hapus Rekam keuangan</a>
                                            @endif

                                        </div>
                                    </div>
                                </td>
                                <td>{{ $i->tanggal }}</td>
                                <td>{{ $i->name }}</td>
                                <td>{{ $i->angkatan }}</td>
                                <td>Rp. {{ number_format($i->pemasukkan, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($i->penarikan, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($i->jumlah_sisa, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                    <li class="page-item {{ $tabungan->currentPage() == 1 ? 'disabled' : '' }} prev">
                        <a class="page-link" href="{{ $tabungan->previousPageUrl() }}" aria-label="Previous">
                            <i class="tf-icon bx bx-chevrons-left"></i>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $tabungan->lastPage(); $i++)
                        <li class="page-item {{ $tabungan->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $tabungan->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $tabungan->currentPage() == $tabungan->lastPage() ? 'disabled' : '' }} next">
                        <a class="page-link" href="{{ $tabungan->nextPageUrl() }}" aria-label="Next">
                            <i class="tf-icon bx bx-chevrons-right"></i>
                        </a>
                    </li>
                </ul>
                <span>Total data {{ $total[0]->totalData }}, halaman {{ $tabungan->currentPage() }} dari
                    {{ $tabungan->lastPage() }}</span>
            </nav>
        </div>
    </div>
@endsection
