                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Selamat Datang <?= $user['name']; ?></h1>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Buat Laporan</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_barang; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_user; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Pemasukan</div>
                                            <?php foreach($pemasukan as $p) :?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $p['total']; ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-danger">Daftar Barang</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Stok</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Stok</th>
                                                <th>Harga</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach($barangs as $barang) :?>
                                            <tr>
                                                <td><?= $barang['kode']; ?></td>
                                                <td><?= $barang['nama']; ?></td>
                                                <td><?= $barang['kategori']; ?></td>
                                                <td><?= $barang['stok']; ?></td>
                                                <td>Rp. <?= $barang['harga']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>  
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-danger">Daftar Admin</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($users as $user) :?>
                                                    <tr>
                                                        <td><?= $user['name']; ?></td>
                                                        <td><?= $user['email']; ?></td>
                                                        <td>
                                                            <?php if($user['role_id'] == 1) : ?>
                                                                Administrator
                                                            <?php else : ?>
                                                                Admin
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>  
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->