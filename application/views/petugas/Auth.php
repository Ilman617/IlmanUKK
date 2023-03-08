<?php
$tgl_lelang = substr($auction->tgl_lelang, 0, 10);
$jam_lelang = substr($auction->tgl_lelang, 11);
?>
<div class="container">

    <div class="row">
        <div class="col-md-2">
            <div class="text-center">
                <h2><?=$title ?></h2>
            </div>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product">Barang</label>
                    <select name="product" id="product" class="form-control">
                        <option value="">--Pilih Barang --</option>
                        <?php foreach ($products as $product) : ?>
                            <option value="<?= $product->id_barang ?>" <?= ($auction->id_barang == $product->id_barang) ? 'selected=""' : null ?>><?= $product->nama_barang ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_lelang">Tanggal lelang</label>
                    <input type="date" name="tgl_lelang" id="tgl_lelang" value="<?= $tgl_lelang ?>" class="form-control" placeholder="Enter.."/>
                </div>
                <div class="form-group">
                    <label for="jam_lelang">Jam Lelang</label>
                    <input type="time" name="jam_lelang" id="jam_lelang" value="<?= $jam_lelang ?>" class="form-control" placeholder="Enter.." />
                </div>

                <div class="form-group">
                    <label for="user">Pelelang</label>
                    <select name="user" id="user" class="form-control">
                        <option value="">-- Pilih Pelelang --</option>
                        <?php foreach ($user as $user) : ?>
                            <option value="<?php echo $user->id_user ?>" <?php echo ($auction->id_user == $user->id_user) ? 'selected=""' : null ?>><?php echo $user->nama_lengkap ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="petugas">Petugas</label>
                    <select name="petugas" id="petugas" class="form-control">
                        <option value="">-- Pilih Petugas --</option>
                        <?php foreach ($staffs as $staff) : ?>
                            <option value="<?php echo $staff->id_petugas ?>" <?php echo ($auction->id_petugas == $staff->id_petugas) ? 'selected=""' : null ?>><?= $staff->nama_petugas ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <label class="radio-inline">
                        <input type="radio" name="status" value="dibuka" <?= ($auction->status == 'dibuka') ? 'checked=""' : null?>> Dibuka
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" value="ditutup" <?= ($auction->status == 'ditutup') ? 'checked=""' : null?>> Ditutup
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="save" value="true">Simpan</button>
                    <a href="<?= base_url() ?>petugas/datalelang" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>