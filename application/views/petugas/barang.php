<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="container-fluid">


         <center>
             <h1 class="h3 mb-2 text-primary-800"><?= $title ?></h1>
</center>

        <?= $this->session->flashdata('message'); ?>



    
    <!-- tombol tambah -->
    <button class="btn btn-sm btn-primary mb-3"
    data-toggle="modal"
    data-target="#tambah_barang"
    class="fas fa-plus"></i> Tambah Barang Lelang</button>
     

    <table class="table table-bordered table-striped alert alert--primary">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Gambar</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Harga Awal</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>


        <?php $no = 1; 
        foreach ($barang as $b) : ?> 
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $b->nama_barang ?></td>
                <td class="text-center"><?= $b->keterangan ?></td>
                <td class="text-center"><img src="<?= base_url(). '/uploads/' . $b->photo ?>"
                width="75px"></td>
                <td class="text-center"><?= $b->tgl ?></td>
                <td class="text-center">Rp. <?= number_format($b->harga_awal, 0, ',', ',') ?></td>
                <td class="text-center"><?= $b->status_barang ?></td>


                <td class="text-center">
                   <center>
                   <?= anchor('petugas/databaranglelang/edit/' . $b->id_barang, '<div class="btn btn-primary"><i class="fas fa-pen"></i></div>') ?>
                   <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Barang Ini?')"
                   class=" btn btn-sm btn-danger" href="<?= base_url('petugas/databaranglelang/hapus/' . 
                   $b->id_barang) ?>"><i class="fas fa-trash"></i></a>

                   </center>
                    
                </td>
            </tr>
            <?php endforeach; ?> 
      </table>


      </div>
    </div>
   </div>

   <!-- Modal tambah barang-->
   <div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ecampleModalLabel">FORM INPUT BARANG</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Clos">
                        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">

            <div class="modal-body">
                <form action="<?= base_url() . 'petugas/databaranglelang/tambah_aksi' ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" required placeholder="Masukkan barang">
                        <?= form_error('nama_barang', '<div class="text-small text-danger"></div>') ?>
                    </div>

        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" required placeholder="Masukkan deskripsi">
            <?= form_error('keterangan', '<div class="text-small text-danger"></div>') ?>
    </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tgl" class="form-control" required>
            <?= form_error('tgl', '<div class="text-small text-danger"></div>') ?>
    </div>
    
        <div class="form-group">
            <label>Harga Awal</label>
            <input type="number" name="harga_awal" class="form-control" required placeholder="Masukkan harga">
            <?= form_error('harga_awal', '<div class="text-small text-danger"></div>') ?>
    </div>

    <div class="form-group">
            <label>Status</label>
            <select name="status_barang" class="form-control">
                <option value=""> - Pilih Status -</option>
                <option value="Terjual"> Terjual</option>
                <option value="Belum Terjual">Belum Terjual</option>
        </select>
    </div>

        <div class="form-group">
            <label>Gambar Produk</label>
            <input type="file" name="photo" class="form-control" required>
            <?= form_error('photo', '<div class="text-small text-danger"></div>') ?>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>

   