
<body>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 col-md-9 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-left mt-2 ">
                            <img src="<?= base_url('public/assets') ?>/img/logo.png" width="250" class="mb-3">
                            </div>
                            <div class="text-center">
                                <img src="<?= base_url('public/assets') ?>/img/user.png" width="100" class="mb-3">
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Username"
                                    value="<?= set_value('name') ?>">

                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email"
                                    value="<?= set_value('email') ?>">

                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password1" name="password1" placeholder="Password">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password2" name="password2" placeholder="Ulangi Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger btn-user btn-block">
                                    Buat Akun
                                </button>
                            </form>
                            <br>
                            <div class="text-center">
                                <a class="font-weight-bold text-dark" href="<?= base_url('auth/login') ?>">Sudah Punya Akun?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
