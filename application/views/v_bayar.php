<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Upload bukti pembayaran</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <div class="card-body">
                <p>Transfer transaksi pada rekening dibawah ini sebesar :
                <h3 class="text-primary">Rp. <?= number_format($pesanan->total_bayar, 0); ?>.-</h3>
                </p>
            </div>
            <table class="table">
                <tr>
                    <th>Bank</th>
                    <th>No. Rekening</th>
                    <th>Atas Nama</th>
                </tr>
                <?php foreach ($rekening as $key => $value) { ?>
                    <tr>
                        <td><?= $value->nama_bank ?></td>
                        <td><?= $value->no_rek ?></td>
                        <td><?= $value->atas_nama ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Upload bukti pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi); ?>
            <div class="card-body">
                <div class="form-group">
                    <label>Atas Nama</label>
                    <input name="atas_nama" class="form-control" placeholder="Enter atas nama" required>
                </div>
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input name="nama_bank" class="form-control" placeholder="Enter nama bank" required>
                </div>
                <div class="form-group">
                    <label>No Rekening</label>
                    <input name="no_rek" class="form-control" placeholder="Enter no rekening" required>
                </div>
                <div class="form-group">
                    <label>Bukti bayar</label>
                    <input type="file" name="bukti_bayar" class="form-control" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Bayar</button>
                <a href="<?= base_url('pesanan_saya'); ?>" class="btn btn-success">Back</a>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.card -->
    </div>
</div>