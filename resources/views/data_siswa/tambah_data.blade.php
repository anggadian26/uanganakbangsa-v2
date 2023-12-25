@extends('app')
@section('head')
    Tambah Data Siswa
@endsection
@section('title1')
    Data Siswa /
@endsection
@section('title2')
    Tambah
@endsection
@section('style')
<style>
    
</style>
@endsection
@section('content')
    <div class="card p-3">
        <div class="container-view">
            
            <form action="{{ route('add-siswa') }}" method="post">
                @csrf
                <div class="row mb-3 justify-content-start mt-4">
                    <label class="col-sm-3 col-form-label text-center" for="basic-default-name">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror" id="basic-default-name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-start mb-3">
                    <label class="col-sm-3 col-form-label text-center" for="basic-default-name">Jurusan</label>
                    <div class="col-sm-6">
                        <select name="jurusan_id" class="form-select" id="exampleFormControlSelect1"
                            aria-label="Default select example">
                            <option value=""></option>
                            @foreach ($jurusan as $i)
                                <option value="{{ $i->jurusan_id }}" {{ old('jurusan_id') == $i->jurusan_id ? 'selected' : '' }}>{{ $i->jurusan_name }}</option>
                            @endforeach
                        </select>
                        @error('jurusan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-start mb-3">
                    <label class="col-sm-3 col-form-label text-center" for="basic-default-name">Angkatan</label>
                    <div class="col-sm-6">
                        <input type="number" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror"
                            id="basic-default-name" value="{{ old('angkatan') }}">
                        @error('angkatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 justify-content-start">
                    <label class="col-sm-3 col-form-label text-center" for="basic-default-name">Username</label>
                    <div class="col-sm-6">
                        <input type="text" name="username"
                            class="form-control @error('username') is-invalid @enderror" id="basic-default-name"
                            value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 justify-content-start">
                    <label class="col-sm-3 col-form-label text-center" for="basic-default-name">Email</label>
                    <div class="col-sm-6">
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror" id="basic-default-name"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-5 justify-content-start">
                    <label class="col-sm-3 col-form-label text-center" for="basic-default-name">Password</label>
                    <div class="col-sm-6">
                        <input type="text" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="basic-default-name"
                            value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
               
                <div class="row justify-content-start mb-3">
                    <div class="col-sm-9 offset-sm-3">
                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                        <a href="{{ route('data-siswa') }}" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                {{-- <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('data-siswa') }}" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div> --}}
            </form>
        </div>
    </div>
@endsection
