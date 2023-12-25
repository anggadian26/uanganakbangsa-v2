@extends('app')
@section('head')
    DataSiswa
@endsection
@section('title2')
    Data Siswa
@endsection
@section('style')
    <style>
        @media (max-width: 767px) {
            .btn-responsive-padding {
                padding: 4px 4px !important;
                margin-left: 60%; 
            }
            .btn-cari {
                /* padding: 4px 4px !important; */
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('tambah-siswa') }}" class="btn btn-primary me-md-2 pe-3 ps-3 btn-responsive-padding">Tambah Data</a>
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

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mt-4 btn-cari">Cari</button>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th><strong>Aksi</strong></th>
                        <th><strong>Nama</strong></th>
                        <th><strong>Angkatan</strong></th>
                        <th><strong>Jurusan</strong></th>
                        <th><strong>Username</strong></th>
                        <th><strong>Email</strong></th>
                        
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (count($siswa) < 1)
                        <tr>
                            <td colspan="8" style="padding: 20px; font-size: 20px;"><span>No data found</span> </td>
                        </tr>
                    @else
                        @foreach ($siswa as $i)
                        @include('data_siswa.modal.detail')
                        <tr>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalToggle"><i class="bx bx-detail me-1"></i>
                                            Detail</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $i->name }}</td>
                            <td>{{ $i->angkatan }}</td>
                            <td>{{ $i->jurusan_name }}</td>
                            <td>{{ $i->username }}</td>
                            <td>{{ $i->email }}</td>
                            
                            {{-- <td style="max-width: 10px;">{!! DNS2D::getBarcodeHTML("$i->barcode", 'QRCODE') !!}</td> --}}
                            {{-- <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td> --}}
                        </tr>
                        @endforeach
                    @endif
                    
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
