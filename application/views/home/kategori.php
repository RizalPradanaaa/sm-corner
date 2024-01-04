<!-- Section-->
<div class="p-4 px-lg-5 mt-5 shadow-sm bg-light ">
            <h1 class="h3 mb-4 text-gray-800">Kategori Aksesoris</h1>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-4 row-cols-xl-5 justify-content-center card-body  mb-3">
                
                <?php foreach($aksesoris as $ak) :?>
                    <div class="col mb-5">
                        <div class="card h-100 shadow-sm">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url('public/assets/img/barang/') . $ak['gambar']?>" alt="image"/>
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $ak['nama']; ?></h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                                    Rp. <?= $ak['harga']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="<?= base_url('home/detail/') . $ak['id'];?>">Detail</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
                </div>

                <h1 class="h3 mb-4 text-gray-800">Kategori Atribut</h1>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-4 row-cols-xl-5 justify-content-center card-body  mb-3">
                
                <?php foreach($atribut as $at) :?>
                    <div class="col mb-5">
                        <div class="card h-100 shadow-sm">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url('public/assets/img/barang/') . $at['gambar']?>" alt="image"/>
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $at['nama']; ?></h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                                    Rp. <?= $at['harga']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="<?= base_url('home/detail/') . $at['id'];?>">Detail</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
                </div>
                
                <h1 class="h3 mb-4 text-gray-800">Kategori Buku</h1>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-4 row-cols-xl-5 justify-content-center card-body  mb-3">
                
                <?php foreach($buku as $bk) :?>
                    <div class="col mb-5">
                        <div class="card h-100 shadow-sm">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url('public/assets/img/barang/') . $bk['gambar']?>" alt="image"/>
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $bk['nama']; ?></h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                                    Rp. <?= $bk['harga']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="<?= base_url('home/detail/') . $bk['id'];?>">Detail</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
                </div>

                <h1 class="h3 mb-4 text-gray-800">Kategori Jaket</h1>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-4 row-cols-xl-5 justify-content-center card-body  mb-3">
                
                <?php foreach($jaket as $jk) :?>
                    <div class="col mb-5">
                        <div class="card h-100 shadow-sm">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url('public/assets/img/barang/') . $jk['gambar']?>" alt="image"/>
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $jk['nama']; ?></h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                                    Rp. <?= $jk['harga']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="<?= base_url('home/detail/') . $jk['id'];?>">Detail</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
                </div>

                <h1 class="h3 mb-4 text-gray-800">Kategori Kain</h1>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-4 row-cols-xl-5 justify-content-center card-body  mb-3">
                
                <?php foreach($kain as $kn) :?>
                    <div class="col mb-5">
                        <div class="card h-100 shadow-sm">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url('public/assets/img/barang/') . $kn['gambar']?>" alt="image"/>
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $kn['nama']; ?></h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                                    Rp. <?= $kn['harga']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="<?= base_url('home/detail/') . $kn['id'];?>">Detail</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
                </div>

                <h1 class="h3 mb-4 text-gray-800">Kategori Pakaian</h1>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-4 row-cols-xl-5 justify-content-center card-body  mb-3">
                
                <?php foreach($pakaian as $pk) :?>
                    <div class="col mb-5">
                        <div class="card h-100 shadow-sm">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url('public/assets/img/barang/') . $pk['gambar']?>" alt="image"/>
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $pk['nama']; ?></h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                                    Rp. <?= $pk['harga']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="<?= base_url('home/detail/') . $pk['id'];?>">Detail</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
                </div>
</div>
            <br><br>