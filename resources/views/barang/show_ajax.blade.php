<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-sm table-bordered">
                <tr>
                    <th class="text-right">Kode Barang :</th>
                    <td>{{ $barang->barang_kode }}</td>
                </tr>
                <tr>
                    <th class="text-right">Nama Barang :</th>
                    <td>{{ $barang->barang_nama }}</td>
                </tr>
                <tr>
                    <th class="text-right">Kategori :</th>
                    <td>{{ $barang->kategori->kategori_nama }}</td>
                </tr>
                <tr>
                    <th class="text-right">Harga Beli :</th>
                    <td>{{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th class="text-right">Harga Jual :</th>
                    <td>{{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>