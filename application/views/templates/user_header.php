<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/news.jpg" type="image/ico">
    <title>Masyarakat</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

</head>

<body>

    <div class="wrap" style="background-color: #c2b79b;">

        <header role="banner">
            <div class="top-bar" style="background-color: #000;color: ;">
                <div class="container">
                    <div class="row ">
                        <div class="col-9 social ">

                            <?php if ($this->session->userdata('username')) : ?>
                                <p class="mr-2 d-inline text-light"><b>Selamat Datang <?= $this->session->userdata('username') ?><i class="fas fa-fw fa-user"></i></b></p>
                                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
                            <?php else : ?>
                                <a href="<?= base_url('auth/index'); ?>" class="btn btn-success text-white">Masuk</a>
                                <a href="<?= base_url('auth/registration'); ?>" class="btn btn-danger text-white">Daftar</a>
                                <!-- <a href="<?= base_url('masyarakat/datalelang/riwayat'); ?>" class="btn btn-primary text-white">Riwayat</a> -->
                            <?php endif; ?>

                        </div>
                        <div class="col-3 search-top">
                            <form action="<?= base_url(); ?>" class="search-top-form" method="post">
                            </form>
                            <!-- <h3><i class="fas fa-sharp fa-solid fa-car"></i>Lelang Mobile</h3> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="container logo-wrap">
                <div class="row pt-5">
                    <div class="col-12 text-center">
                        <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                        <h1 class="site-logo"><a href="index.html">Sistem Lelang</a></h1>
                    </div>
                </div>
            </div>
                <!-- Pembatas -->

                <!-- <header role="message">
            <div class="top-bar" style="background-color: #50c878 ;color: ;">
                
                        <div class="col-9 social ">
                            <center>
                            <?php if ($this->session->userdata('username')) : ?>
                                <p class="mr-2 d-inline text-light"><b>Selamat <?= $this->session->userdata('username') ?> Anda memenangkan Mobil Antik</b></p>
                                <a href="#" class="btn btn-info">Lihat detail</a>
                            <?php else : ?>
                                <p class="mr-2 d-inline text-light">Selamat Melelang, kami harap anda menemukan yang anda inginkan </p>
                            <?php endif; ?>
                            </center>
                        </div>
                        
                  
            </div> -->



                <!-- pembatas -->
            <nav class="navbar navbar-expand-md  navbar-light bg-light">
                <div class="container">


                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                
                            </li>
                            
                        </ul>

                    </div>
                </div>
            </nav>
        </header>
        <!-- END header -->