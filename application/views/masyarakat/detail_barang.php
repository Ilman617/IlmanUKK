<div class="container-fluid">

<div class="card">
    <h5 class="card-header bg-danger text-white">Detail barang</h5>
    <div class="card-body">

    <?php foreach ($barang as $b) : ?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url() . '/uploads/' . $b->photo; ?>" class="card-img-top">
    </div>
    <div class="col-md-8">
        <table class="table">

        <tr>
            <td>Nama Barang</td>
            <td><strong><?= $b->nama_barang; ?></strong></td>
    </tr>

        <tr>
            <td>Keterangan</td>
            <td><strong><?= $b->keterangan; ?></strong></td>
    </tr>

    <?php foreach ($auctions as $auction) : ?>
        <tr>
            <td>Tanggal</td>
            <td><strong><?= $auction->tgl_lelang; ?></strong></td>
    </tr>
    <?php endforeach; ?>

    <tr>
            <td>Harga Awal</td>
            <td><strong>
                <div class="badge badge-success" >Rp. <?= number_format ($b->harga_awal, 0, ',','.'); ?></div>
            </strong></td>
    </tr>

    </table>
    <div class="class col-md-3">
        <?php if($this->session->userdata('username')) : ?>
            <form action="<?= base_url('masyarakat/dashboard/detail_barang/') . $product->id_lelang?>" method="post">
            <p class="input-group-addon">Harga Tawar:</p>
            <input type="number" name="price" id="price" min="<?+ $product->harga_awal ?>" class="form-control"> <br>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-success" name="bid" value="true">TAWAR !<button>
                    <!--<a href="<?= base_url() ?>masyarakat/dashboard/detail_barang" class="btn btn-success" name="bid" value="true">TAWAR!</a> -->
                    <a href="<?= base_url() ?>welcome" class="btn btn-danger btn-sm">Kembali</a>
        </span> <br>
        </form>
        
        <!-- <input type="text">
        <button class="btn btn-warning" type="submit" name="submit">Konfirmasi Penawaran </button>
        <?php else : ?>
            <p><strong>TAWARKAN</strong></p>
            <p class="text-danger"><strong>Anda harus login untuk menawar</strong></p> -->
            <?php endif; ?>
        </div>

        </div>

        <?php endforeach; ?>
        </div>
        </div>
        </div>
        



