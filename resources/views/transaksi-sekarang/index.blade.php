@extends('app')
@section('head')
    TransaksiHariIni
@endsection
@section('title2')
    Transaksi Hari Ini
@endsection
@section('style')
    <style>
        @media (max-width: 767px) {
            .btn-responsive-padding {
                padding: 4px 4px !important;
                margin-left: 60%;
            }

            .btn-cari {
                padding-left: 10px;
                padding-right: 10px;
                margin-left: 85%;
                padding-top: 2px;
                padding-bottom: 2px
            }

        }
    </style>
@endsection
@section('content')
    <div class="card p-3">
        <div class="table-responsive text-nowrap position-static">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>Tanggal</td>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>

                    </tr>
                    {{-- @if (count($tabungan) < 1)
                        <tr>
                            <td colspan="8" style="padding: 20px; font-size: 20px;"><span>No data found</span> </td>
                        </tr>
                    @else
                        @foreach ($tabungan as $i)

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
                    @endif --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
