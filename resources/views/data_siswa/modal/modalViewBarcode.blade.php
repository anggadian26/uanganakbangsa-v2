<!-- Modal 1-->
<div class="modal fade" id="barcode{{ $i->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">Barcode {{ $i->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    {!! DNS2D::getBarcodeHTML("$i->barcode", 'QRCODE') !!}
                    {{-- {!! DNS2D::getBarcodePNGPath('$i->barcode', 'PDF417') !!} --}}
                    {{-- <img src="data:image/png;base64,{{ DNS2D::getBarcodePNGData($i->barcode, 'QRCODE') }}" alt="Barcode"> --}}
                    {{-- @php
                        echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG("$i->barcode", 'QRCODE',12,12) . '" alt="barcode"   />';
                    @endphp --}}
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form action="{{ route('download.barcode', ['barcodeValue' => $i->barcode]) }}" method="GET">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-primary" onclick="downloadBarcode('{{ $i->barcode }}')">Download</button>
                </form>
            </div> --}}
        </div>
    </div>
</div>

