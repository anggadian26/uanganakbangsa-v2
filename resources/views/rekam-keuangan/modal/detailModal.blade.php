<div class="modal fade" id="modalDetail{{ $i->tabungan_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Detail Rekam Keuangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="{{ $i->name }}"
                            readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Angkatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="{{ $i->angkatan }}"
                            readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Jurusan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="{{ $i->jurusan_name }}"
                            readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Waktu</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="{{ $i->created_at }}"
                            readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Pemasukkan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="Rp. {{ number_format($i->pemasukkan, 0, ',', '.') }}"
                            readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Penarikkan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="Rp. {{ number_format($i->penarikan, 0, ',', '.') }}"
                            readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Jumlah Sisa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="Rp. {{ number_format($i->jumlah_sisa, 0, ',', '.') }}"
                            readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="2" readonly>{{ $i->keterangan }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Dibuat Oleh</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="{{ $i->record_name }}"
                            readonly />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
