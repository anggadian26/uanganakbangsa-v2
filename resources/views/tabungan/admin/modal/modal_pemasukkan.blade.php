<!-- Modal -->
<div class="modal fade" id="modalPemasukkan{{ $i->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Pemasukkan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pemasukkanAdmin') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Nama</label>
                            <input type="text" id="nameWithTitle" class="form-control" value="{{ $i->name }}"
                                readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Saldo</label>
                            <input type="text" id="nameWithTitle" class="form-control"
                                value="Rp. {{ number_format($i->saldo_amount, 0, ',', '.') }}" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Nominal Tambah Saldo</label>
                            <input type="text" class="form-control @error('pemasukkan') is-invalid @enderror" id="nominalInput"
                                aria-describedby="defaultFormControlHelp" oninput="formatNominal(this)"
                                name="hiden" />
                            @error('pemasukkan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Keterangan (Opsional)</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="keterangan"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="hiddenNominalInput1" name="pemasukkan" />
                    <input type="hidden" name="user_id" value="{{ $i->user_id }}" />
                    <input type="hidden" name="saldo_awal" value="{{ $i->saldo_amount }}" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">Tarik</button>
                    </div>
                </div>
            </form>
        </div>
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
            let hiddenInput = document.getElementById('hiddenNominalInput1');
            hiddenInput.value = numericValue;
        } else {
            // Tangani jika input tidak berisi nilai numerik
            input.value = '';
            input.setAttribute('data-value', '');
            let hiddenInput = document.getElementById('hiddenNominalInput1');
            hiddenInput.value = '';
        }
    }
</script>
