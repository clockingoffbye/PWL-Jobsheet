<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-sm table-bordered">
                <tr>
                    <th class="text-right">Username :</th>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <th class="text-right">Nama :</th>
                    <td>{{ $user->nama }}</td>
                </tr>
                <tr>
                    <th class="text-right">Level :</th>
                    <td>{{ $user->level->level_nama ?? 'Tidak Ada' }}</td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>
