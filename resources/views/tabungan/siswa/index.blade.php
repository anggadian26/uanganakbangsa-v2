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
                <h5 class="fw-bold text-primary">Rp. {{ number_format($saldo[0]->saldo_amount, 0, ',', '.') }}</h5>
            </div>
        </div>
        <form action="{{ route('tabunganIndex') }}" method="get">
            @csrf
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="" class="fw-bold">Tanggal</label>
                    <div class="input-group">
                        <input
                        name="tanggal" type="date" class="form-control" placeholder="tanggal"
                        value="{{ isset($_GET['tanggal']) ? $_GET['tanggal'] : '' }}"
                          aria-describedby="button-addon2"
                        />
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class='bx bx-search-alt-2'></i></button>
                      </div>
                
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
                    @if (count($tabungan) < 1)
                        <tr>
                            <td colspan="8" style="padding: 20px; font-size: 20px;"><span>No data found</span> </td>
                        </tr>
                    @else
                        @foreach ($tabungan as $i)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $i->tanggal }}</strong></td>
                                <td><span class="bx bx-up-arrow-alt text-success"></span>Rp. {{ number_format($i->pemasukkan, 0, ',', '.') }}</td>
                                <td><span class="bx bx-down-arrow-alt text-danger"></span>Rp. {{ number_format($i->penarikan, 0, ',', '.') }}</td>
                                <td><span class="fw-semibold">Rp. {{ number_format($i->jumlah_sisa, 0, ',', '.') }}</span></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                    <li class="page-item {{ ($tabungan->currentPage() == 1) ? 'disabled' : '' }} prev">
                        <a class="page-link" href="{{ $tabungan->previousPageUrl() }}" aria-label="Previous">
                            <i class="tf-icon bx bx-chevrons-left"></i>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $tabungan->lastPage(); $i++)
                        <li class="page-item {{ ($tabungan->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $tabungan->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ ($tabungan->currentPage() == $tabungan->lastPage()) ? 'disabled' : '' }} next">
                        <a class="page-link" href="{{ $tabungan->nextPageUrl() }}" aria-label="Next">
                            <i class="tf-icon bx bx-chevrons-right"></i>
                        </a>
                    </li>
                </ul>
                <span>Total data {{ $total[0]->totalData }}, halaman {{ $tabungan->currentPage() }} dari {{ $tabungan->lastPage() }}</span>
            </nav>
        </div>
    </div>
@endsection
