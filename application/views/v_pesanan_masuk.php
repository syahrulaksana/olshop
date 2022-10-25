    <div class="col-sm-12">
        <?php
        if ($this->session->flashdata('pesan')) {
            echo ' <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>
                ';
            echo $this->session->flashdata('pesan');
            echo '</h5></div>';
        }
        ?>
        <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Diproses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Dikirim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Selesai</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                        <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal Pesanan</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($pesanan as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order; ?></td>
                                    <td><?= $value->tgl_order; ?></td>
                                    <td>
                                        <b><?= $value->expedisi; ?></b><br>
                                        Paket : <?= $value->paket; ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir, 0); ?>
                                    </td>
                                    <td><b>Rp. <?= number_format($value->total_bayar, 0); ?></b><br>
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <span class="badge badge-warning">Belum bayar</span>
                                        <?php } else { ?>
                                            <span class="badge badge-success">Sudah bayar</span><br>
                                            <span class="badge badge-primary">Menunggu Verifikasi</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($value->status_bayar == 1) { ?>
                                            <button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Bukti bayar</button>
                                            <a href="<?= base_url('admin/proses/' . $value->id_transaksi); ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal Pesanan</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($pesanan_masuk as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order; ?></td>
                                    <td><?= $value->tgl_order; ?></td>
                                    <td>
                                        <b><?= $value->expedisi; ?></b><br>
                                        Paket : <?= $value->paket; ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir, 0); ?>
                                    </td>
                                    <td><b>Rp. <?= number_format($value->total_bayar, 0); ?></b><br>
                                        <span class="badge badge-primary">Diproses / Dikemas</span>
                                    </td>
                                    <td>
                                        <?php if ($value->status_bayar == 1) { ?>
                                            <a href="<?= base_url('admin/kirim/' . $value->id_transaksi); ?>" class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class="fa fa-paper-plane mr-2"></i> Kirim</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                        <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal Pesanan</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                            </tr>
                            <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order; ?></td>
                                    <td><?= $value->tgl_order; ?></td>
                                    <td>
                                        <b><?= $value->expedisi; ?></b><br>
                                        Paket : <?= $value->paket; ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir, 0); ?>
                                    </td>
                                    <td><b>Rp. <?= number_format($value->total_bayar, 0); ?></b><br>
                                        <span class="badge badge-success">Dikirim</span>
                                    </td>
                                    <td>
                                        <h4><?= $value->no_resi; ?></h4>
                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                        <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal Pesanan</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                            </tr>
                            <?php foreach ($pesanan_diterima as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order; ?></td>
                                    <td><?= $value->tgl_order; ?></td>
                                    <td>
                                        <b><?= $value->expedisi; ?></b><br>
                                        Paket : <?= $value->paket; ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir, 0); ?>
                                    </td>
                                    <td><b>Rp. <?= number_format($value->total_bayar, 0); ?></b><br>
                                        <span class="badge badge-success">Pesanan berhasil diterima</span>
                                    </td>
                                    <td>
                                        <h4><?= $value->no_resi; ?></h4>
                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

    <!-- modal cek bukti pembayaran -->
    <?php foreach ($pesanan as $key => $value) { ?>
        <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?= $value->no_order ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th>Nama Bank</th>
                                <th>:</th>
                                <td><?= $value->nama_bank ?></td>
                            </tr>
                            <tr>
                                <th>No Rekening</th>
                                <th>:</th>
                                <td><?= $value->no_rek ?></td>
                            </tr>
                            <tr>
                                <th>Atas Nama</th>
                                <th>:</th>
                                <td><?= $value->atas_nama ?></td>
                            </tr>
                            <tr>
                                <th>Total Bayar</th>
                                <th>:</th>
                                <td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
                            </tr>
                        </table>
                        <img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/') . $value->bukti_bayar ?>" alt="">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>

    <!-- modal cek bukti pembayaran -->
    <?php foreach ($pesanan_masuk as $key => $value) { ?>
        <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?= $value->no_order ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('admin/kirim/' . $value->id_transaksi); ?>
                        <table class="table">
                            <tr>
                                <th>Expedisi</th>
                                <th>:</th>
                                <td><?= $value->expedisi ?></td>
                            </tr>
                            <tr>
                                <th>Paket</th>
                                <th>:</th>
                                <td><?= $value->paket ?></td>
                            </tr>
                            <tr>
                                <th>Ongkir</th>
                                </th>
                                <th>:</th>
                                <td>Rp. <?= number_format($value->ongkir, 0) ?></td>
                            </tr>
                            <tr>
                                <th>No Resi</th>
                                <th>:</th>
                                <td><input name="no_resi" class="form_control" placeholder="No Resi" required></td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>