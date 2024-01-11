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
                {{-- <div class="row">
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
                </div> --}}

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="{{ $i->name }}"
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
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Angkatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="{{ $i->angkatan }}"
                            readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="{{ $i->username }}"
                            readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="basic-default-name" value="{{ $i->email }}"
                            readonly />
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
