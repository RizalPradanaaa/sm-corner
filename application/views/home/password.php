                <!-- Begin Page Content -->
                <div class="p-5 px-lg-5 mt-5 shadow-sm bg-light container-md rounded-3">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Ganti Password</h1>

                    <div class="row">
                        <div class="col-lg-8">
                        <?= $this->session->flashdata('message'); ?>
                        <?= form_open_multipart('home/password');?>

                            <div class="form-group row">
                                <label for="password_lama" class="col-sm-3 col-form-label">Password Lama</label>
                                <div class="col-sm-7">
                                <input type="password" class="form-control" id="password_lama" name="password_lama">
                                <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_baru1" class="col-sm-3 col-form-label">Password Baru</label>
                                <div class="col-sm-7">
                                <input type="password" class="form-control" id="pasword_baru1" name="password_baru1">
                                <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_baru2" class="col-sm-3 col-form-label">Ulangi Password</label>
                                <div class="col-sm-7">
                                <input type="password" class="form-control" id="pasword_baru2" name="password_baru2">
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <div class="col-sm-7">
                                    <button type="submit" class="btn btn-danger">Ganti</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <br><br><br><br><br>
            <!-- End of Main Content -->