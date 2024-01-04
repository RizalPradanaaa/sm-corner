<!-- Product section-->
<section class="py-5 mb-2">
            <div class="container p-4 px-lg-5 bg-light rounded-3 shadow">
                <h1 class="h3 mb-4 text-gray-800">Konfirmasi Pesanan</h1>
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Diskon</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($keranjang as $kj) :?>
                                <tr>
                                    <td><?= $kj['kode']; ?></td>
                                    <td><?= $kj['nama']; ?></td>
                                    <td>
                                    <img src="<?= base_url('public/assets/img/barang/') . $kj['gambar']?>" alt="gambar" width="100">
                                    </td>
                                    <td>Rp. <?= $kj['harga']; ?></td>
                                    <td><?= $kj['jumlah']; ?></td>
                                    <td><?= $kj['diskon']; ?></td>
                                    <td><?= $kj['total']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('home/deletekeranjang/') . $kj['id']; ?>" class="btn btn-danger btn-icon-split" >
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text" >Hapus</span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?> 
                            </tbody>
                        </table>
                    </div>     
                </div>
                </div>

                <h1 class="h3 mb-4 text-gray-800">Lengkapi Alamat dan Bukti Transfer</h1>
                
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Lainnya</h6>
                </div>
                <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <?= form_open_multipart();?>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" id="alamat" name="alamat" rows="5"></textarea>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <p class="text-danger">*Khusus Sekitar Jepara!</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">Bukti Transfer</div>
                                    <div class="col-sm-4">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="transfer" name="transfer">
                                            <label class="custom-file-label" for="transfer">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                       
                </div>
                </div>

                <div class="col-sm-10">
                    <button type="submit" class="btn btn-danger btn-icon-split"  data-toggle="modal" data-target="#cartModal">
                        <span class="icon text-white-50">
                            <i class="bi-cart-fill"></i>
                            </span>
                            <span class="text">Konfirmasi Pesanan</span>
                    </button>
                </div>
            </form>
            </div>

</section>
<br><br><br>
