@extends('app')
@section('head')
    DewaUser
@endsection
@section('title2')
    Data User Uang Anak Bangsa
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
            <button data-bs-toggle="modal" data-bs-target="#addUser"
                class="btn btn-primary me-md-2 pe-3 ps-3 btn-responsive-padding">Tambah
                Data</button>
            @include('dewa.modalAddUser')
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th><strong>Aksi</strong></th>
                        <th><strong>Nama</strong></th>
                        <th><strong>Username</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Role</strong></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (count($user) < 1 || $user == null)
                        <tr>
                            <td colspan="8" style="padding: 20px; font-size: 20px;"><span>No data found</span> </td>
                        </tr>
                    @else
                        @foreach ($user as $i)
                            <tr>
                                <td>
                                    <a href="{{ route('userDeleteDewa', ['id' => $i->id]) }}" class="btn btn-icon btn-danger" onclick="return confirm('Are you sure?')">
                                        <span class="tf-icons bx bx-trash"></span>
                                      </a>
                                    
                                </td>
                                <td>{{ $i->name }}</td>
                                <td>{{ $i->username }}</td>
                                <td>{{ $i->email }}</td>
                                <td>{{ $i->role }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
