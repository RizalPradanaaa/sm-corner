<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $judul; ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?= base_url('public/home') ?> /assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('public/home') ?> /css/styles.css" rel="stylesheet" />



        <!-- Custom fonts for this template-->
        <!-- AUTH/ADMIN -->
        <link href="<?= base_url('public/assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?= base_url('public/assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url('public/css') ?>/style.css">
         <!-- AUTH/ADMIN -->

         <style>
            .bg-custom-nav{
                background-color: #F1E3E3;
            }
            .bg-custom{
                background: rgb(95,44,130);
                background: linear-gradient(180deg, rgba(95,44,130,1) 30%, rgba(73,160,157,1) 100%);
            }
         </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-custom-nav fixed-top">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">
                    <img src="<?= base_url('public/assets') ?>/img/logo.png" alt="logo sm" width="110">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0 ms-lg-4">

                    <?php if($judul == 'SM - Corner | Home') : ?>
                        <li class="nav-item"><a class="nav-link active fw-bolder" aria-current="page" href="<?= base_url('home') ?>">Home</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link fw-bolder" aria-current="page" href="<?= base_url('home') ?>">Home</a></li>
                    <?php endif; ?>

                    <?php if($judul == 'SM - Corner | Kategori') : ?>
                        <li class="nav-item"><a class="nav-link active fw-bolder" href="<?= base_url('home/kategori') ?>">Kategori</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link fw-bolder" href="<?= base_url('home/kategori') ?>">Kategori</a></li>
                    <?php endif; ?>

                    <?php if($judul == 'SM - Corner | About') : ?>
                        <li class="nav-item mr-2"><a class="nav-link active fw-bolder" href="<?= base_url('home/about') ?>">About</a></li>
                    <?php else : ?>
                        <li class="nav-item mr-2"><a class="nav-link fw-bolder" href="<?= base_url('home/about') ?>">About</a></li>
                    <?php endif; ?>
                    
                    <?php if(!$user) : ?>
                    <li class="nav-item text-center">
                        <a class="btn btn-outline-danger mt-auto mr-2" href="<?= base_url('auth/login');?>">Login</a>
    
                        <a class="btn btn-outline-danger mt-auto" href="<?= base_url('auth/register');?>">Registrasi</a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item mt-2 mx-2">
                        <a href="<?= base_url('home/keranjang');?>">
                            <i class="bi-cart-fill me-1 w-25"></i>
                        </a>
                    </li>
                        
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown"    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="<?= base_url('public/assets/img/profile/') . $user['image']?>" width="25px">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('home/profile'); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                                </a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('home/password'); ?>">
                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ganti Password
                                </a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                                </a>
                            </div>
                        </li>
                    <?php endif; ?>
                    </ul>
                    
                </div>
            </div>
        </nav>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan "Logout" bila anda yakin ingin keluar!.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
