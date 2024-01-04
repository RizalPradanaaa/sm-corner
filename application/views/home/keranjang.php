<!-- Product section-->
<section class="py-5 mb-2">
            <div class="container p-4 px-lg-5 bg-light rounded-3 shadow">
                <h1 class="h3 mb-4 text-gray-800">Keranjang</h1>
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
                <div class="col-sm-10">
                    <a href="<?= base_url('home/offline')?>" class="btn btn-danger btn-icon-split" >
                        <span class="icon text-white-50">
                            <i class="bi-cart-fill"></i>
                            </span>
                            <span class="text">Buat Pesanan</span>
                    </a>
                    <!-- <button type="submit" class="btn btn-danger btn-icon-split"  data-toggle="modal" data-target="#cartModal">
                        <span class="icon text-white-50">
                            <i class="bi-cart-fill"></i>
                            </span>
                            <span class="text">Buat Pesanan</span>
                    </button> -->
                </div>
            
            </div>

</section>
<br><br><br>

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">
                        Pilih metode belanja anda!
                    </h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-6">
                            <a href="<?= base_url('home/offline'); ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xl font-weight-bold text-info text-uppercase mb-1">
                                            OFFLINE</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="<?= base_url('home/online'); ?>">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xl font-weight-bold text-info text-uppercase mb-1">
                                            ONLINE*</div>
                                            <div class="mb-0 text-gray-800">*Untuk Pembelian Online Hanya Untuk Area Jepara</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>