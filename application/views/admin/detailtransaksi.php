<section class=" mb-2">
            <div class="container p-4 px-lg-5 bg-light rounded-">
                <h1 class="h3 mb-4 text-gray-800">Pesanan</h1>
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
                                    <td>Rp. <?= $kj['total']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                                </div>
                            </tbody>
                        </table>
                    </div>     
                </div>
                <h1 class="h3 mb-4 ml-3 text-gray-800">Bukti Transfer</h1>
                <?php foreach($transfer as $tf) :?>
                    <div class="row ml-3 mb-4">
                       <div class="col-12">
                          <img src="<?= base_url('public/assets/img/alamat/') . $tf['transfer']?>" width="75%">
                    </div>
                <?php endforeach; ?>
                
                <div class="col-sm-10 mt-4">
                    <a href="<?= base_url('admin/transaksi/'); ?>" class="btn btn-danger btn-icon-split"  >
                        <span class="text">Kembali</span>
                    </a>
                </div>
                </div>
            </div>

</section>