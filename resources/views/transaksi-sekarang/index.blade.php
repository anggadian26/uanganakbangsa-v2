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

            .style-btn {
                margin-top: 5px;
                font-size: 12px;    
                padding: 5px 10px;   
            }

        }

        thead.fixed-thead {
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 1;
            width: 100%;
        }

        .table-container {
            margin-top: 40px;
            overflow-y: auto;
            max-height: 600px;
        }
    </style>
@endsection
@section('content')
    <div class="card p-3">
        <form action="#" method="get">
            @csrf
            <div class="row d-flex justify-content-end mt-2">
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Nama"
                            aria-label="Nama" aria-describedby="button-addon2" value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}"/>
                        <button class="btn btn-primary" type="submit" id="button-addon2"><i class='bx bx-search-alt-2'></i></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row mb-3 style-row">
            <div class="col-md-2">
                <button id="refreshButton" class="btn btn-primary style-btn">Refresh <i class='bx bx-refresh'></i></button>
            </div>
        </div>
        <div class="table-responsive text-nowrap position-static mt-4  table-container">
            <table class="table table-hover table-sm">
                <thead class="fixed-thead">
                    <tr>
                        <th>#</th>
                        <th>Tanggal</td>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (count($data) < 1)
                        <tr>
                            <td colspan="8" style="padding: 20px; font-size: 20px;"><span>No data found</span> </td>
                        </tr>
                    @else
                        @foreach ($data as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->tanggal }}</td>
                                <td>{{ $i->name }}</td>
                                <td>{{ $i->angkatan }}</td>
                                <td>Rp. {{ number_format($i->pemasukkan, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($i->penarikan, 0, ',', '.') }}</td>
                                <td>{{ $i->keterangan }}</td>
                            </tr>
                        @endforeach
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('add-script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Tambahkan event click pada tombol Refresh
        $('#refreshButton').on('click', function() {
            // Reload halaman
            location.reload(true);
        });
    });
</script>

@endsection
