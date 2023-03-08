<div class="container">

<div class="row">
    <div class="col-md-12">
        <div class="text-center">
</div>
<form action="" method="post">
    <div class="form-group">
        <div class="alert alert-info">
            <p>Konfirmasi untuk mengakhiri lelang dari barang <strong><?= $product->nama_barang ?></strong></p>
</div>
<button type="submit" name="finish" value="true" class="btn btn-info">Ya</button>
<a href="<?= base_url('petugas/datalelang') ?>" class="btn btn-danger">Tidak</a>
</div>
</form>
</div>
</div>
</div>