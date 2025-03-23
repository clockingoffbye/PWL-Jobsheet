<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-sm table-bordered">
                <tr>
                    <th class="text-right">Nama Kategori :</th>
                    <td>{{ $kategori->kategori_nama }}</td>
                </tr>
                <tr>
                    <th class="text-right">Kode Kategori :</th>
                    <td>{{ $kategori->kategori_kode }}</td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>
