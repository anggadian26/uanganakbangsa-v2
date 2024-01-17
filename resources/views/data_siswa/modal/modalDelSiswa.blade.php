<div class="modal fade" id="deleteUser{{ $i->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="text-center fw-1">
                        <h1>
                            <i class='bx bx-info-circle text-warning' style='font-size: 4em;'></i>
                        </h1>
                    </div>
                    <div class="text-center">
                        <p class="fw-semibold fs-6">
                            Apakah Anda ingin mengahapus data siswa
                            <span
                                class="fw-bold text-primary d-block mb-2">{{ $i->name }}-{{ $i->jurusan_code }}</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form action="{{ route('deleteUser', ['id' => $i->id]) }}" method="get"
                    style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
