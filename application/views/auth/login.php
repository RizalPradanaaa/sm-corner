
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-7 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center mb-1">
                                        <img src="<?= base_url('public/assets') ?>/img/logo.png" alt="logo sm" width="90%">
                                    </div>

                                    <?= $this->session->flashdata('message'); ?>

                                    <form class="user" method="post" action="<?= base_url('auth/login'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Email">
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                
                                        <button type="submit" class="btn btn-danger btn-user btn-block">
                                            <b>LOGIN</b>
                                        </button>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="font-weight-bold text-dark" href="forgot-password.html">Lupa Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="font-weight-bold text-dark " href="<?= base_url('auth/register') ?>">Buat Akun</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    