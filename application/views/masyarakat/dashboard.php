<!-- Bagian tampil Barang Lelang -->
<selection class="site-section bpy-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <br>
                <h2 class="mb-4">Kang Lelang</h2>
            </div>
        </div>

        <!-- <h3 class="mb-4"><?= $max_bid ?></h3> -->

        <div class="row text-center mt-3">


        <?php foreach ($auctions as $auction) : ?>
            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img src="<?= base_url() . '/uploads/' . $auction->photo; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title"><?= $auction->nama_barang; ?></h4>
                    <span class="badge badge-success mb-3">Rp. <?= number_format($auction->harga_awal, 0, ',', '.'); ?></span>
                    <h5 class="text-primary">
                    <strong><hr></strong>
        </h5>
        <a href="<?= base_url('masyarakat/datalelang/bid/') . $auction->id_lelang; ?>">
        <h5 class="text-center text-primary"><strong>LIHAT DETAIL</strong></h5>
        </a>
        <h5 class="text-primary">
            <strong><hr></strong>
        </h5>

        </div>
    </div>
<?php endforeach; ?>


        </div>
        
        </div>
        </section>