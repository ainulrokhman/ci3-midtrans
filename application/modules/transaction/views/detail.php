<div class="container">
    <div class="card">
        <div class="card-header">Detail Transaksi</div>
        <div class="card-body">
            <div class="mb-3">
                <?= $this->session->flashdata('success'); ?>
            </div>
            <div class="row mb-3">
                <div class="col">Nama Siswa</div>
                <div class="col-auto">:</div>
                <div class="col"><?= $nama_siswa; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col">Jenis Biaya</div>
                <div class="col-auto">:</div>
                <div class="col"><?= $jenis_biaya; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col">Nominal</div>
                <div class="col-auto">:</div>
                <div class="col"><?= formatRupiah($gross_amount); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col">Payment Type</div>
                <div class="col-auto">:</div>
                <div class="col"><?= $payment_type; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col">Bank</div>
                <div class="col-auto">:</div>
                <div class="col"><?= $bank; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col">Kode Bayar</div>
                <div class="col-auto">:</div>
                <div class="col"><?= $va_numbers ?? $payment_code; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col">Waktu Transaksi</div>
                <div class="col-auto">:</div>
                <div class="col"><?= $transaction_time; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col">Tagihan Dibayar</div>
                <div class="col-auto">:</div>
                <div class="col"><?= $settlement_time ?? "-"; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col">Status</div>
                <div class="col-auto">:</div>
                <div class="col"><?= $status_message; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col">Status Bayar</div>
                <div class="col-auto">:</div>
                <div class="col"><?= $transaction_status; ?></div>
            </div>
            <?php if ($transaction_status == "pending") : ?>
                <div class="row mb-3">
                    <div class="col">
                        <a href="<?= $pdf_url; ?>" target="_blank" class="btn btn-info form-control"><i class="fas fa-file-pdf"></i> Panduan bayar</a>
                    </div>
                    <div class="col">
                        <a href="https://simulator.sandbox.midtrans.com/bca/va/index" target="_blank" class="btn btn-primary form-control"><i class="fas fa-money-bill-alt"></i> Bayar</a>
                    </div>
                    <div class="col">
                        <a href="<?= base_url("transaction/process?order_id=$order_id&action=expire"); ?>" class="btn btn-warning form-control"><i class="fas fa-stopwatch-20"></i> Expiry</a>
                    </div>
                    <div class="col">
                        <a href="<?= base_url("transaction/process?order_id=$order_id&action=cancel"); ?>" class="btn btn-danger form-control"><i class="fas fa-window-close"></i> Cancel</a>
                    </div>
                    <div class="col">
                        <a href="<?= base_url("transaction/process?order_id=$order_id&action=status"); ?>" class="btn btn-success form-control"><i class="fas fa-window-close"></i> Update</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>