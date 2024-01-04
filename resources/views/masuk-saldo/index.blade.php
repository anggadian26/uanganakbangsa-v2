@extends('app')
@section('head')
    Pemasukkan Saldo
@endsection
@section('title2')
    Pemasukkan
@endsection
@section('content')
    <div class="card p-3">
        <div class="container-view">
            <form action="#" method="post">
                @csrf
                <div class="row mb-3 justify-content-start mt-4">
                    <label class="col-sm-2 col-form-label text-start" for="basic-default-name">Nama</label>
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
                <div class="row mb-3 justify-content-start mt-4">
                    <label class="col-sm-2 col-form-label text-start" for="basic-default-name">Nominal</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nominalInput" aria-describedby="defaultFormControlHelp"
                    oninput="formatNominal(this)" name="hiden" />
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 justify-content-start mt-4">
                    <label class="col-sm-2 col-form-label text-start" for="basic-default-name">Keterangan</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="keterangan"></textarea>
                    </div>
                </div>
                <input type="hidden" id="hiddenNominalInput" name="penarikan" />
            </form>
        </div>
    </div>
    <script>
        function formatNominal(input) {
                let value = input.value.replace(/[^\d]/g, ''); // Hapus semua karakter kecuali digit
                let numericValue = parseInt(value);

                if (!isNaN(numericValue)) {
                    let formattedValue = numericValue.toLocaleString('id-ID'); // Menggunakan konfigurasi lokal Indonesia
                    input.value = `Rp. ${formattedValue}`;
                    input.setAttribute('data-value', numericValue);

                    // Set nilai sebenarnya di input tersembunyi
                    let hiddenInput = document.getElementById('hiddenNominalInput');
                    hiddenInput.value = numericValue;
                } else {
                    // Tangani jika input tidak berisi nilai numerik
                    input.value = '';
                    input.setAttribute('data-value', '');
                    let hiddenInput = document.getElementById('hiddenNominalInput');
                    hiddenInput.value = '';
                }
            }
        </script>
    </script>
@endsection
