<div class="container">

    <div class="row justify-content-center">


        <div class="col-xl-6 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                            <a href="<?= base_url("welcome");?>"><i class="fas fa-angle-left"></i> kembali</a>

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Halaman Login Masyarakat</h1>
                            </div>
                                <!-- <div class="text-center">
                        <img src="<?= base_url() . '/assets/photo/ikon.png' ?>" width="40% " class="mb-4">
                        <h1 class= "h4 text-gray-900 mb-2">Register Akun Apliikasi VIALELANG</h1>
                        <p>Silahkan Masukkan Nama Lengkap Username Dan No.Telp Anda.</p>
                    </div> -->

                                <form method="post" action="<?= base_url('auth/registration') ?>" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="examapleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Fullname Anda" name="nama_lengkap" autocomplete="off">
                                        <?= form_error('nama_lengkap', '<div class=text-danger small ml-2">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="examapleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username Anda" name="username" autocomplete="off">
                                        <?= form_error('username', '<div class=text-danger small ml-2">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="examapleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Nomor Telp Anda" name="telp" autocomplete="off">
                                        <?= form_error('telp', '<div class=text-danger small ml-2">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="examapleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Password Anda" name="password_1" autocomplete="off">
                                        <?= form_error('password_1', '<div class=text-danger small ml-2">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="examapleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan kembali Password Anda" name="password_2" autocomplete="off">
                                        <?= form_error('password_2', '<div class=text-danger small ml-2">', '</div>'); ?>
                                    </div>
                                    <button type="submit" class="btn- btn-primary btn-user btn-block ">
                                        <strong>Register</strong>
                                    </button>
                                </form>
                                <hr>
                                <a href="<?= base_url('auth/index'); ?>" class="btn btn-primary btn-user btn-block">
                                    <i class="fa fa-arrow-left fa-fw"></i> Sudah Punya Akun...? Silahkan Ke Halaman Login
                                </a>
                                </form>
                                <hr>
                            </div>
                        </div>



                    </div>
                </div>
            </div>