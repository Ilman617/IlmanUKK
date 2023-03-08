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
    <button class="btn btn-sm btn-primary mb-3"data-toggle="modal"data-target="#tambah_petugas"class="fas fa-plus"></i> Register</button>
     

    <table class="table table-bordered table-striped alert alert--primary">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama </th>
                <th class="text-center">Username</th>
                <th class="text-center">Level</th>
                <th class="text-center">Aksi</th>
            </tr>


        <?php $no = 1; 
        foreach ($petugas as $p) : ?> 
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $p->nama_petugas ?></td>
                <td class="text-center"><?= $p->username ?></td>
                <td class="text-center"><?= $p->id_level ?></td>


                <td class="text-center">
                   <center>
                  <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataadmin/editregist/' . $p->id_petugas) ?>"><i class="fas fa-edit"></i></a>
                   <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Barang Ini?')"
                   class=" btn btn-sm btn-danger" href="<?= base_url('admin/dataadmin/hapus/' . 
                   $p->id_petugas) ?>"><i class="fas fa-trash"></i></a>

                   </center>
                    
                </td>
            </tr>
            <?php endforeach; ?> 
      </table>


      </div>
    </div>
   </div>

   <!-- Modal tambah barang-->
   <div class="modal fade" id="tambah_petugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ecampleModalLabel">Halaman Registrasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Clos">
                        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url() . 'admin/dataadmin/tambah_regist' ?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_petugas" class="form-control" required placeholder="Masukkan Petugas">
            <?= form_error('nama_petugas', '<div class="text-small text-danger"></div>') ?>
    </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required placeholder="Masukkan username">
            <?= form_error('Username', '<div class="text-small text-danger"></div>') ?>
    </div>

    
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
            <?= form_error('password', '<div class="text-small text-danger"></div>') ?>
    </div>
        <div class="form-group">
            <label>Level</label>
            <select name="id_level" class="form-control">
                <option value=""> - Pilih Level -</option>
                <option value="1"> Admin </option>
                <option value="2"> Petugas</option>
        </select>
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

   