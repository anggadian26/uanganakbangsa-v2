<div class="modal modal-top fade" id="delete{{ $i->tabungan_id }}" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTopTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameSlideTop" class="form-label">Name</label>
                        <input type="text" id="nameSlideTop" class="form-control" placeholder="Enter Name" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailSlideTop" class="form-label">Email</label>
                        <input type="text" id="emailSlideTop" class="form-control" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-0">
                        <label for="dobSlideTop" class="form-label">DOB</label>
                        <input type="text" id="dobSlideTop" class="form-control" placeholder="DD / MM / YY" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
