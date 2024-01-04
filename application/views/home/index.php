        <!-- Header-->
        <header class="bg-custom py-5">
            <div class="container px-4 px-lg-5 my-5 row">
                <div class="text-white">
                <img src="<?= base_url('public/assets') ?>/img/logo.png" alt="logo sm" class="col-xl-6 col-md-12">
                    <!-- <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p> -->
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="">
            <div class="p-4 px-lg-5 mt-5 shadow bg-light rounded mb-3">

            <div class="row ">
                <div class="col-xl-6 col-md-6">
                    <form method="post" action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Barang.." name="keyword">
                        <button class="btn btn-danger" type="submit" id="button-addon2">Cari</button>
                    </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <?php if( empty($barangs) ): ?>
                        <div class="alert alert-danger" role="alert">
                            Barang tidak Ditemukan!
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-5 justify-content-center card-body ">
                <?php foreach($barangs as $barang) :?>
                    <div class="col mb-5">
                        <div class="card h-100 shadow-sm">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url('public/assets/img/barang/') . $barang['gambar']?>" alt="image"/>
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bold"><?= $barang['nama']; ?></h5>
                                    <!-- Product price-->
                                    Rp. <?= $barang['harga']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="<?= base_url('home/detail/') . $barang['id'];?>">Detail</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
                </div>
            </div>
        </section>

