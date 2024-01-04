<!-- Modal -->
<div class="modal fade" id="modalPenarikan{{ $i->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Penarikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('penarikanAdmin') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitlePenarikan{{ $i->id }}" class="form-label">Nama</label>
                            <input type="text" id="nameWithTitlePenarikan{{ $i->id }}" class="form-control" value="{{ $i->name }}"
                                readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="saldoPenarikan{{ $i->id }}" class="form-label">Saldo</label>
                            <input type="text" id="saldoPenarikan{{ $i->id }}" class="form-control"
                                value="Rp. {{ number_format($i->saldo_amount, 0, ',', '.') }}" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nominalInputPenarikan{{ $i->id }}" class="form-label">Nominal Tarik Saldo</label>
                            <input type="text" class="form-control @error('penarikan') is-invalid @enderror" id="nominalInputPenarikan{{ $i->id }}"
                                aria-describedby="defaultFormControlHelp" oninput="formatNominalPenarikan(this)"
                                name="hiden" />
                            @error('penarikan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="keteranganPenarikan{{ $i->id }}" class="form-label">Keterangan (Opsional)</label>
                            <textarea class="form-control" id="exampleFormControlTextareaPenarikan{{ $i->id }}" rows="2" name="keterangan"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="hiddenNominalInputPenarikan{{ $i->id }}" name="penarikan" />
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
    function formatNominalPenarikan(input) {
        let value = input.value.replace(/[^\d]/g, ''); // Hapus semua karakter kecuali digit
        let numericValue = parseInt(value);

        if (!isNaN(numericValue)) {
            let formattedValue = numericValue.toLocaleString('id-ID'); // Menggunakan konfigurasi lokal Indonesia
            input.value = `Rp. ${formattedValue}`;
            input.setAttribute('data-value', numericValue);

            // Set nilai sebenarnya di input tersembunyi
            let hiddenInput = document.getElementById('hiddenNominalInputPenarikan{{ $i->id }}');
            hiddenInput.value = numericValue;
        } else {
            // Tangani jika input tidak berisi nilai numerik
            input.value = '';
            input.setAttribute('data-value', '');
            let hiddenInput = document.getElementById('hiddenNominalInputPenarikan{{ $i->id }}');
            hiddenInput.value = '';
        }
    }
</script>
