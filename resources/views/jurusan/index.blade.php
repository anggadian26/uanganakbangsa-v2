@extends('app')
@section('head')
    Data Jurusan
@endsection
@section('title2')
    Data Jurusan
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
            <button type="button" class="btn btn-primary me-md-2 pe-3 ps-3 btn-responsive-padding" data-bs-toggle="modal"
                data-bs-target="#addDataModal">
                Tambah Data
            </button>
            @include('jurusan.modalAddData')
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th><strong>Aksi</strong></th>
                        <th><strong>Kode Jurusan</strong></th>
                        <th><strong>Nama Jurusan</strong></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (count($jurusan) < 1)
                        <tr>
                            <td colspan="8" style="padding: 20px; font-size: 20px;"><span>No data found</span> </td>
                        </tr>
                    @else
                        @foreach ($jurusan as $i)
                            @include('jurusan.modalConfirm')
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('deleteJurusan', ['id' => $i->jurusan_id]) }}" onclick="return confirm('Are you sure?')"><i
                                                    class="bx bx-trash me-1 text-danger"></i>
                                                Delete</a>

                                        </div>
                                    </div>
                                </td>
                                <td>{{ $i->jurusan_code }}</td>
                                <td>{{ $i->jurusan_name }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
