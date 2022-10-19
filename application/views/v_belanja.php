<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-sm-12">
                <?php
                echo form_open('belanja/update'); ?>

                <table class="table" cellpadding="5" cellspacing="1" style="width:100%">

                    <tr>
                        <th width="80px">QTY</th>
                        <th>Nama Barang</th>
                        <th style="text-align:right">Harga</th>
                        <th style="text-align:right">Sub-Total</th>
                        <th class="text-center">Berat</th>
                        <th class="text-center">Action</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php
                    $ttl_berat = 0;
                    foreach ($this->cart->contents() as $items) {
                        $gambar = $this->m_home->detail_barang($items['id']);
                        $berat = $items['qty'] * $gambar->berat;
                        $ttl_berat = $ttl_berat + $berat;
                    ?>
                        <tr>
                            <td>
                                <?php
                                echo form_input(array(
                                    'name' => $i . '[qty]',
                                    'value' => $items['qty'],
                                    'maxlength' => '3',
                                    'min' => '0',
                                    'size' => '5',
                                    'type' => 'number',
                                    'class' => 'form-control'
                                )); ?></td>
                            <td><?php echo $items['name']; ?></td>
                            <td style="text-align:right">Rp.<?php echo number_format($items['price'], 0); ?></td>
                            <td style="text-align:right">Rp.<?php echo number_format($items['subtotal'], 0); ?></td>
                            <td class="text-center"><?= $berat ?> gr</td>
                            <td class="text-center">
                                <a href="<?= base_url('belanja/delete/' . $items['rowid']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                        <?php $i++; ?>

                    <?php } ?>

                    <tr>
                        <td colspan="2"></td>
                        <td class="text-right">
                            <h4><strong>Total :</strong></h4>
                        </td>
                        <td class="text-right">
                            <h4><strong>Rp.<?php echo number_format($this->cart->total(), 0); ?></strong></h4>
                        </td>
                        <br>
                        <th class="text-center">Total Berat : <?= $ttl_berat; ?> gr</th>
                        <td></td>
                    </tr>

                </table>

                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-save"></i>
                            Update
                        </button>
                        <a href="<?= base_url('belanja/clear'); ?>" class="btn btn-danger btn-flat"><i class="fas fa-recycle"></i>
                            Clear All
                        </a>
                    </div>
                    <div class="col-sm">
                        <div class="text-right">
                            <a href="<?= base_url('belanja/checkout') ?>" class="btn btn-success btn-flat"><i class="fas fa-check"></i>
                                Check Out
                            </a>
                        </div>
                    </div>
                </div>
                <?php form_close(); ?>
                <br>
            </div>
        </div>
    </div>
</div>