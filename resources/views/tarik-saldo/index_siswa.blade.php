@extends('app')
@section('head')
    Tarik saldo
@endsection
@section('title2')
    Tarik Saldo
@endsection
@section('content')
    <div class="card p-3">
        <div class="d-grid gap-4 justify-content-md-end content-end">
            <div class="row text-end">
                <small class="ml-auto">Sisa Saldo</small>
                <h5 class="fw-bold text-primary">Rp. 450.000</h5>
            </div>
        </div>
        <form action="{{ route('tariksaldo-action') }}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="defaultFormControlInput" class="form-label">Nominal</label>
                <input type="text" class="form-control" id="nominalInput" aria-describedby="defaultFormControlHelp"
                    oninput="formatNominal(this)" name="hiden" />
                <div id="defaultFormControlHelp" class="form-text">
                    ketik sesuai dengan nominal yang anda tarik.
                </div>
            </div>

            <div class="mb-3">
                <label for="defaultFormControlInput" class="form-label">Keterangan (opsional)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="keterangan"></textarea>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <div class="col-sm-2 offset-sm-10">
                    <a href="{{ route('home-siswa') }}" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Tarik</button>
                </div>
            </div>
            <input type="hidden" id="hiddenNominalInput" name="penarikan" />
        </form>

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
    </div>
@endsection
