<!-- Modal 1-->
<div class="modal fade" id="detailUser{{ $i->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">Detail Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-5">
                        {!! DNS2D::getBarcodeHTML("$i->barcode", 'QRCODE') !!}
                    </div>
                    <div class="col-7">
                        <p><strong>Nama:</strong> {{ $i->name }}</p>
                        <p><strong>Jurusan:</strong> {{ $i->jurusan_name }}</p>
                        <p><strong>Angkatan:</strong> {{ $i->angkatan }}</p>
                        <p><strong>Username:</strong> {{ $i->username }}</p>
                        <p><strong>Email:</strong> {{ $i->email }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#modalToggle2" data-bs-toggle="modal"
                    data-bs-dismiss="modal">
                    Batal
                </button>
                <a class="btn btn-primary" href="{{ route('download-qrcode', ['barcode' => $i->barcode, 'info' => $i->name]) }}">Download QRCODE</a>
            </div>
        </div>
    </div>
</div>
