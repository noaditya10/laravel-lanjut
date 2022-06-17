<button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modalOrder">
    Tambah Data Baru
</button>

<div class="modal fade" id="modalOrder" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id" />
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select"></select>
                </div>

                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select name="product_id" id="product_id" class="form-select"></select>
                </div>

                <div class="mb-3">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="number" class="form-control" name="qty">
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-toggle="modal">Close</button>
                <button id="simpan" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('/assets/pages/modalorder.js') }}"></script>
