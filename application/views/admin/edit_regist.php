<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div class="container-fluid">

          <h1 class="h3 mb-2 text-gray-800 fas fa-edit"> UBAH REGISTER </h1>

          <div class="card shadow mb-4">
              <div class="card-body alert alert-dark">

              <?php foreach ($petugas as $p) : ?>
                <form action="<?= base_url() . 'admin/dataadmin/update' ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id_petugas" value="<?= $p->id_petugas ?>">
                    <div class="form-group">
                         <label>Nama :</label>
                         <input type="text" name="nama_petugas" id="nama_petugas" class="form-control"  required value="<?= $p->nama_petugas ?>">
                         </div><br>

                         <div class="form-group">
                                <label>Username</label>
                                 <input type="text" name="username" id="username" class="form-control" required value="<?= $p->username ?>">
                                </div><br>

                                <div class="form-group">
                                <label>Password</label>
                                 <input type="password" name="password" id="password" class="form-control" required value="<?= $p->password ?>">
                                </div><br>

                                <div class="form-group">
                                <label>Level :</label>
                                 <select name="id_level" class="form-control">

                                 <option value="<?= $p->id_level ?>"><?= $p->id_level ?></option>
                                 <option value="1">Admin</option>
                                 <option value="2">Petugas</option>
                                
                                </select>
              </div>

                                <br>
                                <button class="btn btn-secondary" type="submit" name="submit">Ubah Data</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </from>
                    <?php endforeach; ?>
              </div>
            </div>
        </div>
    </div>            
</div>