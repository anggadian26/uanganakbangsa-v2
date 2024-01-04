@extends('app')
@section('head')
    Hapus Data
@endsection
@section('title2')
    Hapus Data Keuangan
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
        <form action="{{ route('actionDeleteReq') }}" method="POST">
            @csrf
            <div class="row mt-4 justify-content-start">
                <label class="col-sm-3 col-form-label text-center" for="basic-default-name">Angkatan</label>
                <div class="col-sm-7">
                    <input type="number" name="angkatan" class="form-control" id="basic-default-name">
                </div>
            </div>
            <div class="row mt-5 mb-3">
                <div class="col-sm-10 text-end">
                    <button type="submit" class="btn btn-primary">Hapus Data Keuangan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
