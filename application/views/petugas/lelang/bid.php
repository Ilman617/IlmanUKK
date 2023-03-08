<div class="container">

    <div class="row">
        <div class="col-md-12">
    
    <br>
    <a href="<?= base_url() ?>welcome" class="btn btn-danger">Kembali</a> <br><br>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-heading btn btn-warning btn-sm-5">
                    Detail Barang
                </div>

                <div class="card-body">
                    <p><strong>Nama Barang: </strong> <?= $product->nama_barang; ?></p>
                    <p><strong>Harga Awal: </strong> Rp. <?= number_format ($product->harga_awal, 2, ',','.'); ?></p>
                    <p><strong>Deskripsi Barang: </strong>  <br> <?= $product->keterangan; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
        <?php if($this->session->userdata('username')) : ?>
            <div class="card mb-3">
                <div class="card-heading btn btn-warning btn-sm-5">
                History Bid
                </div>
            <div class="card-body">

                <form action="<?= base_url('masyarakat/datalelang/bid/') . $product->id_lelang?>" method="post">
                    <div class="input-group">


                        <span class="input-group-addon">Harga: </span>

                        <input type="number" name="price" id="price" min="<?= $product->harga_awal?>" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="submit" name="bid" value="true">BID !</button>
                        </span> 

                    </div>
                </form>
                <hr>
                <?php if (empty($history)) : ?>
                    <div class="alert alert-info">
                        <p> Belum ada yang melakukan bid,jadilah yang pertama! </p>
                    </div>

                <?php else : ?>
                    <?php foreach ($history as $hist) : ?>
                        <p><strong><?= $hist->nama_lengkap ?></strong>: Rp. <?= number_format($hist->penawaran_harga, 2, ',', '.') ?></p>

                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

            

<div class="col-md-4">
    <div class="card mb-3">
        <div class="card-heading btn btn-warning btn-sm-5">
            Bid tertinggi
        </div>
        <div class="card-body">

        <?php if (empty($max_bid)) : ?>
            <div class="alert alert-info">
                <p>Belum ada yang melakukan bid,jadilah yang pertama ?</p>
            </div>
            <?php else : ?>
                <p>
                <strong>Nama</strong>: <?= $max_bid->nama_lengkap; ?> <i class="fas fa-solid fa-thropy text-warning"></i>
                </p>
                
                
            
                <p> <strong>Harga</strong>: <?= number_format($max_bid->penawaran_harga,2 ,',','.'); ?> </p>
<br>
                <p>tunggu pengumuman pemenang dari petugas</p>
            <?php endif; ?>
            
        </div>
    </div>
</div>

<?php endif; ?>
</div>
</div>
</div>
</div>