<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Supplier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-sm table-bordered">
                <tr>
                    <th class="text-right">Kode Supplier :</th>
                    <td>{{ $supplier->supplier_kode }}</td>
                </tr>
                <tr>
                    <th class="text-right">Nama Supplier :</th>
                    <td>{{ $supplier->supplier_nama }}</td>
                </tr>
                <tr>
                    <th class="text-right">Kontak :</th>
                    <td>{{ $supplier->kontak }}</td>
                </tr>
                <tr>
                    <th class="text-right">Alamat :</th>
                    <td>{{ $supplier->alamat }}</td>
                </tr>
                <tr>
                    <th class="text-right">Email :</th>
                    <td>{{ $supplier->email }}</td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>
