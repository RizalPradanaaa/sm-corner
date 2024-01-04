<!-- Product section-->
<section class="py-5">
            <div class="container p-4 px-lg-5 bg-light rounded-3 shadow">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= base_url('public/assets/img/barang/') . $barang['gambar']?>" alt="gambar" /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"><?= $barang['kode']?></div>
                        <h1 class="display-5 fw-bolder"><?= $barang['nama']?></h1>
                        <div class="fs-5 mb-5">
                            <span>Rp. <?= $barang['harga']?></span>
                        </div>
                        <p class="lead"><?= $barang['deskripsi']?></p>

                        <form  method="post">

                        <?php if($user) : ?>
                        <!-- Data keranjang -->
                        <!-- Data User -->
                        <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                        <input type="hidden" name="username" value="<?= $user['name']; ?>">
                        <!-- Data Barang -->
                        <input type="hidden" name="kode" value="<?= $barang['kode']?>">
                        <input type="hidden" name="nama" value="<?= $barang['nama']?>">
                        <input type="hidden" name="gambar" value="<?= $barang['gambar']?>">
                        <input type="hidden" name="stok" value="<?= $barang['stok']?>">
                        <input type="hidden" name="harga" value="<?= $barang['harga']?>">
                        <input type="hidden" name="diskon" value="<?= $barang['diskon']?>">
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" name="jumlah"/>
                            <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                            <button class="btn btn-outline-danger flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Tambahkan Ke Keranjang
                            </button>
                        </div>

                        <?php else : ?>
                        <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" name="jumlah"/>
                        <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                        <a class="btn btn-outline-danger flex-shrink-0" href="<?= base_url('home/offline');?>">
                                <i class="bi-cart-fill me-1"></i>
                                Silahkan Datang Langsung!
                            </a>
                        </div>
                        <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <!-- <section class="py-3">
            <div class="container p-4 px-lg-5 mt-3 rounded-3 bg-light shadow">
                <h2 class="fw-bolder mb-4">Produk Serupa</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                
                </div>
            </div>
        </section> -->