<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Transaksi</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Bukti Pembayaran</th>
                        <th>Aksi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($status_user as $su) :?>
                    <tr>
                        <td><?= $su['nama_user']; ?></td>
                        <td><?= $su['alamat']; ?></td>
                        <td><?= date('d F Y', $su['tanggal']); ?></td>
                        <td class="text-center">
                            <img src="<?= base_url('public/assets/img/alamat/') . $su['transfer']?>" alt="gambar" width="100">
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/detailtransaksi/') . $su['id_user']; ?>" class="btn btn-warning btn-icon-split" >
                                <span class="icon text-white-50">
                                    <i class="fas fa-info"></i>
                                </span>
                                <span class="text" >Detail</span>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/terima/') . $su['id_user']; ?>" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Terima</span>
                            </a>

                            <a href="<?= base_url('admin/tolak/') . $su['id_user']; ?>" class="btn btn-danger btn-icon-split"  onclick="return confirm('Apakah Anda Yakin?');">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Tolak</span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>



<h1 class="h3 mb-2 text-gray-800">Status Transaksi</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Status Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Bukti Pembayaran</th>
                        <th>Aksi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($alamat_user as $as) :?>
                    <tr>
                        <td><?= $as['nama_user']; ?></td>
                        <td><?= $as['alamat']; ?></td>
                        <td><?= date('d F Y', $as['tanggal']); ?></td>
                        <td class="text-center">
                            <img src="<?= base_url('public/assets/img/alamat/') . $as['transfer']?>" alt="gambar" width="100">
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/detailtransaksi/') . $as['id_user']; ?>" class="btn btn-warning btn-icon-split" >
                                <span class="icon text-white-50">
                                    <i class="fas fa-info"></i>
                                </span>
                                <span class="text" >Detail</span>
                            </a>
                        </td>
                        <td class="text-center">
                        <?php if($as['status'] == 1): ?>
                            <button class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Diterima</span>
                            </button>
                        <?php else : ?>
                            <button class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Ditolak</span>
                            </button>
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
<!-- /.container-fluid -->