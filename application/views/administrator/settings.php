                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Settings Profile</h1>

                    <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="<?= base_url('public/assets/img/profile/') . $user['image']?>" alt="profile" width="200">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['name']?></h5>
                            <p class="card-text"><?= $user['email']?></p>
                            <p class="card-text"><small class="text-muted">Dibuat Pada <?= date('d F Y', $user['date_created']); ?></small></p>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="h3 mb-4 text-gray-800">Settings Akun Profile</h1>

                            <?= $this->session->flashdata('message'); ?>
                            
                            <?= form_open_multipart('administrator/settings');?>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-7">
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-7">
                                <input type="text" class="form-control" value="<?= $user['name']?>" id="name" name="name">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">Image</div>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('public/assets/img/profile/') . $user['image']?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image" id="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-7">
                                <button type="submit" class="btn btn-danger btn-icon-split"  >
                                    <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </button>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->