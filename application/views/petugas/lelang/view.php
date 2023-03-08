<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2><?= $title ?></h2>
            </div>
            <hr>
            <a href="<?= base_url() ?>petugas/datalelang" class="btn btn-danger">Kembali</a> <br><br>
            <div class="row">
                <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-heading btn btn-warning btn-sm-5">
                        Detail Barang
                    </div>

                    <div class="card-body">
                        <p><strong>Nama Barang :</strong> <?=$product->nama_barang; ?></p>
                        <p><strong>Harga Awal : </strong> Rp. <?= number_format($product->harga_awal, 2, ',', '.'); ?></p>
                        <p><strong>Deskripsi Barang : </strong> <br> <?= $product->keterangan; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-heading btn btn-warning btn-sm-5">
                        History Bid
                    </div>
                    <div class="card-body">
                        <?php foreach ($history as $hist) : ?>
                            <p><strong><?= $hist->nama_lengkap ?></strong> : Rp. <?= number_format($hist->penawaran_harga, 2, ',', '.') ?></p>

                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-heading btn btn-warning btn-sm-3">
                        Bid Tertinggi
                    </div>
                        <div class="card-body"> <br>
                            <?php if (empty($max_bid)) : ?>
                                <div class="alert alert-info">
                                    <p>Belum ada yang melakukan bid</p>
                                </div>
                            <?php else : ?>
                                <p><strong>Nama</strong>: <?= $max_bid->nama_lengkap; ?> <a href="<?= base_url('petugas/datalelang') ?>"><i class="fas fa-solid fa-trophy"></i></a>
                                </p>
                                <p><strong>telp</strong>: <?= $max_bid->telp; ?></p>
                                <p><strong>Harga</strong>: <?= number_format($max_bid->penawaran_harga, 2, ',', '.'); 
                                ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


